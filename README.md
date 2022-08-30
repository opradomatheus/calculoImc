https://opradomatheus.github.io/kingimc/

//Valores do IMC

MENOR QUE 18,5	MAGREZA	0
ENTRE 18,5 E 24,9	NORMAL	0
ENTRE 25,0 E 29,9	SOBREPESO	I
ENTRE 30,0 E 39,9	OBESIDADE	II
MAIOR QUE 40,0	OBESIDADE GRAVE	III


//Instruções

Desenvolva uma aplicação que calcule o IMC de indivíduos. Para isso, você deve
elaborar uma tela que solicite e grave no banco de dados as informações necessárias para o
cálculo. Com base nestes dados sua aplicação deve calcular o IMC e exibir a classificação
do indivíduo na tela. Deverá ser exibido o histórico de todos os cálculos realizados, sendo
possível remover os registros da lista.
Atenção para os seguintes pontos:
- A aplicação deve ser, preferencialmente, desenvolvida em PHP;
- O banco de dados deve ser, preferencialmente, MySQL;
- Procure apresentar um código bem escrito tanto no front-end quanto no back-end;
- Formato de entrega da prova e da aplicação: um repositório git (no
http://www.github.com , https://gitlab.com ou https://bitbucket.org/ );
A entrega da prova deverá ser feita através de um arquivo PDF juntamente com os
arquivos da sua aplicação
- O projeto deve possuir um README (documentação simples) com instruções de
instalação e utilização, modelo do banco de dados, bem como quaisquer outras que
você achar necessário;


//Banco de dados utilizado

CREATE TABLE registros (
  idregistros INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  altura VARCHAR(25) NULL,
  peso VARCHAR(25) NULL,
  imc VARCHAR(25) NULL,
  PRIMARY KEY(idregistros)
);


