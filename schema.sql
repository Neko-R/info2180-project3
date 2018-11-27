DROP DATABASE IF EXISTS hiremedb;
CREATE DATABASE hiremedb;
USE hiremedb;



DROP TABLE IF EXSISTS 'users';
CREATE TABLE 'users' (
    'id'        int primary key not null auto_increment=100,
    'firstname'     varchar(30) not null,
    'lastname'      varchar(30) not null,
    'password'      varchar(32) not null, /*32 characters is the result of an md5 hash*/
    'telephone'     varchar(12) not null,
    'email'         varchar(45) not null,
    'date_joined'   date not null
);

/*use md5 in php to hash passwords*/

insert into 'users' (firstname, lastname, password, telephone, email, date_joined) 
    VALUES ('Admin', 'Admin', <?php echo md5("password123"); ?>, 'Admin', 'Admin', CURDATE());     /*unhashed password: password123*/
    /*VALUES ('Admin', 'Admin', <?php echo md5("password123"); ?>'482C811DA5D5B4BC6D497FFA98491E38', 'Admin', 'Admin', CURDATE());     /*unhashed password: password123*/
    

DROP TABLE IF EXSISTS 'jobs';
CREATE TABLE 'jobs' (
    'id'            int primary key not null auto_increment=200,
    'job_title'         varchar(30) not null,
    'job_description'   varchar(99) not null,
    'category'          varchar(30) not null,
    'company_name'      varchar(50) not null,
    'company_location'  varchar(60) not null,
    'date_posted'       date not null
);




DROP TABLE IF EXSISTS 'jobs_applied_for';
CREATE TABLE 'jobs_applied_for' (
    'id'        int primary key not null auto_increment=300,
    'job_id'        int(10) not null,
    'user_id'       int(10) not null,
    'date_applied'  date not null
);
