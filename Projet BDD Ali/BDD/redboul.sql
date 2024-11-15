create database redboul;

create table users(
    id_users int primary key AUTO_INCREMENT,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    email varchar(100) not null unique,
    mdp varchar(256) not null,
    adresse varchar(255)
);


create table produit(
    id_produit int primary key AUTO_INCREMENT,
    nom varchar(50) not null,
    prix decimal(10,2) not null,
    descriptions text not null,
    images varchar(255) not null,
    stock int not null
);

create table commandes(
    id_commandes int primary key AUTO_INCREMENT,
    id_produit int not null,
    quantite int not null,
    date_commande date not null,
    commentaire text not null,
    id_users int not null
    foreign key (id_produit) references produit(id_produit)
    foreign key (id_users) references users(id_users)
);

insert into produit (nom, prix, descriptions,images,stock) values 
('Redbull Sea blue Edition', 2.50, 'Description for Sea blue Edition', 'image/blueEdition.png', 10),
('Redbull Green Edition', 2.50, 'Description for Green Edition', 'image/greenEdition.png', 10),
('Redbull Red Edition', 2.50, 'Description for Red Edition', 'image/redEdition.png', 10),
('Redbull White Edition', 2.50, 'Description for White Edition', 'image/whiteEdition.png', 10)


-----------------------REQUETE SQL-----------------------


insert into produit (nom, prix, descriptions,images,stock) values 
(?,?,?,?,?);

select * from produit;


delete from produit where nom= ?; 

update set produit stock = stock + ? where nom =?;

DELIMITER //

CREATE TRIGGER update_stock_after_order
AFTER INSERT ON commandes
FOR EACH ROW
BEGIN
    -- Mettre à jour le stock du produit
    UPDATE produit
    SET stock = stock - NEW.quantite
    WHERE id_produit = NEW.id_produit;
END //

DELIMITER ;


DELIMITER //

CREATE TRIGGER check_stock_before_insert
BEFORE INSERT ON commandes
FOR EACH ROW
BEGIN
    DECLARE current_stock INT;

    -- Récupérer le stock actuel du produit
    SELECT stock INTO current_stock 
    FROM produit 
    WHERE id_produit = NEW.id_produit;

    -- Vérifier si le stock est suffisant
    IF current_stock < NEW.quantite THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Stock insuffisant pour ce produit';
    END IF;
END //

DELIMITER ;


INSERT INTO users (id_users, nom, email) VALUES (1, 'Nom Utilisateur', 'email@example.com');


CALL passer_commande(1, 1, 2, '2023-10-01');
