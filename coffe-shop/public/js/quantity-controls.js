// Ambil elemen DOM berdasarkan id
const decreaseButton = document.getElementById('decrease'); // Mengambil elemen tombol minus (decrease)
const increaseButton = document.getElementById('increase'); // Mengambil elemen tombol plus (increase)
const quantitySpan = document.getElementById('quantity'); // Mengambil elemen yang menampilkan jumlah (quantity)

// Tambahkan event listener untuk tombol minus
decreaseButton.addEventListener('click', () => { 
    // Event listener untuk tombol minus, ketika tombol diklik, kode di dalam fungsi ini akan dijalankan
    let currentQuantity = parseInt(quantitySpan.textContent); 
    // Mengambil nilai saat ini dari elemen quantitySpan dan mengubahnya menjadi angka (parseInt)
    if (currentQuantity > 1) { // Pastikan jumlah tidak kurang dari 1
        quantitySpan.textContent = currentQuantity - 1; 
        // Jika jumlah lebih dari 1, mengurangi 1 dan memperbarui tampilan
    }
});

// Tambahkan event listener untuk tombol plus
increaseButton.addEventListener('click', () => { 
    // Event listener untuk tombol plus, ketika tombol diklik, kode di dalam fungsi ini akan dijalankan
    let currentQuantity = parseInt(quantitySpan.textContent); 
    // Mengambil nilai saat ini dari elemen quantitySpan dan mengubahnya menjadi angka (parseInt)
    quantitySpan.textContent = currentQuantity + 1; 
    // Menambah 1 pada jumlah dan memperbarui tampilan
});
