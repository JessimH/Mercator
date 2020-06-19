-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 19 juin 2020 à 16:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `Mercator`
--

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `abbreviation` tinytext,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `abbreviation`, `image`) VALUES
(1, 'Paris Saint-Germain', 'PSG', '1.png'),
(2, 'Real de Madrid', 'REA', '2.png'),
(3, 'Manchester United', 'MUN', '3.png');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `club_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `username`, `date`, `club_id`) VALUES
(35, 12, 'REAL', '2020-06-19 12:40:40', 2),
(36, 6, 'PSG', '2020-06-19 14:54:36', 1);

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `order_details`
--

INSERT INTO `order_details` (`id`, `quantity`, `price`, `name`, `order_id`) VALUES
(7, '1', 165, 'Cavani', 35),
(8, '1', 12, 'Fred', 35),
(9, '1', 123, 'Bale', 36),
(10, '1', 12, 'Casemiro', 36),
(11, '1', 600, 'Benzema', 36),
(12, '1', 12, 'Fred', 36);

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `id_club` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` longtext NOT NULL,
  `post_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `image` varchar(255) DEFAULT NULL,
  `image_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `players`
--

INSERT INTO `players` (`id`, `id_club`, `name`, `price`, `created_at`, `description`, `post_id`, `quantity`, `image`, `image_desc`) VALUES
(36, 1, 'Kimpembe', 123, '2020-06-10 11:58:03', 'Presnel Kimpembe, né le 13 août 1995 à Beaumont-sur-Oise, dans le Val-d\'Oise, est un footballeur international français qui évolue au poste de défenseur au Paris Saint-Germain. Il remporte la Coupe du monde 2018 avec l\'équipe de France', 3, 1, '36.png', '36.png'),
(37, 1, 'Marquinhos', 23, '2020-06-10 11:59:48', 'Marcos Aoás Corrêa dit Marquinhos, né le 14 mai 1994 à São Paulo, est un footballeur international brésilien qui évolue au poste de défenseur central au Paris Saint-Germain, en Ligue 1. Il possède également la nationalité portugaise.', 3, 1, '37.png', '37.png'),
(38, 1, 'Bakker', 12, '2020-06-10 12:02:35', 'Mitchel Bakker, né le 20 juin 2000 à Purmerend, est un footballeur néerlandais qui évolue au poste de défenseur au Paris Saint-Germain. ', 3, 1, '38.png', '38.png'),
(39, 1, 'Thiago Silva', 160, '2020-06-10 12:03:50', 'Thiago Emiliano da Silva, plus connu sous le nom de Thiago Silva, né le 22 septembre 1984 à Rio de Janeiro, au Brésil, est un footballeur international brésilo-français, évoluant en Ligue 1 au poste de défenseur central au Paris Saint-Germain, équipe dont il est le capitaine.', 3, 1, '39.png', '39.png'),
(40, 1, 'Navas', 134, '2020-06-10 12:05:04', 'Keylor Navas, né le 15 décembre 1986 à San Isidro de El General, est un footballeur international costaricien évoluant au poste de gardien de but au Paris Saint-Germain', 4, 1, '40.png', '40.png'),
(41, 1, 'Cavani', 165, '2020-06-10 12:05:53', 'Edinson Roberto Cavani Gómez, surnommé El Matador, né à Salto le 14 février 1987, est un footballeur international uruguayen qui évolue en Ligue 1 au poste d\'attaquant au Paris Saint-Germain FC. Cavani commence sa carrière de footballeur au Danubio Fútbol Club.', 2, 1, '41.png', '41.png'),
(42, 1, 'Choupo-Moting', 3, '2020-06-10 12:11:17', 'Eric Maxim Choupo-Moting, né le 23 mars 1989 à Hambourg, est un footballeur international camerounais qui évolue au poste d\'attaquant au Paris Saint-Germain. Il possède également la nationalité allemande. Formé au Hambourg SV, Choupo-Moting y fait ses premiers pas professionnels avant d’être prêté à Nuremberg. ', 2, 1, '42.png', '42.png'),
(43, 1, 'Draxler', 13, '2020-06-10 12:13:28', 'ulian Draxler, [ˈjuːli̯aːn ˈdʁakslɐ] né le 20 septembre 1993 à Gladbeck, est un footballeur international allemand qui évolue au poste de milieu de terrain au Paris Saint-Germain. ', 2, 1, '43.png', '43.png'),
(44, 1, 'Verratti', 200, '2020-06-10 12:15:31', 'Marco Verratti, né le 5 novembre 1992 à Pescara, est un footballeur international italien qui évolue au poste de milieu de terrain au Paris Saint Germain, en Ligue 1. Verratti fait ses classes à Pescara en Serie B. Âgé de 19 ans seulement, il rejoint le Paris Saint-Germain pour une dizaine de millions d\'euros', 2, 1, '44.png', '44.png'),
(45, 1, 'Mbappe', 500, '2020-06-10 12:16:10', 'Kylian Mbappé, né le 20 décembre 1998 dans le 19ᵉ arrondissement de Paris, est un footballeur international français qui évolue au poste d\'attaquant au Paris Saint-Germain. Vainqueur du championnat de France en 2017 avec l\'AS Monaco, il est transféré au Paris Saint-Germain le 31 août 2017.', 1, 1, '45.png', '45.png'),
(46, 2, 'Bale', 123, '2020-06-10 12:28:14', 'Gareth Frank Bale, né le 16 juillet 1989 à Cardiff est un footballeur international gallois évoluant au poste d\'ailier droit Real Madrid.', 1, 1, '46.png', '46.png'),
(47, 2, 'Benzema', 600, '2020-06-10 12:29:23', 'Karim Benzema, né le 19 décembre 1987 à Lyon, est un footballeur international français évoluant au poste d\'avant-centre au Real Madrid CF', 1, 1, '47.png', '47.png'),
(48, 2, 'Militao', 13, '2020-06-10 12:30:39', 'Éder Gabriel Militão est un footballeur international brésilien, né le 18 janvier 1998 à Sertãozinho. Il évolue au poste de défenseur central au Real Madrid CF.', 3, 1, '48.png', '48.png'),
(49, 2, 'Nacho', 89, '2020-06-10 12:31:12', 'José Ignacio Fernández Iglesias, dit Nacho, né le 18 janvier 1990 à Madrid, est un footballeur international espagnol évoluant au Real Madrid CF en tant que défenseur central. Le frère cadet de Nacho, Álex, est lui aussi footballeur.', 3, 1, '49.png', '49.png'),
(50, 2, 'Varane', 99, '2020-06-10 12:34:24', 'Raphaël Varane, né le 25 avril 1993 à Lille, est un footballeur international français, jouant au poste de défenseur central qui évolue actuellement en Liga au Real Madrid.', 3, 1, '50.png', '50.png'),
(51, 2, 'Courtois', 55, '2020-06-10 12:37:35', 'Thibaut Courtois, né le 11 mai 1992 à Brée en Belgique, est un footballeur international belge. Il évolue au poste de gardien de but au Real Madrid CF, club qu\'il a rejoint lors du mercato hivernal.\r\n', 4, 1, '51.png', '51.png'),
(52, 2, 'Casemiro', 12, '2020-06-10 12:38:42', 'Carlos Henrique Casimiro dit Casemiro, né le 23 février 1992 à São José dos Campos, est un footballeur international brésilien qui évolue au poste de milieu défensif au Real Madrid CF.', 2, 1, '52.png', '52.png'),
(53, 2, 'James', 50, '2020-06-10 12:39:10', 'James David Rodríguez Rubio, dit James Rodríguez ou simplement James, né le 12 juillet 1991 à Cúcuta, est un footballeur international colombien. Évoluant au poste de milieu offensif, il joue pour le Real Madrid depuis 2014. Il possède également la nationalité espagnole depuis 2019. ', 2, 1, '53.png', '53.png'),
(54, 3, 'Martial', 356, '2020-06-11 09:45:18', 'Anthony Martial, né le 5 décembre 1995 à Massy en Essonne, est un footballeur international français qui évolue en Premier League au poste d\'ailier gauche à Manchester United. Il est le frère du défenseur Johan Martial. Avec l\'équipe de France, il participe à l\'Euro 2016.', 1, 1, '54.png', '54.png'),
(55, 3, 'Rashford', 456, '2020-06-11 09:47:37', 'Marcus Rashford, né le 31 octobre 1997 à Wythenshawe, est un footballeur international anglais, qui évolue au poste d\'attaquant à Manchester United.', 1, 1, '55.png', '55.png'),
(56, 3, 'Matic', 34, '2020-06-11 09:49:25', 'Nemanja Matić, né le 1ᵉʳ août 1988 à Vrelo près de Ub en Yougoslavie, est un footballeur serbe, évoluant au poste de milieu de terrain en équipe de Serbie et dans le club anglais de Manchester United.', 3, 1, '56.png', '56.png'),
(57, 3, 'Williams', 256, '2020-06-11 09:50:10', 'Brandon Williams, né le 3 septembre 2000 à Manchester, est un footballeur anglais qui évolue au poste d\'arrière gauche à Manchester United.', 3, 1, '57.png', '57.png'),
(58, 3, 'De Gea', 56, '2020-06-11 09:51:52', 'David de Gea Quintana, né le 7 novembre 1990 à Madrid, est un footballeur international espagnol qui évolue au poste de gardien de but à Manchester United.', 4, 1, '58.png', '58.png'),
(59, 3, 'Lee Grant', 34, '2020-06-11 09:52:27', 'Lee Anderson Grant, né le 27 janvier 1983 à Hemel Hempstead, est un footballeur anglais qui évolue au poste de gardien de but à Manchester United. ', 4, 1, '59.png', '59.png'),
(60, 3, 'Fernandes', 2, '2020-06-11 09:53:35', 'Bruno Miguel Borges Fernandes, plus connu sous le nom de Bruno Fernandes, est un footballeur international portugais né le 8 septembre 1994 à Maia. Il évolue au poste de milieu de terrain au Manchester United', 1, 1, '60.png', '60.png'),
(61, 3, 'Fred', 12, '2020-06-11 09:54:25', 'Frederico Rodrigues de Paula Santos, ou plus simplement Fred, né le 5 mars 1993 à Belo Horizonte, est un footballeur brésilien. Il évolue au poste de milieu de terrain à Manchester United Football Club', 2, 1, '61.png', '61.png'),
(62, 3, 'Mata', 78, '2020-06-11 09:56:02', 'Juan Manuel Mata García dit Juan Mata, né le 28 avril 1988 à Burgos, est un footballeur international espagnol qui évolue au poste de meneur de jeu à Manchester United.', 2, 1, '62.png', '62.png'),
(63, 3, 'Pogba', 69, '2020-06-11 09:56:48', 'Paul Pogba, de son nom complet Paul Labilé Pogba, né le 15 mars 1993 à Lagny-sur-Marne, en Seine-et-Marne, est un joueur de football international français évoluant en Premier League au poste de milieu de terrain au Manchester United.', 2, 1, '63.png', '63.png');

-- --------------------------------------------------------

--
-- Structure de la table `postes`
--

CREATE TABLE `postes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `postes`
--

INSERT INTO `postes` (`id`, `name`) VALUES
(1, 'ATT'),
(2, 'MILL'),
(3, 'DEF'),
(4, 'GK');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `club_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(4) DEFAULT '0',
  `adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `club_id`, `password`, `email`, `is_admin`, `adress`) VALUES
(6, 'PSG', 1, '098f6bcd4621d373cade4e832627b4f6', 'psg@psg.com', 0, '23 avenue de la convention'),
(7, 'MUN', 3, '098f6bcd4621d373cade4e832627b4f6', 'mun@mun.com', 0, '23 avenue de la convention'),
(9, 'test2', 2, '098f6bcd4621d373cade4e832627b4f6', 'test@hotmail.fr', 1, 'test'),
(12, 'Zinedine Zidane', 2, '098f6bcd4621d373cade4e832627b4f6', 'real@real.com', 0, 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_user_id` (`order_id`);

--
-- Index pour la table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `postes`
--
ALTER TABLE `postes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_club` (`club_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `postes`
--
ALTER TABLE `postes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_club` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
