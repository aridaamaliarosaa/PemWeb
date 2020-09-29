-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2020 at 08:47 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13884719_olsyop`
--
CREATE DATABASE IF NOT EXISTS `id13884719_olsyop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id13884719_olsyop`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `item_list` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_list`) VALUES
(1, 1, 'a:0:{}'),
(2, 2, 'a:0:{}'),
(3, 3, 'a:0:{}'),
(4, 4, 'a:0:{}');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'GECKO 17Key'),
(2, 'Gecko 17Key'),
(3, 'Gecko 10Key'),
(4, 'Gecko 10 Key'),
(5, 'Gecko 10 Keys'),
(6, 'Luvay 17Keys'),
(7, 'Luvay 10Keys'),
(8, 'Stagg 10 Key'),
(9, 'Luvay 17Key'),
(10, 'Kimi 17Key'),
(11, 'Kimi 17 Key'),
(12, 'ADM Kalimba 17 key'),
(13, 'ADM Kalimba 17 Key');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_code` char(3) NOT NULL DEFAULT 'IDN',
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_code`, `country_name`) VALUES
('AFG', 'Afghanistan'),
('AFR', 'Africa'),
('ALB', 'Albania'),
('DZA', 'Algeria'),
('ASM', 'American Samoa'),
('ANR', 'Andean Region'),
('AND', 'Andorra'),
('AGO', 'Angola'),
('ATG', 'Antigua and Barbuda'),
('ARB', 'Arab World'),
('ARG', 'Argentina'),
('ARM', 'Armenia'),
('ABW', 'Aruba'),
('AUS', 'Australia'),
('AUT', 'Austria'),
('AZE', 'Azerbaijan'),
('BHS', 'Bahamas, The'),
('BHR', 'Bahrain'),
('BGD', 'Bangladesh'),
('BRB', 'Barbados'),
('BLR', 'Belarus'),
('BEL', 'Belgium'),
('BLZ', 'Belize'),
('BEN', 'Benin'),
('BMU', 'Bermuda'),
('BTN', 'Bhutan'),
('BOL', 'Bolivia'),
('BIH', 'Bosnia and Herzegovina'),
('BWA', 'Botswana'),
('BRA', 'Brazil'),
('VGB', 'British Virgin Islands'),
('BRN', 'Brunei Darussalam'),
('BGR', 'Bulgaria'),
('BFA', 'Burkina Faso'),
('BDI', 'Burundi'),
('CPV', 'Cabo Verde'),
('KHM', 'Cambodia'),
('CMR', 'Cameroon'),
('CAN', 'Canada'),
('CSS', 'Caribbean small states'),
('CYM', 'Cayman Islands'),
('CAF', 'Central African Republic'),
('MCA', 'Central America'),
('CEB', 'Central Europe and the Baltics'),
('TCD', 'Chad'),
('CHI', 'Channel Islands'),
('CHL', 'Chile'),
('CHN', 'China'),
('COL', 'Colombia'),
('COM', 'Comoros'),
('COD', 'Congo, Dem. Rep.'),
('COG', 'Congo, Rep.'),
('CRI', 'Costa Rica'),
('CIV', 'Cote d\'Ivoire'),
('HRV', 'Croatia'),
('CUB', 'Cuba'),
('CUW', 'Curacao'),
('CYP', 'Cyprus'),
('CZE', 'Czech Republic'),
('DNK', 'Denmark'),
('DJI', 'Djibouti'),
('DMA', 'Dominica'),
('DOM', 'Dominican Republic'),
('EAR', 'Early-demographic dividend'),
('EAS', 'East Asia & Pacific'),
('EAP', 'East Asia & Pacific (excluding high income)'),
('BEA', 'East Asia & Pacific (IBRD-only countries)'),
('TEA', 'East Asia & Pacific (IDA & IBRD countries)'),
('DEA', 'East Asia & Pacific (IDA-eligible countries)'),
('CEA', 'East Asia and the Pacific (IFC classification)'),
('ECU', 'Ecuador'),
('EGY', 'Egypt, Arab Rep.'),
('SLV', 'El Salvador'),
('GNQ', 'Equatorial Guinea'),
('ERI', 'Eritrea'),
('EST', 'Estonia'),
('SWZ', 'Eswatini'),
('ETH', 'Ethiopia'),
('EMU', 'Euro area'),
('ECS', 'Europe & Central Asia'),
('ECA', 'Europe & Central Asia (excluding high income)'),
('BEC', 'Europe & Central Asia (IBRD-only countries)'),
('TEC', 'Europe & Central Asia (IDA & IBRD countries)'),
('DEC', 'Europe & Central Asia (IDA-eligible countries)'),
('CEU', 'Europe and Central Asia (IFC classification)'),
('EUU', 'European Union'),
('FRO', 'Faroe Islands'),
('FJI', 'Fiji'),
('FIN', 'Finland'),
('FCS', 'Fragile and conflict affected situations'),
('FRA', 'France'),
('PYF', 'French Polynesia'),
('GAB', 'Gabon'),
('GMB', 'Gambia, The'),
('GEO', 'Georgia'),
('DEU', 'Germany'),
('GHA', 'Ghana'),
('GIB', 'Gibraltar'),
('GRC', 'Greece'),
('GRL', 'Greenland'),
('GRD', 'Grenada'),
('GUM', 'Guam'),
('GTM', 'Guatemala'),
('GIN', 'Guinea'),
('GNB', 'Guinea-Bissau'),
('GUY', 'Guyana'),
('HTI', 'Haiti'),
('HPC', 'Heavily indebted poor countries (HIPC)'),
('HIC', 'High income'),
('HND', 'Honduras'),
('HKG', 'Hong Kong SAR, China'),
('HUN', 'Hungary'),
('BHI', 'IBRD countries classified as high income'),
('IBD', 'IBRD only'),
('IBB', 'IBRD, including blend'),
('ISL', 'Iceland'),
('IBT', 'IDA & IBRD total'),
('IDB', 'IDA blend'),
('DFS', 'IDA countries classified as Fragile Situations'),
('FXS', 'IDA countries classified as fragile situations, excluding Sub-Saharan Africa'),
('DSF', 'IDA countries in Sub-Saharan Africa classified as fragile situations '),
('DNS', 'IDA countries in Sub-Saharan Africa not classified as fragile situations '),
('DNF', 'IDA countries not classified as Fragile Situations'),
('NXS', 'IDA countries not classified as fragile situations, excluding Sub-Saharan Africa'),
('IDX', 'IDA only'),
('IDA', 'IDA total'),
('DXS', 'IDA total, excluding Sub-Saharan Africa'),
('IND', 'India'),
('IDN', 'Indonesia'),
('IRN', 'Iran, Islamic Rep.'),
('IRQ', 'Iraq'),
('IRL', 'Ireland'),
('IMN', 'Isle of Man'),
('ISR', 'Israel'),
('ITA', 'Italy'),
('JAM', 'Jamaica'),
('JPN', 'Japan'),
('JOR', 'Jordan'),
('KAZ', 'Kazakhstan'),
('KEN', 'Kenya'),
('KIR', 'Kiribati'),
('PRK', 'Korea, Dem. People\'s Rep.'),
('KOR', 'Korea, Rep.'),
('XKX', 'Kosovo'),
('KWT', 'Kuwait'),
('KGZ', 'Kyrgyz Republic'),
('LAO', 'Lao PDR'),
('LTE', 'Late-demographic dividend'),
('LCN', 'Latin America & Caribbean '),
('LAC', 'Latin America & Caribbean (excluding high income)'),
('BLA', 'Latin America & the Caribbean (IBRD-only countries)'),
('TLA', 'Latin America & the Caribbean (IDA & IBRD countries)'),
('DLA', 'Latin America & the Caribbean (IDA-eligible countries)'),
('LCR', 'Latin America and the Caribbean'),
('CLA', 'Latin America and the Caribbean (IFC classification)'),
('LVA', 'Latvia'),
('LDC', 'Least developed countries: UN classification'),
('LBN', 'Lebanon'),
('LSO', 'Lesotho'),
('LBR', 'Liberia'),
('LBY', 'Libya'),
('LIE', 'Liechtenstein'),
('LTU', 'Lithuania'),
('LMY', 'Low & middle income'),
('LIC', 'Low income'),
('LMC', 'Lower middle income'),
('LUX', 'Luxembourg'),
('MAC', 'Macao SAR, China'),
('MDG', 'Madagascar'),
('MWI', 'Malawi'),
('MYS', 'Malaysia'),
('MDV', 'Maldives'),
('MLI', 'Mali'),
('MLT', 'Malta'),
('MHL', 'Marshall Islands'),
('MRT', 'Mauritania'),
('MUS', 'Mauritius'),
('MEX', 'Mexico'),
('FSM', 'Micronesia, Fed. Sts.'),
('MEA', 'Middle East & North Africa'),
('MNA', 'Middle East & North Africa (excluding high income)'),
('BMN', 'Middle East & North Africa (IBRD-only countries)'),
('TMN', 'Middle East & North Africa (IDA & IBRD countries)'),
('DMN', 'Middle East & North Africa (IDA-eligible countries)'),
('MDE', 'Middle East (developing only)'),
('CME', 'Middle East and North Africa (IFC classification)'),
('MIC', 'Middle income'),
('MDA', 'Moldova'),
('MCO', 'Monaco'),
('MNG', 'Mongolia'),
('MNE', 'Montenegro'),
('MAR', 'Morocco'),
('MOZ', 'Mozambique'),
('MMR', 'Myanmar'),
('NAM', 'Namibia'),
('NRU', 'Nauru'),
('NPL', 'Nepal'),
('NLD', 'Netherlands'),
('NCL', 'New Caledonia'),
('NZL', 'New Zealand'),
('NIC', 'Nicaragua'),
('NER', 'Niger'),
('NGA', 'Nigeria'),
('NRS', 'Non-resource rich Sub-Saharan Africa countries'),
('NLS', 'Non-resource rich Sub-Saharan Africa countries, of which landlocked'),
('NAF', 'North Africa'),
('NAC', 'North America'),
('MKD', 'North Macedonia'),
('MNP', 'Northern Mariana Islands'),
('NOR', 'Norway'),
('INX', 'Not classified'),
('OED', 'OECD members'),
('OMN', 'Oman'),
('OSS', 'Other small states'),
('PSS', 'Pacific island small states'),
('PAK', 'Pakistan'),
('PLW', 'Palau'),
('PAN', 'Panama'),
('PNG', 'Papua New Guinea'),
('PRY', 'Paraguay'),
('PER', 'Peru'),
('PHL', 'Philippines'),
('POL', 'Poland'),
('PRT', 'Portugal'),
('PST', 'Post-demographic dividend'),
('PRE', 'Pre-demographic dividend'),
('PRI', 'Puerto Rico'),
('QAT', 'Qatar'),
('RRS', 'Resource rich Sub-Saharan Africa countries'),
('RSO', 'Resource rich Sub-Saharan Africa countries, of which oil exporters'),
('ROU', 'Romania'),
('RUS', 'Russian Federation'),
('RWA', 'Rwanda'),
('WSM', 'Samoa'),
('SMR', 'San Marino'),
('STP', 'Sao Tome and Principe'),
('SAU', 'Saudi Arabia'),
('SEN', 'Senegal'),
('SRB', 'Serbia'),
('SYC', 'Seychelles'),
('SLE', 'Sierra Leone'),
('SGP', 'Singapore'),
('SXM', 'Sint Maarten (Dutch part)'),
('SVK', 'Slovak Republic'),
('SVN', 'Slovenia'),
('SST', 'Small states'),
('SLB', 'Solomon Islands'),
('SOM', 'Somalia'),
('ZAF', 'South Africa'),
('SAS', 'South Asia'),
('TSA', 'South Asia (IDA & IBRD)'),
('DSA', 'South Asia (IDA-eligible countries)'),
('CSA', 'South Asia (IFC classification)'),
('SSD', 'South Sudan'),
('SCE', 'Southern Cone'),
('ESP', 'Spain'),
('LKA', 'Sri Lanka'),
('KNA', 'St. Kitts and Nevis'),
('LCA', 'St. Lucia'),
('MAF', 'St. Martin (French part)'),
('VCT', 'St. Vincent and the Grenadines'),
('SSF', 'Sub-Saharan Africa '),
('SSA', 'Sub-Saharan Africa (excluding high income)'),
('BSS', 'Sub-Saharan Africa (IBRD-only countries)'),
('TSS', 'Sub-Saharan Africa (IDA & IBRD countries)'),
('DSS', 'Sub-Saharan Africa (IDA-eligible countries)'),
('CAA', 'Sub-Saharan Africa (IFC classification)'),
('SXZ', 'Sub-Saharan Africa excluding South Africa'),
('XZN', 'Sub-Saharan Africa excluding South Africa and Nigeria'),
('SDN', 'Sudan'),
('SUR', 'Suriname'),
('SWE', 'Sweden'),
('CHE', 'Switzerland'),
('SYR', 'Syrian Arab Republic'),
('TWN', 'Taiwan, China'),
('TJK', 'Tajikistan'),
('TZA', 'Tanzania'),
('THA', 'Thailand'),
('TLS', 'Timor-Leste'),
('TGO', 'Togo'),
('TON', 'Tonga'),
('TTO', 'Trinidad and Tobago'),
('TUN', 'Tunisia'),
('TUR', 'Turkey'),
('TKM', 'Turkmenistan'),
('TCA', 'Turks and Caicos Islands'),
('TUV', 'Tuvalu'),
('UGA', 'Uganda'),
('UKR', 'Ukraine'),
('ARE', 'United Arab Emirates'),
('GBR', 'United Kingdom'),
('USA', 'United States'),
('UMC', 'Upper middle income'),
('URY', 'Uruguay'),
('UZB', 'Uzbekistan'),
('VUT', 'Vanuatu'),
('VEN', 'Venezuela, RB'),
('VNM', 'Vietnam'),
('VIR', 'Virgin Islands (U.S.)'),
('PSE', 'West Bank and Gaza'),
('WLD', 'World'),
('YEM', 'Yemen, Rep.'),
('ZMB', 'Zambia'),
('ZWE', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_code` char(1) NOT NULL DEFAULT 'O',
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_code`, `description`) VALUES
('B', 'Bi'),
('F', 'Female'),
('M', 'Male'),
('O', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` bigint(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image_path` varchar(100) DEFAULT NULL,
  `product_price` bigint(20) NOT NULL,
  `product_stock` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `product_desc` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image_path`, `product_price`, `product_stock`, `category_id`, `product_desc`) VALUES
(1, 'Gecko Kalimba K17K with EQ', '12501603643f4703724ca300b60d6efe.jpg', 525000, 20, 1, 'Alat musik tradisional Afrika Kalimba dengan equalizer, sering disebut piano jempol merek Gecko USA. Semua Kalimba sudah kami stel sehingga anda tinggal menggunakan.dengan 17 tangga nada, sudah termasuk set alat tuning.'),
(2, 'Africa Kalimba Thumb Piano 17 key K17CAS', 'a64625cfdf928807f3a20f73757b8f50.jpg', 475000, 20, 1, 'Kalimba piano Afrika/Piano Jempol tipe K17CAS teridiri dari 17 note, Merk Gecko sudah termauk set untuk tuning beserta buku musik.'),
(3, 'Gecko natural wood professional 17 keys kalimba', '182920d9dfa3f7a6e95a54de4151846c.jpg', 480000, 20, 1, 'Kalimba piano Afrika/Piano Jempol teridiri dari 17 note, Merk Gecko sudah termauk set untuk tuning beserta buku musik.'),
(4, 'gecko rosewood african kalimba thumb piano', '9df2347305ec520491a948a5264b09a8.png', 500000, 20, 1, 'Kalimba piano Afrika/Piano Jempol body kayu rosewood teridiri dari 17 note, Merk Gecko sudah termauk set untuk tuning beserta buku musik.'),
(5, '10 Keys Kalimba Mbira Likembe Sanza', '63761b935e502a6389f1145351d42f46.jpg', 350000, 20, 1, 'Kalimba 10 Note Gecko tipe Mbira Likembe Sanza, sudah termasuk dengan set untuk tunning.'),
(6, '10 keys kalimba African thumb piano', '0c8662500921b66e5a94296cdbad13bf.jpg', 300000, 20, 1, 'Kalimba Gecko 10 Key Afrika, Piano jempol sudah termasuk set untuk tunning dan buku musik.'),
(7, 'Africa Kalimba Thumb Piano 10 Notes Mahogany', 'dd9fe33d1fd2c9ecb40d0f53dcfca1c4.jpg', 300000, 20, 1, 'Body menggunakan Kayu Mahogany berkualitas asli USA, Kalimba Gecko 10 Key sudah termasuk set untuk tunning dan buku panduan.'),
(8, '10 Keys Kalimba Mbira Likembe Sanza Thumb Piano Pine Light Yellow', 'fd6829431cecc43f60b3e30915401cd9.jpg', 350000, 20, 1, 'Kalimba Gecko 10 Key warna Kuning Terang, sudah termasuk set untuk tunning dan buku musik.'),
(9, 'Natural 17 carbon steel Keys Kalimba Mbira Thumb Piano Traditional Musical Instrument Portable rosewood', 'c3ebef331280b641a1e47b9ae4b32d38.jpg', 400000, 20, 1, 'Kalimba17 Key Bahan Kayu Rosewood berkualitas, dijamin Original Import dari USA. Barang sudah termasuk set untuk tunning dan buku musik.'),
(10, '10 Keys Kalimba Mbira Likembe Sanza Thumb Piano Pine Red', 'a0ed32db82d9668a706de424d9ce80c5.jpg', 350000, 20, 1, 'Kalimba Gecko 10 Key warna Merah, sudah termasuk set untuk tunning dan buku musik.'),
(11, 'Luvay Kalimba 17 Key Mahogany White', '0d6ecf08b74e36a857a0ecab03943634.jpg', 475000, 20, 1, 'Kalimba Merk Luvay 17 Key Warna putih, Kalimba sudah termasuk dengan set alat untuk tunning.'),
(12, 'Luvay Kalimba 17 Key Mahogany Maroon', 'e868b9e8b4ca401b0e69751825220659.jpg', 450000, 20, 1, 'Kalimba Merk Luvay 17 Key Warna Merah Maroon, Kalimba sudah termasuk dengan set alat untuk tunning.'),
(13, '10Keys African Wood Kalimba Red', '32df698c0018938fe6c1087c3796d33a.jpg', 350000, 20, 1, 'Kalimba Merk Luvay 10  Key Warna Merah ,Kalimba sudah termasuk dengan set alat untuk tunning.'),
(14, 'Stagg Mahogany 10 Key Kalimba', '15d520036c128ab8423f20c2e62eaa63.jpg', 400000, 20, 1, 'Kalimba alat musik afrika/piano jempol merk Stagg teridiri dari 10 nada. Kalimba sudah dituning sehingga bisa langsung dimainkan.'),
(15, 'Solid Mahogany Luvay Kalimba 17 Keys Kiwi', 'ba68f50dee1f38c6336d21e5c110ca24.jpg', 500000, 20, 1, 'Kalimba lucu bentuk kiwi merk Luvay terdiri dari 17 Nada.'),
(16, '17 Key Kimi Kalimba Acrylic Bear Shapped', 'a18a697745927e891434035f954a34a0.jpg', 600000, 20, 1, 'Kalimba alat musik afrika warna bening bentuk beruang merk Kimi, terdiri dari 17 Key.'),
(17, '17 Key Kimi Kalimba Acrylic Cat Paw Shapped', 'e6b65ca9782a4b7adf858fdde1446f1e.png', 600000, 20, 1, 'Kalimba alat musik afrika warna bening bentuk tapak kucing merk Kimi, terdiri dari 17 Key.'),
(18, '17 Key Kimi Kalimba Acrylic Cat Shapped', '563464e2e995af2547f1e8269e460880.jpg', 600000, 20, 1, 'Kalimba alat musik afrika warna bening bentuk kucing merk Kimi, terdiri dari 17 Key.'),
(19, '17 Key Mahogany Leaf Sound Hole', 'c4da0c47e94322fb2d0cd31a782a9ea7.jpg', 500000, 20, 1, 'ADM Kalimba Afrika Motif Daun , Dari Kayu Mahogany asli terdiri dari 17 Key. Memiliki lubang untuk resosnansi suara.'),
(20, '17 Key Mahogany Sun Sound Hole', '8007a83e330221d16a9d1d5d5bfd8554.png', 500000, 19, 1, 'ADM Kalimba Afrika Motif Matahari , Dari Kayu Mahogany asli terdiri dari 17 Key. Memiliki lubang untuk resosnansi suara.');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `transaction_detail_id` bigint(20) NOT NULL,
  `transaction_header_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `product_price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`transaction_detail_id`, `transaction_header_id`, `product_id`, `quantity`, `product_price`) VALUES
(1, 1, 20, 1, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_header`
--

CREATE TABLE `transaction_header` (
  `transaction_header_id` bigint(20) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_header`
--

INSERT INTO `transaction_header` (`transaction_header_id`, `total_price`, `timestamp`, `user_id`) VALUES
(1, 500000, '2030-05-20 12:56:37', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender_code` char(1) NOT NULL DEFAULT 'O',
  `country_code` char(3) NOT NULL,
  `user_image_path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `full_name`, `dob`, `gender_code`, `country_code`, `user_image_path`) VALUES
(1, 'admin', '$2y$10$J8d9pUILR6Ylezy5fdQeOeJwId0cQI1GD5ReW2cV7samAjWw8J8GG', 'Administrator', '2018-03-19', 'O', 'IDN', NULL),
(2, 'kalimba_user', '$2y$10$RG.WSNUXGTACHLNZiFsXPurRmcLB4VMdki7YTJ0zfz5kkBRl5uUyy', 'Pengguna Kalimba', '2018-03-19', 'B', 'AUS', NULL),
(3, 'raratamvan', '$2y$10$dF2hG4R8OrXwpHmEnjLVmubJuiXqnN5n1JdBiTrVCMQUhKrw1MFhq', 'asdsad', '2018-05-30', 'F', 'BEN', NULL),
(4, 'kevin', '$2y$10$H3udPFyfCRh5Wr9om/wKJ.EV9rc8QHJJntiFpsgmZp9FLXh3JpSm2', 'kevin ganteng', '2020-05-30', 'M', 'AFG', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_code`),
  ADD UNIQUE KEY `country_name` (`country_name`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_code`),
  ADD UNIQUE KEY `gender_code` (`gender_code`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Product_fk0` (`category_id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`transaction_detail_id`),
  ADD KEY `Transaction_Detail_fk0` (`transaction_header_id`),
  ADD KEY `Transaction_Detail_fk1` (`product_id`);

--
-- Indexes for table `transaction_header`
--
ALTER TABLE `transaction_header`
  ADD PRIMARY KEY (`transaction_header_id`),
  ADD KEY `Transaction_Header_fk0` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `User_fk0` (`gender_code`),
  ADD KEY `User_fk1` (`country_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `transaction_detail_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction_header`
--
ALTER TABLE `transaction_header`
  MODIFY `transaction_header_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Cart_fk0` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Product_fk0` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `Transaction_Detail_fk0` FOREIGN KEY (`transaction_header_id`) REFERENCES `transaction_header` (`transaction_header_id`),
  ADD CONSTRAINT `Transaction_Detail_fk1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `transaction_header`
--
ALTER TABLE `transaction_header`
  ADD CONSTRAINT `Transaction_Header_fk0` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `User_fk0` FOREIGN KEY (`gender_code`) REFERENCES `gender` (`gender_code`),
  ADD CONSTRAINT `User_fk1` FOREIGN KEY (`country_code`) REFERENCES `country` (`country_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
