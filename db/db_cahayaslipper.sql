-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 22 Feb 2017 pada 00.16
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_cahayaslipper`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `profile` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'redaksi@bukulokomedia.com', '08238923848', 'admin', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bls_email`
--

CREATE TABLE IF NOT EXISTS `bls_email` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesan` int(11) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `bls_email`
--

INSERT INTO `bls_email` (`no`, `id_pesan`, `subjek`, `pesan`, `tgl`) VALUES
(1, 5, 'testing', 'proses develop', '2016-08-11'),
(2, 3, 'good', 'bagus', '2016-08-14'),
(3, 8, 'Abdul Hamid', 'Sama sama bapak', '2016-09-04'),
(4, 1, 'tes', 'good', '2017-02-20'),
(5, 2, 'stgs', 'sgr4h4', '2017-02-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `type` enum('u','t') NOT NULL,
  `aktif` enum('y','n') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `contact_name`, `link`, `icon`, `type`, `aktif`) VALUES
(1, 'Address', 'Jl. Wonosari Km 9', 'icon icon-map-marker', 'u', 'y'),
(2, 'Telephone', '085363283137', 'icon icon-phone', 'u', 'y'),
(3, 'Electronic Support', 'zadamedia@gmail.com', 'icon icon-envelope', 'u', 'y'),
(4, 'Facebook', 'http://www.facebook.com/hamydallfhanz', 'icon icon-facebook', 't', 'y'),
(5, 'Twitter', 'http://twitter.com/hamyd_48', 'icon icon-twiter', 't', 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi`
--

CREATE TABLE IF NOT EXISTS `hubungi` (
  `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(1, 'Ariawan', 'ariawan@gmail.com', 'Mohon Informasi', 'Mohon informasi mengenai buku yang diterbitkan oleh Lokomedia.', '2008-02-10'),
(4, 'lukman', 'lukman@hakim', 'Request Code', 'Tolong dunk ..', '2009-02-25'),
(6, 'Adiyaksa', 'adi@gmail.com', 'Nanya', 'ljlfdks flkdjsflk', '2009-11-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`) VALUES
(2, 'Iphone', 'iphone'),
(3, 'Sony Ericsson', 'sony-ericsson'),
(4, 'Motorola', 'motorola'),
(5, 'LG', 'lg'),
(6, 'Blackberry', 'blackberry'),
(7, 'Samsung', 'samsung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(100) NOT NULL,
  `ongkos_kirim` int(10) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `ongkos_kirim`) VALUES
(1, 'Jakarta', 13000),
(2, 'Bandung', 13500),
(3, 'Semarang', 10000),
(4, 'Medan', 20000),
(5, 'Aceh', 25000),
(6, 'Banjarmasin', 17500),
(7, 'Balikpapan', 18500),
(8, 'Samarinda', 19500),
(9, 'Lainnya', 10000),
(10, 'Palembang', 23000),
(11, 'Surabaya', 13000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kustomer`
--

CREATE TABLE IF NOT EXISTS `kustomer` (
  `id_kustomer` int(5) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telpon` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `id_kota` int(5) NOT NULL,
  PRIMARY KEY (`id_kustomer`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `kustomer`
--

INSERT INTO `kustomer` (`id_kustomer`, `password`, `nama_lengkap`, `alamat`, `email`, `telpon`, `id_kota`) VALUES
(1, 'e10adc3949ba59abbe56e057f20f883e', 'Lukmanul Hakim', 'Jl. Prof. Dr. Soepomo No. 178, Tebet, Jakarta Timur 17280', 'algosigma@gmail.com', '081804396000', 1),
(2, '827ccb0eea8a706c4c34a16891f84e7b', 'abdul hamid', 'Bantul', 'hamyd.abdul6@gmail.com', '085363283137', 9),
(3, '827ccb0eea8a706c4c34a16891f84e7b', 'abdul', 'bantul', 'abdul32@yahoo.com', '0853222', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `logo`
--

CREATE TABLE IF NOT EXISTS `logo` (
  `id_logo` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `image` varchar(30) NOT NULL,
  `aktif` enum('y','n') NOT NULL,
  PRIMARY KEY (`id_logo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data untuk tabel `logo`
--

INSERT INTO `logo` (`id_logo`, `title`, `image`, `aktif`) VALUES
(1, 'RF Dressmaker', 'logo.png', 'y'),
(45, 'cahaya slipper 23', '2b.jpg', 'n'),
(46, 'tiga', '83036d0ed64c8f79d26b027d14259d', 'n'),
(49, 'refeaf', 'cahayaslipper40583036d0image/j', 'n'),
(50, 'erfe', 'baterai cmos.jpg', 'n'),
(51, 'erfe', 'cahayaslipper305_free_image/jp', 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_menu`
--

CREATE TABLE IF NOT EXISTS `main_menu` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(30) NOT NULL,
  `aktif` enum('y','n') NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `main_menu`
--

INSERT INTO `main_menu` (`no`, `menu`, `aktif`, `link`) VALUES
(1, 'HOME', 'y', 'index.html'),
(3, 'ABOUT US', 'y', 'about.html'),
(4, 'SERVICES', 'y', ''),
(5, 'CONTACT US', 'y', 'contact.html'),
(6, 'TESTIMONI', 'y', 'testimoni.html'),
(7, 'BLOG', 'y', 'blog.html'),
(11, 'About', 'n', 'about.htm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `urutan` int(5) NOT NULL,
  `nama_toko` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `meta_deskripsi` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `meta_keyword` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email_pengelola` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nomor_rekening` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nomor_hp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=58 ;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `status`, `aktif`, `urutan`, `nama_toko`, `meta_deskripsi`, `meta_keyword`, `email_pengelola`, `nomor_rekening`, `nomor_hp`) VALUES
(18, 'Produk', '?module=produk', '', '', 'admin', 'Y', 5, '', '', '', '', '', ''),
(42, 'Order', '?module=order', '', '', 'admin', 'Y', 6, '', '', '', '', '', ''),
(10, 'Manajemen Modul', '?module=modul', '', '', 'admin', 'Y', 3, '', '', '', '', '', ''),
(31, 'Kategori Produk', '?module=kategori', '', '', 'admin', 'Y', 4, '', '', '', '', '', ''),
(43, 'Profil Toko Online', '?module=profil', '<strong>mobilestore.com</strong> merupakan website resmi dari Toko HP Lokomedia yang bermarkas di Jl. Arwana No.24 Minomartani Yogyakarta 55581. Dirintis pertama kali oleh Lukmanul Hakim pada tanggal 14 Maret 2008.<br />\r\n<br />\r\nProduk unggulan dari Toko HP Lokomedia adalah produk-produk serta aksesoris bertema Nokia yang merupakan merk produk handphone paling terdepan saat ini.\r\n', 'gedung.jpg', 'admin', 'Y', 2, 'mobilestore.com - toko lokomedia online', 'mobilestore.com adalah toko online dari penerbit lokomedia yang buku-buku komputer khususnya di bidang pemrograman web dan internet.', 'lokomedia, bukulokomedia, toko online, buku komputer, handphone.', 'redaksi@bukulokomedia.com', 'BCA 0312849389 a.n. Lukmanul Hakim, Mandiri 13700045678910 a.n. Lukmanul Hakim', '081804396000'),
(44, 'Hubungi Kami', '?module=hubungi', '', '', 'admin', 'Y', 9, '', '', '', '', '', ''),
(45, 'Cara Pembelian', '?module=carabeli', '<ol><li>Klik pada tombol&nbsp;<span style="font-weight: bold;">Beli</span> pada produk yang ingin Anda pesan.</li><li>Produk yang Anda pesan akan masuk ke dalam <span style="font-weight: bold;">Keranjang Belanja</span>. Anda dapat melakukan perubahan jumlah produk yang diinginkan dengan mengganti angka di kolom <span style="font-weight: bold;">Jumlah</span>, kemudian klik tombol <span style="font-weight: bold;">Update</span>. Sedangkan untuk menghapus sebuah produk dari Keranjang Belanja, klik tombol Kali yang berada di kolom paling kanan.</li><li>Jika sudah selesai, klik tombol <span style="font-weight: bold;">Selesai Belanja</span>, maka akan tampil form untuk pengisian data kustomer/pembeli.</li><li>Setelah data pembeli selesai diisikan, klik tombol <span style="font-weight: bold;">Proses</span>, maka akan tampil data pembeli beserta produk yang dipesannya (jika diperlukan catat nomor ordersnya). Dan juga ada total pembayaran serta nomor rekening pembayaran.</li><li>Apabila telah melakukan pembayaran, maka produk/barang akan segera kami kirimkan. <br></li></ol>', 'gedung.jpg', 'admin', 'Y', 8, '', '', '', '', '', ''),
(47, 'Banner', '?module=banner', '', '', 'user', 'Y', 10, '', '', '', '', '', ''),
(48, 'Ongkos Kirim', '?module=ongkoskirim', '', '', 'user', 'Y', 7, '', '', '', '', '', ''),
(49, 'Ganti Password', '?module=password', '', '', 'user', 'Y', 1, '', '', '', '', '', ''),
(53, 'Modul YM', '?module=ym', '', '', 'user', 'Y', 12, '', '', '', '', '', ''),
(52, 'Laporan', '?module=laporan', '', '', 'user', 'Y', 11, '', '', '', '', '', ''),
(57, 'Download Katalog', '?module=download', '', '', 'user', 'Y', 13, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_ym`
--

CREATE TABLE IF NOT EXISTS `mod_ym` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `mod_ym`
--

INSERT INTO `mod_ym` (`id`, `nama`, `username`) VALUES
(1, 'Siti Mutmainah', 'iin.suka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(150) NOT NULL,
  `desk` text NOT NULL,
  `tgl` date NOT NULL,
  `penulis` int(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`no`, `image`, `judul`, `judul_seo`, `desk`, `tgl`, `penulis`) VALUES
(1, 'centrallaundry.png', '[NEWS] Launching Official Website Kami, Centrallaundry.co.id', 'news-launching-official-website-kami-centrallaundrycoid', '<p>Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus...</p>\r\n', '2016-09-04', 5),
(2, '10dryclean.jpg', '[Artikel] Mengenal Metode Pencucian â€œDry Cleaningâ€', 'artikel-mengenal-metode-pencucian-â€œdry-cleaningâ€', '<p>Anda yang sering melalukan pencucian di binatu tentu saja tak asing lagi dengan istilah&nbsp;<em>laundry</em>&nbsp;dan<em>dry clean.</em>&nbsp;Selama ini banyak orang mengira mencuci dengan cara&nbsp;<em>dry cleaning</em>&nbsp;adalah suatu teknologi mencuci kering tanpa cairan apa pun. Sepengetahuan mereka, mencuci dengan cara ini relatif lebih mahal dengan harapan hasil cuciannya jadi lebih bersih ketimbang&nbsp;<em>laundry</em>.</p>\r\n\r\n<p>Bagi mereka yang paham, semua kotoran yang disebabkan air sebaiknya juga dicuci dengan air. Hanya saja, tak semua material pakaian bisa dicuci dengan air sehingga harus dicuci melalui proses<em>dry cleaning</em>. Jika memaksakan menggunakan metode&nbsp;<em>laundry</em>, bisa saja pakaian tersebut menciut dan rusak.</p>\r\n\r\n<p>Sebenarnya pencucian secara &ldquo;kering&rdquo; ini tidak benar-benar kering karena tetap memerlukan cairan<em>solvent based</em>. Salah satu&nbsp;<em>solvent based</em>&nbsp;yang banyak digunakan di Indonesia adalah PCE (<em>perchloroethylene</em>). Sayangnya banyak pihak yang menganggap PCE kurang ramah lingkungan. Hal ini juga membuat banyak orang berasumsi&nbsp;<em>dry cleaning</em>&nbsp;adalah metode pencucian yang tidak ramah lingkungan.</p>\r\n\r\n<p>Pendapat ini tidak sepenuhnya benar karena ramah atau tidaknya proses pencucian<em>&nbsp;dry cleaning</em>terhadap lingkungan sangat bergantung dari teknologi dan detergen yang digunakan untuk menetralkannya. Di Eropa, misalnya, proses pencucian &ldquo;kering&rdquo; mayoritas menggunakan<em>&nbsp;hydrocarbon dry clean machine</em>&nbsp;yang dianggap ramah lingkungan dengan bau yang tidak menyengat karena menggunakan&nbsp;<em>solvent based</em>&nbsp;berupa hidrokarbon.</p>\r\n\r\n<p>Bukan hanya itu,<em>&nbsp;solvent based</em>&nbsp;jenis hidrokarbon juga lebih &ldquo;aman&rdquo; digunakan untuk mencuci pakaian yang banyak aksesorinya. Termasuk baju dengan payet yang berkualitas rendah atau baju dan kaos yang bersablon. Oleh karena itu, tak ada salahnya Anda mengenal lebih dekat proses pencucian<em>&nbsp;dry cleaning</em>&nbsp;agar tak ada lagi pakaian yang rusak karena pencucian yang salah. [AYA]</p>\r\n\r\n<p>Sumber :&nbsp;</p>\r\n\r\n<p><a href="http://infoklasika.print.kompas.com/mengenal-metode-pencucian-dry-cleaning/">http://infoklasika.print.kompas.com/mengenal-metode-pencucian-dry-cleaning/</a></p>\r\n\r\n<p><a href="http://suitsandskirtscleaners.com/media/dryclean.jpg">http://suitsandskirtscleaners.com/media/dryclean.jpg</a></p>\r\n', '2016-09-04', 5),
(3, '91test.jpg', '[INFO] Spesial Promo September !', 'info-spesial-promo-september-', '<p>Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus...</p>\r\n', '2016-09-04', 5),
(4, '67pic234.jpg', '[Artikel] Memilih Mesin Cuci yang bagus &amp; Awet', 'artikel-memilih-mesin-cuci-yang-bagus-amp-awet', '<p>Salah satu pertimbangan utama dalam memilih sebuah mesin cuci adalah segi keawetannya. Ibu tentu tidak ingin uang yang telah Ibu keluarkan untuk membeli sebuah mesin cuci terbuang begitu saja karena mesin cuci tersebut hanya bertahan dua atau tiga tahun.</p>\r\n\r\n<p>Berita baiknya adalah hampir semua merek mesin cuci maupun toko elektronik saat ini telah menawarkan garansi penuh bebas biaya selama satu tahun. Namun, setelah dua atau tiga tahun, garansi tersebut hanya mencakup beberapa komponen tertentu pada mesin cuci. Oleh karena itu, ketika membeli sebuah mesin cuci, pastikan Ibu memilih mesin cuci yang bagus dan awet.</p>\r\n\r\n<h2>Merek Mesin Cuci yang Awet</h2>\r\n\r\n<p>Walau tidak ada merek mesin cuci yang bisa memberikan jaminan ketahanan antara lima hingga delapan tahun, membeli mesin cuci buatan produsen merek yang tepercaya akan memperkecil kemungkinan mendapatkan mesin cuci berkualitas rendah.</p>\r\n\r\n<p>Jadi, sempatkan untuk membaca ulasan mengenai merek-merek mesin cuci tahan lama di berbagai forum diskusi yang dapat diakses online. Ibu juga perlu berhati-hati ketika membeli mesin cuci impor karena belum tentu semua merek memiliki pusat servis di Indonesia. Pastikan sebelum Ibu membelinya.</p>\r\n\r\n<p>Berikut ini&nbsp;<a href="https://www.rinso.co.id/perbandingan-mesin-cuci/" target="_blank">beberapa merek mesin cuci</a>&nbsp;yang dapat Ibu jadikan referensi dalam memilih mesin cuci yang bagus dan dapat diandalkan.</p>\r\n\r\n<ul>\r\n	<li><strong>Sharp</strong>: Merek asal Negeri Sakura ini memiliki beberapa tipe dengan harga yang cukup terjangkau namun tetap berkualitas. Misalnya, Ibu dapat membeli mesin cuci Sharp tipe ES-N70EY-P dengan harga sekitar Rp.2 juta. Selain itu, beberapa model mesin cuci Sharp sudah dilengkapi panel dalam bahasa Indonesia sehingga lebih mudah dioperasikan.</li>\r\n	<li><strong>Electrolux</strong>: Siapa yang tidak kenal merek mesin cuci asal Swedia ini. Merek yang terkenal ramah lingkungan ini memiliki kisaran harga antara Rp.1,5 juta hingga Rp.13 juta. Namun, cukup dengan anggaran sekitar Rp.5 juta, Ibu sudah bisa mendapatkan mesin cuci Electrolux tipe EWF10741 yang merupakan mesin cuci bukaan depan dengan tabung berkapasitas 7 kg.</li>\r\n	<li><strong>LG</strong>: Ketika berbicara mengenai mesin cuci yang awet, rasanya tidak bisa melewatkan mesin cuci keluaran LG asal Korea Selatan. Beberapa model mesin cuci LG sudah dilengkapi teknologi Inverter Direct Drive dan 6 pilihan siklus cuci dengan garansi 10 tahun. Teknologi ini menawarkan motor penggerak yang lebih tangguh dan juga tahan lama serta proses pencucian yang tidak bising. Salah satu contohnya adalah mesin cuci LG tipe WDT1213MRD yang merupakan mesin cuci bukaan depan dengan kapasitas tabung 13 kg dan harga sekitar Rp.12 juta</li>\r\n</ul>\r\n\r\n<h2>Fitur-Fitur Mesin Cuci Tahan Lama</h2>\r\n\r\n<p>Ketika sudah menemukan merek dan model mesin cuci yang Ibu inginkan, pastikan bahwa mesin cuci tersebut memiliki beberapa fitur di bawah ini:</p>\r\n\r\n<ul>\r\n	<li>Bahan tabung mesin cuci bisa terbuat dari plastik, enamel, atau&nbsp;<em>stainless steel</em>.&nbsp;<em>Stainless steel</em>&nbsp;tentu saja merupakan pilihan yang paling baik karena paling awet dan tahan terhadap putaran berkecepatan tinggi. Tabung berbahan plastik juga lebih tahan lama dibandingkan bahan enamel yang lebih mudah berkarat.</li>\r\n	<li>Banyaknya program yang ditawarkan mesin cuci modern sekarang ini perlu disikapi secara lebih hati-hati. Semakin kompleks pemrograman sebuah mesin cuci, semakin besar pula resiko kerusakannya. Oleh karena itu, pastikan bahwa&nbsp;<a href="https://www.rinso.co.id/tips-mesin-cuci/memahami-pilihan-program-pada-mesin-cuci/" target="_blank">pilihan-pilihan program</a>&nbsp;yang ditawarkan oleh sebuah mesin cuci memang sesuai dengan kebutuhan Ibu, tidak lebih dari itu.</li>\r\n	<li>Cek apakah mesin cuci pilihan Ibu sudah dilengkapi fitur&nbsp;<em>code error</em>. Jika mesin cuci Ibu rusak, fitur ini menampilkan kode pada layar digital di panel mesin cuci untuk memberitahu kerusakan apa yang terjadi. Misalnya, kode kerusakan pintu mesin cuci adalah E2 untuk merek Sharp, E40 untuk Elextrolux, dan dE untuk LG. Mengenali dan mengatasi kerusakan mesin cuci Ibu sejak awal merupakan langkah sederhana menjaga keawetan mesin cuci.</li>\r\n</ul>\r\n\r\n<p>Mudah-mudahan informasi di atas membantu Ibu dalam menentukan model dan merek mesin cuci yang bagus dan awet untuk keperluan di rumah. Namun, jangan lupa bahwa cara penggunaan dan perawatan mesin cuci di rumah juga penting untuk menjaga keawetan mesin cuci Ibu. Apabila Ibu memiliki saran merek dan model mesin cuci yang bagus dan awet, tuliskan saran tersebut di kotak komentar di bawah ini.</p>\r\n\r\n<p>Sumber :&nbsp;</p>\r\n\r\n<p><a href="https://www.rinso.co.id/tips-mesin-cuci/panduan-memilih-mesin-cuci-yang-bagus-dan-awet/">https://www.rinso.co.id/tips-mesin-cuci/panduan-memilih-mesin-cuci-yang-bagus-dan-awet/</a></p>\r\n\r\n<p><a href="http://www.drawhome.com/wp-content/uploads/2016/04/adorable-laundry-room-design-with-classy-wallpaper-and-elegant-washing-machine-including-purple-chair-beside-window-and-black-white-chess-pattern-floor.jpg">http://www.drawhome.com/wp-content/uploads/2016/04/adorable-laundry-room-design-with-classy-wallpaper-and-elegant-washing-machine-including-purple-chair-beside-window-and-black-white-chess-pattern-floor.jpg</a></p>\r\n\r\n<p>&nbsp;</p>\r\n', '2016-09-04', 5),
(5, '26jenis-kain.jpg', '[Info] Mengenal Jenis-Jenis Kain', 'info-mengenal-jenisjenis-kain', '<p>Ada banyak sekali jenis-jenis kain yang ada saat ini. Ketika Anda hendak belanja kain maka sebaiknya Anda mepelajari dulu beberapa jenis kain yang umum digunakan sebagai bahan pakaian berikut ini.</p>\r\n\r\n<ol>\r\n	<li><strong>Kain Katun (cotton)</strong></li>\r\n</ol>\r\n\r\n<p>Bahan dasar kain katun adalah serat kapas. Jenis kain katun ada 2 jenis yaitu cotton combed dan cotton carded. Cotton combed memiliki tekstur yang lebih halus jika dibandingkan dengan cotton carded. Kain katun biasanya dipakai untuk membuat jenis-jenis pakaian seperti kemeja, kaos, blus, celana dan lain-lain.<br />\r\nUntuk memahami kekurangan dan kelebihannya bisa kita lihat dari karakteristik kain katun.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2016-09-04', 5),
(6, '38harajuku.jpg', 'Style Harajuku 12', 'style-harajuku-12', '<p>Jepang adalah tempat di mana setiap orang adalah individu - tapi dalam kelompok. Jika Anda pergi ke taman pada jam tertentu setiap hari Sabtu, Anda akan melihat ratusan anak laki-laki berpakaian rocks and rollers, menari untuk musik rock and roll ... sangat serius. Maka tidak mengherankan bahwa ketika gadis-gadis ingin menampilkan mode inovatif bahwa tidak ada -seorangpun yang pernah melihat sebelumnya, mereka ingin melakukannya di tempat yang sama, pada waktu yang sama. Dan tempat itu adalah distrik Harajuku di Tokyo.<br />\r\n<br />\r\nIstilah &quot;Harajuku Girls&quot; telah digunakan oleh media berbahasa Inggris untuk menggambarkan remaja berpakaian dalam gaya busana yang berada di wilayah Harajuku. mode ini menanamkan beberapa terlihat dan gaya untuk membuat bentuk yang unik dari gaun. Salah satu gaya, Kawaii, menjadi terkenal pada 1990-an. Kawaii menjadi ungkapan populer yang berarti ada sesuatu yang manis atau cantik. Kawaii adalah bentuk resistensi dalam gaya dan budaya yang terkait dengan itu tidak dilihat sebagai menarik oleh generasi tua. Gagasan Kawaii adalah budaya pemuda yang berbeda yang terpisah dari yang tradisional di cyber-punk melihat existence.The mengambil pengaruh dari fashion gothic dan menggabungkan neon dan colors.However metalik, tidak sepopuler itu pada 1990-an.<br />\r\n<br />\r\n<strong>Asal Usul Harajuku</strong><br />\r\n<br />\r\nfashion Harajuku mendapatkan namanya dari distrik Harajuku di Tokyo. Semua diaktifkan-pada anak-anak harajuku pergi ke sana untuk menjelajahi banyak toko-toko pakaian dan mengumpulkan Yoyogi taman, kafe-kafe di jalan Omotesando atau dalam perjalanan ke kuil Meiji untuk menampilkan kreasi terbaru mereka harajuku untuk wisatawan maupun untuk teman-teman mereka.<br />\r\n<br />\r\nHarajuku menjadi terkenal pada 1980-an karena penyanyi jalanan dan liar-berpakaian remaja yang berkumpul di sana pada hari Minggu ketika Omotesando ditutup untuk lalu lintas. Omotesando adalah jalan yang sangat panjang dengan kafe-kafe dan butik fashion kelas atas populer dengan penduduk dan turis. Setelah menjadi pejalan kaki di hari minggu itu adalah tempat yang sempurna untuk bertemu, bermain musik dan pamer!<br />\r\n<br />\r\nMemiliki tempat pertemuan reguler untuk seni, percakapan dan kinerja memunculkan adegan band Hokoten bersemangat. Ini berhenti pada akhir tahun 1990-an dan jumlah pemain, penggemar Visual Kei,<br />\r\npenari rockabilly dan bajingan telah terus menurun sejak. Hari ini di hari Minggu orang bisa melihat banyak Gothic Lolita serta banyak wisatawan asing mengambil gambar dari mereka dalam perjalanan ke Meiji Shrine. Beberapa wisatawan yang terkejut melihat suatu pameran besar pemuda Jepang berpakaian dalam pakaian sering mengejutkan.</p>\r\n', '2017-02-19', 1),
(7, '72fengho1.jpg', 'Kejutan Koleksi Elegan ', 'Kejutan-Koleksi-Elegan ', 'Koleksi Hermes terbaru di Paris Fashion Week kental dengan kesan simpel, segar, dan mewah. Di tangan desainer barunya, Christophe Lemaire, koleksi Hermes mampu memukau ratusan tamu undangan yang hadir.<br />\r\n<br />\r\nSaat pergelaran, Lemaire mencetuskan ide dengan menyembunyikan para model dalam bilik-bilik ruangan yang hanya diterangi cahaya lampu redup. Setelah itu, model keluar dan berjalan mengitari kursi penonton, kemudian secara acak berhenti di hadapan mereka sembari berpose anggun, lalu kembali berlenggak lenggok di atas panggung.<br />\r\n<br />\r\n&ldquo;Saya ingin menciptakan sesuatu yang baru dan segar, menampilkan wajah Hermes yang lebih segar dan penuh kejutan,&rdquo; ucap Lemaire seperti dilansir WWD.<br />\r\n<br />\r\nIde pergelaran itu terinspirasi dari pelancong yang mengembara ke tempat-tempat berbeda sambil mendengarkan alunan musik, lalu ada seorang wanita yang datang tiba-tiba, memesona dan cantik.<br />\r\n<br />\r\nIbarat penonton, pemandangan seperti itulah yang tertangkap dalam imajinasi. Apa hanya pergelaran yang berbeda? Ternyata tidak.<br />\r\n<br />\r\nKejutan juga datang dari koleksi busana, tas, serta aksesori yang dirancang Lemaire. Koleksi busana Hermes lebih bermain pada warna-warna putih, pastel, dan kombinasi warna terang seperti merah, oranye, kuning, dan hijau.<br />\r\n<br />\r\nPergelaran dibuka dengan koleksi atasan berwarna putih yang dikombinasi dengan model celana harem dan jaket balon berukuran besar. Selanjutnya ditampilkan pula koleksi gaun tunik dan celana kulit berpotongan lebar dengan tiga strip garis di bagian betis. Ada juga rok dengan detail cutting dan siluet menyamping, serta atasan dari bahan kulit.<br />\r\n<br />\r\nAdapun yang menjadi inspirasi dari koleksi tersebut adalah gaun futuristik Yunani di era 1980-an ketika warna putih menjadi warna dominan yang berpadu dengan bahan kulit serta garis lipitan yang tegas memanjang. Sekilas, gaun tersebut terkesan klasik dan monoton. Tapi, perhatian penonton tak hentinya tertuju pada model-model yang berseliweran di depan dan sekeliling mereka.<br />\r\n<br />\r\nHanya ada beberapa gaun yang direpresentasikan dengan ekspresi ceria oleh sang model. Oh ya, satu lagi yang menarik, kebanyakan dari mereka mengenakan ikat kepala dari bahan kulit tepat di batas garis poni lurus yang tertata rapi. Lemaire tidak hanya menunjukkan warna putih pada rancangannya.<br />\r\n<br />\r\nDia kembali hadir membawa nuansa warna pelangi. Salah satunya koleksi two pieces yang penuh kombinasi dua warna, yakni merah dan biru berupa baju atasan dan rok mini berpadu dengan stocking warna senada.<br />\r\n<br />\r\nSelanjutnya, model memamerkan rok mini lipit, kemeja polos, dan jaket berkulit lembut yang bahannya diambil dari bulu domba.<br />\r\n<br />\r\nDiikuti oleh model yang mengenakan gaun pendek berwarna oranye berbahan linen dengan variasi sabuk kulit.Gaun ini cukup menarik perhatian karena menampilkan kesan yang unik. Pergelaran berlanjut pada model yang membawa koleksi setelan baju warna hijau berpadu dengan celana pendek warna karamel diikuti gaun cetak bergaya Amerika Indian yang memiliki kantung celana di bagian sisi kanan dan kiri pinggul.<br />\r\n<br />\r\nKemudian,ada dua model yang bergantian tampil, salah satunya mengenakan suede shirt warna hijau dengan lengan tiga perempat dipadu rok berbahan kulit warna ungu terong. Sebagian besar koleksi Hermes tersebut coba memadukan antara gaya Yunani klasik dan gaya modern Amerika yang dibalut dengan permainan warnawarni yang selaras.<br />\r\n<br />\r\nLemaire mengemas pergelaran Hermes dengan sentuhan yang &ldquo;berjiwa&rdquo; dan filosofi yang kuat. Tidak jauh berbeda dengan identitas Hermes sebelumnya, koleksi Spring/Summer 2012ini menampilkan kreasi yang lebih dinamis dan tentu saja elegan.\r\n', '2016-08-07', 1),
(8, '43you.jpg', 'Bebaskan Ekspresi Anda dalam Bergaya!', 'bebaskan-ekspresi-anda-dalam-bergaya', 'Perancang ternama dari kiblat fashion dunia, Paris, Yves Saint Laurent<br />\r\nFashion pernah mengatakan, &ldquo;Fashion come and go, but style is forever&rdquo;.<br />\r\n<br />\r\nSederhananya, fashion bisa saja terus berubah, apa pun model dan trennya. Namun soal gaya, akan menetap pada diri seseorang sesuai karakternya. Ketika seseorang merasa nyaman dengan gaya tertentu, yang menjadi ciri khasnya, itu adalah pilihannya.<br />\r\n<br />\r\nHal ini pula yang diyakini Melia Prawira, pemilik toko fashion Jabotabek Shopping &amp; Friends. Dalam sebuah talkshow pembukaan pusat belanja dan fashion remaja, Melia mengatakan tidak ada tren fashion tertentu, menjawab pertanyaan apakah tren fashion tahun ini untuk anak muda.<br />\r\n<br />\r\nMenurut perempuan yang berkecimpung di dunia fashion selama 9 tahun ini, kecenderungan anak muda saat ini adalah ekspresif dengan dirinya. Model fashion yang muncul di layar kaca dari kiblat mana pun tak lagi jadi acuan mutlak.<br />\r\n<br />\r\n&ldquo;Gaya busana anak muda sekarang lebih ekspresif dan senang mengombinasikan warna. Mereka cenderung melihat ke dirinya. Apa yang pantas dan tidak untuk dikenakan,&rdquo; papar Melia.<br />\r\n<br />\r\nIstilah korban mode sudah nyaris tak lagi ditemui sekarang ini. Fashion pada anak muda lebih berkarakter dan menunjukkan ciri khas personal, termasuk padupadan warna.<br />\r\n<br />\r\nSementara itu fashion stylist Karin Wijaya justru mengakui tren warna ini. Menurutnya, trashing warna pada gaya busana anak muda yang menjadi tren terkini.<br />\r\n<br />\r\n&ldquo;Warna cerah yang optimis merepresentasikan semangat optimisme anak muda,&rdquo; kata Karin dalam launching produk sportswear beberapa waktu lalu.<br />\r\n<br />\r\nMeski begitu, fashion etnik menjadi tren yang cenderung menonjol pada tahun ini seperti diakui oleh Melia. Batik, menjadi produk lokal yang fashionable dan digemari anak muda. Menurut Melia, batik sebagai fashion muncul sejak budaya lokal mulai diklaim negara tetangga. Jadi, tren etnik batik muncul sebagai bentuk kecintaan karakter khas negeri.<br />\r\n<br />\r\nVariasi model dan desain batik pun semakin banyak yang berkarakter khas anak muda. Padupadan batik juga lebih berani. Misalkan, kata Melia, batik tak hanya berpasangan dengan high heels, tapi juga bisa dengan sepatu kets. Aksesori etnik juga pantas dipadukan dengan motif batik yang cenderung kaya warna. Pilihan warna juga tak harus seragam. Jadi, berani mengkolaborasikan ragam model dan desain serta warna, itulah tren fashion saat ini.<br />\r\n<br />\r\nSyaratnya, menurut Melia, nilai kepantasan berbusana lebih menjadi ukuran daripada apa mereknya atau keluaran mana. Simak triknya:<br />\r\n<br />\r\n<strong>Warna kulit</strong><br />\r\nOrang Indonesia cenderung memiliki warna kulit kecoklatan. Triknya, jangan gunakan warna krem karena kulit akan terlihat kumal. Coklat gelap lebih cocok karena akan lebih menonjolkan warna kulit.<br />\r\n<br />\r\n<strong>Bentuk badan</strong><br />\r\nPersoalan kepercayaan diri kaitannya dengan bentuk badan bisa terlihat dari busana yang dikenakannya. Jika ada orang berbadan besar, dan cukup nyaman serta percaya diri dengan pakaian sedikit terbuka, sah saja. Namun perlu juga diperhatikan apakah bentuk badan Anda cocok untuk busana tertentu. Tidak semua busana bisa pas di badan atau enak dilihat. Perlu konsultasi dengan pakar fashion atau sering membaca referensi fashion untuk mengenali gaya busana sesuai bentuk badan.<br />\r\n<br />\r\n<strong>Karakter</strong><br />\r\nBagaimana karakter dan pembawaan dalam diri juga bisa menjadi ukuran kepantasan. Jika Anda merasa nyaman dengan tampil sporty, tren batik masih bisa diikuti. Padankan saja dengan sepatu kets dan cardigan. Masih ada sentuhan feminin dan maskulin bukan? Atau gunakan jaket sporty dengan dalaman kemeja lengan panjang dan bawahan celana jins misalnya. Sporty dan rapi menjadi gaya busana yang tak menipu karakter Anda bukan?\r\n', '2016-08-07', 1),
(9, '73mencapai-kesuksesan.jpg', 'Motivasi Diri Menjadi yang Terbaik', 'motivasi-diri-menjadi-yang-terbaik', 'Semua orang ingin memiliki kehidupan yang bersemangat dan penuh warna. Dan menurut saya untuk memiliki kehidupan yang kita inginkan, kita harus memiliki mimpi, dan berusaha mewujudkan mimpi itu hingga berhasil. Percayalah, saat yang paling menyenangkan adalah saat proses pencapaiannya. Nah berikut ada kumpulan Kata bijak yang akan memotivasi anda menjadi yang terbaik untuk memperoleh mimpimu.<br />\r\n<br />\r\n1. Jangan pernah memotong sesuatu yang dapat dibuka ikatannya.<br />\r\n2. Lihatlah masalah sebagai kesempatan untuk pertumbuhan dan penguasaan diri.<br />\r\n3. Jadilah ahli dalam manajemen waktu.<br />\r\n4. Nilailah keberhasilanmu dengan menggunakan tolok ukur seberapa banyak engkau menikmati kedamaian, kesehatan, dan kasih sayang.<br />\r\n5. Jangan tunda pelaksanaan gagasan (ide-ide) yang baik. Kemungkinan ada orang lain yang baru saja memikirkannya juga. Sukses datang kepada orang yang bertindak terlebih dahulu.<br />\r\n6. Berhati-hatilah terhadap orang yang mengatakan kepadamu betapa ia itu jujur.<br />\r\n7. Ingatlah bahwa pemenang melakukan apa yang tidak mau dilakukan oleh pecundang.<br />\r\n8. Carilah peluang, bukan rasa aman. Kapal di pelabuhan memang aman, tetapi pada waktunya bagian bawahnya akan rusak berkarat.<br />\r\n9. Jalanilah hidupmu sedemikian rupa sehingga tulisan di batu nisanmu dapat berbunyi: &ldquo;Tidak Ada Penyesalan&rdquo;.<br />\r\n10. Usahakan mencapai keunggulan, bukan kesempurnaan.<br />\r\n11. Beri orang kesempatan kedua, tetapi jangan kesempatan ketiga.<br />\r\n12. Belajarlah mengenali hal-hal yang tidak berkaitan, kemudian abaikan!<br />\r\n13. Jangan lupa, kebutuhan emosional terbesar seseorang adalah untuk merasa dihargai.<br />\r\n14. Habiskan lebih sedikit waktu untuk membahas siapa yang benar, dan lebih banyak waktu untuk membahas apa yang benar!<br />\r\n15. Pekerjakan orang yang lebih pandai darimu.<br />\r\n16. Jangan membakar jembatan, engkau akan heran betapa sering engkau harus menyeberangi sungai yang sama.<br />\r\n17. Jagalah agar ekspektasi (harapan-harapan) tetap tinggi.<br />\r\n18. Jangan gunakan waktu dan/atau kata dengan ceroboh, keduanya tidak dapat diperoleh kembali.<br />\r\n19. Jadilah orang yang berani dan tabah! Sewaktu mengingat kembali kehidupan yang telah lewat, engkau akan lebih menyesali hal-hal yang tidak dilakukan, daripada hal-hal yang telah dilakukan pada masa lalu.<br />\r\n20. Evaluasi prestasimu berdasarkan standarmu sendiri, bukan standar orang lain.<br />\r\n21. Berusahalah untuk tetap hidup lebih berarti, dari pada hidup lebih lama.<br />\r\n22. Jadilah orang yang tegas, walaupun itu berarti engkau kadang-kadang keliru.<br />\r\n23. Tentukanlah sikapmu, jangan biarkan orang lain menentukannya untukmu.<br />\r\n24. Lupakan Panitia! Gagasan baru yang mengubah dunia selalu datang dari satu orang yang mau bekerja sama dengan orang lain, bukan melalui upacara-upacara!<br />\r\n25. Berikanlah upah yang sama untuk pekerjaan yang sama, tanpa memandang hal-hal yang lain.<br />\r\n26. Jangan biarkan hartamu memilikimu!<br />\r\n27. Jagalah reputasimu! Reputasi adalah modal yang paling berharga.<br />\r\n28. Perbaiki prestasimu melalui memperbaiki sikap dan kemampuanmu.<br />\r\n29. Kerjakan dengan benar pada kesempatan pertama.<br />\r\n30. Jangan pernah meremehkan kekuatan kata atau perbuatan yang baik.<br />\r\n31. Jangan takut untuk mengatakan: &ldquo;Saya tidak tahu&rdquo;, &ldquo;Maafkan Saya&rdquo;, &ldquo;Saya yang membuat kesalahan itu&rdquo;, &ldquo;Saya memerlukan bantuan Anda&rdquo;.<br />\r\n32. Pikiranmu hanya dapat menyimpan satu pikiran pada satu kesempatan, oleh karena itu jadikanlah itu pikiran yang positif dan konstruktif.<br />\r\n33. Jangan pernah mencabut/mematikan harapan seseorang, mungkin hanya itulah yang dimilikinya!<br />\r\n34. Sesudah bekerja keras untuk mendapatkan apa yang engkau inginkan, luangkanlah waktu untuk menikmatinya!\r\n', '2016-08-07', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_orders` int(5) NOT NULL AUTO_INCREMENT,
  `status_order` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'Baru',
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `id_kustomer` int(5) NOT NULL,
  PRIMARY KEY (`id_orders`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_orders`, `status_order`, `tgl_order`, `jam_order`, `id_kustomer`) VALUES
(1, 'Baru', '2011-05-28', '11:52:25', 1),
(2, 'Baru', '2015-12-20', '15:06:37', 2),
(3, 'Baru', '2017-02-14', '16:58:52', 3),
(4, 'Lunas', '2017-02-14', '17:01:44', 3),
(5, 'Baru', '2017-02-15', '05:07:12', 3),
(6, 'Baru', '2017-02-16', '13:47:31', 3),
(7, 'Baru', '2017-02-16', '13:49:42', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_detail`
--

CREATE TABLE IF NOT EXISTS `orders_detail` (
  `id_orders` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders`, `id_produk`, `jumlah`) VALUES
(1, 23, 1),
(1, 25, 2),
(2, 24, 1),
(3, 25, 3),
(4, 17, 1),
(4, 24, 1),
(5, 25, 2),
(6, 25, 1),
(7, 17, 1),
(7, 18, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_temp`
--

CREATE TABLE IF NOT EXISTS `orders_temp` (
  `id_orders_temp` int(5) NOT NULL AUTO_INCREMENT,
  `id_produk` int(5) NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_order_temp` date NOT NULL,
  `jam_order_temp` time NOT NULL,
  `stok_temp` int(5) NOT NULL,
  PRIMARY KEY (`id_orders_temp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=151 ;

--
-- Dumping data untuk tabel `orders_temp`
--

INSERT INTO `orders_temp` (`id_orders_temp`, `id_produk`, `id_session`, `jumlah`, `tgl_order_temp`, `jam_order_temp`, `stok_temp`) VALUES
(141, 24, 'kltveiv9st6famkl1jhscgil34', 10, '2017-02-15', '05:09:18', 14),
(142, 25, 'kltveiv9st6famkl1jhscgil34', 2, '2017-02-15', '05:09:28', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(150) NOT NULL,
  `pesan` text NOT NULL,
  `tgl` date NOT NULL,
  `status` enum('D','R') NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`no`, `nama`, `email`, `subjek`, `pesan`, `tgl`, `status`) VALUES
(1, 'abdul', 'hamyd.abdul6@gmail.com', 'Tes subjek', 'Pelayanan yang diberikan memuaskan hgsdchwgvuwveuywfvwyufywtdfvwfuwvcwgcw', '2016-08-05', 'R'),
(2, 'hamid', 'hamyd.abdul6@gmail.com', 'Tes subjek', 'layanan anda baik', '2016-08-05', 'R'),
(3, 'abdul hamid', 'abdul32@yahoo.com', 'Tes Email', 'Pelayanan anda memuaskan', '2016-08-05', 'R'),
(4, 'abdul', 'abdul32@yahoo.com', 'Tes Email', 'Pelayanan anda oke', '2016-08-05', 'R'),
(6, 'Endra Setiawan', 'setiaendra18@gmail.com', 'Coba Testimoni', 'sjfjasdkfkasdfd', '2016-08-08', 'R'),
(8, 'Zada media', 'hamyd.abdul6@gmail.com', 'Pesan ke central laundry', 'Selamat atas launchingnya web bapak.', '2016-09-04', 'R'),
(9, 'abdul', 'hamyd.abdul6@gmail.com', 'Tes subjek', 'Selamat atas launchingnya web bapak.', '2016-09-04', 'R'),
(13, 'asdf', 'arfea', 'arfafe', 'dthdrhyfj', '2017-02-21', 'D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `produk_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `deskripsi` text COLLATE latin1_general_ci NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibeli` int(5) NOT NULL DEFAULT '1',
  `diskon` int(5) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `produk_seo`, `deskripsi`, `harga`, `stok`, `tgl_masuk`, `gambar`, `dibeli`, `diskon`) VALUES
('14', 4, 'Motorola RAZR V3m Red', 'motorola-razr-v3m-red', 'The Motorola Red RAZR V3m for Sprint combines powerful technology and chic style with social activism in a cell phone that makes a strong statement to the world.<br />\r\nFeatures: Bluetooth Wireless Technology, 1.3 Megapixel Digital Camera Takes Print-quality Stills or Video Clips, Less Than 1/2-inch Thick With Feather-touch Precision Crafted Keypad,&nbsp; Built-in Music Player With Removable, Expandable Memory Card Slot, Stunning Red Shell Is Made From Aircraft-grade Aluminum, Motorola Will Contribute A Portion Of The Red Razr Proceeds To Help Fight Aids In Africa, Watch On-demand Sprint TV or Listen To Streaming Music With Sprint Music Store.<br />\r\n', 2500000, 24, '2009-05-25', '9motorola_razr.jpg', 28, 0),
('15', 5, 'LG Chocolate VX8550 Blue', 'lg-chocolate-vx8550-blue', 'The LG Chocolate VX8550 for Verizon Wireless - now available with a chic &quot;blue ice&quot; color scheme - is the first Verizon Wireless phone with a soft-touch keypad, external graphic equalizer, streaming or downloadable music from VCAST, and the capability to transfer music to and from your PC (USB cable required).<br />\r\n<br />\r\nFeatures:<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; * Advanced Voice Dialing Lets Your Operate Your Phone Without Pre-training<br />\r\n&nbsp;&nbsp;&nbsp; * 1.3 Megapixel Camera Takes Print-quality Photo And Hour-long Video Clips<br />\r\n&nbsp;&nbsp;&nbsp; * High-speed Data Downloads Let You Watch TV Or Listen To Streaming Music<br />\r\n&nbsp;&nbsp;&nbsp; * First Phone To Play Either Downloaded V CAST Music or PC-transferred Music Files<br />\r\n&nbsp;&nbsp;&nbsp; * Stylish Slider Design With Soft-touch External Controls<br />\r\n&nbsp;&nbsp;&nbsp; * Huge, Vibrant Color Display<br />\r\n&nbsp;&nbsp;&nbsp; * Wirelessly Stream Music To A Stereo Bluetooth Headset\r\n', 3450000, 43, '2009-06-02', '39lg_vx8550.jpg', 16, 0),
('16', 7, 'Samsung FlipShot SCH-U900', 'samsung-flipshot-schu900', 'The Samsung U900 for Verizon Wireless is the update to the flagship Samsung A990. Features: Advanced Voice Activated Dialing Requires No Phone Pre-training, Advanced Bluetooth Wireless Technology With Streaming Stereo Music Support, Huge Color Main Display and Color External Display, Built-in Music Player Lets You Download From V CAST Music Service, One of the Best Digital Camera/Camcorders In A Mobile Phone Today, Next Generation (EV-DO) Technology Gives You Downloads At Near-Broadband Speeds, Watch On-demand TV or Listen to Music Via Verizon V CAST, Take Extra-long Video Clips With Very Good Resolution.\r\n', 4500000, 28, '2009-06-02', '21samsung_u900.jpg', 38, 0),
('18', 3, 'Sony Ericsson W200i', 'sony-ericsson-w200i', 'The Sony Ericsson specially Phone for Walkman - now available with a chic &quot;blue ice&quot; color scheme - is the first Verizon Wireless phone with a soft-touch keypad, external graphic equalizer, streaming or downloadable music from VCAST, and the capability to transfer music to and from your PC (USB cable required).<br />\r\n<br />\r\nFeatures:<br />\r\n<br />\r\n    * Advanced Voice Dialing Lets Your Operate Your Phone Without Pre-training<br />\r\n    * 1.3 Megapixel Camera Takes Print-quality Photo And Hour-long Video Clips<br />\r\n    * High-speed Data Downloads Let You Watch TV Or Listen To Streaming Music<br />\r\n    * First Phone To Play Either Downloaded V CAST Music or PC-transferred Music Files<br />\r\n    * Stylish Slider Design With Soft-touch External Controls<br />\r\n    * Huge, Vibrant Color Display<br />\r\n    * Wirelessly Stream Music To A Stereo Bluetooth Headset<br />\r\n', 1100000, 44, '2009-09-28', '36se_w200i.jpg', 16, 20),
('17', 3, 'Sony Ericsson W880', 'sony-ericsson-w880', 'The Sony Ericsson w880 specially Phone for Walkman and Business - now available with a chic &quot;blue ice&quot; color scheme - is the first Verizon Wireless phone with a soft-touch keypad, external graphic equalizer, streaming or downloadable music from VCAST, and the capability to transfer music to and from your PC (USB cable required).<br />\r\n<br />\r\nFeatures:<br />\r\n<br />\r\n    * Advanced Voice Dialing Lets Your Operate Your Phone Without Pre-training<br />\r\n    * 1.3 Megapixel Camera Takes Print-quality Photo And Hour-long Video Clips<br />\r\n    * High-speed Data Downloads Let You Watch TV Or Listen To Streaming Music<br />\r\n    * First Phone To Play Either Downloaded V CAST Music or PC-transferred Music Files<br />\r\n    * Stylish Slider Design With Soft-touch External Controls<br />\r\n    * Huge, Vibrant Color Display<br />\r\n    * Wirelessly Stream Music To A Stereo Bluetooth Headset<br />\r\n', 2800000, 34, '2009-09-28', '97se_w880.jpg', 15, 10),
('19', 3, 'Sony Ericsson w910', 'sony-ericsson-w910', 'The Sony Ericsson w910 specially Phone for Walkman and Business - now\r\navailable with a chic &quot;blue ice&quot; color scheme - is the first Verizon\r\nWireless phone with a soft-touch keypad, external graphic equalizer,\r\nstreaming or downloadable music from VCAST, and the capability to\r\ntransfer music to and from your PC (USB cable required).<br />\r\n<br />\r\nFeatures:<br />\r\n<br />\r\n    * Advanced Voice Dialing Lets Your Operate Your Phone Without Pre-training<br />\r\n    * 1.3 Megapixel Camera Takes Print-quality Photo And Hour-long Video Clips<br />\r\n    * High-speed Data Downloads Let You Watch TV Or Listen To Streaming Music<br />\r\n    * First Phone To Play Either Downloaded V CAST Music or PC-transferred Music Files<br />\r\n    * Stylish Slider Design With Soft-touch External Controls<br />\r\n    * Huge, Vibrant Color Display<br />\r\n    * Wirelessly Stream Music To A Stereo Bluetooth Headset\r\n', 2500000, 0, '2009-12-25', '12se_w910.jpg', 22, 0),
('23', 6, 'Blackberry 8820', 'blackberry-8820', '<p>\r\nResearch In Motion memperkenalkan BlackBerry terbaru yang mampu sediakan akses suara dan data nirkabel melalui jaringan seluler dan Wi-Fi. Presiden dan Co-CEO RIM, Mike Lazaridis, menyebutkan perhatian chief executive Apple Inc., Steve Jobs, dan produk iPhone Apple yang telah membawa keuntungan bagi RIM.\r\n</p>\r\n<p>\r\nBlackBerry baru ini bertajuk 8820 dan merupakan smartphone blackberry pertama yang memiliki kemampuan dual mode dengan desain tipis dan full keyboard. Push email RIM juga memungkinkan pelanggan untuk mengakses surat elektronik mereka langsung ke perangkat secara realtime.\r\n</p>\r\n<p>\r\n8820 juga dilengkapi dengan navigasi satelit GPS, hiburan multimedia musik dan video. Sayangnya kemunculan RIM baru mencakup Amerika saja dengan kerja sama operator AT&amp;T. \r\n</p>\r\n', 3000000, 20, '2011-05-27', '35blackberry-8820.jpg', 1, 10),
('24', 2, 'Iphone 3GS', 'iphone-3gs', '<p>\r\nThe iPhone 3GS is the third generation of iPhone designed and marketed by Apple Inc. It was introduced on June 8, 2009 at the WWDC 2009 which took place at the Moscone Center, San Francisco.\r\n</p>\r\n<p>\r\nIts features primarily consist of faster performance, a camera with higher resolution and video capability, voice control,[7] and support for 7.2 Mbit/s HSDPA downloading (but remains limited to 384 kbps uploading as Apple had not implemented the HSUPA protocol).[8] It was released in the U.S., Canada and six European countries on June 19, 2009,[2] in Australia and Japan on June 26, and internationally in July and August 2009.\r\n</p>\r\n<p>\r\nThe iPhone 3GS runs Apple&#39;s iOS operating system, as is used on the iPad and the iPod touch. It is primarily controlled by a user&#39;s fingertips on a multi-touch display.\r\n</p>\r\n', 4000000, 14, '2011-05-27', '73iPhone_3GS.jpg', 2, 10),
('25', 3, 'Sony Ericsson C903', 'sony-ericsson-c903', '<p>\r\nJadilah pembidik jitu dengan kamera 5 megapiksel mengesankan dari Sony Ericsson C903 Cyber-shot&trade;. Dengan deteksi wajah, lampu kilat foto yang cerah dan teknologi khas kami, Smile Shutter&trade;, Anda tidak lagi akan meluputkan bidikan sempurna dengan telepon kamera yang gaya ini.\r\n</p>\r\n<p>\r\nGunakan aGPS untuk menemukan arah dan tandai foto Anda menurut tempat pengambilannya. Aktifkan kamera dan nikmati kemampuan layanan berbasis lokasi pada telepon Anda. Mengambil gambar di mana saja dan memberi label informasi tentang lokasi Anda.\r\n</p>\r\n', 2500000, 5, '2011-05-28', '12se_c903.jpg', 1, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kSlide` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`no`, `kSlide`, `image`) VALUES
(1, 'slider1', 'main-slider1.jpg'),
(2, 'slider2', 'main-slider2.jpg'),
(3, 'slider3', 'main-slider3.jpg'),
(4, 'slider4', 'main-slider4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('127.0.0.2', '2009-09-11', 1, '1252681630'),
('127.0.0.1', '2009-09-11', 17, '1252734209'),
('127.0.0.3', '2009-09-12', 8, '1252817594'),
('127.0.0.1', '2009-10-24', 8, '1256381921'),
('127.0.0.1', '2009-10-26', 108, '1256620074'),
('127.0.0.1', '2009-10-27', 52, '1256686769'),
('127.0.0.1', '2009-10-28', 124, '1256792223'),
('127.0.0.1', '2009-10-29', 9, '1256828032'),
('127.0.0.1', '2009-10-31', 3, '1257047101'),
('127.0.0.1', '2009-11-01', 85, '1257113554'),
('127.0.0.1', '2009-11-02', 11, '1257207543'),
('127.0.0.1', '2009-11-03', 165, '1257292312'),
('127.0.0.1', '2009-11-04', 59, '1257403499'),
('127.0.0.1', '2009-11-05', 10, '1257433172'),
('127.0.0.1', '2009-11-11', 13, '1258006911'),
('127.0.0.1', '2009-11-12', 10, '1258048069'),
('127.0.0.1', '2009-11-14', 14, '1258222519'),
('127.0.0.1', '2009-11-17', 2, '1258473856'),
('127.0.0.1', '2009-11-19', 16, '1258635469'),
('127.0.0.1', '2009-11-21', 4, '1258863505'),
('127.0.0.1', '2009-11-25', 3, '1259216216'),
('127.0.0.1', '2009-11-26', 1, '1259222467'),
('127.0.0.1', '2009-11-30', 11, '1259651841'),
('127.0.0.1', '2009-12-02', 9, '1259746407'),
('127.0.0.1', '2009-12-03', 17, '1259906128'),
('127.0.0.1', '2009-12-10', 69, '1260423794'),
('127.0.0.1', '2009-12-12', 26, '1260560082'),
('127.0.0.1', '2009-12-11', 5, '1260508621'),
('127.0.0.1', '2009-12-13', 8, '1260716786'),
('127.0.0.1', '2009-12-14', 9, '1260772698'),
('127.0.0.1', '2009-12-15', 9, '1260837158'),
('127.0.0.1', '2009-12-16', 7, '1260905627'),
('127.0.0.1', '2009-12-17', 48, '1261026791'),
('127.0.0.1', '2009-12-18', 11, '1261088534'),
('127.0.0.1', '2009-12-22', 3, '1261477278'),
('127.0.0.1', '2009-12-25', 2, '1261686043'),
('127.0.0.1', '2009-12-26', 29, '1261835507'),
('127.0.0.1', '2009-12-27', 7, '1261920445'),
('127.0.0.1', '2009-12-28', 3, '1261965611'),
('127.0.0.1', '2009-12-29', 21, '1262024011'),
('127.0.0.1', '2009-12-30', 24, '1262146708'),
('127.0.0.1', '2010-01-01', 12, '1262286131'),
('127.0.0.1', '2010-01-03', 38, '1262529325'),
('127.0.0.1', '2010-01-12', 89, '1263264291'),
('127.0.0.1', '2010-01-14', 54, '1263482540'),
('127.0.0.1', '2010-01-15', 57, '1263506901'),
('127.0.0.1', '2010-02-11', 30, '1265831568'),
('127.0.0.1', '2010-02-13', 2, '1266032303'),
('127.0.0.1', '2010-02-14', 3, '1266115347'),
('127.0.0.1', '2010-02-15', 15, '1266195235'),
('127.0.0.1', '2010-02-18', 1, '1266499945'),
('127.0.0.1', '2010-02-22', 5, '1266856332'),
('127.0.0.1', '2010-02-25', 46, '1267103145'),
('127.0.0.1', '2010-05-12', 10, '1273654648'),
('127.0.0.1', '2010-05-16', 195, '1274026185'),
('127.0.0.1', '2010-05-17', 2, '1274029517'),
('127.0.0.1', '2010-05-19', 1, '1274279374'),
('127.0.0.1', '2010-05-27', 16, '1274967085'),
('127.0.0.1', '2010-05-30', 4, '1275192045'),
('127.0.0.1', '2010-05-31', 13, '1275271939'),
('127.0.0.1', '2010-06-05', 1, '1275676869'),
('127.0.0.1', '2010-06-06', 2, '1275842170'),
('127.0.0.1', '2010-06-15', 3, '1276572924'),
('127.0.0.1', '2010-06-22', 206, '1277221605'),
('127.0.0.1', '2010-08-02', 17, '1280754660'),
('127.0.0.1', '2010-08-20', 7, '1282285305'),
('127.0.0.1', '2010-08-30', 21, '1283185430'),
('127.0.0.1', '2010-08-31', 53, '1283207455'),
('127.0.0.1', '2010-09-02', 133, '1283402651'),
('127.0.0.1', '2010-09-05', 35, '1283702206'),
('127.0.0.1', '2010-09-13', 10, '1284370291'),
('127.0.0.1', '2010-09-17', 12, '1284662303'),
('127.0.0.1', '2010-09-22', 2, '1285091212'),
('127.0.0.1', '2010-09-23', 47, '1285254071'),
('127.0.0.1', '2010-09-26', 32, '1285512806'),
('127.0.0.1', '2010-09-27', 51, '1285532379'),
('127.0.0.1', '2010-10-14', 10, '1287074605'),
('127.0.0.1', '2010-10-15', 6, '1287150179'),
('127.0.0.1', '2010-10-16', 2, '1287170167'),
('127.0.0.1', '2010-10-20', 145, '1287636778'),
('127.0.0.1', '2010-10-21', 177, '1287721183'),
('127.0.0.1', '2010-10-22', 63, '1287752692'),
('127.0.0.1', '2011-04-02', 7, '1301680774'),
('127.0.0.1', '2011-04-03', 8, '1301801389'),
('127.0.0.1', '2011-04-05', 16, '1301977471'),
('127.0.0.1', '2011-04-09', 44, '1302288659'),
('127.0.0.1', '2011-04-10', 129, '1302370890'),
('127.0.0.1', '2011-04-11', 34, '1302488765'),
('127.0.0.1', '2011-04-17', 8, '1302998534'),
('127.0.0.1', '2011-04-22', 5, '1303479879'),
('127.0.0.1', '2011-04-23', 36, '1303534207'),
('127.0.0.1', '2011-05-26', 144, '1306423419'),
('127.0.0.1', '2011-05-27', 59, '1306467737'),
('127.0.0.1', '2011-05-28', 57, '1306588828'),
('127.0.0.1', '2011-05-29', 8, '1306649171'),
('127.0.0.1', '2011-05-30', 18, '1306736260'),
('::1', '2015-12-20', 41, '1450620785'),
('::1', '2015-12-21', 23, '1450699723'),
('::1', '2016-01-01', 1, '1451650787'),
('::1', '2016-01-23', 3, '1453563367'),
('::1', '2016-02-07', 1, '1454818440'),
('::1', '2016-04-08', 1, '1460127892'),
('::1', '2016-04-22', 5, '1461328150'),
('::1', '2016-08-08', 1, '1470670464'),
('::1', '2017-02-14', 48, '1487089724'),
('::1', '2017-02-15', 15, '1487131839'),
('::1', '2017-02-16', 71, '1487262861'),
('::1', '2017-02-17', 9, '1487309949');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_menu`
--

CREATE TABLE IF NOT EXISTS `sub_menu` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kd_main` int(2) NOT NULL,
  `nmSub_menu` varchar(20) NOT NULL,
  `link` varchar(30) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `sub_menu`
--

INSERT INTO `sub_menu` (`no`, `kd_main`, `nmSub_menu`, `link`) VALUES
(1, 4, 'Our Laundry Service', 'our-laundry-service.html'),
(7, 4, 'Our Value Added', 'value-added.html'),
(8, 4, 'Laundry', 'laundry.html'),
(9, 4, 'Dry Cleaning', 'dry-cleaning.html'),
(10, 4, 'Pressing', 'pressing.html');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`no`, `nama`, `perusahaan`, `pesan`) VALUES
(1, 'NGUDI PRAYITNO', 'EXECUTIVE HOUSE KEEPER HOTEL GRAND CANDI SEMARANG', 'CENTRAL LAUNDRY memberikan solsi dengan hasil harga & ketepatan waktu sesuai dengan komitmentnya.'),
(2, 'SUGENG', 'EXECUTIVE HOUSE KEEPER HOTEL IBIS SEMARANG', 'Service & Kualitas CENTRAL telah kami rasakan benar-benar berbeda dengan yang lain. Untuk itulah kami kembali mempercayakan semua urusan laundry hotel kepada CENTRAL'),
(3, 'BETA RUDYANTO', 'EXECUTIVE HOUSE KEEPER CIPUTRA HOTEL SEMARANG', 'Kami telah menjalin kerjasama selama selama 8 Tahun dengan CENTRAL LAUNDRY dan sampai saat ini berjalan dengan baik, tepat waktu dengan hasil yang sesuai standar hotel kami.'),
(4, 'NY. LIPURSARI', 'LAUNDRY MANAGER MELIA PUROSANI HOTEL JOGJA', 'Kami mengadalkan CENTRAL LAUNDRY untuk house linen & guest laundry ketika terjadi trouble pada operasional laundry kami.selama ini berjalan dengan baik dan terjada sesuai dengan standar kami.'),
(5, 'R.Aj.LUPITASARI HADIWINOTO', 'CUSTOMER JOGJA', 'Saya selalu mempercayakan & menggunakan CETRAL untuk urusan dry cleaning & laundry.CENTRAL selalu menjadi pilihan utama saya.'),
(6, 'AMERICAN - HOLLAND CRUISE', 'MITRA KERJA', 'Penujukan CENTRAL sebagai tempat pelatihan / Training tenaga ahli laundry untuk hotel & kapal Pesiar Internasional.'),
(7, 'abdul hamid', 'stmik akakom yogyakarta', 'testimoni pertama cahaya slipper'),
(8, 'zada media', 'zada.media.com', 'testimoni kedua cahaya slipper');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
