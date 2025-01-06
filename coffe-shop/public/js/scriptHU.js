    // navbar search
    const KolomPencarian = document.getElementById('KolomPencarian');
    const search = document.getElementById('input');
    const navbarMenu = document.getElementById('navbarMenu')
    const iconsGroup = document.querySelector('.icons-group');
    const keranjangIcon = document.getElementById('keranjang-icon');
    const profileIcon = document.getElementById('profile-icon');
    
    // Ambil elemen dropdown dan tombol
    const dropdownButton = document.querySelector('.admin-button');
    const dropdown = document.querySelector('.dropdown');

    KolomPencarian.addEventListener('click', () => {
        if (!search.classList.contains('input-open')) {
            search.classList.add('input-open'); // Membuka input pencarian
            search.classList.remove('input-close'); // Menghapus kelas "input-close"
            KolomPencarian.innerHTML = "<i class='fa fa-times'></i>"; // Mengubah ikon ke "x"
        } else {
            search.classList.remove('input-open'); // Menutup input pencarian
            search.classList.add('input-close'); // Menambahkan kelas "input-close"
            KolomPencarian.innerHTML = "<i class='fa fa-search'></i>"; // Mengubah ikon kembali ke pencarian
        }
    });
    
        // Scroll event listener
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        
        if (window.pageYOffset >= 100) {
            navbar.classList.add('sticky');
            document.getElementById('logo').style.display = 'none';
            document.getElementById('KolomPencarian').style.color = 'white';
            
            // Mengubah warna ikon keranjang dan profil saat navbar sticky
            keranjangIcon.style.color = 'white';
            profileIcon.style.color = 'white';
        } else {
            navbar.classList.remove('sticky');
            document.getElementById('logo').style.display = 'block';
            document.getElementById('KolomPencarian').style.color = 'black';
            
            // Mengembalikan warna ikon keranjang dan profil ke warna semula
            keranjangIcon.style.color = 'black';
            profileIcon.style.color = 'black';
        }
    });
    
    // Fungsi untuk menangani scroll
    window.addEventListener('scroll', function() {
        // Cek apakah scroll sudah lebih dari 50px
        if (window.pageYOffset >= 100) {
            // Ganti warna menjadi putih saat scroll lebih dari 100px
            iconsGroup.style.color = '';
            
            // Misalnya, kita bisa menyetel posisi top ke 0px saat scroll turun
            iconsGroup.style.top = '-2px'; // Atur posisi top menjadi -2px (lock)
            
        } else {
            // Kembalikan warna ke semula (misalnya hitam) ketika scroll lebih kecil dari 50px
            iconsGroup.style.color = 'black';
            
            // Kembalikan posisi top ketika scroll berada di atas
            iconsGroup.style.top = '-12px';
        }
    });

    // Menangani klik pada tombol
dropdownButton.addEventListener('click', function(event) {
    // Mencegah klik dari menutup dropdown jika tombol yang sama diklik
    event.stopPropagation();

    // Toggle class 'active' pada elemen dropdown
    dropdown.classList.toggle('active');
});

// Menutup dropdown jika klik di luar dropdown
window.addEventListener('click', function(event) {
    if (!dropdown.contains(event.target)) {
        dropdown.classList.remove('active');
    }
});
