
document.addEventListener('DOMContentLoaded', function () {
    const filterSelect = document.getElementById('filter');

    filterSelect.addEventListener('change', function () {
        const filterValue = filterSelect.value;
        window.location.href = `/coffe-shop/menu_kopi.php?filter=${filterValue}`;
    });
});

// Mendapatkan elemen dropdown dengan id 'filter'
const filterDropdown = document.getElementById('filter'); // Elemen dropdown filter

// Menambahkan event listener untuk mendeteksi perubahan pada dropdown
filterDropdown.addEventListener('change', function() {
    // Mendapatkan nilai yang dipilih oleh pengguna
    const selectedFilter = filterDropdown.value; // Nilai filter yang dipilih pengguna

    // Menampilkan pilihan filter yang dipilih menggunakan alert
    alert('Filter yang dipilih: ' + selectedFilter); // Menampilkan alert dengan filter yang dipilih

    // Logika tambahan untuk memfilter produk bisa ditambahkan di sini
    // Misalnya, mengubah urutan produk di halaman atau memfilter data produk yang ditampilkan
});
