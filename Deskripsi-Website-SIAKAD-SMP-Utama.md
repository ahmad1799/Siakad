# Deskripsi Website — SIAKAD SMP Utama

## Apa Ini?

**SIAKAD SMP Utama** adalah Sistem Informasi Akademik berbasis website untuk mengelola seluruh kegiatan akademik sekolah secara digital — mulai dari data siswa, guru, nilai, absensi, jadwal, sampai rapor. Website ini bukan situs profil biasa, melainkan sistem berbasis login yang dipakai sehari-hari oleh tiga jenis pengguna: **Administrator, Guru, dan Siswa**, masing-masing dengan tampilan dan menu yang berbeda sesuai kebutuhannya.

---

## Cara Login

Semua pengguna login lewat satu halaman yang sama, sistem akan otomatis mengenali level akun dan mengarahkan ke dashboard yang sesuai:

| Peran | Username | Password |
|---|---|---|
| Administrator / Kepala Sekolah | Username akun admin | Password akun admin |
| Guru | NIP | Password (default = NIP, bisa diganti admin) |
| Siswa | NISN | Password (default = NISN, bisa diganti admin) |

Setelah login berhasil, sistem mencatat aktivitas login (waktu, browser, perangkat) untuk keperluan keamanan, lalu mengarahkan pengguna ke dashboard sesuai perannya.

---

## Fitur — Administrator

Administrator punya akses penuh untuk mengelola seluruh data sekolah:

- **Dashboard** — ringkasan jumlah siswa, guru, dan kelas.
- **Data Master** — identitas sekolah (nama & logo), kurikulum, tahun akademik, gedung, ruangan, golongan, jenis PTK, jurusan, kelas, status kepegawaian.
- **Data Pengguna** — kelola akun Siswa, Guru, dan Administrator (tambah satu-satu, atau **import massal dari Excel**).
- **Data Akademik** — kelompok mata pelajaran, mata pelajaran, jadwal pelajaran.
- **SMS Gateway** — kirim SMS ke wali murid/siswa, broadcast, auto-reply, dan riwayat pesan masuk/keluar.
- **Data Absensi** — rekap kehadiran guru dan siswa.
- **Laporan Nilai Siswa** — nilai UTS, capaian belajar, ekstrakurikuler, prestasi, nilai rapor, cetak rapor, dan cetak buku induk.
- **Catatan KBM & Forum Diskusi** — memantau jurnal mengajar dan diskusi guru-siswa.
- **Quiz / Ujian Online** — kelola soal ujian daring.
- **Panduan** — dokumentasi penggunaan sistem.

---

## Fitur — Guru

- **Dashboard** — ringkasan jadwal dan kelas yang diampu.
- **Absensi Siswa** — mencatat kehadiran siswa tiap pertemuan.
- **Bahan dan Tugas** — unggah materi dan berikan tugas ke siswa.
- **Quiz / Ujian Online** — membuat soal ujian/kuis daring.
- **Forum Diskusi** — berdiskusi dengan siswa soal materi.
- **Kompetensi Dasar** — menentukan KD per mata pelajaran.
- **Journal KBM** — mencatat jurnal kegiatan belajar-mengajar.
- **Laporan Nilai Siswa** — input dan lihat nilai untuk rapor.
- **Documentation** — panduan versi guru.

---

## Fitur — Siswa

- **Dashboard** — ringkasan kelas, jadwal, dan pengumuman.
- **Penilaian Diri** — mengisi form penilaian diri sendiri.
- **Penilaian Teman** — menilai teman sekelas.
- **Bahan dan Tugas** — unduh materi, kumpulkan tugas.
- **Quiz / Ujian Online** — mengerjakan ujian daring.
- **Forum Diskusi** — bertanya/berdiskusi dengan guru & teman.
- **Laporan Nilai Siswa** — lihat dan unduh nilai/rapor pribadi.
- **Documentation** — panduan versi siswa.

---

## Tampilan

Tema visual saat ini: **Semangat Pagi** — nuansa oranye-kuning hangat, sudut membulat, dan sudah responsif (nyaman dibuka di HP, tablet, maupun komputer). Nama sekolah dan logo bisa diganti sendiri oleh admin lewat menu Data Identitas Sekolah, dan otomatis tampil di judul tab browser, favicon, serta halaman login & dashboard.

---

## Ringkasan Teknis Singkat

- Dibangun dengan PHP + MySQL, tampilan berbasis Bootstrap/AdminLTE.
- Tiga level akses: Administrator, Guru, Siswa — satu pintu login untuk semuanya.
- Data siswa & guru bisa ditambah satu-satu atau lewat import Excel massal.
