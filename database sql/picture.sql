CREATE TABLE user_picture(
num int not null auto_increment,
uid varchar(48) not null,
title varchar(12) not null,
description varchar(48) not null,
place varchar(12) not null,
p_path varchar(48) not null,
date date,
primary key(num),
constraint FK_uid foreign key(uid) references user(uid));"