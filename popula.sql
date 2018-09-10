INSERT INTO Categoria (nome) VALUES ('Jardinagem'), ('Elétrica'), ('Hidráulica'), ('Pintura'), ('Alvenaria'), ('Mecânica'),
('Transporte'), ('Buffet'), ('Babá'), ('Faxina'), ('Outros');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES
('Túlio', 'Jardim', 'tuliojardim@visaojr.com.br', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31993511055', '35930081'),
('Tulinho', 'Gameplays', 'tuliosjardim@gmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31954217584', '35900000');
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao) VALUES
(1, 11, 'Título', 'Coiso');