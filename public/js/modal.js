const modal = document.getElementById('modal');
const modalClose = document.getElementById('closeModal');
const modalContainer = document.getElementById('modalContainer');
const iframe = document.getElementById('modalBody');
const observer = new MutationObserver(handleMutations);

function handleMutations(mutations) {
    resizeIframe();
}

let minheight = 0;
let maxheight = 80;
let width = 30;

(function load() {
    iframe.addEventListener('load', (e) => {
        e.preventDefault();
        modal.classList.remove('hidden');
        resizeIframe();

        observer.observe(iframe.contentDocument, {
            subtree: true,
            attributes: true,
        });

        window.addEventListener('resize', resizeIframe);
    });
}())

function resizeIframe() {
    iframe.style.width = `${document.body.scrollWidth / 100 * width}px`;
    let height = iframe.contentWindow.document.body.scrollHeight;
    if (minheight > 0 && height < minheight) {
        height = window.top.innerHeight / 100 * minheight;
    }
    if (maxheight > 0 && height > window.top.innerHeight / 100 * maxheight) {
        height = window.top.innerHeight / 100 * maxheight;
    }
    iframe.style.height = `${height}px`;
    modalContainer.style.backgroundColor = window.getComputedStyle(iframe.contentWindow.document.body).backgroundColor;
}


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

export function modalPage(url = "", data = {}, settings = {}) {
    if (url === "") {
        return;
    } else {
        const queryParams = new URLSearchParams(data);
        url = url + "?" + queryParams.toString();
        iframe.setAttribute('src', url);
        width = settings.width ? settings.width : 30;
        minheight = settings.minheight ? settings.minheight : 0;
        maxheight = settings.maxheight ? settings.maxheight : 80;
    }
}