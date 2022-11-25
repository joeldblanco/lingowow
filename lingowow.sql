/*
 SQLyog Ultimate v13.1.1 (64 bit)
 MySQL - 10.4.18-MariaDB : Database - lingowow
 *********************************************************************
 */
/*!40101 SET NAMES utf8 */
;

/*!40101 SET SQL_MODE=''*/
;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;

CREATE DATABASE
/*!32312 IF NOT EXISTS*/
`lingowow`
/*!40100 DEFAULT CHARACTER SET utf8mb4 */
;

USE `lingowow`;

/*Data for the table `activities` */
/*Data for the table `activity_user` */
/*Data for the table `answers` */
/*Data for the table `attempts` */
insert into
    `attempts`(
        `id`,
        `user_id`,
        `exam_id`,
        `data`,
        `score`,
        `end_timestamp`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
values
    (
        78,
        5,
        9,
        '{\"answers\":[-1,\"3\",\"1\",\"3\",\"3\",\"3\",\"2\",-1,\"3\",-1,\"3\",-1,\"2\",-1,\"1\",-1,\"3\",-1,\"3\",\"2\",\"3\",-1]}',
        4,
        NULL,
        '2022-05-06 20:24:02',
        '2022-05-07 01:24:02',
        NULL
    ),
    (
        79,
        5,
        9,
        '{\"answers\":[-1,\"3\",\"2\",\"1\",\"2\",\"3\",\"2\",\"3\",-1,\"1\",\"3\",-1,\"2\",-1,-1,-1,\"3\",-1,-1,-1,-1,-1]}',
        3,
        NULL,
        '2022-05-09 18:08:40',
        '2022-05-09 23:08:40',
        NULL
    ),
    (
        80,
        5,
        9,
        '{\"answers\":[-1,\"1\",\"3\",\"2\",-1,\"1\",-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1]}',
        2,
        NULL,
        '2022-05-12 09:52:59',
        '2022-05-12 14:52:59',
        NULL
    ),
    (
        81,
        5,
        9,
        '{\"answers\":[-1,\"1\",\"2\",\"3\",\"1\",\"2\",\"3\",\"1\",\"2\",-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1]}',
        2,
        NULL,
        '2022-05-12 15:30:48',
        '2022-05-12 20:30:48',
        NULL
    ),
    (
        82,
        5,
        9,
        '{\"answers\":[-1,\"1\",\"2\",\"3\",\"2\",\"1\",\"3\",\"3\",\"2\",\"2\",\"1\",-1,\"2\",\"2\",\"2\",\"1\",\"3\",\"2\",\"3\",\"2\",\"1\",\"\"]}',
        26,
        NULL,
        '2022-05-12 18:37:16',
        '2022-05-12 23:37:16',
        NULL
    ),
    (
        83,
        5,
        9,
        NULL,
        NULL,
        NULL,
        '2022-05-12 23:40:00',
        '2022-05-12 23:40:00',
        NULL
    ),
    (
        84,
        5,
        9,
        NULL,
        NULL,
        NULL,
        '2022-05-12 23:41:40',
        '2022-05-12 23:41:40',
        NULL
    ),
    (
        85,
        5,
        9,
        NULL,
        NULL,
        NULL,
        '2022-05-12 23:50:36',
        '2022-05-12 23:50:36',
        NULL
    ),
    (
        86,
        5,
        9,
        NULL,
        NULL,
        NULL,
        '2022-05-12 23:51:07',
        '2022-05-12 23:51:07',
        NULL
    ),
    (
        87,
        5,
        9,
        NULL,
        NULL,
        NULL,
        '2022-05-12 23:56:59',
        '2022-05-12 23:56:59',
        NULL
    ),
    (
        88,
        5,
        9,
        NULL,
        NULL,
        NULL,
        '2022-05-12 23:57:32',
        '2022-05-12 23:57:32',
        NULL
    ),
    (
        89,
        5,
        9,
        NULL,
        NULL,
        NULL,
        '2022-05-12 23:57:59',
        '2022-05-12 23:57:59',
        NULL
    ),
    (
        90,
        5,
        9,
        NULL,
        NULL,
        NULL,
        '2022-05-12 23:59:46',
        '2022-05-12 23:59:46',
        NULL
    ),
    (
        91,
        5,
        9,
        NULL,
        NULL,
        NULL,
        '2022-05-12 23:59:59',
        '2022-05-12 23:59:59',
        NULL
    ),
    (
        92,
        5,
        9,
        NULL,
        NULL,
        NULL,
        '2022-05-13 00:00:53',
        '2022-05-13 00:00:53',
        NULL
    ),
    (
        93,
        5,
        9,
        '{\"answers\":[-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,\"<p>asdasd sadasdasdasd kajsdasdklasjdas<\\/p>\"]}',
        0,
        NULL,
        '2022-05-12 19:01:44',
        '2022-05-13 00:01:44',
        NULL
    ),
    (
        94,
        5,
        9,
        '{\"answers\":[-1,\"2\",\"1\",\"3\",\"3\",\"2\",\"3\",\"3\",-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,\"<p>Whiiiz<\\/p>\"]}',
        2,
        NULL,
        '2022-07-26 03:13:16',
        '2022-07-26 07:13:16',
        NULL
    );

/*Data for the table `class_comments` */
/*Data for the table `classes` */
insert into
    `classes`(
        `id`,
        `description`,
        `start_date`,
        `end_date`,
        `enrolment_id`,
        `meeting_id`,
        `teacher_check`,
        `student_check`,
        `status`,
        `created_at`,
        `updated_at`
    )
values
    (
        676,
        NULL,
        '2022-11-27 18:00:00',
        '2022-11-27 18:40:00',
        1,
        NULL,
        1,
        1,
        NULL,
        '2022-11-22 03:49:51',
        '2022-11-23 19:31:22'
    ),
    (
        677,
        NULL,
        '2022-11-28 18:00:00',
        '2022-11-28 18:40:00',
        1,
        NULL,
        1,
        1,
        NULL,
        '2022-11-22 03:49:53',
        '2022-11-23 19:31:22'
    ),
    (
        678,
        NULL,
        '2022-11-28 06:00:00',
        '2022-11-28 06:40:00',
        11,
        NULL,
        1,
        1,
        NULL,
        '2022-11-23 15:47:01',
        '2022-11-23 19:31:22'
    ),
    (
        679,
        NULL,
        '2022-11-29 06:00:00',
        '2022-11-29 06:40:00',
        11,
        NULL,
        1,
        1,
        NULL,
        '2022-11-23 15:47:03',
        '2022-11-23 19:31:22'
    );

/*Data for the table `comments` */
insert into
    `comments`(
        `id`,
        `author_id`,
        `content`,
        `commentable_id`,
        `commentable_type`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
values
    (
        1,
        9,
        'Comment 1',
        3,
        'App\\Models\\Post',
        '2022-09-21 12:03:47',
        '2022-09-21 12:03:51',
        NULL
    ),
    (
        2,
        6,
        'Editar un comentario',
        3,
        'App\\Models\\Post',
        '2022-09-21 17:54:47',
        '2022-09-21 19:21:44',
        NULL
    ),
    (
        3,
        6,
        'Comment',
        654,
        'App\\Models\\Classes',
        '2022-11-14 05:48:59',
        '2022-11-14 05:48:59',
        NULL
    ),
    (
        4,
        5,
        'Edition',
        23,
        'App\\Models\\Post',
        '2022-11-14 05:57:42',
        '2022-11-14 06:03:35',
        NULL
    ),
    (
        5,
        7,
        'Cooment',
        24,
        'App\\Models\\Post',
        '2022-11-15 20:52:47',
        '2022-11-15 20:52:47',
        NULL
    );

/*Data for the table `contents` */
insert into
    `contents`(
        `id`,
        `content`,
        `unit_id`,
        `status`,
        `order`,
        `created_at`,
        `updated_at`
    )
values
    (
        2,
        '{\"type\":\"embeddable\",\"embeddable\":\"<iframe src=\\\"https:\\/\\/docs.google.com\\/presentation\\/d\\/e\\/2PACX-1vR6qonh5bQBqrnz3MmQDuOAPNPm0MYzeDcBHWo2Cid_w1u9hBKtb-BjXRwuEuPjjw\\/embed?start=false&amp;loop=false&amp;delayms=3000\\\" allowfullscreen=\\\"true\\\" mozallowfullscreen=\\\"true\\\" webkitallowfullscreen=\\\"true\\\" width=\\\"860\\\" height=\\\"469\\\" frameborder=\\\"0\\\"><\\/iframe>\"}',
        1,
        1,
        2,
        '2022-11-03 07:06:45',
        '2022-11-15 20:55:40'
    ),
    (
        3,
        '{\"type\":\"url\",\"link_title\":\"Unit 1 - Self-study Material\",\"link_url\":\"https:\\/\\/drive.google.com\\/file\\/d\\/17elJeQkbi_uYW_O5A8BIM9eWsJAEap0O\\/view?usp=sharing\\\"\"}',
        1,
        1,
        3,
        '2022-11-18 20:22:26',
        '2022-11-18 20:22:26'
    ),
    (
        4,
        '{\"type\":\"media\",\"media_url\":\"public\\/content\\\\files\\\\1668821555.mp3\"}',
        1,
        1,
        4,
        '2022-11-19 01:32:35',
        '2022-11-19 17:55:48'
    ),
    (
        5,
        '{\"type\":\"embeddable\",\"embeddable\":\"<iframe width=\\\"853\\\" height=\\\"480\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/-UGRkuEURrs\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\\\" allowfullscreen=\\\"\\\"><\\/iframe>\"}',
        1,
        1,
        5,
        '2022-11-19 18:36:27',
        '2022-11-19 18:36:27'
    ),
    (
        6,
        '{\"type\":\"embeddable\",\"embeddable\":\"<iframe src=\\\"https:\\/\\/docs.google.com\\/presentation\\/d\\/e\\/2PACX-1vRWGfVMrqnyaAJBOaexmCHwOzyv26_YoADyileU5iN8cv9KQwQ5FiElQqjVGLYneg\\/embed?start=false&amp;loop=false&amp;delayms=3000\\\" allowfullscreen=\\\"true\\\" mozallowfullscreen=\\\"true\\\" webkitallowfullscreen=\\\"true\\\" width=\\\"860\\\" height=\\\"469\\\" frameborder=\\\"0\\\"><\\/iframe>\"}',
        2,
        1,
        1,
        '2022-11-19 18:37:01',
        '2022-11-19 18:37:01'
    ),
    (
        7,
        '{\"type\":\"url\",\"link_title\":\"Unit 2 - Self-study Material\",\"link_url\":\"https:\\/\\/drive.google.com\\/file\\/d\\/1BjbebKfpqbU_Gg6iay7p8JKt7WdA45QF\\/view?usp=sharing\"}',
        2,
        1,
        2,
        '2022-11-19 18:37:35',
        '2022-11-19 18:37:35'
    ),
    (
        8,
        '{\"type\":\"embeddable\",\"embeddable\":\"<iframe width=\\\"853\\\" height=\\\"480\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/QQavoMYmMVE\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\\\" allowfullscreen=\\\"\\\"><\\/iframe>\"}',
        2,
        1,
        5,
        '2022-11-19 18:38:05',
        '2022-11-19 20:24:11'
    ),
    (
        10,
        '{\"type\":\"media\",\"media_url\":\"public\\/content\\/files\\/1668889220.mp3\"}',
        2,
        1,
        3,
        '2022-11-19 20:20:20',
        '2022-11-19 20:24:11'
    ),
    (
        12,
        '{\"type\":\"embeddable\",\"embeddable\":\"<iframe src=\\\"https:\\/\\/docs.google.com\\/presentation\\/d\\/e\\/2PACX-1vQZD_yEu7BqadWPb9vuZA3gzbu1YbGWjXxNmgLcmNerMU4LScFt1bcYPmBLHKAK0A\\/embed?start=false&amp;loop=false&amp;delayms=3000\\\" allowfullscreen=\\\"true\\\" mozallowfullscreen=\\\"true\\\" webkitallowfullscreen=\\\"true\\\" width=\\\"860\\\" height=\\\"469\\\" frameborder=\\\"0\\\"><\\/iframe>\"}',
        3,
        1,
        1,
        '2022-11-19 20:30:55',
        '2022-11-19 20:30:55'
    ),
    (
        13,
        '{\"type\":\"url\",\"link_title\":\"Unit 3 - Self-study Material\",\"link_url\":\"https:\\/\\/drive.google.com\\/file\\/d\\/1a3Ev9wEw1lxZ5sxYxIWtfL0Zixt3YadS\\/view?usp=sharing\"}',
        3,
        1,
        2,
        '2022-11-19 20:31:18',
        '2022-11-19 20:31:18'
    ),
    (
        16,
        '{\"type\":\"media\",\"media_url\":\"public\\/content\\/files\\/1668891120.mp3\"}',
        3,
        1,
        3,
        '2022-11-19 20:52:00',
        '2022-11-19 20:52:00'
    ),
    (
        17,
        '{\"type\":\"embeddable\",\"embeddable\":\"<iframe width=\\\"853\\\" height=\\\"480\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/JwGnCIsLOpU\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\\\" allowfullscreen=\\\"\\\"><\\/iframe>\"}',
        3,
        1,
        4,
        '2022-11-19 20:53:44',
        '2022-11-19 20:53:44'
    ),
    (
        18,
        '{\"type\":\"embeddable\",\"embeddable\":\"<iframe src=\\\"https:\\/\\/docs.google.com\\/presentation\\/d\\/e\\/2PACX-1vRgxWtL8xzbN0T7LRq8z5zMOsGQcnyml5D5_7MoEgmVdUagXY305wQscCvI0sD4AA\\/embed?start=false&amp;loop=false&amp;delayms=3000\\\" allowfullscreen=\\\"true\\\" mozallowfullscreen=\\\"true\\\" webkitallowfullscreen=\\\"true\\\" width=\\\"860\\\" height=\\\"469\\\" frameborder=\\\"0\\\"><\\/iframe>\"}',
        4,
        1,
        1,
        '2022-11-19 21:00:09',
        '2022-11-19 21:00:09'
    ),
    (
        19,
        '{\"type\":\"url\",\"link_title\":\"Unit 4 - Self-study Material\",\"link_url\":\"https:\\/\\/drive.google.com\\/file\\/d\\/1GQ52VuEMXt4R7FR7itetpN_30jV9zuOj\\/view?usp=sharing\"}',
        4,
        1,
        2,
        '2022-11-19 21:00:22',
        '2022-11-19 21:00:22'
    ),
    (
        20,
        '{\"type\":\"embeddable\",\"embeddable\":\"<iframe width=\\\"853\\\" height=\\\"480\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/oQNbTNY5amQ\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\\\" allowfullscreen=\\\"\\\"><\\/iframe>\"}',
        4,
        1,
        4,
        '2022-11-19 21:00:42',
        '2022-11-19 21:04:32'
    ),
    (
        21,
        '{\"type\":\"media\",\"media_url\":\"public\\/content\\/files\\/1668891858.mp3\"}',
        4,
        1,
        3,
        '2022-11-19 21:04:18',
        '2022-11-19 21:04:33'
    );

/*Data for the table `conversation_user` */
insert into
    `conversation_user`(
        `id`,
        `user_id`,
        `conversation_id`,
        `color`,
        `active`,
        `created_at`,
        `updated_at`
    )
values
    (1, 5, 12, NULL, 1, NULL, NULL),
    (2, 9, 12, NULL, 1, NULL, NULL),
    (3, 6, 13, NULL, 1, NULL, NULL),
    (4, 7, 13, NULL, 1, NULL, NULL),
    (7, 6, 17, NULL, 1, NULL, NULL),
    (8, 257, 17, NULL, 1, NULL, NULL);

/*Data for the table `conversations` */
insert into
    `conversations`(
        `id`,
        `name`,
        `image_url`,
        `group_conversation`,
        `status`,
        `created_at`,
        `updated_at`
    )
values
    (
        1,
        '',
        'profile-photos/default_group_pp.jpg',
        0,
        1,
        '2021-09-29 11:58:45',
        '2021-09-29 11:58:45'
    ),
    (
        2,
        '',
        'profile-photos/default_group_pp.jpg',
        0,
        1,
        '2021-09-29 11:58:45',
        '2021-09-29 11:58:45'
    ),
    (
        6,
        '',
        'profile-photos/default_group_pp.jpg',
        0,
        1,
        '2021-10-15 12:18:36',
        '2021-10-15 12:18:36'
    ),
    (
        11,
        '',
        'profile-photos/default_group_pp.jpg',
        0,
        1,
        '2022-07-26 05:59:25',
        '2022-07-26 05:59:25'
    ),
    (
        12,
        '',
        'profile-photos/default_group_pp.jpg',
        0,
        1,
        '2022-07-26 06:01:27',
        '2022-07-26 06:01:27'
    ),
    (
        13,
        NULL,
        'profile-photos/default_group_pp.jpg',
        0,
        1,
        '2022-09-13 06:39:00',
        '2022-09-13 06:39:00'
    ),
    (
        17,
        NULL,
        'profile-photos/default_group_pp.jpg',
        0,
        1,
        '2022-09-13 17:03:20',
        '2022-09-13 17:03:20'
    );

/*Data for the table `coupons` */
insert into
    `coupons`(
        `id`,
        `code`,
        `model_type`,
        `model_id`,
        `data`,
        `is_disposable`,
        `expires_at`,
        `created_at`,
        `updated_at`
    )
values
    (
        5,
        'TUC-3R9G-QB4U',
        'App\\Models\\Product',
        1,
        '[]',
        1,
        NULL,
        '2021-12-26 03:27:22',
        '2021-12-26 03:27:22'
    ),
    (
        6,
        'TUC-NW7V-VXPA',
        'App\\Models\\Product',
        1,
        '{\"amount\":\"40\"}',
        0,
        NULL,
        '2022-01-12 03:47:16',
        '2022-01-12 03:47:16'
    );

/*Data for the table `course` */
insert into
    `course`(`id`, `name_course`, `url_image`, `estado`)
values
    (
        1,
        'English',
        'https://img.pixers.pics/pho_wat(s3:700/FO/60/89/19/91/700_FO60891991_9eb8248aebe7688d0b16c848c91d86e9.jpg,700,467,cms:2018/10/5bd1b6b8d04b8_220x50-watermark.png,over,480,417,jpg)/almohadas-largas-ee-uu-y-el-reino-unido-de-la-bandera.jpg.jpg',
        'A'
    ),
    (
        2,
        'Español',
        'https://aula47.com/wp-content/uploads/2016/03/esp4.jpg',
        'A'
    );

/*Data for the table `course_product` */
insert into
    `course_product`(`product_id`, `course_id`)
values
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (14, 1);

/*Data for the table `courses` */
insert into
    `courses`(
        `id`,
        `name`,
        `description`,
        `category`,
        `modality`,
        `image_url`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
values
    (
        1,
        'Regular English Program',
        'Nuestro programa de Inglés está fundamentado en los estándares del Marco de Referencia Europeo, trabajamos con funciones comunicativas evocando contextos reales y experiencias funcionales de aprendizaje, a la par de encuentros interactivos con otros aprendices y hablantes nativos.',
        'English',
        'synchronous',
        'images/courses/covers/regular_english_program.jpeg',
        '2021-11-27 14:48:06',
        '2021-11-27 14:48:06',
        NULL
    ),
    (
        2,
        'Conversational English Program',
        'Clases con entornos totalmente personalizados, enfocadas en la necesidad específica de cada estudiante y en desarrollo de sus destrezas comunicativas. Además de las clases regulares, este paquete incluye otras prácticas conversacionales donde el estudiante interactúa con otros aprendices y nativo hablantes.',
        'English',
        'synchronous',
        'images/courses/covers/conversational_english_program.jpeg',
        '2021-11-27 14:48:06',
        '2021-11-27 14:48:06',
        NULL
    ),
    (
        3,
        'Regular Spanish Program',
        'Nuestro programa en línea de español esta basado en los estándares del Marco de Referencia Europeo. El programa busca ayudar a los aprendices a comunicarse y desarrollar destrezas en contextos reales haciéndoles vivir experiencias de aprendizaje asertivas y con propósito en sus lecciones, a través del desarrollo de tareas y encuentros interactivos con otros aprendices y nativo hablantes.',
        'Spanish',
        'synchronous',
        'images/courses/covers/regular_spanish_program.jpeg',
        '2021-11-27 14:48:06',
        '2021-11-27 14:48:06',
        NULL
    ),
    (
        4,
        'Conversational Spanish Program',
        'Clases con entornos totalmente personalizados, enfocadas en la necesidad específica de cada estudiante y en desarrollo de sus destrezas comunicativas. Además de las clases regulares, este paquete incluye otras prácticas conversacionales donde el estudiante interactúa con otros aprendices y nativo hablantes.',
        'Spanish',
        'synchronous',
        'images/courses/covers/conversational_spanish_program.jpeg',
        '2021-11-27 14:48:06',
        '2021-11-27 14:48:06',
        NULL
    ),
    (
        5,
        'English Pronunciation Course',
        'El curso de Introducción a la Pronunciación presentará una amplia gama de sonidos del inglés profundizando en los patrones que podemos detectar en las letras vocales. Los sonidos vocálicos, sus entornos, las grafías entre otros aspectos serán estudiados en profundidad en este curso. Además, habrá prácticas y pruebas para evaluar tu proceso de aprendizaje. ',
        'English',
        'asynchronous',
        'images/courses/covers/english_pronunciation_course.jpeg',
        '2021-11-27 14:48:06',
        '2021-11-27 14:48:06',
        NULL
    ),
    (
        6,
        'English Grammar Course',
        'Este curso pretende capacitarte para que seas capaz de identificar, analizar y manejar algunos puntos clave del sistema interno que rige el lenguaje. Además, profundizaremos en el enfoque práctico para que aprendas a utilizar lo que aprenderás.',
        'English',
        'asynchronous',
        'images/courses/covers/english_grammar_course.jpeg',
        '2021-11-27 14:48:06',
        '2021-11-27 14:48:06',
        NULL
    );

/*Data for the table `deleted_messages` */
/*Data for the table `enrolments` */
insert into
    `enrolments`(
        `id`,
        `student_id`,
        `teacher_id`,
        `course_id`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
values
    (
        1,
        5,
        7,
        1,
        '2021-11-26 18:30:22',
        '2022-11-22 03:49:45',
        NULL
    ),
    (
        2,
        208,
        7,
        3,
        '2021-11-26 18:30:22',
        '2021-11-26 18:30:22',
        '2022-02-16 13:35:05'
    ),
    (
        9,
        5,
        7,
        2,
        '2022-01-06 15:49:29',
        '2022-01-06 15:49:29',
        '2022-01-21 18:37:58'
    ),
    (
        10,
        5,
        7,
        3,
        '2022-01-07 18:49:46',
        '2022-01-07 18:49:46',
        '2022-01-21 18:38:08'
    ),
    (
        11,
        9,
        7,
        1,
        '2022-06-24 03:26:33',
        '2022-11-22 19:57:00',
        NULL
    ),
    (
        12,
        183,
        7,
        1,
        '2022-07-29 06:20:02',
        '2022-09-27 19:21:32',
        '2022-09-27 19:21:32'
    ),
    (
        13,
        NULL,
        7,
        3,
        '2022-11-15 03:29:34',
        '2022-11-15 03:36:59',
        '2022-11-15 03:36:59'
    ),
    (
        17,
        NULL,
        7,
        2,
        '2022-11-15 03:37:19',
        '2022-11-22 03:45:26',
        '2022-11-22 03:45:26'
    ),
    (
        18,
        NULL,
        7,
        6,
        '2022-11-15 20:58:44',
        '2022-11-15 20:58:58',
        '2022-11-15 20:58:58'
    );

/*Data for the table `evaluation_module` */
/*Data for the table `evaluation_unit` */
/*Data for the table `exam_module` */
/*Data for the table `exam_question` */
insert into
    `exam_question`(`exam_id`, `question_id`)
values
    (9, 43),
    (9, 44),
    (9, 45),
    (9, 46),
    (9, 47),
    (9, 48),
    (9, 49),
    (9, 50),
    (9, 51),
    (9, 52),
    (9, 53),
    (9, 54),
    (9, 55),
    (9, 56),
    (9, 57),
    (9, 58),
    (9, 59),
    (9, 60),
    (9, 61),
    (9, 62),
    (9, 63),
    (9, 64),
    (9, 65),
    (9, 66),
    (9, 67),
    (9, 68),
    (9, 69),
    (9, 70),
    (9, 71),
    (9, 72),
    (9, 73),
    (9, 74),
    (9, 75),
    (9, 76),
    (9, 77),
    (9, 78),
    (9, 79),
    (9, 80),
    (9, 81),
    (9, 82),
    (9, 83),
    (9, 84);

/*Data for the table `exam_unit` */
/*Data for the table `exam_user` */
/*Data for the table `exams` */
insert into
    `exams`(
        `id`,
        `unit_id`,
        `type`,
        `min_score`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
values
    (
        8,
        4,
        NULL,
        10,
        '2022-02-01 21:31:07',
        '2022-02-01 21:31:07',
        NULL
    ),
    (
        9,
        2,
        NULL,
        10,
        '2022-02-07 17:42:30',
        '2022-02-07 17:42:30',
        NULL
    ),
    (
        10,
        0,
        NULL,
        10,
        '2022-02-09 21:23:20',
        '2022-02-09 21:23:20',
        NULL
    );

/*Data for the table `failed_jobs` */
insert into
    `failed_jobs`(
        `id`,
        `uuid`,
        `connection`,
        `queue`,
        `payload`,
        `exception`,
        `failed_at`
    )
values
    (
        1,
        'fabd7647-9b0d-40dd-a72f-03b819b8c4c9',
        'database',
        'default',
        '{\"uuid\":\"fabd7647-9b0d-40dd-a72f-03b819b8c4c9\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":11:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:742;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:54:46'
    ),
    (
        2,
        'a3f87f40-2d88-4365-ae4e-f1a6d108949e',
        'database',
        'default',
        '{\"uuid\":\"a3f87f40-2d88-4365-ae4e-f1a6d108949e\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":11:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:743;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:54:47'
    ),
    (
        3,
        '2d86e6ff-45d4-4f93-a129-1586c1132fad',
        'database',
        'default',
        '{\"uuid\":\"2d86e6ff-45d4-4f93-a129-1586c1132fad\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":11:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:744;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:54:47'
    ),
    (
        4,
        '3276d225-e0c6-430a-bf5e-7e8117f4aa49',
        'database',
        'default',
        '{\"uuid\":\"3276d225-e0c6-430a-bf5e-7e8117f4aa49\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":11:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:745;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:54:48'
    ),
    (
        5,
        '12a4cd1f-7f8c-477d-99d7-5ab31f1d5725',
        'database',
        'default',
        '{\"uuid\":\"12a4cd1f-7f8c-477d-99d7-5ab31f1d5725\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":11:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:746;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:54:49'
    ),
    (
        6,
        '217f6ee0-d2d0-4236-9efc-839ec6ec2cf4',
        'database',
        'default',
        '{\"uuid\":\"217f6ee0-d2d0-4236-9efc-839ec6ec2cf4\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":11:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:747;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:54:49'
    ),
    (
        7,
        '1e20cd34-ef44-46d2-b863-395ce5e62a26',
        'database',
        'default',
        '{\"uuid\":\"1e20cd34-ef44-46d2-b863-395ce5e62a26\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":11:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:748;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:54:51'
    ),
    (
        8,
        'be27e270-453a-46d8-be5f-3daa80bc0e94',
        'database',
        'default',
        '{\"uuid\":\"be27e270-453a-46d8-be5f-3daa80bc0e94\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":11:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:749;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:54:51'
    ),
    (
        9,
        '5a69e254-627c-4719-aca3-bfd7bc9f7e5b',
        'database',
        'default',
        '{\"uuid\":\"5a69e254-627c-4719-aca3-bfd7bc9f7e5b\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":11:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:750;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:54:52'
    ),
    (
        10,
        'e9e7181b-bac9-49be-bf56-a988c1461454',
        'database',
        'default',
        '{\"uuid\":\"e9e7181b-bac9-49be-bf56-a988c1461454\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":11:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:751;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:54:53'
    ),
    (
        11,
        '32437fcc-b3d5-43ae-82a6-5eab20f48fd9',
        'database',
        'default',
        '{\"uuid\":\"32437fcc-b3d5-43ae-82a6-5eab20f48fd9\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":11:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:752;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:54:54'
    ),
    (
        12,
        '4488dcf0-cb76-4574-a065-8e1c2712d213',
        'database',
        'default',
        '{\"uuid\":\"4488dcf0-cb76-4574-a065-8e1c2712d213\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":11:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:753;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:54:58'
    ),
    (
        13,
        '89dc90c8-7a4f-4c91-aad5-aca39c332563',
        'database',
        'default',
        '{\"uuid\":\"89dc90c8-7a4f-4c91-aad5-aca39c332563\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:754;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:59:02'
    ),
    (
        14,
        '3abeb972-c7dc-4fec-b95d-a5b9bc562b49',
        'database',
        'default',
        '{\"uuid\":\"3abeb972-c7dc-4fec-b95d-a5b9bc562b49\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:755;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:59:05'
    ),
    (
        15,
        '3744c303-9b15-4b36-b9dd-23cd28c3ae3c',
        'database',
        'default',
        '{\"uuid\":\"3744c303-9b15-4b36-b9dd-23cd28c3ae3c\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:756;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:59:11'
    ),
    (
        16,
        '36a13614-8adb-4655-84a1-048fcd8e2529',
        'database',
        'default',
        '{\"uuid\":\"36a13614-8adb-4655-84a1-048fcd8e2529\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:757;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:59:16'
    ),
    (
        17,
        'ac5003dd-e667-42c6-8f91-cfe4ba856757',
        'database',
        'default',
        '{\"uuid\":\"ac5003dd-e667-42c6-8f91-cfe4ba856757\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:758;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:59:19'
    ),
    (
        18,
        '00c3c9ea-5dd5-404c-a9b3-a37e154dd709',
        'database',
        'default',
        '{\"uuid\":\"00c3c9ea-5dd5-404c-a9b3-a37e154dd709\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:759;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:59:25'
    ),
    (
        19,
        'cb3cc2aa-9c01-42e8-8eb9-b2f095179c61',
        'database',
        'default',
        '{\"uuid\":\"cb3cc2aa-9c01-42e8-8eb9-b2f095179c61\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:760;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:59:26'
    ),
    (
        20,
        '3111391f-7594-4352-84e7-86296c4c501d',
        'database',
        'default',
        '{\"uuid\":\"3111391f-7594-4352-84e7-86296c4c501d\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:761;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:59:26'
    ),
    (
        21,
        '37a8c45f-9966-454a-b036-9a6575b6e8ce',
        'database',
        'default',
        '{\"uuid\":\"37a8c45f-9966-454a-b036-9a6575b6e8ce\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:762;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:59:26'
    ),
    (
        22,
        '77d6ffe7-fbd0-4d44-9f52-a61275fcded8',
        'database',
        'default',
        '{\"uuid\":\"77d6ffe7-fbd0-4d44-9f52-a61275fcded8\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:763;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:59:26'
    ),
    (
        23,
        'f1f07704-9834-495e-bf54-52d3bb141eb3',
        'database',
        'default',
        '{\"uuid\":\"f1f07704-9834-495e-bf54-52d3bb141eb3\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:764;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:59:26'
    ),
    (
        24,
        '74b5311f-b4b2-41a4-b600-8ea74e4cb786',
        'database',
        'default',
        '{\"uuid\":\"74b5311f-b4b2-41a4-b600-8ea74e4cb786\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:8:\\\"\\u0000*\\u0000class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:765;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 03:59:26'
    ),
    (
        25,
        '6fac96d5-8ad1-4789-9a0b-f7c8f7a012ed',
        'database',
        'default',
        '{\"uuid\":\"6fac96d5-8ad1-4789-9a0b-f7c8f7a012ed\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:766;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 04:05:34'
    ),
    (
        26,
        'f8645b98-2c14-43b3-9769-a2e494157422',
        'database',
        'default',
        '{\"uuid\":\"f8645b98-2c14-43b3-9769-a2e494157422\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:767;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 04:05:34'
    ),
    (
        27,
        '3aa6df18-ae58-4b26-ae0f-2f1a079d4ce1',
        'database',
        'default',
        '{\"uuid\":\"3aa6df18-ae58-4b26-ae0f-2f1a079d4ce1\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:768;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 04:05:34'
    ),
    (
        28,
        '674907f4-9090-4795-bc0d-2540ab8d51a2',
        'database',
        'default',
        '{\"uuid\":\"674907f4-9090-4795-bc0d-2540ab8d51a2\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:769;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 04:05:40'
    ),
    (
        29,
        '48e76dd8-5d1c-4eb6-9022-c8691ada6281',
        'database',
        'default',
        '{\"uuid\":\"48e76dd8-5d1c-4eb6-9022-c8691ada6281\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:770;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 04:05:44'
    ),
    (
        30,
        'f561ced6-0a70-4d2a-b477-f34256fc0e29',
        'database',
        'default',
        '{\"uuid\":\"f561ced6-0a70-4d2a-b477-f34256fc0e29\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:771;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 04:05:51'
    ),
    (
        31,
        '9825ed3b-3ed0-4e7a-89bc-065f33fde23d',
        'database',
        'default',
        '{\"uuid\":\"9825ed3b-3ed0-4e7a-89bc-065f33fde23d\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:772;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 04:05:55'
    ),
    (
        32,
        '69560d8d-3842-4526-9005-8618776cec78',
        'database',
        'default',
        '{\"uuid\":\"69560d8d-3842-4526-9005-8618776cec78\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:773;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 04:05:57'
    ),
    (
        33,
        'c497a821-c762-474c-84ed-1f2a5dce6ddd',
        'database',
        'default',
        '{\"uuid\":\"c497a821-c762-474c-84ed-1f2a5dce6ddd\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:774;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 04:06:03'
    ),
    (
        34,
        '3ad9578f-214d-43c4-af5a-4ebbe03b7ad6',
        'database',
        'default',
        '{\"uuid\":\"3ad9578f-214d-43c4-af5a-4ebbe03b7ad6\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:775;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 04:06:10'
    ),
    (
        35,
        'ace30a23-6806-4bcd-8071-20a3be63b27a',
        'database',
        'default',
        '{\"uuid\":\"ace30a23-6806-4bcd-8071-20a3be63b27a\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:776;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 04:06:12'
    ),
    (
        36,
        'b01c9d00-582a-4709-a699-0892d5bf6474',
        'database',
        'default',
        '{\"uuid\":\"b01c9d00-582a-4709-a699-0892d5bf6474\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:777;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 04:06:13'
    ),
    (
        37,
        '154b6a94-ce3c-46b5-8427-a1c333110578',
        'database',
        'default',
        '{\"uuid\":\"154b6a94-ce3c-46b5-8427-a1c333110578\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:778;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 19:33:07'
    ),
    (
        38,
        'a467c46f-362a-42ac-bb7f-1e4b034d6ca2',
        'database',
        'default',
        '{\"uuid\":\"a467c46f-362a-42ac-bb7f-1e4b034d6ca2\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:779;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 19:33:08'
    ),
    (
        39,
        '80c46088-a500-4191-9120-f015b30b1239',
        'database',
        'default',
        '{\"uuid\":\"80c46088-a500-4191-9120-f015b30b1239\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:780;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 19:33:08'
    ),
    (
        40,
        '14b23882-978d-4c14-86ae-4cd2b85fd05f',
        'database',
        'default',
        '{\"uuid\":\"14b23882-978d-4c14-86ae-4cd2b85fd05f\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:781;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 19:33:09'
    ),
    (
        41,
        '6719ceef-9817-4596-9795-23e51588b3ec',
        'database',
        'default',
        '{\"uuid\":\"6719ceef-9817-4596-9795-23e51588b3ec\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:782;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 19:33:09'
    ),
    (
        42,
        'f96dcf3f-7bd6-4ab7-bb66-c4fdc56fd992',
        'database',
        'default',
        '{\"uuid\":\"f96dcf3f-7bd6-4ab7-bb66-c4fdc56fd992\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:783;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 19:33:09'
    ),
    (
        43,
        '8ab9a3a0-6a63-448b-a7dc-fc416dce0ebc',
        'database',
        'default',
        '{\"uuid\":\"8ab9a3a0-6a63-448b-a7dc-fc416dce0ebc\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:784;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 19:33:09'
    ),
    (
        44,
        'b8a33e17-0fc6-4de8-bb56-545db42f7cb9',
        'database',
        'default',
        '{\"uuid\":\"b8a33e17-0fc6-4de8-bb56-545db42f7cb9\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:785;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 19:33:10'
    ),
    (
        45,
        'f9254092-c9cc-4b8d-9572-6121b7678fe7',
        'database',
        'default',
        '{\"uuid\":\"f9254092-c9cc-4b8d-9572-6121b7678fe7\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:786;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 19:33:13'
    ),
    (
        46,
        '0d7dc6ca-6c9c-4146-96bc-dac3e0c75a55',
        'database',
        'default',
        '{\"uuid\":\"0d7dc6ca-6c9c-4146-96bc-dac3e0c75a55\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:787;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 19:33:15'
    ),
    (
        47,
        'df20c3bf-d399-4747-af66-b3cb1035ff62',
        'database',
        'default',
        '{\"uuid\":\"df20c3bf-d399-4747-af66-b3cb1035ff62\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:788;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 19:33:21'
    ),
    (
        48,
        'fa7e6f8c-220f-4b57-aeb2-351bbb04c1df',
        'database',
        'default',
        '{\"uuid\":\"fa7e6f8c-220f-4b57-aeb2-351bbb04c1df\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:789;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Undefined property: App\\Jobs\\CreateClasses::$student in C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php:43\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Jobs\\CreateClasses.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined prope...\', \'C:\\\\xampp\\\\htdocs...\', 43)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\CreateClasses->handle()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\CreateClasses))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\CreateClasses), false)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\CreateClasses))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\CreateClasses))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\CreateClasses))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}',
        '2022-09-01 19:33:22'
    ),
    (
        49,
        '7741a724-c94b-41a0-a30b-af977c0053d3',
        'database',
        'default',
        '{\"uuid\":\"7741a724-c94b-41a0-a30b-af977c0053d3\",\"displayName\":\"App\\\\Notifications\\\\NewMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\NewMessage\\\":13:{s:15:\\\"unread_messages\\\";a:0:{}s:12:\\\"text_message\\\";s:3:\\\"121\\\";s:2:\\\"id\\\";s:36:\\\"556b5391-f31f-4537-9509-e7a85ebfc489\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:9:\\\"broadcast\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'TypeError: Unsupported operand types: array + int in C:\\xampp\\htdocs\\TheUAcademy\\app\\Notifications\\NewMessage.php:77\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(66): App\\Notifications\\NewMessage->toBroadcast(Object(App\\Models\\User))\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(40): Illuminate\\Notifications\\Channels\\BroadcastChannel->getData(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(148): Illuminate\\Notifications\\Channels\\BroadcastChannel->send(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(106): Illuminate\\Notifications\\NotificationSender->sendToNotifiable(Object(App\\Models\\User), \'2d7e392a-0937-4...\', Object(App\\Notifications\\NewMessage), \'broadcast\')\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(109): Illuminate\\Notifications\\NotificationSender->withLocale(NULL, Object(Closure))\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\SendQueuedNotifications.php(104): Illuminate\\Notifications\\ChannelManager->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle(Object(Illuminate\\Notifications\\ChannelManager))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Notifications\\SendQueuedNotifications), false)\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#34 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#35 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 {main}',
        '2022-09-15 04:20:32'
    ),
    (
        50,
        '498afc6b-c5bf-4f47-bac6-59897a17445d',
        'database',
        'default',
        '{\"uuid\":\"498afc6b-c5bf-4f47-bac6-59897a17445d\",\"displayName\":\"App\\\\Notifications\\\\NewMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\NewMessage\\\":13:{s:15:\\\"unread_messages\\\";a:0:{}s:12:\\\"text_message\\\";s:11:\\\"New Message\\\";s:2:\\\"id\\\";s:36:\\\"1d4ee25d-1f81-4837-a4d9-75f77278c286\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:9:\\\"broadcast\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'TypeError: Unsupported operand types: array + int in C:\\xampp\\htdocs\\TheUAcademy\\app\\Notifications\\NewMessage.php:77\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(66): App\\Notifications\\NewMessage->toBroadcast(Object(App\\Models\\User))\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(40): Illuminate\\Notifications\\Channels\\BroadcastChannel->getData(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(148): Illuminate\\Notifications\\Channels\\BroadcastChannel->send(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(106): Illuminate\\Notifications\\NotificationSender->sendToNotifiable(Object(App\\Models\\User), \'1c3c2f5e-eca3-4...\', Object(App\\Notifications\\NewMessage), \'broadcast\')\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(109): Illuminate\\Notifications\\NotificationSender->withLocale(NULL, Object(Closure))\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\SendQueuedNotifications.php(104): Illuminate\\Notifications\\ChannelManager->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle(Object(Illuminate\\Notifications\\ChannelManager))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Notifications\\SendQueuedNotifications), false)\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#34 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#35 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 {main}',
        '2022-09-15 04:21:45'
    ),
    (
        51,
        '2b22d81f-cbd7-476a-9f4c-6deec87c3904',
        'database',
        'default',
        '{\"uuid\":\"2b22d81f-cbd7-476a-9f4c-6deec87c3904\",\"displayName\":\"App\\\\Notifications\\\\NewMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\NewMessage\\\":13:{s:15:\\\"unread_messages\\\";a:0:{}s:12:\\\"text_message\\\";s:9:\\\"Message 4\\\";s:2:\\\"id\\\";s:36:\\\"a4a57765-d591-4844-8b95-e193f270f6db\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:9:\\\"broadcast\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'TypeError: Unsupported operand types: array + int in C:\\xampp\\htdocs\\TheUAcademy\\app\\Notifications\\NewMessage.php:77\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(66): App\\Notifications\\NewMessage->toBroadcast(Object(App\\Models\\User))\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(40): Illuminate\\Notifications\\Channels\\BroadcastChannel->getData(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(148): Illuminate\\Notifications\\Channels\\BroadcastChannel->send(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(106): Illuminate\\Notifications\\NotificationSender->sendToNotifiable(Object(App\\Models\\User), \'bab2da1e-9bb3-4...\', Object(App\\Notifications\\NewMessage), \'broadcast\')\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(109): Illuminate\\Notifications\\NotificationSender->withLocale(NULL, Object(Closure))\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\SendQueuedNotifications.php(104): Illuminate\\Notifications\\ChannelManager->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle(Object(Illuminate\\Notifications\\ChannelManager))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Notifications\\SendQueuedNotifications), false)\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#34 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#35 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 {main}',
        '2022-09-15 04:23:25'
    ),
    (
        52,
        '3142ca67-f01b-4eba-99af-d9239e884ce9',
        'database',
        'default',
        '{\"uuid\":\"3142ca67-f01b-4eba-99af-d9239e884ce9\",\"displayName\":\"App\\\\Notifications\\\\NewMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\NewMessage\\\":13:{s:12:\\\"text_message\\\";s:15:\\\"Unread_messages\\\";s:15:\\\"conversation_id\\\";i:13;s:2:\\\"id\\\";s:36:\\\"ab3f6a66-8614-470a-8528-54c9ab6b99d7\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:9:\\\"broadcast\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Notifications\\NewMessage has been attempted too many times or run too long. The job may have previously timed out. in C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php:750\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(504): Illuminate\\Queue\\Worker->maxAttemptsExceededException(Object(Illuminate\\Queue\\Jobs\\DatabaseJob))\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(418): Illuminate\\Queue\\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), 1)\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 {main}',
        '2022-09-15 18:37:43'
    ),
    (
        53,
        '9fbc5782-4c6c-4f84-b3d0-6855d164624e',
        'database',
        'default',
        '{\"uuid\":\"9fbc5782-4c6c-4f84-b3d0-6855d164624e\",\"displayName\":\"App\\\\Notifications\\\\NewMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\NewMessage\\\":13:{s:12:\\\"text_message\\\";s:5:\\\"Epale\\\";s:15:\\\"conversation_id\\\";i:13;s:2:\\\"id\\\";s:36:\\\"54cac5a7-0a68-4ea7-ac9a-a7a1822d146b\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:9:\\\"broadcast\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Notifications\\NewMessage has been attempted too many times or run too long. The job may have previously timed out. in C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php:750\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(504): Illuminate\\Queue\\Worker->maxAttemptsExceededException(Object(Illuminate\\Queue\\Jobs\\DatabaseJob))\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(418): Illuminate\\Queue\\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), 1)\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 {main}',
        '2022-09-16 01:55:20'
    ),
    (
        54,
        'e4547893-a366-4882-8198-d5aff87148e3',
        'database',
        'default',
        '{\"uuid\":\"e4547893-a366-4882-8198-d5aff87148e3\",\"displayName\":\"App\\\\Notifications\\\\NewMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\NewMessage\\\":13:{s:12:\\\"text_message\\\";s:4:\\\"3366\\\";s:15:\\\"conversation_id\\\";i:13;s:2:\\\"id\\\";s:36:\\\"3bc38e39-a281-4cee-a070-94b8b68d0bd5\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:9:\\\"broadcast\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Notifications\\NewMessage has been attempted too many times or run too long. The job may have previously timed out. in C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php:750\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(504): Illuminate\\Queue\\Worker->maxAttemptsExceededException(Object(Illuminate\\Queue\\Jobs\\DatabaseJob))\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(418): Illuminate\\Queue\\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), 1)\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 {main}',
        '2022-09-16 02:52:03'
    ),
    (
        55,
        '76a23535-d12f-4a65-b0e5-7ad083cb6a85',
        'database',
        'default',
        '{\"uuid\":\"76a23535-d12f-4a65-b0e5-7ad083cb6a85\",\"displayName\":\"App\\\\Notifications\\\\NewMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\NewMessage\\\":13:{s:12:\\\"text_message\\\";s:4:\\\"5541\\\";s:15:\\\"conversation_id\\\";i:13;s:2:\\\"id\\\";s:36:\\\"8a828281-5896-4635-8bc2-4880d68fa524\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:9:\\\"broadcast\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Attempt to read property \"conversations\" on null in C:\\xampp\\htdocs\\TheUAcademy\\app\\Models\\User.php:177\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Models\\User.php(177): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Attempt to read...\', \'C:\\\\xampp\\\\htdocs...\', 177)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasAttributes.php(539): App\\Models\\User->UnreadConversations()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasAttributes.php(491): Illuminate\\Database\\Eloquent\\Model->getRelationshipFromMethod(\'UnreadConversat...\')\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasAttributes.php(440): Illuminate\\Database\\Eloquent\\Model->getRelationValue(\'UnreadConversat...\')\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2029): Illuminate\\Database\\Eloquent\\Model->getAttribute(\'UnreadConversat...\')\n#5 C:\\xampp\\htdocs\\TheUAcademy\\app\\Notifications\\NewMessage.php(81): Illuminate\\Database\\Eloquent\\Model->__get(\'UnreadConversat...\')\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(66): App\\Notifications\\NewMessage->toBroadcast(Object(App\\Models\\User))\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(40): Illuminate\\Notifications\\Channels\\BroadcastChannel->getData(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(148): Illuminate\\Notifications\\Channels\\BroadcastChannel->send(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(106): Illuminate\\Notifications\\NotificationSender->sendToNotifiable(Object(App\\Models\\User), \'0f5f69ce-5bc6-4...\', Object(App\\Notifications\\NewMessage), \'broadcast\')\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(109): Illuminate\\Notifications\\NotificationSender->withLocale(NULL, Object(Closure))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\SendQueuedNotifications.php(104): Illuminate\\Notifications\\ChannelManager->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle(Object(Illuminate\\Notifications\\ChannelManager))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Notifications\\SendQueuedNotifications), false)\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#34 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#35 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#36 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#37 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#38 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#39 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#40 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 {main}',
        '2022-09-16 03:28:39'
    ),
    (
        56,
        '3e275a2c-6861-4502-bc59-75af242b7bde',
        'database',
        'default',
        '{\"uuid\":\"3e275a2c-6861-4502-bc59-75af242b7bde\",\"displayName\":\"App\\\\Notifications\\\\NewMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\NewMessage\\\":13:{s:12:\\\"text_message\\\";s:5:\\\"55412\\\";s:15:\\\"conversation_id\\\";i:13;s:2:\\\"id\\\";s:36:\\\"15e107a6-9052-4bcf-8f64-4d92d6aecf5a\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:9:\\\"broadcast\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Attempt to read property \"conversations\" on null in C:\\xampp\\htdocs\\TheUAcademy\\app\\Models\\User.php:177\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Models\\User.php(177): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Attempt to read...\', \'C:\\\\xampp\\\\htdocs...\', 177)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasAttributes.php(539): App\\Models\\User->UnreadConversations()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasAttributes.php(491): Illuminate\\Database\\Eloquent\\Model->getRelationshipFromMethod(\'UnreadConversat...\')\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasAttributes.php(440): Illuminate\\Database\\Eloquent\\Model->getRelationValue(\'UnreadConversat...\')\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2029): Illuminate\\Database\\Eloquent\\Model->getAttribute(\'UnreadConversat...\')\n#5 C:\\xampp\\htdocs\\TheUAcademy\\app\\Notifications\\NewMessage.php(81): Illuminate\\Database\\Eloquent\\Model->__get(\'UnreadConversat...\')\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(66): App\\Notifications\\NewMessage->toBroadcast(Object(App\\Models\\User))\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(40): Illuminate\\Notifications\\Channels\\BroadcastChannel->getData(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(148): Illuminate\\Notifications\\Channels\\BroadcastChannel->send(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(106): Illuminate\\Notifications\\NotificationSender->sendToNotifiable(Object(App\\Models\\User), \'68d1cc75-4eb0-4...\', Object(App\\Notifications\\NewMessage), \'broadcast\')\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(109): Illuminate\\Notifications\\NotificationSender->withLocale(NULL, Object(Closure))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\SendQueuedNotifications.php(104): Illuminate\\Notifications\\ChannelManager->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle(Object(Illuminate\\Notifications\\ChannelManager))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Notifications\\SendQueuedNotifications), false)\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#34 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#35 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#36 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#37 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#38 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#39 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#40 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 {main}',
        '2022-09-16 03:29:27'
    ),
    (
        57,
        '5e35208a-eff8-466b-b34a-6003afa9f87c',
        'database',
        'default',
        '{\"uuid\":\"5e35208a-eff8-466b-b34a-6003afa9f87c\",\"displayName\":\"App\\\\Notifications\\\\NewMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\NewMessage\\\":13:{s:12:\\\"text_message\\\";s:4:\\\"4998\\\";s:15:\\\"conversation_id\\\";i:13;s:2:\\\"id\\\";s:36:\\\"6b04873a-ecfe-4d98-b656-ae0227d7c6dc\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:9:\\\"broadcast\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'ErrorException: Attempt to read property \"conversations\" on null in C:\\xampp\\htdocs\\TheUAcademy\\app\\Models\\User.php:177\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\app\\Models\\User.php(177): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Attempt to read...\', \'C:\\\\xampp\\\\htdocs...\', 177)\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasAttributes.php(539): App\\Models\\User->UnreadConversations()\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasAttributes.php(491): Illuminate\\Database\\Eloquent\\Model->getRelationshipFromMethod(\'UnreadConversat...\')\n#3 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasAttributes.php(440): Illuminate\\Database\\Eloquent\\Model->getRelationValue(\'UnreadConversat...\')\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2029): Illuminate\\Database\\Eloquent\\Model->getAttribute(\'UnreadConversat...\')\n#5 C:\\xampp\\htdocs\\TheUAcademy\\app\\Notifications\\NewMessage.php(81): Illuminate\\Database\\Eloquent\\Model->__get(\'UnreadConversat...\')\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(66): App\\Notifications\\NewMessage->toBroadcast(Object(App\\Models\\User))\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(40): Illuminate\\Notifications\\Channels\\BroadcastChannel->getData(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(148): Illuminate\\Notifications\\Channels\\BroadcastChannel->send(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(106): Illuminate\\Notifications\\NotificationSender->sendToNotifiable(Object(App\\Models\\User), \'044a81e3-738d-4...\', Object(App\\Notifications\\NewMessage), \'broadcast\')\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(109): Illuminate\\Notifications\\NotificationSender->withLocale(NULL, Object(Closure))\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\SendQueuedNotifications.php(104): Illuminate\\Notifications\\ChannelManager->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle(Object(Illuminate\\Notifications\\ChannelManager))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Notifications\\SendQueuedNotifications), false)\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#34 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#35 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#36 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#37 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#38 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#39 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#40 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 {main}',
        '2022-09-16 03:30:44'
    ),
    (
        58,
        'fa1528fc-14eb-4c30-b4ca-53a58d1ffd21',
        'database',
        'default',
        '{\"uuid\":\"fa1528fc-14eb-4c30-b4ca-53a58d1ffd21\",\"displayName\":\"App\\\\Notifications\\\\NewMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\NewMessage\\\":13:{s:12:\\\"text_message\\\";s:4:\\\"8847\\\";s:15:\\\"conversation_id\\\";i:13;s:2:\\\"id\\\";s:36:\\\"9bf7ba9b-5fef-44ae-b277-6ae301b300f9\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:9:\\\"broadcast\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        'LogicException: App\\Models\\User::UnreadConversations must return a relationship instance. in C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasAttributes.php:548\nStack trace:\n#0 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasAttributes.php(491): Illuminate\\Database\\Eloquent\\Model->getRelationshipFromMethod(\'UnreadConversat...\')\n#1 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasAttributes.php(440): Illuminate\\Database\\Eloquent\\Model->getRelationValue(\'UnreadConversat...\')\n#2 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2029): Illuminate\\Database\\Eloquent\\Model->getAttribute(\'UnreadConversat...\')\n#3 C:\\xampp\\htdocs\\TheUAcademy\\app\\Notifications\\NewMessage.php(81): Illuminate\\Database\\Eloquent\\Model->__get(\'UnreadConversat...\')\n#4 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(66): App\\Notifications\\NewMessage->toBroadcast(Object(App\\Models\\User))\n#5 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php(40): Illuminate\\Notifications\\Channels\\BroadcastChannel->getData(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#6 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(148): Illuminate\\Notifications\\Channels\\BroadcastChannel->send(Object(App\\Models\\User), Object(App\\Notifications\\NewMessage))\n#7 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(106): Illuminate\\Notifications\\NotificationSender->sendToNotifiable(Object(App\\Models\\User), \'f9f5f18d-39cb-4...\', Object(App\\Notifications\\NewMessage), \'broadcast\')\n#8 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#9 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(109): Illuminate\\Notifications\\NotificationSender->withLocale(NULL, Object(Closure))\n#10 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#11 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\SendQueuedNotifications.php(104): Illuminate\\Notifications\\ChannelManager->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\NewMessage), Array)\n#12 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle(Object(Illuminate\\Notifications\\ChannelManager))\n#13 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#14 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#15 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#16 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#17 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#18 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#19 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#20 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#21 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Notifications\\SendQueuedNotifications), false)\n#22 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#23 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#24 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#25 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#26 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#27 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#28 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#29 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#30 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#31 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#32 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#33 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#34 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#35 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#36 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#37 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#38 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#39 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#40 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 C:\\xampp\\htdocs\\TheUAcademy\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\TheUAcademy\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 {main}',
        '2022-09-16 03:31:05'
    );

/*Data for the table `friend_requests` */
insert into
    `friend_requests`(
        `id`,
        `sender_id`,
        `receiver_id`,
        `status`,
        `created_at`,
        `updated_at`
    )
values
    (
        1,
        5,
        7,
        1,
        '2021-10-14 18:50:48',
        '2021-10-14 18:50:48'
    );

/*Data for the table `friends` */
insert into
    `friends`(
        `id`,
        `user_id`,
        `friend_id`,
        `status`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
values
    (
        1,
        5,
        9,
        1,
        '2022-07-26 05:55:20',
        '2022-07-26 05:56:20',
        NULL
    ),
    (
        2,
        7,
        6,
        1,
        '2022-09-12 04:38:55',
        '2022-09-12 04:39:12',
        NULL
    ),
    (
        4,
        6,
        9,
        0,
        '2022-09-23 04:18:17',
        '2022-09-23 04:19:20',
        '2022-09-23 04:19:20'
    );

/*Data for the table `group_units` */
insert into
    `group_units`(
        `id`,
        `group_name`,
        `module_id`,
        `priority`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
values
    (1, 'Units 1 and 2', 1, 'FIRST', NULL, NULL, NULL),
    (2, 'Units 3 and 4', 1, '1', NULL, NULL, NULL),
    (3, 'Units 5 and 6', 2, '2', NULL, NULL, NULL);

/*Data for the table `invoices` */
insert into
    `invoices`(
        `id`,
        `user_id`,
        `title`,
        `price`,
        `paid`,
        `created_at`,
        `updated_at`
    )
values
    (
        1,
        5,
        'Order #1 Invoice',
        19.97,
        1,
        '2021-05-23 03:44:31',
        '2021-05-23 03:44:31'
    ),
    (
        2,
        5,
        'Order #2 Invoice',
        19.97,
        1,
        '2021-05-23 03:44:31',
        '2021-05-23 03:44:31'
    ),
    (
        3,
        5,
        'Order #3 Invoice',
        19.97,
        1,
        '2021-05-23 03:44:31',
        '2021-05-23 03:44:31'
    ),
    (
        4,
        5,
        'Order #4 Invoice',
        19.97,
        1,
        '2021-05-23 03:44:31',
        '2021-05-23 03:44:31'
    ),
    (
        5,
        5,
        'Order #5 Invoice',
        19.97,
        1,
        '2021-05-23 03:44:31',
        '2021-05-23 03:44:31'
    ),
    (
        6,
        5,
        'Order #6 Invoice',
        19.97,
        1,
        '2021-05-23 03:44:31',
        '2021-05-23 03:44:31'
    ),
    (
        7,
        5,
        'Order #7 Invoice',
        19.97,
        1,
        '2021-05-23 03:48:05',
        '2021-05-23 03:48:05'
    ),
    (
        8,
        5,
        'Order #8 Invoice',
        19.97,
        1,
        '2021-05-23 19:02:20',
        '2021-05-23 19:02:20'
    ),
    (
        9,
        5,
        'Order #9 Invoice',
        19.97,
        1,
        '2021-05-23 19:09:22',
        '2021-05-23 19:09:22'
    ),
    (
        10,
        5,
        'Order #10 Invoice',
        19.97,
        1,
        '2021-05-23 19:12:01',
        '2021-05-23 19:12:01'
    ),
    (
        11,
        5,
        'Order #11 Invoice',
        19.97,
        1,
        '2021-05-23 19:13:35',
        '2021-05-23 19:13:35'
    ),
    (
        12,
        5,
        'Order #12 Invoice',
        19.97,
        1,
        '2021-05-23 21:52:45',
        '2021-05-23 21:52:45'
    ),
    (
        13,
        5,
        'Order #13 Invoice',
        19.97,
        1,
        '2021-05-26 02:22:46',
        '2021-05-26 02:22:46'
    ),
    (
        14,
        5,
        'Order #14 Invoice',
        359.64,
        1,
        '2021-05-26 17:53:20',
        '2021-05-26 17:53:20'
    ),
    (
        15,
        5,
        'Order #15 Invoice',
        359.64,
        1,
        '2021-05-26 17:53:47',
        '2021-05-26 17:53:47'
    ),
    (
        16,
        5,
        'Order #16 Invoice',
        359.64,
        1,
        '2021-05-26 17:57:07',
        '2021-05-26 17:57:07'
    ),
    (
        17,
        5,
        'Order #17 Invoice',
        359.64,
        1,
        '2021-05-26 17:58:02',
        '2021-05-26 17:58:02'
    ),
    (
        18,
        5,
        'Order #18 Invoice',
        359.64,
        1,
        '2021-05-26 17:58:14',
        '2021-05-26 17:58:14'
    ),
    (
        19,
        5,
        'Order #19 Invoice',
        359.64,
        1,
        '2021-05-26 18:00:28',
        '2021-05-26 18:00:28'
    ),
    (
        20,
        5,
        'Order #20 Invoice',
        359.64,
        1,
        '2021-05-26 18:05:04',
        '2021-05-26 18:05:04'
    ),
    (
        21,
        5,
        'Order #21 Invoice',
        359.64,
        1,
        '2021-05-26 18:14:15',
        '2021-05-26 18:14:15'
    ),
    (
        22,
        5,
        'Order #22 Invoice',
        359.64,
        1,
        '2021-05-26 18:16:12',
        '2021-05-26 18:16:12'
    ),
    (
        23,
        5,
        'Order #23 Invoice',
        359.64,
        1,
        '2021-05-26 18:19:43',
        '2021-05-26 18:19:43'
    ),
    (
        24,
        5,
        'Order #24 Invoice',
        159.84,
        1,
        '2021-05-26 21:26:11',
        '2021-05-26 21:26:11'
    ),
    (
        25,
        5,
        'Order #25 Invoice',
        159.84,
        1,
        '2021-05-26 21:29:26',
        '2021-05-26 21:29:26'
    ),
    (
        26,
        5,
        'Order #26 Invoice',
        159.84,
        1,
        '2021-05-26 21:34:56',
        '2021-05-26 21:34:56'
    ),
    (
        27,
        5,
        'Order #27 Invoice',
        159.84,
        1,
        '2021-05-26 21:36:32',
        '2021-05-26 21:36:32'
    ),
    (
        28,
        5,
        'Order #28 Invoice',
        159.84,
        1,
        '2021-05-26 21:37:21',
        '2021-05-26 21:37:21'
    ),
    (
        29,
        5,
        'Order #29 Invoice',
        159.84,
        1,
        '2021-05-26 21:38:19',
        '2021-05-26 21:38:19'
    ),
    (
        30,
        5,
        'Order #30 Invoice',
        159.84,
        1,
        '2021-05-26 21:40:10',
        '2021-05-26 21:40:10'
    ),
    (
        31,
        5,
        'Order #31 Invoice',
        159.84,
        1,
        '2021-05-26 21:42:00',
        '2021-05-26 21:42:00'
    ),
    (
        32,
        5,
        'Order #32 Invoice',
        159.84,
        1,
        '2021-05-26 21:44:39',
        '2021-05-26 21:44:39'
    ),
    (
        33,
        5,
        'Order #33 Invoice',
        159.84,
        1,
        '2021-05-26 21:45:06',
        '2021-05-26 21:45:06'
    ),
    (
        34,
        6,
        'Order #34 Invoice',
        89.92,
        1,
        '2021-06-29 22:50:30',
        '2021-06-29 22:50:30'
    ),
    (
        35,
        6,
        'Order #35 Invoice',
        89.92,
        1,
        '2021-06-29 22:51:39',
        '2021-06-29 22:51:39'
    ),
    (
        36,
        6,
        'Order #36 Invoice',
        89.92,
        1,
        '2021-06-29 22:52:26',
        '2021-06-29 22:52:26'
    ),
    (
        37,
        6,
        'Order #37 Invoice',
        89.92,
        1,
        '2021-06-29 22:53:32',
        '2021-06-29 22:53:32'
    ),
    (
        38,
        5,
        'Order #38 Invoice',
        10,
        1,
        '2021-06-29 22:55:18',
        '2021-06-29 22:55:18'
    ),
    (
        39,
        5,
        'Order #39 Invoice',
        59.94,
        1,
        '2021-07-25 19:05:58',
        '2021-07-25 19:05:58'
    ),
    (
        40,
        5,
        'Order #40 Invoice',
        79.92,
        1,
        '2021-07-30 01:02:22',
        '2021-07-30 01:02:22'
    ),
    (
        41,
        5,
        'Order #41 Invoice',
        79.92,
        1,
        '2021-07-30 01:03:00',
        '2021-07-30 01:03:00'
    ),
    (
        42,
        5,
        'Order #42 Invoice',
        79.92,
        1,
        '2021-07-30 01:03:07',
        '2021-07-30 01:03:07'
    ),
    (
        43,
        5,
        'Order #43 Invoice',
        79.92,
        1,
        '2021-07-30 01:03:14',
        '2021-07-30 01:03:14'
    ),
    (
        44,
        5,
        'Order #44 Invoice',
        79.92,
        1,
        '2021-07-30 01:11:22',
        '2021-07-30 01:11:22'
    ),
    (
        45,
        5,
        'Order #45 Invoice',
        79.92,
        1,
        '2021-07-30 01:12:40',
        '2021-07-30 01:12:40'
    ),
    (
        46,
        5,
        'Order #46 Invoice',
        79.92,
        1,
        '2021-07-30 01:13:02',
        '2021-07-30 01:13:02'
    ),
    (
        47,
        5,
        'Order #47 Invoice',
        39.96,
        1,
        '2021-07-30 01:20:13',
        '2021-07-30 01:20:13'
    ),
    (
        48,
        5,
        'Order #48 Invoice',
        39.96,
        1,
        '2021-07-30 01:20:39',
        '2021-07-30 01:20:39'
    ),
    (
        49,
        5,
        'Order #49 Invoice',
        59.94,
        1,
        '2021-07-30 01:24:04',
        '2021-07-30 01:24:04'
    ),
    (
        50,
        5,
        'Order #50 Invoice',
        49.95,
        1,
        '2021-07-30 01:25:08',
        '2021-07-30 01:25:08'
    ),
    (
        51,
        5,
        'Order #51 Invoice',
        39.96,
        1,
        '2021-07-30 01:29:03',
        '2021-07-30 01:29:03'
    ),
    (
        52,
        5,
        'Order #52 Invoice',
        39.96,
        1,
        '2021-07-30 01:33:26',
        '2021-07-30 01:33:26'
    ),
    (
        53,
        5,
        'Order #53 Invoice',
        39.96,
        1,
        '2021-07-30 01:42:49',
        '2021-07-30 01:42:49'
    ),
    (
        54,
        5,
        'Order #54 Invoice',
        59.94,
        1,
        '2021-07-30 03:10:29',
        '2021-07-30 03:10:29'
    ),
    (
        55,
        5,
        'Order #55 Invoice',
        39.96,
        1,
        '2021-07-30 03:31:37',
        '2021-07-30 03:31:37'
    ),
    (
        56,
        5,
        'Order #56 Invoice',
        39.96,
        1,
        '2021-07-30 03:32:56',
        '2021-07-30 03:32:56'
    ),
    (
        57,
        5,
        'Order #57 Invoice',
        39.96,
        1,
        '2021-07-30 03:35:48',
        '2021-07-30 03:35:48'
    ),
    (
        58,
        5,
        'Order #58 Invoice',
        39.96,
        1,
        '2021-07-30 03:37:25',
        '2021-07-30 03:37:25'
    ),
    (
        59,
        5,
        'Order #59 Invoice',
        39.96,
        1,
        '2021-07-30 03:39:20',
        '2021-07-30 03:39:20'
    ),
    (
        60,
        5,
        'Order #60 Invoice',
        79.92,
        1,
        '2021-07-30 19:50:18',
        '2021-07-30 19:50:18'
    ),
    (
        61,
        5,
        'Order #61 Invoice',
        79.92,
        1,
        '2021-08-03 22:52:56',
        '2021-08-03 22:52:56'
    ),
    (
        62,
        5,
        'Order #62 Invoice',
        39.96,
        1,
        '2021-08-04 03:18:21',
        '2021-08-04 03:18:21'
    ),
    (
        63,
        5,
        'Order #63 Invoice',
        39.96,
        1,
        '2021-08-04 16:00:50',
        '2021-08-04 16:00:50'
    ),
    (
        64,
        5,
        'Order #64 Invoice',
        39.96,
        1,
        '2021-08-04 18:01:04',
        '2021-08-04 18:01:04'
    ),
    (
        65,
        5,
        'Order #65 Invoice',
        39.96,
        1,
        '2021-08-04 18:01:40',
        '2021-08-04 18:01:40'
    ),
    (
        66,
        5,
        'Order #66 Invoice',
        39.96,
        1,
        '2021-08-04 18:01:50',
        '2021-08-04 18:01:50'
    ),
    (
        67,
        5,
        'Order #67 Invoice',
        39.96,
        1,
        '2021-08-04 18:02:33',
        '2021-08-04 18:02:33'
    ),
    (
        68,
        5,
        'Order #68 Invoice',
        39.96,
        1,
        '2021-08-04 18:04:38',
        '2021-08-04 18:04:38'
    ),
    (
        69,
        5,
        'Order #69 Invoice',
        39.96,
        1,
        '2021-08-04 18:05:12',
        '2021-08-04 18:05:12'
    ),
    (
        70,
        5,
        'Order #70 Invoice',
        39.96,
        1,
        '2021-08-04 18:06:32',
        '2021-08-04 18:06:32'
    ),
    (
        71,
        5,
        'Order #71 Invoice',
        39.96,
        1,
        '2021-08-04 18:07:13',
        '2021-08-04 18:07:13'
    ),
    (
        72,
        5,
        'Order #72 Invoice',
        39.96,
        1,
        '2021-08-04 18:07:51',
        '2021-08-04 18:07:51'
    ),
    (
        73,
        5,
        'Order #73 Invoice',
        39.96,
        1,
        '2021-08-04 18:08:10',
        '2021-08-04 18:08:10'
    ),
    (
        74,
        5,
        'Order #74 Invoice',
        39.96,
        1,
        '2021-08-04 18:10:34',
        '2021-08-04 18:10:34'
    ),
    (
        75,
        5,
        'Order #75 Invoice',
        39.96,
        1,
        '2021-08-04 18:11:30',
        '2021-08-04 18:11:30'
    ),
    (
        76,
        5,
        'Order #76 Invoice',
        39.96,
        1,
        '2021-08-04 18:11:42',
        '2021-08-04 18:11:42'
    ),
    (
        77,
        5,
        'Order #77 Invoice',
        39.96,
        1,
        '2021-08-04 18:15:55',
        '2021-08-04 18:15:55'
    ),
    (
        78,
        5,
        'Order #78 Invoice',
        39.96,
        1,
        '2021-08-04 18:17:03',
        '2021-08-04 18:17:03'
    ),
    (
        79,
        5,
        'Order #79 Invoice',
        39.96,
        1,
        '2021-08-04 18:17:20',
        '2021-08-04 18:17:20'
    ),
    (
        80,
        5,
        'Order #80 Invoice',
        39.96,
        1,
        '2021-08-04 18:19:30',
        '2021-08-04 18:19:30'
    ),
    (
        81,
        5,
        'Order #81 Invoice',
        39.96,
        1,
        '2021-08-07 02:29:11',
        '2021-08-07 02:29:11'
    ),
    (
        82,
        5,
        'Order #82 Invoice',
        39.96,
        1,
        '2021-08-07 02:30:16',
        '2021-08-07 02:30:16'
    ),
    (
        83,
        5,
        'Order #83 Invoice',
        39.96,
        1,
        '2021-08-07 02:30:33',
        '2021-08-07 02:30:33'
    ),
    (
        84,
        5,
        'Order #84 Invoice',
        39.96,
        1,
        '2021-08-07 02:31:45',
        '2021-08-07 02:31:45'
    ),
    (
        85,
        5,
        'Invoice #85',
        9.99,
        1,
        '2021-08-11 20:46:07',
        '2021-08-11 20:46:07'
    ),
    (
        86,
        5,
        'Invoice #86',
        29.97,
        1,
        '2021-08-20 20:33:48',
        '2021-08-20 20:33:48'
    ),
    (
        87,
        5,
        'Invoice #87',
        29.97,
        1,
        '2021-08-20 20:33:48',
        '2021-08-20 20:33:48'
    ),
    (
        88,
        5,
        'Invoice #88',
        19.98,
        1,
        '2021-08-23 16:39:24',
        '2021-08-23 16:39:24'
    ),
    (
        89,
        5,
        'Invoice #89',
        19.98,
        1,
        '2021-08-26 18:01:25',
        '2021-08-26 18:01:25'
    ),
    (
        90,
        5,
        'Invoice #90',
        19.98,
        1,
        '2021-08-28 14:48:02',
        '2021-08-28 14:48:02'
    ),
    (
        91,
        5,
        'Invoice #91',
        9.99,
        1,
        '2021-08-29 22:38:26',
        '2021-08-29 22:38:26'
    ),
    (
        92,
        5,
        'Invoice #92',
        9.99,
        1,
        '2021-08-30 14:36:38',
        '2021-08-30 14:36:38'
    ),
    (
        93,
        5,
        'Invoice #93',
        9.99,
        1,
        '2021-08-30 15:27:08',
        '2021-08-30 15:27:08'
    ),
    (
        94,
        5,
        'Invoice #94',
        9.99,
        1,
        '2021-08-30 15:32:32',
        '2021-08-30 15:32:32'
    ),
    (
        95,
        5,
        'Invoice #95',
        9.99,
        1,
        '2021-08-31 15:02:32',
        '2021-08-31 15:02:32'
    ),
    (
        96,
        9,
        'Invoice #96',
        9.99,
        1,
        '2021-08-31 15:03:32',
        '2021-08-31 15:03:32'
    ),
    (
        97,
        5,
        'Invoice #97',
        19.98,
        1,
        '2021-08-31 15:55:37',
        '2021-08-31 15:55:37'
    ),
    (
        98,
        9,
        'Invoice #98',
        19.98,
        1,
        '2021-08-31 15:56:25',
        '2021-08-31 15:56:25'
    ),
    (
        99,
        5,
        'Invoice #99',
        79.92,
        1,
        '2021-09-11 02:03:56',
        '2021-09-11 02:03:56'
    ),
    (
        100,
        5,
        'Invoice #100',
        99.9,
        1,
        '2021-09-21 00:32:12',
        '2021-09-21 00:32:12'
    ),
    (
        101,
        5,
        'Invoice #101',
        39.96,
        1,
        '2021-09-21 00:36:09',
        '2021-09-21 00:36:09'
    ),
    (
        102,
        5,
        'Invoice #102',
        39.96,
        1,
        '2021-09-21 00:39:45',
        '2021-09-21 00:39:45'
    ),
    (
        103,
        5,
        'Invoice #103',
        39.96,
        1,
        '2021-09-21 01:08:05',
        '2021-09-21 01:08:05'
    ),
    (
        104,
        5,
        'Invoice #104',
        39.96,
        1,
        '2021-09-21 01:28:22',
        '2021-09-21 01:28:22'
    ),
    (
        105,
        5,
        'Invoice #105',
        39.96,
        1,
        '2021-09-21 01:30:39',
        '2021-09-21 01:30:39'
    ),
    (
        106,
        5,
        'Invoice #106',
        39.96,
        1,
        '2021-09-21 01:31:18',
        '2021-09-21 01:31:18'
    ),
    (
        107,
        5,
        'Invoice #107',
        39.96,
        1,
        '2021-09-21 01:32:19',
        '2021-09-21 01:32:19'
    ),
    (
        108,
        5,
        'Invoice #108',
        39.96,
        1,
        '2021-09-21 02:18:35',
        '2021-09-21 02:18:35'
    ),
    (
        109,
        5,
        'Invoice #109',
        39.96,
        1,
        '2021-09-21 02:20:37',
        '2021-09-21 02:20:37'
    ),
    (
        110,
        5,
        'Invoice #110',
        39.96,
        1,
        '2021-09-21 15:58:18',
        '2021-09-21 15:58:18'
    ),
    (
        111,
        5,
        'Invoice #111',
        39.96,
        1,
        '2021-09-21 17:02:56',
        '2021-09-21 17:02:56'
    ),
    (
        112,
        5,
        'Invoice #112',
        39.96,
        1,
        '2021-09-21 17:08:02',
        '2021-09-21 17:08:02'
    ),
    (
        113,
        5,
        'Invoice #113',
        39.96,
        1,
        '2021-09-21 17:13:57',
        '2021-09-21 17:13:57'
    ),
    (
        114,
        5,
        'Invoice #114',
        39.96,
        1,
        '2021-09-22 17:20:16',
        '2021-09-22 17:20:16'
    ),
    (
        115,
        5,
        'Invoice #115',
        39.96,
        1,
        '2021-09-22 17:21:08',
        '2021-09-22 17:21:08'
    ),
    (
        116,
        5,
        'Invoice #116',
        39.96,
        1,
        '2021-09-22 17:21:31',
        '2021-09-22 17:21:31'
    ),
    (
        117,
        5,
        'Invoice #117',
        39.96,
        1,
        '2021-09-22 17:26:40',
        '2021-09-22 17:26:40'
    ),
    (
        118,
        5,
        'Invoice #118',
        39.96,
        1,
        '2021-09-22 17:27:21',
        '2021-09-22 17:27:21'
    ),
    (
        119,
        5,
        'Invoice #119',
        39.96,
        1,
        '2021-09-22 17:27:46',
        '2021-09-22 17:27:46'
    ),
    (
        120,
        5,
        'Invoice #120',
        39.96,
        1,
        '2021-09-22 17:28:03',
        '2021-09-22 17:28:03'
    ),
    (
        121,
        5,
        'Invoice #121',
        39.96,
        1,
        '2021-09-22 18:00:41',
        '2021-09-22 18:00:41'
    ),
    (
        122,
        5,
        'Invoice #122',
        39.96,
        1,
        '2021-09-22 18:01:03',
        '2021-09-22 18:01:03'
    ),
    (
        123,
        5,
        'Invoice #123',
        79.92,
        1,
        '2022-01-03 15:03:08',
        '2022-01-03 15:03:08'
    ),
    (
        124,
        5,
        'Invoice #124',
        79.92,
        1,
        '2022-01-03 15:15:47',
        '2022-01-03 15:15:47'
    ),
    (
        125,
        5,
        'Invoice #125',
        79.92,
        1,
        '2022-01-03 15:17:04',
        '2022-01-03 15:17:04'
    ),
    (
        126,
        5,
        'Invoice #126',
        79.92,
        1,
        '2022-01-03 15:17:15',
        '2022-01-03 15:17:15'
    ),
    (
        127,
        5,
        'Invoice #127',
        79.92,
        1,
        '2022-01-03 15:17:27',
        '2022-01-03 15:17:27'
    ),
    (
        128,
        5,
        'Invoice #128',
        79.92,
        1,
        '2022-01-03 15:18:43',
        '2022-01-03 15:18:43'
    ),
    (
        129,
        5,
        'Invoice #129',
        79.92,
        1,
        '2022-01-03 15:19:18',
        '2022-01-03 15:19:18'
    ),
    (
        130,
        5,
        'Invoice #130',
        79.92,
        1,
        '2022-01-03 15:19:30',
        '2022-01-03 15:19:30'
    ),
    (
        131,
        5,
        'Invoice #131',
        79.92,
        1,
        '2022-01-03 15:24:24',
        '2022-01-03 15:24:24'
    ),
    (
        132,
        5,
        'Invoice #132',
        79.92,
        1,
        '2022-01-03 15:25:10',
        '2022-01-03 15:25:10'
    ),
    (
        133,
        5,
        'Invoice #133',
        79.92,
        1,
        '2022-01-03 15:25:23',
        '2022-01-03 15:25:23'
    ),
    (
        134,
        5,
        'Invoice #134',
        79.92,
        1,
        '2022-01-03 15:25:41',
        '2022-01-03 15:25:41'
    ),
    (
        135,
        5,
        'Invoice #135',
        79.92,
        1,
        '2022-01-03 15:26:17',
        '2022-01-03 15:26:17'
    ),
    (
        136,
        5,
        'Invoice #136',
        79.92,
        1,
        '2022-01-03 15:27:05',
        '2022-01-03 15:27:05'
    ),
    (
        137,
        5,
        'Invoice #137',
        79.92,
        1,
        '2022-01-03 15:27:53',
        '2022-01-03 15:27:53'
    ),
    (
        138,
        5,
        'Invoice #138',
        79.92,
        1,
        '2022-01-03 15:28:09',
        '2022-01-03 15:28:09'
    ),
    (
        139,
        5,
        'Invoice #139',
        79.92,
        1,
        '2022-01-03 15:29:35',
        '2022-01-03 15:29:35'
    ),
    (
        140,
        5,
        'Invoice #140',
        79.92,
        1,
        '2022-01-03 15:30:01',
        '2022-01-03 15:30:01'
    ),
    (
        141,
        5,
        'Invoice #141',
        79.92,
        1,
        '2022-01-03 15:30:23',
        '2022-01-03 15:30:23'
    ),
    (
        142,
        5,
        'Invoice #142',
        79.92,
        1,
        '2022-01-03 15:32:54',
        '2022-01-03 15:32:54'
    ),
    (
        143,
        5,
        'Invoice #143',
        79.92,
        1,
        '2022-01-03 16:17:30',
        '2022-01-03 16:17:30'
    ),
    (
        144,
        5,
        'Invoice #144',
        79.92,
        1,
        '2022-01-03 16:20:48',
        '2022-01-03 16:20:48'
    ),
    (
        145,
        5,
        'Invoice #145',
        79.92,
        1,
        '2022-01-03 16:23:48',
        '2022-01-03 16:23:48'
    ),
    (
        146,
        5,
        'Invoice #146',
        79.92,
        1,
        '2022-01-03 16:24:47',
        '2022-01-03 16:24:47'
    ),
    (
        147,
        5,
        'Invoice #147',
        79.92,
        1,
        '2022-01-03 16:26:26',
        '2022-01-03 16:26:26'
    ),
    (
        148,
        5,
        'Invoice #148',
        79.92,
        1,
        '2022-01-03 16:30:04',
        '2022-01-03 16:30:04'
    ),
    (
        149,
        5,
        'Invoice #149',
        79.92,
        1,
        '2022-01-03 16:33:40',
        '2022-01-03 16:33:40'
    ),
    (
        150,
        5,
        'Invoice #150',
        79.92,
        1,
        '2022-01-03 17:06:24',
        '2022-01-03 17:06:24'
    ),
    (
        151,
        5,
        'Invoice #151',
        79.92,
        1,
        '2022-01-03 17:06:48',
        '2022-01-03 17:06:48'
    ),
    (
        152,
        5,
        'Invoice #152',
        79.92,
        1,
        '2022-01-03 17:07:25',
        '2022-01-03 17:07:25'
    ),
    (
        153,
        5,
        'Invoice #153',
        79.92,
        1,
        '2022-01-03 17:08:23',
        '2022-01-03 17:08:23'
    ),
    (
        154,
        5,
        'Invoice #154',
        79.92,
        1,
        '2022-01-03 17:09:45',
        '2022-01-03 17:09:45'
    ),
    (
        155,
        5,
        'Invoice #155',
        79.92,
        1,
        '2022-01-03 17:10:31',
        '2022-01-03 17:10:31'
    ),
    (
        156,
        5,
        'Invoice #156',
        79.92,
        1,
        '2022-01-03 17:12:18',
        '2022-01-03 17:12:18'
    ),
    (
        157,
        5,
        'Invoice #157',
        79.92,
        1,
        '2022-01-03 17:13:05',
        '2022-01-03 17:13:05'
    ),
    (
        158,
        5,
        'Invoice #158',
        79.92,
        1,
        '2022-01-03 17:14:48',
        '2022-01-03 17:14:48'
    ),
    (
        159,
        5,
        'Invoice #159',
        79.92,
        1,
        '2022-01-03 17:15:13',
        '2022-01-03 17:15:13'
    ),
    (
        160,
        5,
        'Invoice #160',
        79.92,
        1,
        '2022-01-03 17:19:47',
        '2022-01-03 17:19:47'
    ),
    (
        161,
        5,
        'Invoice #161',
        79.92,
        1,
        '2022-01-03 17:20:56',
        '2022-01-03 17:20:56'
    ),
    (
        162,
        5,
        'Invoice #162',
        79.92,
        1,
        '2022-01-03 17:21:05',
        '2022-01-03 17:21:05'
    ),
    (
        163,
        5,
        'Invoice #163',
        79.92,
        1,
        '2022-01-03 17:24:34',
        '2022-01-03 17:24:34'
    ),
    (
        164,
        5,
        'Invoice #164',
        79.92,
        1,
        '2022-01-03 17:25:14',
        '2022-01-03 17:25:14'
    ),
    (
        165,
        5,
        'Invoice #165',
        79.92,
        1,
        '2022-01-03 17:25:47',
        '2022-01-03 17:25:47'
    ),
    (
        166,
        5,
        'Invoice #166',
        79.92,
        1,
        '2022-01-03 17:26:15',
        '2022-01-03 17:26:15'
    ),
    (
        167,
        5,
        'Invoice #167',
        79.92,
        1,
        '2022-01-03 17:26:29',
        '2022-01-03 17:26:29'
    ),
    (
        168,
        5,
        'Invoice #168',
        79.92,
        1,
        '2022-01-03 17:27:03',
        '2022-01-03 17:27:03'
    ),
    (
        169,
        5,
        'Invoice #169',
        79.92,
        1,
        '2022-01-03 17:29:04',
        '2022-01-03 17:29:04'
    ),
    (
        170,
        5,
        'Invoice #170',
        79.92,
        1,
        '2022-01-03 17:29:14',
        '2022-01-03 17:29:14'
    ),
    (
        171,
        5,
        'Invoice #171',
        79.92,
        1,
        '2022-01-03 17:53:05',
        '2022-01-03 17:53:05'
    ),
    (
        172,
        5,
        'Invoice #172',
        79.92,
        1,
        '2022-01-03 17:54:40',
        '2022-01-03 17:54:40'
    ),
    (
        173,
        5,
        'Invoice #173',
        79.92,
        1,
        '2022-01-03 17:55:00',
        '2022-01-03 17:55:00'
    ),
    (
        174,
        5,
        'Invoice #174',
        79.92,
        1,
        '2022-01-03 17:55:35',
        '2022-01-03 17:55:35'
    ),
    (
        175,
        5,
        'Invoice #175',
        79.92,
        1,
        '2022-01-03 17:57:03',
        '2022-01-03 17:57:03'
    ),
    (
        176,
        5,
        'Invoice #176',
        79.92,
        1,
        '2022-01-03 19:09:07',
        '2022-01-03 19:09:07'
    ),
    (
        177,
        5,
        'Invoice #177',
        79.92,
        1,
        '2022-01-03 19:11:10',
        '2022-01-03 19:11:10'
    ),
    (
        178,
        5,
        'Invoice #178',
        79.92,
        1,
        '2022-01-03 19:12:54',
        '2022-01-03 19:12:54'
    ),
    (
        179,
        5,
        'Invoice #179',
        79.92,
        1,
        '2022-01-03 19:17:24',
        '2022-01-03 19:17:24'
    ),
    (
        180,
        5,
        'Invoice #180',
        79.92,
        1,
        '2022-01-03 19:19:15',
        '2022-01-03 19:19:15'
    ),
    (
        181,
        5,
        'Invoice #181',
        79.92,
        1,
        '2022-01-03 19:19:38',
        '2022-01-03 19:19:38'
    ),
    (
        182,
        5,
        'Invoice #182',
        104.93,
        1,
        '2022-01-06 15:49:28',
        '2022-01-06 15:49:28'
    ),
    (
        183,
        5,
        'Invoice #183',
        104.93,
        1,
        '2022-01-07 03:50:22',
        '2022-01-07 03:50:22'
    ),
    (
        184,
        5,
        'Invoice #184',
        89.94,
        1,
        '2022-01-07 18:47:24',
        '2022-01-07 18:47:24'
    ),
    (
        185,
        5,
        'Invoice #185',
        89.94,
        1,
        '2022-01-07 18:49:46',
        '2022-01-07 18:49:46'
    ),
    (
        186,
        5,
        'Invoice #186',
        89.94,
        1,
        '2022-01-07 18:50:07',
        '2022-01-07 18:50:07'
    ),
    (
        187,
        5,
        'Invoice #187',
        179.88,
        1,
        '2022-01-30 21:05:21',
        '2022-01-30 21:05:21'
    ),
    (
        188,
        5,
        'Invoice #188',
        89.94,
        1,
        '2022-04-07 17:20:59',
        '2022-04-07 17:20:59'
    ),
    (
        189,
        5,
        'Invoice #189',
        89.94,
        1,
        '2022-04-07 17:22:14',
        '2022-04-07 17:22:14'
    ),
    (
        190,
        5,
        'Invoice #190',
        89.94,
        1,
        '2022-04-07 17:30:16',
        '2022-04-07 17:30:16'
    ),
    (
        191,
        5,
        'Invoice #191',
        89.94,
        1,
        '2022-04-07 17:45:22',
        '2022-04-07 17:45:22'
    ),
    (
        192,
        5,
        'Invoice #192',
        89.94,
        1,
        '2022-04-07 17:45:58',
        '2022-04-07 17:45:58'
    ),
    (
        193,
        5,
        'Invoice #193',
        89.94,
        1,
        '2022-04-07 17:49:03',
        '2022-04-07 17:49:03'
    ),
    (
        194,
        5,
        'Invoice #194',
        89.94,
        1,
        '2022-04-07 17:49:18',
        '2022-04-07 17:49:18'
    ),
    (
        195,
        5,
        'Invoice #195',
        134.91,
        1,
        '2022-04-09 16:45:19',
        '2022-04-09 16:45:19'
    ),
    (
        196,
        5,
        'Invoice #196',
        179.88,
        1,
        '2022-05-07 01:56:02',
        '2022-05-07 01:56:02'
    ),
    (
        197,
        5,
        'Invoice #197',
        179.88,
        1,
        '2022-05-07 01:57:08',
        '2022-05-07 01:57:08'
    ),
    (
        198,
        5,
        'Invoice #198',
        179.88,
        1,
        '2022-05-07 02:03:37',
        '2022-05-07 02:03:37'
    ),
    (
        199,
        5,
        'Invoice #199',
        89.94,
        1,
        '2022-05-07 02:09:25',
        '2022-05-07 02:09:25'
    ),
    (
        200,
        5,
        'Invoice #200',
        89.94,
        1,
        '2022-05-07 02:11:32',
        '2022-05-07 02:11:32'
    ),
    (
        201,
        5,
        'Invoice #201',
        89.94,
        1,
        '2022-05-07 02:16:04',
        '2022-05-07 02:16:04'
    ),
    (
        202,
        5,
        'Invoice #202',
        89.94,
        1,
        '2022-05-07 02:16:26',
        '2022-05-07 02:16:26'
    ),
    (
        203,
        5,
        'Invoice #203',
        89.94,
        1,
        '2022-05-07 02:18:13',
        '2022-05-07 02:18:13'
    ),
    (
        204,
        5,
        'Invoice #204',
        89.94,
        1,
        '2022-05-07 02:21:31',
        '2022-05-07 02:21:31'
    ),
    (
        205,
        5,
        'Invoice #205',
        89.94,
        1,
        '2022-05-07 02:22:36',
        '2022-05-07 02:22:36'
    ),
    (
        206,
        5,
        'Invoice #206',
        89.94,
        1,
        '2022-05-07 02:22:48',
        '2022-05-07 02:22:48'
    ),
    (
        207,
        5,
        'Invoice #207',
        89.94,
        1,
        '2022-05-07 02:23:01',
        '2022-05-07 02:23:01'
    ),
    (
        208,
        5,
        'Invoice #208',
        89.94,
        1,
        '2022-05-07 02:23:12',
        '2022-05-07 02:23:12'
    ),
    (
        209,
        5,
        'Invoice #209',
        74.95,
        1,
        '2022-05-09 22:36:32',
        '2022-05-09 22:36:32'
    ),
    (
        210,
        9,
        'Invoice #210',
        44.97,
        1,
        '2022-06-24 03:26:32',
        '2022-06-24 03:26:32'
    ),
    (
        211,
        9,
        'Invoice #211',
        44.97,
        1,
        '2022-06-24 03:28:10',
        '2022-06-24 03:28:10'
    ),
    (
        212,
        5,
        'Invoice #212',
        14.99,
        1,
        '2022-06-25 16:19:48',
        '2022-06-25 16:19:48'
    ),
    (
        213,
        9,
        'Invoice #213',
        134.91,
        1,
        '2022-07-05 21:09:50',
        '2022-07-05 21:09:50'
    ),
    (
        214,
        9,
        'Invoice #214',
        134.91,
        1,
        '2022-07-08 04:54:41',
        '2022-07-08 04:54:41'
    ),
    (
        215,
        9,
        'Invoice #215',
        179.88,
        1,
        '2022-07-10 13:55:31',
        '2022-07-10 13:55:31'
    ),
    (
        216,
        9,
        'Invoice #216',
        134.91,
        1,
        '2022-07-11 04:04:14',
        '2022-07-11 04:04:14'
    ),
    (
        217,
        9,
        'Invoice #217',
        89.94,
        1,
        '2022-07-14 21:20:42',
        '2022-07-14 21:20:42'
    ),
    (
        218,
        9,
        'Invoice #218',
        119.92,
        1,
        '2022-07-16 07:17:48',
        '2022-07-16 07:17:48'
    ),
    (
        219,
        9,
        'Invoice #219',
        29.98,
        1,
        '2022-07-20 03:31:34',
        '2022-07-20 03:31:34'
    ),
    (
        220,
        9,
        'Invoice #220',
        14.99,
        1,
        '2022-07-21 06:21:40',
        '2022-07-21 06:21:40'
    ),
    (
        221,
        9,
        'Invoice #221',
        29.98,
        1,
        '2022-07-21 22:56:53',
        '2022-07-21 22:56:53'
    ),
    (
        222,
        9,
        'Invoice #222',
        59.96,
        1,
        '2022-07-24 03:25:41',
        '2022-07-24 03:25:41'
    ),
    (
        223,
        9,
        'Invoice #223',
        239.84,
        1,
        '2022-07-28 05:59:38',
        '2022-07-28 05:59:38'
    ),
    (
        224,
        9,
        'Invoice #224',
        239.84,
        1,
        '2022-07-28 06:02:22',
        '2022-07-28 06:02:22'
    ),
    (
        225,
        9,
        'Invoice #225',
        239.84,
        1,
        '2022-07-28 06:03:23',
        '2022-07-28 06:03:23'
    ),
    (
        226,
        9,
        'Invoice #226',
        239.84,
        1,
        '2022-07-28 06:03:44',
        '2022-07-28 06:03:44'
    ),
    (
        227,
        9,
        'Invoice #227',
        119.92,
        1,
        '2022-07-28 06:09:06',
        '2022-07-28 06:09:06'
    ),
    (
        228,
        9,
        'Invoice #228',
        119.92,
        1,
        '2022-07-28 06:10:00',
        '2022-07-28 06:10:00'
    ),
    (
        229,
        9,
        'Invoice #229',
        119.92,
        1,
        '2022-07-28 06:10:23',
        '2022-07-28 06:10:23'
    ),
    (
        230,
        9,
        'Invoice #230',
        119.92,
        1,
        '2022-07-28 06:10:57',
        '2022-07-28 06:10:57'
    ),
    (
        231,
        9,
        'Invoice #231',
        119.92,
        1,
        '2022-07-28 06:11:10',
        '2022-07-28 06:11:10'
    ),
    (
        232,
        9,
        'Invoice #232',
        119.92,
        1,
        '2022-07-28 06:14:30',
        '2022-07-28 06:14:30'
    ),
    (
        233,
        9,
        'Invoice #233',
        119.92,
        1,
        '2022-07-28 06:15:00',
        '2022-07-28 06:15:00'
    ),
    (
        234,
        9,
        'Invoice #234',
        119.92,
        1,
        '2022-07-28 06:22:31',
        '2022-07-28 06:22:31'
    ),
    (
        235,
        9,
        'Invoice #235',
        119.92,
        1,
        '2022-07-28 22:24:26',
        '2022-07-28 22:24:26'
    ),
    (
        236,
        9,
        'Invoice #236',
        119.92,
        1,
        '2022-07-28 22:25:21',
        '2022-07-28 22:25:21'
    ),
    (
        237,
        9,
        'Invoice #237',
        119.92,
        1,
        '2022-07-28 22:25:42',
        '2022-07-28 22:25:42'
    ),
    (
        238,
        9,
        'Invoice #238',
        119.92,
        1,
        '2022-07-28 22:26:22',
        '2022-07-28 22:26:22'
    ),
    (
        239,
        9,
        'Invoice #239',
        119.92,
        1,
        '2022-07-28 22:26:44',
        '2022-07-28 22:26:44'
    ),
    (
        240,
        9,
        'Invoice #240',
        119.92,
        1,
        '2022-07-28 22:27:32',
        '2022-07-28 22:27:32'
    ),
    (
        241,
        9,
        'Invoice #241',
        119.92,
        1,
        '2022-07-28 22:27:46',
        '2022-07-28 22:27:46'
    ),
    (
        242,
        9,
        'Invoice #242',
        119.92,
        1,
        '2022-07-28 22:27:56',
        '2022-07-28 22:27:56'
    ),
    (
        243,
        9,
        'Invoice #243',
        179.88,
        1,
        '2022-07-28 22:32:34',
        '2022-07-28 22:32:34'
    ),
    (
        244,
        9,
        'Invoice #244',
        119.92,
        1,
        '2022-07-29 03:27:06',
        '2022-07-29 03:27:06'
    ),
    (
        245,
        5,
        'Invoice #245',
        134.91,
        1,
        '2022-07-29 03:30:17',
        '2022-07-29 03:30:17'
    ),
    (
        246,
        9,
        'Invoice #246',
        239.84,
        1,
        '2022-07-29 05:09:14',
        '2022-07-29 05:09:14'
    ),
    (
        247,
        9,
        'Invoice #247',
        179.88,
        1,
        '2022-07-29 06:18:59',
        '2022-07-29 06:18:59'
    ),
    (
        248,
        183,
        'Invoice #248',
        239.84,
        1,
        '2022-07-29 06:20:02',
        '2022-07-29 06:20:02'
    ),
    (
        249,
        9,
        'Invoice #249',
        119.92,
        1,
        '2022-07-29 06:29:03',
        '2022-07-29 06:29:03'
    ),
    (
        250,
        183,
        'Invoice #250',
        179.88,
        1,
        '2022-07-29 06:33:44',
        '2022-07-29 06:33:44'
    ),
    (
        251,
        9,
        'Invoice #251',
        179.88,
        1,
        '2022-08-02 19:52:21',
        '2022-08-02 19:52:21'
    ),
    (
        252,
        5,
        'Invoice #252',
        89.94,
        1,
        '2022-08-03 06:01:00',
        '2022-08-03 06:01:00'
    ),
    (
        253,
        183,
        'Invoice #253',
        59.96,
        1,
        '2022-08-08 21:32:45',
        '2022-08-08 21:32:45'
    ),
    (
        254,
        183,
        'Invoice #253',
        59.96,
        1,
        '2022-08-08 21:32:45',
        '2022-08-08 21:32:45'
    ),
    (
        255,
        183,
        'Invoice #255',
        44.97,
        1,
        '2022-08-30 00:26:30',
        '2022-08-30 00:26:30'
    ),
    (
        256,
        183,
        'Invoice #256',
        44.97,
        1,
        '2022-08-30 00:27:14',
        '2022-08-30 00:27:14'
    ),
    (
        257,
        183,
        'Invoice #257',
        44.97,
        1,
        '2022-08-30 00:29:35',
        '2022-08-30 00:29:35'
    ),
    (
        258,
        183,
        'Invoice #258',
        44.97,
        1,
        '2022-08-30 01:01:27',
        '2022-08-30 01:01:27'
    ),
    (
        259,
        183,
        'Invoice #259',
        44.97,
        1,
        '2022-08-30 01:01:44',
        '2022-08-30 01:01:44'
    ),
    (
        260,
        183,
        'Invoice #260',
        44.97,
        1,
        '2022-08-30 01:04:20',
        '2022-08-30 01:04:20'
    ),
    (
        261,
        183,
        'Invoice #261',
        44.97,
        1,
        '2022-08-30 01:04:32',
        '2022-08-30 01:04:32'
    ),
    (
        262,
        183,
        'Invoice #262',
        44.97,
        1,
        '2022-08-30 01:29:23',
        '2022-08-30 01:29:23'
    ),
    (
        263,
        183,
        'Invoice #263',
        44.97,
        1,
        '2022-08-30 01:31:02',
        '2022-08-30 01:31:02'
    ),
    (
        264,
        183,
        'Invoice #264',
        179.88,
        1,
        '2022-09-01 01:45:44',
        '2022-09-01 01:45:44'
    ),
    (
        265,
        183,
        'Invoice #265',
        179.88,
        1,
        '2022-09-01 01:46:53',
        '2022-09-01 01:46:53'
    ),
    (
        266,
        183,
        'Invoice #266',
        179.88,
        1,
        '2022-09-01 02:15:10',
        '2022-09-01 02:15:10'
    ),
    (
        267,
        183,
        'Invoice #267',
        179.88,
        1,
        '2022-09-01 02:29:15',
        '2022-09-01 02:29:15'
    ),
    (
        268,
        183,
        'Invoice #268',
        179.88,
        1,
        '2022-09-01 02:36:55',
        '2022-09-01 02:36:55'
    ),
    (
        269,
        183,
        'Invoice #269',
        179.88,
        1,
        '2022-09-01 02:39:38',
        '2022-09-01 02:39:38'
    ),
    (
        270,
        183,
        'Invoice #270',
        179.88,
        1,
        '2022-09-01 02:40:29',
        '2022-09-01 02:40:29'
    ),
    (
        271,
        183,
        'Invoice #271',
        179.88,
        1,
        '2022-09-01 02:51:35',
        '2022-09-01 02:51:35'
    ),
    (
        272,
        183,
        'Invoice #272',
        179.88,
        1,
        '2022-09-01 03:52:07',
        '2022-09-01 03:52:07'
    ),
    (
        273,
        183,
        'Invoice #273',
        179.88,
        1,
        '2022-09-01 03:52:43',
        '2022-09-01 03:52:43'
    ),
    (
        274,
        183,
        'Invoice #274',
        179.88,
        1,
        '2022-09-01 03:58:48',
        '2022-09-01 03:58:48'
    ),
    (
        275,
        183,
        'Invoice #275',
        179.88,
        1,
        '2022-09-01 04:05:32',
        '2022-09-01 04:05:32'
    ),
    (
        276,
        183,
        'Invoice #276',
        179.88,
        1,
        '2022-09-01 19:28:35',
        '2022-09-01 19:28:35'
    ),
    (
        277,
        183,
        'Invoice #277',
        179.88,
        1,
        '2022-09-01 19:33:05',
        '2022-09-01 19:33:05'
    ),
    (
        278,
        183,
        'Invoice #278',
        179.88,
        1,
        '2022-09-01 19:48:54',
        '2022-09-01 19:48:54'
    ),
    (
        279,
        183,
        'Invoice #279',
        119.92,
        1,
        '2022-09-01 19:59:30',
        '2022-09-01 19:59:30'
    ),
    (
        280,
        183,
        'Invoice #280',
        119.92,
        1,
        '2022-09-01 20:00:04',
        '2022-09-01 20:00:04'
    ),
    (
        281,
        183,
        'Invoice #281',
        119.92,
        1,
        '2022-09-01 20:00:19',
        '2022-09-01 20:00:19'
    ),
    (
        282,
        183,
        'Invoice #282',
        119.92,
        1,
        '2022-09-01 20:00:31',
        '2022-09-01 20:00:31'
    ),
    (
        283,
        183,
        'Invoice #283',
        119.92,
        1,
        '2022-09-01 20:00:42',
        '2022-09-01 20:00:42'
    ),
    (
        284,
        183,
        'Invoice #284',
        119.92,
        1,
        '2022-09-01 20:02:16',
        '2022-09-01 20:02:16'
    ),
    (
        285,
        183,
        'Invoice #285',
        119.92,
        1,
        '2022-09-01 20:02:37',
        '2022-09-01 20:02:37'
    ),
    (
        286,
        183,
        'Invoice #286',
        119.92,
        1,
        '2022-09-01 20:08:30',
        '2022-09-01 20:08:30'
    ),
    (
        287,
        183,
        'Invoice #287',
        119.92,
        1,
        '2022-09-01 20:11:38',
        '2022-09-01 20:11:38'
    ),
    (
        288,
        183,
        'Invoice #288',
        119.92,
        1,
        '2022-09-01 20:11:49',
        '2022-09-01 20:11:49'
    ),
    (
        289,
        183,
        'Invoice #289',
        119.92,
        1,
        '2022-09-01 20:12:07',
        '2022-09-01 20:12:07'
    ),
    (
        290,
        183,
        'Invoice #290',
        119.92,
        1,
        '2022-09-01 20:12:18',
        '2022-09-01 20:12:18'
    ),
    (
        291,
        183,
        'Invoice #291',
        119.92,
        1,
        '2022-09-01 20:20:00',
        '2022-09-01 20:20:00'
    ),
    (
        292,
        183,
        'Invoice #292',
        119.92,
        1,
        '2022-09-01 20:22:57',
        '2022-09-01 20:22:57'
    ),
    (
        293,
        183,
        'Invoice #293',
        119.92,
        1,
        '2022-09-01 20:23:26',
        '2022-09-01 20:23:26'
    ),
    (
        294,
        183,
        'Invoice #294',
        119.92,
        1,
        '2022-09-02 21:41:35',
        '2022-09-02 21:41:35'
    ),
    (
        295,
        183,
        'Invoice #295',
        119.92,
        1,
        '2022-09-02 21:42:48',
        '2022-09-02 21:42:48'
    ),
    (
        296,
        183,
        'Invoice #296',
        119.92,
        1,
        '2022-09-02 21:50:10',
        '2022-09-02 21:50:10'
    ),
    (
        297,
        183,
        'Invoice #297',
        59.96,
        1,
        '2022-09-16 04:24:14',
        '2022-09-16 04:24:14'
    ),
    (
        298,
        183,
        'Invoice #298',
        59.96,
        1,
        '2022-11-21 11:48:55',
        '2022-11-21 11:48:57'
    ),
    (
        299,
        5,
        'Invoice #299',
        29.98,
        1,
        '2022-11-21 16:49:36',
        '2022-11-21 16:49:36'
    ),
    (
        300,
        5,
        'Invoice #300',
        59.96,
        1,
        '2022-11-22 02:57:55',
        '2022-11-22 02:57:55'
    ),
    (
        301,
        5,
        'Invoice #301',
        29.98,
        1,
        '2022-11-22 03:12:19',
        '2022-11-22 03:12:19'
    ),
    (
        302,
        5,
        'Invoice #302',
        29.98,
        1,
        '2022-11-22 03:49:44',
        '2022-11-22 03:49:44'
    );

/*Data for the table `ipn_status` */
/*Data for the table `items` */
insert into
    `items`(
        `id`,
        `invoice_id`,
        `item_name`,
        `item_price`,
        `item_qty`,
        `created_at`,
        `updated_at`
    )
values
    (
        1,
        1,
        'Product 1',
        9.99,
        1,
        '2021-05-23 03:44:31',
        '2021-05-23 03:44:31'
    ),
    (
        2,
        1,
        'Product 2',
        4.99,
        2,
        '2021-05-23 03:44:31',
        '2021-05-23 03:44:31'
    ),
    (
        3,
        7,
        'Product 1',
        9.99,
        1,
        '2021-05-23 03:48:06',
        '2021-05-23 03:48:06'
    ),
    (
        4,
        7,
        'Product 2',
        4.99,
        2,
        '2021-05-23 03:48:06',
        '2021-05-23 03:48:06'
    ),
    (
        5,
        8,
        'Product 1',
        9.99,
        1,
        '2021-05-23 19:02:20',
        '2021-05-23 19:02:20'
    ),
    (
        6,
        8,
        'Product 2',
        4.99,
        2,
        '2021-05-23 19:02:20',
        '2021-05-23 19:02:20'
    ),
    (
        7,
        9,
        'Product 1',
        9.99,
        1,
        '2021-05-23 19:09:22',
        '2021-05-23 19:09:22'
    ),
    (
        8,
        9,
        'Product 2',
        4.99,
        2,
        '2021-05-23 19:09:22',
        '2021-05-23 19:09:22'
    ),
    (
        9,
        10,
        'Product 1',
        9.99,
        1,
        '2021-05-23 19:12:01',
        '2021-05-23 19:12:01'
    ),
    (
        10,
        10,
        'Product 2',
        4.99,
        2,
        '2021-05-23 19:12:01',
        '2021-05-23 19:12:01'
    ),
    (
        11,
        11,
        'Product 1',
        9.99,
        1,
        '2021-05-23 19:13:35',
        '2021-05-23 19:13:35'
    ),
    (
        12,
        11,
        'Product 2',
        4.99,
        2,
        '2021-05-23 19:13:35',
        '2021-05-23 19:13:35'
    ),
    (
        13,
        12,
        'Product 1',
        9.99,
        1,
        '2021-05-23 21:52:45',
        '2021-05-23 21:52:45'
    ),
    (
        14,
        12,
        'Product 2',
        4.99,
        2,
        '2021-05-23 21:52:45',
        '2021-05-23 21:52:45'
    ),
    (
        15,
        13,
        'Product 1',
        9.99,
        1,
        '2021-05-26 02:22:46',
        '2021-05-26 02:22:46'
    ),
    (
        16,
        13,
        'Product 2',
        4.99,
        2,
        '2021-05-26 02:22:46',
        '2021-05-26 02:22:46'
    ),
    (
        17,
        14,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-05-26 17:53:20',
        '2021-05-26 17:53:20'
    ),
    (
        18,
        14,
        'English Regular Program - Regular Plan',
        119.88,
        1,
        '2021-05-26 17:53:20',
        '2021-05-26 17:53:20'
    ),
    (
        19,
        14,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 17:53:20',
        '2021-05-26 17:53:20'
    ),
    (
        20,
        15,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-05-26 17:53:47',
        '2021-05-26 17:53:47'
    ),
    (
        21,
        15,
        'English Regular Program - Regular Plan',
        119.88,
        1,
        '2021-05-26 17:53:47',
        '2021-05-26 17:53:47'
    ),
    (
        22,
        15,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 17:53:47',
        '2021-05-26 17:53:47'
    ),
    (
        23,
        16,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-05-26 17:57:08',
        '2021-05-26 17:57:08'
    ),
    (
        24,
        16,
        'English Regular Program - Regular Plan',
        119.88,
        1,
        '2021-05-26 17:57:08',
        '2021-05-26 17:57:08'
    ),
    (
        25,
        16,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 17:57:08',
        '2021-05-26 17:57:08'
    ),
    (
        26,
        17,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-05-26 17:58:02',
        '2021-05-26 17:58:02'
    ),
    (
        27,
        17,
        'English Regular Program - Regular Plan',
        119.88,
        1,
        '2021-05-26 17:58:03',
        '2021-05-26 17:58:03'
    ),
    (
        28,
        17,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 17:58:03',
        '2021-05-26 17:58:03'
    ),
    (
        29,
        18,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-05-26 17:58:14',
        '2021-05-26 17:58:14'
    ),
    (
        30,
        18,
        'English Regular Program - Regular Plan',
        119.88,
        1,
        '2021-05-26 17:58:14',
        '2021-05-26 17:58:14'
    ),
    (
        31,
        18,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 17:58:14',
        '2021-05-26 17:58:14'
    ),
    (
        32,
        19,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-05-26 18:00:28',
        '2021-05-26 18:00:28'
    ),
    (
        33,
        19,
        'English Regular Program - Regular Plan',
        119.88,
        1,
        '2021-05-26 18:00:28',
        '2021-05-26 18:00:28'
    ),
    (
        34,
        19,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 18:00:28',
        '2021-05-26 18:00:28'
    ),
    (
        35,
        20,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-05-26 18:05:04',
        '2021-05-26 18:05:04'
    ),
    (
        36,
        20,
        'English Regular Program - Regular Plan',
        119.88,
        1,
        '2021-05-26 18:05:04',
        '2021-05-26 18:05:04'
    ),
    (
        37,
        20,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 18:05:04',
        '2021-05-26 18:05:04'
    ),
    (
        38,
        21,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-05-26 18:14:15',
        '2021-05-26 18:14:15'
    ),
    (
        39,
        21,
        'English Regular Program - Regular Plan',
        119.88,
        1,
        '2021-05-26 18:14:15',
        '2021-05-26 18:14:15'
    ),
    (
        40,
        21,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 18:14:15',
        '2021-05-26 18:14:15'
    ),
    (
        41,
        22,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-05-26 18:16:12',
        '2021-05-26 18:16:12'
    ),
    (
        42,
        22,
        'English Regular Program - Regular Plan',
        119.88,
        1,
        '2021-05-26 18:16:12',
        '2021-05-26 18:16:12'
    ),
    (
        43,
        22,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 18:16:12',
        '2021-05-26 18:16:12'
    ),
    (
        44,
        23,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-05-26 18:19:43',
        '2021-05-26 18:19:43'
    ),
    (
        45,
        23,
        'English Regular Program - Regular Plan',
        119.88,
        1,
        '2021-05-26 18:19:43',
        '2021-05-26 18:19:43'
    ),
    (
        46,
        23,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 18:19:43',
        '2021-05-26 18:19:43'
    ),
    (
        47,
        24,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 21:26:11',
        '2021-05-26 21:26:11'
    ),
    (
        48,
        25,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 21:29:26',
        '2021-05-26 21:29:26'
    ),
    (
        49,
        26,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 21:34:56',
        '2021-05-26 21:34:56'
    ),
    (
        50,
        27,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 21:36:32',
        '2021-05-26 21:36:32'
    ),
    (
        51,
        28,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 21:37:21',
        '2021-05-26 21:37:21'
    ),
    (
        52,
        29,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 21:38:19',
        '2021-05-26 21:38:19'
    ),
    (
        53,
        30,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 21:40:10',
        '2021-05-26 21:40:10'
    ),
    (
        54,
        31,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 21:42:00',
        '2021-05-26 21:42:00'
    ),
    (
        55,
        32,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 21:44:39',
        '2021-05-26 21:44:39'
    ),
    (
        56,
        33,
        'English Regular Program - Intensive Plan',
        159.84,
        1,
        '2021-05-26 21:45:06',
        '2021-05-26 21:45:06'
    ),
    (
        57,
        34,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-06-29 22:50:30',
        '2021-06-29 22:50:30'
    ),
    (
        58,
        34,
        'Enrolment',
        10,
        1,
        '2021-06-29 22:50:30',
        '2021-06-29 22:50:30'
    ),
    (
        59,
        35,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-06-29 22:51:39',
        '2021-06-29 22:51:39'
    ),
    (
        60,
        35,
        'Enrolment',
        10,
        1,
        '2021-06-29 22:51:39',
        '2021-06-29 22:51:39'
    ),
    (
        61,
        36,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-06-29 22:52:26',
        '2021-06-29 22:52:26'
    ),
    (
        62,
        36,
        'Enrolment',
        10,
        1,
        '2021-06-29 22:52:26',
        '2021-06-29 22:52:26'
    ),
    (
        63,
        37,
        'English Regular Program - Simple Plan',
        79.92,
        1,
        '2021-06-29 22:53:32',
        '2021-06-29 22:53:32'
    ),
    (
        64,
        37,
        'Enrolment',
        10,
        1,
        '2021-06-29 22:53:32',
        '2021-06-29 22:53:32'
    ),
    (
        65,
        38,
        'Enrolment',
        10,
        1,
        '2021-06-29 22:55:18',
        '2021-06-29 22:55:18'
    ),
    (
        66,
        39,
        'English Regular Program - Individual Lesson',
        9.99,
        6,
        '2021-07-25 19:05:58',
        '2021-07-25 19:05:58'
    ),
    (
        67,
        40,
        'English Regular Program - Individual Lesson',
        9.99,
        8,
        '2021-07-30 01:02:22',
        '2021-07-30 01:02:22'
    ),
    (
        68,
        41,
        'English Regular Program - Individual Lesson',
        9.99,
        8,
        '2021-07-30 01:03:00',
        '2021-07-30 01:03:00'
    ),
    (
        69,
        42,
        'English Regular Program - Individual Lesson',
        9.99,
        8,
        '2021-07-30 01:03:07',
        '2021-07-30 01:03:07'
    ),
    (
        70,
        43,
        'English Regular Program - Individual Lesson',
        9.99,
        8,
        '2021-07-30 01:03:14',
        '2021-07-30 01:03:14'
    ),
    (
        71,
        44,
        'English Regular Program - Individual Lesson',
        9.99,
        8,
        '2021-07-30 01:11:22',
        '2021-07-30 01:11:22'
    ),
    (
        72,
        45,
        'English Regular Program - Individual Lesson',
        9.99,
        8,
        '2021-07-30 01:12:40',
        '2021-07-30 01:12:40'
    ),
    (
        73,
        46,
        'English Regular Program - Individual Lesson',
        9.99,
        8,
        '2021-07-30 01:13:02',
        '2021-07-30 01:13:02'
    ),
    (
        74,
        47,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-07-30 01:20:13',
        '2021-07-30 01:20:13'
    ),
    (
        75,
        48,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-07-30 01:20:39',
        '2021-07-30 01:20:39'
    ),
    (
        76,
        49,
        'English Regular Program - Individual Lesson',
        9.99,
        6,
        '2021-07-30 01:24:04',
        '2021-07-30 01:24:04'
    ),
    (
        77,
        50,
        'English Regular Program - Individual Lesson',
        9.99,
        5,
        '2021-07-30 01:25:08',
        '2021-07-30 01:25:08'
    ),
    (
        78,
        51,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-07-30 01:29:03',
        '2021-07-30 01:29:03'
    ),
    (
        79,
        52,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-07-30 01:33:26',
        '2021-07-30 01:33:26'
    ),
    (
        80,
        53,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-07-30 01:42:49',
        '2021-07-30 01:42:49'
    ),
    (
        81,
        54,
        'English Regular Program - Individual Lesson',
        9.99,
        6,
        '2021-07-30 03:10:29',
        '2021-07-30 03:10:29'
    ),
    (
        82,
        55,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-07-30 03:31:37',
        '2021-07-30 03:31:37'
    ),
    (
        83,
        56,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-07-30 03:32:56',
        '2021-07-30 03:32:56'
    ),
    (
        84,
        57,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-07-30 03:35:48',
        '2021-07-30 03:35:48'
    ),
    (
        85,
        58,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-07-30 03:37:25',
        '2021-07-30 03:37:25'
    ),
    (
        86,
        59,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-07-30 03:39:20',
        '2021-07-30 03:39:20'
    ),
    (
        87,
        60,
        'English Regular Program - Individual Lesson',
        9.99,
        8,
        '2021-07-30 19:50:18',
        '2021-07-30 19:50:18'
    ),
    (
        88,
        61,
        'English Regular Program - Individual Lesson',
        9.99,
        8,
        '2021-08-03 22:52:56',
        '2021-08-03 22:52:56'
    ),
    (
        89,
        62,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 03:18:21',
        '2021-08-04 03:18:21'
    ),
    (
        90,
        63,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 16:00:50',
        '2021-08-04 16:00:50'
    ),
    (
        91,
        64,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:01:04',
        '2021-08-04 18:01:04'
    ),
    (
        92,
        65,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:01:40',
        '2021-08-04 18:01:40'
    ),
    (
        93,
        66,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:01:50',
        '2021-08-04 18:01:50'
    ),
    (
        94,
        67,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:02:33',
        '2021-08-04 18:02:33'
    ),
    (
        95,
        68,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:04:38',
        '2021-08-04 18:04:38'
    ),
    (
        96,
        69,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:05:12',
        '2021-08-04 18:05:12'
    ),
    (
        97,
        70,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:06:32',
        '2021-08-04 18:06:32'
    ),
    (
        98,
        71,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:07:13',
        '2021-08-04 18:07:13'
    ),
    (
        99,
        72,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:07:51',
        '2021-08-04 18:07:51'
    ),
    (
        100,
        73,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:08:10',
        '2021-08-04 18:08:10'
    ),
    (
        101,
        74,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:10:34',
        '2021-08-04 18:10:34'
    ),
    (
        102,
        75,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:11:30',
        '2021-08-04 18:11:30'
    ),
    (
        103,
        76,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:11:42',
        '2021-08-04 18:11:42'
    ),
    (
        104,
        77,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:15:55',
        '2021-08-04 18:15:55'
    ),
    (
        105,
        78,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:17:03',
        '2021-08-04 18:17:03'
    ),
    (
        106,
        79,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:17:20',
        '2021-08-04 18:17:20'
    ),
    (
        107,
        80,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-04 18:19:30',
        '2021-08-04 18:19:30'
    ),
    (
        108,
        81,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-07 02:29:11',
        '2021-08-07 02:29:11'
    ),
    (
        109,
        82,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-07 02:30:16',
        '2021-08-07 02:30:16'
    ),
    (
        110,
        83,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-07 02:30:33',
        '2021-08-07 02:30:33'
    ),
    (
        111,
        84,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-08-07 02:31:45',
        '2021-08-07 02:31:45'
    ),
    (
        112,
        85,
        'English Regular Program - Individual Lesson',
        9.99,
        1,
        '2021-08-11 20:46:07',
        '2021-08-11 20:46:07'
    ),
    (
        113,
        86,
        'English Regular Program - Individual Lesson',
        9.99,
        3,
        '2021-08-20 20:33:48',
        '2021-08-20 20:33:48'
    ),
    (
        114,
        88,
        'English Regular Program - Individual Lesson',
        9.99,
        2,
        '2021-08-23 16:39:24',
        '2021-08-23 16:39:24'
    ),
    (
        115,
        89,
        'English Regular Program - Individual Lesson',
        9.99,
        2,
        '2021-08-26 18:01:25',
        '2021-08-26 18:01:25'
    ),
    (
        116,
        90,
        'English Regular Program - Individual Lesson',
        9.99,
        2,
        '2021-08-28 14:48:02',
        '2021-08-28 14:48:02'
    ),
    (
        117,
        91,
        'English Regular Program - Individual Lesson',
        9.99,
        1,
        '2021-08-29 22:38:26',
        '2021-08-29 22:38:26'
    ),
    (
        118,
        92,
        'English Regular Program - Individual Lesson',
        9.99,
        1,
        '2021-08-30 14:36:38',
        '2021-08-30 14:36:38'
    ),
    (
        119,
        93,
        'English Regular Program - Individual Lesson',
        9.99,
        1,
        '2021-08-30 15:27:08',
        '2021-08-30 15:27:08'
    ),
    (
        120,
        94,
        'English Regular Program - Individual Lesson',
        9.99,
        1,
        '2021-08-30 15:32:32',
        '2021-08-30 15:32:32'
    ),
    (
        121,
        95,
        'English Regular Program - Individual Lesson',
        9.99,
        1,
        '2021-08-31 15:02:32',
        '2021-08-31 15:02:32'
    ),
    (
        122,
        96,
        'English Regular Program - Individual Lesson',
        9.99,
        1,
        '2021-08-31 15:03:32',
        '2021-08-31 15:03:32'
    ),
    (
        123,
        97,
        'English Regular Program - Individual Lesson',
        9.99,
        2,
        '2021-08-31 15:55:37',
        '2021-08-31 15:55:37'
    ),
    (
        124,
        98,
        'English Regular Program - Individual Lesson',
        9.99,
        2,
        '2021-08-31 15:56:25',
        '2021-08-31 15:56:25'
    ),
    (
        125,
        99,
        'English Regular Program - Individual Lesson',
        9.99,
        8,
        '2021-09-11 02:03:56',
        '2021-09-11 02:03:56'
    ),
    (
        126,
        100,
        'English Regular Program - Individual Lesson',
        9.99,
        10,
        '2021-09-21 00:32:12',
        '2021-09-21 00:32:12'
    ),
    (
        127,
        101,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-21 00:36:09',
        '2021-09-21 00:36:09'
    ),
    (
        128,
        102,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-21 00:39:45',
        '2021-09-21 00:39:45'
    ),
    (
        129,
        103,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-21 01:08:05',
        '2021-09-21 01:08:05'
    ),
    (
        130,
        104,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-21 01:28:22',
        '2021-09-21 01:28:22'
    ),
    (
        131,
        105,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-21 01:30:39',
        '2021-09-21 01:30:39'
    ),
    (
        132,
        106,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-21 01:31:18',
        '2021-09-21 01:31:18'
    ),
    (
        133,
        107,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-21 01:32:19',
        '2021-09-21 01:32:19'
    ),
    (
        134,
        108,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-21 02:18:35',
        '2021-09-21 02:18:35'
    ),
    (
        135,
        109,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-21 02:20:37',
        '2021-09-21 02:20:37'
    ),
    (
        136,
        110,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-21 15:58:18',
        '2021-09-21 15:58:18'
    ),
    (
        137,
        111,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-21 17:02:56',
        '2021-09-21 17:02:56'
    ),
    (
        138,
        112,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-21 17:08:03',
        '2021-09-21 17:08:03'
    ),
    (
        139,
        113,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-21 17:13:57',
        '2021-09-21 17:13:57'
    ),
    (
        140,
        114,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-22 17:20:16',
        '2021-09-22 17:20:16'
    ),
    (
        141,
        115,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-22 17:21:08',
        '2021-09-22 17:21:08'
    ),
    (
        142,
        116,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-22 17:21:31',
        '2021-09-22 17:21:31'
    ),
    (
        143,
        117,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-22 17:26:40',
        '2021-09-22 17:26:40'
    ),
    (
        144,
        118,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-22 17:27:21',
        '2021-09-22 17:27:21'
    ),
    (
        145,
        119,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-22 17:27:46',
        '2021-09-22 17:27:46'
    ),
    (
        146,
        120,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-22 17:28:03',
        '2021-09-22 17:28:03'
    ),
    (
        147,
        121,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-22 18:00:41',
        '2021-09-22 18:00:41'
    ),
    (
        148,
        122,
        'English Regular Program - Individual Lesson',
        9.99,
        4,
        '2021-09-22 18:01:03',
        '2021-09-22 18:01:03'
    ),
    (
        149,
        123,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:03:08',
        '2022-01-03 15:03:08'
    ),
    (
        150,
        124,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:15:47',
        '2022-01-03 15:15:47'
    ),
    (
        151,
        125,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:17:04',
        '2022-01-03 15:17:04'
    ),
    (
        152,
        126,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:17:15',
        '2022-01-03 15:17:15'
    ),
    (
        153,
        127,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:17:27',
        '2022-01-03 15:17:27'
    ),
    (
        154,
        128,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:18:43',
        '2022-01-03 15:18:43'
    ),
    (
        155,
        129,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:19:18',
        '2022-01-03 15:19:18'
    ),
    (
        156,
        130,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:19:30',
        '2022-01-03 15:19:30'
    ),
    (
        157,
        131,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:24:24',
        '2022-01-03 15:24:24'
    ),
    (
        158,
        132,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:25:10',
        '2022-01-03 15:25:10'
    ),
    (
        159,
        133,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:25:24',
        '2022-01-03 15:25:24'
    ),
    (
        160,
        134,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:25:41',
        '2022-01-03 15:25:41'
    ),
    (
        161,
        135,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:26:17',
        '2022-01-03 15:26:17'
    ),
    (
        162,
        136,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:27:05',
        '2022-01-03 15:27:05'
    ),
    (
        163,
        137,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:27:53',
        '2022-01-03 15:27:53'
    ),
    (
        164,
        138,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:28:09',
        '2022-01-03 15:28:09'
    ),
    (
        165,
        139,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:29:35',
        '2022-01-03 15:29:35'
    ),
    (
        166,
        140,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:30:02',
        '2022-01-03 15:30:02'
    ),
    (
        167,
        141,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:30:23',
        '2022-01-03 15:30:23'
    ),
    (
        168,
        142,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 15:32:54',
        '2022-01-03 15:32:54'
    ),
    (
        169,
        143,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 16:17:30',
        '2022-01-03 16:17:30'
    ),
    (
        170,
        144,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 16:20:48',
        '2022-01-03 16:20:48'
    ),
    (
        171,
        145,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 16:23:48',
        '2022-01-03 16:23:48'
    ),
    (
        172,
        146,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 16:24:47',
        '2022-01-03 16:24:47'
    ),
    (
        173,
        147,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 16:26:26',
        '2022-01-03 16:26:26'
    ),
    (
        174,
        148,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 16:30:05',
        '2022-01-03 16:30:05'
    ),
    (
        175,
        149,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 16:33:40',
        '2022-01-03 16:33:40'
    ),
    (
        176,
        150,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:06:24',
        '2022-01-03 17:06:24'
    ),
    (
        177,
        151,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:06:48',
        '2022-01-03 17:06:48'
    ),
    (
        178,
        152,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:07:25',
        '2022-01-03 17:07:25'
    ),
    (
        179,
        153,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:08:23',
        '2022-01-03 17:08:23'
    ),
    (
        180,
        154,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:09:45',
        '2022-01-03 17:09:45'
    ),
    (
        181,
        155,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:10:31',
        '2022-01-03 17:10:31'
    ),
    (
        182,
        156,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:12:18',
        '2022-01-03 17:12:18'
    ),
    (
        183,
        157,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:13:05',
        '2022-01-03 17:13:05'
    ),
    (
        184,
        158,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:14:49',
        '2022-01-03 17:14:49'
    ),
    (
        185,
        159,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:15:13',
        '2022-01-03 17:15:13'
    ),
    (
        186,
        160,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:19:47',
        '2022-01-03 17:19:47'
    ),
    (
        187,
        161,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:20:56',
        '2022-01-03 17:20:56'
    ),
    (
        188,
        162,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:21:05',
        '2022-01-03 17:21:05'
    ),
    (
        189,
        163,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:24:34',
        '2022-01-03 17:24:34'
    ),
    (
        190,
        164,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:25:14',
        '2022-01-03 17:25:14'
    ),
    (
        191,
        165,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:25:47',
        '2022-01-03 17:25:47'
    ),
    (
        192,
        166,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:26:15',
        '2022-01-03 17:26:15'
    ),
    (
        193,
        167,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:26:29',
        '2022-01-03 17:26:29'
    ),
    (
        194,
        168,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:27:03',
        '2022-01-03 17:27:03'
    ),
    (
        195,
        169,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:29:04',
        '2022-01-03 17:29:04'
    ),
    (
        196,
        170,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:29:14',
        '2022-01-03 17:29:14'
    ),
    (
        197,
        171,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:53:05',
        '2022-01-03 17:53:05'
    ),
    (
        198,
        172,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:54:40',
        '2022-01-03 17:54:40'
    ),
    (
        199,
        173,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:55:00',
        '2022-01-03 17:55:00'
    ),
    (
        200,
        174,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:55:35',
        '2022-01-03 17:55:35'
    ),
    (
        201,
        175,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 17:57:03',
        '2022-01-03 17:57:03'
    ),
    (
        202,
        176,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 19:09:07',
        '2022-01-03 19:09:07'
    ),
    (
        203,
        177,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 19:11:10',
        '2022-01-03 19:11:10'
    ),
    (
        204,
        178,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 19:12:54',
        '2022-01-03 19:12:54'
    ),
    (
        205,
        179,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 19:17:24',
        '2022-01-03 19:17:24'
    ),
    (
        206,
        180,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 19:19:15',
        '2022-01-03 19:19:15'
    ),
    (
        207,
        181,
        'English Regular Program',
        9.99,
        8,
        '2022-01-03 19:19:38',
        '2022-01-03 19:19:38'
    ),
    (
        208,
        182,
        'English Conversational Program',
        14.99,
        7,
        '2022-01-06 15:49:28',
        '2022-01-06 15:49:28'
    ),
    (
        209,
        183,
        'Spanish Regular Program',
        14.99,
        7,
        '2022-01-07 03:50:23',
        '2022-01-07 03:50:23'
    ),
    (
        210,
        184,
        'Spanish Regular Program',
        14.99,
        6,
        '2022-01-07 18:47:24',
        '2022-01-07 18:47:24'
    ),
    (
        211,
        185,
        'Spanish Regular Program',
        14.99,
        6,
        '2022-01-07 18:49:46',
        '2022-01-07 18:49:46'
    ),
    (
        212,
        186,
        'Spanish Regular Program',
        14.99,
        6,
        '2022-01-07 18:50:07',
        '2022-01-07 18:50:07'
    ),
    (
        213,
        187,
        'English Regular Program',
        14.99,
        12,
        '2022-01-30 21:05:21',
        '2022-01-30 21:05:21'
    ),
    (
        214,
        188,
        'English Regular Program',
        14.99,
        6,
        '2022-04-07 17:20:59',
        '2022-04-07 17:20:59'
    ),
    (
        215,
        189,
        'English Regular Program',
        14.99,
        6,
        '2022-04-07 17:22:14',
        '2022-04-07 17:22:14'
    ),
    (
        216,
        190,
        'English Regular Program',
        14.99,
        6,
        '2022-04-07 17:30:17',
        '2022-04-07 17:30:17'
    ),
    (
        217,
        191,
        'English Regular Program',
        14.99,
        6,
        '2022-04-07 17:45:22',
        '2022-04-07 17:45:22'
    ),
    (
        218,
        192,
        'English Regular Program',
        14.99,
        6,
        '2022-04-07 17:45:58',
        '2022-04-07 17:45:58'
    ),
    (
        219,
        193,
        'English Regular Program',
        14.99,
        6,
        '2022-04-07 17:49:03',
        '2022-04-07 17:49:03'
    ),
    (
        220,
        194,
        'English Regular Program',
        14.99,
        6,
        '2022-04-07 17:49:19',
        '2022-04-07 17:49:19'
    ),
    (
        221,
        195,
        'English Regular Program',
        14.99,
        9,
        '2022-04-09 16:45:19',
        '2022-04-09 16:45:19'
    ),
    (
        222,
        196,
        'English Regular Program',
        14.99,
        12,
        '2022-05-07 01:56:02',
        '2022-05-07 01:56:02'
    ),
    (
        223,
        197,
        'English Regular Program',
        14.99,
        12,
        '2022-05-07 01:57:09',
        '2022-05-07 01:57:09'
    ),
    (
        224,
        198,
        'English Regular Program',
        14.99,
        12,
        '2022-05-07 02:03:37',
        '2022-05-07 02:03:37'
    ),
    (
        225,
        199,
        'English Regular Program',
        14.99,
        6,
        '2022-05-07 02:09:25',
        '2022-05-07 02:09:25'
    ),
    (
        226,
        200,
        'English Regular Program',
        14.99,
        6,
        '2022-05-07 02:11:32',
        '2022-05-07 02:11:32'
    ),
    (
        227,
        201,
        'English Regular Program',
        14.99,
        6,
        '2022-05-07 02:16:05',
        '2022-05-07 02:16:05'
    ),
    (
        228,
        202,
        'English Regular Program',
        14.99,
        6,
        '2022-05-07 02:16:26',
        '2022-05-07 02:16:26'
    ),
    (
        229,
        203,
        'English Regular Program',
        14.99,
        6,
        '2022-05-07 02:18:13',
        '2022-05-07 02:18:13'
    ),
    (
        230,
        204,
        'English Regular Program',
        14.99,
        6,
        '2022-05-07 02:21:31',
        '2022-05-07 02:21:31'
    ),
    (
        231,
        205,
        'English Regular Program',
        14.99,
        6,
        '2022-05-07 02:22:36',
        '2022-05-07 02:22:36'
    ),
    (
        232,
        206,
        'English Regular Program',
        14.99,
        6,
        '2022-05-07 02:22:48',
        '2022-05-07 02:22:48'
    ),
    (
        233,
        207,
        'English Regular Program',
        14.99,
        6,
        '2022-05-07 02:23:01',
        '2022-05-07 02:23:01'
    ),
    (
        234,
        208,
        'English Regular Program',
        14.99,
        6,
        '2022-05-07 02:23:12',
        '2022-05-07 02:23:12'
    ),
    (
        235,
        209,
        'English Regular Program',
        14.99,
        5,
        '2022-05-09 22:36:33',
        '2022-05-09 22:36:33'
    ),
    (
        236,
        210,
        'English Regular Program',
        14.99,
        3,
        '2022-06-24 03:26:33',
        '2022-06-24 03:26:33'
    ),
    (
        237,
        211,
        'English Regular Program',
        14.99,
        3,
        '2022-06-24 03:28:10',
        '2022-06-24 03:28:10'
    ),
    (
        238,
        212,
        'English Regular Program',
        14.99,
        1,
        '2022-06-25 16:19:48',
        '2022-06-25 16:19:48'
    ),
    (
        239,
        213,
        'English Regular Program',
        14.99,
        9,
        '2022-07-05 21:09:50',
        '2022-07-05 21:09:50'
    ),
    (
        240,
        214,
        'English Regular Program',
        14.99,
        9,
        '2022-07-08 04:54:41',
        '2022-07-08 04:54:41'
    ),
    (
        241,
        215,
        'English Regular Program',
        14.99,
        12,
        '2022-07-10 13:55:31',
        '2022-07-10 13:55:31'
    ),
    (
        242,
        216,
        'English Regular Program',
        14.99,
        9,
        '2022-07-11 04:04:14',
        '2022-07-11 04:04:14'
    ),
    (
        243,
        217,
        'English Regular Program',
        14.99,
        6,
        '2022-07-14 21:20:42',
        '2022-07-14 21:20:42'
    ),
    (
        244,
        218,
        'English Regular Program',
        14.99,
        8,
        '2022-07-16 07:17:48',
        '2022-07-16 07:17:48'
    ),
    (
        245,
        219,
        'English Regular Program',
        14.99,
        2,
        '2022-07-20 03:31:34',
        '2022-07-20 03:31:34'
    ),
    (
        246,
        220,
        'English Regular Program',
        14.99,
        1,
        '2022-07-21 06:21:40',
        '2022-07-21 06:21:40'
    ),
    (
        247,
        221,
        'English Regular Program',
        14.99,
        2,
        '2022-07-21 22:56:53',
        '2022-07-21 22:56:53'
    ),
    (
        248,
        222,
        'English Regular Program',
        14.99,
        4,
        '2022-07-24 03:25:41',
        '2022-07-24 03:25:41'
    ),
    (
        249,
        223,
        'English Regular Program',
        14.99,
        16,
        '2022-07-28 05:59:38',
        '2022-07-28 05:59:38'
    ),
    (
        250,
        224,
        'English Regular Program',
        14.99,
        16,
        '2022-07-28 06:02:22',
        '2022-07-28 06:02:22'
    ),
    (
        251,
        225,
        'English Regular Program',
        14.99,
        16,
        '2022-07-28 06:03:23',
        '2022-07-28 06:03:23'
    ),
    (
        252,
        226,
        'English Regular Program',
        14.99,
        16,
        '2022-07-28 06:03:44',
        '2022-07-28 06:03:44'
    ),
    (
        253,
        227,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 06:09:06',
        '2022-07-28 06:09:06'
    ),
    (
        254,
        228,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 06:10:00',
        '2022-07-28 06:10:00'
    ),
    (
        255,
        229,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 06:10:23',
        '2022-07-28 06:10:23'
    ),
    (
        256,
        230,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 06:10:57',
        '2022-07-28 06:10:57'
    ),
    (
        257,
        231,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 06:11:10',
        '2022-07-28 06:11:10'
    ),
    (
        258,
        232,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 06:14:30',
        '2022-07-28 06:14:30'
    ),
    (
        259,
        233,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 06:15:00',
        '2022-07-28 06:15:00'
    ),
    (
        260,
        234,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 06:22:31',
        '2022-07-28 06:22:31'
    ),
    (
        261,
        235,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 22:24:26',
        '2022-07-28 22:24:26'
    ),
    (
        262,
        236,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 22:25:21',
        '2022-07-28 22:25:21'
    ),
    (
        263,
        237,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 22:25:43',
        '2022-07-28 22:25:43'
    ),
    (
        264,
        238,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 22:26:22',
        '2022-07-28 22:26:22'
    ),
    (
        265,
        239,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 22:26:44',
        '2022-07-28 22:26:44'
    ),
    (
        266,
        240,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 22:27:32',
        '2022-07-28 22:27:32'
    ),
    (
        267,
        241,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 22:27:46',
        '2022-07-28 22:27:46'
    ),
    (
        268,
        242,
        'English Regular Program',
        14.99,
        8,
        '2022-07-28 22:27:56',
        '2022-07-28 22:27:56'
    ),
    (
        269,
        243,
        'English Regular Program',
        14.99,
        12,
        '2022-07-28 22:32:34',
        '2022-07-28 22:32:34'
    ),
    (
        270,
        244,
        'English Regular Program',
        14.99,
        8,
        '2022-07-29 03:27:06',
        '2022-07-29 03:27:06'
    ),
    (
        271,
        245,
        'English Regular Program',
        14.99,
        9,
        '2022-07-29 03:30:17',
        '2022-07-29 03:30:17'
    ),
    (
        272,
        246,
        'English Regular Program',
        14.99,
        16,
        '2022-07-29 05:09:14',
        '2022-07-29 05:09:14'
    ),
    (
        273,
        247,
        'English Regular Program',
        14.99,
        12,
        '2022-07-29 06:18:59',
        '2022-07-29 06:18:59'
    ),
    (
        274,
        248,
        'English Regular Program',
        14.99,
        16,
        '2022-07-29 06:20:02',
        '2022-07-29 06:20:02'
    ),
    (
        275,
        249,
        'English Regular Program',
        14.99,
        8,
        '2022-07-29 06:29:03',
        '2022-07-29 06:29:03'
    ),
    (
        276,
        250,
        'English Regular Program',
        14.99,
        12,
        '2022-07-29 06:33:44',
        '2022-07-29 06:33:44'
    ),
    (
        277,
        251,
        'English Regular Program',
        14.99,
        12,
        '2022-08-02 19:52:21',
        '2022-08-02 19:52:21'
    ),
    (
        278,
        252,
        'English Regular Program',
        14.99,
        6,
        '2022-08-03 06:01:00',
        '2022-08-03 06:01:00'
    ),
    (
        279,
        253,
        'English Regular Program',
        14.99,
        4,
        '2022-08-08 21:32:45',
        '2022-08-08 21:32:45'
    ),
    (
        280,
        255,
        'English Regular Program',
        14.99,
        3,
        '2022-08-30 00:26:30',
        '2022-08-30 00:26:30'
    ),
    (
        281,
        256,
        'English Regular Program',
        14.99,
        3,
        '2022-08-30 00:27:15',
        '2022-08-30 00:27:15'
    ),
    (
        282,
        257,
        'English Regular Program',
        14.99,
        3,
        '2022-08-30 00:29:35',
        '2022-08-30 00:29:35'
    ),
    (
        283,
        258,
        'English Regular Program',
        14.99,
        3,
        '2022-08-30 01:01:27',
        '2022-08-30 01:01:27'
    ),
    (
        284,
        259,
        'English Regular Program',
        14.99,
        3,
        '2022-08-30 01:01:44',
        '2022-08-30 01:01:44'
    ),
    (
        285,
        260,
        'English Regular Program',
        14.99,
        3,
        '2022-08-30 01:04:20',
        '2022-08-30 01:04:20'
    ),
    (
        286,
        261,
        'English Regular Program',
        14.99,
        3,
        '2022-08-30 01:04:32',
        '2022-08-30 01:04:32'
    ),
    (
        287,
        262,
        'English Regular Program',
        14.99,
        3,
        '2022-08-30 01:29:23',
        '2022-08-30 01:29:23'
    ),
    (
        288,
        263,
        'English Regular Program',
        14.99,
        3,
        '2022-08-30 01:31:02',
        '2022-08-30 01:31:02'
    ),
    (
        289,
        264,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 01:45:45',
        '2022-09-01 01:45:45'
    ),
    (
        290,
        265,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 01:46:54',
        '2022-09-01 01:46:54'
    ),
    (
        291,
        266,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 02:15:10',
        '2022-09-01 02:15:10'
    ),
    (
        292,
        267,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 02:29:15',
        '2022-09-01 02:29:15'
    ),
    (
        293,
        268,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 02:36:55',
        '2022-09-01 02:36:55'
    ),
    (
        294,
        269,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 02:39:38',
        '2022-09-01 02:39:38'
    ),
    (
        295,
        270,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 02:40:29',
        '2022-09-01 02:40:29'
    ),
    (
        296,
        271,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 02:51:35',
        '2022-09-01 02:51:35'
    ),
    (
        297,
        272,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 03:52:07',
        '2022-09-01 03:52:07'
    ),
    (
        298,
        273,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 03:52:43',
        '2022-09-01 03:52:43'
    ),
    (
        299,
        274,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 03:58:49',
        '2022-09-01 03:58:49'
    ),
    (
        300,
        275,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 04:05:32',
        '2022-09-01 04:05:32'
    ),
    (
        301,
        276,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 19:28:35',
        '2022-09-01 19:28:35'
    ),
    (
        302,
        277,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 19:33:05',
        '2022-09-01 19:33:05'
    ),
    (
        303,
        278,
        'English Regular Program',
        14.99,
        12,
        '2022-09-01 19:48:54',
        '2022-09-01 19:48:54'
    ),
    (
        304,
        279,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 19:59:31',
        '2022-09-01 19:59:31'
    ),
    (
        305,
        280,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:00:04',
        '2022-09-01 20:00:04'
    ),
    (
        306,
        281,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:00:20',
        '2022-09-01 20:00:20'
    ),
    (
        307,
        282,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:00:31',
        '2022-09-01 20:00:31'
    ),
    (
        308,
        283,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:00:42',
        '2022-09-01 20:00:42'
    ),
    (
        309,
        284,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:02:16',
        '2022-09-01 20:02:16'
    ),
    (
        310,
        285,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:02:37',
        '2022-09-01 20:02:37'
    ),
    (
        311,
        286,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:08:30',
        '2022-09-01 20:08:30'
    ),
    (
        312,
        287,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:11:39',
        '2022-09-01 20:11:39'
    ),
    (
        313,
        288,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:11:49',
        '2022-09-01 20:11:49'
    ),
    (
        314,
        289,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:12:08',
        '2022-09-01 20:12:08'
    ),
    (
        315,
        290,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:12:19',
        '2022-09-01 20:12:19'
    ),
    (
        316,
        291,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:20:00',
        '2022-09-01 20:20:00'
    ),
    (
        317,
        292,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:22:57',
        '2022-09-01 20:22:57'
    ),
    (
        318,
        293,
        'English Regular Program',
        14.99,
        8,
        '2022-09-01 20:23:26',
        '2022-09-01 20:23:26'
    ),
    (
        319,
        294,
        'English Regular Program',
        14.99,
        8,
        '2022-09-02 21:41:36',
        '2022-09-02 21:41:36'
    ),
    (
        320,
        295,
        'English Regular Program',
        14.99,
        8,
        '2022-09-02 21:42:48',
        '2022-09-02 21:42:48'
    ),
    (
        321,
        296,
        'English Regular Program',
        14.99,
        8,
        '2022-09-02 21:50:10',
        '2022-09-02 21:50:10'
    ),
    (
        322,
        297,
        'English Regular Program',
        14.99,
        4,
        '2022-09-16 04:24:15',
        '2022-09-16 04:24:15'
    ),
    (
        323,
        299,
        'English Regular Program',
        14.99,
        2,
        '2022-11-21 16:49:36',
        '2022-11-21 16:49:36'
    ),
    (
        324,
        300,
        'English Regular Program',
        14.99,
        4,
        '2022-11-22 02:57:56',
        '2022-11-22 02:57:56'
    ),
    (
        325,
        301,
        'English Regular Program',
        14.99,
        2,
        '2022-11-22 03:12:19',
        '2022-11-22 03:12:19'
    ),
    (
        326,
        302,
        'English Regular Program',
        14.99,
        2,
        '2022-11-22 03:49:44',
        '2022-11-22 03:49:44'
    );

/*Data for the table `jobs` */
insert into
    `jobs`(
        `id`,
        `queue`,
        `payload`,
        `attempts`,
        `reserved_at`,
        `available_at`,
        `created_at`
    )
values
    (
        1,
        'default',
        '{\"uuid\":\"799355eb-2553-4a4e-b783-de5d07cfc95a\",\"displayName\":\"App\\\\Notifications\\\\NewMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\NewMessage\\\":13:{s:12:\\\"text_message\\\";s:4:\\\"Test\\\";s:15:\\\"conversation_id\\\";i:13;s:2:\\\"id\\\";s:36:\\\"ebc335f7-563d-41c4-8208-fd2e1635ffb6\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:9:\\\"broadcast\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1668442302,
        1668442302
    ),
    (
        2,
        'default',
        '{\"uuid\":\"75d7121d-ea29-4327-9716-6e3ff75b451c\",\"displayName\":\"App\\\\Notifications\\\\NewMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\NewMessage\\\":13:{s:12:\\\"text_message\\\";s:0:\\\"\\\";s:15:\\\"conversation_id\\\";i:13;s:2:\\\"id\\\";s:36:\\\"d3e861f3-b33a-4869-8026-4e6d9b8c3297\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:9:\\\"broadcast\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1668442463,
        1668442463
    ),
    (
        3,
        'default',
        '{\"uuid\":\"e5f5eea1-8f0c-4600-bae3-b35f4e355df1\",\"displayName\":\"App\\\\Notifications\\\\NewMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\NewMessage\\\":13:{s:12:\\\"text_message\\\";s:7:\\\"message\\\";s:15:\\\"conversation_id\\\";i:13;s:2:\\\"id\\\";s:36:\\\"54c6a2e9-b4ba-4e06-a522-55e42dad7ee4\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:9:\\\"broadcast\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1668646525,
        1668646525
    ),
    (
        4,
        'default',
        '{\"uuid\":\"39ab2ee2-b9aa-4da8-bf6c-83d30d3f33bb\",\"displayName\":\"App\\\\Jobs\\\\CreateSchedule\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateSchedule\",\"command\":\"O:23:\\\"App\\\\Jobs\\\\CreateSchedule\\\":11:{s:11:\\\"\\u0000*\\u0000schedule\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669049379,
        1669049379
    ),
    (
        5,
        'default',
        '{\"uuid\":\"4e71ea42-6f33-4622-a5f1-903021b82ead\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:668;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669049379,
        1669049379
    ),
    (
        6,
        'default',
        '{\"uuid\":\"40c47457-fcc0-470f-8b8e-9ad7e1827a3b\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:669;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669049380,
        1669049380
    ),
    (
        7,
        'default',
        '{\"uuid\":\"25221278-99ba-4378-8552-a3c916790470\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":12:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":12:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:29:\\\"App\\\\Notifications\\\\BookedClass\\\":13:{s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:15:\\\"schedule_string\\\";s:41:\\\"on Sundays at 20:00 and Mondays at 20:00.\\\";s:2:\\\"id\\\";s:36:\\\"717786a8-dfaa-4c0e-b9b7-35b745babcd8\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:4:\\\"data\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669049414,
        1669049414
    ),
    (
        8,
        'default',
        '{\"uuid\":\"6e4c2fcf-3368-489b-a887-5bfd2e4198a1\",\"displayName\":\"App\\\\Jobs\\\\CreateSchedule\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateSchedule\",\"command\":\"O:23:\\\"App\\\\Jobs\\\\CreateSchedule\\\":11:{s:11:\\\"\\u0000*\\u0000schedule\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669085882,
        1669085882
    ),
    (
        9,
        'default',
        '{\"uuid\":\"dc97a716-d477-4ae4-aac4-56cdb15813ab\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:670;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669085883,
        1669085883
    ),
    (
        10,
        'default',
        '{\"uuid\":\"6717226a-b3b5-45cc-b23b-3f7556db154e\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:671;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669085883,
        1669085883
    ),
    (
        11,
        'default',
        '{\"uuid\":\"c57e1907-8ffb-4504-9f95-5914c033c083\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:672;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669085883,
        1669085883
    ),
    (
        12,
        'default',
        '{\"uuid\":\"106bd25c-4492-4aaa-9b62-dacac2c8b3fa\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:673;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669085883,
        1669085883
    ),
    (
        13,
        'default',
        '{\"uuid\":\"970cafed-c761-4bca-84db-a97115695d75\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":12:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":12:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:29:\\\"App\\\\Notifications\\\\BookedClass\\\":13:{s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:15:\\\"schedule_string\\\";s:63:\\\"on Sundays at 18:00, on Mondays at 18:00 and Tuesdays at 18:00.\\\";s:2:\\\"id\\\";s:36:\\\"754ad29f-7581-406c-a182-a688136835a8\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:4:\\\"data\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669085897,
        1669085897
    ),
    (
        14,
        'default',
        '{\"uuid\":\"d1ae3dd4-fec7-4e59-9886-04b1eca0ef52\",\"displayName\":\"App\\\\Jobs\\\\CreateSchedule\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateSchedule\",\"command\":\"O:23:\\\"App\\\\Jobs\\\\CreateSchedule\\\":11:{s:11:\\\"\\u0000*\\u0000schedule\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669086743,
        1669086743
    ),
    (
        15,
        'default',
        '{\"uuid\":\"f65862c2-7495-435a-860f-1b7adda54fe9\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:674;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669086745,
        1669086745
    ),
    (
        16,
        'default',
        '{\"uuid\":\"69b26617-ccae-47c0-8108-2f74c0eec077\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:675;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669086747,
        1669086747
    ),
    (
        17,
        'default',
        '{\"uuid\":\"44eb24f0-f410-4bd1-bbd6-036a55ba429c\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":12:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":12:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:29:\\\"App\\\\Notifications\\\\BookedClass\\\":13:{s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:15:\\\"schedule_string\\\";s:41:\\\"on Sundays at 19:00 and Mondays at 19:00.\\\";s:2:\\\"id\\\";s:36:\\\"b18cbd60-5c4a-4138-9b45-873b34157997\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:4:\\\"data\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669086752,
        1669086752
    ),
    (
        18,
        'default',
        '{\"uuid\":\"f2fe20ee-2ff1-4933-92a5-410936406f77\",\"displayName\":\"App\\\\Jobs\\\\CreateSchedule\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateSchedule\",\"command\":\"O:23:\\\"App\\\\Jobs\\\\CreateSchedule\\\":11:{s:11:\\\"\\u0000*\\u0000schedule\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669088987,
        1669088987
    ),
    (
        19,
        'default',
        '{\"uuid\":\"8ecad3c5-ab2c-4d62-ae5d-5f6a79e6ccf0\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:676;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669088992,
        1669088992
    ),
    (
        20,
        'default',
        '{\"uuid\":\"45376823-56e8-4b72-bd74-2ec846997b89\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:677;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669088994,
        1669088994
    ),
    (
        21,
        'default',
        '{\"uuid\":\"fd7879ab-115f-42b6-ab48-15c5395d8b40\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":12:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":12:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:29:\\\"App\\\\Notifications\\\\BookedClass\\\":13:{s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:15:\\\"schedule_string\\\";s:41:\\\"on Sundays at 18:00 and Mondays at 18:00.\\\";s:2:\\\"id\\\";s:36:\\\"b60724f1-0e83-4287-ae6e-60e2aaa94053\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:4:\\\"data\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669089000,
        1669089000
    ),
    (
        22,
        'default',
        '{\"uuid\":\"7befecc4-5eaf-4fbb-9032-cf6a1c87f7ae\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:678;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669218423,
        1669218423
    ),
    (
        23,
        'default',
        '{\"uuid\":\"281e4d9a-0dbf-4d87-be05-de69cb0610e5\",\"displayName\":\"App\\\\Jobs\\\\CreateClasses\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CreateClasses\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\CreateClasses\\\":13:{s:5:\\\"class\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Classes\\\";s:2:\\\"id\\\";i:679;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"teacher\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',
        0,
        NULL,
        1669218424,
        1669218424
    );

/*Data for the table `meetings` */
insert into
    `meetings`(
        `id`,
        `topic`,
        `host_id`,
        `atendee_id`,
        `start_date`,
        `join_url`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
values
    (
        91,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-05T07:00:00Z',
        'https://us02web.zoom.us/j/81120770588',
        '2022-09-01 19:48:57',
        '2022-09-01 19:48:57',
        NULL
    ),
    (
        92,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-12T07:00:00Z',
        'https://us02web.zoom.us/j/88129875230',
        '2022-09-01 19:48:58',
        '2022-09-01 19:48:58',
        NULL
    ),
    (
        93,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-19T07:00:00Z',
        'https://us02web.zoom.us/j/86032696364',
        '2022-09-01 19:48:59',
        '2022-09-01 19:48:59',
        NULL
    ),
    (
        94,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-26T07:00:00Z',
        'https://us02web.zoom.us/j/82502408435',
        '2022-09-01 19:49:00',
        '2022-09-01 19:49:00',
        NULL
    ),
    (
        95,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-06T07:00:00Z',
        'https://us02web.zoom.us/j/85124688862',
        '2022-09-01 19:49:03',
        '2022-09-01 19:49:03',
        NULL
    ),
    (
        96,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-13T07:00:00Z',
        'https://us02web.zoom.us/j/86873045877',
        '2022-09-01 19:49:10',
        '2022-09-01 19:49:10',
        NULL
    ),
    (
        97,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-20T07:00:00Z',
        'https://us02web.zoom.us/j/87661668148',
        '2022-09-01 19:49:16',
        '2022-09-01 19:49:16',
        NULL
    ),
    (
        98,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-27T07:00:00Z',
        'https://us02web.zoom.us/j/89432592122',
        '2022-09-01 19:49:22',
        '2022-09-01 19:49:22',
        NULL
    ),
    (
        99,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-07T07:00:00Z',
        'https://us02web.zoom.us/j/86234416894',
        '2022-09-01 19:49:29',
        '2022-09-01 19:49:29',
        NULL
    ),
    (
        100,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-14T07:00:00Z',
        'https://us02web.zoom.us/j/86071306320',
        '2022-09-01 19:49:33',
        '2022-09-01 19:49:33',
        NULL
    ),
    (
        101,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-21T07:00:00Z',
        'https://us02web.zoom.us/j/83503162581',
        '2022-09-01 19:49:38',
        '2022-09-01 19:49:38',
        NULL
    ),
    (
        102,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-28T07:00:00Z',
        'https://us02web.zoom.us/j/85012655370',
        '2022-09-01 19:49:39',
        '2022-09-01 19:49:39',
        NULL
    ),
    (
        103,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-04T06:00:00Z',
        'https://us02web.zoom.us/j/85445557795',
        '2022-09-02 21:50:12',
        '2022-09-02 21:50:12',
        NULL
    ),
    (
        104,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-11T06:00:00Z',
        'https://us02web.zoom.us/j/86057021926',
        '2022-09-02 21:50:13',
        '2022-09-02 21:50:13',
        NULL
    ),
    (
        105,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-18T06:00:00Z',
        'https://us02web.zoom.us/j/87380340104',
        '2022-09-02 21:50:14',
        '2022-09-02 21:50:14',
        NULL
    ),
    (
        106,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-25T06:00:00Z',
        'https://us02web.zoom.us/j/84037948034',
        '2022-09-02 21:50:15',
        '2022-09-02 21:50:15',
        NULL
    ),
    (
        107,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-05T06:00:00Z',
        'https://us02web.zoom.us/j/86381262698',
        '2022-09-02 21:50:16',
        '2022-09-02 21:50:16',
        NULL
    ),
    (
        108,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-12T06:00:00Z',
        'https://us02web.zoom.us/j/87047277060',
        '2022-09-02 21:50:17',
        '2022-09-02 21:50:17',
        NULL
    ),
    (
        109,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-19T06:00:00Z',
        'https://us02web.zoom.us/j/87041437689',
        '2022-09-02 21:50:18',
        '2022-09-16 04:24:21',
        NULL
    ),
    (
        110,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-26T06:00:00Z',
        'https://us02web.zoom.us/j/83854568419',
        '2022-09-02 21:50:19',
        '2022-09-16 04:24:22',
        NULL
    ),
    (
        111,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-20T06:00:00Z',
        'https://us02web.zoom.us/j/81796906408',
        '2022-09-16 04:24:23',
        '2022-09-16 04:24:23',
        NULL
    ),
    (
        112,
        'Guest user   - Lesson Room',
        7,
        183,
        '2022-09-27T06:00:00Z',
        'https://us02web.zoom.us/j/89554412113',
        '2022-09-16 04:24:24',
        '2022-09-16 04:24:24',
        NULL
    );

/*Data for the table `messages` */
insert into
    `messages`(
        `id`,
        `conversation_id`,
        `user_id`,
        `message_content`,
        `message_type`,
        `read`,
        `created_at`,
        `updated_at`
    )
values
    (
        1,
        12,
        5,
        'Whiiiiz',
        1,
        '2022-07-26 06:03:20',
        '2022-07-26 06:01:27',
        '2022-07-26 06:03:20'
    ),
    (
        2,
        12,
        5,
        'whiiiiz',
        1,
        '2022-07-26 06:03:20',
        '2022-07-26 06:02:38',
        '2022-07-26 06:03:20'
    ),
    (
        3,
        12,
        9,
        'Esta nene',
        1,
        '2022-07-26 06:05:12',
        '2022-07-26 06:03:26',
        '2022-07-26 06:05:12'
    ),
    (
        4,
        12,
        5,
        'Digalo',
        1,
        '2022-07-26 06:05:44',
        '2022-07-26 06:05:29',
        '2022-07-26 06:05:44'
    ),
    (
        5,
        12,
        5,
        'Epale Manz que tal',
        1,
        '2022-07-26 06:12:55',
        '2022-07-26 06:12:54',
        '2022-07-26 06:12:55'
    ),
    (
        6,
        12,
        9,
        'UUUUFFFFF',
        1,
        '2022-07-26 06:13:15',
        '2022-07-26 06:13:15',
        '2022-07-26 06:13:15'
    ),
    (
        7,
        12,
        5,
        '1',
        1,
        '2022-07-26 06:13:30',
        '2022-07-26 06:13:29',
        '2022-07-26 06:13:30'
    ),
    (
        8,
        12,
        9,
        '2',
        1,
        '2022-07-26 06:13:34',
        '2022-07-26 06:13:33',
        '2022-07-26 06:13:34'
    ),
    (
        9,
        12,
        5,
        '3',
        1,
        '2022-07-26 06:13:38',
        '2022-07-26 06:13:37',
        '2022-07-26 06:13:38'
    ),
    (
        10,
        12,
        9,
        '4',
        1,
        '2022-07-26 06:13:45',
        '2022-07-26 06:13:44',
        '2022-07-26 06:13:45'
    ),
    (
        11,
        12,
        5,
        '5',
        1,
        '2022-07-26 06:13:58',
        '2022-07-26 06:13:57',
        '2022-07-26 06:13:58'
    ),
    (
        12,
        12,
        5,
        '6',
        1,
        '2022-07-26 06:14:52',
        '2022-07-26 06:14:50',
        '2022-07-26 06:14:52'
    ),
    (
        13,
        12,
        5,
        'hOLA',
        1,
        '2022-07-26 06:17:32',
        '2022-07-26 06:17:32',
        '2022-07-26 06:17:32'
    ),
    (
        14,
        12,
        9,
        'Hablame!',
        1,
        '2022-07-26 06:18:35',
        '2022-07-26 06:18:34',
        '2022-07-26 06:18:35'
    ),
    (
        15,
        12,
        5,
        'Hola',
        1,
        '2022-07-26 06:19:26',
        '2022-07-26 06:19:25',
        '2022-07-26 06:19:26'
    ),
    (
        16,
        12,
        9,
        'Doto embi?',
        1,
        '2022-09-07 19:28:33',
        '2022-07-29 04:47:59',
        '2022-09-07 19:28:33'
    ),
    (
        17,
        12,
        9,
        'Enbi',
        1,
        '2022-09-07 19:33:24',
        '2022-09-07 19:30:09',
        '2022-09-07 19:33:24'
    ),
    (
        18,
        13,
        6,
        'Epale',
        1,
        '2022-09-14 06:15:22',
        '2022-09-13 06:39:01',
        '2022-09-14 06:15:22'
    ),
    (
        19,
        13,
        6,
        'Message',
        1,
        '2022-09-14 06:15:22',
        '2022-09-13 16:08:39',
        '2022-09-14 06:15:22'
    ),
    (
        20,
        13,
        6,
        'Message',
        1,
        '2022-09-14 06:15:22',
        '2022-09-13 16:11:06',
        '2022-09-14 06:15:22'
    ),
    (
        21,
        13,
        6,
        'Message',
        1,
        '2022-09-14 06:15:22',
        '2022-09-13 16:11:16',
        '2022-09-14 06:15:22'
    ),
    (
        22,
        13,
        6,
        'Message2',
        1,
        '2022-09-14 06:15:22',
        '2022-09-13 16:11:35',
        '2022-09-14 06:15:22'
    ),
    (
        23,
        17,
        6,
        'Message',
        1,
        '2022-09-13 17:03:34',
        '2022-09-13 17:03:20',
        '2022-09-13 17:03:34'
    ),
    (
        24,
        13,
        7,
        'Test',
        1,
        '2022-09-14 16:37:23',
        '2022-09-14 06:17:08',
        '2022-09-14 16:37:23'
    ),
    (
        25,
        13,
        6,
        'Hey',
        1,
        '2022-09-14 16:47:06',
        '2022-09-14 16:47:01',
        '2022-09-14 16:47:06'
    ),
    (
        26,
        13,
        7,
        'Epale',
        1,
        '2022-09-14 18:01:01',
        '2022-09-14 17:48:36',
        '2022-09-14 18:01:01'
    ),
    (
        27,
        13,
        7,
        'Hey',
        1,
        '2022-09-14 18:01:01',
        '2022-09-14 18:00:39',
        '2022-09-14 18:01:01'
    ),
    (
        28,
        13,
        7,
        'Epale',
        1,
        '2022-09-15 04:22:36',
        '2022-09-14 18:01:12',
        '2022-09-15 04:22:36'
    ),
    (
        29,
        13,
        7,
        '332',
        1,
        '2022-09-15 04:22:36',
        '2022-09-14 18:01:55',
        '2022-09-15 04:22:36'
    ),
    (
        30,
        13,
        7,
        '334',
        1,
        '2022-09-15 04:22:36',
        '2022-09-14 18:05:27',
        '2022-09-15 04:22:36'
    ),
    (
        31,
        13,
        7,
        '339',
        1,
        '2022-09-15 04:22:36',
        '2022-09-14 18:06:20',
        '2022-09-15 04:22:36'
    ),
    (
        32,
        13,
        7,
        '337',
        1,
        '2022-09-15 04:22:36',
        '2022-09-14 18:08:34',
        '2022-09-15 04:22:36'
    ),
    (
        33,
        13,
        7,
        '336',
        1,
        '2022-09-15 04:22:36',
        '2022-09-14 18:08:59',
        '2022-09-15 04:22:36'
    ),
    (
        34,
        13,
        7,
        '3344',
        1,
        '2022-09-15 04:22:36',
        '2022-09-14 18:22:45',
        '2022-09-15 04:22:36'
    ),
    (
        35,
        13,
        7,
        '7457',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 00:39:58',
        '2022-09-15 04:22:36'
    ),
    (
        36,
        13,
        7,
        '3356',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 00:41:22',
        '2022-09-15 04:22:36'
    ),
    (
        37,
        13,
        7,
        '34203',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 00:54:08',
        '2022-09-15 04:22:36'
    ),
    (
        38,
        13,
        7,
        '34203',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 00:55:08',
        '2022-09-15 04:22:36'
    ),
    (
        39,
        13,
        7,
        '34203',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 00:55:33',
        '2022-09-15 04:22:36'
    ),
    (
        40,
        13,
        7,
        '34203',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 00:55:49',
        '2022-09-15 04:22:36'
    ),
    (
        41,
        13,
        7,
        '34203',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 00:56:48',
        '2022-09-15 04:22:36'
    ),
    (
        42,
        13,
        7,
        '34203',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 00:58:44',
        '2022-09-15 04:22:36'
    ),
    (
        43,
        13,
        7,
        '34203',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 00:59:19',
        '2022-09-15 04:22:36'
    ),
    (
        44,
        13,
        7,
        '55652',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:01:01',
        '2022-09-15 04:22:36'
    ),
    (
        45,
        13,
        7,
        '55652',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:02:42',
        '2022-09-15 04:22:36'
    ),
    (
        46,
        13,
        7,
        '55652',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:02:49',
        '2022-09-15 04:22:36'
    ),
    (
        47,
        13,
        7,
        '3354',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:03:34',
        '2022-09-15 04:22:36'
    ),
    (
        48,
        13,
        7,
        '3354',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:03:51',
        '2022-09-15 04:22:36'
    ),
    (
        49,
        13,
        7,
        '33',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:04:07',
        '2022-09-15 04:22:36'
    ),
    (
        50,
        13,
        7,
        '33',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:05:12',
        '2022-09-15 04:22:36'
    ),
    (
        51,
        13,
        7,
        '33',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:06:58',
        '2022-09-15 04:22:36'
    ),
    (
        52,
        13,
        7,
        '33',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:08:26',
        '2022-09-15 04:22:36'
    ),
    (
        53,
        13,
        7,
        '4332',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:08:52',
        '2022-09-15 04:22:36'
    ),
    (
        54,
        13,
        7,
        '4433',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:12:03',
        '2022-09-15 04:22:36'
    ),
    (
        55,
        13,
        7,
        '4421',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:12:51',
        '2022-09-15 04:22:36'
    ),
    (
        56,
        13,
        7,
        '4454',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:13:57',
        '2022-09-15 04:22:36'
    ),
    (
        57,
        13,
        7,
        '3354',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:28:52',
        '2022-09-15 04:22:36'
    ),
    (
        58,
        13,
        7,
        '5541',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:29:53',
        '2022-09-15 04:22:36'
    ),
    (
        59,
        13,
        7,
        '5523',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 01:34:13',
        '2022-09-15 04:22:36'
    ),
    (
        60,
        13,
        7,
        '45557',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 04:14:41',
        '2022-09-15 04:22:36'
    ),
    (
        61,
        13,
        7,
        '123123',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 04:18:00',
        '2022-09-15 04:22:36'
    ),
    (
        62,
        13,
        7,
        '121',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 04:20:26',
        '2022-09-15 04:22:36'
    ),
    (
        63,
        13,
        7,
        'New Message',
        1,
        '2022-09-15 04:22:36',
        '2022-09-15 04:21:35',
        '2022-09-15 04:22:36'
    ),
    (
        64,
        13,
        7,
        'Message 4',
        1,
        '2022-09-15 04:28:53',
        '2022-09-15 04:23:24',
        '2022-09-15 04:28:53'
    ),
    (
        65,
        13,
        7,
        '3344',
        1,
        '2022-09-15 04:28:53',
        '2022-09-15 04:27:13',
        '2022-09-15 04:28:53'
    ),
    (
        66,
        13,
        7,
        'Final message...I hope',
        1,
        '2022-09-15 04:28:53',
        '2022-09-15 04:28:22',
        '2022-09-15 04:28:53'
    ),
    (
        67,
        13,
        7,
        'Final final message...I hope',
        1,
        '2022-09-15 04:33:17',
        '2022-09-15 04:30:02',
        '2022-09-15 04:33:17'
    ),
    (
        68,
        13,
        7,
        'This one',
        1,
        '2022-09-15 04:33:17',
        '2022-09-15 04:30:26',
        '2022-09-15 04:33:17'
    ),
    (
        69,
        13,
        7,
        'Now this?',
        1,
        '2022-09-15 04:33:17',
        '2022-09-15 04:30:52',
        '2022-09-15 04:33:17'
    ),
    (
        70,
        13,
        7,
        'Almost there...',
        1,
        '2022-09-15 04:33:17',
        '2022-09-15 04:32:07',
        '2022-09-15 04:33:17'
    ),
    (
        71,
        13,
        7,
        'Now, almost there',
        1,
        '2022-09-15 04:33:17',
        '2022-09-15 04:32:42',
        '2022-09-15 04:33:17'
    ),
    (
        72,
        13,
        7,
        'This one, I hope is the last one.',
        1,
        '2022-09-15 04:37:40',
        '2022-09-15 04:33:33',
        '2022-09-15 04:37:40'
    ),
    (
        73,
        13,
        7,
        '34521',
        1,
        '2022-09-15 04:37:40',
        '2022-09-15 04:35:34',
        '2022-09-15 04:37:40'
    ),
    (
        74,
        13,
        7,
        'try and try',
        1,
        '2022-09-15 04:37:40',
        '2022-09-15 04:36:22',
        '2022-09-15 04:37:40'
    ),
    (
        75,
        13,
        7,
        'Let\'s see!',
        1,
        '2022-09-15 04:39:57',
        '2022-09-15 04:37:56',
        '2022-09-15 04:39:57'
    ),
    (
        76,
        13,
        7,
        'innerHTML??',
        1,
        '2022-09-15 04:39:57',
        '2022-09-15 04:39:37',
        '2022-09-15 04:39:57'
    ),
    (
        77,
        13,
        7,
        'This is the one!',
        1,
        '2022-09-15 04:43:53',
        '2022-09-15 04:41:20',
        '2022-09-15 04:43:53'
    ),
    (
        78,
        13,
        7,
        'I\'m pretty sure this is the one!',
        1,
        '2022-09-15 04:43:53',
        '2022-09-15 04:43:20',
        '2022-09-15 04:43:53'
    ),
    (
        79,
        13,
        7,
        'Perfect!',
        1,
        '2022-09-15 04:59:22',
        '2022-09-15 04:44:08',
        '2022-09-15 04:59:22'
    ),
    (
        80,
        13,
        7,
        'Testing',
        1,
        '2022-09-15 05:01:24',
        '2022-09-15 05:00:34',
        '2022-09-15 05:01:24'
    ),
    (
        81,
        13,
        7,
        'Testing testin',
        1,
        '2022-09-15 05:06:18',
        '2022-09-15 05:01:39',
        '2022-09-15 05:06:18'
    ),
    (
        82,
        13,
        7,
        'Testing testing',
        1,
        '2022-09-15 05:06:18',
        '2022-09-15 05:01:45',
        '2022-09-15 05:06:18'
    ),
    (
        83,
        13,
        7,
        '1213',
        1,
        '2022-09-15 05:06:18',
        '2022-09-15 05:03:17',
        '2022-09-15 05:06:18'
    ),
    (
        84,
        13,
        7,
        '333',
        1,
        '2022-09-15 05:06:18',
        '2022-09-15 05:05:53',
        '2022-09-15 05:06:18'
    ),
    (
        85,
        13,
        7,
        '23433',
        1,
        '2022-09-15 05:08:20',
        '2022-09-15 05:06:36',
        '2022-09-15 05:08:20'
    ),
    (
        86,
        13,
        7,
        'Testing one more',
        1,
        '2022-09-15 05:10:01',
        '2022-09-15 05:08:48',
        '2022-09-15 05:10:01'
    ),
    (
        87,
        13,
        7,
        'And one more!!',
        1,
        '2022-09-15 05:11:53',
        '2022-09-15 05:10:23',
        '2022-09-15 05:11:53'
    ),
    (
        88,
        13,
        7,
        'Not there yet, but near...I think',
        1,
        '2022-09-15 05:13:15',
        '2022-09-15 05:12:15',
        '2022-09-15 05:13:15'
    ),
    (
        89,
        13,
        7,
        'Mmm, let\'s see now.',
        1,
        '2022-09-15 05:13:58',
        '2022-09-15 05:13:31',
        '2022-09-15 05:13:58'
    ),
    (
        90,
        13,
        7,
        'Haha, of course! I was adding the class to a different element! x..x',
        1,
        '2022-09-15 05:17:19',
        '2022-09-15 05:14:39',
        '2022-09-15 05:17:19'
    ),
    (
        91,
        13,
        7,
        'Now, it\'s working!',
        1,
        '2022-09-15 06:01:37',
        '2022-09-15 05:17:42',
        '2022-09-15 06:01:37'
    ),
    (
        92,
        13,
        7,
        'Another test, to confirm!',
        1,
        '2022-09-15 06:01:37',
        '2022-09-15 06:01:32',
        '2022-09-15 06:01:37'
    ),
    (
        93,
        13,
        7,
        'Extra',
        1,
        '2022-09-15 06:05:32',
        '2022-09-15 06:01:45',
        '2022-09-15 06:05:32'
    ),
    (
        94,
        13,
        7,
        'Checking one last time',
        1,
        '2022-09-15 06:06:01',
        '2022-09-15 06:05:52',
        '2022-09-15 06:06:01'
    ),
    (
        95,
        13,
        7,
        'mmmm',
        1,
        '2022-09-15 06:08:15',
        '2022-09-15 06:06:47',
        '2022-09-15 06:08:15'
    ),
    (
        96,
        13,
        7,
        'I\'m thinking!',
        1,
        '2022-09-15 06:10:37',
        '2022-09-15 06:08:40',
        '2022-09-15 06:10:37'
    ),
    (
        97,
        13,
        7,
        'Let\'s see',
        1,
        '2022-09-15 06:12:40',
        '2022-09-15 06:10:54',
        '2022-09-15 06:12:40'
    ),
    (
        98,
        13,
        7,
        'Same thing happened again, I was working with a different element',
        1,
        '2022-09-15 06:13:58',
        '2022-09-15 06:12:47',
        '2022-09-15 06:13:58'
    ),
    (
        99,
        13,
        7,
        'Last test',
        1,
        '2022-09-15 06:15:18',
        '2022-09-15 06:14:16',
        '2022-09-15 06:15:18'
    ),
    (
        100,
        13,
        7,
        'Ready',
        1,
        '2022-09-15 06:15:18',
        '2022-09-15 06:15:11',
        '2022-09-15 06:15:18'
    ),
    (
        101,
        13,
        7,
        'Hehe',
        1,
        '2022-09-16 02:34:06',
        '2022-09-15 18:23:04',
        '2022-09-16 02:34:06'
    ),
    (
        102,
        13,
        7,
        'Haha',
        1,
        '2022-09-16 02:34:06',
        '2022-09-15 18:23:26',
        '2022-09-16 02:34:06'
    ),
    (
        103,
        13,
        7,
        'hihi',
        1,
        '2022-09-16 02:34:06',
        '2022-09-15 18:24:40',
        '2022-09-16 02:34:06'
    ),
    (
        104,
        13,
        7,
        'Epale',
        1,
        '2022-09-16 02:34:06',
        '2022-09-15 18:25:09',
        '2022-09-16 02:34:06'
    ),
    (
        105,
        13,
        7,
        'Unread_messages',
        1,
        '2022-09-16 02:34:06',
        '2022-09-15 18:27:03',
        '2022-09-16 02:34:06'
    ),
    (
        106,
        13,
        7,
        'Epale',
        1,
        '2022-09-16 02:34:06',
        '2022-09-16 01:53:44',
        '2022-09-16 02:34:06'
    ),
    (
        107,
        13,
        7,
        'Epale2',
        1,
        '2022-09-16 02:34:06',
        '2022-09-16 01:54:47',
        '2022-09-16 02:34:06'
    ),
    (
        108,
        13,
        7,
        '3334',
        1,
        '2022-09-16 03:14:40',
        '2022-09-16 02:42:44',
        '2022-09-16 03:14:40'
    ),
    (
        109,
        13,
        7,
        '3354',
        1,
        '2022-09-16 03:14:40',
        '2022-09-16 02:43:20',
        '2022-09-16 03:14:40'
    ),
    (
        110,
        13,
        7,
        '3355',
        1,
        '2022-09-16 03:14:40',
        '2022-09-16 02:50:04',
        '2022-09-16 03:14:40'
    ),
    (
        111,
        13,
        7,
        '3366',
        1,
        '2022-09-16 03:14:40',
        '2022-09-16 02:50:31',
        '2022-09-16 03:14:40'
    ),
    (
        112,
        13,
        7,
        '3375',
        1,
        '2022-09-16 03:14:40',
        '2022-09-16 02:51:46',
        '2022-09-16 03:14:40'
    ),
    (
        113,
        13,
        7,
        '3378',
        1,
        '2022-09-16 03:14:40',
        '2022-09-16 02:54:06',
        '2022-09-16 03:14:40'
    ),
    (
        114,
        13,
        7,
        '3339',
        1,
        '2022-09-16 03:14:40',
        '2022-09-16 02:55:04',
        '2022-09-16 03:14:40'
    ),
    (
        115,
        13,
        7,
        '3345',
        1,
        '2022-09-16 03:14:40',
        '2022-09-16 02:55:28',
        '2022-09-16 03:14:40'
    ),
    (
        116,
        13,
        7,
        '3325',
        1,
        '2022-09-16 03:14:40',
        '2022-09-16 02:55:48',
        '2022-09-16 03:14:40'
    ),
    (
        117,
        13,
        7,
        '3558',
        1,
        '2022-09-16 03:14:40',
        '2022-09-16 02:56:15',
        '2022-09-16 03:14:40'
    ),
    (
        118,
        13,
        7,
        '3945',
        1,
        '2022-09-16 03:20:01',
        '2022-09-16 03:16:22',
        '2022-09-16 03:20:01'
    ),
    (
        119,
        13,
        7,
        '3922',
        1,
        '2022-09-16 03:20:01',
        '2022-09-16 03:16:33',
        '2022-09-16 03:20:01'
    ),
    (
        120,
        13,
        7,
        '8557',
        1,
        '2022-09-16 03:21:25',
        '2022-09-16 03:20:34',
        '2022-09-16 03:21:25'
    ),
    (
        121,
        13,
        7,
        '4433',
        1,
        '2022-09-16 03:28:32',
        '2022-09-16 03:28:19',
        '2022-09-16 03:28:32'
    ),
    (
        122,
        13,
        7,
        '5541',
        1,
        '2022-09-16 03:34:54',
        '2022-09-16 03:28:36',
        '2022-09-16 03:34:54'
    ),
    (
        123,
        13,
        7,
        '55412',
        1,
        '2022-09-16 03:34:54',
        '2022-09-16 03:29:26',
        '2022-09-16 03:34:54'
    ),
    (
        124,
        13,
        7,
        '4998',
        1,
        '2022-09-16 03:34:54',
        '2022-09-16 03:30:40',
        '2022-09-16 03:34:54'
    ),
    (
        125,
        13,
        7,
        '8847',
        1,
        '2022-09-16 03:34:54',
        '2022-09-16 03:31:01',
        '2022-09-16 03:34:54'
    ),
    (
        126,
        13,
        7,
        '8854',
        1,
        '2022-09-16 03:34:54',
        '2022-09-16 03:32:20',
        '2022-09-16 03:34:54'
    ),
    (
        127,
        13,
        7,
        'Test 5504',
        1,
        '2022-09-16 03:34:54',
        '2022-09-16 03:32:57',
        '2022-09-16 03:34:54'
    ),
    (
        128,
        13,
        7,
        'Test 5505',
        1,
        '2022-09-16 03:34:54',
        '2022-09-16 03:34:37',
        '2022-09-16 03:34:54'
    ),
    (
        129,
        13,
        6,
        'Test',
        1,
        NULL,
        '2022-11-14 16:11:40',
        '2022-11-14 16:11:40'
    ),
    (
        130,
        13,
        6,
        '',
        1,
        NULL,
        '2022-11-14 16:14:23',
        '2022-11-14 16:14:23'
    ),
    (
        131,
        13,
        6,
        'message',
        1,
        NULL,
        '2022-11-17 00:55:23',
        '2022-11-17 00:55:23'
    );

/*Data for the table `metadata` */
insert into
    `metadata`(`id`, `key`, `value`, `created_at`, `updated_at`)
values
    (
        1,
        'current_period',
        '{\"start_date\":\"2022-11-07\",\"end_date\":\"2022-12-04\"}',
        '2022-11-23 15:18:04',
        '2022-11-23 15:18:11'
    ),
    (
        2,
        'payment_per_class',
        '{\"regular\":4.99,\"special\": 6.99}',
        '2022-11-23 15:18:07',
        '2022-11-23 15:18:07'
    ),
    (
        3,
        'sample_image_url',
        'images/image_preview.png',
        '2022-11-24 12:41:01',
        '2022-11-24 12:41:06'
    );

/*Data for the table `model_has_permissions` */
/*Data for the table `model_has_roles` */
insert into
    `model_has_roles`(`role_id`, `model_type`, `model_id`)
values
    (1, 'App\\Models\\User', 183),
    (2, 'App\\Models\\User', 5),
    (2, 'App\\Models\\User', 9),
    (2, 'App\\Models\\User', 185),
    (2, 'App\\Models\\User', 186),
    (2, 'App\\Models\\User', 187),
    (2, 'App\\Models\\User', 189),
    (2, 'App\\Models\\User', 190),
    (2, 'App\\Models\\User', 191),
    (2, 'App\\Models\\User', 192),
    (2, 'App\\Models\\User', 193),
    (2, 'App\\Models\\User', 194),
    (2, 'App\\Models\\User', 195),
    (2, 'App\\Models\\User', 196),
    (2, 'App\\Models\\User', 197),
    (2, 'App\\Models\\User', 198),
    (2, 'App\\Models\\User', 199),
    (2, 'App\\Models\\User', 201),
    (2, 'App\\Models\\User', 202),
    (2, 'App\\Models\\User', 203),
    (2, 'App\\Models\\User', 204),
    (2, 'App\\Models\\User', 205),
    (2, 'App\\Models\\User', 206),
    (2, 'App\\Models\\User', 207),
    (2, 'App\\Models\\User', 208),
    (2, 'App\\Models\\User', 210),
    (2, 'App\\Models\\User', 211),
    (2, 'App\\Models\\User', 212),
    (2, 'App\\Models\\User', 213),
    (2, 'App\\Models\\User', 214),
    (2, 'App\\Models\\User', 215),
    (2, 'App\\Models\\User', 216),
    (2, 'App\\Models\\User', 217),
    (2, 'App\\Models\\User', 218),
    (2, 'App\\Models\\User', 219),
    (2, 'App\\Models\\User', 220),
    (2, 'App\\Models\\User', 221),
    (2, 'App\\Models\\User', 222),
    (2, 'App\\Models\\User', 223),
    (2, 'App\\Models\\User', 224),
    (2, 'App\\Models\\User', 225),
    (2, 'App\\Models\\User', 226),
    (2, 'App\\Models\\User', 227),
    (2, 'App\\Models\\User', 228),
    (2, 'App\\Models\\User', 229),
    (2, 'App\\Models\\User', 230),
    (2, 'App\\Models\\User', 231),
    (2, 'App\\Models\\User', 232),
    (2, 'App\\Models\\User', 233),
    (2, 'App\\Models\\User', 234),
    (2, 'App\\Models\\User', 235),
    (2, 'App\\Models\\User', 236),
    (2, 'App\\Models\\User', 237),
    (2, 'App\\Models\\User', 238),
    (2, 'App\\Models\\User', 239),
    (2, 'App\\Models\\User', 240),
    (2, 'App\\Models\\User', 242),
    (2, 'App\\Models\\User', 243),
    (2, 'App\\Models\\User', 244),
    (2, 'App\\Models\\User', 245),
    (2, 'App\\Models\\User', 246),
    (2, 'App\\Models\\User', 249),
    (2, 'App\\Models\\User', 250),
    (2, 'App\\Models\\User', 251),
    (2, 'App\\Models\\User', 252),
    (2, 'App\\Models\\User', 253),
    (2, 'App\\Models\\User', 254),
    (2, 'App\\Models\\User', 255),
    (2, 'App\\Models\\User', 256),
    (2, 'App\\Models\\User', 257),
    (2, 'App\\Models\\User', 258),
    (2, 'App\\Models\\User', 259),
    (2, 'App\\Models\\User', 260),
    (2, 'App\\Models\\User', 261),
    (2, 'App\\Models\\User', 262),
    (2, 'App\\Models\\User', 263),
    (2, 'App\\Models\\User', 264),
    (2, 'App\\Models\\User', 265),
    (2, 'App\\Models\\User', 266),
    (2, 'App\\Models\\User', 267),
    (2, 'App\\Models\\User', 268),
    (2, 'App\\Models\\User', 269),
    (3, 'App\\Models\\User', 7),
    (3, 'App\\Models\\User', 188),
    (3, 'App\\Models\\User', 200),
    (3, 'App\\Models\\User', 209),
    (3, 'App\\Models\\User', 241),
    (3, 'App\\Models\\User', 247),
    (3, 'App\\Models\\User', 248),
    (3, 'App\\Models\\User', 276),
    (3, 'App\\Models\\User', 277),
    (4, 'App\\Models\\User', 6);

/*Data for the table `modules` */
insert into
    `modules`(
        `id`,
        `name`,
        `description`,
        `image`,
        `status`,
        `course_id`,
        `order`,
        `created_at`,
        `updated_at`
    )
values
    (
        1,
        'Module 1',
        'This is the first level of your journey. \r\n\r\nPlease, feel free to go around revising the material to get started. \r\n\r\nYou will find the material used during your lessons, handouts to practice, audio files, and videos here. \r\n\r\nAll the best in your journey.',
        'public/images/modules/covers/1.png',
        1,
        1,
        1,
        NULL,
        '2022-11-18 23:53:29'
    ),
    (
        2,
        'Module 2',
        'Welcome to the second step in your journey to learn English. \r\n\r\nAs it was mentioned in your module 1, these spaces are for you to find material that you can use to review and reinforce the knowledge you have acquired during your lessons. \r\n\r\nWe hope you can enjoy to the fullest your experience with us and remember that we are working to make your dream come true.',
        'public/images/modules/covers/2.png',
        1,
        1,
        2,
        NULL,
        '2022-11-18 23:53:36'
    ),
    (
        3,
        'Module 3',
        'Welcome to level three in this path you have started with us. \r\n\r\nAs previously mentioned in other classrooms, this space contains materials that will be of help for you to review the content studied during your lesson time. \r\n\r\nTake advantage of all the resources provided and increase the opportunity of using the language you are learning.',
        'public/images/modules/covers/3.png',
        1,
        1,
        2,
        NULL,
        '2022-11-18 23:53:44'
    ),
    (
        4,
        'Module 4',
        'Welcome to level four on this path you have started with us. \r\n\r\nAs previously mentioned in other classrooms, this space contains materials that will be of help for you to review the content studied during your lesson time. \r\n\r\nTake advantage of all the resources provided and increase the opportunity of using the language you are learning.',
        'public/images/modules/covers/4.png',
        1,
        1,
        3,
        NULL,
        '2022-11-18 23:53:51'
    ),
    (
        5,
        'Module 5',
        'Welcome to your level five in this path you have started with us. \r\n\r\nAs previously mentioned in other classrooms, this space contains materials that will be of help for you to review the content studied during your lesson time. \r\n\r\nTake advantage of all the resources provided and increase the opportunity of using the language you are learning.',
        'public/images/modules/covers/5.png',
        1,
        1,
        4,
        NULL,
        '2022-11-18 23:53:58'
    ),
    (
        6,
        'Module 6',
        'Welcome to level six on this path you have started with us. \r\n\r\nAs previously mentioned in other classrooms, this space contains materials that will be of help for you to review the content studied during your lesson time. \r\n\r\nTake advantage of all the resources provided and increase the opportunity of using the language you are learning.',
        'public/images/modules/covers/6.png',
        1,
        1,
        5,
        '2022-11-18 14:50:19',
        '2022-11-18 23:54:09'
    ),
    (
        7,
        'Module 7',
        'Welcome to level seven in this path you have started with us. \r\n\r\nAs previously mentioned in other classrooms, this space contains materials that will be of help for you to review the content studied during your lesson time. \r\n\r\nTake advantage of all the resources provided and increase the opportunity of using the language you are learning.',
        'public/images/modules/covers/7.png',
        1,
        1,
        6,
        '2022-11-18 14:54:50',
        '2022-11-18 23:54:22'
    ),
    (
        8,
        'Module 8',
        'Welcome to level eight in this path you have started with us. \r\n\r\nAs previously mentioned in other classrooms, this space contains materials that will be of help for you to review the content studied during your lesson time. \r\n\r\nTake advantage of all the resources provided and increase the opportunity of using the language you are learning.',
        'public/images/modules/covers/8.png',
        1,
        1,
        7,
        '2022-11-18 14:55:25',
        '2022-11-18 23:55:09'
    ),
    (
        9,
        'Module 9',
        'Welcome to level nine on this path you have started with us. \r\n\r\nAs previously mentioned in other classrooms, this space contains materials that will be of help for you to review the content studied during your lesson time. \r\n\r\nTake advantage of all the resources provided and increase the opportunity of using the language you are learning.',
        'public/images/modules/covers/9.png',
        1,
        1,
        8,
        '2022-11-18 14:55:28',
        '2022-11-18 23:55:01'
    ),
    (
        10,
        'Module 10',
        'Welcome to level ten in this path you have started with us. \r\n\r\nAs previously mentioned in other classrooms, this space contains materials that will be of help for you to review the content studied during your lesson time. \r\n\r\nTake advantage of all the resources provided and increase the opportunity of using the language you are learning.',
        'public/images/modules/covers/10.png',
        1,
        1,
        9,
        '2022-11-18 14:56:50',
        '2022-11-18 23:54:52'
    ),
    (
        11,
        'Module 11',
        'Welcome to level eleven in this path you have started with us. \r\n\r\nAs previously mentioned in other classrooms, this space contains materials that will be of help for you to review the content studied during your lesson time. \r\n\r\nTake advantage of all the resources provided and increase the opportunity of using the language you are learning.',
        'public/images/modules/covers/11.png',
        1,
        1,
        10,
        '2022-11-18 14:57:13',
        '2022-11-18 23:54:43'
    ),
    (
        12,
        'Module 12',
        'Welcome to level twelve in this path you have started with us. \r\n\r\nAs previously mentioned in other classrooms, this space contains materials that will be of help for you to review the content studied during your lesson time. \r\n\r\nTake advantage of all the resources provided and increase the opportunity of using the language you are learning.',
        'public/images/modules/covers/12.png',
        1,
        1,
        11,
        '2022-11-18 14:57:34',
        '2022-11-18 23:54:34'
    );

/*Data for the table `notifications` */
insert into
    `notifications`(
        `id`,
        `type`,
        `notifiable_type`,
        `notifiable_id`,
        `data`,
        `read_at`,
        `created_at`,
        `updated_at`
    )
values
    (
        '01be0f3f-35fb-466e-b3f4-58ac74db999e',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\".\"}',
        '2022-09-17 04:25:21',
        '2022-04-16 19:30:54',
        '2022-09-17 04:25:21'
    ),
    (
        '05777411-be72-4989-b879-4b7e4498b962',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\"on Thursdays at 19:00 and Thursdays at 20:00.\"}',
        NULL,
        '2022-07-20 03:31:54',
        '2022-07-20 03:31:54'
    ),
    (
        '0692691b-406e-4b38-b355-da0855aa44a0',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 18:00 and Mondays at 19:00.\"}',
        NULL,
        '2022-08-03 06:01:07',
        '2022-08-03 06:01:07'
    ),
    (
        '081a7c93-ff6b-403f-a5f1-06dd33831d19',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-08-03 07:34:37',
        '2022-08-03 07:34:37'
    ),
    (
        '08e7d3e6-5762-4d22-9222-d533b6de5a7c',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-08-03 07:35:48',
        '2022-08-03 07:35:48'
    ),
    (
        '0a138b56-8b13-4543-8cdb-78a7eda58ec1',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 7:00, on Tuesdays at 7:00 and Wednesdays at 7:00.\"}',
        NULL,
        '2022-09-01 19:49:03',
        '2022-09-01 19:49:03'
    ),
    (
        '0f35b5de-614d-4cb7-959a-1209531c877c',
        'App\\Notifications\\StudentUnrolmentToTeacher',
        'App\\Models\\User',
        248,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 6:00 and Wednesdays at 6:00\",\"course_name\":\"Regular English Program\"}',
        NULL,
        '2022-04-07 17:25:47',
        '2022-04-07 17:25:47'
    ),
    (
        '10c1e5d4-2ebc-4321-b0c0-1481d972245f',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 6:00, on Tuesdays at 6:00 and Wednesdays at 6:00.\"}',
        NULL,
        '2022-09-01 02:15:26',
        '2022-09-01 02:15:26'
    ),
    (
        '191bd350-b573-4ed9-8dce-471c5aa24332',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Sundays at [[\\\"6\\\":00, on Sundays at [\\\"6\\\":00, on Sundays at [\\\"6\\\":00 and Sundays at [\\\"6\\\":00.\"}',
        NULL,
        '2022-05-07 02:03:48',
        '2022-05-07 02:03:48'
    ),
    (
        '1c49d2de-95e4-40e5-9619-77ce557feffe',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        248,
        '{\"user_id\":5,\"schedule_string\":\"on Tuesdays at 12:00 and Wednesdays at 12:00.\"}',
        NULL,
        '2022-04-07 17:30:23',
        '2022-04-07 17:30:23'
    ),
    (
        '1cf72971-db52-48e1-bc4a-77cdd44247cc',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\"on Tuesdays at 15:00, on Tuesdays at 16:00 and Tuesdays at 17:00.\"}',
        NULL,
        '2022-07-05 21:10:05',
        '2022-07-05 21:10:05'
    ),
    (
        '20124e1b-f378-48f5-afa5-9ab6b2485fb9',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Wednesdays at 11:00, on Wednesdays at 12:00 and Wednesdays at 13:00.\"}',
        NULL,
        '2022-08-02 19:52:35',
        '2022-08-02 19:52:35'
    ),
    (
        '2529ba9e-0390-4874-bb88-08257805de66',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-07-23 03:25:15',
        '2022-07-23 03:25:15'
    ),
    (
        '279a767b-8518-4cbb-9a10-87ed2e5676a0',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 7:00, on Tuesdays at 7:00 and Wednesdays at 7:00.\"}',
        NULL,
        '2022-09-01 02:40:43',
        '2022-09-01 02:40:43'
    ),
    (
        '2809bff7-5dc5-4371-ab9c-41f941b8e75a',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\"on Thursdays at 6:00 and Thursdays at 7:00.\"}',
        NULL,
        '2022-07-21 22:57:08',
        '2022-07-21 22:57:08'
    ),
    (
        '2f824a5a-16c8-4a9c-9e65-f3a493dc1a4f',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\"on Tuesdays at 18:00, on Mondays at 21:00 and Wednesdays at 21:00.\"}',
        NULL,
        '2022-07-11 04:04:24',
        '2022-07-11 04:04:24'
    ),
    (
        '324e265c-9fc5-41af-857f-070b0e459a0d',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Thursdays at 11:00 and Thursdays at 12:00.\"}',
        '2022-11-14 16:09:00',
        '2022-08-08 21:33:03',
        '2022-11-14 16:09:00'
    ),
    (
        '3870d003-71bd-4582-bcc4-69f906210fed',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 10:00, on Wednesdays at 10:00 and Fridays at 10:00.\"}',
        NULL,
        '2022-04-09 16:46:00',
        '2022-04-09 16:46:00'
    ),
    (
        '392cd967-e49b-4f05-9ed1-8ddd32b5c6c3',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\"on Sundays at 6:00, on Sundays at 7:00 and Sundays at 8:00.\"}',
        NULL,
        '2022-07-14 21:21:04',
        '2022-07-14 21:21:04'
    ),
    (
        '3c9d8f39-aa09-4125-a4d8-f3dc9f130339',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-07-23 03:38:53',
        '2022-07-23 03:38:53'
    ),
    (
        '3ea4d567-1e33-4769-8bea-9d064ccb4b3a',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Sundays at 11:00, on Sundays at 12:00 and Sundays at 13:00.\"}',
        NULL,
        '2022-07-29 06:19:05',
        '2022-07-29 06:19:05'
    ),
    (
        '4017a99e-3bc7-47f9-9188-0cf039e4f260',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Tuesdays at 12:00 and Tuesdays at 13:00.\"}',
        NULL,
        '2022-07-28 22:28:11',
        '2022-07-28 22:28:11'
    ),
    (
        '41895788-9bb2-488d-a0fe-4df41a7760dc',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Wednesdays at 6:00 and Wednesdays at 7:00.\"}',
        NULL,
        '2022-07-29 06:29:10',
        '2022-07-29 06:29:10'
    ),
    (
        '4b4f3f07-de9c-46f3-8104-cc7229fe49de',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\"on Tuesdays at 15:00, on Tuesdays at 16:00 and Tuesdays at 17:00.\"}',
        NULL,
        '2022-07-08 04:54:56',
        '2022-07-08 04:54:56'
    ),
    (
        '4c1d0ed7-c222-4c65-bb80-17efd2bd53d9',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        241,
        '{\"user_id\":5,\"schedule_string\":\"on Tuesdays at 6:00 and Wednesdays at 6:00.\"}',
        NULL,
        '2022-04-07 17:49:30',
        '2022-04-07 17:49:30'
    ),
    (
        '4c9942aa-519b-4078-9a2d-7e45a2bbe097',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\"on Wednesdays at 11:00, on Wednesdays at 12:00 and Wednesdays at 13:00.\"}',
        '2022-11-14 16:08:36',
        '2022-09-23 04:28:35',
        '2022-11-14 16:08:36'
    ),
    (
        '4db68ffe-16fa-4f78-b9f9-ec41efbeaa7c',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Sundays at 12:00, on Mondays at 12:00 and Tuesdays at 12:00.\"}',
        NULL,
        '2022-08-30 01:31:38',
        '2022-08-30 01:31:38'
    ),
    (
        '50b7dae8-f3ea-4030-9600-1439ab27e5e5',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 18:00 and Mondays at 19:00.\"}',
        NULL,
        '2022-09-17 04:24:00',
        '2022-09-17 04:24:00'
    ),
    (
        '51ea6a84-2f84-44f5-b3c0-6e458f059a3e',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        241,
        '{\"user_id\":5,\"schedule_string\":\"on Tuesdays at 6:00 and Wednesdays at 6:00.\"}',
        NULL,
        '2022-04-07 17:49:14',
        '2022-04-07 17:49:14'
    ),
    (
        '5805b296-1678-4bdb-b8c1-72ad240f5f67',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":null}',
        NULL,
        '2022-06-24 03:28:38',
        '2022-06-24 03:28:38'
    ),
    (
        '5a17f68b-5a7a-40a0-b120-f70f338348e5',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-08-04 06:53:54',
        '2022-08-04 06:53:54'
    ),
    (
        '5a72204d-64b2-452b-9e62-4c19c8e1eb26',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 7:00, on Tuesdays at 7:00 and Wednesdays at 7:00.\"}',
        NULL,
        '2022-09-01 02:37:11',
        '2022-09-01 02:37:11'
    ),
    (
        '5d26fe20-a9b8-4b56-88f2-cbd7a7fbe649',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Sundays at 19:00, on Sundays at 20:00 and Sundays at 21:00.\"}',
        NULL,
        '2022-07-29 03:30:23',
        '2022-07-29 03:30:23'
    ),
    (
        '5e035291-8b37-4e94-9d1f-3a988c335b97',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\"on Mondays at 6:00, on Tuesdays at 6:00, on Wednesdays at 6:00 and Thursdays at 6:00.\"}',
        NULL,
        '2022-07-16 07:18:03',
        '2022-07-16 07:18:03'
    ),
    (
        '621470d1-47eb-4ce4-bd61-d7b3ae8010b9',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 6:00, on Tuesdays at 6:00 and Wednesdays at 6:00.\"}',
        NULL,
        '2022-09-01 04:05:39',
        '2022-09-01 04:05:39'
    ),
    (
        '655354e8-6076-4c05-97de-cb03babc36bc',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 6:00, on Tuesdays at 6:00 and Wednesdays at 6:00.\"}',
        NULL,
        '2022-09-01 03:53:16',
        '2022-09-01 03:53:16'
    ),
    (
        '65a69b11-8e18-4d4f-a2f0-0238ab243850',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 6:00 and Tuesdays at 6:00.\"}',
        '2022-09-17 04:04:24',
        '2022-09-16 04:24:50',
        '2022-09-17 04:04:24'
    ),
    (
        '65b8a85b-2d2e-4ccc-92b7-830b4068268b',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-07-23 03:46:58',
        '2022-07-23 03:46:58'
    ),
    (
        '6997e2b7-2651-42a8-9799-87761da46b05',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-07-11 21:04:49',
        '2022-07-11 21:04:49'
    ),
    (
        '6d195032-3e32-458e-b277-5e7f9692022e',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 7:00, on Tuesdays at 7:00 and Wednesdays at 7:00.\"}',
        NULL,
        '2022-09-01 03:59:31',
        '2022-09-01 03:59:31'
    ),
    (
        '6d7fbe69-9d0f-4478-854b-f80b57992e33',
        'App\\Notifications\\StudentUnrolmentToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Tuesdays at 6:00 and Wednesdays at 6:00\",\"course_name\":\"Regular English Program\"}',
        '2022-04-13 05:09:21',
        '2022-04-07 17:51:28',
        '2022-04-07 17:51:28'
    ),
    (
        '717786a8-dfaa-4c0e-b9b7-35b745babcd8',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Sundays at 20:00 and Mondays at 20:00.\"}',
        NULL,
        '2022-11-21 16:50:13',
        '2022-11-21 16:50:13'
    ),
    (
        '735be658-f9da-4431-96c4-df327effbf63',
        'App\\Notifications\\StudentUnrolmentToTeacher',
        'App\\Models\\User',
        248,
        '{\"user_id\":5,\"schedule_string\":\"on Tuesdays at 12:00 and Wednesdays at 12:00\",\"course_name\":\"Regular English Program\"}',
        NULL,
        '2022-04-07 17:34:21',
        '2022-04-07 17:34:21'
    ),
    (
        '754ad29f-7581-406c-a182-a688136835a8',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Sundays at 18:00, on Mondays at 18:00 and Tuesdays at 18:00.\"}',
        NULL,
        '2022-11-22 02:58:17',
        '2022-11-22 02:58:17'
    ),
    (
        '765d75b2-fc88-4514-be31-51d46a2e0626',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Sundays at [[\\\"6\\\":00 and Sundays at [\\\"6\\\":00.\"}',
        NULL,
        '2022-05-07 02:11:40',
        '2022-05-07 02:11:40'
    ),
    (
        '769c668f-7234-4c9f-9bef-10870b6c87bf',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Wednesdays at 13:00, on Wednesdays at 14:00 and Wednesdays at 15:00.\"}',
        NULL,
        '2022-07-28 22:32:45',
        '2022-07-28 22:32:45'
    ),
    (
        '7c89d969-e739-44fb-b984-c5d727255d5c',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-08-09 06:03:23',
        '2022-08-09 06:03:23'
    ),
    (
        '7d0c1fed-f0be-4f9b-a113-a97f4a382666',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Tuesdays at 13:00, on Tuesdays at 14:00 and Tuesdays at 15:00.\"}',
        NULL,
        '2022-07-29 06:33:50',
        '2022-07-29 06:33:50'
    ),
    (
        '81820dcf-4913-487a-858a-36a43396482f',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 6:00, on Tuesdays at 6:00, on Wednesdays at 6:00 and Thursdays at 6:00.\"}',
        NULL,
        '2022-07-29 05:09:20',
        '2022-07-29 05:09:20'
    ),
    (
        '82e4d647-a7ee-4f2c-b980-7afe9983b79c',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-07-10 16:02:35',
        '2022-07-10 16:02:35'
    ),
    (
        '84735a69-7128-4968-8ca7-578c2cda495e',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-07-23 03:40:42',
        '2022-07-23 03:40:42'
    ),
    (
        '8612e6e8-42c1-492b-bbdd-e17e1c4fe6d3',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-07-10 16:03:51',
        '2022-07-10 16:03:51'
    ),
    (
        '8ddbc257-6fab-4030-916c-f4cf388e8f9d',
        'App\\Notifications\\StudentUnrolment',
        'App\\Models\\User',
        5,
        '{\"user_id\":5,\"course_name\":\"Regular English Program\"}',
        '2022-04-07 21:18:28',
        '2022-04-07 17:51:33',
        '2022-04-07 17:51:33'
    ),
    (
        '8f559890-6474-4ed5-86a7-91f03e6dc103',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Wednesdays at 20:00 and Wednesdays at 21:00.\"}',
        NULL,
        '2022-07-29 03:27:29',
        '2022-07-29 03:27:29'
    ),
    (
        '91db10d9-810a-4ffa-bf71-537600ac4483',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        '2022-07-26 07:21:40',
        '2022-07-23 03:48:35',
        '2022-07-26 07:21:40'
    ),
    (
        '9414312d-2629-4341-af97-ef73c3acc98b',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Tuesdays at 19:00 and Tuesdays at 20:00.\"}',
        NULL,
        '2022-06-25 16:19:56',
        '2022-06-25 16:19:56'
    ),
    (
        '9e70c9c0-7a60-4a3e-ad33-92994b7455fe',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        248,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 6:00 and Wednesdays at 6:00.\"}',
        NULL,
        '2022-04-07 17:22:28',
        '2022-04-07 17:22:28'
    ),
    (
        '9e939e19-357b-47c6-90cc-740afe849f1f',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 6:00 and Tuesdays at 6:00.\"}',
        NULL,
        '2022-05-09 22:37:07',
        '2022-05-09 22:37:07'
    ),
    (
        '9f8aa4e5-903a-4138-93c0-f74869810adf',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        241,
        '{\"user_id\":5,\"schedule_string\":\"on Tuesdays at 6:00 and Wednesdays at 6:00.\"}',
        NULL,
        '2022-04-07 17:46:04',
        '2022-04-07 17:46:04'
    ),
    (
        'a36b52c3-d3d2-4c7d-8d57-7e1de01645de',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 6:00, on Tuesdays at 6:00 and Wednesdays at 6:00.\"}',
        NULL,
        '2022-09-01 02:51:52',
        '2022-09-01 02:51:52'
    ),
    (
        'a6000b59-b2c2-4420-b85d-d7ec9ee31b44',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":null}',
        NULL,
        '2022-07-29 06:20:09',
        '2022-07-29 06:20:09'
    ),
    (
        'a9c624f5-bd39-4ef5-96a6-770fc9bc0b64',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 18:00 and Mondays at 19:00.\"}',
        NULL,
        '2022-09-17 04:17:56',
        '2022-09-17 04:17:56'
    ),
    (
        'ad48a443-52f8-4e75-9779-34c4fb28b20e',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Sundays at 6:00 and Mondays at 6:00.\"}',
        '2022-09-17 04:04:29',
        '2022-09-02 21:50:28',
        '2022-09-17 04:04:29'
    ),
    (
        'af483bd9-b5ea-49ee-b775-50805a3cb70e',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-08-03 07:30:58',
        '2022-08-03 07:30:58'
    ),
    (
        'b042c812-21e9-42d3-926f-76773429c442',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\"on Thursdays at 19:00 and Thursdays at 20:00.\"}',
        NULL,
        '2022-07-21 06:21:51',
        '2022-07-21 06:21:51'
    ),
    (
        'b18cbd60-5c4a-4138-9b45-873b34157997',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Sundays at 19:00 and Mondays at 19:00.\"}',
        NULL,
        '2022-11-22 03:12:32',
        '2022-11-22 03:12:32'
    ),
    (
        'b4bc4cd0-21ab-4fbc-81a4-6c32a4c99bd0',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        241,
        '{\"user_id\":5,\"schedule_string\":\"on Tuesdays at 6:00 and Wednesdays at 6:00.\"}',
        NULL,
        '2022-04-07 17:45:29',
        '2022-04-07 17:45:29'
    ),
    (
        'b60724f1-0e83-4287-ae6e-60e2aaa94053',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Sundays at 18:00 and Mondays at 18:00.\"}',
        NULL,
        '2022-11-22 03:50:00',
        '2022-11-22 03:50:00'
    ),
    (
        'c4f99df9-360d-4d12-98fd-73cb5482b3c0',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-07-11 04:06:29',
        '2022-07-11 04:06:29'
    ),
    (
        'cb775fa1-8df0-4a20-b5d9-bb7dc4c8d7e5',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-08-04 23:03:49',
        '2022-08-04 23:03:49'
    ),
    (
        'ccaf03f3-0ce2-40cf-822c-3f5fac1be3f7',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 6:00, on Tuesdays at 6:00 and Wednesdays at 6:00.\"}',
        NULL,
        '2022-09-01 02:29:30',
        '2022-09-01 02:29:30'
    ),
    (
        'cdaafce4-2b3f-4fe3-8293-7d98a660eb50',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\"on Mondays at 19:00, on Wednesdays at 19:00, on Mondays at 20:00 and Wednesdays at 20:00.\"}',
        NULL,
        '2022-07-10 13:55:46',
        '2022-07-10 13:55:46'
    ),
    (
        'd19b506a-618f-41a2-a5fb-37619e41e0e8',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 18:00 and Mondays at 19:00.\"}',
        NULL,
        '2022-09-17 04:21:22',
        '2022-09-17 04:21:22'
    ),
    (
        'd384a259-21e7-49ed-89fb-cc74beabcd35',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 18:00 and Mondays at 19:00.\"}',
        NULL,
        '2022-09-17 04:11:52',
        '2022-09-17 04:11:52'
    ),
    (
        'd61cee98-58a5-4397-bdd2-d25c8196a8d1',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\"on Thursdays at 6:00, on Thursdays at 7:00, on Thursdays at 8:00 and Thursdays at 9:00.\"}',
        '2022-07-26 07:21:21',
        '2022-07-24 03:25:51',
        '2022-07-26 07:21:21'
    ),
    (
        'd75660f0-d26a-439d-afc4-c58dda4af945',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 18:00 and Mondays at 19:00.\"}',
        '2022-11-14 16:08:43',
        '2022-09-17 04:24:48',
        '2022-11-14 16:08:43'
    ),
    (
        'e802f550-ec19-4d1a-946a-ecf54a2a48bd',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 18:00 and Mondays at 19:00.\"}',
        NULL,
        '2022-09-17 04:22:49',
        '2022-09-17 04:22:49'
    ),
    (
        'e9804305-1a9a-423f-9788-5f7ffe0051ed',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Sundays at [[\\\"6\\\":00, on Sundays at [\\\"6\\\":00, on Sundays at [\\\"6\\\":00 and Sundays at [\\\"6\\\":00.\"}',
        NULL,
        '2022-05-07 01:57:38',
        '2022-05-07 01:57:38'
    ),
    (
        'eb4e790b-1e17-4bef-a90d-47c899d0f012',
        'App\\Notifications\\BookedClass',
        'App\\Models\\User',
        7,
        '{\"user_id\":5,\"schedule_string\":\"on Mondays at 6:00 and Wednesdays at 6:00.\"}',
        NULL,
        '2022-05-07 02:23:23',
        '2022-05-07 02:23:23'
    ),
    (
        'ebd249e2-ede8-4485-8ad1-c8ce6beaf719',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-08-03 07:34:57',
        '2022-08-03 07:34:57'
    ),
    (
        'efa98748-330b-4d9a-91e1-746d5d807b4b',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-07-10 16:01:18',
        '2022-07-10 16:01:18'
    ),
    (
        'f095a713-d140-47cf-baec-950840edce07',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-08-03 07:36:10',
        '2022-08-03 07:36:10'
    ),
    (
        'fae016b1-b6fb-4b48-bd1b-3b8185208baa',
        'App\\Notifications\\ClassRescheduledToTeacher',
        'App\\Models\\User',
        7,
        '{\"user_id\":9,\"schedule_string\":\".\"}',
        NULL,
        '2022-07-11 21:50:50',
        '2022-07-11 21:50:50'
    );

/*Data for the table `password_resets` */
/*Data for the table `permissions` */
/*Data for the table `personal_access_tokens` */
/*Data for the table `plans` */
insert into
    `plans`(`id`, `plan_name`, `n_classes`, `slug`)
values
    (1, 'Simple Plan', 8, 'simple-plan'),
    (2, 'Regular Plan', 12, 'regular-plan'),
    (3, 'Intensive Plan', 16, 'intensive-plan'),
    (4, 'Single Payment', 1, 'single-payment');

/*Data for the table `plans_products` */
insert into
    `plans_products`(`plan_id`, `product_id`)
values
    (1, 1),
    (2, 1),
    (3, 1),
    (1, 2),
    (2, 2),
    (3, 2),
    (1, 3),
    (2, 3),
    (3, 3),
    (1, 4),
    (2, 4),
    (3, 4),
    (4, 5),
    (4, 6);

/*Data for the table `post_like` */
insert into
    `post_like`(`user_id`, `post_id`)
values
    (6, 6),
    (6, 26);

/*Data for the table `post_user` */
/*Data for the table `posts` */
insert into
    `posts`(
        `id`,
        `author_id`,
        `content`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
values
    (
        1,
        5,
        '{\"text\":\"Este es un comentario\",\"photo_path\": \"profile-photos/HG53Av5vJRmTMMkFAQVWNL63Kh29UI98sQPcRTEF.png\"}',
        '2022-04-06 10:55:08',
        '2022-04-06 10:55:08',
        NULL
    ),
    (
        2,
        6,
        '{\"text\":\"Esta es la foto de la tribuna\",\"photo_path\":\"public\\/photos\\/users\\/$2y$10$8uGDJ1tbJ7JTRBjhYjrzme3KjFJs.Ymh\\/65CJpj13fX\\/NBJDkYuhi\\/1654793916.jpeg\"}',
        '2022-06-09 17:58:36',
        '2022-09-23 19:13:06',
        '2022-09-23 19:13:06'
    ),
    (
        3,
        9,
        '{\"text\":\"Invitacion\",\"photo_path\":\"public\\/photos\\/users\\/$2y$10$z05S\\/zqXlTy2nruou5MGRuuxqimxJEsDcVYR8u6CFFZogaQCyN\\/Ja\\/1656038937.png\"}',
        '2022-06-24 03:48:57',
        '2022-09-21 20:35:16',
        NULL
    ),
    (
        4,
        6,
        '{\"text\":null,\"photo_path\":null}',
        '2022-09-22 17:14:00',
        '2022-09-22 17:14:08',
        '2022-09-22 17:14:08'
    ),
    (
        5,
        6,
        '{\"text\":\"asdasd\",\"photo_path\":null}',
        '2022-09-22 17:18:44',
        '2022-09-22 17:18:49',
        '2022-09-22 17:18:49'
    ),
    (
        6,
        6,
        '{\"text\":\"There\'s nothing in my mind!\",\"photo_path\":null}',
        '2022-09-23 04:09:36',
        '2022-09-23 04:12:49',
        '2022-09-23 04:12:49'
    ),
    (
        7,
        6,
        '{\"text\":\"Comment\",\"photo_path\":null}',
        '2022-09-23 04:16:29',
        '2022-09-23 04:16:35',
        '2022-09-23 04:16:35'
    ),
    (
        8,
        6,
        '{\"text\":\"On my mind!\",\"photo_path\":null}',
        '2022-09-23 05:36:42',
        '2022-09-23 17:32:11',
        '2022-09-23 17:32:11'
    ),
    (
        9,
        6,
        '{\"text\":\"On your mind!\",\"photo_path\":null}',
        '2022-09-23 16:21:20',
        '2022-09-23 17:30:19',
        '2022-09-23 17:30:19'
    ),
    (
        10,
        6,
        '{\"text\":\"mY mInD\",\"photo_path\":null}',
        '2022-09-23 16:42:40',
        '2022-09-23 16:44:18',
        '2022-09-23 16:44:18'
    ),
    (
        11,
        6,
        '{\"text\":\"What do you think about this logo concept?\",\"photo_path\":\"public\\/photos\\/users\\/$2y$10$8rF0wIY7xRrsKIo1lM.kIuDnU41d6Xx\\/vkgPUFq3M1r\\/WC9r\\/nUse\\/1663958872.png\"}',
        '2022-09-23 18:47:52',
        '2022-09-23 18:48:26',
        '2022-09-23 18:48:26'
    ),
    (
        12,
        6,
        '{\"text\":\"What do you think about this?\",\"photo_path\":\"public\\/photos\\/users\\/$2y$10$ychXJY9RCiHED5LzRovWVuepQfsv5F2sjFEUfia.RK68NJHS4cr9e\\/1663958946.png\"}',
        '2022-09-23 18:49:06',
        '2022-09-23 18:49:15',
        '2022-09-23 18:49:15'
    ),
    (
        13,
        6,
        '{\"text\":\"What do you think about this?\",\"photo_path\":\"public\\/photos\\/users\\/$2y$10$OZ9goO.o8y9HQ9Y0EAMKHuKt0xvdN7803B6fhIQXq0Vv0poFC\\/Tui\\/1663959010.png\"}',
        '2022-09-23 18:50:10',
        '2022-09-23 18:54:12',
        '2022-09-23 18:54:12'
    ),
    (
        14,
        6,
        '{\"text\":\"What do you think about this?\",\"photo_path\":\"public\\/photos\\/users\\/$2y$10$efAe3kY\\/zAgBm0gcQXGfDuaRQI6Dc64UhVYmzTp5eHnNE7xNufKZq\\/1663959026.jpg\"}',
        '2022-09-23 18:50:26',
        '2022-09-23 18:54:11',
        '2022-09-23 18:54:11'
    ),
    (
        15,
        6,
        '{\"text\":\"What\'s on your mind?\",\"photo_path\":\"public\\/photos\\/users\\/$2y$10$W5CoUDLAUSfk5W2GagBIa.Hwb3CGLtqIzTnnDwOrSnLrYiRIikfdy\\/1663959128.jpg\"}',
        '2022-09-23 18:52:08',
        '2022-09-23 18:54:09',
        '2022-09-23 18:54:09'
    ),
    (
        16,
        6,
        '{\"text\":\"What\'s on your mind?\",\"photo_path\":\"public\\/photos\\/users\\/$2y$10$u9h6rcWWL30N9MBkww870u63GkRyWB.FAgiTR7qm58zsyTH.RQcQi\\/1663959144.jpg\"}',
        '2022-09-23 18:52:24',
        '2022-09-23 18:54:06',
        '2022-09-23 18:54:06'
    ),
    (
        17,
        6,
        '{\"text\":\"What\'s on your mind?\",\"photo_path\":\"public\\/photos\\/users\\/$2y$10$E7JA4A9UWBQ6qKEuknPoCuMBiQXiI7vWOElxGORKHd9Mce1xDoqWK\\/1663959230.jpg\"}',
        '2022-09-23 18:53:50',
        '2022-09-23 18:53:59',
        '2022-09-23 18:53:59'
    ),
    (
        18,
        6,
        '{\"text\":\"Redirect back?\",\"photo_path\":\"public\\/photos\\/users\\/$2y$10$BKfDagVDpRy59FZ59bzIKu5NP1L.96nlAb26nffxeSSwrRJZq4Lri\\/1663959269.png\"}',
        '2022-09-23 18:54:29',
        '2022-09-23 18:54:59',
        '2022-09-23 18:54:59'
    ),
    (
        19,
        6,
        '{\"text\":\"Well, let\'s try!\",\"photo_path\":\"public\\/photos\\/users\\/$2y$10$4itDlv16k2HGbOxY1Xu7WOoaZlxLzLe\\/WL9Gq8tg6\\/2U1bdMabDH2\\/1663959292.jpg\"}',
        '2022-09-23 18:54:52',
        '2022-09-23 18:54:57',
        '2022-09-23 18:54:57'
    ),
    (
        20,
        6,
        '{\"text\":\"This is the new logo!\",\"photo_path\":\"public\\/photos\\/users\\/$2y$10$cljuViyrvyE2OhhS5dCf8ulL4uc83ASIRVnqo58U5yN7rJzWYFgTS\\/1664049403.png\"}',
        '2022-09-24 19:56:43',
        '2022-09-24 20:05:33',
        '2022-09-24 20:05:33'
    ),
    (
        21,
        6,
        '{\"text\":null,\"photo_path\":\"public\\/photos\\/users\\/$2y$10$nAIkJaj8ftSTFM38mZBKw.Rrw5KXlpgYfp5zAWLr5FUlp1DUdLmoa\\/1664050429.jpg\"}',
        '2022-09-24 20:13:49',
        '2022-09-24 20:14:01',
        '2022-09-24 20:14:01'
    ),
    (
        22,
        6,
        '{\"text\":\"My mind?\",\"photo_path\":null}',
        '2022-11-14 05:56:35',
        '2022-11-14 05:56:44',
        '2022-11-14 05:56:44'
    ),
    (
        23,
        6,
        '{\"text\":\"My mind?\",\"photo_path\":null}',
        '2022-11-14 05:57:30',
        '2022-11-14 16:16:33',
        '2022-11-14 16:16:33'
    ),
    (
        24,
        6,
        '{\"text\":\"Hello\",\"photo_path\":null}',
        '2022-11-15 20:52:37',
        '2022-11-15 20:52:56',
        '2022-11-15 20:52:56'
    ),
    (
        25,
        6,
        '{\"text\":\"Publicar algo\",\"photo_path\":null}',
        '2022-11-16 02:31:20',
        '2022-11-16 02:31:29',
        '2022-11-16 02:31:29'
    ),
    (
        26,
        6,
        '{\"text\":\"On my mind!\",\"photo_path\":null}',
        '2022-11-17 00:54:15',
        '2022-11-17 00:54:40',
        '2022-11-17 00:54:40'
    );

/*Data for the table `products` */
insert into
    `products`(
        `id`,
        `name`,
        `slug`,
        `description`,
        `regular_price`,
        `sale_price`,
        `image`,
        `created_at`,
        `updated_at`
    )
values
    (
        1,
        'English Regular Program',
        'english-regular-program',
        'English Regular Program',
        14.99,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        2,
        'English Conversational Program',
        'english-conversational-program',
        'English Conversational Program',
        19.99,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        3,
        'Spanish Regular Program',
        'spanish-regular-program',
        'Spanish Regular Program',
        19.99,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        4,
        'Spanish Conversational Program',
        'spanish-conversational-program',
        'Spanish Conversational Program',
        19.99,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        5,
        'English Pronunciation Course',
        'english-pronunciation-course',
        'English Pronunciation Course',
        180.00,
        149.95,
        NULL,
        NULL,
        NULL
    ),
    (
        6,
        'Basic English Grammar Course',
        'basic-english-grammar-course',
        'Basic English Grammar Course',
        250.00,
        199.95,
        NULL,
        NULL,
        NULL
    ),
    (
        7,
        'Enrolment',
        'enrolment',
        'Enrolment Fee',
        15.00,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        14,
        'English Regular Program',
        'english-regular-program-old',
        'English Regular Program',
        15.00,
        9.99,
        NULL,
        NULL,
        NULL
    ),
    (
        15,
        'English Conversational Program',
        'english-conversational-program-old',
        'English Conversational Program',
        20.00,
        14.99,
        NULL,
        NULL,
        NULL
    ),
    (
        16,
        'Spanish Regular Program',
        'spanish-regular-program-old',
        'Spanish Regular Program',
        20.00,
        14.99,
        NULL,
        NULL,
        NULL
    ),
    (
        17,
        'Spanish Conversational Program',
        'spanish-conversational-program-old',
        'Spanish Conversational Program',
        20.00,
        14.99,
        NULL,
        NULL,
        NULL
    );

/*Data for the table `questions` */
insert into
    `questions`(
        `id`,
        `value`,
        `description`,
        `data`,
        `type`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
values
    (
        43,
        0,
        'Listen to the audio and answer the questions below. The audio will be played 3 times.',
        '{\"path-to-file\":\"public\\/questions\\/files\\/1649164752.mp3\",\"options\":{\"option-text-1\":null,\"option-text-2\":null,\"option-text-3\":null,\"selected-option\":null}}',
        'info',
        '2022-04-05 14:19:12',
        '2022-04-05 14:19:55',
        NULL
    ),
    (
        44,
        1,
        '﻿What are their names?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"Jeff and Dean.\",\"option-text-2\":\"Joe and David.\",\"option-text-3\":\"Jake and Dan.\",\"selected-option\":\"1\"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:55',
        NULL
    ),
    (
        45,
        1,
        'What does Joe normally do?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"He normally goes to work.\",\"option-text-2\":\"He normmaly stays at home.\",\"option-text-3\":\"He normally goes to school.\",\"selected-option\":\"1\"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:54',
        NULL
    ),
    (
        46,
        1,
        'What does he do in the afternoons?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"He usually plays soccer with his friends. \",\"selected-option\":1,\"option-text-2\":\"He usually plays his piano.\",\"option-text-3\":\"He usually goes out. \"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:52',
        NULL
    ),
    (
        47,
        1,
        'Does he do something else in the afternoons?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"No, he doesn\'t. \",\"selected-option\":2,\"option-text-2\":\"Yes, sometimes he does. \",\"option-text-3\":\"Yes, he always does.\"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:51',
        NULL
    ),
    (
        48,
        1,
        'What does he do sometimes?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"He sometimes goes to the arcade.\",\"selected-option\":1,\"option-text-2\":\"He sometimes goes for a walk.\",\"option-text-3\":\"He soemtimes plays PS4. \"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:50',
        NULL
    ),
    (
        49,
        1,
        'Does Joe like video games?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"No, he doesn\'t.\",\"selected-option\":3,\"option-text-2\":\"He is fond of them. \",\"option-text-3\":\"Yes, he loves them.\"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:48',
        NULL
    ),
    (
        50,
        1,
        'Is David a huge fan of video games?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"No, he is not.\",\"selected-option\":2,\"option-text-2\":\"He is a huge fan.\",\"option-text-3\":\"He just likes them.\"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:46',
        NULL
    ),
    (
        51,
        1,
        'What does Joe often do on weekends?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"He often stays at home.\",\"selected-option\":1,\"option-text-2\":\"He often goes out with his gilfriend.\",\"option-text-3\":\"He often visits his family.\"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:45',
        NULL
    ),
    (
        52,
        1,
        'Does he ocassionally do something else in the weekends?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"No, he doesn\'t.\",\"selected-option\":3,\"option-text-2\":\"Sometimes, he does.\",\"option-text-3\":\"He ocassionally goes out.\"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:43',
        NULL
    ),
    (
        53,
        1,
        'What does David need to do with the information?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"He has to make a school report.\",\"selected-option\":1,\"option-text-2\":\"He needs to copy it.\",\"option-text-3\":\"He has to record it.\"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:41',
        NULL
    ),
    (
        54,
        1,
        'Identify the chunks of the words in bold: Joe goes every day to the park.',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"How \\/ Why.\",\"selected-option\":2,\"option-text-2\":\"What \\/ Where.\",\"option-text-3\":\"When \\/ Who.\"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:39',
        NULL
    ),
    (
        55,
        1,
        '<p>Identify the chunks of the words in bold: <strong>The Millers</strong> always travel to Cancun <strong>because they love its beaches</strong>.</p>',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"Who \\/ Why.\",\"option-text-2\":\"When \\/ What.\",\"option-text-3\":\"Where \\/ How.\",\"selected-option\":\"1\"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:38',
        NULL
    ),
    (
        56,
        1,
        'Identify the chunks of the words in bold: Tristan takes piano lessons at nights in the music school!',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"Who \\/ What.\",\"selected-option\":3,\"option-text-2\":\"Where \\/ Why.\",\"option-text-3\":\"When \\/ Where.\"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:34',
        NULL
    ),
    (
        57,
        1,
        'He ... stays at home on Friday nights, it is his habit.',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"Often.\",\"selected-option\":3,\"option-text-2\":\"Sometimes.\",\"option-text-3\":\"Always.\"}}',
        'multiple-choice',
        '2022-02-15 02:02:36',
        '2022-04-05 14:19:33',
        NULL
    ),
    (
        58,
        1,
        'He ... comes to class on time, it is a miracle he is here.',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"Rarely.\",\"selected-option\":1,\"option-text-2\":\"Often.\",\"option-text-3\":\"Always.\"}}',
        'multiple-choice',
        '2022-02-15 02:02:37',
        '2022-04-05 14:19:32',
        NULL
    ),
    (
        59,
        1,
        '\"He is crazy about...\" is a phrase in the ... of preference.',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"Low level.\",\"selected-option\":3,\"option-text-2\":\"Mid level.\",\"option-text-3\":\"High level.\"}}',
        'multiple-choice',
        '2022-02-15 02:02:37',
        '2022-04-05 14:19:30',
        NULL
    ),
    (
        60,
        1,
        'The correct sentence is... ',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"He like dancing a lot.\",\"selected-option\":2,\"option-text-2\":\"He likes dancing a lot.\",\"option-text-3\":\"He likes to dancing a lot.\"}}',
        'multiple-choice',
        '2022-02-15 02:02:37',
        '2022-04-05 14:19:29',
        NULL
    ),
    (
        61,
        1,
        'There are ... different pronunciations for the third person of verbs.',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"4.\",\"selected-option\":3,\"option-text-2\":\"2. \",\"option-text-3\":\"3.\"}}',
        'multiple-choice',
        '2022-02-15 02:02:37',
        '2022-04-05 14:19:28',
        NULL
    ),
    (
        62,
        1,
        'Most of the verbs in third person take...',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"\\\"es\\\".\",\"selected-option\":2,\"option-text-2\":\"\\\"s\\\". \",\"option-text-3\":\"\\\"ies\\\".\"}}',
        'multiple-choice',
        '2022-02-15 02:02:37',
        '2022-04-05 14:19:27',
        NULL
    ),
    (
        63,
        0,
        '﻿What are their names?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"Jeff and Dean.\",\"option-text-2\":\"Joe and David.\",\"option-text-3\":\"Jake and Dan.\",\"selected-option\":\"1\"}}',
        'multiple-choice',
        '2022-02-15 04:11:30',
        '2022-02-15 04:21:08',
        '2022-02-15 04:21:08'
    ),
    (
        64,
        NULL,
        'What does Joe normally do?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"He normally goes to work.\",\"selected-option\":3,\"option-text-2\":\"He normmaly stays at home.\",\"option-text-3\":\"He normally goes to school.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:30',
        '2022-02-15 04:21:35',
        '2022-02-15 04:21:35'
    ),
    (
        65,
        NULL,
        'What does he do in the afternoons?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"He usually plays soccer with his friends. \",\"selected-option\":1,\"option-text-2\":\"He usually plays his piano.\",\"option-text-3\":\"He usually goes out. \"}}',
        'multiple-choice',
        '2022-02-15 04:11:30',
        '2022-02-15 04:22:03',
        '2022-02-15 04:22:03'
    ),
    (
        66,
        NULL,
        'Does he do something else in the afternoons?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"No, he doesn\'t. \",\"selected-option\":2,\"option-text-2\":\"Yes, sometimes he does. \",\"option-text-3\":\"Yes, he always does.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:30',
        '2022-02-15 04:24:49',
        '2022-02-15 04:24:49'
    ),
    (
        67,
        NULL,
        'What does he do sometimes?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"He sometimes goes to the arcade.\",\"selected-option\":1,\"option-text-2\":\"He sometimes goes for a walk.\",\"option-text-3\":\"He soemtimes plays PS4. \"}}',
        'multiple-choice',
        '2022-02-15 04:11:30',
        '2022-02-15 04:24:47',
        '2022-02-15 04:24:47'
    ),
    (
        68,
        NULL,
        'Does Joe like video games?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"No, he doesn\'t.\",\"selected-option\":3,\"option-text-2\":\"He is fond of them. \",\"option-text-3\":\"Yes, he loves them.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:30',
        '2022-02-15 04:24:45',
        '2022-02-15 04:24:45'
    ),
    (
        69,
        NULL,
        'Is David a huge fan of video games?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"No, he is not.\",\"selected-option\":2,\"option-text-2\":\"He is a huge fan.\",\"option-text-3\":\"He just likes them.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:30',
        '2022-02-15 04:24:43',
        '2022-02-15 04:24:43'
    ),
    (
        70,
        NULL,
        'What does Joe often do on weekends?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"He often stays at home.\",\"selected-option\":1,\"option-text-2\":\"He often goes out with his gilfriend.\",\"option-text-3\":\"He often visits his family.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:30',
        '2022-02-15 04:24:41',
        '2022-02-15 04:24:41'
    ),
    (
        71,
        NULL,
        'Does he ocassionally do something else in the weekends?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"No, he doesn\'t.\",\"selected-option\":3,\"option-text-2\":\"Sometimes, he does.\",\"option-text-3\":\"He ocassionally goes out.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:30',
        '2022-02-15 04:24:39',
        '2022-02-15 04:24:39'
    ),
    (
        72,
        NULL,
        'What does David need to do with the information?',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"He has to make a school report.\",\"selected-option\":1,\"option-text-2\":\"He needs to copy it.\",\"option-text-3\":\"He has to record it.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:30',
        '2022-02-15 04:24:36',
        '2022-02-15 04:24:36'
    ),
    (
        73,
        NULL,
        'Identify the chunks of the words in bold: Joe goes every day to the park.',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"How \\/ Why.\",\"selected-option\":2,\"option-text-2\":\"What \\/ Where.\",\"option-text-3\":\"When \\/ Who.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:31',
        '2022-02-15 04:24:34',
        '2022-02-15 04:24:34'
    ),
    (
        74,
        NULL,
        'Identify the chunks of the words in bold: The Millers always travel to Cancun because they love its beaches.',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"Who \\/ Why.\",\"selected-option\":1,\"option-text-2\":\"When \\/ What.\",\"option-text-3\":\"Where \\/ How.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:31',
        '2022-02-15 04:22:40',
        '2022-02-15 04:22:40'
    ),
    (
        75,
        NULL,
        'Identify the chunks of the words in bold: Tristan takes piano lessons at nights in the music school!',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"Who \\/ What.\",\"selected-option\":3,\"option-text-2\":\"Where \\/ Why.\",\"option-text-3\":\"When \\/ Where.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:31',
        '2022-02-15 04:22:33',
        '2022-02-15 04:22:33'
    ),
    (
        76,
        NULL,
        'He ... stays at home on Friday nights, it is his habit.',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"Often.\",\"selected-option\":3,\"option-text-2\":\"Sometimes.\",\"option-text-3\":\"Always.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:31',
        '2022-02-15 04:22:36',
        '2022-02-15 04:22:36'
    ),
    (
        77,
        NULL,
        'He ... comes to class on time, it is a miracle he is here.',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"Rarely.\",\"selected-option\":1,\"option-text-2\":\"Often.\",\"option-text-3\":\"Always.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:31',
        '2022-02-15 04:22:29',
        '2022-02-15 04:22:29'
    ),
    (
        78,
        NULL,
        '\"He is crazy about...\" is a phrase in the ... of preference.',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"Low level.\",\"selected-option\":3,\"option-text-2\":\"Mid level.\",\"option-text-3\":\"High level.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:31',
        '2022-02-15 04:22:21',
        '2022-02-15 04:22:21'
    ),
    (
        79,
        NULL,
        'The correct sentence is... ',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"He like dancing a lot.\",\"selected-option\":2,\"option-text-2\":\"He likes dancing a lot.\",\"option-text-3\":\"He likes to dancing a lot.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:31',
        '2022-02-15 04:22:25',
        '2022-02-15 04:22:25'
    ),
    (
        80,
        NULL,
        'There are ... different pronunciations for the third person of verbs.',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"4.\",\"selected-option\":3,\"option-text-2\":\"2. \",\"option-text-3\":\"3.\"}}',
        'multiple-choice',
        '2022-02-15 04:11:31',
        '2022-02-15 04:22:17',
        '2022-02-15 04:22:17'
    ),
    (
        81,
        NULL,
        'Most of the verbs in third person take...',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"\\\"es\\\".\",\"selected-option\":2,\"option-text-2\":\"\\\"s\\\". \",\"option-text-3\":\"\\\"ies\\\".\"}}',
        'multiple-choice',
        '2022-02-15 04:11:31',
        '2022-02-15 04:22:13',
        '2022-02-15 04:22:13'
    ),
    (
        82,
        NULL,
        'Verbs that finish in \"s, ss, z, sh, ch and x\" take ... for the third person. ',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"\\\"es\\\".\",\"selected-option\":1,\"option-text-2\":\"\\\"ies\\\". \",\"option-text-3\":\"\\\"s\\\".\"}}',
        'multiple-choice',
        '2022-02-15 04:11:31',
        '2022-02-15 04:22:09',
        '2022-02-15 04:22:09'
    ),
    (
        83,
        1,
        'Verbs that finish in \"s, ss, z, sh, ch and x\" take ... for the third person. ',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":\"\\\"es\\\".\",\"selected-option\":1,\"option-text-2\":\"\\\"ies\\\". \",\"option-text-3\":\"\\\"s\\\".\"}}',
        'multiple-choice',
        '2022-02-15 02:02:37',
        '2022-04-05 14:19:25',
        NULL
    ),
    (
        84,
        15,
        'Write an 300-word essay',
        '{\"path-to-file\":null,\"options\":{\"option-text-1\":null,\"option-text-2\":null,\"option-text-3\":null,\"selected-option\":null}}',
        'essay',
        '2022-04-05 15:00:21',
        '2022-04-05 15:00:21',
        NULL
    );

/*Data for the table `role_has_permissions` */
/*Data for the table `roles` */
insert into
    `roles`(
        `id`,
        `name`,
        `guard_name`,
        `created_at`,
        `updated_at`
    )
values
    (
        1,
        'guest',
        'web',
        '2021-05-23 03:21:56',
        '2021-05-23 03:21:56'
    ),
    (
        2,
        'student',
        'web',
        '2021-05-31 15:02:03',
        '2021-05-31 15:02:03'
    ),
    (
        3,
        'teacher',
        'web',
        '2021-05-31 15:02:10',
        '2021-05-31 15:02:10'
    ),
    (
        4,
        'admin',
        'web',
        '2021-05-31 15:02:16',
        '2021-05-31 15:02:16'
    );

/*Data for the table `scheduled_classes` */
insert into
    `scheduled_classes`(`student_id`, `teacher_id`)
values
    (5, 7),
    (9, 7);

/*Data for the table `schedules` */
insert into
    `schedules`(
        `id`,
        `selected_schedule`,
        `next_schedule`,
        `user_id`,
        `enrolment_id`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
values
    (
        2,
        '[\"0\",\"23\"]',
        NULL,
        6,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        3,
        '[[\"0\",\"0\"],[\"0\",\"1\"],[\"0\",\"2\"],[\"0\",\"3\"],[\"0\",\"4\"],[\"1\",\"0\"],[\"1\",\"1\"],[\"1\",\"2\"],[\"1\",\"3\"],[\"1\",\"4\"],[\"2\",\"0\"],[\"2\",\"1\"],[\"2\",\"2\"],[\"2\",\"3\"],[\"2\",\"4\"],[\"3\",\"0\"],[\"3\",\"1\"],[\"3\",\"2\"],[\"3\",\"3\"],[\"3\",\"4\"],[\"4\",\"0\"],[\"4\",\"1\"],[\"4\",\"2\"],[\"4\",\"3\"],[\"4\",\"4\"],[\"5\",\"0\"],[\"5\",\"1\"],[\"5\",\"2\"],[\"5\",\"3\"],[\"5\",\"4\"],[\"6\",\"0\"],[\"6\",\"1\"],[\"6\",\"2\"],[\"6\",\"3\"],[\"6\",\"4\"],[\"7\",\"0\"],[\"7\",\"1\"],[\"7\",\"2\"],[\"7\",\"3\"],[\"7\",\"4\"],[\"8\",\"0\"],[\"8\",\"1\"],[\"8\",\"2\"],[\"8\",\"3\"],[\"8\",\"4\"],[\"9\",\"0\"],[\"9\",\"1\"],[\"9\",\"2\"],[\"9\",\"3\"],[\"9\",\"4\"],[\"10\",\"0\"],[\"10\",\"1\"],[\"10\",\"2\"],[\"10\",\"3\"],[\"10\",\"4\"],[\"11\",\"0\"],[\"11\",\"1\"],[\"11\",\"2\"],[\"11\",\"3\"],[\"11\",\"4\"],[\"12\",\"0\"],[\"12\",\"1\"],[\"12\",\"2\"],[\"12\",\"3\"],[\"12\",\"4\"],[\"13\",\"0\"],[\"13\",\"1\"],[\"13\",\"2\"],[\"13\",\"3\"],[\"13\",\"4\"],[\"14\",\"0\"],[\"14\",\"1\"],[\"14\",\"2\"],[\"14\",\"3\"],[\"14\",\"4\"],[\"15\",\"0\"],[\"15\",\"1\"],[\"15\",\"2\"],[\"15\",\"3\"],[\"15\",\"4\"],[\"16\",\"0\"],[\"16\",\"1\"],[\"16\",\"2\"],[\"16\",\"3\"],[\"16\",\"4\"],[\"17\",\"0\"],[\"17\",\"1\"],[\"17\",\"2\"],[\"17\",\"3\"],[\"17\",\"4\"],[\"18\",\"0\"],[\"18\",\"1\"],[\"18\",\"2\"],[\"18\",\"3\"],[\"18\",\"4\"],[\"19\",\"0\"],[\"19\",\"1\"],[\"19\",\"2\"],[\"19\",\"3\"],[\"19\",\"4\"],[\"20\",\"0\"],[\"20\",\"1\"],[\"20\",\"2\"],[\"20\",\"3\"],[\"20\",\"4\"],[\"21\",\"0\"],[\"21\",\"1\"],[\"21\",\"2\"],[\"21\",\"3\"],[\"21\",\"4\"],[\"22\",\"0\"],[\"22\",\"1\"],[\"22\",\"2\"],[\"22\",\"3\"],[\"22\",\"4\"],[\"23\",\"0\"],[\"23\",\"1\"],[\"23\",\"2\"],[\"23\",\"3\"],[\"23\",\"4\"]]',
        NULL,
        7,
        NULL,
        '2021-11-27 10:02:54',
        '2022-08-03 07:48:27',
        NULL
    ),
    (
        6,
        NULL,
        NULL,
        184,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        7,
        NULL,
        NULL,
        185,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        8,
        NULL,
        NULL,
        186,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        9,
        NULL,
        NULL,
        187,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        10,
        '[[\"9\",\"1\"],[\"9\",\"2\"],[\"9\",\"3\"],[\"10\",\"1\"],[\"10\",\"2\"],[\"10\",\"3\"],[\"11\",\"1\"],[\"11\",\"2\"],[\"11\",\"3\"],[\"12\",\"1\"],[\"12\",\"2\"],[\"12\",\"3\"],[\"13\",\"1\"],[\"13\",\"2\"],[\"13\",\"3\"],[\"14\",\"1\"],[\"14\",\"2\"],[\"14\",\"3\"],[\"15\",\"1\"],[\"15\",\"2\"],[\"15\",\"3\"]]',
        NULL,
        188,
        NULL,
        '2021-11-27 10:02:54',
        '2022-09-13 17:57:48',
        NULL
    ),
    (
        11,
        NULL,
        NULL,
        189,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        12,
        NULL,
        NULL,
        190,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        13,
        NULL,
        NULL,
        191,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        14,
        NULL,
        NULL,
        192,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        15,
        NULL,
        NULL,
        193,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        16,
        NULL,
        NULL,
        194,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        17,
        NULL,
        NULL,
        195,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        18,
        NULL,
        NULL,
        196,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        19,
        NULL,
        NULL,
        197,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        20,
        NULL,
        NULL,
        198,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        21,
        NULL,
        NULL,
        199,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        22,
        '[[\"6\",\"1\"],[\"6\",\"2\"],[\"6\",\"3\"],[\"6\",\"4\"],[\"15\",\"1\"],[\"15\",\"2\"],[\"15\",\"3\"],[\"15\",\"4\"],[\"16\",\"1\"],[\"16\",\"2\"],[\"16\",\"3\"],[\"16\",\"4\"],[\"17\",\"1\"],[\"17\",\"2\"],[\"17\",\"3\"],[\"17\",\"4\"],[\"18\",\"1\"],[\"18\",\"2\"],[\"18\",\"3\"],[\"18\",\"4\"],[\"19\",\"1\"],[\"19\",\"2\"],[\"19\",\"3\"],[\"19\",\"4\"],[\"20\",\"1\"],[\"20\",\"2\"],[\"20\",\"3\"],[\"20\",\"4\"]]',
        NULL,
        200,
        NULL,
        '2021-11-27 10:02:54',
        '2022-01-14 17:44:31',
        NULL
    ),
    (
        23,
        NULL,
        NULL,
        201,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        24,
        NULL,
        NULL,
        202,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        25,
        NULL,
        NULL,
        203,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        26,
        NULL,
        NULL,
        204,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        27,
        NULL,
        NULL,
        205,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        28,
        NULL,
        NULL,
        206,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        29,
        NULL,
        NULL,
        207,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        30,
        '[[\"8\",\"1\"],[\"20\",\"0\"]]\r\n',
        NULL,
        208,
        2,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        31,
        NULL,
        NULL,
        209,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        32,
        NULL,
        NULL,
        210,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        33,
        NULL,
        NULL,
        211,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        34,
        NULL,
        NULL,
        212,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        35,
        NULL,
        NULL,
        213,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        36,
        NULL,
        NULL,
        214,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        37,
        NULL,
        NULL,
        215,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        38,
        NULL,
        NULL,
        216,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        39,
        NULL,
        NULL,
        217,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        40,
        NULL,
        NULL,
        218,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        41,
        NULL,
        NULL,
        219,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        42,
        NULL,
        NULL,
        220,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        43,
        NULL,
        NULL,
        221,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        44,
        NULL,
        NULL,
        222,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        45,
        NULL,
        NULL,
        223,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        46,
        NULL,
        NULL,
        224,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        47,
        NULL,
        NULL,
        225,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        48,
        NULL,
        NULL,
        226,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        49,
        NULL,
        NULL,
        227,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        50,
        NULL,
        NULL,
        228,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        51,
        NULL,
        NULL,
        229,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        52,
        NULL,
        NULL,
        230,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        53,
        NULL,
        NULL,
        231,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        54,
        NULL,
        NULL,
        232,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        55,
        NULL,
        NULL,
        233,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        56,
        NULL,
        NULL,
        234,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        57,
        NULL,
        NULL,
        235,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        58,
        NULL,
        NULL,
        236,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        59,
        NULL,
        NULL,
        237,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        60,
        NULL,
        NULL,
        238,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        61,
        NULL,
        NULL,
        239,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        62,
        NULL,
        NULL,
        240,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        63,
        '[[\"16\",\"1\"],[\"16\",\"3\"],[\"16\",\"5\"],[\"17\",\"1\"],[\"17\",\"2\"],[\"17\",\"3\"],[\"17\",\"4\"],[\"17\",\"5\"],[\"18\",\"1\"],[\"18\",\"2\"],[\"18\",\"3\"],[\"18\",\"5\"],[\"19\",\"1\"],[\"19\",\"3\"],[\"19\",\"5\"],[\"20\",\"1\"],[\"20\",\"3\"],[\"20\",\"5\"],[\"21\",\"1\"],[\"21\",\"2\"],[\"21\",\"3\"],[\"21\",\"4\"],[\"21\",\"5\"]]',
        NULL,
        241,
        NULL,
        '2021-11-27 10:02:54',
        '2022-01-14 17:46:50',
        NULL
    ),
    (
        64,
        NULL,
        NULL,
        242,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        65,
        NULL,
        NULL,
        243,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        66,
        NULL,
        NULL,
        244,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        67,
        NULL,
        NULL,
        245,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        68,
        NULL,
        NULL,
        246,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        69,
        NULL,
        NULL,
        247,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        70,
        '[[\"6\",\"1\"],[\"6\",\"2\"],[\"6\",\"3\"],[\"6\",\"4\"],[\"6\",\"5\"],[\"7\",\"1\"],[\"7\",\"2\"],[\"7\",\"3\"],[\"7\",\"4\"],[\"7\",\"5\"],[\"8\",\"1\"],[\"8\",\"2\"],[\"8\",\"3\"],[\"8\",\"4\"],[\"8\",\"5\"],[\"9\",\"1\"],[\"9\",\"2\"],[\"9\",\"3\"],[\"9\",\"4\"],[\"9\",\"5\"],[\"10\",\"1\"],[\"10\",\"2\"],[\"10\",\"3\"],[\"10\",\"4\"],[\"10\",\"5\"],[\"11\",\"1\"],[\"11\",\"2\"],[\"11\",\"3\"],[\"11\",\"4\"],[\"11\",\"5\"],[\"12\",\"1\"],[\"12\",\"2\"],[\"12\",\"3\"],[\"12\",\"4\"],[\"12\",\"5\"],[\"13\",\"6\"],[\"14\",\"6\"],[\"15\",\"6\"],[\"16\",\"6\"],[\"17\",\"6\"],[\"18\",\"6\"],[\"19\",\"2\"],[\"19\",\"4\"],[\"19\",\"6\"],[\"20\",\"2\"],[\"20\",\"4\"],[\"21\",\"2\"],[\"21\",\"4\"]]',
        NULL,
        248,
        NULL,
        '2021-11-27 10:02:54',
        '2022-01-14 18:21:57',
        NULL
    ),
    (
        71,
        NULL,
        NULL,
        249,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        72,
        NULL,
        NULL,
        250,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        73,
        NULL,
        NULL,
        251,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        74,
        NULL,
        NULL,
        252,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        75,
        NULL,
        NULL,
        253,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        76,
        NULL,
        NULL,
        254,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        77,
        NULL,
        NULL,
        255,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        78,
        NULL,
        NULL,
        256,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        79,
        NULL,
        NULL,
        257,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        80,
        NULL,
        NULL,
        258,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        81,
        NULL,
        NULL,
        259,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        82,
        NULL,
        NULL,
        260,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        83,
        NULL,
        NULL,
        261,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        84,
        NULL,
        NULL,
        262,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        85,
        NULL,
        NULL,
        263,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        86,
        NULL,
        NULL,
        264,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        87,
        NULL,
        NULL,
        265,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        88,
        NULL,
        NULL,
        266,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        89,
        NULL,
        NULL,
        267,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        90,
        NULL,
        NULL,
        268,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        91,
        NULL,
        NULL,
        269,
        NULL,
        '2021-11-27 10:02:54',
        '2021-11-27 10:02:54',
        NULL
    ),
    (
        95,
        NULL,
        NULL,
        276,
        NULL,
        '2022-01-14 19:23:15',
        '2022-01-14 19:23:15',
        NULL
    ),
    (
        96,
        NULL,
        NULL,
        277,
        NULL,
        '2022-01-15 00:24:30',
        '2022-01-15 00:24:30',
        NULL
    ),
    (
        99,
        '[[\"18\",\"0\"],[\"18\",\"1\"]]',
        NULL,
        5,
        1,
        '2022-05-07 02:23:12',
        '2022-11-22 03:49:47',
        NULL
    ),
    (
        100,
        '[[\"6\",\"1\"],[\"6\",\"2\"]]',
        NULL,
        9,
        11,
        '2022-06-24 03:26:33',
        '2022-11-23 15:47:00',
        NULL
    ),
    (
        101,
        '[[\"6\",\"1\"],[\"6\",\"2\"]]',
        NULL,
        183,
        12,
        '2022-07-29 06:20:02',
        '2022-09-27 19:21:32',
        '2022-09-27 19:21:32'
    );

/*Data for the table `sessions` */
insert into
    `sessions`(
        `id`,
        `user_id`,
        `ip_address`,
        `user_agent`,
        `payload`,
        `last_activity`
    )
values
    (
        'UkQn12L9RMxUoYhxLzeg0urPgVz4jpcXlrCBAupP',
        6,
        '127.0.0.1',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
        'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTHNDTUZ0YVgyczlpaGp0STBybWJ0bHlxbW5pTWdsVjhyb2Fkb1o5UyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91bml0cy9jcmVhdGUiO31zOjUwOiJsb2dpbl93ZWJfM2RjN2E5MTNlZjVmZDRiODkwZWNhYmUzNDg3MDg1NTczZTE2Y2Y4MiI7aTo2O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkUTNoeHFaOXVaYy5ObEZUWkNNSXNyT3FUby5QOC5mT2tLblZWZkRsVzZsNjhrcjVYcVNscU8iO3M6MTM6InVzZXJfc2NoZWR1bGUiO2E6MDp7fX0=',
        1669403960
    );

/*Data for the table `shoppingcart` */
/*Data for the table `unit_user` */
insert into
    `unit_user`(`id`, `user_id`, `unit_id`)
values
    (2, 9, 4),
    (6, 7, 4),
    (15, 6, 1),
    (26, 5, 0);

/*Data for the table `units` */
insert into
    `units`(
        `id`,
        `name`,
        `image`,
        `status`,
        `module_id`,
        `order`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
values
    (
        0,
        'Unit 5',
        'images/image_preview.png',
        1,
        2,
        5,
        '2022-04-08 15:12:40',
        '2022-04-08 15:12:44',
        NULL
    ),
    (
        1,
        'Unit 1',
        'public/images/units/covers/1.png',
        1,
        1,
        1,
        '2022-04-08 11:14:18',
        '2022-11-21 15:15:12',
        NULL
    ),
    (
        2,
        'Unit 2',
        'public/images/units/covers/2.png',
        1,
        1,
        2,
        '2022-04-08 11:14:18',
        '2022-11-18 23:52:33',
        NULL
    ),
    (
        3,
        'Unit 3',
        'public/images/units/covers/3.png',
        1,
        1,
        3,
        '2022-04-08 11:14:18',
        '2022-11-18 23:52:46',
        NULL
    ),
    (
        4,
        'Unit 4',
        'public/images/units/covers/4.png',
        1,
        1,
        4,
        '2022-04-08 11:14:18',
        '2022-11-18 23:52:53',
        NULL
    );

/*Data for the table `users` */
insert into
    `users`(
        `id`,
        `first_name`,
        `last_name`,
        `username`,
        `email`,
        `email_verified_at`,
        `password`,
        `two_factor_secret`,
        `two_factor_recovery_codes`,
        `profile_photo_path`,
        `remember_token`,
        `status`,
        `selected_schedule`,
        `available_schedule`,
        `meeting_id`,
        `current_team_id`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
values
    (
        5,
        'Joel',
        'Blanco',
        'joeld.blanco',
        'gosxteam@gmail.com',
        '2021-05-26 02:17:25',
        '$2y$10$Q3hxqZ9uZc.NlFTZCMIsrOqTo.P8.fOkKnVVfDlW6l68kr5XqSlqO',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        '[]',
        NULL,
        '$2y$10$W4ex2z.d34Hkjk9s.2GupO21iVlq5kWdc//G6NxF.bU1VsTJ7DhgS',
        NULL,
        '2021-05-26 02:16:07',
        '2021-11-25 00:09:20',
        NULL
    ),
    (
        6,
        'The Utterers',
        'Corner',
        'theuttererscorner',
        'theuttererscorner@gmail.com',
        '2021-05-26 02:17:25',
        '$2y$10$Q3hxqZ9uZc.NlFTZCMIsrOqTo.P8.fOkKnVVfDlW6l68kr5XqSlqO',
        NULL,
        NULL,
        'public/profile-photos/$2y$10$a6jD63TJyq3z0bUNikxcauEpRdyRN8rBgsmCiF3ScB9dqiqyOoJuq.png',
        '6ntayjB75JafVBtqVUDJ5l2glBfR1ZYpvkEhPnVvTCQJfpezzT71xoWBdAYv',
        1,
        NULL,
        NULL,
        '$2y$10$W4ex2z.d34Hkjk9s.2GupO21iVlq5kWdc//G6NxF.bU1VsTJ7DhgS',
        NULL,
        '2021-05-26 02:16:07',
        '2022-09-12 04:15:34',
        NULL
    ),
    (
        7,
        'Joel',
        'Blanco',
        'joel.blanco.teacher',
        'joeld.blanco@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$fJ90ac8jabNJhqcDM/I/Uu.s1LKSLgwB7PhFVKekbebayMNk5Nxje',
        NULL,
        NULL,
        'profile-photos/HG53Av5vJRmTMMkFAQVWNL63Kh29UI98sQPcRTEF.png',
        NULL,
        1,
        '[[\"8\",\"0\"],[\"8\",\"1\"],[\"9\",\"1\"],[\"10\",\"1\"],[\"20\",\"0\"]]',
        '[[\"6\",\"4\"],[\"6\",\"5\"],[\"7\",\"4\"],[\"7\",\"5\"],[\"8\",\"4\"],[\"8\",\"5\"],[\"9\",\"4\"],[\"9\",\"5\"],[\"10\",\"4\"],[\"10\",\"5\"],[\"11\",\"4\"],[\"11\",\"5\"],[\"12\",\"4\"],[\"12\",\"5\"],[\"13\",\"4\"],[\"13\",\"5\"],[\"14\",\"4\"],[\"14\",\"5\"],[\"15\",\"4\"],[\"15\",\"5\"],[\"16\",\"4\"],[\"16\",\"5\"],[\"17\",\"4\"],[\"17\",\"5\"],[\"18\",\"4\"],[\"18\",\"5\"],[\"19\",\"4\"],[\"19\",\"5\"],[\"\",\"20\"],[\"1\",\"20\"],[\"4\",\"20\"],[\"5\",\"21\"],[\"4\",\"21\"],[\"5\"]]',
        NULL,
        NULL,
        '2021-06-29 22:57:48',
        '2022-11-24 01:19:25',
        NULL
    ),
    (
        9,
        'Juan',
        'Ruiz',
        'juan.ruiz',
        'ruizjuan875@gmail.com',
        '2021-05-26 02:17:25',
        '$2y$10$Q3hxqZ9uZc.NlFTZCMIsrOqTo.P8.fOkKnVVfDlW6l68kr5XqSlqO',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        '[]',
        NULL,
        '$2y$10$W4ex2z.d34Hkjk9s.2GupO21iVlq5kWdc//G6NxF.bU1VsTJ7DhgS',
        NULL,
        '2021-05-26 02:16:07',
        '2022-04-12 15:59:30',
        NULL
    ),
    (
        183,
        'Guest user',
        ' ',
        'guest',
        'root@localhost',
        '2021-06-29 23:00:43',
        '$2y$10$3hoS6.TMlWysNDIDuVjZkedPOOq4beX2wkjyoxEZr4cQJ4ccrADuy',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        184,
        'The Utterers\'',
        'Corner',
        'theuttererscorner2',
        'theuttererscorner2@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$SuowTS/ELwp5po/J59ZURu21nAL5SDVGYh3095QVm3WozEEug7C9C',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        185,
        'Joel',
        'Blanco',
        'joeld.blanco@gmail.com',
        'f23e41f187600eee24ccc3662c9c4d07',
        '2021-06-29 23:00:43',
        '$2y$10$Xb1mk2ZAlHhiwzc8eku.MerlDdRulDn4qVUIa9ESlRrP725N5fBj.',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2022-04-12 17:58:48',
        '2022-04-12 17:58:48'
    ),
    (
        186,
        'Joel',
        'Blanco',
        'joel.blanco',
        'joeld.blanco2@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$PX/7uXPcjcrJEFkvKA3gg.THLjBKCPcpSnwJryg.C0FAe8zjifwwi',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2022-04-12 17:58:54',
        '2022-04-12 17:58:54'
    ),
    (
        187,
        'Luis',
        'Monasterios',
        'lkmonasterios66@gmail.com',
        '502ff82f7f1f8218dd41201fe4353687',
        '2021-06-29 23:00:43',
        '$2y$10$1FY8C0dhI4Qtru04KKjkQODJgQfwdpg7xVdDXys4NpRzoJYCe3fp2',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        188,
        'Johannes',
        'Rojas',
        'johannes rojas',
        'johanes.d.rojas@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$RilwMbIoSrWmUT.Q5NRvVOn.fUenYag.d3v2vlgzMFhtAQs/.8hZe',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        189,
        'Ruth',
        'Torres',
        'ruth',
        'torresvargasruth6@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$SkTJ7zLwaPmkDeDoAwwJkOB24mf48JSJu.8jxuiMXB7Tdlwl/t3DW',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        190,
        'Eucaris',
        'Sánchez',
        'eucaris',
        'eusanchezromero@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$cJ/hpz5k14aEmuMHwfcpsekiAj.U/WrIRMVJt2AzqMj.sJifx9PG2',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        191,
        'David',
        'Rojas',
        'thecowd87@hotmail.com',
        '172522ec1028ab781d9dfd17eaca4427',
        '2021-06-29 23:00:43',
        '$2y$10$fwUBAOpu5UPq6BvpZYjcYuUgBPrezOzmSnmkJ1KfEsPUu3B9Dnkpu',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        192,
        'Michelle',
        'Beresford',
        'michelle.beresford',
        'michelle.beresford@live.co.uk',
        '2021-06-29 23:00:43',
        '$2y$10$yoJKSLLqIU.vO2QPMycAG.wYvcd0jFXUHRvxzNNt3.0vRgTGWgzFK',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        193,
        'Lorena',
        'Espinoza',
        'lorena.espinoza',
        'eg.lorena@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$xu0H7VxorJI5lHVbJiZbJuLFOUF7Pbyk8K1oVcdCQir/L9crzleIO',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        194,
        'Bradley',
        'Young',
        'bradley.young',
        'bradleyalexanderyoung@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$RMbLjsM4RZ6ZqHufOauHaeH//zlkD2PrGxMKnwdmKGI869qtqrQm6',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        195,
        'John',
        'Castillo',
        'john.castillo',
        'castillojohn034@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$1H55L3eITzgzJkXCll3Pv.yatMyy.mUGMrpg43cwA9Ifq4awIF1BC',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        196,
        'Naely',
        'Jiménez',
        'naely.jimenez',
        'naelyester@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$FgCOR9Kp7AlOpFpUeOeI3.Z92BaTjuEIfjmbKF.eqM4G72c92Ba1m',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        197,
        'Rosangel',
        'Leon',
        'rosangel.leon',
        'rosangelleon15@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$8Uwp2HxtJx.QRlRML55HseRMKmEsET2zcsUc/nkusidU/nltk.Foa',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        198,
        'Johannes',
        'Rojas',
        'johannes.d.rojas',
        'thecowd87@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$5T.4j3XjbjhIoBhccT.KW.Oet5DRzTfNk/BW34OoU6LBpEFg3Maym',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        199,
        'Pedro',
        'Torres',
        'pedro torres',
        'pedrolon@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$uSf.Vz5AShncxgQOlop2gOjtRodD3idZ09UrXnkNlXg2s5NBkrwt.',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        200,
        'Alvaro',
        'Jordan',
        'alvaro.jordan',
        'elt.alvarojs@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$nVwTn7lC0zAkyp5kgXGI7ujYO8.qvpjAUKSCpA5cPuH1gmOtg3ouS',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2022-11-24 01:20:02',
        NULL
    ),
    (
        201,
        'Ana',
        'Villamizar',
        'ana.villamizar',
        'villamizarana489@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$ummMpijUJTTqPXBNqyGrlOek3Zjyk9HIJ7OTNY9/.SeuvdY/bO26a',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2021-09-18 03:24:59',
        NULL
    ),
    (
        202,
        'Jose',
        'Rodriguez',
        'jose.rodriguez',
        'jfelixrodriguez@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$ZT7QweRYprJRZvolEa5.8uphsBj9MztIN5RHFlMrDmJqFoqKVa78.',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        203,
        'Leoandris',
        'Leoandris',
        'leoandris',
        'leoandris@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$M0881ovnsLU2q794buI4fuaE.yksDU0Tt20P5EYPS7CMxsqI0Nmk.',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        204,
        'Cristina',
        'Castillo',
        'cristina.castillo',
        'cristinacastillo19@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$z2jJS0hdd5mnv0HVtuPhieO7/vH9A9Q0ndCYECPovHrMIPPaJzkt6',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        205,
        'Pedro',
        'Suarez',
        'pedro.suarez',
        'drsuarez83@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$HUX9NviklFGMwl/mvgQBKuqbg8jUDfk.dA1WCAs5GLLp0.Bsy6fe.',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        206,
        'Lina',
        'Garcia',
        'lina.garcia',
        'lina.garcia@smart-tap.co',
        '2021-06-29 23:00:43',
        '$2y$10$9enGamp/Sbn9lJ9oyF6aq.P9te2JUiJBVjv9FhmidriAjMP.b9CSy',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        207,
        'Luz',
        'Ahumada',
        'luz.ahumada',
        'adrygym08@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$zsC2UYUtF.6GDp2.wjbM3OWW1XZk9nJACCv4JqcANrrHNEE0tYayi',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        208,
        'Marshall',
        'Keener',
        'marshall.keener',
        'marshallkeener@yahoo.com',
        '2021-06-29 23:00:43',
        '$2y$10$6MJuiZKjc8P5ge8g9Jmbp.9PoJpDqdHLYxahQnLQt6abEcsSf04oq',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        209,
        'Emi',
        'Ujihara',
        'emi.ujihara',
        'emiujihara78@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$1DlypEexyWrer1sVqYJFlOmDElWH2hcPfjAGJJP5LVLIhVOYAKvvq',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        0,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2022-11-24 01:18:56',
        NULL
    ),
    (
        210,
        'Lipzonia',
        'De Carballo',
        'lipzonia.carballo',
        'ofinecar@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$q/dzgSPR3QismvSBuHub6OHFM82xoq7oVB1J8nhmLwXE.Qasusb2y',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        211,
        'Katherine',
        'Camejo',
        'katherine.camejo',
        'kcaroma.kc@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$1wv8Q2T5S85Tkco/S4iN8uoRwnJj32Y8U.V3B8kIOReBm8P6bNXFe',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        212,
        'Karla',
        'Alas',
        'karla.alas',
        'karla_alas_10@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$w3IEOByVzosVjyxm4.44YOS7TXYJZw/Cn0RHe2MLWREKcQ9UTF1k2',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        213,
        'Kundry',
        'Gonzalez',
        'kundry.gonzalez',
        'kundrymgs22@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$O3c77drgach5C8tT0ahSB.w8u3QyuCABD/EJ85.gwvsTLpvcXwO0W',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        214,
        'Ana',
        'Garcia',
        'ana.garcia',
        'anag771@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$VM0x68kbjaoSEwQqEnd9OeWLD6D6gR6ec8OnPqe6Ry.NrvFUr6cBS',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2021-09-18 03:24:59',
        NULL
    ),
    (
        215,
        'Diana',
        'Hernandez',
        'diana.hernandez',
        'dm_hdez@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$7YlvlynoJ48nKSWA5cev8e.GyWY7PZJQWtx4id/I2.A5k1I9BZUIG',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        216,
        'Manuel',
        'Negrette',
        'manuel.negrette',
        'malnegpa@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$l0QYbbdPHwAnWUoWNyWhDuRt7nfozYyuwMlsHIcC8m2lqh007/n12',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        217,
        'Mari',
        'Martínez',
        'mari.martinez',
        'g26mk17@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$A575F34w3QjmnmsDHIs98eAxPuoACcLQIPPwgT/7pmzz1BGLpqW9W',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        218,
        'Orlando',
        'Salamanca',
        'orlando.salamanca',
        'orlando.salamanca@smart-tap.co',
        '2021-06-29 23:00:43',
        '$2y$10$G1reviZu7TY8ECshfUXb6emVlaRtklfQOJqXKkzXruAJmxYj6d1JO',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        219,
        'Paola',
        'González',
        'paola.gonzalez',
        'marielbapg@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$sRo8X8ff7E21H1HHTEJXmey/FEtp66RRvqzJ5Ak0VJES72d/3nCnS',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        220,
        'Desiree',
        'Monger',
        'desiree.monger',
        'desireemonger@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$911QS03YvqdvvSgOpG4zeegqW5fA78bZhRGMlDFoBiztJTG1KVOCO',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        221,
        'Jose Keniel',
        'Barroso',
        'keniel.barroso',
        'cse.keniel@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$RhTZwFNYmUcIrWaWoBvjwe0Vqz8sxSwHcbh0xrLzqYYq0x5XfOube',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        222,
        'Emelyn',
        'Savedra',
        'emelyn.savedra',
        'emelynsavedra@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$dxcsWycGIPd1njt3nXRx..6zksgYvHjL7p2N38IpFOAhrT60lhCuK',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        223,
        'Danny',
        'Rivas',
        'danny.rivas',
        'd4rd24287@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$1FrDHVYRoCJQBFVU/3dQie1tIlEQ8aiA2I3FH/TpxaodF6..qZHn.',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        224,
        'Maglio',
        'Contreras',
        'maglio.contreras',
        'ing.mjcontreras@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$e6U5Hc4wi7IecqDuKOjAO.ZlxQuF2bstyX.1RlCJkMA.o.OlRiOau',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        225,
        'Zuleima',
        'Hernandez',
        'zuleima.hernandez',
        'zuleimaherr@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$W.vLdTwBqIAYKlO0yG1kde02oGhS2SV8NqLfavukWKm8iy0UHw0wC',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        226,
        'Camilo Andrés',
        'Muñoz',
        'camilo.muñoz',
        'camilo.munozb@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$zjfOxJpmGwEyharbDdfpWuVCzk4wpNS.6yZEPECwSjnRYDl.V6WRG',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        227,
        'Ernesto',
        'Gonzalez',
        'ernesto.gonzalez',
        'ernesto.gonzalez.pqv@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$ynuHIaeS247N2jGZ3xNhkuFFU3AxHuEWf/E6UVhbikn.7hZlYDaLG',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        228,
        'María',
        'Prieto',
        'maria.prieto',
        'mangelicaprieto@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$pLl5f2.T.j3eFh.K.hsR4uisCczxQV2FCyZRmXSQq9vx.mYPCP7BK',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        229,
        'Mireya',
        'Gonzalez',
        'mireya.gonzalez',
        'mireyagonzalezc05@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$DQWDQ98Nj3neR7TsBV4BU.1FW56F862acuVZSDXuszhfDx2mwvnSO',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        230,
        'Raiza',
        'Tua',
        'raiza.tua',
        'raizatua04@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$lyOT9dN59fjjXI8DRMj7VOf.h6MSaexCe6U5i8l4vjzhKJaqkixJG',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        231,
        'Maria Gabriela',
        'Galindez',
        'maria.galindez',
        'galindezgabriela95@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$dc1EtsqekfaTCtG9GaI0tOEEsKkDT06ZBDzbG2Zt7G2pAP1ew01ju',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        232,
        'Jose',
        'Laffont',
        'jose.laffont',
        'joseismael_10@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$Duwk/mr4pb5m.wcaNJVe6OK5sDSLzmY03emAXHlGGWj0bsvBJPu4u',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        233,
        'Wara',
        'Vargas',
        'wara.vargas',
        'waravargas@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$Q68BZODt68Mm2eU4/4Q9UOh2TuysXjyTZW36l3ty6lkIdOTuZbPoi',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        234,
        'Andrea',
        'Guaita',
        'andrea.guaita',
        'andreakgs@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$glfQ2aGCk3Bql.OyLQMxLe46CFpDFBhWHmCtwC7qN86DfflsPKIjC',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        235,
        'Raynelis',
        'Blanco',
        'raynelis.blanco',
        'raynelisb@yahoo.com',
        '2021-06-29 23:00:43',
        '$2y$10$Qmz109NmqveSnXMGgZL3qO8bruH/y8aLDdj6Dr8.besN9llrckGeO',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        236,
        'María',
        'López',
        'maria.lopez',
        'mangel19_@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$dA2VzZn30AhqU/zfr5P1HO0UWXhslJ3UHtEa3.WKL9YtAJX.XLpQq',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        237,
        'Itzel',
        'Rampolla',
        'itzel.rampolla',
        'rampolla68@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$k.FlnP0zRUZwyc28I6Ji9OyT/4d4UzaYNpYkhEp3Eotr8MwzaoAHm',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        238,
        'Herbert',
        'Madrid',
        'herbert.madrid',
        'herbertbmg@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$WY09iy06a6cyBRQGjAV19.gB4XegEYKh2ItBIKtgTeYFcDLKANQay',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        239,
        'Isabel',
        'Tallon',
        'isabel.tallon',
        'isabelmtallon@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$uLc6UsJfphVJSZYsQ9Alm.dy4LPZrJtdSlDB2tzPmqlOJ9awN4lGq',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        240,
        'Wilfredo',
        'Ramirez',
        'wilfredo.ramirez',
        'wilfredo84@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$dNt94iSB6NCK0HrzaaIdc.klB9DLI2g0nVb2hdS2CVkebqnit2g52',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        241,
        'Manuel',
        'Tallaferro',
        'manuel.tallaferro',
        'manueltallaferro@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$mRLQ8103qvTJfR7CBUnXguil5Yd9brILjeGTzKLRSkUTzC1Dxytzi',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        0,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2022-11-24 01:19:31',
        NULL
    ),
    (
        242,
        'Estela',
        'Lopez',
        'estela.lopez',
        'estelitalo19@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$tVHI0IZVcoEDUFZuqB0QSu1Uz3RY95.hwCekd5ZjVdsn8OhFVVsdG',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        243,
        'Susanna',
        'Gobbo',
        'susanna.gobbo',
        'sgobbocoin@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$1iKneePi3Dou0QwhnAHjeeA1hHt/7H2ZLBbysExsihC4rC4t8DEta',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        244,
        'Carlos',
        'Malaver',
        'carlos.malaver',
        'malavertossutcarlos@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$qo0P.Se19JnYgutH.G6Tye0NR9vzjn/YnZmF1q9Q4dkqKTpEDra26',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        245,
        'Marlon',
        'Sifontes',
        'marlon.sifontes',
        'msifontes1994@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$5IWa.YrAOp2BDraOHkamOOSTaDx.oMedL/c1MOvHvtlt8gGMz9NOm',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        246,
        'Yennire',
        'Carballo',
        'yennire.carballo',
        'yennire14cs@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$.GLHU2QqLkDe2y48N.p6SOWl6fK98asZDV43HiCDorfZh2mL3GUJO',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        247,
        'Yohimar',
        'Sivira',
        'yohimar.sivira',
        'yohimarsivira@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$edrQcvqmMPdfd3G2qCqVFuskyDsWRfuYTn2l5DY36Xy3HegEgllTO',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        0,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2022-11-24 01:19:43',
        NULL
    ),
    (
        248,
        'Lusmary',
        'Curvelo',
        'lusmary.curvelo',
        'lusma18@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$yKZGl6US2egEp46C5tup.OsSi.oKzgIAO/SARzIWRBZCOB8s.1q6K',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        249,
        'Clara',
        'Restrepo',
        'clara.restrepo',
        'claramrv@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$4YBybEE1rMvE1lJ9V3T25utbjutDu6qNDQAIMSHeH.OPlPqBWumau',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        250,
        'Mary',
        'Inciarte',
        'mary.inciarte',
        'Maryinciarte2@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$v8VV9ZcJfMi2mWqLd7af9OqjvS7bylaFJx8eezO6XTGBQuYXQnYcC',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        251,
        'María Daniela',
        'Hernández',
        'maria.hernandez',
        'mayelita6@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$Tn234ohZq1Z.Mg5a8NpDSeVaq8ikaQX02.dc7.Yo2dYDQs6s2bqQC',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        252,
        'Petra',
        'Sanchez',
        'petra.sanchez',
        'petruskasanchez@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$mwsEZgUSxMommm5qxE4.quI6EVUkLPwZ4ufwkMC8eRbwyTzvWo6U2',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        253,
        'Anabel',
        'Crosby',
        'anabel.crosby',
        'anabelbarisa27@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$7KNnugHXwe6R1E7e9Mfo3.Qmc9wLxL47NDVomL6FlCB/qrbfAmN1e',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        254,
        'Marivic',
        'Yepez',
        'marivic.yepez',
        'marivicy@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$we6iGXO/buBoWSGJ/EKBde2hBWDUSeIeI3yr8sEZ/3uF6ZApBsqb.',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        255,
        'María',
        'Ivirma',
        'maria.ivirma',
        'mj.ivirma@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$RfYK0/JLC28ya7Kce7WtAO0sWM.xCRqicR9CLZAjqcTfI8zatu46.',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        256,
        'Emilia',
        'Bermudez',
        'emilia.bermudez',
        'ebermudezh@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$.wEeSo1LO566X/sA35V2EO1T8KVctc1FFmiewLI9M9zp02nlxEfC6',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        257,
        'Alibet',
        'Brunet',
        'alibet.brunet',
        'alibru9105@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$ti9Pv2FsVvXZ0jT7YtbMzeAONfg9ZiSS4HGT/BZswID.rrz3av47W',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2021-11-10 19:37:22',
        NULL
    ),
    (
        258,
        'Daniela',
        'Lopez',
        'daniela.lopez',
        'dclodontologo@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$fQTKiGTCvz7FtkiXAR/5M.y1G0COvYaSG7VSJXmAnRUKvPLgz7C5K',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        259,
        'Yolimar',
        'Navas',
        'yolimar.navas',
        'yolimarnavascastillo@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$zCVTXImb0cFCyJShzNUPNurEwbs4n/B0U8teagwGMdsRvOa3XzM7S',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        260,
        'Kerlyn',
        'Suarez',
        'kerlyn.suarez',
        'kerlyn.karola@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$LZPQ.yge4EyKw3r6EWWkxOokZIlZUWXqVCyd2/NQ.BOxK0AxNOudO',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        261,
        'Mariana',
        'Hernández',
        'mariana.hernandez',
        'mariher70@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$QXuST5wF9SZj001btPW4tu2tGz9INqKbQD4Oaz4F4ZSGd03O2SK2O',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        262,
        'Milagros',
        'Vivas',
        'milagros.vivas',
        'milagrosvivas@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$cy9r7t8ZDIN8g1vqIHUUMOu1UzQxllD1EFok816FBucx3SuxK1hR.',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        263,
        'Leyla',
        'Humbria',
        'leyla.humbria',
        'humbrialeyla81@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$5Fgbg7QQIcqt6BhsIVHZ8eBSG33xxsqa540eX2gUyBxgEgZmW5CZi',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        264,
        'Samuel',
        'Cadenas',
        'samuel.cadenas',
        'cadenaspenasamueldavid@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$zqgrxFgFFYcUtNj3gYZCmucd/8TXYvp.lVkWNj8P.cmryAtGVw0Bm',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        265,
        'Jessica',
        'Castillo',
        'jessica.castillo',
        'jessicancastillo4@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$jVzcPf9HL9fDF6SdWM4ey.KiEUcfPR2Sh73XPcYQZUhCJPrBJXp2.',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        266,
        'Gerardo',
        'Martínez',
        'gerardo.martinez',
        'ragkaos@live.com',
        '2021-06-29 23:00:43',
        '$2y$10$x1Lvq364rdG.za/bLR13xekktPCjXQMiqsaZnMD3xca7XprHdXvmi',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        267,
        'Yaneth',
        'Ariza',
        'yaneth.ariza',
        'yanethjamaica@hotmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$7mJQrf0WjpkyhhtajbBfAudbpBtnWDqKUThFMO6Uumu6QuAkX2Y7e',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        268,
        'Placida',
        'Sosa',
        'placida.sosa',
        'placidarminda@gmail.com',
        '2021-06-29 23:00:43',
        '$2y$10$qggUbw2EIokqPBZeDhNDU.Ehlut71LopSK99Vm.aFPqpWSoAFpq5.',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ),
    (
        269,
        'test',
        'test',
        'taka',
        'test@test.com',
        NULL,
        '$2y$10$FXv8jzb4YelVHNuNRY1fXO7RpkZTCwoHbp.k/eUjtMn55kP3g9886',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        '2021-09-16 03:23:09',
        '2021-09-18 03:33:05',
        NULL
    ),
    (
        275,
        'Test',
        '123456',
        'test123456',
        '12346test@test.123',
        NULL,
        '$2y$10$8Ymag/.NKGEopD/tvU0O2OgvvH2MO.Y3vJNkQjyA492ckgn2ePNgy',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        '2022-01-14 23:51:00',
        '2022-01-14 23:51:48',
        NULL
    ),
    (
        276,
        'Clevia',
        'Pérez',
        'clevia.perez',
        'cleviaperezteacher@gmail.com',
        '2022-01-14 19:17:52',
        '$2y$10$FKsYaVKIzLt0U3G.VhIlJOvt/.RiJm34e7WBn.rCicjVBN8HwzkrK',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        '2022-01-15 00:15:09',
        '2022-11-24 01:19:20',
        NULL
    ),
    (
        277,
        'María',
        'Benitez',
        'maria.benitez',
        'mafe_benitez2@hotmail.com',
        NULL,
        '$2y$10$8w5v3.wm8vfCB0/KVfDBceNOyx5MUSKPHpUWsLLhiGn.KhuDPEIF.',
        NULL,
        NULL,
        'profile-photos/default_pp.jpg',
        NULL,
        0,
        NULL,
        NULL,
        NULL,
        NULL,
        '2022-01-15 00:24:30',
        '2022-11-24 01:19:39',
        NULL
    );

/*Data for the table `voucherables` */
insert into
    `voucherables`(
        `id`,
        `model_type`,
        `model_id`,
        `coupon_id`,
        `redeemed_at`,
        `created_at`,
        `updated_at`
    )
values
    (
        1,
        'App\\Models\\User',
        5,
        5,
        '2021-12-26 03:35:33',
        '2021-12-26 03:35:33',
        '2021-12-26 03:35:33'
    ),
    (
        2,
        'App\\Models\\User',
        5,
        6,
        '2022-01-12 03:48:31',
        '2022-01-12 03:48:31',
        '2022-01-12 03:48:31'
    );

/*Data for the table `websockets_statistics_entries` */
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;