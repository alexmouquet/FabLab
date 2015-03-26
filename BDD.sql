CREATE TABLE member (
	id_member INT(11) auto_increment,
	name varchar(100),
	mail varchar(100),
	pass varchar(100),
	primary key (id_member));

insert into member (name,mail,pass) select 'Elodie', 'elodie.lemire@isen-lille.fr', 'Elo';
insert into member (name,mail,pass) select 'Alexandre', 'alexandre.mouquet@isen-lille.fr', 'Alex';
insert into member (name,mail,pass) select 'Vincent', 'vincent.bruneel@isen-lille.fr','Vinc';

CREATE TABLE project (
	id_project INT(11) auto_increment,
	title varchar(100),
	description varchar(255),
	machines varchar(100),
	primary key (id_project));

insert into project (title,description,machines) select 'Impression de balles de babyfoot', 'pour ce projet nous avons imprimé 2 balles de 5cm de diamètre', 'Imprimante 3D';