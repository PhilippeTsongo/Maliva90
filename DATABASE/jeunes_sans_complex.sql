-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 07 Mars 2022 à 08:17
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `jeunes_sans_complex`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_connect` varchar(20) NOT NULL,
  `email_connect` varchar(35) NOT NULL,
  `pass_word_connect` varchar(20) NOT NULL,
  `confirm_pass` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `name_connect`, `email_connect`, `pass_word_connect`, `confirm_pass`) VALUES
(1, 'meschack', 'kaserekamaliva@gmail.com', 'meschack', 'meschack');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tel` int(16) NOT NULL,
  `zip_code` varchar(25) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date_command` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `name`, `email`, `address`, `tel`, `zip_code`, `product_name`, `unit_price`, `quantity`, `total_price`, `date_command`) VALUES
(1, 'philippe', 'tsongophil@gmail.com', 'goma', 984568345, '1234576', 'Capuche Avec marque Jeune sans complex en couleur orange', 20, 10, 200, '2022-01-27'),
(2, 'philippe', 'tsongophil@gmail.com', 'goma', 984568345, '1234576', 'Capuche Avec marque Jeune sans complex en couleur orange', 20, 10, 200, '2022-01-27'),
(3, 'philippe', 'tsongophil@gmail.com', 'goma', 984568345, '1234576', 'Capuche Avec marque Jeune sans complex en couleur orange', 20, 10, 200, '2022-01-27'),
(4, 'philippe', 'tsongophil@gmail.com', 'RDC GOMA Himbi', 97112237, '098345', 'Bonnet avec marque jeune sans complex', 5, 10, 50, '2022-01-28'),
(5, 'philippe', 'tsongophil@gmail.com', 'RDC GOMA Himbi', 97112237, '098345', 'Bonnet avec marque jeune sans complex', 5, 10, 50, '2022-01-28'),
(6, 'philippe', 'tsongophil@gmail.com', 'RDC GOMA Himbi', 97112237, '098345', 'Bonnet avec marque jeune sans complex', 5, 10, 50, '2022-01-28'),
(7, 'philippe', 'tsongophil@gmail.com', 'RDC GOMA Himbi', 97112237, '098345', 'Bonnet avec marque jeune sans complex', 5, 10, 50, '2022-01-28');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `message` text NOT NULL,
  `date_message` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `date_message`) VALUES
(1, 'philippe', 'jacob956@gmail.com', 'je voulais savoir comment passer un commande en ligne', '2022-01-25 00:44:56'),
(2, 'philippe', 'jacob956@gmail.com', 'je voulais savoir comment passer un commande en ligne', '2022-01-25 00:46:21'),
(3, 'archippe', 'archippe334@gmail.com', 'bien bien ceci est un bon marché', '2022-01-25 00:47:54'),
(4, 'archippe', 'archippe334@gmail.com', 'bien bien ceci est un bon marché', '2022-01-25 00:49:38'),
(5, 'archippe', 'archippe334@gmail.com', 'bien bien ceci est un bon marché', '2022-01-25 00:50:01'),
(6, 'archippe', 'archippe334@gmail.com', 'bien bien ceci est un bon marché', '2022-01-25 00:50:51'),
(7, 'archippe', 'archippe334@gmail.com', 'bien bien ceci est un bon marché', '2022-01-25 00:51:10'),
(8, 'archippe', 'archippe334@gmail.com', 'bien bien ceci est un bon marché', '2022-01-25 00:51:41'),
(9, 'archippe', 'archippe334@gmail.com', 'bien bien ceci est un bon marché', '2022-01-25 01:00:04'),
(10, 'archippe', 'archippe334@gmail.com', 'bien bien ceci est un bon marché', '2022-01-25 01:00:40'),
(11, 'philippe', 'philippetsongo90@gmail.com', 'bien bien', '2022-01-30 10:12:24'),
(12, 'philippe', 'philippetsongo90@gmail.com', 'bien bien', '2022-01-30 10:30:14'),
(13, 'philippe', 'philippetsongo90@gmail.com', 'bien bien', '2022-01-30 10:30:59'),
(14, 'philippe', 'philippetsongo90@gmail.com', 'bien bien', '2022-01-30 10:33:00'),
(15, 'philippe', 'philippetsongo90@gmail.com', 'bien bien', '2022-01-30 10:33:57'),
(16, 'philippe', 'philippetsongo90@gmail.com', 'bien bien', '2022-01-30 10:36:56'),
(17, 'philippe', 'philippetsongo90@gmail.com', 'bien bien', '2022-01-30 10:38:39');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass_word` varchar(50) NOT NULL,
  `confirm_pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `name`, `email`, `pass_word`, `confirm_pass`) VALUES
(1, 'philippe', 'philippetsongo90@gmail.com', '69dd0d17085451edc7a356c689407429fc6cea46', '69dd0d17085451edc7a356c689407429fc6cea46'),
(2, 'pacifique', 'pacifique90@gmail.com', '69dd0d17085451edc7a356c689407429fc6cea46', '69dd0d17085451edc7a356c689407429fc6cea46'),
(3, 'facile', 'facile90@gmail.com', '69dd0d17085451edc7a356c689407429fc6cea46', '69dd0d17085451edc7a356c689407429fc6cea46'),
(4, 'jacob', 'jacob90@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(5, 'jacob', 'jacob2@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '8cb2237d0679ca88db6464eac60da96345513964'),
(6, 'meschack', 'kaserekamaliva@gmail.com', '69dd0d17085451edc7a356c689407429fc6cea46', '69dd0d17085451edc7a356c689407429fc6cea46'),
(7, 'philippe', 'philippetsongo@gmail.com', '69dd0d17085451edc7a356c689407429fc6cea46', '69dd0d17085451edc7a356c689407429fc6cea46'),
(8, 'phil', 'thkvphil@gmail.com', '69dd0d17085451edc7a356c689407429fc6cea46', '69dd0d17085451edc7a356c689407429fc6cea46'),
(9, 'phil', 'thkvpi9@gmail.com', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', 'da4b9237bacccdf19c0760cab7aec4a8359010b0'),
(10, 'phil', 'thkvpi2@gmail.com', '77de68daecd823babbb58edb1c8e14d7106e83bb', '77de68daecd823babbb58edb1c8e14d7106e83bb'),
(11, 'philippe', 'philippetsongo@90gmail.com', '69dd0d17085451edc7a356c689407429fc6cea46', '69dd0d17085451edc7a356c689407429fc6cea46'),
(12, 'philippe', 'tsongophil@gmail.com', 'ee782133513f1911d572b6adeb65f85c26b64ed7', 'ee782133513f1911d572b6adeb65f85c26b64ed7'),
(13, 'facile', 'facilekam@gmail.com', '69dd0d17085451edc7a356c689407429fc6cea46', '69dd0d17085451edc7a356c689407429fc6cea46'),
(14, 'nehemie', 'nehemietahakava@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(15, 'nehemie', 'nehemietahakava1@gmail.com', '69dd0d17085451edc7a356c689407429fc6cea46', '69dd0d17085451edc7a356c689407429fc6cea46'),
(16, 'phil', 'philtsongo73@gmail.com', '69dd0d17085451edc7a356c689407429fc6cea46', '69dd0d17085451edc7a356c689407429fc6cea46'),
(17, 'jacques', 'jacques@gmail.com', 'e888d2bd6f13f82caa51a37c03d034c76f661ba3', 'e888d2bd6f13f82caa51a37c03d034c76f661ba3'),
(18, 'philippe', 'phitsondkjc@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '8cb2237d0679ca88db6464eac60da96345513964'),
(19, 'phill', 'philtsongjhf@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '7c222fb2927d828af22f592134e8932480637c0d');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `name`, `email`) VALUES
(1, 'philippe', '0'),
(2, 'facile', 'facile90@gmail.com'),
(3, 'jacob', 'jacob90@gmail.com'),
(4, 'jacob', 'jacob2@gmail.com'),
(5, 'meschack', 'kaserekamaliva@gmail.com'),
(6, 'nehemie', 'nehemietahakava@gmail.com'),
(7, 'philippe', 'philippetsongo@gmail.com'),
(8, 'phil', 'thkvphil@gmail.com'),
(9, 'phil', 'thkvphi@gmail.com'),
(10, 'phil', 'thkvpi@gmail.com'),
(11, 'phil', 'thkvpi10@gmail.com'),
(12, 'phil', 'thkvpi11@gmail.com'),
(13, 'phil', 'thkvpi12@gmail.com'),
(14, 'phil', 'thkvpi13@gmail.com'),
(15, 'phil', 'thkvpi9@gmail.com'),
(16, 'phil', 'thkvpi2@gmail.com'),
(17, 'philippe', 'philippetsongo@90gmail.com'),
(18, 'philippe', 'tsongophil@gmail.com'),
(19, 'facile', 'facilekam@gmail.com'),
(20, 'nehemie', 'nehemietahakava1@gmail.com'),
(21, 'Philippe', 'philtsongo567@gmail.com'),
(22, 'philippe', 'philippetsongo90@gmail.com'),
(23, 'philippe', 'jacob956@gmail.com'),
(24, 'archippe', 'archippe334@gmail.com'),
(25, 'tsongo', 'tsongo40@gamail.com'),
(26, 'phil', 'philtsongo73@gmail.com'),
(27, 'jacques', 'jacques@gmail.com'),
(28, 'philippe', 'phitsondkjc@gmail.com'),
(29, 'phill', 'philtsongjhf@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `prod`
--

CREATE TABLE IF NOT EXISTS `prod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(155) NOT NULL,
  `price` int(11) NOT NULL,
  `descript` text NOT NULL,
  `cat_name` varchar(55) NOT NULL,
  `category` varchar(50) NOT NULL,
  `color` varchar(15) NOT NULL,
  `size` varchar(10) NOT NULL,
  `date_pub` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `prod`
--

INSERT INTO `prod` (`id`, `name`, `price`, `descript`, `cat_name`, `category`, `color`, `size`, `date_pub`) VALUES
(1, 'Microphone fantôme', 150, '', 'Instruments musicaux', 'électronique', '', '', '2022-01-22'),
(2, 'Imprimente photocopieuse en couleur', 50, '', 'Matériels informatiques', 'électronique', '', '', '2022-01-22'),
(3, 'ordinateur portable marque hp ', 850, '', 'Matériels informatiques', 'électronique', '', '', '2022-01-23'),
(4, 'Gaufrier 2 plaques pour faire de bonnes gaufres', 20, '', 'Matériels de ménage', 'électronique', '', '', '2022-01-23'),
(5, 'Ventilateur debout marque clickon', 50, '', 'Matériels de ménage', 'électronique', '', '', '2022-01-22'),
(6, 'Mxeur 16 pistes', 450, '', 'Instruments musicaux', 'électronique', '', '', '2022-01-23'),
(7, 'Piano Yamaha psr 463', 500, 'Un piane de puissance avec une mélodie splendide', 'Instruments musicaux', 'électronique', '', '', '2022-02-27'),
(8, 'Microphone Tovaste', 25, '', 'Instruments musicaux', 'électronique', '', '', '2022-01-23'),
(9, 'Ampli Behriger ', 700, '', 'Instruments musicaux', 'électronique', '', '', '2022-01-23'),
(10, 'Marteau piquer Makita', 600, '', 'Matériels de menuiserie', 'électronique', '', '', '2022-01-23'),
(11, 'Moteur Compresseur avec une haute puissance', 600, '', 'Goupes électrogènes', 'électronique', '', '', '2022-01-23'),
(12, 'Bonnet avec marque jeune sans complex', 5, '', 'Chapeau ', 'vêtement', '', '', '2022-01-23'),
(13, 'Capuche Avec marque Jeune sans complex en couleur orange', 20, '', 'Tricot', 'vêtement', '', '', '2022-01-23'),
(14, 'T-shirt avec marque Jeune sans complex avec manche courte', 8, 'Ce t-shirt; avec marque Jeune sans complex est de bonne qualité avec un tissus facile d''être laver', 'T-shirt', 'vêtement', 'red', 'X, XL,XXL,', '2022-01-24'),
(15, 'T-shirt avec marque Jeune sans complex manche Longue', 8, 'T-shirt bien propre avec des manches longues', 'T-shirt', 'vêtement', 'blanche', 'XL', '2022-01-26'),
(16, 'Capuche Avec marque Jeune sans complex en couleur jaune', 20, '', 'Tricot ', 'vêtement', '', '', '2022-01-23'),
(17, 'Fer à repasser clikon', 25, 'Fer à repasser très léger pour vous filiter la tâche', 'Matériels de ménage', 'électronique', '', '', '2022-01-28'),
(18, 'Imprimente photocopieuse marque HP en couleur', 550, 'Cette imprimente est Caractérisée par une vitesse excéptionelle et d''une meilleur qualité d''impression ', 'Matériels informatiques', 'électronique', 'Noir', '', '2022-03-04'),
(19, 'Gaufrier 2 plaques', 20, 'Ce gaufrier est très facile à utiliser et il a une consommation économique du courant.', 'Matériels de ménage', 'électronique', '', '', '2022-01-28'),
(20, 'Microphone avec trepied', 45, 'Ce microphone est accompgané d''un trepied et d''un fils avec une longueur vous permettant de bien vous placer ', 'Instruments musicaux', 'électronique', '', '', '2022-01-28'),
(21, 'Scie makita', 350, 'Scie makita', 'Matériels de menuiserie', 'électronique', '', '', '2022-01-28'),
(22, 'Moteur Compresseur ', 450, 'Moteur Compresseur  ', 'Goupes électrogènes', 'électronique', '', '', '2022-01-28'),
(23, 'Moteur King Max 5500', 260, 'Moteur King Max 5500', 'Goupes électrogènes', 'électronique', '', '', '2022-01-28'),
(24, 'Disquesuse Makita ', 180, 'Disquesuse Makita ', 'Matériels de menuiserie', 'électronique', '', '', '2022-01-28'),
(25, 'Tuyaux de refoulement', 200, 'Avec plus de metres', 'Goupes électrogènes', 'électronique', '', '', '2022-01-28'),
(26, 'Dispositif de refoulement pour motopompe', 150, 'Dispositif de refoulement pour motopompe', 'Goupes électrogènes', 'électronique', '', '', '2022-01-28'),
(27, 'Gaufrier 2 plaques qui fait des groufres rectagles', 20, 'Gaufrier 2 plaques qui fait des groufres rectagles', 'Matériels de ménage', 'électronique', '', '', '2022-01-28'),
(28, 'climatiseur', 50, 'Climatiseur debout éauipe d''une partie électronique vous permettant de faire le reglage', 'Matériels de ménage', 'électronique', '', '', '2022-01-28'),
(29, 'moteur motopompe HONDA 160', 200, 'moteur motopompe 160', 'Goupes électrogènes', 'électronique', '', '', '2022-01-29'),
(31, 'Drum acoustique TOVASTE ', 500, 'Un kit complet ', 'Instruments musicaux', 'électronique', '', '', '2022-01-29'),
(32, 'Drum acoustique tansen', 550, 'un appareil à 5 kit', 'Instruments musicaux', 'électronique', '', '', '2022-02-27'),
(33, 'drum', 550, 'une bonne qualité', 'Instruments musicaux', 'électronique', '', '', '2022-03-04');

-- --------------------------------------------------------

--
-- Structure de la table `products_com`
--

CREATE TABLE IF NOT EXISTS `products_com` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `web_site` varchar(50) NOT NULL,
  `product_detail_name` varchar(200) NOT NULL,
  `date_comment` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `products_com`
--

INSERT INTO `products_com` (`id`, `comment`, `name`, `email`, `web_site`, `product_detail_name`, `date_comment`) VALUES
(1, 'bien bien', 'Philippe', 'philtsongo567@gmail.com', '', 'Capuche Avec marque Jeune sans complex en couleur orange', '2022-01-24 13:46:45'),
(2, 'bien bien', 'Philippe', 'philtsongo567@gmail.com', '', 'Capuche Avec marque Jeune sans complex en couleur orange', '2022-01-24 13:47:08'),
(3, 'bien bien', 'Philippe', 'philtsongo567@gmail.com', '', 'Capuche Avec marque Jeune sans complex en couleur orange', '2022-01-24 13:53:08'),
(4, 'bien bien', 'Philippe', 'philtsongo567@gmail.com', '', 'Capuche Avec marque Jeune sans complex en couleur orange', '2022-01-24 14:02:47'),
(5, 'une bonne machine', 'philippe', 'philippetsongo90@gmail.com', 'geekofgeek.com', 'ordinateur portable marque hp', '2022-01-24 14:04:24'),
(6, 'bien bien', 'Philippe', 'philtsongo567@gmail.com', '', 'Capuche Avec marque Jeune sans complex en couleur orange', '2022-01-24 14:53:25'),
(7, 'bien bien', 'Philippe', 'philtsongo567@gmail.com', '', 'Capuche Avec marque Jeune sans complex en couleur orange', '2022-01-24 14:56:58'),
(8, 'bien bien', 'Philippe', 'philtsongo567@gmail.com', '', 'Capuche Avec marque Jeune sans complex en couleur orange', '2022-01-24 14:58:01'),
(9, 'une super machine. ', 'tsongo', 'philippetsongo90@gmail.com', '', 'ordinateur portable marque hp', '2022-01-24 15:10:50'),
(10, 'hey it is so good', 'tsongo', 'tsongo40@gamail.com', '', 'T-shirt avec marque Jeune sans complex avec manche courte', '2022-01-26 11:01:27'),
(11, 'hey it is so good', 'tsongo', 'tsongo40@gamail.com', '', 'T-shirt avec marque Jeune sans complex avec manche courte', '2022-01-26 11:02:54'),
(12, 'hey it is so good', 'tsongo', 'tsongo40@gamail.com', '', 'T-shirt avec marque Jeune sans complex avec manche courte', '2022-01-26 11:05:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
