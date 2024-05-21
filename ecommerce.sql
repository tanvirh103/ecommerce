-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 11:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartinfo`
--

CREATE TABLE `cartinfo` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cartinfo`
--

INSERT INTO `cartinfo` (`cartid`, `userid`, `productid`) VALUES
(8, 4, 2),
(9, 4, 12),
(10, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `helpline`
--

CREATE TABLE `helpline` (
  `helplineid` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `helpline`
--

INSERT INTO `helpline` (`helplineid`, `sender`, `receiver`, `message`) VALUES
(4, 'tasnim@gmail.com', 'helpline.ecommerce@gmail.com', 'I faced some problem when i want to payment from bkash');

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `paymentid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `productprice` varchar(50) NOT NULL,
  `purchasedate` varchar(50) NOT NULL,
  `purchasequantity` int(11) NOT NULL,
  `purchasestatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentinfo`
--

INSERT INTO `paymentinfo` (`paymentid`, `userid`, `username`, `productid`, `productname`, `productprice`, `purchasedate`, `purchasequantity`, `purchasestatus`) VALUES
(6, 4, 'sanjana103', 2, 'Benco C1 Mobile', '1025', '07-05-2024', 1, 'Inactive'),
(7, 4, 'sanjana103', 12, 'A4Tech FG10 Fstyler Wireless Mouse Accessories', '560', '07-05-2024', 1, 'Inactive'),
(8, 4, 'sanjana103', 6, 'CURREN 8301 MENS MILITARY SPORTS WATCHES MALE ANAL', '14500', '07-05-2024', 1, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `productinfo`
--

CREATE TABLE `productinfo` (
  `productid` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `productcategory` varchar(50) NOT NULL,
  `productprice` varchar(50) NOT NULL,
  `productquantity` varchar(50) NOT NULL,
  `productdescription` varchar(500) NOT NULL,
  `productstatus` varchar(50) NOT NULL,
  `productpic` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productinfo`
--

INSERT INTO `productinfo` (`productid`, `productname`, `productcategory`, `productprice`, `productquantity`, `productdescription`, `productstatus`, `productpic`, `userid`) VALUES
(1, 'Hallo Classic Mobile', 'mobile', '1018', '109', 'Model: Classic\nDisplay: 1.77\" TFT Color Display\nCamera: Digital Camera\nBattery: Li-Ion 1000mAh, removable\nFeatures: 3.5mm Jack, Torch Light, Vibration', 'Suspend', 'uploads/image/product/mobile1.png', 0),
(2, 'Benco C1 Mobile', 'mobile', '1025', '79', 'Model: C1\r\nDisplay: 1.77\" QQVGA Display\r\nProcessor: MTK6261D Chipset\r\nCamera: Digital Camera\r\nBattery: Li-Ion 1000mAh, removable', 'Active', 'uploads/image/product/mobile1.png', 0),
(3, 'Realme C30s Smartphone Mobile', 'mobile', '12000', '31', 'Model: C30s\r\nDisplay: 6.5\" HD+ Display\r\nProcessor: Unisoc SC9863A (28 nm)\r\nCamera: Single 8MP Rear, 5MP Front\r\nFeatures: 5000mAh Battery', 'Active', 'uploads/image/product/mobile3.png', 0),
(4, 'Samsung Galaxy A14 Smartphone Mobile', 'mobile', '15600', '48', 'Model: Galaxy A14\r\nDisplay: 6.6-inch FHD+ (1080 x 2408)\r\nProcessor: Mediatek MT6769 Helio G80 (12 nm)\r\nCamera: Triple 50+5+2MP Rear, 13MP Front\r\nFeatures: 5000mAh Li-Ion Battery', 'Active', 'uploads/image/product/mobile4.png', 0),
(5, 'Infinix Note 40 Pro Smartphone Mobile', 'mobile', '30000', '43', 'MPN: X6851\r\nModel: Note 40 Pro\r\nDisplay: 6.78\" FHD+ 120Hz AMOLED Display\r\nProcessor: Mediatek Dimensity 7020 (6 nm)\r\nCamera: Triple 108+2MP+2MP Rear, 32MP Front\r\nFeatures: Under Display Fingerprint, 45W Fast Charge, IP53', 'Inactive', 'uploads/image/product/mobile5.png', 0),
(6, 'CURREN 8301 MENS MILITARY SPORTS WATCHES MALE ANAL', 'watch', '14500', '33', 'Style:Fashion & casual\r\nClasp type:Buckle\r\nWater resistance depth:3bar\r\nMovement:Quartz\r\nCase material:Stainless steel\r\nBand length:23cm\r\nDial window material type:Glass\r\nCase thickness:13mm\r\nBand width:22mm', 'Active', 'uploads/image/product/watch1.png', 0),
(7, 'SINOBI MEN\'S ROTATIONAL WATCH STAINLESS STEEL MESH', 'watch', '56000', '23', 'ITEM TYPE: QUARTZ WRISTWATCHFEATURE: WATER RESISTANT, SHOCK RESISTANTBAND MATERIAL TYPE: STAINLESS STEELCLASP TYPE: HOOK BUCKLECASE THICKNESS: 9.5MMMOVEMENT: QUARTZBAND WIDTH: 22MMBAND LENGTH: 23CMDIAL WINDOW MATERIAL TYPE: HARDLEXDIAL DIAMETER: 40MMWATER RESISTANCE DEPTH: 3BARCASE MATERIAL: ALLOYCASE SHAPE: ROUNDONE YEAR INTERNATIONAL WARRANTY', 'Inactive', 'uploads/image/product/watch2.png', 0),
(8, 'CASIO ENTICER BLACK LEATHER STRAP WATCH MTP-VD01L-', 'watch', '67000', '76', 'This Casio Enticer watch is a sophisticated accessory that exudes a classic elegance with its black leather strap and stainless steel bezel. Timeless, versatile styling ensures it complements any outfit to add a touch of refined style.', 'Active', 'uploads/image/product/watch3.png', 0),
(9, 'FOSSIL GRANT SERIES BROWN CHRONOGRAPH LEATHER MEN\'', 'watch', '34583', '61', 'The Fossil Grant series Brown Chronograph Leather Men\'s Watch is a stylish and reliable timepiece. Boasting a classic brown leather band and chronograph dial, this watch offers a dependable way to stay on top of your daily schedule. With its quartz movement and mineral dial window, it is built to last for years to come.', 'Active', 'uploads/image/product/watch4.png', 0),
(10, 'FOSSIL TOWNSMAN TWIST DARK BROWN LEATHER MEN\'S WAT', 'watch', '15600', '56', 'Elevate your style with the FOSSIL Townsman Twist Dark Brown Leather Men\'s Watch. Its unique twist design and dark brown leather band exude sophistication and luxury. This watch is the epitome of timeless elegance and will be sure to make a statement wherever you go.', 'Suspend', 'uploads/image/product/watch5.png', 0),
(11, 'Logitech Z120 Stereo Speaker Accessories', 'accessories', '1450', '53', 'Enjoy high-quality audio with the Logitech Z120 Stereo Speaker Set. The device produces a 1.2 W RMS audio output to offer you an audio delight. Whether it\'s your favourite movies, videos, audios, games and more, the Stereo Speakers play crystal-clear and great sound.', 'Active', 'uploads/image/product/accessories1.png', 0),
(12, 'A4Tech FG10 Fstyler Wireless Mouse Accessories', 'accessories', '560', '233', '●︎ Type: Wireless\r\n\r\n●︎ Sensor: Optical 2000 DPI\r\n\r\n●︎ Connection: 2.4GHz\r\n\r\n●︎ Nano USB Receiver\r\n\r\n●︎ Keys : 4 Button\r\n\r\n●︎ Dimension(LxWxH) : 108 × 64 × 35 Mm\r\n\r\n●︎ Weight : 67 G ( Batteries Not Included)\r\n\r\n●︎ Battery Life : 1AA Alkaline Battery', 'Active', 'uploads/image/product/accessories2.png', 0),
(13, 'AULA F2058 RGB Mechanical Gaming Keyboard Accessories', 'accessories', '5600', '45', 'AULA F2058 keyboard 108-key macro programming can be customized to make the game more enjoyable and more powerful.AULA F2058 keyboard Adopt anti-ghost full-key no-rush design, press at the same time, and respond to trigger, reject key conflicts.AULA F2058 keyboard Configure the multimedia control button area with multimedia buttons and multi-function alloy knobs.', 'Active', 'uploads/image/product/accessories3.png', 0),
(14, 'A4TECH BLOODY G230P STEREO SURROUND SOUND GAMING HEADPHONE Accessories', 'accessories', '3456', '35', 'Stereo Surround Sound\r\n\r\nThe high-precision 50 mm speaker positions the sound directly in the ear for gaming-grade sound quality.\r\n\r\n50 mm Speaker Unit\r\n\r\nA unique laser-trimmed diaphragm offers an extremely accurate reproduction of the gaming audio.', 'Inactive', 'uploads/image/product/accessories4.png', 0),
(15, 'Edifier R103V Multimedia Speaker Accessories', 'accessories', '4567', '78', 'Edifier R103V \r\nThe Edifier R103V subwoofer uses a classic black color for an overall dignified and elegant appearance. The subwoofer is made of vertical cubic design. The medium density fiberboard material that helps keep the woofers still while resonating deep beats.\r\n\r\nFeatures:\r\nFrequency: 150 Hz - 20 KHz\r\n\r\nWeight: 3kg', 'Active', 'uploads/image/product/accessories5.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userid` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profilep` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userid`, `fullname`, `username`, `phone`, `email`, `password`, `profilep`, `role`, `status`) VALUES
(4, 'SANJANA AHMED SHUSME', 'sanjana103', '01775648953', 'sanjana@gmail.com', '12345678', 'uploads/image/default.jpg', 'Customer', 'Active'),
(5, 'HASIBUL HAQUE BAPPY', 'hasibul103', '01815089753', 'hasibul@gmail.com', '12345678', 'uploads/image/default.jpg', 'Manager', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartinfo`
--
ALTER TABLE `cartinfo`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `helpline`
--
ALTER TABLE `helpline`
  ADD PRIMARY KEY (`helplineid`);

--
-- Indexes for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `productinfo`
--
ALTER TABLE `productinfo`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartinfo`
--
ALTER TABLE `cartinfo`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `helpline`
--
ALTER TABLE `helpline`
  MODIFY `helplineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `productinfo`
--
ALTER TABLE `productinfo`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
