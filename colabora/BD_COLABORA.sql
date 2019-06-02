CREATE DATABASE colabora;
USE colabora;

CREATE TABLE `usuario_cadastro_basico`
(
  `id` int UNIQUE PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `dt_nasc` date NOT NULL,
  `genero` varchar(2) NOT NULL,
  `estado` varchar(2) NOT NULL
);

CREATE TABLE `usuario_cadastro_complementar`
(
  `id` int UNIQUE PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `usuario_cadastro_basico_id` int,
  `foto` blob,
  `interesse` varchar(30) NOT NULL
  `interesse_2` varchar(30) NOT NULL
  `interesse_3` varchar(30) NOT NULL
);

CREATE TABLE `habilidadeXusuario_cadastro_complementar`
(
  `usuario_cadastro_complementar_id` int,
  `habilidade_id` int,
  `nivel` varchar(30) NOT NULL
);

CREATE TABLE `habilidade`
(
  `id` int UNIQUE PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `habilidade` varchar(50) NOT NULL
);

CREATE TABLE `projeto`
(
  `id` int UNIQUE PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `categoria_id` int,
  `usuario_cadastro_basico_id` int,
  `nome_projeto` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `atrativos` varchar(150) NOT NULL,
  `qtd_voluntario` int NOT NULL,
  `foto_projeto` blob
);

CREATE TABLE `categoria`
(
  `id` int UNIQUE PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(30) NOT NULL
);

ALTER TABLE `usuario_cadastro_complementar` ADD FOREIGN KEY (`usuario_cadastro_basico_id`) REFERENCES `usuario_cadastro_basico` (`id`);

ALTER TABLE `habilidadeXusuario_cadastro_complementar` ADD FOREIGN KEY (`habilidade_id`) REFERENCES `habilidade` (`id`);

ALTER TABLE `habilidadeXusuario_cadastro_complementar` ADD FOREIGN KEY (`usuario_cadastro_complementar_id`) REFERENCES `usuario_cadastro_complementar` (`id`);

ALTER TABLE `projeto` ADD FOREIGN KEY (`usuario_cadastro_basico_id`) REFERENCES `usuario_cadastro_basico` (`id`);

ALTER TABLE `projeto` ADD FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);
