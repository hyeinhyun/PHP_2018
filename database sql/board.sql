CREATE TABLE board(
num int not null auto_increment,
uid varchar(48) not null,
title varchar(12) not null,
content varchar(48) not null,
date date,
primary key(num));

alter table board add constraint FK_uid foreign key(uid) references user(uid);
