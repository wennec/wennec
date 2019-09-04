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

 Date: 04/09/2019 14:26:08
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
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `FK_estudianteId` (`FK_estudianteId`) USING BTREE,
  KEY `FK_usuarioId` (`FK_usuarioId`) USING BTREE,
  CONSTRAINT `tbl_acudiente_ibfk_1` FOREIGN KEY (`FK_estudianteId`) REFERENCES `tbl_estudiante` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_acudiente_ibfk_2` FOREIGN KEY (`FK_usuarioId`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_acudiente
-- ----------------------------
BEGIN;
INSERT INTO `tbl_acudiente` VALUES (1, NULL, NULL, NULL, NULL, NULL, 1, 11);
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
INSERT INTO `tbl_agendaestudiante` VALUES (2, 'dgdfgdfg', 1, 3, '2019-09-21', '2019-09-02 14:59:46', '2019-09-02 14:59:46');
INSERT INTO `tbl_agendaestudiante` VALUES (3, 'hola', 1, 3, '2019-09-12', '2019-09-03 11:42:55', '2019-09-03 21:59:14');
INSERT INTO `tbl_agendaestudiante` VALUES (4, 'problema familiar', 1, 1, '2019-09-07', '2019-09-03 11:46:59', '2019-09-03 11:46:59');
INSERT INTO `tbl_agendaestudiante` VALUES (5, 'problemas estomacales', 1, 3, '2019-09-28', '2019-09-03 13:01:00', '2019-09-03 13:01:00');
COMMIT;

-- ----------------------------
-- Table structure for tbl_asistencia
-- ----------------------------
DROP TABLE IF EXISTS `tbl_asistencia`;
CREATE TABLE `tbl_asistencia` (
  `PK_id` int(11) NOT NULL,
  `tipo_control_asistencia` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for tbl_asistenciaestudiante
-- ----------------------------
DROP TABLE IF EXISTS `tbl_asistenciaestudiante`;
CREATE TABLE `tbl_asistenciaestudiante` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_asistencia` int(11) DEFAULT NULL,
  `FK_estudiante` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cantidad` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fecha` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_AsistenciaEstudiante_Asistencia` (`FK_asistencia`) USING BTREE,
  CONSTRAINT `fk_TBL_AsistenciaEstudiante_Asistencia` FOREIGN KEY (`FK_asistencia`) REFERENCES `tbl_asistencia` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `calificacion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `FK_estudiante_materias` int(11) DEFAULT NULL,
  `FK_tipo_calificacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_CalificacionEstudiante_EstudianteMaterias` (`FK_estudiante_materias`) USING BTREE,
  KEY `fk_TBL_CalificacionEstudiante_TipoCalificacion` (`FK_tipo_calificacion`) USING BTREE,
  CONSTRAINT `fk_TBL_CalificacionEstudiante_EstudianteMaterias` FOREIGN KEY (`FK_estudiante_materias`) REFERENCES `tbl_estudiantematerias` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_TBL_CalificacionEstudiante_TipoCalificacion` FOREIGN KEY (`FK_tipo_calificacion`) REFERENCES `tbl_calificacion` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_calificacionestudiante
-- ----------------------------
BEGIN;
INSERT INTO `tbl_calificacionestudiante` VALUES (1, '2.8', 1, 1);
INSERT INTO `tbl_calificacionestudiante` VALUES (2, '4.5', 2, 1);
COMMIT;

-- ----------------------------
-- Table structure for tbl_colegios
-- ----------------------------
DROP TABLE IF EXISTS `tbl_colegios`;
CREATE TABLE `tbl_colegios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `FK_PlanesId` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `tbl_colegios_fk_planesid_foreign` (`FK_PlanesId`) USING BTREE,
  CONSTRAINT `tbl_colegios_fk_planesid_foreign` FOREIGN KEY (`FK_PlanesId`) REFERENCES `tbl_planes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_colegios
-- ----------------------------
BEGIN;
INSERT INTO `tbl_colegios` VALUES (1, 'Jhon F. Kenndy', 'nueva1', NULL, '2019-08-26 10:59:09', 3);
INSERT INTO `tbl_colegios` VALUES (2, 'Nueva Granada', 'nueva2', NULL, NULL, NULL);
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
  `dia` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`PK_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_Docente_Usuario` (`FK_usuario`) USING BTREE,
  CONSTRAINT `fk_TBL_Docente_Usuario` FOREIGN KEY (`FK_usuario`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_docente
-- ----------------------------
BEGIN;
INSERT INTO `tbl_docente` VALUES (1, 'Lic. Sociales', 'Docente Universitario', 5);
INSERT INTO `tbl_docente` VALUES (2, 'Lic. Matematicas', 'Licensiado', 9);
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
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_Estudiante_Usuario` (`FK_usuarioId`) USING BTREE,
  KEY `PK_id` (`PK_id`) USING BTREE,
  CONSTRAINT `fk_TBL_Estudiante_Usuario` FOREIGN KEY (`FK_usuarioId`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_estudiante
-- ----------------------------
BEGIN;
INSERT INTO `tbl_estudiante` VALUES (1, '1070976401', 'ti', 'masculino', 'marzo10', 'faca', 'Sandra', 'serrato', 'Efrain', 'Vergara', 4);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_estudiantematerias
-- ----------------------------
BEGIN;
INSERT INTO `tbl_estudiantematerias` VALUES (1, 1, 1);
INSERT INTO `tbl_estudiantematerias` VALUES (2, 2, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_eventosgenerales
-- ----------------------------
BEGIN;
INSERT INTO `tbl_eventosgenerales` VALUES (2, 'Recreacion Padres e Hijos', '2019-08-30', 2, 2, 1, NULL, NULL);
INSERT INTO `tbl_eventosgenerales` VALUES (3, 'Entrega de insignias', '2019-07-27', 2, 2, NULL, '2019-08-27 10:52:04', '2019-08-27 10:52:04');
COMMIT;

-- ----------------------------
-- Table structure for tbl_grupoestudiantes
-- ----------------------------
DROP TABLE IF EXISTS `tbl_grupoestudiantes`;
CREATE TABLE `tbl_grupoestudiantes` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_estudiante` int(11) DEFAULT NULL,
  `FK_grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_GrupoEstudiantes_Estudiante` (`FK_estudiante`) USING BTREE,
  KEY `fk_TBL_GrupoEstudiantes_Grupo` (`FK_grupo`) USING BTREE,
  CONSTRAINT `fk_TBL_GrupoEstudiantes_Estudiante` FOREIGN KEY (`FK_estudiante`) REFERENCES `tbl_estudiante` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_TBL_GrupoEstudiantes_Grupo` FOREIGN KEY (`FK_grupo`) REFERENCES `tbl_grupos` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_grupoestudiantes
-- ----------------------------
BEGIN;
INSERT INTO `tbl_grupoestudiantes` VALUES (1, 1, 2);
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
  PRIMARY KEY (`PK_id`) USING BTREE,
  KEY `fk_TBL_GrupoMaterias_Materia` (`FK_materia`) USING BTREE,
  KEY `fk_TBL_GrupoMaterias_Docente` (`FK_docente`) USING BTREE,
  KEY `FK_GrupoId` (`FK_GrupoId`),
  CONSTRAINT `fk_TBL_GrupoMaterias_Docente` FOREIGN KEY (`FK_docente`) REFERENCES `tbl_docente` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_TBL_GrupoMaterias_Materia` FOREIGN KEY (`FK_materia`) REFERENCES `tbl_materias` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_grupomaterias_ibfk_1` FOREIGN KEY (`FK_GrupoId`) REFERENCES `tbl_grupos` (`PK_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_grupomaterias
-- ----------------------------
BEGIN;
INSERT INTO `tbl_grupomaterias` VALUES (1, 4, 1, 2);
INSERT INTO `tbl_grupomaterias` VALUES (2, 1, 2, 2);
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
  PRIMARY KEY (`PK_id`),
  KEY `FK_DiaId` (`FK_DiaId`),
  CONSTRAINT `tbl_horario_ibfk_1` FOREIGN KEY (`FK_DiaId`) REFERENCES `tbl_diahorario` (`PK_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_horario
-- ----------------------------
BEGIN;
INSERT INTO `tbl_horario` VALUES (2, '10:00:00', '12:00:00', 1);
COMMIT;

-- ----------------------------
-- Table structure for tbl_horariomateria
-- ----------------------------
DROP TABLE IF EXISTS `tbl_horariomateria`;
CREATE TABLE `tbl_horariomateria` (
  `PK_id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_HorarioId` int(11) DEFAULT NULL,
  `FK_GrupoMateriaId` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_id`),
  KEY `FK_HorarioId` (`FK_HorarioId`),
  KEY `tbl_horariomateria_ibfk_2` (`FK_GrupoMateriaId`),
  CONSTRAINT `tbl_horariomateria_ibfk_1` FOREIGN KEY (`FK_HorarioId`) REFERENCES `tbl_horario` (`PK_id`),
  CONSTRAINT `tbl_horariomateria_ibfk_2` FOREIGN KEY (`FK_GrupoMateriaId`) REFERENCES `tbl_grupomaterias` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_horariomateria
-- ----------------------------
BEGIN;
INSERT INTO `tbl_horariomateria` VALUES (1, 2, 1);
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
-- Table structure for tbl_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE `tbl_usuarios` (
  `PK_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_usuarios
-- ----------------------------
BEGIN;
INSERT INTO `tbl_usuarios` VALUES (1, 'Code Freestyle', NULL, NULL, NULL, 'root@app.com', '$2y$10$/opF8B6oJ66fKE9UobDxR.hwUIXdsgyGMVeC9QU/4bjYxaKHP6oqi', NULL, 1, NULL, '1tjHBsLPzcSM7eGRZzN8yk53tyymlmnLGCzis7KyOzA9esl9ZCG3IOQDlBG6', NULL, NULL);
INSERT INTO `tbl_usuarios` VALUES (2, 'Paisa', NULL, NULL, NULL, 'paisa@mail.com', '$2y$10$LZ0fVWNaDyJoAVjATFe0Nun5CHWa2/4IvjRDwUQ0oQJIBKOK9KJ5q', NULL, 2, 2, 'Ks81pfxgT4ZSPlBOWYth81F36ObOZTzvn2oeRxtWkJ2o8u8DKnv6RJeuTntD', NULL, NULL);
INSERT INTO `tbl_usuarios` VALUES (3, 'Fredo', NULL, NULL, NULL, 'fredo@joya.joya', '$2y$10$wetZSvjjG.AhnvujtJLvZO0KGlsGhfQCy/ME7CYxsdFwnqAqgKIO2', NULL, 3, 2, 'dF4Ct00LoHd3tRkUgp3woRRA5DMNJS8DzaMi1MHTuG8D9akeCBES1RkVoGO2', NULL, NULL);
INSERT INTO `tbl_usuarios` VALUES (4, 'Efrain', NULL, NULL, NULL, 'efrainvergara.udec@gmail.com', '$2y$10$jPeWJCOToFWrax22AqIQLe6ePIJ4VQJzBusqU5B4cIx28xsopvuKi', '', 3, 2, 'gHcQEaRkmKBV1l8ByZsfyXyTcxNhhM1JJQ9FrPDJXJjpTLztF1Jn0PAvUi4R', NULL, NULL);
INSERT INTO `tbl_usuarios` VALUES (5, 'Stevenson', NULL, NULL, NULL, 'stevenson@gmail.com', '$2y$10$uoGk6wXzsBeefLamLqsZROy9dHXC1N/hPDFAhT.LwamnneSQLVyLO', NULL, 4, 2, NULL, NULL, NULL);
INSERT INTO `tbl_usuarios` VALUES (6, 'hector', NULL, NULL, NULL, 'hector@gmail.com', '$2y$10$V2PkYTko8IqNcNGwJZ7AzuhiGoovYvCwptDTmFuZP9S8CXRO4XjF2', NULL, 4, 1, NULL, NULL, NULL);
INSERT INTO `tbl_usuarios` VALUES (7, 'luna vergara', NULL, NULL, NULL, 'luna@mail.com', '$2y$10$U4ZbzguvuL1pOix1SJqwDuItsgTkRg2yU6GuOMDnWcZh5X3v/7gkS', NULL, 3, 2, NULL, '2019-08-26 15:55:03', '2019-08-26 15:55:03');
INSERT INTO `tbl_usuarios` VALUES (8, 'efgerg', NULL, NULL, NULL, 'pai@mail.com', '$2y$10$l5.ghvM2h73oFV2fP9/dquZHZlUBwJL7PUewYUQIOPXxnWZnBWHG.', NULL, 3, NULL, NULL, '2019-08-26 15:58:24', '2019-08-26 15:58:24');
INSERT INTO `tbl_usuarios` VALUES (9, 'Sandra Serrato', NULL, NULL, NULL, 'sandra@mail.com', '$2y$10$0yCUIdxpfh0GrVIXWWU8SuaOfFL1AyfKIP2dYD1CkTVJn03ywPRwO', NULL, 4, 2, NULL, '2019-08-26 16:08:06', '2019-08-26 16:08:06');
INSERT INTO `tbl_usuarios` VALUES (10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 16:17:17', '2019-08-26 16:17:17');
INSERT INTO `tbl_usuarios` VALUES (11, 'luisa', NULL, NULL, NULL, 'luisa@mail.com', '$2y$10$QrEYimN/xaAGLk7WONpGheTbJhVdlfvRqVuIcV8dygOIhSmCH7uSi', NULL, 5, NULL, 'zyqoFOKnyJ3idpYIueZMTL7lSx7xz8nHgZo4iR55VaG2y9aAmvAmNHj2ID1D', '2019-08-26 16:17:17', '2019-08-26 16:17:17');
INSERT INTO `tbl_usuarios` VALUES (12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 16:18:44', '2019-08-26 16:18:44');
INSERT INTO `tbl_usuarios` VALUES (13, 'luisa', NULL, NULL, NULL, 'laura@mail.com', '$2y$10$jOttMmJagIibt0ueiQGxq.SfB/Lfi7fWd4YBtglW67.eF0a6Hesea', NULL, 3, NULL, NULL, '2019-08-26 16:18:45', '2019-08-26 16:18:45');
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
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
