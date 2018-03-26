function getModalInputVal(modal, name) {
    return $(modal).find('input[name="' + name + '"]').val();
}

function getModalSelectVal(modal, name) {
    return $(modal).find('select[name="' + name + '"]').val();
}

// call this before showing SweetAlert:
function fixBootstrapModal(select) {
    if (!select) select = '.modal';
    var modalNode = document.querySelector(select + '[tabindex="-1"]');
    if (!modalNode) return;

    modalNode.removeAttribute('tabindex');
    modalNode.classList.add('js-swal-fixed');
}

// call this before hiding SweetAlert (inside done callback):
function restoreBootstrapModal() {
    var modalNode = document.querySelector('.modal.js-swal-fixed');
    if (!modalNode) return;

    modalNode.setAttribute('tabindex', '-1');
    modalNode.classList.remove('js-swal-fixed');
}