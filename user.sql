-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2022 年 2 月 17 日 11:54
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `user`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `name`, `email`, `password`) VALUES
(28, 'haradasan3', 'harada3@tonkotsu.com', '$2y$10$oRcqfn37.tZIKfHKFDxF8.7GDRcj6Nn0QVIcnFtpEKhMVkekKQpI2'),
(29, 'kunitakesan', 'kunitakesan@tonkotsu.com', '$2y$10$UMiuSqmabM8VavXUSPjL5.KYcHntKd/Rt58lPvLTFkVmexxCEjKRC'),
(30, 'aragosta77', 'aragosta2@tonkotsu.com', '$2y$10$3Tz7AlhF.beJPq7ruMZFi.zAa/AosmNFfDK/3fnAAN4MULtdIssta'),
(31, 'hagasan99', 'haga2@tonkotsu.com', '$2y$10$69zMxGWbyq4EuYs6hJBpcur/WshYc4W971FW6O/mmo2yY4JTsikh2'),
(32, 'sonodasan2', 'sonoda2@tonkotsu.com', '$2y$10$RrCq/fC0AXhulU6u/rJQSOCW5nXinP2PHxAF2bTkh9e90kbiIVOOy'),
(33, 'deguchisan2', 'deguchi2@tonkotsu.com', '$2y$10$/AomAWwNo30kj3BBGF4TD.jgBTGUnHkU8OXzK7OHtXWlGNWoNRzBa'),
(34, 'haradasan2', 'harada2@tonkotsu.com', '$2y$10$/J3NYGQVdl7si2T.i2GC6utBb.J3uTiz/2s86tzsIM7ZJI.Ttdy/S'),
(35, 'kunitakesan2', 'kunitakesan2@tonkotsu.com', '$2y$10$vZ9h6t.9W1olGuu9Gvk.keI/5G3m88Mg22eLNwNwGpYbAzhCDfeVa');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
