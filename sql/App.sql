-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2025 年 1 月 18 日 03:09
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `recipe_share`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `recipes`
--

INSERT INTO `recipes` (`id`, `user_id`, `title`, `ingredients`, `instructions`, `image`, `created_at`) VALUES
(1, 1, '【10分でできる！】時短チャーハン', 'お米、卵、ごま油、塩、お好きな具材（ネギ、鶏肉がオススメです）', '1.ご飯と卵、ごま油をボウルで混ぜます。\r\n2.お肉などの具材はあらかじめ炒めておきます。\r\n3.1をフライパンに入れ、炒めていきます。\r\n4.3がパラパラになったら塩を適量入れ、味をつけていきます。\r\n5.混ざりきったらお皿に移して完成です。', 'img_67833ec8000117.22623803.jpg', '2025-01-12 13:02:16'),
(2, 1, '【15分で完成！】簡単ペペロンチーノ', 'スパゲッティ、にんにく、唐辛子、オリーブオイル、塩、パセリ（お好みで）', '1.スパゲッティをたっぷりのお湯で茹でます。\r\n2.にんにくを薄切りにし、オリーブオイルで弱火でじっくり炒めます。\r\n3.唐辛子を加え、香りが立ったら火を止めます。\r\n4.茹で上がったパスタを加え、塩で味を調えます。\r\n5.パセリを散らして完成です。', 'img_678346a8b49675.10132633.jpg', '2025-01-12 13:35:52'),
(3, 2, '【簡単！】野菜たっぷりスープ', '玉ねぎ、にんじん、キャベツ、ベーコン、コンソメ、塩、こしょう', '1.野菜とベーコンを一口大に切ります。\r\n2.鍋にオリーブオイルを熱し、ベーコンと野菜を炒めます。\r\n3.水を加え、コンソメを溶かして煮ます。\r\n4.野菜が柔らかくなったら塩とこしょうで味を整えます。\r\n5.器に盛って完成です。', 'img_67834741544f20.56840228.jpg', '2025-01-12 13:38:25'),
(4, 2, '【10分でできる！】ツナマヨパスタ', 'パスタ、ツナ缶、マヨネーズ、しょうゆ、塩、こしょう', '1.パスタを茹でます。\r\n2.ボウルにツナ缶（油を切る）、マヨネーズ、しょうゆを混ぜておきます。\r\n3.茹で上がったパスタをボウルに加え、よく混ぜます。\r\n4.塩こしょうで味を整えて完成です。', 'img_6783478bd707f1.52701351.jpg', '2025-01-12 13:39:39'),
(5, 2, '【5分で完成！】豆腐サラダ', '豆腐、レタス、トマト、ドレッシング（ごまドレッシングがおすすめ）', '1.豆腐を一口大に切り、レタスとトマトを適当な大きさに切ります。\r\n2.器に盛り付け、ドレッシングをかけます。\r\n3.お好みでごまや海苔をトッピングして完成です。', 'img_678347cf7d9223.42048644.jpg', '2025-01-12 13:40:47'),
(6, 2, '【お手軽！】かけうどん', 'うどん、だし汁、ねぎ', '1.鍋でだし汁を温めます。\r\n2.茹でたうどんを鍋に入れ、少し煮込みます。\r\n3.器に盛り、ねぎを散らして完成です。', 'img_67834870cc2ea6.89784957.jpg', '2025-01-12 13:43:28'),
(7, 3, '【ふわとろ】オムライス', 'ご飯、卵、ケチャップ、鶏肉、玉ねぎ', '1.玉ねぎと鶏肉を炒め、ご飯とケチャップを混ぜてケチャップライスを作ります。\r\n2.フライパンに卵を溶き、ふわっと焼きます。\r\n3.ケチャップライスを包み、お皿に移して完成です。', 'img_678349148fce31.81802713.jpg', '2025-01-12 13:46:12'),
(8, 3, '【超簡単！】目玉焼きトースト', '食パン、卵、チーズ、ハム', '1.食パンにハムとチーズをのせます。\r\n2.真ん中にくぼみを作り、卵を割り入れます。\r\n3.オーブントースターで焼き、卵が半熟になったら完成です。', 'img_6783495b6f4470.32286394.jpg', '2025-01-12 13:47:23');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, '佐藤　健', '$2y$10$k73121APVFEbP25UWJMnKOJ7tnyA/GFJE4kMzFtCK7CImt.UCMxpC', 'satoutakeru@example.com'),
(2, '山田　太郎', '$2y$10$NvKcE5JB1YhGwSQgQmED4OxAeOokQSDzB5GbNrbD0///568DK1KUq', 'yamada@example.com'),
(3, '高野　晴夫', '$2y$10$4PRpiRDE8eSt.NyXwLabA.ysS8KT/EqJJ9/jlyysuS01NHVywar8y', 'takano@example.com');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
