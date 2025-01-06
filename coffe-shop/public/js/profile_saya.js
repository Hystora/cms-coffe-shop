document.addEventListener('DOMContentLoaded', function() {
    const editBtn = document.getElementById('edit-btn');
    const confirmBtn = document.getElementById('confirm-btn');
    const inputs = document.querySelectorAll('#profile-form input');

    // Fetch data from server and populate the form
    fetch('src/controllers/profile.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('username').value = data.username;
            document.getElementById('phone').value = data.phone;
            document.getElementById('email').value = data.email;
            document.getElementById('alamat').value = data.address;
        })
        .catch(error => console.error('Error:', error));

    editBtn.addEventListener('click', function() {
        inputs.forEach(input => input.disabled = false);
        confirmBtn.disabled = false;
        confirmBtn.classList.add('enabled');
    });

    document.getElementById('profile-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        fetch('src/controllers/update_profile.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            inputs.forEach(input => input.disabled = true);
            confirmBtn.disabled = true;
            confirmBtn.classList.remove('enabled');
        })
        .catch(error => console.error('Error:', error));
    });
});
