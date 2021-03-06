/*import u phpmyadmin i ucitaj sql fajl */

DROP TABLE IF EXISTS account;
DROP TABLE IF EXISTS link;
DROP TABLE IF EXISTS genre;
DROP TABLE IF EXISTS movie;



CREATE TABLE account (
    id integer NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    admin BOOLEAN DEFAULT false,
    PRIMARY KEY (id )
);

INSERT INTO account (id, username, password, admin)
VALUES (1, "Sam", "abJnggxhB/yWI", true);



CREATE TABLE movie (
    id integer NOT NULL AUTO_INCREMENT,
    name VARCHAR(70) NOT NULL,
    year integer NOT NULL,
    trailer VARCHAR(200),
    addedBy integer NOT NULL,
    PRIMARY KEY (id )
);

/* Genres */

CREATE TABLE genre (
    id integer NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    PRIMARY KEY (id )
);

INSERT INTO genre (name) VALUES ("Action");
INSERT INTO genre (name) VALUES ("Adventure");
INSERT INTO genre (name) VALUES ("Biography");
INSERT INTO genre (name) VALUES ("Comedy");
INSERT INTO genre (name) VALUES ("Crime");
INSERT INTO genre (name) VALUES ("Documentary");
INSERT INTO genre (name) VALUES ("Drama");
INSERT INTO genre (name) VALUES ("Family");
INSERT INTO genre (name) VALUES ("Fantasy");
INSERT INTO genre (name) VALUES ("History");
INSERT INTO genre (name) VALUES ("Horror");
INSERT INTO genre (name) VALUES ("Mystery");
INSERT INTO genre (name) VALUES ("Romance");
INSERT INTO genre (name) VALUES ("Sci-Fi");
INSERT INTO genre (name) VALUES ("Thriller");
INSERT INTO genre (name) VALUES ("War");
INSERT INTO genre (name) VALUES ("Western");



CREATE TABLE link (
    id integer NOT NULL AUTO_INCREMENT,
    mid integer NOT NULL,
    gid integer NOT NULL,
    PRIMARY KEY (id )
   
    
);



INSERT INTO movie (name, year, trailer, addedBy)
VALUES ("Inception", 2010, "YoHD9XEInc0", "0");
INSERT INTO link (mid, gid) VALUES (1, 1);
INSERT INTO link (mid, gid) VALUES (1, 2);
INSERT INTO link (mid, gid) VALUES (1, 14);

INSERT INTO movie (name, year, trailer, addedBy)
VALUES ("Star Wars VII: The Force Awakens", 2015, "sGbxmsDFVnE", "0");
INSERT INTO link (mid, gid) VALUES (2, 1);
INSERT INTO link (mid, gid) VALUES (2, 2);
INSERT INTO link (mid, gid) VALUES (2, 9);

INSERT INTO movie (name, year, trailer, addedBy)
VALUES ("The Matrix", 1999, "vKQi3bBA1y8", "0");
INSERT INTO link (mid, gid) VALUES (3, 1);
INSERT INTO link (mid, gid) VALUES (3, 14);

INSERT INTO movie (name, year, trailer, addedBy)
VALUES ("The Lord of the Rings: The Fellowship of the Ring", 2001, "V75dMMIW2B4", "0");
INSERT INTO link (mid, gid) VALUES (4, 2);
INSERT INTO link (mid, gid) VALUES (4, 7);
INSERT INTO link (mid, gid) VALUES (4, 9);

INSERT INTO movie (name, year, trailer, addedBy)
VALUES ("Forrest Gump", 1994, "bLvqoHBptjg", "0");
INSERT INTO link (mid, gid) VALUES (5, 4);
INSERT INTO link (mid, gid) VALUES (5, 7);
INSERT INTO link (mid, gid) VALUES (5, 13);

INSERT INTO movie (name, year, trailer, addedBy)
VALUES ("The Shawshank Redemption", 1994, "NmzuHjWmXOc", "0");
INSERT INTO link (mid, gid) VALUES (6, 5);
INSERT INTO link (mid, gid) VALUES (6, 7);
