document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');
    registerForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman form standar
        
        // Kirim data form dengan fetch API
        const formData = new FormData(registerForm);
        
        fetch('src/controllers/register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Tampilkan notifikasi dan redirect ke halaman login
            alert('Pendaftaran berhasil! Sekarang Anda akan diarahkan ke halaman login.');
            window.location.href = 'login.php';
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
        });
    });
});
