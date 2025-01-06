document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman form standar

        // Validasi field harus terisi
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();
        const alamat = document.getElementById('alamat').value.trim();
        const handphone = document.getElementById('handphone').value.trim();
        const email = document.getElementById('email').value.trim();

        if (!username || !password || !alamat || !handphone || !email) {
            alert('Semua field harus diisi!');
            return;
        }

        // Kirim data form dengan fetch API
        const formData = new FormData(form);

        fetch('src/controllers/register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            if (data === 'Pendaftaran berhasil!') {
                window.location.href = 'masuk_pbl.html'; // Redirect ke halaman login
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
        });
    });
});
