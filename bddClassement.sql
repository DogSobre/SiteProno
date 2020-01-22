CREATE TABLE Classement(
    idCollab INT,
    idClassement INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    classement_point INT(40) UNSIGNED,
    
    FOREIGN KEY (idCollab) REFERENCES `Collab`(idCollab) ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE resultatMatch(
    idCollab INT,
    idResultatMatch INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    resultatMatch_vainqueur INT (40) UNSIGNED,
    resultatMatch_perdant INT (40) UNSIGNED,
    resultatMatch_nul INT (40) UNSIGNED,

    FOREIGN KEY (idCollab) REFERENCES `Collab`(idCollab) ON DELETE CASCADE ON UPDATE CASCADE
)

INSERT INTO `Classement`(`classement_point`) VALUES (31);
INSERT INTO `Classement`(`classement_point`) VALUES (54);
INSERT INTO `Classement`(`classement_point`) VALUES (02);
INSERT INTO `Classement`(`classement_point`) VALUES (83);
INSERT INTO `Classement`(`classement_point`) VALUES (29);
INSERT INTO `Classement`(`classement_point`) VALUES (44);