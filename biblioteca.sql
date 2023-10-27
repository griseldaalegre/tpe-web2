-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2023 a las 19:40:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'Adventure'),
(2, 'Children'),
(3, 'Drama'),
(4, 'Fantasy'),
(5, 'Horror'),
(6, 'Romance'),
(7, 'Mystery'),
(8, 'Humor'),
(9, 'Fantasy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `titulo_libro` varchar(45) DEFAULT NULL,
  `autor_libro` varchar(45) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `anio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo_libro`, `autor_libro`, `id_categoria`, `anio`) VALUES
(16, 'poooo', 'asasdada', 1, 2023),
(17, 'Faith Without A Home', 'Grace Wanderer', 1, 1909),
(18, 'Moon With Honor', 'Diana Moonshadow', 1, 1991),
(21, 'Man Of Fantasia', 'Leo Dreamweaver', 1, 1992),
(22, 'King Of Secrets', 'Maxwell Mystery', 1, 1945),
(23, 'Wizards Of Wood', 'Merlin Oakheart', 1, 2001),
(24, 'Lions In My House', 'Leo Lionheart', 1, 1999),
(25, 'Chickens And Birds', 'Clara Featherwing', 2, 1969),
(26, 'Lions And Lions', 'Leo Pride', 2, 1980),
(27, 'Shield Of Magic', 'Cedric Spellguard', 2, 1975),
(28, 'Flower Of Stone', 'Petra Stonemoss', 2, 2001),
(29, 'A Day With Leaves', 'Willow Greenleaf', 2, 1989),
(30, 'Cooking With The Fields', 'Gordon Harvest', 2, 1923),
(31, 'Fox Of Fantasy', 'Felix Foxwood', 2, 1941),
(32, 'Toad Of Yesterday', 'Timothy Toadsworth', 2, 1967),
(33, 'Dogs In The Mountains', 'Maya Mountainborn', 2, 1945),
(34, 'Cows Of Tomorrow', 'Victor Futurowicz', 2, 1947),
(35, 'Dinos And Kittens', 'Katy Dinoheart', 2, 2005),
(36, 'Chickens And Ghosts', 'Casper Chickenspirit', 2, 1942),
(37, 'Light Of Mystery', 'Luna Enigmatica', 2, 1982),
(38, 'Week Of Fire', 'Ignatius Blaze', 2, 1956),
(39, 'Colors Of Petals', 'Rosalind Petalhue', 2, 1901),
(40, 'Careful With My Pet Dragon', 'Draga the Dragonkeeper', 2, 1951),
(41, 'Human Without Shame', 'Adam Honesty', 3, 1926),
(42, 'Servant Of The North', 'Norbert Servitude', 3, 1952),
(43, 'Patrons Without A Head', 'Harold Patronless', 3, 1923),
(44, 'Medics Without Direction', 'Dr. Marcus Wandering', 3, 2006),
(45, 'Pirates And Patrons', 'Captain Jack Patron', 3, 1902),
(46, 'Slaves And Assassins', 'Damian Assassinheart', 3, 1924),
(47, 'Destruction Of Glory', 'Gideon Glorybane', 3, 1957),
(48, 'Union Of The Blues', 'Benny Blue', 3, 1912),
(49, 'Separated At My School', 'Forrest Misunderstood', 3, 1916),
(50, 'Smiles In The Fog', 'Vera Voidhider', 3, 1913),
(51, 'Spy Of Misery', 'Dr. Mistwalker', 3, 1994),
(52, 'Woman Of Limbo', 'Clara Coven', 3, 1928),
(53, 'Men Of The Forest', 'Cynthia Cryptwatcher', 3, 1932),
(54, 'Slaves Of Tomorrow', 'Arthur Antiquarian', 3, 1970),
(55, 'Witches And Peons', 'Felix Angelheart', 3, 1993),
(56, 'Farmers And Widows', 'Angelica Horrorwings', 3, 1917),
(57, 'Homes Of The Frontline', 'Conner Conventiongoer', 3, 1911),
(58, 'Destruction With Money', 'Dexter Diner', 3, 1904),
(59, 'Separated At Nightmares', 'Misty Acceptance', 3, 2010),
(60, 'Remember The Ships', 'Henry Humblemist', 3, 1945),
(61, 'Summoner Of The Ancients', 'Benjamin Arboreal', 4, 1940),
(62, 'Demon Of The South', 'Arachnid Catacombcrawler', 4, 1908),
(63, 'Dwarves With Money', 'Ignatius Mutesprite', 4, 1981),
(64, 'Fairies Of Limbo', 'Samuel Rooftop', 4, 1918),
(65, 'Enemies And Kings', 'Skeletona Agentina', 4, 1931),
(66, 'Invaders And Mermen', 'Wolfgang Fisher', 4, 1954),
(67, 'Defeat Of The Wind', 'Lumen Conventionaire', 4, 1907),
(68, 'Ruination With Immortality', 'Luna Shadowcaster', 4, 1940),
(69, 'Cleaning Up The Town', 'Elsa Frostbound', 4, 1935),
(70, 'Traces In The Hills', 'Damian Dark', 4, 1919),
(71, 'Tortoise Of The Eternal', 'Gabriel Wardrobe', 4, 2009),
(72, 'Criminal Of The Light', 'Isabella Macabre', 4, 1959),
(73, 'Lords Of The Prison', 'Victor Woodland', 4, 1925),
(74, 'Trolls Of Time', 'Luna Lupine', 4, 1934),
(75, 'Monks And Gods', 'Damien Beastmaster', 4, 1985),
(76, 'Fighters And Foreigners', 'Marissa Mutagen', 4, 1916),
(77, 'World Of The Banished', 'Oliver Crooner', 4, 2014),
(78, 'Annihilation Of Nature', 'Sylvia Tombwatcher', 4, 1975),
(79, 'Wrong About The Forest', 'Maxwell Darkshire', 4, 1902),
(80, 'Hiding The Void', 'Hugo Frostbound', 4, 1954),
(81, 'Doctor In The Mist', 'Stella Solstice', 5, 2005),
(82, 'Witch On The Ceiling', 'Leo Verdant', 5, 1980),
(83, 'Strangers At The Crypts', 'Jade Greenfield', 5, 1947),
(84, 'Strangers In The Antique Shop', 'River Amoureux', 5, 1901),
(85, 'Angels And Freaks', 'Romeo Housemate', 5, 1954),
(86, 'Horrors And Angels', 'Lady Amelia Enigma', 5, 1943),
(87, 'Sounds At The Convention', 'Rocky Alpinestar', 5, 2007),
(88, 'Bodies During Lunch', 'Petra Passionate', 5, 1949),
(89, 'Accepting The Mist', 'Damian Dreamseeker', 5, 1916),
(90, 'Humble In The Mist', 'Grace Admirer', 5, 1951),
(91, 'Tree In Apartment B', 'Hazel Wanderer', 5, 1920),
(92, 'Spider At The Catacombs', 'Luna Nocturne', 5, 1907),
(93, 'Imps Without A Voice', 'Chuck Cheekysmile', 5, 1930),
(94, 'Serpents On My Roof', 'Lady Victoria Visiteur', 5, 2000),
(95, 'Agents And Skeletons', 'Casanova Suitor', 5, 1974),
(96, 'Wolves And Fish', 'Oceanica Realidad', 5, 1965),
(97, 'Lights In The Convention', 'Amoroso Gamester', 5, 1900),
(98, 'Shadows During Full Moon', 'Whispering Stranger', 5, 1974),
(99, 'Frozen In The End', 'Melody Nostalgia', 5, 1922),
(100, 'Ready For The Darkness', 'Romeo Romanticservant', 5, 1937),
(101, 'Visitor In My Closet', 'Savannah Southernheart', 5, 1911),
(102, 'Horror Next Door', 'Captain Seacret', 5, 1997),
(103, 'Teachers In The Cabin', 'Beatrice Blissqueen', 5, 1911),
(104, 'Wolves Looking At Me', 'Sylvan Servant', 5, 1968),
(105, 'Animals And Fiends', 'Deanna Dearest', 5, 1928),
(106, 'Girls And Mutants', 'Nocturnal Elementalist', 5, 1911),
(107, 'Songs On The Ceiling', 'Celeste Elementara', 5, 1953),
(108, 'Eyes At The Graveyard', 'Orion Starpraiser', 5, 1982),
(109, 'Fatal In The Darkness', 'Tempus Longing', 5, 1918),
(110, 'Frozen In Time', 'Swampy Soldier', 5, 1933),
(111, 'Wife Of The Solstice', 'Emily Enmity', 6, 1990),
(112, 'Boy With Green Eyes', 'Voidwalker Deity', 6, 1909),
(113, 'Women With Green Eyes', 'Katrina Catland', 6, 1911),
(114, 'Trueloves In The River', 'Benedict Betrayer', 6, 1978),
(115, 'Heartthrobs And Roommates', 'Olivia Officer', 6, 2015),
(116, 'Secret Admirers And Ladyloves', 'Pablo Painter', 6, 1906),
(117, 'Result In The Mountain', 'Herman Hermits', 6, 2004),
(118, 'Determination Of Passion', 'Astral Mute', 6, 1931),
(119, 'Aching For My Future', 'Clara Conscience', 6, 1921),
(120, 'Admiring My Girl', 'Victor Visionary', 6, 1939),
(121, 'Friend Of Rainbows', 'Ines Insecta', 6, 1933),
(122, 'Visitor With Hazel Eyes Fred', 'Friendship', 6, 1910),
(123, 'Foreigners In The Night', 'Terra Subterranean', 6, 1945),
(124, 'Trueloves With A Cheeky', 'Smile Barry Butcher', 6, 1968),
(125, 'Ladyloves And Guests', 'Luna Wolfbane', 6, 1983),
(126, 'Girlfriends And Suitors', 'Felix Feline', 6, 1979),
(127, 'Reality Of The Ocean', 'Sunny Reminisce', 6, 1958),
(128, 'Game Of Love', 'Tristan Dreambreaker', 6, 1998),
(129, 'Whispers In The Stranger', 'Cliff Hater', 6, 2002),
(130, 'Songs Of My Past', 'Lucius Luminaire', 6, 1932),
(131, 'Servant Of Romance', 'Mort Netherhealer', 6, 1929),
(132, 'Servant Of The South', 'Isabella Landwoman', 6, 1986),
(133, 'Secret Admirers Of The Sea', 'Seraphina Serpentia', 6, 1900),
(134, 'Queens Of Bliss', 'Woody Woodswain', 6, 1958),
(135, 'Nymphs And Servants', 'Richard Ruler', 6, 1918),
(136, 'Secret Admirers And Dears', 'Salvador Dreamer', 6, 1983),
(137, 'Element Of The Night', 'Seraphina Swamplight', 6, 1902),
(138, 'Element Of Heaven', 'River Riparian', 6, 1954),
(139, 'Praised By The Stars', 'Illusiona Disguise', 6, 1968),
(140, 'Aching For Time', 'Percy Porkexplorer', 6, 1980),
(141, 'Soldier Of The Swamp', 'Benny Buffoonery', 7, 1922),
(142, 'Enemy In My Town', 'Harry Hatbandit', 7, 1955),
(143, 'Gods Of The Void', 'Arachnia Programmer', 7, 1994),
(144, 'Cats In My Country', 'Thalia Thiefcatcher', 7, 1950),
(145, 'Traitors And Foes', 'Felix Medicrobber', 7, 1937),
(146, 'Officers And Officers', 'Melody Lifebinder', 7, 1998),
(147, 'Road Of A Painting', 'Philharmonic Projector', 7, 1916),
(148, 'Seclusion Of A Man', 'Aquaphobic Suspicion', 7, 1904),
(149, 'Muted By The Stars', 'Maximilian Greedmaster', 7, 1904),
(150, 'Conscious Of My Actions', 'Jocelyn Jokester', 7, 2004),
(151, 'Opponent Of Tomorrow', 'Jonah Journeycompanion', 7, 1933),
(152, 'Soldier Of An Insect', 'Jestina Journeyfool', 7, 1906),
(153, 'Heroes Of A Friend', 'Stuntman Stan', 7, 1971),
(154, 'Foes Of The Underground', 'Carrie Childsaver', 7, 1913),
(155, 'Butchers And Defenders', 'Fiona Medicfriend', 7, 1937),
(156, 'Officers And Wolves', 'Ignatius Hilariflame', 7, 1980),
(157, 'Worship Of A Cat', 'Giggles Gagmaster', 7, 1947),
(158, 'Memories Of The Sun', 'Freddie Fooladmired', 7, 1901),
(159, 'Broken By Dreams', 'Foolish Helper', 7, 1927),
(160, 'Hatred Of The Cliffs', 'Astrid Gambler', 7, 1918),
(161, 'Man Of Light', 'Cyborg Secretron', 7, 1917),
(162, 'Medic Of The Nether', 'Larcel Mimeshadow', 7, 1960),
(163, 'Women In My Country', 'Regina Voiceless', 7, 1988),
(164, 'Snakes Of A Woman', 'Baker Buddy', 7, 1954),
(165, 'Trees And Girls', 'Sir Younglord', 7, 2009),
(166, 'Defenders And Kings', 'Rodeo Countrygirl', 7, 1964),
(167, 'Dreams Of A Painting', 'Blaze Programmer', 7, 1957),
(168, 'Oracle Of The Swamp', 'Eloise Designer', 7, 1998),
(169, 'Prize Of The River', 'Blaze Admirer', 7, 2002),
(170, 'Disguised By Illusions', 'Oceanic Humanoid', 7, 1937),
(171, 'Pig And My Journey', 'Ge Orwell', 8, 1968),
(172, 'Buffoon Wish', 'Stella Starpilot', 8, 1944),
(173, 'Criminal With A Hat', 'Eartha Officer', 8, 2015),
(174, 'Spider Program', 'Hunter Veteran', 8, 1979),
(175, 'Man And Thief', 'Androida Clone', 8, 1933),
(176, 'Doctor And Thief', 'Nowhere Nomad', 8, 1960),
(177, 'Songs Lives With Me', 'Hugo Honorific', 8, 1999),
(178, 'Songs Project', 'Robo Abandonator', 8, 1937),
(179, 'Suspicious Of Water', 'Stardust Wanderer', 8, 1900),
(180, 'Greed Of The Project', 'Portia Portalcreator', 8, 1924),
(181, 'Foreigner Of Jokes', 'Martian Invader', 8, 1979),
(182, 'Companion On My Journey', 'Captain Spaceship', 8, 1955),
(183, 'Jester On My Journey', 'Galaxian Sculptor', 8, 1986),
(184, 'Friend Of Stunts', 'Menela Creations', 8, 1949),
(185, 'Butcher And Child', 'Victor Visitor', 8, 1988),
(186, 'Doctor And Friend', 'Luna Explorer', 8, 1929),
(187, 'Fire Of Humor', 'Damian Doomsayer', 8, 1908),
(188, 'Laughing Of Gags', 'Stella Spacecreator', 8, 1942),
(189, 'Impressed By The Fool', 'Legend Demander', 8, 1954),
(190, 'Help Of The Fool', 'Comedy Assistant', 8, 1967),
(191, 'Stranger Gamble', 'Tragedy Assistant', 8, 1983),
(192, 'Robot Has A Secret Life', 'Tragedy Helper', 8, 2005),
(193, 'Mime Secret', 'Tragic Companion', 8, 1965),
(194, 'Queen Without A Voice', 'Tragic Buddy', 8, 1970),
(195, 'Companion And Baker', 'Jester Helper', 8, 1943),
(196, 'Boy And Lord', 'Comedy Buddy', 8, 1909),
(197, 'Stunts Of The Country', 'Gag Helper', 8, 1904),
(198, 'Fire Program', 'Foolish Helper', 8, 2009),
(199, 'Elegance Of My Design', 'Laughter Assistant', 8, 1910),
(200, 'Impressed By Fire', 'Comedic Companion', 8, 1904),
(206, 'Clones And Androids', 'Robot Developer', 9, 1952),
(210, 'Life With Stardust', 'Stardust Wanderer', 9, 1995),
(211, 'Creator In The Portal', 'Portal Creator', 9, 1962),
(212, 'Invader On Mars', 'Martian Invader', 9, 1971),
(213, 'Captains With Spaceships', 'Space Captain', 9, 1994),
(214, 'Figures Of The Galaxy', 'Galaxy Explorer', 9, 1982),
(215, 'Creators And Men', 'Creators Friend', 9, 2007),
(216, 'Boys And Visitors', 'Friendly Visitor', 9, 2014),
(217, 'Moon Of Exploration', 'Luna Explorer', 9, 1999),
(219, 'Created By Outer Space', 'Outer Space Creator', 9, 1969),
(220, 'Demand For The Legends', 'Legendary Seeker', 9, 1937);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre_usuario` varchar(10) NOT NULL,
  `clave_usuario` varchar(256) NOT NULL,
  `rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre_usuario`, `clave_usuario`, `rol`) VALUES
(1, 'webadmin', '$2y$10$3LOxgaLuvwoqIOemB6fikue/8Qch4SORrj0GaVfQcqlAIs984298a', 1),
(2, 'webuser', '$2y$10$Ghf8M42/opvlgR/1sKgqu.XZiF.QKI0CeyiMesshXC4oocFBOPXUS', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_categoria` (`id_categoria`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
