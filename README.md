FabLab
=========

FabLab is a website containing some informations about the Fabrication Laboratory of ISEN Lille and allowing the user to register.
Some parts of the website are hidden and only accessible when we are connected.
It's also possible to create "FabLab projects" and have access to them by using the menu.

*Project realized between Dec. 2014 and Jan. 2015 during my training as engineer*

Techs
-----------

* HTML5
* CSS3
* PHP
* SQL

Installation
-----------

1. Create a database (by default, name of the database used in the project: `projetfablab`).

2. Execute this SQL code to create tables in your database (also available in `sql/BDD.sql` file):

```bash
CREATE TABLE member (
	id_member INT(11) auto_increment,
	name varchar(100),
	mail varchar(100),
	pass varchar(100),
	primary key (id_member));
	
insert into member (name,mail,pass) select 'pseudotest', 'mailtest@test.com','passtest';


CREATE TABLE project (
	id_project INT(11) auto_increment,
	title varchar(100),
	description varchar(255),
	machines varchar(100),
	primary key (id_project));

insert into project (title,description,machines) select 'Impression de balles de babyfoot', 'pour ce projet nous avons fait 2 balles de 5cm de rayon, cela nous a pris 3h en tout pour un cout de 10 euro', 'Imprimante 3D';
```

3. Modify, if needed, this code corresponding to the database connection in `session.php` file:

```bash
$bdd = new PDO('mysql:host=localhost;dbname=projetfablab', 'root', '');
```


