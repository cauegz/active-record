
CREATE TABLE agendamento
(
  id             INT       NOT NULL GENERATED ALWAYS AS IDENTITY,
  id_funcionario INT       NOT NULL,
  id_usuario     INT       NOT NULL,
  infantil       BOOLEAN   NOT NULL DEFAULT false,
  horario        TIMESTAMP NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE agendamento_servicos
(
  id             INT NOT NULL GENERATED ALWAYS AS IDENTITY,
  id_servico     INT NOT NULL,
  id_agendamento INT NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE especialidade
(
  id   INT          NOT NULL GENERATED ALWAYS AS IDENTITY,
  nome VARCHAR(100) NOT NULL UNIQUE,
  PRIMARY KEY (id)
);

CREATE TABLE funcionario
(
  id               INT           NOT NULL GENERATED ALWAYS AS IDENTITY,
  id_especialidade INT           NOT NULL,
  nome             VARCHAR(100) ,
  cpf              CHAR(11)      NOT NULL UNIQUE,
  salario          DECIMAL(10,2),
  PRIMARY KEY (id)
);

CREATE TABLE servicos
(
  id          INT           NOT NULL GENERATED ALWAYS AS IDENTITY,
  nome        VARCHAR(100)  NOT NULL,
  preco       DECIMAL(10,2) NOT NULL,
  duracao_min INT          ,
  PRIMARY KEY (id)
);

CREATE TABLE usuario
(
  id       INT          NOT NULL GENERATED ALWAYS AS IDENTITY,
  nome     VARCHAR(100),
  email    VARCHAR(200) NOT NULL UNIQUE,
  telefone CHAR(13)     UNIQUE,
  senha    VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

ALTER TABLE agendamento
  ADD CONSTRAINT FK_funcionario_TO_agendamento
    FOREIGN KEY (id_funcionario)
    REFERENCES funcionario (id);

ALTER TABLE agendamento
  ADD CONSTRAINT FK_usuario_TO_agendamento
    FOREIGN KEY (id_usuario)
    ON DELETE CASCADE
    ON UPDATE CASCADE
    REFERENCES usuario (id);

ALTER TABLE agendamento_servicos
  ADD CONSTRAINT FK_servicos_TO_agendamento_servicos
    FOREIGN KEY (id_servico)
    ON DELETE CASCADE
    ON UPDATE CASCADE
    REFERENCES servicos (id);

ALTER TABLE agendamento_servicos
  ADD CONSTRAINT FK_agendamento_TO_agendamento_servicos
    FOREIGN KEY (id_agendamento)
    ON DELETE CASCADE
    ON UPDATE CASCADE
    REFERENCES agendamento (id);

ALTER TABLE funcionario
  ADD CONSTRAINT FK_especialidade_TO_funcionario
    FOREIGN KEY (id_especialidade)
    ON DELETE CASCADE
    ON UPDATE CASCADE
    REFERENCES especialidade (id);
