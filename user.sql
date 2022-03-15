-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2022 年 3 月 13 日 12:35
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
(4, 'club Mentai', 'mentai@tonkotsu.com', 'K-POP', '20代中心のK-POPが流れるお店です。', 'upload/20220311091345dee291aa72f72b3df6713caa8e3c9c25.png', '$2y$10$GNb4xlmY/1BEOMA/DEPimu8Z8bVbITmlFmNohdjX0T5seoRRY7kAO'),
(5, 'bar G\'s FUKUOKA', 'gs@tonkotsu.com', 'EDM', 'プログラマーが集まるバーです。', 'upload/20220311091236d7b63d7f1f29641d9366d70f6405800a.png', '$2y$10$3h.xLkC/uP7fCr9kilJklOoXsg8Tf0voGIFWDN.GXCtMDCK0a8hxa'),
(6, 'bar G\'s FUKUOKA2', 'gs@h.com', 'EDM', 'sdhkshkdsj', 'upload/202203101226131762ba29e6c253f7b0d27ef499d108a8.png', '$2y$10$435MUcxUfsCG7gmwScY6.es9n2rWZ0A6nSEy0XKoeGh.kTlEsh6F.'),
(7, 'club TONKOTSU', 'tonkotsu@t.com', 'ROCK', '「とんこつロックをおみまいするぜ！」をモットーに、ロックなイベントを開催しています。', 'upload/20220311092634dee291aa72f72b3df6713caa8e3c9c25.png', '$2y$10$Zq76YnrLLRvjAc4AllTU6egSuaFJgqXgHVh/AhO1SRCtcMc07rufe'),
(8, 'bar YAMACHAN', 'yamachan@y.com', 'その他', '親富孝通りのラーメンと言ったらやまちゃん。フロアを盛り上げてくれるバイト募集中です。', 'upload/20220311093025fedaf6327736e009c5d8a2640bdc8643.png', '$2y$10$yTjckm8WE0F/LlzygqD0pe42SRdnPmgdc6ttfjREN62coFTbpNwDa');

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
(74, 'DJ DEGUCHI', 'deguchi@d.com', 'EDM', 'EDMをメインに選曲し、女の子を踊らせるのが得意です。', 'https://soundcloud.com/djdeguchi', 'upload/20220311084528c5f7a15034bfb21d2866615e44787009.png', '$2y$10$xU2jSuDZoxRsyVmChmbtn.k1MPX78.ir2k8f5UiWuQZZXzGrbW5Fa'),
(75, 'DJ HAGA', 'haga@h.com', 'HIPHOP/R&B', '日本語ラップメインで選曲していきます。', 'https://soundcloud.com/djhaga', 'upload/202203110729351762ba29e6c253f7b0d27ef499d108a8.png', '$2y$10$3dtP0vrhXyqt4Wo2YcTuBOMf6MKZAe8na/Zwk0s8cPc6eiUrIANbu'),
(76, 'DJ SONODA', 'sonoda@s.com', 'K-POP', 'K-POPから何でも繋いでいくオールラウンダーです。マイクで話すとイケボと言われます。ノート作ってます。', 'https://soundcloud.com/sonoda', 'upload/202203110731191762ba29e6c253f7b0d27ef499d108a8.png', '$2y$10$i5qFepNYiBdDGDubJTd1S.3BIVDwgKC963eK3B8SEMzmRNA9fOx1G'),
(77, 'DJ KUNITAKE', 'kunitake@k.com', 'ANISON', '趣味が城を見にいく事なので、主に戦国時代が舞台のアニメの曲をメインで選曲します。あとは奥さんが韓流ドラマにハマっているので、K-POPも織り交ぜていきます。解像度上げていきます。', 'https://soundcloud.com/djkunitake', 'upload/202203110733421762ba29e6c253f7b0d27ef499d108a8.png', '$2y$10$vEXdQdAsojO5zazufwhgvOsnBbzqijtw7/8/MnpM8jzLeXoDvDciq'),
(78, 'DJ HARADA', 'harada@h.com', 'ROCK', 'ワンオクロックが好きなのでそこからフロアの状況を見ながら、お客さんの熱量に合わせてその場にあったROCKを選曲します。', 'https://soundcloud.com/djharada', 'upload/202203110736361762ba29e6c253f7b0d27ef499d108a8.png', '$2y$10$H625..27j2v4wuZTueeSiuO8QfIeZVpb21PIf.liHCYk7PzVCi5nm'),
(79, 'DJ ENOKI', 'enoki@e.com', 'その他', 'その場を一気に緑の世界に誘います。It\'s a green world', 'https://soundcloud.com/djenoki', 'upload/202203110737561762ba29e6c253f7b0d27ef499d108a8.png', '$2y$10$oOeIYFBZvQZJBUAEQdqyJuT8kbAfQNC9VuqWu5MwzHoYraDC9jlOy'),
(80, 'DJ ARAGOSTA', 'aragosta@a.com', 'REGGAE', 'レゲエが得意です。気付いたらフロアに踊りに行ってしまうこともありますが、そこを含めよろしくお願いします。', 'https://soundcloud.com/yuki-djaragosta-yuki', 'upload/202203110931382b418c55329b76bc799993a3c2223eea.jpg', '$2y$10$p.U48QHhiFIN23b0Z/jk4eyBFYcrQje1fKCAtKKZghPlwxDY.byVq'),
(81, 'DJ めんたいこ', 'menntai@m.com', 'HIPHOP/R&B', 'えんたい', 'https://soundcloud.com/mentai', 'upload/2022031205160996c341642585a58deceeab4c4d8706fc.png', '$2y$10$dooxPOs5Ee9uqsPJOlLlTeWkm803AtYlT9FGdpXf8waVMVYPXFb/O'),
(82, 'DJ SHINO', 'shino@s.com', 'ROCK', 'ロックが好きです。バンドもできます。', 'https://soundcloud.com/djshino', 'upload/2022031206061082a20c604bcd142939f1ba5aae3dd4b2.png', '$2y$10$/JJemqVbAdPWeDmc.GZlM.2QZbxkCS2tMpPCjIqGx.ujCGVJvVslK');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
