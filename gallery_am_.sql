-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 24 2024 г., 19:42
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery_am`
--

-- --------------------------------------------------------

--
-- Структура таблицы `my_photos`
--

CREATE TABLE `my_photos` (
  `id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `my_photos`
--

INSERT INTO `my_photos` (`id`, `image`, `name`, `user_id`) VALUES
(5, 'images/flower.jpg', 'Flowers', 1),
(6, 'images/flower.jpg', 'Hands', 1),
(7, 'images/02-min.jpg', 'Project title', 1),
(8, 'images/02-min.jpg', 'Project title', 1),
(9, 'images/02-min.jpg', 'Project title', 1),
(10, 'images/02-min.jpg', 'Project title', 1),
(11, 'images/02-min.jpg', 'Project title', 1),
(12, 'images/02-min.jpg', 'Project title', 1),
(13, 'images/02-min.jpg', 'Project title', 1),
(14, 'images/02-min.jpg', 'Project title', 1),
(15, 'images/02-min.jpg', 'Project title', 1),
(16, 'images/behind.png', 'Test img', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(1, 'Aren', 'Safaryan', 'aren.99.saf@gmail.com', '$2y$10$KStM1W1IwDGFBWaCdejy5uarxGw4gGPNcWqqUkaCDRHn8SxD/MULe', '2024-06-19 16:56:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `my_photos`
--
ALTER TABLE `my_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `my_photos`
--
ALTER TABLE `my_photos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `my_photos`
--
ALTER TABLE `my_photos`
  ADD CONSTRAINT `my_photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
