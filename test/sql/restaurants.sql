CREATE TABLE restaurants(
    id_restaurant int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_restaurant varchar(255) NOT NULL,
    detail_restaurant varchar(255) NOT NULL,
    image_restaurant varchar(255),
    username varchar(255) NOT NULL,
    verify_restaurant varchar(65) NOT NULL,
    id_type_restaurant	int NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;