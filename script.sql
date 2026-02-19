
-- --------------------------------------------------------

--
-- Table structure for table `achete`
--

CREATE TABLE `achete` (
  `id_commande` int(11) NOT NULL auto_increment,
  `idu` int(11) default NULL,
  `id_produit` int(11) default NULL,
  `quantite` int(11) default NULL,
  `jj` int(11) default NULL,
  `mm` int(11) default NULL,
  `aaaa` int(11) default NULL,
  PRIMARY KEY  (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `achete`
--

INSERT INTO `achete` VALUES (1, 1, 5, 1, 1, 1, 2005);
INSERT INTO `achete` VALUES (2, 11, 1, 1, 1, 1, 2005);
INSERT INTO `achete` VALUES (3, 20, 4, 3, 2, 3, 1899);
INSERT INTO `achete` VALUES (55, 11, 8, 1, 23, 5, 2007);
INSERT INTO `achete` VALUES (54, 11, 2, 1, 23, 5, 2007);
INSERT INTO `achete` VALUES (53, 11, 1, 3, 23, 5, 2007);
INSERT INTO `achete` VALUES (52, 11, 4, 8, 23, 5, 2007);
INSERT INTO `achete` VALUES (64, 29, 1, 1, 1, 6, 2007);
INSERT INTO `achete` VALUES (63, 29, 1, 1, 1, 6, 2007);
INSERT INTO `achete` VALUES (42, 11, 4, 1, 21, 5, 2007);
INSERT INTO `achete` VALUES (41, 11, 2, 1, 21, 5, 2007);
INSERT INTO `achete` VALUES (40, 11, 1, 3, 21, 5, 2007);
INSERT INTO `achete` VALUES (62, 24, 8, 20, 28, 5, 2007);
INSERT INTO `achete` VALUES (61, 1, 5, 23, 23, 5, 2007);
INSERT INTO `achete` VALUES (60, 1, 8, 0, 23, 5, 2007);

-- --------------------------------------------------------

--
-- Table structure for table `magasin`
--

CREATE TABLE `magasin` (
  `id_categorie` int(11) NOT NULL auto_increment,
  `nom` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id_categorie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `magasin`
--

INSERT INTO `magasin` VALUES (1, 'Avions');
INSERT INTO `magasin` VALUES (2, 'Robots');
INSERT INTO `magasin` VALUES (3, 'Informatique');
INSERT INTO `magasin` VALUES (4, 'Drones');

-- --------------------------------------------------------

--
-- Table structure for table `page_admin`
--

CREATE TABLE `page_admin` (
  `id_page` int(11) NOT NULL auto_increment,
  `nompage` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id_page`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `page_admin`
--

INSERT INTO `page_admin` VALUES (1, 'ajout_ut.php');
INSERT INTO `page_admin` VALUES (2, 'ajout.php');
INSERT INTO `page_admin` VALUES (3, 'ajoutcat.php');
INSERT INTO `page_admin` VALUES (4, 'insertioncat.php');
INSERT INTO `page_admin` VALUES (5, 'insertion.php');
INSERT INTO `page_admin` VALUES (6, 'Panierfinal.php');
INSERT INTO `page_admin` VALUES (7, 'commande2.php');
INSERT INTO `page_admin` VALUES (8, 'Paiement.php');
INSERT INTO `page_admin` VALUES (9, 'confirmation.php');
INSERT INTO `page_admin` VALUES (10, 'miseajour.php');
INSERT INTO `page_admin` VALUES (11, 'update.php');
INSERT INTO `page_admin` VALUES (13, 'admin.php');
INSERT INTO `page_admin` VALUES (15, 'utilisateur.php');
INSERT INTO `page_admin` VALUES (16, 'update_u.php');
INSERT INTO `page_admin` VALUES (17, 'rand.php');
INSERT INTO `page_admin` VALUES (18, 'recherche.php');
INSERT INTO `page_admin` VALUES (19, 'produit.php');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_categorie` int(11) default NULL,
  `id_produit` int(11) NOT NULL auto_increment,
  `image` varchar(100) default NULL,
  `nom` varchar(100) NOT NULL default '',
  `description` varchar(255) default NULL,
  `prix` double default NULL,
  `livraison` varchar(100) default NULL,
  `quantite` int(11) default NULL,
  `promo` varchar(100) default NULL,
  `info` varchar(100) default NULL,
  PRIMARY KEY  (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` VALUES (1, 1, 'a380.jpg', 'Airbus A380', 'Un petit avion permettant de voyager convivialement en famille', 250000000, 'Livré dans 3 mois', 3, 'Acheter nos 4 prototypes pour le prix de 3', '');
INSERT INTO `produit` VALUES (1, 2, 'cap10.jpg', 'Mudry CAP 10B', 'Casse-cous cet avion est fait pour vous!!!', 10000000, 'Uniquement sur commande', 8, NULL, NULL);
INSERT INTO `produit` VALUES (2, 3, 'robotaspi2.jpg', 'Robot cleaner RC 3000 de KARCHER', 'Ceci n''est pas une cafetière mais un aspirateur surpuissant', 1300, 'Livré en 48 heures', 50, NULL, 'cleaner.html');
INSERT INTO `produit` VALUES (4, 4, 'Helios.jpg', 'Drone Helios', 'Prévoyez l''arrivée de votre belle-mère en surveillant tout la ville avec 5 de ce\r\ns modèles', 250000, 'Livré en 6 mois', 44, NULL, NULL);
INSERT INTO `produit` VALUES (4, 5, 'x47.jpg', 'Drone X47', 'Besoin d''un cerf-volant? Ce produit n''est pas pour vous.', 500000, 'Uniquement sur commande', 67, NULL, NULL);
INSERT INTO `produit` VALUES (3, 8, '50cd.gif', 'lot 50 CD vierges', 'Peur du rm -rf ? Mettez vos données sur ces CDs.\r\n', 20, 'Livré en 24 heures', 478, '', '');
INSERT INTO `produit` VALUES (2, 9, 'robotlego.jpg', 'MINDSTORMS NXT V41', 'Marre de votre chat? Ce robot le remplacera de façon avantageuse (nous ne reprenons pas les chats usagés)', 250, 'Livré en 24 heures', 15, '', 'lego.html');
INSERT INTO `produit` VALUES (1, 6, 'mirage2000.jpeg', 'Mirage 2000', 'Votre voisin vous ennuie ? Voila le produit adéquat !', 50000000, 'Uniquement sur commande', 6, '2 euros de plus pour la version nucléaire.', 'mirage2000.html');
INSERT INTO `produit` VALUES (1, 11, 'tigre.jpg', 'Eurocopter Tigre', 'Votre belle-mère vous taquine ? Résolvez définitivement vos problèmes.\r\n', 400000000, 'Uniquement sur commande (si problème de belle-mère livraison immédiate et gratuite)', 5, '', '');
INSERT INTO `produit` VALUES (2, 12, 'robotaspi1.jpg', 'L''aspirateur Roomba SE', 'Assez puissant pour aspirer votre chat.', 390, 'Livré en 36 heures', 75, '', '');
INSERT INTO `produit` VALUES (2, 7, 'robottondeuse.jpg', 'Robot tondeuse Automower d''Electrolux', 'Tondre vous ennuie ? Cet appareil tondra à votre place.\r\n\r\n\r\n\r\n', 600, 'Livré en 48 heures', 25, '\r\n\r\n\r\n\r\n', 'electrolux.html');
INSERT INTO `produit` VALUES (3, 14, '100cd.gif', 'lot 100 CD vierges', 'Le produit parfait pour échanger des données.\r\n', 75, 'Livré en 24 heures', 155, '', '');
INSERT INTO `produit` VALUES (3, 15, 'marqueur.gif', 'Lot de 5 marqueurs multimedia', 'Un stylo rouge, bleu, vert et deux noirs\r\n', 25, 'Livré en 24 heures', 35, '', '');
INSERT INTO `produit` VALUES (3, 16, 'disqueduriomega.gif', 'Iomega StorCenter Network Hard Drive 250 Go Ethernet', 'Disque dur externe en réseau avec serveur d''impression et serveur audio/vidéo, com\r\npatible PC et Ma', 350, 'Livré en 24 heures', 41, NULL, NULL);
INSERT INTO `produit` VALUES (3, 17, 'cadre.gif', 'Cadre photo numérique pléci 9', 'Lecteur de cartes mémoires : CompactFlash I, Memory Stick et Memory StickPro, SD/\r\nMMC. Connexion su', 124, 'Livré en 24 heures', 15, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idu` int(11) NOT NULL auto_increment,
  `type_utilisateur` int(11) NOT NULL default '1',
  `nom` varchar(100) default NULL,
  `prenom` varchar(100) default NULL,
  `login` varchar(10) NOT NULL default '',
  `mdp` varchar(20) NOT NULL default '',
  `jj` int(11) default NULL,
  `mm` int(11) default NULL,
  `aaaa` int(11) default NULL,
  `adresse` varchar(100) default NULL,
  `ville` varchar(100) default NULL,
  `cp` int(11) default NULL,
  `email` varchar(100) default NULL,
  PRIMARY KEY  (`idu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` VALUES (11, 2, 'Calmet', 'Martial', '0101', 'Martial', 7, 4, 1988, 'pau', 'pau', 64000, 'toto@toto.fr');
INSERT INTO `utilisateur` VALUES (1, 0, 'rv', 'rv', 'rv', 'rv', 15, 13, 2090, 'EISTI', 'EISTI', 15150, 'root@eistidiscount.eisti');
INSERT INTO `utilisateur` VALUES (24, 1, '', '', '', '', 0, 0, 0, '', '', 0, '');
INSERT INTO `utilisateur` VALUES (28, 2, 'ancel', 'vincent', 'vince', 'vince', 10, 1, 1991, '33 ter ...', 'billere', 64140, 'vince_l64@hotmail.fr');
INSERT INTO `utilisateur` VALUES (27, 1, 't', 't', 't', 't', 0, 0, 0, 't', 't', 0, 't');
INSERT INTO `utilisateur` VALUES (18, 0, 'Ancel', 'Loic', 'ancelloic', 'coucou', 5, 7, 1987, '33ter avenue du chateau d''este', 'Billere', 64140, 'loic.eisti@hotmail.fr');
INSERT INTO `utilisateur` VALUES (19, 1, 'Duhaut', 'Mathilde', '118218', 'bradpitt', 17, 4, 1990, '8 rue des nouilles', 'pau', 64000, 'mosesson500@hotmail.com');
INSERT INTO `utilisateur` VALUES (20, 1, 'Dupond', 'Jean', 'Hector', 'Martial', 7, 4, 1988, 'kk@kk.fr', 'pau', 64000, 'mm@mm.fr');
INSERT INTO `utilisateur` VALUES (21, 2, 'jn', 'jn', 'jn', 'jn', 0, 0, 0, 'jn', 'jn', 0, 'jn');
INSERT INTO `utilisateur` VALUES (29, 1, 'pirate', 'pirate', 'pirate', 'pirate', 0, 0, 0, 'pirate', 'pirate', 0, 'pirate');
INSERT INTO `utilisateur` VALUES (30, 1, 'UPDATE utilisateur SET type_utilisateur=0 WHERE nom="pirate";', 'UPDATE utilisateur SET type_utilisateur=0 WHERE nom="pirate";', 'UPDATE uti', 'UPDATE utilisateur S', 0, 0, 0, 'UPDATE utilisateur SET type_utilisateur=0 WHERE nom="pirate";', 'UPDATE utilisateur SET type_utilisateur=0 WHERE nom="pirate";', 0, 'UPDATE utilisateur SET type_utilisateur=0 WHERE nom="pirate";');
INSERT INTO `utilisateur` VALUES (31, 1, 'Detant', 'Xavier', 'FaustXVI', 'kikoo', 9, 6, 1987, 'bistou', 'lescar', 64230, 'moi@pasdemail.com');
INSERT INTO `utilisateur` VALUES (38, 1, 'l', 'l', 'l', 'l', 0, 0, 0, 'll', 'l', 0, 'l');
INSERT INTO `utilisateur` VALUES (37, 1, 'q', 'q', 'q', 'q', 0, 0, 0, 'q', 'q', 0, 'q');
INSERT INTO `utilisateur` VALUES (36, 1, 'a', 'a', 'a', 'a', 0, 0, 0, 'a', 'a', 0, 'a');
