-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 mars 2020 à 09:16
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite_compl`
--

DROP TABLE IF EXISTS `activite_compl`;
CREATE TABLE IF NOT EXISTS `activite_compl` (
  `AC_NUM` int(11) NOT NULL AUTO_INCREMENT,
  `AC_DATE` datetime DEFAULT NULL,
  `AC_LIEU` varchar(25) DEFAULT NULL,
  `AC_THEME` varchar(10) DEFAULT NULL,
  `AC_MOTIF` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`AC_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `composant`
--

DROP TABLE IF EXISTS `composant`;
CREATE TABLE IF NOT EXISTS `composant` (
  `CMP_CODE` varchar(4) NOT NULL,
  `CMP_LIBELLE` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`CMP_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `constituer`
--

DROP TABLE IF EXISTS `constituer`;
CREATE TABLE IF NOT EXISTS `constituer` (
  `MED_DEPOTLEGAL` varchar(10) NOT NULL,
  `CMP_CODE` varchar(4) NOT NULL,
  `CST_QTE` float DEFAULT NULL,
  PRIMARY KEY (`MED_DEPOTLEGAL`,`CMP_CODE`),
  KEY `MED_DEPOTLEGAL` (`MED_DEPOTLEGAL`),
  KEY `CMP_CODE` (`CMP_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `dosage`
--

DROP TABLE IF EXISTS `dosage`;
CREATE TABLE IF NOT EXISTS `dosage` (
  `DOS_CODE` varchar(10) NOT NULL,
  `DOS_QUANTITE` varchar(10) DEFAULT NULL,
  `DOS_UNITE` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`DOS_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `FAM_CODE` varchar(3) NOT NULL,
  `FAM_LIBELLE` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`FAM_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`FAM_CODE`, `FAM_LIBELLE`) VALUES
('AA', 'Antalgiques en association'),
('AAA', 'Antalgiques antipyrétiques en association'),
('AAC', 'Antidépresseur d\'action centrale'),
('AAH', 'Antivertigineux antihistaminique H1'),
('ABA', 'Antibiotique antituberculeux'),
('ABC', 'Antibiotique antiacnéique local'),
('ABP', 'Antibiotique de la famille des béta-lactamines (pénicilline A)'),
('AFC', 'Antibiotique de la famille des cyclines'),
('AFM', 'Antibiotique de la famille des macrolides'),
('AH', 'Antihistaminique H1 local'),
('AIM', 'Antidépresseur imipraminique (tricyclique)'),
('AIN', 'Antidépresseur inhibiteur sélectif de la recapture de la sérotonine'),
('ALO', 'Antibiotique local (ORL)'),
('ANS', 'Antidépresseur IMAO non sélectif'),
('AO', 'Antibiotique ophtalmique'),
('AP', 'Antipsychotique normothymique'),
('AUM', 'Antibiotique urinaire minute'),
('CRT', 'Corticoïde, antibiotique et antifongique à  usage local'),
('HYP', 'Hypnotique antihistaminique'),
('PSA', 'Psychostimulant, antiasthénique');

-- --------------------------------------------------------

--
-- Structure de la table `formuler`
--

DROP TABLE IF EXISTS `formuler`;
CREATE TABLE IF NOT EXISTS `formuler` (
  `MED_DEPOTLEGAL` varchar(10) NOT NULL,
  `PRE_CODE` varchar(2) NOT NULL,
  PRIMARY KEY (`MED_DEPOTLEGAL`,`PRE_CODE`),
  KEY `MED_DEPOTLEGAL` (`MED_DEPOTLEGAL`),
  KEY `PRE_CODE` (`PRE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `interagir`
--

DROP TABLE IF EXISTS `interagir`;
CREATE TABLE IF NOT EXISTS `interagir` (
  `MED_PERTURBATEUR` varchar(10) NOT NULL,
  `MED_MED_PERTURBE` varchar(10) NOT NULL,
  PRIMARY KEY (`MED_PERTURBATEUR`,`MED_MED_PERTURBE`),
  KEY `MED_MED_PERTURBE` (`MED_MED_PERTURBE`),
  KEY `MED_PERTURBATEUR` (`MED_PERTURBATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inviter`
--

DROP TABLE IF EXISTS `inviter`;
CREATE TABLE IF NOT EXISTS `inviter` (
  `AC_NUM` int(11) NOT NULL,
  `PRA_NUM` int(11) NOT NULL,
  `SPECIALISTEON` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`AC_NUM`,`PRA_NUM`),
  KEY `AC_NUM` (`AC_NUM`),
  KEY `PRA_NUM` (`PRA_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `labo`
--

DROP TABLE IF EXISTS `labo`;
CREATE TABLE IF NOT EXISTS `labo` (
  `LAB_CODE` varchar(2) NOT NULL,
  `LAB_NOM` varchar(10) DEFAULT NULL,
  `LAB_CHEFVENTE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`LAB_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `labo`
--

INSERT INTO `labo` (`LAB_CODE`, `LAB_NOM`, `LAB_CHEFVENTE`) VALUES
('BC', 'Bichat', 'Suzanne Terminus'),
('GY', 'Gyverny', 'Marcel MacDouglas'),
('SW', 'Swiss Kane', 'Alain Poutre');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

DROP TABLE IF EXISTS `medicament`;
CREATE TABLE IF NOT EXISTS `medicament` (
  `MED_DEPOTLEGAL` varchar(10) NOT NULL,
  `MED_NOMCOMMERCIAL` varchar(25) DEFAULT NULL,
  `FAM_CODE` varchar(3) NOT NULL,
  `MED_COMPOSITION` varchar(255) DEFAULT NULL,
  `MED_EFFETS` varchar(255) DEFAULT NULL,
  `MED_CONTREINDIC` varchar(255) DEFAULT NULL,
  `MED_PRIXECHANTILLON` float DEFAULT NULL,
  PRIMARY KEY (`MED_DEPOTLEGAL`),
  KEY `FAM_CODE` (`FAM_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`MED_DEPOTLEGAL`, `MED_NOMCOMMERCIAL`, `FAM_CODE`, `MED_COMPOSITION`, `MED_EFFETS`, `MED_CONTREINDIC`, `MED_PRIXECHANTILLON`) VALUES
('3MYC7', 'TRIMYCINE', 'CRT', 'Triamcinolone (acétonide) + Néomycine + Nystatine', 'Ce médicament est un corticoïde à  activité forte ou très forte associé à  un antibiotique et un antifongique, utilisé en application locale dans certaines atteintes cutanées surinfectées.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, d\'infections de la peau ou de parasitisme non traités, d\'acné. Ne pas appliquer sur une plaie, ni sous un pansement occlusif.', NULL),
('ADIMOL9', 'ADIMOL', 'ABP', 'Amoxicilline + Acide clavulanique', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines ou aux céphalosporines.', NULL),
('AMOPIL7', 'AMOPIL', 'ABP', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines. Il doit être administré avec prudence en cas d\'allergie aux céphalosporines.', NULL),
('AMOX45', 'AMOXAR', 'ABP', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'La prise de ce médicament peut rendre positifs les tests de dépistage du dopage.', NULL),
('AMOXIG12', 'AMOXI Gé', 'ABP', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines. Il doit être administré avec prudence en cas d\'allergie aux céphalosporines.', NULL),
('APATOUX22', 'APATOUX Vitamine C', 'ALO', 'Tyrothricine + Tétracaïne + Acide ascorbique (Vitamine C)', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, en cas de phénylcétonurie et chez l\'enfant de moins de 6 ans.', NULL),
('BACTIG10', 'BACTIGEL', 'ABC', 'Erythromycine', 'Ce médicament est utilisé en application locale pour traiter l\'acné et les infections cutanées bactériennes associées.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antibiotiques de la famille des macrolides ou des lincosanides.', NULL),
('BACTIV13', 'BACTIVIL', 'AFM', 'Erythromycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', NULL),
('BITALV', 'BIVALIC', 'AAA', 'Dextropropoxyphène + Paracétamol', 'Ce médicament est utilisé pour traiter les douleurs d\'intensité modérée ou intense.', 'Ce médicament est contre-indiqué en cas d\'allergie aux médicaments de cette famille, d\'insuffisance hépatique ou d\'insuffisance rénale.', NULL),
('CARTION6', 'CARTION', 'AAA', 'Acide acétylsalicylique (aspirine) + Acide ascorbique (Vitamine C) + Paracétamol', 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.', 'Ce médicament est contre-indiqué en cas de troubles de la coagulation (tendances aux hémorragies), d\'ulcère gastroduodénal, maladies graves du foie.', NULL),
('CLAZER6', 'CLAZER', 'AFM', 'Clarithromycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques. Il est également utilisé dans le traitement de l\'ulcère gastro-duodénal, en association avec d\'autres médicaments.', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', NULL),
('DEPRIL9', 'DEPRAMIL', 'AIM', 'Clomipramine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères, certaines douleurs rebelles, les troubles obsessionnels compulsifs et certaines énurésies chez l\'enfant.', 'Ce médicament est contre-indiqué en cas de glaucome ou d\'adénome de la prostate, d\'infarctus récent, ou si vous avez reà§u un traitement par IMAO durant les 2 semaines précédentes ou en cas d\'allergie aux antidépresseurs imipraminiques.', NULL),
('DIMIRTAM6', 'DIMIRTAM', 'AAC', 'Mirtazapine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères.', 'La prise de ce produit est contre-indiquée en cas de d\'allergie à  l\'un des constituants.', NULL),
('DOLRIL7', 'DOLORIL', 'AAA', 'Acide acétylsalicylique (aspirine) + Acide ascorbique (Vitamine C) + Paracétamol', 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.', 'Ce médicament est contre-indiqué en cas d\'allergie au paracétamol ou aux salicylates.', NULL),
('DORNOM8', 'NORMADOR', 'HYP', 'Doxylamine', 'Ce médicament est utilisé pour traiter l\'insomnie chez l\'adulte.', 'Ce médicament est contre-indiqué en cas de glaucome, de certains troubles urinaires (rétention urinaire) et chez l\'enfant de moins de 15 ans.', NULL),
('EQUILARX6', 'EQUILAR', 'AAH', 'Méclozine', 'Ce médicament est utilisé pour traiter les vertiges et pour prévenir le mal des transports.', 'Ce médicament ne doit pas être utilisé en cas d\'allergie au produit, en cas de glaucome ou de rétention urinaire.', NULL),
('EVILR7', 'EVEILLOR', 'PSA', 'Adrafinil', 'Ce médicament est utilisé pour traiter les troubles de la vigilance et certains symptomes neurologiques chez le sujet agé.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants.', NULL),
('INSXT5', 'INSECTIL', 'AH', 'Diphénydramine', 'Ce médicament est utilisé en application locale sur les piqûres d\'insecte et l\'urticaire.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antihistaminiques.', NULL),
('JOVAI8', 'JOVENIL', 'AFM', 'Josamycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', NULL),
('LIDOXY23', 'LIDOXYTRACINE', 'AFC', 'Oxytétracycline +Lidocaïne', 'Ce médicament est utilisé en injection intramusculaire pour traiter certaines infections spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants. Il ne doit pas être associé aux rétinoïdes.', NULL),
('LITHOR12', 'LITHORINE', 'AP', 'Lithium', 'Ce médicament est indiqué dans la prévention des psychoses maniaco-dépressives ou pour traiter les états maniaques.', 'Ce médicament ne doit pas être utilisé si vous êtes allergique au lithium. Avant de prendre ce traitement, signalez à  votre médecin traitant si vous souffrez d\'insuffisance rénale, ou si vous avez un régime sans sel.', NULL),
('PARMOL16', 'PARMOCODEINE', 'AA', 'Codéine + Paracétamol', 'Ce médicament est utilisé pour le traitement des douleurs lorsque des antalgiques simples ne sont pas assez efficaces.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, chez l\'enfant de moins de 15 Kg, en cas d\'insuffisance hépatique ou respiratoire, d\'asthme, de phénylcétonurie et chez la femme qui allaite.', NULL),
('PHYSOI8', 'PHYSICOR', 'PSA', 'Sulbutiamine', 'Ce médicament est utilisé pour traiter les baisses d\'activité physique ou psychique, souvent dans un contexte de dépression.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants.', NULL),
('PIRIZ8', 'PIRIZAN', 'ABA', 'Pyrazinamide', 'Ce médicament est utilisé, en association à  d\'autres antibiotiques, pour traiter la tuberculose.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, d\'insuffisance rénale ou hépatique, d\'hyperuricémie ou de porphyrie.', NULL),
('POMDI20', 'POMADINE', 'AO', 'Bacitracine', 'Ce médicament est utilisé pour traiter les infections oculaires de la surface de l\'oeil.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antibiotiques appliqués localement.', NULL),
('TROXT21', 'TROXADET', 'AIN', 'Paroxétine', 'Ce médicament est utilisé pour traiter la dépression et les troubles obsessionnels compulsifs. Il peut également être utilisé en prévention des crises de panique avec ou sans agoraphobie.', 'Ce médicament est contre-indiqué en cas d\'allergie au produit.', NULL),
('TXISOL22', 'TOUXISOL Vitamine C', 'ALO', 'Tyrothricine + Acide ascorbique (Vitamine C)', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants et chez l\'enfant de moins de 6 ans.', NULL),
('URIEG6', 'URIREGUL', 'AUM', 'Fosfomycine trométamol', 'Ce médicament est utilisé pour traiter les infections urinaires simples chez la femme de moins de 65 ans.', 'La prise de ce médicament est contre-indiquée en cas d\'allergie à  l\'un des constituants et d\'insuffisance rénale.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `offrir`
--

DROP TABLE IF EXISTS `offrir`;
CREATE TABLE IF NOT EXISTS `offrir` (
  `VIS_MATRICULE` varchar(10) NOT NULL,
  `RAP_NUM` int(11) NOT NULL,
  `MED_DEPOTLEGAL` varchar(30) NOT NULL,
  `OFF_QTE` int(11) DEFAULT NULL,
  PRIMARY KEY (`VIS_MATRICULE`,`RAP_NUM`,`MED_DEPOTLEGAL`),
  KEY `MED_DEPOTLEGAL` (`MED_DEPOTLEGAL`),
  KEY `VIS_MATRICULE` (`VIS_MATRICULE`,`RAP_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offrir`
--

INSERT INTO `offrir` (`VIS_MATRICULE`, `RAP_NUM`, `MED_DEPOTLEGAL`, `OFF_QTE`) VALUES
('a131', 1, 'INSECTIL', 3),
('a131', 1, 'NORMADOR', 3),
('a131', 33, 'EVEILLOR', 4),
('a131', 33, 'TRIMYCINE', 4),
('a131', 35, 'EVEILLOR', 5),
('a131', 35, 'PHYSICOR', 5),
('a131', 35, 'TRIMYCINE', 5),
('a131', 36, 'TRIMYCINE', 5),
('a131', 37, 'DIMIRTAM', 5),
('a131', 37, 'LIDOXYTRACINE', 5),
('a131', 37, 'TRIMYCINE', 5),
('a131', 43, 'CARTION', 5),
('a131', 43, 'JOVENIL', 5),
('a131', 43, 'TRIMYCINE', 5),
('a131', 45, 'AMOXAR', 8),
('a131', 45, 'DIMIRTAM', 8),
('a131', 46, 'AMOXAR', 8),
('a131', 46, 'DIMIRTAM', 8),
('a131', 46, 'INSECTIL', 8857),
('a131', 47, 'EVEILLOR', 8),
('a131', 48, 'TRIMYCINE', 6),
('a131', 49, 'BIVALIC', 5),
('a131', 49, 'EVEILLOR', 5),
('a131', 66, 'JOVENIL', 5),
('a131', 67, 'NORMADOR', 8),
('a131', 67, 'TRIMYCINE', 8),
('a17', 40, 'BACTIGEL', 4),
('a17', 40, 'LIDOXYTRACINE', 4),
('a17', 40, 'PARMOCODEINE', 4),
('zzz', 5, '3MYC7', 45);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

DROP TABLE IF EXISTS `posseder`;
CREATE TABLE IF NOT EXISTS `posseder` (
  `PRA_NUM` int(11) NOT NULL,
  `SPE_CODE` varchar(5) NOT NULL,
  `POS_DIPLOME` varchar(10) DEFAULT NULL,
  `POS_COEFPRESCRIPTION` float DEFAULT NULL,
  PRIMARY KEY (`PRA_NUM`,`SPE_CODE`),
  KEY `PRA_NUM` (`PRA_NUM`),
  KEY `SPE_CODE` (`SPE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `praticien`
--

DROP TABLE IF EXISTS `praticien`;
CREATE TABLE IF NOT EXISTS `praticien` (
  `PRA_NUM` int(11) NOT NULL,
  `PRA_NOM` varchar(25) DEFAULT NULL,
  `PRA_PRENOM` varchar(30) DEFAULT NULL,
  `PRA_ADRESSE` varchar(50) DEFAULT NULL,
  `PRA_CP` varchar(5) DEFAULT NULL,
  `PRA_VILLE` varchar(25) DEFAULT NULL,
  `PRA_COEFNOTORIETE` float DEFAULT NULL,
  `TYP_CODE` varchar(3) NOT NULL,
  PRIMARY KEY (`PRA_NUM`),
  KEY `TYP_CODE` (`TYP_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `praticien`
--

INSERT INTO `praticien` (`PRA_NUM`, `PRA_NOM`, `PRA_PRENOM`, `PRA_ADRESSE`, `PRA_CP`, `PRA_VILLE`, `PRA_COEFNOTORIETE`, `TYP_CODE`) VALUES
(1, 'Notini', 'Alain', '114 r Authie', '85000', 'LA ROCHE SUR YON', 290.03, 'MH'),
(2, 'Gosselin', 'Albert', '13 r Devon', '41000', 'BLOIS', 307.49, 'MV'),
(3, 'Delahaye', 'André', '36 av 6 Juin', '25000', 'BESANCON', 185.79, 'PS'),
(4, 'Leroux', 'André', '47 av Robert Schuman', '60000', 'BEAUVAIS', 172.04, 'PH'),
(5, 'Desmoulins', 'Anne', '31 r St Jean', '30000', 'NIMES', 94.75, 'PO'),
(6, 'Mouel', 'Anne', '27 r Auvergne', '80000', 'AMIENS', 45.2, 'MH'),
(7, 'Desgranges-Lentz', 'Antoine', '1 r Albert de Mun', '29000', 'MORLAIX', 20.07, 'MV'),
(8, 'Marcouiller', 'Arnaud', '31 r St Jean', '68000', 'MULHOUSE', 396.52, 'PS'),
(9, 'Dupuy', 'Benoit', '9 r Demolombe', '34000', 'MONTPELLIER', 395.66, 'PH'),
(10, 'Lerat', 'Bernard', '31 r St Jean', '59000', 'LILLE', 257.79, 'PO'),
(11, 'Marçais-Lefebvre', 'Bertrand', '86Bis r Basse', '67000', 'STRASBOURG', 450.96, 'MH'),
(12, 'Boscher', 'Bruno', '94 r Falaise', '10000', 'TROYES', 356.14, 'MV'),
(13, 'Morel', 'Catherine', '21 r Chateaubriand', '75000', 'PARIS', 379.57, 'PS'),
(14, 'Guivarch', 'Chantal', '4 av Gén Laperrine', '45000', 'ORLEANS', 114.56, 'PH'),
(15, 'Bessin-Grosdoit', 'Christophe', '92 r Falaise', '6000', 'NICE', 222.06, 'PO'),
(16, 'Rossa', 'Claire', '14 av Thiès', '6000', 'NICE', 529.78, 'MH'),
(17, 'Cauchy', 'Denis', '5 av Ste Thérèse', '11000', 'NARBONNE', 458.82, 'MV'),
(18, 'Gaffé', 'Dominique', '9 av 1ère Armée Française', '35000', 'RENNES', 213.4, 'PS'),
(19, 'Guenon', 'Dominique', '98 bd Mar Lyautey', '44000', 'NANTES', 175.89, 'PH'),
(20, 'Prévot', 'Dominique', '29 r Lucien Nelle', '87000', 'LIMOGES', 151.36, 'PO'),
(21, 'Houchard', 'Eliane', '9 r Demolombe', '49100', 'ANGERS', 436.96, 'MH'),
(22, 'Desmons', 'Elisabeth', '51 r Bernières', '29000', 'QUIMPER', 281.17, 'MV'),
(23, 'Flament', 'Elisabeth', '11 r Pasteur', '35000', 'RENNES', 315.6, 'PS'),
(24, 'Goussard', 'Emmanuel', '9 r Demolombe', '41000', 'BLOIS', 40.72, 'PH'),
(25, 'Desprez', 'Eric', '9 r Vaucelles', '33000', 'BORDEAUX', 406.85, 'PO'),
(26, 'Coste', 'Evelyne', '29 r Lucien Nelle', '19000', 'TULLE', 441.87, 'MH'),
(27, 'Lefebvre', 'Frédéric', '2 pl Wurzburg', '55000', 'VERDUN', 573.63, 'MV'),
(28, 'Lemée', 'Frédéric', '29 av 6 Juin', '56000', 'VANNES', 326.4, 'PS'),
(29, 'Martin', 'Frédéric', 'Bât A 90 r Bayeux', '70000', 'VESOUL', 506.06, 'PH'),
(30, 'Marie', 'Frédérique', '172 r Caponière', '70000', 'VESOUL', 313.31, 'PO'),
(31, 'Rosenstech', 'Geneviève', '27 r Auvergne', '75000', 'PARIS', 366.82, 'MH'),
(32, 'Pontavice', 'Ghislaine', '8 r Gaillon', '86000', 'POITIERS', 265.58, 'MV'),
(33, 'Leveneur-Mosquet', 'Guillaume', '47 av Robert Schuman', '64000', 'PAU', 184.97, 'PS'),
(34, 'Blanchais', 'Guy', '30 r Authie', '8000', 'SEDAN', 502.48, 'PH'),
(35, 'Leveneur', 'Hugues', '7 pl St Gilles', '62000', 'ARRAS', 7.39, 'PO'),
(36, 'Mosquet', 'Isabelle', '22 r Jules Verne', '76000', 'ROUEN', 77.1, 'MH'),
(37, 'Giraudon', 'Jean-Christophe', '1 r Albert de Mun', '38100', 'VIENNE', 92.62, 'MV'),
(38, 'Marie', 'Jean-Claude', '26 r Hérouville', '69000', 'LYON', 120.1, 'PS'),
(39, 'Maury', 'Jean-François', '5 r Pierre Girard', '71000', 'CHALON SUR SAONE', 13.73, 'PH'),
(40, 'Dennel', 'Jean-Louis', '7 pl St Gilles', '28000', 'CHARTRES', 550.69, 'PO'),
(41, 'Ain', 'Jean-Pierre', '4 résid Olympia', '2000', 'LAON', 5.59, 'MH'),
(42, 'Chemery', 'Jean-Pierre', '51 pl Ancienne Boucherie', '14000', 'CAEN', 396.58, 'MV'),
(43, 'Comoz', 'Jean-Pierre', '35 r Auguste Lechesne', '18000', 'BOURGES', 340.35, 'PS'),
(44, 'Desfaudais', 'Jean-Pierre', '7 pl St Gilles', '29000', 'BREST', 71.76, 'PH'),
(45, 'Phan', 'JérÃ´me', '9 r Clos Caillet', '79000', 'NIORT', 451.61, 'PO'),
(46, 'Riou', 'Line', '43 bd Gén Vanier', '77000', 'MARNE LA VALLEE', 193.25, 'MH'),
(47, 'Chubilleau', 'Louis', '46 r Eglise', '17000', 'SAINTES', 202.07, 'MV'),
(48, 'Lebrun', 'Lucette', '178 r Auge', '54000', 'NANCY', 410.41, 'PS'),
(49, 'Goessens', 'Marc', '6 av 6 Juin', '39000', 'DOLE', 548.57, 'PH'),
(50, 'Laforge', 'Marc', '5 résid Prairie', '50000', 'SAINT LO', 265.05, 'PO'),
(51, 'Millereau', 'Marc', '36 av 6 Juin', '72000', 'LA FERTE BERNARD', 430.42, 'MH'),
(52, 'Dauverne', 'Marie-Christine', '69 av Charlemagne', '21000', 'DIJON', 281.05, 'MV'),
(53, 'Vittorio', 'Myriam', '3 pl Champlain', '94000', 'BOISSY SAINT LEGER', 356.23, 'PS'),
(54, 'Lapasset', 'Nhieu', '31 av 6 Juin', '52000', 'CHAUMONT', 107, 'PH'),
(55, 'Plantet-Besnier', 'Nicole', '10 av 1ère Armée Française', '86000', 'CHATELLEREAULT', 369.94, 'PO'),
(56, 'Chubilleau', 'Pascal', '3 r Hastings', '15000', 'AURRILLAC', 290.75, 'MH'),
(57, 'Robert', 'Pascal', '31 r St Jean', '93000', 'BOBIGNY', 162.41, 'MV'),
(58, 'Jean', 'Pascale', '114 r Authie', '49100', 'SAUMUR', 375.52, 'PS'),
(59, 'Chanteloube', 'Patrice', '14 av Thiès', '13000', 'MARSEILLE', 478.01, 'PH'),
(60, 'Lecuirot', 'Patrice', 'résid St Pères 55 r Pigacière', '54000', 'NANCY', 239.66, 'PO'),
(61, 'Gandon', 'Patrick', '47 av Robert Schuman', '37000', 'TOURS', 599.06, 'MH'),
(62, 'Mirouf', 'Patrick', '22 r Puits Picard', '74000', 'ANNECY', 458.42, 'MV'),
(63, 'Boireaux', 'Philippe', '14 av Thiès', '10000', 'CHALON EN CHAMPAGNE', 454.48, 'PS'),
(64, 'Cendrier', 'Philippe', '7 pl St Gilles', '12000', 'RODEZ', 164.16, 'PH'),
(65, 'Duhamel', 'Philippe', '114 r Authie', '34000', 'MONTPELLIER', 98.62, 'PO'),
(66, 'Grigy', 'Philippe', '15 r Mélingue', '44000', 'CLISSON', 285.1, 'MH'),
(67, 'Linard', 'Philippe', '1 r Albert de Mun', '81000', 'ALBI', 486.3, 'MV'),
(68, 'Lozier', 'Philippe', '8 r Gaillon', '31000', 'TOULOUSE', 48.4, 'PS'),
(69, 'Dechâtre', 'Pierre', '63 av Thiès', '23000', 'MONTLUCON', 253.75, 'PH'),
(70, 'Goessens', 'Pierre', '22 r Jean Romain', '40000', 'MONT DE MARSAN', 426.19, 'PO'),
(71, 'Leménager', 'Pierre', '39 av 6 Juin', '57000', 'METZ', 118.7, 'MH'),
(72, 'Née', 'Pierre', '39 av 6 Juin', '82000', 'MONTAUBAN', 72.54, 'MV'),
(73, 'Guyot', 'Pierre-Laurent', '43 bd Gén Vanier', '48000', 'MENDE', 352.31, 'PS'),
(74, 'Chauchard', 'Roger', '9 r Vaucelles', '13000', 'MARSEILLE', 552.19, 'PH'),
(75, 'Mabire', 'Roland', '11 r Boutiques', '67000', 'STRASBOURG', 422.39, 'PO'),
(76, 'Leroy', 'Soazig', '45 r Boutiques', '61000', 'ALENCON', 570.67, 'MH'),
(77, 'Guyot', 'Stéphane', '26 r Hérouville', '46000', 'FIGEAC', 28.85, 'MV'),
(78, 'Delposen', 'Sylvain', '39 av 6 Juin', '27000', 'DREUX', 292.01, 'PS'),
(79, 'Rault', 'Sylvie', '15 bd Richemond', '2000', 'SOISSON', 526.6, 'PH'),
(80, 'Renouf', 'Sylvie', '98 bd Mar Lyautey', '88000', 'EPINAL', 425.24, 'PO'),
(81, 'Alliet-Grach', 'Thierry', '14 av Thiès', '7000', 'PRIVAS', 451.31, 'MH'),
(82, 'Bayard', 'Thierry', '92 r Falaise', '42000', 'SAINT ETIENNE', 271.71, 'MV'),
(83, 'Gauchet', 'Thierry', '7 r Desmoueux', '38100', 'GRENOBLE', 406.1, 'PS'),
(84, 'Bobichon', 'Tristan', '219 r Caponière', '9000', 'FOIX', 218.36, 'PH'),
(85, 'Duchemin-Laniel', 'Véronique', '130 r St Jean', '33000', 'LIBOURNE', 265.61, 'PO'),
(86, 'Laurent', 'Younès', '34 r Demolombe', '53000', 'MAYENNE', 496.1, 'MH');

-- --------------------------------------------------------

--
-- Structure de la table `prescrire`
--

DROP TABLE IF EXISTS `prescrire`;
CREATE TABLE IF NOT EXISTS `prescrire` (
  `MED_DEPOTLEGAL` varchar(10) NOT NULL,
  `TIN_CODE` varchar(5) NOT NULL,
  `DOS_CODE` varchar(10) NOT NULL,
  `PRE_POSOLOGIE` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`MED_DEPOTLEGAL`,`TIN_CODE`,`DOS_CODE`),
  KEY `MED_DEPOTLEGAL` (`MED_DEPOTLEGAL`),
  KEY `TIN_CODE` (`TIN_CODE`),
  KEY `DOS_CODE` (`DOS_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
CREATE TABLE IF NOT EXISTS `presentation` (
  `PRE_CODE` varchar(2) NOT NULL,
  `PRE_LIBELLE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PRE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rapport_visite`
--

DROP TABLE IF EXISTS `rapport_visite`;
CREATE TABLE IF NOT EXISTS `rapport_visite` (
  `VIS_MATRICULE` varchar(10) NOT NULL,
  `RAP_NUM` int(11) NOT NULL AUTO_INCREMENT,
  `PRA_NUM` int(11) NOT NULL,
  `RAP_DATE` date DEFAULT NULL,
  `RAP_BILAN` varchar(255) DEFAULT NULL,
  `RAP_MOTIF` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`VIS_MATRICULE`,`RAP_NUM`),
  KEY `PRA_NUM` (`PRA_NUM`),
  KEY `VIS_MATRICULE` (`VIS_MATRICULE`),
  KEY `RAP_NUM` (`RAP_NUM`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rapport_visite`
--

INSERT INTO `rapport_visite` (`VIS_MATRICULE`, `RAP_NUM`, `PRA_NUM`, `RAP_DATE`, `RAP_BILAN`, `RAP_MOTIF`) VALUES
('a131', 7, 41, '2003-03-23', 'RAS\r\nChangement de tel : 05 89 89 89 89', 'Rapport Annuel'),
('a131', 24, 9, '2019-12-26', 'zaerfgtfh', 'zdefrgfh'),
('a131', 25, 14, '2021-12-26', 'LA RAVEL', 'zdefrgfhzadzfa'),
('a131', 26, 15, '2019-12-28', 'zaertyukilom', 'zrethyjuki'),
('a131', 27, 1, '2019-12-26', 'ruyoiezlyhfipzùeofjm', 'frtziueoy$'),
('a131', 28, 1, '2019-12-26', 'ruyoiezlyhfipzùeofjmazefgrthy', 'frtziueoy$'),
('a131', 29, 15, '2020-03-12', 'azefrgth', 'zdefrgt'),
('a131', 30, 1, '2019-12-13', 'AZDEFRGHN', 'aSZQDESFRGHN'),
('a131', 31, 1, '2019-12-16', 'zaefrgbfh', 'zdefrgthy'),
('a131', 32, 1, '2019-12-05', 'ZEFRGDH', 'ZERGTH'),
('a131', 33, 13, '2019-12-04', 'gvhbjnkl,m;ù:', 'trdyfugihojk'),
('a131', 34, 14, '2019-12-05', 'ceci est un test', 'Malade'),
('a131', 35, 14, '2019-12-11', '78', '78'),
('a131', 36, 5, '2019-12-10', 'ezfgfb', 'esregf'),
('a131', 37, 5, '2019-12-10', 'ezfgfb', 'esregf'),
('a131', 38, 1, '2019-12-18', 'zuhsejdkezlkfjhezomhfezpiezoiphjfezôihjfezpoimfjeziop^fjeazîoefùjezoi^p', 'malade'),
('a131', 39, 1, '2019-12-13', 'zdefgrhnj,', 'zdefg'),
('a131', 42, 1, '2019-12-13', 'TRYFGUIHOJKLP', 'malade'),
('a131', 43, 1, '2019-12-06', 'ledfhkvazygazoieddddzufdhzomslfehzohfrzohnfoihgoezglfez', 'MaLaDeUh'),
('a131', 44, 1, '2019-12-06', 'ledfhkvazygazoieddddzufdhzomslfehzohfrzohnfoihgoezglfez', 'MaLaDeUh'),
('a131', 45, 16, '2019-12-11', 'il va bien', 'BOBO'),
('a131', 46, 16, '2019-12-11', 'il va bien', 'BOBO'),
('a131', 47, 16, '2019-12-11', 'il va bien', 'BOBO'),
('a131', 48, 1, '2019-11-28', 'zdesfv', 'qsdcvf'),
('a131', 49, 12, '2019-12-18', 'Elle est toujours débile', 'Oriane est débile'),
('a131', 50, 1, '2019-11-29', 'ytugihojkpl', 'maladejytg'),
('a131', 51, 1, '2019-11-29', 'ytugihojkpl', 'maladejytg'),
('a131', 52, 1, '2019-11-29', 'ytugihojkpl', 'maladejytg'),
('a131', 53, 1, '2019-11-29', 'ytugihojkpl', 'maladejytg'),
('a131', 54, 1, '2019-11-29', 'ytugihojkpl', 'maladejytg'),
('a131', 55, 1, '2019-11-29', 'ytugihojkpl', 'maladejytg'),
('a131', 56, 1, '2019-11-29', 'ytugihojkpl', 'maladejytg'),
('a131', 57, 1, '2019-11-29', 'ytugihojkpl', 'maladejytg'),
('a131', 58, 1, '2019-11-29', 'ytugihojkpl', 'maladejytg'),
('a131', 59, 1, '2019-11-29', 'ytugihojkpl', 'maladejytg'),
('a131', 60, 1, '2019-11-29', 'ytugihojkpl', 'maladejytg'),
('a131', 61, 1, '2019-11-29', 'ytugihojkpl', 'maladejytg'),
('a131', 62, 1, '2019-11-29', 'ytugihojkpl', 'maladejytg'),
('a131', 63, 1, '2019-12-18', 'adiluahkgjfdb', 'Maladeuhhh'),
('a131', 64, 36, '2019-12-19', 'azerthy', 'zaezrgt'),
('a131', 65, 18, '2019-12-20', 'azergthyj', '&éearzgthyj;'),
('a131', 66, 1, '2019-11-28', 'AZERZTYU', 'DZERGTHYU'),
('a131', 67, 33, '2019-12-20', 'c un mauvais toutou', 'Natacha est malade'),
('a131', 68, 1, '2020-03-14', 'azfazfzafzaffazzfafza', 'testVueTemplate'),
('a17', 40, 12, '2019-12-09', 'ZOIFJZOEIHFOZIHFEOZÏHFOIZE', 'TestPremierCR'),
('a17', 41, 1, '2019-12-05', '\"ér\'ty', 'sdfgh'),
('zzz', 8, 41, '2019-05-02', 'vraiment tres maladekjhjio', 'malade'),
('zzz', 9, 41, '2019-05-06', 'vraiment tres maladekjhjio,hgjhgbk', 'maladejytg'),
('zzz', 10, 41, '2019-05-02', 'gneu', 'gneu gneu'),
('zzz', 11, 41, '2019-05-02', 'testetstestetstzafdtyfza', 'test'),
('zzz', 12, 41, '2019-05-14', 'yghkjnl,;!:', 'malade'),
('zzz', 13, 41, '2019-05-08', 'dxgfchvjbknl', 'malade'),
('zzz', 19, 86, '2019-05-02', 'eryizopq', 'gezyidojks'),
('zzz', 20, 86, '2019-05-02', ':(', 'malade'),
('zzz', 21, 86, '2019-01-31', 'gneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneugneu gneu', 'gneu gneu'),
('zzz', 22, 86, '2019-05-16', 'kgjhkkl:l', 'ygkhjok'),
('zzz', 23, 86, '2019-05-10', 'ergsdf', 'bedsc');

-- --------------------------------------------------------

--
-- Structure de la table `realiser`
--

DROP TABLE IF EXISTS `realiser`;
CREATE TABLE IF NOT EXISTS `realiser` (
  `AC_NUM` int(11) NOT NULL,
  `VIS_MATRICULE` varchar(10) NOT NULL,
  `REA_MTTFRAIS` float DEFAULT NULL,
  PRIMARY KEY (`AC_NUM`,`VIS_MATRICULE`),
  KEY `AC_NUM` (`AC_NUM`),
  KEY `VIS_MATRICULE` (`VIS_MATRICULE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `REG_CODE` varchar(2) NOT NULL,
  `SEC_CODE` varchar(1) NOT NULL,
  `REG_NOM` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`REG_CODE`),
  KEY `SEC_CODE` (`SEC_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`REG_CODE`, `SEC_CODE`, `REG_NOM`) VALUES
('AL', 'E', 'Alsace Lorraine'),
('AQ', 'S', 'Aquitaine'),
('AU', 'P', 'Auvergne'),
('BG', 'O', 'Bretagne'),
('BN', 'O', 'Basse Normandie'),
('BO', 'E', 'Bourgogne'),
('CA', 'N', 'Champagne Ardennes'),
('CE', 'P', 'Centre'),
('FC', 'E', 'Franche Comté'),
('HN', 'N', 'Haute Normandie'),
('IF', 'P', 'Ile de France'),
('LG', 'S', 'Languedoc'),
('LI', 'P', 'Limousin'),
('MP', 'S', 'Midi Pyrénée'),
('NP', 'N', 'Nord Pas de Calais'),
('PA', 'S', 'Provence Alpes Cote d\'Azur'),
('PC', 'O', 'Poitou Charente'),
('PI', 'N', 'Picardie'),
('PL', 'O', 'Pays de Loire'),
('RA', 'E', 'Rhone Alpes'),
('RO', 'S', 'Roussilon'),
('VD', 'O', 'Vendée');

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `SEC_CODE` varchar(1) NOT NULL,
  `SEC_LIBELLE` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`SEC_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`SEC_CODE`, `SEC_LIBELLE`) VALUES
('E', 'Est'),
('N', 'Nord'),
('O', 'Ouest'),
('P', 'Paris centre'),
('S', 'Sud');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `SPE_CODE` varchar(5) NOT NULL,
  `SPE_LIBELLE` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`SPE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`SPE_CODE`, `SPE_LIBELLE`) VALUES
('ACP', 'anatomie et cytologie pathologiques'),
('AMV', 'angéiologie, médecine vasculaire'),
('ARC', 'anesthésiologie et réanimation chirurgicale'),
('BM', 'biologie médicale'),
('CAC', 'cardiologie et affections cardio-vasculaires'),
('CCT', 'chirurgie cardio-vasculaire et thoracique'),
('CG', 'chirurgie générale'),
('CMF', 'chirurgie maxillo-faciale'),
('COM', 'cancérologie, oncologie médicale'),
('COT', 'chirurgie orthopédique et traumatologie'),
('CPR', 'chirurgie plastique reconstructrice et esthétique'),
('CU', 'chirurgie urologique'),
('CV', 'chirurgie vasculaire'),
('DN', 'diabétologie-nutrition, nutrition'),
('DV', 'dermatologie et vénéréologie'),
('EM', 'endocrinologie et métabolismes'),
('ETD', 'évaluation et traitement de la douleur'),
('GEH', 'gastro-entérologie et hépatologie (appareil digestif)'),
('GMO', 'gynécologie médicale, obstétrique'),
('GO', 'gynécologie-obstétrique'),
('HEM', 'maladies du sang (hématologie)'),
('MBS', 'médecine et biologie du sport'),
('MDT', 'médecine du travail'),
('MMO', 'médecine manuelle - ostéopathie'),
('MN', 'médecine nucléaire'),
('MPR', 'médecine physique et de réadaptation'),
('MTR', 'médecine tropicale, pathologie infectieuse et tropicale'),
('NEP', 'néphrologie'),
('NRC', 'neurochirurgie'),
('NRL', 'neurologie'),
('ODM', 'orthopédie dento maxillo-faciale'),
('OPH', 'ophtalmologie'),
('ORL', 'oto-rhino-laryngologie'),
('PEA', 'psychiatrie de l\'enfant et de l\'adolescent'),
('PME', 'pédiatrie maladies des enfants'),
('PNM', 'pneumologie'),
('PSC', 'psychiatrie'),
('RAD', 'radiologie (radiodiagnostic et imagerie médicale)'),
('RDT', 'radiothérapie (oncologie option radiothérapie)'),
('RGM', 'reproduction et gynécologie médicale'),
('RHU', 'rhumatologie'),
('STO', 'stomatologie'),
('SXL', 'sexologie'),
('TXA', 'toxicomanie et alcoologie');

-- --------------------------------------------------------

--
-- Structure de la table `switchboard items`
--

DROP TABLE IF EXISTS `switchboard items`;
CREATE TABLE IF NOT EXISTS `switchboard items` (
  `SwitchboardID` int(11) NOT NULL,
  `ItemNumber` int(11) NOT NULL DEFAULT '0',
  `ItemText` varchar(255) DEFAULT NULL,
  `Command` int(11) DEFAULT NULL,
  `Argument` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SwitchboardID`,`ItemNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `switchboard items`
--

INSERT INTO `switchboard items` (`SwitchboardID`, `ItemNumber`, `ItemText`, `Command`, `Argument`) VALUES
(1, 0, 'Gestion des comptes rendus', NULL, 'Par défaut'),
(1, 1, 'Comptes-Rendus', 3, 'RAPPORT_VISITE'),
(1, 2, 'Visiteurs', 3, 'F_VISITEUR'),
(1, 3, 'Praticiens', 3, 'F_PRATICIEN'),
(1, 4, 'Medicaments', 3, 'F_MEDICAMENT'),
(1, 5, 'Quitter', 8, 'quitter');

-- --------------------------------------------------------

--
-- Structure de la table `travailler`
--

DROP TABLE IF EXISTS `travailler`;
CREATE TABLE IF NOT EXISTS `travailler` (
  `VIS_MATRICULE` varchar(10) NOT NULL,
  `JJMMAA` datetime NOT NULL,
  `REG_CODE` varchar(2) NOT NULL,
  `TRA_ROLE` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`JJMMAA`,`VIS_MATRICULE`,`REG_CODE`),
  KEY `VIS_MATRICULE` (`VIS_MATRICULE`),
  KEY `REG_CODE` (`REG_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `travailler`
--

INSERT INTO `travailler` (`VIS_MATRICULE`, `JJMMAA`, `REG_CODE`, `TRA_ROLE`) VALUES
('p49', '1977-10-03 00:00:00', 'CE', 'Visiteur'),
('k53', '1983-03-23 00:00:00', 'CA', 'Visiteur'),
('r24', '1984-07-29 00:00:00', 'BN', 'Visiteur'),
('g53', '1985-10-02 00:00:00', 'BG', 'Visiteur'),
('a55', '1987-07-17 00:00:00', 'MP', 'Visiteur'),
('m35', '1987-10-06 00:00:00', 'MP', 'Visiteur'),
('e39', '1988-04-26 00:00:00', 'IF', 'Visiteur'),
('c14', '1989-02-01 00:00:00', 'PA', 'Visiteur'),
('e22', '1989-03-24 00:00:00', 'AL', 'Visiteur'),
('p7', '1990-03-01 00:00:00', 'RO', 'Visiteur'),
('r58', '1990-06-30 00:00:00', 'BG', 'Visiteur'),
('m45', '1990-10-13 00:00:00', 'AL', 'Visiteur'),
('e5', '1990-11-27 00:00:00', 'MP', 'Visiteur'),
('t60', '1991-03-29 00:00:00', 'CE', 'Visiteur'),
('c54', '1991-04-09 00:00:00', 'AL', 'Visiteur'),
('p8', '1991-06-23 00:00:00', 'BO', 'Visiteur'),
('a17', '1991-08-26 00:00:00', 'RA', 'Visiteur'),
('e52', '1991-10-31 00:00:00', 'HN', 'Visiteur'),
('d13', '1991-12-05 00:00:00', 'PL', 'Visiteur'),
('k53', '1992-04-03 00:00:00', 'AL', 'Délégué'),
('c3', '1992-05-05 00:00:00', 'CA', 'Visiteur'),
('n58', '1992-08-30 00:00:00', 'CE', 'Visiteur'),
('s21', '1992-09-25 00:00:00', 'LI', 'Visiteur'),
('h40', '1992-11-01 00:00:00', 'CA', 'Visiteur'),
('a131', '1992-12-11 00:00:00', 'BN', 'Visiteur'),
('p40', '1992-12-14 00:00:00', 'BN', 'Délégué'),
('j50', '1992-12-16 00:00:00', 'NP', 'Visiteur'),
('p32', '1992-12-24 00:00:00', 'IF', 'Visiteur'),
('h13', '1993-05-08 00:00:00', 'LI', 'Visiteur'),
('e24', '1993-05-17 00:00:00', 'AL', 'Délégué'),
('f21', '1993-06-08 00:00:00', 'RA', 'Visiteur'),
('h35', '1993-08-26 00:00:00', 'AU', 'Visiteur'),
('b34', '1993-12-06 00:00:00', 'CE', 'Délégué'),
('f4', '1994-05-03 00:00:00', 'MP', 'Visiteur'),
('b25', '1994-07-03 00:00:00', 'PL', 'Visiteur'),
('t55', '1994-11-29 00:00:00', 'MP', 'Visiteur'),
('p42', '1994-12-12 00:00:00', 'PI', 'Visiteur'),
('n59', '1994-12-19 00:00:00', 'PI', 'Visiteur'),
('o26', '1995-01-05 00:00:00', 'LG', 'Visiteur'),
('l14', '1995-02-02 00:00:00', 'PL', 'Visiteur'),
('t43', '1995-03-09 00:00:00', 'BO', 'Visiteur'),
('a55', '1995-05-19 00:00:00', 'RO', 'Visiteur'),
('l23', '1995-06-05 00:00:00', 'PC', 'Visiteur'),
('b59', '1995-10-21 00:00:00', 'RA', 'Visiteur'),
('s10', '1995-11-14 00:00:00', 'FC', 'Visiteur'),
('e5', '1995-11-27 00:00:00', 'MP', 'Délégué'),
('g7', '1996-01-13 00:00:00', 'LI', 'Visiteur'),
('g19', '1996-01-18 00:00:00', 'IF', 'Visiteur'),
('e49', '1996-02-19 00:00:00', 'MP', 'Visiteur'),
('l56', '1996-02-27 00:00:00', 'FC', 'Visiteur'),
('n42', '1996-03-06 00:00:00', 'HN', 'Visiteur'),
('b13', '1996-03-11 00:00:00', 'AL', 'Visiteur'),
('a131', '1996-05-27 00:00:00', 'BG', 'Visiteur'),
('k4', '1996-11-21 00:00:00', 'LG', 'Visiteur'),
('l46', '1997-01-24 00:00:00', 'PL', 'Visiteur'),
('c14', '1997-02-01 00:00:00', 'PA', 'Délégué'),
('f39', '1997-02-15 00:00:00', 'RA', 'Visiteur'),
('b16', '1997-03-21 00:00:00', 'BG', 'Visiteur'),
('p6', '1997-03-30 00:00:00', 'AQ', 'Visiteur'),
('t47', '1997-08-29 00:00:00', 'PI', 'Visiteur'),
('q17', '1997-09-06 00:00:00', 'BN', 'Visiteur'),
('a17', '1997-09-19 00:00:00', 'RA', 'Délégué'),
('b4', '1997-09-25 00:00:00', 'AQ', 'Visiteur'),
('d51', '1997-11-18 00:00:00', 'FC', 'Délégué'),
('b50', '1998-01-18 00:00:00', 'PA', 'Visiteur'),
('j45', '1998-02-25 00:00:00', 'CA', 'Responsable'),
('h30', '1998-04-26 00:00:00', 'IF', 'Visiteur'),
('r24', '1998-05-25 00:00:00', 'BN', 'Responsable'),
('j8', '1998-06-18 00:00:00', 'IF', 'Responsable'),
('p41', '1998-07-27 00:00:00', 'PC', 'Visiteur'),
('a93', '1999-01-02 00:00:00', 'PC', 'Visiteur'),
('b19', '1999-01-31 00:00:00', 'PL', 'Visiteur'),
('g30', '1999-03-27 00:00:00', 'PI', 'Délégué'),
('m45', '1999-04-08 00:00:00', 'AL', 'Délégué'),
('b34', '1999-06-18 00:00:00', 'CE', 'Responsable'),
('p40', '1999-07-17 00:00:00', 'BN', 'Responsable'),
('a55', '1999-08-21 00:00:00', 'RO', 'Délégué'),
('b25', '2000-01-01 00:00:00', 'PL', 'Délégué'),
('e24', '2000-02-29 00:00:00', 'AL', 'Responsable'),
('b28', '2000-08-02 00:00:00', 'LG', 'Visiteur'),
('g30', '2000-10-31 00:00:00', 'PI', 'Responsable'),
('e5', '2000-11-27 00:00:00', 'AQ', 'Responsable'),
('c14', '2001-03-03 00:00:00', 'PA', 'Responsable'),
('d51', '2002-03-20 00:00:00', 'FC', 'Responsable');

-- --------------------------------------------------------

--
-- Structure de la table `type_individu`
--

DROP TABLE IF EXISTS `type_individu`;
CREATE TABLE IF NOT EXISTS `type_individu` (
  `TIN_CODE` varchar(5) NOT NULL,
  `TIN_LIBELLE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TIN_CODE`),
  KEY `TIN_CODE` (`TIN_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_praticien`
--

DROP TABLE IF EXISTS `type_praticien`;
CREATE TABLE IF NOT EXISTS `type_praticien` (
  `TYP_CODE` varchar(3) NOT NULL,
  `TYP_LIBELLE` varchar(25) DEFAULT NULL,
  `TYP_LIEU` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`TYP_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_praticien`
--

INSERT INTO `type_praticien` (`TYP_CODE`, `TYP_LIBELLE`, `TYP_LIEU`) VALUES
('MH', 'Médecin Hospitalier', 'Hopital ou clinique'),
('MV', 'Médecine de Ville', 'Cabinet'),
('PH', 'Pharmacien Hospitalier', 'Hopital ou clinique'),
('PO', 'Pharmacien Officine', 'Pharmacie'),
('PS', 'Personnel de santé', 'Centre paramédical');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `matricule` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=273 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `matricule`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(205, 'a131', 'Jean', NULL, NULL, '$2y$10$4dwST.dg3eylJ7F5D9Qd8uJKzD3knlCv9bgzlPJXrZlGpb5pZAcz2', NULL, NULL, '2020-03-03 16:42:05'),
(206, 'a17', 'Jacque', NULL, NULL, '$2y$10$UWny2qSwBlyENQX79mtNA.4WO9H8Dz7tIhjea6r0HCU071JU0PqNu', NULL, NULL, NULL),
(207, 'a55', 'Bedos', NULL, NULL, '$2y$10$pycyRt46.hIHTQMq5DuIwuFbQMQVAS9AbdYYmecRYmnvgDWTNsfBe', NULL, NULL, NULL),
(208, 'a93', 'Tusseau', NULL, NULL, '$2y$10$NtOhWpzbtppJCSYAPdd1Yea6gEImV5Wi0U27npr1sw.yXIlK35hpW', NULL, NULL, NULL),
(209, 'b13', 'Bentot', NULL, NULL, '$2y$10$yLItahXcPqJ.30d4bHMPhOfKGn7EVNMHYVCSmM6.GDwf96tvKjPGC', NULL, NULL, NULL),
(210, 'b16', 'Bioret', NULL, NULL, '$2y$10$FctPpf2pxlEAZ27lvt/.CO4w5U/8lLiRaw5V1Uu/E8pkQDA5.vXLu', NULL, NULL, NULL),
(211, 'b19', 'Bunisset', NULL, NULL, '$2y$10$WqZjv40XoFj3huGZbI6PjOfHk/FdSmrqQeIiAACxFwSw43sWpWulm', NULL, NULL, NULL),
(212, 'b25', 'Bunisset', NULL, NULL, '$2y$10$zx.80r0AbCuaw0R9nF.wRemnBXd8YerJcX/zzEM0WgdXoQhhh5Ete', NULL, NULL, NULL),
(213, 'b28', 'Cacheux', NULL, NULL, '$2y$10$K.Ag1h/fc0zb8SmILNKoeuVYeg59euSCR6BxGkePDK20PZxcBTMDy', NULL, NULL, NULL),
(214, 'b34', 'Cadic', NULL, NULL, '$2y$10$ifi9TQDxuJJS1u6NMSOtfeG6oiu/4RSBocYbgXsRQg3ilkXKcsIqO', NULL, NULL, NULL),
(215, 'b4', 'Charoze', NULL, NULL, '$2y$10$7Rx9T8dkv0ryp7YftioD8eo8ZXpMlFpaq8YdqU9IbjgwX19.ovlBy', NULL, NULL, NULL),
(216, 'b50', 'Clepkens', NULL, NULL, '$2y$10$9ly2aogdWl/L2iytsS.XeuFMDLyEiVlDN2J0EhiFmpOA49z5eaHla', NULL, NULL, NULL),
(217, 'b59', 'Cottin', NULL, NULL, '$2y$10$5DdWwSNu7c42KazOztHFJO2XoALrMq71uNpZbQWe3pTcS5baQDdda', NULL, NULL, NULL),
(218, 'c14', 'Daburon', NULL, NULL, '$2y$10$8Mr5/m4RrMGtD2mbaaOFvuDevdUuHoJr4BzJvLpcOGe3As7MsiIrm', NULL, NULL, NULL),
(219, 'c3', 'De', NULL, NULL, '$2y$10$KBsTV7ESjS8F.0WEgv210.nbN.5zrEUpEhG1ydSSCLF7ipafsBKVi', NULL, NULL, NULL),
(220, 'c54', 'Debelle', NULL, NULL, '$2y$10$vOyG3HB4OK.gm/haGix1BOejN34ZaDlUyOa8tkF50NuHQvq7ylS5G', NULL, NULL, NULL),
(221, 'd13', 'Debelle', NULL, NULL, '$2y$10$wzEcXeb0WHoni9WB9NAqwuf.cXSQ/hqYmL94VpUrsr9XIOW2fXsse', NULL, NULL, NULL),
(222, 'd51', 'Debroise', NULL, NULL, '$2y$10$jaLIEZHpUE97hAIXT5KzKeisHtjtHCvf/3fpqOSNlRavI17L5gnXu', NULL, NULL, NULL),
(223, 'e22', 'Desmarquest', NULL, NULL, '$2y$10$.H9ztKaOVZt2RvH3frPX6eRWwBP/KVNT7AmJ1SgcZAat7BRu7Klw6', NULL, NULL, NULL),
(224, 'e24', 'Desnost', NULL, NULL, '$2y$10$Wn/Ss91xxW5W6nwNXOdPGeCfpvcGDQnDn/FC2QCEvzjIm.dpkVJmm', NULL, NULL, NULL),
(225, 'e39', 'Dudouit', NULL, NULL, '$2y$10$WpHgLO.x7h7/OzcAsukGNemDfHhO067Gvk7sKT0xZcDh/JkiuJEqO', NULL, NULL, NULL),
(226, 'e49', 'Duncombe', NULL, NULL, '$2y$10$xkEFo0DGVsJFHzTu5ZLdCuqmxUkidTvDy2NLE.OcmK6y254JzdGrm', NULL, NULL, NULL),
(227, 'e5', 'Enault-Pascreau', NULL, NULL, '$2y$10$WvchYiAH5b/pdylKjN9fjOaJpf0qQYiJLmuOWbpgUAwptq.wxPDPK', NULL, NULL, NULL),
(228, 'e52', 'Eynde', NULL, NULL, '$2y$10$NmIaxHJyN0Ld4cezaQn64.umlNCvgnOwAfNqyzp9D82f4K6AAkRwm', NULL, NULL, NULL),
(229, 'f21', 'Finck', NULL, NULL, '$2y$10$U4X5s/rcM3f.2E5dRYK3P.q0yN26awihd2yzSq7MUtsY.q9D.hbjq', NULL, NULL, NULL),
(230, 'f39', 'Frémont', NULL, NULL, '$2y$10$feW/eldUb6Qm/GT4e2DDa.0vF7DwuPNAq/FWCqoPKETSEaai0W/..', NULL, NULL, NULL),
(231, 'f4', 'Gest', NULL, NULL, '$2y$10$aLoPabM/yZAYN2aYiFbbRu8TSmB3w7HHSc3ExubB970V/7wN4cKVW', NULL, NULL, NULL),
(232, 'g19', 'Gheysen', NULL, NULL, '$2y$10$Kzr/L8uHuMndxRA2S9atB.YOFHvgK.SMDIAaCjVyIt92D.X22GhZ6', NULL, NULL, NULL),
(233, 'g30', 'Girard', NULL, NULL, '$2y$10$ZkIMMjVLpCxhpwteMl1u5uiIuEH8FGG9gwY6guF7MCkvSYS/7lWU.', NULL, NULL, NULL),
(234, 'g53', 'Gombert', NULL, NULL, '$2y$10$I72sT6yO9YG7J.Fwyfngbe71vUTXSxt0a56nVfkpDS315me2mbVku', NULL, NULL, NULL),
(235, 'g7', 'Guindon', NULL, NULL, '$2y$10$9zT8HBc7VcpGsTeKbOzkA.o8xlEw799uR6TOQBYPZha6uAdqn2H5C', NULL, NULL, NULL),
(236, 'h13', 'Guindon', NULL, NULL, '$2y$10$TxpwifBBJSB67cAG2jRbZuCu7qfcPs0yfVLWbng0akekgBdXhJFM2', NULL, NULL, NULL),
(237, 'h30', 'Igigabel', NULL, NULL, '$2y$10$hkkhh1fGZeLNOwqbIIsR8O6hQrPGZsVAUASVz8.XTamE6oumT0rny', NULL, NULL, NULL),
(238, 'h35', 'Jourdren', NULL, NULL, '$2y$10$VBKbTZgeqcsIZvBOe/uhkONne2bHACYBqQZBcdBuxds3hfuGFH6sO', NULL, NULL, NULL),
(239, 'h40', 'Juttard', NULL, NULL, '$2y$10$E/Pz1KA1remR0T.l.pw.vOY.TCvMRmsB2CcoxBOyJ4yib3C3kipMG', NULL, NULL, NULL),
(240, 'j45', 'Labouré-Morel', NULL, NULL, '$2y$10$/7FawINeRp5U6ZRBVAFS1O5xrurARDYT7HPp3UlyEJZC694cQprNK', NULL, NULL, NULL),
(241, 'j50', 'Landré', NULL, NULL, '$2y$10$sGZBRkvO5MGk86g7bH8dDOmzwcluEe1ufnNB34cPBsM4jUM4zngz2', NULL, NULL, NULL),
(242, 'j8', 'Langeard', NULL, NULL, '$2y$10$YX.nyiapiLTJo5gW2udfh.STb/bRDJW1YZaSy/Ioc.LTaMshiQ2Yy', NULL, NULL, NULL),
(243, 'k4', 'Lanne', NULL, NULL, '$2y$10$DQauO9fiSA/q2iGLjJ5fTOurBCVNRtIac9QulS1ahnAdqrAL.jdBW', NULL, NULL, NULL),
(244, 'k53', 'Le', NULL, NULL, '$2y$10$DX3T2dIZH.Ml4yj/3bUVwu9P.OYSB.rTHHMfYqk3YoNfqBVgnGzzC', NULL, NULL, NULL),
(245, 'l14', 'Le', NULL, NULL, '$2y$10$.YVrkWDO3oVOU.d9qXiWS.Gigz4JxuNA0lQ0Amtabd.PFnGEgywsm', NULL, NULL, NULL),
(246, 'l23', 'Leclercq', NULL, NULL, '$2y$10$3C3g9dsBg1HfpF4rf1/uvugK7fIQ2HRZvXC5EONA0/KGQ8gqAcIWK', NULL, NULL, NULL),
(247, 'l46', 'Lecornu', NULL, NULL, '$2y$10$c6.IYA8XWHmbOeJhQ7bTgOA5EthtGBCrujOmUhMB4/WDXOzMjdbcq', NULL, NULL, NULL),
(248, 'l56', 'Lecornu', NULL, NULL, '$2y$10$7kkiwQKRiUtryUbGKJIHYOaSEsXE87uxbhi7/Ke.Jl9//nurMgyQe', NULL, NULL, NULL),
(249, 'm35', 'Lejard', NULL, NULL, '$2y$10$rFy2FmF/zmSBXkbGMA.GXuS9/s1RznH4N8DoMKR1/y0H89WupjDIW', NULL, NULL, NULL),
(250, 'm45', 'Lesaulnier', NULL, NULL, '$2y$10$vdjorjUS3FFAxdJAZhvdCeAMo11wKBGsWR4tEfPbJftrnCoCcz15e', NULL, NULL, NULL),
(251, 'n42', 'Letessier', NULL, NULL, '$2y$10$vLJcIquuAV2925DNKo84Zu0o/wr5yjREdfohMf8hcTPOa534s11fC', NULL, NULL, NULL),
(252, 'n58', 'Loirat', NULL, NULL, '$2y$10$hp4Fmo5gBSBy6Fe6BYx8hutyUbdhKhrxzUZp1qOsj.0gqaHPMLuVC', NULL, NULL, NULL),
(253, 'n59', 'Maffezzoli', NULL, NULL, '$2y$10$iyqU/L726Y/egFi1ZADVceCvqHz5acFhq5/VI2B3Cl61teDmhIm4e', NULL, NULL, NULL),
(254, 'o26', 'Mancini', NULL, NULL, '$2y$10$33sjLpLfoKBUrBJco1ZQgei9a5BZSmO4BT91R65oLTr6xLonvY5D6', NULL, NULL, NULL),
(255, 'p32', 'Marcouiller', NULL, NULL, '$2y$10$5.PNncfSO4W/fH51WW9FHe7wYAjx1gnf1asbuv.NjXKJcvNpcuIAW', NULL, NULL, NULL),
(256, 'p40', 'Michel', NULL, NULL, '$2y$10$sMdt2uyXWVF31xE6w4AVdeZp8AvnKWYVOXM050EMPGb8fjWwaeIsu', NULL, NULL, NULL),
(257, 'p41', 'Montecot', NULL, NULL, '$2y$10$HSpa0fFpjm04P7IKDfJuzuoeyGX/r8CouEH044EoDTwn1qNZBrVIO', NULL, NULL, NULL),
(258, 'p42', 'Notini', NULL, NULL, '$2y$10$Md4vCWgzL9IZKMqigb.N4ehHAM1QSlE2XnZyKOZZsbdA.hn/jpXl2', NULL, NULL, NULL),
(259, 'p49', 'Onfroy', NULL, NULL, '$2y$10$yH6J4P9UvkP0IWb7KPtmSeXkpxFS/ZHQmwPYBDGDWNkw0j8fNAcCq', NULL, NULL, NULL),
(260, 'p6', 'Pascreau', NULL, NULL, '$2y$10$YifhS4YwWQP8ZVyaHuIHD.JPcKHa1rCyOTUtG3R./CZerTb30EQ6e', NULL, NULL, NULL),
(261, 'p7', 'Pernot', NULL, NULL, '$2y$10$jSQi7XYHDwshk7IwCnRjv.0ytjoixbxGZeeY.hkFFPYpkDI70WtDS', NULL, NULL, NULL),
(262, 'p8', 'Perrier', NULL, NULL, '$2y$10$Nwp4FwnrrtxmnVVxSISsYObOUNXPVoZNb2CO./TUsFCMhd/tZkwjW', NULL, NULL, NULL),
(263, 'q17', 'Petit', NULL, NULL, '$2y$10$ym.msVwWaPON5O/kLYPDQ.PDaeBCMSywAJ2coOeCrSOPqgHkeqo.2', NULL, NULL, NULL),
(264, 'r24', 'Piquery', NULL, NULL, '$2y$10$16.70AL6RJYNy2oj4n3Ev.bdeqiiZWmvbl/io.M5C5tuWXFvyvSL6', NULL, NULL, NULL),
(265, 'r58', 'Quiquandon', NULL, NULL, '$2y$10$CARer9C9NeFZL2kE42fLFuou1MVK6mPWiJHX5tror.Pvkbqvz9r8i', NULL, NULL, NULL),
(266, 's10', 'Retailleau', NULL, NULL, '$2y$10$TtbhtjzGMG/wxcZUWkU7puswsZnvs67AliRgiw4MnyxvJes2Ga8ru', NULL, NULL, NULL),
(267, 's21', 'Retailleau', NULL, NULL, '$2y$10$K9t2dXrJx5oh.jEaylTHE.Uu38lzc8F97B6p8oo1KcG6dp9846SY6', NULL, NULL, NULL),
(268, 't43', 'Souron', NULL, NULL, '$2y$10$Go7Xx4.9JczbMhyT0WhNWeCMCHLr5DgOdl0DU1L4MLfLvGFTwPzXC', NULL, NULL, NULL),
(269, 't47', 'Tiphagne', NULL, NULL, '$2y$10$xrPczSoUNbFej0BdgAjXR.Wd5LdE6U5/df0/QNh/z6RuzGqyC977u', NULL, NULL, NULL),
(270, 't55', 'Tréhet', NULL, NULL, '$2y$10$JjavOJ60bKXPRuNm5NeMcuLpH6p26nRw.NPvz.dqJF3OI5L8ksehO', NULL, NULL, NULL),
(271, 't60', 'Tusseau', NULL, NULL, '$2y$10$rW6S6.Cj14XpscHxwAb/C./TGQmLkmvuw6Cy/MU6AJYXwXDgSBcHa', NULL, NULL, NULL),
(272, 'zzz', 'Arhantec', NULL, NULL, '$2y$10$QFPmK6FrEFRYZdxqA8o6leeuqTZi7zdts0L5Fhp9EwfeelRYhzGPC', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE IF NOT EXISTS `visiteur` (
  `VIS_MATRICULE` varchar(10) NOT NULL,
  `VIS_NOM` varchar(25) DEFAULT NULL,
  `Vis_PRENOM` varchar(50) DEFAULT NULL,
  `VIS_ADRESSE` varchar(50) DEFAULT NULL,
  `VIS_CP` varchar(5) DEFAULT NULL,
  `VIS_VILLE` varchar(30) DEFAULT NULL,
  `VIS_DATEEMBAUCHE` date DEFAULT NULL,
  `SEC_CODE` varchar(1) DEFAULT NULL,
  `LAB_CODE` varchar(2) NOT NULL,
  PRIMARY KEY (`VIS_MATRICULE`),
  KEY `LAB_CODE` (`LAB_CODE`),
  KEY `SEC_CODE` (`SEC_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`VIS_MATRICULE`, `VIS_NOM`, `Vis_PRENOM`, `VIS_ADRESSE`, `VIS_CP`, `VIS_VILLE`, `VIS_DATEEMBAUCHE`, `SEC_CODE`, `LAB_CODE`) VALUES
('a131', 'Jean', 'François', '3 Rue des Sio', '35478', 'Quelquepart', '1992-12-11', NULL, 'SW'),
('a17', 'Jacque', 'David', '1 r Chaussé au moine', '38100', 'GRENOBLE', '1991-08-26', NULL, 'GY'),
('a55', 'Bedos', 'Christian', '1 r Bénédictins', '65000', 'TARBES', '1987-07-17', NULL, 'GY'),
('a93', 'Tusseau', 'Louis', '22 r Renou', '86000', 'POITIERS', '1999-01-02', NULL, 'SW'),
('b13', 'Bentot', 'Pascal', '11 av 6 Juin', '67000', 'STRASBOURG', '1996-03-11', NULL, 'GY'),
('b16', 'Bioret', 'Luc', '1 r Linne', '35000', 'RENNES', '1997-03-21', NULL, 'SW'),
('b19', 'Bunisset', 'Francis', '10 r Nicolas Chorier', '85000', 'LA ROCHE SUR YON', '1999-01-31', NULL, 'GY'),
('b25', 'Bunisset', 'Denise', '1 r Lionne', '49100', 'ANGERS', '1994-07-03', NULL, 'SW'),
('b28', 'Cacheux', 'Bernard', '114 r Authie', '34000', 'MONTPELLIER', '2000-08-02', NULL, 'GY'),
('b34', 'Cadic', 'Eric', '123 r Caponière', '41000', 'BLOIS', '1993-12-06', 'P', 'SW'),
('b4', 'Charoze', 'Catherine', '100 pl Géants', '33000', 'BORDEAUX', '1997-09-25', NULL, 'SW'),
('b50', 'Clepkens', 'Christophe', '12 r Fédérico Garcia Lorca', '13000', 'MARSEILLE', '1998-01-18', NULL, 'SW'),
('b59', 'Cottin', 'Vincenne', '36 sq Capucins', '5000', 'GAP', '1995-10-21', NULL, 'GY'),
('c14', 'Daburon', 'François', '13 r Champs Elysées', '6000', 'NICE', '1989-02-01', 'S', 'SW'),
('c3', 'De', 'Philippe', '13 r Charles Peguy', '10000', 'TROYES', '1992-05-05', NULL, 'SW'),
('c54', 'Debelle', 'Michel', '181 r Caponière', '88000', 'EPINAL', '1991-04-09', NULL, 'SW'),
('d13', 'Debelle', 'Jeanne', '134 r Stalingrad', '44000', 'NANTES', '1991-12-05', NULL, 'SW'),
('d51', 'Debroise', 'Michel', '2 av 6 Juin', '70000', 'VESOUL', '1997-11-18', 'E', 'GY'),
('e22', 'Desmarquest', 'Nathalie', '14 r Fédérico Garcia Lorca', '54000', 'NANCY', '1989-03-24', NULL, 'GY'),
('e24', 'Desnost', 'Pierre', '16 r Barral de Montferrat', '55000', 'VERDUN', '1993-05-17', 'E', 'SW'),
('e39', 'Dudouit', 'Frédéric', '18 quai Xavier Jouvin', '75000', 'PARIS', '1988-04-26', NULL, 'GY'),
('e49', 'Duncombe', 'Claude', '19 av Alsace Lorraine', '9000', 'FOIX', '1996-02-19', NULL, 'GY'),
('e5', 'Enault-Pascreau', 'Céline', '25B r Stalingrad', '40000', 'MONT DE MARSAN', '1990-11-27', 'S', 'GY'),
('e52', 'Eynde', 'Valérie', '3 r Henri Moissan', '76000', 'ROUEN', '1991-10-31', NULL, 'GY'),
('f21', 'Finck', 'Jacques', 'rte Montreuil Bellay', '74000', 'ANNECY', '1993-06-08', NULL, 'SW'),
('f39', 'Frémont', 'Fernande', '4 r Jean Giono', '69000', 'LYON', '1997-02-15', NULL, 'GY'),
('f4', 'Gest', 'Alain', '30 r Authie', '46000', 'FIGEAC', '1994-05-03', NULL, 'GY'),
('g19', 'Gheysen', 'Galassus', '32 bd Mar Foch', '75000', 'PARIS', '1996-01-18', NULL, 'SW'),
('g30', 'Girard', 'Yvon', '31 av 6 Juin', '80000', 'AMIENS', '1999-03-27', 'N', 'GY'),
('g53', 'Gombert', 'Luc', '32 r Emile Gueymard', '56000', 'VANNES', '1985-10-02', NULL, 'GY'),
('g7', 'Guindon', 'Caroline', '40 r Mar Montgomery', '87000', 'LIMOGES', '1996-01-13', NULL, 'GY'),
('h13', 'Guindon', 'François', '44 r Picotière', '19000', 'TULLE', '1993-05-08', NULL, 'SW'),
('h30', 'Igigabel', 'Guy', '33 gal Arlequin', '94000', 'CRETEIL', '1998-04-26', NULL, 'SW'),
('h35', 'Jourdren', 'Pierre', '34 av Jean Perrot', '15000', 'AURRILLAC', '1993-08-26', NULL, 'GY'),
('h40', 'Juttard', 'Pierre-Raoul', '34 cours Jean Jaurès', '8000', 'SEDAN', '1992-11-01', NULL, 'GY'),
('j45', 'Labouré-Morel', 'Saout', '38 cours Berriat', '52000', 'CHAUMONT', '1998-02-25', 'N', 'SW'),
('j50', 'Landré', 'Philippe', '4 av Gén Laperrine', '59000', 'LILLE', '1992-12-16', NULL, 'GY'),
('j8', 'Langeard', 'Hugues', '39 av Jean Perrot', '93000', 'BAGNOLET', '1998-06-18', 'P', 'GY'),
('k4', 'Lanne', 'Bernard', '4 r Bayeux', '30000', 'NIMES', '1996-11-21', NULL, 'SW'),
('k53', 'Le', 'Noël', '4 av Beauvert', '68000', 'MULHOUSE', '1983-03-23', NULL, 'SW'),
('l14', 'Le', 'Jean', '39 r Raspail', '53000', 'LAVAL', '1995-02-02', NULL, 'SW'),
('l23', 'Leclercq', 'Servane', '11 r Quinconce', '18000', 'BOURGES', '1995-06-05', NULL, 'SW'),
('l46', 'Lecornu', 'Jean-Bernard', '4 bd Mar Foch', '72000', 'LA FERTE BERNARD', '1997-01-24', NULL, 'GY'),
('l56', 'Lecornu', 'Ludovic', '4 r Abel Servien', '25000', 'BESANCON', '1996-02-27', NULL, 'SW'),
('m35', 'Lejard', 'Agnès', '4 r Anthoard', '82000', 'MONTAUBAN', '1987-10-06', NULL, 'SW'),
('m45', 'Lesaulnier', 'Pascal', '47 r Thiers', '57000', 'METZ', '1990-10-13', NULL, 'SW'),
('n42', 'Letessier', 'Stéphane', '5 chem Capuche', '27000', 'EVREUX', '1996-03-06', NULL, 'GY'),
('n58', 'Loirat', 'Didier', 'Les Pêchers cité Bourg la Croix', '45000', 'ORLEANS', '1992-08-30', NULL, 'GY'),
('n59', 'Maffezzoli', 'Thibaud', '5 r Chateaubriand', '2000', 'LAON', '1994-12-19', NULL, 'SW'),
('o26', 'Mancini', 'Anne', '5 r D\'Agier', '48000', 'MENDE', '1995-01-05', NULL, 'GY'),
('p32', 'Marcouiller', 'Gérard', '7 pl St Gilles', '91000', 'ISSY LES MOULINEAUX', '1992-12-24', NULL, 'GY'),
('p40', 'Michel', 'Jean-Claude', '5 r Gabriel Péri', '61000', 'FLERS', '1992-12-14', 'O', 'SW'),
('p41', 'Montecot', 'Françoise', '6 r Paul Valéry', '17000', 'SAINTES', '1998-07-27', NULL, 'GY'),
('p42', 'Notini', 'Veronique', '5 r Lieut Chabal', '60000', 'BEAUVAIS', '1994-12-12', NULL, 'SW'),
('p49', 'Onfroy', 'Den', '5 r Sidonie Jacolin', '37000', 'TOURS', '1977-10-03', NULL, 'GY'),
('p6', 'Pascreau', 'Charles', '57 bd Mar Foch', '64000', 'PAU', '1997-03-30', NULL, 'SW'),
('p7', 'Pernot', 'Claude-Noël', '6 r Alexandre 1 de Yougoslavie', '11000', 'NARBONNE', '1990-03-01', NULL, 'SW'),
('p8', 'Perrier', 'Maître', '6 r Aubert Dubayet', '71000', 'CHALON SUR SAONE', '1991-06-23', NULL, 'GY'),
('q17', 'Petit', 'Jean-Louis', '7 r Ernest Renan', '50000', 'SAINT LO', '1997-09-06', NULL, 'GY'),
('r24', 'Piquery', 'Patrick', '9 r Vaucelles', '14000', 'CAEN', '1984-07-29', 'O', 'GY'),
('r58', 'Quiquandon', 'Joël', '7 r Ernest Renan', '29000', 'QUIMPER', '1990-06-30', NULL, 'GY'),
('s10', 'Retailleau', 'Josselin', '88Bis r Saumuroise', '39000', 'DOLE', '1995-11-14', NULL, 'SW'),
('s21', 'Retailleau', 'Pascal', '32 bd Ayrault', '23000', 'MONTLUCON', '1992-09-25', NULL, 'SW'),
('t43', 'Souron', 'Maryse', '7B r Gay Lussac', '21000', 'DIJON', '1995-03-09', NULL, 'SW'),
('t47', 'Tiphagne', 'Patrick', '7B r Gay Lussac', '62000', 'ARRAS', '1997-08-29', NULL, 'SW'),
('t55', 'Tréhet', 'Alain', '7D chem Barral', '12000', 'RODEZ', '1994-11-29', NULL, 'SW'),
('t60', 'Tusseau', 'Josselin', '63 r Bon Repos', '28000', 'CHARTRES', '1991-03-29', NULL, 'GY'),
('zzz', 'Swiss', 'Théo', '43 rue Saint Michel', '35600', 'Redon', '2003-06-18', NULL, 'BC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
