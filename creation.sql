USE IGI_3014_8S_GP2;


CREATE TABLE Realisateur(
        Id_Realisateur     Int,
        Nom_Realisateur    Varchar (50),
        Prenom_Realisateur Varchar (50),
        PRIMARY KEY ('Id_Realisateur')
)ENGINE=InnoDB;



CREATE TABLE Genre(
        Id_Genre  Int,
        Nom_Genre Varchar (50),
        PRIMARY KEY ('Id_Genre')
)ENGINE=InnoDB;


CREATE TABLE Pays(
        Nom_Pays Varchar (50),
        PRIMARY KEY ('Pays_Film')
)ENGINE=InnoDB;



CREATE TABLE Film(
        Id_Film                Int NOT NULL ,
        Titre_Film             Varchar (50) NOT NULL ,
        Annee_Realisation_Film Year,
        Duree_Film             Int,
        Note_Moyenne           Float,
        Date_Sortie_Film       Date,
        Nombre_De_Votes        Int,
        Titre_Original_Film    Varchar (50),
        Langue_Originale_Film  Varchar (50),
        Id_Realisateur Int,
        Nom_Pays Varchar (50),
        Id_Genre Int,
        PRIMARY KEY ('Id_Film')
)ENGINE=InnoDB;
ALTER TABLE cinema.Film ADD CONSTRAINT fk_Id_Realisateur FOREIGN KEY (Id_Realisateur) REFERENCES Realisateur(Id_Realisateur);
ALTER TABLE cinema.Film ADD CONSTRAINT fk_Nom_Pays FOREIGN KEY (Nom_Pays) REFERENCES Pays(Nom_Pays);
ALTER TABLE cinema.Film ADD CONSTRAINT fk_Id_Genre FOREIGN KEY (Id_Genre) REFERENCES Genre(Id_Genre);
