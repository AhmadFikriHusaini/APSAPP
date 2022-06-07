-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2022 pada 04.41
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openbook_trial2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `Id_buku` int(11) NOT NULL,
  `Judul` varchar(50) NOT NULL,
  `Penulis` varchar(50) NOT NULL,
  `Penerbit` varchar(50) NOT NULL,
  `Id_kategori` int(11) NOT NULL,
  `Tahun_terbit` year(4) NOT NULL,
  `Cover_buku` varchar(100) NOT NULL,
  `file_buku` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`Id_buku`, `Judul`, `Penulis`, `Penerbit`, `Id_kategori`, `Tahun_terbit`, `Cover_buku`, `file_buku`, `deskripsi`) VALUES
(40, 'Aerial', 'Sitta Karina', 'PT Gramedia Pustaka Utama', 4, 2009, '06-06-22.11-38-12.Aerial.jpg', '06-06-22.11-38-12.Aerial.pdf', 'Sadira si Putri Matahari dan Hassya sang Pangeran Kegelapan merupakan musuh bebuyutan dari dua negeri yang saling bertolak belakang; yang satu menjadikan matahari sebagai sumber hidupnya, satu lagi akan terbakar apabila terpapar langsung oleh sinarnya.'),
(41, 'Cruel empress', 'antariksa putra', 'eternity publishing', 4, 2021, '06-06-22.11-43-06.Cruel empress.jpg', '06-06-22.11-43-06.Cruel empress.pdf', 'Lisa adalah seorang anak mafia yang sangat kejam. Pada suatu hari dia kecelakaan dan bertramigrasion ketubuh permaisuri yang berusaha di lenyapkan oleh selir.di tambah kaisar yang tidak pernah peduli padanya.\r\nBagimana cara lisa bertahan hidup?\r\n'),
(42, 'devil prince', 'dheti azmi', 'azmi publishing', 4, 2020, '06-06-22.11-45-47.devil prince.jpg', '06-06-22.11-45-47.devil prince.pdf', 'Bagaimana jadinya jika kamu di targetkan menjadi pemuas hasrat seorang iblis? Itu yang dirasakan oleh wanita bernama Crystal Gold Houtsman. Wanita cantik dengn pribadi yang keras kepala.\r\nElard Calister, iblis terkutuk yang di asingkan ke dunia manusia karena selalu melanggar perintah raja.\r\n'),
(43, 'downpour', 'ghyna amanda', 'gramedia pustaka utama', 4, 2019, '06-06-22.11-47-38.downpour.jpg', '06-06-22.11-47-38.downpour.pdf', 'Yulenka terpaksa mengikuti keinginan ayahnya. Setelah sedari kecil homeschooling, dia harus masuk sekolah umum saat SMA. Di tengah ketidakyakinan bahwa banyak hal menarik yang akan ditemukannya di SMA, Yulenka bertemu Regulus. Si Rubah Gurun itu membuat Yulenka menantikan hari-harinya di sekolah. Meski hobi tidur di perpustakaan, ternyata cowok itu terkenal sebagai siswa terpandai. Dengan tungkai kaki yang lemah, Regulus selalu berada di dekat Yulenka. Cowok itu menemaninya menghadapi tantangan menghadapi teman sekelas, para senior, bahkan guru-guru di sekolah. Saat menghadiri pameran pendidikan universitas, Yulenka akhirnya mengetahui satu fakta yang tanpa sengaja disimpan Regulus. Dia jadi merasa tidak mengetahui sedikit pun tentang cowok yang sering kali mengejutkannya saat hujan deras datang itu. Ketika Yulenka tercebur ke kolam, terungkap rahasia lain dari Regulus. Rahasia yang sulit untuk diterima Yulenka. Rahasia yang mengantarkannya pada keputusan apakah akan tetap mendampingi atau justru meninggalkan cowok itu.'),
(44, 'his magesty', 'masda raimunda', 'karos publisher', 4, 2021, '06-06-22.11-49-13.his magesty.jpg', '06-06-22.11-49-13.his magesty.pdf', 'Tentang perjalanan Nararya kecil sebagai seorang putra mahkota. Rasa sepi karena tidak memiliki teman. Bosan dengan rutinitas. Hingga kerap menyelinap ke luar istana.\r\nTentang Nararya remaja, yang jatuh cinta pada Agni, putri penjaga istal. Gadis lembut yang memiliki mata bercahaya laksana bintang. Berusaha menyimpan perasaannya sekaligus menjaga Agni dari banyak pria yang menginginkan gadis pujaannya.\r\n'),
(45, 'Rekayasa Perangkat Lunak ', 'Edwar Ali', 'CV Mefa', 2, 2019, '06-06-22.02-23-29.Rekayasa Perangkat Lunak .png', '06-06-22.02-23-29.Rekayasa Perangkat Lunak .pdf', 'Rekayasa perangkat lunak (software engineering) bukanlah berbicara tentang bahasa pemrograman yang biasa digunakan untuk rekayasa perangkat lunak. Rekayasa perangkat lunak atau disingkat RPL adalah suatu bidang profesi yang mendalami cara-cara pengembangan perangkat lunak, termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak, dan sebagainya atau sebuah profesi dari seorang perekayasa perangkat lunak yang berkaitan dengan pembuatan dan pemeliharaan aplikasi perangkat lunak dengan menerapkan teknologi dan praktik dari ilmu komputer, manajamen proyek, dan bidang-bidang lainnya. Semakin tinggi ilmu tekhnologi dan pengembangannya semakin tinggi juga kebutuhan perangkat lunak yang diinginkan untuk menjalankan suatu program. Untuk itu dibuatlah pemeliharaan rekayasa perangkat lunak, dalam arti mengembangkan program-program menjadi satu kesatuan yang utuh untuk dapat mempermudah suatu proses pekerjaan yang dilakukan dalam aktivitas sehari-hari yang berhubungan dengan rekayasa perangkat lunak.\r\n'),
(46, 'Sejarah Islam di nusantara', 'Michelle Afan', 'PT. Bentang Nusantara', 2, 2005, '06-06-22.02-24-55.Sejarah Islam di nusantara.png', '06-06-22.02-24-55.Sejarah Islam di nusantara.pdf', 'para Indonesianis maupun orang-orang Indonesia benar-benar kehilangan atas wafatnya antropolog dan humanis Cliford Geertz pada akhir Oktober 2006. Geertz telah melanglang buana melampaui Jawa dan Bali serta menggeluti cakrawala yang jauh lebih luas sehingga ada perasaan di kalangan para Indonesianis bahwa, entah sepakat atau tidak dengan gagasan-gagasannya, dia adalah salah seorang dari kita. Tak syak lagi dia sudah memberikan banyak hal untuk dipertimbangkan pada bidang kajian ini. Dalam berbagai kontribusi seperti Agricultural Involution (1963), Islam Observed (1968), dan Negara (1980), kesemuanya dibangun atas reputasi yang dibentuk oleh Religion of Java-nya yang sangat berpengaruh sejak 1960, gagasan-gagasan Geertz tak pernah gagal membangkitkan gairah. '),
(47, 'Psikologi Pendidikan', 'Sri Esti Wuryani Djiwando', 'P2LPTK ', 2, 2002, '06-06-22.02-26-10.Psikologi Pendidikan.png', '06-06-22.02-26-10.Psikologi Pendidikan.pdf', 'Menurut arti kata maka psikologi seringditerjemahkan menjadi ilmu jiwa. Dapat dilihat dari kata psyche yang berarti : jiwa, roh,dan logos yang berarti : ilmu. Dapat dikatakan bahwa psikologi ialah ilmu yangmempelajari tingkah laku manusia. Lalu apa itu psikologi pendidikan? Psikologi pendidikan adalah cabang dari psikologi yang dalam pengurainnya dan penelitiannyalebih menekankan pada maslah pertumbuhan dan perkembangan anak, baik fisik maupunmental, yangn sangat erat kaitanya dengan masalah pendidikan terutama yangmempengaruhi proses dan keberhasilan belajar. Dengan demikian ruang lingkup psikologi pendidikan menyangkut tentang factor-faktor pembawaan dan lingkungan,sifat-sifat dari proses belajar, tingkat kematangan dengan kesiapan belajar, kecepatan danketerbatasan belajar, perubahan-perubahan jiwa, sikap ilmiah, kondisi-kondisi sosiologisterhadap sikap para siswa.'),
(48, 'Matematika Dasar', 'Muhhamd Faizal Amir & bayu hari prasojo', 'umsida press', 2, 2016, '06-06-22.02-27-32.Matematika Dasar.png', '06-06-22.02-27-32.Matematika Dasar.pdf', 'Pembelajaran dengan penanaman konsep dasar merupakan jembatan yang harus dapat menghubungkan kemampuan kognitif siswa yang konkret dengan konsep baru Matematika yang abstrak. Penanaman konsep bertujuan agar siswa lebih memahami suatu konsep pembelajaran matematika. Bagaimana penerapan konsep ini di kelas? Apa saja yang harus dilakukan guru agar siswa dekat dengan Matematika tanpa merasa kesulitan? Langkah-langkah penanaman konsep Matematika ini dibahas tuntas di buku ini. Pemahaman yang melekat terus-menerus akan mengembangkan kreativitas siswa, serta diharapkan mampu memecahkan masalah yang menuntut penalaran.'),
(49, 'Ilmu Pengetahuan Alam ', 'Siti zubaidah', 'Pusat Kurikulum dan perbukuan ', 2, 2014, '06-06-22.02-28-32.Ilmu Pengetahuan Alam .png', '06-06-22.02-28-32.Ilmu Pengetahuan Alam .pdf', 'Di dalam pelajaran  IPA kita tidak terlepas dengan kegiatan di dalam laboratorium, dilaboratorium kita akan menemui alat-alat dan bahan-bahan yang dapat menimbulkan kecelakaan, maka dari itu perlu adanya pengetahuan tentang keselamatan kerja. Dapat dipelajari dan dilakukan mulai dari pengenalan, persiapan alat dan penggunaannya di dalam laboratorium.  Agar dalam pelaksanaan kegiatan di dalam laboratorium tidak akan mengalami kecelakaan kerja dan kegiatan serta pengamatan akan berjalan dengan baik\r\nBesaran  adalah segala sesuatu yang dapat diukur atau dihitung, dinyatakan dengan angka dan mempunyai satuan. Dari pengertian ini dapat diartikan bahwa sesuatu itu dapat dikatakan sebagai besaran harus mempunyai 3 syarat yaitu: dapat diukur atau dihitung;'),
(52, 'over(love) weight', 'desy miladiana', 'PT elex media komputindo', 1, 2021, '06-07-22.02-59-41.over(love) weight.jpg', '06-07-22.02-59-41.over(love) weight.pdf', 'Bukannya tidak senang, bagi Desya perjodohan ini adalah harapan yang menjadi kenyataan. Setelah bertahun-tahun memendam perasaannya pada Deon dan tidak percaya diri dengan tubuh overweight-nya; 75 kg dengan tinggi 160 cm, Desya merasa jalannya untuk bersama Dion dimudahkan oleh Tuhan. Setidaknya Desya tidak perlu susah payah mengungkapkan perasaannya. Awalnya, hubungan mereka berjalan lancar. Sayangnya, kebahagiaan Desya tidak berlangsung lama karena seorang wanita dari masa lalu Deon datang. Desya kalah telak. Single parents yang bak seorang model, telah mencuri perhatian Deon. Desya kalah telak. Wanita dari masa lalu itu memiliki terlalu banyak kelebihan yang diinginkan para wanita. Sedangkan Desya hanya punya kelebihan cinta untuk Deon dan kelebihan berat badan. Hingga seorang pria muncul dan membantu menemukan jalan keluar dari masalahnya. Mungkinkah kisah selanjutnya akan berjalan sesuai ekspektasi Desya?'),
(53, 'radity & sasa', 'desi eriana', 'indies publisher', 1, 2021, '06-07-22.03-00-57.radity & sasa.jpg', '06-07-22.03-00-57.radity & sasa.pdf', 'Raditya tidak pernah mengira bahwa di usianya yang sudah tidak lagi muda, ia harus kembali menjalani takdir yang digariskan Tuhan untuknya.\r\nSituasi serta keadaan yang mendesak membuat Raditya harus mengambil keputusan untuk menikahi wanita yang dipanggil kakak oleh putri semata wayangnya. Tidak bisa mundur, Raditya pun harus menjalani takdir dengan memiliki dua orang istru.\r\n\r\nLalu, apakah Raditya bisa bertindak adil sebagai seorang suami? Ataukah harus ada yang tersakiti karena bersatunya dua hati?'),
(54, 'Husband Doctor', 'Rossi', 'indies publisher', 1, 2021, '06-07-22.03-01-42.Husband Doctor.jpg', '06-07-22.03-01-42.Husband Doctor.pdf', 'Dr. Malik Argantara Sp.B, siapa yang tak kenal dia, dokter bedah berparas tampan dan menawan idola para wanita diluaran sana. Sosok dr. Malik yang selalu dikenal alim, sopan, ramah dan baik hati, adalah idaman bagi setiap wanita. Beberapa kali jatuh cinta, namun sayangnya Tuhan selalu tak pernah berpihak pada kisah cintanya yang selalu saja gagal, sampai akhirnya dr. Malik dipaksa untuk menikah dengan seorang wanita yang sangat ia benci. Seorang mantan pekerja seks yang tak pernah layak untuk ia sebut sebagai seorang istri.'),
(55, 'Terima lamaranku atau ku tunggu jandamu', 'dea khairina', 'lovrinz publisher', 1, 2020, '06-07-22.03-02-57.Terima lamaranku atau ku tunggu jandamu.jpg', '06-07-22.03-02-57.Terima lamaranku atau ku tunggu jandamu.pdf', 'Devano Mannasero, pemuda berusia 25 tahun yang tidak pernah menyangka akan keluar dari zona nyaman dalam hidupnya. Hal itu disebabkan oleh seorang gadis berpipi chubby bernama Hana Pricylia Fathiaturahma, gadis usia 18 tahun yang menyeretnya dalam lingkaran cinta dengan syarat hafalan minimal 5 Juz Al-Quran, dan salat wajib 5 waktu dari calon papa mertua. Dia pun mulai menjungkirbalikkan kehidupan kelamnya menuju secercah cahaya yang menuntun pelan mengenal Agama Allah. Namun, setelah syarat itu hampir terpenuhi. Cinta Devano terhambat oleh skandal Hana yang tersebar di internet hingga menyebabkan restu dari orang tuanya sulit didapat. Sampai Hana memilih pemuda lain. Luka hati Devano semakin menjadi. Mampukah Devano bertahan dengan perasaan cintanya? Atau, dia akan melepas cinta itu dan memilih yang lain?'),
(56, 'Terjerat Berondong', 'ayu taringan', 'karos publisher', 1, 2021, '06-07-22.03-04-13.Terjerat Berondong.jpg', '06-07-22.03-04-13.Terjerat Berondong.pdf', 'Uly Syahrani adalah seorang wanita independen yang memimpikan jodoh seorang pria dewasa yang bijaksana dan bertanggung jawab. Tapi ternyata takdir berkata lain, ia malah terjerat pada seorang berondong yang merupakan adik tiri dari mantan kekasihnya yang dulu pernah berselingkuh.\r\n\r\nUly berusaha keras untuk lari, tapi pemuda bernama Dewa Angkasa itu tidak melepaskannya begitu saja. Uly semakin terjerat dan terikat dalam ikatan suci pernikahan. Lalu, mampukah wanita itu menerima Dewa yang jauh dari tipe suami ideal yang diimpikannya?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorite`
--

CREATE TABLE `favorite` (
  `Id_user` int(11) NOT NULL,
  `Id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'romansa'),
(2, 'edukasi'),
(3, 'komik'),
(4, 'fiksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_user`
--

CREATE TABLE `log_user` (
  `id_log` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `Ip` varchar(25) NOT NULL,
  `Access_from` varchar(254) NOT NULL,
  `Waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_user`
--

INSERT INTO `log_user` (`id_log`, `nama_user`, `Ip`, `Access_from`, `Waktu`) VALUES
(180, 'user4', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-07 01:04:27'),
(181, 'user4', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-07 01:13:34'),
(182, 'user1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-07 01:39:47'),
(183, 'user1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-07 02:16:57'),
(184, 'user2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-07 02:19:01'),
(185, 'user4', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-07 02:19:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Hak_Akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `Email`, `Username`, `Password`, `Hak_Akses`) VALUES
(1, 'user1@gmail.com', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'admin'),
(2, 'user2@gmail.com', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'petugas'),
(3, 'user3@gmail.com', 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 'anggota'),
(5, 'user4@gmail.com', 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 'anggota');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`Id_buku`),
  ADD KEY `Id_kategori` (`Id_kategori`);

--
-- Indeks untuk tabel `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`Id_user`,`Id_buku`),
  ADD KEY `Id_buku` (`Id_buku`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `Id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`Id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`Id_buku`) REFERENCES `buku` (`Id_buku`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
