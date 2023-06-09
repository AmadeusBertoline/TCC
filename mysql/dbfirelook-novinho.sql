-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jun-2023 às 07:24
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
  `picturePath` varchar(300) NOT NULL,
  `passwordCompanion` varchar(255) NOT NULL,
  `phoneCompanion` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbcompanion`
--

INSERT INTO `tbcompanion` (`idCompanion`, `nameCompanion`, `cpfCompanion`, `cepCompanion`, `streetCompanion`, `neighborhoodCompanion`, `numberStreetCompanion`, `complementCompanion`, `cityCompanion`, `stateCompanion`, `emailCompanion`, `picturePath`, `passwordCompanion`, `phoneCompanion`) VALUES
(2, 'Andrea Costa', '361.303.960-58', '24030-310', 'Rua Desiderio de Oliveira', 'Centro', '32', '', 'Niterói', 'RJ', 'andreacosta@gmail.com', '', '123', '2199912-0453'),
(3, 'Jheniffer Silva', '590.120.970-29', '01011-100', ' Rua São Bento', 'Centro', '321', '', 'Osasco', 'SP', 'jheniffer@gmail.com', '', '123', '11 9 5461-7611');

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
  `descFeatureMissed` varchar(100) NOT NULL,
  `idFeature` int(11) NOT NULL,
  `idMissed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbfeaturemissed`
--

INSERT INTO `tbfeaturemissed` (`idfeatureMissed`, `descFeatureMissed`, `idFeature`, `idMissed`) VALUES
(4, 'Tatuagem no braço', 3, 4),
(5, 'Tatuagem de um de um diamante no peito', 3, 4),
(6, 'Tatuagem escrito Jheniffer no pescoço', 3, 5),
(7, 'Tatuagem tribal no peito', 3, 5),
(8, 'Tatuagem de uma mulher nas duas pernas', 3, 5),
(9, 'Pele branca', 4, 4);

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
  `dateDisappearance` date NOT NULL,
  `hourDisappearance` time NOT NULL,
  `neighborhoodMissed` varchar(40) NOT NULL,
  `streetNumberMissed` varchar(15) NOT NULL,
  `referenceMissed` varchar(40) NOT NULL,
  `cityMissed` varchar(40) NOT NULL,
  `stateMissed` varchar(40) NOT NULL,
  `idCompanion` int(11) NOT NULL,
  `picturePathMissed` varchar(255) NOT NULL,
  `hourRegister` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbmissed`
--

INSERT INTO `tbmissed` (`idMissed`, `nameMissed`, `cpfMissed`, `phoneMissed`, `dateBirthMissed`, `cepMissed`, `streetMissed`, `dateDisappearance`, `hourDisappearance`, `neighborhoodMissed`, `streetNumberMissed`, `referenceMissed`, `cityMissed`, `stateMissed`, `idCompanion`, `picturePathMissed`, `hourRegister`) VALUES
(4, 'Guilherme Costa de Vasconcelos', '559.152.180-08', '2199912-0453', '1996-01-01', '21070-031', 'Av. Braz de Pina', '2023-03-01', '12:00:00', 'Penha', '923', 'Próximo ao BRT', 'Niterói', 'RJ', 2, '../../resource/missed/img/4_1685986671.jpg', '14:37:51'),
(5, 'Daruan Kauan', '111.222.333-96', '1199999999', '1996-10-10', '06326-000', 'Osasco', '2023-05-18', '17:00:00', 'Conjunto Habitacional Presidente Castelo', '1', 'Ao lado da divisa Carapicuiba/Osasco', 'Osasco', 'SP', 3, '../../resource/missed/img/5_1686105756.jpg', '23:42:35');

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
-- Extraindo dados da tabela `tbreason`
--

INSERT INTO `tbreason` (`idReason`, `typeReason`, `descReason`, `idMissed`) VALUES
(3, 'Morador de rua', 'Ficou fora de casa um tempo dormindo nas', 4),
(4, 'Depressivo', 'Foi visto pela última vez com uma garraf', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuariocomum`
--

CREATE TABLE `tbusuariocomum` (
  `codUsuarioComum` int(11) NOT NULL,
  `nomeUsuarioComum` varchar(40) NOT NULL,
  `dataNascimentoUsuarioComum` date NOT NULL,
  `emailUsuarioComum` varchar(60) NOT NULL,
  `cepUsuarioComum` char(9) NOT NULL,
  `estadoUsuarioComum` varchar(40) NOT NULL,
  `cidadeUsuarioComum` varchar(40) NOT NULL,
  `bairroUsuarioComum` varchar(40) NOT NULL,
  `numeroLogUsuarioComum` int(11) NOT NULL,
  `logradouroUsuarioComum` varchar(40) NOT NULL,
  `complementoUsuarioComum` varchar(40) NOT NULL,
  `cpfUsuarioComum` char(14) NOT NULL,
  `senhaUsuarioComum` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbusuariocomum`
--

INSERT INTO `tbusuariocomum` (`codUsuarioComum`, `nomeUsuarioComum`, `dataNascimentoUsuarioComum`, `emailUsuarioComum`, `cepUsuarioComum`, `estadoUsuarioComum`, `cidadeUsuarioComum`, `bairroUsuarioComum`, `numeroLogUsuarioComum`, `logradouroUsuarioComum`, `complementoUsuarioComum`, `cpfUsuarioComum`, `senhaUsuarioComum`) VALUES
(1, 'Amadeus Bertoline da Silva', '2004-09-10', 'amadeus@gmail.com', '08120600', 'SP', 'São Paulo', 'Jardim Virginia', 2, 'Rua Simão de Mendonça Alemão', '', '88811225027', '123');

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
-- Índices para tabela `tbusuariocomum`
--
ALTER TABLE `tbusuariocomum`
  ADD PRIMARY KEY (`codUsuarioComum`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcompanion`
--
ALTER TABLE `tbcompanion`
  MODIFY `idCompanion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbfeature`
--
ALTER TABLE `tbfeature`
  MODIFY `idFeature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbfeaturemissed`
--
ALTER TABLE `tbfeaturemissed`
  MODIFY `idfeatureMissed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbmissed`
--
ALTER TABLE `tbmissed`
  MODIFY `idMissed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbreason`
--
ALTER TABLE `tbreason`
  MODIFY `idReason` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbusuariocomum`
--
ALTER TABLE `tbusuariocomum`
  MODIFY `codUsuarioComum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
