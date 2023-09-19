const modal = document.getElementById('modal');
const modalContent = document.getElementById('modalBody');
const modalClose = document.getElementById('closeModal');

modalClose.addEventListener('click', () => {
    modal.classList.add('hidden');
});

export function modalPage(url = "") {
    if (url === "") {
        return;
    } else {
        fetch(url)
            .then(response => response.text())
            .then(data => {
                modalContent.innerHTML = data;
                modal.classList.remove('hidden');
            });
    }
}