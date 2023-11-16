CREATE TABLE foods(
    id_food int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_food varchar(255) NOT NULL,
    id_type_food int NOT NULL,
    detail_food varchar(255) NOT NULL,
    price_food int NOT NULL,
    image_food varchar(255)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;