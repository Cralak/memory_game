CREATE TABLE users(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(69) UNIQUE NOT NULL,
    pass VARCHAR(255) NOT NULL,
    username VARCHAR(25) NOT NULL UNIQUE,
    adress VARCHAR(255),
    post INT(5),
    city VARCHAR(255),
    country VARCHAR(255),
    mobile INT(10),
    phone INT(10),
    date_and_time_register DATETIME
)

CREATE TABLE services(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_user INT UNSIGNED NOT NULL,
    name_service VARCHAR(50) NOT NULL,
    description_service VARCHAR(150) NOT NULL,
    adress_service VARCHAR(255) NOT NULL,
    post_service INT(5) NOT NULL,
    city_service VARCHAR(255) NOT NULL,
    country_service VARCHAR(255) NOT NULL,
    date_and_time_service DATETIME NOT NULL
    info_service VARCHAR(255) 
)

CREATE TABLE user_services(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_service INT UNSIGNED NOT NULL,
    id_user INT UNSIGNED NOT NULL,
    date_and_time_register DATETIME
)

CREATe TABLE messages(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_sender INT UNSIGNED NOT NULL,
    id_receiver INT UNSIGNED NOT NULL, 
    message_content VARCHAR(255) NOT NULL, 
    date_and_time_message DATETIME NOT NULL
)

INSERT INTO users(email, pass, username, adress, post, city, country, mobile, phone, date_and_time_register)
VALUES(prout@gmail.com, Proutman69, xxSuperProutxx, 11 rue du prout, 95800, NULL, NULL, NULL, NULL, NULL)