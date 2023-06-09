-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Maio-2023 às 22:16
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbfirelook`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcompanion`
--

CREATE TABLE `tbcompanion` (
  `idCompanion` int(11) NOT NULL,
  `nameCompanion` varchar(50) NOT NULL,
  `cpfCompanion` varchar(14) NOT NULL,
  `cepCompanion` varchar(9) NOT NULL,
  `streetCompanion` varchar(40) NOT NULL,
  `neighborhoodCompanion` varchar(40) NOT NULL,
  `numberStreetCompanion` varchar(10) NOT NULL,
  `complementCompanion` varchar(40) NOT NULL,
  `cityCompanion` varchar(40) NOT NULL,
  `stateCompanion` varchar(40) NOT NULL,
  `emailCompanion` varchar(50) NOT NULL,
  `passwordCompanion` varchar(255) NOT NULL,
  `phoneCompanion` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbcompanion`
--

INSERT INTO `tbcompanion` (`idCompanion`, `nameCompanion`, `cpfCompanion`, `cepCompanion`, `streetCompanion`, `neighborhoodCompanion`, `numberStreetCompanion`, `complementCompanion`, `cityCompanion`, `stateCompanion`, `emailCompanion`, `passwordCompanion`, `phoneCompanion`) VALUES
(1, 'Jean Charles Santos Albuquerque', '111.222.333-96', '08490-630', 'Rua Francisco José Alves', 'Cidade Tiradentes', '120', 'Apto 23B', 'São Paulo', 'SP', 'supersayken@gmail.com', 'supersayken123', '+55965320515'),
(2, 'Vinicius Mateus Pereira do Espirito Santos', '777.000.888-37', '08460-365', 'Rua Feliciano de Mendonça', 'Guaianazes', '201', 'Casa do Chapeu', 'São Paulo', 'SP', 'vinicius@gmail.com', 'vinicius123', '+55965320515');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfeature`
--

CREATE TABLE `tbfeature` (
  `idFeature` int(11) NOT NULL,
  `typeFeature` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbfeature`
--

INSERT INTO `tbfeature` (`idFeature`, `typeFeature`) VALUES
(1, 'Cabelo'),
(2, 'Olhos'),
(3, 'Tatuagem'),
(4, 'Pele'),
(5, 'Altura'),
(6, 'Peso');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfeaturemissed`
--

CREATE TABLE `tbfeaturemissed` (
  `idfeatureMissed` int(11) NOT NULL,
  `descFeatureMissed` varchar(16) NOT NULL,
  `idFeature` int(11) NOT NULL,
  `idMissed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbfeaturemissed`
--

INSERT INTO `tbfeaturemissed` (`idfeatureMissed`, `descFeatureMissed`, `idFeature`, `idMissed`) VALUES
(1, 'Cacheado', 1, 1),
(2, '1.30cm', 5, 1),
(3, 'Liso', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmissed`
--

CREATE TABLE `tbmissed` (
  `idMissed` int(11) NOT NULL,
  `nameMissed` varchar(50) NOT NULL,
  `cpfMissed` varchar(14) NOT NULL,
  `phoneMissed` varchar(16) NOT NULL,
  `dateBirthMissed` date NOT NULL,
  `cepMissed` varchar(9) NOT NULL,
  `streetMissed` varchar(40) NOT NULL,
  `neighborhoodMissed` varchar(40) NOT NULL,
  `streetNumberMissed` varchar(15) NOT NULL,
  `referenceMissed` varchar(40) NOT NULL,
  `cityMissed` varchar(40) NOT NULL,
  `stateMissed` varchar(40) NOT NULL,
  `idCompanion` int(11) NOT NULL,
  `picturePathMissed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbmissed`
--

INSERT INTO `tbmissed` (`idMissed`, `nameMissed`, `cpfMissed`, `phoneMissed`, `dateBirthMissed`, `cepMissed`, `streetMissed`, `neighborhoodMissed`, `streetNumberMissed`, `referenceMissed`, `cityMissed`, `stateMissed`, `idCompanion`, `picturePathMissed`) VALUES
(1, 'Pietro Henrique Oliveira Santos Fossa', '000.999.000-33', '+55965320515', '2005-12-14', '08460-365', 'Rua Feliciano de Mendonça', 'Guaianazes', '270', 'ETEC - Guaianazes', 'São Paulo', 'SP', 1, 'profile.svg'),
(2, 'Amadeus Bertoline da Silva', '999.000.555-94', '+55965320515', '2004-02-07', '08485-310', 'Rua Igarapé Água Azul', 'Cidade Tiradentes', '21', 'ETEC - Cid. Tiradentes', 'São Paulo', 'SP', 1, 'profile.svg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbreason`
--

CREATE TABLE `tbreason` (
  `idReason` int(11) NOT NULL,
  `typeReason` varchar(40) NOT NULL,
  `descReason` varchar(40) NOT NULL,
  `idMissed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcompanion`
--
ALTER TABLE `tbcompanion`
  ADD PRIMARY KEY (`idCompanion`);

--
-- Índices para tabela `tbfeature`
--
ALTER TABLE `tbfeature`
  ADD PRIMARY KEY (`idFeature`);

--
-- Índices para tabela `tbfeaturemissed`
--
ALTER TABLE `tbfeaturemissed`
  ADD PRIMARY KEY (`idfeatureMissed`),
  ADD KEY `fk_missed_featuremissed` (`idMissed`),
  ADD KEY `fk_feature_featuremissed'` (`idFeature`);

--
-- Índices para tabela `tbmissed`
--
ALTER TABLE `tbmissed`
  ADD PRIMARY KEY (`idMissed`);

--
-- Índices para tabela `tbreason`
--
ALTER TABLE `tbreason`
  ADD PRIMARY KEY (`idReason`),
  ADD KEY `fk_missed_reason` (`idMissed`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcompanion`
--
ALTER TABLE `tbcompanion`
  MODIFY `idCompanion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbfeature`
--
ALTER TABLE `tbfeature`
  MODIFY `idFeature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbfeaturemissed`
--
ALTER TABLE `tbfeaturemissed`
  MODIFY `idfeatureMissed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbmissed`
--
ALTER TABLE `tbmissed`
  MODIFY `idMissed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbreason`
--
ALTER TABLE `tbreason`
  MODIFY `idReason` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbfeaturemissed`
--
ALTER TABLE `tbfeaturemissed`
  ADD CONSTRAINT `fk_feature_featuremissed'` FOREIGN KEY (`idFeature`) REFERENCES `tbfeature` (`idFeature`),
  ADD CONSTRAINT `fk_missed_featuremissed` FOREIGN KEY (`idMissed`) REFERENCES `tbmissed` (`idMissed`);

--
-- Limitadores para a tabela `tbreason`
--
ALTER TABLE `tbreason`
  ADD CONSTRAINT `fk_missed_reason` FOREIGN KEY (`idMissed`) REFERENCES `tbmissed` (`idMissed`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
