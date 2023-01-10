-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 10/01/2023 às 19:14
-- Versão do servidor: 10.4.25-MariaDB
-- Versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `daoo_2022`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `endereco`, `telefone`, `created_at`, `updated_at`) VALUES
(1, 'Marlene Pinto Chim', 'Br 392 km 41,  casa 372', '53 991095697', NULL, '2022-12-17 00:27:05'),
(2, 'João Silva', 'Av da paz, 57\r\nPovo Novo', '53 123456789', NULL, '2022-12-28 20:38:37'),
(3, 'Noeli Barros', 'av rio grande, 457', '123456789', '2022-11-27 22:44:17', '2022-11-27 22:44:17'),
(4, 'Michele Pinto', 'br 392 km 41, 200', '53987654321', '2022-11-27 22:53:15', '2022-12-17 00:06:51'),
(5, 'Selma Pollnow', 'Colonia Santa bernardina, Pelotas', '32775989', '2022-12-14 19:29:41', '2022-12-17 00:40:23'),
(7, 'Osmar Avila', 'Corredor do mendonça', '32376565', '2022-12-14 19:30:37', '2022-12-14 19:30:37'),
(8, 'Jose Antonio', 'av teste 16, 2022', '53 93456789', '2022-12-17 00:03:15', '2022-12-17 00:04:04'),
(9, 'Cibele Senna', 'Rua verde 115', '53123456789', '2022-12-17 00:18:38', '2022-12-17 00:18:38'),
(10, 'Nerody Silva', 'Corredor servical, 1254', '53123456789', '2022-12-17 00:42:04', '2022-12-17 00:42:04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `regiao_id` bigint(20) UNSIGNED NOT NULL,
  `codigouf` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `estados`
--

INSERT INTO `estados` (`id`, `regiao_id`, `codigouf`, `nome`, `uf`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 'Acre', 'AC', NULL, NULL),
(2, 2, 27, 'Alagoas', 'AL', NULL, NULL),
(3, 1, 16, 'Amapá', 'AP', NULL, NULL),
(4, 1, 13, 'Amazonas', 'AM', NULL, NULL),
(5, 2, 29, 'Bahia', 'BA', NULL, NULL),
(6, 2, 23, 'Ceará', 'CE', NULL, NULL),
(7, 5, 53, 'Distrito Federal', 'DF', NULL, NULL),
(8, 3, 32, 'Espírito Santo', 'ES', NULL, NULL),
(9, 5, 52, 'Goiás', 'GO', NULL, NULL),
(10, 2, 21, 'Maranhão', 'MA', NULL, NULL),
(11, 5, 51, 'Mato Grosso', 'MT', NULL, NULL),
(12, 5, 50, 'Mato Grosso do Sul', 'MS', NULL, NULL),
(13, 3, 31, 'Minas Gerais', 'MG', NULL, NULL),
(14, 1, 15, 'Pará', 'PA', NULL, NULL),
(15, 2, 25, 'Paraíba', 'PB', NULL, NULL),
(16, 4, 41, 'Paraná', 'PR', NULL, NULL),
(17, 2, 26, 'Pernambuco', 'PE', NULL, NULL),
(18, 2, 22, 'Piauí', 'PI', NULL, NULL),
(19, 3, 33, 'Rio de Janeiro', 'RJ', NULL, NULL),
(20, 2, 24, 'Rio Grande do Norte', 'RN', NULL, NULL),
(21, 4, 43, 'Rio Grande do Sul', 'RS', NULL, NULL),
(22, 1, 11, 'Rondônia', 'RO', NULL, NULL),
(23, 1, 14, 'Roraima', 'RR', NULL, NULL),
(24, 4, 42, 'Santa Catarina', 'SC', NULL, NULL),
(25, 3, 35, 'São Paulo', 'SP', NULL, NULL),
(26, 2, 28, 'Sergipe', 'SE', NULL, NULL),
(27, 1, 17, 'Tocantins', 'TO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoques`
--

CREATE TABLE `estoques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fornecedor_id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtd_estoque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custo` double(8,2) NOT NULL,
  `venda` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `estoques`
--

INSERT INTO `estoques` (`id`, `fornecedor_id`, `descricao`, `qtd_estoque`, `validade`, `custo`, `venda`, `created_at`, `updated_at`) VALUES
(101, 201, 'Deo corporal kaiak masculino', '5', '01/08/2026', 11.14, 30.00, NULL, NULL),
(102, 202, 'Desodorante aerossol lily', '2', '01/04/2025', 20.75, 25.00, NULL, NULL),
(103, 201, 'Colonia luna', '2', '01/05/2026', 53.58, 100.00, '2022-11-28 02:43:52', '2022-11-28 02:43:52'),
(104, 204, 'Creme para mãos flor de lis', '2', '01/09/2023', 11.35, 22.00, '2022-12-17 05:39:43', '2022-12-17 05:39:43'),
(105, 203, 'Shampoo cachos', '10', '01/08/2023', 5.99, 20.00, '2022-12-27 02:47:34', '2022-12-27 02:51:01'),
(106, 203, 'testando 10/01', '10', '31/01/2023', 10.01, 20.02, '2023-01-10 20:08:26', '2023-01-10 20:08:26'),
(107, 203, 'testando 10/01/23', '10', '31/01/2023', 10.01, 20.02, '2023-01-10 20:48:10', '2023-01-10 20:48:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `endereco`, `cnpj`, `telefone`, `email`, `estado_id`, `created_at`, `updated_at`) VALUES
(201, 'Natura', 'Canoas - RS', '123456789', '00 00000-0000', 'natura@teste.com', 21, NULL, '2023-01-02 16:03:26'),
(202, 'Boticario ', 'Pelotas', '123456789', '00 00000-0000', 'boti@teste.com', 21, NULL, NULL),
(203, 'Avon', 'Porto Alegre', '987654321', '00 111223344', 'avon@teste.com', 21, '2022-12-28 20:06:16', '2022-12-28 20:06:16'),
(204, 'Teste', 'Pelotas', '987654321', '00 111223344', 'teste@teste.com', 21, '2022-12-28 20:07:35', '2022-12-28 20:07:35'),
(205, 'teste', 'dvvs', 'bs', 'jbsj', 'sjb', 10, '2023-01-02 15:37:43', '2023-01-02 15:37:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_26_184221_create_clientes_table', 1),
(6, '2022_11_26_230138_create_vendas_table', 1),
(7, '2022_12_26_174139_create_regioes_table', 1),
(8, '2022_12_26_174446_create_estados_table', 1),
(9, '2022_12_26_175359_create_fornecedores_table', 1),
(10, '2022_12_26_175719_create_estoques_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 4, 'michele_chim@hotmail.com', '34645f9a40f19b4b1527b33209253bf888e8eb8451afdbe11dbdd5cf47230c4a', '[\"is_admin\"]', '2023-01-02 15:52:43', NULL, '2023-01-02 14:42:15', '2023-01-02 15:52:43'),
(2, 'App\\Models\\User', 4, 'michele_chim@hotmail.com', '0cccaac0b4b8cbbec26f3a95b13e8f12bd32aab1402fc5da7f35c72406c3c7b1', '[\"is_admin\"]', '2023-01-02 15:44:46', NULL, '2023-01-02 15:44:29', '2023-01-02 15:44:46'),
(3, 'App\\Models\\User', 4, 'michele_chim@hotmail.com', 'a42a761d3870d0efd64fbc326108e4beeff78bbdb168c3b2e85ce38b5830cf03', '[\"is_admin\"]', '2023-01-10 19:57:51', NULL, '2023-01-02 15:46:32', '2023-01-10 19:57:51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `regioes`
--

CREATE TABLE `regioes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `regioes`
--

INSERT INTO `regioes` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Norte', NULL, NULL),
(2, 'Nordeste', NULL, NULL),
(3, 'Sudeste', NULL, NULL),
(4, 'Sul', NULL, NULL),
(5, 'Centro-Oeste', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Christine Botsford PhD', 'sammy92@example.com', '2022-12-30 22:26:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'Ry5NkCKM5R', '2022-12-30 22:26:05', '2022-12-30 22:26:05'),
(2, 'Ms. Ocie Thiel', 'keon43@example.org', '2022-12-30 22:26:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'RwRZ2SM7DZ', '2022-12-30 22:26:05', '2022-12-30 22:26:05'),
(3, 'Viola Brekke', 'giles.grady@example.com', '2022-12-30 22:26:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'IQhJln19kC', '2022-12-30 22:26:05', '2022-12-30 22:26:05'),
(4, 'Michele', 'michele_chim@hotmail.com', NULL, '$2y$10$4O2hsPGoAT2PAvpTpawvqO0u7.saSQdkj2Cpt09Eln/t4lwvBUkGC', 1, NULL, '2022-12-30 22:28:54', '2022-12-30 22:28:54'),
(5, 'Test User', 'test@example.com', '2023-01-02 14:31:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'GaMjFRMmd1obHB4SAA8xebopFG1jB81GS4xk0EG0xxbfAuXakcuGNQD8GbDq', '2023-01-02 14:31:35', '2023-01-02 14:31:35');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` double(8,2) NOT NULL,
  `pagamento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `nome`, `descricao`, `valor`, `pagamento`, `created_at`, `updated_at`) VALUES
(10, 'Michele - janeiro', '1 sabonete e 1 deo corporal', 48.99, 'pix', NULL, '2023-01-02 15:54:31'),
(11, 'Maria', '2 sabonete cod: 100', 36.00, 'cartão', NULL, NULL),
(12, 'Noeli', '1 desodorante cod: 102', 25.00, 'dinheiro', NULL, NULL),
(13, 'Teste 02/01', '2 colonias kaiak', 300.00, 'crédito em 2x', '2023-01-02 15:49:37', '2023-01-02 15:51:50');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estados_regiao_id_foreign` (`regiao_id`);

--
-- Índices de tabela `estoques`
--
ALTER TABLE `estoques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estoques_fornecedor_id_foreign` (`fornecedor_id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fornecedores_estado_id_foreign` (`estado_id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `regioes`
--
ALTER TABLE `regioes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `estoques`
--
ALTER TABLE `estoques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `regioes`
--
ALTER TABLE `regioes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `estados_regiao_id_foreign` FOREIGN KEY (`regiao_id`) REFERENCES `regioes` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `estoques`
--
ALTER TABLE `estoques`
  ADD CONSTRAINT `estoques_fornecedor_id_foreign` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD CONSTRAINT `fornecedores_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
