
CREATE TABLE avaliacao
(
  id             INT          NOT NULL GENERATED ALWAYS AS IDENTITY,
  nota           INT         ,
  comentario     VARCHAR(255),
  id_usuario     INT          NOT NULL,
  id_funcionario INT          NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE funcionario
(
  id      INT           NOT NULL GENERATED ALWAYS AS IDENTITY,
  nome    VARCHAR(100) ,
  salario DECIMAL(10,2),
  cpf     CHAR(11)      NOT NULL UNIQUE,
  PRIMARY KEY (id)
);

CREATE TABLE produto
(
  id        INT           NOT NULL GENERATED ALWAYS AS IDENTITY,
  nome      VARCHAR(100)  NOT NULL,
  preco     DECIMAL(10,2) NOT NULL,
  descricao VARCHAR(255) ,
  PRIMARY KEY (id)
);

CREATE TABLE produto_venda
(
  id             INT           NOT NULL GENERATED ALWAYS AS IDENTITY,
  preco_unitario DECIMAL(10,2) NOT NULL,
  quantidade     INT           NOT NULL,
  id_produto     INT           NOT NULL,
  id_venda       INT           NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE usuario
(
  id    INT          NOT NULL GENERATED ALWAYS AS IDENTITY,
  nome  VARCHAR(100),
  email VARCHAR(100),
  senha VARCHAR(255),
  cpf   CHAR(11)     UNIQUE,
  PRIMARY KEY (id)
);

COMMENT ON TABLE usuario IS 'cliente';

CREATE TABLE venda
(
  id             INT           NOT NULL GENERATED ALWAYS AS IDENTITY,
  data           TIMESTAMP     NOT NULL,
  valor          DECIMAL(10,2),
  id_funcionario INT           NOT NULL,
  id_usuario     INT           NOT NULL,
  PRIMARY KEY (id)
);

ALTER TABLE produto_venda
  ADD CONSTRAINT FK_produto_TO_produto_venda
    FOREIGN KEY (id_produto)
    REFERENCES produto (id);

ALTER TABLE produto_venda
  ADD CONSTRAINT FK_venda_TO_produto_venda
    FOREIGN KEY (id_venda)
    REFERENCES venda (id);

ALTER TABLE venda
  ADD CONSTRAINT FK_funcionario_TO_venda
    FOREIGN KEY (id_funcionario)
    REFERENCES funcionario (id);

ALTER TABLE venda
  ADD CONSTRAINT FK_usuario_TO_venda
    FOREIGN KEY (id_usuario)
    REFERENCES usuario (id);

ALTER TABLE avaliacao
  ADD CONSTRAINT FK_usuario_TO_avaliacao
    FOREIGN KEY (id_usuario)
    REFERENCES usuario (id);

ALTER TABLE avaliacao
  ADD CONSTRAINT FK_funcionario_TO_avaliacao
    FOREIGN KEY (id_funcionario)
    REFERENCES funcionario (id);
