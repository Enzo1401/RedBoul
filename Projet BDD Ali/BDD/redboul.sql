create database redboul;
use redboul;

create table users(
    id_users int primary key auto_increment,
    username varchar(50) not null,
    passwords varchar(50) not null,
    email varchar(100) not null
);


create table produit(
    id_produit int primary key auto_increment,
    nom varchar(50) not null,
    prix decimal(10,2) not null,
    descriptions text not null,
    images image not null,
    stock int not null

);

create table commandes(
    id_commandes int primary key auto_increment
    id_users int not null foreing key references users(id_users),
    id_produit int not null foreing key references produit(id_produit),
    quantite int not null,
    date_commande date not null
);


insert into produit (nom, prix, descriptions,images,stock) values 
('Redbull Sea blue Edition',2,50,' ','image1',10),
('Redbull Green Edition',2,50,' ','image2',10),
('Redbull Red Edition',2,50,' ','image3',10),
('Redbull White Edition',2,50,' ','image4',10),
('Redbull Blue Edition',2,50,' ','image5',10),
('Redbull Apricot Edition',2,50,' ','image6',10),
('Redbull Summer Edition',2,50,' ','image7',10),
('Redbull Energy Drink',2,50,' ','image8',10),
('Redbull Sugar Free',2,50,' ','image9',10);


