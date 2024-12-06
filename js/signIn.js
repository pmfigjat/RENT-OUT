const email = document.getElementById('email');
const password = document.getElementById('password');
const namee = document.getElementById('name');
const form = document.getElementById('form');

form.addEventListener('submit', (e) => {
    if (email.value == '' || email.value == null) {
        e.preventDefault();
        alert("Email nuk duhet te jete e thate");
        return;
    }


    if (namee.value == '' || namee.value == null) {
        e.preventDefault();
        alert("Emri nuk duhet te jete e thate");
        return;
    }

    if (password.value.length < 8) {
        e.preventDefault();
        alert("Passwordi duhet te kete se paku 8 karaktere");
        return;
    }
});