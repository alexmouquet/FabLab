CREATE TABLE member (
	id_member INT(11) auto_increment,
	name varchar(100),
	pass varchar(100),
	primary key (id_member));

insert into member (name,pass) select 'Elodie', 'Elo';
insert into member (name,pass) select 'Alexandre', 'Alex';
insert into member (name,pass) select 'Vincent', 'Vinc';