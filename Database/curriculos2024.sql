-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/03/2024 às 18:28
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `curriculos2024`
--
CREATE DATABASE IF NOT EXISTS `curriculos2024` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `curriculos2024`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `clienteCodigo` int(11) NOT NULL,
  `clienteDocumentacaoCompleta` tinyint(1) NOT NULL,
  `clienteNome` varchar(80) NOT NULL,
  `clienteEmail` varchar(100) NOT NULL,
  `clienteNascimento` varchar(20) NOT NULL,
  `clienteEndereco` varchar(100) NOT NULL,
  `clienteTelefone` varchar(50) NOT NULL,
  `clienteObjetivo` varchar(1000) NOT NULL,
  `clienteEscolaridade` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso_complementar`
--

CREATE TABLE `curso_complementar` (
  `cursoCodigo` int(11) NOT NULL,
  `cursoClienteCodigo` int(11) NOT NULL,
  `cursoInicio` varchar(80) NOT NULL,
  `cursoFim` varchar(80) NOT NULL,
  `cursoNome` varchar(80) NOT NULL,
  `cursoInstituicao` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `experiencia`
--

CREATE TABLE `experiencia` (
  `experienciaCodigo` int(11) NOT NULL,
  `experienciaClienteCodigo` int(11) NOT NULL,
  `experienciaInicio` varchar(80) DEFAULT NULL,
  `experienciaFim` varchar(80) DEFAULT NULL,
  `experienciaCargo` varchar(80) NOT NULL,
  `experienciaEmpresa` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`clienteCodigo`);

--
-- Índices de tabela `curso_complementar`
--
ALTER TABLE `curso_complementar`
  ADD PRIMARY KEY (`cursoCodigo`),
  ADD KEY `cursoClienteCodigo` (`cursoClienteCodigo`);

--
-- Índices de tabela `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`experienciaCodigo`),
  ADD KEY `experienciaClienteCodigo` (`experienciaClienteCodigo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `clienteCodigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `curso_complementar`
--
ALTER TABLE `curso_complementar`
  MODIFY `cursoCodigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `experienciaCodigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `curso_complementar`
--
ALTER TABLE `curso_complementar`
  ADD CONSTRAINT `curso_complementar_ibfk_1` FOREIGN KEY (`cursoClienteCodigo`) REFERENCES `cliente` (`clienteCodigo`) ON DELETE CASCADE;

--
-- Restrições para tabelas `experiencia`
--
ALTER TABLE `experiencia`
  ADD CONSTRAINT `experiencia_ibfk_1` FOREIGN KEY (`experienciaClienteCodigo`) REFERENCES `cliente` (`clienteCodigo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
