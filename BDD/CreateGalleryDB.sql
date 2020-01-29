CREATE DATABASE gallery CHARACTER SET 'utf8';


-- Table: gallery_category
CREATE TABLE gallery_category(
        category_id         Int  Auto_increment  NOT NULL ,
        category_categories Varchar (100) NOT NULL
	,CONSTRAINT gallery_category_PK PRIMARY KEY (category_id)
)ENGINE=InnoDB;

INSERT INTO gallery_category (category_categories)
VALUES ('Théâtre, lever de rideau, trouvez votre place'),
('Lubie sur la chaussure'),
('Natures mortes'),
('Les aplats et les faux frères'),
("A l'ombre de la Corse"),
('Baisser de rideau');



-- Table: gallery_dimension
CREATE TABLE gallery_dimension(
        dimension_id         Int  Auto_increment  NOT NULL ,
        dimension_dimensions Varchar (100) NOT NULL
	,CONSTRAINT gallery_dimension_PK PRIMARY KEY (dimension_id)
)ENGINE=InnoDB;

INSERT INTO gallery_dimension (dimension_dimensions)
VALUES ('120 cm x 80 cm'),
('100 cm x 80 cm'),
('120 cm x 65 cm'),
('92 cm x 60 cm'),
('90 cm x 90 cm'),
('81 cm x 65 cm'),
('81 cm x 55 cm'),
('80 cm x 80 cm'),
('73 cm x 60 cm'),
('73 cm x 54 cm'),
('70 cm x 70 cm'),
('65 cm x 54 cm'),
('60 cm x 60 cm'),
('60 cm x 50 cm'),
('46 cm x 38 cm'),
('40 cm x 40 cm'),
('30 cm x 30 cm'),
('92 cm x 73 cm'),
('65 cm x 54 cm');



-- Table: gallery_paintin
CREATE TABLE gallery_paintin(
        paintin_id    Int  Auto_increment  NOT NULL ,
        paintin_files Varchar (100) NOT NULL ,
        category_id   Int NOT NULL ,
        dimension_id  Int NOT NULL
	,CONSTRAINT gallery_paintin_PK PRIMARY KEY (paintin_id)

	,CONSTRAINT gallery_paintin_gallery_category_FK FOREIGN KEY (category_id) REFERENCES gallery_category(category_id)
	,CONSTRAINT gallery_paintin_gallery_dimension0_FK FOREIGN KEY (dimension_id) REFERENCES gallery_dimension(dimension_id)
)ENGINE=InnoDB;

INSERT INTO gallery_paintin (paintin_files,category_id,dimension_id)
VALUES ('assets/img/IMG_0342.JPG',1,2),
('assets/img/IMG_0343.JPG',1,5),
('assets/img/IMG_0061.JPG',1,14),
('assets/img/IMG_0419.jpeg',1,6),
('assets/img/IMG_0322.jpeg',1,1),
('assets/img/IMG_0481.jpeg',1,8),
('assets/img/IMG_0600.jpeg',1,6),
('assets/img/IMG_0310.jpeg',1,14),
('assets/img/IMG_0601.jpeg',1,8),
('assets/img/IMG_0320.JPG',2,13),
('assets/img/IMG_0335.JPG',2,4),
('assets/img/IMG_0311.jpeg',2,13),
('assets/img/IMG_0321.JPG',2,9),
('assets/img/IMG_0615.jpeg',2,15),
('assets/img/IMG_0325.JPG',3,9),
('assets/img/IMG_0316.jpeg',3,9),
('assets/img/IMG_0346.JPG',3,9),
('assets/img/IMG_0324.JPG',3,9),
('assets/img/IMG_0315.JPG',3,1),
('assets/img/IMG_0303.jpeg',3,10),
('assets/img/IMG_0306.jpeg',3,10),
('assets/img/IMG_0622.jpeg',3,17),
('assets/img/IMG_0623.jpeg',3,17),
('assets/img/IMG_0339.JPG',3,14),
('assets/img/IMG_0363.jpeg',3,7),
('assets/img/IMG_0420.jpeg',4,9),
('assets/img/IMG_0338.JPG',4,14),
('assets/img/IMG_0359.jpeg',4,1),
('assets/img/IMG_0330.JPG',4,18),
('assets/img/IMG_0331.JPG',4,4),
('assets/img/IMG_0332.JPG',4,12),
('assets/img/IMG_0348.JPG',4,12),
('assets/img/IMG_0603.JPG',4,16),
('assets/img/IMG_0347.JPG',4,11),
('assets/img/IMG_0362.jpeg',5,9),
('assets/img/IMG_0361.jpeg',5,16),
('assets/img/IMG_0357.JPG',5,8),
('assets/img/IMG_0356.JPG',5,11),
('assets/img/IMG_0364.jpeg',5,9),
('assets/img/IMG_0355.JPG',5,9),
('assets/img/IMG_0611.jpeg',5,5),
('assets/img/IMG_0337.JPG',5,11),
('assets/img/IMG_0360.jpeg',5,3),
('assets/img/IMG_0482.jpeg',5,4),
('assets/img/IMG_0344.jpeg',6,11);



-- Table: gallery_admin
CREATE TABLE gallery_admin(
        admin_id       Int  Auto_increment  NOT NULL ,
        admin_login    Varchar (100) NOT NULL ,
        admin_password Varchar (100) NOT NULL
	,CONSTRAINT gallery_admin_PK PRIMARY KEY (admin_id)
)ENGINE=InnoDB;