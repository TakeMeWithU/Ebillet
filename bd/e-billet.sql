-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 21 Octobre 2018 à 11:48
-- Version du serveur :  5.6.37
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `e-billet`
--

-- --------------------------------------------------------

--
-- Structure de la table `Artists`
--

CREATE TABLE IF NOT EXISTS `Artists` (
  `artist_id` bigint(20) unsigned NOT NULL,
  `artist_image` varchar(80) DEFAULT NULL,
  `artist_name` varchar(50) NOT NULL,
  `artist_firstname` varchar(50) DEFAULT NULL,
  `artist_birthday` date DEFAULT NULL,
  `artist_mail` varchar(80) NOT NULL,
  `artist_phone` char(13) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Artists`
--

INSERT INTO `Artists` (`artist_id`, `artist_image`, `artist_name`, `artist_firstname`, `artist_birthday`, `artist_mail`, `artist_phone`) VALUES
(1, NULL, 'JORIS', 'DELACROIX ', '1995-05-05', 'joris@artist.com', '0906050203'),
(2, NULL, 'P!NK', NULL, '1986-09-12', 'pink@artist.com', '0904563212'),
(3, NULL, 'John', 'Kander', '1987-08-12', 'Kander@artist.com', '0908653212'),
(4, NULL, 'Fred', 'Ebb', '1993-05-12', 'fredebb@artist.com', '0965321245'),
(5, NULL, 'Bon', 'Foss', '1992-12-21', 'foss@artist.com', '0965321452');

-- --------------------------------------------------------

--
-- Structure de la table `Booking`
--

CREATE TABLE IF NOT EXISTS `Booking` (
  `booking_id` bigint(20) unsigned NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `booking_price` double NOT NULL,
  `booking_quantity` int(11) NOT NULL,
  `booking_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Clients`
--

CREATE TABLE IF NOT EXISTS `Clients` (
  `client_id` bigint(20) unsigned NOT NULL,
  `client_identifiant` varchar(80) NOT NULL,
  `client_password` varchar(80) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_firstname` varchar(50) NOT NULL,
  `client_birthday` date NOT NULL,
  `client_mail` varchar(80) NOT NULL,
  `client_phone` char(13) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Clients`
--

INSERT INTO `Clients` (`client_id`, `client_identifiant`, `client_password`, `client_name`, `client_firstname`, `client_birthday`, `client_mail`, `client_phone`) VALUES
(1, 'test1', '123456', 'Thomas', 'Vedis', '1997-05-11', 'thomas@dzad.com', '0605332655'),
(2, 'test2', '123456', 'Charly', 'Dorbes', '1963-05-11', 'charly@dzad.com', '045321564'),
(3, 'test3', '123456', 'Tony', 'Nguyen', '1981-05-11', 'tony@dzad.com', '05461328'),
(4, 'test4', '123456', 'Nicolas', 'Nelkin', '2001-05-11', 'nicolas@dzad.com', '0504060104');

-- --------------------------------------------------------

--
-- Structure de la table `Contracts`
--

CREATE TABLE IF NOT EXISTS `Contracts` (
  `contract_id` bigint(20) unsigned NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Contracts`
--

INSERT INTO `Contracts` (`contract_id`, `artist_id`, `product_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Products`
--

CREATE TABLE IF NOT EXISTS `Products` (
  `product_id` bigint(20) unsigned NOT NULL,
  `product_image` varchar(80) DEFAULT NULL,
  `product_name` varchar(80) NOT NULL,
  `product_place` text NOT NULL,
  `product_designation` text,
  `product_category` varchar(25) NOT NULL,
  `product_sub_category` varchar(25) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_stock` int(11) DEFAULT NULL,
  `product_departure` datetime NOT NULL,
  `product_enddate` datetime DEFAULT NULL,
  `product_price` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Products`
--

INSERT INTO `Products` (`product_id`, `product_image`, `product_name`, `product_place`, `product_designation`, `product_category`, `product_sub_category`, `product_quantity`, `product_stock`, `product_departure`, `product_enddate`, `product_price`) VALUES
(1, NULL, 'JORIS DELACROIX', 'LA BAM (BOÎTE À MUSIQUES)57070 METZ', NULL, 'Concert', 'Electro', 30, NULL, '2018-10-20 00:00:00', '2018-10-21 00:00:00', 25),
(2, NULL, 'BEAUTIFUL TRAUMA', 'PARIS LA DEFENSE ARENA , 99 Jardins de lArche 92000 NANTERRE', 'Inters Concerts (L2/1049236-3/1049237) et Marshall Arts présentent Avec NRJ, W9 et Le Parisien ce concert\r\n\r\nP!nk en concert à Paris - La Défense Arena\r\n\r\n+ 1eres partie : Vance Joy and DJ Kid Cut Up\r\n\r\nP!NK ARRIVE EN FRANCE, QUE LE SPECTACLE COMMENCE“\r\nDANS LE CADRE DE SA NOUVELLE TOURNEE POUR L’ETE 2019\r\nP!NK BEAUTIFUL TRAUMA WORLD TOUR 2019\r\n\r\nNouvelle date en France après 5 ans : L’Icone de la Pop Internationale P!NK annonce aujourd’hui son concert au Paris - La Défense Arena“ pour l’été prochain. Concert qui fera parti de la tournée\r\n\r\n P!NK BEAUTIFUL TRA', 'Concert', 'Pop-Rock', 500, NULL, '2019-07-03 20:00:00', NULL, 106),
(3, NULL, 'CHICAGO', '75009 Paris', 'CHICAGO le musical, créé en 1975, est l’œuvre de trois auteurs de génie: John Kander, Fred Ebb et Bob Fosse. Le revival est depuis plus de 21 ans à l’affiche à New-York et détient à ce titre le record de longévité.', 'Spectacle', 'Grance Spectacle', 50, NULL, '2018-09-18 00:00:00', '2019-06-30 00:00:00', 65.5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Artists`
--
ALTER TABLE `Artists`
  ADD PRIMARY KEY (`artist_id`),
  ADD UNIQUE KEY `artist_id` (`artist_id`);

--
-- Index pour la table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD UNIQUE KEY `booking_id` (`booking_id`);

--
-- Index pour la table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_id` (`client_id`),
  ADD UNIQUE KEY `client_identifiant` (`client_identifiant`);

--
-- Index pour la table `Contracts`
--
ALTER TABLE `Contracts`
  ADD PRIMARY KEY (`contract_id`),
  ADD UNIQUE KEY `contract_id` (`contract_id`);

--
-- Index pour la table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Artists`
--
ALTER TABLE `Artists`
  MODIFY `artist_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `booking_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `client_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Contracts`
--
ALTER TABLE `Contracts`
  MODIFY `contract_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Products`
--
ALTER TABLE `Products`
  MODIFY `product_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
