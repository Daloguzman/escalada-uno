create database escalar;

create table usuario(
id_user  SMALLINT AUTO_INCREMENT NOT null COMMENT "id_unico de usuario",
nom_usu varchar(20) not null COMMENT " campo nombre de usuario",
ape_usu varchar(20) not null COMMENT " campo apellido de usuario",
cor_usu  varchar(80) not null COMMENT " campo nombre de usuario",
PRIMARY KEY(id_user)
)ENGINE=INNODB COMMENT "tabla usuario";



create table elemento(
id_elem  SMALLINT AUTO_INCREMENT NOT null COMMENT "id_unico de elemento",
nom_elem varchar(20) not null COMMENT " campo nombre de elemento",
peso integer(20) not null COMMENT " campo  de peso elemento",
unidPe  varchar(20) not null COMMENT "campo unidad de peso de elemento",
caloria integer(20)  not null COMMENT " campo  de calorias elemento",
id_user  SMALLINT  NOT null COMMENT "clave foranea id_unico de usuario",

PRIMARY KEY(id_elem),
CONSTRAINT FOREIGN KEY fk_suario(id_user) REFERENCES usuario(id_user)

)ENGINE=INNODB COMMENT "tabla elementos";