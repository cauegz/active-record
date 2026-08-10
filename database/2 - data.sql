-- ESPECIALIDADES
INSERT INTO especialidade (nome) VALUES
('Cabeleireiro'),
('Barbeiro'),
('Manicure'),
('Esteticista');


-- FUNCIONÁRIOS
INSERT INTO funcionario (id_especialidade, nome, cpf, salario) VALUES
(1, 'Carlos Silva', '12345678901', 2500.00),
(2, 'João Pereira', '98765432100', 2300.00),
(3, 'Mariana Souza', '45678912300', 2200.00),
(4, 'Fernanda Lima', '78912345600', 2800.00);


-- USUÁRIOS
INSERT INTO usuario (nome, email, telefone, senha) VALUES
('Lucas Oliveira', 'lucas@email.com', '5199999999999', 'senha123'),
('Ana Costa', 'ana@email.com', '5198888888888', 'senha456'),
('Pedro Santos', 'pedro@email.com', '5197777777777', 'senha789'),
('Julia Martins', 'julia@email.com', '5196666666666', 'senha321');


-- SERVIÇOS
INSERT INTO servicos (nome, preco, duracao_min) VALUES
('Corte de cabelo', 50.00, 40),
('Corte infantil', 40.00, 30),
('Barba', 35.00, 30),
('Manicure', 45.00, 50),
('Limpeza de pele', 120.00, 60),
('Pintura de cabelo', 150.00, 90);


-- AGENDAMENTOS
INSERT INTO agendamento 
(id_funcionario, id_usuario, infantil, horario) VALUES
(1, 1, false, '2026-08-12 09:00:00'),
(2, 2, false, '2026-08-12 10:30:00'),
(1, 3, true,  '2026-08-12 14:00:00'),
(3, 4, false, '2026-08-13 09:30:00'),
(4, 1, false, '2026-08-13 15:00:00');


-- SERVIÇOS DE CADA AGENDAMENTO
INSERT INTO agendamento_servicos (id_servico, id_agendamento) VALUES
-- Agendamento 1: corte + barba
(1, 1),
(3, 1),

-- Agendamento 2: barba
(3, 2),

-- Agendamento 3: corte infantil
(2, 3),

-- Agendamento 4: manicure
(4, 4),

-- Agendamento 5: limpeza de pele
(5, 5);