CREATE TABLE user(
uid varchar(48) not null unique,
pwd varchar(12) not null,
email varchar(48) not null,
phone_num varchar(12) not null,
date date,
primary key(uid));