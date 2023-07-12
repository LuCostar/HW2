Create DATABASE hw2;
USE hw2;


CREATE TABLE ACCOUNTS (
    ID INTEGER AUTO_INCREMENT PRIMARY KEY,
    NAME VARCHAR(50) NOT NULL,
    SURNAME VARCHAR(50) NOT NULL,
    USERNAME VARCHAR(20) NOT NULL UNIQUE,
    EMAIL VARCHAR(40) NOT NULL UNIQUE,
    PASSWORD VARCHAR(60) NOT NULL
);

CREATE TABLE FAVOURITES (
    ID INTEGER AUTO_INCREMENT PRIMARY KEY,
    GAME INTEGER NOT NULL,
    USER INTEGER NOT NULL,
    NAME VARCHAR(50) NOT NULL,
    SCORE VARCHAR(10) NOT NULL,
    IMAGE VARCHAR(255) NOT NULL
);