CREATE TABLE users(
	id_user int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname varchar(65) NOT NULL,
    lastname varchar(65) NOT NULL,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    role varchar(60) NOT NULL,
    verify varchar(65),
    address varchar(255) NOT NULL,
    tel varchar(10) NOT NULL,
    date_user timestamp NOT NULL,
    image_user varchar(255)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;