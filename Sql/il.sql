--

-- Tablo için tablo yapısı: `il`

--



CREATE TABLE IF NOT EXISTS `il` (

  `ID` int(11) NOT NULL AUTO_INCREMENT,

  `ADI` varchar(20) COLLATE utf8_turkish_ci NOT NULL,

  PRIMARY KEY (`ID`)

) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=82 ;



--

-- Tablo döküm verisi `il`

--



INSERT INTO `il` (`ID`, `ADI`) VALUES

(1, 'Adana'),

(2, 'Adiyaman'),

(3, 'Afyon'),

(4, 'Ağri'),

(5, 'Amasya'),

(6, 'Ankara'),

(7, 'Antalya'),

(8, 'Artvin'),

(9, 'Aydin'),

(10, 'Balikesir'),

(11, 'Bilecik'),

(12, 'Bingöl'),

(13, 'Bitlis'),

(14, 'Bolu'),

(15, 'Burdur'),

(16, 'Bursa'),

(17, 'Çanakkale'),

(18, 'Çankiri'),

(19, 'Çorum'),

(20, 'Denizlİ'),

(21, 'Diyarbakir'),

(22, 'Edirne'),

(23, 'Elaziğ'),

(24, 'Erzincan'),

(25, 'Erzurum'),

(26, 'Eskişehir'),

(27, 'Gaziantep'),

(28, 'Giresun'),

(29, 'Gümüşhane'),

(30, 'Hakkari'),

(31, 'Hatay'),

(32, 'Isparta'),

(33, 'İçel'),

(34, 'İstanbul'),

(35, 'İzmir'),

(36, 'Kars'),

(37, 'Kastamonu'),

(38, 'Kayserİ'),

(39, 'Kirklareli'),

(40, 'Kirşehir'),

(41, 'Kocaeli'),

(42, 'Konya'),

(43, 'Kütahya'),

(44, 'Malatya'),

(45, 'Manisa'),

(46, 'Kahramanmaraş'),

(47, 'Mardin'),

(48, 'Muğla'),

(49, 'Muş'),

(50, 'Nevşehir'),

(51, 'Niğde'),

(52, 'Ordu'),

(53, 'Rize'),

(54, 'Sakarya'),

(55, 'Samsun'),

(56, 'Siirt'),

(57, 'Sinop'),

(58, 'Sivas'),

(59, 'Tekirdağ'),

(60, 'Tokat'),

(61, 'Trabzon'),

(62, 'Tuncelİ'),

(63, 'Şanliurfa'),

(64, 'Uşak'),

(65, 'Van'),

(66, 'Yozgat'),

(67, 'Zonguldak'),

(68, 'Aksaray'),

(69, 'Bayburt'),

(70, 'Karaman'),

(71, 'Kirikkale'),

(72, 'Batman'),

(73, 'Şirnak'),

(74, 'Bartin'),

(75, 'Ardahan'),

(76, 'Iğdir'),

(77, 'Yalova'),

(78, 'Karabük'),

(79, 'Kilis'),

(80, 'Osmaniye'),

(81, 'Düzce');
