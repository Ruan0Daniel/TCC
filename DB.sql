-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Abr-2022 às 14:56
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nanochip`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `data` varchar(10) NOT NULL,
  `hora` varchar(5) DEFAULT NULL,
  `evento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `os`, `data`, `hora`, `evento`) VALUES
(6, 1, '20/03/2022', '13:25', '     Início da avaliação\r\n '),
(7, 1, '20/03/2022', '15:30', 'Verificação de saúde do HD necessária, HD em análise.'),
(8, 1, '20/03/2022', '17:30', 'Análise de saúde do HD finalizada, foi detectado BadBlocks em vários setores do HD, saúde do HD comprometida.\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE `os` (
  `os` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `estado` varchar(10) DEFAULT 'aberto',
  `valor_final` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `os`
--

INSERT INTO `os` (`os`, `nome`, `cpf`, `tipo`, `estado`, `valor_final`) VALUES
(1, 'Watila Menane Savino', '1', 'notebook', 'aprovado', 150),
(2, 'Ruan Daniel Marcelino Manhães', '16597282744', 'pc', 'finalizado', 150),
(4, 'Jorge Alencar', '105.532.501-57', 'notebook', 'finalizado', 0),
(5, 'Watila Menane Savino', '105.532.501-57', 'imac', 'aprovado', 0),
(6, 'Guilherme Guimarães', '16597282744', 'pc', 'aberto', 0),
(8, 'Ruan Daniel Marcelino Manhães', '16597282744', 'macbook', 'pendente', 0),
(9, 'Luiz Fernando Ribeiro', '987.654.321-00', 'pc', 'pendente', 180),
(10, 'Mairo Vergara', '155.555.555-11', 'imac', 'aberto', 0),
(11, 'Luciana Margel Borges', '125.804.557-52', 'macbook', 'aberto', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `os_imac`
--

CREATE TABLE `os_imac` (
  `id` int(11) NOT NULL,
  `os` varchar(11) NOT NULL,
  `modelo` varchar(10) DEFAULT NULL,
  `ano` varchar(4) DEFAULT NULL,
  `tamanho` varchar(15) DEFAULT NULL,
  `emc` varchar(20) DEFAULT NULL,
  `processador` varchar(15) DEFAULT NULL,
  `ram` varchar(5) DEFAULT NULL,
  `placa_video` varchar(16) DEFAULT NULL,
  `hd` varchar(6) DEFAULT NULL,
  `acessorios` varchar(30) DEFAULT NULL,
  `problema` text DEFAULT NULL,
  `descricao_problema` text DEFAULT NULL,
  `descricao_orcamento` text DEFAULT NULL,
  `valor_orcamento` float DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `valor_final` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `os_imac`
--

INSERT INTO `os_imac` (`id`, `os`, `modelo`, `ano`, `tamanho`, `emc`, `processador`, `ram`, `placa_video`, `hd`, `acessorios`, `problema`, `descricao_problema`, `descricao_orcamento`, `valor_orcamento`, `status`, `valor_final`) VALUES
(4, '6', 'A1820', '2019', '27', '22845664', 'i7-7700k', '16gb', 'GTX 1660TI', '1tb', 'não', 'erer', NULL, NULL, NULL, NULL, NULL),
(5, '5', 'A1820', '2020', '27', 'fvfvrvf4433', 'i7-7700k', '16gb', 'GTX 1660TI', '1tb', 'não', '   rtt   ', '   er ', '   er ', 0, '', 0),
(7, '10', 'ps52452x', '2020', '27', '22845664', 'i7-7700k', '16gb', 'GTX 1660TI', '1tb', 'não', 'Ao ligar, após 5s desliga', '', '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `os_macbook`
--

CREATE TABLE `os_macbook` (
  `id` int(11) NOT NULL,
  `os` varchar(11) NOT NULL,
  `macbook` varchar(3) DEFAULT NULL,
  `modelo` varchar(10) DEFAULT NULL,
  `ano` varchar(4) DEFAULT NULL,
  `emc` varchar(20) DEFAULT NULL,
  `processador` varchar(15) DEFAULT NULL,
  `ram` varchar(5) DEFAULT NULL,
  `placa_video` varchar(16) DEFAULT NULL,
  `hd` varchar(6) DEFAULT NULL,
  `carregador` varchar(15) DEFAULT NULL,
  `tamanho_tela` varchar(20) DEFAULT NULL,
  `acessorios` varchar(30) DEFAULT NULL,
  `problema` text DEFAULT NULL,
  `descricao_problema` text DEFAULT NULL,
  `descricao_orcamento` text DEFAULT NULL,
  `valor_orcamento` float DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `valor_final` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `os_macbook`
--

INSERT INTO `os_macbook` (`id`, `os`, `macbook`, `modelo`, `ano`, `emc`, `processador`, `ram`, `placa_video`, `hd`, `carregador`, `tamanho_tela`, `acessorios`, `problema`, `descricao_problema`, `descricao_orcamento`, `valor_orcamento`, `status`, `valor_final`) VALUES
(9, '5', 'PRO', 'A1820', '2020', '22845664', 'i7-7700k', '16gb', 'GTX 1660TI', '1tb', '20v 3.42A', '14', 'não', ' weewe', NULL, NULL, NULL, NULL, NULL),
(10, '8', 'PRO', 'A1820', '2020', '22845664', 'i7-7700k', '16gb', 'GTX 1660TI', '1tb', '19v 3,42A', '14', '19v 3,42A', '  esw ', ' we ', ' we ', 150, 'Aprovado', 0),
(11, '11', 'PRO', 'A1820', '2019', '22845664', 'i7-7700k', '16gb', 'GTX 1660TI', '1tb', '19v 3,42A', '14', 'Carregador', ' Não apresenta imagem', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `os_notebook`
--

CREATE TABLE `os_notebook` (
  `id` int(11) NOT NULL,
  `os` varchar(11) NOT NULL,
  `marca` varchar(15) DEFAULT NULL,
  `modelo` varchar(15) DEFAULT NULL,
  `processador` varchar(15) DEFAULT NULL,
  `ram` varchar(5) DEFAULT NULL,
  `hd` varchar(6) DEFAULT NULL,
  `placa_video` varchar(16) DEFAULT NULL,
  `tamanho_tela` varchar(15) DEFAULT NULL,
  `carregador` varchar(20) DEFAULT NULL,
  `acessorios` varchar(30) DEFAULT NULL,
  `problema` text DEFAULT NULL,
  `descricao_problema` text DEFAULT NULL,
  `descricao_orcamento` text DEFAULT NULL,
  `valor_orcamento` float DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `os_notebook`
--

INSERT INTO `os_notebook` (`id`, `os`, `marca`, `modelo`, `processador`, `ram`, `hd`, `placa_video`, `tamanho_tela`, `carregador`, `acessorios`, `problema`, `descricao_problema`, `descricao_orcamento`, `valor_orcamento`, `status`) VALUES
(2, '25', 'Positivo', 'Stilo Xr3000', 'i5 2300', '4gb', '320gb', 'não', '14', '19V 3,42A', 'não', 'Não liga', NULL, NULL, 150, NULL),
(6, '4', 'Positivo', 'Positivo', 'i7-7700k', '16gb', '1tb', 'GTX 1660TI', '15.6', '19v 3,42A', 'não', '       sad       ', 'SDD', '              SDD', 150, ''),
(11, '13', 'Positivo', 'A1820', 'i7-7700k', '8gb', '1tb', 'GTX 1660TI', '14', '19v 3,42A', 'não', '', NULL, NULL, NULL, NULL),
(15, '1', 'Positivo', 'Premium', 'i3 2330m', '8gb', '1TB', 'integrado', '14', '19v 3,42A', 'Carregador', '           Sistema operacional não carrega           ', '       Super-aquecimento     ', '       Limpeza preventiva: R$ 150,00     ', 150, 'Aprovado'),
(18, '3', 'Positivo', 'P56F', 'i7-7700k', '16gb', '1tb', 'GTX 1660TI', '14', '19v 3,42A', 'não', 'ssd', NULL, NULL, NULL, NULL),
(19, '4', 'Positivo', 'Positivo', 'i7-7700k', '16gb', '1tb', 'GTX 1660TI', '15.6', '19v 3,42A', 'não', '       sad       ', 'SDD', 'Manutenção Preventiva: R$ 150', 150, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `os_pc`
--

CREATE TABLE `os_pc` (
  `id` int(11) NOT NULL,
  `os` varchar(11) NOT NULL,
  `equipamento` varchar(15) DEFAULT NULL,
  `placa_mae` varchar(15) DEFAULT NULL,
  `processador` varchar(15) DEFAULT NULL,
  `ram` varchar(5) DEFAULT NULL,
  `hd` varchar(6) DEFAULT NULL,
  `placa_video` varchar(16) DEFAULT NULL,
  `fonte` varchar(15) DEFAULT NULL,
  `gabinete` varchar(20) DEFAULT NULL,
  `acessorios` varchar(30) DEFAULT NULL,
  `problema` text DEFAULT NULL,
  `descricao_problema` text DEFAULT NULL,
  `descricao_orcamento` text DEFAULT NULL,
  `valor_orcamento` float DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `valor_final` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `os_pc`
--

INSERT INTO `os_pc` (`id`, `os`, `equipamento`, `placa_mae`, `processador`, `ram`, `hd`, `placa_video`, `fonte`, `gabinete`, `acessorios`, `problema`, `descricao_problema`, `descricao_orcamento`, `valor_orcamento`, `status`, `valor_final`) VALUES
(6, '2', 'PC Gamer', 'Ga-H110-M', 'processador', '16gb', '1tb', 'placa_video', 'EVGA 750W', 'Corsair GSX', 'não', '      Tela azul      ', '      34    ', 'Manutenção Preventiva: R$ 150', 150, 'Aprovado', 150),
(7, '4', 'PC Gamer', 'Ga-H110-M', 'i7-7700k', '16gb', '1TB', 'GTX 1660TI', 'EVGA 750W', 'Corsair GSX', 'não', 'errr', NULL, NULL, NULL, NULL, NULL),
(8, '6', 'PC Gamer', 'Ga-H110-M', 'processador', '16gb', '1tb', 'placa_video', 'EVGA 750W', 'Corsair GSX', 'não', '  wwee  ', '   we ', '   we ', 150, 'Aprovado', 0),
(12, '9', 'PC Gamer Hi-And', 'Ga-H110-M', 'processador', '16gb', '1tb', 'placa_video', 'EVGA 750W', 'Corsair GSX', '', ' PC liga e após alguns minutos de uso desliga. ', ' dissipador de calor coberto de sujeira impedindo saída do calor, fazendo assim o processador esquentar até atingir a temperatura limite e desligar como medida de proteção.\r\n ', ' Limpeza interna: R$ 100,00 // \r\nManutenção preventiva: R$ 80,00 ', 180, '', 180);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `login` varchar(32) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` varchar(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `nivel`) VALUES
(1, 'Ruan Daniel', 'ruan@nanochip', '827ccb0eea8a706c4c34a16891f84e7b', '0'),
(3, 'Matheus Oliveira', 'matheus@nanochip', '827ccb0eea8a706c4c34a16891f84e7b', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`os`);

--
-- Índices para tabela `os_imac`
--
ALTER TABLE `os_imac`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `os_macbook`
--
ALTER TABLE `os_macbook`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `os_notebook`
--
ALTER TABLE `os_notebook`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `os_pc`
--
ALTER TABLE `os_pc`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `os`
--
ALTER TABLE `os`
  MODIFY `os` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `os_imac`
--
ALTER TABLE `os_imac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `os_macbook`
--
ALTER TABLE `os_macbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `os_notebook`
--
ALTER TABLE `os_notebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `os_pc`
--
ALTER TABLE `os_pc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
