create database if not exists jp default charset utf8 COLLATE utf8_general_ci;

use jp;

create table if not exists `users` (
    `id` int not null auto_increment,
    primary key (`id`),
    `name` varchar(40) not null,
    `email` varchar(40) not null,
    unique (`email`),
    `pass` varchar(40) not null,
    `salt` varchar(40) not null,
    `mobile` varchar(100) not null,
    `iter` int not null
);

