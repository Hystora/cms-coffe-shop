document.addEventListener('DOMContentLoaded', function() {
    const changePasswordForm = document.getElementById('changePasswordForm');
    const newPassword = document.getElementById('new_password');
    const confirmPassword = document.getElementById('confirm_password');
    const passwordError = document.getElementById('passwordError');

    confirmPassword.addEventListener('input', function() {
        if (newPassword.value !== confirmPassword.value) {
            passwordError.style.display = 'block';
        } else {
            passwordError.style.display = 'none';
        }
    });

    changePasswordForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman form standar
        
        // Cek kecocokan password
        if (newPassword.value !== confirmPassword.value) {
            passwordError.style.display = 'block';
            return; // Jangan kirim form jika password tidak cocok
        }
        
        // Kirim data form dengan fetch API
        const formData = new FormData(changePasswordForm);
        
        fetch('src/controllers/change_password.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Tampilkan notifikasi dan redirect ke halaman profil
            alert(data); // Tampilkan respons dari server
            if (data === 'Password berhasil diubah!') {
                window.location.href = 'profile.php';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengubah password. Silakan coba lagi.');
        });
    });
});
