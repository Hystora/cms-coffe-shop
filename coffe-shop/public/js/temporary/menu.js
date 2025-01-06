document.addEventListener('DOMContentLoaded', function() {
    fetch('src/controllers/get_products.php')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('products-container');
            container.innerHTML = '';

            if (data.length === 0) {
                container.innerHTML = '<p>Tidak ada produk ditemukan.</p>';
                return;
            }

            data.forEach(product => {
                const productDiv = document.createElement('div');
                productDiv.className = 'product';
                productDiv.innerHTML = `
                    <img src="${product.image}" alt="${product.name}">
                    <p>${product.name}</p>
                    <p class="price">$${product.price.toFixed(2)}</p>
                    <button onclick="addToCart(${product.id})">Tambahkan ke Keranjang</button>
                    <button onclick="buyNow(${product.id})">Beli Sekarang</button>
                `;
                container.appendChild(productDiv);
            });
        })
        .catch(error => console.error('Error:', error));
});

function addToCart(productId) {
    alert(`Produk dengan ID ${productId} ditambahkan ke keranjang.`);
    // Logika untuk menambahkan produk ke keranjang
}

function buyNow(productId) {
    alert(`Beli produk dengan ID ${productId} sekarang.`);
    // Logika untuk pembelian langsung
}
