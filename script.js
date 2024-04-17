// Menambahkan event listener yang menunggu sampai semua elemen DOM telah dimuat.
document.addEventListener('DOMContentLoaded', function() {
    // Mengakses elemen form, source, passphrase, dan destination dari HTML berdasarkan ID mereka.
    const form = document.getElementById('encryptForm');
    const source = document.getElementById('source');
    const passphrase = document.getElementById('passphrase');
    const destination = document.getElementById('destination');

    // Menambahkan event listener untuk menangani pengiriman form.
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form dari pengiriman standar (refresh halaman).
        const text = source.value; // Mengambil nilai teks dari textarea.
        const key = passphrase.value; // Mengambil nilai kata sandi dari input.
        
        // Menghitung hash HMAC SHA256 dari teks menggunakan passphrase sebagai kunci.
        const hash = CryptoJS.HmacSHA256(text, key).toString();
        
        // Menampilkan hash yang dihasilkan di textarea 'destination'.
        destination.value = hash;
    });
});