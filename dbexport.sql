-- MySQL dump 10.13  Distrib 5.7.33, for Win64 (x86_64)
--
-- Host: localhost    Database: ymmobilier
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `category_features`
--

DROP TABLE IF EXISTS `category_features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_features` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_features`
--

LOCK TABLES `category_features` WRITE;
/*!40000 ALTER TABLE `category_features` DISABLE KEYS */;
INSERT INTO `category_features` VALUES (1,'Surfaces Annexe'),(2,'Services et Accessibilité'),(3,'Calme et Situation'),(4,'Divers');
/*!40000 ALTER TABLE `category_features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `property_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feature_property`
--

DROP TABLE IF EXISTS `feature_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feature_property` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `feature_id` bigint(20) unsigned NOT NULL,
  `property_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feature_property_feature_id_foreign` (`feature_id`),
  KEY `feature_property_property_id_foreign` (`property_id`),
  CONSTRAINT `feature_property_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE,
  CONSTRAINT `feature_property_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feature_property`
--

LOCK TABLES `feature_property` WRITE;
/*!40000 ALTER TABLE `feature_property` DISABLE KEYS */;
INSERT INTO `feature_property` VALUES (1,2,1,NULL,NULL),(2,4,1,NULL,NULL),(3,5,1,NULL,NULL),(4,8,1,NULL,NULL),(5,9,1,NULL,NULL),(6,11,1,NULL,NULL),(7,13,1,NULL,NULL),(8,1,2,NULL,NULL),(9,4,2,NULL,NULL),(10,5,2,NULL,NULL),(11,8,2,NULL,NULL),(12,10,2,NULL,NULL),(13,11,2,NULL,NULL),(14,12,2,NULL,NULL),(15,13,2,NULL,NULL),(16,1,3,NULL,NULL),(17,4,3,NULL,NULL),(18,7,3,NULL,NULL),(19,9,3,NULL,NULL),(20,11,3,NULL,NULL),(21,13,3,NULL,NULL),(22,3,4,NULL,NULL),(23,4,4,NULL,NULL),(24,6,4,NULL,NULL),(25,8,4,NULL,NULL),(26,10,4,NULL,NULL),(27,11,4,NULL,NULL),(28,13,4,NULL,NULL),(29,1,5,NULL,NULL),(30,2,5,NULL,NULL),(31,6,5,NULL,NULL),(32,11,5,NULL,NULL),(33,12,5,NULL,NULL),(34,1,6,NULL,NULL),(35,2,6,NULL,NULL),(36,4,6,NULL,NULL),(37,5,6,NULL,NULL),(38,6,6,NULL,NULL),(39,7,6,NULL,NULL),(40,8,6,NULL,NULL),(41,9,6,NULL,NULL),(42,10,6,NULL,NULL),(43,11,6,NULL,NULL),(44,13,6,NULL,NULL),(45,1,7,NULL,NULL),(46,2,7,NULL,NULL),(47,3,7,NULL,NULL),(48,5,7,NULL,NULL),(49,8,7,NULL,NULL),(50,9,7,NULL,NULL),(51,10,7,NULL,NULL),(52,11,7,NULL,NULL),(53,12,7,NULL,NULL),(54,13,7,NULL,NULL),(55,1,8,NULL,NULL),(56,2,8,NULL,NULL),(57,3,8,NULL,NULL),(58,5,8,NULL,NULL),(59,9,8,NULL,NULL),(60,11,8,NULL,NULL),(61,12,8,NULL,NULL),(62,2,9,NULL,NULL),(63,3,9,NULL,NULL),(64,4,9,NULL,NULL),(65,6,9,NULL,NULL),(66,7,9,NULL,NULL),(67,8,9,NULL,NULL),(68,9,9,NULL,NULL),(69,10,9,NULL,NULL),(70,12,9,NULL,NULL),(71,1,10,NULL,NULL),(72,4,10,NULL,NULL),(73,8,10,NULL,NULL),(74,13,10,NULL,NULL);
/*!40000 ALTER TABLE `feature_property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `features` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_features_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `features`
--

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;
INSERT INTO `features` VALUES (1,1,'balcon ou terrasse','/img/icon_features/balcon ou terrasse.png','1'),(2,1,'parking','/img/icon_features/parking.png','1'),(3,1,'jardin','/img/icon_features/jardin.png','1'),(4,2,'ascenseur','/img/icon_features/ascenseur.png','1'),(5,2,'climatiseur','/img/icon_features/climatiseur.png','1'),(6,2,'fibre','/img/icon_features/fibre.png','1'),(7,2,'gardien','/img/icon_features/gardien.png','1'),(8,2,'piscine','/img/icon_features/piscine.png','1'),(9,3,'exposition sud','/img/icon_features/exposition sud.png','1'),(10,3,'double vitrage','/img/icon_features/double vitrage.png','1'),(11,3,'résidence étudiants','/img/icon_features/résidence étudiants.png','1'),(12,4,'cheminée','/img/icon_features/cheminée.png','1'),(13,4,'meublé','/img/icon_features/meublé.png','1');
/*!40000 ALTER TABLE `features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` bigint(20) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,1,'https://i.imgur.com/MFG251G.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(2,1,'https://i.imgur.com/3gfqoFF.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(3,1,'https://i.imgur.com/Vj9XnPX.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(4,2,'https://i.imgur.com/MFG251G.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(5,2,'https://i.imgur.com/3gfqoFF.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(6,2,'https://i.imgur.com/Vj9XnPX.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(7,3,'https://i.imgur.com/MFG251G.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(8,3,'https://i.imgur.com/3gfqoFF.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(9,3,'https://i.imgur.com/Vj9XnPX.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(10,4,'https://i.imgur.com/MFG251G.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(11,4,'https://i.imgur.com/3gfqoFF.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(12,4,'https://i.imgur.com/Vj9XnPX.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(13,5,'https://i.imgur.com/MFG251G.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(14,5,'https://i.imgur.com/3gfqoFF.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(15,5,'https://i.imgur.com/Vj9XnPX.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(16,6,'https://i.imgur.com/MFG251G.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(17,6,'https://i.imgur.com/3gfqoFF.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(18,6,'https://i.imgur.com/Vj9XnPX.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(19,7,'https://i.imgur.com/MFG251G.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(20,7,'https://i.imgur.com/3gfqoFF.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(21,7,'https://i.imgur.com/Vj9XnPX.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(22,8,'https://i.imgur.com/MFG251G.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(23,8,'https://i.imgur.com/3gfqoFF.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(24,8,'https://i.imgur.com/Vj9XnPX.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(25,9,'https://i.imgur.com/MFG251G.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(26,9,'https://i.imgur.com/3gfqoFF.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(27,9,'https://i.imgur.com/Vj9XnPX.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(28,10,'https://i.imgur.com/MFG251G.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(29,10,'https://i.imgur.com/3gfqoFF.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26'),(30,10,'https://i.imgur.com/Vj9XnPX.jpeg','2022-05-08 22:10:26','2022-05-08 22:10:26');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localisations`
--

DROP TABLE IF EXISTS `localisations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `localisations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` bigint(20) unsigned NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localisations`
--

LOCK TABLES `localisations` WRITE;
/*!40000 ALTER TABLE `localisations` DISABLE KEYS */;
INSERT INTO `localisations` VALUES (1,1,36.085573,123.419921,'2022-05-08 22:10:26','2022-05-08 22:10:26'),(2,2,-1.003903,49.240031,'2022-05-08 22:10:26','2022-05-08 22:10:26'),(3,3,-4.672714,11.432764,'2022-05-08 22:10:26','2022-05-08 22:10:26'),(4,4,-80.976282,40.50157,'2022-05-08 22:10:26','2022-05-08 22:10:26'),(5,5,1.912954,111.049417,'2022-05-08 22:10:26','2022-05-08 22:10:26'),(6,6,-45.167871,-109.589354,'2022-05-08 22:10:26','2022-05-08 22:10:26'),(7,7,10.811128,162.367238,'2022-05-08 22:10:26','2022-05-08 22:10:26'),(8,8,61.802032,175.726502,'2022-05-08 22:10:26','2022-05-08 22:10:26'),(9,9,61.495537,23.376459,'2022-05-08 22:10:26','2022-05-08 22:10:26'),(10,10,-80.12514,62.397659,'2022-05-08 22:10:26','2022-05-08 22:10:26');
/*!40000 ALTER TABLE `localisations` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_03_14_162009_create_roles_table',1),(6,'2022_03_14_162109_create_types_table',1),(7,'2022_03_14_162325_create_localisations_table',1),(8,'2022_03_14_162346_create_features_table',1),(9,'2022_03_14_162405_create_properties_table',1),(10,'2022_04_05_065707_create_table_pivot_feature_property',1),(11,'2022_04_05_071325_create_favorites',1),(12,'2022_04_19_093222_create_images_table',1),(13,'2022_04_25_150849_create_category_features_table',1),(14,'2022_05_03_100456_create_reservations_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `properties` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` bigint(20) unsigned NOT NULL,
  `price` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surface` int(11) NOT NULL,
  `nb_rooms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` VALUES (1,3,366000,'Property 0','79798 Skiles Lodge Suite 297\nZboncakside, TN 13937','Incidunt rerum aliquam expedita quaerat veritatis et. Sint est occaecati est cupiditate omnis iusto. Sit aperiam ab voluptas consectetur deleniti.','https://i.imgur.com/fnAFtvU.jpeg',195,'4 pièces','2022-05-08 22:10:26','2022-05-08 22:10:26'),(2,4,76000,'Property 1','6678 Howell Fork\nEveretteton, TX 08691','Animi dolorum labore nostrum saepe iusto. Ut libero consequuntur saepe eius omnis est saepe. Animi possimus commodi ullam ut debitis.','https://i.imgur.com/k8BaoR8.jpeg',769,'16 pièces','2022-05-08 22:10:26','2022-05-08 22:10:26'),(3,3,92000,'Property 2','3828 Herta Village Apt. 709\nWest Kristofferburgh, MN 88299','Soluta alias quisquam sequi. Mollitia qui qui qui fugit itaque consequatur. Sequi dignissimos sunt sunt sunt sequi ipsam. Sit rerum dicta id sint pariatur autem porro est.','https://i.imgur.com/k8BaoR8.jpeg',167,'4 pièces','2022-05-08 22:10:26','2022-05-08 22:10:26'),(4,4,301000,'Property 3','39352 Fausto Island\nLake Selina, SC 97149-5496','Eos accusamus quos neque fugiat. Consectetur sed eum facere porro modi. Incidunt voluptatem quam deserunt et et.','https://i.imgur.com/cGDjX9x.jpeg',529,'18 pièces','2022-05-08 22:10:26','2022-05-08 22:10:26'),(5,2,346000,'Property 4','5139 Aufderhar Corner Apt. 607\nRaymundoborough, WI 95870','Natus provident et quia magnam illum eos. Perferendis nulla et ad velit dolore tempora. Beatae delectus minima deserunt qui harum repellat magnam. Non consequuntur ipsam quis vero exercitationem dolore animi.','https://i.imgur.com/k8BaoR8.jpeg',383,'11 pièces','2022-05-08 22:10:26','2022-05-08 22:10:26'),(6,3,285000,'Property 5','2080 Jones Roads Suite 991\nColliertown, VT 27295','Repudiandae non neque reprehenderit id. Inventore odio illum modi quaerat. Et veniam perferendis harum sit sequi sed nesciunt.','https://i.imgur.com/jgZibdz.jpeg',219,'3 pièces','2022-05-08 22:10:26','2022-05-08 22:10:26'),(7,1,170000,'Property 6','864 Sheldon Circles\nWest Jordytown, GA 40598','Rerum assumenda vitae facere totam odio in. Et eius molestiae laborum ut ad.','https://i.imgur.com/cGDjX9x.jpeg',160,'T4','2022-05-08 22:10:26','2022-05-08 22:10:26'),(8,2,74000,'Property 7','501 Lebsack Wall\nAufderharside, MD 01242-3081','Aut hic ut nihil commodi. Pariatur in quo officia ad. Voluptatem rerum sit sapiente at cum magni. Vitae laborum minima deleniti laborum voluptatem aut.','https://i.imgur.com/k8BaoR8.jpeg',333,'8 pièces','2022-05-08 22:10:26','2022-05-08 22:10:26'),(9,1,312000,'Property 8','5238 Bailey Squares Suite 266\nBruenport, OK 16115-0448','Voluptatum et a rerum autem voluptatem. Voluptatem modi ipsam minima sit et tenetur perferendis. Velit est quis fuga eum dicta.','https://i.imgur.com/jgZibdz.jpeg',92,'T1','2022-05-08 22:10:26','2022-05-08 22:10:26'),(10,3,134000,'Property 9','7518 Mayer Squares Apt. 429\nVirgilland, NM 82463','Quo sit quidem distinctio dolor. Numquam cum corporis accusantium ut. Suscipit nihil ullam nihil nostrum. Accusantium nobis sunt vero corporis aut reiciendis exercitationem.','https://i.imgur.com/k8BaoR8.jpeg',198,'3 pièces','2022-05-08 22:10:26','2022-05-08 22:10:26');
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `property_id` bigint(20) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,2,1,'pending','2022-05-08 22:10:26',NULL),(2,1,6,'pending','2022-05-08 22:10:26',NULL),(3,3,10,'pending','2022-05-08 22:10:26','2022-05-08 22:10:26'),(4,4,3,'pending','2022-05-08 22:10:26','2022-05-08 22:10:26'),(5,5,6,'pending','2022-05-08 22:10:26','2022-05-08 22:10:26'),(6,6,4,'pending','2022-05-08 22:10:26','2022-05-08 22:10:26'),(7,7,6,'pending','2022-05-08 22:10:26','2022-05-08 22:10:26'),(8,8,3,'pending','2022-05-08 22:10:26','2022-05-08 22:10:26'),(9,9,9,'pending','2022-05-08 22:10:26','2022-05-08 22:10:26'),(10,10,5,'pending','2022-05-08 22:10:26','2022-05-08 22:10:26'),(11,11,9,'pending','2022-05-08 22:10:26','2022-05-08 22:10:26'),(12,12,7,'pending','2022-05-08 22:10:26','2022-05-08 22:10:26');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
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
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Admin'),(2,'member','Member');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'Appartement'),(2,'Maison'),(3,'Chalet'),(4,'Autre');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL DEFAULT '2',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0000000000',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','admin@test.com','0102030405','/img/admin.jpg',NULL,'$2y$10$ykCDxgZdpO5pobjSPMX/COt/CledTTf.v9piG43If.vvXbgZAPZ6m',NULL,'2022-05-08 22:10:26',NULL),(2,2,'user','user@test.com','0102030406','/img/user.jpg',NULL,'$2y$10$VHKrMBfprAfEfRjUh./HBu9enGT4z2Dt/K00I00GzFlBztPTgJFyS',NULL,'2022-05-08 22:10:26',NULL),(3,2,'Keeley Hermann','jwiza@example.org','0578874610','https://picsum.photos/id/496/200/300','2022-05-08 22:10:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','emXqBzk9MO','2022-05-08 22:10:26','2022-05-08 22:10:26'),(4,2,'Nellie Zulauf','ofeeney@example.net','0387275612','https://picsum.photos/id/767/200/300','2022-05-08 22:10:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','TtXtSnHhu3','2022-05-08 22:10:26','2022-05-08 22:10:26'),(5,2,'Ivy Balistreri DDS','mcollier@example.net','0503116239','https://picsum.photos/id/83/200/300','2022-05-08 22:10:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','rl3xsCOHpz','2022-05-08 22:10:26','2022-05-08 22:10:26'),(6,2,'Stephen Rempel','jkoepp@example.org','0407444915','https://picsum.photos/id/130/200/300','2022-05-08 22:10:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','5GVlygTwJp','2022-05-08 22:10:26','2022-05-08 22:10:26'),(7,2,'Tyrese Schuster','bruen.joana@example.com','0278173751','https://picsum.photos/id/531/200/300','2022-05-08 22:10:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','2XL47mr8Kh','2022-05-08 22:10:26','2022-05-08 22:10:26'),(8,2,'Ms. Cydney Bogan','gustave62@example.org','0515304986','https://picsum.photos/id/659/200/300','2022-05-08 22:10:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','OYbSaFriqU','2022-05-08 22:10:26','2022-05-08 22:10:26'),(9,2,'Bettie Rutherford','era58@example.net','0763848972','https://picsum.photos/id/16/200/300','2022-05-08 22:10:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','f7TjSCyYZC','2022-05-08 22:10:26','2022-05-08 22:10:26'),(10,2,'Eldred Kessler','georgette08@example.org','0841266169','https://picsum.photos/id/822/200/300','2022-05-08 22:10:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','MxAgN5Paop','2022-05-08 22:10:26','2022-05-08 22:10:26'),(11,2,'Anabelle Leannon Sr.','fheller@example.com','0328988827','https://picsum.photos/id/831/200/300','2022-05-08 22:10:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','BiPGux8EXZ','2022-05-08 22:10:26','2022-05-08 22:10:26'),(12,2,'Zula Ledner','harvey42@example.net','0807350093','https://picsum.photos/id/307/200/300','2022-05-08 22:10:26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','XpBnMFqL1I','2022-05-08 22:10:26','2022-05-08 22:10:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ymmobilier'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-23 11:15:22
