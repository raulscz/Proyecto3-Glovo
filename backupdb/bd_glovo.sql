-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2022 a las 22:11:31
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_glovo`
--
CREATE DATABASE IF NOT EXISTS `bd_glovo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_glovo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dirección`
--

CREATE TABLE `tbl_dirección` (
  `id` int(11) NOT NULL,
  `direccion_resta` varchar(250) NOT NULL,
  `id_resta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_dirección`
--

INSERT INTO `tbl_dirección` (`id`, `direccion_resta`, `id_resta`) VALUES
(1, 'C/ de Potosí, 2, 08030 Barcelona', 1),
(2, 'Via Augusta, 21, 08006 Barcelona', 2),
(3, 'C/ de Potosí, 2, 08030 Barcelona', 5),
(4, 'Carrer d\'Aribau, 113, 08036 Barcelona', 6),
(5, 'Centro Comercial Splau Cornellà de Llobregat', 7),
(6, 'Carrer Anselm Clavé, 15, 08470 Sant Celoni, Barcelona', 8),
(7, 'Passeig de la Zona Franca, 241, 08038 Barcelona', 9),
(8, 'Carrer de Casanova, 189, 08036 Barcelona', 10),
(9, 'Carrer del Comte Borrell, 188, 08029 Barcelona', 11),
(10, 'Carrer de Mèxic, 17, 08004 Barcelona', 12),
(11, 'C/ de Potosí, 2, 08030 Barcelona', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plato`
--

CREATE TABLE `tbl_plato` (
  `id` int(11) NOT NULL,
  `nombre_plato` varchar(30) NOT NULL,
  `desc_plato` varchar(100) NOT NULL,
  `precio_plato` decimal(5,2) NOT NULL,
  `img_plato` varchar(250) DEFAULT NULL,
  `id_seccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_plato`
--

INSERT INTO `tbl_plato` (`id`, `nombre_plato`, `desc_plato`, `precio_plato`, `img_plato`, `id_seccion`) VALUES
(1, 'Menú CBO', 'Menú completo de CBO con patatas y bebidas.', '7.99', 'uploads/cbo_mcd.png', 1),
(2, 'Menú Tres Quesos', 'Menú completo Tres Quesos Doble Grande con patatas y bebida', '14.99', 'uploads/mcmenu_mcd.png', 2),
(3, 'Aquarius', 'Bebida Aquarius de naranja o de limón', '1.80', 'uploads/aquarius_mcd.png', 3),
(4, 'Nuggets', 'uploads/Caja de nuggets para compartir.', '3.99', 'uploads/nuggets_mcd.png', 4),
(5, 'McFlurry', 'uploads/McFlurry con el topping', '1.49', 'uploads/flurry-mcd.png', 5),
(6, 'Combo Satisfayer', '1 Burger + 1 Bebida + 1 Vicio Fries', '15.90', 'uploads/satisfayer.jfif', 6),
(7, 'Bacon Cheeseburger', 'Doble smash burger de vaca, bacon crunchy, cheddar, pepinillo y salsa Vicio', '11.90', 'uploads/baconbuerguercheese.jfif', 7),
(8, 'Sex on the beach', '4 Burger + 4 Bebidas + 2 Vicio Fries + 2 Postres', '66.90', 'uploads/beach.jfif', 8),
(9, 'Cheesecake de Nutella', 'Cheesecake casera de nutella.', '6.50', 'uploads/chesee_vicio.jfif', 9),
(10, 'Coca-Cola', 'uploads/Coca-Cola Lata (33cl.)', '2.00', 'uploads/cocacola_mcd.png', 10),
(11, '7 FORMAGGI', 'Tomate, mozzarella, taleggio, pecorino sardo, gorgonzola, mozzarella, parmigiano reggiano y gruyère.', '11.99', 'uploads/pizza7_latagl.PNG', 11),
(12, 'Spaghetti', 'Pasta spaghetti fresca con salsa a elegir.', '7.99', 'uploads/pasta_latagl.jfif', 12),
(13, 'Lomo al pepe', 'Solomillo de cerdo con rigatone a la crema.', '8.99', 'uploads/carne_mld.PNG', 13),
(14, 'Nestea', 'Nestea en lata', '2.00', 'uploads/nestea_mcd.png', 14),
(15, ' Tutto cioccolato', 'Coulant de chocolate con helado al gusto', '3.99', 'uploads/tuttoc_latagl.PNG', 15),
(16, 'Hamburguesa La Pija', 'Hash brown de patatas, queso Gouda, salteado de portobellos y cebolla, aros de pimiento y canónigos.', '14.99', 'uploads/lapija_goiko.PNG', 16),
(17, 'Kevin Chick', 'Pollo empanado picado al estilo Kevin, bacon bits, cebolla crunchy y queso americano.', '7.99', 'uploads/chicken_goiko.PNG', 17),
(18, 'Nachorreo', ' Nachos bañados en chili con carne, guacamole, tomate, nata agria, jalapeños y enquésame', '3.99', 'uploads/nachos_goiko.PNG', 18),
(19, 'Mojito Moreno', 'Ron Santa Teresa, lima, hierbabuena, azúcar moreno y refresco de limón.', '3.99', 'uploads/mojito_goiko.PNG', 19),
(20, 'Frozen Bomb', 'Delicioso postre secreto a base de galleta de chocolate… ¡Ahora con corazón de Cheesecake!', '2.50', 'uploads/frozen_goiko.PNG', 20),
(21, 'Spaghetti Carbonara', 'Spaghettis recien hechos con salsa carbonara', '6.99', 'uploads/carbonara.jfif', 21),
(22, 'Pollo Con 4 Quesos', 'Pollo con una guarnición de patatas fritas y salsa de cuatro quesos.', '8.50', 'uploads/pollo4quesos.jfif', 22),
(23, 'Agua', 'Agua en botella 50cl.', '1.50', 'uploads/agua_mcd.png', 23),
(24, 'Crepe ', 'Crepe con bola de helado al gusto y sirope de chocolate', '3.99', 'uploads/crepe_mlp.PNG', 24),
(25, 'Sushi Salmón', '8 unidades de sushi con salmón ahumado y aguacate.', '2.99', 'uploads/sushi_taiyo.jfif', 25),
(26, 'Arroz Con Pollo', 'Arroz tres delicias con trozos de pollo', '2.50', 'uploads/arroz_taiyo.jfif', 26),
(27, 'Tallarines con pollo', 'Tallarines con verduras salteadas, huevo y pollo', '2.50', 'uploads/tallarines_taiyo.jfif', 27),
(28, 'Gyozas', 'Gyozas de pollo, verdura y ternera', '3.00', 'uploads/gyoza_taiyo.jfif', 28),
(29, 'Udon con ternera', 'Udon con verduras salteadas, huevo y ternera', '4.99', 'uploads/yakisoba.jfif', 29),
(30, 'Arroz Tres Delicias', '', '3.29', 'uploads/arros3d.jfif', 30),
(31, 'Pollo al limón', 'Pollo al limón y almendras salteadas', '5.49', 'uploads/pollolimon.jfif', 31),
(32, 'Mocchi', 'Bolitas de mocchi de coco, chocolate y fresa', '2.00', 'uploads/mochi.jfif', 32),
(33, 'Crunchy Wrap', 'Wrap con Salsa Nacho, crema agria, lechuga y tomate.', '4.59', 'uploads/wrap.jpg', 33),
(34, 'Crunchy Taco', 'Taco con Lechuga, queso Cheddar, crema agria y tomate.', '5.99', 'uploads/taco.jpg', 34),
(35, 'Quesadilla', 'Quesadilla con Salsa Creamy Jalapeño y doble de queso.', '2.50', 'uploads/quesadilla_tb.jpg', 35),
(36, 'Chessy Burrito', 'Burrito relleno de Carne picada, queso fundido y arroz.', '3.99', 'uploads/burrito.jpg', 36),
(37, 'Cerveza', 'Cerveza fría o natural en jarra.', '1.80', 'uploads/cerveza_mcd.png', 37),
(38, 'Sopa de Pollo', 'Sopa de pollo con fideos de arroz y verduras', '7.99', 'uploads/sopapollo.jfif', 38),
(39, 'Brochetas con Salsa', 'Brochetas de ternera con salsa maní', '4.99', 'uploads/brochetas.jfif', 39),
(40, 'Pescado Frito', 'Pescado frito al estilo tailandés', '7.99', 'uploads/pescadofrito.jfif', 40),
(41, 'Kluay Buat Chi', 'Plátano frito cocido y servido con leche de coco', '4.99', 'uploads/kluaybuatchi.jfif', 41),
(42, 'Fideos Thai', 'Fideos con ternera, pollo y cerdo y salsa de soja', '5.00', 'uploads/fideosthai.jfif', 42),
(43, 'Kadhi', 'Sopa india de yogur, cúrcuma y harina de garbanzos', '7.99', 'uploads/kadhi.jfif', 43),
(44, 'Chicken Kadai', 'Pechuga de pollo al horno con pimientos y especias típicas', '6.59', 'uploads/chickenkadai.jfif', 44),
(45, 'Curry con Gambas', 'Curry de Champiñones y Gambas', '4.69', 'uploads/currycongambas.jfif', 45),
(46, 'Kulfi', 'Helado con frutos secos trozeados y podas de cardamono.', '2.99', 'uploads/kulfi.jfif', 46),
(47, 'Biryani', 'Fideos con especias y carne, pescado o verdura', '6.50', 'uploads/biryani.jfif', 47),
(48, 'Chorizo a la Brasa', 'Chorizo criollo a la brasa', '5.99', 'uploads/chorizo_byl.jfif', 48),
(49, 'Ensalada Tropical', 'Ensalada tropical con frutas', '4.80', 'uploads/ensalada_byl.jfif', 49),
(50, 'Cheesecake', 'Cheesecake con sirope de frutas del bosque', '3.80', 'uploads/chesse_byl.jfif', 50),
(51, 'Agua', 'Agua en botella 30cl', '1.80', 'uploads/agua_mcd.png', 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_restaurante`
--

CREATE TABLE `tbl_restaurante` (
  `id` int(11) NOT NULL,
  `nombre_resta` varchar(30) NOT NULL,
  `desc_resta` varchar(250) NOT NULL,
  `horario_ini_resta` time NOT NULL,
  `horario_fi_resta` time NOT NULL,
  `img_resta` varchar(250) DEFAULT NULL,
  `correo_responsable` varchar(30) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_restaurante`
--

INSERT INTO `tbl_restaurante` (`id`, `nombre_resta`, `desc_resta`, `horario_ini_resta`, `horario_fi_resta`, `img_resta`, `correo_responsable`, `id_tipo`) VALUES
(1, 'Mc Donalds', 'Restaurante de comida rápida. Variedad de hamburguesas de carne a la parrilla y pollo arrebozado.', '08:00:00', '00:00:00', 'uploads/mc.jpg', 'raulscz10@gmail.com', 1),
(2, 'Vicio', 'Restaurante con una gran variedad de hamburguesas.', '13:00:00', '23:30:00', 'uploads/vicio.jpeg', 'raulscz10@gmail.com', 1),
(5, 'La Tagliatella', 'Restaurante con una gran variedad de comida italiana. Nuestra especialidad la pasta y las pizzas.', '14:00:00', '23:30:00', 'uploads/tagli.jfif', 'raulscz10@gmail.com', 4),
(6, 'Goiko Grill', 'Restaurante de comida rápida donde nuestra especialidad son las hamburguesas de todo tipo.', '12:00:00', '23:00:00', 'uploads/goiko.jpg', 'raulscz10@gmail.com', 1),
(7, 'Muerde La Pasta', 'Restaurante buffet libre donde podrás disfrutar de toda la variedad de platos y pastas.', '13:00:00', '23:30:00', 'uploads/mp.jpg', 'raulscz10@gmail.com', 8),
(8, 'Taiyo', 'Restaurante de comida japonesa donde podrás disfrutar de nuestra comida. También tenemos la opción de Buffet Libre.', '12:00:00', '23:45:00', 'uploads/tai.jpg', 'raulscz10@gmail.com', 5),
(9, 'Palacio Mandarín', 'Restaurante de comida china. Tenemos la opción de buffet libre.', '14:00:00', '23:30:00', 'uploads/pm.jfif', 'raulscz10@gmail.com', 2),
(10, 'Bang Bang Burritos', 'Restaurante de comida mexicana. Nuestra especialidad los burritos.', '09:00:00', '00:30:00', 'uploads/bbb.jpg', 'raulscz10@gmail.com', 7),
(11, 'Thai Spicy', 'Restaurante con comida típica de Tailandia', '20:00:00', '01:00:00', 'uploads/ts.jpg', 'raulscz10@gmail.com', 6),
(12, 'Sher-e-Punjab', 'Restaurante con comida típica de la India', '19:30:00', '00:30:00', 'uploads/sp.jpg', 'raulscz10@gmail.com', 3),
(13, 'Brasa Y Leña', 'Disfruta de la típica carne asada de Argentina', '12:00:00', '23:45:00', 'uploads/bl.jpg', 'raulscz10@gmail.com', 9),
(21, 'Pai Mei', 'Disfruta de la mejor comida china', '11:00:00', '00:00:00', 'uploads/paim.jpeg', 'raulscz10@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_review`
--

CREATE TABLE `tbl_review` (
  `id` int(11) NOT NULL,
  `coment_review` varchar(150) NOT NULL,
  `rating_review` int(3) NOT NULL,
  `id_resta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `id` int(11) NOT NULL,
  `nombre_rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`id`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_seccion`
--

CREATE TABLE `tbl_seccion` (
  `id` int(11) NOT NULL,
  `nombre_seccion` varchar(30) NOT NULL,
  `img_seccion` varchar(250) DEFAULT NULL,
  `id_resta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_seccion`
--

INSERT INTO `tbl_seccion` (`id`, `nombre_seccion`, `img_seccion`, `id_resta`) VALUES
(1, 'Lo más vendido', 'uploads/lmv_mcd.png', 1),
(2, 'McMenus', 'uploads/mc_mcd.png', 1),
(3, 'Bebibas', 'uploads/bebidas_mcd.png', 1),
(4, 'Complementos', 'uploads/complementos_mcd.png', 1),
(5, 'Postres y Helados', 'uploads/postres_mcd.png', 1),
(6, 'Lo más vendido', 'uploads/lmv_vicio.jfif', 2),
(7, 'Burgers & sides', 'uploads/burger_vicio.jfif', 2),
(8, 'Combos', 'uploads/combo_vicio.jfif', 2),
(9, 'Postres & Shakes', 'uploads/postres_vicio.jfif', 2),
(10, 'Bebidas', 'uploads/bebidas_vicio.jfif', 2),
(11, 'Pizzas', 'uploads/pizza_latagl.jfif', 5),
(12, 'Pastas', 'uploads/pasta_latagl.jfif', 5),
(13, 'Carnes', 'uploads/carnes_latagl.jfif', 5),
(14, 'Bebidas', 'uploads/bebidas_latagl.jfif', 5),
(15, 'Postres & Cafes', 'uploads/postres_latagl.jfif', 5),
(16, 'Lo más vendido', 'uploads/lmd_goiko.jfif', 6),
(17, 'Hamburguesas', 'uploads/burguer_goiko.jfif', 6),
(18, 'Complementos', 'uploads/complemento_goiko.png', 6),
(19, 'Bebidas', 'uploads/bebidas_goiko.jfif', 6),
(20, 'Postres', 'uploads/postres_goiko.jfif', 6),
(21, 'Pasta', 'uploads/pasta_mlp.jfif', 7),
(22, 'Carne', 'uploads/carne_mld.PNG', 7),
(23, 'Bebidas', 'uploads/bebidas_tb.jpg', 7),
(24, 'Postres & Cafes', 'uploads/postres_mlp.jfif', 7),
(25, 'Sushi', 'uploads/sushi_taiyo.jfif', 8),
(26, 'Arroz', 'uploads/arroz_taiyo.jfif', 8),
(27, 'Fideos', 'uploads/fideos_taiyo.jfif', 8),
(28, 'Al vapor', 'uploads/vapor_taiyo.jfif', 8),
(29, 'Fideos', 'uploads/fideos_pm.jfif', 9),
(30, 'Arroz', 'uploads/arroz_pm.jfif', 9),
(31, 'Carnes', 'uploads/carnes_pm.jfif', 9),
(32, 'Postres', 'uploads/postres_pm.jfif', 9),
(33, 'Lo más vendido', 'uploads/lmv_tb.jpg', 10),
(34, 'Tacos', 'uploads/tacos_tb.jpg', 10),
(35, 'Quesadillas', 'uploads/quesadilla_tb.jpg', 10),
(36, 'Burros', 'uploads/burro_tb.jpg', 10),
(37, 'Bebidas & Postres', 'uploads/bebidas_tb.jpg', 10),
(38, 'Sopas', 'uploads/sopa_thai.jfif', 11),
(39, 'Carnes', 'uploads/carnes_thai.jfif', 11),
(40, 'Pescados', 'uploads/pescados_thai.jfif', 11),
(41, 'Postres', 'uploads/postres_thai.jfif', 11),
(42, 'Pasta & Fideos', 'uploads/fideos_thai.jfif', 11),
(43, 'Sopas', 'uploads/sopa_shei.jfif', 12),
(44, 'Carnes', 'uploads/carnes_sher.jfif', 12),
(45, 'Pescados', 'uploads/pescado_sher.jfif', 12),
(46, 'Postres', 'uploads/postres_sher.jfif', 12),
(47, 'Pasta & Fideos', 'uploads/fideos_sher.jfif', 12),
(48, 'Carnes', 'uploads/carnes_byl.jfif', 13),
(49, 'Complementos', 'uploads/guarniciones_byl.jfif', 13),
(50, 'Postres', 'uploads/postres_byl.jfif', 13),
(51, 'Bebidas', 'uploads/bebidas_tb.jpg', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo`
--

CREATE TABLE `tbl_tipo` (
  `id` int(11) NOT NULL,
  `nombre_tipo` varchar(30) NOT NULL,
  `img_tipo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_tipo`
--

INSERT INTO `tbl_tipo` (`id`, `nombre_tipo`, `img_tipo`) VALUES
(1, 'Comida Rapida', 'uploads/c_rap.png'),
(2, 'Chino', 'uploads/c_china.png'),
(3, 'Indio', 'uploads/c_ind.png'),
(4, 'Italiano', 'uploads/c_italiana.png'),
(5, 'Japonés', 'uploads/c_japo.png'),
(6, 'Tailandés', 'uploads/c_tai.png'),
(7, 'Mexicano', 'uploads/c_mex.png'),
(8, 'Buffet Libre', 'uploads/c_buff.png'),
(9, 'Argentino', 'uploads/c_arg.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nombre_user` varchar(30) NOT NULL,
  `apellido_user` varchar(30) NOT NULL,
  `dni_user` varchar(10) NOT NULL,
  `edad_user` int(3) NOT NULL,
  `correo_user` varchar(40) NOT NULL,
  `pass_user` varchar(250) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nombre_user`, `apellido_user`, `dni_user`, `edad_user`, `correo_user`, `pass_user`, `id_rol`) VALUES
(1, 'Admin', 'Admin', '0000000R', 21, 'admin@admin.com', '1234', 1),
(8, 'Prueba', 'Prueba', '47239829X', 45, 'prueba@prueba.com', '12345678', 2),
(9, 'Prueba', 'Prueba', '47239829X', 34, 'prueba@prueba.com', '123456789', 2),
(10, 'Prueba', 'Prueba456', '47239829I', 34, 'prueba@prueba.com', '12345678', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_dirección`
--
ALTER TABLE `tbl_dirección`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_resta` (`id_resta`);

--
-- Indices de la tabla `tbl_plato`
--
ALTER TABLE `tbl_plato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_seccion` (`id_seccion`);

--
-- Indices de la tabla `tbl_restaurante`
--
ALTER TABLE `tbl_restaurante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_resta` (`id_resta`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_seccion`
--
ALTER TABLE `tbl_seccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_resta` (`id_resta`);

--
-- Indices de la tabla `tbl_tipo`
--
ALTER TABLE `tbl_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_dirección`
--
ALTER TABLE `tbl_dirección`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_plato`
--
ALTER TABLE `tbl_plato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `tbl_restaurante`
--
ALTER TABLE `tbl_restaurante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_seccion`
--
ALTER TABLE `tbl_seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo`
--
ALTER TABLE `tbl_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_dirección`
--
ALTER TABLE `tbl_dirección`
  ADD CONSTRAINT `tbl_dirección_ibfk_1` FOREIGN KEY (`id_resta`) REFERENCES `tbl_restaurante` (`id`);

--
-- Filtros para la tabla `tbl_plato`
--
ALTER TABLE `tbl_plato`
  ADD CONSTRAINT `tbl_plato_ibfk_1` FOREIGN KEY (`id_seccion`) REFERENCES `tbl_seccion` (`id`);

--
-- Filtros para la tabla `tbl_restaurante`
--
ALTER TABLE `tbl_restaurante`
  ADD CONSTRAINT `tbl_restaurante_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tbl_tipo` (`id`);

--
-- Filtros para la tabla `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD CONSTRAINT `tbl_review_ibfk_1` FOREIGN KEY (`id_resta`) REFERENCES `tbl_restaurante` (`id`);

--
-- Filtros para la tabla `tbl_seccion`
--
ALTER TABLE `tbl_seccion`
  ADD CONSTRAINT `tbl_seccion_ibfk_1` FOREIGN KEY (`id_resta`) REFERENCES `tbl_restaurante` (`id`);

--
-- Filtros para la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tbl_rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
