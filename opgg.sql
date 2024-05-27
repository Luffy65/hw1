-- create database opgg;
use opgg;

CREATE TABLE users (
	email varchar(255) unique,
    username varchar(255) primary key,
    password varchar(255)
);

create table favorites(
	username varchar(255), -- Username dell'utente attuale
    summonerName varchar(255), -- Summoner name aggiunto ai preferiti
	primary key (username, summonerName),
	FOREIGN KEY(username) REFERENCES USERS(username),
    INDEX ind_username(username)
);


-- SET SQL_SAFE_UPDATES = 0;
-- delete from users;

-- drop table users;

-- select * from users;

-- select * from favorites;