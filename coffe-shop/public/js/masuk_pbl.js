document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        // Validasi field harus terisi
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();

        if (!username || !password) {
            event.preventDefault(); // Mencegah pengiriman form jika field kosong
            alert('Semua field harus diisi!');
            return;
        }
    });
});
