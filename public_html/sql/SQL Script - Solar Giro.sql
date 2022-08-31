-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2022 at 12:28 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19423084_solargiro`
--
DROP DATABASE IF EXISTS `id19423084_solargiro`;
CREATE DATABASE IF NOT EXISTS `id19423084_solargiro` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id19423084_solargiro`;

-- --------------------------------------------------------

--
-- Table structure for table `Bateria`
--

DROP TABLE IF EXISTS `Bateria`;
CREATE TABLE `Bateria` (
  `bateId` int(11) NOT NULL,
  `bateCarga` int(11) NOT NULL,
  `bateTemperatura` decimal(6,2) NOT NULL,
  `bateria_dispId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Bateria`
--

INSERT INTO `Bateria` (`bateId`, `bateCarga`, `bateTemperatura`, `bateria_dispId`) VALUES(2, 56, 26.00, 7);
INSERT INTO `Bateria` (`bateId`, `bateCarga`, `bateTemperatura`, `bateria_dispId`) VALUES(3, 0, 0.00, 48);
INSERT INTO `Bateria` (`bateId`, `bateCarga`, `bateTemperatura`, `bateria_dispId`) VALUES(5, 0, 0.00, 50);
INSERT INTO `Bateria` (`bateId`, `bateCarga`, `bateTemperatura`, `bateria_dispId`) VALUES(6, 0, 0.00, 53);
INSERT INTO `Bateria` (`bateId`, `bateCarga`, `bateTemperatura`, `bateria_dispId`) VALUES(7, 0, 0.00, 54);

-- --------------------------------------------------------

--
-- Table structure for table `Dispositivo`
--

DROP TABLE IF EXISTS `Dispositivo`;
CREATE TABLE `Dispositivo` (
  `dispId` int(11) NOT NULL,
  `dispChave` varchar(17) NOT NULL,
  `dispNome` varchar(45) NOT NULL,
  `dispLatitude` decimal(9,7) NOT NULL,
  `dispLongitude` decimal(10,7) NOT NULL,
  `dispDescricao` varchar(45) NOT NULL,
  `dispEstado` tinyint(1) NOT NULL,
  `dispUltimaAlteracao` varchar(45) NOT NULL,
  `dispositivo_usuaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Dispositivo`
--

INSERT INTO `Dispositivo` (`dispId`, `dispChave`, `dispNome`, `dispLatitude`, `dispLongitude`, `dispDescricao`, `dispEstado`, `dispUltimaAlteracao`, `dispositivo_usuaId`) VALUES(7, '13132-31233-32321', 'Placa-ESP32Teste', -27.2859136, -49.7352704, 'Placa para teste do ESP32 ()', 0, '2022-08-21 16:10:59', 5);
INSERT INTO `Dispositivo` (`dispId`, `dispChave`, `dispNome`, `dispLatitude`, `dispLongitude`, `dispDescricao`, `dispEstado`, `dispUltimaAlteracao`, `dispositivo_usuaId`) VALUES(48, '12345-12345-12345', 'nome', 1.0000000, 1.0000000, 'desc', 1, '1986', 13);
INSERT INTO `Dispositivo` (`dispId`, `dispChave`, `dispNome`, `dispLatitude`, `dispLongitude`, `dispDescricao`, `dispEstado`, `dispUltimaAlteracao`, `dispositivo_usuaId`) VALUES(50, 'LA069-BZ099-CA089', 'Placa 2', 1.0000000, 1.0000000, 'TESTE', 0, '2022-08-28 20:47:03', 11);
INSERT INTO `Dispositivo` (`dispId`, `dispChave`, `dispNome`, `dispLatitude`, `dispLongitude`, `dispDescricao`, `dispEstado`, `dispUltimaAlteracao`, `dispositivo_usuaId`) VALUES(53, 'ANGEB-K4ITH-9WYEG', 'Placa da Larissa', -27.2120313, -49.6398348, 'Placa Solar de teste', 0, '2022-08-29 12:54:16', 16);
INSERT INTO `Dispositivo` (`dispId`, `dispChave`, `dispNome`, `dispLatitude`, `dispLongitude`, `dispDescricao`, `dispEstado`, `dispUltimaAlteracao`, `dispositivo_usuaId`) VALUES(54, 'FBHE4-Y89WE-FFEWT', 'Segunda placa', -27.2092176, -49.6401182, 'Teste 2', 0, '2022-08-29 12:54:48', 16);

-- --------------------------------------------------------

--
-- Table structure for table `Motor`
--

DROP TABLE IF EXISTS `Motor`;
CREATE TABLE `Motor` (
  `motoId` int(11) NOT NULL,
  `motoPosicaoXY` varchar(45) NOT NULL,
  `motoPosicaoZ` varchar(45) NOT NULL,
  `motor_dispId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Motor`
--

INSERT INTO `Motor` (`motoId`, `motoPosicaoXY`, `motoPosicaoZ`, `motor_dispId`) VALUES(5, '0', '0', 7);
INSERT INTO `Motor` (`motoId`, `motoPosicaoXY`, `motoPosicaoZ`, `motor_dispId`) VALUES(7, '0', '0', 48);
INSERT INTO `Motor` (`motoId`, `motoPosicaoXY`, `motoPosicaoZ`, `motor_dispId`) VALUES(10, '191', '360', 53);
INSERT INTO `Motor` (`motoId`, `motoPosicaoXY`, `motoPosicaoZ`, `motor_dispId`) VALUES(11, '0', '113', 54);

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE `Usuario` (
  `usuaId` int(11) NOT NULL,
  `usuaNome` varchar(45) NOT NULL,
  `usuaEmail` varchar(45) NOT NULL,
  `usuaTelefone` varchar(45) NOT NULL,
  `usuaSenha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`usuaId`, `usuaNome`, `usuaEmail`, `usuaTelefone`, `usuaSenha`) VALUES(5, 'Rodrigo Voigt Filho Teste', 'voigtrodrigo0@gmail.com', '47 99145-6545', '12345678');
INSERT INTO `Usuario` (`usuaId`, `usuaNome`, `usuaEmail`, `usuaTelefone`, `usuaSenha`) VALUES(9, 'AAAAAAAAAA', 'aaaaa@gmail.com', '47 99145-6541', '12345678');
INSERT INTO `Usuario` (`usuaId`, `usuaNome`, `usuaEmail`, `usuaTelefone`, `usuaSenha`) VALUES(10, 'Rodrigo Voigt Filho', 'voigtrodrigo0@gmail.com', '47 99145-6541', '12345678');
INSERT INTO `Usuario` (`usuaId`, `usuaNome`, `usuaEmail`, `usuaTelefone`, `usuaSenha`) VALUES(11, 'Patricia', 'patriciaBlini@gmail.com', '47 99999-9999', '12345678');
INSERT INTO `Usuario` (`usuaId`, `usuaNome`, `usuaEmail`, `usuaTelefone`, `usuaSenha`) VALUES(13, 'Taylor Swift', 'taylorswift@gmail.com', '47 99999-9999', 'lindademais');
INSERT INTO `Usuario` (`usuaId`, `usuaNome`, `usuaEmail`, `usuaTelefone`, `usuaSenha`) VALUES(14, 'Teste mensagem', 'teste@mensagem.com', '47 99999-9999', '12345678');
INSERT INTO `Usuario` (`usuaId`, `usuaNome`, `usuaEmail`, `usuaTelefone`, `usuaSenha`) VALUES(16, 'Larissa Schmitz', 'issaschmitz27@gmail.com', '(23) 54322-3455', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bateria`
--
ALTER TABLE `Bateria`
  ADD PRIMARY KEY (`bateId`),
  ADD KEY `fk_bateria_dispositivo1` (`bateria_dispId`);

--
-- Indexes for table `Dispositivo`
--
ALTER TABLE `Dispositivo`
  ADD PRIMARY KEY (`dispId`),
  ADD KEY `fk_dispositivo_usuario1` (`dispositivo_usuaId`);

--
-- Indexes for table `Motor`
--
ALTER TABLE `Motor`
  ADD PRIMARY KEY (`motoId`),
  ADD KEY `fk_motor_dispositivo1` (`motor_dispId`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`usuaId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bateria`
--
ALTER TABLE `Bateria`
  MODIFY `bateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Dispositivo`
--
ALTER TABLE `Dispositivo`
  MODIFY `dispId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `Motor`
--
ALTER TABLE `Motor`
  MODIFY `motoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `usuaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Bateria`
--
ALTER TABLE `Bateria`
  ADD CONSTRAINT `fk_bateria_dispositivo1` FOREIGN KEY (`bateria_dispId`) REFERENCES `Dispositivo` (`dispId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Dispositivo`
--
ALTER TABLE `Dispositivo`
  ADD CONSTRAINT `fk_dispositivo_usuario1` FOREIGN KEY (`dispositivo_usuaId`) REFERENCES `Usuario` (`usuaId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Motor`
--
ALTER TABLE `Motor`
  ADD CONSTRAINT `fk_motor_dispositivo1` FOREIGN KEY (`motor_dispId`) REFERENCES `Dispositivo` (`dispId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
