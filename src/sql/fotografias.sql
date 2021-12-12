CREATE TABLE IF NOT EXISTS `fotografias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_fichero` varchar(255) NOT NULL,
  `id_servicio` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4