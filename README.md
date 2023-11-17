# gestion-de-personnel-DataWare
les querie :
create database dataware_db;

create table equipe (
    equipe_id INT primary key AUTO_INCREMENT,
    equipe_nom VARCHAR(20) UNIQUE,
    date_de_creation_equipe DATETIME DEFAULT CURRENT_TIMESTAMP
);
select*from equipe;

insert into  equipe(equipe_nom)
values("dataware team");
select*from equipe;

update equipe
 set equipe_nom = "dataware techniciens"
 where equipe_id= 1;
select * from equipe;


create table personnel(personnel_id int primary key auto_increment, personnel_nom varchar(10),
 personnel_prénom varchar(15), 
 personnel_email char, personnel_telephone int,
 personnel_role varchar(10),
 equipe_id int,
 foreign key (equipe_id)  references equipe(equipe_id), 
 personnel_status varchar(15)
);
select*from personnel;

insert into personnel 
values(1, "kasbi" ,"mostapha", "mos@gmail.com", 0620553146, "technician", "worker", "dataware technicians" );