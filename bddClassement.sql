CREATE TABLE Classement(
    idCollab INT,
    idClassement INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    classement_number INT(40) NOT NULL,
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

