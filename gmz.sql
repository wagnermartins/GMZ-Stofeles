-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jan 31, 2012 as 03:47 
-- Versão do Servidor: 5.1.41
-- Versão do PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `gmz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `valor` float NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `valor`, `created`, `updated`) VALUES
(1, 'Camiseta Branca Lisa', '100% PoliÃ©ster.\r\nLavÃ¡vel Ã  mÃ¡quina.', 9.9, '2012-01-30 02:42:09', '2012-01-30 03:10:10'),
(2, 'Camiseta Preta Lisa', '100% PoliÃ©ster.\r\nLavÃ¡vel Ã  mÃ¡quina.', 9.9, '2012-01-30 02:42:26', '2012-01-30 02:42:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE IF NOT EXISTS `vendedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(32) NOT NULL,
  `sobrenome` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` char(32) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `celular` varchar(16) NOT NULL,
  `endereco` varchar(128) NOT NULL,
  `cidade` varchar(64) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(16) NOT NULL,
  `nascimento` date NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`id`, `nome`, `sobrenome`, `username`, `password`, `telefone`, `celular`, `endereco`, `cidade`, `estado`, `cpf`, `rg`, `nascimento`, `created`, `updated`) VALUES
(1, 'Wagner', 'Martins', 'wagner', '', '5333051754', '5381171040', 'Rua Otacilio Camara, 238', 'Pelotas', 'RS', '03117137009', '1088791701', '2012-02-28', '2012-01-30 01:27:04', '2012-01-30 02:48:52'),
(2, 'Gabriel', 'Almeida', 'gabriel', '', '31232323', '313131231', 'Rua Lorem Ipsum, 232', 'Rio de Janeiro', 'RJ', '33873937936', '7938Q739Q03', '1994-02-28', '2012-01-30 01:29:33', '2012-01-30 01:29:33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
