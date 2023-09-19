import * as modal from '../modal.js';

const tasks = document.getElementsByClassName("task");

Array(...tasks).forEach(task => {
    task.addEventListener("click", () => {
        modal.modalPage("/tasks/" + task.dataset.id);
    });
});