DROP DATABASE IF EXISTS hiremedb;
CREATE DATABASE hiremedb;
USE hiremedb;



DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id`        int NOT NULL auto_increment,
    `firstname`     varchar(30) NOT NULL,
    `lastname`      varchar(30) NOT NULL,
    `password`      varchar(32) NOT NULL, /*32 characters is the result of an md5 hash*/
    `telephone`     varchar(12) NOT NULL,
    `email`         varchar(45) NOT NULL,
    `date_joined`   date NOT NULL,
    PRIMARY KEY (`id`)
);
ALTER TABLE `users` AUTO_INCREMENT=100;

insert into `users` (firstname, lastname, password, telephone, email, date_joined) 
    VALUES ('Admin', 'Admin', MD5('password123'), 'Admin', 'Admin', CURDATE()); 

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
    `id`            int NOT NULL auto_increment,
    `job_title`         varchar(30) NOT NULL,
    `job_description`   varchar(99) NOT NULL,
    `category`          varchar(30) NOT NULL,
    `company_name`      varchar(50) NOT NULL,
    `company_location`  varchar(60) NOT NULL,
    `date_posted`       date NOT NULL,
    PRIMARY KEY (`id`)
);
ALTER TABLE `jobs` AUTO_INCREMENT=200;


DROP TABLE IF EXISTS `jobs_applied_for`;
CREATE TABLE `jobs_applied_for` (
    `id`        int NOT NULL auto_increment,
    `job_id`        int(10) NOT NULL,
    `user_id`       int(10) NOT NULL,
    `date_applied`  date NOT NULL,
    PRIMARY KEY (`id`)
);
ALTER TABLE `jobs_applied_for` AUTO_INCREMENT=300;
