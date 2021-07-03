-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 03 2021 г., 15:56
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `id17169124_user`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `key` int(10) UNSIGNED NOT NULL,
  `id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(74) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 0,
  `code` mediumint(6) DEFAULT NULL,
  `time_end` bigint(10) DEFAULT NULL,
  `pass` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(256) COLLATE utf8_unicode_ci DEFAULT 'https://h3llvy.000webhostapp.com/src/ava_def.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`key`, `id`, `name`, `email`, `state`, `code`, `time_end`, `pass`, `photo`) VALUES
(3, '2385cf6c0127a2e293dba50f86e206d3', 'Maxim', 'makss.web@gmail.com', 1, 367459, 1625318820, 'd8578edf8458ce06fbc5bb76a58c5ca4', 'makss.web@gmail.com'),
(4, '2', 'Дима', 'ivan@mail.ru', 0, 123456, 20210703004006, '827ccb0eea8a706c4c34a16891f84e7b', 'ya.png'),
(36, 'd6be568aeef63f6216e0917fb0f8daa9', 'дима', 'ivan.korol.2007@bk.ru', 0, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 'https://d2xzmw6cctk25h.cloudfront.net/basiccourse/11/image/medium-d7d541c3e4d80b0210e30879c042b0a1.png'),
(37, '7ad4b5890219bbd689584361dc3ed7d2', NULL, 'ivan.kor2ol.2007@bk.ru', 0, NULL, NULL, '8d70d8ab2768f232ebe874175065ead3', 'https://h3llvy.000webhostapp.com/src/ava_def.png'),
(38, 'db2061866bd944e5635f62e9e6ff2f4e', NULL, 'ivan.korol.2007@bk.ru123', 0, NULL, NULL, '4297f44b13955235245b2497399d7a93', 'https://h3llvy.000webhostapp.com/src/ava_def.png'),
(39, '9691e5db16fc4e52d03d072219ceddea', NULL, 'adasdivan.korol.2007@bk.ru', 0, NULL, NULL, 'a2523b6293677189e84fa5d861611e70', 'https://h3llvy.000webhostapp.com/src/ava_def.png'),
(40, '32beb64228f02d22701320dc689e0dc2', NULL, 'dmitriy_evseev_2000@mail.ru', 0, NULL, NULL, '7815696ecbf1c96e6894b779456d330e', 'https://h3llvy.000webhostapp.com/src/ava_def.png'),
(41, '4715e7f4c8d9369ad7564a6c9168dafa', NULL, 'ivan.korol.2007@bk.ruasdasd', 0, NULL, NULL, '6226f7cbe59e99a90b5cef6f94f966fd', 'https://h3llvy.000webhostapp.com/src/ava_def.png'),
(42, 'bce2e5b64f64dfe197d09b9ba7282c86', NULL, 'ivan.korol.200asdasd7@bk.ru', 0, NULL, NULL, 'dd7d8de0633b65f2baf732c6636dce43', 'https://h3llvy.000webhostapp.com/src/ava_def.png'),
(43, 'ec3298447dc05ca1dc4a5fdbc7951b5e', NULL, 'adasdivan.kdsaorol.2007@bk.ru', 0, NULL, NULL, '7815696ecbf1c96e6894b779456d330e', 'https://h3llvy.000webhostapp.com/src/ava_def.png'),
(44, '1bf93fd6d8241b747ade6a1446fcd793', 'ADMIN', 'admin', 0, 929221, 1625324800, '21232f297a57a5a743894a0e4a801fc3', 'https://h3llvy.000webhostapp.com/src/ava_def.png'),
(45, '6104238f46f3155dea113b13ab51b61f', NULL, '', 0, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', 'https://h3llvy.000webhostapp.com/src/ava_def.png'),
(46, '6321e482ffcf5422613dc18243171eb0', NULL, 's', 0, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', 'https://h3llvy.000webhostapp.com/src/ava_def.png'),
(47, 'b9e2c7d3c3d42c413ddc0daf39d7feb6', NULL, 'asdasdasd', 0, NULL, NULL, '8277e0910d750195b448797616e091ad', 'https://h3llvy.000webhostapp.com/src/ava_def.png'),
(48, 'f0c6a586a218a723a5e1e39a91756771', NULL, 'maksss.web@gmail.com', 0, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', 'https://h3llvy.000webhostapp.com/src/ava_def.png'),
(49, '67f40dbea218c037b9aa52425a254319', 'Наруто', 'sanakoh144@noobf.com', 1, 312729, 1625312151, 'c4ca4238a0b923820dcc509a6f75849b', 'https://i.pinimg.com/736x/fe/af/c4/feafc4441c41294d5922590a49afea41.jpg'),
(50, '31f756f080fd5288b3bb66b63ad464a8', NULL, 'asdasd', 0, NULL, NULL, 'a8f5f167f44f4964e6c998dee827110c', 'https://h3llvy.000webhostapp.com/src/ava_def.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`key`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `key` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
