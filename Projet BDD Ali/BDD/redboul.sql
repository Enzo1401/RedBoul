create database redboul;
use redboul;

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
    id_users int not null,
    id_produit int not null,
    quantite int not null,
    date_commande date not null,
    foreign key (id_users) references users(id_users),
    foreign key (id_produit) references produit(id_produit)
);


insert into produit (nom, prix, descriptions,images,stock) values 
('Redbull Sea blue Edition', 2.50, 'Description for Sea blue Edition', 'image1', 10),
('Redbull Green Edition', 2.50, 'Description for Green Edition', 'image2', 10),
('Redbull Red Edition', 2.50, 'Description for Red Edition', 'image3', 10),
('Redbull White Edition', 2.50, 'Description for White Edition', 'image4', 10),
('Redbull Blue Edition', 2.50, 'Description for Blue Edition', 'image5', 10),
('Redbull Apricot Edition', 2.50, 'Description for Apricot Edition', 'image6', 10),
('Redbull Summer Edition', 2.50, 'Description for Summer Edition', 'image7', 10),
('Redbull Energy Drink', 2.50, 'Description for Energy Drink', 'image8', 10),
('Redbull Sugar Free', 2.50, 'Description for Sugar Free', 'image9', 10);


