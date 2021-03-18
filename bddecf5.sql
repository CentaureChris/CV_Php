-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 18 mars 2021 à 16:00
-- Version du serveur :  5.7.32
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `bddecf5`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_c` int(2) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_c`, `nom`) VALUES
(1, 'aventure'),
(2, 'manga'),
(3, 'theatre');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id_livre` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_category` int(2) NOT NULL,
  `display` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `titre`, `auteur`, `image`, `description`, `created`, `id_category`, `display`) VALUES
(1, 'Game of', 'G.R.R Martin', 'got.jpg', 'L\'intrigue se passe essentiellement sur le continent de Westeros, dans le royaume des Sept Couronnes, un pays dirigé par plusieurs grandes maisons nobles dont une possède le pouvoir royal. Ces puissantes maisons sont les Arryn, les Baratheon, les Lannister, les Martell, les Stark, les Tully et les Tyrell.', '2021-03-18 14:16:04', 2, 1),
(2, 'Le seigneur des anneaux', 'J.R.R Tolkien', 'lsda.jpg', 'Un jeune et timide Hobbit, Frodon Sacquet, hérite d\'un anneau magique. Bien loin d\'être une simple babiole, il s\'agit d\'un instrument de pouvoir absolu qui permettrait à Sauron, le Seigneur des ténèbres, de régner sur la Terre du Milieu et de réduire en esclavage ses peuples. Frodon doit parvenir jusqu\'à la Crevasse du Destin pour détruire l\'anneau.', '2021-03-18 14:16:17', 1, 0),
(4, 'One Piece', 'Eiichiro Oda', 'onepiece.jpg', 'Luffy, un jeune garçon, rêve de devenir le Roi des Pirates en trouvant le One Piece, le trésor ultime rassemblé par Gol D. Roger, le seul pirate à avoir jamais porté le titre de Roi des Pirates. ... Pour échapper à la noyade, il s\'enferme dans un tonneau et se fait repêcher par un jeune garçon du nom de Kobby.', '2021-03-18 14:16:39', 2, 1),
(5, 'L\'attaque des Titans', 'Hajime Isayama', 'snk.jpg', 'L\'Attaque des Titans (en anglais : Attack on Titans et en japonais Shingeki no Kyojin) est un manga shonen de Hajime Isayama publié au Japon depuis 2009, et en France depuis 2013. ... L\'Attaque des Titans raconte l\'histoire d\'une humanité assiégée par des géants carnivores, les Titans.', '2021-03-18 14:18:45', 2, 1),
(6, 'Bel-ami', 'Guy de Maupassant', 'belami.jpg', 'Bel homme, blond, à l\'allure élégante et dynamique, il plaît aux femmes et va se servir de son charme pour réussir dans la vie. Au début du roman, c\'est un jeune homme sans le sou mais ambitieux avant tout. Originaire de Canteleu, près de Rouen, il vient d\'une famille peu aisée. Ses parents tiennent une guinguette.', '2021-03-18 14:18:51', 3, 1),
(8, 'Harry Potter', 'J.K Rowling', 'hp.jpg', 'Orphelin, le jeune Harry Potter peut enfin quitter ses tyranniques oncle et tante Dursley lorsqu\'un curieux messager lui révèle qu\'il est un sorcier. À 11 ans, Harry va enfin pouvoir intégrer la légendaire école de sorcellerie de Poudlard, y trouver une famille digne de ce nom et des amis, développer ses dons, et préparer son glorieux avenir.', '2021-03-18 14:18:30', 1, 1),
(11, 'Les fourberies de Scapin', 'Molière', 'scapin.jpeg', 'Résumé En l\'absence de leurs pères partis en voyage, Octave, fils d\'Argante s\'est épris de Hyacinte, jeune fille pauvre et de naissance inconnue qu\'il vient d\'épouser, tandis que Léandre, fils de Géronte, est tombé amoureux d\'une « jeune Égyptienne », Zerbinette, de passage dans sa troupe .', '2021-03-18 14:51:28', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` int(2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `login`, `pass`, `role`, `created`) VALUES
(1, 'Centaure', 'Chris', 'chris', '21232f297a57a5a743894a0e4a801fc3', 1, '2021-03-17 07:34:41'),
(2, 'Dupont', 'Toto', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2, '2021-03-17 07:34:41'),
(3, 'Nessou', 'ness', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 2, '2021-03-17 11:24:08');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_c`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id_livre`),
  ADD KEY `fk` (`id_category`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_c` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_c`) ON DELETE CASCADE ON UPDATE CASCADE;
