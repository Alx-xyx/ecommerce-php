-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2025 a las 20:24:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kanso`
--
CREATE DATABASE IF NOT EXISTS `kanso` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kanso`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `collection`
--

CREATE TABLE `collection` (
  `collection_id` int(11) NOT NULL,
  `collection_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `collection`
--

INSERT INTO `collection` (`collection_id`, `collection_name`) VALUES
(1, 'Notebooks'),
(2, 'Pens'),
(3, 'Eraser'),
(4, 'Pencil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `marca_id` int(11) NOT NULL,
  `marca_name` varchar(100) NOT NULL,
  `marca_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`marca_id`, `marca_name`, `marca_img`) VALUES
(1, 'Kokuyo', NULL),
(2, 'Maruman', NULL),
(3, 'Pentel', NULL),
(4, 'Pilot', NULL),
(5, 'Mitsubishi', NULL),
(6, 'Seed', NULL),
(7, 'Tombow', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `product_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `img` varchar(256) DEFAULT NULL,
  `collection_id` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`product_id`, `name`, `brand_id`, `img`, `collection_id`, `descripcion`) VALUES
(1, 'Ale Campus Flat Kimochii Notebook B2 size', 1, 'assets/campus-kimochii-kokuyo.png', 1, 'Eleva tu experiencia de escritura con los libros de notas Campus Flat. Con su encuadernacion plana permite que este perfectamente plano cuando esta abierto, facilitando la escritura en cada parte del cuaderno y su papel de alta calidad, hace que el trabajo de escritura se vuelva un arte'),
(2, 'Spiral Note BASIC Notebook', 2, 'assets/spiral-note-basic.jpg', 1, 'Su diseño minimalista con robusta union convierten a este cuaderno en un fiel compañero para la toma de apuntes. Con sus paginas perforadas para su eliminacion facil, robustas cubiertas para una proteccion constante de sus notas y encuadernacion en espiral, vuelven facil el uso de este cuaderno'),
(3, 'Campus Twin Ring Grid Notebook', 1, 'assets/campus-twinRing-kokuyo.png', 1, 'Este cuaderno anillado con cuadricula hace que trabajos milimetricos sean faciles de realizar gracias a su lineas de rejilla gris las cuales no interfieren en la escritura y sus paginas microperdoradas para ser arrancadas del cuaderno sin dañar el mismo'),
(4, '1960 Spiral Notebook', 2, 'assets/1960_spiral_maruman.png', 1, 'Este clasico de 1960 vuelve a estos años de manera reinventada, pero manteniendo su durabilidad, ligereza y gran diseño. Cuenta con un papel mas suave y resistente para anotaciones rapidas ademas de una encuadernacion de espiral doble para soportar el desgaste diario'),
(5, 'Mnemosyne Ruled Ringed Notebook', 2, 'assets/mnemosyne-notebook-maruman.jpg', 1, 'Combinando el diseño elegante y la funcionalidad superior, el cuaderno Maruman Mnemosyne está diseñado para profesionales y creativos que necesitan una herramienta confiable y elegante para tomar notas y lluvias de ideas. Las páginas gobernadas y la estética minimalista aseguran que este cuaderno se vea bien y sirva como una plataforma versátil para capturar ideas.'),
(6, 'Calme Ballpoint Pen', 3, 'assets/calme-ballpoint-pentel.jpg', 2, 'Un nuevo bolígrafo liso a base de aceite con un diseño que armoniza con la gente y su entorno. Con un toque tranquilo, agarre de cuero y acabado mate suave, Calme está hecho para la comodidad diaria y el minimalismo reflexivo. Cuenta con un agarre suavemente texturizado, una tinta a base de aceite de baja viscosidad y un diseño dicreto'),
(7, 'Waai Frixion Erasable Ballpoint Pen Full Set', 4, 'assets/waai-frixion-pilot.jpg', 2, 'El Frixion Waai es un bolígrafo bolígrafo borrable caracterizado por sus nuevos colores de tinta que incorpora tendencias y un diseño corporal sencillo con una nueva forma redondeada. Los colores de la tinta incluyen el negro estándar y siete nuevos tonos, que suman ocho colores, bajo el concepto de modamente peculiaridad.'),
(8, 'Uniball One Gel Set', 5, 'assets/uniball-gel-mitsubishi.jpg', 2, 'Inspirada por la sutil belleza de los dulces japoneses y las flores de temporada, la serie uni-ball Japonesa Taste Color ofrece colores de tinta tranquilizadora y suave en un formato refinado y digno de regalo. Diseñado para aquellos que aprecian la elegancia discreta en sus herramientas de escritura cotidiana.'),
(9, 'Jetstream Lite Touch Ink Pen', 5, 'assets/jetstream-lite-mitsubishi.jpg', 2, 'El bolígrafo uni Jetstream combina el diseño elegante con tecnología de vanguardia Lite Touch Ink, ofreciendo una experiencia de escritura superior para profesionales, estudiantes y uso diario. Su flujo de tinta lisa, agarre ergonómico y su rendimiento de secado rápido lo convierten en la herramienta perfecta para una escritura precisa y cómoda.'),
(10, 'Tradio Pulaman Fountain Pen Marker', 3, 'assets/tradio-pulaman-pentel.jpg', 2, 'Disfrute de una sensacion de escritura flexible con la forma que aprovecha al maximo el Tradio Pulaman. Con la misma presion del boligrafo, usted puede tener un trazo mas grande o mas fino gracias a su punta flexible.'),
(11, 'Kadokeshi Plastic Eraser', 1, 'assets/kadokeshi-kokuyo.jpg', 3, 'Con 28 esquinas, este borrador asegura que no se quede sin bordes para borrar detalles finos. Fue presentado en la exposición Humble Masterpieces del Museo de Arte Moderno de 2004.'),
(12, 'Millikeshi Plastic Eraser', 1, 'assets/millikeshi-kokuyo.jpg', 3, 'Puedes elegir un ancho de borrador del pentagrama con diferentes espesores, haciéndolo perfecto para borrar una sola línea en un cuaderno.'),
(13, 'Sun Radar Eraser', 6, 'assets/sun-radar-seed.jpg', 3, 'La serie \'Radar\', conocida popularmente como el \'borrero en el caso azul\', presenta un nuevo \'Clear Radar\' que cuenta con una capacidad de borrado superior y transparencia.'),
(14, 'Mono dust catch Eraser', 7, 'assets/mono-dust-tombow.jpg', 3, 'El MONO Dust Catch Eraser by Tombow está diseñado para proporcionar una experiencia de borrado limpia mediante la recolección del polvo de borrador mientras lo usas. Su fórmula especial de polímero hace que los bits de borrado se agrupen y se peguen al borrador, evitando un desastre en su papel o espacio de trabajo'),
(15, 'Resare Extra White Eraser', 1, 'assets/resare-extra-kokuyo.jpg', 3, 'El Kokuyo Resare Extra White Eraser Premium Type se elabora a partir de una mezcla única de espuma y polímero para borrar precisa y limpia. A medida que lo usas, el polvo se acumula en grumos limpios que se pueden borrar fácilmente con los dedos.'),
(16, 'Mono Graph Lite Mechanical Pencil', 7, 'assets/mono-lite-tombow.jpg', 4, ''),
(17, 'Mono Graph Grip Mechanical Pencil Pale Tone', 7, 'assets/mono-grip-tombow.jpg', 4, ''),
(18, 'MONO Graph Mechanical Pencil Clear Version', 7, 'assets/mono-clear-tombow.jpg', 4, ''),
(19, 'MONO Work Mechanical Pencil', 7, 'assets/mono-work-tombow.jpg', 4, ''),
(20, 'MONO graph Mechanical Pencil Mineral Color', 7, 'assets/mono-graph-tombow.jpg', 4, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_r_size`
--

CREATE TABLE `product_r_size` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product_r_size`
--

INSERT INTO `product_r_size` (`id`, `product_id`, `size_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 3, 2),
(6, 3, 3),
(7, 3, 4),
(8, 4, 5),
(9, 5, 2),
(10, 5, 3),
(11, 5, 4),
(12, 5, 5),
(13, 6, 6),
(14, 6, 7),
(15, 6, 8),
(16, 7, 7),
(17, 8, 9),
(18, 9, 7),
(19, 9, 8),
(20, 10, 7),
(21, 11, 10),
(22, 12, 10),
(23, 13, 11),
(24, 14, 12),
(25, 15, 11),
(26, 16, 7),
(27, 17, 7),
(28, 18, 7),
(29, 19, 13),
(30, 20, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_r_type`
--

CREATE TABLE `product_r_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product_r_type`
--

INSERT INTO `product_r_type` (`id`, `product_id`, `type_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 3, 2),
(8, 4, 1),
(9, 5, 1),
(10, 6, 4),
(11, 7, 4),
(12, 8, 4),
(13, 9, 5),
(14, 10, 6),
(15, 11, 7),
(16, 12, 7),
(17, 13, 7),
(18, 14, 7),
(19, 15, 7),
(20, 16, 8),
(21, 17, 8),
(22, 18, 8),
(23, 19, 8),
(24, 20, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(256) NOT NULL,
  `collection_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `size`
--

INSERT INTO `size` (`size_id`, `size_name`, `collection_id`) VALUES
(1, 'B2', 1),
(2, 'A4', 1),
(3, 'B5', 1),
(4, 'A5', 1),
(5, 'A6', 1),
(6, '0.35mm', 2),
(7, '0.5mm', 2),
(8, '0.7mm', 2),
(9, '0.38mm', 2),
(10, '19x19x49mm', 3),
(11, '55x21x12mm', 3),
(12, '53x23x11mm', 3),
(13, '1.3mm', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type`
--

CREATE TABLE `type` (
  `type_id` int(11) UNSIGNED NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'Ruled'),
(2, 'Grid'),
(3, 'Blank'),
(4, 'Ballpoint'),
(5, 'Inkpen'),
(6, 'Pen Marker'),
(7, 'Eraser'),
(8, 'Pencil');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`marca_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `collection_id` (`collection_id`);

--
-- Indices de la tabla `product_r_size`
--
ALTER TABLE `product_r_size`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_r_type`
--
ALTER TABLE `product_r_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indices de la tabla `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `collection_id` (`collection_id`);

--
-- Indices de la tabla `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `product_r_size`
--
ALTER TABLE `product_r_size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `product_r_type`
--
ALTER TABLE `product_r_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `marca` (`marca_id`),
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`collection_id`) REFERENCES `collection` (`collection_id`);

--
-- Filtros para la tabla `product_r_type`
--
ALTER TABLE `product_r_type`
  ADD CONSTRAINT `product_r_type_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `productos` (`product_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_r_type_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`collection_id`) REFERENCES `collection` (`collection_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
