INSERT INTO Categoria (nome) VALUES ('Jardinagem'), ('Elétrica'), ('Hidráulica'), ('Pintura'), ('Alvenaria'), ('Mecânica'),
('Transporte'), ('Buffet'), ('Babá'), ('Faxina'), ('Outros');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES
('Túlio', 'Jardim', 'tuliojardim@visaojr.com.br', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31993511055', '35900000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES
('Tulinho', 'Gameplays', 'tuliosjardim@gmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31954217584', '35900000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Clara', 'Andrade', 'luizaandrade@hotmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31998235123', '32222002');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Eufrásio', 'Best Jungle Br', 'elefrasio@gmail.com','5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31987572223', '35935000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Mateus', 'Peres', 'mperes@bol.com.br', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31987662591', '16978909');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Alvaro', 'Ferreira', 'alvarofrr@gmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31976896535', '32960000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('João Pedro', 'Esteves', 'jpesteves@yahoo.com.br', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31988569012', '32987000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Sívio', 'Luis', 'silvioluis22@ig.com.br', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31995665231', '33987000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Alexandre', 'Nunes', 'alexandrenunes@hotmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31988642323', '36960000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Antonio', 'Rodrigues', 'antoniorod@outlook.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31987653245', '35970000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Rafael', 'Castro', 'rafacastro@gmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31998679022', '35978100');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Igor', 'Cota', 'igorcastro@gmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31998543221', '35980000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Leonardo', 'Araujo', 'leoaraujo@yahoo.com.br', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31996579024', '36978900');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Leandro', 'Moreira', 'leandromoreira@gmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31996772413', '34978000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Antonio', 'Nunes', 'toninho@hotmail.com','5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31998234900','32960000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Jorge', 'Henrique', 'jorgehenrique@gmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31988653494', '33970000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Henrique', 'Pedroti', 'henriquepdt@gmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31996547786', '36978900');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Luiza', 'Cruz', 'luizacruz@hotmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31998763466', '35980000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES

('Ana', 'Maria', 'anacmaria99@outlook.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31998271231', '31872000');
INSERT INTO Conta (nome, sobrenome, email, senha, celular, cep) VALUES
('Marlon', 'Castro', 'marlonc92@gmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '31998992387', '36960000');


INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(1, 11, 'Alugar Casa', 'Procura alguém que possa me alugar uma casa em Guarapari!',8);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(4, 4, 'Pintar Quarto', 'Preciso de alguém que pinte meu quarto de rosa (tematizado da barbie)',7);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(3, 10, 'Faxina Pós Formatura', 'Estou procurando alguém que possa limpar o salão no qual ocorrerá uma formatura dia 06/12',NULL);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(2, 3, 'Pia', 'Preciso de um encanador para dar um jeito na minha pia',9);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(5, 6, 'Carro com problema', 'Preciso de alguém que possa dar uma olhada no meu carro, meu vizinho disse que a rebimboca da parafuseta esta quebrada',NULL);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(6,8, 'Buffet Casamento', 'Procuro Buffet para o meu casamento, que será no dia 06/11',NULL);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(7,2, 'Parte elétrica casa', 'Procuro um eletricista para fazer a parte elétrica da minha casa',NULL);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(1,1, 'Jardinagem', 'Tenho um pequeno jardim para ser cuidado, preciso de alguém...',NULL);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(9,7, 'Van para casamento', 'Procuro um motorista que possa levar 18 pessoas para um casamento dia 17/11',NULL);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(10,5, 'Muro', 'Procuro um pedreiro para fazer um muro em minha casa ',NULL);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(1,9, 'Serviços de babá', 'Preciso de uma babá para ficar com minhas crianças no próximo fim de semana',NULL);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(12,2, 'Chuveiro estragado', 'Meu chuveiro parou de sair água quente, preciso que alguém dê uma olhada',NULL);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(13,2, 'Tomadas com problema', 'As tomadas da minha casa não estão funcionando, procurando eletricista urgente!',NULL);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(3,11, 'Formatar computador', 'Procuro alguém que possa formatar meu computador!',NULL);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(5,11, 'Cuidar de Idoso', 'Procuro alguém que possa cuidar dos meus avós',NULL);
INSERT INTO Publicacao (conta_id, categoria_id, titulo, descricao, nota) VALUES
(2,11, 'Costureira', 'Procuro alguém que possa costurar meu terno',9);




INSERT INTO respostas (conta_id, publicacao_id, visualizado, nota) VALUES
(2,1,1,7);
INSERT INTO respostas (conta_id, publicacao_id, visualizado, nota) VALUES
(15,11,1,9);
INSERT INTO respostas (conta_id, publicacao_id, visualizado, nota) VALUES
(9,8,1,7);
INSERT INTO respostas (conta_id, publicacao_id, visualizado, nota) VALUES
(20,6,0,NULL);
INSERT INTO respostas (conta_id, publicacao_id, visualizado, nota) VALUES
(9,3,1,NULL);
INSERT INTO respostas (conta_id, publicacao_id, visualizado, nota) VALUES
(17,4,1,NULL);
INSERT INTO respostas (conta_id, publicacao_id, visualizado, nota) VALUES
(12,4,0,6);
INSERT INTO respostas (conta_id, publicacao_id, visualizado, nota) VALUES
(2,2,1,10);
INSERT INTO respostas (conta_id, publicacao_id, visualizado, nota) VALUES
(11,5,1,NULL);
INSERT INTO respostas (conta_id, publicacao_id, visualizado, nota) VALUES
(15,5,1,NULL);

