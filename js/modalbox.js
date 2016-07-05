if (document.getElementsByClassName('modal')) {
    document.onclick = function (e) {
        var modal, closeable, modal_content, i;
        modal = document.getElementsByClassName('modal');
        closeable = document.getElementsByClassName('closeable');
        modal_content = document.getElementsByClassName('modal-content');

        for (i = 0; i < modal.length; i++) {

            if (e.target === closeable[i]) {
                if (i <= closeable.length) {
                    closeable[i].classList.remove("show-modal");
                }
            } else if (!modal[i].classList.contains("closeable")) {
                if (e.target === modal[i]) {

                    if (!modal_content[i].classList.contains("shake")) {
                        modal_content[i].classList.add("shake");
                        modal_content[i].classList.remove("shake1");
                    } else {
                        modal_content[i].classList.remove("shake");
                        modal_content[i].classList.add("shake1");
                    }
                }
            }
        }
    }
}

function close_modal(id) {
    id = document.getElementById(id);
    id.classList.remove("show-modal");
}

function show_modal(id) {
    id = document.getElementById(id);
    id.classList.toggle("show-modal");
}
function close_div(el) {
    el.parentNode.style.opacity = 0;
    setTimeout(function () { el.parentNode.style.display = "none"; }, 500);
}