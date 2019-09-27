/*
 Navicat MySQL Data Transfer

 Source Server         : wennec
 Source Server Type    : MySQL
 Source Server Version : 80017
 Source Host           : localhost:3306
 Source Schema         : wennec

 Target Server Type    : MySQL
 Target Server Version : 80017
 File Encoding         : 65001

 Date: 27/09/2019 18:21:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2017_06_05_165998_create_role_table', 1);
INSERT INTO `migrations` VALUES (2, '2017_06_05_166100_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_24_102754_create_planes_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
INSERT INTO `password_resets` VALUES ('efrainvergara.udec@gmail.com', '$2y$10$9AZgZ90/.9PX4HUuRQ99luRBs0L0srtZ.OjesjEfyLMOEqVap9xC2', '2019-08-30 17:56:44');
COMMIT;

-- ----------------------------
-- Table structure for tbl_acudiente
-- ----------------------------
DROP TABLE IF EXISTS `tbl_acudiente`;
CREATE TABLE `tbl_acudiente` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tipo_documento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `parentesco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `FK_estudianteId` int(11) DEFAULT NULL,
  `FK_usuarioId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `FK_estudianteId` (`FK_estudianteId`) USING BTREE,
  KEY `FK_usuarioId` (`FK_usuarioId`) USING BTREE,
  CONSTRAINT `tbl_acudiente_ibfk_1` FOREIGN KEY (`FK_estudianteId`) REFERENCES `tbl_estudiante` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_acudiente_ibfk_2` FOREIGN KEY (`FK_usuarioId`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_acudiente
-- ----------------------------
BEGIN;
INSERT INTO `tbl_acudiente` VALUES (1, NULL, NULL, NULL, NULL, NULL, 1, 11, NULL, NULL);
INSERT INTO `tbl_acudiente` VALUES (2, '25675432', 'CC', 'Madre', '3214567897', 'faca', 5, 39, '2019-09-24 10:55:07', '2019-09-24 10:55:07');
COMMIT;

-- ----------------------------
-- Table structure for tbl_agenda
-- ----------------------------
DROP TABLE IF EXISTS `tbl_agenda`;
CREATE TABLE `tbl_agenda` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_agenda` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `PK_id` (`PK_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_agenda
-- ----------------------------
BEGIN;
INSERT INTO `tbl_agenda` VALUES (1, 'Excusas');
INSERT INTO `tbl_agenda` VALUES (2, 'Permisos');
INSERT INTO `tbl_agenda` VALUES (3, 'Comunicaciones Diarias');
COMMIT;

-- ----------------------------
-- Table structure for tbl_agendaestudiante
-- ----------------------------
DROP TABLE IF EXISTS `tbl_agendaestudiante`;
CREATE TABLE `tbl_agendaestudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `FK_estudianteId` int(11) DEFAULT NULL,
  `FK_agendaId` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_TBL_AgendaEstudiante_Agenda` (`FK_agendaId`) USING BTREE,
  KEY `fk_TBL_AgendaEstudiante_Estudiante` (`FK_estudianteId`) USING BTREE,
  CONSTRAINT `fk_TBL_AgendaEstudiante_Agenda` FOREIGN KEY (`FK_agendaId`) REFERENCES `tbl_agenda` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_TBL_AgendaEstudiante_Usuarifk_TBL_AgendaEstudiante_Usuari` FOREIGN KEY (`FK_estudianteId`) REFERENCES `tbl_estudiante` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_agendaestudiante
-- ----------------------------
BEGIN;
INSERT INTO `tbl_agendaestudiante` VALUES (1, 'ertret', 1, 1, '2019-10-01', '2019-09-02 12:57:23', '2019-09-03 21:38:06');
INSERT INTO `tbl_agendaestudiante` VALUES (2, 'dgdfgdfg', 1, 1, '2019-09-21', '2019-09-02 14:59:46', '2019-09-06 11:46:40');
INSERT INTO `tbl_agendaestudiante` VALUES (3, 'Problema familiar', 1, 1, '2019-09-06', '2019-09-03 11:42:55', '2019-09-05 23:54:36');
INSERT INTO `tbl_agendaestudiante` VALUES (4, 'problema familiar', 1, 1, '2019-09-07', '2019-09-03 11:46:59', '2019-09-03 11:46:59');
INSERT INTO `tbl_agendaestudiante` VALUES (5, 'problemas estomacales', 1, 3, '2019-09-28', '2019-09-03 13:01:00', '2019-09-03 13:01:00');
COMMIT;

-- ----------------------------
-- Table structure for tbl_asistencia
-- ----------------------------
DROP TABLE IF EXISTS `tbl_asistencia`;
CREATE TABLE `tbl_asistencia` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_control_asistencia` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_asistencia
-- ----------------------------
BEGIN;
INSERT INTO `tbl_asistencia` VALUES (1, 'Falla');
INSERT INTO `tbl_asistencia` VALUES (2, 'Retardo');
COMMIT;

-- ----------------------------
-- Table structure for tbl_asistenciaestudiante
-- ----------------------------
DROP TABLE IF EXISTS `tbl_asistenciaestudiante`;
CREATE TABLE `tbl_asistenciaestudiante` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_asistencia` int(11) DEFAULT NULL,
  `FK_estudiante` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_AsistenciaEstudiante_Asistencia` (`FK_asistencia`) USING BTREE,
  KEY `FK_estudiante` (`FK_estudiante`) USING BTREE,
  CONSTRAINT `fk_TBL_AsistenciaEstudiante_Asistencia` FOREIGN KEY (`FK_asistencia`) REFERENCES `tbl_asistencia` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_asistenciaestudiante_ibfk_1` FOREIGN KEY (`FK_estudiante`) REFERENCES `tbl_estudiante` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_asistenciaestudiante
-- ----------------------------
BEGIN;
INSERT INTO `tbl_asistenciaestudiante` VALUES (1, 1, 1, '2019-10-01');
COMMIT;

-- ----------------------------
-- Table structure for tbl_calidadinstitucion
-- ----------------------------
DROP TABLE IF EXISTS `tbl_calidadinstitucion`;
CREATE TABLE `tbl_calidadinstitucion` (
  `PK_id` int(11) NOT NULL,
  `archivo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `FK_ColegioId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `FK_ColegioId` (`FK_ColegioId`) USING BTREE,
  CONSTRAINT `tbl_calidadinstitucion_ibfk_1` FOREIGN KEY (`FK_ColegioId`) REFERENCES `tbl_colegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for tbl_calificacion
-- ----------------------------
DROP TABLE IF EXISTS `tbl_calificacion`;
CREATE TABLE `tbl_calificacion` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_calificacion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_calificacion
-- ----------------------------
BEGIN;
INSERT INTO `tbl_calificacion` VALUES (1, 'Ordinaria');
COMMIT;

-- ----------------------------
-- Table structure for tbl_calificacionestudiante
-- ----------------------------
DROP TABLE IF EXISTS `tbl_calificacionestudiante`;
CREATE TABLE `tbl_calificacionestudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calificacion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '0.0',
  `FK_tipo_calificacion` int(11) DEFAULT NULL,
  `FK_Logro` int(11) DEFAULT NULL,
  `FK_Estudiante` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_TBL_CalificacionEstudiante_TipoCalificacion` (`FK_tipo_calificacion`) USING BTREE,
  KEY `FK_Logro` (`FK_Logro`),
  KEY `FK_Estudiante` (`FK_Estudiante`),
  CONSTRAINT `fk_TBL_CalificacionEstudiante_TipoCalificacion` FOREIGN KEY (`FK_tipo_calificacion`) REFERENCES `tbl_calificacion` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_calificacionestudiante_ibfk_1` FOREIGN KEY (`FK_Logro`) REFERENCES `tbl_logro` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_calificacionestudiante_ibfk_2` FOREIGN KEY (`FK_Estudiante`) REFERENCES `tbl_estudiante` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_calificacionestudiante
-- ----------------------------
BEGIN;
INSERT INTO `tbl_calificacionestudiante` VALUES (26, '0.5', NULL, 1, 1, '2019-09-27 16:41:47', '2019-09-26 15:51:25');
INSERT INTO `tbl_calificacionestudiante` VALUES (27, '5.0', NULL, 1, 4, '2019-09-26 15:51:34', '2019-09-26 15:51:34');
INSERT INTO `tbl_calificacionestudiante` VALUES (29, '3.5', NULL, 1, 5, '2019-09-26 16:02:20', '2019-09-26 16:02:20');
INSERT INTO `tbl_calificacionestudiante` VALUES (31, '3.0', NULL, 1, 2, '2019-09-27 13:05:40', '2019-09-27 13:05:40');
INSERT INTO `tbl_calificacionestudiante` VALUES (36, '3.5', NULL, 4, 1, '2019-09-27 16:51:04', '2019-09-27 16:50:50');
INSERT INTO `tbl_calificacionestudiante` VALUES (37, '4.2', NULL, 5, 2, '2019-09-27 16:54:06', '2019-09-27 16:53:55');
COMMIT;

-- ----------------------------
-- Table structure for tbl_colegios
-- ----------------------------
DROP TABLE IF EXISTS `tbl_colegios`;
CREATE TABLE `tbl_colegios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `representanteLegal` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nit` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `FK_PlanesId` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `tbl_colegios_fk_planesid_foreign` (`FK_PlanesId`) USING BTREE,
  CONSTRAINT `tbl_colegios_fk_planesid_foreign` FOREIGN KEY (`FK_PlanesId`) REFERENCES `tbl_planes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_colegios
-- ----------------------------
BEGIN;
INSERT INTO `tbl_colegios` VALUES (1, 'Jhon F. Kenndy', NULL, NULL, NULL, NULL, NULL, 3, NULL, '2019-08-26 10:59:09');
INSERT INTO `tbl_colegios` VALUES (2, 'Gimnasio Sabana Norte', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_colegios` VALUES (8, 'Jadilop', 'villeta', 'prueba', '23432453', '600346', 'Colegio.1568061648.jpg', 2, '2019-09-09 15:40:48', '2019-09-09 15:40:48');
COMMIT;

-- ----------------------------
-- Table structure for tbl_comunicaciones
-- ----------------------------
DROP TABLE IF EXISTS `tbl_comunicaciones`;
CREATE TABLE `tbl_comunicaciones` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_comunicacion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for tbl_comunicacionestudiante
-- ----------------------------
DROP TABLE IF EXISTS `tbl_comunicacionestudiante`;
CREATE TABLE `tbl_comunicacionestudiante` (
  `PK_id` int(11) NOT NULL,
  `FK_comunicacionId` int(11) DEFAULT NULL,
  `FK_estudianteId` int(11) DEFAULT NULL,
  `fecha` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_ComunicacionEstudiante_Comunicaciones` (`FK_comunicacionId`) USING BTREE,
  KEY `fk_TBL_ComunicacionEstudiante_Estudiante` (`FK_estudianteId`) USING BTREE,
  CONSTRAINT `fk_TBL_ComunicacionEstudiante_Comunicaciones` FOREIGN KEY (`FK_comunicacionId`) REFERENCES `tbl_comunicaciones` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_TBL_ComunicacionEstudiante_Estudiante` FOREIGN KEY (`FK_estudianteId`) REFERENCES `tbl_estudiante` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for tbl_cursos
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cursos`;
CREATE TABLE `tbl_cursos` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_cursos
-- ----------------------------
BEGIN;
INSERT INTO `tbl_cursos` VALUES (1, 'Primero');
INSERT INTO `tbl_cursos` VALUES (2, 'Segundo');
INSERT INTO `tbl_cursos` VALUES (3, 'Tercero');
INSERT INTO `tbl_cursos` VALUES (4, 'Cuarto');
INSERT INTO `tbl_cursos` VALUES (5, 'Quinto');
COMMIT;

-- ----------------------------
-- Table structure for tbl_diahorario
-- ----------------------------
DROP TABLE IF EXISTS `tbl_diahorario`;
CREATE TABLE `tbl_diahorario` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `dia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_diahorario
-- ----------------------------
BEGIN;
INSERT INTO `tbl_diahorario` VALUES (1, 'Lunes');
INSERT INTO `tbl_diahorario` VALUES (2, 'Martes');
INSERT INTO `tbl_diahorario` VALUES (3, 'Miercoles');
INSERT INTO `tbl_diahorario` VALUES (4, 'Jueves');
INSERT INTO `tbl_diahorario` VALUES (5, 'Viernes');
COMMIT;

-- ----------------------------
-- Table structure for tbl_docente
-- ----------------------------
DROP TABLE IF EXISTS `tbl_docente`;
CREATE TABLE `tbl_docente` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `profesion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `perfil_profesional` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `FK_usuario` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_Docente_Usuario` (`FK_usuario`) USING BTREE,
  CONSTRAINT `fk_TBL_Docente_Usuario` FOREIGN KEY (`FK_usuario`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_docente
-- ----------------------------
BEGIN;
INSERT INTO `tbl_docente` VALUES (1, 'Lic. Sociales', 'Docente Universitario', 5, NULL, NULL);
INSERT INTO `tbl_docente` VALUES (2, 'Lic. Matematicas', 'Licensiado', 9, NULL, NULL);
INSERT INTO `tbl_docente` VALUES (3, NULL, NULL, 15, NULL, NULL);
INSERT INTO `tbl_docente` VALUES (5, 'Matematico', 'Licenciatura', 36, '2019-09-23 14:35:31', '2019-09-23 14:35:31');
COMMIT;

-- ----------------------------
-- Table structure for tbl_eleccion
-- ----------------------------
DROP TABLE IF EXISTS `tbl_eleccion`;
CREATE TABLE `tbl_eleccion` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEleccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `FK_ColegioId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `tbl_eleccion_ibfk_1` (`FK_ColegioId`) USING BTREE,
  CONSTRAINT `tbl_eleccion_ibfk_1` FOREIGN KEY (`FK_ColegioId`) REFERENCES `tbl_colegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_eleccion
-- ----------------------------
BEGIN;
INSERT INTO `tbl_eleccion` VALUES (1, 'Eleccion Estudiantil Personero', '2019-10-01', '2019-10-05', 2, '2019-09-18 10:57:12', '2019-09-18 10:57:12');
COMMIT;

-- ----------------------------
-- Table structure for tbl_eleccionestudiante
-- ----------------------------
DROP TABLE IF EXISTS `tbl_eleccionestudiante`;
CREATE TABLE `tbl_eleccionestudiante` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_EleccionId` int(11) DEFAULT NULL,
  `FK_UsuarioId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `FK_UsuarioId` (`FK_UsuarioId`) USING BTREE,
  KEY `FK_EleccionId` (`FK_EleccionId`) USING BTREE,
  CONSTRAINT `tbl_eleccionestudiante_ibfk_2` FOREIGN KEY (`FK_UsuarioId`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_eleccionestudiante_ibfk_3` FOREIGN KEY (`FK_EleccionId`) REFERENCES `tbl_eleccion` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_eleccionestudiante
-- ----------------------------
BEGIN;
INSERT INTO `tbl_eleccionestudiante` VALUES (11, 1, 4, '2019-09-18 15:26:07', '2019-09-18 15:26:07');
INSERT INTO `tbl_eleccionestudiante` VALUES (12, 1, 13, '2019-09-18 16:53:39', '2019-09-18 16:53:39');
INSERT INTO `tbl_eleccionestudiante` VALUES (13, NULL, NULL, '2019-09-19 09:05:47', '2019-09-19 09:05:47');
COMMIT;

-- ----------------------------
-- Table structure for tbl_estadovotoestudiante
-- ----------------------------
DROP TABLE IF EXISTS `tbl_estadovotoestudiante`;
CREATE TABLE `tbl_estadovotoestudiante` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `votoEstudiante` tinyint(4) DEFAULT '0',
  `FK_VotoEstudianteId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `FK_VotoEstudianteId` (`FK_VotoEstudianteId`) USING BTREE,
  CONSTRAINT `tbl_estadovotoestudiante_ibfk_1` FOREIGN KEY (`FK_VotoEstudianteId`) REFERENCES `tbl_votoestudiante` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_estadovotoestudiante
-- ----------------------------
BEGIN;
INSERT INTO `tbl_estadovotoestudiante` VALUES (4, 1, 7, '2019-09-20 15:06:12', '2019-09-20 15:06:12');
COMMIT;

-- ----------------------------
-- Table structure for tbl_estudiante
-- ----------------------------
DROP TABLE IF EXISTS `tbl_estudiante`;
CREATE TABLE `tbl_estudiante` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `documento_estudiante` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tipo_documento` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sexo_estudiante` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `lugar_nacimiento` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nombre_madre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `apellido_madre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nombre_padre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `apellido_padre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `FK_usuarioId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_Estudiante_Usuario` (`FK_usuarioId`) USING BTREE,
  KEY `PK_id` (`PK_id`) USING BTREE,
  CONSTRAINT `fk_TBL_Estudiante_Usuario` FOREIGN KEY (`FK_usuarioId`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_estudiante
-- ----------------------------
BEGIN;
INSERT INTO `tbl_estudiante` VALUES (1, '1070976401', 'ti', 'masculino', 'marzo10', 'faca', 'Sandra', 'serrato', 'Efrain', 'Vergara', 4, NULL, NULL);
INSERT INTO `tbl_estudiante` VALUES (2, '123545689', 'cc', 'masculino', NULL, NULL, NULL, NULL, NULL, NULL, 13, NULL, NULL);
INSERT INTO `tbl_estudiante` VALUES (3, '1234567890', 'TI', 'Masculino', '2006-03-08', 'Bogota', 'Diana', 'castillo', 'John', 'moreno', 27, '2019-09-23 00:15:01', '2019-09-23 00:15:01');
INSERT INTO `tbl_estudiante` VALUES (4, '3456789012', 'TI', 'Masculino', '2005-04-07', 'Bogota', 'Andrea', 'Camargo', 'Leonardo', 'Torrrez', 28, '2019-09-23 00:33:35', '2019-09-23 00:33:35');
INSERT INTO `tbl_estudiante` VALUES (5, '109876543', 'TI', 'Femenino', '2005-04-09', 'Bogota', 'Andrea', 'Mesa', 'John', 'Uribe', 29, '2019-09-23 09:59:08', '2019-09-23 09:59:08');
COMMIT;

-- ----------------------------
-- Table structure for tbl_estudiantematerias
-- ----------------------------
DROP TABLE IF EXISTS `tbl_estudiantematerias`;
CREATE TABLE `tbl_estudiantematerias` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_grupo_materias` int(11) DEFAULT NULL,
  `FK_grupo_estudiantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_EstudianteMaterias_GrupoMaterias` (`FK_grupo_materias`) USING BTREE,
  KEY `fk_TBL_EstudianteMaterias_GrupoEstudiantes` (`FK_grupo_estudiantes`) USING BTREE,
  CONSTRAINT `fk_TBL_EstudianteMaterias_GrupoEstudiantes` FOREIGN KEY (`FK_grupo_estudiantes`) REFERENCES `tbl_grupoestudiantes` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_TBL_EstudianteMaterias_GrupoMaterias` FOREIGN KEY (`FK_grupo_materias`) REFERENCES `tbl_grupomaterias` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_estudiantematerias
-- ----------------------------
BEGIN;
INSERT INTO `tbl_estudiantematerias` VALUES (1, 1, 1);
INSERT INTO `tbl_estudiantematerias` VALUES (2, 2, 1);
INSERT INTO `tbl_estudiantematerias` VALUES (4, 1, 3);
COMMIT;

-- ----------------------------
-- Table structure for tbl_evaluaciondocente
-- ----------------------------
DROP TABLE IF EXISTS `tbl_evaluaciondocente`;
CREATE TABLE `tbl_evaluaciondocente` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `puntualidad` int(11) DEFAULT '0',
  `dinamismo` int(11) DEFAULT NULL,
  `respeto` int(11) DEFAULT NULL,
  `actitud` int(11) DEFAULT NULL,
  `FK_UsuarioId` int(11) DEFAULT NULL,
  `FK_EstudianteId` int(11) DEFAULT NULL,
  `FK_FechaId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `FK_UsuarioId` (`FK_UsuarioId`) USING BTREE,
  KEY `FK_EstudianteId` (`FK_EstudianteId`) USING BTREE,
  KEY `FK_FechaId` (`FK_FechaId`) USING BTREE,
  CONSTRAINT `tbl_evaluaciondocente_ibfk_1` FOREIGN KEY (`FK_UsuarioId`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_evaluaciondocente_ibfk_2` FOREIGN KEY (`FK_EstudianteId`) REFERENCES `tbl_estudiante` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_evaluaciondocente_ibfk_3` FOREIGN KEY (`FK_FechaId`) REFERENCES `tbl_fechaevaluaciondocente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_evaluaciondocente
-- ----------------------------
BEGIN;
INSERT INTO `tbl_evaluaciondocente` VALUES (1, 1, 0, 1, 0, 5, 1, 1, '2019-09-20 14:54:30', '2019-09-20 14:54:30');
INSERT INTO `tbl_evaluaciondocente` VALUES (2, 0, 0, 0, 0, 9, 1, 1, '2019-09-20 14:55:09', '2019-09-20 14:55:09');
COMMIT;

-- ----------------------------
-- Table structure for tbl_eventos
-- ----------------------------
DROP TABLE IF EXISTS `tbl_eventos`;
CREATE TABLE `tbl_eventos` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_evento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_eventos
-- ----------------------------
BEGIN;
INSERT INTO `tbl_eventos` VALUES (1, 'Ponencia Academica');
INSERT INTO `tbl_eventos` VALUES (2, 'Dia de la familia');
INSERT INTO `tbl_eventos` VALUES (3, 'Elecciones');
COMMIT;

-- ----------------------------
-- Table structure for tbl_eventosgenerales
-- ----------------------------
DROP TABLE IF EXISTS `tbl_eventosgenerales`;
CREATE TABLE `tbl_eventosgenerales` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_evento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `FK_EventosId` int(11) DEFAULT NULL,
  `FK_ColegioId` int(11) DEFAULT NULL,
  `FK_UsuarioId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `tbl_eventosgenerales_fk_eventosid_foreign` (`FK_EventosId`) USING BTREE,
  KEY `tbl_eventosgenerales_fk_colegioid_foreign` (`FK_ColegioId`) USING BTREE,
  KEY `tbl_eventosgenerales_fk_estudianteid_foreign` (`FK_UsuarioId`) USING BTREE,
  CONSTRAINT `tbl_eventosgenerales_fk_colegioid_foreign` FOREIGN KEY (`FK_ColegioId`) REFERENCES `tbl_colegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_eventosgenerales_fk_estudianteid_foreign` FOREIGN KEY (`FK_UsuarioId`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_eventosgenerales_fk_eventosid_foreign` FOREIGN KEY (`FK_EventosId`) REFERENCES `tbl_eventos` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_eventosgenerales
-- ----------------------------
BEGIN;
INSERT INTO `tbl_eventosgenerales` VALUES (2, 'Recreacion Padres e Hijos', '2019-08-30', 2, 2, 1, NULL, NULL);
INSERT INTO `tbl_eventosgenerales` VALUES (3, 'Entrega de insignias', '2019-07-27', 2, 2, NULL, '2019-08-27 10:52:04', '2019-08-27 10:52:04');
COMMIT;

-- ----------------------------
-- Table structure for tbl_fechaevaluaciondocente
-- ----------------------------
DROP TABLE IF EXISTS `tbl_fechaevaluaciondocente`;
CREATE TABLE `tbl_fechaevaluaciondocente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `FK_ColegioId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_ColegioId` (`FK_ColegioId`) USING BTREE,
  CONSTRAINT `tbl_fechaevaluaciondocente_ibfk_1` FOREIGN KEY (`FK_ColegioId`) REFERENCES `tbl_colegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_fechaevaluaciondocente
-- ----------------------------
BEGIN;
INSERT INTO `tbl_fechaevaluaciondocente` VALUES (1, '2019-09-20', '2019-09-27', 2, '2019-09-20 14:52:54', '2019-09-20 14:52:54');
COMMIT;

-- ----------------------------
-- Table structure for tbl_grupoestudiantes
-- ----------------------------
DROP TABLE IF EXISTS `tbl_grupoestudiantes`;
CREATE TABLE `tbl_grupoestudiantes` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_estudiante` int(11) DEFAULT NULL,
  `FK_grupo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_GrupoEstudiantes_Estudiante` (`FK_estudiante`) USING BTREE,
  KEY `fk_TBL_GrupoEstudiantes_Grupo` (`FK_grupo`) USING BTREE,
  CONSTRAINT `fk_TBL_GrupoEstudiantes_Estudiante` FOREIGN KEY (`FK_estudiante`) REFERENCES `tbl_estudiante` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_TBL_GrupoEstudiantes_Grupo` FOREIGN KEY (`FK_grupo`) REFERENCES `tbl_grupos` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_grupoestudiantes
-- ----------------------------
BEGIN;
INSERT INTO `tbl_grupoestudiantes` VALUES (1, 1, 2, NULL, NULL);
INSERT INTO `tbl_grupoestudiantes` VALUES (3, 2, 2, NULL, NULL);
INSERT INTO `tbl_grupoestudiantes` VALUES (4, 4, 2, '2019-09-23 00:33:35', '2019-09-23 00:33:35');
INSERT INTO `tbl_grupoestudiantes` VALUES (5, 5, 2, '2019-09-23 09:59:08', '2019-09-23 09:59:08');
COMMIT;

-- ----------------------------
-- Table structure for tbl_grupomaterias
-- ----------------------------
DROP TABLE IF EXISTS `tbl_grupomaterias`;
CREATE TABLE `tbl_grupomaterias` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_materia` int(11) DEFAULT NULL,
  `FK_docente` int(11) DEFAULT NULL,
  `FK_GrupoId` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_GrupoMaterias_Materia` (`FK_materia`) USING BTREE,
  KEY `fk_TBL_GrupoMaterias_Docente` (`FK_docente`) USING BTREE,
  KEY `FK_GrupoId` (`FK_GrupoId`) USING BTREE,
  CONSTRAINT `fk_TBL_GrupoMaterias_Docente` FOREIGN KEY (`FK_docente`) REFERENCES `tbl_docente` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_TBL_GrupoMaterias_Materia` FOREIGN KEY (`FK_materia`) REFERENCES `tbl_materias` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_grupomaterias_ibfk_1` FOREIGN KEY (`FK_GrupoId`) REFERENCES `tbl_grupos` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_grupomaterias
-- ----------------------------
BEGIN;
INSERT INTO `tbl_grupomaterias` VALUES (1, 4, 1, 2, NULL, NULL);
INSERT INTO `tbl_grupomaterias` VALUES (2, 1, 2, 2, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for tbl_grupos
-- ----------------------------
DROP TABLE IF EXISTS `tbl_grupos`;
CREATE TABLE `tbl_grupos` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `FK_ curso` int(11) DEFAULT NULL,
  `ano` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_Grupos_Curso` (`FK_ curso`) USING BTREE,
  CONSTRAINT `fk_TBL_Grupos_Curso` FOREIGN KEY (`FK_ curso`) REFERENCES `tbl_cursos` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_grupos
-- ----------------------------
BEGIN;
INSERT INTO `tbl_grupos` VALUES (1, '101', 1, '2019');
INSERT INTO `tbl_grupos` VALUES (2, '102', 1, '2019');
COMMIT;

-- ----------------------------
-- Table structure for tbl_horario
-- ----------------------------
DROP TABLE IF EXISTS `tbl_horario`;
CREATE TABLE `tbl_horario` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `horaInicio` time DEFAULT NULL,
  `horaFin` time DEFAULT NULL,
  `FK_DiaId` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `FK_DiaId` (`FK_DiaId`) USING BTREE,
  CONSTRAINT `tbl_horario_ibfk_1` FOREIGN KEY (`FK_DiaId`) REFERENCES `tbl_diahorario` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_horario
-- ----------------------------
BEGIN;
INSERT INTO `tbl_horario` VALUES (2, '10:00:00', '12:00:00', 1, NULL, NULL);
INSERT INTO `tbl_horario` VALUES (3, NULL, NULL, NULL, '2019-09-05 19:26:28', '2019-09-05 19:26:28');
INSERT INTO `tbl_horario` VALUES (4, '08:00:00', '10:00:00', 2, '2019-09-06 11:01:55', '2019-09-06 11:01:55');
COMMIT;

-- ----------------------------
-- Table structure for tbl_horariomateria
-- ----------------------------
DROP TABLE IF EXISTS `tbl_horariomateria`;
CREATE TABLE `tbl_horariomateria` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_HorarioId` int(11) DEFAULT NULL,
  `FK_GrupoMateriaId` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `FK_HorarioId` (`FK_HorarioId`) USING BTREE,
  KEY `tbl_horariomateria_ibfk_2` (`FK_GrupoMateriaId`) USING BTREE,
  CONSTRAINT `tbl_horariomateria_ibfk_1` FOREIGN KEY (`FK_HorarioId`) REFERENCES `tbl_horario` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_horariomateria_ibfk_2` FOREIGN KEY (`FK_GrupoMateriaId`) REFERENCES `tbl_grupomaterias` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_horariomateria
-- ----------------------------
BEGIN;
INSERT INTO `tbl_horariomateria` VALUES (1, 2, 1, NULL, NULL);
INSERT INTO `tbl_horariomateria` VALUES (2, NULL, NULL, '2019-09-05 19:26:28', '2019-09-05 19:26:28');
INSERT INTO `tbl_horariomateria` VALUES (3, 4, 2, '2019-09-06 11:01:56', '2019-09-06 11:01:56');
COMMIT;

-- ----------------------------
-- Table structure for tbl_logro
-- ----------------------------
DROP TABLE IF EXISTS `tbl_logro`;
CREATE TABLE `tbl_logro` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreLogro` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `FK_Periodo` int(11) DEFAULT NULL,
  `FK_GrupoMateria` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`),
  KEY `FK_GrupoMateria` (`FK_GrupoMateria`),
  KEY `FK_Periodo` (`FK_Periodo`),
  CONSTRAINT `tbl_logro_ibfk_3` FOREIGN KEY (`FK_GrupoMateria`) REFERENCES `tbl_grupomaterias` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_logro_ibfk_4` FOREIGN KEY (`FK_Periodo`) REFERENCES `tbl_periodo` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_logro
-- ----------------------------
BEGIN;
INSERT INTO `tbl_logro` VALUES (1, NULL, 'fghfghfghf', 2, 2, '2019-09-25 16:51:44', '2019-09-25 16:51:44');
INSERT INTO `tbl_logro` VALUES (2, 'gdfgdfgd', 'fghfghfghf', 2, 2, '2019-09-25 16:52:16', '2019-09-25 16:52:16');
INSERT INTO `tbl_logro` VALUES (3, 'gdfgdfgd', 'hola', 1, 2, '2019-09-25 17:09:29', '2019-09-25 17:09:29');
INSERT INTO `tbl_logro` VALUES (4, 'gdfgdfgd', 'hola', 1, 2, '2019-09-25 17:14:43', '2019-09-25 17:14:43');
INSERT INTO `tbl_logro` VALUES (5, 'gdfgdfgd', 'hola', 1, 2, '2019-09-25 17:24:00', '2019-09-25 17:24:00');
INSERT INTO `tbl_logro` VALUES (6, 'gdfgdfgd', 'tytyutyu', 1, 2, '2019-09-25 17:39:51', '2019-09-25 17:39:51');
INSERT INTO `tbl_logro` VALUES (7, 'gdfgdfgd', 'tytyutyu', 1, 2, '2019-09-25 17:40:10', '2019-09-25 17:40:10');
INSERT INTO `tbl_logro` VALUES (8, 'gdfgdfgd', 'hola', 1, 2, '2019-09-26 08:33:20', '2019-09-26 08:33:20');
INSERT INTO `tbl_logro` VALUES (9, NULL, NULL, NULL, NULL, '2019-09-27 13:09:50', '2019-09-27 13:09:50');
INSERT INTO `tbl_logro` VALUES (10, NULL, NULL, NULL, NULL, '2019-09-27 13:12:49', '2019-09-27 13:12:49');
INSERT INTO `tbl_logro` VALUES (11, NULL, NULL, NULL, NULL, '2019-09-27 14:17:13', '2019-09-27 14:17:13');
INSERT INTO `tbl_logro` VALUES (12, NULL, NULL, NULL, NULL, '2019-09-27 14:21:14', '2019-09-27 14:21:14');
INSERT INTO `tbl_logro` VALUES (13, NULL, NULL, NULL, NULL, '2019-09-27 14:21:56', '2019-09-27 14:21:56');
INSERT INTO `tbl_logro` VALUES (14, NULL, NULL, NULL, NULL, '2019-09-27 14:27:13', '2019-09-27 14:27:13');
COMMIT;

-- ----------------------------
-- Table structure for tbl_materias
-- ----------------------------
DROP TABLE IF EXISTS `tbl_materias`;
CREATE TABLE `tbl_materias` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_materias
-- ----------------------------
BEGIN;
INSERT INTO `tbl_materias` VALUES (1, 'matematicas');
INSERT INTO `tbl_materias` VALUES (2, 'Ciencias');
INSERT INTO `tbl_materias` VALUES (3, 'Religion');
INSERT INTO `tbl_materias` VALUES (4, 'Sociales');
COMMIT;

-- ----------------------------
-- Table structure for tbl_noticias
-- ----------------------------
DROP TABLE IF EXISTS `tbl_noticias`;
CREATE TABLE `tbl_noticias` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoNoticia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imagenNoticia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `FK_ColegioId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `FK_ColegioId` (`FK_ColegioId`) USING BTREE,
  CONSTRAINT `tbl_noticias_ibfk_1` FOREIGN KEY (`FK_ColegioId`) REFERENCES `tbl_colegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for tbl_periodo
-- ----------------------------
DROP TABLE IF EXISTS `tbl_periodo`;
CREATE TABLE `tbl_periodo` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `periodo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_periodo
-- ----------------------------
BEGIN;
INSERT INTO `tbl_periodo` VALUES (1, 'Primero');
INSERT INTO `tbl_periodo` VALUES (2, 'Segundo');
INSERT INTO `tbl_periodo` VALUES (3, 'Tercero');
INSERT INTO `tbl_periodo` VALUES (4, 'Cuarto');
COMMIT;

-- ----------------------------
-- Table structure for tbl_planes
-- ----------------------------
DROP TABLE IF EXISTS `tbl_planes`;
CREATE TABLE `tbl_planes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_planes
-- ----------------------------
BEGIN;
INSERT INTO `tbl_planes` VALUES (1, 'Elite', NULL, NULL);
INSERT INTO `tbl_planes` VALUES (2, 'Silver', NULL, NULL);
INSERT INTO `tbl_planes` VALUES (3, 'Diamond', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for tbl_reportes
-- ----------------------------
DROP TABLE IF EXISTS `tbl_reportes`;
CREATE TABLE `tbl_reportes` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_reporte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for tbl_roles
-- ----------------------------
DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE `tbl_roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_roles
-- ----------------------------
BEGIN;
INSERT INTO `tbl_roles` VALUES (1, 'Super Administrador', NULL, NULL);
INSERT INTO `tbl_roles` VALUES (2, 'Administrador', NULL, NULL);
INSERT INTO `tbl_roles` VALUES (3, 'Estudiante', NULL, NULL);
INSERT INTO `tbl_roles` VALUES (4, 'Docente', NULL, NULL);
INSERT INTO `tbl_roles` VALUES (5, 'Acudiente', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for tbl_usuarioreporte
-- ----------------------------
DROP TABLE IF EXISTS `tbl_usuarioreporte`;
CREATE TABLE `tbl_usuarioreporte` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_UsuarioId` int(11) DEFAULT NULL,
  `FK_ReporteId` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `FK_UsuarioId` (`FK_UsuarioId`) USING BTREE,
  KEY `FK_ReporteId` (`FK_ReporteId`) USING BTREE,
  CONSTRAINT `tbl_usuarioreporte_ibfk_1` FOREIGN KEY (`FK_UsuarioId`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_usuarioreporte_ibfk_2` FOREIGN KEY (`FK_ReporteId`) REFERENCES `tbl_reportes` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for tbl_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE `tbl_usuarios` (
  `PK_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `documento` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `FK_RolesId` int(11) DEFAULT NULL,
  `FK_ColegioId` int(11) DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `tbl_usuarios_fk_rolesid_foreign` (`FK_RolesId`) USING BTREE,
  KEY `tbl_usuarios_fk_colegioid_foreign` (`FK_ColegioId`) USING BTREE,
  KEY `PK_id` (`PK_id`) USING BTREE,
  CONSTRAINT `tbl_usuarios_fk_colegioid_foreign` FOREIGN KEY (`FK_ColegioId`) REFERENCES `tbl_colegios` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `tbl_usuarios_fk_rolesid_foreign` FOREIGN KEY (`FK_RolesId`) REFERENCES `tbl_roles` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_usuarios
-- ----------------------------
BEGIN;
INSERT INTO `tbl_usuarios` VALUES (1, 'Code Freestyle', NULL, NULL, NULL, 'root@app.com', '$2y$10$/opF8B6oJ66fKE9UobDxR.hwUIXdsgyGMVeC9QU/4bjYxaKHP6oqi', NULL, 1, NULL, 'ivSC5YChP38DfYWR89wiKLbdttAr5ToCQVEGnGUD09H81BpBrjgU04fL5qhG', NULL, NULL);
INSERT INTO `tbl_usuarios` VALUES (2, 'admingimnasio', NULL, NULL, NULL, 'admingimnasio@mail.com', '$2y$10$LZ0fVWNaDyJoAVjATFe0Nun5CHWa2/4IvjRDwUQ0oQJIBKOK9KJ5q', 'FotoP.1569198005.JPG', 2, 2, 'ODvIYhGiuhTKjQhY7CVheloFvsTvUnwJ34Z9Jf3l5sIjYMzBQdiHHfqYv74V', NULL, '2019-09-22 19:20:05');
INSERT INTO `tbl_usuarios` VALUES (3, 'Fredo', NULL, NULL, NULL, 'fredo@joya.joya', '$2y$10$wetZSvjjG.AhnvujtJLvZO0KGlsGhfQCy/ME7CYxsdFwnqAqgKIO2', NULL, 3, 2, 'dF4Ct00LoHd3tRkUgp3woRRA5DMNJS8DzaMi1MHTuG8D9akeCBES1RkVoGO2', NULL, NULL);
INSERT INTO `tbl_usuarios` VALUES (4, 'Efrain Andres Vergara', NULL, NULL, NULL, 'efrainvergara.udec@gmail.com', '$2y$10$jPeWJCOToFWrax22AqIQLe6ePIJ4VQJzBusqU5B4cIx28xsopvuKi', 'FotoP.1569002306.jpg', 3, 2, 'QNvSJ4HYlW5Y27YH5QzvJtXJ05KbZeYyW7nRDB7bse5O0QKmcQSA78KcOUCu', NULL, '2019-09-20 12:58:26');
INSERT INTO `tbl_usuarios` VALUES (5, 'Stevenson', NULL, NULL, NULL, 'stevenson@gmail.com', '$2y$10$uoGk6wXzsBeefLamLqsZROy9dHXC1N/hPDFAhT.LwamnneSQLVyLO', NULL, 4, 2, 'O1bXNzZWcuNbHOOQNJ8eqRXuKK8goeoOjNRTEF6XFhNp2Kw3UXbt4FGUbCfR', NULL, NULL);
INSERT INTO `tbl_usuarios` VALUES (6, 'hector', NULL, NULL, NULL, 'hector@gmail.com', '$2y$10$V2PkYTko8IqNcNGwJZ7AzuhiGoovYvCwptDTmFuZP9S8CXRO4XjF2', NULL, 4, 1, NULL, NULL, NULL);
INSERT INTO `tbl_usuarios` VALUES (7, 'luna vergara', NULL, NULL, NULL, 'luna@mail.com', '$2y$10$U4ZbzguvuL1pOix1SJqwDuItsgTkRg2yU6GuOMDnWcZh5X3v/7gkS', NULL, 3, 2, NULL, '2019-08-26 15:55:03', '2019-08-26 15:55:03');
INSERT INTO `tbl_usuarios` VALUES (8, 'efgerg', NULL, NULL, NULL, 'pai@mail.com', '$2y$10$l5.ghvM2h73oFV2fP9/dquZHZlUBwJL7PUewYUQIOPXxnWZnBWHG.', NULL, 3, NULL, NULL, '2019-08-26 15:58:24', '2019-08-26 15:58:24');
INSERT INTO `tbl_usuarios` VALUES (9, 'Sandra Serrato', NULL, NULL, NULL, 'sandra@mail.com', '$2y$10$0yCUIdxpfh0GrVIXWWU8SuaOfFL1AyfKIP2dYD1CkTVJn03ywPRwO', NULL, 4, 2, 'dRbGemlyNKoJTah5a5ZayqBZ0JeBgPexVhHtOWFlhQlY3WMo00MyOAmqN1Oj', '2019-08-26 16:08:06', '2019-08-26 16:08:06');
INSERT INTO `tbl_usuarios` VALUES (10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 16:17:17', '2019-08-26 16:17:17');
INSERT INTO `tbl_usuarios` VALUES (11, 'luisa', NULL, NULL, NULL, 'luisa@mail.com', '$2y$10$QrEYimN/xaAGLk7WONpGheTbJhVdlfvRqVuIcV8dygOIhSmCH7uSi', NULL, 5, NULL, 'WTpY7yJGk4IXxMXhyKl7bljcXJiWlctUdMIxIYFKmWby56krylXXtye1AHU2', '2019-08-26 16:17:17', '2019-08-26 16:17:17');
INSERT INTO `tbl_usuarios` VALUES (12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 16:18:44', '2019-08-26 16:18:44');
INSERT INTO `tbl_usuarios` VALUES (13, 'laura Molina Rodriguez', NULL, NULL, NULL, 'laura@mail.com', '$2y$10$jOttMmJagIibt0ueiQGxq.SfB/Lfi7fWd4YBtglW67.eF0a6Hesea', NULL, 3, 2, '9l7dSE68UUgGNmLuPClr3hGmAZv0TU3tTHZeNYJW1HXkMgFGfwtKdKOeNfV5', '2019-08-26 16:18:45', '2019-08-26 16:18:45');
INSERT INTO `tbl_usuarios` VALUES (14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 16:21:22', '2019-08-26 16:21:22');
INSERT INTO `tbl_usuarios` VALUES (15, 'mery', NULL, NULL, NULL, 'mery@mail.com', '$2y$10$t3/8sQbOrklZ80UlHJoLI.Q8us/tud6Ch3uBHCDr1mScVAH.9kKsy', NULL, 4, NULL, NULL, '2019-08-26 16:21:22', '2019-08-26 16:21:22');
INSERT INTO `tbl_usuarios` VALUES (16, 'antonio', NULL, NULL, NULL, 'antonio@mail.com', '$2y$10$8A4Iy3KNOdKrfDFg2P92JuwJqZaWBdnGhXVBAQCfcKKj5gFrDsn4y', NULL, 4, NULL, NULL, '2019-08-26 16:40:58', '2019-08-26 16:40:58');
INSERT INTO `tbl_usuarios` VALUES (17, 'sdfwert', NULL, NULL, NULL, 'sdfsdf@mail.com', '12345', NULL, 4, NULL, NULL, '2019-08-26 16:51:37', '2019-08-26 16:51:37');
INSERT INTO `tbl_usuarios` VALUES (18, 'andres', NULL, NULL, NULL, 'andres@mail.com', '12345', NULL, 5, NULL, NULL, '2019-08-26 16:52:57', '2019-08-26 16:52:57');
INSERT INTO `tbl_usuarios` VALUES (19, 'seer', NULL, NULL, NULL, 'erer@mail.com', '12345', NULL, 3, NULL, NULL, '2019-08-26 16:53:59', '2019-08-26 16:53:59');
INSERT INTO `tbl_usuarios` VALUES (20, 'dfgdfgdfg', NULL, NULL, NULL, 'dfgfd@mail.com', '12345', NULL, 5, 2, NULL, '2019-08-26 16:56:34', '2019-08-26 16:56:34');
INSERT INTO `tbl_usuarios` VALUES (21, 'hola', NULL, NULL, NULL, 'hola@mail.com', '12345', NULL, 3, 2, NULL, '2019-08-26 17:02:48', '2019-08-26 17:02:48');
INSERT INTO `tbl_usuarios` VALUES (22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2019-08-26 17:07:43', '2019-08-26 17:07:43');
INSERT INTO `tbl_usuarios` VALUES (23, 'sdfsdf', NULL, NULL, NULL, 'qwwe@mail.com', '$2y$10$Pj3/Bxu4XTQbiCYqjjNM6O.ylFSXYpGInQB.c9UZNbEclKNbr.OTG', NULL, 3, NULL, NULL, '2019-08-26 17:07:43', '2019-08-26 17:07:43');
INSERT INTO `tbl_usuarios` VALUES (24, 'Camilo Mojica', '3102476957', '96031008503', 'faca', 'camilo@mail.com', '$2y$10$YJ7zJXPVVpotz9QcnNH/uOgBUZwgXxuPHgmfz8PDw6PBXvCljEY.a', NULL, 3, 2, NULL, '2019-09-22 22:42:01', '2019-09-22 22:42:01');
INSERT INTO `tbl_usuarios` VALUES (25, 'Sara Uribe', '3109874563', NULL, 'faca', 'sarau@mail.com', '$2y$10$MscBXs.v8hqPBkpWdleUSuoPzQ8mmHPydzsAooIzoO5Z1clgvTSOq', NULL, 3, 2, NULL, '2019-09-23 00:08:08', '2019-09-23 00:08:08');
INSERT INTO `tbl_usuarios` VALUES (26, 'Danilo Castillo', '3109874563', NULL, 'faca', 'daniloc@mail.com', '$2y$10$yFr7ghUzNX6gnH05lVOzYu/4TNIGhXU9bDYRd6Vk5YrBEg2y..Dyu', NULL, 3, 2, NULL, '2019-09-23 00:11:31', '2019-09-23 00:11:31');
INSERT INTO `tbl_usuarios` VALUES (27, 'Danilo Castillo', '3109874563', NULL, 'faca', 'danilob@mail.com', '$2y$10$.bDT/TzW9EvJDiYxS0RYmul8UNBPYc3pXVkCQ0nNCjuwgh95V4aey', NULL, 3, 2, NULL, '2019-09-23 00:15:00', '2019-09-23 00:15:00');
INSERT INTO `tbl_usuarios` VALUES (28, 'manuel torres', '310234567', NULL, 'faca', 'manuelt@mail.com', '$2y$10$DqqiDFsYD3b7vzKTAkur0evrcsDJw/ti.BoXsV3WyZeOhI6pvIE0G', NULL, 3, 2, NULL, '2019-09-23 00:33:34', '2019-09-23 00:33:34');
INSERT INTO `tbl_usuarios` VALUES (29, 'Carolina Romero', '320876548', NULL, 'faca', 'caror@mail.com', '$2y$10$JWAFgJZdXuSlW0d667HgxuJDNZ/hzbBTSpS9WHquSFUP7meASO8Ae', NULL, 3, 2, NULL, '2019-09-23 09:59:07', '2019-09-23 09:59:07');
INSERT INTO `tbl_usuarios` VALUES (30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2019-09-23 09:59:45', '2019-09-23 09:59:45');
INSERT INTO `tbl_usuarios` VALUES (31, 'Efrain Andres', NULL, NULL, NULL, 'asdasd@mai.com', '$2y$10$O7PGEuK6.EOuT3syAJS.aOU8DPFe8SiuYo6UkbcJjPx/cuxaYhSLa', NULL, NULL, NULL, NULL, '2019-09-23 09:59:45', '2019-09-23 09:59:45');
INSERT INTO `tbl_usuarios` VALUES (33, 'Danilo Castillo', '310123456', '2345678901', 'faca', 'dacaser@mail.com', '$2y$10$64UjIShrTcUzTsiRVfeG3uChAkGyOu2KS2qNAyziDvHJXfb7kIlVq', NULL, 4, 2, NULL, '2019-09-23 14:28:05', '2019-09-23 14:28:05');
INSERT INTO `tbl_usuarios` VALUES (36, 'Hernan Hernandez', '1234567890', '19876567438', 'faca', 'hdez@mail.com', '$2y$10$.s9sgb2.BRPrvhb4xOQWLupCsjvq7qFHC2egL1HzRJ0I4TQWPCNs6', NULL, 4, 2, NULL, '2019-09-23 14:35:30', '2019-09-23 14:35:30');
INSERT INTO `tbl_usuarios` VALUES (39, 'Milena Romero', '3214567897', '25675432', 'faca', 'milromero@mail.com', '$2y$10$pzN554o8tBCjv.my4Ujuy.WjZbttu6mPP3j6ctztRjyCOP4fBsEE2', NULL, 5, 2, NULL, '2019-09-24 10:55:06', '2019-09-24 10:55:06');
COMMIT;

-- ----------------------------
-- Table structure for tbl_votoestudiante
-- ----------------------------
DROP TABLE IF EXISTS `tbl_votoestudiante`;
CREATE TABLE `tbl_votoestudiante` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_UsuarioId` int(11) NOT NULL,
  `FK_EleccionEstudiante` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `FK_UsuarioId` (`FK_UsuarioId`) USING BTREE,
  KEY `FK_EleccionEstudiante` (`FK_EleccionEstudiante`) USING BTREE,
  CONSTRAINT `tbl_votoestudiante_ibfk_1` FOREIGN KEY (`FK_UsuarioId`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_votoestudiante_ibfk_2` FOREIGN KEY (`FK_EleccionEstudiante`) REFERENCES `tbl_eleccionestudiante` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_votoestudiante
-- ----------------------------
BEGIN;
INSERT INTO `tbl_votoestudiante` VALUES (4, 13, 11, '2019-09-19 10:37:20', '2019-09-19 10:37:20');
INSERT INTO `tbl_votoestudiante` VALUES (5, 4, 12, '2019-09-19 12:09:24', '2019-09-19 12:09:24');
INSERT INTO `tbl_votoestudiante` VALUES (6, 4, 12, '2019-09-20 15:00:38', '2019-09-20 15:00:38');
INSERT INTO `tbl_votoestudiante` VALUES (7, 4, 11, '2019-09-20 15:06:12', '2019-09-20 15:06:12');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
