CREATE DATABASE colabora;
USE colabora;


CREATE TABLE `usuario_cadastro_basico`
(
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `dt_nasc` date NOT NULL,
  `genero` varchar(2) NOT NULL,
  `estado` varchar(2) NOT NULL
);

INSERT INTO `usuario_cadastro_basico`(`nome`, `email`, `senha`, `dt_nasc`, `genero`, `estado`) VALUES ('Jorzias Veras','jorzias_veras@colabora.com.br',(md5(123)),'1991-01-28','M','SP');
INSERT INTO `usuario_cadastro_basico`(`nome`, `email`, `senha`, `dt_nasc`, `genero`, `estado`) VALUES ('Adriana Diniz','adriana_diniz@colabora.com.br',(md5(123)),'1991-02-15','F','SP');
INSERT INTO `usuario_cadastro_basico`(`nome`, `email`, `senha`, `dt_nasc`, `genero`, `estado`) VALUES ('Clayton Pereira','clayton_pereira@colabora.com.br',(md5(123)),'1988-06-09','M','SP');
INSERT INTO `usuario_cadastro_basico`(`nome`, `email`, `senha`, `dt_nasc`, `genero`, `estado`) VALUES ('Anna Fragoso','anna_fragoso@colabora.com.br',(md5(123)),'1991-07-23','F','SP'); 
INSERT INTO `usuario_cadastro_basico`(`nome`, `email`, `senha`, `dt_nasc`, `genero`, `estado`) VALUES ('Tatiane carlos','tatiane_carlos@colabora.com.br',(md5(123)),'1989-12-25','F','SP');
INSERT INTO `usuario_cadastro_basico`(`nome`, `email`, `senha`, `dt_nasc`, `genero`, `estado`) VALUES ('Alexandre Fidalgo','alexandre_fidalgo@colabora.com.br',(md5(123)),'1985-08-11','M','SP');

CREATE TABLE `usuario_foto`
(
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `usuario_cadastro_basico_id` int,
  `foto` blob
);

CREATE TABLE `usuario_interesse`
(
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `interesse` varchar(30) NOT NULL
);

INSERT INTO `usuario_interesse`(`interesse`) VALUES ('cidadania');
INSERT INTO `usuario_interesse`(`interesse`) VALUES ('educação');
INSERT INTO `usuario_interesse`(`interesse`) VALUES ('esporte');
INSERT INTO `usuario_interesse`(`interesse`) VALUES ('saúde');
INSERT INTO `usuario_interesse`(`interesse`) VALUES ('cultura');
INSERT INTO `usuario_interesse`(`interesse`) VALUES ('ação social');
INSERT INTO `usuario_interesse`(`interesse`) VALUES ('idiomas');
INSERT INTO `usuario_interesse`(`interesse`) VALUES ('outros');

CREATE TABLE `interesseXusuario_cadastro_basico`
(
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `usuario_cadastro_basico_id` int,
  `interesse_id` int
);

INSERT INTO `interesseXusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `interesse_id`) VALUES (1,1);
INSERT INTO `interesseXusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `interesse_id`) VALUES (2,2);
INSERT INTO `interesseXusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `interesse_id`) VALUES (3,3);
INSERT INTO `interesseXusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `interesse_id`) VALUES (4,4);
INSERT INTO `interesseXusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `interesse_id`) VALUES (5,5);
INSERT INTO `interesseXusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `interesse_id`) VALUES (2,6);
INSERT INTO `interesseXusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `interesse_id`) VALUES (6,7);
INSERT INTO `interesseXusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `interesse_id`) VALUES (6,8);


CREATE TABLE `usuario_quem_sou`
(
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `usuario_cadastro_basico_id` int,
  `quem_sou` varchar(280) NULL
);

INSERT INTO `usuario_quem_sou`(`usuario_cadastro_basico_id`, `quem_sou`) VALUES (1,'Quando eu me pergunto quem sou eu, sou o que pergunta ou o que não sabe a resposta?');
INSERT INTO `usuario_quem_sou`(`usuario_cadastro_basico_id`, `quem_sou`) VALUES (2,'Aí eu fico pensando, que isso não está bem.As pessoas são quem são, ou são o que elas têm?');
INSERT INTO `usuario_quem_sou`(`usuario_cadastro_basico_id`, `quem_sou`) VALUES (3,'Porque eu não sou o que visto. Eu sou do jeito que estou! Não sou também o que eu tenho. Eu sou mesmo quem eu sou!');
INSERT INTO `usuario_quem_sou`(`usuario_cadastro_basico_id`, `quem_sou`) VALUES (4,'Quando eu me pergunto quem sou eu, sou o que pergunta ou o que não sabe a resposta?');
INSERT INTO `usuario_quem_sou`(`usuario_cadastro_basico_id`, `quem_sou`) VALUES (5,'Quem sou eu? Quando não temos nada de prático nos atazanando a vida, a preocupação passa a ser existencial. Pouco importa de onde viemos e para onde vamos, mas quem somos é crucial descobrir.');
INSERT INTO `usuario_quem_sou`(`usuario_cadastro_basico_id`, `quem_sou`) VALUES (6,'Eu... eu... nem eu mesmo sei, nesse momento... eu... enfim, sei quem eu era, quando me levantei hoje de manhã, mas acho que já me transformei várias vezes desde então');

CREATE TABLE `usuario_experiencia_de_vida`
(
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `usuario_cadastro_basico_id` int,
  `educacao` varchar(280) NULL,
  `experiencia_profissional` varchar(280) NULL
);

INSERT INTO `usuario_experiencia_de_vida`(`usuario_cadastro_basico_id`, `educacao`, `experiencia_profissional`) VALUES (6,'Quando eu me pergunto quem sou eu, sou o que pergunta ou o que não sabe a resposta?','É o fundador e CEO da Amazon.com, gigante transnacional do comércio eletrônico e um dos maiores empreendedores do mundo.');
INSERT INTO `usuario_experiencia_de_vida`(`usuario_cadastro_basico_id`, `educacao`, `experiencia_profissional`) VALUES (5,'Aí eu fico pensando, que isso não está bem.As pessoas são quem são, ou são o que elas têm?', 'Apesar da formação em TI, como programadora, resolveu apostar em uma área completamente diferente, a gastronomia. mudou para a França com o marido, começou a gravar vídeos com receitas diversas. Seu site se tornou a maior página gastronômica do Brasil.');
INSERT INTO `usuario_experiencia_de_vida`(`usuario_cadastro_basico_id`, `educacao`, `experiencia_profissional`) VALUES (4,'Porque eu não sou o que visto. Eu sou do jeito que estou! Não sou também o que eu tenho. Eu sou mesmo quem eu sou!', 'Atua sob o nome artístico de Anitta, é uma das mulheres empreendedoras de sucesso. Ela conseguiu aproveitar com sabedoria as oportunidades que teve. É sucesso no país, e destaque internacional.');
INSERT INTO `usuario_experiencia_de_vida`(`usuario_cadastro_basico_id`, `educacao`, `experiencia_profissional`) VALUES (3,'Quando eu me pergunto quem sou eu, sou o que pergunta ou o que não sabe a resposta?', 'Uma das figuras mais famosas do mundo de tecnologia. Claytão ganhou projeção mundial como fundador da Microsoft, uma das gigantes do setor de tecnologia mundial e responsável pelo lançamento do sistema operacional Windows.');
INSERT INTO `usuario_experiencia_de_vida`(`usuario_cadastro_basico_id`, `educacao`, `experiencia_profissional`) VALUES (2,'Quem sou eu? Quando não temos nada de prático nos atazanando a vida, a preocupação passa a ser existencial. Pouco importa de onde viemos e para onde vamos, mas quem somos é crucial descobrir.', 'Lançou o canal e blog Me Poupe!.
Trata-se de uma das maiores plataformas de educação financeira do país. Com o objetivo de tirar os brasileiros da inércia financeira, o canal oferece conteúdos completos e gratuitos, que podem ser acessados pela internet.');
INSERT INTO `usuario_experiencia_de_vida`(`usuario_cadastro_basico_id`, `educacao`, `experiencia_profissional`) VALUES (1,'Eu... eu... nem eu mesmo sei, nesse momento... eu... enfim, sei quem eu era, quando me levantei hoje de manhã, mas acho que já me transformei várias vezes desde então', 'É um médico psiquiatra, professor e escritor brasileiro, famoso pelos seus livros na área de psicologia. É o autor da Teoria da Inteligência Multifocal.');

CREATE TABLE `usuario_habilidade`
(
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `habilidade` varchar(50) NOT NULL
);

INSERT INTO `usuario_habilidade`(`habilidade`) VALUES ('esporte');
INSERT INTO `usuario_habilidade`(`habilidade`) VALUES ('comuncação e marketing');
INSERT INTO `usuario_habilidade`(`habilidade`) VALUES ('cozinha');
INSERT INTO `usuario_habilidade`(`habilidade`) VALUES ('educação');
INSERT INTO `usuario_habilidade`(`habilidade`) VALUES ('desenvolvimento web');
INSERT INTO `usuario_habilidade`(`habilidade`) VALUES ('reformas');
INSERT INTO `usuario_habilidade`(`habilidade`) VALUES ('decoração');
INSERT INTO `usuario_habilidade`(`habilidade`) VALUES ('trabalho comunitário');
INSERT INTO `usuario_habilidade`(`habilidade`) VALUES ('outros');

CREATE TABLE `habilidadeXusuario_cadastro_basico`
(
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `usuario_cadastro_basico_id` int,
  `habilidade_id` int,
  `nivel` varchar(30) NOT NULL
);

INSERT INTO `habilidadexusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `habilidade_id`, `nivel`) VALUES (1,5,'Expert');
INSERT INTO `habilidadexusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `habilidade_id`, `nivel`) VALUES (2,7,'Expert');
INSERT INTO `habilidadexusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `habilidade_id`, `nivel`) VALUES (6,1,'Expert');
INSERT INTO `habilidadexusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `habilidade_id`, `nivel`) VALUES (6,3,'Expert');
INSERT INTO `habilidadexusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `habilidade_id`, `nivel`) VALUES (6,2,'Expert');
INSERT INTO `habilidadexusuario_cadastro_basico`(`usuario_cadastro_basico_id`, `habilidade_id`, `nivel`) VALUES (6,4,'Expert');

CREATE TABLE `projeto_categoria`
(
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(30) NOT NULL
);

INSERT INTO `projeto_categoria`(`nome_categoria`) VALUES ('esporte');
INSERT INTO `projeto_categoria`(`nome_categoria`) VALUES ('comunicação e marketing');
INSERT INTO `projeto_categoria`(`nome_categoria`) VALUES ('cozinha');
INSERT INTO `projeto_categoria`(`nome_categoria`) VALUES ('educação');
INSERT INTO `projeto_categoria`(`nome_categoria`) VALUES ('desenvolvimento web');
INSERT INTO `projeto_categoria`(`nome_categoria`) VALUES ('reformas');
INSERT INTO `projeto_categoria`(`nome_categoria`) VALUES ('decoração');
INSERT INTO `projeto_categoria`(`nome_categoria`) VALUES ('trabalho comunitário');


CREATE TABLE `projeto`
(
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `usuario_cadastro_basico_id` int,
  `categoria_id` int,
  `nome_projeto` varchar(50) NOT NULL,
  `foto_projeto` blob NULL,
  `descricao` varchar(600) NOT NULL,
  `data` datetime default current_timestamp
);

INSERT INTO `projeto`(`usuario_cadastro_basico_id`, `categoria_id`,`nome_projeto`,`descricao`) VALUES (1,7,'colabora', 'Criação de uma plataforma digital de gerenciamento de voluntariado');
INSERT INTO `projeto`(`usuario_cadastro_basico_id`, `categoria_id`,`nome_projeto`,`descricao`) VALUES (4,1,'reforma da brinquedoteca', 'Reforma da brinquedoteca do orfanato Raio de luz');
INSERT INTO `projeto`(`usuario_cadastro_basico_id`, `categoria_id`,`nome_projeto`,`descricao`) VALUES (6,2,'comida para moradores de rua', 'Distribuição de alimento para pessoas em situação de rua');
INSERT INTO `projeto`(`usuario_cadastro_basico_id`, `categoria_id`,`nome_projeto`,`descricao`) VALUES (2,6,'aulas de TI', 'Aula de TI para crianças carentes');
INSERT INTO `projeto`(`usuario_cadastro_basico_id`, `categoria_id`,`nome_projeto`,`descricao`) VALUES (5,8,'congresso de adolescentes', 'Ajuda na organização de um congresso de adolescentes na igreja');
INSERT INTO `projeto`(`usuario_cadastro_basico_id`, `categoria_id`,`nome_projeto`,`descricao`) VALUES (3,1,'aulas de inglês', 'Aula de inglês para jovens carentes');


ALTER TABLE `usuario_foto` ADD FOREIGN KEY (`usuario_cadastro_basico_id`) REFERENCES `usuario_cadastro_basico` (`id`);

ALTER TABLE `usuario_quem_sou` ADD FOREIGN KEY (`usuario_cadastro_basico_id`) REFERENCES `usuario_cadastro_basico` (`id`);

ALTER TABLE `usuario_experiencia_de_vida` ADD FOREIGN KEY (`usuario_cadastro_basico_id`) REFERENCES `usuario_cadastro_basico` (`id`);

ALTER TABLE `habilidadeXusuario_cadastro_basico` ADD FOREIGN KEY (`habilidade_id`) REFERENCES `usuario_habilidade` (`id`);
ALTER TABLE `habilidadeXusuario_cadastro_basico` ADD FOREIGN KEY (`usuario_cadastro_basico_id`) REFERENCES `usuario_cadastro_basico` (`id`);

ALTER TABLE `projeto` ADD FOREIGN KEY (`usuario_cadastro_basico_id`) REFERENCES `usuario_cadastro_basico` (`id`);
ALTER TABLE `projeto` ADD FOREIGN KEY (`categoria_id`) REFERENCES `projeto_categoria` (`id`);

ALTER TABLE `interesseXusuario_cadastro_basico` ADD FOREIGN KEY (`interesse_id`) REFERENCES `usuario_interesse` (`id`);
ALTER TABLE `interesseXusuario_cadastro_basico` ADD FOREIGN KEY (`usuario_cadastro_basico_id`) REFERENCES `usuario_cadastro_basico` (`id`);
