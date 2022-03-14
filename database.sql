create database Bookstore;
use Bookstore;

create table books(
    id int(11) auto_increament primary key,
    title varchar(100) not null,
    author varchar(30) not null,
    available varchar(20),
    pages int(11) not null,
    isbn int(30) not null

);
