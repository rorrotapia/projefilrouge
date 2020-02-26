-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 26 fév. 2020 à 16:24
-- Version du serveur :  10.1.40-MariaDB
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cheers`
--

-- --------------------------------------------------------

--
-- Structure de la table `epreuves`
--

CREATE TABLE `epreuves` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `epreuve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `epreuves`
--

INSERT INTO `epreuves` (`id`, `nom`, `epreuve`, `phase`, `horaire`, `lieu`, `date`) VALUES
(1, 'plongeon', '', 'Phase 1 - GROUPE A', '13:00', 'Pont d\'iéna', '2020-02-26'),
(2, 'plongeon', '', 'Phase 1 - GROUPE B', '13:00', 'Pont d\'iéna', '2020-02-26'),
(3, 'plongeon', '', 'Phase 2 - GROUPE A', '13:45', 'Pont d\'iéna', '2020-02-26'),
(4, 'plongeon', '', 'Phase 2 - GROUPE B', '13:45', 'Pont d\'iéna', '2020-02-26'),
(5, 'marathon', '', 'Phase 1 - GROUPE A', '15:00', 'Stade de France', '2020-02-26'),
(6, 'marathon', '', 'Phase 1 - GROUPE B', '15:00', 'Stade de France', '2020-02-26'),
(7, 'marathon', '', 'Phase 2 - GROUPE A', '15:00', 'Stade de France', '2020-02-26'),
(8, 'marathon', '', 'Phase 2 - GROUPE B', '15:00', 'Stade de France', '2020-02-26'),
(9, 'natation', '', 'Phase 1 - GROUPE A', '15:00', 'Pont d\'iéna', '2020-02-26'),
(10, 'natation', '', 'Phase 1 - GROUPE B', '15:00', 'Pont d\'iéna', '2020-02-26'),
(11, 'natation', '', 'Phase 2 - GROUPE A', '15:00', 'Pont d\'iéna', '2020-02-26'),
(12, 'natation', '', 'Phase 2 - GROUPE B', '15:00', 'Pont d\'iéna', '2020-02-26'),
(13, 'natation sysnchronisée', '', 'Phase 1 - GROUPE A', '15:00', 'Pont d\'iéna', '2020-02-26'),
(14, 'natation sysnchronisée', '', 'Phase 1 - GROUPE B', '15:00', 'Pont d\'iéna', '2020-02-26'),
(15, 'natation sysnchronisée', '', 'Phase 2 - GROUPE A', '15:00', 'Pont d\'iéna', '2020-02-26'),
(16, 'natation sysnchronisée', '', 'Phase 2 - GROUPE B', '15:00', 'Pont d\'iéna', '2020-02-26'),
(17, 'Water-Polo', '', 'Phase 1 - GROUPE A', '15:00', 'Piscine Olympique Paris 2024', '2020-02-26'),
(18, 'Water-Polo', '', 'Phase 1 - GROUPE B', '15:00', 'Piscine Olympique Paris 2024', '2020-02-26'),
(19, 'Water-Polo', '', 'Phase 2 - GROUPE A', '15:00', 'Piscine Olympique Paris 2024', '2020-02-26'),
(20, 'Water-Polo', '', 'Phase 2 - GROUPE B', '15:00', 'Piscine Olympique Paris 2024', '2020-02-26'),
(21, 'BMX', '', 'Phase 1 - GROUPE A', '16:00', 'Vélodrome national de Saint-Quentin-en-Yvelines', '2020-02-26'),
(22, 'BMX', '', 'Phase 1 - GROUPE B', '16:00', 'Vélodrome national de Saint-Quentin-en-Yvelines', '2020-02-26'),
(23, 'BMX', '', 'Phase 2 - GROUPE A', '16:00', 'Vélodrome national de Saint-Quentin-en-Yvelines', '2020-02-26'),
(24, 'BMX', '', 'Phase 2 - GROUPE B', '16:00', 'Vélodrome national de Saint-Quentin-en-Yvelines', '2020-02-26'),
(25, 'VTT', '', 'Phase 1 - GROUPE A', '16:00', 'Colline d\'élancourt', '2020-02-26'),
(26, 'VTT', '', 'Phase 1 - GROUPE B', '16:00', 'Colline d\'élancourt', '2020-02-26'),
(27, 'VTT', '', 'Phase 2 - GROUPE A', '16:00', 'Colline d\'élancourt', '2020-02-26'),
(28, 'VTT', '', 'Phase 2 - GROUPE B', '16:00', 'Colline d\'élancourt', '2020-02-26'),
(32, 'Vélo Route', '', 'Phase 1 - GROUPE A', '16:00', 'Av. des Champs-Élysées', '2020-02-26'),
(33, 'Vélo Route', '', 'Phase 2 - GROUPE A', '16:00', 'Av. des Champs-Élysées', '2020-02-26'),
(34, 'Vélo Route', '', 'Phase 2 - GROUPE B', '16:00', 'Av. des Champs-Élysées', '2020-02-26'),
(35, 'Vélo Route', '', 'Phase 1 - GROUPE A', '16:00', 'Av. des Champs-Élysées', '2020-02-26'),
(36, 'Cyclisme Piste', '', 'Phase 1 - GROUPE A', '19:00', 'Vélodrome National de Saint-Quentin-en-Yvelines', '2020-02-26'),
(37, 'Cyclisme Piste', '', 'Phase 2 - GROUPE A', '19:15', 'Vélodrome National de Saint-Quentin-en-Yvelines', '2020-02-26'),
(38, 'Cyclisme Piste', '', 'Phase 2 - GROUPE B', '19:30', 'Vélodrome National de Saint-Quentin-en-Yvelines', '2020-02-26'),
(39, 'Cyclisme Piste', '', 'Phase 1 - GROUPE A', '19:45', 'Vélodrome National de Saint-Quentin-en-Yvelines', '2020-02-26'),
(40, 'Gymnastique artistique', '', 'Phase 1 - GROUPE A', '16:15', 'Gymnastique - Paris La Défense Arena', '2020-02-26'),
(41, 'Gymnastique artistique', '', 'Phase 2 - GROUPE A', '16:30', 'Gymnastique - Paris La Défense Arena', '2020-02-26'),
(42, 'Gymnastique artistique', '', 'Phase 2 - GROUPE B', '16h45', 'Gymnastique - Paris La Défense Arena', '2020-02-26'),
(43, 'Gymnastique artistique', '', 'Phase 1 - GROUPE A', '17:00', 'Gymnastique - Paris La Défense Arena', '2020-02-26'),
(44, 'Gymnastique rythmique', '', 'Phase 1 - GROUPE A', '16:15', 'Gymnastique - Paris La Défense Arena', '2020-02-26'),
(45, 'Gymnastique rythmique', '', 'Phase 2 - GROUPE A', '16:30', 'Gymnastique - Paris La Défense Arena', '2020-02-26'),
(46, 'Gymnastique rythmique', '', 'Phase 2 - GROUPE B', '16h45', 'Gymnastique - Paris La Défense Arena', '2020-02-26'),
(47, 'Gymnastique rythmique', '', 'Phase 1 - GROUPE A', '17:00', 'Gymnastique - Paris La Défense Arena', '2020-02-26'),
(48, 'Tranpoline', '', 'Phase 1 - GROUPE A', '12:15', 'Gymnastique - Paris La Défense Arena', '2020-02-26'),
(49, 'Tranpoline', '', 'Phase 2 - GROUPE A', '12:30', 'Gymnastique - Paris La Défense Arena', '2020-02-26'),
(50, 'Tranpoline', '', 'Phase 2 - GROUPE B', '12:45', 'Gymnastique - Paris La Défense Arena', '2020-02-26'),
(51, 'Tranpoline', '', 'Phase 1 - GROUPE A', '13:00', 'Gymnastique - Paris La Défense Arena', '2020-02-26'),
(52, 'Volley-ball Salle', '', 'Phase 1 - GROUPE A', '12:15', 'Parc des Expositions Paris le Bourget', '2020-02-26'),
(53, 'Volley-ball Salle', '', 'Phase 2 - GROUPE A', '12:30', 'Parc des Expositions Paris le Bourget', '2020-02-26'),
(54, 'Volley-ball Salle', '', 'Phase 2 - GROUPE B', '12:45', 'Parc des Expositions Paris le Bourget', '2020-02-26'),
(55, 'Volley-ball Salle', '', 'Phase 1 - GROUPE A', '13:00', 'Parc des Expositions Paris le Bourget', '2020-02-26'),
(56, 'Volley-ball Plage', '', 'Phase 1 - GROUPE A', '18:15', 'Champs de Mars', '2020-02-26'),
(57, 'Volley-ball Plage', '', 'Phase 2 - GROUPE A', '18:30', 'Champs de Mars', '2020-02-26'),
(58, 'Volley-ball Plage', '', 'Phase 2 - GROUPE B', '18:45', 'Champs de Mars', '2020-02-26'),
(59, 'Volley-ball Plage', '', 'Phase 1 - GROUPE A', '19:00', 'Champs de Mars', '2020-02-26'),
(60, 'Canöé-Cayak Slalom', '', 'Phase 1 - GROUPE A', '13:15', 'Base nautique de Vaires-sur-Marne', '2020-02-26'),
(61, 'Canöé-Cayak Slalom', '', 'Phase 2 - GROUPE A', '13:30', 'Base nautique de Vaires-sur-Marne', '2020-02-26'),
(62, 'Canöé-Cayak Slalom', '', 'Phase 2 - GROUPE B', '13:45', 'Base nautique de Vaires-sur-Marne', '2020-02-26'),
(63, 'Canöé-Cayak Slalom', '', 'Phase 1 - GROUPE A', '14:00', 'Base nautique de Vaires-sur-Marne', '2020-02-26'),
(64, 'Canöé-Cayak Sprint', '', 'Phase 1 - GROUPE A', '13:15', 'Base nautique de Vaires-sur-Marne', '2020-02-26'),
(65, 'Canöé-Cayak Sprint', '', 'Phase 2 - GROUPE A', '13:30', 'Base nautique de Vaires-sur-Marne', '2020-02-26'),
(66, 'Canöé-Cayak Sprint', '', 'Phase 2 - GROUPE B', '13:45', 'Base nautique de Vaires-sur-Marne', '2020-02-26'),
(67, 'Canöé-Cayak Sprint', '', 'Phase 1 - GROUPE A', '14:00', 'Base nautique de Vaires-sur-Marne', '2020-02-26'),
(68, 'Athlétisme', '', 'Phase 1 - GROUPE A', '16:15', 'Stade de France', '2020-02-26'),
(69, 'Athlétisme', '', 'Phase 2 - GROUPE A', '16:30', 'Stade de France', '2020-02-26'),
(70, 'Athlétisme', '', 'Phase 2 - GROUPE B', '16:45', 'Stade de France', '2020-02-26'),
(71, 'Athlétisme', '', 'Phase 1 - GROUPE A', '17:00', 'Stade de France', '2020-02-26'),
(72, 'Badminton', '', 'Phase 1 - GROUPE A', '16:15', 'Paris Arena II', '2020-02-26'),
(73, 'Badminton', '', 'Phase 2 - GROUPE A', '16:30', 'Paris Arena II', '2020-02-26'),
(74, 'Badminton', '', 'Phase 2 - GROUPE B', '16:45', 'Paris Arena II', '2020-02-26'),
(75, 'Badminton', '', 'Phase 1 - GROUPE A', '17:00', 'Paris Arena II', '2020-02-26'),
(76, 'Basketball', '', 'Phase 1 - GROUPE A', '20:15', 'AccorHotels Arena', '2020-02-26'),
(77, 'Basketball', '', 'Phase 2 - GROUPE A', '20:30', 'AccorHotels Arena', '2020-02-26'),
(78, 'Basketball', '', 'Phase 2 - GROUPE B', '20:45', 'AccorHotels Arena', '2020-02-26'),
(79, 'Basketball', '', 'Phase 1 - GROUPE A', '21:00', 'AccorHotels Arena', '2020-02-26'),
(80, 'Equitation', '', 'Phase 1 - GROUPE A', '13:15', 'Château de Versailles', '2020-02-26'),
(81, 'Equitation', '', 'Phase 2 - GROUPE A', '13:30', 'Château de Versailles', '2020-02-26'),
(82, 'Equitation', '', 'Phase 2 - GROUPE B', '13:45', 'Château de Versailles', '2020-02-26'),
(83, 'Equitation', '', 'Phase 1 - GROUPE A', '14:00', 'Château de Versailles', '2020-02-26'),
(84, 'Escrime', '', 'Phase 1 - GROUPE A', '13:15', 'Grand Palais', '2020-02-26'),
(85, 'Escrime', '', 'Phase 2 - GROUPE A', '13:30', 'Grand Palais', '2020-02-26'),
(86, 'Escrime', '', 'Phase 2 - GROUPE B', '13:45', 'Grand Palais', '2020-02-26'),
(87, 'Escrime', '', 'Phase 1 - GROUPE A', '14:00', 'Grand Palais', '2020-02-26'),
(88, 'Golf', '', 'Phase 1 - GROUPE A', '11:00', 'Le Golf National', '2020-02-26'),
(89, 'Golf', '', 'Phase 2 - GROUPE A', '11:45', 'Le Golf National', '2020-02-26'),
(90, 'Golf', '', 'Phase 2 - GROUPE B', '12:30', 'Le Golf National', '2020-02-26'),
(91, 'Golf', '', 'Phase 1 - GROUPE A', '13:00', 'Le Golf National', '2020-02-26'),
(92, 'Handball', '', 'Phase 1 - GROUPE A', '11:00', 'Paris Expo Porte de Versailles', '2020-02-26'),
(93, 'Handball', '', 'Phase 2 - GROUPE A', '11:45', 'Paris Expo Porte de Versailles', '2020-02-26'),
(94, 'Handball', '', 'Phase 2 - GROUPE B', '12:30', 'Paris Expo Porte de Versailles', '2020-02-26'),
(95, 'Handball', '', 'Phase 1 - GROUPE A', '13:00', 'Paris Expo Porte de Versailles', '2020-02-26'),
(96, 'Hockey', '', 'Phase 1 - GROUPE A', '19:00', 'Stade Olympique Yves du Manoir', '2020-02-26'),
(97, 'Hockey', '', 'Phase 2 - GROUPE A', '19:30', 'Stade Olympique Yves du Manoir', '2020-02-26'),
(98, 'Hockey', '', 'Phase 2 - GROUPE B', '20:00', 'Stade Olympique Yves du Manoir', '2020-02-26'),
(99, 'Hockey', '', 'Phase 1 - GROUPE A', '20:45', 'Stade Olympique Yves du Manoir', '2020-02-26'),
(100, 'Judo', '', 'Phase 1 - GROUPE A', '19:00', 'Grand Palais', '2020-02-26'),
(101, 'Judo', '', 'Phase 2 - GROUPE A', '19:30', 'Grand Palais', '2020-02-26'),
(102, 'Judo', '', 'Phase 2 - GROUPE B', '20:00', 'Grand Palais', '2020-02-26'),
(103, 'Judo', '', 'Phase 1 - GROUPE A', '20:45', 'Grand Palais', '2020-02-26'),
(104, 'Pentathlon moderne', '', 'Phase 1 - GROUPE A', '19:00', 'Château de Versailles', '2020-02-26'),
(105, 'Pentathlon moderne', '', 'Phase 2 - GROUPE A', '19:30', 'Château de Versailles', '2020-02-26'),
(106, 'Pentathlon moderne', '', 'Phase 2 - GROUPE B', '20:00', 'Château de Versailles', '2020-02-26'),
(107, 'Pentathlon moderne', '', 'Phase 1 - GROUPE A', '20:45', 'Château de Versailles', '2020-02-26'),
(108, 'Aviron', '', 'Phase 1 - GROUPE A', '10:00', 'Base nautique de Vaires-sur-Marne', '2020-02-26'),
(109, 'Aviron', '', 'Phase 2 - GROUPE A', '10:30', 'Base nautique de Vaires-sur-Marne', '2020-02-26'),
(110, 'Aviron', '', 'Phase 2 - GROUPE B', '11:00', 'Base nautique de Vaires-sur-Marne', '2020-02-26'),
(111, 'Aviron', '', 'Phase 1 - GROUPE A', '12:00', 'Base nautique de Vaires-sur-Marne', '2020-02-26'),
(112, 'Rugby', '', 'Phase 1 - GROUPE A', '14:00', 'Stade Jean Bouin', '2020-02-26'),
(113, 'Rugby', '', 'Phase 2 - GROUPE A', '16:30', 'Stade Jean Bouin', '2020-02-26'),
(114, 'Rugby', '', 'Phase 2 - GROUPE B', '18:00', 'Stade Jean Bouin', '2020-02-26'),
(115, 'Rugby', '', 'Phase 1 - GROUPE A', '19:15', 'Stade Jean Bouin', '2020-02-26'),
(116, 'Voile', '', 'Phase 1 - GROUPE A', '14:00', 'Pont d\'iéna', '2020-02-26'),
(117, 'Voile', '', 'Phase 2 - GROUPE A', '16:30', 'Pont d\'iéna', '2020-02-26'),
(118, 'Voile', '', 'Phase 2 - GROUPE B', '18:00', 'Pont d\'iéna', '2020-02-26'),
(119, 'Voile', '', 'Phase 1 - GROUPE A', '19:15', 'Pont d\'iéna', '2020-02-26'),
(120, 'Tir', '', 'Phase 1 - GROUPE A', '14:00', 'Stand de tir du Bourget', '2020-02-26'),
(121, 'Tir', '', 'Phase 2 - GROUPE A', '16:30', 'Stand de tir du Bourget', '2020-02-26'),
(122, 'Tir', '', 'Phase 2 - GROUPE B', '18:00', 'Stand de tir du Bourget', '2020-02-26'),
(123, 'Tir', '', 'Phase 1 - GROUPE A', '19:15', 'Stand de tir du Bourget', '2020-02-26'),
(124, 'Tennis de table', '', 'Phase 1 - GROUPE A', '19:00', 'Paris Expo', '2020-02-26'),
(125, 'Tennis de table', '', 'Phase 2 - GROUPE A', '19:30', 'Paris Expo', '2020-02-26'),
(126, 'Tennis de table', '', 'Phase 2 - GROUPE B', '20:00', 'Paris Expo', '2020-02-26'),
(127, 'Tennis de table', '', 'Phase 1 - GROUPE A', '19:15', 'Paris Expo', '2020-02-26'),
(128, 'Taekwondo', '', 'Phase 1 - GROUPE A', '19:00', 'Grand Palais', '2020-02-26'),
(129, 'Taekwondo', '', 'Phase 2 - GROUPE A', '19:30', 'Grand Palais', '2020-02-26'),
(130, 'Taekwondo', '', 'Phase 2 - GROUPE B', '20:00', 'Grand Palais', '2020-02-26'),
(131, 'Taekwondo', '', 'Phase 1 - GROUPE A', '19:15', 'Grand Palais', '2020-02-26'),
(132, 'Tennis', '', 'Phase 1 - GROUPE A', '10:00', 'Stade Roland-Garros', '2020-02-26'),
(133, 'Tennis', '', 'Phase 2 - GROUPE A', '11:00', 'Stade Roland-Garros', '2020-02-26'),
(134, 'Tennis', '', 'Phase 2 - GROUPE B', '15:00', 'Stade Roland-Garros', '2020-02-26'),
(135, 'Tennis', '', 'Phase 1 - GROUPE A', '16:30', 'Stade Roland-Garros', '2020-02-26'),
(136, 'Triathlon', '', 'Phase 1 - GROUPE A', '11:50', 'Tour Eiffel', '2020-02-26'),
(137, 'Triathlon', '', 'Phase 2 - GROUPE A', '11:30', 'Tour Eiffel', '2020-02-26'),
(138, 'Triathlon', '', 'Phase 2 - GROUPE B', '12:30', 'Tour Eiffel', '2020-02-26'),
(139, 'Triathlon', '', 'Phase 1 - GROUPE A', '12:00', 'Tour Eiffel', '2020-02-26'),
(140, 'Haltérophilie', '', 'Phase 1 - GROUPE A', '17:30', 'Le Zénith Paris - La Villette', '2020-02-26'),
(141, 'Haltérophilie', '', 'Phase 2 - GROUPE A', '18:00', 'Le Zénith Paris - La Villette', '2020-02-26'),
(142, 'Haltérophilie', '', 'Phase 2 - GROUPE B', '18:25', 'Le Zénith Paris - La Villette', '2020-02-26'),
(143, 'Haltérophilie', '', 'Phase 1 - GROUPE A', '18:50', 'Le Zénith Paris - La Villette', '2020-02-26'),
(144, 'Lutte', '', 'Phase 1 - GROUPE A', '11:00', 'Grand Palais', '2020-02-26'),
(145, 'Lutte', '', 'Phase 2 - GROUPE A', '12:00', 'Grand Palais', '2020-02-26'),
(146, 'Lutte', '', 'Phase 2 - GROUPE B', '13:00', 'Grand Palais', '2020-02-26'),
(147, 'Lutte', '', 'Phase 1 - GROUPE A', '14:00', 'Grand Palais', '2020-02-26'),
(148, 'Boxe', '', 'Phase 1 - GROUPE A', '11:00', 'Rolland Garros', '2020-02-26'),
(149, 'Boxe', '', 'Phase 2 - GROUPE A', '12:00', 'Rolland Garros', '2020-02-26'),
(150, 'Boxe', '', 'Phase 2 - GROUPE B', '13:00', 'Rolland Garros', '2020-02-26'),
(151, 'Boxe', '', 'Phase 1 - GROUPE A', '14:00', 'Rolland Garros', '2020-02-26'),
(152, 'Tir à l\'arc', '', 'Phase 1 - GROUPE A', '11:00', 'Esplanade des Invalides', '2020-02-26'),
(153, 'Tir à l\'arc', '', 'Phase 2 - GROUPE A', '12:00', 'Esplanade des Invalides', '2020-02-26'),
(154, 'Tir à l\'arc', '', 'Phase 2 - GROUPE B', '13:00', 'Esplanade des Invalides', '2020-02-26'),
(155, 'Tir à l\'arc', '', 'Phase 1 - GROUPE A', '14:00', 'Esplanade des Invalides', '2020-02-26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `epreuves`
--
ALTER TABLE `epreuves`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
