-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: kdmeupet
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `situacao_id` bigint(20) unsigned NOT NULL,
  `especie_id` bigint(20) unsigned NOT NULL,
  `raca_id` bigint(20) unsigned NOT NULL,
  `cor_id` bigint(20) unsigned NOT NULL,
  `tamanho_id` bigint(20) unsigned NOT NULL,
  `anNome` varchar(255) NOT NULL,
  `anDescricao` varchar(400) NOT NULL,
  `anContato` varchar(200) NOT NULL,
  `anFoto` varchar(2048) DEFAULT NULL,
  `anData` date NOT NULL,
  `anEndereco` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `anFinalizado` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `animals_user_id_foreign` (`user_id`),
  KEY `animals_especie_id_foreign` (`especie_id`),
  KEY `animals_raca_id_foreign` (`raca_id`),
  KEY `animals_tamanho_id_foreign` (`tamanho_id`),
  KEY `animals_cor_id_foreign` (`cor_id`),
  KEY `animals_situacao_id_foreign` (`situacao_id`),
  CONSTRAINT `animals_cor_id_foreign` FOREIGN KEY (`cor_id`) REFERENCES `cors` (`id`),
  CONSTRAINT `animals_especie_id_foreign` FOREIGN KEY (`especie_id`) REFERENCES `especies` (`id`),
  CONSTRAINT `animals_raca_id_foreign` FOREIGN KEY (`raca_id`) REFERENCES `racas` (`id`),
  CONSTRAINT `animals_situacao_id_foreign` FOREIGN KEY (`situacao_id`) REFERENCES `situacaos` (`id`),
  CONSTRAINT `animals_tamanho_id_foreign` FOREIGN KEY (`tamanho_id`) REFERENCES `tamanhos` (`id`),
  CONSTRAINT `animals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animals`
--

LOCK TABLES `animals` WRITE;
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;
INSERT INTO `animals` VALUES (7,22,4,12,116,21,11,'Xuca','Gatinho arteiro','18 98199 6525','storage/animal_1702426843.png','2023-12-12',NULL,'-21.41926487200383','-50.078004241186136',1,'2023-12-13 00:20:43','2023-12-17 18:50:36'),(13,22,3,11,114,1,10,'José','Meu automóvel','18 98199 6525','storage/animal_1702520720.png','2023-12-06',NULL,'-21.419964891768082','-50.07887650164776',1,'2023-12-14 02:25:20','2023-12-14 21:29:52'),(15,22,4,12,1,19,11,'Carson Clay','Gato preto gordo','18 98199 6525','animal_1702860885.png','2023-12-13',NULL,'-21.41728464682409','-50.072821141075124',0,'2023-12-14 02:33:12','2023-12-18 00:54:45'),(16,22,3,11,114,1,10,'PlayNow','Meu automóvel','18 98199 6525','public/uploads/animais/animal_1702521577.png','2023-12-13',NULL,'-21.41990096849576','-50.0754432741087',1,'2023-12-14 02:39:37','2023-12-17 20:04:11'),(17,22,3,11,114,1,10,'Xabum','Cachorro brabo','18 98199 6525','public/uploads/animais/animal_1702590810.png','2023-12-14',NULL,'-21.41683268923926','-50.06600189837628',1,'2023-12-14 21:53:30','2023-12-18 22:42:54'),(19,22,4,11,114,1,10,'Carson Clovis','Gato preto gordo','18 98199 6525','animal_1702596809.png','2023-03-09',NULL,NULL,NULL,0,'2023-12-14 23:33:29','2023-12-16 14:04:25'),(20,22,3,11,114,8,10,'Totó','Demoninho em pessoa','18 98199 6525','animal_1702599047.png','1215-11-20',NULL,NULL,NULL,0,'2023-12-15 00:10:47','2023-12-16 02:55:12'),(21,22,4,12,1,17,11,'Xorencio','Meu automóvel','18 98199 6525','animal_1702600380.png','1214-11-20',NULL,NULL,NULL,0,'2023-12-15 00:33:00','2023-12-16 02:31:33'),(24,22,3,11,114,1,10,'Carson Clay','Demoninho em pessoa','18 98199 6525','animal_1702603406.png','2023-12-14',NULL,'-21.420983639388993','-50.07197570696008',0,'2023-12-15 01:23:26','2023-12-15 01:23:26'),(25,22,3,11,114,1,10,'Cascavel','Meu automóvel','18 98199 6525','animal_1702691837.png','1216-11-20',NULL,'-21.428004834363115','-50.055358893005184',0,'2023-12-16 01:57:17','2023-12-16 02:30:31'),(26,22,4,12,1,10,11,'Oswaldo','Animal dócil','18 98199 6525','animal_1702737308.png','2023-12-16',NULL,'-21.431376734000686','-50.069166899120326',0,'2023-12-16 14:35:08','2023-12-16 14:43:44'),(27,22,3,11,114,1,10,'Josenildo','Demoninho em pessoa','18 98199 6525','animal_1702738208.png','2023-12-16',NULL,'-21.417243383981884','-50.073390841680535',0,'2023-12-16 14:45:08','2023-12-16 14:50:44'),(28,22,3,11,114,1,10,'Cascavel','Cachorro brabo','18 98199 6525','animal_1702949529.png','2023-12-18',NULL,'-21.418843259831505','-50.07167530216976',0,'2023-12-19 01:32:10','2023-12-19 01:32:10');
/*!40000 ALTER TABLE `animals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cors`
--

DROP TABLE IF EXISTS `cors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cor` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cors`
--

LOCK TABLES `cors` WRITE;
/*!40000 ALTER TABLE `cors` DISABLE KEYS */;
INSERT INTO `cors` VALUES (1,'Preto',NULL,NULL),(2,'Branco',NULL,NULL),(3,'Amarelo',NULL,NULL),(4,'Laranja',NULL,NULL),(5,'Marrom',NULL,NULL),(6,'Cinza',NULL,NULL),(7,'Cinza Azul',NULL,NULL),(8,'Bege',NULL,NULL),(9,'Malhado Branco e Preto',NULL,NULL),(10,'Malhado Branco e Laranja',NULL,NULL),(11,'Malhado Branco e Amarelo',NULL,NULL),(12,'Malhado Branco e Cinza',NULL,NULL),(13,'Malhado Branco e Cinza Azul',NULL,NULL),(14,'Malhado Branco e Marrom',NULL,NULL),(15,'Malhado Branco e Bege',NULL,NULL),(16,'Malhado Bege e Marrom',NULL,NULL),(17,'Malhado Preto e Amarelo',NULL,NULL),(18,'Malhado Amarelo e Laranja',NULL,NULL),(19,'Malhado Marrom e Preto',NULL,NULL),(20,'Malhado Bege e Preto',NULL,NULL),(21,'Malhado três cores ou mais',NULL,NULL),(22,'Caramelo',NULL,NULL),(23,'Verde',NULL,NULL),(24,'Verde Malhada',NULL,NULL),(25,'Outra',NULL,NULL);
/*!40000 ALTER TABLE `cors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especies`
--

DROP TABLE IF EXISTS `especies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `esNome` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_fk` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especies`
--

LOCK TABLES `especies` WRITE;
/*!40000 ALTER TABLE `especies` DISABLE KEYS */;
INSERT INTO `especies` VALUES (11,22,'Cachorro','2023-12-12 22:58:42','2023-12-12 22:58:42'),(12,22,'Gato','2023-12-12 22:58:51','2023-12-12 22:58:51');
/*!40000 ALTER TABLE `especies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_12_05_203840_create_cors_table',2),(6,'2023_12_05_203859_create_especies_table',2),(7,'2023_12_05_204222_create_situacaos_table',3),(8,'2023_12_05_204414_create_tamanhos_table',4),(9,'2023_12_05_204421_create_racas_table',4),(10,'2023_12_05_204831_create_animals_table',5),(11,'2023_12_10_225917_create_fotos_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `racas`
--

DROP TABLE IF EXISTS `racas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `racas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `racaNome` varchar(191) NOT NULL,
  `especie_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `racas_especie_id_foreign` (`especie_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `racas_especie_id_foreign` FOREIGN KEY (`especie_id`) REFERENCES `especies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `racas`
--

LOCK TABLES `racas` WRITE;
/*!40000 ALTER TABLE `racas` DISABLE KEYS */;
INSERT INTO `racas` VALUES (1,22,'Perça',12,NULL,NULL),(2,22,'Brithis Shorthair',12,NULL,NULL),(114,22,'Vira Latas',11,'2023-12-13 00:00:16','2023-12-13 00:00:16'),(115,22,'demônio em miniatura',11,'2023-12-13 00:00:50','2023-12-13 00:00:50'),(116,22,'De Rua',12,'2023-12-13 00:01:11','2023-12-13 00:01:11'),(117,22,'Cinza Azul',12,'2023-12-13 00:01:25','2023-12-13 00:01:25'),(118,22,'Angorá',12,'2023-12-13 00:01:35','2023-12-13 00:01:35');
/*!40000 ALTER TABLE `racas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `situacaos`
--

DROP TABLE IF EXISTS `situacaos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `situacaos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `situacao` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_fk_situacao` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `situacaos`
--

LOCK TABLES `situacaos` WRITE;
/*!40000 ALTER TABLE `situacaos` DISABLE KEYS */;
INSERT INTO `situacaos` VALUES (3,22,'Perdido','2023-12-10 19:24:59','2023-12-10 19:24:59'),(4,22,'Achado','2023-12-12 22:50:23','2023-12-12 22:50:23');
/*!40000 ALTER TABLE `situacaos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tamanhos`
--

DROP TABLE IF EXISTS `tamanhos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tamanhos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `especie_id` bigint(20) unsigned NOT NULL,
  `tamanho` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `tamanhos_especie_id_foreign` (`especie_id`),
  CONSTRAINT `tamanhos_especie_id_foreign` FOREIGN KEY (`especie_id`) REFERENCES `especies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_fk_tamanho` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tamanhos`
--

LOCK TABLES `tamanhos` WRITE;
/*!40000 ALTER TABLE `tamanhos` DISABLE KEYS */;
INSERT INTO `tamanhos` VALUES (10,22,11,'Pequeno porte','2023-12-13 00:02:02','2023-12-13 00:02:02'),(11,22,12,'Pequeno porte','2023-12-13 00:02:19','2023-12-13 00:02:19'),(12,22,11,'Médio porte','2023-12-13 00:02:28','2023-12-13 00:02:28'),(13,22,12,'Médio porte','2023-12-13 00:02:48','2023-12-13 00:02:48'),(14,22,11,'Grande porte','2023-12-13 00:03:01','2023-12-13 00:03:01'),(15,22,12,'Grande porte','2023-12-13 00:03:15','2023-12-13 00:03:15');
/*!40000 ALTER TABLE `tamanhos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `lastName` varchar(191) NOT NULL,
  `endereco` varchar(191) NOT NULL,
  `telefone` varchar(191) NOT NULL,
  `level` varchar(191) NOT NULL DEFAULT 'user',
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'voluptatem','Placeat in labore.','Vel voluptatum dolorem beatae eum.','(95) 193924810','user','rwolff@example.com','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','hQHSK11Syp','2023-12-05 22:35:59','2023-12-05 22:35:59'),(2,'beatae','Ex molestiae quaerat.','Assumenda excepturi aut officiis laudantium nesciunt.','(88) 097686253','admin','stokes.abbey@example.com','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','dP2fcTO0hF','2023-12-05 22:35:59','2023-12-05 22:35:59'),(3,'quia','Assumenda exercitationem aut.','Modi beatae et distinctio.','(20) 812179247','user','veum.brigitte@example.com','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','Oa3A5RSrRq','2023-12-05 22:35:59','2023-12-05 22:35:59'),(4,'rerum','Commodi error.','Qui ratione saepe aut ratione.','(54) 382705181','user','jerde.brittany@example.net','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','qXmmvX0p1u','2023-12-05 22:35:59','2023-12-05 22:35:59'),(5,'maxime','Et qui.','Ut tempore quia.','(12) 495955112','admin','mayer.gonzalo@example.com','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','sanNEPr418','2023-12-05 22:35:59','2023-12-05 22:35:59'),(6,'numquam','Earum corporis magnam.','Recusandae explicabo voluptatem.','(02) 543522123','user','ybartoletti@example.com','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','oyDB7X0NI8','2023-12-05 22:35:59','2023-12-05 22:35:59'),(7,'dolorem','Rerum odit.','Veritatis est et quia et.','(51) 801231458','user','buford59@example.org','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','Xh960rPgVQ','2023-12-05 22:35:59','2023-12-05 22:35:59'),(8,'nostrum','Natus necessitatibus ea.','Asperiores recusandae corporis atque facere accusamus.','(73) 161812173','admin','mitchell.madaline@example.com','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','mwJB8Snk03','2023-12-05 22:35:59','2023-12-05 22:35:59'),(9,'et','Totam quia.','Ipsum ut nulla veniam aperiam.','(96) 848595159','user','felicita46@example.net','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','9ymUD1atpz','2023-12-05 22:35:59','2023-12-05 22:35:59'),(10,'expedita','Quaerat mollitia quae.','Magnam officiis sit et consequatur.','(42) 990916458','admin','amy.rath@example.com','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','Yb8mjQfXFd','2023-12-05 22:35:59','2023-12-05 22:35:59'),(11,'enim','Sit dolores expedita.','Quia ex earum optio autem.','(09) 904556327','admin','pansy.marquardt@example.org','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','Gxl1XyOHtq','2023-12-05 22:35:59','2023-12-07 22:02:12'),(12,'aut','Architecto totam.','Sit ab nam voluptatum.','(99) 699614464','user','okoelpin@example.net','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','BpPav4YAzw','2023-12-05 22:35:59','2023-12-07 22:29:20'),(13,'quaerat','Veritatis sapiente aut.','Impedit molestiae aut est.','(59) 489560515','admin','kacie08@example.net','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','w0yatznj1S','2023-12-05 22:35:59','2023-12-05 22:35:59'),(14,'est','Unde aliquam repudiandae.','Dolorem voluptatibus non et.','(89) 480255143','admin','kasey.champlin@example.org','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','Golu4w0qQw','2023-12-05 22:35:59','2023-12-05 22:35:59'),(15,'vitae','Nemo nam.','Voluptatem et accusamus reiciendis libero.','(80) 180273612','user','sedrick.upton@example.com','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','Wi33eiEhfh','2023-12-05 22:35:59','2023-12-05 22:35:59'),(16,'doloribus','Laudantium ea sint.','Voluptatibus nihil aut dolores.','(05) 092592430','admin','gianni.monahan@example.com','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','6UmQ8K9Su3','2023-12-05 22:35:59','2023-12-05 22:35:59'),(17,'maiores','Sit eos nobis.','Exercitationem possimus impedit id quis id.','(74) 942450839','admin','heathcote.molly@example.net','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','kDxRuztIVh','2023-12-05 22:35:59','2023-12-05 22:35:59'),(18,'ipsum','Cupiditate ducimus similique.','Autem omnis doloremque aliquam sunt.','(83) 080313263','admin','cedrick.hyatt@example.net','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','46RGsoWQlV','2023-12-05 22:35:59','2023-12-05 22:35:59'),(19,'et','Dolore ipsam.','Quasi quia ipsa beatae.','(73) 257454900','user','akiehn@example.com','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','54RBkX1i8W','2023-12-05 22:35:59','2023-12-05 22:35:59'),(20,'veniam','Corporis repellat.','Vel quis repellat atque harum.','(11) 565465412','admin','haag.liam@example.net','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','mOFEgSh5Aq','2023-12-05 22:35:59','2023-12-05 22:35:59'),(21,'Test','User Test','lorem ipsun dor mente','(12) 345678901','user','test@example.com','2023-12-05 22:35:59','$2y$12$TSJC96XyW46Gy1tjlYzNVukMZrDC0Rodw/Q2W2roEHE4B35tKjvPS','ev0HKsjmid','2023-12-05 22:35:59','2023-12-05 22:35:59'),(22,'Lucas','Carvalhal Tropardi','Av Alberto Domingues da Silva, 218, Vila Formosa','(18) 997239694','admin','lucastropardi@hotmail.com',NULL,'$2y$12$oGOt1GgogGzuXIEBWT6yOuj2FQiAUGN8jAL043f9p3K3oEF1yASrq',NULL,'2023-12-05 23:14:43','2023-12-05 23:14:43');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-18 23:16:02
