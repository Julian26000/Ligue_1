INSERT INTO championnat (id_championnat, nom)
VALUES (1, 'Ligue 1'),
       (2, 'Ligue 2');

INSERT INTO arbitre (id_arbitre, nom, date_naissance, date_pro)
VALUES
    (1, 'Jean Dupont', '1985-03-15', '2010-01-01'),
    (2, 'Sophie Martin', '1990-07-22', '2012-05-10'),
    (3, 'Paul Lefevre', '1982-11-03', '2008-06-20'),
    (4, 'Marie Dubois', '1988-09-28', '2014-02-15'),
    (5, 'Thomas Leroy', '1987-06-10', '2011-09-05'),
    (6, 'Catherine Rousseau', '1993-04-18', '2017-03-12'),
    (7, 'Nicolas Martinez', '1984-12-09', '2009-11-25'),
    (8, 'Laura Simon', '1989-02-27', '2013-08-18'),
    (9, 'Alexandre Petit', '1991-05-06', '2015-12-02'),
    (10, 'Julie Dupuis', '1995-08-12', '2020-04-10');

INSERT INTO saison (id_club, id_championnat,annee , nb_buts_marques, nb_buts_encaisse, nb_points, nb_matchs_gagne, nb_matchs_nul, nb_matchs_perdu)
VALUES
    (1, 1, 2021, 75, 30, 87, 28, 3, 7),
    (2, 1, 2021, 62, 36, 78, 23, 9, 6),
    (3, 1, 2021, 68, 42, 75, 22, 9, 7),
    (4, 1, 2021, 58, 39, 72, 21, 9, 8),
    (5, 1, 2021, 55, 32, 69, 20, 9, 9),
    (6, 1, 2021, 51, 47, 63, 18, 9, 11),
    (7, 1, 2021, 42, 41, 57, 15, 12, 11),
    (8, 1, 2021, 49, 43, 54, 14, 12, 12),
    (9, 1, 2021, 47, 49, 51, 13, 12, 13),
    (10,1, 2021, 36, 46, 48, 12, 12, 14),
    (11,1, 2021, 60, 35, 88, 27, 7, 4),
    (12,1, 2021, 55, 41, 75, 22, 9, 7),
    (13,1, 2021, 45, 38, 73, 22, 7, 9),
    (14,1, 2021, 54, 51, 70, 21, 7, 10),
    (15,1, 2021, 40, 37, 69, 20, 9, 9),
    (16,1, 2021, 35, 43, 62, 17, 11, 10),
    (17,1, 2021, 33, 45, 54, 14, 12, 12),
    (18,1, 2021, 30, 39, 52, 14, 10, 14),
    (19,1, 2021, 38, 52, 48, 12, 12, 14),
    (20,1, 2021, 28, 59, 42, 10, 12, 16);

select init_rencontres(2021, '01/01/2021', 1)

INSERT INTO article (id_article, titre_article, desc_article, auteur_article, image_article)
VALUES
    (1, 'Les tactiques offensives innovantes qui révolutionnent le football moderne', 'Découvrez les nouvelles tactiques offensives qui font sensation dans le monde du football, avec des schémas de jeu innovants et des mouvements créatifs.', 1, 'image1.jpg'),
    (2, 'Le joueur étoile qui domine la scène du football mondial', 'Plongez dans l univers d un joueur étoile exceptionnel qui repousse les limites du football avec son talent, sa technique et son leadership sur le terrain.', 1, 'image2.jpg'),
    (3, 'Les transferts les plus spectaculaires de la saison', 'Découvrez les transferts les plus marquants de cette saison, avec les mouvements surprenants des meilleurs joueurs et les sommes astronomiques dépensées par les clubs.', 1, 'image3.jpg'),
    (4, 'Les jeunes talents prometteurs à suivre de près', 'Faites connaissance avec les jeunes talents émergents qui font sensation dans le monde du football, avec leur habileté, leur potentiel et leur capacité à marquer des buts spectaculaires.', 1, 'image4.jpg'),
    (5, 'Les moments les plus mémorables de l histoire du football', 'Revivez les moments inoubliables de l histoire du football, des buts historiques aux matchs légendaires qui ont marqué à jamais ce sport passionnant.', 1, 'image5.jpg');


INSERT INTO stade (id_stade, nom, ville, capacite)
VALUES
    (1, 'Parc des Princes', 'Paris', 47929),
    (2, 'Stade Vélodrome', 'Marseille', 67394),
    (3, 'Groupama Stadium', 'Lyon', 59186),
    (4, 'Stade Louis II', 'Monaco', 18523),
    (5, 'Stade Pierre-Mauroy', 'Lille', 50329),
    (6, 'Stade Geoffroy-Guichard', 'Saint-Étienne', 41965),
    (7, 'Matmut Atlantique', 'Bordeaux', 42115),
    (8, 'Roazhon Park', 'Rennes', 29845),
    (9, 'Allianz Riviera', 'Nice', 35624),
    (10, 'Stade de la Beaujoire', 'Nantes', 38285),
    (11, 'Stade de France', 'Saint-Denis', 81338),
    (12, 'Orange Vélodrome', 'Marseille', 67394),
    (13, 'Parc Olympique Lyonnais', 'Lyon', 59186),
    (14, 'Stade Louis II', 'Monaco', 18523),
    (15, 'Stade Pierre-Mauroy', 'Lille', 50329),
    (16, 'Stade Geoffroy-Guichard', 'Saint-Étienne', 41965),
    (17, 'Matmut Atlantique', 'Bordeaux', 42115),
    (18, 'Roazhon Park', 'Rennes', 29845),
    (19, 'Allianz Riviera', 'Nice', 35624),
    (20, 'Stade de la Beaujoire', 'Nantes', 38285);


INSERT INTO club (id_club, nom_club, id_stade, ville, logo, annee_fondation, president, entraineur)
VALUES
    (1, 'Paris Saint-Germain', 1, 'Paris', 'logo_psg.png', 1970, 'Nasser Al-Khelaifi', 'Mauricio Pochettino'),
    (2, 'Olympique de Marseille', 2, 'Marseille', 'logo_om.png', 1899, 'Pablo Longoria', 'Jorge Sampaoli'),
    (3, 'Olympique Lyonnais', 3, 'Lyon', 'logo_ol.png', 1950, 'Jean-Michel Aulas', 'Peter Bosz'),
    (4, 'AS Monaco', 4, 'Monaco', 'logo_monaco.png', 1924, 'Dmitry Rybolovlev', 'Niko Kovac'),
    (5, 'Lille OSC', 5, 'Lille', 'logo_lille.png', 1944, 'Olivier Létang', 'Christophe Galtier'),
    (6, 'AS Saint-Étienne', 6, 'Saint-Étienne', 'logo_asse.png', 1919, 'Claude Puel', 'Claude Puel'),
    (7, 'FC Girondins de Bordeaux', 7, 'Bordeaux', 'logo_bordeaux.png', 1881, 'Frédéric Longuépée', 'Paulo Sousa'),
    (8, 'Stade Rennais FC', 8, 'Rennes', 'logo_rennes.png', 1901, 'Nicolas Holveck', 'Bruno Génésio'),
    (9, 'OGC Nice', 9, 'Nice', 'logo_nice.png', 1904, 'Jean-Pierre Rivère', 'Adrian Ursea'),
    (10, 'FC Nantes', 10, 'Nantes', 'logo_nantes.png', 1943, 'Waldemar Kita', 'Antoine Kombouaré'),
    (11, 'Red Star FC', 11, 'Paris', 'logo_redstar.png', 1897, 'Patrice Haddad', 'Vincent Bordot'),
    (12, 'FC Sochaux-Montbéliard', 12, 'Sochaux', 'logo_sochaux.png', 1928, 'Wing Sang Li', 'Omar Daf'),
    (13, 'Le Havre AC', 13, 'Le Havre', 'logo_lehavre.png', 1872, 'Vincent Volpe', 'Paul Le Guen'),
    (14, 'ESTAC Troyes', 14, 'Troyes', 'logo_troyes.png', 1986, 'Maxime Ray', 'Laurent Batlles'),
    (15, 'Valenciennes FC', 15, 'Valenciennes', 'logo_valenciennes.png', 1913, 'Eddy Zdziech', 'Olivier Guégan'),
    (16, 'Chamois Niortais FC', 16, 'Niort', 'logo_niort.png', 1925, 'Karine Leger', 'Pascal Plancque'),
    (17, 'Grenoble Foot 38', 17, 'Grenoble', 'logo_grenoble.png', 1997, 'Mehdy Zouak', 'Philippe Hinschberger'),
    (18, 'USL Dunkerque', 18, 'Dunkerque', 'logo_dunkerque.png', 1919, 'Jean-Pierre Scouarnec', 'Fabien Mercadal'),
    (19, 'Pau FC', 19, 'Pau', 'logo_pau.png', 1920, 'Bernard Laporte-Fray', 'Bruno Irles'),
    (20, 'SC Bastia', 20, 'Bastia', 'logo_bastia.png', 1905, 'Claude Ferrandi', 'Stéphane Rossi');
