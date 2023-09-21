import * as modal from '../modal.js';

const newbutton = document.getElementById("newboard");

newbutton.addEventListener("click", () => {
    modal.modalPage("/boards/create", "New Board");
});