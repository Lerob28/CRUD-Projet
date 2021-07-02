-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 02 juil. 2021 à 14:26
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `users`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `photo`, `email`, `pwd`, `niveau`) VALUES
(1, 'Dontsa', 'Cyprien', 'team2.jpg', 'superadmin@gmail.com', 'superadmin', 5),
(3, 'boris', 'guema', 'ball.jpg', 'njfdnbggggbggbggbhjnjhnhj@yhunun.ooiojo', 'nouveau', 1),
(4, 'Njeunkwe Nangue', 'Borel Lobriche', 'img15.jpg', 'borellob@moi.toi', 'uirfhruhij', 1),
(5, 'gcgg', 'gvcgcgg', 'ob_ee5c8a_structure-des-objets.jpg', 'gfgfgchgfchg@vfcgcg.com', 'htftfghgchtfhtfhhcxhgfcjhvchjgcjgcjgcgcnc', 1),
(6, 'dave', 'cedric', 'img12.jpg', 'cedric@deve.com', 'jfoijfiojwojijo', 1),
(8, 'oijjioj', 'oijffffffff', 'objets-connectÃ©s.jpg', 'ijoojioij@jj.como', '54t4jrifrgioejjioj', 1),
(9, 'dfijerfej', 'freifreiurhi', 'img15.jpg', 'hfuwehfwef@dbff.ljoo', 'oijorforfjj', 1),
(10, 'akadGsdcaouilehda', 'fxdtdtdj', 'car-poo.png', 'hdthfyt@yahoo.fr', 'sfzdgxfhgjhk', 1),
(11, 'dfdjffj', 'fjdkgjfdkgj', 'ob_ee5c8a_structure-des-objets.jpg', 'jdfgnjkf@yqhoo.fr', 'dtdyeywtryery', 1),
(12, 'bbbbbbbfd', 'fvvvvvd', 'ammar_dev_classes.png', 'borel@gmail.com', 'fffffffffff', 1),
(14, 'ffff', 'fdffg', 'ob_ee5c8a_structure-des-objets.jpg', 'fewd@gmail.pol', 'ffffffffff', 1),
(16, 'borel', 'njeunkwe', 'img12.jpg', 'njeunkweborel@gmail.com', 'iiiiiiiiiiiiijjjjjjj', 1),
(20, 'erferfrgefgrerr', 'rfrfgtrtggtrt', 'img18.jpg', 'bfffhhhhorel@gmail.com', 'gtrgrrthtrhhythhrdhtrth', 1),
(21, 'fryguu', 'yuveuuyg', 'ammar_dev_classes.png', 'gfgfgchgfchg@vfcgcg.comuu', 'uygygugyrugy', 1),
(22, 'mooik', 'oivorije', 'foundation-inveneo-technicien-tour.jpg', 'fdv@ffd.plll', 'rfoirejvnroivjrvijjjo', 1),
(24, 'ijvuiuhuihuhiju', 'huhihrvueiihvi', 'Sans titre.png', 'njeunkweiiiiiiiiiiiiiiborel@gmail.com', 'ijfirfjfjerr989ruj9', 1),
(25, 'ijvuiuhuihuhiju', 'huhihrvueiihvi', 'ammar_dev_classes.png', 'njeudfvfvvfdnkweiiiiiiiiiiiiiiborel@gmail.com', 'fvvvdfvvfdvdd', 1),
(26, 'cheumegni nangue', 'princesse nelly', 'pexels-photo-5952708.jpeg', 'cnpn@gmail.cm', 'money', 1),
(28, 'Njeunkwe', 'Lobriche', 'img3.jpg', 'borello@gmail.com', 'qwerty', 1),
(29, 'cheunan', 'prinnell', 'img12.jpg', 'princesse@gmail.cm', 'oracle', 1),
(31, 'MBOMEN ', 'Paterson', '100053800601_5842.jpg', 'franckpaterson05@gmai.com', 'franck.', 1),
(32, 'ngonga', 'maurice', 'formation-developpement-web.jpeg', 'ngongamaurice@gmail.com', 'moussa1985', 2),
(33, 'princesse', 'loveline', 'aurore.jpg', 'lovely@yaho.fr', 'pangolain', 1),
(34, 'Tonbong', 'Kevin', 'Sans titre.png', 'kevintonbong@gmail.com', 'kevin', 1),
(35, 'Dave', 'Cedric', 'Sans titre.png', 'dave@cedric.cm', 'ytrewq', 1),
(36, 'Ebanda', 'Pascal', 'img14.jpg', 'Pascalebanda@gmail.com', 'zxcvbnm', 1),
(37, 'k20.', 'kevin', '100053800601_5842.jpg', 'kev@mail.cm', '123456789', 1),
(38, 'nangue', 'raoul', 'andela2.jpg', 'nangueraoul@gmail.com', 'Mbomen@80', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
