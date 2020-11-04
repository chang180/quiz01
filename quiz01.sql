-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-11-04 05:02:17
-- 伺服器版本： 10.4.13-MariaDB
-- PHP 版本： 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `quiz01`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `acc` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admins`
--

INSERT INTO `admins` (`id`, `acc`, `pw`, `created_at`, `updated_at`) VALUES
(4, 'admin', '$2y$10$KBE1.NMUtKCMvyBacReifundX1rHbuei9LqGj5n9NMRdvlrN6ecpS', '2020-11-02 19:44:39', '2020-11-02 19:46:15'),
(5, 'test1', '$2y$10$CPd1Ukk0QWKhoqo04vnkS.iMWuq0BUHCcTTjG1t2wc/pSyIwnOF/i', '2020-11-02 19:46:02', '2020-11-02 19:46:02');

-- --------------------------------------------------------

--
-- 資料表結構 `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` tinyint(1) DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ads`
--

INSERT INTO `ads` (`id`, `text`, `sh`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, '轉知臺北教育大學與臺灣師大合辦第11屆麋研齋全國硬筆書法比賽活動', 1, NULL, '2020-10-15 18:50:35', '2020-10-15 18:50:35'),
(3, '轉知:法務部辦理「第五屆法規知識王網路闖關競賽辦法', 1, NULL, '2020-10-15 18:51:11', '2020-10-15 18:51:11'),
(4, '轉知2012年全國青年水墨創作大賽活動', 1, NULL, '2020-10-15 18:51:20', '2020-10-15 19:10:27'),
(5, '欣榮圖書館101年悅讀達人徵文比賽，歡迎全校師生踴躍投稿參加', 1, NULL, '2020-10-15 18:51:28', '2020-10-15 18:51:28'),
(6, '轉知:教育是人類升沉的樞紐-2013教師生命成長營', 1, NULL, '2020-10-15 18:51:36', '2020-10-15 19:06:35');

-- --------------------------------------------------------

--
-- 資料表結構 `bottoms`
--

CREATE TABLE `bottoms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bottom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `bottoms`
--

INSERT INTO `bottoms` (`id`, `bottom`, `sh`, `created_at`, `updated_at`) VALUES
(1, '2020科技大學版權所有', 1, '2020-10-17 18:38:58', '2020-10-29 19:10:31');

-- --------------------------------------------------------

--
-- 資料表結構 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `images`
--

INSERT INTO `images` (`id`, `img`, `sh`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '01D01.jpg', 1, NULL, '2020-10-17 22:27:44', '2020-10-17 22:29:06'),
(2, '01D02.jpg', 1, NULL, '2020-10-17 22:27:51', '2020-10-17 22:27:51'),
(3, '01D03.jpg', 1, NULL, '2020-10-17 22:27:57', '2020-10-17 22:27:57'),
(4, '01D04.jpg', 1, NULL, '2020-10-17 22:28:01', '2020-10-17 23:03:52'),
(5, '01D05.jpg', 1, NULL, '2020-10-17 22:28:06', '2020-10-17 22:28:06'),
(6, '01D06.jpg', 1, NULL, '2020-10-17 22:28:13', '2020-10-17 22:28:13'),
(7, '01D07.jpg', 1, NULL, '2020-10-17 22:28:19', '2020-10-17 22:28:19'),
(11, '01D08.jpg', 1, NULL, '2020-10-17 22:29:29', '2020-10-17 22:29:29'),
(12, '01D09.jpg', 1, NULL, '2020-10-17 22:29:35', '2020-10-17 22:29:35'),
(13, '01D10.jpg', 1, NULL, '2020-10-17 22:29:41', '2020-10-17 22:29:41');

-- --------------------------------------------------------

--
-- 資料表結構 `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `sh` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `menus`
--

INSERT INTO `menus` (`id`, `name`, `href`, `parent`, `sh`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '網站首頁', '/', NULL, 1, NULL, '2020-10-20 18:38:15', '2020-10-20 18:38:15'),
(3, '管理登入', '/login', NULL, 1, NULL, '2020-10-20 20:06:39', '2020-10-29 16:42:00');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2020_10_10_052216_create_titles_table', 1),
(23, '2020_10_10_063240_create_ads_table', 1),
(24, '2020_10_10_063745_create_bottoms_table', 1),
(25, '2020_10_10_063924_create_images_table', 1),
(26, '2020_10_10_064052_create_menus_table', 1),
(27, '2020_10_10_064653_create_mvims_table', 1),
(28, '2020_10_10_064746_create_news_table', 1),
(29, '2020_10_10_064918_create_totals_table', 1),
(30, '2020_10_18_061125_create_sub_menus_table', 2),
(31, '2020_10_18_062105_create_admins_table', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `mvims`
--

CREATE TABLE `mvims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mvims`
--

INSERT INTO `mvims` (`id`, `img`, `sh`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '01C01.gif', 1, NULL, '2020-10-20 17:23:24', '2020-10-20 17:23:24'),
(2, '01C02.gif', 1, NULL, '2020-10-20 17:23:31', '2020-10-20 17:23:31'),
(3, '01C03.gif', 1, NULL, '2020-10-20 17:23:38', '2020-10-20 17:23:38'),
(4, '01C04.gif', 1, NULL, '2020-10-20 17:23:48', '2020-10-20 17:23:48'),
(5, '01C05.gif', 1, NULL, '2020-10-20 17:23:54', '2020-10-20 17:23:54'),
(6, '01C06.gif', 1, NULL, '2020-10-20 17:24:01', '2020-10-20 17:24:01');

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`id`, `text`, `sh`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '教師研習「世界公民生命園丁國內研習會」\r\n1.主辦單位：世界展望會\r\n2.研習日期：101年11月14日（三）～15日（四）\r\n3.詳情請參考：\r\nhttp://gc.worldvision.org.tw/seed.html。\r\n請線上報名。', 1, NULL, '2020-10-20 18:27:14', '2020-10-20 18:27:14'),
(2, '公告綜合高中一年級英數補救教學時間\r\n上課日期:10/27.11/3.11/10.11/24共計四次\r\n上課時間:早上8:00~11:50半天\r\n費用:全程免費\r\n參加同學:綜合科一年級第一次段考成績需加強者\r\n已將名單送交各班及導師\r\n參加同學請帶紙筆.課本.第一次段考考卷\r\n並將家長通知單給家長\r\n若有任何疑問\r\n請洽綜合高中學程主任', 1, NULL, '2020-10-20 18:27:28', '2020-10-20 18:27:28'),
(3, '102年全國大專校院運動會\r\n「主題標語及吉祥物命名」\r\n網路票選活動\r\n一、活動期間：自10月25日起至11月4日止。\r\n二、相關訊息請上宜蘭大學首頁連結「102全大運在宜大」\r\n活動網址：http://102niag.niu.edu.tw/', 1, NULL, '2020-10-20 18:27:41', '2020-10-20 18:27:41'),
(4, '台灣亞洲藝術文化教育交流學會第一屆年會國際研討會\r\n活動日期：101年3月3～4日(六、日)\r\n活動主題：創造力、文化、全人教育\r\n有意參加者請至http://www.caaetaiwan.org下載報名表', 1, NULL, '2020-10-20 18:27:50', '2020-10-20 18:27:50'),
(5, '11月23日(星期五)將於彰化縣田尾鄉菁芳園休閒農場\r\n舉辦「高中職生涯輔導知能研習」\r\n中區學校每校至多2名\r\n以普通科、專業類科教師優先報名參加\r\n生涯規劃教師次之，參加人員公差假\r\n並核實派代課\r\n當天還有專車接送(8:35前在員林火車站集合)\r\n如此好康的機會，怎能錯過？！\r\n熱烈邀請師長們向輔導室(分機234)報名\r\n名額有限，動作要快！！\r\n報名截止日期：本周四 10月25日17:00前！', 1, NULL, '2020-10-20 18:28:00', '2020-10-20 18:28:00'),
(6, '台視百萬大明星節目辦理海選活動\r\n時間:101年10月27日下午13時\r\n地點:彰化', 1, NULL, '2020-10-20 18:28:08', '2020-10-20 18:28:08'),
(7, '國立故宮博物院辦理\r\n「商王武丁與后婦好 殷商盛世文化藝術特展」暨\r\n「赫赫宗周 西周文化特展」', 1, NULL, '2020-10-20 18:28:17', '2020-10-20 18:28:17'),
(8, '財團法人漢光教育基金會\r\n辦理2012「舊愛新歡-古典詩詞譜曲創作暨歌唱表演競賽」\r\n參賽獎金豐厚!!', 1, NULL, '2020-10-20 18:28:26', '2020-10-20 18:28:26');

-- --------------------------------------------------------

--
-- 資料表結構 `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `name`, `href`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, '更多消息', '/news', 1, '2020-10-20 19:21:43', '2020-10-29 16:42:35');

-- --------------------------------------------------------

--
-- 資料表結構 `titles`
--

CREATE TABLE `titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `titles`
--

INSERT INTO `titles` (`id`, `text`, `img`, `sh`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '科技大學資訊管理系統', '01B01.jpg', 1, NULL, '2020-10-10 18:00:45', '2020-10-22 18:19:04'),
(2, '科技大學資訊管理系統', '01B02.jpg', 0, NULL, '2020-10-10 18:01:36', '2020-10-22 18:19:04'),
(3, '科技大學資訊管理系統', '01B01.jpg', 0, NULL, '2020-10-10 19:54:03', '2020-10-22 17:34:20'),
(4, '科技大學資訊管理系統', '01B03.jpg', 0, NULL, '2020-10-10 19:58:31', '2020-10-22 17:34:21'),
(5, '藍藍大學資訊管理系統', '01B03.jpg', 0, NULL, '2020-10-10 19:58:40', '2020-10-22 17:34:24');

-- --------------------------------------------------------

--
-- 資料表結構 `totals`
--

CREATE TABLE `totals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `totals`
--

INSERT INTO `totals` (`id`, `total`, `created_at`, `updated_at`) VALUES
(1, 76, '2020-10-17 18:38:58', '2020-11-03 19:53:09');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bottoms`
--
ALTER TABLE `bottoms`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- 資料表索引 `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mvims`
--
ALTER TABLE `mvims`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `totals`
--
ALTER TABLE `totals`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bottoms`
--
ALTER TABLE `bottoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mvims`
--
ALTER TABLE `mvims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `titles`
--
ALTER TABLE `titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `totals`
--
ALTER TABLE `totals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
