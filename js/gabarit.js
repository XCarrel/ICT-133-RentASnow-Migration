document.addEventListener('DOMContentLoaded', function () {
    console.log('tt')
    var els = document.getElementsByClassName("clickable");
    Array.prototype.forEach.call(els, function(el) {
        el.addEventListener('click', function (evt) {
            window.location = evt.target.parentNode.getAttribute('data-href')
        })
    });
})
