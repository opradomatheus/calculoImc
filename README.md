<h1>King Imc</h1>

Requisitos para executar o projeto:

- VScode com a extensão PHP server instalada;
- Xampp.

Fazer a criação do banco de dados e da tabela que será utilizada:

Nome do banco de dados: kingimc

Script para a criação das tabelas

CREATE TABLE registros (
  idregistros INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  altura VARCHAR(25) NULL,
  peso VARCHAR(25) NULL,
  imc VARCHAR(25) NULL,
  PRIMARY KEY(idregistros)
);

Para executar o projeto basta abrir o arquivo index.php e utilizar a extensão PHP Sever clicando com o botão direito no código para executar.



