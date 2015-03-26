CREATE TABLE member (
	id_member INT(11) auto_increment,
	name varchar(100),
	mail varchar(100),
	pass varchar(100),
	primary key (id_member));

insert into member (name,mail,pass) select 'Elodie', 'elodie.lemire@isen-lille.fr', 'Elo';
insert into member (name,mail,pass) select 'Alexandre', 'alexandre.mouquet@isen-lille.fr', 'Alex';
insert into member (name,mail,pass) select 'Vincent', 'vincent.bruneel@isen-lille.fr','Vinc';