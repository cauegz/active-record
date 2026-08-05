-- =========================
-- FUNCIONÁRIOS
-- =========================

INSERT INTO funcionario (nome, salario, cpf)
VALUES
    ('Ana Souza', 3200.00, '11111111111'),
    ('Carlos Oliveira', 3800.00, '22222222222'),
    ('Mariana Lima', 4500.00, '33333333333');


-- =========================
-- USUÁRIOS
-- =========================

INSERT INTO usuario (nome, email, senha, cpf)
VALUES
    ('João Silva', 'joao@email.com', 'senha123', '44444444444'),
    ('Maria Santos', 'maria@email.com', 'senha123', '55555555555'),
    ('Pedro Costa', 'pedro@email.com', 'senha123', '66666666666'),
    ('Lucas Martins', 'lucas@email.com', 'senha123', '77777777777');


-- =========================
-- PRODUTOS
-- =========================

INSERT INTO produto (nome, preco, descricao)
VALUES
    ('Notebook', 3500.00, 'Notebook com 16 GB de memória RAM'),
    ('Mouse', 89.90, 'Mouse óptico sem fio'),
    ('Teclado', 159.90, 'Teclado mecânico'),
    ('Monitor', 1200.00, 'Monitor LED de 24 polegadas'),
    ('Headset', 249.90, 'Headset gamer com microfone'),
    ('Webcam', 199.90, 'Webcam Full HD');


-- =========================
-- VENDAS
-- =========================

INSERT INTO venda (data, valor, id_funcionario, id_usuario)
VALUES
(
    '2026-08-01 10:30:00',
    3589.90,
    (SELECT id FROM funcionario WHERE cpf = '11111111111'),
    (SELECT id FROM usuario WHERE cpf = '44444444444')
),
(
    '2026-08-02 14:15:00',
    1519.80,
    (SELECT id FROM funcionario WHERE cpf = '22222222222'),
    (SELECT id FROM usuario WHERE cpf = '55555555555')
),
(
    '2026-08-03 09:45:00',
    499.80,
    (SELECT id FROM funcionario WHERE cpf = '11111111111'),
    (SELECT id FROM usuario WHERE cpf = '66666666666')
),
(
    '2026-08-04 16:20:00',
    359.80,
    (SELECT id FROM funcionario WHERE cpf = '33333333333'),
    (SELECT id FROM usuario WHERE cpf = '77777777777')
);


-- =========================
-- PRODUTOS DAS VENDAS
-- =========================

-- Venda de João:
-- 1 Notebook + 1 Mouse = 3589,90

INSERT INTO produto_venda (
    preco_unitario,
    quantidade,
    id_produto,
    id_venda
)
VALUES
(
    3500.00,
    1,
    (SELECT id FROM produto WHERE nome = 'Notebook'),
    (
        SELECT id
        FROM venda
        WHERE data = '2026-08-01 10:30:00'
    )
),
(
    89.90,
    1,
    (SELECT id FROM produto WHERE nome = 'Mouse'),
    (
        SELECT id
        FROM venda
        WHERE data = '2026-08-01 10:30:00'
    )
);


-- Venda de Maria:
-- 1 Monitor + 2 Teclados = 1519,80

INSERT INTO produto_venda (
    preco_unitario,
    quantidade,
    id_produto,
    id_venda
)
VALUES
(
    1200.00,
    1,
    (SELECT id FROM produto WHERE nome = 'Monitor'),
    (
        SELECT id
        FROM venda
        WHERE data = '2026-08-02 14:15:00'
    )
),
(
    159.90,
    2,
    (SELECT id FROM produto WHERE nome = 'Teclado'),
    (
        SELECT id
        FROM venda
        WHERE data = '2026-08-02 14:15:00'
    )
);


-- Venda de Pedro:
-- 2 Headsets = 499,80

INSERT INTO produto_venda (
    preco_unitario,
    quantidade,
    id_produto,
    id_venda
)
VALUES
(
    249.90,
    2,
    (SELECT id FROM produto WHERE nome = 'Headset'),
    (
        SELECT id
        FROM venda
        WHERE data = '2026-08-03 09:45:00'
    )
);


-- Venda de Lucas:
-- 1 Webcam + 1 Teclado = 359,80

INSERT INTO produto_venda (
    preco_unitario,
    quantidade,
    id_produto,
    id_venda
)
VALUES
(
    199.90,
    1,
    (SELECT id FROM produto WHERE nome = 'Webcam'),
    (
        SELECT id
        FROM venda
        WHERE data = '2026-08-04 16:20:00'
    )
),
(
    159.90,
    1,
    (SELECT id FROM produto WHERE nome = 'Teclado'),
    (
        SELECT id
        FROM venda
        WHERE data = '2026-08-04 16:20:00'
    )
);


-- =========================
-- AVALIAÇÕES
-- =========================

INSERT INTO avaliacao (
    nota,
    comentario,
    id_usuario,
    id_funcionario
)
VALUES
(
    5,
    'Atendimento rápido e muito eficiente.',
    (SELECT id FROM usuario WHERE cpf = '44444444444'),
    (SELECT id FROM funcionario WHERE cpf = '11111111111')
),
(
    4,
    'Bom atendimento, mas houve uma pequena demora.',
    (SELECT id FROM usuario WHERE cpf = '55555555555'),
    (SELECT id FROM funcionario WHERE cpf = '22222222222')
),
(
    5,
    'Funcionário muito atencioso e prestativo.',
    (SELECT id FROM usuario WHERE cpf = '66666666666'),
    (SELECT id FROM funcionario WHERE cpf = '11111111111')
),
(
    3,
    'O atendimento foi razoável.',
    (SELECT id FROM usuario WHERE cpf = '77777777777'),
    (SELECT id FROM funcionario WHERE cpf = '33333333333')
);