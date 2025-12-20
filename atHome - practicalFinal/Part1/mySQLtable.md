SQL Schema:
	>create database data;

	>grant all privileges on part1_data.* to 'root'@'localhost'
	>identified by clauie;
	>flush privileges;

	>use data; 

	>create table searches (
		id int auto_increment primary key,
		query varchar(255),
		ip_addr varchar(45)
	); 

Credentials:
	$servername = "localhost";
	$username = "clauie";
	$password = "clauie"; 
	$dbname = "searches";