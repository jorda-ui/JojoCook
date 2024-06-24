-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 24 juin 2024 à 09:57
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jojocook`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_identifiant` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom_identifiant` (`nom_identifiant`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `nom_identifiant`, `mot_de_passe`) VALUES
(7, 'JojoCookAdmin', '$2y$10$41hWvE5jMtxLq2uJVAqM6esfugEMD24cSPmdiySFNLS5Os0ftCgOq');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_utilisateurs` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `nom_utilisateurs`, `message`) VALUES
(9, 'test', 'jljlj'),
(8, 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_identifiant` varchar(255) NOT NULL,
  `recette_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `nom_identifiant`, `recette_id`) VALUES
(5, 'test', 5),
(6, 'test', 10);

-- --------------------------------------------------------

--
-- Structure de la table `page_recette`
--

DROP TABLE IF EXISTS `page_recette`;
CREATE TABLE IF NOT EXISTS `page_recette` (
  `id_recette` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `nom_identifiant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `listeUstensiles` varchar(255) DEFAULT NULL,
  `listeIngredients` varchar(255) DEFAULT NULL,
  `Etapes` varchar(255) DEFAULT NULL,
  `preparation` varchar(255) DEFAULT NULL,
  `cuisson` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_recette`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `page_recette`
--

INSERT INTO `page_recette` (`id_recette`, `titre`, `nom_identifiant`, `listeUstensiles`, `listeIngredients`, `Etapes`, `preparation`, `cuisson`) VALUES
(10, 'test', 'test', NULL, NULL, NULL, '11', '1');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `date_de_naissance` date NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` int NOT NULL,
  `mail` varchar(255) NOT NULL,
  `nom_identifiant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `age`, `date_de_naissance`, `adresse`, `ville`, `code_postal`, `mail`, `nom_identifiant`, `mot_de_passe`) VALUES
(17, 'Owczarczak', 'Jordan', 21, '2002-12-19', '45 rue albert Letoret', 'Hirson', 2500, 'owczarczak.jordan@gmail.com', 'jojo', '$2y$10$usxFsho7GHoqFZiBegWuJOfMVdBwJHeagSdOYlDz3rAVAvEwcHaE6'),
(20, 'test', 'test', 15, '0087-07-08', 'test', 'test', 2500, 'test@gmail.com', 'test', '$2y$10$Ta7K7.gn9o13dzTwExcNqulpymn1ov6fHcEKWffTfN4t9CxDlzW3m');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
