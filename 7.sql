-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-06-06 23:40:24
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `7`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `admin`
--

INSERT INTO `admin` (`id`, `mail`, `password`, `created_at`) VALUES
(5, 'admin@admin.com', '$2y$10$GIUHiOxC843OFG.Hy/cs7ebRPNDE8OJlFmrC5P3B.9Gg8wVhW3596', '2023-06-05 11:46:34');

-- --------------------------------------------------------

--
-- テーブルの構造 `contracts`
--

CREATE TABLE `contracts` (
  `id` int(32) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(255) NOT NULL,
  `post` int(11) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `contracts`
--

INSERT INTO `contracts` (`id`, `name`, `tel`, `post`, `address`, `type`) VALUES
(1, '山田タロウ', '09081145774', 1000000, '東京都千代田区', '戸建て'),
(2, '山田タロウ', '9081145774', 2790014, '千葉県浦安市明海', '戸建て');

-- --------------------------------------------------------

--
-- テーブルの構造 `customer`
--

CREATE TABLE `customer` (
  `id` int(32) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `customer`
--

INSERT INTO `customer` (`id`, `username`, `mail`, `password`, `created_at`, `update_at`) VALUES
(17, 'test', 'test@test.com', '$2y$10$zS9Sv./LVvbDqX6Vq/RT9OvDLvrVnxvxacei8MhUoY5ZLCF8pZP4a', '2023-06-05 17:46:56', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `id` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `speed` int(11) NOT NULL,
  `apart_price` int(11) NOT NULL,
  `family_price` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `point` varchar(255) NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `name`, `url`, `speed`, `apart_price`, `family_price`, `cost`, `period`, `point`, `del_flg`, `updated_at`) VALUES
(1, 'SB光', 'https://www.softbank.jp/internet/', 1, 4730, 6270, 26400, 2, '回線工事費用実質無料・乗り換え費用実質無料・SB携帯とのセット割引', 0, '2023-06-02 14:14:19'),
(2, 'auひかり', 'https://www.au.com/internet/', 1, 3740, 5390, 41250, 3, 'au携帯とのセット割引・50,000円キャッシュバック', 0, '2023-05-26 01:08:07'),
(3, 'ドコモ光', 'https://gmobb.jp/service/docomohikari/', 2, 4400, 5720, 0, 2, '回線工事費用完全無料・ドコモ携帯とのセット割引・dポイント2,000ポイント付与', 0, '2023-05-26 01:06:01'),
(4, 'ビックローブ光', 'https://join.biglobe.ne.jp/ftth/hikari/', 2, 4378, 5478, 19800, 2, '回線工事費用実質無料・最大55,000円キャッシュバック・UQ/au携帯とのセット割引', 0, '2023-05-26 01:07:09');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルの AUTO_INCREMENT `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- テーブルの AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
