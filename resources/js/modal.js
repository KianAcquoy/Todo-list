const modal = document.getElementById('modal');
const modalContent = document.getElementById('modalBody');
const modalClose = document.getElementById('closeModal');

modalClose.addEventListener('click', () => {
    modal.classList.add('hidden');
});

export function modalPageOld(url = "", data = {}) {
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

export function modalPage(url = "", data = {}) {
    if (url === "") {
        return;
    } else {
        const queryParams = new URLSearchParams(data);
        url = url + "?" + queryParams.toString();
        let iframe = document.getElementById('modalBody');
        let modalcontainer = document.getElementsByClassName('modal-container');
        iframe.setAttribute('src', url);
        iframe.addEventListener('load', () => {
            modal.classList.remove('hidden');
            modalcontainer[0].style.height = `${iframe.contentWindow.document.body.scrollHeight+50}px`;
            modalcontainer[0].style.width = `${iframe.contentWindow.document.body.scrollWidth+50}px`;
            // modalcontainer[0].style.width = `${iframe.contentWindow.document.body.scrollWidth}px`;
            iframe.style.height = modalcontainer[0].style.height;
            iframe.style.width = modalcontainer[0].style.width;
        });
    }
}