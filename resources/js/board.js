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
    const data = await response.json();
    // console.log(data);
    return data;
}

function getTasks() {
    const tasks = [];
    for (let element of draggable) {
        let cardid = element.parentElement.parentElement.id.split("-")[1];
        let taskid = element.children[0].id.split("-")[1];
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
    const cardid = card.id.split("-")[1];
    let order = 0;
    for (let element of card.lastChild.children) {
        if (element.id.split("-")[1] == taskid) {
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
for (let element of draggable) {
    element.addEventListener("dragstart", (e) => {
        e.dataTransfer.setData("text/plain", element.id);
        element.style.opacity = "0.5";
    });

    element.addEventListener("dragend", () => {
        element.style.opacity = "1";
    });
};

for (let element of dropzone) {
    element.addEventListener("dragover", (e) => {
        e.preventDefault();
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
}
