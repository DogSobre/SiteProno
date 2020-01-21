CREATE TABLE Classement(
    idCollab INT
    idClassement INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    classement_number INT(40) NOT NULL,
    
    FOREIGN KEY (idCollab) REFERENCES `Collab`(idCollab) ON DELETE CASCADE ON UPDATE CASCADE
)