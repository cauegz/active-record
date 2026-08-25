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
    nome             VARCHAR(100),
    cpf              CHAR(11)      NOT NULL UNIQUE,
    salario          DECIMAL(10,2),
    PRIMARY KEY (id)
);

CREATE TABLE servicos
(
    id          INT          NOT NULL GENERATED ALWAYS AS IDENTITY,
    nome        VARCHAR(100) NOT NULL,
    preco       DECIMAL(10,2) NOT NULL,
    duracao_min INT,
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
        REFERENCES usuario (id)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

ALTER TABLE agendamento_servicos
    ADD CONSTRAINT FK_servicos_TO_agendamento_servicos
        FOREIGN KEY (id_servico)
        REFERENCES servicos (id)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

ALTER TABLE agendamento_servicos
    ADD CONSTRAINT FK_agendamento_TO_agendamento_servicos
        FOREIGN KEY (id_agendamento)
        REFERENCES agendamento (id)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

ALTER TABLE funcionario
    ADD CONSTRAINT FK_especialidade_TO_funcionario
        FOREIGN KEY (id_especialidade)
        REFERENCES especialidade (id)
        ON DELETE CASCADE
        ON UPDATE CASCADE;