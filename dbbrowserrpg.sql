-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Fev-2019 às 23:19
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbrowserrpg`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbuser`
--

CREATE TABLE `tbuser` (
  `codUser` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `alcunha` varchar(100) NOT NULL DEFAULT 'Noob',
  `level` int(10) NOT NULL DEFAULT '1',
  `classe` varchar(100) NOT NULL,
  `moeda` int(11) NOT NULL DEFAULT '1000',
  `xp` int(11) NOT NULL DEFAULT '1',
  `xpProx` int(11) NOT NULL DEFAULT '5',
  `hp` int(11) NOT NULL DEFAULT '50',
  `hpAtual` int(11) NOT NULL DEFAULT '50',
  `energia` int(11) NOT NULL DEFAULT '1',
  `magia` int(11) NOT NULL DEFAULT '1',
  `ataque` int(11) NOT NULL DEFAULT '1',
  `defesa` int(11) NOT NULL DEFAULT '1',
  `inteligencia` int(11) NOT NULL DEFAULT '1',
  `sabedoria` int(11) NOT NULL DEFAULT '1',
  `agilidade` int(11) NOT NULL DEFAULT '1',
  `velocidade` int(11) NOT NULL DEFAULT '1',
  `sorte` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbuser`
--

INSERT INTO `tbuser` (`codUser`, `user`, `pass`, `email`, `alcunha`, `level`, `classe`, `moeda`, `xp`, `xpProx`, `hp`, `hpAtual`, `energia`, `magia`, `ataque`, `defesa`, `inteligencia`, `sabedoria`, `agilidade`, `velocidade`, `sorte`) VALUES
(1, 'luiis', '123456', 'luiiscarlos99@hotmail.com', 'Noob', 1, 'Pirata', 1000, 1, 5, 50, 50, 1, 1, 1, 1, 1, 1, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`codUser`),
  ADD UNIQUE KEY `User` (`user`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `codUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
