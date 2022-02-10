-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2022 年 2 月 10 日 12:27
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
(1, 'aragosta', 'aaaaa@tonkotsu.com', '$2y$10$JX90ncqLbdesIsPn34rdxOCJGe3l.DLlTI2seiqILPsylP4NV8jFi'),
(2, 'omigiri', 'ooooo@tonkotsu.com', '$2y$10$AHuLDAftkU1tTfCdH8Zva.UQFORufTGFTwLR9Nm.gDDLWkOM0O.lu'),
(3, 'hagasan', 'haga@tonkotsu.com', '$2y$10$04k5rQPAC9PyKBLKJw3YTeGERimiTWmYil5J3Xm/w2BMzZhFvNJXu'),
(4, 'deguchisan', 'deguchi@tonkotsu.com', '$2y$10$8jEGvhEJ34AVqUSfyc/JreglgmGB2LN1/l8AhYD8NndwFF0FJK69q'),
(5, 'kunitakesan', 'kunitakesan@tonkotsu.com', '$2y$10$ieGfPi2ggu.M3GgHiwoj4OmH7wMGWuBwH.Sno7l4gA54x/JU667EO'),
(6, 'haradasan', 'harada@tonkotsu.com', '$2y$10$4p1/dbA22a/PpdrvTauIEuJvjASG328zBytDLoCw6gdfFCkby2FmO'),
(7, 'sonodasan', 'sonoda@tonkotsu.com', '$2y$10$dRRgaIbMEXRm0uzhLLhOteJpyjghhpojjXUFVScfxa3JDkLdyr4Cm');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
