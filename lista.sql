create database todo2;

use todo2;

create table task (
    id int primary key auto_increment,
    description text not null
);

insert into task (description) values ('Test task');
insert into task (description) values ('Another test task');