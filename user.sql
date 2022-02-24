-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2022 年 2 月 24 日 15:59
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
-- テーブルの構造 `shop_table`
--

CREATE TABLE `shop_table` (
  `id` int(12) NOT NULL,
  `image` mediumblob NOT NULL,
  `extension` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `shop_table`
--

INSERT INTO `shop_table` (`id`, `image`, `extension`, `shopname`, `email`, `genre`, `profile`, `password`) VALUES
(2, '', '', 'bar G\'s FUKUOKA', 'gs@tonkotsu.com', 'EDM,KPOP', 'GEEKが集まるお店です。', '$2y$10$PwyCLFQdts8fTBa59IV0feNMMYPz3kzfzDEeQBbQbM9S/YaBC4ree'),
(4, '', '', 'club Mentai', 'mentai@tonkotsu.com', 'kpop', '20代中心のK-POPが流れるお店です。', '$2y$10$N81AmukDgcAN7OaW/8lP1uk1qENv2vVJykHNzqHfAfHNhTcUNVhmy'),
(5, '', '', 'bar G\'s FUKUOKA', 'gs@tonkotsu.com', 'EDM', 'プログラマーが集まるバーです。', '$2y$10$VERxDWARwScIYLWHS4jC3e1bMpkrn6bsh368IO31J7QyA2vTjBdVi');

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `URL` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `name`, `email`, `genre`, `profile`, `URL`, `password`) VALUES
(49, 'aragosta8', 'aragosta@tonkotsu.com', 'hiphopr&b', 'ssssss', 'https://soundcloud.com/yuki-djaragosta-yuki?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing', '$2y$10$qIybNqeLMmgH3bA0jI5T/uPzjcUXrvYsLh9FrjLe4SIJNJZmMTkNy'),
(55, 'aragosta2', 'aaa@tonkotsu.com', 'reggae,hiphop,edm,kpop', 'sjsjdsajhsadasdhjaskhjdsahdjhshsdasjghdj', 'https://soundcloud.com/yuki-djaragosta-yuki?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing', '$2y$10$VodrSgbwHIYdqCSvqFmj8.GgGoFPlP/lBtcfwQtXVQQAtNGDAdPBW'),
(56, 'DJ hanamaru', 'hanamaru@tonkotsu.com', 'reggae', '1970年04月08日173cm /72kg B型福岡県 福岡市早良区出身。趣味は野球観戦(ソフトバンクホークス)/サウナ/競艇/ランチ探し/ゴルフ/テニス。ものまねが得意です。', 'https://profile.yoshimoto.co.jp/talent/detail?id=213', '$2y$10$ypjpc5veCS.Azhw5wpuDqOKv2Dd.14tVB9OwPZcX10w74/L5EzFku'),
(58, 'aragosta7', 'djaragosta12262@gmail.com', 'reggae', 'dahsdgjasgdahdjasfhadsgfhdsgkfjsdgkfads', 'https://soundcloud.com/yuki2-djaragosta-yuki?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing', '$2y$10$B9jbwWebgxo0DbZalRW5NOx6ksV.idbM/4GZFcnqlkxsMRXKeNNGO');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `shop_table`
--
ALTER TABLE `shop_table`
  ADD PRIMARY KEY (`id`);

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
-- テーブルの AUTO_INCREMENT `shop_table`
--
ALTER TABLE `shop_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
