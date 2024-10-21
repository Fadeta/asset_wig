<?php
// Memulai session di awal untuk mengakses session data
session_start();

// Cek apakah user sudah login dengan memeriksa session 'log'
if (isset($_SESSION['log']) && $_SESSION['log'] === 'true') {
    // Jika session 'log' di-set dan bernilai 'true', izinkan akses
    // Tidak ada aksi tambahan yang diperlukan di sini
} else {
    // Jika session tidak di-set atau bukan 'true', redirect ke login.php
    header('location: login.php');
    exit(); // Menghentikan eksekusi kode setelah redirect
}
?>
