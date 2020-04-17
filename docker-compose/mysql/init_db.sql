-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: apps_directory
-- ------------------------------------------------------
-- Server version	5.7.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activations`
--

DROP TABLE IF EXISTS `activations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activations` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `activations_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activations`
--

LOCK TABLES `activations` WRITE;
/*!40000 ALTER TABLE `activations` DISABLE KEYS */;
/*!40000 ALTER TABLE `activations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_activations`
--

DROP TABLE IF EXISTS `admin_activations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_activations` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_activations_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_activations`
--

LOCK TABLES `admin_activations` WRITE;
/*!40000 ALTER TABLE `admin_activations` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_activations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_password_resets`
--

DROP TABLE IF EXISTS `admin_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_password_resets`
--

LOCK TABLES `admin_password_resets` WRITE;
/*!40000 ALTER TABLE `admin_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `forbidden` tinyint(1) NOT NULL DEFAULT '0',
  `language` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_email_deleted_at_unique` (`email`,`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin',NULL,'Super','Admin','admin@strathmore.edu','$2y$10$t7ynNz.1g3jB/r14uwXod.dhsBikKWXV7P.GoQgRYIfLMbj0.8f.6','lIZEfsCUCVKDb3qyaYmmtqDtgt3EAIfdMT3a4IJP8aawhdV0BZarK9DAfi7U',1,0,'en',NULL,'2020-04-08 14:32:59','2020-04-09 01:06:21');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,'Strathmore\\AdminAuth\\Models\\AdminUser',1,'avatar','avatar','avatar.png','image/png','media',23924,'[]','{\"generated_conversions\": {\"thumb_75\": true, \"thumb_150\": true, \"thumb_200\": true}}','[]',1,'2020-04-08 14:32:59','2020-04-08 14:32:59');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2017_08_24_000000_create_activations_table',1),(3,'2017_08_24_000000_create_admin_activations_table',1),(4,'2017_08_24_000000_create_admin_password_resets_table',1),(5,'2017_08_24_000000_create_admin_users_table',1),(6,'2018_07_18_000000_create_wysiwyg_media_table',1),(7,'2019_08_19_000000_create_failed_jobs_table',1),(8,'2020_04_08_143259_create_media_table',1),(9,'2020_04_08_143259_create_permission_tables',1),(10,'2020_04_08_143304_fill_default_admin_user_and_permissions',1),(11,'2020_04_08_143259_create_translations_table',2),(12,'2014_10_12_100000_create_password_resets_table',3),(13,'2016_06_01_000001_create_oauth_auth_codes_table',3),(14,'2016_06_01_000002_create_oauth_access_tokens_table',3),(15,'2016_06_01_000003_create_oauth_refresh_tokens_table',3),(16,'2016_06_01_000004_create_oauth_clients_table',3),(17,'2016_06_01_000005_create_oauth_personal_access_clients_table',3),(18,'2020_04_09_000012_add_fundamental_fields_to_users_table',3),(19,'2020_04_09_001832_fill_permissions_for_role',4),(20,'2020_04_09_002100_fill_permissions_for_permission',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (2,'App\\User',1),(1,'Strathmore\\AdminAuth\\Models\\AdminUser',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'admin','admin','2020-04-08 14:32:59','2020-04-08 14:32:59'),(2,'admin.translation.index','admin','2020-04-08 14:32:59','2020-04-08 14:32:59'),(3,'admin.translation.edit','admin','2020-04-08 14:32:59','2020-04-08 14:32:59'),(4,'admin.translation.rescan','admin','2020-04-08 14:32:59','2020-04-08 14:32:59'),(5,'admin.admin-user.index','admin','2020-04-08 14:32:59','2020-04-08 14:32:59'),(6,'admin.admin-user.create','admin','2020-04-08 14:32:59','2020-04-08 14:32:59'),(7,'admin.admin-user.edit','admin','2020-04-08 14:32:59','2020-04-08 14:32:59'),(8,'admin.admin-user.delete','admin','2020-04-08 14:32:59','2020-04-08 14:32:59'),(9,'admin.upload','admin','2020-04-08 14:32:59','2020-04-08 14:32:59'),(10,'admin.admin-user.impersonal-login','admin','2020-04-08 14:32:59','2020-04-08 14:32:59'),(11,'admin.role','admin','2020-04-09 00:18:45','2020-04-09 00:18:45'),(12,'admin.role.index','admin','2020-04-09 00:18:45','2020-04-09 00:18:45'),(13,'admin.role.create','admin','2020-04-09 00:18:45','2020-04-09 00:18:45'),(14,'admin.role.show','admin','2020-04-09 00:18:45','2020-04-09 00:18:45'),(15,'admin.role.edit','admin','2020-04-09 00:18:45','2020-04-09 00:18:45'),(16,'admin.role.delete','admin','2020-04-09 00:18:45','2020-04-09 00:18:45'),(17,'admin.role.bulk-delete','admin','2020-04-09 00:18:45','2020-04-09 00:18:45'),(18,'admin.permission','admin','2020-04-09 00:21:05','2020-04-09 00:21:05'),(19,'admin.permission.index','admin','2020-04-09 00:21:05','2020-04-09 00:21:05'),(20,'admin.permission.create','admin','2020-04-09 00:21:05','2020-04-09 00:21:05'),(21,'admin.permission.show','admin','2020-04-09 00:21:05','2020-04-09 00:21:05'),(22,'admin.permission.edit','admin','2020-04-09 00:21:05','2020-04-09 00:21:05'),(23,'admin.permission.delete','admin','2020-04-09 00:21:05','2020-04-09 00:21:05'),(24,'admin.permission.bulk-delete','admin','2020-04-09 00:21:05','2020-04-09 00:21:05'),(25,'admin.user','admin','2020-04-09 00:32:59','2020-04-09 00:32:59'),(26,'admin.user.index','admin','2020-04-09 00:33:15','2020-04-09 00:33:15'),(27,'admin.user.create','admin','2020-04-09 00:34:41','2020-04-09 00:34:41'),(28,'admin.user.edit','admin','2020-04-09 00:34:49','2020-04-09 00:34:49'),(29,'admin.user.delete','admin','2020-04-09 00:35:01','2020-04-09 00:35:01'),(30,'admin.user.bulk-delete','admin','2020-04-09 00:35:09','2020-04-09 00:35:09');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator','admin','2020-04-08 14:32:59','2020-04-08 14:32:59'),(2,'System Admin','web','2020-04-09 00:38:12','2020-04-09 00:38:12');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `namespace` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '*',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` json NOT NULL,
  `metadata` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `translations_namespace_index` (`namespace`),
  KEY `translations_group_index` (`group`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
INSERT INTO `translations` VALUES (1,'strathmore/admin-ui','admin','operation.succeeded','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(2,'strathmore/admin-ui','admin','operation.failed','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(3,'strathmore/admin-ui','admin','operation.not_allowed','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(4,'*','admin','admin-user.columns.username','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(5,'*','admin','admin-user.columns.user_number','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(6,'*','admin','admin-user.columns.first_name','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(7,'*','admin','admin-user.columns.last_name','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(8,'*','admin','admin-user.columns.email','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(9,'*','admin','admin-user.columns.password','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(10,'*','admin','admin-user.columns.password_repeat','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(11,'*','admin','admin-user.columns.activated','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(12,'*','admin','admin-user.columns.forbidden','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(13,'*','admin','admin-user.columns.language','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(14,'strathmore/admin-ui','admin','forms.select_an_option','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(15,'*','admin','admin-user.columns.roles','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(16,'strathmore/admin-ui','admin','forms.select_options','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(17,'*','admin','admin-user.actions.create','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(18,'strathmore/admin-ui','admin','btn.save','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(19,'*','admin','admin-user.actions.edit','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(20,'*','admin','admin-user.actions.index','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(21,'strathmore/admin-ui','admin','placeholder.search','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(22,'strathmore/admin-ui','admin','btn.search','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(23,'*','admin','admin-user.columns.id','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(24,'strathmore/admin-ui','admin','btn.edit','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(25,'strathmore/admin-ui','admin','btn.delete','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(26,'strathmore/admin-ui','admin','pagination.overview','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(27,'strathmore/admin-ui','admin','index.no_items','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(28,'strathmore/admin-ui','admin','index.try_changing_items','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(29,'strathmore/admin-ui','admin','btn.new','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(30,'strathmore/admin-ui','admin','profile_dropdown.account','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(31,'strathmore/admin-auth','admin','profile_dropdown.logout','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(32,'strathmore/admin-ui','admin','sidebar.content','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(33,'strathmore/admin-ui','admin','sidebar.settings','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(34,'*','admin','admin-user.actions.edit_password','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(35,'*','admin','admin-user.actions.edit_profile','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(36,'strathmore/admin-auth','activations','email.line','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(37,'strathmore/admin-auth','activations','email.action','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(38,'strathmore/admin-auth','activations','email.notRequested','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(39,'strathmore/admin-auth','admin','activations.activated','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(40,'strathmore/admin-auth','admin','activations.invalid_request','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(41,'strathmore/admin-auth','admin','activations.disabled','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(42,'strathmore/admin-auth','admin','activations.sent','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(43,'strathmore/admin-auth','admin','passwords.sent','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(44,'strathmore/admin-auth','admin','passwords.reset','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(45,'strathmore/admin-auth','admin','passwords.invalid_token','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(46,'strathmore/admin-auth','admin','passwords.invalid_user','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(47,'strathmore/admin-auth','admin','passwords.invalid_password','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(48,'strathmore/admin-auth','admin','activation_form.title','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(49,'strathmore/admin-auth','admin','activation_form.note','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(50,'strathmore/admin-auth','admin','auth_global.email','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(51,'strathmore/admin-auth','admin','activation_form.button','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(52,'strathmore/admin-auth','admin','login.title','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(53,'strathmore/admin-auth','admin','login.sign_in_text','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(54,'strathmore/admin-auth','admin','auth_global.password','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(55,'strathmore/admin-auth','admin','login.button','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(56,'strathmore/admin-auth','admin','login.forgot_password','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(57,'strathmore/admin-auth','admin','forgot_password.title','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(58,'strathmore/admin-auth','admin','forgot_password.note','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(59,'strathmore/admin-auth','admin','forgot_password.button','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(60,'strathmore/admin-auth','admin','password_reset.title','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(61,'strathmore/admin-auth','admin','password_reset.note','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(62,'strathmore/admin-auth','admin','auth_global.password_confirm','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(63,'strathmore/admin-auth','admin','password_reset.button','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(64,'*','*','Manage access','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(65,'*','*','Translations','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL),(66,'*','*','Configuration','[]',NULL,'2020-04-08 14:33:03','2020-04-08 14:33:03',NULL);
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sam Arosi Maosa','smaosa@strathmore.edu','2020-04-09 12:00:00','$2y$10$CCmTooOWMmyVV93sP8lghenevq7vUrj9D56Lsin.J031Fmb/s4pm2',NULL,'2020-04-09 00:39:12','2020-04-09 00:39:12','smaosa',NULL,'Sam','Arosi','Maosa',1,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wysiwyg_media`
--

DROP TABLE IF EXISTS `wysiwyg_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wysiwyg_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wysiwygable_id` int(10) unsigned DEFAULT NULL,
  `wysiwygable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wysiwyg_media_wysiwygable_id_index` (`wysiwygable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wysiwyg_media`
--

LOCK TABLES `wysiwyg_media` WRITE;
/*!40000 ALTER TABLE `wysiwyg_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `wysiwyg_media` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-09  1:11:48
