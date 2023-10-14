const draggable = document.getElementsByClassName("draggable");
const dropzone = document.getElementsByClassName("dropzone");

async function saveBoardSend(tasks) {
    let appinfo = document.getElementById("app-information").dataset;
    const response = await axios.post('/api/save-board', {
        user_id: appinfo.userId,
        board_id: appinfo.boardId,
        tasks: tasks,
    });
    return response.data;
}

function getTasks() {
    const tasks = [];
    for (let element of draggable) {
        let cardid = element.parentElement.parentElement.dataset.id;
        let taskid = element.children[0].dataset.id;
        if (cardid != undefined && taskid != undefined) {
            let taskdata = getTaskLocation(taskid);
            tasks.push({
                'id': taskdata.taskid,
                'cardid': taskdata.cardid,
                'order': taskdata.order,
            });
        }
    }
    return tasks;
}

function getTaskLocation(taskid) {
    const task = document.getElementById(`task-${taskid}`);
    const card = task.parentElement.parentElement.parentElement;
    const cardid = card.dataset.id;
    let order = 0;
    for (let element of card.lastChild.children) {
        if (element.dataset.id == taskid) {
            break;
        }
        order++;
    }
    return {
        'taskid': parseInt(taskid),
        'cardid': parseInt(cardid),
        'order': order,
    };
}

function saveBoard() {
    const tasks = getTasks();
    return saveBoardSend(tasks);
}


// Drag and drop
Array(...draggable).forEach(element => {
    element.addEventListener("dragstart", (e) => {
        e.dataTransfer.setData("text/plain", element.id);
        element.style.opacity = "0.3";
        setTimeout(() => element.classList.add("dragging"), 0);
        currentlist = null;
    });

    element.addEventListener("dragend", async (e) => {
        e.preventDefault();
        element.style.opacity = "1";
        element.classList.remove("dragging")
    
        const draggedElement = element;
        if (draggedElement && e.target.classList.contains("dropzone") && e.target) {
            e.target.appendChild(draggedElement);
        }
        await saveBoard();
    });
});

let currentlist = null;
Array(...dropzone).forEach(element => {
    element.addEventListener("dragover", (e) => {
        e.preventDefault();
        const draggingItem = document.querySelector(".dragging");
        if (draggingItem && e.target.classList.contains("dropzone")) {
            currentlist = e.target;
        }
        if (currentlist && draggingItem) {
            let siblings = [...currentlist.querySelectorAll(".draggable:not(.dragging)")];
            let nextSibling = siblings.find(sibling => {
                return (e.clientY < sibling.getBoundingClientRect().top + sibling.getBoundingClientRect().height / 2);
            });
            currentlist.insertBefore(draggingItem, nextSibling);
        }
    });
});