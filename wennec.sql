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

 Date: 29/08/2019 09:25:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for TBL_Agenda
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Agenda`;
CREATE TABLE `TBL_Agenda` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_agenda` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PK_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of TBL_Agenda
-- ----------------------------
BEGIN;
INSERT INTO `TBL_Agenda` VALUES (1, 'Excusas');
INSERT INTO `TBL_Agenda` VALUES (2, 'Permisos');
INSERT INTO `TBL_Agenda` VALUES (3, 'Comunicaciones Diarias');
COMMIT;

-- ----------------------------
-- Table structure for TBL_AgendaEstudiante
-- ----------------------------
DROP TABLE IF EXISTS `TBL_AgendaEstudiante`;
CREATE TABLE `TBL_AgendaEstudiante` (
  `Pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_estudianteId` int(11) DEFAULT NULL,
  `FK_agendaId` int(11) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Pk_id`),
  KEY `fk_TBL_AgendaEstudiante_Agenda` (`FK_agendaId`),
  KEY `fk_TBL_AgendaEstudiante_Estudiante` (`FK_estudianteId`),
  CONSTRAINT `fk_TBL_AgendaEstudiante_Agenda` FOREIGN KEY (`FK_agendaId`) REFERENCES `tbl_agenda` (`PK_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_TBL_AgendaEstudiante_Estudiante` FOREIGN KEY (`FK_estudianteId`) REFERENCES `tbl_estudiante` (`PK_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_Asistencia
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Asistencia`;
CREATE TABLE `TBL_Asistencia` (
  `PK_id` int(11) NOT NULL,
  `tipo_control_asistencia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PK_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_AsistenciaEstudiante
-- ----------------------------
DROP TABLE IF EXISTS `TBL_AsistenciaEstudiante`;
CREATE TABLE `TBL_AsistenciaEstudiante` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_asistencia` int(11) DEFAULT NULL,
  `FK_estudiante` varchar(255) DEFAULT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PK_id`),
  KEY `fk_TBL_AsistenciaEstudiante_Asistencia` (`FK_asistencia`),
  CONSTRAINT `fk_TBL_AsistenciaEstudiante_Asistencia` FOREIGN KEY (`FK_asistencia`) REFERENCES `tbl_asistencia` (`PK_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_Calificacion
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Calificacion`;
CREATE TABLE `TBL_Calificacion` (
  `PK_id` int(11) NOT NULL,
  `tipo_calificacion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PK_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_CalificacionEstudiante
-- ----------------------------
DROP TABLE IF EXISTS `TBL_CalificacionEstudiante`;
CREATE TABLE `TBL_CalificacionEstudiante` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `calificacion` varchar(255) DEFAULT NULL,
  `FK_estudiante_materias` int(11) DEFAULT NULL,
  `FK_tipo_calificacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_id`),
  KEY `fk_TBL_CalificacionEstudiante_EstudianteMaterias` (`FK_estudiante_materias`),
  KEY `fk_TBL_CalificacionEstudiante_TipoCalificacion` (`FK_tipo_calificacion`),
  CONSTRAINT `fk_TBL_CalificacionEstudiante_EstudianteMaterias` FOREIGN KEY (`FK_estudiante_materias`) REFERENCES `tbl_estudiantematerias` (`PK_id`),
  CONSTRAINT `fk_TBL_CalificacionEstudiante_TipoCalificacion` FOREIGN KEY (`FK_tipo_calificacion`) REFERENCES `tbl_calificacion` (`PK_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_Colegios
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Colegios`;
CREATE TABLE `TBL_Colegios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `FK_PlanesId` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_colegios_fk_planesid_foreign` (`FK_PlanesId`),
  CONSTRAINT `tbl_colegios_fk_planesid_foreign` FOREIGN KEY (`FK_PlanesId`) REFERENCES `tbl_planes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of TBL_Colegios
-- ----------------------------
BEGIN;
INSERT INTO `TBL_Colegios` VALUES (1, 'Jhon F. Kenndy', 'nueva1', NULL, '2019-08-26 10:59:09', 3);
INSERT INTO `TBL_Colegios` VALUES (2, 'Nueva Granada', 'nueva2', NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for TBL_Comunicaciones
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Comunicaciones`;
CREATE TABLE `TBL_Comunicaciones` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_comunicacion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PK_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_ComunicacionEstudiante
-- ----------------------------
DROP TABLE IF EXISTS `TBL_ComunicacionEstudiante`;
CREATE TABLE `TBL_ComunicacionEstudiante` (
  `PK_id` int(11) NOT NULL,
  `FK_comunicacionId` int(11) DEFAULT NULL,
  `FK_estudianteId` int(11) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PK_id`),
  KEY `fk_TBL_ComunicacionEstudiante_Comunicaciones` (`FK_comunicacionId`),
  KEY `fk_TBL_ComunicacionEstudiante_Estudiante` (`FK_estudianteId`),
  CONSTRAINT `fk_TBL_ComunicacionEstudiante_Comunicaciones` FOREIGN KEY (`FK_comunicacionId`) REFERENCES `tbl_comunicaciones` (`PK_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_TBL_ComunicacionEstudiante_Estudiante` FOREIGN KEY (`FK_estudianteId`) REFERENCES `tbl_estudiante` (`PK_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_Cursos
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Cursos`;
CREATE TABLE `TBL_Cursos` (
  `PK_id` int(11) NOT NULL,
  `nombre_curso` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PK_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_Docente
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Docente`;
CREATE TABLE `TBL_Docente` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `profesion` varchar(255) DEFAULT NULL,
  `perfil_profesional` varchar(255) DEFAULT NULL,
  `FK_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_id`),
  KEY `fk_TBL_Docente_Usuario` (`FK_usuario`),
  CONSTRAINT `fk_TBL_Docente_Usuario` FOREIGN KEY (`FK_usuario`) REFERENCES `tbl_usuarios` (`PK_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_Estudiante
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Estudiante`;
CREATE TABLE `TBL_Estudiante` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `documento_estudiante` varchar(255) DEFAULT NULL,
  `tipo_documento` varchar(255) DEFAULT NULL,
  `sexo_estudiante` varchar(255) DEFAULT NULL,
  `fecha de nacimiento` varchar(255) DEFAULT NULL,
  `lugar de nacimiento` varchar(255) DEFAULT NULL,
  `nombre_madre` varchar(255) DEFAULT NULL,
  `apellido_madre` varchar(255) DEFAULT NULL,
  `nombre_padre` varchar(255) DEFAULT NULL,
  `apellido_padre` varchar(255) DEFAULT NULL,
  `FK_usuarioId` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_id`),
  KEY `fk_TBL_Estudiante_Usuario` (`FK_usuarioId`),
  CONSTRAINT `fk_TBL_Estudiante_Usuario` FOREIGN KEY (`FK_usuarioId`) REFERENCES `tbl_usuarios` (`PK_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of TBL_Estudiante
-- ----------------------------
BEGIN;
INSERT INTO `TBL_Estudiante` VALUES (1, '1070976401', 'ti', 'masculino', 'marzo10', 'faca', 'Sandra', 'serrato', 'Efrain', 'Vergara', 4);
COMMIT;

-- ----------------------------
-- Table structure for TBL_EstudianteMaterias
-- ----------------------------
DROP TABLE IF EXISTS `TBL_EstudianteMaterias`;
CREATE TABLE `TBL_EstudianteMaterias` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_grupo_materias` int(11) DEFAULT NULL,
  `FK_grupo_estudiantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_id`),
  KEY `fk_TBL_EstudianteMaterias_GrupoMaterias` (`FK_grupo_materias`),
  KEY `fk_TBL_EstudianteMaterias_GrupoEstudiantes` (`FK_grupo_estudiantes`),
  CONSTRAINT `fk_TBL_EstudianteMaterias_GrupoEstudiantes` FOREIGN KEY (`FK_grupo_estudiantes`) REFERENCES `tbl_grupoestudiantes` (`PK_id`),
  CONSTRAINT `fk_TBL_EstudianteMaterias_GrupoMaterias` FOREIGN KEY (`FK_grupo_materias`) REFERENCES `tbl_grupomaterias` (`PK_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_Eventos
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Eventos`;
CREATE TABLE `TBL_Eventos` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_evento` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of TBL_Eventos
-- ----------------------------
BEGIN;
INSERT INTO `TBL_Eventos` VALUES (1, 'Ponencia Academica');
INSERT INTO `TBL_Eventos` VALUES (2, 'Dia de la familia');
COMMIT;

-- ----------------------------
-- Table structure for TBL_EventosGenerales
-- ----------------------------
DROP TABLE IF EXISTS `TBL_EventosGenerales`;
CREATE TABLE `TBL_EventosGenerales` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_evento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `FK_EventosId` int(11) DEFAULT NULL,
  `FK_ColegioId` int(11) DEFAULT NULL,
  `FK_UsuarioId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`),
  KEY `tbl_eventosgenerales_fk_eventosid_foreign` (`FK_EventosId`),
  KEY `tbl_eventosgenerales_fk_colegioid_foreign` (`FK_ColegioId`),
  KEY `tbl_eventosgenerales_fk_estudianteid_foreign` (`FK_UsuarioId`),
  CONSTRAINT `tbl_eventosgenerales_fk_colegioid_foreign` FOREIGN KEY (`FK_ColegioId`) REFERENCES `tbl_colegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_eventosgenerales_fk_estudianteid_foreign` FOREIGN KEY (`FK_UsuarioId`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_eventosgenerales_fk_eventosid_foreign` FOREIGN KEY (`FK_EventosId`) REFERENCES `tbl_eventos` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of TBL_EventosGenerales
-- ----------------------------
BEGIN;
INSERT INTO `TBL_EventosGenerales` VALUES (2, 'Recreacion Padres e Hijos', '2019-08-30', 2, 2, 1, NULL, NULL);
INSERT INTO `TBL_EventosGenerales` VALUES (3, 'Entrega de insignias', '2019-07-27', 2, 2, NULL, '2019-08-27 10:52:04', '2019-08-27 10:52:04');
COMMIT;

-- ----------------------------
-- Table structure for TBL_GrupoEstudiantes
-- ----------------------------
DROP TABLE IF EXISTS `TBL_GrupoEstudiantes`;
CREATE TABLE `TBL_GrupoEstudiantes` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_estudiante` int(11) DEFAULT NULL,
  `FK_grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_id`),
  KEY `fk_TBL_GrupoEstudiantes_Estudiante` (`FK_estudiante`),
  KEY `fk_TBL_GrupoEstudiantes_Grupo` (`FK_grupo`),
  CONSTRAINT `fk_TBL_GrupoEstudiantes_Estudiante` FOREIGN KEY (`FK_estudiante`) REFERENCES `tbl_estudiante` (`PK_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_TBL_GrupoEstudiantes_Grupo` FOREIGN KEY (`FK_grupo`) REFERENCES `tbl_grupos` (`PK_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_GrupoMaterias
-- ----------------------------
DROP TABLE IF EXISTS `TBL_GrupoMaterias`;
CREATE TABLE `TBL_GrupoMaterias` (
  `PK_id` int(11) NOT NULL,
  `FK_materia` int(11) DEFAULT NULL,
  `FK_docente` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_id`),
  KEY `fk_TBL_GrupoMaterias_Materia` (`FK_materia`),
  KEY `fk_TBL_GrupoMaterias_Docente` (`FK_docente`),
  CONSTRAINT `fk_TBL_GrupoMaterias_Docente` FOREIGN KEY (`FK_docente`) REFERENCES `tbl_docente` (`PK_id`),
  CONSTRAINT `fk_TBL_GrupoMaterias_Materia` FOREIGN KEY (`FK_materia`) REFERENCES `tbl_materias` (`PK_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_Grupos
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Grupos`;
CREATE TABLE `TBL_Grupos` (
  `PK_id` int(11) NOT NULL,
  `FK_ curso` int(11) DEFAULT NULL,
  `ano` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PK_id`),
  KEY `fk_TBL_Grupos_Curso` (`FK_ curso`),
  CONSTRAINT `fk_TBL_Grupos_Curso` FOREIGN KEY (`FK_ curso`) REFERENCES `tbl_cursos` (`PK_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_Materias
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Materias`;
CREATE TABLE `TBL_Materias` (
  `PK_id` int(11) NOT NULL,
  `nombre_materia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PK_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for TBL_Planes
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Planes`;
CREATE TABLE `TBL_Planes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of TBL_Planes
-- ----------------------------
BEGIN;
INSERT INTO `TBL_Planes` VALUES (1, 'Elite', NULL, NULL);
INSERT INTO `TBL_Planes` VALUES (2, 'Silver', NULL, NULL);
INSERT INTO `TBL_Planes` VALUES (3, 'Diamond', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for TBL_Roles
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Roles`;
CREATE TABLE `TBL_Roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of TBL_Roles
-- ----------------------------
BEGIN;
INSERT INTO `TBL_Roles` VALUES (1, 'Super Administrador', NULL, NULL);
INSERT INTO `TBL_Roles` VALUES (2, 'Administrador', NULL, NULL);
INSERT INTO `TBL_Roles` VALUES (3, 'Estudiante', NULL, NULL);
INSERT INTO `TBL_Roles` VALUES (4, 'Docente', NULL, NULL);
INSERT INTO `TBL_Roles` VALUES (5, 'Acudiente', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for TBL_Usuarios
-- ----------------------------
DROP TABLE IF EXISTS `TBL_Usuarios`;
CREATE TABLE `TBL_Usuarios` (
  `PK_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FK_RolesId` int(11) DEFAULT NULL,
  `FK_ColegioId` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_id`),
  KEY `tbl_usuarios_fk_rolesid_foreign` (`FK_RolesId`),
  KEY `tbl_usuarios_fk_colegioid_foreign` (`FK_ColegioId`),
  CONSTRAINT `tbl_usuarios_fk_colegioid_foreign` FOREIGN KEY (`FK_ColegioId`) REFERENCES `tbl_colegios` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `tbl_usuarios_fk_rolesid_foreign` FOREIGN KEY (`FK_RolesId`) REFERENCES `tbl_roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of TBL_Usuarios
-- ----------------------------
BEGIN;
INSERT INTO `TBL_Usuarios` VALUES (1, 'Code Freestyle', NULL, NULL, NULL, 'root@app.com', '$2y$10$/opF8B6oJ66fKE9UobDxR.hwUIXdsgyGMVeC9QU/4bjYxaKHP6oqi', NULL, 1, NULL, 'mbWqXstmaDhUVltlXvXB32bips4jI8QLWxtIvpN2nIXDMMygL5yDGHRN93Mv', NULL, NULL);
INSERT INTO `TBL_Usuarios` VALUES (2, 'Paisa', NULL, NULL, NULL, 'paisa@mail.com', '$2y$10$LZ0fVWNaDyJoAVjATFe0Nun5CHWa2/4IvjRDwUQ0oQJIBKOK9KJ5q', NULL, 2, 2, '4BeTVjh6fScGahEkzPwZr2XL2UH1H6zwn21RRrmtoFX0PwHCnM1gWC3EY1fJ', NULL, NULL);
INSERT INTO `TBL_Usuarios` VALUES (3, 'Fredo', NULL, NULL, NULL, 'fredo@joya.joya', '$2y$10$wetZSvjjG.AhnvujtJLvZO0KGlsGhfQCy/ME7CYxsdFwnqAqgKIO2', NULL, 3, 2, 'rp5nps1VbdTGQWd83RAyR5FAFePnBzy6rCWYJ5hKCAIQM15RbLqjsVPoFhtN', NULL, NULL);
INSERT INTO `TBL_Usuarios` VALUES (4, 'Efrain', NULL, NULL, NULL, 'efrain@gmail.com', '$2y$10$jPeWJCOToFWrax22AqIQLe6ePIJ4VQJzBusqU5B4cIx28xsopvuKi', '', 3, 2, NULL, NULL, NULL);
INSERT INTO `TBL_Usuarios` VALUES (5, 'Stevenson', NULL, NULL, NULL, 'stevenson@gmail.com', '$2y$10$uoGk6wXzsBeefLamLqsZROy9dHXC1N/hPDFAhT.LwamnneSQLVyLO', NULL, 4, 1, NULL, NULL, NULL);
INSERT INTO `TBL_Usuarios` VALUES (6, 'hector', NULL, NULL, NULL, 'hector@gmail.com', '$2y$10$V2PkYTko8IqNcNGwJZ7AzuhiGoovYvCwptDTmFuZP9S8CXRO4XjF2', NULL, 4, 1, NULL, NULL, NULL);
INSERT INTO `TBL_Usuarios` VALUES (7, 'luna vergara', NULL, NULL, NULL, 'luna@mail.com', '$2y$10$U4ZbzguvuL1pOix1SJqwDuItsgTkRg2yU6GuOMDnWcZh5X3v/7gkS', NULL, 3, 2, NULL, '2019-08-26 15:55:03', '2019-08-26 15:55:03');
INSERT INTO `TBL_Usuarios` VALUES (8, 'efgerg', NULL, NULL, NULL, 'pai@mail.com', '$2y$10$l5.ghvM2h73oFV2fP9/dquZHZlUBwJL7PUewYUQIOPXxnWZnBWHG.', NULL, 3, NULL, NULL, '2019-08-26 15:58:24', '2019-08-26 15:58:24');
INSERT INTO `TBL_Usuarios` VALUES (9, 'fgfgh', NULL, NULL, NULL, 'fghfgh@mail.com', '$2y$10$0yCUIdxpfh0GrVIXWWU8SuaOfFL1AyfKIP2dYD1CkTVJn03ywPRwO', NULL, 4, 2, NULL, '2019-08-26 16:08:06', '2019-08-26 16:08:06');
INSERT INTO `TBL_Usuarios` VALUES (10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 16:17:17', '2019-08-26 16:17:17');
INSERT INTO `TBL_Usuarios` VALUES (11, 'luisa', NULL, NULL, NULL, 'luisa@mail.com', '$2y$10$QrEYimN/xaAGLk7WONpGheTbJhVdlfvRqVuIcV8dygOIhSmCH7uSi', NULL, 5, NULL, NULL, '2019-08-26 16:17:17', '2019-08-26 16:17:17');
INSERT INTO `TBL_Usuarios` VALUES (12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 16:18:44', '2019-08-26 16:18:44');
INSERT INTO `TBL_Usuarios` VALUES (13, 'luisa', NULL, NULL, NULL, 'laura@mail.com', '$2y$10$jOttMmJagIibt0ueiQGxq.SfB/Lfi7fWd4YBtglW67.eF0a6Hesea', NULL, 3, NULL, NULL, '2019-08-26 16:18:45', '2019-08-26 16:18:45');
INSERT INTO `TBL_Usuarios` VALUES (14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 16:21:22', '2019-08-26 16:21:22');
INSERT INTO `TBL_Usuarios` VALUES (15, 'mery', NULL, NULL, NULL, 'mery@mail.com', '$2y$10$t3/8sQbOrklZ80UlHJoLI.Q8us/tud6Ch3uBHCDr1mScVAH.9kKsy', NULL, 4, NULL, NULL, '2019-08-26 16:21:22', '2019-08-26 16:21:22');
INSERT INTO `TBL_Usuarios` VALUES (16, 'antonio', NULL, NULL, NULL, 'antonio@mail.com', '$2y$10$8A4Iy3KNOdKrfDFg2P92JuwJqZaWBdnGhXVBAQCfcKKj5gFrDsn4y', NULL, 4, NULL, NULL, '2019-08-26 16:40:58', '2019-08-26 16:40:58');
INSERT INTO `TBL_Usuarios` VALUES (17, 'sdfwert', NULL, NULL, NULL, 'sdfsdf@mail.com', '12345', NULL, 4, NULL, NULL, '2019-08-26 16:51:37', '2019-08-26 16:51:37');
INSERT INTO `TBL_Usuarios` VALUES (18, 'andres', NULL, NULL, NULL, 'andres@mail.com', '12345', NULL, 5, NULL, NULL, '2019-08-26 16:52:57', '2019-08-26 16:52:57');
INSERT INTO `TBL_Usuarios` VALUES (19, 'seer', NULL, NULL, NULL, 'erer@mail.com', '12345', NULL, 3, NULL, NULL, '2019-08-26 16:53:59', '2019-08-26 16:53:59');
INSERT INTO `TBL_Usuarios` VALUES (20, 'dfgdfgdfg', NULL, NULL, NULL, 'dfgfd@mail.com', '12345', NULL, 5, 2, NULL, '2019-08-26 16:56:34', '2019-08-26 16:56:34');
INSERT INTO `TBL_Usuarios` VALUES (21, 'hola', NULL, NULL, NULL, 'hola@mail.com', '12345', NULL, 3, 2, NULL, '2019-08-26 17:02:48', '2019-08-26 17:02:48');
INSERT INTO `TBL_Usuarios` VALUES (22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2019-08-26 17:07:43', '2019-08-26 17:07:43');
INSERT INTO `TBL_Usuarios` VALUES (23, 'sdfsdf', NULL, NULL, NULL, 'qwwe@mail.com', '$2y$10$Pj3/Bxu4XTQbiCYqjjNM6O.ylFSXYpGInQB.c9UZNbEclKNbr.OTG', NULL, 3, NULL, NULL, '2019-08-26 17:07:43', '2019-08-26 17:07:43');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;