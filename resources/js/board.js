const draggable = document.getElementsByClassName("draggable");
const dropzone = document.getElementsByClassName("dropzone");


for (let element of draggable) {
    element.addEventListener("dragstart", (e) => {
        e.dataTransfer.setData("text/plain", element.id);
        element.style.opacity = "0.5";
        console.log('startdrag')
    });

    element.addEventListener("dragend", () => {
        element.style.opacity = "1";
        console.log('enddrag')
    });
};

for (let element of dropzone) {
    element.addEventListener("dragover", (e) => {
        e.preventDefault();
    });
    
    element.addEventListener("drop", (e) => {
        e.preventDefault();
        const data = e.dataTransfer.getData("text/plain");
        const draggedElement = document.getElementById(data);
        console.log(draggedElement)
        if (draggedElement && e.target.classList.contains("dropzone") && e.target) {
            // Append the dragged element inside the drop zone
            e.target.appendChild(draggedElement);
        }
    });
}
