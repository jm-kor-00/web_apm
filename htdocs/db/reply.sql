create table reply (
   idx int(11) not null auto_increment,
   con_num int(11) not null,
   name varchar(100) not null,
   pw varchar(100) not null,
   content text not null, 
   date datetime,
   primary key(idx)
);