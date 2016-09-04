


DROP Table if exists transactions;
CREATE TABLE transactions(
  Id1 int NOT NULL,
  Id2 int NOT NULL,
  BookId int NOT NULL,
  ModeofPayment text NOT NULL,
CONSTRAINT id1_fkey FOREIGN KEY (Id1)
      REFERENCES users (userid) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE CASCADE,

CONSTRAINT id2_fkey FOREIGN KEY (Id2)
      REFERENCES users (userid) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE CASCADE,
CONSTRAINT Book_fkey FOREIGN KEY (BookId)
      REFERENCES Books (BookId) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION

);

\copy transactions FROM '/home/prateek/Desktop/DB/trans.csv' DELIMITER ',' CSV;

drop table if exists ratings;
create table ratings(
		BookID int, 
		UserID int, 
		Rating int, 
		UpVotes int,

CONSTRAINT Bookid_fkey FOREIGN KEY (BookID)
      REFERENCES Books (Bookid) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE CASCADE,

CONSTRAINT Userid_fkey FOREIGN KEY (UserID)
      REFERENCES Users (userid) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE CASCADE




);


\copy ratings from '/home/prateek/Desktop/DB/Ratings.csv' delimiter ',' csv;


drop table if exists booksandusers;

create table booksandusers(
	Bookid int not NULL,
	userid int not NULL,
	price int not NULL,
	avialable int not NULL,
	hard int,

CONSTRAINT Bookid_fkey FOREIGN KEY (BookID)
      REFERENCES Books (Bookid) MATCH SIMPLE ON DELETE CASCADE,

CONSTRAINT Userid_fkey FOREIGN KEY (UserID)
      REFERENCES Users (userid) MATCH SIMPLE ON DELETE CASCADE
);


\copy booksandusers from '/home/devansh/Desktop/BandU.csv' delimiter ',' csv;