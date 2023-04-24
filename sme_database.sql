DROP DATABASE IF EXISTS smart_counties_r_us;

CREATE DATABASE smart_counties_r_us;

use smart_counties_r_us;

create table smes(
    id int auto_increment primary key,
    company_name varchar(24) not null,
    hashed_password varchar(512) not null,
    contact varchar(24) not null
);

create table products(
    id int auto_increment primary key,
    product_name varchar(24) not null,
    product_description varchar(24),
    size varchar(24),
    type varchar(24),
    price_band varchar(24) not null,
    price int(4) not null,
    -- the associated sme,
    sme_name varchar(24) not null
);

CREATE TABLE `residents` (
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    hashed_password varchar(512) NOT NULL,
    area varchar(255) NOT NULL,
    age_bracket varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE `votes` (
    id int(11) NOT NULL AUTO_INCREMENT,
    product_id int NOT NULL,
    resident_id int NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE `councils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `hashed_password` varchar(512) NOT NULL,
  `area` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);
-- populating dummy values
-- the hash is sha256 of 'password'
insert into
    smes(company_name, hashed_password, contact)
values
    (
        "test",
        "5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8",
        "12345678"
    );

insert into
    products(
        product_name,
        product_description,
        size,
        type,
        price_band,
        price,
        sme_name
    )
values
    (
        "test",
        "test",
        12,
        "Household",
        "low",
        89,
        "test"
    );

INSERT INTO
    residents (name, hashed_password, area, age_bracket)
VALUES
    (
        'test',
        '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8',
        'area52',
        '20-30'
    );
