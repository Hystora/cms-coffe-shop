document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('id');

    if (productId) {
        fetch(`src/controllers/get_product.php?id=${productId}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.getElementById('product-image').src = data.image;
                    document.getElementById('product-image').alt = data.name;
                    document.getElementById('product-name').textContent = data.name;
                    document.getElementById('product-sku').textContent = `SKU: ${data.id}`;
                    document.getElementById('product-price').textContent = `$${data.price.toFixed(2)}`;
                    document.getElementById('product-description').textContent = data.description;
                    document.getElementById('product-name-breadcrumb').textContent = data.name;
                } else {
                    document.getElementById('product-detail').innerHTML = '<p>Produk tidak ditemukan.</p>';
                }
            })
            .catch(error => console.error('Error:', error));
    } else {
        document.getElementById('product-detail').innerHTML = '<p>ID produk tidak ditemukan.</p>';
    }
});

function addToCart() {
    alert('Produk ditambahkan ke keranjang.');
    // Logika untuk menambahkan produk ke keranjang
}

function buyNow() {
    alert('Beli produk sekarang.');
    // Logika untuk pembelian langsung
}
