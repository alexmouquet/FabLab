/* nom de la base : projetfablab */

CREATE TABLE member (
	id_member INT(11) auto_increment,
	name varchar(100),
	mail varchar(100),
	pass varchar(100),
	primary key (id_member));
	
insert into member (name,mail,pass) select 'vincent', 'vincent.bruneel@isen-lille.fr','vinc';
insert into member (name,mail,pass) select 'elodie', 'elodie.lemire@isen-lille.fr', 'elo';
insert into member (name,mail,pass) select 'alexandre', 'alexandre.mouquet@isen-lille.fr', 'alex';


CREATE TABLE project (
	id_project INT(11) auto_increment,
	title varchar(100),
	description varchar(255),
	machines varchar(100),
	primary key (id_project));

insert into project (title,description,machines) select 'Impression de balles de babyfoot', 'pour ce projet nous avons fait 2 balles de 5cm de rayon, cela nous a pris 3h en tout pour un cout de 10 euro', 'Imprimante 3D';