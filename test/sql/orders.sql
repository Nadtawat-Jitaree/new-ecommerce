CREATE TABLE orders(
    id_order int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_order int NOT NULL,
    username varchar(255) NOT NULL,
    num int NOT NULL,
    id_type_food int NOT NULL,
    status varchar(255) NOT NULL,
	sender varchar(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;