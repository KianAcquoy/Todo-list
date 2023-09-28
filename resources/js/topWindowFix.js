if (window.top.innerHeight !== window.innerHeight) {
    document.body.innerHTML = '';
    window.top.location.href = window.location.href;
}