-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 10/08/2021 às 17:47
-- Versão do servidor: 10.3.24-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u226104869_covid`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `casos`
--

CREATE TABLE `casos` (
  `id` int(11) NOT NULL,
  `nome_paciente` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `status_exame` varchar(255) DEFAULT NULL,
  `origem` varchar(255) DEFAULT NULL,
  `inicio_sintomas` date DEFAULT NULL,
  `data_coleta_exame` date DEFAULT NULL,
  `local_coleta` varchar(255) DEFAULT NULL,
  `tipo_exame` varchar(255) DEFAULT NULL,
  `internado` varchar(255) DEFAULT NULL,
  `resultado` varchar(255) DEFAULT NULL,
  `caso_ativo` varchar(255) DEFAULT NULL,
  `data_descarte_caso` date DEFAULT NULL,
  `data_obito` date DEFAULT NULL,
  `data_encerramento_caso` date DEFAULT NULL,
  `obito` varchar(255) DEFAULT NULL,
  `inserido_por` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(20) DEFAULT NULL,
  `password_reset_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`, `email`, `foto`, `login_session_key`, `email_status`, `password_reset_key`) VALUES
(1, 'admin', '$2y$10$pET0DEVN6PR2a5Ri8cn62eHWBAXZYjxZVGxjAtPyqb/3XpHtgkDke', 'admin@admin.com', 'http://localhost/covid/uploads/files/mq4d3er1s0ylxb9.png', 'e4a51191a45619d8b2fb39461f3ebc6f', NULL, NULL)

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `casos`
--
ALTER TABLE `casos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2419;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
