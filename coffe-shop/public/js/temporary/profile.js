document.addEventListener('DOMContentLoaded', (event) => {
    // Periksa apakah pengguna telah login
    const userLoggedIn = document.body.getAttribute('data-user-logged-in') === 'true';
    const username = document.body.getAttribute('data-username');
    
    if (userLoggedIn) {
        document.getElementById('login-link').style.display = 'none';
        const accountLink = document.getElementById('account-link');
        accountLink.style.display = 'block';
        accountLink.innerText = username;
    }

    // Fungsi untuk mengaktifkan input fields dan tombol simpan
    document.getElementById('edit-button').addEventListener('click', function() {
        document.querySelectorAll('input[readonly]').forEach(function(input) {
            input.removeAttribute('readonly');
            input.classList.add('editable');
        });
        document.getElementById('edit-button').style.display = 'none';
        document.getElementById('save-button').style.display = 'block';
    });
});
