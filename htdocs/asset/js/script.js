setTimeout(() => {
    let alerte = document.querySelector('.alert')
    alerte.classList.add('fadeOutUp')
    alerte.innerHTML = ''
    setTimeout(() => {
        alerte.classList.remove('alert')
        alerte.classList.remove('alert-danger')
        alerte.classList.remove('alert-success')
    }, 500);
}, 2000);

