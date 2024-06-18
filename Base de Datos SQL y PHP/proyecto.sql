-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-04-2020 a las 08:32:35
-- Versión del servidor: 5.7.29-0ubuntu0.18.04.1
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_id` int(10) UNSIGNED NOT NULL,
  `estreno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id`, `name`, `artist_id`, `estreno`, `descripcion`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Divinely Uninspired to a Hellish Extent', 3, '2019', 'Divinely Uninspired to a Hellish Extent es el primer álbum de estudio del cantante y compositor británico Lewis Capaldi, lanzado el 17 de mayo de 2019 bajo el sello de Virgin EMI Records.', 'https://images-na.ssl-images-amazon.com/images/I/61-K3qJWGYL._SL1200_.jpg', 'divinely-uninspired-to-a-hellish-extent', NULL, NULL),
(2, 'Breach', 3, '2018', 'Breach es la segunda obra extendida del cantautor escocés Lewis Capaldi. Fue lanzado como una descarga digital el 8 de noviembre de 2018. Incluye los singles \"Tough\", \"Grace\" y \"Someone You Loved\" y una demostración de \"Something Borrowed\".', 'https://img.discogs.com/nWSTOU8JJHIlc8bh50DjikQQMRs=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-12854492-1544468151-9899.jpeg.jpg', 'breach', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

CREATE TABLE `event` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `event`
--

INSERT INTO `event` (`id`, `name`, `user_id`, `description`, `texto`, `slug`, `fecha`, `image`, `image2`, `image3`, `image4`, `created_at`, `updated_at`) VALUES
(1, 'Lollapalooza', 3, 'en Lollapalooza Argentina', 'Lollapalooza​ es un festival musical de los Estados Unidos que originalmente ofrecía bandas de rock alternativo, indie y punk rock; también hay actuaciones cómicas y de danza. Concebido en 1991 por Perry Farrell, cantante de Jane\'s Addiction, Lollapalooza se realizó anualmente hasta 1997 y fue revivido en 2003.', 'lewiscapaldi-lollapalooza', '30/06/2020', 'https://www.nacionrock.com/wp-content/uploads/lollapalooza.gif.png', NULL, NULL, NULL, NULL, NULL),
(2, 'Coachella', 3, 'en el Festival de Música y Artes de Coachella Valley', 'El Festival de Música y Artes de Coachella Valley es un gran festival de música que se desarrolla durante tres días en la última semana del mes de abril y tiene lugar en Indio, California, Estados Unidos.', 'lewiscapaldi-coachella', '18/10/2020', 'https://theblondeandthebrunette.com/wp-content/uploads/2017/04/festivalparties-header.jpg', NULL, NULL, NULL, NULL, NULL),
(3, 'Cocacola Music Experience', 3, 'en Cocacola Music Experience', 'La novena edición de Coca-Cola Music Experience puso el listón por las nubes, ¡nos flipó tantísimo! Disfrutamos a saco, nos movimos con cada temazo y lo mejor de todo: pudimos disfrutarlo durante dos días con todos los #CCMELovers.¿Qué si nos van los retazos? ¡Lo tenemos claro! Y este año la vaina va de esto: ¡una décima edición de locura, ritmazo y mucho bailoteo del bueno! Además, se nos va a ir la cabeza muchísimo con todos los sorpresones que os tenemos preparados, ¡van a ser cremita de la buena!Así que, amigas y amigos, aquí llega la fecha más esperada de todos los tiempos: 18 y 19 de septiembre en el recinto la Caja Mágica de Madrid. ¡Marcadlo a fuego en vuestros calendarios! Lo que va a pasar no va a tener nombre. Bueno sí, se llamará CCME 2020 y va a ser lo máximo. Preparaos para bajar hasta el suelo, bailar durante dos días de principio a fin y gozar con vuestros amigos del que será, estamos seguros, el festivalazo de vuestras vidas.', 'lewiscapaldi-cocacola', '18/09/2020', 'https://www.cocacola.es/content/dam/GO/CokeZone/Spain/CCME/20200305_Mockup_Cartel_Ciego.jpg', NULL, NULL, NULL, NULL, NULL),
(4, 'Festival', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut imperdiet ipsum, at vulputate nibh.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut imperdiet ipsum, at vulputate nibh. Phasellus semper enim metus, sed ullamcorper quam blandit non. Pellentesque nec laoreet quam, non euismod magna. Morbi mauris dui, posuere at imperdiet eget, ullamcorper non massa. Aenean eu purus ullamcorper tellus sollicitudin volutpat quis sit amet arcu. Nunc dapibus malesuada purus. Pellentesque suscipit luctus lacus a pulvinar. In gravida lacus mattis nulla tempor, venenatis lacinia ex efficitur. Cras elit elit, semper ac diam in, malesuada imperdiet arcu.', 'festival', '05/08/2020', 'https://www.mastersofhardcore.com/wp-content/uploads/2019/07/Schermafbeelding-2019-07-20-om-22.15.52-1280x853.png', NULL, NULL, NULL, NULL, NULL),
(7, 'F30R03', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et tellus suscipit, venenatis metus non, ultrices lacus. Donec finibus enim et tellus malesuada venenatis. Proin ac accumsan massa. Ut finibus enim eu metus facilisis, elementum imperdiet ex cursus. Fusce egestas consectetur libero, sit amet congue est tempor quis. Proin nec euismod nisi. Ut vehicula odio et ornare facilisis. Vivamus quis mollis metus, commodo posuere orci. Suspendisse eu orci eget ante porttitor imperdiet. Curabitur eu dolor a metus tempor consectetur vel vitae lectus. In non erat sed augue semper interdum. Morbi nulla ligula, dignissim at dolor ut, cursus interdum magna.', 'bulla-palusa', '30/07/2020', 'https://s3.eu-west-3.amazonaws.com/rbfweb/festivals/January2020/jUp12DUlYeolNRuotPD0.jpg', NULL, NULL, NULL, NULL, NULL),
(8, 'Di Pepo', 5, 'Mauris et risus non eros maximus tincidunt.', 'Mauris et risus non eros maximus tincidunt. Aenean hendrerit arcu tellus, dapibus sollicitudin eros commodo a. Pellentesque turpis sem, posuere eu tellus at, pellentesque viverra dolor. Nunc elementum sem eget varius rutrum. Quisque consectetur augue quis est feugiat, sed molestie orci volutpat. Morbi eget felis sollicitudin, iaculis eros ut, fermentum ex. Ut tempor diam et est molestie posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'di-pepo', '20/09/2020', 'https://estaticos.elperiodico.com/resources/jpg/7/2/preparativos-croisette-edicion-del-festival-cannes-1557764672927.jpg', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'EDM', 'edm', NULL, NULL),
(2, 'Rock', 'rock', NULL, NULL),
(3, 'Jazz', 'jazz', NULL, NULL),
(4, 'Dubstep', 'dubstep', NULL, NULL),
(5, 'Techno', 'techno', NULL, NULL),
(6, 'Indie Rock', 'indie-rock', NULL, NULL),
(7, 'Pop', 'pop', NULL, NULL),
(8, 'Hip-Hop', 'hip-hop', NULL, NULL),
(9, 'Country', 'country', NULL, NULL),
(10, 'Rhythm and Blues', 'rhythm-and-blues', NULL, NULL),
(11, 'Clásica', 'clasica', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_04_02_152448_create_generos_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2015_04_08_155641_create_album_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_04_01_170749_create_users_follow_table', 1),
(7, '2020_04_01_172437_create_playlist_table', 1),
(8, '2020_04_01_173206_create_songs_table', 1),
(9, '2020_04_01_173804_create_songs_playlist_table', 1),
(10, '2020_04_01_174026_create_event_table', 1),
(11, '2020_04_01_174721_create_user_follow_event_table', 1),
(12, '2020_04_12_111803_user_follow_playlist', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE `playlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `playlist`
--

INSERT INTO `playlist` (`id`, `user_id`, `name`, `slug`, `image`, `description`, `created_at`, `updated_at`) VALUES
(4, 22, 'Marlon', 'marlon', 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/adrian-roma-marlon-4-1560848662.jpg?crop=1.00xw:0.667xh;0,0.0702xh&resize=480:*', 'Hola como estas mi bella rosa\nCada día luces más hermosa\nSabes una cosa mi preciosa\nEs una bendición que seas mi esposa\nSon tantas cosas las que yo quiero decir\nPor ejemplo lo que siento yo al verte sonreír.', NULL, NULL),
(5, 3, 'Raining in Osaka', 'raining-in-osaka', 'https://cdn.cheapoguides.com/wp-content/uploads/sites/3/2019/01/Alley-Osaka-Rain.jpg', 'RAINING IN OSAKA (Lofi HipHop). 0.00 | 19:11. Previous track Play or pause track Next track. Enjoy the full SoundCloud experience with our free app.', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs`
--

CREATE TABLE `songs` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_id` int(10) UNSIGNED NOT NULL,
  `genero_id` int(10) UNSIGNED NOT NULL,
  `album_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estreno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `letra` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fondo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `songs`
--

INSERT INTO `songs` (`id`, `url`, `name`, `artist_id`, `genero_id`, `album_id`, `image`, `estreno`, `slug`, `letra`, `fondo`, `video`, `description`, `created_at`, `updated_at`) VALUES
(10, 'https://www.trollers.es/archivos/music/10_Joel_Corry_Lonely.mp3', 'Lonely', 1, 7, 1, 'https://www.trollers.es/archivos/portadas/portada1.jpg', '2020', 'lonely', 'L-l-l-l-lonely, l-l-l-l-lonely\r\nL-l-l-l-lonely now\r\nYou were the one who said it\'s over\r\nNow you wanna come back\r\nSo take your hand off my shoulder\r\nThis time it\'s not like that, \'cause I know where your heart\'s at\r\nI know you like to be alone, but hate being lonely\r\nWhen you see me doing well, that\'s when you call me\r\nNow I\'m doing fine, don\'t need you in my life\r\nI guess you\'re missing me now\r\nJust because you\'re lonely, doesn\'t mean we go back to the start\r\nJust because you\'re lonely, don\'t mean that you can play with my heart\r\nWho do you think you are?\r\nJust because you\'re lonely, doesn\'t mean we go back to the start\r\nJust because you\'re lonely, don\'t mean that you can play with my heart\r\nWho do you think you are?\r\nYou say you\'ve changed and you\'re different\r\nBut I don\'t wanna hear that\r\nYour friends are saying that you miss me\r\nBut I don\'t really know that, \'cause I know where your heart\'s at\r\nI know you like to be alone, but hate being lonely\r\nWhen you see me doing well, that\'s when you call me\r\nNow I\'m doing fine, don\'t need you in my life\r\nI guess you\'re missing me now\r\nJust because you\'re lonely, doesn\'t mean we go back to the start\r\nJust because you\'re lonely, don\'t mean that you can play with my heart\r\nWho do you think you are?\r\nL-l-l-l-lonely, l-l-l-l-lonely\r\nL-l-l-l-lonely now\r\nL-l-l-l-lonely, l-l-l-l-lonely\r\nL-l-l-l-lonely now\r\nYou don\'t have to lie, lie, lie, lie, lie\r\nYou can speak your mind, mind, mind, mind, mind\r\nYou don\'t have to lie, lie, lie, lie, lie\r\nYou could\'ve been mine, mine, mine, mine, mine\r\nJust because you\'re lonely, doesn\'t mean we go back to the start\r\nJust because you\'re lonely, don\'t mean that you can play with my heart\r\nWho do you think you are?\r\nL-l-l-l-lonely, l-l-l-l-lonely\r\nL-l-l-l-lonely now\r\nL-l-l-l-lonely, l-l-l-l-lonely\r\nL-l-l-l-lonely now\r\nJust because you\'re lonely', NULL, NULL, NULL, NULL, NULL),
(11, 'https://www.trollers.es/archivos/music/11_Eminem_Godzilla.mp3', 'Godzilla', 2, 8, 1, 'https://www.trollers.es/archivos/portadas/portada2.jpg', '2020', 'godzilla', 'I can swallow a bottle of alcohol and I\'ll feel like Godzilla\r\nBetter hit the deck like the card dealer\r\nMy whole squad\'s in here, walking around the party\r\nA cross between a zombie apocalypse and big Bobby The\r\nBrain Heenan which is probably the\r\nSame reason I wrestle with mania\r\nShady\'s in this bitch, I\'m posse\'d up\r\nConsider it to cross me a costly mistake\r\nIf they sleepin\' on me, the hoes better get insomnia\r\nAdhd, Hydroxycut\r\nPass the Courvoisi\' (ayy, ayy)\r\nIn AA with an AK, melee, finna set it like a playdate\r\nBetter vacate, retreat like a vacay, mayday (ayy)\r\nThis beat is cray-cray, Ray J, H-A-H-A-H-A\r\nLaughing all the way to the bank, I spray flames\r\nThey cannot tame or placate the\r\nMonster (ayy)\r\nYou get in my way, I\'ma feed you to the monster (yeah)\r\nI\'m normal…', NULL, NULL, NULL, NULL, NULL),
(12, 'https://www.trollers.es/archivos/music/12_Lewis_Capaldi_Someone_You_Loved.mp3', 'Someone You Loved', 3, 7, 1, 'https://www.trollers.es/archivos/portadas/portada3.jpg', '2019', 'someone-you-loved', 'I\'m going under and this time I fear there\'s no one to save me\r\nThis all or nothing really got a way of driving me crazy\r\nI need somebody to heal\r\nSomebody to know\r\nSomebody to have\r\nSomebody to hold\r\nIt\'s easy to say\r\nBut it\'s never the same\r\nI guess I kinda liked the way you numbed all the pain\r\nNow the day bleeds\r\nInto nightfall\r\nAnd you\'re not here\r\nTo get me through it all\r\nI let my guard down\r\nAnd then you pulled the rug\r\nI was getting kinda used to being someone you loved\r\nI\'m going under and this time I fear there\'s no one to turn to\r\nThis all or nothing way of loving got me sleeping without you\r\nNow, I need somebody to know\r\nSomebody to heal\r\nSomebody to have\r\nJust to know how it feels\r\nIt\'s easy to say but it\'s never the same\r\nI guess I kinda liked the way you helped me…', NULL, NULL, NULL, NULL, NULL),
(13, 'https://www.trollers.es/archivos/music/13_Billie_Eilish_everything_i_wanted.mp3', 'everything i wanted', 4, 7, 1, 'https://www.trollers.es/archivos/portadas/portada4.jpg', '2019', 'everything-i-wanted', 'I had a dream\r\nI got everything I wanted\r\nNot what you\'d think\r\nAnd if I\'m being honest\r\nIt might\'ve been a nightmare\r\nTo anyone who might care\r\nThought I could fly (fly)\r\nSo I stepped off the Golden, mm\r\nNobody cried (cried, cried, cried, cried)\r\nNobody even noticed\r\nI saw them standing right there\r\nKinda thought they might care (might care, might care)\r\nI had a dream\r\nI got everything I wanted\r\nBut when I wake up, I see\r\nYou with me\r\nAnd you say, As long as I\'m here\r\nNo one can hurt you\r\nDon\'t wanna lie here\r\nBut you can learn to\r\nIf I could change\r\nThe way that you see yourself\r\nYou wouldn\'t wonder why you hear\r\nThey don\'t deserve you\r\nI tried to scream\r\nBut my head was underwater\r\nThey called me weak\r\nLike I\'m not just somebody\'s daughter\r\nCoulda been a nightmare\r\nBut it felt like they were…', NULL, NULL, NULL, NULL, NULL),
(14, 'https://www.trollers.es/archivos/music/14_Trevor_Daniel_Falling.mp3', 'Falling', 5, 7, 1, 'https://www.trollers.es/archivos/portadas/portada5.jpg', '2018', 'falling', 'My last made me feel like I would never try again\r\nBut when I saw you, I felt something I never felt\r\nCome closer, I\'ll give you all my love\r\nIf you treat me right, baby, I\'ll give you everything\r\nMy last made me feel like I would never try again\r\nBut when I saw you, I felt something I never felt\r\nCome closer, I\'ll give you all my love\r\nIf you treat me right, baby, I\'ll give you everything\r\nTalk to me, I need to hear you need me like I need you\r\nFall for me, I wanna know you feel how I feel for you, love\r\nBefore you, baby, I was numb, drown the pain by pouring up\r\nSpeeding fast on the run, never want to get caught up\r\nNow you the one that I\'m calling\r\nSwore that I\'d never forget, don\'t think I\'m just talking\r\nI think I might go all in, no exceptions, girl, I need ya\r\nFeeling like I\'m out of my mind, \'cause I can\'t get enough\r\nOnly one that I give my time, \'cause I got time for ya\r\nMight make an exception for ya, \'cause I been feeling ya\r\nThink I might be out of my mind, I think that you\'re the one\r\nMy last made me feel like I would never try again\r\nBut when I saw you, I felt something I never felt\r\nCome closer, I\'ll give you all my love\r\nIf you treat me right, baby, I\'ll give you everything\r\nMy last made me feel like I would never try again\r\nBut when I saw you, I felt something I never felt\r\nCome closer, I\'ll give you all my love\r\nIf you treat me right, baby, I\'ll give you everything\r\nI\'ll never give my all again\r\n\'Cause I\'m sick of falling down\r\nWhen I open up and give my trust\r\nThey find a way to break it down\r\nTear me up inside, and you break me down', NULL, NULL, NULL, NULL, NULL),
(15, 'https://www.trollers.es/archivos/music/15_Dua_Lipa_Physical.mp3', 'Physical', 6, 7, NULL, 'https://www.trollers.es/archivos/portadas/portada6.jpg', '2020', 'physical', 'Common love isn\'t for us\r\nWe created something phenomenal\r\nDon\'t you agree?\r\nDon\'t you agree?\r\nYou got me feeling diamond rich\r\nNothing on this planet compares to it\r\nDon\'t you agree?\r\nDon\'t you agree?\r\nWho needs to go to sleep, when I got you next to me?\r\nAll night I\'ll riot with you\r\nI know you got my back and you know I got you\r\nSo come on, come on, come on\r\nLet\'s get physical\r\nLights out and follow the noise\r\nBaby keep on dancing like you ain\'t got a choice\r\nSo come on, come on, come on\r\nLet\'s get physical\r\nAdrenaline keeps on rushing in\r\nLove the simulation we\'re dreaming in\r\nDon\'t you agree?\r\nDon\'t you agree?\r\nI don\'t wanna live another life\r\n\'Cause this one\'s pretty nice\r\nLiving it up\r\nWho needs to go to sleep, when I got you next to me?\r\nAll night I\'ll riot with you\r\nI know you got…', NULL, NULL, NULL, NULL, NULL),
(16, 'https://www.trollers.es/archivos/music/16_Harry_Styles_Adore_You.mp3', 'Adore You', 7, 7, NULL, 'https://www.trollers.es/archivos/portadas/portada7.jpg', '2019', 'adore-you', 'Walk in your rainbow paradise (paradise)\r\nStrawberry lipstick state of mind (state of mind)\r\nI get so lost inside your eyes\r\nWould you believe it?\r\nYou don\'t have to say you love me\r\nYou don\'t have to say nothing\r\nYou don\'t have to say you\'re mine\r\nHoney\r\nI\'d walk through fire for you\r\nJust let me adore you\r\nOh, honey\r\nI\'d walk through fire for you\r\nJust let me adore you\r\nLike it\'s the only thing I\'ll ever do\r\nLike it\'s the only thing I\'ll ever do\r\nYour wonder under summer skies (summer skies)\r\nBrown skin and lemon over ice\r\nWould you believe it?\r\nYou don\'t have to say you love me\r\nI just wanna tell you something\r\nLately you\'ve been on my mind\r\nHoney\r\nI\'d walk through fire for you\r\nJust let me adore you\r\nOh, honey\r\nI\'d walk through fire for you\r\nJust let me adore you\r\nLike it\'s the only thing I\'ll ever do\r\nLike it\'s the only thing I\'ll ever do\r\nI\'d walk through fire for you\r\nJust let me adore you\r\nOh, honey\r\nI\'d walk through fire for you\r\nJust let me adore you\r\nLike it\'s the only thing I\'ll ever do\r\nI\'d walk through fire for you\r\nJust let me adore you\r\nOh, honey\r\nOh, honey\r\nI\'d walk through fire for you\r\nJust let me adore you\r\nOh, honey\r\nJust let me adore you\r\nLike it\'s the only thing I\'ll ever do', NULL, NULL, NULL, NULL, NULL),
(17, 'https://www.trollers.es/archivos/music/17_Halsey_You_should_be_sad.mp3', 'You should be sad', 8, 7, NULL, 'https://www.trollers.es/archivos/portadas/portada8.jpg', '2020', 'you-should-be-sad', 'I wanna start this out and say\nI gotta get it off my chest\nGot no anger, got no malice\nJust a little bit of regret\nKnow nobody else will tell you\nSo there\'s some things I gotta say\nGonna jot it down and then get it out\nAnd then I\'ll be on my way\nNo, you\'re not half the man you think that you are\nAnd you can\'t fill the hole inside of you with money, drugs and cars\nI\'m so glad I never ever had a baby with you\n\'Cause you can\'t love nothin\' unless there\'s somethin\' in it for you\nOh, I feel so sorry\nI feel so sad\nI tried to help you\nIt just made you mad\nAnd I had no warnin\'\nAbout who you are\nI\'m just glad I made it out without breakin\' down\nAnd then ran so fuckin\' far\nThat you would never ever touch me again\nWon\'t see your alligator tears\n\'Cause, no, I\'ve had enough of them\nLet me start this off by sayin\'\nI really meant well from the start\nTake a broken man right in my hands\nAnd then put back all his parts\nBut you\'re not half the man you think that you are\nAnd you can\'t fill the hole inside of you with money, girls and cars\nI\'m so glad I never ever had a baby with you\n\'Cause you can\'t love nothin\' unless there\'s somethin\' in it for you\nOh, I feel so sorry (I feel so sorry)\nI feel so sad (I feel so sad)\nI tried to help you (I tried to help you)\nIt just made you mad\nAnd I had no warnin\' (I had no warnin\')\nAbout who you are (\'bout who you)\nJust glad I made it out without breakin\' down\nOh, I feel so sorry (I feel so sorry)\nI feel so sad (I feel so sad)\nI tried to help you (I tried to help you)\nIt just made you mad\nAnd I had no warnin\' (I had no)\nAbout who you are (\'bout who you)\n\'Bout who you are\nHey\nHey\nHey\nHey\n\'Cause you\'re not half the man you think that you are\nAnd you can\'t fill the hole inside of you with money, drugs and cars\nI\'m so glad I never ever had a baby with you\n\'Cause you can\'t love nothin\' unless there\'s somethin\' in it for you\nI feel so sad\nYou should be sad\nYou should be\nYou should be sad\nYou should be\nYou should be\nYou should be', NULL, NULL, NULL, NULL, NULL),
(18, 'https://www.trollers.es/archivos/music/18_Meduza_Lose_Control.mp3', 'Lose Control', 9, 7, NULL, 'https://www.trollers.es/archivos/portadas/portada9.jpg', '2019', 'lose-control', 'Why do I feel like I\'m drowning\r\nLike I\'m running out of air, ah\r\nWhy do I feel like I\'m falling\r\nWhen I\'m nowhere near the edge, ah\r\nJust let me know\r\nCan you be the one to hold and not let me go?\r\nI need to know\r\nCould you be the one to call when I lose control?\r\nAh-ah-ah-ah, ah, ah-ah-ah\r\nI need your love, ah, I need your love, ah\r\nAh, ah-ah-ah-ah, ah, ah-ah-ah\r\nI need your love, ah, I need your love, ah\r\nAh-ah-ah-ah, ah, ah-ah-ah\r\nI need your love, ah, I need your love, ah\r\nAh, ah-ah-ah-ah, ah, ah-ah-ah\r\nCould you be the one to call when I lose control?\r\nWhen I lose control? (Ah-ah-ah-ah, ah)\r\nWhen I lose control? (Ah-ah-ah-ah, ah)\r\nWhen I lose control? (I need your love, ah)\r\nWhen I lose control? (I need your love, ah)\r\nWhen I lose control? (Ah-ah-ah-ah, ah)\r\nWhen I lose…', NULL, NULL, NULL, NULL, NULL),
(19, 'https://www.trollers.es/archivos/music/19_Jax_Jones_This_Is_Real.mp3', 'This is real', 10, 7, NULL, 'https://www.trollers.es/archivos/portadas/portada10.jpg', '2019', 'this-is-real', 'Oh-oh-oh-oh-oh-oh\r\nWhat you, what you gon\' do?\r\nGot vertigo falling down\r\n\'Cause you\'re going to my head\r\nCannot recognize the sound\r\nOf my own heart calling\r\nI found somewhere\r\nI found someone\r\nAnd I found somewhere, somewhere that I belong\r\nBelong, belong\r\nThis is real\r\nAnd you\'ve been right here all along\r\nThis is real\r\nAnd I could never get enough\r\nAnd I\'ll be holding on, holding on\r\nAnd you\'ll be the somebody who can give me love, give me love\r\nNever gonna give you up\r\nAnd I\'ll be holding on, holding on\r\nAnd you\'ll be the somebody who can give me love, give me love\r\nNever gonna give you up, oh yeah\r\nOh, the energy\'s running high\r\nResisting my own defence\r\nThis vision is our design\r\nOh, the energy\'s running\r\nI found somewhere\r\nI found someone\r\nAnd I found somewhere, somewhere that I…', NULL, NULL, NULL, NULL, NULL),
(20, 'https://www.trollers.es/archivos/music/1_Tones_and_I_Dance_Monkey.mp3', 'Dance Monkey', 11, 7, NULL, 'https://www.trollers.es/archivos/portadas/portada11.jpg', '2019', 'dance-monkey', 'They say oh my god I see the way you shine\r\nTake your hand, my dear, and place them both in mine\r\nYou know you stopped me dead while I was passing by\r\nAnd now I beg to see you dance just one more time\r\nOoh I see you, see you, see you every time\r\nAnd oh my I, I, I like your style\r\nYou, you make me, make me, make me wanna cry\r\nAnd now I beg to see you dance just one more time\r\nSo they say\r\nDance for me, dance for me, dance for me, oh, oh, oh\r\nI\'ve never seen anybody do the things you do before\r\nThey say move for me, move for me, move for me, ay, ay, ay\r\nAnd when you\'re done I\'ll make you do it all again\r\nI said oh my god I see you walking by\r\nTake my hands, my dear, and look me in my eyes\r\nJust like a monkey I\'ve been dancing my whole life\r\nBut you just beg to see me dance…', NULL, NULL, NULL, NULL, NULL),
(21, 'https://www.trollers.es/archivos/music/20_Maroon_5_Memories.mp3', 'Memories', 12, 7, NULL, 'https://www.trollers.es/archivos/portadas/portada12.jpg', '2019', 'memories', 'Here\'s to the ones that we got\r\nCheers to the wish you were here, but you\'re not\r\n\'Cause the drinks bring back all the memories\r\nOf everything we\'ve been through\r\nToast to the ones here today\r\nToast to the ones that we lost on the way\r\n\'Cause the drinks bring back all the memories\r\nAnd the memories bring back, memories bring back you\r\nThere\'s a time that I remember, when I did not know no pain\r\nWhen I believed in forever, and everything would stay the same\r\nNow my heart feel like December when somebody say your name\r\n\'Cause I can\'t reach out to call you, but I know I will one day, yeah\r\nEverybody hurts sometimes\r\nEverybody hurts someday, ayy ayy\r\nBut everything gon\' be alright\r\nGo and raise a glass and say, ayy\r\nHere\'s to the ones that we got\r\nCheers to the wish you were…', NULL, NULL, NULL, NULL, NULL),
(22, 'https://www.trollers.es/archivos/music/21_Arizona_Zervas_ROXANNE.mp3', 'ROXANNE', 13, 7, NULL, 'https://www.trollers.es/archivos/portadas/portada13.jpg', '2019', 'roxanne', 'All for the \'Gram\r\nBitches love the \'Gram\r\nOh wait shit\r\nBrr brr\r\nBrr, brr, brr (aye)\r\nSkrrt, skrrt\r\nRoxanne\r\nRoxanne\r\nAll she wanna do is party all night\r\nGoddamn, Roxanne\r\nNever gonna love me but it\'s alright\r\nShe think I\'m an asshole\r\nShe think I\'m a player\r\nShe keep running back though\r\nOnly \'cause I pay up\r\nRoxanne\r\nRoxanne\r\nAll she wanna do is party all night\r\nMet her at a party in the Hills, yeah\r\nShe just wanna do it for the thrill, yeah\r\nShorty drive a poodle with no top\r\nBut if I throw this money she gon\' drop, aye\r\nShe don\'t wait in lines if it\'s too long\r\nShe don\'t drive the whip unless the roof off\r\nOnly want to call when the cash out\r\nOnly take the pic when her ass out\r\nShe from\r\nMalibu, Malibu\r\nIf you ain\'t gotta foreign then she laugh at you\r\nMalibu, Malibu\r\nSpending daddy\'s money…', NULL, NULL, NULL, NULL, NULL),
(23, 'https://www.trollers.es/archivos/music/22_Becky_Hill_Better_Off_Without_You.mp3', 'Better Off Without You', 14, 7, 2, 'https://www.trollers.es/archivos/portadas/portada14.jpg', '2020', 'better-off-without-you', 'I thought my world was crumbling\r\nWhen I woke up and you weren\'t in my bed\r\nAnd I was left here wondering how\r\nYou could walk away and never turn back\r\nTried to right all your wrongs\r\nI never thought that I\'d be lost\r\nBut I found the truth\r\nI was searching for me in you\r\nNow I\'m better off without you\r\nAnd it\'s finally clear to see\r\nThat the person I was missing\r\nIt\'s not you, it\'s me\r\nNow I\'m better off without you\r\nAnd I\'ve never felt so free\r\n\'Cause the person I was missing\r\nIt\'s not you, it\'s me\r\nI tried so hard to please you\r\nBut nothing that I did would work\r\nOh, and all the things that we\'ve been through\r\nNow it\'s time to start putting me first\r\nTried to right all your wrongs\r\nI never thought that I\'d be lost\r\nBut I found the truth\r\nI was searching for me in you\r\nNow I\'m better…', NULL, NULL, NULL, NULL, NULL),
(24, 'https://www.trollers.es/archivos/music/23_Camila_Cabello_My_Oh_My.mp3', 'My Oh My', 15, 7, 2, 'https://www.trollers.es/archivos/portadas/portada15.jpg', '2019', 'my-oh-my', 'They say he likes a good time\r\n(My, oh my)\r\nHe comes alive at midnight\r\n(Every night)\r\nMy mama doesn\'t trust him\r\n(My, oh my)\r\nHe\'s only here for one thing\r\nBut (so am I)\r\nYeah\r\nA little bit older\r\nA black leather jacket\r\nA bad reputation\r\nInsatiable habits\r\nHe was onto me, one look and I couldn\'t breathe\r\nYeah, I said, If you kiss me\r\nI might let it happen\r\nI swear on my life that I\'ve been a good girl\r\nTonight, I don\'t wanna be her\r\nThey say he likes a good time\r\n(My, oh my)\r\nHe comes alive at midnight\r\n(Every night)\r\nMy mama doesn\'t trust him\r\n(My, oh my)\r\nHe\'s only here for one thing (let\'s go)\r\nBut (so am I)\r\nLook, I\'m the type to make her turn on her daddy\r\nDaBaby make her forget what she learned from her daddy\r\nI don\'t be trippin on lil\' shawty, I let her do whatever she please\r\nI don\'t…', NULL, NULL, NULL, NULL, NULL),
(25, 'https://www.trollers.es/archivos/music/24_Doja_Cat_Say_So.mp3', 'Say So', 16, 7, 2, 'https://www.trollers.es/archivos/portadas/portada16.jpg', '2019', 'say-so', 'Day to night to morning, keep with me in the moment\r\nI\'d let you had I known it, why don\'t you say so?\r\nDidn\'t even notice, no punches left to roll with\r\nYou got to keep me focused, you want it, say so\r\nDay to night to morning, keep with me in the moment\r\nI\'d let you had I known it, why don\'t you say so?\r\nDidn\'t even notice, no punches left to roll with\r\nYou got to keep me focused, you want it, say so\r\nIt\'s been a long time since you fell in love\r\nYou ain\'t coming out your shell, you really ain\'t been yourself\r\nTell me what must I do (do tell, my love)\r\n\'Cause luckily I\'m good at reading\r\nI wouldn\'t fuck him and he won\'t stop chasin\'\r\nAnd we can dance all day around it\r\nIf you front then I\'ll be bouncing\r\nIf you want it scream and shout it, babe\r\nBefore I leave you dry\r\nDay…', NULL, NULL, NULL, NULL, NULL),
(26, 'https://www.trollers.es/archivos/music/25_Billie_Eilish_bad_guy.mp3', 'bad guy', 4, 7, 2, 'https://www.trollers.es/archivos/portadas/portada17.jpg', '2019', 'bad-guy', 'White shirt now red, my bloody nose\r\nSleepin\', you\'re on your tippy toes\r\nCreepin\' around like no one knows\r\nThink you\'re so criminal\r\nBruises on both my knees for you\r\nDon\'t say thank you or please\r\nI do what I want when I\'m wanting to\r\nMy soul? So cynical\r\nSo you\'re a tough guy\r\nLike it really rough guy\r\nJust can\'t get enough guy\r\nChest always so puffed guy\r\nI\'m that bad type\r\nMake your mama sad type\r\nMake your girlfriend mad tight\r\nMight seduce your dad type\r\nI\'m the bad guy, duh\r\nI\'m the bad guy\r\nI like it when you take control\r\nEven if you know that you don\'t\r\nOwn me, I\'ll let you play the role\r\nI\'ll be your animal\r\nMy mommy likes to sing along with me\r\nBut she won\'t sing this song\r\nIf she reads all the lyrics\r\nShe\'ll pity the men I know\r\nSo you\'re a tough guy\r\nLike it really rough guy…', NULL, NULL, NULL, NULL, NULL),
(27, 'https://www.trollers.es/archivos/music/26_Justin_Bieber_Intentions.mp3', 'Intentions', 17, 7, NULL, 'https://www.trollers.es/archivos/portadas/portada18.jpg', '2020', 'intentions', 'Picture-perfect, you don\'t need no filter\r\nGorgeous, make \'em drop dead, you a killer\r\nShower you with all my attention\r\nYeah, these are my only intentions\r\nStay in the kitchen, cooking up, cut your own bread\r\nHeart full of equity, you\'re an asset\r\nMake sure that you don\'t need no mentions\r\nYeah, these are my only intentions\r\nShout out to your mom and dad for making you\r\nStanding ovation, they did a great job raising you\r\nWhen I create, you\'re my muse\r\nThe kind of smile that makes the news\r\nCan\'t nobody throw shade on your name in these streets\r\nTriple threat, you a boss, you a bae, you a beast\r\nYou make it easy to choose\r\nYou got a mean touch I can\'t refuse (no, I can\'t refuse it)\r\nPicture-perfect, you don\'t need no filter\r\nGorgeous, make \'em drop dead, you a killer\r\nShower…', NULL, NULL, NULL, NULL, NULL),
(28, 'https://www.trollers.es/archivos/music/27_Lewis_Capaldi_Bruises.mp3', 'Bruises', 3, 7, NULL, 'https://www.trollers.es/archivos/portadas/portada19.jpg', '2019', 'bruises', 'Counting days, counting days\r\nSince my love up and got lost on me\r\nAnd every breath that I\'ve been takin\'\r\nSince you left feels like a waste on me\r\nI\'ve been holding on to hope\r\nThat you\'ll come back when you can find some peace\r\n\'Cause every word that I\'ve heard spoken\r\nSince you left feels like a hollow street\r\nI\'ve been told, I\'ve been told to get you off my mind\r\nBut I hope I never lose the bruises that you left behind\r\nOh my lord, oh my lord, I need you by my side\r\nThere must be something in the water\r\n\'Cause everyday it\'s getting colder\r\nAnd if only I could hold ya\r\nYou\'d keep my head from going under\r\nMaybe I, maybe I\'m just being blinded\r\nBy the brighter side\r\nOf what we had because it\'s over\r\nWell there must be something in the tide\r\nI\'ve been told, I\'ve been told to…', NULL, NULL, NULL, NULL, NULL),
(29, 'https://www.trollers.es/archivos/music/28_Justin_Bieber_Yummy.mp3', 'Yummy', 17, 7, NULL, 'https://m.media-amazon.com/images/I/91szwffUv7L._SS500_.jpg', '2020', 'yummy', 'Yeah, you got that yummy, yum\r\nThat yummy, yum\r\nThat yummy, yummy\r\nYeah, you got that yummy, yum\r\nThat yummy, yum\r\nThat yummy, yummy\r\nSay the word, on my way\r\nYeah babe, yeah babe, yeah babe\r\nAny night, any day\r\nSay the word, on my way\r\nYeah babe, yeah babe, yeah babe\r\nIn the morning or late\r\nSay the word, on my way\r\nBona fide stallion\r\nYou ain\'t in no stable, no, you stay on the run\r\nAin\'t on the side, you\'re number one\r\nYeah, every time I come around, you get it done\r\nFifty-fifty, love the way you split it\r\nHunnid racks, help me spend it, babe\r\nLight a match, get litty, babe\r\nThat jet set, watch the sunset kinda, yeah, yeah\r\nRollin\' eyes back in my head, make my toes curl, yeah, yeah\r\nYeah, you got that yummy, yum\r\nThat yummy, yum\r\nThat yummy, yummy\r\nYeah, you got that yummy, yum\r\nThat…', NULL, NULL, NULL, NULL, NULL),
(30, 'https://www.trollers.es/archivos/music/29_Future_Life_Is_Good.mp3', 'Life Is Good', 18, 7, NULL, 'https://static.stereogum.com/uploads/2020/01/future-drake-life-is-good-1578632849-640x640.jpg', '2020', 'life-is-good', 'Workin\' on the weekend like usual\r\nWay off in the deep end like usual\r\nNiggas swear they passed us, they doin\' too much\r\nHaven\'t done my taxes, I\'m too turnt up\r\nVirgil got a Patek on my wrist going nuts\r\nNiggas caught me slipping once, okay, so what?\r\nSomeone hit your block up, I\'d tell you if it was us\r\nManor house in Rosewood, this shit too plush\r\nSay my days are numbered, but I keep wakin\' up\r\nKnow you see my texts, baby, please say somethin\'\r\nWine by the glass, your man a cheapskate, huh?\r\nNiggas gotta move off my release day, huh?\r\nBitch, this is fame, not clout\r\nI don\'t even know what that\'s about, watch your mouth\r\nBaby got a ego twice the size of the crib\r\nI can never tell her shit, it is what it is\r\nSaid what I had to and did what I did\r\nNever turn my back on FBG,…', NULL, NULL, NULL, NULL, NULL),
(31, 'https://www.trollers.es/archivos/music/2_The_Weeknd_Blinding_Lights.mp3', 'Blinding Lights', 19, 7, NULL, 'https://www.trollers.es/archivos/portadas/portada22.jpg', '2019', 'blinding-lights', 'Yeah\r\nI been tryna call\r\nI been on my own for long enough\r\nMaybe you can show me how to love, maybe\r\nI\'m going through withdrawals\r\nYou don\'t even have to do too much\r\nYou can turn me on with just a touch, baby\r\nI look around and Sin City\'s cold and empty (oh)\r\nNo one\'s around to judge me (oh)\r\nI can\'t see clearly when you\'re gone\r\nI said, ooh, I\'m blinded by the lights\r\nNo, I can\'t sleep until I feel your touch\r\nI said, ooh, I\'m drowning in the night\r\nOh, when I\'m like this, you\'re the one I trust\r\nHey, hey, hey\r\nI\'m running out of time\r\n\'Cause I can see the sun light up the sky\r\nSo I hit the road in overdrive, baby\r\nOh, the city\'s cold and empty (oh)\r\nNo one\'s around to judge me (oh)\r\nI can\'t see clearly when you\'re gone\r\nI said, ooh, I\'m blinded by the lights\r\nNo, I can\'t sleep…', NULL, NULL, NULL, NULL, NULL),
(32, 'https://www.trollers.es/archivos/music/30_Nathan_Dawe_Flowers_(feat._Jaykae).mp3', 'Flowers', 20, 7, NULL, 'https://www.trollers.es/archivos/portadas/portada23.jpg', '2019', 'flowers', 'from this day until the day we throw it all away\r\nLet\'s talk about it \'cause I can\'t do without it\r\nYour love, means so much to me\r\nCan\'t you see?\r\nRight here, I\'ll always be (oh baby)\r\nOh by the way\r\nDid I say that I am here to stay?\r\nRight here beside you\r\nI will never deny you, my love\r\nYou\'re everything to me\r\nCan\'t you see\r\nI\'ll give it to you unselfishly?\r\nBecause I need you so, oh baby\r\nAnd I will never, ever let you go\r\nI\'ll bring you flowers in the pouring rain\r\nLiving without you is driving me insane\r\nI\'ll bring you flowers, I\'ll make your day\r\nThose tears you cry, I\'ll dry them all away, away\r\nI\'ll bring you flowers in the pouring rain\r\nLiving without you is driving me insane\r\nI\'ll bring you flowers, I\'ll make your day\r\nThose tears you cry, I\'ll dry them all away, away\r\nOh…', NULL, NULL, NULL, NULL, NULL),
(33, 'https://www.trollers.es/archivos/music/31_Post_Malone_Circles.mp3', 'Circles', 21, 7, NULL, 'https://i1.sndcdn.com/artworks-000592838153-l2bups-t500x500.jpg', '2019', 'circles', 'Oh, oh, oh\r\nOh, oh, oh\r\nOh, oh, oh\r\nOh, oh\r\nWe couldn\'t turn around\r\n\'Til we were upside down\r\nI\'ll be the bad guy now\r\nBut no, I ain\'t too proud\r\nI couldn\'t be there\r\nEven when I try\r\nYou don\'t believe it\r\nWe do this every time\r\nSeasons change and our love went cold\r\nFeed the flame \'cause we can\'t let go\r\nRun away, but we\'re running in circles\r\nRun away, run away\r\nI dare you to do something\r\nI\'m waiting on you again\r\nSo I don\'t take the blame\r\nRun away, but we\'re running in circles\r\nRun away, run away, run away\r\nLet go\r\nI got a feeling that it\'s time to let go\r\nI say so\r\nI knew that this was doomed from the get go\r\nYou thought that it was special, special\r\nBut it was just the sex though, the sex though\r\nAnd I still hear the echoes (the echoes)\r\nI got a feeling that it\'s time to let it go\r\nLet it…', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs_playlist`
--

CREATE TABLE `songs_playlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `song_id` int(10) UNSIGNED NOT NULL,
  `playlist_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `songs_playlist`
--

INSERT INTO `songs_playlist` (`id`, `song_id`, `playlist_id`, `created_at`, `updated_at`) VALUES
(1, 13, 4, NULL, NULL),
(2, 33, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '../../../../images/default/default_1.png',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '../../../../images/default/default_2.png',
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '../../../../images/default/default_3.png',
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '../../../../images/default/default_4.png',
  `escuchando` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `artist`, `image`, `slug`, `image2`, `image3`, `image4`, `escuchando`, `description`, `instagram`, `facebook`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joel Corry', 'joelcorry', 'joel@joel.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://i.scdn.co/image/de055d8f7ae8552b132ffb3ff47cbdd5b1545c18', 'joel-corry', NULL, NULL, NULL, NULL, 'Joel Corry es un DJ británico, productor y entrenador físico. Es mejor conocido por su sencillo de 2019 Sorry, que alcanzó el número seis en la lista de singles del Reino Unido después de aparecer en la serie de televisión de realidad ITV2 Love Island.', NULL, NULL, NULL, NULL, NULL),
(2, 'Eminem', 'eminem', 'emi@emi.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://www.tonica.la/__export/1579281727665/sites/debate/img/2020/01/17/eminem_musci_to_be_murdered_artcover.jpg_423682103.jpg', 'eminem', NULL, NULL, NULL, NULL, 'Marshall Bruce Mathers III, conocido por su nombre artístico Eminem y también por su álter ego Slim Shady, es un rapero, productor discográfico y actor estadounidense.', NULL, NULL, NULL, NULL, NULL),
(3, 'Lewis Capaldi', 'lewiscapaldi', 'lewis@capaldi.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://media.resources.festicket.com/image/300x300/center/top/filters:quality(70)/www/artists/LEWIS_CAPALDI_Leadshot_RGB.jpg', 'lewis-capaldi', 'https://cdn.wegow.com/media/artists/lewis-capaldi/lewis-capaldi-1519229324.36.2560x1440.jpg', 'https://www.totalntertainment.com/wp-content/uploads/Lewis-Capaldi-1.jpg', 'https://www.readdork.com/images/article/Artist-Images/L/Lewis-Capaldi/Dork%20Cover%20Shoot%20May%202019/_crop1500x1000/Lewis-Capaldi_March-2019-204.jpg', '<a href=/song/harrystyles/adore-you>Adore You</a><br><a href=/user/harrystyles>Harry Styles</a>', 'Lewis Capaldi es un cantante y compositor británico. Desde temprana edad, mostró gran interés por la música, comenzando a cantar en lugares públicos a los 9 años, edad en la que ya sabía tocar el piano y la guitarra.', NULL, NULL, NULL, NULL, '2020-04-21 17:27:58'),
(4, 'Billie Eilish', 'billie99', 'billie@eilish.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://media.resources.festicket.com/www/artists/BillieEilish.jpg', 'billie-eilish', NULL, NULL, NULL, NULL, 'Billie Eilish Pirate Baird O\'Connell (Los Ángeles, California; 18 de diciembre de 2001), conocida como Billie Eilish (pronunciado [ˈailiʃ]) es una cantante y compositora estadounidense. Adquirió fama como artista cuando tenía 13 años, a raíz del sencillo Ocean Eyes que se publicó en 2015 en SoundCloud y que volvió a lanzarse con un vídeo musical en Youtube en 2016, cuando ella contaba con 14 años, y se convirtió en un fenómeno viral.', NULL, NULL, NULL, NULL, NULL),
(5, 'Trevor Daniel', 'trevordaniel', 'trevor@daniel.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://lastfm.freetls.fastly.net/i/u/770x0/6e2433bc53bcd7a9a6f4471961d3b3cb.jpg', 'trevor-daniel', 'https://dc.cdnon.net/e/2020/06/11/2164830-1584802074.jpg', NULL, NULL, NULL, 'Traducción del inglés-Trevor Daniel Neill es un cantante estadounidense. Su EP debut, Homesick, fue lanzado en octubre de 2018 y presenta la canción Falling, que llegó a las listas de éxitos en más de veinte países después de volverse viral en TikTok en 2019.', NULL, NULL, NULL, NULL, NULL),
(6, 'Dua Lipa', 'dualipa', 'dua@lipa.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://fashion.hola.com/imagenes/tendencias/2020012768876/dua-lipa-jennifer-aniston-look-90/0-296-458/dua-lipa-look-90s-e.jpg', 'dua-lipa', NULL, NULL, NULL, NULL, 'Dua Lipa es una cantante, modelo, compositora y diseñadora de moda​ británica de origen kosovar. Su carrera musical se inició a los 14 años, cuando comenzó a versionar canciones de otros artistas en YouTube.', NULL, NULL, NULL, NULL, NULL),
(7, 'Harry Styles', 'harrystyles', 'harry@styles.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://cdn2.glamour.es/uploads/images/thumbs/es/glam/4/s/2019/05/tatuaje_harry_styles_en_la_cara_asi_justifica_cantante_7214_620x620.jpg', 'harry-styles', 'https://los40.cl/wp-content/uploads/2020/03/harry-styles.jpg', 'https://lh3.googleusercontent.com/proxy/UhgVJh9TpPpJrawdn1nOU_hbzNk1AXUuM_AuKLPQq9Ziy9Ac181K41kah6hFgvLotD2KPZXPFMcSLbKoPqc5m1QfiO6p7iarHJv1ZkGrnPHCCUqQP6OnAVU3jQ', NULL, '<a href=/song/theweeknd/blinding-lights>Blinding Lights</a><br><a href=/user/theweeknd>The Weeknd</a>', 'Harry Edward Styles, más conocido como Harry Styles, es un cantante y compositor británico, miembro de la boy band One Direction', NULL, NULL, NULL, NULL, '2020-04-20 12:20:43'),
(8, 'Halsey', 'halsey', 'halsey@gmail.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://www.nacionrex.com/__export/1582834094248/sites/debate/img/2020/02/27/halsey_es_acusada_de_hacerse_cirugia_plastica_crop1582833745477.jpg_423682103.jpg', 'halsey', 'https://s1.ticketm.net/dam/a/b29/07914f3b-e9fa-444b-9a82-b454e1043b29_1165821_TABLET_LANDSCAPE_LARGE_16_9.jpg', 'https://lh3.googleusercontent.com/proxy/WQDDbG6lCBeARwXEXm9d2LXs1945P8AnV2k3iZ3YITufq0tLZVze0sBxragO46uICEwEZxB1OTORDN10d5zxZmo_Ifv7VvdTy2JZO2QxXAqI7i1TBviH48o_91pWtg', NULL, NULL, 'Ashley Nicolette Frangipane, más conocida por su nombre artístico Halsey que es un anagrama de su nombre real, es una cantante, actriz, activista, compositora y directora de videos estadounidense.', NULL, NULL, NULL, NULL, NULL),
(9, 'Meduza', 'meduza', 'meduza@gmail.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://i.scdn.co/image/f1dc8347ce1fd49e13f3e799175290a36e02b52d', 'meduza', NULL, NULL, NULL, NULL, 'Meduza son un trío de producción italiano compuesto por Matt Madwill, Simon de Jano y Luke Degree. Son conocidos por su canción revolucionaria de 2019 Piece of Your Heart, que fue una colaboración con el trío de producción británico Goodboys.', NULL, NULL, NULL, NULL, NULL),
(10, 'Jax Jones', 'jaxjones', 'jax@jones.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://los40es00.epimg.net/los40/imagenes/2019/10/22/los40dance/1571737715_250194_1571737749_noticia_normal.jpg', 'jax-jones', NULL, NULL, NULL, NULL, 'Timucin Lam, también conocido como Jax Jones, es un DJ británico, productor discográfico, cantante, compositor y remezclador.', NULL, NULL, NULL, NULL, NULL),
(11, 'Tones and I', 'tonesandi', 'tones@me.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://studiosol-a.akamaihd.net/letras/500x500/fotos/2/2/5/0/22507d6d0f4143ab746bb2b1c463fa7f.jpg', 'tones-and-i', 'https://zona69.net/wp-content/uploads/2019/09/tones-and-i.jpg', NULL, NULL, NULL, 'Toni Elizabeth Watson, conocida como Tones and I, es una cantautora australiana. En mayo de 2019, se hizo mundialmente conocida por su sencillo Dance Monkey, que alcanzó el #1 en las listas musicales de más de 30 países.', NULL, NULL, NULL, NULL, NULL),
(12, 'Maroon 5', 'maroon5', 'maroon@five.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://loff.it/wp-content/uploads/2015/01/loffit-sugar-maroon-5-06.jpg', 'maroon-five', NULL, NULL, NULL, NULL, 'Maroon 5 es una banda musical de pop rock​ estadounidense. El grupo se formó originalmente entre 1994 y 1995 como Kara\'s Flowers mientras sus integrantes cursaban la secundaria.', NULL, NULL, NULL, NULL, NULL),
(13, 'Arizona Zervas', 'arizonazervas', 'arizona@zervas.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://i1.sndcdn.com/avatars-000459355854-b1rppr-t500x500.jpg', 'arizona-zervas', 'https://www.r101.it/resizer/1200/720/true/Arizona_Zervas-1580406687904.jpg--arizona_zervas__da_l_a__alle_classifiche_mondiali.jpg?1580406688000', NULL, NULL, NULL, 'Arizona Zervas es un rapero, compositor y productor estadounidense. Comenzó a publicar su música de forma independiente desde el 2016 a través de Spotify y posteriormente en TikTok.', NULL, NULL, NULL, NULL, NULL),
(14, 'Becky Hill', 'beckyhill', 'becky@hill.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://i.scdn.co/image/6e727c4d232cb9cafe761138032d8e838c176500', 'becky-hill', NULL, NULL, NULL, NULL, 'Traducción del inglés-Rebecca Claire ,Becky Hill es una cantante y compositora inglesa de Bewdley, Worcestershire. Saltó a la fama después de aparecer en la primera serie de The Voice UK, audicionando con Ordinary People de John Legend. Se unió al equipo de Jessie J y llegó a la semifinal de la competencia.', NULL, NULL, NULL, NULL, NULL),
(15, 'Camila Cabello', 'camilacabello', 'camila@cabello.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://pbs.twimg.com/media/DJUbBgsVwAEmmjB.jpg', 'camila-cabello', NULL, NULL, NULL, NULL, 'Karla Camila Cabello Estrabao ​ es una cantante y compositora cubano-estadounidense. Conocida por haber formado parte del grupo femenino Fifth Harmony. Cabello y sus compañeras de banda lanzaron un EP y dos álbumes de estudio. El 18 de diciembre de 2016 se anunció su salida del grupo.​​', NULL, NULL, NULL, NULL, NULL),
(16, 'Doja Cat', 'dojacat', 'doja@cat.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://www.mor.bo/wp-content/uploads/2019/11/3544d120c0509259afedf3de26c1562d-1000x1000x1.jpg', 'doja-cat', NULL, NULL, NULL, NULL, 'Amalaratna Zandile Dlamini, ​ conocida artísticamente como Doja Cat, es una rapera, cantante, compositora y productora discográfica estadounidense;​ la cual firmó un contrato discografíco con RCA Records en 2014.​', NULL, NULL, NULL, NULL, NULL),
(17, 'Justin Bieber', 'justinbieber', 'justin@bieber', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://i2.wp.com/bitcoincodesverigerecension.com/wp-content/uploads/2020/01/Justin-Bieber.jpg?fit=1964%2C1964', 'justin-bieber', NULL, NULL, NULL, NULL, 'Justin Drew Bieber es un cantante, compositor, músico y bailarín canadiense. En 2008, el exejecutivo de la industria musical, Scooter Braun, descubrió casualmente el talento de un jovencísimo Justin ...', NULL, NULL, NULL, NULL, NULL),
(18, 'Future', 'future', 'future@gmail.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://ionemadamenoire.files.wordpress.com/2019/03/15514505860699.jpg?w=1024&h=1005', 'future', NULL, NULL, NULL, NULL, 'Nayvadius DeMun Wilburn​, ​ más conocido por su nombre artístico Future, es un rapero, cantante, compositor, y productor discográfico estadounidense.​ Después de lanzar una serie de mixtapes moderadamente exitosos entre 2010 y 2011, Future firmó con la compañía discográfica Epic Records.', NULL, NULL, NULL, NULL, NULL),
(19, 'The Weeknd', 'theweeknd', 'theweeknd@gmail.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://www.tonica.la/__export/1581892751384/sites/debate/img/2020/02/16/the-weeknd-.jpg_423682103.jpg', 'the-weeknd', NULL, NULL, NULL, NULL, 'Abel Makkonen Tesfaye, conocido como The Weeknd, es un cantante, compositor y productor canadiense de origen etíope, conocido por éxitos como Blinding Lights', NULL, NULL, NULL, NULL, NULL),
(20, 'Nathan Dawe', 'nathandawe', 'nathan@dawe.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://media.resources.festicket.com/www/artists/NathanDawe.jpg', 'nathan-dawe', NULL, NULL, NULL, NULL, 'Productor sueco de música electrónica conformado por Christian Bloodshy Karlsson y Linus Eklöw más conocido por su alias Style of Eye. Actualmente ocupan el número 66 en la encuesta de los 100 mejores DJ\'s del mundo realizada por la revista DJmag.', NULL, NULL, NULL, NULL, NULL),
(21, 'Post Malone', 'postmalone', 'post@malone', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 1, 'https://mediamass.net/jdd/public/documents/celebrities/8088.jpg', 'post-malone', NULL, NULL, NULL, NULL, 'Austin Richard Post más conocido por su nombre artístico Post Malone, es un rapero, cantante, productor y compositor estadounidense.​ Ganó un gran reconocimiento en agosto de 2015 gracias al lanzamiento de su sencillo debut White Iverson.', NULL, NULL, NULL, NULL, NULL),
(22, 'Carlos Robles', 'roblito2', 'carlos@carlos.es', NULL, '$2y$10$j595I3.Jf/Qlz86FqTIb0ePznpGGUIHpgHmbIfJ2EqaC6uV127z4m', 0, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT5XjbkIvmopH3wA5cgKeS1g8OkPC2bHRYesipUswham0WFy3VZ&usqp=CAU', 'roblito2', 'https://www.www.trollers.es/images/fotos/nochevieja.jpg', 'https://i.pinimg.com/originals/2d/6b/9d/2d6b9d7145b42697d47c4fc11e7fa2ca.jpg', 'https://images.hdqwalls.com/wallpapers/google-cloud-logo-4k-wallpaper.jpg', '', 'Se va llenando la noche Con rumores de canción Y se enreda en tu ventana Mi sereneta de amor Las estrellas quedamente Empiezan a parpadear Y va llenando la noche Mi serenata de amor', NULL, NULL, NULL, NULL, '2020-04-20 17:34:28'),
(23, 'Juan', 'juanito', 'wqew@s.es', NULL, '$2y$10$b7r6H3q/D4M5mOOFpdpV4O.UkM.RAF6Wn.2O4ZO8tW19sH9imllkW', 0, '../../../../images/default/default_1.png', 'juanito', '../../../../images/default/default_2.png', '../../../../images/default/default_3.png', '../../../../images/default/default_4.png', NULL, NULL, NULL, NULL, NULL, '2020-04-13 11:21:41', '2020-04-13 11:21:41'),
(24, 'Prueba Consulta', 'xxxxxxxx', 'wanikoko@e.es2', NULL, '$2y$10$usF5hKvPoW8qMHpFVRkDgu7MorN2TjptwOwHd3ZpzKsqVFOoAV0YS', 0, '../../../../images/default/default_1.png', 'xxxxxxxx', '../../../../images/default/default_2.png', '../../../../images/default/default_3.png', '../../../../images/default/default_4.png', NULL, NULL, NULL, NULL, NULL, '2020-04-13 11:29:32', '2020-04-13 11:29:32'),
(25, 'artist', 'artist', 'caromamusic@gmail.comss', NULL, '$2y$10$GLWo7ODeNUcekaekFd1TwuSxgDKEmzrJvvv8GLuM5kyg5Gp7w7nO.', 0, '../../../../images/default/default_1.png', 'artist', '../../../../images/default/default_2.png', '../../../../images/default/default_3.png', '../../../../images/default/default_4.png', NULL, NULL, NULL, NULL, NULL, '2020-04-13 11:41:06', '2020-04-13 11:41:06'),
(26, 'Prueba C2onsulta', '2222222', 'pepe@pepe.esw2', NULL, '$2y$10$rKvKJvT3C47OmWCDoE02TeBUhyDd2zpplcYDih.Jm8VsfHwrvahOy', 0, '../../../../images/default/default_1.png', '2222222', '../../../../images/default/default_2.png', '../../../../images/default/default_3.png', '../../../../images/default/default_4.png', NULL, NULL, NULL, NULL, NULL, '2020-04-13 11:43:07', '2020-04-13 11:43:07'),
(27, 'dsfdsfd', 'dfssdffdssd', 'pepe@pepe.esww22', NULL, '$2y$10$YWJ3V77IkayvoVGwxER3dOaSswnZyx8WCUEOyX7jXRR2tyb721ulS', 0, '../../../../images/default/default_1.png', 'dfssdffdssd', '../../../../images/default/default_2.png', '../../../../images/default/default_3.png', '../../../../images/default/default_4.png', NULL, NULL, NULL, NULL, NULL, '2020-04-13 11:45:28', '2020-04-13 11:45:28'),
(28, 'Carlosww', '222222211', 'wqew@s.es221', NULL, '$2y$10$pWhqO3fRxBw6g5aFeT3sYuW73SomIIsswMmny3ovCdlRPp1P2hDEG', 0, '../../../../images/default/default_1.png', '222222211', '../../../../images/default/default_2.png', '../../../../images/default/default_3.png', '../../../../images/default/default_4.png', NULL, NULL, NULL, NULL, NULL, '2020-04-13 11:48:13', '2020-04-13 11:48:13'),
(29, 'www2wwww', 'joelcorry22ww', 'wanikoko@e.esw', NULL, '$2y$10$vufho8C0DY94tTbT8yf/NuJr0W6RDCEQ/iivwZyXsAo04HIdU8Eea', 1, '../../../../images/default/default_1.png', 'joelcorry22ww', '../../../../images/default/default_2.png', '../../../../images/default/default_3.png', '../../../../images/default/default_4.png', NULL, NULL, NULL, NULL, NULL, '2020-04-13 11:50:02', '2020-04-13 11:50:02'),
(30, 'pepe', 'juan123', 'carlos@robles.es', NULL, '$2y$10$Dsik7e9zZgNOzlJkESVb/exoxOwQ9348tOE9bL/gmgsdTO4YGm2hK', 1, '../../../../images/default/default_1.png', 'juan123', '../../../../images/default/default_2.png', '../../../../images/default/default_3.png', '../../../../images/default/default_4.png', NULL, NULL, NULL, NULL, NULL, '2020-04-14 08:33:53', '2020-04-14 08:33:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_follow`
--

CREATE TABLE `users_follow` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `friend` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_follow`
--

INSERT INTO `users_follow` (`id`, `user`, `friend`, `created_at`, `updated_at`) VALUES
(4, 22, 8, NULL, NULL),
(6, 3, 22, NULL, NULL),
(7, 22, 3, NULL, NULL),
(8, 22, 7, NULL, NULL),
(9, 22, 11, NULL, NULL),
(10, 22, 28, NULL, NULL),
(11, 3, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_follow_event`
--

CREATE TABLE `user_follow_event` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_follow_playlist`
--

CREATE TABLE `user_follow_playlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `playlist_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_follow_playlist`
--

INSERT INTO `user_follow_playlist` (`id`, `user_id`, `playlist_id`, `created_at`, `updated_at`) VALUES
(1, 9, 4, NULL, NULL),
(2, 6, 4, NULL, NULL),
(3, 15, 4, NULL, NULL),
(4, 7, 4, NULL, NULL),
(6, 22, 5, NULL, NULL),
(7, 3, 4, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_artist_id_foreign` (`artist_id`);

--
-- Indices de la tabla `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlist_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `songs_artist_id_foreign` (`artist_id`),
  ADD KEY `songs_genero_id_foreign` (`genero_id`),
  ADD KEY `songs_album_id_foreign` (`album_id`);

--
-- Indices de la tabla `songs_playlist`
--
ALTER TABLE `songs_playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `songs_playlist_song_id_foreign` (`song_id`),
  ADD KEY `songs_playlist_playlist_id_foreign` (`playlist_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `users_follow`
--
ALTER TABLE `users_follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_follow_user_foreign` (`user`),
  ADD KEY `users_follow_friend_foreign` (`friend`);

--
-- Indices de la tabla `user_follow_event`
--
ALTER TABLE `user_follow_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_follow_event_user_id_foreign` (`user_id`),
  ADD KEY `user_follow_event_event_id_foreign` (`event_id`);

--
-- Indices de la tabla `user_follow_playlist`
--
ALTER TABLE `user_follow_playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_follow_playlist_user_id_foreign` (`user_id`),
  ADD KEY `user_follow_playlist_playlist_id_foreign` (`playlist_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT de la tabla `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `songs_playlist`
--
ALTER TABLE `songs_playlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `users_follow`
--
ALTER TABLE `users_follow`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `user_follow_event`
--
ALTER TABLE `user_follow_event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user_follow_playlist`
--
ALTER TABLE `user_follow_playlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`),
  ADD CONSTRAINT `songs_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `songs_genero_id_foreign` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`);

--
-- Filtros para la tabla `songs_playlist`
--
ALTER TABLE `songs_playlist`
  ADD CONSTRAINT `songs_playlist_playlist_id_foreign` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`),
  ADD CONSTRAINT `songs_playlist_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`);

--
-- Filtros para la tabla `users_follow`
--
ALTER TABLE `users_follow`
  ADD CONSTRAINT `users_follow_friend_foreign` FOREIGN KEY (`friend`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_follow_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `user_follow_event`
--
ALTER TABLE `user_follow_event`
  ADD CONSTRAINT `user_follow_event_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `user_follow_event_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `user_follow_playlist`
--
ALTER TABLE `user_follow_playlist`
  ADD CONSTRAINT `user_follow_playlist_playlist_id_foreign` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`),
  ADD CONSTRAINT `user_follow_playlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
