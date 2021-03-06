-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 20 Décembre 2015 à 13:06
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `suivitr`
--

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE IF NOT EXISTS `eleves` (
  `num` int(5) NOT NULL DEFAULT '0',
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(22) DEFAULT NULL,
  `cycle` varchar(3) DEFAULT NULL,
  `annee` varchar(2) DEFAULT NULL,
  `groupe` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `eleves`
--

INSERT INTO `eleves` (`num`, `nom`, `prenom`, `cycle`, `annee`, `groupe`) VALUES
(11461, 'PAGES', 'Eric', '3iL', 'A3', 'G3'),
(12551, 'WOLFER', 'Mickaël', '3iL', 'A3', ''),
(12558, 'BUREAU', 'Ronan', '3iL', 'A3', 'G4'),
(12562, 'ALBERIDO', 'Lenaïc', '3iL', 'A3', 'G4'),
(12563, 'JOUBERT', 'Solène', '3iL', 'A3', ''),
(12564, 'METAYER', 'Nicolas', '3iL', 'A3', ''),
(12565, 'NESME', 'Vincent', '3iL', 'A3', ''),
(12566, 'ROUGET', 'Fabien', '3iL', 'A3', 'G1'),
(12570, 'GOLDSTEIN', 'Laétitia', '3iL', 'A3', 'G4'),
(12571, 'HILLINGSHAUSER', 'Fabien', '3iL', 'A3', 'G4'),
(12601, 'ALI BENALI', 'Mehdi', '3iL', 'A3', 'G1'),
(12999, 'MA', 'Hang', '3iL', 'A2', 'G3'),
(13227, 'WANG', 'Yu Chen', '3iL', 'A2', 'G1'),
(13232, 'POLLIOT', 'Kenny', '3iL', 'A2', 'G5App'),
(13260, 'ALIBERT', 'Cédric', '3iL', 'A2', 'G1'),
(13263, 'ARNALIS', 'Daniel', '3iL', 'A2', 'G1'),
(13264, 'BORDAS', 'Jean-Marie', '3iL', 'A2', 'G1'),
(13265, 'STEF', 'Romain', '3iL', 'A2', 'G1'),
(13267, 'AVENET', 'Julien', '3iL', 'A2', 'G5App'),
(13268, 'DE MONTBRUN', 'Jean-Gualbert', '3iL', 'A2', 'G5App'),
(13269, 'FREYDIER', 'Quentin', '3iL', 'A1', 'G3'),
(13270, 'LEFEBVRE de RIEUX', 'Alexis', '3iL', 'A2', 'G1'),
(13271, 'LEHMANN', 'Guillaume', '3iL', 'A2', 'G1'),
(13290, 'THIBERGE', 'Damien', '3iL', 'A3', 'G4'),
(13291, 'DELPUCH', 'Sylvain', '3iL', 'A3', 'G3'),
(13295, 'LAMACHE', 'Nour', '3iL', 'A3', 'G1'),
(13297, 'DUPREUIL', 'Nicolas', '3iL', 'A3', 'G4'),
(13305, 'NDIAYE', 'Fara Gabriel', '3iL', 'A2', 'G1'),
(13306, 'RONDEAU', 'Jérémy', '3iL', 'A3', 'G1'),
(13308, 'LEON', 'Erwan', '3iL', 'A3', 'G1'),
(13309, 'RAVAT', 'Vincent', '3iL', 'A3', 'G3'),
(13313, 'LAZREK', 'Abderrahim', '3iL', 'A3', 'G2'),
(13328, 'ANDRIANARISATA', 'Jonathan', '3iL', 'A2', 'G1'),
(13329, 'KOANDA', 'Youssouf', '3iL', 'A2', 'G2'),
(13339, 'FORIN', 'Pierre', '3iL', 'A3', 'G4'),
(13435, 'OUANJINE', 'Ouail', '3iL', 'A2', 'G1'),
(13454, 'TAIBI', 'Safae', '3iL', 'A3', 'G2'),
(13463, 'LAMNINI', 'Issam', '3iL', 'A3', 'G2'),
(13464, 'KEFRAOUI', 'Meriem', '3iL', 'A3', 'G1'),
(13468, 'IBNZIATEN', 'Zakaria', '3iL', 'A3', 'G2'),
(13469, 'NAIMI', 'Amine', '3iL', 'A3', 'G1'),
(13472, 'EL HALOUI', 'Katrannada', '3iL', 'A3', 'G1'),
(13629, 'GANIS', 'Julien', '3iL', 'A2', 'G2'),
(13847, 'MEDDOUR', 'Florent', '3iL', 'A3', 'G4'),
(13865, 'THILLAISIVAN', 'Thupakaran', '3iL', 'A2', 'G2'),
(13874, 'GOUINAUD', 'Alex', '3iL', 'A3', 'G1'),
(13875, 'CIBILLON', 'Benoît', '3iL', 'A3', 'G1'),
(13876, 'SAUTOUR', 'Jordane', '3iL', 'A3', 'G1'),
(13877, 'ROBIN', 'Arnaud', '3iL', 'A3', 'G1'),
(13878, 'MARTAILLE', 'Clément', '3iL', 'A3', 'G1'),
(13879, 'GUILLARD', 'Paul', '3iL', 'A3', 'G1'),
(13880, 'COMMEUREUC', 'Mathieu', '3iL', 'A3', 'G1'),
(13881, 'DOUHERET', 'Oumayma', '3iL', 'A3', 'G1'),
(13882, 'GUILLOIS', 'Valentin', '3iL', 'A3', 'G1'),
(13883, 'CHAUVIN-RIVET', 'Vivian', '3iL', 'A3', 'G1'),
(13884, 'SACHOT', 'Noémie', '3iL', 'A3', 'G1'),
(13885, 'BREGMESTRE', 'Loïc', '3iL', 'A3', 'G2'),
(13886, 'BA', 'Ousseynou', '3iL', 'A3', 'G1'),
(13887, 'ALBARELLO', 'Paul', '3iL', 'A3', 'G4'),
(13888, 'GABILLAUD', 'Adrien', '3iL', 'A3', 'G4'),
(13889, 'HACHON', 'Fabienne', '3iL', 'A3', 'G3'),
(13890, 'MANSCOURT', 'Clotaire', '3iL', 'A3', 'G3'),
(13891, 'LEBON', 'Lionel', '3iL', 'A3', 'G4'),
(13892, 'SPIELMANN', 'Antoine', '3iL', 'A2', 'G2'),
(13894, 'MARTIN', 'Kévin', '3iL', 'A2', 'G1'),
(13895, 'TURI', 'Alexis', '3iL', 'A2', 'G1'),
(13919, 'BARBAN', 'Martin', '3iL', 'A1', 'G3'),
(13921, 'LARGE', 'Erwann', '3iL', 'A1', 'G3'),
(13925, 'SERHANE', 'Majid', '3iL', 'A1', 'G5App'),
(13926, 'MBAKI', 'Moïse', '3iL', 'A1', 'G3'),
(13927, 'LALOY', 'Mathieu', '3iL', 'A1', 'G5App'),
(13932, 'LISCOUET', 'Baptiste', '3iL', 'A1', 'G5App'),
(13933, 'TETAUD', 'Alex', '3iL', 'A1', 'G3'),
(13934, 'TREMANTE', 'Alexandre', '3iL', 'A1', 'G3'),
(13948, 'RASENDRASON', 'Jérémy', '3iL', 'A1', 'G3'),
(13949, 'BATCHANOU YAMI', 'Euphrasie', '3iL', 'A3', 'G2'),
(13950, 'BILONG NGOUE', 'Josué Beauclair', '3iL', 'A3', 'G1'),
(13951, 'GUIFO KWOUSSOU', 'Martial Bérol', '3iL', 'A3', 'G2'),
(13952, 'KUE MENKOUEN', 'Loïc Maxwell', '3iL', 'A3', 'G2'),
(13953, 'LONTSIE GOULA', 'Aurélien', '3iL', 'A3', 'G2'),
(13955, 'MANDENG', 'Samuel Bonachi', '3iL', 'A2', 'G1'),
(13956, 'MESSY', 'Loïc Carrel', '3iL', 'A3', 'G2'),
(13957, 'NTAPLI NGUEFACK', 'Celse Benoît', '3iL', 'A3', 'G2'),
(13958, 'TATNETIO MOUTCHOU', 'Galvani', '3iL', 'A3', 'G2'),
(13959, 'TAMOKOUE NZUMGUENG', 'Joël, Hermann', '3iL', 'A3', 'G1'),
(13960, 'ATANA BANA', 'Marie Geneviève Ursul', '3iL', 'A3', 'G3'),
(13961, 'MELONG DJONOU', 'Patricia', '3iL', 'A3', 'G3'),
(13962, 'TOUANI DEUNGOUE', 'Serge Dimitri', '3iL', 'A3', 'G2'),
(13969, 'CHRETIEN', 'Anthony', '3iL', 'A3', 'G4'),
(13970, 'CORNILLE', 'Cyril', '3iL', 'A3', 'G3'),
(13971, 'DE LOUISE', 'Grégory', '3iL', 'A2', 'G2'),
(13974, 'MAZAILLIER', 'Alexandre', '3iL', 'A2', 'G2'),
(13975, 'REVAUTE', 'Florian', '3iL', 'A3', ''),
(13995, 'TALBIA', 'Hicham', '3iL', 'A2', 'G3'),
(13996, 'BERRIMA', 'Souad', '3iL', 'A3', 'G2'),
(13997, 'GHOULIDI', 'Zakia', '3iL', 'A3', 'G1'),
(13998, 'KANNOUCH', 'Mohamed', '3iL', 'A3', 'G1'),
(13999, 'QSIYER', 'Raghda', '3iL', 'A3', 'G2'),
(14000, 'BOUGHATTAS', 'Rania', '3iL', 'A3', 'G2'),
(14001, 'SEHRANI', 'Mohamed-Amine', '3iL', 'A2', 'G1'),
(14013, 'VIGIER', 'Romain', '3iL', 'A3', 'G3'),
(14034, 'DUBOC', 'Sébastien', '3iL', 'A3', 'G4'),
(14083, 'REVERDY', 'Damien', '3iL', 'A3', 'G4'),
(14084, 'DELMAS', 'Kévin', '3iL', 'A3', 'G1'),
(14133, 'AIT BENAISSA', 'Omar', '3iL', 'A3', 'G1'),
(14134, 'LAMNINI', 'Ilias', '3iL', 'A3', 'G3'),
(14135, 'EL MOUSSAOUI', 'Houda', '3iL', 'A3', 'G2'),
(14136, 'NOUHI', 'Mohammed', '3iL', 'A2', 'G3'),
(14137, 'HORMATOLLAH', 'Erragheb', '3iL', 'A3', 'G3'),
(14138, 'ASELTI', 'Mourad', '3iL', 'A2', 'G1'),
(14140, 'BOUZIANI', 'Amina', '3iL', 'A2', 'G3'),
(14362, 'CHOUAMO LATALE', 'Seraphin Joël', '3iL', 'A3', 'G2'),
(14365, 'DJOUMBI GOMSU', 'Maurice, Joël', '3iL', 'A3', 'G1'),
(14366, 'EMBOU TCHAMANI', 'Franck', '3iL', 'A3', 'G2'),
(14368, 'FOUTSE', 'Noël, Pascal', '3iL', 'A2', 'G3'),
(14370, 'GBETKOM MFONZIE', 'Henri', '3iL', 'A2', 'G1'),
(14371, 'GERMEE', 'Viché', '3iL', 'A3', 'G2'),
(14376, 'MBEMBE YEGDJONG', 'Germaine', '3iL', 'A3', 'G1'),
(14379, 'NGUIMNANG KENFACK', 'Clauther', '3iL', 'A3', 'G2'),
(14381, 'NKONSHU NGEULEU', 'Guy, Paulin', '3iL', 'A3', 'G1'),
(14384, 'PAUWAWE DJEUTCHEU', 'Eric, Lionel', '3iL', 'A3', 'G3'),
(14389, 'WETOUMDIE', 'Emmanuel, Landry', '3iL', 'A3', 'G2'),
(14391, 'NGOUFFO', 'Doric', '3iL', 'A3', 'G1'),
(14718, 'SAFOUDIA NINAKWA', 'Priscille', '3iL', 'A2', 'G2'),
(14719, 'NYANTCHOU NOUBISSIE', 'Willy Junior', '3iL', 'A2', 'G2'),
(14720, 'TONGLE DONFACK', 'Michael Parfait', '3iL', 'A2', 'G3'),
(14721, 'SOCKENG NANGMETIO', 'Bérénice Fatira', '3iL', 'A2', 'G2'),
(14733, 'SIMONET', 'Joris', '3iL', 'A2', 'G3'),
(14734, 'FRANCOIS', 'Simon', '3iL', 'A2', 'G2'),
(14735, 'APERCE', 'Nicolas', '3iL', 'A2', 'G3'),
(14736, 'PARISATO', 'Lilian', '3iL', 'A2', 'G2'),
(14737, 'BOURGES', 'Nicolas', '3iL', 'A2', 'G5App'),
(14738, 'CROVELLA', 'Romain', '3iL', 'A2', 'G5App'),
(14739, 'DEVAUJANY', 'Jean-Baptiste', '3iL', 'A2', 'G5App'),
(14740, 'DUVEAU', 'Peter', '3iL', 'A2', 'G5App'),
(14741, 'IMBERT', 'Ludovic', '3iL', 'A2', 'G5App'),
(14742, 'LECHAPPE', 'François', '3iL', 'A2', 'G5App'),
(14743, 'MOLLARD', 'Laurent', '3iL', 'A2', 'G5App'),
(14744, 'PAJON', 'Thomas', '3iL', 'A2', 'G5App'),
(14745, 'ROUSSEL', 'Romain', '3iL', 'A2', 'G5App'),
(14746, 'SANCH', 'Nicolas', '3iL', 'A2', 'G5App'),
(14749, 'BOUFENCHOUCHE', 'Mohammed', '3iL', 'A2', 'G3'),
(14751, 'CAILLET', 'Jean-Philippe', '3iL', 'A2', 'G2'),
(14753, 'RHZIEL', 'Sara', '3iL', 'A3', 'G3'),
(14754, 'CORNET', 'Alexis', '3iL', 'A2', 'G2'),
(14755, 'DECROS', 'Vincent', '3iL', 'A2', 'G2'),
(14756, 'FARCIN', 'Thibault', '3iL', 'A2', 'G2'),
(14757, 'GINIER', 'Aurélien', '3iL', 'A2', 'G2'),
(14758, 'GUYONNEAU', 'Julien', '3iL', 'A2', 'G3'),
(14759, 'HACHMI', 'Ryan', '3iL', 'A2', 'G3'),
(14761, 'MOREAU', 'Louis', '3iL', 'A2', 'G1'),
(14762, 'NOUHEN', 'Mathieu', '3iL', 'A2', 'G3'),
(14763, 'OGNARD', 'Thomas', '3iL', 'A2', 'G2'),
(14765, 'PITISI', 'Nicolas', '3iL', 'A2', 'G3'),
(14767, 'RANO', 'Cédric', '3iL', 'A2', 'G2'),
(14769, 'SERGUIER', 'Lucas', '3iL', 'A2', 'G3'),
(14770, 'UBELMANN', 'Alexandre', '3iL', 'A2', 'G3'),
(14771, 'WYROZUMSKI', 'Estelle', '3iL', 'A1', 'G1'),
(14774, 'TEKA CHENJOU', 'Franklin Diego', '3iL', 'A2', 'G1'),
(14778, 'KAMDEM YOUMBISSI', 'Roger', '3iL', 'A2', 'G1'),
(14779, 'TCHETGNA TCHOUPAN', 'Franck', '3iL', 'A2', 'G1'),
(14780, 'DESMOULIN', 'Thomas', '3iL', 'A2', 'G5App'),
(14781, 'POJER', 'Vincent', '3iL', 'A2', 'G2'),
(14782, 'TEFAATAU', 'Henrey', '3iL', 'A2', 'G1'),
(14783, 'KAMDEM OUABO', 'Edgar Brice', '3iL', 'A2', 'G3'),
(14784, 'KATEU TSOMO', 'Landry Lerich', '3iL', 'A2', 'G1'),
(14785, 'NANKIA NGUEPI DONGMO', 'Kévin', '3iL', 'A2', 'G1'),
(14786, 'KIBA', 'Ragnâg-Soukba Wilfried', '3iL', 'A2', 'G2'),
(14787, 'MILLET', 'Lisa', '3iL', 'A2', 'G5App'),
(14788, 'NKOMO', 'Marcelin', '3iL', 'A2', 'G1'),
(14791, 'SAKSIKI', 'Zakaria', '3iL', 'A2', 'G3'),
(14802, 'OUARDIRHI', 'Abdellah', '3iL', 'A2', 'G3'),
(14804, 'BEDERHAJ', 'Sabrine', '3iL', 'A2', 'G3'),
(14805, 'EL MESSOUDI', 'Khalid', '3iL', 'A2', 'G3'),
(14807, 'NGAMYOU', 'Sylvia', '3iL', 'A2', 'G2'),
(14863, 'BOUROUMI', 'Abdelhak', '3iL', 'A1', 'G1'),
(14865, 'DEGBOGBAHOUN', 'Toyin', '3iL', 'A2', 'G3'),
(14889, 'BOUBADRE', 'Sara', '3iL', 'A1', 'G1'),
(14908, 'AIT BIHI', 'Badr', '3iL', 'A2', 'G2'),
(14909, 'CHARIF', 'Mohamed Issam', '3iL', 'A2', 'G1'),
(14910, 'EL ATTAR', 'Soukayna', '3iL', 'A2', 'G3'),
(14911, 'EL HABA', 'Hamza', '3iL', 'A2', 'G1'),
(14912, 'EL-LOUALI', 'Ayoub', '3iL', 'A2', 'G2'),
(14913, 'HARAKA', 'Iman', '3iL', 'A2', 'G1'),
(14915, 'KHEYYALI', 'Imane', '3iL', 'A2', 'G3'),
(14916, 'MESSOUD', 'Fatimetou', '3iL', 'A2', 'G2'),
(14917, 'OUAKIB', 'Zakaria', '3iL', 'A2', 'G3'),
(14918, 'RACHIDI', 'Rajaa', '3iL', 'A2', 'G3'),
(14919, 'TAHIRI EL ALAOUI', 'Sarah', '3iL', 'A2', 'G2'),
(14920, 'TOURE ALCAIDI', 'Habibata Sanidie', '3iL', 'A2', 'G2'),
(14922, 'RAISS', 'ACHRAF-MEHDI', '3iL', 'A2', 'G3'),
(15229, 'BENITO NZONLIA', '.', '3iL', 'A2', 'G2'),
(15230, 'DJOKO CHEDJOU', 'Albin Michel', '3iL', 'A2', 'G2'),
(15238, 'KOUAM OUAKEU', 'Ruche Valaire', '3iL', 'A2', 'G1'),
(15239, 'KWEKOUA MBATAT', 'Joël', '3iL', 'A2', 'G3'),
(15240, 'MBATKAM GASSAM', 'Serge Yannick', '3iL', 'A2', 'G3'),
(15241, 'MEDIE DEFO', 'Gino Darius', '3iL', 'A2', 'G1'),
(15244, 'NGAYOU FODJO', 'Léonel', '3iL', 'A2', 'G1'),
(15245, 'NGONO NKE', 'Joachim Martial', '3iL', 'A2', 'G2'),
(15248, 'NOUMO CHOUPO', 'Léandre', '3iL', 'A2', 'G2'),
(15249, 'NOUPA', 'Didier Douselin', '3iL', 'A2', 'G3'),
(15250, 'NYATT NYATT', 'Achille Pelzer', '3iL', 'A2', 'G3'),
(15252, 'PEYO BASSO', 'Frank', '3iL', 'A2', 'G1'),
(15296, 'DIJOUX', 'Matthieu', '3iL', 'A1', 'G1'),
(15342, 'DAMAAN', 'Youssef', '3iL', 'A1', 'G1'),
(15343, 'PALOU TCHEMSOUBE', 'Daniel', '3iL', 'A1', 'G3'),
(15344, 'ACHAABAN', 'Saad', '3iL', 'A1', 'G1'),
(15345, 'NAIM', 'Youness', '3iL', 'A1', 'G1'),
(15347, 'MOETERAURI', 'Dylan', '3iL', 'A1', 'G1'),
(15348, 'TIDANG NGNINTEDEM', 'Cartelle', '3iL', 'A1', 'G1'),
(15355, 'NGUENTCHEU KOUETHA', 'Emmanuel', '3iL', 'A1', 'G1'),
(15356, 'MBEDE MANGUELLE', 'Thomas', '3iL', 'A1', 'G1'),
(15359, 'COMPAORE', 'Yves Parfait', '3iL', 'A1', 'G3'),
(15360, 'KEPATO', 'Jean Mirabeau', '3iL', 'A1', 'G1'),
(15362, 'KAMDEM WOKAM', 'Karelle', '3iL', 'A1', 'G1'),
(15364, 'MECHICHI', 'Amira', '3iL', 'A2', 'G3'),
(15392, 'KIERBEL', 'Sacha', '3iL', 'A1', 'G5App'),
(15393, 'TRAINEAU', 'Kevin', '3iL', 'A1', 'G5App'),
(15394, 'SKRZESZEWSKI', 'Thibaut', '3iL', 'A1', 'G5App'),
(15399, 'PARIS', 'Michel', '3iL', 'A1', 'G5App'),
(15410, 'REYMOND', 'Flavien', '3iL', 'A1', 'G5App'),
(15412, 'TETAUD', 'Mégane', '3iL', 'A1', 'G5App'),
(15413, 'BOUSSARIE', 'Benjamin', '3iL', 'A1', 'G5App'),
(15414, 'CHARGOIS', 'Corentin', '3iL', 'A1', 'G5App'),
(15415, 'BERGER', 'Alexis', '3iL', 'A1', 'G5App'),
(15416, 'COURAULT', 'Brice', '3iL', 'A1', 'G1'),
(15417, 'HERVE', 'Mattys', '3iL', 'A1', 'G5App'),
(15418, 'DOURLENT', 'Jonathan', '3iL', 'A1', 'G5App'),
(15419, 'LASCOMBE', 'Tristan', '3iL', 'A1', 'G5App'),
(15420, 'DOUCET', 'Quentin', '3iL', 'A1', 'G5App'),
(15421, 'MADEUX', 'Alexandre', '3iL', 'A1', 'G5App'),
(15422, 'PENIN', 'Kévin', '3iL', 'A1', 'G3'),
(15423, 'NDOYE', 'Abdoul', '3iL', 'A1', 'G3'),
(15424, 'LOGERAIS', 'Mickaël', '3iL', 'A1', 'G1'),
(15425, 'LOUIS', 'Nicolas', '3iL', 'A1', 'G3'),
(15427, 'DEVILERS', 'Nicolas', '3iL', 'A1', 'G3'),
(15428, 'YAHIOUNE', 'Kévin', '3iL', 'A1', 'G1'),
(15429, 'PIZEUIL', 'Kévin', '3iL', 'A1', 'G1'),
(15430, 'FILIPPI-GARRIDO', 'Mathieu', '3iL', 'A1', 'G1'),
(15432, 'MEDJO', 'Joraï', '3iL', 'A1', 'G1'),
(15433, 'SERMONT', 'Mickaël', '3iL', 'A1', 'G1'),
(15434, 'WACHEUX', 'Philémon', '3iL', 'A1', 'G1'),
(15435, 'GALAZKA', 'Raphaël', '3iL', 'A1', 'G1'),
(15436, 'DEMIGUEL', 'Maxime', '3iL', 'A1', 'G1'),
(15437, 'MOURIER', 'Brice', '3iL', 'A1', 'G1'),
(15438, 'BUNIET', 'Raphaël', '3iL', 'A1', 'G1'),
(15439, 'GERMAIN', 'Jonathan', '3iL', 'A1', 'G1'),
(15441, 'EPOPA MOUSSA', 'Bleck', '3iL', 'A1', 'G1'),
(15442, 'CEDRIC DEFER', 'Mbogning', '3iL', 'A1', 'G3'),
(15443, 'NTJAM', 'Aloïse Loïc Roger', '3iL', 'A1', 'G1'),
(15444, 'BRUNEAU', 'Loup', '3iL', 'A1', 'G3'),
(15445, 'SONGUE', 'Murielle', '3iL', 'A1', 'G1'),
(15448, 'HOTON', 'Kenny', '3iL', 'A1', 'G1'),
(15487, 'HANDOU', 'Idrice', '3iL', 'A1', 'G1'),
(15489, 'EYIDI MISSANGO', 'Valery Marc', '3iL', 'A1', 'G3'),
(15491, 'ES-SALMANI', 'Anas', '3iL', 'A1', '');

-- --------------------------------------------------------

--
-- Structure de la table `tr`
--

CREATE TABLE IF NOT EXISTS `tr` (
  `Code_TR` int(3) NOT NULL AUTO_INCREMENT,
  `ID` int(3) NOT NULL,
  `Titre` varchar(128) CHARACTER SET utf8 NOT NULL,
  `Sujet` varchar(1024) CHARACTER SET utf8 NOT NULL,
  `ID_Eleve1` int(5) DEFAULT NULL,
  `ID_Eleve2` int(5) DEFAULT NULL,
  `ID_Eleve3` int(5) DEFAULT NULL,
  `Date_RDV1` date DEFAULT NULL,
  `Commentaire_RDV1` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `Penalite_RDV1` int(1) DEFAULT NULL,
  `Date_RDV2` date DEFAULT NULL,
  `Commentaire_RDV2` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `Penalite_RDV2` int(1) DEFAULT NULL,
  `Date_RDV3` date DEFAULT NULL,
  `Commentaire_RDV3` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `Penalite_RDV3` int(1) DEFAULT NULL,
  `Date_RDV4` date DEFAULT NULL,
  `Commentaire_RDV4` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `Penalite_RDV4` int(1) DEFAULT NULL,
  `Note` int(2) DEFAULT NULL,
  PRIMARY KEY (`Code_TR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `login` varchar(16) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `Nom` varchar(16) CHARACTER SET utf8 NOT NULL,
  `Prenom` varchar(16) CHARACTER SET utf8 NOT NULL,
  `Abv` varchar(3) CHARACTER SET utf8 NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `creation` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `login`, `password`, `Nom`, `Prenom`, `Abv`, `admin`, `creation`) VALUES
(4, 'desval_gestion', 'af45e211df156c35d574a45169b4632cac1b34e837003e8574ea6d9ad492b25f', 'Desvallois', 'Christian', 'CDE', 1, '2015-12-19 21:58:07'),
(5, 'H_Gaudin', 'be55c7865c479e51c0f879a753ffb017b094e4c16e2500ed9e04120cae32700f', 'Gaudin', 'Hervé', 'HGD', 0, '2015-12-19 22:04:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
