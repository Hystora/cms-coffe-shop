document.addEventListener('DOMContentLoaded', function() {
    function loadOrders(status) {
        fetch(`src/controllers/get_orders.php?status=${status}`)
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('orders-container');
                container.innerHTML = '';

                if (data.length === 0) {
                    container.innerHTML = '<p>Tidak ada pesanan ditemukan.</p>';
                    return;
                }

                data.forEach(order => {
                    const orderDiv = document.createElement('div');
                    orderDiv.className = 'order';
                    orderDiv.innerHTML = `
                        <p>Order ID: ${order.id}</p>
                        <p>Status: ${order.status}</p>
                        <p>Quantity: ${order.quantity}</p>
                        <p>Date: ${order.order_date}</p>
                    `;
                    container.appendChild(orderDiv);
                });
            })
            .catch(error => console.error('Error:', error));
    }

    // Load all orders on page load
    loadOrders('Semua');
});
