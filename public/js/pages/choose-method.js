const videoButton = document.getElementById('videoButton');
const isUsingSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));

if (isUsingSafari) {
    alert('The Safari browser allows you to type text and record audio, but not video. If you want to record video, please use a different browser like Chrome or Firefox.');
    videoButton.href = '#';
    videoButton.classList.add('disabled');
}
