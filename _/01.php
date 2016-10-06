<?php
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); };
/* Criação do Banco de Cadastro */ $sql = 'create database if not exists `lightbook` default character set utf8 collate utf8_general_ci;'; if (mysqli_query($link, $sql)) { echo ""; } else { echo 'Erro criando o banco de dados: ' . mysqli_connect_error() . "\n"; }
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'lightbook'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }
/* Criação da Tabela Usuários */ $sql = 'create table if not exists lightbook ( id int not null auto_increment, usuario varchar(30), nome varchar(40), senha varchar(30), primary key(id)) default charset = utf8;'; if (mysqli_query($link, $sql)) { } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; }
/* Criação da Tabela de Salvos */ $sql = 'create table if not exists lights ( id int not null auto_increment, userid int not null, wall varchar(30), primary key(id), foreign key (userid) references lightbook(id)) default charset = utf8;'; if (mysqli_query($link, $sql)) { } else { echo 'Erro 2: ' . mysqli_connect_error() . "\n"; }

$result = mysqli_query($link, "select * from lightbook where usuario = 'Mestre';"); if (!$result) {}
while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['usuario'] == 'Mestre') {$estado = 1; } else { } }
if ($estado == 0) { $sql = "insert into lightbook (usuario, nome, senha) values ('Mestre', 'Super Mestre', 'mister_carter2121');"; if (mysqli_query($link, $sql)) { } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; } }
?>