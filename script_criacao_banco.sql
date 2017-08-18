DROP DATABASE IF EXISTS BiblioWeb
CREATE DATABASE BiblioWeb;

USE BiblioWeb;

CREATE TABLE Livro (
	id INT AUTO_INCREMENT PRIMARY KEY,
	titulo VARCHAR(80)
);

-- ALGUNS DADOS PARA TESTE
INSERT INTO Livro (titulo) VALUES
('redes de computadores'),
('bancos de dados'),
('gerenciamento de dados na web'),
('sistemas operacionais'),
('desenvolvimento web'),
('desenvolvimento Android'),
('organização e arquitetura de computadores');
