CREATE TABLE `migrations` (
`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
`migration` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`batch` int(11) NOT NULL,
PRIMARY KEY (`id`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `password_resets` (
`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`created_at` timestamp NULL DEFAULT NULL,
INDEX `password_resets_email_index` (`email` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 0
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_agenda` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`tipo_agenda` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_agendaestudiante` (
`Pk_id` int(11) NOT NULL AUTO_INCREMENT,
`descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FK_estudianteId` int(11) NULL DEFAULT NULL,
`FK_agendaId` int(11) NULL DEFAULT NULL,
`fecha` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`Pk_id`) ,
INDEX `fk_TBL_AgendaEstudiante_Agenda` (`FK_agendaId` ASC) USING BTREE,
INDEX `fk_TBL_AgendaEstudiante_Estudiante` (`FK_estudianteId` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_asistencia` (
`PK_id` int(11) NOT NULL,
`tipo_control_asistencia` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 0
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_asistenciaestudiante` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`FK_asistencia` int(11) NULL DEFAULT NULL,
`FK_estudiante` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`cantidad` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`fecha` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) ,
INDEX `fk_TBL_AsistenciaEstudiante_Asistencia` (`FK_asistencia` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_calificacion` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`tipo_calificacion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_calificacionestudiante` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`calificacion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FK_estudiante_materias` int(11) NULL DEFAULT NULL,
`FK_tipo_calificacion` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) ,
INDEX `fk_TBL_CalificacionEstudiante_EstudianteMaterias` (`FK_estudiante_materias` ASC) USING BTREE,
INDEX `fk_TBL_CalificacionEstudiante_TipoCalificacion` (`FK_tipo_calificacion` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_colegios` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
`FK_PlanesId` int(10) NULL DEFAULT NULL,
PRIMARY KEY (`id`) ,
INDEX `tbl_colegios_fk_planesid_foreign` (`FK_PlanesId` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_comunicaciones` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`tipo_comunicacion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_comunicacionestudiante` (
`PK_id` int(11) NOT NULL,
`FK_comunicacionId` int(11) NULL DEFAULT NULL,
`FK_estudianteId` int(11) NULL DEFAULT NULL,
`fecha` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) ,
INDEX `fk_TBL_ComunicacionEstudiante_Comunicaciones` (`FK_comunicacionId` ASC) USING BTREE,
INDEX `fk_TBL_ComunicacionEstudiante_Estudiante` (`FK_estudianteId` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 0
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_cursos` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`nombre_curso` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_docente` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`profesion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`perfil_profesional` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FK_usuario` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) ,
INDEX `fk_TBL_Docente_Usuario` (`FK_usuario` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_estudiante` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`documento_estudiante` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`tipo_documento` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`sexo_estudiante` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`fecha de nacimiento` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`lugar de nacimiento` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`nombre_madre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`apellido_madre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`nombre_padre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`apellido_padre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FK_usuarioId` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) ,
INDEX `fk_TBL_Estudiante_Usuario` (`FK_usuarioId` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_estudiantematerias` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`FK_grupo_materias` int(11) NULL DEFAULT NULL,
`FK_grupo_estudiantes` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) ,
INDEX `fk_TBL_EstudianteMaterias_GrupoMaterias` (`FK_grupo_materias` ASC) USING BTREE,
INDEX `fk_TBL_EstudianteMaterias_GrupoEstudiantes` (`FK_grupo_estudiantes` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_eventos` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`tipo_evento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_eventosgenerales` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`titulo_evento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
`fecha` date NULL DEFAULT NULL,
`FK_EventosId` int(11) NULL DEFAULT NULL,
`FK_ColegioId` int(11) NULL DEFAULT NULL,
`FK_UsuarioId` int(11) NULL DEFAULT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) ,
INDEX `tbl_eventosgenerales_fk_eventosid_foreign` (`FK_EventosId` ASC) USING BTREE,
INDEX `tbl_eventosgenerales_fk_colegioid_foreign` (`FK_ColegioId` ASC) USING BTREE,
INDEX `tbl_eventosgenerales_fk_estudianteid_foreign` (`FK_UsuarioId` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_grupoestudiantes` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`FK_estudiante` int(11) NULL DEFAULT NULL,
`FK_grupo` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) ,
INDEX `fk_TBL_GrupoEstudiantes_Estudiante` (`FK_estudiante` ASC) USING BTREE,
INDEX `fk_TBL_GrupoEstudiantes_Grupo` (`FK_grupo` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_grupomaterias` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`FK_materia` int(11) NULL DEFAULT NULL,
`FK_docente` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) ,
INDEX `fk_TBL_GrupoMaterias_Materia` (`FK_materia` ASC) USING BTREE,
INDEX `fk_TBL_GrupoMaterias_Docente` (`FK_docente` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_grupos` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`grupo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FK_ curso` int(11) NULL DEFAULT NULL,
`ano` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) ,
INDEX `fk_TBL_Grupos_Curso` (`FK_ curso` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_materias` (
`PK_id` int(11) NOT NULL AUTO_INCREMENT,
`nombre_materia` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_planes` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_roles` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;
CREATE TABLE `tbl_usuarios` (
`PK_id` int(10) NOT NULL AUTO_INCREMENT,
`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
`telefono` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
`documento` int(11) NULL DEFAULT NULL,
`direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
`password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
`foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
`FK_RolesId` int(11) NULL DEFAULT NULL,
`FK_ColegioId` int(11) NULL DEFAULT NULL,
`remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`PK_id`) ,
INDEX `tbl_usuarios_fk_rolesid_foreign` (`FK_RolesId` ASC) USING BTREE,
INDEX `tbl_usuarios_fk_colegioid_foreign` (`FK_ColegioId` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 25
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Compact;

ALTER TABLE `tbl_agendaestudiante` ADD CONSTRAINT `fk_TBL_AgendaEstudiante_Agenda` FOREIGN KEY (`FK_agendaId`) REFERENCES `tbl_agenda` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `tbl_agendaestudiante` ADD CONSTRAINT `fk_TBL_AgendaEstudiante_Estudiante` FOREIGN KEY (`FK_estudianteId`) REFERENCES `tbl_estudiante` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `tbl_asistenciaestudiante` ADD CONSTRAINT `fk_TBL_AsistenciaEstudiante_Asistencia` FOREIGN KEY (`FK_asistencia`) REFERENCES `tbl_asistencia` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tbl_calificacionestudiante` ADD CONSTRAINT `fk_TBL_CalificacionEstudiante_EstudianteMaterias` FOREIGN KEY (`FK_estudiante_materias`) REFERENCES `tbl_estudiantematerias` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tbl_calificacionestudiante` ADD CONSTRAINT `fk_TBL_CalificacionEstudiante_TipoCalificacion` FOREIGN KEY (`FK_tipo_calificacion`) REFERENCES `tbl_calificacion` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tbl_colegios` ADD CONSTRAINT `tbl_colegios_fk_planesid_foreign` FOREIGN KEY (`FK_PlanesId`) REFERENCES `tbl_planes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tbl_comunicacionestudiante` ADD CONSTRAINT `fk_TBL_ComunicacionEstudiante_Comunicaciones` FOREIGN KEY (`FK_comunicacionId`) REFERENCES `tbl_comunicaciones` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `tbl_comunicacionestudiante` ADD CONSTRAINT `fk_TBL_ComunicacionEstudiante_Estudiante` FOREIGN KEY (`FK_estudianteId`) REFERENCES `tbl_estudiante` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `tbl_docente` ADD CONSTRAINT `fk_TBL_Docente_Usuario` FOREIGN KEY (`FK_usuario`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `tbl_estudiante` ADD CONSTRAINT `fk_TBL_Estudiante_Usuario` FOREIGN KEY (`FK_usuarioId`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `tbl_estudiantematerias` ADD CONSTRAINT `fk_TBL_EstudianteMaterias_GrupoEstudiantes` FOREIGN KEY (`FK_grupo_estudiantes`) REFERENCES `tbl_grupoestudiantes` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tbl_estudiantematerias` ADD CONSTRAINT `fk_TBL_EstudianteMaterias_GrupoMaterias` FOREIGN KEY (`FK_grupo_materias`) REFERENCES `tbl_grupomaterias` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tbl_eventosgenerales` ADD CONSTRAINT `tbl_eventosgenerales_fk_colegioid_foreign` FOREIGN KEY (`FK_ColegioId`) REFERENCES `tbl_colegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tbl_eventosgenerales` ADD CONSTRAINT `tbl_eventosgenerales_fk_estudianteid_foreign` FOREIGN KEY (`FK_UsuarioId`) REFERENCES `tbl_usuarios` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tbl_eventosgenerales` ADD CONSTRAINT `tbl_eventosgenerales_fk_eventosid_foreign` FOREIGN KEY (`FK_EventosId`) REFERENCES `tbl_eventos` (`PK_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tbl_grupoestudiantes` ADD CONSTRAINT `fk_TBL_GrupoEstudiantes_Estudiante` FOREIGN KEY (`FK_estudiante`) REFERENCES `tbl_estudiante` (`PK_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `tbl_grupoestudiantes` ADD CONSTRAINT `fk_TBL_GrupoEstudiantes_Grupo` FOREIGN KEY (`FK_grupo`) REFERENCES `tbl_grupos` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tbl_grupomaterias` ADD CONSTRAINT `fk_TBL_GrupoMaterias_Docente` FOREIGN KEY (`FK_docente`) REFERENCES `tbl_docente` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tbl_grupomaterias` ADD CONSTRAINT `fk_TBL_GrupoMaterias_Materia` FOREIGN KEY (`FK_materia`) REFERENCES `tbl_materias` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tbl_grupos` ADD CONSTRAINT `fk_TBL_Grupos_Curso` FOREIGN KEY (`FK_ curso`) REFERENCES `tbl_cursos` (`PK_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tbl_usuarios` ADD CONSTRAINT `tbl_usuarios_fk_colegioid_foreign` FOREIGN KEY (`FK_ColegioId`) REFERENCES `tbl_colegios` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `tbl_usuarios` ADD CONSTRAINT `tbl_usuarios_fk_rolesid_foreign` FOREIGN KEY (`FK_RolesId`) REFERENCES `tbl_roles` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

