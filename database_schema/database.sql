CREATE DATABASE admin_management;

USE admin_management;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS clients;
CREATE TABLE clients (
   id int(11) NOT NULL AUTO_INCREMENT,
   name varchar(255) NOT NULL,
   birth_date DATE NOT NULL,
   CPF varchar(14) NOT NULL,
   RG varchar(12) NOT NULL,
   phone varchar(14) NOT NULL,
   PRIMARY KEY (id)
);

DROP TABLE IF EXISTS address;
CREATE TABLE address (
   id int(11) NOT NULL AUTO_INCREMENT,
   id_client int(11) NOT NULL,
   description varchar(255) NOT NULL,
   cep varchar(10) NOT NUll,
   street varchar(255) NOT NULL,
   number int(10) NOT NULL,
   neighborhood varchar(255) NOT NULL,
   city varchar(255) NOT NULL,
   state varchar(255) NOT NULL,
   country varchar(255) NOT NULL,
   PRIMARY KEY (id),
   FOREIGN KEY (id_client) REFERENCES clients(id) ON DELETE CASCADE
);
LOCK TABLES users WRITE;
INSERT INTO users (id, name, email, password) VALUES (1,'Admin','admin@admin.com','$2y$10$3RPloEo62/jxjMDyTD5hvendSSUT0SpPil8GwoSzJWW4roebWRKF6');
UNLOCK TABLES;

