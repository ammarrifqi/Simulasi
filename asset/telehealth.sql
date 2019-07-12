-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5393
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for telehealth
DROP DATABASE IF EXISTS `telehealth`;
CREATE DATABASE IF NOT EXISTS `telehealth` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `telehealth`;

-- Dumping structure for table telehealth.dokter
DROP TABLE IF EXISTS `dokter`;
CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` text NOT NULL,
  `pendidikan` varchar(40) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `jenis_kl` varchar(20) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table telehealth.dokter: ~3 rows (approximately)
DELETE FROM `dokter`;
/*!40000 ALTER TABLE `dokter` DISABLE KEYS */;
INSERT INTO `dokter` (`id_dokter`, `nama`, `ttl`, `pendidikan`, `kota`, `status`, `jenis_kl`, `img`) VALUES
	('2341', 'Carlo Prawira', 'Padang, 4 Juni 1995', 'FK Universitas Andalas', 'Padang', 'Offline', 'Laki-laki', 'asset/dist/img/user1-128x128.jpg'),
	('25262', 'Dakka A. Munthe', 'Medan, 20 Mei 1985', 'FK Methodist', 'Medan', 'Offline', 'Laki-laki', 'asset/dist/img/user6-128x128.jpg'),
	('3511100116162474', 'Mirzaulin Leonaviri', 'Banjarmasin, 4 Maret 1988', 'Universitas Muhammadiyah Malang', 'Malang', 'Offline', 'Laki-laki', 'asset/dist/img/user8-128x128.jpg');
/*!40000 ALTER TABLE `dokter` ENABLE KEYS */;

-- Dumping structure for table telehealth.file_kesehatan
DROP TABLE IF EXISTS `file_kesehatan`;
CREATE TABLE IF NOT EXISTS `file_kesehatan` (
  `idFile` int(11) NOT NULL AUTO_INCREMENT,
  `pengirim` varchar(20) NOT NULL,
  `penerima` varchar(20) NOT NULL,
  `sesi` varchar(300) NOT NULL,
  `namaFile` varchar(300) NOT NULL,
  `lokasi` text NOT NULL,
  PRIMARY KEY (`idFile`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table telehealth.file_kesehatan: ~0 rows (approximately)
DELETE FROM `file_kesehatan`;
/*!40000 ALTER TABLE `file_kesehatan` DISABLE KEYS */;
INSERT INTO `file_kesehatan` (`idFile`, `pengirim`, `penerima`, `sesi`, `namaFile`, `lokasi`) VALUES
	(1, '135150', '25262', 'sakit perut', 'Jurnal_Telehealth.pdf', 'asset/dist/file/Jurnal_Telehealth.pdf');
/*!40000 ALTER TABLE `file_kesehatan` ENABLE KEYS */;

-- Dumping structure for table telehealth.gejala_penyakit
DROP TABLE IF EXISTS `gejala_penyakit`;
CREATE TABLE IF NOT EXISTS `gejala_penyakit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode` varchar(15) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `gejala` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- Dumping data for table telehealth.gejala_penyakit: ~57 rows (approximately)
DELETE FROM `gejala_penyakit`;
/*!40000 ALTER TABLE `gejala_penyakit` DISABLE KEYS */;
INSERT INTO `gejala_penyakit` (`id`, `kode`, `id_jenis`, `gejala`) VALUES
	(1, 'G01', 1, 'Perut Kembung'),
	(2, 'G02', 1, 'Sakit Pada Ulu Hati'),
	(3, 'G03', 1, 'Sering Merasa Lapar'),
	(4, 'G04', 1, 'Mual dan Muntah'),
	(5, 'G05', 1, 'Nyeri Dibelakang Tulang Dada'),
	(6, 'G06', 1, 'Sendawa'),
	(7, 'G07', 1, 'Rasa Sakit/Tidak Nyaman Pada Perut Bagian Atas'),
	(8, 'G08', 1, 'Perasaan Panas di Dada dan Perut'),
	(9, 'G09', 1, 'Mengeluarkan Gas Asam dari Mulut'),
	(10, 'G10', 1, 'Rasa Tidak Nyaman Saat Menelan'),
	(11, 'G11', 1, 'Rasa Sakit Saat Menelan'),
	(12, 'G12', 1, 'Rasa Nyeri Pada Bagian Dada'),
	(13, 'G13', 1, 'Gangguan Pencernaan'),
	(14, 'G14', 1, 'Batuk'),
	(15, 'G15', 1, 'Rasa Panas Pada Bagian Dada'),
	(16, 'G01', 2, 'Demam tinggi >=38 derajat (2-7hr)'),
	(17, 'G02', 2, 'Sakit Kepala'),
	(18, 'G03', 2, 'Nyeri retro-orbitral (nyeri belakang mata)'),
	(19, 'G04', 2, 'Myalgia (badan terasa pegal-pegal)'),
	(20, 'G05', 2, 'Antralgia (nyeri pada sendi-sendi)'),
	(21, 'G06', 2, 'Kulit Ruam (kemerah-merahan)'),
	(22, 'G07', 2, 'Hilang nafsu makan'),
	(23, 'G08', 2, 'Mual dan muntah'),
	(24, 'G09', 2, 'Badan lemas'),
	(25, 'G10', 2, 'Pendarahan spontan (mimisan, BAB berdarah, kencing berdarah, dll)'),
	(26, 'G11', 2, 'Kegagalan sirkulasi (nadi lemah dan cepat)'),
	(27, 'G12', 2, 'Tekanan darah menurun'),
	(28, 'G13', 2, 'Kulit terasa dingin dan lembab'),
	(29, 'G14', 2, 'Gelisah'),
	(30, 'G15', 2, 'Syok berat'),
	(31, 'G16', 2, 'Nadi tidak teraba'),
	(32, 'G17', 2, 'Tekanan darah tidak teratur'),
	(33, 'G18', 2, 'Berkeringat dan kulit tampak biru'),
	(34, 'G19', 2, 'Uji trombosit < 100.000ul'),
	(35, 'G01', 3, 'Gusi bengkak'),
	(36, 'G02', 3, 'Gusi mengkilap'),
	(37, 'G03', 3, 'Gusi berdarah'),
	(38, 'G04', 3, 'Gusi lunak'),
	(39, 'G05', 3, 'Gusi berwarna merah'),
	(40, 'G06', 3, 'Gigi terasa lepas'),
	(41, 'G07', 3, 'Gigi goyang'),
	(42, 'G08', 3, 'Gigi diketuk sakit'),
	(43, 'G09', 3, 'Gigi berlubang'),
	(44, 'G10', 3, 'Nyeri saat mengunyah'),
	(45, 'G11', 3, 'Demam'),
	(46, 'G12', 3, 'Pembengkakan kelenjar getah bening'),
	(47, 'G13', 3, 'Endapan berwarna kuning-hitam di leher gigi'),
	(48, 'G14', 3, 'Bau mulut'),
	(49, 'G15', 3, 'Sakit saat terkena udara'),
	(50, 'G16', 3, 'Cekot-cekot'),
	(51, 'G17', 3, 'Durasi nyeri terbatas'),
	(52, 'G18', 3, 'Luka dangkal, bulat, simetris'),
	(53, 'G19', 3, 'Luka berwarna putih kemerahan'),
	(54, 'G20', 3, 'Ukuran luka mencapai 2-5cm'),
	(55, 'G21', 3, 'Rasa nyeri seperti terbakar'),
	(56, 'G22', 3, 'Sakit untuk membuka mulut'),
	(57, 'G23', 3, 'Terasa sakit pada gigi bagian belakang');
/*!40000 ALTER TABLE `gejala_penyakit` ENABLE KEYS */;

-- Dumping structure for table telehealth.info_kes_kit
DROP TABLE IF EXISTS `info_kes_kit`;
CREATE TABLE IF NOT EXISTS `info_kes_kit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_info` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table telehealth.info_kes_kit: ~14 rows (approximately)
DELETE FROM `info_kes_kit`;
/*!40000 ALTER TABLE `info_kes_kit` DISABLE KEYS */;
INSERT INTO `info_kes_kit` (`id`, `tipe`, `judul`, `isi_info`, `image`) VALUES
	(1, 'Penyakit', 'Dyspepsia', '<p>Dispepsia merupakan penyakit pada lambung. Dispepsia masuk dalam gangguan pencernaan yang menyerang organ manusia yang cukup vital, yakni lambung dengan menimbulkan rasa nyeri dan rasa sakit pada bagian atas perut. Asal dari kata Dispepsia sendiri muncul dari bahasa Yunani yang mempunyai arti “pencernaan yang jelek”. Dari artiannya sendiri sudah bisa dipastikan bahwa lambung yang mengalami Dispepsia memang memiliki pencernaan yang jelek atau buruk karena manusia yang tidak bisa merawat tubuh sendiri dengan baik dan benar dan serta tidak mampu menjaga kesehatan tubuh.</p>\r\n<p></p>\r\n<p>Dispepsia merupakan kumpulan keluhan/gejala klinis (sindrom) rasa tidak nyaman atau nyeri yang dirasakan di daerah abdomen bagian atas yang disertai dengan keluhan lain yaitu perasaan panas didada dan perut, regurgitasi, kembung, perut terasa penuh, cepat kenyang, sendawa, anoreksia, mual, muntah dan banyak mengeluarkan gas asam dari mulut. Dispepsia masuk dalam salah satu penyakit lambung yang tidak boleh dianggap santai, karena fatal akibatnya bila tidak melakukan pencegahan dengan baik karena Dispepsia masuk dalam kategori penyakit lambung yang kronis dan biasanya bisa bertahan untuk waktu yang lama.</p>\r\n<p></p>\r\n<p>Dispepsia dapat ditangani diantaranya sebagi berikut:</p>\r\n<p>a. Secara Alami</p>\r\n<p>> Meminum perasan kunyit 2 kali sehari (pagi dan malam)</p>\r\n<p>> Meminum rebusan tanaman lidah buaya yang telah dikupas. Dapat dicampur dengan madu untuk emnghilangkan rasa pahit.</p>\r\n<p>> Meminum bubuk kacang hijau yang telah dijemur, ditumbuk, dan disangrai dan dicampurkan dengan air hangat dengan takaran 1 sendok makan bubuk kacang hijau</p>\r\n<p>> Meminum susu kambing secara rutin dengan takaran 200 ml tiap kali minum</p>\r\n<p>b. Secara Medis</p>\r\n<p>> Pemberian obat-obatan seperti parasetamol, obat ini sangat dipercaya ampuh dalam mengobati penyakit dispepsia, sebab obat parasetamol tidak akan membuat lambung anda menjadi rusak atau terganggu</p>\r\n<p>>Mengkonsumsi salah satu jenis obat ini (antasida, ranitidin, lansoprazole dan omeprazole). Namun apabila penyaklit ini dibarengi dengan adanya infeksi lambung, maka dalam pengobatannya harus dibarengi dengan obat yang bersifat antibiotik.</p>\r\n\r\n', 'asset/dist/img/info/dispepsia.jpg'),
	(13, 'Penyakit', 'Maag (Gastritis)', '<p>Gastritis merupakan penyakit yang ada pada lambung yang disebabkan oleh adanya suatu peradangan. Gastritis, sama hanya dengan Dispepsia di ambil dari bahasa Yunani yang mengandung arti gastro untuk “perut atau lambung” dan itis untuk “inflamasi atau peradangan”. Gastritis yang mengalami inflamasi sama halnya juga dengan Maag yang mengalami inflamasi dari mukosa lambung sehingga gejala atau tanda dari Gastritis hampir menyerupai Maag.<br></p><br><p>Gejala yang biasanya dirasakan oleh penyakit ini adalah berupa rasa sakit yang dirasakan di area perut, mulas karena pola makan yang salah atau tidak sesuai dengan jadwal makan seperti biasanya, kelebihan asam lambung yang disebabkan oleh dinding asam lambung yang tidak mampu menahan asam lambung sehingga timbul rasa sakit yang dirasakan di lambung. Namun, pada beberapa kasus selain karena kelebihan asam lambung, Gastritis juga dapat menyebabkan borok (ulcer), radang, dan juga rasa teriris serta nyeri pada ulu hati. Pada hakekatnya, lambung mempelajari “pola kebiasaan makan” pada seseorang. Maksudnya adalah ketika seseorang sudah memiliki rutinitas sendiri pada saat dia mengonsumsi asupan makan pada jam – jam tertentu, disitu lambung juga “menyesuaikan diri” dengan waktu yang telah dibiasakan. Namun, apabila pola kita berubah atau tidak sesuai seperti biasanya, maka lambung tetap memproduksi asam lambung yang digunakan untuk mencerna makanan seperti biasanya. Jika tidak ada asupan makanan, maka asam lambung akan berlebihan dan hal itu mengakibatkan rasa mual dan perih dalam lambung karena lambung yang terus memproduksi asam lambung.<br></p><br><p>Maag dapat ditangani dengan beberapa cara seperti berikut:</p><p>a. Secara alami</p><p></p><p></p><ul><li>Meminum seduhan biji kedealai yang telah disangrai</li><li>Meminum seduhan biji pepaya yang telah dikeringkan</li><li>Meminum air rebusan dari daun jambu biji setiap pagi dan malam hari&nbsp;&nbsp;<br></li></ul><br>b. Secara medis<p></p><p></p><ul><li>Meminum obat Simetidin, Antasida, Proton pump inhibitor, Pankreatin, Ranitidin, atau Cytoprotective Agent</li></ul><p></p><p></p>', 'asset/dist/img/maag2.jpg'),
	(14, 'Penyakit', 'Gastro-Esophageal Reflux Disease (GERD)', '<p>GERD atau Gastro-Esophageal Reflux Disease merupakan salah satu penyakit lambung yang disebabkan oleh banyak factor karena asam lambung yang menuju ke esophagus dan menimbulkan rasa perih pada ulu hati. Keluhan yang sering dirasakan oleh penderita GERD adalah rasa nyeri pada tulang dada diarea belakang yang menjalar ke tenggorokan, regurgitasi (rasa asam di lidah), dan keluhan tipikal rasa nyeri di dada, perubahan suara jadi serak, dan asma (tidak semua) .<br></p><p>Pada umumnya, penyakit ini cukup tinggi di negara – negara maju. Faktor – faktor yang menyebabkan antara lain seperti cara hidup yang tidak sehat seperti merokok dan alcohol. Selain itu juga factor lainnya seperti tindakan bedah, obesitas, dan lambung yang berada dalam kondisi kosong. GERD pada tiap orang berbeda – beda tergantung situasi dan waktu sebab pada orang normal bisa saja GERD terjadi setelah dalam posisi tegak sewaktu habis makan.<br></p><p>Untuk mengobati penyakit GERD ini dapat dengan mengkonsumsi obat Antasida,&nbsp;&nbsp;cimetidine, famotidine, nizatidine, ranitidine,&nbsp;lansoprazole, omeprazole, atau baclofen</p>', 'asset/dist/img/gerd.jpg'),
	(15, 'Kesehatan', 'Gaya Hidup Sehat', '<p>Menjalani hidup sehat tidaklah susah. Hidup sehat dapat dimulai dengan hal-hal kecil seperti pola makan, makanan dan minuman yang dikonsumsi, dan banyak lainnya. Terdapat beberapa gaya hidup sehat, seperti:</p><p></p><ul><li><strong>Konsumsi Air Putih</strong></li></ul><p>Sebagian besar dari kita memiliki kebiasaan kurang memiliki asupan air perharinya. Padahal air sangat penting bagi tubuh manusia, tubuh akan kehilangan air saat kita buang air kecil, buang air besar, keringatan hingga pernapanasan. Itu sebabnya mengapa kita harus memiliki asupan air yang cukup. Konsumsi setidaknya 8 gelas air perhari untuk memenuhi kebutuhan cairan dalam tubuh.<br>?Terlebih jika kamu memiliki tanda-tanda bibir kering, mulut kering, buang air kecil sedikit dan urine berwarna agak kuning atau lebih kuning dari biasanya segera minum air, karena itu merupakan tanda bahwa tubuh mengalami kekurangan cairan<br></p><p></p><ul><li><strong>Istirahat yang cukup</strong>&nbsp;<br></li></ul><p></p><p>Kamu harus mengetahui bahwa istirahat yang cukup merupakan gaya hidup sehat yang bagus untuk di contoh. Selain penting untuk kesehatan, istirahat yang cukup juga akan berpengaruh pada kulit, khususnya wanita. Begadang sangat tidak baik apalagi jika sudah dijadikan sebagai kebiasaan. Begadang akan sangat memengaruhi kulit wajah sehingga tak jarang jika banyak bermunculan keriput di wajah. Para ahli juga merekomendasikan untuk bisa memiliki kualitas tidur yang baik karena dapat mencegah penuaan dini.</p><p></p><strong><ul><li><strong>Olahraga</strong>&nbsp;<br></li></ul></strong><p></p><p>Ini tidak kalah pentingnya bagi kesehatan. Gaya hidup dan kebiasaan sering melakukan olahraga 30 menit di pagi hari memiliki manfaat luar biasa bagi tubuh. Namun, jangan lakukan olahraga dengan cara terpaksa karena dapat menimbulkan penderitaan yang akhirnya membuat kamu malas untuk melakukannya.<br>?Selain itu, kamu juga harus memberikan tubuh untuk lebih banyak menikmati olahraga yang menyenangkan seperti basket, sepak bola, renang, badminton atau bahkan voli. Karena jika hanya jogging saja, lama kelamaan kamu akan merasa bosan dan penat.</p><p></p><ul><li><strong>Konsumsi lebih banyak buah-buahan</strong></li></ul>Makan lebih banyak buah dan kurangi vitamin sintetis. Banyak sekali buah-buahan yang bisa kamu nikmati dengan rasa yang lezat dan menenangkan. Bahkan, jika perlu kamu bisa menambahkan beberapa sayuran. Para ahli menyarankan bahwa kita setidaknya harus mengkonsumsi 5-9 porsi sayuran setiap harinya. <br>', 'asset/dist/img/hidup_sehat.jpg'),
	(16, 'Penyakit', 'Demam Berdarah Dengue (DBD)', '<p>Penyakit demam berdarah dengue (DBD) adalah penyakit yang disebabkan oleh virus dengue I, II, III, dan IV yang ditularkan oleh nyamuk Aedes aegypti dan Aedes albopictus. Penyakit ini sering menyerang anak, remaja, dan dewasa yang ditandai dengan demam, nyeri otot dan sendi. Demam Berdarah Dengue sering disebut pula Dengue Haemoragic Fever ( DHF ).</p><p>WHO, 1986 mengklasifikasikan DHF menurut derajat penyakitnya menjadi 4 golongan, yaitu :</p><p></p><ul><li>DBD Derajat 1<br></li></ul>Demam disertai gejala klinis lain, tanpa perdarahan spontan. Panas 2-7 hari, Uji tourniquet positif, trombositipenia, dan hemokonsentrasi.<p></p><p></p><ul><li>DBD Derajat 2&nbsp;<br></li></ul><p></p><p>Sama dengan derajat I, ditambah dengan gejala-gejala perdarahan spontan seperti petekie, ekimosis, hematemesis, melena, perdarahan gusi.</p><p></p><ul><li>DBD Derajat 3<br></li></ul><p></p><p>Ditandai oleh gejala kegagalan peredaran darah seperti nadi lemah dan cepat (&gt;120x/mnt ) tekanan nadi sempit ( ? 120 mmHg ), tekanan darah menurun, (120/80 ? 120/100 ? 120/110 ? 90/70 ? 80/70 ? 80/0 ? 0/0 )</p><p></p><ul><li>DBD Derajat 4&nbsp;<br></li></ul><p></p><p>Nadi tidak teraba, tekanan darah tidak teatur (denyut jantung ? 140x/mnt) anggota gerak teraba dingin, berkeringat dan kulit tampak biru.</p><p><b>Penatalaksanaan</b></p><p></p><ul><li>Penatalaksana demam berdarah dengue (pada anak)<br></li></ul>&gt; Adakah tanda kedaruratan, yaitu tanda syok (gelisah, nafas cepat, bibir biru, tangan dan kaki dingin, kulit lembab), muntah terus-menerus, kejang, kesadaran menurun, muntah darah, tinja darah, maka pasien perlu dirawat / dirujuk.<br>&gt; Apabila tidak dijumpai tanda kedaruratan, periksa uji Tourniquet dan hitung trombosit bila uji Tourniquet positif dan jumlah trombosit 100.000/•l, penderita dirawat / dirujuk, sedangkan bila uji Tourniquet negatif dengan trombosit &gt; 100.000/•l atau normal, pasien boleh pulang dengan pesan untuk datang kembali setiap hari sampai suhu turun.<br>&gt; Pasien dianjurkan minum banyak, seperti: air teh, susu, sirup, oralit, jus buah dan lain-lain.<br>&gt; Berikan obat antipiretik golongan parasetamol jangan golongan salisilat.<br>&gt; Apabila selama di rumah demam tidak turun pada hari sakit ketiga, evaluasi tanda klinis adakah tanda-tanda syok, yaitu anak menjadi gelisah, ujung kaki / tangan dingin, sakit perut, tinja hitam, kencing berkurang; bila perlu periksa Hb, Ht dan trombosit.<br>&gt; Apabila terdapat tanda syok atau terdapat peningkatan Ht dan / atau penurunan trombosit, segera rujuk ke rumah sakit.<p></p><p></p><ul><li>Penatalaksanaan demam berdarah dengue (pada dewasa)<br></li></ul>&gt; Pasien yang dicurigai menderita DBD dengan hasil Hb, Ht dan trombosit dalam batas nomal dapat dipulangkan dengan anjuran kembali kontrol dalam waktu 24 jam berikutnya<br>&gt; Bila keadaan pasien memburuk agar segera kembali ke puskesmas atau fasilitas kesehatan lainnya.<br>&gt; Sedangkan pada kasus yang meragukan indikasi rawatnya, maka untuk sementara pasien tetap diobservasi dengan anjuran minum yang banyak, serta diberikan infus ringer laktat sebanyak 500cc dalam 4 jam. Setelah itu dilakukan pemeriksaan ulang Hb, Ht dan trombosit.<br><p></p><br /><br /><br><p></p>', 'asset/dist/img/dengue-fever.png'),
	(17, 'Kesehatan', 'Pentingnya Sarapan', '<p>Sarapan merupakan aktivitas awal yang biasa dilakukan manusia dimana sarapan berguna untuk memberikan tenaga bagi manusia untuk menjalankan aktivitas-aktivitas selanjutnya. Namun, tidak sedikit pula yang menyepelekan dan meninggalkan sarapan pada pagi hari. Sarapan dapat membantu seseorang untuk mencapai berat badan idealnya. Berikut ini merupakan beberapa alasan mengapa sarapan sangat amat penting bagi manusia yaitu:</p><p></p><ul><li>Menurunkun risiko penyakit berbahaya</li><li>Terhindar dari risiko obesitas</li><li>Menurunkan kemampuan kognitif</li><li>Menurunkan risiko diabetes</li><li>Tulang sehat dan kuat</li></ul><p></p>', 'asset/dist/img/sarapan.jpg'),
	(18, 'Kesehatan', 'Makanan Sehat dan Bergizi', '<p>Makanan yang bergizi dan mengandung berbagai nutrisi yang dibutuhkan tubuh sangat sulit untuk dipilih. Terkadang kita memakan makanan yang mengandung nutrisi yang hanya bermanfaat untuk salah satu organ tubuh saja. Hal itu kurang baik bagi kesehatan, karena organ tubuh yang lain juga membutuhkan asipan nutrisi, sehingga penting sekali jika kita harus pandai memilih makanan yang bermanfaat untuk semua organ yang ada pada tubuh kita.<br></p><p>Beriku ini jenis makanan sehat dan bergizi yang baik untuk kesehatan tubuh kita diantaranya :</p><p>&nbsp;1. Beras merah<br>Kandungan nutrisi dan serta yang ada pada beras merah sangat baik untuk penderita diabetes serta beras merah juga baik untuk mencegah datangnya gejala penyakit diabetes.<br><br>2. Brokoli<br>Jenis sayuran brokoli sangat banyak manfaatnya, terutama untuk mencegah berbagai penyakit. Antara lain penyakit jantung, kanker, tulang keropos, stroke dan masih banyak lagi. Hal tersebut dikarenakan brokoli mempunyai kandungan antioksidan, mineral, kalium, kalsium, zat besi, mineral, vitamin C, B, E, K dan beta karoten. Sehingga sangat baik bagi kesehatan.<br><br>3. Bayam<br>Sayuran bayam mempunyai fungsi untuk menghaluskan kulit, menghambat enzim tirosinase, menjaga setamina otot, memperbaiki kerja insulin, pembekuan darah yang benar dan masih banyak lagi.<br><br>4. Teh hitam<br>Kandungan pada teh hitam sangat banyak manfaatnya, antara lain meningkatkan daya tahan tubuh, mencegah kanker, anti peradangan, mengobati jantung dan penyakit diabetes.<br><br>5. Ikan salmon<br>Kandungan omega 3 pada ikan salmon mampu untuk mnurunkan resiko kanker, memerangi penyakit jantung, mengobati mata kering dan melindungi sendi.<br><br>6. Yoghurt<br>Manfaat yoghurt dapat melancarkan pencernaan seperti diare dan mampu mengobati kondisi pencernaan, antara lain penyakit usus, kanker usus besar selain itu juga mampu untuk mengatur tekanan darah dan mencegah osteoporosis. Hal tersebut dikarenakan kandungan bakteri baik yang ada pada yoghurt.<br><br>7. Alpukat<br>Kandungan pada alpukat mampu untuk mencegah penyakit jantung, kanker, dan masalah mata. Karena alpukat mempunyai lemak tak jenuh dan kaya akan vitamin.<br><br>8. Telur<br>Telur kaya akan protein, vitamin dan mineral yang bermanfaat untuk meningkatkan konsentrasi, memperkuat pengelihatan, menjaga berat badan, mengembangkan otak dan dapat mencegah gejala kanker payudara.<br></p>', 'asset/dist/img/makanan_bergizi.jpg'),
	(19, 'Penyakit', 'Radang Gusi (Gingivitis)', '<p>Radang gusi atau gingivitis adalah inflamasi atau peradangan yang terjadi pada gusi. Radang gusi jarang menyebabkan rasa sakit sehingga sering kali tidak disadari oleh penderitanya.&nbsp;Sebagian besar kasus radang gusi, termasuk yang tingkat keparahannya ringan atau sedang, sebaiknya diobati sesegera mungkin. Radang gusi yang dibiarkan begitu saja berpotensi berkembang menjadi periodontitis, yaitu inflamasi pada jaringan pengikat di dalam gusi dan pada tulang di sekitar gigi, yang umumnya berujung pada gigi tanggal.&nbsp;<br></p><p><b>Penyebab Radang Gusi</b></p><p><b></b>Penyebab utama radang gusi atau gingivitis adalah penumpukan plak. Plak terbentuk dari kumpulan bakteri dan sisa-sisa makanan yang menempel pada permukaan gigi. Lapisan tidak kasat mata tersebut biasanya akan hilang dengan menyikat gigi. Tetapi jika dibiarkan menempel di gigi, plak dapat mengeras dan membentuk karang gigi yang hanya bisa dibersihkan oleh dokter gigi. Karang gigi ini memiliki lapisan luar yang lebih tebal, sehingga kuman di dalamnya akan terlindungi dan semakin berkembang biak. Kuman inilah yang akan mengiritasi lapisan gusi dan menyebabkan radang gusi.<b><br></b></p><p><b>Pengobatan Radang Gusi</b></p><p>Apabila penyebab radang gusi adalah plak atau karang gigi, dokter akan menanganinya sesegera mungkin untuk mencegah komplikasi. Langkah ini umumnya dilakukan dengan membersihkan plak dan karang gigi secara seksama. Jika ada gigi pasien yang berlubang atau gigi palsu yang rusak, dokter akan melakukan penambalan serta perbaikan agar kesehatan mulut bisa tetap terjaga. Proses pemeriksaan kesehatan mulut dan pembersihan gigi secara rutin juga dianjurkan.<br><br>Di samping penanganan medis, pasien dapat melakukan beberapa langkah sederhana untuk membantu proses pemulihan. Beberapa di antaranya meliputi:<br></p><ul><li>Menyikat gigi setidaknya 2 kali sehari, terutama pagi hari setelah bangun tidur dan malam hari sebelum tidur.</li><li>Menggunakan sikat gigi yang lembut dan menggantinya dengan yang baru tiap 12-16 minggu.</li><li>Menggunakan obat kumur yang mengandung antibakteri jika dianjurkan dokter.</li><li>Membersihkan sela-sela gigi dengan benang gigi atau tusuk gigi. setidaknya satu kali sehari.</li><li>Tidak merokok atau menggunakan tembakau dalam bentuk apa pun</li></ul><p></p>', 'asset/dist/img/radang_gusi.jpg'),
	(20, 'Penyakit', 'Radang Jaringan Penyangga Gigi (Periodontitis)', '<p>Periodontitis merupakan infeksi gusi berat yang dapat menyebabkan kerusakan pada jaringan lunak dan tulang penyangga gigi. Kondisi ini tidak boleh dianggap enteng dan harus segera diobati. Selain bisa menyebabkan gigi tanggal, bakteri yang ada di dalam jaringan gusi juga bisa masuk ke aliran darah dan menyerang organ tubuh lainnya, misalnya paru-paru dan jantung. Jika hal ini terjadi, maka komplikasi-komplikasi yang lebih serius bisa dialami oleh penderita periodontitis, seperti rheumatoid arthritis, gangguan pernapasan, stroke, bahkan penyakit jantung koroner.&nbsp;Selain itu, apabila periodontitis diderita oleh ibu hamil, maka bayi yang ada di dalam kandungan berisiko lahir prematur atau memiliki berat badan yang lebih rendah dari rata-rata. Jika periodontitis diderita oleh seorang pengidap diabetes, maka kondisinya tersebut berisiko untuk memburuk.<br></p><p><b>Penyebab Periodontitis</b></p><p>Periodontitis disebabkan oleh radang gusi yang awalnya dibiarkan tidak terobati. Peradangan ini dipicu oleh penumpukan plak yang jarang kita bersihkan sehingga lambat laun membentuk karang gigi sebagai media berkembang biaknya bakteri. Bakteri yang awalnya hanya mengiritasi bagian gusi di sekitar gigi (gingiva), lambat laun menyebabkan terbentuknya kantong-kantong gusi dan menginfeksi lebih dalam lagi hingga mencapai dasar jaringan gusi. Infeksi parah inilah yang kemudian merusak jaringan dan tulang di dalam gusi.<br></p><p><b>Pengobatan Periodontitis</b></p><p>Jika periodontitis belum parah, dokter biasanya akan meresepkan antibiotik oral atau topikal untuk menghilangkan bakteri penyebab infeksi. Selain itu, scaling atau pembersihan kerak dengan perangkat ultrasonik juga diperlukan guna menghilangkan karang gigi dan bakteri dari permukaan gigi atau bagian bawah gusi. Jika bakteri dan plak bertumpuk di akar gigi, maka metode root planing diperlukan untuk membersihkan dan mencegah penumpukan lebih lanjut, serta menghaluskan permukaan akar.<br><br>Untuk kasus periodontitis parah, biasanya dokter akan menerapkan prosedur operasi berdasarkan tingkat keparahan tersebut, mulai dari operasi untuk mengurangi kantong-kantong gusi, operasi untuk mencangkok jaringan lunak yang rusak akibat periodontitis, dan operasi cangkok tulang untuk memperbaiki tulang-tulang di sekitar akar gigi yang telah hancur.<br></p><p><b>Pencegahan Periodontitis</b></p><p>Periodontitis bisa dicegah dengan cara menjaga kebersihan gigi agar terbebas dari bakteri yang menyebabkannya. Gosoklah gigi tiap selesai makan atau paling tidak dua kali sehari, yaitu di waktu pagi hari dan malam hari menjelang tidur. Jangan lupa untuk membersihkan sela-sela gigi menggunakan benang gigi. Selain rajin menyikat gigi, rutinlah menemui dokter gigi tiap enam bulan sekali untuk mengetahui perkembangan kesehatan gigi Anda.<br></p>', 'asset/dist/img/periodontitis.JPG'),
	(21, 'Penyakit', 'Abses Gigi', '<p>Abses gigi adalah terbentuknya kantung atau benjolan berisi nanah pada gigi yang disebabkan oleh infeksi bakteri. Abses gigi biasanya muncul pada ujung akar gigi (abses periapikal). Infeksi bakteri penyebab abses gigi umumnya terjadi pada orang dengan kebersihan dan kesehatan gigi yang buruk. Nanah yang berkumpul pada benjolan, lambat laun akan terasa bertambah nyeri.<br></p><p>Penyebab munculnya abses gigi adalah berkembangnya bakteri pada rongga mulut yang menyebar ke jaringan lunak dan tulang wajah dan leher. Bakteri masuk ke dalam pulpa gigi melalui rongga gigi atau retakan pada gigi penderita. Di dalam pulpa gigi sendiri terdapat beberapa pembuluh darah, saraf serta jaringan ikat.<br></p><p><b>Pengobatan dan Komplikasi Abses Gigi</b></p><p>Beberapa langkah pengobatan yang umumnya akan dilakukan dokter untuk mengatasi abses gigi adalah:<br></p><ul><li>Membuat kanal ke akar gigi. Dokter akan mengebor ke bagian bawah gigi, mengangkat jaringan lunak yang menjadi pusat infeksi, serta mengeringkan abses. Cara ini dapat menghilangkan infeksi dan menyelamatkan gigi pasien.</li><li>Mengeringkan abses, dengan cara membuat sayatan kecil pada benjolan abses dan mengeluarkan cairan nanah dari dalamnya.</li><li>Memberikan antibiotik. Jika infeksi sudah menyebar ke gigi lainnya, dokter akan meresepkan antibiotik untuk menghentikan penyebaran bakteri.</li><li>Mencabut gigi yang terinfeksi. Jika memang tidak bisa diselamatkan, maka gigi yang terkena abses akan dicabut. Dokter kemudian akan mengeringkan abses.</li></ul>Jika tidak ditangani dengan benar, penderita abses gigi berisiko terkena beberapa kompikasi seperti:<br><ul><li>Penyebaran infeksi, ke bagian tubuh lain seperti rahang, leher atau kepala.</li><li>Sepsis. Infeksi mematikan yang menyebar ke seluruh tubuh.</li></ul><p></p>', 'asset/dist/img/abses_gigi.jpg'),
	(22, 'Penyakit', 'Karang gigi', '<p>Karang gigi sendiri merupakan plak gigi yang mengeras dan tumbuh sedikit demi sedikit. Iritasi dan peradangan akan kian mudah menimpa seseorang jika hal ini dibiarkan. Karang gigi yang terbentuk, bahkan sedikit sekalipun, hanya dokter gigi yang mampu menghilangkannya.<br></p><p>Adanya karang gigi membuat proses menyikat gigi dan flossing menjadi tidak efektif lagi. Gangguan pada gigi ini akan memudahkan proses pemecahan enamel gigi yang diakibatkan oleh asam yang dikeluarkan oleh bakteri mulut. Hal ini akan kian memudahkan munculnya gigi berlubang atau kerusakan gigi. Karang gigi memiliki efek serius pada kesehatan mulut dan tubuh secara keseluruhan terutama jika tumbuh di atas garis gusi. Sebab ini merupakan tempat yang tepat bagi bakteri untuk bersarang, kemudian menyusup ke dalam gusi sehingga membuatnya rusak dan mengalami iritasi. Salah satu efek paling ringan dari karang gigi adalah gingivitis alias radang gusi. Setelah gingivitis terjadi, sementara karang gigi tetap ada, maka gusi tinggal menunggu waktu untuk terkena penyakit periodontitis. Penyakit ini berbentuk kantong nanah yang timbul di antara gusi dan gigi. Efek berbahaya lainnya adalah risiko penyakit jantung dan stroke yang sepertinya berhubungan dengan kesehatan gusi. Diduga, bakteri dan mikroorganisme yang terdapat dalam plak gigi bisa masuk ke dalam jaringan darah. Kondisi tersebut bisa membuat arteri mengalami penyumbatan. Jika aliran darah tersumbat, maka risiko mendapat penyakit jantung dan stroke diduga bisa lebih tinggi. Ketika sistem pertahanan tubuh melakukan reaksi perlawanan terhadap bakteri yang ada di dalam kantong nanah maka secara bersamaan bakteri juga akan melepaskan zat pertahanan diri. Akibatnya, tulang gigi dan jaringan lain yang ada di sekitarnya bisa mengalami kerusakan. Jika terus berlanjut, maka bersiaplah kehilangan gigi, sekaligus menipisnya kekuatan tulang di mana gigi tertanam.<br></p><p><b>Mencegah dan Mengobati Karang Gigi</b></p><p>Beberapa tindakan yang bisa dilakukan agar karang gigi tidak merajalela dalam mulut sehingga efek buruknya bisa dicegah, antara lain:</p><p></p><ul><li>Menyikat gigi<br></li></ul>Menyikat gigi dua kali sehari selama minimal dua menit dianggap mampu mencegah tumbuhnya karang gigi. Gunakan sikat gigi yang lembut dan mampu menjangkau bagian belakang gigi geraham.<br><ul><li>Gunakan pasta gigi yang mengandung flouride<br></li></ul>Pasta gigi yang mengandung flouride dianggap mampu mencegah plak berkembang menjadi karang gigi. Pasta gigi jenis ini juga lebih efektif dalam memperbaiki enamel yang rusak. Akan lebih baik jika pasta gigi yang digunakan juga mengandung triclosan yang mampu memerangi bakteri yang berdiam di plak gigi.<br><ul><li>Flossing<br></li></ul>Membersihkan gigi dengan benang atau flossing adalah solusi paling jitu untuk membersihkan plak gigi yang ada di sela-sela gigi sehingga mengurangi kemungkinan terbentuknya karang gigi. Lakukan hal ini meski sudah menyikat gigi rutin sebagaimana disyaratkan di atas.<br><p></p><ul><li>Jaga makanan<br></li></ul><p></p>Bakteri yang ada di mulut sangat erat kaitannya dengan jenis makanan yang dikonsumsi. Mereka berkembang dengan baik saat makanan manis dan bertepung dikonsumsi. Bakteri akan mengeluarkan zat asam berbahaya jika bertemu dengan kedua jenis makanan di atas. Cara terbaik mengurangi kemungkinan terbentuknya karang gigi adalah dengan membatasi jenis-jenis makanan tersebut.<br><ul><li>Hindari merokok<br></li></ul>Kebiasaan merokok meningkatkan risiko pembentukan karang gigi pada para pengisapnya.<br><p></p>', 'asset/dist/img/karang_gigi.jpg'),
	(23, 'Penyakit', 'Radang Pulpa Gigi (Pulpitis)', '<p>Pulpitis merupakan peradangan yang terjadi di pulpa, yakni bagian gigi paling dalam yang terdapat saraf dan pembuluh darah. Kondisi ini bisa menyebabkan munculnya nyeri yang luar biasa.<br></p><p>Pulpitis paling sering disebabkan oleh pembusukan gigi, penyebab lainnya adalah cedera. Ketika terjadi peradangan pulpa tidak memiliki ruang yang cukup untuk membengkak karena terbungkus dalam dinding yang keras sehingga terjadi peningkatan tekanan dalam gigi. Peradangan yang ringan, jika berhasil diatasi, tidak akan menimbulkan kerusakan gigi yang permanen. Sementara bila terjadi peradangan yang berat maka bisa mematikan pulpa. Tekanan dalam gigi yang meningkat dapat mendorong pulpa melalui ujung akar hingga melukai tulang rahang dan jaringan sekitarnya.<br></p><p><b>Pengobatan Pulpitis</b></p><p><br />\r\n<br />\r\nPeradangan mereda jika penyebabnya diobati. Jika pulpitis diketahui pada stadium dini, maka penambalan sementara yang mengandung obat penenang saraf bisa menghilangkan nyeri. Tambalan ini bisa dibiarkan sampai 6-8 minggu dan kemudian diganti dengan tambalan permanen. Jika terjadi kerusakan pulpa yang luas dan tidak dapat diperbaiki, satu-satunya cara untuk menghilangkan nyeri adalah dengan mencabut pulpa, baik melalui pengobatan saluran akar maupun dengan pencabutan gigi.<br />\r\n<br />\r\n<br></p>', 'asset/dist/img/radang_pulpa_gigi.jpg'),
	(24, 'Penyakit', 'Sariawan', '<p>Sariawan yang dalam istilah medis disebut stomatitis aftosa (apthous stomatitis) atau canker sore adalah luka di dalam mulut yang dapat menimbulkan rasa sakit dan tidak nyaman. Luka tersebut bisa berbentuk oval atau bulat, dan berwarna putih atau kuning dengan tepiannya yang berwarna merah akibat peradangan. Lokasi sariawan dapat terjadi di bagian dalam pipi atau bibir, serta di permukaan gusi dan lidah. Sariawan yang tumbuh dapat berjumlah satu atau lebih.&nbsp;Berdasarkan ukurannya, luka sariawan dapat dibagi menjadi tiga, yaitu minor, mayor, dan herpatiformis. Luka sariawan minor memiliki diameter sekitar 1 cm dan merupakan jenis yang paling banyak diderita orang-orang. Sementara itu, luka sariawan mayor memiliki diameter 2-3 cm dan dapat tumbuh di langit-lagit mulut atau lidah. Luka ini lebih dalam dengan tepi yang tidak beraturan. Berbeda dari kedua jenis luka sariawan sebelumnya, herpatiformis merupakan jenis luka sariawan yang jarang sekali terjadi. Ukuran luka ini hanya berdiameter 1-2 milimeter dan cederung tumbuh secara berkelompok (terdiri dari 10 hingga 100 luka).<br></p><p><b>Penyebab Sariawan</b></p><p>Sariawan dapat terjadi karena berbagai faktor, di antaranya :<br></p><ul><li>Kondisi medis yang meliputi kekurangan zat besi atau vitamin B12, penyakit Crohn, penyakit celiac, artritis reaktif, sistem imunitas yang lemah (misalnya akibat HIV dan penyakit lupus), penyakit Behcet, dan infeksi virus (misalnya pilek, penyakit tangan, kaki, dan mulut, atau pilek).</li><li>Cedera atau kerusakan pada lapisan dalam mulut. Hal ini dapat terjadi karena bibir tergigit secara tidak sengaja, gigi yang terlalu tajam, memakai kawat gigi, atau mengunyah makanan yang keras.</li><li>Efek samping obat atau metode pengobatan, misalnya nicorandil, penghambat beta, obat antiinflamasi nonsteroid (NSAIDs), kemoterapi, dan radioterapi.</li><li>Perubahan hormon. Kondisi ini biasanya dialami wanita yang dapat mengalami sariawan selama masa menstruasi.</li><li>Mengonsumsi makanan atau minuman tertentu, seperti makanan pedas dan kopi.</li><li>Menggunakan pasta gigi yang mengandung natrium lauret sulfat.</li><li>Berhenti merokok. Sariawan bisa terjadi di masa-masa awal seseorang berhenti merokok.</li><li>Kondisi psikologis, misalnya gelisah atau stres.</li></ul><b>Pengobatan Sariawan</b><p></p><p>Sariawan umumya dapat pulih dengan sendirinya dalam waktu satu hingga dua minggu. Kendati demikian, penanganan secara mandiri dapat dilakukan guna mengurangi rasa sakit atau ketidaknyamanan yang dialami, di antaranya berupa:<br></p><ul><li>Menggunakan sedotan saat minum guna mengurangi rasa sakit.</li><li>Menggunakan pasta gigi yang tidak mengandung bahan-bahan yang memicu iritasi, seperti sodium laurel sulfat, serta memakai sikat gigi yang lembut untuk menggosok gigi.</li><li>Menghindari semua pemicu yang dapat memperparah luka sariawan.</li><li>Mengonsumsi makanan yang lembut dan menghindari makanan yang keras, pedas, asam, asin atau minuman panas hingga luka sariawan sembuh.</li></ul>Jika rasa sakit tidak dapat tertangani dengan pengobatan mandiri atau luka bertambah banyak atau besar, maka dokter dapat menganjurkan pemberian obat-obatan di antaranya:<br><ul><li>Obat pereda nyeri. Obat ini dapat membuat mulut kebas sehingga tidak terasa nyeri untuk sementara waktu. Obat pereda nyeri yang diberikan bisa dalam bentuk obat kumur, semprot, atau gel (misalnya krim benzoacaine dan lidocaine). Untuk penggunaan obat kumur, sebaiknya tidak lebih dari 7 hari dan tidak diberikan untuk anak-anak berusia di bawah 12 tahun.  Selain itu, ada juga obat pereda nyeri yang dapat melindungi lapisan luka sehingga tingkat keparahan nyeri dapat ditekan. Obat yang termasuk golongan ini adalah sucralfate, bismuthsubsalicylate, dan bioadherent oral.</li><li>Obat kortikosteroid. Obat ini dapat meredakan nyeri dan mempercepat kesembuhan. Obat ini harus segera digunakan begitu luka muncul. Yang termasuk obat kortiosteroid adalah dexamethasone, triaciomonole, fluocinoide, dan clobetasol.</li><li>Obat antimikroba. Obat ini dapat mempercepat penyembuhan dan mencegah infeksi pada luka. Contoh obat ini adalah tetracycline, chlorhexidene gluconate dan hidrogen peroksida.</li><li>Obat immunosupresan. Obat ini dapat menghambat pembentukan luka pada mulut dan biasanya diperuntukkan penderita kasus sariawan yang parah. Yang termasuk obat golongan ini adalah cochcline, clofazimine, azathioprine, dan thalidomide.</li></ul><p></p><p>Pemeriksaan ke dokter akan diperlukan jika:<br></p><ul><li>Anda menderita sariawan secara berkali-kali.</li><li>Luka sariawan bertambah sakit atau menjadi merah yang mengindikasikan infeksi bakteri.</li><li>Sariawan tidak kunjung sembuh dalam waktu tiga minggu.</li></ul><p></p>', 'asset/dist/img/sariawan.jpg'),
	(25, 'Penyakit', 'Perikoronitis', '<p>Perikoronitis adalah gangguan pada mulut di mana jaringan gusi membengkak dan terinfeksi di sekitar gigi bungsu, geraham ketiga, dan geraham terakhir. Perikoronitis umumnya muncul pada akhir masa remaja atau awal usia 20 tahun. Perikoronitis berbeda dengan penyakit gusi (periodontitis), di mana kondisi ini spesifik pada area di sekitar gigi yang tumbuh. Penyebab dari kondisi ini menyerupai pembentukan abses gusi pada periodontitis, di mana sisa-sisa makanan terjebak di bawah jaringan gusi.<br></p><p><b>Mengobati Perikoronitis</b></p><p>Kadang, gejala ringan dari perikoronitis dapat diatasi di rumah tanpa antibiotik. Menyikat area dengan menyeluruh dan lembut dengan kepala sikat gigi yang kecil dapat membantu menghancurkan plak atau makanan yang terjebak. Irigator air mulut juga dapat membersihkan sisa makanan yang terjebak di bawah operkulum dengan efektif. Berkumur dengan air garam hangat dapat membantu meredakan area. Selain itu, larutan hidrogen peroksida juga dapat digunakan sebagai obat kumur atau cairan irigasi untuk membantu mengurangi bakteri pada area.<br></p><p>Untuk perikoronitis parah yang disertai oleh demam dan pembengkakan, perawatan di rumah tidak disarankan, dan perawatan yang tepat harus dilakukan oleh profesional. Hubungi dokter gigi apabila Anda mengalami perikoronitis parah.<br></p>', 'asset/dist/img/perikoronitis.jpg');
/*!40000 ALTER TABLE `info_kes_kit` ENABLE KEYS */;

-- Dumping structure for table telehealth.jenis_penyakit
DROP TABLE IF EXISTS `jenis_penyakit`;
CREATE TABLE IF NOT EXISTS `jenis_penyakit` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table telehealth.jenis_penyakit: ~3 rows (approximately)
DELETE FROM `jenis_penyakit`;
/*!40000 ALTER TABLE `jenis_penyakit` DISABLE KEYS */;
INSERT INTO `jenis_penyakit` (`id_jenis`, `jenis`, `deskripsi`, `image`) VALUES
	(1, 'Lambung', 'Anda dapat melakukan diagnosa penyakit lambung (Maag, Dyspepsia, atau GERD) anda dengan memilih gejala yang anda alami', 'asset/dist/img/stomach.jpg'),
	(2, 'Demam Berdarah Dengue (DBD)', 'DBD merupakan salah satu penyakit yang cukup berbahaya. Penyakit DBD memiliki derajat 1, 2, 3, dan 4. Sistem dapat mendiagnosis awal DBD yang dialami seseorang termasuk dalam kategori derajat 1, 2, 3, atau 4.', 'asset/dist/img/dbd.jpg'),
	(3, 'Gigi dan Mulut', 'Anda dapat mendiagnosis awal penyakit gigi dan mulut yang mungkin anda alami seperti radang gusi, radang jairngan penyangga gigi, abses, karang, radang pulpa gigi, sariawan, atau perikoronitis', 'asset/dist/img/gigi_dan_mulut.jpg');
/*!40000 ALTER TABLE `jenis_penyakit` ENABLE KEYS */;

-- Dumping structure for table telehealth.konsultasi
DROP TABLE IF EXISTS `konsultasi`;
CREATE TABLE IF NOT EXISTS `konsultasi` (
  `id_konsul` int(11) NOT NULL AUTO_INCREMENT,
  `pengirim` varchar(20) NOT NULL,
  `penerima` varchar(20) NOT NULL,
  `sesi` varchar(300) NOT NULL,
  `isi_konsul` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id_konsul`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

-- Dumping data for table telehealth.konsultasi: ~17 rows (approximately)
DELETE FROM `konsultasi`;
/*!40000 ALTER TABLE `konsultasi` DISABLE KEYS */;
INSERT INTO `konsultasi` (`id_konsul`, `pengirim`, `penerima`, `sesi`, `isi_konsul`, `time`) VALUES
	(38, '135150', '25262', 'sakit kepala', 'saya sering mengalami sakit kepala', '2017-08-01 13:03:00'),
	(39, '25262', '135150', 'sakit kepala', 'rasa sakit yang bagaimana', '2017-08-01 13:06:00'),
	(40, '135150', '25262', 'sakit kepala', 'seperti rasa dipukul-pukul', '2017-08-01 13:08:00'),
	(41, '135150', '2341', 'sakit kepala', 'saya merasa sakit kepala yang tidak biasa dok', '2017-08-01 13:08:00'),
	(42, '135150', '25262', 'sakit perut', 'saya juga merasa sakit perut', '2017-08-01 13:39:00'),
	(43, '135150', '2341', 'sakit perut', 'saya mengalami sakit perut dok', '2017-08-01 14:49:00'),
	(44, '25262', '135150', 'sakit perut', 'sakit yang seperti apa?', '2017-08-01 18:03:04'),
	(45, '25262', '135150', 'sakit kepala', 'hanya sebelah bagian kepala saja?', '2017-08-02 00:14:11'),
	(46, '135150', '25262', 'sakit pinggang', 'selamat pagi dok', '2017-08-02 09:35:53'),
	(47, '25262', '135150', 'sakit pinggang', 'ok', '2017-08-02 09:36:02'),
	(48, '123456', '25262', 'sakit kepala', 'halo dok', '2017-08-02 09:59:01'),
	(49, '25262', '135150', 'sakit perut', 'tes', '2017-12-20 18:51:50'),
	(50, '135150', '3511100116162474', 'sakit kepala', 'selamat malam dokter', '2017-12-27 22:22:43'),
	(51, '3511100116162474', '135150', 'sakit kepala', 'selamat malam', '2017-12-27 22:22:58'),
	(52, '135150', '25262', 'sakit gigi', 'selamat siang dokter', '2017-12-28 10:50:35'),
	(53, '135150', '25262', 'sakit gigi', 'selamat siang dokter', '2017-12-28 10:50:35'),
	(54, '25262', '135150', 'sakit gigi', 'selamat siang', '2017-12-28 10:51:18'),
	(55, '25262', '123456', 'sakit kepala', 'hi', '2019-07-11 23:05:17');
/*!40000 ALTER TABLE `konsultasi` ENABLE KEYS */;

-- Dumping structure for table telehealth.member
DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id_member` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` text NOT NULL,
  `jenis_kl` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table telehealth.member: ~3 rows (approximately)
DELETE FROM `member`;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`id_member`, `nama`, `ttl`, `jenis_kl`, `no_telp`, `alamat`, `img`) VALUES
	('1231', 'Jono Dono', 'Malang, 4 Mei 1997', 'Laki-laki', '094538573', 'Jl Kertoraharjo', 'asset/dist/img/avatar04.png'),
	('123456', 'michael', 'Padang, 3 juli 1995', 'Laki-laki', '085263', 'kerto', 'asset/dist/img/foto-default.png'),
	('135150', 'Julius Munthe', 'Padang, 3 Juli 1995', 'Laki-laki', '085265614264', 'Jl. Gajayana No 14D, Malang', 'asset/dist/img/fotoalex.jpg');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- Dumping structure for table telehealth.notif
DROP TABLE IF EXISTS `notif`;
CREATE TABLE IF NOT EXISTS `notif` (
  `id_notif` int(11) NOT NULL AUTO_INCREMENT,
  `pengirim` varchar(20) NOT NULL,
  `penerima` varchar(20) NOT NULL,
  `sesi` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id_notif`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table telehealth.notif: ~9 rows (approximately)
DELETE FROM `notif`;
/*!40000 ALTER TABLE `notif` DISABLE KEYS */;
INSERT INTO `notif` (`id_notif`, `pengirim`, `penerima`, `sesi`, `status`, `time`) VALUES
	(1, '25262', '135150', 'sakit perut', 0, '2017-12-20 18:51:50'),
	(2, '25262', '135150', 'sakit kepala', 1, '2017-08-02 00:14:11'),
	(3, '135150', '25262', 'sakit pinggang', 1, '2017-08-02 09:35:54'),
	(4, '25262', '135150', 'sakit pinggang', 0, '2017-08-02 09:36:02'),
	(5, '123456', '25262', 'sakit kepala', 1, '2017-08-02 09:59:01'),
	(6, '135150', '3511100116162474', 'sakit kepala', 1, '2017-12-27 22:22:44'),
	(7, '3511100116162474', '135150', 'sakit kepala', 1, '2017-12-27 22:22:58'),
	(8, '135150', '25262', 'sakit gigi', 1, '2017-12-28 10:50:35'),
	(9, '25262', '135150', 'sakit gigi', 1, '2017-12-28 10:51:18'),
	(10, '25262', '123456', 'sakit kepala', 0, '2019-07-11 23:05:17');
/*!40000 ALTER TABLE `notif` ENABLE KEYS */;

-- Dumping structure for table telehealth.rekam_medis
DROP TABLE IF EXISTS `rekam_medis`;
CREATE TABLE IF NOT EXISTS `rekam_medis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` varchar(20) NOT NULL,
  `namaDokter` varchar(100) NOT NULL,
  `sesi` varchar(300) NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosis` text NOT NULL,
  `penanganan` text NOT NULL,
  `resep` varchar(300) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table telehealth.rekam_medis: ~3 rows (approximately)
DELETE FROM `rekam_medis`;
/*!40000 ALTER TABLE `rekam_medis` DISABLE KEYS */;
INSERT INTO `rekam_medis` (`id`, `id_member`, `namaDokter`, `sesi`, `keluhan`, `diagnosis`, `penanganan`, `resep`, `time`) VALUES
	(11, '123456', 'Dakka A. Munthe', 'sakit kepala', 'ererererrer<br />sdffdfdffdfd', 'test1 klllklk', 'asddasda', 'minum obat batuk', '2017-11-13 23:19:44'),
	(12, '135150', 'Dakka A. Munthe', 'sakit pinggang', '', 'asdhadasdasd kjjkjkjk', '', 'minum obat pinggang 3 x sehari', '2017-08-03 19:23:37'),
	(13, '135150', 'Dakka A. Munthe', 'sakit perut', 'fdffsfs', 'sdfdsfsdf', 'dfsdfsdf', '', '2017-09-25 23:19:58');
/*!40000 ALTER TABLE `rekam_medis` ENABLE KEYS */;

-- Dumping structure for table telehealth.rule_penyakit
DROP TABLE IF EXISTS `rule_penyakit`;
CREATE TABLE IF NOT EXISTS `rule_penyakit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis` int(11) NOT NULL,
  `penyakit` varchar(100) NOT NULL,
  `kode_gjl` varchar(5) NOT NULL,
  `gejala` varchar(200) NOT NULL,
  `densitas` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

-- Dumping data for table telehealth.rule_penyakit: ~84 rows (approximately)
DELETE FROM `rule_penyakit`;
/*!40000 ALTER TABLE `rule_penyakit` DISABLE KEYS */;
INSERT INTO `rule_penyakit` (`id`, `id_jenis`, `penyakit`, `kode_gjl`, `gejala`, `densitas`) VALUES
	(1, 1, 'Maag', 'G01', 'Perut Kembung', 0.4),
	(2, 1, 'Maag', 'G02', 'Sakit Pada Ulu Hati', 1),
	(3, 1, 'Maag', 'G03', 'Sering Merasa Lapar', 0.4),
	(4, 1, 'Maag', 'G04', 'Mual dan Muntah', 0.4),
	(5, 1, 'Maag', 'G05', 'Nyeri Dibelakang Tulang Dada', 0.6),
	(6, 1, 'Dyspepsia', 'G01', 'Perut Kembung', 0.1),
	(7, 1, 'Dyspepsia', 'G03', 'Sering Merasa Lapar', 0.4),
	(8, 1, 'Dyspepsia', 'G04', 'Mual dan Muntah', 0.4),
	(9, 1, 'Dyspepsia', 'G05', 'Nyeri Dibelakang Tulang Dada', 0.2),
	(10, 1, 'Dyspepsia', 'G06', 'Sendawa', 0.4),
	(11, 1, 'Dyspepsia', 'G07', 'Rasa Sakit/Tidak Nyaman Pada Perut Bagian Atas', 0.4),
	(12, 1, 'Dyspepsia', 'G08', 'Perasaan Panas di Dada dan Perut', 0.4),
	(13, 1, 'Dyspepsia', 'G09', 'Mengeluarkan Gas Asam dari Mulut', 0.1),
	(14, 1, 'Dyspepsia', 'G13', 'Gangguan Pencernaan', 0.4),
	(15, 1, 'GERD', 'G01', 'Perut Kembung', 0.1),
	(16, 1, 'GERD', 'G04', 'Mual dan Muntah', 0.4),
	(17, 1, 'GERD', 'G06', 'Sendawa', 0.4),
	(18, 1, 'GERD', 'G10', 'Rasa Tidak Nyaman Saat Menelan', 0.4),
	(19, 1, 'GERD', 'G11', 'Rasa Sakit Saat Menelan', 0.2),
	(20, 1, 'GERD', 'G12', 'Rasa Nyeri Pada Bagian Dada', 0.2),
	(21, 1, 'GERD', 'G13', 'Gangguan Pencernaan', 0.2),
	(22, 1, 'GERD', 'G14', 'Batuk', 0.2),
	(23, 1, 'GERD', 'G15', 'Rasa Panas Pada Bagian Dada', 0.1),
	(24, 2, 'DBD Derajat 1', 'G01', 'Demam tinggi >=38 derajat (2-7hr)', 0.6),
	(25, 2, 'DBD Derajat 2', 'G01', 'Demam tinggi >=38 derajat (2-7hr)', 0.7),
	(26, 2, 'DBD Derajat 1', 'G02', 'Sakit Kepala', 0.4),
	(27, 2, 'DBD Derajat 2', 'G02', 'Sakit Kepala', 0.5),
	(28, 2, 'DBD Derajat 1', 'G03', 'Nyeri retro-orbitral (nyeri belakang mata)', 0.5),
	(29, 2, 'DBD Derajat 2', 'G03', 'Nyeri retro-orbitral (nyeri belakang mata)', 0.6),
	(30, 2, 'DBD Derajat 1', 'G04', 'Myalgia (badan terasa pegal-pegal)', 0.4),
	(31, 2, 'DBD Derajat 2', 'G04', 'Myalgia (badan terasa pegal-pegal)', 0.5),
	(32, 2, 'DBD Derajat 1', 'G05', 'Antralgia (nyeri pada sendi-sendi)', 0.4),
	(33, 2, 'DBD Derajat 2', 'G05', 'Antralgia (nyeri pada sendi-sendi)', 0.6),
	(34, 2, 'DBD Derajat 1', 'G06', 'Kulit Ruam (kemerah-merahan)', 0.4),
	(35, 2, 'DBD Derajat 2', 'G06', 'Kulit Ruam (kemerah-merahan)', 0.5),
	(36, 2, 'DBD Derajat 1', 'G07', 'Hilang nafsu makan', 0.4),
	(37, 2, 'DBD Derajat 2', 'G07', 'Hilang nafsu makan', 0.5),
	(38, 2, 'DBD Derajat 1', 'G08', 'Mual dan muntah', 0.4),
	(39, 2, 'DBD Derajat 2', 'G08', 'Mual dan muntah', 0.5),
	(40, 2, 'DBD Derajat 1', 'G09', 'Badan lemas', 0.3),
	(41, 2, 'DBD Derajat 2', 'G09', 'Badan lemas', 0.4),
	(42, 2, 'DBD Derajat 2', 'G10', 'Pendarahan spontan (mimisan, BAB berdarah, kencing berdarah, dll)', 0.7),
	(43, 2, 'DBD Derajat 3', 'G11', 'Kegagalan sirkulasi (nadi lemah dan cepat)', 0.7),
	(44, 2, 'DBD Derajat 3', 'G12', 'Tekanan darah menurun', 0.6),
	(45, 2, 'DBD Derajat 3', 'G13', 'Kulit terasa dingin dan lembab', 0.6),
	(46, 2, 'DBD Derajat 3', 'G14', 'Gelisah', 0.5),
	(47, 2, 'DBD Derajat 4', 'G15', 'Syok berat', 0.8),
	(48, 2, 'DBD Derajat 4', 'G16', 'Nadi tidak teraba', 0.7),
	(49, 2, 'DBD Derajat 4', 'G17', 'Tekanan darah tidak teratur', 0.6),
	(50, 2, 'DBD Derajat 4', 'G18', 'Berkeringat dan kulit tampak biru', 0.6),
	(51, 2, 'DBD Derajat 1', 'G19', 'Uji trombosit < 100.000ul', 0.9),
	(52, 2, 'DBD Derajat 2', 'G19', 'Uji trombosit < 100.000ul', 0.9),
	(53, 2, 'DBD Derajat 3', 'G19', 'Uji trombosit < 100.000ul', 0.9),
	(54, 2, 'DBD Derajat 4', 'G19', 'Uji trombosit < 100.000ul', 0.9),
	(55, 3, 'Radang Gusi (Gingivitis)', 'G01', 'Gusi bengkak', 0.5),
	(56, 3, 'Radang Gusi (Gingivitis)', 'G02', 'Gusi mengkilap', 1),
	(57, 3, 'Radang Gusi (Gingivitis)', 'G03', 'Gusi berdarah', 1),
	(58, 3, 'Radang Gusi (Gingivitis)', 'G04', 'Gusi lunak', 0.6),
	(59, 3, 'Radang Gusi (Gingivitis)', 'G05', 'Gusi berwarna merah', 0.3),
	(60, 3, 'Radang Jaringan Penyangga Gigi (Periodontitis)', 'G06', 'Gigi terasa lepas', 1),
	(61, 3, 'Radang Jaringan Penyangga Gigi (Periodontitis)', 'G07', 'Gigi goyang', 0.8),
	(62, 3, 'Radang Jaringan Penyangga Gigi (Periodontitis)', 'G08', 'Gigi diketuk sakit', 1),
	(63, 3, 'Radang Jaringan Penyangga Gigi (Periodontitis)', 'G09', 'Gigi berlubang', 0.5),
	(64, 3, 'Abses', 'G10', 'Nyeri saat mengunyah', 1),
	(65, 3, 'Abses', 'G11', 'Demam', 0.3),
	(66, 3, 'Abses', 'G01', 'Gusi bengkak', 1),
	(67, 3, 'Abses', 'G07', 'Gigi goyang', 0.5),
	(68, 3, 'Abses', 'G12', 'Pembengkakan kelenjar getah bening', 0.8),
	(69, 3, 'Karang', 'G13', 'Endapan berwarna kuning-hitam di leher gigi', 1),
	(70, 3, 'Karang', 'G14', 'Bau mulut', 0.8),
	(71, 3, 'Karang', 'G03', 'Gusi berdarah', 0.5),
	(73, 3, 'Radang Pulpa Gigi (Pulpitis)', 'G15', 'Sakit saat terkena udara', 1),
	(74, 3, 'Radang Pulpa Gigi (Pulpitis)', 'G10', 'Nyeri saat mengunyah', 1),
	(75, 3, 'Radang Pulpa Gigi (Pulpitis)', 'G08', 'Gigi diketuk sakit', 0.6),
	(76, 3, 'Radang Pulpa Gigi (Pulpitis)', 'G16', 'Cekot-cekot', 1),
	(77, 3, 'Radang Pulpa Gigi (Pulpitis)', 'G17', 'Durasi nyeri terbatas', 0.8),
	(78, 3, 'Sariawan', 'G18', 'Luka dangkal, bulat, simetris', 1),
	(79, 3, 'Sariawan', 'G19', 'Luka berwarna putih kemerahan', 1),
	(80, 3, 'Sariawan', 'G20', 'Ukuran luka mencapai 2-5cm', 0.8),
	(81, 3, 'Sariawan', 'G21', 'Rasa nyeri seperti terbakar', 1),
	(82, 3, 'Perikoronitis', 'G14', 'Bau mulut', 0.5),
	(83, 3, 'Perikoronitis', 'G22', 'Sakit untuk membuka mulut', 0.8),
	(84, 3, 'Perikoronitis', 'G23', 'Terasa sakit pada gigi bagian belakang', 1),
	(85, 3, 'Perikoronitis', 'G01', 'Gusi bengkak', 0.5);
/*!40000 ALTER TABLE `rule_penyakit` ENABLE KEYS */;

-- Dumping structure for table telehealth.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` smallint(6) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table telehealth.user: ~7 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `img`) VALUES
	('1231', 'jono', 'c1635d2d6ac69e78580bca934d77c0e3', 1, 'asset/dist/img/avatar04.png'),
	('123456', 'michael12', '0acf4539a14b3aa27deeb4cbdf6e989f', 1, 'asset/dist/img/foto-default.png'),
	('135150', 'julius', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'asset/dist/img/fotoalex.jpg'),
	('2341', 'drCarlo', '1acd0befd837626d6a70c8591903c8c4', 2, 'asset/dist/img/user1-128x128.jpg'),
	('25262', 'drdakka', '21232f297a57a5a743894a0e4a801fc3', 2, 'asset/dist/img/user6-128x128.jpg'),
	('311', 'admin', '21232f297a57a5a743894a0e4a801fc3', 3, 'asset/dist/img/foto-default.png'),
	('3511100116162474', 'drmirza', 'ba932416ca1ce20f6bf4437035856fbc', 2, 'asset/dist/img/user8-128x128.jpg');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
