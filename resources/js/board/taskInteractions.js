import * as modal from '../modal.js';

const tasks = document.getElementsByClassName("task");

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
}
);