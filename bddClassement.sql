------------------------ Table Classement ------------------------

CREATE TABLE Classement(
    idCollab INT,
    idClassement INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    classement_number INT(40) NOT NULL,
    classement_point INT(40) UNSIGNED,
    
    FOREIGN KEY (idCollab) REFERENCES `Collab`(idCollab) ON DELETE CASCADE ON UPDATE CASCADE
)

---------

INSERT INTO `Classement`(`classement_point`) VALUES (31);
INSERT INTO `Classement`(`classement_point`) VALUES (54);
INSERT INTO `Classement`(`classement_point`) VALUES (02);
INSERT INTO `Classement`(`classement_point`) VALUES (83);
INSERT INTO `Classement`(`classement_point`) VALUES (29);
INSERT INTO `Classement`(`classement_point`) VALUES (44);

---------

ALTER TABLE Classement
ADD Collab VARCHAR(50);

UPDATE `Classement` SET `Collab` = 'Player1' WHERE `Classement`.`idClassement` = 1;
UPDATE `Classement` SET `Collab` = 'Player2' WHERE `Classement`.`idClassement` = 2;
UPDATE `Classement` SET `Collab` = 'Player3' WHERE `Classement`.`idClassement` = 3;
UPDATE `Classement` SET `Collab` = 'Player4' WHERE `Classement`.`idClassement` = 4;
UPDATE `Classement` SET `Collab` = 'Player5' WHERE `Classement`.`idClassement` = 5;
UPDATE `Classement` SET `Collab` = 'Player6' WHERE `Classement`.`idClassement` = 6;

------------------------  Table résultat du match ------------------------

CREATE TABLE resultatMatch(
    idCollab INT,
    idResultatMatch INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    resultatMatch_vainqueur INT (40) UNSIGNED,
    resultatMatch_perdant INT (40) UNSIGNED,
    resultatMatch_nul INT (40) UNSIGNED,

    FOREIGN KEY (idCollab) REFERENCES `Collab`(idCollab) ON DELETE CASCADE ON UPDATE CASCADE
)

------------------------ Table UserTest ------------------------

CREATE IF NOT EXISTS Collab(
    idCollab INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Collab_Name VARCHAR(50) NOT NULL,
    Collab_Mail VARCHAR (50) NOT NULL,
    Collab_Password VARCHAR (50) NOT NULL
)

----------

INSERT INTO `Collab` (`idCollab`, `Collab_Name`, `Collab_Mail`, `Collab_Password`) VALUES (NULL, 'Player1', 'playerone@123.com', 'password1');
INSERT INTO `Collab` (`idCollab`, `Collab_Name`, `Collab_Mail`, `Collab_Password`) VALUES (NULL, 'Player2', 'playertwo@123.com', 'password2');
INSERT INTO `Collab` (`idCollab`, `Collab_Name`, `Collab_Mail`, `Collab_Password`) VALUES (NULL, 'Player3', 'playerthree@123.com', 'password3');