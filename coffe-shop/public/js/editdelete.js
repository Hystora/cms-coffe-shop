document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-btn');
    const deleteButtons = document.querySelectorAll('.delete-btn');

    // Menambahkan kelas CSS yang sama ke tombol "Edit" dan "Hapus"
    editButtons.forEach(btn => {
        btn.classList.add('button');
    });

    deleteButtons.forEach(btn => {
        btn.classList.add('button');
    });

    // Fungsi untuk menyimpan log ke localStorage
    function saveLog(message) {
        let logs = JSON.parse(localStorage.getItem('consoleLogs')) || [];
        logs.push(message);
        localStorage.setItem('consoleLogs', JSON.stringify(logs));
    }

    // Fungsi untuk memuat log dari localStorage
    function loadLogs() {
        let logs = JSON.parse(localStorage.getItem('consoleLogs')) || [];
        logs.forEach(log => console.log(log));
    }

    // Memuat log yang sudah ada
    loadLogs();

    editButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = btn.getAttribute('data-id');
            const item = document.querySelector(`.product-item[data-id='${productId}']`);
            const nameField = item.querySelector('.product-name');
            const descField = item.querySelector('.description');

            if (btn.textContent === 'Edit') {
                nameField.disabled = false;
                descField.disabled = false;
                btn.textContent = 'Simpan';
                saveLog(`Editing product ID: ${productId}`);
            } else {
                fetch('src/controllers/edit_product.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `product_id=${productId}&product_name=${nameField.value}&description=${descField.value}`
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data); // Kembali ke console.log
                    saveLog(`Updated product ID: ${productId}`);
                    location.reload();
                });

                nameField.disabled = true;
                descField.disabled = true;
                btn.textContent = 'Edit';
            }
        });
    });

    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = btn.getAttribute('data-id');

            // Menambahkan dialog konfirmasi
            const confirmed = confirm("Apakah Anda yakin ingin menghapus produk ini?");
            if (confirmed) {
                fetch('src/controllers/delete_product.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `product_id=${productId}`
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data); // Kembali ke console.log
                    saveLog(`Deleted product ID: ${productId}`);
                    location.reload();
                });
            }
        });
    });
});
