CREATE OR REPLACE FUNCTION auditlogfunc() RETURNS TRIGGER AS $example_table$
    BEGIN
        update books set avgrating = (select avg(rating) from ratings where ratings.bookid=new.bookid group by ratings.bookid)
        	where ratings.bookid= new.bookid;
        RETURN NEW;
    END;
$example_table$ LANGUAGE plpgsql;


CREATE TRIGGER example_trigger AFTER INSERT ON booksAndUsers
FOR EACH ROW EXECUTE PROCEDURE auditlogfunc();