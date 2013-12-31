create database cruddata;

use cruddata;

create table courses (
	id int auto_increment not null primary key,
	name varchar(100) not null,
	tutor_email varchar(100) not null,
	children int(50) not null
);

	