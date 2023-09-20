#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

drop database if exists library_db;
create database library_db;
use library_db;

#------------------------------------------------------------
# Table: Auteur
#------------------------------------------------------------

CREATE TABLE Auteur(
        NUM_AUTEUR    Int NOT NULL ,
        NOM_AUTEUR    Char (20) NOT NULL ,
        PRENOM_AUTEUR Char (20) NOT NULL
	,CONSTRAINT Auteur_PK PRIMARY KEY (NUM_AUTEUR)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: CATEGORIE
#------------------------------------------------------------

CREATE TABLE CATEGORIE(
        ID_CATEGORIE  Int NOT NULL ,
        NOM_CATEGORIE Char(20) NOT NULL 
	,CONSTRAINT CATEGORIE_PK PRIMARY KEY (ID_CATEGORIE)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: EDITEUR
#------------------------------------------------------------

CREATE TABLE EDITEUR(
        NUM_EDIT    Int(20) NOT NULL ,
        NOM_EDIT    Char (20) NOT NULL ,
        PRENOM_EDIT Char (20) NOT NULL ,
        TEL_EDIT    Int NOT NULL
	,CONSTRAINT EDITEUR_PK PRIMARY KEY (NUM_EDIT)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Document
#------------------------------------------------------------

CREATE TABLE Document(
        ID_DOC    Varchar (20) NOT NULL ,
        TITRE_DOC Char (50) NOT NULL ,
        ANNEE_PUB Date NOT NULL ,
         TYPEE CHAR(20) NOT NULL ,
         NUM_EDIT  Int NOT NULL ,
         ID_CATEGORIE  Int(20) NOT NULL 
	,CONSTRAINT Document_PK PRIMARY KEY (ID_DOC)

	,CONSTRAINT Document_EDITEUR_FK FOREIGN KEY (NUM_EDIT) REFERENCES EDITEUR(NUM_EDIT)
        ,CONSTRAINT Document_categorie_FK FOREIGN KEY (ID_CATEGORIE) REFERENCES CATEGORIE(ID_CATEGORIE)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Livre
#------------------------------------------------------------

CREATE TABLE Livre(
        CODE_ISBN   Int NOT NULL ,
        TITRE_LIVRE Char (5) NOT NULL ,
        ID_DOC      Varchar (20) NOT NULL
	,CONSTRAINT Livre_PK PRIMARY KEY (CODE_ISBN)

	,CONSTRAINT Livre_Document_FK FOREIGN KEY (ID_DOC) REFERENCES Document(ID_DOC)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PERIODIQUE
#------------------------------------------------------------

CREATE TABLE PERIODIQUE(
        NUMERO_PERIODIQUE Char (20) NOT NULL ,
        ISSN              Int NOT NULL ,
        TITRE_PERIODIQUE  Char (20) NOT NULL ,
        VOLUME_PERIODIQUE Int NOT NULL ,
        ID_DOC            Varchar (20) NOT NULL
	,CONSTRAINT PERIODIQUE_PK PRIMARY KEY (NUMERO_PERIODIQUE)

	,CONSTRAINT PERIODIQUE_Document_FK FOREIGN KEY (ID_DOC) REFERENCES Document(ID_DOC)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: EXEMPLAIRE
#------------------------------------------------------------

CREATE TABLE EXEMPLAIRE(
        NUM_ORDRE         Int (10) NOT NULL ,
        DATE_ACHAT        Date NOT NULL ,
        ETAT              Char (20) NOT NULL ,
        STATUT            Char (20) NOT NULL ,
        NOMBRE_EXEMPLAIRE Int NOT NULL ,
        ID_DOC            Varchar (20) NOT NULL
	,CONSTRAINT EXEMPLAIRE_PK PRIMARY KEY (NUM_ORDRE,DATE_ACHAT)

	,CONSTRAINT EXEMPLAIRE_Document_FK FOREIGN KEY (ID_DOC) REFERENCES Document(ID_DOC)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        ID_UTILISATEUR     Varchar (20) NOT NULL ,
        NOM     char (20) NOT NULL ,
        PRENOM     char (20) NOT NULL ,
        CTG                Char (20) NOT NULL ,
        AMENDE_FORFAITAIRE Int NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (ID_UTILISATEUR)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Emprunte
#------------------------------------------------------------

CREATE TABLE Emprunte(
        ID_EMPRUNTE    Varchar (20) NOT NULL ,
        DATE_DEBUT     Date NOT NULL ,
        DATE_FIN       Date NOT NULL ,
        NUM_ORDRE      Int NOT NULL ,
        DATE_ACHAT     Date NOT NULL ,
        ID_UTILISATEUR Varchar (20) NOT NULL
	,CONSTRAINT Emprunte_PK PRIMARY KEY (ID_EMPRUNTE)

	,CONSTRAINT Emprunte_EXEMPLAIRE_FK FOREIGN KEY (NUM_ORDRE,DATE_ACHAT) REFERENCES EXEMPLAIRE(NUM_ORDRE,DATE_ACHAT)
	,CONSTRAINT Emprunte_Utilisateur0_FK FOREIGN KEY (ID_UTILISATEUR) REFERENCES Utilisateur(ID_UTILISATEUR)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Bibliothecaire
#------------------------------------------------------------

CREATE TABLE Bibliothecaire(
        ID_BIB     Varchar (20) NOT NULL ,
        NOM_BIB    Char (20) NOT NULL ,
        PRENOM_BIB char (20) NOT NULL ,
        username char(20) NOT NULL ,
        password VARCHAR(20) NOT NULL ,
        POSTE      Char (20) NOT NULL
	,CONSTRAINT Bibliothecaire_PK PRIMARY KEY (ID_BIB)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Ecrit
#------------------------------------------------------------

CREATE TABLE Ecrit(
        NUM_AUTEUR Int NOT NULL ,
        CODE_ISBN  Int NOT NULL
	,CONSTRAINT Ecrit_PK PRIMARY KEY (NUM_AUTEUR,CODE_ISBN)

	,CONSTRAINT Ecrit_Auteur_FK FOREIGN KEY (NUM_AUTEUR) REFERENCES Auteur(NUM_AUTEUR)
	,CONSTRAINT Ecrit_Livre0_FK FOREIGN KEY (CODE_ISBN) REFERENCES Livre(CODE_ISBN)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Suit
#------------------------------------------------------------

CREATE TABLE Suit(
        ID_BIB     Varchar (20) NOT NULL ,
        ID_UTILISATEUR     Varchar (20) NOT NULL
	,CONSTRAINT Suit_PK PRIMARY KEY (ID_BIB,ID_UTILISATEUR)

	,CONSTRAINT Suit_Utilisateur_FK FOREIGN KEY (ID_BIB) REFERENCES Bibliothecaire(ID_BIB)
	,CONSTRAINT SUIT_Bibliothecaire_FK FOREIGN KEY (ID_UTILISATEUR) REFERENCES Utilisateur(ID_UTILISATEUR)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Stagiaire
#------------------------------------------------------------

CREATE TABLE STAGIAIRE(
        CODE_STAG     Varchar (20) NOT NULL ,
        NOM_STAG     Varchar (20) NOT NULL ,
        PRENOM_STAG     Varchar (20) NOT NULL ,
        DURE_STAG     INT (20) NOT NULL ,
        ID_BIB     Varchar (20) NOT NULL 
	,CONSTRAINT STAGIAIRE_PK PRIMARY KEY (CODE_STAG)

	,CONSTRAINT STAGIAIRE_BIB_FK FOREIGN KEY (ID_BIB) REFERENCES Bibliothecaire(ID_BIB)
)ENGINE=InnoDB;       
