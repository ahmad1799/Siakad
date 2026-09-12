<?php
/**
 * ============================================================
 * File Diagnostik SIAKAD SMP Utama
 * ============================================================
 * Letakkan file ini di folder yang sama dengan index.php
 * Akses via browser: http://localhost/Smputama/info.php
 *
 * Setelah selesai debugging, HAPUS file ini agar tidak bocor
 * informasi server ke publik!
 * ============================================================
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Diagnostik Server SIAKAD SMP Utama</h1>";
echo "<hr>";

echo "<h2>1. Informasi PHP</h2>";
echo "<p><strong>Versi PHP:</strong> " . phpversion() . "</p>";
echo "<p><strong>SAPI (Server API):</strong> " . php_sapi_name() . "</p>";
echo "<p><strong>Server Software:</strong> " . ($_SERVER['SERVER_SOFTWARE'] ?? 'tidak diketahui') . "</p>";

echo "<h2>2. Cek Ekstensi yang Dibutuhkan</h2>";
$required = ['mysqli', 'mbstring', 'gd', 'session', 'json', 'xml'];
echo "<ul>";
foreach ($required as $ext) {
    $loaded = extension_loaded($ext);
    $color = $loaded ? 'green' : 'red';
    $status = $loaded ? 'TERPASANG' : 'TIDAK ADA';
    echo "<li style='color:$color'><strong>$ext</strong>: $status</li>";
}
echo "</ul>";

echo "<h2>3. Cek Koneksi Database</h2>";
echo "<p>Mencoba membaca config/koneksi.php ...</p>";
if (file_exists('config/koneksi.php')) {
    echo "<p style='color:green'>File config/koneksi.php ditemukan</p>";

    // Include dengan output buffering agar tidak menampilkan HTML error koneksi
    ob_start();
    $koneksi_ok = false;
    $koneksi_error = '';
    try {
        include 'config/koneksi.php';
        if (isset($koneksi) && $koneksi instanceof mysqli) {
            if (mysqli_connect_errno()) {
                $koneksi_error = mysqli_connect_error();
            } else {
                $koneksi_ok = true;
                echo "<p style='color:green'><strong>Koneksi MySQL BERHASIL</strong></p>";

                // Cek apakah database 'bejo' punya tabel users
                $result = mysqli_query($koneksi, "SHOW TABLES LIKE 'users'");
                if (mysqli_num_rows($result) > 0) {
                    echo "<p style='color:green'>Tabel 'users' ditemukan - database sudah di-import</p>";
                } else {
                    echo "<p style='color:red'><strong>Tabel 'users' TIDAK ditemukan</strong> - silakan import file siakad.sql via phpMyAdmin</p>";
                }
            }
        } else {
            $koneksi_error = 'Variabel $koneksi tidak terdefinisi setelah include';
        }
    } catch (Throwable $e) {
        $koneksi_error = $e->getMessage();
    }
    ob_end_clean();

    if (!$koneksi_ok) {
        echo "<p style='color:red'><strong>Koneksi MySQL GAGAL:</strong> " . htmlspecialchars($koneksi_error) . "</p>";
        echo "<p>Cek kembali file config/koneksi.php - pastikan:</p>";
        echo "<ul>";
        echo "<li>\$server (biasanya 'localhost')</li>";
        echo "<li>\$username (biasanya 'root' di XAMPP/Laragon)</li>";
        echo "<li>\$password (biasanya kosong di XAMPP, 'root' di Laragon)</li>";
        echo "<li>\$database (harus sesuai dengan database yang sudah di-import)</li>";
        echo "</ul>";
    }
} else {
    echo "<p style='color:red'>File config/koneksi.php TIDAK ditemukan di folder ini!</p>";
}

echo "<h2>4. Cek Permission Folder</h2>";
$folders = ['foto_pegawai', 'foto_siswa', 'files', 'config'];
echo "<ul>";
foreach ($folders as $folder) {
    if (is_dir($folder)) {
        $writable = is_writable($folder);
        $color = $writable ? 'green' : 'orange';
        $status = $writable ? 'WRITABLE' : 'TIDAK WRITABLE (perlu chmod 755)';
        echo "<li style='color:$color'><strong>$folder/</strong>: $status</li>";
    } else {
        echo "<li style='color:orange'><strong>$folder/</strong>: tidak ada (akan dibuat otomatis)</li>";
    }
}
echo "</ul>";

echo "<h2>5. Informasi Lengkap phpinfo()</h2>";
echo "<p><em>Scroll ke bawah untuk info lengkap (hapus setelah selesai!):</em></p>";
phpinfo();

echo "<hr>";
echo "<p style='color:red'><strong>PENTING:</strong> Setelah selesai debugging, HAPUS file info.php ini dari server agar informasi sensitif tidak bocor ke publik.</p>";
