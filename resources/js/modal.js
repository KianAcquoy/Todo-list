const modal = document.getElementById('modal');
const modalContent = document.getElementById('modalBody');
const modalClose = document.getElementById('closeModal');

modalClose.addEventListener('click', () => {
    modal.classList.add('hidden');
});

export function modalPage(url = "", data = {}) {
    if (url === "") {
        return;
    } else {
        const queryParams = new URLSearchParams(data);
        url = url + "?" + queryParams.toString();
        console.log(url)
        fetch(url)
            .then(response => response.text())
            .then(data => {
                modalContent.innerHTML = data;
                modal.classList.remove('hidden');
            });
    }
}