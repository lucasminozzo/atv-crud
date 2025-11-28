CREATE TABLE usuarios(
  id int AUTO_INCREMENT NOT NULL,
  nome VARCHAR(100) NOT NULL,
  CONSTRAINT pk_usuarios PRIMARY KEY (id)
);
INSERT INTO usuarios (nome) VALUES ('Ana Silva');
INSERT INTO usuarios (nome) VALUES ('Bruno Souza');
INSERT INTO usuarios (nome) VALUES ('Carla Mendes');

CREATE TABLE projetos(
  id int AUTO_INCREMENT NOT NULL,
  nome VARCHAR(100) NOT NULL,
  CONSTRAINT pk_projetos PRIMARY KEY (id)
);
INSERT INTO projetos (nome) VALUES ('Projeto Alpha');
INSERT INTO projetos (nome) VALUES ('Projeto Beta');
INSERT INTO projetos (nome) VALUES ('Projeto Gamma');

CREATE TABLE tarefas(
  id int AUTO_INCREMENT NOT NULL,
  titulo VARCHAR(100) NOT NULL,
  descricao TEXT,
  status varchar(1) NOT NULL, -- 'C' para concluído, 'P' para pendente, 'A' EM ANDAMENTO 
  id_projeto int NOT NULL,
  id_usuario  int NOT NULL,
  CONSTRAINT pk_tarefas PRIMARY KEY (id)
);
ALTER TABLE tarefas ADD CONSTRAINT fk_projeto FOREIGN KEY (id_projeto) REFERENCES projetos (id);
ALTER TABLE tarefas ADD CONSTRAINT fk_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios (id);

INSERT INTO tarefas (titulo, descricao, status, id_projeto, id_usuario) VALUES 
('Configurar Banco de Dados', 'Criar tabelas e relacionamentos.', 'C', 1, 3), 
('Desenvolver Layout Inicial', 'Criar a estrutura básica do HTML/CSS.', 'A', 1, 4), 
('Revisar Documentação', 'Verificar requisitos de segurança.', 'P', 2, 5); 


/* Projeto Alpha, Ana Silva (Concluído) */
/* Projeto Alpha, Bruno Souza (Em Andamento) */
/* Projeto Beta, Carla Mendes (Pendente) */

