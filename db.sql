-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.16 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para jovita
DROP DATABASE IF EXISTS `jovita`;
CREATE DATABASE IF NOT EXISTS `jovita` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `jovita`;

-- Volcando estructura para tabla jovita.activations
DROP TABLE IF EXISTS `activations`;
CREATE TABLE IF NOT EXISTS `activations` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `activations_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jovita.activations: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `activations` DISABLE KEYS */;
/*!40000 ALTER TABLE `activations` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.admin_activations
DROP TABLE IF EXISTS `admin_activations`;
CREATE TABLE IF NOT EXISTS `admin_activations` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_activations_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jovita.admin_activations: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `admin_activations` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_activations` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.admin_password_resets
DROP TABLE IF EXISTS `admin_password_resets`;
CREATE TABLE IF NOT EXISTS `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jovita.admin_password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `admin_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.admin_users
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users`
(
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `forbidden` tinyint(1) NOT NULL DEFAULT '0',
  `language` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_email_deleted_at_unique` (`email`,`deleted_at`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- Volcando datos para la tabla jovita.admin_users: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id`, `first_name`, `last_name`, `email`, `password`, `remember_token`, `activated`,
                           `forbidden`, `language`, `deleted_at`, `created_at`, `updated_at`)
VALUES (1, 'Administrator', 'Administrator', 'admin@admin.com',
        '$2y$10$3RQdqg3iM3QNW6JLhRRygOEeJit76NvTCkzD.86gGgLXJG/9oi7.K',
        '1DuPVtlTiWt9TgtS0QqY68or0sWEazsGOQzff19LGXtoSWHCsGOd8hp4JoCt', 1, 0, 'en', NULL, '2019-05-31 18:47:00',
        '2019-05-31 18:53:19'),
       (2, 'Empleado', 'Empleado', 'empleado@empleado.com',
        '$2y$10$tKuqpy4AFD78GwAKy9MxtuhblyFjvc4Ij/h19pVMbni2XrAVlvpRe',
        'VCaNm8mLC0wPYnY3FPu5nLOv8KueI5ev9wAVcxevEvYUCz9h7ByXu8QfQ71D', 1, 0, 'en', NULL, '2019-05-31 19:24:46',
        '2019-05-31 20:14:58'),
       (3, 'Cliente', 'Cliente', 'cliente@cliente.com', '$2y$10$KeDfeAZnaJKuYtwMoV1JU.XOu..b3UiU/6Cr8kevO.HNNgWo4lmzu',
        'xZ8LoeCHglhZi7Sog2FZmrZFt8Bk6kEpXGkZ0PLpZiYbV1CvsWpQ2bFOYF8w', 1, 0, 'en', '2019-06-02 19:52:39',
        '2019-05-31 20:45:42', '2019-06-02 19:52:39');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.cliente
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente`(
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `documento` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Describe el numero del documento de cada cliente, el numero es unico e irrepetible. NIT O LA CEDULA',
  `tipoDocumento` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Puede ser cedula de extranjeria, pasaprte, cedula.',
  `nombre` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nombre del cliente.',
  `telefono` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Numero de telefono o celular del cliente',
  `correo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Correo electronico del cliente. por ejemplo: juan@gmail.com',
  PRIMARY KEY (`id`),
  UNIQUE KEY `documento_UNIQUE` (`documento`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- Volcando datos para la tabla jovita.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `documento`, `tipoDocumento`, `nombre`, `telefono`, `correo`)
VALUES (1, '1252345435', 'CC', 'Prueba Cliente', '3115948080', 'cliente@gmail.com');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.detallepedido
DROP TABLE IF EXISTS `detallepedido`;
CREATE TABLE IF NOT EXISTS `detallepedido` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL COMMENT 'Proporciona la identificacion del detalle de pedido.',
  `valorTotal` int(11) DEFAULT NULL COMMENT 'Valor total generado por los insumos solicitados.',
  `estado` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Describe la situacion del detalle de pedido. pueden ser: aprobado, corregido, autorizado.',
  `pedido_id` int(10) unsigned NOT NULL,
  `producto_codigo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detallePedido_pedido1_idx` (`pedido_id`),
  KEY `fk_detallePedido_producto1_idx` (`producto_codigo`),
  CONSTRAINT `fk_detallePedido_pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  CONSTRAINT `fk_detallePedido_producto1` FOREIGN KEY (`producto_codigo`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla jovita.detallepedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detallepedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallepedido` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.detalleventa
DROP TABLE IF EXISTS `detalleventa`;
CREATE TABLE IF NOT EXISTS `detalleventa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `totalVenta` int(11) DEFAULT NULL COMMENT 'Describe el valor total vendido.',
  `cantidad` int(11) DEFAULT NULL COMMENT 'Describe el numero de unidades de cada producto que se va a vender.',
  `PrecioUnidad` int(11) DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Describe la situacion en el que se encuentra el Detalle de Venta.',
  `facturaVenta_id` int(10) unsigned NOT NULL,
  `producto_codigo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detalleVenta_facturaVenta1_idx` (`facturaVenta_id`),
  KEY `fk_detalleVenta_producto1_idx` (`producto_codigo`),
  CONSTRAINT `fk_detalleVenta_facturaVenta1` FOREIGN KEY (`facturaVenta_id`) REFERENCES `facturaventa` (`id`),
  CONSTRAINT `fk_detalleVenta_producto1` FOREIGN KEY (`producto_codigo`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla jovita.detalleventa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalleventa` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleventa` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.facturaventa
DROP TABLE IF EXISTS `facturaventa`;
CREATE TABLE IF NOT EXISTS `facturaventa`(
                                             `id`             int(10) unsigned NOT NULL AUTO_INCREMENT,
                                             `numero`         int(11)          NOT NULL COMMENT 'numero de la identificacion de la factura.',
                                             `fecha`          date DEFAULT NULL COMMENT 'Describe la fecha en que se realizo la venta. ',
                                             `estado`         varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Describe la situacion en el que esta la venta, pueden ser elaborado, enviado, aprobado, pagado, cerrado,en revision, corregido.',
                                             `cliente_id`     int(10) unsigned NOT NULL,
                                             `admin_users_id` int(10) unsigned NOT NULL,
                                             PRIMARY KEY (`id`),
                                             UNIQUE KEY `numero_UNIQUE` (`numero`),
                                             KEY `fk_facturaVenta_cliente_idx` (`cliente_id`),
                                             KEY `fk_facturaVenta_admin_users1_idx` (`admin_users_id`),
                                             CONSTRAINT `fk_facturaVenta_admin_users1` FOREIGN KEY (`admin_users_id`) REFERENCES `admin_users` (`id`),
                                             CONSTRAINT `fk_facturaVenta_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- Volcando datos para la tabla jovita.facturaventa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `facturaventa` DISABLE KEYS */;
INSERT INTO `facturaventa` (`id`, `numero`, `fecha`, `estado`, `cliente_id`, `admin_users_id`)
VALUES (1, 235345, '2019-06-10', 'ACTIVO', 1, 1);
/*!40000 ALTER TABLE `facturaventa` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.media
DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jovita.media: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations`
(
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 29
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- Volcando datos para la tabla jovita.migrations: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (1, '2017_08_24_000000_create_activations_table', 1),
       (2, '2017_08_24_000000_create_admin_activations_table', 1),
       (3, '2017_08_24_000000_create_admin_password_resets_table', 1),
       (4, '2017_08_24_000000_create_admin_users_table', 1),
       (5, '2018_07_18_000000_create_wysiwyg_media_table', 1),
       (6, '2019_05_31_184611_create_media_table', 1),
       (7, '2019_05_31_184611_create_permission_tables', 1),
       (8, '2019_05_31_184616_fill_default_admin_user_and_permissions', 1),
       (9, '2019_05_31_184611_create_translations_table', 2),
       (10, '2019_05_31_185350_fill_permissions_for_role', 3),
       (11, '2019_05_31_191258_fill_permissions_for_cliente', 4),
       (12, '2019_05_31_201553_fill_permissions_for_detallepedido', 5),
       (13, '2019_05_31_201657_fill_permissions_for_detalleventum', 6),
       (14, '2019_05_31_201726_fill_permissions_for_facturaventum', 7),
       (15, '2019_05_31_201807_fill_permissions_for_ofreproveedor', 8),
       (16, '2019_05_31_201852_fill_permissions_for_pedido', 9),
       (17, '2019_05_31_201912_fill_permissions_for_producto', 10),
       (18, '2019_05_31_201936_fill_permissions_for_productoproveedor', 11),
       (19, '2019_05_31_201946_fill_permissions_for_proveedor', 12),
       (20, '2019_05_31_204716_fill_permissions_for_model-has-permission', 13),
       (21, '2019_06_02_220248_fill_permissions_for_proveedor', 14),
       (22, '2019_06_02_220327_fill_permissions_for_productoproveedor', 15),
       (23, '2019_06_02_220402_fill_permissions_for_ofreproveedor', 16),
       (24, '2019_06_02_224140_fill_permissions_for_facturaventum', 17),
       (25, '2019_06_02_224205_fill_permissions_for_pedido', 18),
       (26, '2019_06_03_003814_fill_permissions_for_detallepedido', 19),
       (27, '2019_06_03_004447_fill_permissions_for_detallepedido', 20),
       (28, '2019_06_03_004514_fill_permissions_for_detalleventum', 21);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.model_has_permissions
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions`
(
    `id`            int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `permission_id` int(10) unsigned                        NOT NULL,
    `model_type`    varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `model_id`      bigint(20) unsigned                     NOT NULL,
    PRIMARY KEY (`permission_id`, `model_id`, `model_type`),
    KEY `model_has_permissions_model_id_model_type_index` (`model_id`, `model_type`),
    KEY `id` (`id`),
    CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- Volcando datos para la tabla jovita.model_has_permissions: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` (`id`, `permission_id`, `model_type`, `model_id`)
VALUES (1, 1, 'Brackets\\AdminAuth\\Models\\AdminUser', 2),
       (6, 16, 'Brackets\\AdminAuth\\Models\\AdminUser', 2);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.model_has_roles
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jovita.model_has_roles: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`)
VALUES (1, 'Brackets\\AdminAuth\\Models\\AdminUser', 1),
       (2, 'Brackets\\AdminAuth\\Models\\AdminUser', 2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.ofreproveedor
DROP TABLE IF EXISTS `ofreproveedor`;
CREATE TABLE IF NOT EXISTS `ofreproveedor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identificacion` int(11) NOT NULL,
  `descuento` int(11) DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidad` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `proveedor_id` int(10) unsigned NOT NULL,
  `insumo_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identificacion_UNIQUE` (`identificacion`),
  KEY `fk_ofreProveedor_proveedor1_idx` (`proveedor_id`),
  CONSTRAINT `fk_ofreProveedor_proveedor1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla jovita.ofreproveedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ofreproveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `ofreproveedor` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.pedido
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido`(
                                       `id`             int(10) unsigned NOT NULL AUTO_INCREMENT,
                                       `numeroPedido`   int(11)          NOT NULL COMMENT 'Describe la identificacion del pedido.',
                                       `estado`         varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Describe la situacion en el que se encuentra el pedido. como: aprobado, revisado,enviado,corregido,cerrado.',
                                       `fecha`          date DEFAULT NULL COMMENT 'Fecha en el cual se realizo el pedido.',
                                       `proveedor_id`   int(10) unsigned NOT NULL,
                                       `admin_users_id` int(10) unsigned NOT NULL,
                                       PRIMARY KEY (`id`),
                                       UNIQUE KEY `numeroPedido_UNIQUE` (`numeroPedido`),
                                       KEY `fk_pedido_proveedor1_idx` (`proveedor_id`),
                                       KEY `fk_pedido_admin_users1_idx` (`admin_users_id`),
                                       CONSTRAINT `fk_pedido_admin_users1` FOREIGN KEY (`admin_users_id`) REFERENCES `admin_users` (`id`),
                                       CONSTRAINT `fk_pedido_proveedor1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- Volcando datos para la tabla jovita.pedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`id`, `numeroPedido`, `estado`, `fecha`, `proveedor_id`, `admin_users_id`)
VALUES (1, 25345245, 'ACTIVO', '2019-06-03', 1, 1);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions`
(
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 76
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- Volcando datos para la tabla jovita.permissions: ~75 rows (aproximadamente)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES (1, 'admin', 'admin', '2019-05-31 18:47:00', '2019-05-31 18:47:00'),
	(2, 'admin.translation.index', 'admin', '2019-05-31 18:47:00', '2019-05-31 18:47:00'),
	(3, 'admin.translation.edit', 'admin', '2019-05-31 18:47:00', '2019-05-31 18:47:00'),
	(4, 'admin.translation.rescan', 'admin', '2019-05-31 18:47:00', '2019-05-31 18:47:00'),
       (5, 'admin.admin-user.index', 'admin', '2019-05-31 18:47:00', '2019-05-31 18:47:00'),
       (6, 'admin.admin-user.create', 'admin', '2019-05-31 18:47:00', '2019-05-31 18:47:00'),
       (7, 'admin.admin-user.edit', 'admin', '2019-05-31 18:47:00', '2019-05-31 18:47:00'),
       (8, 'admin.admin-user.delete', 'admin', '2019-05-31 18:47:00', '2019-05-31 18:47:00'),
       (9, 'admin.upload', 'admin', '2019-05-31 18:47:00', '2019-05-31 18:47:00'),
       (10, 'admin.role', 'admin', '2019-05-31 18:53:53', '2019-05-31 18:53:53'),
       (11, 'admin.role.index', 'admin', '2019-05-31 18:53:53', '2019-05-31 18:53:53'),
       (12, 'admin.role.create', 'admin', '2019-05-31 18:53:53', '2019-05-31 18:53:53'),
       (13, 'admin.role.show', 'admin', '2019-05-31 18:53:53', '2019-05-31 18:53:53'),
       (14, 'admin.role.edit', 'admin', '2019-05-31 18:53:53', '2019-05-31 18:53:53'),
       (15, 'admin.role.delete', 'admin', '2019-05-31 18:53:53', '2019-05-31 18:53:53'),
       (16, 'admin.cliente', 'admin', '2019-05-31 19:13:01', '2019-05-31 19:13:01'),
       (17, 'admin.cliente.index', 'admin', '2019-05-31 19:13:01', '2019-05-31 19:13:01'),
       (18, 'admin.cliente.create', 'admin', '2019-05-31 19:13:01', '2019-05-31 19:13:01'),
       (19, 'admin.cliente.show', 'admin', '2019-05-31 19:13:01', '2019-05-31 19:13:01'),
       (20, 'admin.cliente.edit', 'admin', '2019-05-31 19:13:01', '2019-05-31 19:13:01'),
       (21, 'admin.cliente.delete', 'admin', '2019-05-31 19:13:01', '2019-05-31 19:13:01'),
       (22, 'admin.detallepedido', 'admin', '2019-05-31 20:15:57', '2019-05-31 20:15:57'),
       (23, 'admin.detallepedido.index', 'admin', '2019-05-31 20:15:57', '2019-05-31 20:15:57'),
       (24, 'admin.detallepedido.create', 'admin', '2019-05-31 20:15:57', '2019-05-31 20:15:57'),
       (25, 'admin.detallepedido.show', 'admin', '2019-05-31 20:15:57', '2019-05-31 20:15:57'),
       (26, 'admin.detallepedido.edit', 'admin', '2019-05-31 20:15:57', '2019-05-31 20:15:57'),
       (27, 'admin.detallepedido.delete', 'admin', '2019-05-31 20:15:57', '2019-05-31 20:15:57'),
       (28, 'admin.detalleventum', 'admin', '2019-05-31 20:17:00', '2019-05-31 20:17:00'),
       (29, 'admin.detalleventum.index', 'admin', '2019-05-31 20:17:00', '2019-05-31 20:17:00'),
       (30, 'admin.detalleventum.create', 'admin', '2019-05-31 20:17:00', '2019-05-31 20:17:00'),
       (31, 'admin.detalleventum.show', 'admin', '2019-05-31 20:17:00', '2019-05-31 20:17:00'),
       (32, 'admin.detalleventum.edit', 'admin', '2019-05-31 20:17:00', '2019-05-31 20:17:00'),
       (33, 'admin.detalleventum.delete', 'admin', '2019-05-31 20:17:00', '2019-05-31 20:17:00'),
       (34, 'admin.facturaventum', 'admin', '2019-05-31 20:17:30', '2019-05-31 20:17:30'),
       (35, 'admin.facturaventum.index', 'admin', '2019-05-31 20:17:30', '2019-05-31 20:17:30'),
       (36, 'admin.facturaventum.create', 'admin', '2019-05-31 20:17:30', '2019-05-31 20:17:30'),
       (37, 'admin.facturaventum.show', 'admin', '2019-05-31 20:17:30', '2019-05-31 20:17:30'),
       (38, 'admin.facturaventum.edit', 'admin', '2019-05-31 20:17:30', '2019-05-31 20:17:30'),
       (39, 'admin.facturaventum.delete', 'admin', '2019-05-31 20:17:30', '2019-05-31 20:17:30'),
       (40, 'admin.ofreproveedor', 'admin', '2019-05-31 20:18:12', '2019-05-31 20:18:12'),
       (41, 'admin.ofreproveedor.index', 'admin', '2019-05-31 20:18:12', '2019-05-31 20:18:12'),
       (42, 'admin.ofreproveedor.create', 'admin', '2019-05-31 20:18:12', '2019-05-31 20:18:12'),
       (43, 'admin.ofreproveedor.show', 'admin', '2019-05-31 20:18:12', '2019-05-31 20:18:12'),
       (44, 'admin.ofreproveedor.edit', 'admin', '2019-05-31 20:18:12', '2019-05-31 20:18:12'),
       (45, 'admin.ofreproveedor.delete', 'admin', '2019-05-31 20:18:12', '2019-05-31 20:18:12'),
       (46, 'admin.pedido', 'admin', '2019-05-31 20:18:56', '2019-05-31 20:18:56'),
       (47, 'admin.pedido.index', 'admin', '2019-05-31 20:18:56', '2019-05-31 20:18:56'),
       (48, 'admin.pedido.create', 'admin', '2019-05-31 20:18:56', '2019-05-31 20:18:56'),
       (49, 'admin.pedido.show', 'admin', '2019-05-31 20:18:56', '2019-05-31 20:18:56'),
       (50, 'admin.pedido.edit', 'admin', '2019-05-31 20:18:56', '2019-05-31 20:18:56'),
       (51, 'admin.pedido.delete', 'admin', '2019-05-31 20:18:56', '2019-05-31 20:18:56'),
       (52, 'admin.producto', 'admin', '2019-05-31 20:19:14', '2019-05-31 20:19:14'),
       (53, 'admin.producto.index', 'admin', '2019-05-31 20:19:14', '2019-05-31 20:19:14'),
       (54, 'admin.producto.create', 'admin', '2019-05-31 20:19:14', '2019-05-31 20:19:14'),
       (55, 'admin.producto.show', 'admin', '2019-05-31 20:19:14', '2019-05-31 20:19:14'),
       (56, 'admin.producto.edit', 'admin', '2019-05-31 20:19:14', '2019-05-31 20:19:14'),
       (57, 'admin.producto.delete', 'admin', '2019-05-31 20:19:14', '2019-05-31 20:19:14'),
       (58, 'admin.productoproveedor', 'admin', '2019-05-31 20:19:39', '2019-05-31 20:19:39'),
       (59, 'admin.productoproveedor.index', 'admin', '2019-05-31 20:19:39', '2019-05-31 20:19:39'),
       (60, 'admin.productoproveedor.create', 'admin', '2019-05-31 20:19:39', '2019-05-31 20:19:39'),
       (61, 'admin.productoproveedor.show', 'admin', '2019-05-31 20:19:39', '2019-05-31 20:19:39'),
       (62, 'admin.productoproveedor.edit', 'admin', '2019-05-31 20:19:39', '2019-05-31 20:19:39'),
	(63, 'admin.productoproveedor.delete', 'admin', '2019-05-31 20:19:39', '2019-05-31 20:19:39'),
	(64, 'admin.proveedor', 'admin', '2019-05-31 20:19:49', '2019-05-31 20:19:49'),
	(65, 'admin.proveedor.index', 'admin', '2019-05-31 20:19:49', '2019-05-31 20:19:49'),
	(66, 'admin.proveedor.create', 'admin', '2019-05-31 20:19:49', '2019-05-31 20:19:49'),
	(67, 'admin.proveedor.show', 'admin', '2019-05-31 20:19:49', '2019-05-31 20:19:49'),
	(68, 'admin.proveedor.edit', 'admin', '2019-05-31 20:19:49', '2019-05-31 20:19:49'),
       (69, 'admin.proveedor.delete', 'admin', '2019-05-31 20:19:49', '2019-05-31 20:19:49'),
       (70, 'admin.model-has-permission', 'admin', '2019-05-31 20:47:19', '2019-05-31 20:47:19'),
       (71, 'admin.model-has-permission.index', 'admin', '2019-05-31 20:47:19', '2019-05-31 20:47:19'),
       (72, 'admin.model-has-permission.create', 'admin', '2019-05-31 20:47:19', '2019-05-31 20:47:19'),
       (73, 'admin.model-has-permission.show', 'admin', '2019-05-31 20:47:19', '2019-05-31 20:47:19'),
       (74, 'admin.model-has-permission.edit', 'admin', '2019-05-31 20:47:19', '2019-05-31 20:47:19'),
       (75, 'admin.model-has-permission.delete', 'admin', '2019-05-31 20:47:19', '2019-05-31 20:47:19');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.producto
DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto`
(
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificacion unica de cada producto.',
  `codigo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nombre del producto.',
  `unidad` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Unidad de medida de cada producto, por ejemplo:                   Litros.                                                                                       Gramos.',
  `precioP` int(11) DEFAULT NULL COMMENT 'Decribe el precio por unidad del producto. ',
  `estado` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Describe la situacion del producto, por ejemplo: agotado, disponible, descontinuado, critico , stockminimo.',
  `existencia` int(11) DEFAULT NULL COMMENT 'Describe el numero de existencias correspondiente a un producto.  por ejemplo 30 botellas de miel.',
  `tipo` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'VENTA' COMMENT 'Define si el producto es un insumo o es para venta',
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- Volcando datos para la tabla jovita.producto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id`, `codigo`, `nombre`, `unidad`, `precioP`, `estado`, `existencia`, `tipo`)
VALUES (1, 'GA7020', 'Miel', 'Litro', 25000, 'ACTIVO', 2, 'Producto');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.productoproveedor
DROP TABLE IF EXISTS `productoproveedor`;
CREATE TABLE IF NOT EXISTS `productoproveedor` (
                                                   `id`           int(10) unsigned NOT NULL AUTO_INCREMENT,
                                                   `producto_id`  int(10) unsigned NOT NULL,
                                                   `proveedor_id` int(10) unsigned NOT NULL,
                                                   PRIMARY KEY (`id`),
                                                   KEY `fk_productoProveedor_producto1_idx` (`producto_id`),
                                                   KEY `fk_productoProveedor_proveedor1_idx` (`proveedor_id`),
                                                   CONSTRAINT `fk_productoProveedor_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
                                                   CONSTRAINT `fk_productoProveedor_proveedor1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- Volcando datos para la tabla jovita.productoproveedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productoproveedor` DISABLE KEYS */;
INSERT INTO `productoproveedor` (`id`, `producto_id`, `proveedor_id`)
VALUES (1, 1, 1);
/*!40000 ALTER TABLE `productoproveedor` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.proveedor
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor`
(
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL COMMENT 'Identificacion del proveedor.',
  `empresa` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nombre de la  empresa.',
  `representante` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nombre del representante de la empresa.',
  `estado` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Situacion en que se encuentra el proveedor.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- Volcando datos para la tabla jovita.proveedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` (`id`, `codigo`, `empresa`, `representante`, `estado`)
VALUES (1, 1234, 'Jovita', 'Jovita representante', 'ACTIVO');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles`
(
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- Volcando datos para la tabla jovita.roles: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin', '2019-05-31 18:47:00', '2019-05-31 18:47:00'),
    (2, 'Empleado', 'emp', '2019-05-31 18:58:08', '2019-05-31 18:58:08');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.role_has_permissions
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jovita.role_has_permissions: ~75 rows (aproximadamente)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`)
VALUES (1, 1),
       (2, 1),
       (3, 1),
       (4, 1),
       (5, 1),
       (6, 1),
       (7, 1),
       (8, 1),
       (9, 1),
       (10, 1),
       (11, 1),
       (12, 1),
       (13, 1),
       (14, 1),
       (15, 1),
       (16, 1),
       (17, 1),
       (18, 1),
       (19, 1),
       (20, 1),
       (21, 1),
       (22, 1),
       (23, 1),
       (24, 1),
       (25, 1),
       (26, 1),
       (27, 1),
       (28, 1),
       (29, 1),
       (30, 1),
       (31, 1),
       (32, 1),
       (33, 1),
       (34, 1),
       (35, 1),
       (36, 1),
       (37, 1),
       (38, 1),
       (39, 1),
       (40, 1),
       (41, 1),
       (42, 1),
       (43, 1),
       (44, 1),
       (45, 1),
       (46, 1),
       (47, 1),
       (48, 1),
       (49, 1),
       (50, 1),
       (51, 1),
       (52, 1),
       (53, 1),
       (54, 1),
       (55, 1),
       (56, 1),
       (57, 1),
       (58, 1),
       (59, 1),
       (60, 1),
       (61, 1),
       (62, 1),
       (63, 1),
       (64, 1),
       (65, 1),
       (66, 1),
       (67, 1),
       (68, 1),
       (69, 1),
       (70, 1),
       (71, 1),
       (72, 1),
       (73, 1),
       (74, 1),
       (75, 1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.translations
DROP TABLE IF EXISTS `translations`;
CREATE TABLE IF NOT EXISTS `translations`
(
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
) ENGINE = InnoDB
  AUTO_INCREMENT = 176
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- Volcando datos para la tabla jovita.translations: ~172 rows (aproximadamente)
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
INSERT INTO `translations` (`id`, `namespace`, `group`, `key`, `text`, `metadata`, `created_at`, `updated_at`,
                            `deleted_at`)
VALUES (1, 'brackets/admin-ui', 'admin', 'operation.succeeded', '{
  "en": "Operación exitosa"
}', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (2, 'brackets/admin-ui', 'admin', 'operation.failed', '{
         "en": "Operación fallida"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (3, 'brackets/admin-ui', 'admin', 'operation.not_allowed', '{
         "en": "Operación no permitida"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (4, '*', 'admin', 'admin-user.columns.first_name', '{
         "en": "Nombres"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (5, '*', 'admin', 'admin-user.columns.last_name', '{
         "en": "Apellidos"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (6, '*', 'admin', 'admin-user.columns.email', '[]', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (7, '*', 'admin', 'admin-user.columns.password', '{
         "en": "Contraseña"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (8, '*', 'admin', 'admin-user.columns.password_repeat', '{
         "en": "Confirmar contraseña"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (9, '*', 'admin', 'admin-user.columns.activated', '{
         "en": "Activado"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (10, '*', 'admin', 'admin-user.columns.forbidden', '{
         "en": "Olvidar"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (11, '*', 'admin', 'admin-user.columns.language', '{
         "en": "Lenguaje"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (12, 'brackets/admin-ui', 'admin', 'forms.select_an_option', '{
         "en": "Seleccionar una opción"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (13, '*', 'admin', 'admin-user.columns.roles', '[]', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (14, 'brackets/admin-ui', 'admin', 'forms.select_options', '{
         "en": "Seleccionar opciones"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (15, '*', 'admin', 'admin-user.actions.create', '{
         "en": "Nuevo usuario"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (16, 'brackets/admin-ui', 'admin', 'btn.save', '{
         "en": "Guardar"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (17, '*', 'admin', 'admin-user.actions.edit', '{
         "en": "Editar usuario"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (18, '*', 'admin', 'admin-user.actions.index', '{
         "en": "Usuarios"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (19, 'brackets/admin-ui', 'admin', 'placeholder.search', '{
         "en": "Buscar"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (20, 'brackets/admin-ui', 'admin', 'btn.search', '{
         "en": "Buscar"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (21, '*', 'admin', 'admin-user.columns.id', '[]', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (22, 'brackets/admin-ui', 'admin', 'btn.edit', '{
         "en": "Editar"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (23, 'brackets/admin-ui', 'admin', 'btn.delete', '{
         "en": "Eliminar"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (24, 'brackets/admin-ui', 'admin', 'pagination.overview', '{
         "en": "Mostrando de {{ pagination.state.from }} a {{ pagination.state.to }} items de un total de {{ pagination.state.total }} items."
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (25, 'brackets/admin-ui', 'admin', 'index.no_items', '{
         "en": "No se pudo encontrar ningún item"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (26, 'brackets/admin-ui', 'admin', 'index.try_changing_items', '{
         "en": "Intenta cambiar los filtros o añadir uno nuevo"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (27, 'brackets/admin-ui', 'admin', 'btn.new', '{
         "en": "Nuevo"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (28, 'brackets/admin-ui', 'admin', 'profile_dropdown.account', '{
         "en": "Cuenta"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (29, 'brackets/admin-auth', 'admin', 'profile_dropdown.logout', '{
         "en": "Cerrar sesión"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (30, 'brackets/admin-ui', 'admin', 'sidebar.content', '{
         "en": "Menu"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (31, 'brackets/admin-ui', 'admin', 'sidebar.settings', '{
         "en": "Configuración"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (32, '*', 'admin', 'admin-user.actions.edit_password', '{
         "en": "Editar contraseña"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (33, '*', 'admin', 'admin-user.actions.edit_profile', '{
         "en": "Editar perfil"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (34, 'brackets/admin-auth', 'activations', 'email.line', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (35, 'brackets/admin-auth', 'activations', 'email.action', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (36, 'brackets/admin-auth', 'activations', 'email.notRequested', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (37, 'brackets/admin-auth', 'admin', 'activations.activated', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (38, 'brackets/admin-auth', 'admin', 'activations.invalid_request', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (39, 'brackets/admin-auth', 'admin', 'activations.disabled', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (40, 'brackets/admin-auth', 'admin', 'activations.sent', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (41, 'brackets/admin-auth', 'admin', 'passwords.sent', '[]', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53',
        NULL),
       (42, 'brackets/admin-auth', 'admin', 'passwords.reset', '[]', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53',
        NULL),
       (43, 'brackets/admin-auth', 'admin', 'passwords.invalid_token', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (44, 'brackets/admin-auth', 'admin', 'passwords.invalid_user', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (45, 'brackets/admin-auth', 'admin', 'passwords.invalid_password', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (46, 'brackets/admin-auth', 'admin', 'activation_form.title', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (47, 'brackets/admin-auth', 'admin', 'activation_form.note', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (48, 'brackets/admin-auth', 'admin', 'auth_global.email', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (49, 'brackets/admin-auth', 'admin', 'activation_form.button', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (50, 'brackets/admin-auth', 'admin', 'login.title', '{
         "en": "Ingresar"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (51, 'brackets/admin-auth', 'admin', 'login.sign_in_text', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (52, 'brackets/admin-auth', 'admin', 'auth_global.password', '{
         "en": "Contraseña"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (53, 'brackets/admin-auth', 'admin', 'login.button', '{
         "en": "Ingresar"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (54, 'brackets/admin-auth', 'admin', 'login.forgot_password', '{
         "en": "Olvido su contraseña?"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (55, 'brackets/admin-auth', 'admin', 'forgot_password.title', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (56, 'brackets/admin-auth', 'admin', 'forgot_password.note', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (57, 'brackets/admin-auth', 'admin', 'forgot_password.button', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (58, 'brackets/admin-auth', 'admin', 'password_reset.title', '{
         "en": "Restaurar contraseña"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (59, 'brackets/admin-auth', 'admin', 'password_reset.note', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (60, 'brackets/admin-auth', 'admin', 'auth_global.password_confirm', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (61, 'brackets/admin-auth', 'admin', 'password_reset.button', '[]', NULL, '2019-05-31 18:47:09',
        '2019-06-03 00:48:53', NULL),
       (62, '*', '*', 'Manage access', '{
         "en": "Usuarios"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (63, '*', '*', 'Translations', '{
         "en": "Diccionario"
       }', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (64, '*', '*', 'Configuration', '[]', NULL, '2019-05-31 18:47:09', '2019-06-03 00:48:53', NULL),
       (65, '*', 'admin', 'cliente.columns.documento', '[]', NULL, '2019-05-31 20:30:35', '2019-06-03 00:48:53', NULL),
       (66, '*', 'admin', 'cliente.columns.tipoDocumento', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (67, '*', 'admin', 'cliente.columns.nombre', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (68, '*', 'admin', 'cliente.columns.telefono', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (69, '*', 'admin', 'cliente.columns.correo', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (70, '*', 'admin', 'cliente.actions.create', '{
         "en": "Nuevo cliente"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (71, '*', 'admin', 'cliente.actions.edit', '{
         "en": "Editar cliente"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (72, '*', 'admin', 'cliente.actions.index', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (73, '*', 'admin', 'cliente.columns.id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (74, '*', 'admin', 'detallepedido.columns.consecutivo', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        '2019-06-03 00:48:53'),
       (75, '*', 'admin', 'detallepedido.columns.cantidad', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (76, '*', 'admin', 'detallepedido.columns.valorTotal', '{
         "en": "Valor total"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (77, '*', 'admin', 'detallepedido.columns.estado', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (78, '*', 'admin', 'detallepedido.columns.pedido_id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (79, '*', 'admin', 'detallepedido.columns.producto_codigo', '{
         "en": "Producto código"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (80, '*', 'admin', 'detallepedido.actions.create', '{
         "en": "Nuevo detalle pedido"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (81, '*', 'admin', 'detallepedido.actions.edit', '{
         "en": "Editar detalle pedido"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (82, '*', 'admin', 'detallepedido.actions.index', '{
         "en": "Detalle pedido"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (83, '*', 'admin', 'detallepedido.columns.id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (84, '*', 'admin', 'detalleventum.columns.consecutivo', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        '2019-06-03 00:48:53'),
       (85, '*', 'admin', 'detalleventum.columns.totalVenta', '{
         "en": "Total Venta"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (86, '*', 'admin', 'detalleventum.columns.cantidad', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (87, '*', 'admin', 'detalleventum.columns.PrecioUnidad', '{
         "en": "Precio Unidad"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (88, '*', 'admin', 'detalleventum.columns.estado', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (89, '*', 'admin', 'detalleventum.columns.facturaVenta_id', '{
         "en": "Factura de Venta"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (90, '*', 'admin', 'detalleventum.columns.producto_codigo', '[]', NULL, '2019-05-31 20:30:36',
        '2019-06-03 00:48:53', NULL),
       (91, '*', 'admin', 'detalleventum.actions.create', '{
         "en": "Nuevo detalle de venta"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (92, '*', 'admin', 'detalleventum.actions.edit', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (93, '*', 'admin', 'detalleventum.actions.index', '{
         "en": "Detalle de venta"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (94, '*', 'admin', 'detalleventum.columns.id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (95, '*', 'admin', 'facturaventum.columns.numero', '{
         "en": "Número"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (96, '*', 'admin', 'facturaventum.columns.fecha', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (97, 'brackets/admin-ui', 'admin', 'forms.select_a_date', '[]', NULL, '2019-05-31 20:30:36',
        '2019-06-03 00:48:53', NULL),
       (98, '*', 'admin', 'facturaventum.columns.estado', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (99, '*', 'admin', 'facturaventum.columns.cliente_id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (100, '*', 'admin', 'facturaventum.columns.usuario_id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-02 22:44:32',
        '2019-06-02 22:44:32'),
       (101, '*', 'admin', 'facturaventum.actions.create', '{
         "en": "Nueva factura"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (102, '*', 'admin', 'facturaventum.actions.edit', '{
         "en": "Editar factura"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (103, '*', 'admin', 'facturaventum.actions.index', '{
         "en": "Factura de venta"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (104, '*', 'admin', 'facturaventum.columns.id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (105, '*', 'admin', 'cliente.title', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (106, '*', 'admin', 'detallepedido.title', '{
         "en": "Detalle pedido"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (107, '*', 'admin', 'detalleventum.title', '{
         "en": "Detalle de venta"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (108, '*', 'admin', 'facturaventum.title', '{
         "en": "Factura de venta"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (109, '*', 'admin', 'ofreproveedor.title', '{
         "en": "Ofertas proveedor"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (110, '*', 'admin', 'pedido.title', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (111, '*', 'admin', 'producto.title', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (112, '*', 'admin', 'productoproveedor.title', '{
         "en": "Productos del proveedor"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (113, '*', 'admin', 'proveedor.title', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (114, '*', 'admin', 'role.title', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (115, '*', 'admin', 'ofreproveedor.columns.identificacion', '{
         "en": "Identificación"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (116, '*', 'admin', 'ofreproveedor.columns.descuento', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (117, '*', 'admin', 'ofreproveedor.columns.estado', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (118, '*', 'admin', 'ofreproveedor.columns.unidad', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (119, '*', 'admin', 'ofreproveedor.columns.precio', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (120, '*', 'admin', 'ofreproveedor.columns.proveedor_id', '[]', NULL, '2019-05-31 20:30:36',
        '2019-06-03 00:48:53', NULL),
       (121, '*', 'admin', 'ofreproveedor.columns.insumo_id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (122, '*', 'admin', 'ofreproveedor.actions.create', '{
         "en": "Nueva oferta proveedor"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (123, '*', 'admin', 'ofreproveedor.actions.edit', '{
         "en": "Editar proveedor"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (124, '*', 'admin', 'ofreproveedor.actions.index', '{
         "en": "Ofertas proveedor"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (125, '*', 'admin', 'ofreproveedor.columns.id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (126, '*', 'admin', 'pedido.columns.numeroPedido', '{
         "en": "Número de pedido"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (127, '*', 'admin', 'pedido.columns.estado', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (128, '*', 'admin', 'pedido.columns.fecha', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (129, '*', 'admin', 'pedido.columns.proveedor_id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (130, '*', 'admin', 'pedido.columns.usuario_id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-02 22:44:32',
        '2019-06-02 22:44:32'),
       (131, '*', 'admin', 'pedido.actions.create', '{
         "en": "Nuevo pedido"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (132, '*', 'admin', 'pedido.actions.edit', '{
         "en": "Editar pedido"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (133, '*', 'admin', 'pedido.actions.index', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (134, '*', 'admin', 'pedido.columns.id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (135, '*', 'admin', 'producto.columns.codigo', '{
         "en": "Código"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (136, '*', 'admin', 'producto.columns.nombre', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (137, '*', 'admin', 'producto.columns.unidad', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (138, '*', 'admin', 'producto.columns.precioP', '{
         "en": "Precio"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (139, '*', 'admin', 'producto.columns.estado', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (140, '*', 'admin', 'producto.columns.existencia', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (141, '*', 'admin', 'producto.columns.tipo', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (142, '*', 'admin', 'producto.actions.create', '{
         "en": "Nuevo producto"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (143, '*', 'admin', 'producto.actions.edit', '{
         "en": "Editar producto"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (144, '*', 'admin', 'producto.actions.index', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (145, '*', 'admin', 'producto.columns.id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (146, '*', 'admin', 'productoproveedor.columns.producto_id', '[]', NULL, '2019-05-31 20:30:36',
        '2019-06-03 00:48:53', NULL),
       (147, '*', 'admin', 'productoproveedor.columns.ofreProveedor_id', '{
         "en": "Oferta proveedor"
       }', NULL, '2019-05-31 20:30:36', '2019-06-02 22:07:19', '2019-06-02 22:07:19'),
       (148, '*', 'admin', 'productoproveedor.actions.create', '{
         "en": "Nuevo producto proveedor"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (149, '*', 'admin', 'productoproveedor.actions.edit', '{
         "en": "Editar producto proveedor"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (150, '*', 'admin', 'productoproveedor.actions.index', '{
         "en": "Producto proveedor"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (151, '*', 'admin', 'productoproveedor.columns.id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (152, '*', 'admin', 'proveedor.columns.codigo', '{
         "en": "Código"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (153, '*', 'admin', 'proveedor.columns.empresa', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (154, '*', 'admin', 'proveedor.columns.representante', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53',
        NULL),
       (155, '*', 'admin', 'proveedor.columns.estado', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (156, '*', 'admin', 'proveedor.actions.create', '{
         "en": "Nuevo proveedor"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (157, '*', 'admin', 'proveedor.actions.edit', '{
         "en": "Editar proveedor"
       }', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (158, '*', 'admin', 'proveedor.actions.index', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (159, '*', 'admin', 'proveedor.columns.id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (160, '*', 'admin', 'role.columns.name', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (161, '*', 'admin', 'role.columns.guard_name', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (162, '*', 'admin', 'role.actions.create', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (163, '*', 'admin', 'role.actions.edit', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (164, '*', 'admin', 'role.actions.index', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (165, '*', 'admin', 'role.columns.id', '[]', NULL, '2019-05-31 20:30:36', '2019-06-03 00:48:53', NULL),
       (166, '*', 'admin', 'model-has-permission.title', '{
         "en": "Permisos"
       }', NULL, '2019-06-01 03:27:53', '2019-06-03 00:48:53', NULL),
       (167, '*', 'admin', 'model-has-permission.columns.permission_id', '{
         "en": "Persimo"
       }', NULL, '2019-06-01 03:27:53', '2019-06-03 00:48:53', NULL),
       (168, '*', 'admin', 'model-has-permission.columns.model_type', '[]', NULL, '2019-06-01 03:27:53',
        '2019-06-03 00:48:53', NULL),
       (169, '*', 'admin', 'model-has-permission.columns.model_id', '{
         "en": "Rol"
       }', NULL, '2019-06-01 03:27:53', '2019-06-03 00:48:53', NULL),
       (170, '*', 'admin', 'model-has-permission.actions.create', '{
         "en": "Nuevo permiso"
       }', NULL, '2019-06-01 03:27:53', '2019-06-03 00:48:53', NULL),
       (171, '*', 'admin', 'model-has-permission.actions.edit', '{
         "en": "Editar :name"
       }', NULL, '2019-06-01 03:27:53', '2019-06-03 00:48:53', NULL),
       (172, '*', 'admin', 'model-has-permission.actions.index', '{
         "en": "Permisos"
       }', NULL, '2019-06-01 03:27:53', '2019-06-03 00:48:53', NULL),
       (173, '*', 'admin', 'productoproveedor.columns.proveedor_id', '{
         "en": "Proveedor"
       }', NULL, '2019-06-02 22:07:19', '2019-06-03 00:48:53', NULL),
       (174, '*', 'admin', 'facturaventum.columns.admin_users_id', '{
         "en": "Usuario"
       }', NULL, '2019-06-02 22:44:32', '2019-06-03 00:48:53', NULL),
       (175, '*', 'admin', 'pedido.columns.admin_users_id', '{
         "en": "Usuario"
       }', NULL, '2019-06-02 22:44:32', '2019-06-03 00:48:53', NULL);
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;

-- Volcando estructura para tabla jovita.wysiwyg_media
DROP TABLE IF EXISTS `wysiwyg_media`;
CREATE TABLE IF NOT EXISTS `wysiwyg_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wysiwygable_id` int(10) unsigned DEFAULT NULL,
  `wysiwygable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wysiwyg_media_wysiwygable_id_index` (`wysiwygable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jovita.wysiwyg_media: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `wysiwyg_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `wysiwyg_media` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
