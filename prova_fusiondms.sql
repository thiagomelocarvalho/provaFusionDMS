-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 26-Abr-2018 às 18:21
-- Versão do servidor: 5.6.25-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prova_fusiondms`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista`
--

CREATE TABLE `motorista` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(256) NOT NULL,
  `cnh` varchar(150) NOT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `cpf` varchar(150) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `data_hora_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `motorista`
--

INSERT INTO `motorista` (`id`, `nome`, `cnh`, `rg`, `cpf`, `data_nascimento`, `data_hora_cadastro`) VALUES
(1, 'Thiago Melo', '53955366319', '282965683', '83664080009', '1988-09-26', '2018-04-24 16:18:28'),
(3, 'Eduardo Henrique', '53955366319', '282965683', '83664080009', '1985-04-18', '2018-04-26 14:50:30'),
(4, 'Motorista 3', '53955366319', '282965683', '83664080009', '1979-03-08', '2018-04-26 14:54:54'),
(5, 'Motorista 4', '53955366319', '282965683', '83664080009', '1988-01-01', '2018-04-26 14:59:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(256) NOT NULL,
  `placa` varchar(45) NOT NULL,
  `marca` varchar(150) NOT NULL,
  `modelo` varchar(150) NOT NULL,
  `ano_modelo` int(4) DEFAULT NULL,
  `km_atual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `nome`, `placa`, `marca`, `modelo`, `ano_modelo`, `km_atual`) VALUES
(1, 'Fiat Mobi', 'NET4502', 'Fiat', 'Fiat', 2018, 50),
(2, 'HB20', 'KCF2623', 'Hyundai', 'Hyundai', 2018, 0),
(3, 'Sandero S', 'NEP8760', 'Renault', 'Renault', 2017, 100),
(4, 'VEículo Teste', 'Placa Teste', 'Marca Teste', 'Modelo Teste', 2018, 0),
(5, 'Veículo Teste 2', 'NEP8760', 'Marca Teste', 'Modelo Teste', 2010, 900);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo_aluguel`
--

CREATE TABLE `veiculo_aluguel` (
  `id` int(11) UNSIGNED NOT NULL,
  `motorista_id` int(11) NOT NULL,
  `veiculo_id` int(11) NOT NULL,
  `data_hora_inicio` datetime NOT NULL,
  `km_inicial` int(11) NOT NULL,
  `data_hora_fim` datetime DEFAULT NULL,
  `km_final` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `veiculo_aluguel`
--

INSERT INTO `veiculo_aluguel` (`id`, `motorista_id`, `veiculo_id`, `data_hora_inicio`, `km_inicial`, `data_hora_fim`, `km_final`) VALUES
(1, 1, 1, '2018-04-25 00:00:00', 100, '2018-04-27 00:00:00', 1000),
(2, 3, 4, '2018-04-24 00:00:00', 100, '2018-04-26 00:00:00', 150),
(3, 4, 5, '2018-04-16 00:00:00', 400, '2018-04-30 00:00:00', 600),
(4, 5, 4, '2018-04-25 00:00:00', 500, '2018-05-05 00:00:00', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `motorista`
--
ALTER TABLE `motorista`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veiculo_aluguel`
--
ALTER TABLE `veiculo_aluguel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `motorista`
--
ALTER TABLE `motorista`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `veiculo_aluguel`
--
ALTER TABLE `veiculo_aluguel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
