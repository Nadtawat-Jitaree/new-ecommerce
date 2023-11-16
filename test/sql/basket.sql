CREATE TABLE basket(
    id_basket int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_food varchar(255) NOT NULL,
    username varchar(255) NOT NULL,
    num int NOT NULL,
    id_type_food int NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;