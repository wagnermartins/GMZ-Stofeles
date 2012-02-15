-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2012 at 05:20 AM
-- Server version: 5.5.9
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `gmz`
--

-- --------------------------------------------------------

DROP DATABASE gmz;
CREATE DATABASE gmz;
USE gmz;

--
-- Table structure for table `itens_vendas`
--

CREATE TABLE `itens_vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id` int(11) NOT NULL,
  `venda_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `itens_vendas`
--

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `produtos`
--

-- --------------------------------------------------------

--
-- Table structure for table `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendedor_id` int(11) NOT NULL,
  `forma_pagamento` varchar(20) NOT NULL,
  `valor_subtotal` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `desconto` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vendas`
--

-- --------------------------------------------------------

--
-- Table structure for table `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(32) NOT NULL,
  `sobrenome` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vendedores`
--

INSERT INTO `vendedores` VALUES(1, 'Gabriel', 'Almeida', 'gabriel_almeida', '9d8d9fd02a16d9d723f8e94905146846955a9edc', 'gabriel.almeida.rj@gmail.com', '(21) 2751-5369', '(21) 7174-4813', 'Trav. Amarama Nascimento,26', 'SÃ£o JoÃ£o de Meriti', 'RJ', '119.105.647-37', '131931231941', '1994-02-28', 'admin', '2012-02-15 04:57:20', '2012-02-15 05:11:42');
