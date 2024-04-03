-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Гру 17 2023 р., 18:29
-- Версія сервера: 8.0.30
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `autostation`
--

-- --------------------------------------------------------

--
-- Структура таблиці `Buses`
--

CREATE TABLE `Buses` (
  `id` int NOT NULL,
  `plate_number` varchar(20) NOT NULL,
  `model` varchar(50) NOT NULL,
  `capacity` int NOT NULL,
  `station_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `Buses`
--

INSERT INTO `Buses` (`id`, `plate_number`, `model`, `capacity`, `station_id`) VALUES
(1, 'PQR987', 'MAN Lions Coach', 55, 1),
(2, 'LMN345', 'Volvo 9700', 45, 2),
(3, 'XYZ123', 'Mercedes-Benz Tourismo', 50, 3),
(4, 'ABC567', 'Scania OmniExpress', 60, 4),
(5, 'JKL890', 'Iveco Crossway', 40, 5);

-- --------------------------------------------------------

--
-- Дублююча структура для представлення `busroutesview`
-- (Див. нижче для фактичного подання)
--
CREATE TABLE `busroutesview` (
`route_id` int
,`route_number` varchar(10)
,`departure_time` time
,`arrival_time` time
,`bus_id` int
,`plate_number` varchar(20)
,`model` varchar(50)
,`capacity` int
);

-- --------------------------------------------------------

--
-- Структура таблиці `BusStation`
--

CREATE TABLE `BusStation` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `BusStation`
--

INSERT INTO `BusStation` (`id`, `name`, `location`) VALUES
(1, 'West Central Bus Station', 'West City Center'),
(2, 'East Bus Terminal', 'East District'),
(3, 'North Suburban Station', 'North Suburb'),
(4, 'Downtown Bus Hub', 'Downtown Area'),
(5, 'South Terminal', 'South District');

-- --------------------------------------------------------

--
-- Структура таблиці `Passengers`
--

CREATE TABLE `Passengers` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `Passengers`
--

INSERT INTO `Passengers` (`id`, `first_name`, `last_name`, `email`, `phone_number`) VALUES
(1, 'Grace', 'Anderson', 'grace.a@email.com', '111-222-3333'),
(2, 'Daniel', 'Taylor', 'daniel.t@email.com', '444-555-6666'),
(3, 'Sophia', 'Brown', 'sophia.b@email.com', '777-888-9999'),
(4, 'Matthew', 'Clark', 'matthew.c@email.com', '222-333-4444'),
(5, 'Emma', 'Davis', 'emma.d@email.com', '555-666-7777');

-- --------------------------------------------------------

--
-- Структура таблиці `personallogin`
--

CREATE TABLE `personallogin` (
  `id` int NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `personallogin`
--

INSERT INTO `personallogin` (`id`, `email`, `password`) VALUES
(1, 'user@gmail.com', 'userpass');

-- --------------------------------------------------------

--
-- Структура таблиці `Routes`
--

CREATE TABLE `Routes` (
  `id` int NOT NULL,
  `route_number` varchar(10) NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `bus_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `Routes`
--

INSERT INTO `Routes` (`id`, `route_number`, `departure_time`, `arrival_time`, `bus_id`) VALUES
(21, 'R606', '09:30:00', '13:30:00', 1),
(22, 'R707', '15:45:00', '20:15:00', 2),
(23, 'R808', '11:15:00', '16:45:00', 3),
(24, 'R909', '17:00:00', '21:30:00', 4),
(25, 'R010', '13:30:00', '18:00:00', 5);

-- --------------------------------------------------------

--
-- Структура таблиці `Tickets`
--

CREATE TABLE `Tickets` (
  `id` int NOT NULL,
  `seat_number` int NOT NULL,
  `passenger_id` int DEFAULT NULL,
  `route_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `Tickets`
--

INSERT INTO `Tickets` (`id`, `seat_number`, `passenger_id`, `route_id`) VALUES
(16, 21, 1, 21),
(17, 22, 2, 22),
(18, 23, 3, 23),
(19, 24, 4, 24),
(20, 25, 5, 25);

-- --------------------------------------------------------

--
-- Структура для представлення `busroutesview`
--
DROP TABLE IF EXISTS `busroutesview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `busroutesview`  AS SELECT `routes`.`id` AS `route_id`, `routes`.`route_number` AS `route_number`, `routes`.`departure_time` AS `departure_time`, `routes`.`arrival_time` AS `arrival_time`, `buses`.`id` AS `bus_id`, `buses`.`plate_number` AS `plate_number`, `buses`.`model` AS `model`, `buses`.`capacity` AS `capacity` FROM (`routes` join `buses` on((`routes`.`bus_id` = `buses`.`id`)))  ;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `Buses`
--
ALTER TABLE `Buses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `station_id` (`station_id`);

--
-- Індекси таблиці `BusStation`
--
ALTER TABLE `BusStation`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `Passengers`
--
ALTER TABLE `Passengers`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `personallogin`
--
ALTER TABLE `personallogin`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `Routes`
--
ALTER TABLE `Routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Індекси таблиці `Tickets`
--
ALTER TABLE `Tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `passenger_id` (`passenger_id`),
  ADD KEY `route_id` (`route_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `Buses`
--
ALTER TABLE `Buses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблиці `BusStation`
--
ALTER TABLE `BusStation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблиці `Passengers`
--
ALTER TABLE `Passengers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблиці `personallogin`
--
ALTER TABLE `personallogin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `Routes`
--
ALTER TABLE `Routes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблиці `Tickets`
--
ALTER TABLE `Tickets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `Buses`
--
ALTER TABLE `Buses`
  ADD CONSTRAINT `buses_ibfk_1` FOREIGN KEY (`station_id`) REFERENCES `BusStation` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `Routes`
--
ALTER TABLE `Routes`
  ADD CONSTRAINT `routes_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `Buses` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `Tickets`
--
ALTER TABLE `Tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`passenger_id`) REFERENCES `Passengers` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `Routes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
