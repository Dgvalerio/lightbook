create database cadastro
default character set utf8
default collate utf8_general_ci;
drop database cadastro;
use cadastro;

create table pessoas (
	id int not null auto_increment,
	nome varchar(30),
    nascimento date,
    sexo enum('M', 'F'),
    peso decimal(5,2),
    altura decimal(3,2),
    nacionaliade varchar(20) default 'Brasil',
    primary key(id)
) default charset = utf8;
create table if not exists cursos (
	nome varchar(30) not null unique,
    descricao text,
    carga int unsigned,
    totaulas int unsigned,
    ano year default '2016'
) default charset = utf8;
create table gafanhoto_assite_curso (
	id int not null auto_increment,
    data date,
    idgafanhoto int,
    idcurso int,
    primary key (id),
    foreign key (idcurso) references cursos(id),
    foreign key (idgafanhoto) references gafanhotos(id)
) default charset = utf8;
drop table pessoas;
drop table if exists pessoas;

describe pessoas;
desc pessoas;
select * from pessoas;

insert into pessoas (nome, nascimento, sexo, peso, altura, nacionaliade) values
('Maria', '1999-12-30', 'F', '55.2', '1.65', 'Portugal');

insert into pessoas (id, nome, nascimento, sexo, peso, altura, nacionaliade) values
(DEFAULT, 'Creuza', '1920-12-30', 'F', '50.2', '1.65', DEFAULT);

insert into pessoas values
(DEFAULT, 'Adalgiza', '1930-11-02', 'F', '63.2', '1.75', 'Irlanda');

insert into pessoas
(id, nome, nascimento, sexo, peso, altura, nacionaliade)
values
(DEFAULT, 'Ana', '1975-12-22', 'F', '52.3', '1.45', 'EUA'),
(default, 'Pedro', '2000-07-15', 'M', '52.3', '1.45', 'Brasil'),
(default, 'Maria', '1999-05-30', 'F', '75.9', '1.70', 'Portugual');

alter table pessoas
add codigo int first;

alter table pessoas
add column profissao varchar(10) after nome;

alter table pessoas
modify column profissao varchar(20) not null default '';

alter table cursos
add primary key(idcurso);

alter table pessoas
drop column profissao;

alter table gafanhotos
add column cursopreferido int;

alter table gafanhotos
add foreign key (cursopreferido)
references cursos(idcurso);

update cursos
set nome = 'PHP', ano = '2015'
where idcurso = '4';

update cursos
set nome = 'Java', carga= '40', ano = '2015'
where idcurso = '5'
limit 1;

update cursos
set nome = 'HTML5'
where idcurso = '1';

update cursos
set nome = 'PHP', ano = '2015'
where idcurso = '4';

update cursos
set nome = 'Java', carga= '40', ano = '2015'
where idcurso = '5'
limit 1;

update gafanhotos set cursopreferido = '6'
where id = '1';

delete from cursos
where idcurso = '8';

delete from cursos
where ano = '2018'
limit 3;

delete from cursos
where ano = '2018'
limit 3;

truncate table cursos;
truncate cursos;

DELETE FROM `cadastro`.`pessoas` WHERE `id`='3';

select * from cursos
order by nome;

select * from cursos
order by nome desc;

select nome, carga, ano from cursos
order by nome;

select ano, nome, carga from cursos
order by ano, nome;

select * from cursos
where ano = '2016'
order by nome;

select nome, descricao from cursos
where ano <= 2015
order by ano, nome;

select nome, descricao, ano from cursos
where ano > 2016
order by ano, nome;

select nome, ano from cursos
where ano between 2014 and 2016
order by nome desc, ano asc;

select nome, descricao, ano from cursos
where ano in (2014, 2016, 2020)
order by ano;

select * from cursos
where carga > 35 and totaulas < 30
order by nome;

select * from cursos
where carga > 35 or totaulas < 30
order by nome;

select * from cursos
where nome = "HTML5";

select * from cursos
where nome like "P%";
select * from cursos
where nome like "p%";

select * from cursos
where nome like "%a";

select * from cursos
where nome like "%a%";

select * from cursos
where nome not like "%a%";

select * from cursos
where nome like "PH%P";

select * from cursos
where nome like "PH%P_";

select * from cursos
where nome like "P_P%";

select * from cursos
where nome like "P__T%";

select * from gafanhotos
where nome like "%silva%";

select * from gafanhotos
where nome like "% silva%";

select * from gafanhotos
where nome like "%silva";

select distinct nacionalidade from gafanhotos
order by nacionalidade;

select count(*) from cursos;

select count(*) from cursos where carga > 40;

select count(nome) from cursos;

select * from cursos order by carga;

select max(carga) from cursos;

select max(totaulas) from cursos where ano = 2016;

select min(totaulas) from cursos where ano = 2016;

select nome, min(totaulas) from cursos where ano = 2016;

select * from cursos where ano = 2016;

select sum(totaulas) from cursos where ano = 2016;

select avg(totaulas) from cursos where ano = 2016;

select totaulas from cursos
order by totaulas;

select distinct totaulas from cursos
order by totaulas;

select totaulas, count(*) from cursos
group by totaulas
order by totaulas;

select carga, count(*) from cursos where totaulas = '30'
group by carga;

select * from cursos where totaulas = '30';

select ano, count(*) from cursos 
group by ano
order by count(*);

select ano, count(*) from cursos 
group by ano
order by count(*) desc;

select ano, count(*) from cursos 
group by ano
having count(*) >= 5
order by count(*) desc;

select ano, count(*) from cursos 
where totaulas > 30
group by ano
having ano > 2013
order by count(*) desc;

select avg(carga) from cursos;

select carga, count(*) from cursos 
where ano > 2015 
group by carga
having carga > (select avg(carga) from cursos);

select * from gafanhotos;
select * from cursos;

select nome, cursopreferido from gafanhotos;

select nome, ano from cursos;

select gafanhotos.nome, gafanhotos.cursopreferido, cursos.nome, cursos.ano 
from gafanhotos join cursos
on cursos.idcurso = gafanhotos.cursopreferido;

select g.nome, g.cursopreferido, c.nome, c.ano 
from gafanhotos as g inner join cursos as c
on c.idcurso = g.cursopreferido;

select g.nome, c.nome, c.ano 
from gafanhotos as g left outer join cursos as c
on c.idcurso = g.cursopreferido;

select g.nome, c.nome, c.ano 
from gafanhotos as g right outer join cursos as c
on c.idcurso = g.cursopreferido;

select * from gafanhoto_assite_curso;

select g.nome, c.nome from gafanhotos g 
join gafanhoto_assite_curso a
on g.id = a.idgafanhoto
join cursos c
on c.idcurso = a.idcurso
order by g.nome;