import * as modal from '../modal.js';

const tasks = document.getElementsByClassName("task");
const appinfo = document.getElementById("app-information").dataset;

// Task info modal
Array(...tasks).forEach(task => {
    task.addEventListener("click", () => {
        modal.modalPage("/tasks/" + task.dataset.id, {}, {width: 45});
    });
});

// New task modal
const newTaskButtons = document.getElementsByClassName("newtask");
Array(...newTaskButtons).forEach(button => {
    let id = button.dataset.id;
    button.addEventListener("click", () => {
        modal.modalPage("/tasks/create", {
            "cardid": id
        });
    });
});

// Board settings modal
const boardSettings = document.getElementById("board-settings");
boardSettings.addEventListener("click", () => {
    modal.modalPage("/boards/" + appinfo.boardId + "/edit", {}, {width: 45});
});

(function showModal() {
    const urlParams = new URLSearchParams(window.location.search);
    const show = urlParams.get('show');
    if (show) {
        if (show == "settings") {
            modal.modalPage(`/boards/${appinfo.boardId}/edit`, {}, {width: 45});
        } else if (parseInt(show) != NaN) {
            modal.modalPage(`/tasks/${show}`, {}, {width: 45});
        }
        setTimeout(() => {
            window.history.replaceState({}, document.title, window.top.location.pathname);
        }, 100);
    }
}())