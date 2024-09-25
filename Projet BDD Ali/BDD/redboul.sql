create database redboul;

create table users(
    id_users int primary key auto_increment,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    passwords varchar(50) not null,
    email varchar(100) not null,
    adresse varchar(255) not null
);


create table produit(
    id_produit int primary key auto_increment,
    nom varchar(50) not null,
    prix decimal(10,2) not null,
    descriptions text not null,
    images varchar(255) not null,
    stock int not null
);

create table commandes(
    id_commandes int primary key auto_increment,
    id_produit int not null,
    quantite int not null,
    date_commande date not null,
    commentaire text not null,
    foreign key (id_produit) references produit(id_produit)
);

insert into produit (nom, prix, descriptions,images,stock) values 
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

CREATE PROCEDURE passer_commande(
    IN p_id_users INT,
    IN p_id_produit INT,
    IN p_quantite INT,
    IN p_date_commande DATE
)
BEGIN
    -- Insérer la commande dans la table commandes
    INSERT INTO commandes (id_users, id_produit, quantite, date_commande)
    VALUES (p_id_users, p_id_produit, p_quantite, p_date_commande);

    -- Mettre à jour le stock du produit
    UPDATE produit
    SET stock = stock - p_quantite
    WHERE id_produit = p_id_produit;
END //

DELIMITER ;

INSERT INTO users (id_users, nom, email) VALUES (1, 'Nom Utilisateur', 'email@example.com');


CALL passer_commande(1, 1, 2, '2023-10-01');
