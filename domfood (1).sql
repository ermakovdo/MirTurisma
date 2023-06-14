-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 07 2022 г., 08:39
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `domfood`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `cart_quan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `products_id`, `cart_quan`) VALUES
(1, 1, 29, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `products_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_price` int(11) NOT NULL,
  `products_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `products_price`, `products_description`, `products_image`) VALUES
(29, 'пицца1', 456, 'qwe1', '638da8ef6b98c.jpeg'),
(30, 'пицца2', 399, 'qwe2', '638da9c9844cd.jpeg'),
(31, 'пицца3', 349, 'qwe3', '638da9d6d804a.jpeg'),
(32, 'пицца4', 369, 'qwe4', '638da9ff2086a.jpeg'),
(33, 'пицца5', 399, 'qwe5', '638daa2055a1f.jpeg'),
(34, 'пицца6', 499, 'qwe6', '638daa32ccca7.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_mail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_mail`, `user_password`, `user_status`) VALUES
(1, '1', '1@1', '5dc5d7cfdefdb67d7b8bde45faeb094d', 1),
(3, '2', '3@1', '5dc5d7cfdefdb67d7b8bde45faeb094d', NULL),
(5, 'm', 'm@m', '773e7e6a01e2749520e99d951a954b8b', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
