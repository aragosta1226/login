-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2022 年 3 月 10 日 12:29
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
-- テーブルの構造 `like_table`
--

CREATE TABLE `like_table` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `shop_id` int(12) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `like_table`
--

INSERT INTO `like_table` (`id`, `user_id`, `shop_id`, `created_at`) VALUES
(1, 49, 49, '2022-03-02 13:01:09'),
(2, 55, 55, '2022-03-02 13:01:42'),
(3, 56, 56, '2022-03-02 13:01:45'),
(4, 58, 58, '2022-03-02 13:01:47'),
(8, 55, 55, '2022-03-02 13:08:45'),
(9, 4, 2, '2022-03-03 14:55:53'),
(10, 4, 2, '2022-03-03 15:10:08'),
(11, 55, 55, '2022-03-03 15:10:24'),
(12, 49, 49, '2022-03-03 15:14:20'),
(13, 49, 49, '2022-03-03 15:15:12'),
(14, 49, 49, '2022-03-03 15:15:23'),
(15, 4, 2, '2022-03-03 15:26:57'),
(16, 2, 2, '2022-03-03 15:28:42'),
(17, 4, 2, '2022-03-03 15:32:50'),
(24, 2, 4, '2022-03-03 16:15:28'),
(25, 49, 4, '2022-03-03 16:37:19'),
(26, 58, 2, '2022-03-03 16:45:37'),
(27, 58, 4, '2022-03-03 16:47:11'),
(28, 58, 5, '2022-03-03 16:47:13'),
(29, 55, 4, '2022-03-04 16:24:41'),
(30, 55, 2, '2022-03-05 13:07:02');

-- --------------------------------------------------------

--
-- テーブルの構造 `shop_table`
--

CREATE TABLE `shop_table` (
  `id` int(12) NOT NULL,
  `shopname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `shop_table`
--

INSERT INTO `shop_table` (`id`, `shopname`, `email`, `genre`, `profile`, `img`, `password`) VALUES
(2, 'bar G\'s FUKUOKA', 'gs@tonkotsu.com', 'EDM,KPOP', 'GEEKが集まるお店です。', NULL, '$2y$10$PwyCLFQdts8fTBa59IV0feNMMYPz3kzfzDEeQBbQbM9S/YaBC4ree'),
(4, 'club Mentai', 'mentai@tonkotsu.com', 'kpop', '20代中心のK-POPが流れるお店です。', NULL, '$2y$10$N81AmukDgcAN7OaW/8lP1uk1qENv2vVJykHNzqHfAfHNhTcUNVhmy'),
(5, 'bar G\'s FUKUOKA', 'gs@tonkotsu.com', 'EDM', 'プログラマーが集まるバーです。', NULL, '$2y$10$VERxDWARwScIYLWHS4jC3e1bMpkrn6bsh368IO31J7QyA2vTjBdVi'),
(6, 'bar G\'s FUKUOKA2', 'gs@h.com', 'EDM', 'sdhkshkdsj', 'upload/202203101226131762ba29e6c253f7b0d27ef499d108a8.png', '$2y$10$435MUcxUfsCG7gmwScY6.es9n2rWZ0A6nSEy0XKoeGh.kTlEsh6F.');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `URL` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `name`, `email`, `genre`, `profile`, `URL`, `img`, `password`) VALUES
(49, 'aragosta8', 'aragosta@tonkotsu.com', 'hiphopr&b', 'ssssss', 'https://soundcloud.com/yuki-djaragosta-yuki?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing', NULL, '$2y$10$qIybNqeLMmgH3bA0jI5T/uPzjcUXrvYsLh9FrjLe4SIJNJZmMTkNy'),
(55, 'aragosta2', 'aaa@tonkotsu.com', 'reggae,hiphop,edm,kpop', 'sjsjdsajhsadasdhjaskhjdsahdjhshsdasjghdj', 'https://soundcloud.com/yuki-djaragosta-yuki?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing', NULL, '$2y$10$VodrSgbwHIYdqCSvqFmj8.GgGoFPlP/lBtcfwQtXVQQAtNGDAdPBW'),
(56, 'DJ hanamaru', 'hanamaru@tonkotsu.com', 'reggae', '1970年04月08日173cm /72kg B型福岡県 福岡市早良区出身。趣味は野球観戦(ソフトバンクホークス)/サウナ/競艇/ランチ探し/ゴルフ/テニス。ものまねが得意です。', 'https://profile.yoshimoto.co.jp/talent/detail?id=213', NULL, '$2y$10$ypjpc5veCS.Azhw5wpuDqOKv2Dd.14tVB9OwPZcX10w74/L5EzFku'),
(58, 'aragosta', 'djaragosta12262@gmail.com', 'reggae,hiphop,edm', 'dahsdgjasgdahdjasfha', 'https://soundcloud.com/yuki2-djaragosta-yuki?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing', NULL, '$2y$10$Qdj3sFjHeVtZcVZMN05uMOHcxZA2wq2GNIoVRdJu42DYiB6sqxel6'),
(59, 'とんこつラーメン', 'tonkotsu4@tonkotsu.com', 'reggae', 'sdhdkhkjsadks', 'https://soundcloud.com/yuki5-djaragosta-yuki', NULL, '$2y$10$VxHuJ3cYgWeOg7xUUvjPG.HoSpZ3VBMHGF3ir/r5.QPIXd1m7AhcO'),
(60, '牧のうどん', 'm@g.com', 'EDM', 'hjkjhkhkh', 'https://soundcloud.com/yuki2-djaragosta-yuki', NULL, '$2y$10$BPoNncRIOG.yGAmxNborQ.fxBQTlxXVqayeQzV/TewnBPPL2g7mju'),
(61, 'sss', 'sss@s.com', 'EDM', 'sahdkhkhdhdk', 'https://soundcloud.com/yuki-djaragosta-yuki', NULL, '$2y$10$xkkjz/60k18jxFHfsCMru.MlO3Jag2PPA36gQdl0q8L.p..zrGgEe'),
(62, 'あらごすた', 'a@a.com', 'reggae', 'dsdsifgdfgykau', 'https://soundcloud.com/yuki-djaragosta-yuki', NULL, '$2y$10$EKeZufDjzVdQBScbP6zNj.eFEZ5GSyMGH23Q3bUQxNJY.JQixeyLe'),
(63, 'aragostd', 'aragosta@h.com', 'reggae', 'dasdshkjd', 'https://soundcloud.com/yuk1i-djaragosta-yuki', NULL, '$2y$10$7xWUZlRbn3lkJ0cK2FeCb.1g1I.kdqmjnGC7GJVw/mVSRmKYYnyPm'),
(64, 'DJ ARAGOSTA3', 'aragosta@j.com', 'EDM', 'hghfhhjfhf', 'https://soundcloud.com/yuki5-djaragosta-yuki', NULL, '$2y$10$sOQDptbg/Gys7TzZ5//yRujCehY0dLpaVswVhk4z4JVDFMjHewIxS'),
(65, 'ss', 'ss@s.com', 'reggae', 'jhgjfhghfh', 'https://soundcloud.com/yuki3-djaragosta-yuki', NULL, '$2y$10$HAU.zELoVtZ1AfxLknAx2.1NaoGw0N1rTSbY/PfRvryJQCJ3jYsJG'),
(66, 'hjsdfkshd', 'aragostaj@g.com', 'anison', 'sdkjkfhskhadfljk', 'https://soundcloud.com/yuki4-djaragosta-yuki', 'Array', '$2y$10$U9dNg5br9U01R5KrcdVG4uwzZLPJRML0mwqu.S7Y8fj19NoKnGiOm'),
(67, 'gjhgjhkj', 'aragosta@k.com', 'anison', 'hkjhkhkhjkh', 'https://soundcloud.com/yuki6-djaragosta-yuki', NULL, '$2y$10$PG03nVB4.U/AQUc741e/2Ou61KYZh74d4IiHz2MW8PxJHYQuLfAK6'),
(68, 'd', 'aragostaf@g.com', 'reggae', 'sdjgjasdhgasj', 'https://soundcloud.com/yukiq-djaragosta-yuki', NULL, '$2y$10$2KbJG601xCr2jn0k8wqdWuQ72zFoymM2TwWnMWkkxdcBZwBJRZTLe'),
(69, 'a', 's', 'h', ' f', 'f', 'g', 'f'),
(70, 'd', 'aragostad@g.com', 'reggae', 'asdadkhdjk', 'https://soundcloud.com/yuki3-djaragosta-yuki', 'upload/202203100845131762ba29e6c253f7b0d27ef499d108a8.jpeg', '$2y$10$KiNMXhv5xvgOltKxRre4zeVidQUhM8ZKB7zbEZXM0C6Nqe3bz3F06'),
(71, 'x', 'aragostax@c.com', 'EDM', 'czcdjsfksdl', 'https://soundcloud.com/yuki2f-djaragosta-yuki', 'upload/202203100846231762ba29e6c253f7b0d27ef499d108a8.jpeg', '$2y$10$uT5YicP/PWiiPoLC5Tq7w.B.PD36tBhKVBNOILHc.LJn167Cx2Cre'),
(72, 's', 'aragostad@f.com', 'reggae', 'dsdasjkhdas', 'https://soundcloud.com/yuki2-djaragosta-yuki', 'upload/202203100847351762ba29e6c253f7b0d27ef499d108a8.jpeg', '$2y$10$Ox5EAfKtfJ2t53mKxTfBbuC0y6V4q5aWFaaQOh1sdtG87sg4KZ.A2'),
(73, 'dshjsdk', 'aragosta@f.com', 'anison', 'sdashkhsdkjs', 'https://soundcloud.com/yuki2-djaragosta-yuki', 'upload/202203100849451762ba29e6c253f7b0d27ef499d108a8.jpeg', '$2y$10$ttY5YalcDyMRWL3NBu0S3uClQ8kihGN8Nh0vvx/73eW1ljeEOLFS2');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `shop_table`
--
ALTER TABLE `shop_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `like_table`
--
ALTER TABLE `like_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- テーブルの AUTO_INCREMENT `shop_table`
--
ALTER TABLE `shop_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
