-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2026 at 05:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `levelupzone`
--
CREATE DATABASE IF NOT EXISTS `levelupzone` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `levelupzone`;

-- --------------------------------------------------------

--
-- Table structure for table `accessory`
--

CREATE TABLE `accessory` (
  `id` int(11) NOT NULL,
  `categorie` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `imgPath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessory`
--

INSERT INTO `accessory` (`id`, `categorie`, `name`, `description`, `price`, `stock`, `imgPath`) VALUES
(1, 'headset', 'HyperX Cloud 3', 'Gaming headset HyperX Cloud 3', 450, 3, '/projetWeb/backend/images/accessories/ac3.jpg'),
(2, 'headset', 'Logitech G Pro X', 'Logitech G Pro X gaming headset', 600, 5, '/projetWeb/backend/images/accessories/ac4.jpg'),
(3, 'mouse', 'Logitech Superlight 2', 'Wireless gaming mouse Superlight 2', 550, 2, '/projetWeb/backend/images/accessories/ac1.jpg'),
(4, 'mouse', 'Endgame Gear XM1r', 'High precision gaming mouse XM1r', 320, 5, '/projetWeb/backend/images/accessories/ac2.jpg'),
(5, 'keyboard', 'Wooting 80HE', 'Analog mechanical gaming keyboard', 900, 5, '/projetWeb/backend/images/accessories/ac6.jpg'),
(6, 'keyboard', 'Royal Kludge M75', 'Mechanical keyboard RK M75', 280, 5, '/projetWeb/backend/images/accessories/ac5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `id` int(11) NOT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `imgPath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`id`, `categorie`, `name`, `description`, `price`, `stock`, `imgPath`) VALUES
(1, 'cpu', 'Ryzen 5 9500F', 'AMD Ryzen 5 9500F gaming processor', 750, 5, '/projetWeb/backend/images/components/cp1.jpg'),
(2, 'cpu', 'Ryzen 7 9700X3D', 'AMD Ryzen 7 9700X3D high-end gaming CPU', 1350, 3, '/projetWeb/backend/images/components/cp2.jpg'),
(3, 'gpu', 'RTX 4070 Super', 'NVIDIA RTX 4070 Super graphics card', 2200, 4, '/projetWeb/backend/images/components/cp3.jpg'),
(4, 'ram', 'Corsair Vengeance 32GB', '32GB DDR5 gaming RAM', 420, 6, '/projetWeb/backend/images/components/cp4.jpg'),
(5, 'storage', 'Samsung 990 Pro 1TB', '1TB NVMe SSD', 380, 5, '/projetWeb/backend/images/components/cp5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `desktop`
--

CREATE TABLE `desktop` (
  `id` int(11) NOT NULL,
  `cpu` varchar(50) DEFAULT NULL,
  `gpu` varchar(50) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `storages` varchar(50) DEFAULT NULL,
  `motherboard` varchar(50) DEFAULT NULL,
  `psu` varchar(50) DEFAULT NULL,
  `cooler` varchar(50) DEFAULT NULL,
  `tower` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `imgPath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desktop`
--

INSERT INTO `desktop` (`id`, `cpu`, `gpu`, `ram`, `storages`, `motherboard`, `psu`, `cooler`, `tower`, `description`, `stock`, `price`, `imgPath`) VALUES
(1, 'Intel Core i5-12400F', 'RTX 3060 12GB', '16GB DDR4 3200MHz', '512GB NVMe SSD', 'MSI PRO B660M-A', 'Corsair CV550 550W', 'DeepCool AK400', 'NZXT H510', 'Mid-range gaming PC, great for 1080p gaming', 8, 2199.00, '/projetWeb/backend/images/desktops/dt1.jpg'),
(2, 'AMD Ryzen 5 5600X', 'RX 6650 XT 8GB', '16GB DDR4 3200MHz', '512GB NVMe SSD', 'Gigabyte B550M DS3H', 'EVGA 600W BR', 'AMD Wraith Stealth', 'Cooler Master Q300L', 'AMD budget gaming build, excellent price/performance', 6, 1899.00, '/projetWeb/backend/images/desktops/dt2.jpg'),
(3, 'Intel Core i7-13700F', 'RTX 4070 12GB', '32GB DDR4 3600MHz', '1TB NVMe SSD', 'ASUS PRIME Z690-P', 'Seasonic Focus GX-750', 'Noctua NH-D15', 'Fractal Design Pop Air', 'High-end gaming rig, handles 1440p with ease', 4, 4299.00, '/projetWeb/backend/images/desktops/dt3.jpg'),
(4, 'Intel Core i3-12100F', 'GTX 1660 Super 6GB', '8GB DDR4 2666MHz', '256GB NVMe SSD', 'MSI H610M-E DDR4', 'Thermaltake Smart 500W', 'Intel Stock Cooler', 'Zalman S2 TF', 'Entry-level build for casual gaming and daily use', 12, 1299.00, '/projetWeb/backend/images/desktops/dt4.jpg'),
(5, 'AMD Ryzen 9 7900X', 'RTX 4080 16GB', '32GB DDR5 5600MHz', '2TB NVMe SSD', 'ASUS ROG Crosshair X670E', 'Corsair RM1000x 1000W', 'NZXT Kraken X63 280mm', 'Lian Li PC-O11 Dynamic', 'Premium workstation and gaming beast', 2, 7499.00, '/projetWeb/backend/images/desktops/dt5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `imgPath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `name`, `price`, `imgPath`) VALUES
(1, 'PlayerUnknown\'s Battlegrounds', 36.00, '/projetWeb/backend/images/games/gm1.jpg'),
(2, 'Counter-Strike 2', 48.00, '/projetWeb/backend/images/games/gm2.jpg'),
(3, 'R.E.P.O', 15.00, '/projetWeb/backend/images/games/gm3.jpg'),
(4, 'Cyberpunk 2077', 90.00, '/projetWeb/backend/images/games/gm4.jpg'),
(5, 'Elden Ring', 120.00, '/projetWeb/backend/images/games/gm5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `cpu` varchar(50) DEFAULT NULL,
  `gpu` varchar(50) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `storages` varchar(50) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `keyboard` varchar(20) DEFAULT NULL,
  `camera` varchar(50) DEFAULT NULL,
  `ports` varchar(100) DEFAULT NULL,
  `charger` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `imgPath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`id`, `brand`, `model`, `cpu`, `gpu`, `ram`, `storages`, `size`, `keyboard`, `camera`, `ports`, `charger`, `description`, `stock`, `price`, `imgPath`) VALUES
(1, 'ASUS', 'ROG Strix G15', 'AMD Ryzen 7 6800H', 'RTX 3070 Ti 8GB', '16GB DDR5 4800MHz', '1TB NVMe SSD', '15.6\"', 'QWERTY', '720p HD', 'USB-A x3, USB-C, HDMI 2.0, RJ45', 240, 'High-performance gaming laptop with 165Hz display', 5, 3899.00, '/projetWeb/backend/images/laptops/lp1.jpg'),
(2, 'Lenovo', 'IdeaPad Gaming 3', 'Intel Core i5-12500H', 'RTX 3050 4GB', '8GB DDR4 3200MHz', '512GB NVMe SSD', '15.6\"', 'AZERTY', '720p HD', 'USB-A x2, USB-C, HDMI 1.4', 65, 'Budget-friendly gaming laptop for 1080p gaming', 9, 1999.00, '/projetWeb/backend/images/laptops/lp2.jpg'),
(3, 'HP', 'Victus 16', 'Intel Core i7-12700H', 'RTX 3060 6GB', '16GB DDR4 3200MHz', '512GB NVMe SSD + 1TB HDD', '16.1\"', 'AZERTY', '1080p FHD', 'USB-A x3, USB-C, HDMI 2.1, SD Card', 135, 'Versatile gaming and productivity laptop', 7, 2799.00, '/projetWeb/backend/images/laptops/lp3.jpg'),
(4, 'MSI', 'Titan GT77', 'Intel Core i9-12900HX', 'RTX 3080 Ti 16GB', '64GB DDR5 4800MHz', '2TB NVMe SSD', '17.3\"', 'QWERTY', '1080p FHD', 'USB-A x3, USB-C x2, HDMI 2.1, Thunderbolt 4, SD Card', 330, 'Absolute desktop-replacement beast, no compromises', 2, 9999.00, '/projetWeb/backend/images/laptops/lp4.jpg'),
(5, 'Acer', 'Nitro 5', 'AMD Ryzen 5 6600H', 'RX 6600M 8GB', '16GB DDR5 4800MHz', '512GB NVMe SSD', '15.6\"', 'AZERTY', '720p HD', 'USB-A x2, USB-C, HDMI 2.0, RJ45', 135, 'Reliable AMD gaming laptop at an accessible price', 11, 1749.00, '/projetWeb/backend/images/laptops/lp5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `refreshRate` int(11) DEFAULT NULL,
  `responseTime` float DEFAULT NULL,
  `panel` varchar(50) DEFAULT NULL,
  `resolution` varchar(50) DEFAULT NULL,
  `ports` varchar(100) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `imgPath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`id`, `brand`, `model`, `refreshRate`, `responseTime`, `panel`, `resolution`, `ports`, `size`, `description`, `stock`, `price`, `imgPath`) VALUES
(1, 'Samsung', 'Odyssey G5', 165, 1, 'VA', '2560x1440', 'HDMI 2.0, DisplayPort 1.2', '27\"', 'Curved 1440p gaming monitor with excellent contrast ratio', 6, 899, '/projetWeb/backend/images/monitors/mn1.jpg'),
(2, 'LG', 'UltraGear 27GP850', 180, 1, 'IPS', '2560x1440', 'HDMI 2.0 x2, DisplayPort 1.4, USB-A x2', '27\"', 'Fast IPS 1440p panel, great colors and response time for competitive gaming', 4, 1199, '/projetWeb/backend/images/monitors/mn2.jpg'),
(3, 'AOC', 'C24G2AE', 165, 1, 'VA', '1920x1080', 'HDMI 1.4 x2, DisplayPort 1.2, VGA', '24\"', 'Budget curved 1080p gaming monitor, solid choice for entry-level setups', 10, 599, '/projetWeb/backend/images/monitors/mn3.jpg'),
(4, 'ASUS', 'ROG Swift PG279QM', 240, 1, 'IPS', '2560x1440', 'HDMI 2.0, DisplayPort 1.4, USB-A x2, USB-C', '27\"', 'Premium 240Hz 1440p monitor for competitive and enthusiast gamers', 3, 2199, '/projetWeb/backend/images/monitors/mn4.jpg'),
(5, 'MSI', 'Optix MAG274QRF', 165, 1, 'IPS', '2560x1440', 'HDMI 2.0 x2, DisplayPort 1.4, USB-A x3, USB-C', '27\"', 'Well-rounded 1440p IPS gaming monitor with USB hub and great build quality', 7, 1099, '/projetWeb/backend/images/monitors/mn5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessory`
--
ALTER TABLE `accessory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desktop`
--
ALTER TABLE `desktop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessory`
--
ALTER TABLE `accessory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `component`
--
ALTER TABLE `component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `desktop`
--
ALTER TABLE `desktop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

--
-- Dumping data for table `pma__navigationhiding`
--

INSERT INTO `pma__navigationhiding` (`username`, `item_name`, `item_type`, `db_name`, `table_name`) VALUES
('root', 'properties', 'table', 'rent_sell_platform', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"levelupzone\",\"table\":\"accessory\"},{\"db\":\"chaieb_info\",\"table\":\"desktop\"},{\"db\":\"chaieb_info\",\"table\":\"component\"},{\"db\":\"chaieb_info\",\"table\":\"accessory\"},{\"db\":\"chaieb_info\",\"table\":\"game\"},{\"db\":\"chaieb_info\",\"table\":\"laptop\"},{\"db\":\"chaieb_info\",\"table\":\"monitor\"},{\"db\":\"chiebinfo\",\"table\":\"accessory\"},{\"db\":\"rent_sell_platform\",\"table\":\"properties\"},{\"db\":\"rent_sell_platform\",\"table\":\"users\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2026-05-02 15:24:18', '{\"Console\\/Mode\":\"show\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `rent_sell_platform`
--
CREATE DATABASE IF NOT EXISTS `rent_sell_platform` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rent_sell_platform`;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` varchar(20) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `userId`, `firstName`, `lastName`) VALUES
('CL001', 6, 'Alice', 'Johnson'),
('CL002', 7, 'Bob', 'Williams');

-- --------------------------------------------------------

--
-- Table structure for table `hotelrooms`
--

CREATE TABLE `hotelrooms` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `roomType` enum('Standard','Double','Suite','Luxe') NOT NULL,
  `pricePerNight` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `propertyId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `hasRestaurant` tinyint(1) DEFAULT NULL,
  `availableRooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `companyName` varchar(50) DEFAULT NULL,
  `role` enum('agency','owner','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `userId`, `companyName`, `role`) VALUES
(1, 3, 'Sunshine Properties', 'owner'),
(2, 4, 'Golden Estates', 'owner'),
(3, 5, 'Prime Realty Agency', 'agency');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `propertyType` enum('house','appartement','hotel') NOT NULL,
  `listingType` enum('rent','sale','hotel') NOT NULL,
  `address` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('disponible','loue','enAttente') NOT NULL,
  `hasPool` tinyint(1) DEFAULT NULL,
  `state` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `ownerId`, `description`, `propertyType`, `listingType`, `address`, `price`, `status`, `hasPool`, `state`) VALUES
(18, 1, 'Beautiful 3-bedroom house with garden and modern amenities', 'house', 'sale', '123 Maple Street, Springfield, USA', 350000.00, 'disponible', 1, NULL),
(19, 1, 'Cozy 2-bedroom apartment in city center', 'appartement', 'rent', '456 Oak Avenue, Downtown, USA', 1500.00, 'disponible', 0, NULL),
(20, 2, 'Luxury beachfront villa with pool and ocean view', 'house', 'rent', '789 Beach Road, Miami, USA', 5000.00, 'disponible', 1, NULL),
(21, 2, 'Modern studio apartment near university', 'appartement', 'sale', '321 College Street, Boston, USA', 220000.00, 'loue', 0, NULL),
(22, 3, 'Boutique hotel in tourist district', 'hotel', 'hotel', '555 Tourist Boulevard, Las Vegas, USA', 200.00, 'disponible', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `propertyimages`
--

CREATE TABLE `propertyimages` (
  `id` int(11) NOT NULL,
  `propertyId` int(11) DEFAULT NULL,
  `imagePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `propertyId` int(11) NOT NULL,
  `pricePeriod` enum('day','week','month','year') NOT NULL,
  `minStay` int(11) NOT NULL,
  `numberOfRooms` int(11) NOT NULL,
  `numberOfToilets` int(11) NOT NULL,
  `garage` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `propertyId` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `propertyId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `cmnt` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 0 and `rating` <= 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `propertyId` int(11) NOT NULL,
  `numberOfRooms` int(11) NOT NULL,
  `numberOfToilets` int(11) NOT NULL,
  `garage` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `password`) VALUES
(1, 'john.doe@email.com', '+1234567890', '$2y$10$abcdefghijklmnopqrstuv'),
(2, 'jane.smith@email.com', '+1234567891', '$2y$10$abcdefghijklmnopqrstuv'),
(3, 'owner1@email.com', '+1234567892', '$2y$10$abcdefghijklmnopqrstuv'),
(4, 'owner2@email.com', '+1234567893', '$2y$10$abcdefghijklmnopqrstuv'),
(5, 'agency1@email.com', '+1234567894', '$2y$10$abcdefghijklmnopqrstuv'),
(6, 'client1@email.com', '+1234567895', '$2y$10$abcdefghijklmnopqrstuv'),
(7, 'client2@email.com', '+1234567896', '$2y$10$abcdefghijklmnopqrstuv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `hotelrooms`
--
ALTER TABLE `hotelrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelId` (`hotelId`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`propertyId`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ownerId` (`ownerId`);

--
-- Indexes for table `propertyimages`
--
ALTER TABLE `propertyimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propertyId` (`propertyId`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`propertyId`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `propertyId` (`propertyId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `propertyId` (`propertyId`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`propertyId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotelrooms`
--
ALTER TABLE `hotelrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `propertyimages`
--
ALTER TABLE `propertyimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotelrooms`
--
ALTER TABLE `hotelrooms`
  ADD CONSTRAINT `hotelrooms_ibfk_1` FOREIGN KEY (`hotelId`) REFERENCES `hotels` (`propertyId`) ON DELETE CASCADE;

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `partners` (`id`);

--
-- Constraints for table `propertyimages`
--
ALTER TABLE `propertyimages`
  ADD CONSTRAINT `propertyimages_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`propertyId`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`propertyId`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `properties` (`id`) ON DELETE CASCADE;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
