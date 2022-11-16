-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 05:47 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_cit_ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 11, 1, '2022-11-15 21:21:58', '2022-11-15 21:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `image`, `image_uri`, `created_at`, `updated_at`) VALUES
(1, 'Computers', 'computers', NULL, NULL, '2022-11-15 21:19:50', '2022-11-15 21:19:50'),
(2, 'Cell Phones', 'cell-phones', NULL, NULL, '2022-11-15 21:19:50', '2022-11-15 21:19:50'),
(3, 'TV & Video', 'tv-video', NULL, NULL, '2022-11-15 21:19:50', '2022-11-15 21:19:50'),
(4, 'Camera & Photo', 'camera-photo', NULL, NULL, '2022-11-15 21:19:50', '2022-11-15 21:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '2014_10_12_000000_create_users_table', 1),
(32, '2014_10_12_100000_create_password_resets_table', 1),
(33, '2019_08_19_000000_create_failed_jobs_table', 1),
(34, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(35, '2022_10_10_040313_create_brands_table', 1),
(36, '2022_10_20_003222_create_categories_table', 1),
(37, '2022_10_21_053029_create_sub_categories_table', 1),
(38, '2022_10_22_133027_create_products_table', 1),
(39, '2022_10_22_153643_create_product_images_table', 1),
(40, '2022_11_07_013417_create_permission_tables', 1),
(41, '2022_11_14_152430_create_carts_table', 1),
(42, '2022_11_15_162259_create_orders_table', 1),
(43, '2022_11_15_162430_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totals` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `brand_id`, `title`, `slug`, `price`, `discount_price`, `status`, `start_date`, `end_date`, `product_code`, `short_detail`, `long_detail`, `thumbnail_uri`, `thumbnail_name`, `video_uri`, `created_at`, `updated_at`) VALUES
(1, 2, 5, NULL, 'Anastacio Pfeffer', 'dr-valerie-bernier', 40460, NULL, 1, NULL, NULL, '7', 'Iusto eius ut tempore unde earum voluptas.', 'Iure ut harum omnis iure est ipsam.', 'https://via.placeholder.com/640x480.png/002266?text=quos', NULL, NULL, '2022-11-15 21:19:53', '2022-11-15 21:19:53'),
(2, 2, 1, NULL, 'Dr. Tristin Heathcote', 'ally-klocko', 23755, NULL, 1, NULL, NULL, '#', 'Distinctio et ut quisquam atque quaerat nisi enim.', 'Molestiae velit eius et qui modi.', 'https://via.placeholder.com/640x480.png/001100?text=ratione', NULL, NULL, '2022-11-15 21:19:53', '2022-11-15 21:19:53'),
(3, 2, 6, NULL, 'Heloise Wiza', 'lucio-prohaska-v', 10129, NULL, 1, NULL, NULL, '\\', 'Repellendus consectetur omnis fugit dolores.', 'Recusandae id dolores nesciunt repellat veritatis ab culpa.', 'https://via.placeholder.com/640x480.png/0011bb?text=et', NULL, NULL, '2022-11-15 21:19:53', '2022-11-15 21:19:53'),
(4, 2, 9, NULL, 'Raven Rodriguez', 'theodore-schowalter', 18006, NULL, 1, NULL, NULL, 'g', 'Molestias exercitationem quidem quo quo facilis ut qui.', 'Optio aliquid in neque qui.', 'https://via.placeholder.com/640x480.png/001122?text=dolore', NULL, NULL, '2022-11-15 21:19:54', '2022-11-15 21:19:54'),
(5, 1, 1, NULL, 'Orin Veum III', 'prof-erna-feest-sr', 6527, NULL, 1, NULL, NULL, '.', 'Quibusdam nesciunt consequatur alias ratione delectus dolore.', 'Est sequi ipsum illum earum maxime.', 'https://via.placeholder.com/640x480.png/00ff33?text=voluptas', NULL, NULL, '2022-11-15 21:19:54', '2022-11-15 21:19:54'),
(6, 4, 3, NULL, 'Kelli Gorczany Jr.', 'edgardo-bergnaum-dvm', 22950, NULL, 1, NULL, NULL, '4', 'Et repellat ullam et.', 'Voluptas non repellat iste odio.', 'https://via.placeholder.com/640x480.png/0011bb?text=expedita', NULL, NULL, '2022-11-15 21:19:54', '2022-11-15 21:19:54'),
(7, 3, 6, NULL, 'Kariane Kuhlman', 'hyman-hamill', 21229, NULL, 1, NULL, NULL, 'g', 'Excepturi eius rerum dolor sint totam.', 'Ea nulla et debitis vel.', 'https://via.placeholder.com/640x480.png/004411?text=ut', NULL, NULL, '2022-11-15 21:19:54', '2022-11-15 21:19:54'),
(8, 3, 8, NULL, 'Kathryn Little', 'miss-anne-schroeder', 34386, NULL, 1, NULL, NULL, 'F', 'Esse dolore consectetur tenetur et numquam quos.', 'Delectus qui ipsum et sequi voluptates.', 'https://via.placeholder.com/640x480.png/00bb55?text=vero', NULL, NULL, '2022-11-15 21:19:54', '2022-11-15 21:19:54'),
(9, 4, 10, NULL, 'Dwight Gerlach', 'romaine-block', 46135, NULL, 1, NULL, NULL, '+', 'Enim officiis quaerat consequatur ipsa ut dolores officia.', 'Sed nemo beatae ut ex maxime saepe.', 'https://via.placeholder.com/640x480.png/0000bb?text=qui', NULL, NULL, '2022-11-15 21:19:54', '2022-11-15 21:19:54'),
(10, 3, 2, NULL, 'Destini Thompson III', 'don-carter', 42010, NULL, 1, NULL, NULL, '[', 'Soluta in odio temporibus et eaque dolorem sint.', 'Magni delectus tempore voluptate iusto atque velit et officia.', 'https://via.placeholder.com/640x480.png/009922?text=illo', NULL, NULL, '2022-11-15 21:19:54', '2022-11-15 21:19:54'),
(11, 1, 9, NULL, 'Miss Marquise Cole', 'prof-conner-spinka', 18983, NULL, 1, NULL, NULL, '7', 'Cum dolores fugiat vero deserunt pariatur.', 'Sint veritatis iusto quasi a.', 'https://via.placeholder.com/640x480.png/000022?text=eum', NULL, NULL, '2022-11-15 21:19:54', '2022-11-15 21:19:54'),
(12, 3, 7, NULL, 'Sonya Macejkovic I', 'clotilde-wolf', 39340, NULL, 1, NULL, NULL, '^', 'Ut molestias error nobis.', 'Et cum autem placeat exercitationem tempora perferendis impedit odit.', 'https://via.placeholder.com/640x480.png/0099aa?text=asperiores', NULL, NULL, '2022-11-15 21:19:54', '2022-11-15 21:19:54'),
(13, 2, 2, NULL, 'Jazlyn King', 'haylee-beier-phd', 25129, NULL, 1, NULL, NULL, 'k', 'Commodi eum doloribus et quia officia.', 'Consectetur mollitia dolor dolore esse placeat.', 'https://via.placeholder.com/640x480.png/0099ee?text=doloremque', NULL, NULL, '2022-11-15 21:19:54', '2022-11-15 21:19:54'),
(14, 4, 9, NULL, 'Ned Wilderman', 'delilah-satterfield-jr', 36552, NULL, 1, NULL, NULL, 'M', 'Fuga illo culpa est molestiae.', 'Voluptatum adipisci vitae incidunt laborum molestias.', 'https://via.placeholder.com/640x480.png/0011ff?text=sunt', NULL, NULL, '2022-11-15 21:19:54', '2022-11-15 21:19:54'),
(15, 1, 10, NULL, 'Gail Schumm', 'maeve-bins', 29866, NULL, 1, NULL, NULL, ')', 'Libero odio suscipit et et.', 'Cumque earum sed et id repellendus quisquam ea alias.', 'https://via.placeholder.com/640x480.png/004455?text=ut', NULL, NULL, '2022-11-15 21:19:54', '2022-11-15 21:19:54'),
(16, 2, 6, NULL, 'Xzavier Hudson', 'antonette-lehner-md', 43280, NULL, 1, NULL, NULL, 'K', 'Nihil odit ducimus blanditiis est qui.', 'Dolore minus vel magni repudiandae libero autem voluptate.', 'https://via.placeholder.com/640x480.png/0066ee?text=sit', NULL, NULL, '2022-11-15 21:19:54', '2022-11-15 21:19:54'),
(17, 3, 7, NULL, 'Isaias Hane', 'carli-brown', 8986, NULL, 1, NULL, NULL, 'M', 'Voluptatibus vel voluptas vitae culpa doloribus.', 'Quisquam quae sit esse quis.', 'https://via.placeholder.com/640x480.png/002266?text=id', NULL, NULL, '2022-11-15 21:19:55', '2022-11-15 21:19:55'),
(18, 1, 7, NULL, 'Maryjane Medhurst', 'flavie-okon', 14965, NULL, 1, NULL, NULL, '+', 'Omnis ut saepe cupiditate architecto quae.', 'Dolores magni voluptatibus quos consequatur totam.', 'https://via.placeholder.com/640x480.png/006633?text=voluptas', NULL, NULL, '2022-11-15 21:19:55', '2022-11-15 21:19:55'),
(19, 1, 1, NULL, 'Anjali Gleichner', 'callie-batz', 19521, NULL, 1, NULL, NULL, '#', 'Eaque ipsa molestias perferendis ut ipsa neque aut.', 'Vel vitae odit consequatur nisi veritatis ut.', 'https://via.placeholder.com/640x480.png/0044bb?text=quae', NULL, NULL, '2022-11-15 21:19:55', '2022-11-15 21:19:55'),
(20, 1, 5, NULL, 'Ms. Kavon Jacobi', 'mr-keegan-mueller', 48786, NULL, 1, NULL, NULL, 'U', 'Et laudantium officiis enim minus dolor modi.', 'Tempora nisi neque iusto.', 'https://via.placeholder.com/640x480.png/00ffff?text=ipsa', NULL, NULL, '2022-11-15 21:19:55', '2022-11-15 21:19:55'),
(21, 3, 8, NULL, 'Margret Ondricka', 'summer-jacobson', 44445, NULL, 1, NULL, NULL, '|', 'Ea itaque aut molestiae et ut itaque.', 'Voluptatibus dolores occaecati iste sint et.', 'https://via.placeholder.com/640x480.png/008844?text=voluptas', NULL, NULL, '2022-11-15 21:19:55', '2022-11-15 21:19:55'),
(22, 1, 6, NULL, 'Laurine Champlin DVM', 'nathaniel-mohr', 43791, NULL, 1, NULL, NULL, '\\', 'Sed voluptatem omnis nulla mollitia.', 'Minus velit similique in dignissimos explicabo ut dolorem.', 'https://via.placeholder.com/640x480.png/0011aa?text=quis', NULL, NULL, '2022-11-15 21:19:55', '2022-11-15 21:19:55'),
(23, 4, 10, NULL, 'Gerson Mraz', 'shanna-hauck-i', 14111, NULL, 1, NULL, NULL, 'o', 'Dolor quo ipsam eos aut vel impedit.', 'Similique consequuntur et omnis et.', 'https://via.placeholder.com/640x480.png/007755?text=dolor', NULL, NULL, '2022-11-15 21:19:55', '2022-11-15 21:19:55'),
(24, 1, 9, NULL, 'Kim Zemlak', 'ms-anissa-monahan', 40984, NULL, 1, NULL, NULL, 'c', 'Rerum et consequatur labore.', 'Minima sint repellat quia qui.', 'https://via.placeholder.com/640x480.png/0033ee?text=tenetur', NULL, NULL, '2022-11-15 21:19:55', '2022-11-15 21:19:55'),
(25, 1, 9, NULL, 'Mr. Maxime Bahringer Sr.', 'rex-wiza-dvm', 35317, NULL, 1, NULL, NULL, 'M', 'Quod distinctio doloribus corrupti sit amet est et debitis.', 'Et quis enim laborum.', 'https://via.placeholder.com/640x480.png/0088ee?text=consequatur', NULL, NULL, '2022-11-15 21:19:55', '2022-11-15 21:19:55'),
(26, 4, 8, NULL, 'Eldora Berge', 'malinda-kemmer', 6596, NULL, 1, NULL, NULL, 'M', 'Nostrum fugit molestias rerum autem provident ad eligendi.', 'Rerum atque nihil nemo nostrum.', 'https://via.placeholder.com/640x480.png/00dddd?text=consequatur', NULL, NULL, '2022-11-15 21:19:56', '2022-11-15 21:19:56'),
(27, 1, 1, NULL, 'Shany Hagenes III', 'gussie-oconner-iv', 36502, NULL, 1, NULL, NULL, '$', 'Reprehenderit natus repudiandae quia vero.', 'Et non eum accusantium est.', 'https://via.placeholder.com/640x480.png/005599?text=a', NULL, NULL, '2022-11-15 21:19:56', '2022-11-15 21:19:56'),
(28, 4, 9, NULL, 'Rosa Gusikowski DDS', 'darian-schaden', 21592, NULL, 1, NULL, NULL, 'z', 'Et laborum excepturi reprehenderit quia.', 'Id laboriosam et alias omnis dicta neque.', 'https://via.placeholder.com/640x480.png/001166?text=quod', NULL, NULL, '2022-11-15 21:19:56', '2022-11-15 21:19:56'),
(29, 2, 9, NULL, 'Layla Roob V', 'ms-melisa-kerluke-i', 31739, NULL, 1, NULL, NULL, '`', 'Maiores omnis iure accusamus sit voluptatibus amet.', 'Et doloremque quas cum tempora aut explicabo laudantium.', 'https://via.placeholder.com/640x480.png/00eeaa?text=in', NULL, NULL, '2022-11-15 21:19:56', '2022-11-15 21:19:56'),
(30, 2, 10, NULL, 'Prof. Reggie Koepp DVM', 'branson-tromp-jr', 22836, NULL, 1, NULL, NULL, '-', 'Expedita enim doloribus aliquam tempore accusamus voluptas.', 'Omnis quasi velit similique.', 'https://via.placeholder.com/640x480.png/0033ff?text=nihil', NULL, NULL, '2022-11-15 21:19:56', '2022-11-15 21:19:56'),
(31, 1, 7, NULL, 'Prof. Benjamin Nitzsche', 'russel-sanford', 15523, NULL, 1, NULL, NULL, 'C', 'Impedit consequatur quae impedit facilis corrupti.', 'Omnis at aut ut dicta autem.', 'https://via.placeholder.com/640x480.png/00ee44?text=neque', NULL, NULL, '2022-11-15 21:19:56', '2022-11-15 21:19:56'),
(32, 4, 1, NULL, 'Eleonore Goyette MD', 'prof-dell-hettinger', 20385, NULL, 1, NULL, NULL, 'd', 'Ut quia alias asperiores voluptas laudantium atque.', 'Perspiciatis nam optio id eum.', 'https://via.placeholder.com/640x480.png/005588?text=et', NULL, NULL, '2022-11-15 21:19:56', '2022-11-15 21:19:56'),
(33, 4, 6, NULL, 'Weston Weber', 'johnpaul-rohan', 17217, NULL, 1, NULL, NULL, 'R', 'Consequuntur eligendi commodi perferendis eligendi nostrum.', 'Cupiditate est maiores rerum reiciendis cumque.', 'https://via.placeholder.com/640x480.png/00aa99?text=quas', NULL, NULL, '2022-11-15 21:19:57', '2022-11-15 21:19:57'),
(34, 2, 10, NULL, 'Alia Crist', 'miss-vita-williamson', 41681, NULL, 1, NULL, NULL, 'O', 'Culpa illum officiis assumenda sit architecto.', 'Debitis nihil enim ipsam.', 'https://via.placeholder.com/640x480.png/00ff77?text=vel', NULL, NULL, '2022-11-15 21:19:57', '2022-11-15 21:19:57'),
(35, 4, 2, NULL, 'Shea Bogan', 'fiona-greenholt', 16360, NULL, 1, NULL, NULL, ';', 'Pariatur itaque consectetur quam corporis facere perferendis.', 'Voluptatibus recusandae ipsum eveniet est.', 'https://via.placeholder.com/640x480.png/00aaee?text=est', NULL, NULL, '2022-11-15 21:19:57', '2022-11-15 21:19:57'),
(36, 1, 1, NULL, 'Mr. Lorenzo Bode MD', 'ms-joelle-lindgren-md', 40335, NULL, 1, NULL, NULL, 'j', 'Architecto dolore quam rem accusamus sint iure numquam voluptatum.', 'Non dignissimos optio reprehenderit illo assumenda magnam dolor.', 'https://via.placeholder.com/640x480.png/0022cc?text=voluptas', NULL, NULL, '2022-11-15 21:19:57', '2022-11-15 21:19:57'),
(37, 1, 7, NULL, 'Prof. Ronny Ebert DVM', 'mr-victor-smitham', 37878, NULL, 1, NULL, NULL, 'x', 'Velit doloremque nostrum molestias.', 'Dolorum inventore dolorum provident occaecati officia.', 'https://via.placeholder.com/640x480.png/0044ff?text=et', NULL, NULL, '2022-11-15 21:19:57', '2022-11-15 21:19:57'),
(38, 1, 4, NULL, 'Ocie Mayert', 'thaddeus-strosin', 9015, NULL, 1, NULL, NULL, 'm', 'Animi rerum voluptatem voluptas voluptate earum commodi molestias.', 'Velit eaque neque qui nostrum non iste et.', 'https://via.placeholder.com/640x480.png/0088bb?text=nihil', NULL, NULL, '2022-11-15 21:19:58', '2022-11-15 21:19:58'),
(39, 3, 7, NULL, 'Garry Reichert', 'mrs-abigail-harber', 36603, NULL, 1, NULL, NULL, ':', 'Fugit odit placeat cum impedit praesentium qui aut tempore.', 'Quibusdam dignissimos eius facere perspiciatis odio ratione aut.', 'https://via.placeholder.com/640x480.png/005588?text=maiores', NULL, NULL, '2022-11-15 21:19:58', '2022-11-15 21:19:58'),
(40, 4, 9, NULL, 'Mrs. Bulah Baumbach IV', 'prof-corine-kovacek', 21722, NULL, 1, NULL, NULL, 'h', 'Eum ut quae consequatur maiores nemo dolor.', 'Earum ea eligendi earum commodi molestiae consequatur quidem cum.', 'https://via.placeholder.com/640x480.png/0066aa?text=nemo', NULL, NULL, '2022-11-15 21:19:58', '2022-11-15 21:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-11-15 21:19:47', '2022-11-15 21:19:47'),
(2, 'product-manager', 'web', '2022-11-15 21:19:47', '2022-11-15 21:19:47'),
(3, 'user', 'web', '2022-11-15 21:19:47', '2022-11-15 21:19:47'),
(4, 'writer', 'web', '2022-11-15 21:19:47', '2022-11-15 21:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `title`, `slug`, `image`, `image_uri`, `created_at`, `updated_at`) VALUES
(1, 1, 'HP', 'hp', NULL, NULL, '2022-11-15 21:19:50', '2022-11-15 21:19:50'),
(2, 1, 'ASUS', 'asus', NULL, NULL, '2022-11-15 21:19:50', '2022-11-15 21:19:50'),
(3, 1, 'Xiomi', 'xiomi', NULL, NULL, '2022-11-15 21:19:50', '2022-11-15 21:19:50'),
(4, 1, 'Apple', 'apple', NULL, NULL, '2022-11-15 21:19:51', '2022-11-15 21:19:51'),
(5, 1, 'Headphone', 'headphone', NULL, NULL, '2022-11-15 21:19:51', '2022-11-15 21:19:51'),
(6, 1, 'Suny LCD', 'suny-lcd', NULL, NULL, '2022-11-15 21:19:51', '2022-11-15 21:19:51'),
(7, 1, 'Samsung TV', 'samsung-tv', NULL, NULL, '2022-11-15 21:19:51', '2022-11-15 21:19:51'),
(8, 1, 'Canon Camera', 'canon-camera', NULL, NULL, '2022-11-15 21:19:51', '2022-11-15 21:19:51'),
(9, 1, 'Fujifilm Camera', 'fujifilm-camera', NULL, NULL, '2022-11-15 21:19:51', '2022-11-15 21:19:51'),
(10, 1, 'Panasonic Camera', 'panasonic-camera', NULL, NULL, '2022-11-15 21:19:52', '2022-11-15 21:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mkarim', 'm.karimcu@gmail.com', NULL, '$2y$10$0OXVyCT2/DEjLEomcMDObOGRqw9Z1uUc8yiC5M7Op80oqlTbYBlM6', NULL, '2022-11-15 21:19:47', '2022-11-15 21:19:47'),
(2, 'riad', 'riad@gmail.com', NULL, '$2y$10$35rha4.ipNbepOO9PXJmcegh70ons27b7qTI.iHwsZgEpgmbrBeBO', NULL, '2022-11-15 21:19:48', '2022-11-15 21:19:48'),
(3, 'dulal', 'dulal@gmail.com', NULL, '$2y$10$6WiDwzz4ZXtitAGl1gVJ5ukn7YDCE8LQZuoq/7sDHgSxTnLT2zxJ6', NULL, '2022-11-15 21:19:49', '2022-11-15 21:19:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
