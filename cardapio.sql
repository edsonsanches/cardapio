-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27/09/2022 às 15:29
-- Versão do servidor: 10.5.15-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u587441870_quitutto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome`) VALUES
(1, 'Saladas'),
(2, 'Entrada'),
(3, 'Especiarias');

-- --------------------------------------------------------

--
-- Estrutura para tabela `config`
--

CREATE TABLE `config` (
  `id_config` int(11) NOT NULL,
  `detalhe` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `config`
--

INSERT INTO `config` (`id_config`, `detalhe`, `config`) VALUES
(2, 'endereco', 'Avenida dos Estados 481 Curitiba PR'),
(3, 'email', 'contato@quitutto.com.br'),
(6, 'botaoWhats', 'https://api.whatsapp.com/send?phone=5541996556516&text=Oi'),
(14, 'telefone', '(41) 31073333'),
(15, 'nome', 'QUITUTTO GASTROPUB'),
(16, 'funcionamento', 'Ter-Sex: 17:30 - 00:00 e Sab-Dom: 11:30 - 15:30');

-- --------------------------------------------------------

--
-- Estrutura para tabela `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `ingrediente` longtext NOT NULL,
  `valor` varchar(64) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT 0,
  `categoria` int(11) NOT NULL,
  `img` varchar(64) NOT NULL DEFAULT 'assets/img/menu/bread-barrel.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `item`
--

INSERT INTO `item` (`id_item`, `nome`, `ingrediente`, `valor`, `ativo`, `categoria`, `img`) VALUES
(2, 'Bread Barrel', 'Lorem, deren, trataro, filede, nerada', 'R$ 6.95', 1, 3, 'assets/img/menu/bread-barrel.jpg'),
(3, 'Caesar Selections', 'Lorem, deren, trataro, filede, nerada', 'R$ 8.95', 1, 1, 'assets/img/menu/caesar.jpg'),
(4, 'Teste', 'teste, teste, teste', 'R$ 14.10', 1, 2, 'assets/img/menu/bread-barrel.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(64) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `nivel` tinyint(1) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `isento` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `isento`) VALUES
(1, 'admin', 'admin', 'teste@teste.com', 2, 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id_config`);

--
-- Índices de tabela `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
