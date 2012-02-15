-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 14/02/2012 às 12h12min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `gmz`
--

DROP DATABASE gmz;
CREATE DATABASE gmz;
USE gmz;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_vendas`
--

CREATE TABLE IF NOT EXISTS `itens_vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id` int(11) NOT NULL,
  `venda_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(6,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `valor`, `quantidade`, `created`, `updated`) VALUES
(1, 'Camiseta Branca Lisa', '100% PoliÃ©ster.\r\nLavÃ¡vel Ã  mÃ¡quina.', 10.00, 0, '2012-01-30 02:42:09', '2012-01-30 03:10:10'),
(2, 'Camiseta Preta Lisa', '100% PoliÃ©ster.\r\nLavÃ¡vel Ã  mÃ¡quina.', 10.00, 0, '2012-01-30 02:42:26', '2012-01-30 02:42:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendedor_id` int(11) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `forma_pagamento` varchar(20) NOT NULL,
  `valor_total` decimal(6,2) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `vendedor_id`, `nome_cliente`, `forma_pagamento`, `valor_total`, `created`, `updated`) VALUES
(1, 1, 'Washington Luís', '&Agrave; Vista', 191.00, '2012-02-02 03:41:08', '2012-02-02 03:41:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE IF NOT EXISTS `vendedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(32) NOT NULL,
  `sobrenome` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `celular` varchar(16) NOT NULL,
  `endereco` varchar(128) NOT NULL,
  `cidade` varchar(64) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(16) NOT NULL,
  `nascimento` date NOT NULL,
  `role` enum('admin','regular') NOT NULL DEFAULT 'regular',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`id`, `nome`, `sobrenome`, `username`, `password`, `telefone`, `celular`, `endereco`, `cidade`, `estado`, `cpf`, `rg`, `nascimento`, `role`, `created`, `updated`) VALUES
(1, 'Wagner', 'Martins', 'wagner', '', '5333051754', '5381171040', 'Rua Otacilio Camara, 238', 'Pelotas', 'RS', '03117137009', '1088791701', '2012-02-28', 'regular', '2012-01-30 01:27:04', '2012-01-30 02:48:52'),
(2, 'Gabriel', 'Almeida', 'gabriel', '', '31232323', '313131231', 'Rua Lorem Ipsum, 232', 'Rio de Janeiro', 'RJ', '33873937936', '7938Q739Q03', '1994-02-28', 'regular', '2012-01-30 01:29:33', '2012-01-30 01:29:33'),
(3, 'Felipe Ricardo', 'do Nascimento', 'felipe', '', '', '', '', '', '', '', '', '2012-02-01', 'regular', '2012-02-01 20:08:17', '2012-02-01 20:08:17'),
(4, 'JoÃ£o', 'Martins', 'joao', '123456', '5333051754', '5381171040', 'Rua Otacilio Camara', 'Pelotas', 'RS', '03282389898', '83983938898', '1997-06-07', 'regular', '2012-02-03 04:23:41', '2012-02-03 04:25:27'),
(5, 'Wagner', 'Martins', 'wag', '642555c976cf435a01023d1b4559a40d', '', '', ',', '', 'AC', '', '', '2012-02-14', 'regular', '2012-02-14 08:51:00', '2012-02-14 08:51:00'),
(6, 'Wagner', 'Martins', 'wagg', '642555c976cf435a01023d1b4559a40d5a8e92fb', '', '', ',', '', 'AC', '', '', '2012-02-14', 'regular', '2012-02-14 08:54:07', '2012-02-14 08:54:07'),
(7, 'Wagner', 'Martins', 'waggg', '642555c976cf435a01023d1b4559a40d5a8e92fb', '', '', ',', '', 'AC', '', '', '2012-02-14', 'regular', '2012-02-14 12:01:33', '2012-02-14 12:01:33'),
(8, 'Wagner', 'Martins', 'wagggg', '642555c976cf435a01023d1b4559a40d5a8e92fb', '(53) 3305-6640', '(53) 8117-1040', ',', '', 'AC', '', '', '2012-02-14', 'regular', '2012-02-14 12:02:14', '2012-02-14 12:02:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
