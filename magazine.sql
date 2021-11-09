-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 09 2021 г., 14:11
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `magazine`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buyer`
--

CREATE TABLE `buyer` (
  `id_buyer` int(10) NOT NULL,
  `f_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `th_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `buyer`
--

INSERT INTO `buyer` (`id_buyer`, `f_name`, `s_name`, `th_name`, `address`, `email`, `m_phone`) VALUES
(1, 'Иван', 'Иванов', 'Отстутствует', 'г. Ростов на Дону, ул. Михаила Нагибина д. 5', 'ivanov@mail.ru', '+79874561233'),
(2, 'Василий', 'Васильев', 'Васильевич', 'г. Ростов на Дону, ул. Текучева д. 6', 'vasilyev@gmail.com', '+79852364564');

-- --------------------------------------------------------

--
-- Структура таблицы `offer`
--

CREATE TABLE `offer` (
  `id_offer` int(50) NOT NULL,
  `id_buyer` int(50) NOT NULL,
  `date` date DEFAULT NULL,
  `offer_check` tinyint(1) NOT NULL,
  `total_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `offer`
--

INSERT INTO `offer` (`id_offer`, `id_buyer`, `date`, `offer_check`, `total_cost`) VALUES
(1, 1, '2021-06-10', 0, 8856),
(2, 2, '2021-06-10', 0, 4500);

--
-- Триггеры `offer`
--
DELIMITER $$
CREATE TRIGGER `New` BEFORE INSERT ON `offer` FOR EACH ROW IF ISNULL(NEW.date) THEN
  SET NEW.date = NOW(); 
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id_product` int(50) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `kol_in_storage` int(10) NOT NULL,
  `picture` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id_product`, `name`, `price`, `kol_in_storage`, `picture`, `description`) VALUES
(1, 'Майнкрафт', 3200, 20, '01-minecraft.jpg', 'Настольная игра «МАЙНКРАФТ: строители и биомы» (Minecraft: Builders&Biomes.) от Ravensburger. Разработана Ульрихом Блумом в сотрудничестве с Mojang и Ravensburger.\r\nСовершенно новое приключение Minecraft у вас под рукой! Испытайте мир Minecraft в настольной игре! Соберите редкие блоки и постройте впечатляющие здания, но остерегайтесь опасных мобов и коварных противников. Пусть победит самый умный и смелый мастер!\r\nВ игре «Майнкрафт: строители и биомы» игроки исследуют сверхмир, шахтные блоки и строят захватывающие структуры. Тщательно планируйте свои конструкции и побеждайте опасных мобов (монстров), чтобы выиграть!\r\nСтройте умно и сражайтесь смело, чтобы набрать наибольшее количество очков опыта и победить в игре!\r\nБиомы! Выбирайте среду обитания для игры: лес, пустыня, горы или снежная тундра.\r\nМинеральные ресурсы! Добывайте обсидиан, изумруд, дерево и многое другое из кубика ресурсов, который меняется с каждой игрой!\r\nСтруктуры! Используйте собранные вами блоки для строительства впечатляющих сооружений, таких как пустынные замки, лесные домики на деревьях или даже дом для лам в горах!\r\n'),
(2, 'Колонизаторы', 2500, 10, '02-kolonizatori.jpg', 'Маленький остров и грандиозные планы, напряженный мир без открытой войны, незыблемое постоянство правил и бесконечное разнообразие партий, семейное развлечение и всемирно известный шедевр — всё это настольная игра «Колонизаторы».\r\nОстров Катан ждёт новых переселенцев!\r\n'),
(3, 'Монополия', 3000, 14, '03-monopoly.jpg', 'Эта версия классической настольной игры \"Монополия\" принимает Резиновую Уточку, Тираннозавра Рекса и Пингвина в свою семью фишек. Вашему ребенку достаточно выбрать свою фишку, бросить кубики – и вперед, к победе! \"Монополия\" – здесь может быть только один победитель! Это будете вы?\r\n'),
(4, 'Имаджинариум', 2456, 15, '04-imadjnarium.jpg', '«Имаджинариум» — одна из самых популярных игр в России.\r\nЗадача игроков — придумывать и отгадывать ассоциации к странным, забавным и безумным иллюстрациям, созданным известными российскими художниками и дизайнерами. С этой игрой вы не только весело проведете время, но и лучше узнаете друг друга. Посоревнуйтесь в глубине воображения с родными и близкими, детьми, друзьями и коллегами!\r\n'),
(5, 'Манчкин', 2000, 20, '05-manchkin.jpg', NULL),
(6, 'Мафия', 3000, 13, '06-mafia.jpg', NULL),
(7, 'Активити', 2000, 13, '07-Activity.jpg', NULL),
(8, 'Spyfal', 5000, 31, '08-Spyfall.jpg', NULL),
(9, 'Подземелье', 4566, 23, '09-podzemelie.jpg', NULL),
(10, 'Blood Rage', 3234, 11, '10-Blood-Rage.jpg', NULL),
(11, 'Зельеварение', 2345, 13, '11-Zelievarenie.jpg', NULL),
(12, 'Small World', 3244, 14, '12-Small-World.jpg', NULL),
(13, 'Runebound', 2345, 13, '13-Runebound.jpg', NULL),
(14, 'Чёрный кристалл', 4542, 24, '14-cherny-kristal.jpg', NULL),
(15, 'Путь героя', 3435, 12, '15-put-geroia.jpg', NULL),
(16, 'Pathfinder', 2345, 12, '16-Pathfinder.jpg', NULL),
(17, 'Берсерк', 3455, 14, '17-berserk.jpg', NULL),
(18, 'Андор', 4322, 12, '18-andor.jpg', NULL),
(19, 'Codex', 5656, 24, '19-codex.jpg', NULL),
(20, 'Этнос', 2345, 12, '20-etnos.jpg', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `product_in_offer`
--

CREATE TABLE `product_in_offer` (
  `id_offer` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `kol_in_offer` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_in_offer`
--

INSERT INTO `product_in_offer` (`id_offer`, `id_product`, `kol_in_offer`) VALUES
(1, 1, 2),
(1, 4, 1),
(2, 2, 1),
(2, 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`) VALUES
(1, 'admin', '11111', 'g-QD1qA1KVXT45_EFwR2UqRh2MRXoCjf');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id_buyer`);

--
-- Индексы таблицы `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id_offer`),
  ADD KEY `id_buyer` (`id_buyer`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Индексы таблицы `product_in_offer`
--
ALTER TABLE `product_in_offer`
  ADD PRIMARY KEY (`id_offer`,`id_product`),
  ADD KEY `f_in1` (`id_product`),
  ADD KEY `f_in2` (`id_offer`) USING BTREE;

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id_buyer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `offer`
--
ALTER TABLE `offer`
  MODIFY `id_offer` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`id_buyer`) REFERENCES `buyer` (`id_buyer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_in_offer`
--
ALTER TABLE `product_in_offer`
  ADD CONSTRAINT `f_in` FOREIGN KEY (`id_offer`) REFERENCES `offer` (`id_offer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `f_in1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
