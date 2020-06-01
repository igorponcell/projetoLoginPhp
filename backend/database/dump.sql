-- criar a base de dados
CREATE DATABASE login;

-- usar a basae
USE login;

-- criação da tabela de users
CREATE TABLE `login`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `age` INT NOT NULL,
  `mail` VARCHAR(50) NOT NULL,
  `login` VARCHAR(20) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`user_id`));

-- insert de um usuario default para testar o banco
-- md5 da senha 'e10adc3949ba59abbe56e057f20f883e'
INSERT INTO `user` (`name`, `age`,`mail`,`login`, `password`)
    VALUES ('Igor Poncell','22', 'igorponcell@gmail.com', 'igorponcell', md5('123456'));