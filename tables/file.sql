DROP Table if exists transactions;
CREATE TABLE transactions(
  Id1 int NOT NULL,
  Id2 int NOT NULL,
  ISBN int NOT NULL  
);

COPY transactions FROM '/home/devansh/Desktop/work/tables/transactions.csv' DELIMITER ',' CSV;

DROP Table if exists users;

CREATE TABLE users (
   userId  text primary key,
   firstname varchar(20) NOT NULL,
   secondname varchar(23) NOT NULL,
   gender varchar(6),
   username varchar(25) NOT NULL,
   password varchar(25) NOT NULL,
   emailaddress varchar(100) NOT NULL,
   streetaddress varchar(100) NOT NULL,
   city varchar(100) NOT NULL,
   state text,
   countryfull varchar(100) NOT NULL
);


COPY users FROM '/home/devansh/Desktop/work/tables/usersdata.csv' DELIMITER ',' CSV;


