function showConfirmation() {
    const confirmationPage = document.getElementById('confirmationPage');
    confirmationPage.classList.remove('translate-x-full');
    confirmationPage.classList.add('translate-x-0');
}

function hideConfirmation() {
    const confirmationPage = document.getElementById('confirmationPage');
    confirmationPage.classList.remove('translate-x-0');
    confirmationPage.classList.add('translate-x-full');
}


window.showConfirmation = showConfirmation;
window.hideConfirmation = hideConfirmation;
