const draggable = document.getElementsByClassName("draggable");
const dropzone = document.getElementsByClassName("dropzone");

async function sendToServer(tasks) {
    let appinfo = document.getElementById("app-information").dataset;
    const response = await fetch('http://127.0.0.1:8000/api/save-board', {
        method: "POST",
        body: JSON.stringify({
          user_id: appinfo.userId,
          board_id: appinfo.boardId,
          tasks: tasks,
        }),
        headers: {
          "Content-type": "application/json; charset=UTF-8"
        }
    });
    return await response.json();
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
    return sendToServer(tasks);
}


// Drag and drop
Array(...draggable).forEach(element => {
    element.addEventListener("dragstart", (e) => {
        e.dataTransfer.setData("text/plain", element.id);
        element.style.opacity = "0.3";
        setTimeout(() => element.classList.add("dragging"), 0);
    });

    element.addEventListener("dragend", () => {
        element.style.opacity = "1";
        element.classList.remove("dragging")
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
    
    element.addEventListener("drop", async (e) => {
        e.preventDefault();
        const data = e.dataTransfer.getData("text/plain");
        const draggedElement = document.getElementById(data);
        if (draggedElement && e.target.classList.contains("dropzone") && e.target) {
            e.target.appendChild(draggedElement);
        }
        await saveBoard();
    });
});