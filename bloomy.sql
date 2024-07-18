-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 05:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloomy`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(8, '2024_05_27_081127_create_password_reset_tokens_table', 2),
(9, '2024_05_27_081158_create_failed_jobs_table', 2),
(10, '2024_05_27_081224_create_personal_access_tokens_table', 2),
(11, '0001_01_01_000002_create_jobs_table', 3),
(12, '2024_05_27_075208_create_wisata_table', 4),
(13, '2024_05_27_075503_create_users_table', 4),
(14, '2024_05_27_075632_create_umkm_table', 4),
(15, '2024_05_27_075758_create_transaksi_table', 4),
(16, '2024_05_27_075857_create_kuliner_table', 4),
(17, '2024_05_27_080011_create_blog_table', 4),
(18, '2024_05_27_084912_create_personal_access_tokens_table', 5),
(19, '2024_06_12_182053_create_tb_role_table', 6),
(21, '2024_06_14_113029_create_tb_kategori_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('YaCjoLFQbl9Yoje8HYTubCxnmacR5HriHz0EN8Fm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWc1TGkyaXdUUURVMmFiUThpSHZwNjh6NEIyQkFLZUtCamMyeHZiZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1721318053);

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `id_blog` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_wisata` bigint(20) UNSIGNED DEFAULT NULL,
  `id_umkm` bigint(20) UNSIGNED DEFAULT NULL,
  `id_kuliner` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_penulis` varchar(255) NOT NULL,
  `artikel` text NOT NULL,
  `foto_blog` varchar(255) DEFAULT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_blog`
--

INSERT INTO `tb_blog` (`id_blog`, `id_kategori`, `id_wisata`, `id_umkm`, `id_kuliner`, `nama_penulis`, `artikel`, `foto_blog`, `tgl_input`) VALUES
(1, 3, NULL, NULL, 3, 'A Firas Manar', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium placeat pariatur ut quisquam temporibus cumque. Nesciunt illo id natus quibusdam, itaque fugit error, odio culpa unde facilis quasi neque dignissimos iste quas cum accusantium, temporibus asperiores voluptatem impedit possimus ducimus. Iusto accusantium quaerat voluptatibus at, sit maxime. Odio, pariatur eligendi? Architecto est porro quaerat perferendis maxime, quidem fugiat excepturi dolorum ab voluptas earum necessitatibus, soluta iste vero laboriosam voluptates, quia omnis illum eius saepe odit unde dolorem corporis ut. Eius facere inventore cupiditate quidem? Voluptatibus animi officiis ducimus doloremque nemo, molestias id. Mollitia ipsum sunt officiis officia facilis? Modi quae quaerat, facere omnis dignissimos temporibus corrupti quis consectetur reprehenderit alias, expedita doloribus dolorum quam itaque vitae laborum fugit error sed suscipit minus perspiciatis, fuga soluta! Dolor velit sapiente sint mollitia doloribus voluptatem officia temporibus alias facilis deserunt et nobis tenetur, inventore vitae ab illo id non quo dolores dolorem! A consectetur laboriosam cupiditate necessitatibus aut! Nihil, et earum asperiores incidunt quos similique qui odit nemo ex mollitia dolores enim nisi accusamus quod numquam deserunt nulla pariatur itaque ut illum quidem a dicta quasi. Nisi, recusandae rerum vel nam vitae sit cupiditate aut? Autem dolore aut ex repellat est veniam explicabo officia vel porro dolorem amet, reiciendis distinctio accusantium reprehenderit aperiam earum quasi quam quod cum nostrum asperiores dignissimos enim modi. Cum dignissimos vel impedit quis ex, mollitia eaque culpa sequi reprehenderit aspernatur commodi ducimus enim, asperiores illum numquam obcaecati error velit quasi quae doloribus cupiditate. Unde, accusamus dolorem! Tenetur facere ducimus numquam libero minima saepe consequatur accusamus expedita distinctio ipsam dolores, amet molestiae maiores aliquid doloribus sed iste quas qui obcaecati! Consequatur voluptatum sequi, eaque quasi iste harum odio. Officia, nobis? Nemo harum praesentium sit reiciendis tempore voluptatem rerum fugit nesciunt, earum animi totam alias fugiat possimus! A praesentium quam, aliquid, distinctio consectetur architecto at exercitationem odit doloribus mollitia velit ad quod non aspernatur in ex assumenda accusamus porro obcaecati natus. Animi labore, magni explicabo itaque sequi dolor doloremque quia fugiat enim illo? Sit autem nostrum nemo quas aliquid alias. Eius provident assumenda quae possimus rem porro magni recusandae laboriosam accusamus aspernatur ratione odit incidunt nobis odio repellat, necessitatibus quo qui exercitationem excepturi? Repellat debitis modi beatae, minima, placeat ea, perferendis incidunt culpa praesentium nemo quo tempora corrupti perspiciatis excepturi sunt. Harum porro, vel voluptates commodi mollitia, ratione reiciendis provident ipsam excepturi libero earum possimus. Dolore quas error cum blanditiis nesciunt ratione, quibusdam eaque vero voluptatum fugiat voluptates distinctio officia, similique earum aliquid quasi voluptatibus nostrum consequuntur provident? Maiores dignissimos aspernatur aut perferendis iste vero maxime doloribus necessitatibus at perspiciatis voluptate nesciunt nisi pariatur enim ut dicta exercitationem ipsa omnis velit, tempora laboriosam repudiandae, expedita labore. Minus alias veritatis odit. Excepturi illo laborum possimus pariatur odio vero, accusantium nemo distinctio eligendi deleniti dolorem quisquam eaque suscipit atque autem inventore sint animi necessitatibus iste? Placeat ipsam iste officiis, animi dignissimos cupiditate, aut ad ullam recusandae ducimus nulla aliquam eligendi ratione illum eos voluptatibus quos consectetur quisquam veniam facilis, rerum repellendus? Voluptatum!', 'afiw6lUNZIyc8EYJ2tjz8N5jD0eKV0bkWB0wWEK6.jpg', '2024-06-09'),
(3, 2, NULL, 4, NULL, 'Joko Mankuranisa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium placeat pariatur ut quisquam temporibus cumque. Nesciunt illo id natus quibusdam, itaque fugit error, odio culpa unde facilis quasi neque dignissimos iste quas cum accusantium, temporibus asperiores voluptatem impedit possimus ducimus. Iusto accusantium quaerat voluptatibus at, sit maxime. Odio, pariatur eligendi? Architecto est porro quaerat perferendis maxime, quidem fugiat excepturi dolorum ab voluptas earum necessitatibus, soluta iste vero laboriosam voluptates, quia omnis illum eius saepe odit unde dolorem corporis ut. Eius facere inventore cupiditate quidem? Voluptatibus animi officiis ducimus doloremque nemo, molestias id. Mollitia ipsum sunt officiis officia facilis? Modi quae quaerat, facere omnis dignissimos temporibus corrupti quis consectetur reprehenderit alias, expedita doloribus dolorum quam itaque vitae laborum fugit error sed suscipit minus perspiciatis, fuga soluta! Dolor velit sapiente sint mollitia doloribus voluptatem officia temporibus alias facilis deserunt et nobis tenetur, inventore vitae ab illo id non quo dolores dolorem! A consectetur laboriosam cupiditate necessitatibus aut! Nihil, et earum asperiores incidunt quos similique qui odit nemo ex mollitia dolores enim nisi accusamus quod numquam deserunt nulla pariatur itaque ut illum quidem a dicta quasi. Nisi, recusandae rerum vel nam vitae sit cupiditate aut? Autem dolore aut ex repellat est veniam explicabo officia vel porro dolorem amet, reiciendis distinctio accusantium reprehenderit aperiam earum quasi quam quod cum nostrum asperiores dignissimos enim modi. Cum dignissimos vel impedit quis ex, mollitia eaque culpa sequi reprehenderit aspernatur commodi ducimus enim, asperiores illum numquam obcaecati error velit quasi quae doloribus cupiditate. Unde, accusamus dolorem! Tenetur facere ducimus numquam libero minima saepe consequatur accusamus expedita distinctio ipsam dolores, amet molestiae maiores aliquid doloribus sed iste quas qui obcaecati! Consequatur voluptatum sequi, eaque quasi iste harum odio. Officia, nobis? Nemo harum praesentium sit reiciendis tempore voluptatem rerum fugit nesciunt, earum animi totam alias fugiat possimus! A praesentium quam, aliquid, distinctio consectetur architecto at exercitationem odit doloribus mollitia velit ad quod non aspernatur in ex assumenda accusamus porro obcaecati natus. Animi labore, magni explicabo itaque sequi dolor doloremque quia fugiat enim illo? Sit autem nostrum nemo quas aliquid alias. Eius provident assumenda quae possimus rem porro magni recusandae laboriosam accusamus aspernatur ratione odit incidunt nobis odio repellat, necessitatibus quo qui exercitationem excepturi? Repellat debitis modi beatae, minima, placeat ea, perferendis incidunt culpa praesentium nemo quo tempora corrupti perspiciatis excepturi sunt. Harum porro, vel voluptates commodi mollitia, ratione reiciendis provident ipsam excepturi libero earum possimus. Dolore quas error cum blanditiis nesciunt ratione, quibusdam eaque vero voluptatum fugiat voluptates distinctio officia, similique earum aliquid quasi voluptatibus nostrum consequuntur provident? Maiores dignissimos aspernatur aut perferendis iste vero maxime doloribus necessitatibus at perspiciatis voluptate nesciunt nisi pariatur enim ut dicta exercitationem ipsa omnis velit, tempora laboriosam repudiandae, expedita labore. Minus alias veritatis odit. Excepturi illo laborum possimus pariatur odio vero, accusantium nemo distinctio eligendi deleniti dolorem quisquam eaque suscipit atque autem inventore sint animi necessitatibus iste? Placeat ipsam iste officiis, animi dignissimos cupiditate, aut ad ullam recusandae ducimus nulla aliquam eligendi ratione illum eos voluptatibus quos consectetur quisquam veniam facilis, rerum repellendus? Voluptatum!', 'T1kdIjV6U2NVhBz0LCwxC165LQVcf3vnL5m6sYYY.jpg', '2024-06-15'),
(4, 3, NULL, NULL, 1, 'Joko Mankuranisa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium placeat pariatur ut quisquam temporibus cumque. Nesciunt illo id natus quibusdam, itaque fugit error, odio culpa unde facilis quasi neque dignissimos iste quas cum accusantium, temporibus asperiores voluptatem impedit possimus ducimus. Iusto accusantium quaerat voluptatibus at, sit maxime. Odio, pariatur eligendi? Architecto est porro quaerat perferendis maxime, quidem fugiat excepturi dolorum ab voluptas earum necessitatibus, soluta iste vero laboriosam voluptates, quia omnis illum eius saepe odit unde dolorem corporis ut. Eius facere inventore cupiditate quidem? Voluptatibus animi officiis ducimus doloremque nemo, molestias id. Mollitia ipsum sunt officiis officia facilis? Modi quae quaerat, facere omnis dignissimos temporibus corrupti quis consectetur reprehenderit alias, expedita doloribus dolorum quam itaque vitae laborum fugit error sed suscipit minus perspiciatis, fuga soluta! Dolor velit sapiente sint mollitia doloribus voluptatem officia temporibus alias facilis deserunt et nobis tenetur, inventore vitae ab illo id non quo dolores dolorem! A consectetur laboriosam cupiditate necessitatibus aut! Nihil, et earum asperiores incidunt quos similique qui odit nemo ex mollitia dolores enim nisi accusamus quod numquam deserunt nulla pariatur itaque ut illum quidem a dicta quasi. Nisi, recusandae rerum vel nam vitae sit cupiditate aut? Autem dolore aut ex repellat est veniam explicabo officia vel porro dolorem amet, reiciendis distinctio accusantium reprehenderit aperiam earum quasi quam quod cum nostrum asperiores dignissimos enim modi. Cum dignissimos vel impedit quis ex, mollitia eaque culpa sequi reprehenderit aspernatur commodi ducimus enim, asperiores illum numquam obcaecati error velit quasi quae doloribus cupiditate. Unde, accusamus dolorem! Tenetur facere ducimus numquam libero minima saepe consequatur accusamus expedita distinctio ipsam dolores, amet molestiae maiores aliquid doloribus sed iste quas qui obcaecati! Consequatur voluptatum sequi, eaque quasi iste harum odio. Officia, nobis? Nemo harum praesentium sit reiciendis tempore voluptatem rerum fugit nesciunt, earum animi totam alias fugiat possimus! A praesentium quam, aliquid, distinctio consectetur architecto at exercitationem odit doloribus mollitia velit ad quod non aspernatur in ex assumenda accusamus porro obcaecati natus. Animi labore, magni explicabo itaque sequi dolor doloremque quia fugiat enim illo? Sit autem nostrum nemo quas aliquid alias. Eius provident assumenda quae possimus rem porro magni recusandae laboriosam accusamus aspernatur ratione odit incidunt nobis odio repellat, necessitatibus quo qui exercitationem excepturi? Repellat debitis modi beatae, minima, placeat ea, perferendis incidunt culpa praesentium nemo quo tempora corrupti perspiciatis excepturi sunt. Harum porro, vel voluptates commodi mollitia, ratione reiciendis provident ipsam excepturi libero earum possimus. Dolore quas error cum blanditiis nesciunt ratione, quibusdam eaque vero voluptatum fugiat voluptates distinctio officia, similique earum aliquid quasi voluptatibus nostrum consequuntur provident? Maiores dignissimos aspernatur aut perferendis iste vero maxime doloribus necessitatibus at perspiciatis voluptate nesciunt nisi pariatur enim ut dicta exercitationem ipsa omnis velit, tempora laboriosam repudiandae, expedita labore. Minus alias veritatis odit. Excepturi illo laborum possimus pariatur odio vero, accusantium nemo distinctio eligendi deleniti dolorem quisquam eaque suscipit atque autem inventore sint animi necessitatibus iste? Placeat ipsam iste officiis, animi dignissimos cupiditate, aut ad ullam recusandae ducimus nulla aliquam eligendi ratione illum eos voluptatibus quos consectetur quisquam veniam facilis, rerum repellendus? Voluptatum!', 'TyxK2IpFk59cDPnAeKp4vJH751lrtqZycNEroMEz.jpg', '2024-06-15'),
(5, 1, 1, NULL, NULL, 'Al Firas Manar', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium placeat pariatur ut quisquam temporibus cumque. Nesciunt illo id natus quibusdam, itaque fugit error, odio culpa unde facilis quasi neque dignissimos iste quas cum accusantium, temporibus asperiores voluptatem impedit possimus ducimus. Iusto accusantium quaerat voluptatibus at, sit maxime. Odio, pariatur eligendi? Architecto est porro quaerat perferendis maxime, quidem fugiat excepturi dolorum ab voluptas earum necessitatibus, soluta iste vero laboriosam voluptates, quia omnis illum eius saepe odit unde dolorem corporis ut. Eius facere inventore cupiditate quidem? Voluptatibus animi officiis ducimus doloremque nemo, molestias id. Mollitia ipsum sunt officiis officia facilis? Modi quae quaerat, facere omnis dignissimos temporibus corrupti quis consectetur reprehenderit alias, expedita doloribus dolorum quam itaque vitae laborum fugit error sed suscipit minus perspiciatis, fuga soluta! Dolor velit sapiente sint mollitia doloribus voluptatem officia temporibus alias facilis deserunt et nobis tenetur, inventore vitae ab illo id non quo dolores dolorem! A consectetur laboriosam cupiditate necessitatibus aut! Nihil, et earum asperiores incidunt quos similique qui odit nemo ex mollitia dolores enim nisi accusamus quod numquam deserunt nulla pariatur itaque ut illum quidem a dicta quasi. Nisi, recusandae rerum vel nam vitae sit cupiditate aut? Autem dolore aut ex repellat est veniam explicabo officia vel porro dolorem amet, reiciendis distinctio accusantium reprehenderit aperiam earum quasi quam quod cum nostrum asperiores dignissimos enim modi. Cum dignissimos vel impedit quis ex, mollitia eaque culpa sequi reprehenderit aspernatur commodi ducimus enim, asperiores illum numquam obcaecati error velit quasi quae doloribus cupiditate. Unde, accusamus dolorem! Tenetur facere ducimus numquam libero minima saepe consequatur accusamus expedita distinctio ipsam dolores, amet molestiae maiores aliquid doloribus sed iste quas qui obcaecati! Consequatur voluptatum sequi, eaque quasi iste harum odio. Officia, nobis? Nemo harum praesentium sit reiciendis tempore voluptatem rerum fugit nesciunt, earum animi totam alias fugiat possimus! A praesentium quam, aliquid, distinctio consectetur architecto at exercitationem odit doloribus mollitia velit ad quod non aspernatur in ex assumenda accusamus porro obcaecati natus. Animi labore, magni explicabo itaque sequi dolor doloremque quia fugiat enim illo? Sit autem nostrum nemo quas aliquid alias. Eius provident assumenda quae possimus rem porro magni recusandae laboriosam accusamus aspernatur ratione odit incidunt nobis odio repellat, necessitatibus quo qui exercitationem excepturi? Repellat debitis modi beatae, minima, placeat ea, perferendis incidunt culpa praesentium nemo quo tempora corrupti perspiciatis excepturi sunt. Harum porro, vel voluptates commodi mollitia, ratione reiciendis provident ipsam excepturi libero earum possimus. Dolore quas error cum blanditiis nesciunt ratione, quibusdam eaque vero voluptatum fugiat voluptates distinctio officia, similique earum aliquid quasi voluptatibus nostrum consequuntur provident? Maiores dignissimos aspernatur aut perferendis iste vero maxime doloribus necessitatibus at perspiciatis voluptate nesciunt nisi pariatur enim ut dicta exercitationem ipsa omnis velit, tempora laboriosam repudiandae, expedita labore. Minus alias veritatis odit. Excepturi illo laborum possimus pariatur odio vero, accusantium nemo distinctio eligendi deleniti dolorem quisquam eaque suscipit atque autem inventore sint animi necessitatibus iste? Placeat ipsam iste officiis, animi dignissimos cupiditate, aut ad ullam recusandae ducimus nulla aliquam eligendi ratione illum eos voluptatibus quos consectetur quisquam veniam facilis, rerum repellendus? Voluptatum!', 'STAriCXmVhZbFf1ZdoGuhvomckxiEpXFI8INTVKw.jpg', '2024-06-15'),
(6, 1, 2, NULL, NULL, 'Al Firas Manar', 'Candi Pari ditemukan pada tanggal 16 Oktober 1906 terletak di Desa Candi Pari, Kecamatan Porong Kabupaten Sidoarjo, merupakan bangunan persegi empat dari batu bata dengan arah  ke barat, dengan ambang serta bagian atas gerbang terbuat dari batu andesit. Bangunan Cagar Budaya Candi Pari berdenah persegi empat dan menghadap ke barat. Candi ini memiliki karakteristik yang berbeda dengan karakteristik candi di Jawa Timur. Ciri khas pola bangunan candi masa kerajaan Majapahit selalu berorientasi vertikal dan langsing pada bagian tubuh (tengah) dan trapesium pada bagian atap/mahkota dan selalu terbuat dari bahan batu emas. Satu – satunya ciri Majapahit yang ada di candi ini hanyalah bahannya yang terbuat dari bata merah. Selain itu, Candi Pari memiliki panjang 16,86 m , lebar 14,10 m, dan tinggi 13,40 m sehingga terkesan pendek dan lebar dibandingkan candi-candi masa kerajaan Majapahit.\r\n\r\nTerdiri dari tiga bagian yaitu kaki, badan dan atap. Bagian kaki berdenah empat persegi dengan ukuran panjang 13,55 meter, lebar 13,40 meter, dan tinggi 1,50 meter. Badan candi berbentuk persegi empat dengan panjang dan lebar 7,80 meter, serta tinggi 6,30 meter. Pintu masuk berbentuk segi empat dengan panjang 2,90 meter, lebar 1,23 meter dan tebal 1 meter dengan 7 buah penguat pintu yang salah satunya terbuat dari batu andesit. dan memiliki pahatan angka tahun 1293 saka (1371 M). Terdapat pahatan sangka bersayap, yang kemungkinan menunjukkan fungsi candi sebagai pendharmaan. Sangka bersayap berada di atas relung di ketiga sisi tubuh candi. Melihat ciri yang tersisa, Candi Pari bernafaskan agama Hindu. Bagian atap Atap candi sebagian besar telah runtuh namun terdapat sisa atap dengan panjang dan lebar 7,80 meter dan tinggi 4,50 meter dengan hiasan berupa menara-menara panjal.\r\n\r\nPenelitian yang mendalam mengenai Candi Pari telah dilakukan oleh N. J. Krom. yang dimuat dalam bukunya “Inleading Tot de Hindoe Javansch Khust” tahun 1923, menurut Krom bangunan Candi Pari mendapat pengaruh dari Campa khususnya dari Candi di Mison. Pengaruh tersebut tampak dari bentuk dan ornamentasi, walau demikian menurut N.J. Kroom karakter Jawa masih tampak dominan pada bangunan ini. Berdasarkan dalam kitab Nagarakrtagama juga menyebutkan bahwa Tjampa Kambodja serta Jawa itu mempunyai hubungan dekat.  N. J. Krom menelaah adanya hubungan yang cukup dekat antara Java dengan Campa pada masanya. Hubungan kenegaraan antara Campa dan Majapahit menyebabkan pembangunan Candi Pari mempunyai pengaruh kesenian Campa.\r\n\r\nPada tahun 1915, ditemukan beberapa arca, antara lain dua buah Arca Siwa Mahadewa, dua buah Arca Agastya, tujuh buah Arca Ganesha, dan tiga buah Arca Budha yang seluruhnya telah dibawa ke Museum Nasional. Temuan arca-arca ini dijadikan dasar untuk menduga bahwa Candi Pari merupakan candi Hindu.\r\n\r\nKegiatan pelestarian yang pernah dilakukan pada candi ini adalah penetapan sebagai cagar budaya peringkat nasional pada tahun 2022, kegiatan pemugaran yang telah dimulai sejak masa Kolonial Belanda dengan melakukan penambahan kayu pada langit-langit pintu masuk. Pada tahun 1994-1999 candi kembali dipugar oleh Kanwil Depdikbud dan Suaka Peninggalan Sejarah dan Purbakala Jawa Timur. (Deasy Ardini)', 'piRZ2AdtbsqQXawv4E7pQjDprA5pYGKT43f4AgXg.jpg', '2024-07-18'),
(7, 1, 3, NULL, NULL, 'Al Firas Manar', 'Sebagai salah satu ikon di Kota Delta, tentu saja ada banyak fasilitas yang disediakan di Alun-Alun Sidoarjo.\r\nNamun, sebelumnya ada beberapa daya tarik yang patut diketahui dari alun-alun tersebut. Pertama adalah kehadiran Monumen Kabupaten Sidoarjo, yang terletak persis di tengah area alun-alun dan menghadap ke sisi utara.  Struktur megah berlapis marmer yang dikelilingi taman indah ini, melambangkan cita-cita Sidoarjo yang ingin terus maju dari masa ke masa. Kedua, ada Monumen Jayandaru yang terletak di sisi timur alun-alun. Menghadap langsung ke jalan raya utama, monumen ini memiliki makna Wahyu Kejayaan.  Secara tak langsung, Monumen Jayandaru melambangkan harapan agar Kabupaten Sidoarjo tetap jaya di masa mendatang. Monumen ini memiliki tinggi 25 meter dan dikelilingi sembilan patung ikan, sebagai simbol bahwa Sidoarjo merupakan daerah penghasil ikan.  Begitu pula dengan patung udang yang ada di bagian atas monumen. Selain dua monumen tersebut, alun-alun ini memiliki pendopo megah sebagai fasilitas yang bisa diakses oleh publik. Pendopo ini kadang digunakan untuk menggelar upacara hari besar maupun dialog bersama warga Sidoarjo.  Di hari-hari biasa, pendopo ini kerap dimanfaatkan para anak muda untuk berlatih aneka kesenian, seperti tari dan pencak silat. Sedangkan untuk anak-anak, tersedia arena bermain dengan wahana yang menyenangkan, seperti perosotan dan ayunan yang dikelilingi pagar agar lebih aman.', 'FhjBMoRxUgCsLmG45CL3VXMcRiKLLiJx58Bcm6UR.jpg', '2024-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'WISATA'),
(2, 'UMKM'),
(3, 'KULINER');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuliner`
--

CREATE TABLE `tb_kuliner` (
  `id_kuliner` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_kuliner` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `foto_usaha` varchar(255) DEFAULT NULL,
  `tgl_berdiri` date NOT NULL,
  `tgl_input` date NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kuliner`
--

INSERT INTO `tb_kuliner` (`id_kuliner`, `id_kategori`, `nama_kuliner`, `keterangan`, `foto_usaha`, `tgl_berdiri`, `tgl_input`, `lokasi`) VALUES
(1, 3, 'Bakso Cak Pitung', 'Bakso cak pitung adalah bakso yang memiliki banyak varian pentol, dimana setiap varian memiliki cita rasa yang unik, khas dan tentunya sangat membuat porsi makan meningkat karena ke lezatannya.', 'CyiqzRz4XIExqso07Ij0tYmtUcvvXcT010ScsXKb.jpg', '2024-06-01', '2024-06-15', 'Bakso Cak Pitung Jl. Gajah Magersari No.36, Gajah Timur, Magersari, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61212'),
(2, 3, 'Kupang - Lontong Balap Kantor Pos', 'Hanya tunai · Menyediakan tempat duduk di area terbuka · Tidak menerima reservasi', 'u5ye6euUiws3uoXZo2AYZBA388F9zPvkyyyuTEy8.jpg', '2024-06-01', '2024-06-15', 'Jl. DR. Cipto Mangun Kusumo No.18, Gajah Timur, Sidokumpul, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61212'),
(3, 3, 'Rawon Gajah Mada Sidoarjo', 'Hanya tunai · Menyediakan tempat duduk di area terbuka · Tidak menerima reservasi', '3l8P90jIoOi5WmardZnTwBZDzNdMrkQKjHV6K7pX.jpg', '2024-06-01', '2024-07-02', 'GPV9+23G, Jl. Gajah Mada, Pekauman, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61213');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pekerja`
--

CREATE TABLE `tb_pekerja` (
  `id_pekerja` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_wisata` int(11) DEFAULT NULL,
  `alamat_pekerja` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `foto_pekerja` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pekerja`
--

INSERT INTO `tb_pekerja` (`id_pekerja`, `id_user`, `id_wisata`, `alamat_pekerja`, `no_hp`, `berkas`, `foto_pekerja`, `tgl_masuk`, `tgl_keluar`) VALUES
(1, 12, 1, 'Jl. Kawasan Bandung dingin II No.20', '082321025537', 'SR_6_Muhammad Ulin Nuha Al Firas Manar.pdf', 'K8ltUZUztXoBdZQUL3R1hgx6up9D4fzhcrznyLmH.jpg', '2024-06-16', '2024-06-16'),
(3, 13, 3, 'Jl.Gajah Magersari 1 No.20 RT.11 RW.04', '082331016638', 'sYrT4qeV8Zr4RW86IHBmcyNhz32IlJjLntoJEqXT.pdf', 'Xigsn2swuSui3iCuEYIKnsYJt2Ah5mAv7Oy5Yox5.jpg', '2024-06-21', '2024-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertanyaan`
--

CREATE TABLE `tb_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pertanyaan`
--

INSERT INTO `tb_pertanyaan` (`id_pertanyaan`, `pertanyaan`) VALUES
(1, 'Seberapa puas Anda dengan kemudahan navigasi di website ini?'),
(2, 'Seberapa puas Anda dengan kualitas informasi yang tersedia tentang tempat wisata di website ini?'),
(3, 'Seberapa puas Anda dengan fitur tour guide yang disediakan oleh website ini?'),
(4, 'Seberapa puas Anda dengan proses penjualan tiket wisata di website ini?'),
(5, 'Seberapa puas Anda dengan fitur pendaftaran usaha UMKM di website ini?'),
(6, 'Seberapa puas Anda dengan kualitas informasi kuliner yang disediakan di website ini?'),
(7, 'Seberapa puas Anda dengan desain visual dan estetika website ini?'),
(8, 'Seberapa puas Anda dengan kecepatan loading website ini?'),
(9, 'Seberapa puas Anda dengan responsivitas website ini pada perangkat mobile?'),
(10, 'Seberapa puas Anda dengan layanan dukungan pelanggan yang disediakan oleh website ini?');

-- --------------------------------------------------------

--
-- Table structure for table `tb_review`
--

CREATE TABLE `tb_review` (
  `id_review` int(11) NOT NULL,
  `id_pertanyaan` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `np1` int(11) DEFAULT NULL,
  `np2` int(11) DEFAULT NULL,
  `np3` int(11) DEFAULT NULL,
  `np4` int(11) DEFAULT NULL,
  `np5` int(11) DEFAULT NULL,
  `np6` int(11) DEFAULT NULL,
  `np7` int(11) DEFAULT NULL,
  `np8` int(11) DEFAULT NULL,
  `np9` int(11) DEFAULT NULL,
  `np10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_review`
--

INSERT INTO `tb_review` (`id_review`, `id_pertanyaan`, `email`, `nama_lengkap`, `tujuan`, `np1`, `np2`, `np3`, `np4`, `np5`, `np6`, `np7`, `np8`, `np9`, `np10`) VALUES
(1, '1,2,3,4,5,6,7,8,9,10', 'john.doe@example.com', 'John Doe', 'Tour Guide', 3, 2, 5, 2, 3, 3, 5, 1, 3, 4),
(2, '1,2,3,4,5,6,7,8,9,10', 'jane.smith@example.com', 'Jane Smith', 'Penjualan Tiket', 1, 5, 4, 1, 1, 4, 3, 2, 3, 2),
(3, '1,2,3,4,5,6,7,8,9,10', 'alice.johnson@example.com', 'Alice Johnson', 'Pendaftaran UMKM', 1, 1, 4, 4, 3, 4, 3, 3, 2, 4),
(4, '1,2,3,4,5,6,7,8,9,10', 'bob.brown@example.com', 'Bob Brown', 'Kuliner', 3, 4, 3, 4, 5, 2, 4, 3, 5, 1),
(5, '1,2,3,4,5,6,7,8,9,10', 'carol.white@example.com', 'Carol White', 'Tour Guide', 3, 4, 3, 5, 5, 5, 2, 2, 5, 1),
(6, '1,2,3,4,5,6,7,8,9,10', 'dave.green@example.com', 'Dave Green', 'Penjualan Tiket', 4, 2, 1, 3, 4, 4, 5, 5, 1, 2),
(7, '1,2,3,4,5,6,7,8,9,10', 'eve.black@example.com', 'Eve Black', 'Pendaftaran UMKM', 4, 3, 1, 5, 5, 1, 5, 2, 5, 5),
(8, '1,2,3,4,5,6,7,8,9,10', 'frank.harris@example.com', 'Frank Harris', 'Kuliner', 2, 5, 4, 4, 1, 4, 2, 3, 2, 5),
(9, '1,2,3,4,5,6,7,8,9,10', 'grace.clark@example.com', 'Grace Clark', 'Tour Guide', 4, 5, 4, 4, 5, 4, 5, 3, 3, 1),
(10, '1,2,3,4,5,6,7,8,9,10', 'henry.lewis@example.com', 'Henry Lewis', 'Penjualan Tiket', 4, 1, 3, 5, 4, 3, 2, 1, 5, 2),
(11, '1,2,3,4,5,6,7,8,9,10', 'isabel.walker@example.com', 'Isabel Walker', 'Pendaftaran UMKM', 5, 1, 2, 5, 5, 3, 1, 5, 5, 5),
(12, '1,2,3,4,5,6,7,8,9,10', 'jack.king@example.com', 'Jack King', 'Kuliner', 2, 3, 2, 2, 3, 1, 2, 4, 3, 2),
(13, '1,2,3,4,5,6,7,8,9,10', 'karen.hill@example.com', 'Karen Hill', 'Tour Guide', 1, 1, 4, 5, 1, 2, 5, 2, 3, 5),
(14, '1,2,3,4,5,6,7,8,9,10', 'leo.wright@example.com', 'Leo Wright', 'Penjualan Tiket', 3, 3, 5, 3, 4, 5, 2, 3, 4, 4),
(15, '1,2,3,4,5,6,7,8,9,10', 'mia.lopez@example.com', 'Mia Lopez', 'Pendaftaran UMKM', 5, 5, 2, 4, 4, 4, 5, 3, 5, 1),
(16, '1,2,3,4,5,6,7,8,9,10', 'nina.scott@example.com', 'Nina Scott', 'Kuliner', 4, 2, 3, 5, 3, 4, 1, 3, 3, 3),
(17, '1,2,3,4,5,6,7,8,9,10', 'oliver.adams@example.com', 'Oliver Adams', 'Tour Guide', 3, 4, 1, 1, 1, 1, 3, 5, 3, 4),
(18, '1,2,3,4,5,6,7,8,9,10', 'paula.baker@example.com', 'Paula Baker', 'Penjualan Tiket', 2, 1, 2, 3, 3, 4, 1, 4, 3, 5),
(19, '1,2,3,4,5,6,7,8,9,10', 'quinn.ward@example.com', 'Quinn Ward', 'Pendaftaran UMKM', 1, 3, 2, 2, 2, 3, 5, 5, 3, 2),
(20, '1,2,3,4,5,6,7,8,9,10', 'rose.morris@example.com', 'Rose Morris', 'Kuliner', 4, 3, 4, 4, 2, 5, 2, 4, 2, 5),
(21, '1,2,3,4,5,6,7,8,9,10', 'samuel.ross@example.com', 'Samuel Ross', 'Tour Guide', 4, 4, 3, 1, 4, 5, 5, 2, 3, 1),
(22, '1,2,3,4,5,6,7,8,9,10', 'tina.price@example.com', 'Tina Price', 'Penjualan Tiket', 2, 4, 1, 3, 1, 5, 4, 3, 4, 3),
(23, '1,2,3,4,5,6,7,8,9,10', 'uma.cox@example.com', 'Uma Cox', 'Pendaftaran UMKM', 3, 4, 1, 4, 5, 4, 5, 2, 3, 3),
(24, '1,2,3,4,5,6,7,8,9,10', 'victor.griffin@example.com', 'Victor Griffin', 'Kuliner', 5, 1, 5, 1, 5, 3, 3, 2, 3, 4),
(25, '1,2,3,4,5,6,7,8,9,10', 'wendy.reed@example.com', 'Wendy Reed', 'Tour Guide', 2, 3, 3, 3, 3, 3, 2, 2, 4, 2),
(26, '1,2,3,4,5,6,7,8,9,10', 'xander.russell@example.com', 'Xander Russell', 'Penjualan Tiket', 5, 5, 3, 3, 3, 4, 5, 4, 3, 2),
(27, '1,2,3,4,5,6,7,8,9,10', 'yasmin.hayes@example.com', 'Yasmin Hayes', 'Pendaftaran UMKM', 1, 4, 4, 4, 4, 1, 2, 2, 4, 1),
(28, '1,2,3,4,5,6,7,8,9,10', 'zachary.cole@example.com', 'Zachary Cole', 'Kuliner', 5, 1, 3, 4, 4, 4, 1, 2, 3, 1),
(29, '1,2,3,4,5,6,7,8,9,10', 'amy.bell@example.com', 'Amy Bell', 'Tour Guide', 2, 1, 3, 4, 3, 1, 4, 1, 5, 3),
(30, '1,2,3,4,5,6,7,8,9,10', 'benjamin.lee@example.com', 'Benjamin Lee', 'Penjualan Tiket', 1, 3, 3, 4, 2, 1, 4, 2, 4, 3),
(31, '1,2,3,4,5,6,7,8,9,10', 'chloe.cook@example.com', 'Chloe Cook', 'Pendaftaran UMKM', 3, 3, 2, 5, 5, 2, 4, 3, 2, 1),
(32, '1,2,3,4,5,6,7,8,9,10', 'daniel.morgan@example.com', 'Daniel Morgan', 'Kuliner', 4, 5, 4, 1, 2, 5, 3, 2, 4, 1),
(33, '1,2,3,4,5,6,7,8,9,10', 'emma.foster@example.com', 'Emma Foster', 'Tour Guide', 5, 3, 3, 2, 5, 2, 2, 3, 1, 2),
(34, '1,2,3,4,5,6,7,8,9,10', 'finn.howard@example.com', 'Finn Howard', 'Penjualan Tiket', 1, 1, 3, 2, 2, 4, 5, 4, 2, 4),
(35, '1,2,3,4,5,6,7,8,9,10', 'gina.kelly@example.com', 'Gina Kelly', 'Pendaftaran UMKM', 1, 3, 1, 1, 3, 2, 5, 4, 2, 3),
(36, '1,2,3,4,5,6,7,8,9,10', 'harry.ward@example.com', 'Harry Ward', 'Kuliner', 4, 2, 2, 2, 3, 1, 4, 1, 5, 5),
(37, '1,2,3,4,5,6,7,8,9,10', 'ivy.bailey@example.com', 'Ivy Bailey', 'Tour Guide', 5, 1, 5, 3, 2, 5, 2, 4, 5, 1),
(38, '1,2,3,4,5,6,7,8,9,10', 'jake.cooper@example.com', 'Jake Cooper', 'Penjualan Tiket', 5, 2, 4, 2, 3, 1, 3, 2, 3, 5),
(39, '1,2,3,4,5,6,7,8,9,10', 'kate.mitchell@example.com', 'Kate Mitchell', 'Pendaftaran UMKM', 3, 5, 4, 4, 2, 4, 1, 5, 4, 4),
(40, '1,2,3,4,5,6,7,8,9,10', 'liam.carter@example.com', 'Liam Carter', 'Kuliner', 4, 3, 2, 1, 4, 3, 4, 1, 5, 1),
(41, '1,2,3,4,5,6,7,8,9,10', 'mia.phillips@example.com', 'Mia Phillips', 'Tour Guide', 5, 2, 2, 2, 5, 4, 2, 1, 1, 4),
(42, '1,2,3,4,5,6,7,8,9,10', 'noah.roberts@example.com', 'Noah Roberts', 'Penjualan Tiket', 1, 2, 4, 3, 4, 4, 5, 4, 5, 3),
(43, '1,2,3,4,5,6,7,8,9,10', 'olivia.evans@example.com', 'Olivia Evans', 'Pendaftaran UMKM', 4, 5, 4, 5, 5, 3, 1, 1, 3, 5),
(44, '1,2,3,4,5,6,7,8,9,10', 'peter.murphy@example.com', 'Peter Murphy', 'Kuliner', 1, 1, 1, 2, 5, 2, 2, 3, 5, 4),
(45, '1,2,3,4,5,6,7,8,9,10', 'queen.bryant@example.com', 'Queen Bryant', 'Tour Guide', 3, 4, 4, 2, 5, 2, 1, 1, 3, 5),
(46, '1,2,3,4,5,6,7,8,9,10', 'ryan.walker@example.com', 'Ryan Walker', 'Penjualan Tiket', 5, 1, 5, 4, 1, 3, 2, 4, 2, 1),
(47, '1,2,3,4,5,6,7,8,9,10', 'sara.james@example.com', 'Sara James', 'Pendaftaran UMKM', 2, 4, 5, 3, 5, 5, 5, 5, 5, 2),
(48, '1,2,3,4,5,6,7,8,9,10', 'tom.parker@example.com', 'Tom Parker', 'Kuliner', 3, 5, 1, 1, 2, 2, 1, 3, 3, 2),
(49, '1,2,3,4,5,6,7,8,9,10', 'ursula.reed@example.com', 'Ursula Reed', 'Tour Guide', 3, 5, 4, 2, 1, 1, 3, 5, 3, 2),
(50, '1,2,3,4,5,6,7,8,9,10', 'victor.bell@example.com', 'Victor Bell', 'Penjualan Tiket', 3, 4, 5, 2, 4, 1, 4, 4, 3, 2),
(51, '1,2,3,4,5,6,7,8,9,10', 'wanda.ross@example.com', 'Wanda Ross', 'Pendaftaran UMKM', 1, 5, 5, 4, 5, 3, 2, 2, 4, 3),
(52, '1,2,3,4,5,6,7,8,9,10', 'xavier.cox@example.com', 'Xavier Cox', 'Kuliner', 4, 4, 2, 1, 1, 1, 3, 1, 4, 5),
(53, '1,2,3,4,5,6,7,8,9,10', 'yvonne.king@example.com', 'Yvonne King', 'Tour Guide', 1, 1, 3, 3, 3, 5, 5, 3, 1, 2),
(54, '1,2,3,4,5,6,7,8,9,10', 'zane.price@example.com', 'Zane Price', 'Penjualan Tiket', 4, 2, 5, 3, 1, 1, 1, 2, 1, 2),
(55, '1,2,3,4,5,6,7,8,9,10', 'abby.hill@example.com', 'Abby Hill', 'Pendaftaran UMKM', 4, 2, 2, 1, 3, 5, 2, 2, 2, 5),
(56, '1,2,3,4,5,6,7,8,9,10', 'brian.adams@example.com', 'Brian Adams', 'Kuliner', 2, 2, 4, 3, 3, 3, 4, 4, 1, 4),
(57, '1,2,3,4,5,6,7,8,9,10', 'chris.jones@example.com', 'Chris Jones', 'Tour Guide', 3, 1, 4, 1, 5, 4, 2, 2, 1, 1),
(58, '1,2,3,4,5,6,7,8,9,10', 'diane.morris@example.com', 'Diane Morris', 'Penjualan Tiket', 3, 5, 4, 1, 2, 5, 2, 1, 1, 2),
(59, '1,2,3,4,5,6,7,8,9,10', 'edward.clark@example.com', 'Edward Clark', 'Pendaftaran UMKM', 5, 2, 2, 4, 4, 3, 5, 2, 4, 3),
(60, '1,2,3,4,5,6,7,8,9,10', 'fiona.scott@example.com', 'Fiona Scott', 'Kuliner', 2, 3, 3, 5, 2, 4, 2, 4, 3, 5),
(61, '1,2,3,4,5,6,7,8,9,10', 'george.baker@example.com', 'George Baker', 'Tour Guide', 4, 5, 1, 3, 1, 1, 2, 5, 4, 1),
(62, '1,2,3,4,5,6,7,8,9,10', 'hannah.ward@example.com', 'Hannah Ward', 'Penjualan Tiket', 1, 3, 2, 3, 3, 2, 5, 5, 5, 3),
(63, '1,2,3,4,5,6,7,8,9,10', 'ian.lee@example.com', 'Ian Lee', 'Pendaftaran UMKM', 4, 3, 1, 1, 3, 4, 1, 4, 5, 2),
(64, '1,2,3,4,5,6,7,8,9,10', 'julia.wright@example.com', 'Julia Wright', 'Kuliner', 1, 4, 4, 5, 3, 4, 4, 4, 5, 5),
(65, '1,2,3,4,5,6,7,8,9,10', 'kevin.lopez@example.com', 'Kevin Lopez', 'Tour Guide', 3, 2, 4, 3, 5, 3, 5, 2, 5, 2),
(66, '1,2,3,4,5,6,7,8,9,10', 'lisa.green@example.com', 'Lisa Green', 'Penjualan Tiket', 3, 1, 1, 4, 2, 3, 4, 2, 5, 1),
(67, '1,2,3,4,5,6,7,8,9,10', 'matt.black@example.com', 'Matt Black', 'Pendaftaran UMKM', 3, 3, 5, 5, 2, 2, 3, 3, 5, 2),
(68, '1,2,3,4,5,6,7,8,9,10', 'nina.harris@example.com', 'Nina Harris', 'Kuliner', 1, 1, 5, 4, 5, 5, 1, 4, 5, 4),
(69, '1,2,3,4,5,6,7,8,9,10', 'oscar.clark@example.com', 'Oscar Clark', 'Tour Guide', 4, 3, 2, 1, 1, 5, 5, 4, 1, 4),
(70, '1,2,3,4,5,6,7,8,9,10', 'paula.walker@example.com', 'Paula Walker', 'Penjualan Tiket', 4, 2, 3, 2, 1, 5, 1, 4, 1, 2),
(71, '1,2,3,4,5,6,7,8,9,10', 'quincy.king@example.com', 'Quincy King', 'Pendaftaran UMKM', 4, 4, 5, 5, 5, 4, 2, 4, 5, 2),
(72, '1,2,3,4,5,6,7,8,9,10', 'rachel.hill@example.com', 'Rachel Hill', 'Kuliner', 4, 3, 3, 2, 3, 4, 4, 5, 3, 2),
(73, '1,2,3,4,5,6,7,8,9,10', 'steve.wright@example.com', 'Steve Wright', 'Tour Guide', 5, 4, 5, 2, 2, 2, 2, 1, 2, 1),
(74, '1,2,3,4,5,6,7,8,9,10', 'tracy.lopez@example.com', 'Tracy Lopez', 'Penjualan Tiket', 3, 4, 3, 2, 3, 2, 5, 2, 2, 2),
(75, '1,2,3,4,5,6,7,8,9,10', 'ursula.adams@example.com', 'Ursula Adams', 'Pendaftaran UMKM', 3, 5, 5, 3, 2, 3, 1, 5, 1, 5),
(76, '1,2,3,4,5,6,7,8,9,10', 'victor.mitchell@example.com', 'Victor Mitchell', 'Kuliner', 4, 2, 3, 4, 1, 3, 2, 4, 2, 2),
(77, '1,2,3,4,5,6,7,8,9,10', 'wendy.hill@example.com', 'Wendy Hill', 'Tour Guide', 1, 3, 4, 3, 3, 3, 5, 2, 5, 3),
(78, '1,2,3,4,5,6,7,8,9,10', 'xander.jones@example.com', 'Xander Jones', 'Penjualan Tiket', 5, 4, 1, 2, 5, 3, 5, 3, 3, 1),
(79, '1,2,3,4,5,6,7,8,9,10', 'yasmin.ward@example.com', 'Yasmin Ward', 'Pendaftaran UMKM', 2, 5, 5, 2, 3, 5, 4, 2, 4, 2),
(80, '1,2,3,4,5,6,7,8,9,10', 'zane.hill@example.com', 'Zane Hill', 'Kuliner', 5, 1, 3, 5, 5, 2, 5, 5, 5, 5),
(81, '1,2,3,4,5,6,7,8,9,10', 'adam.lee@example.com', 'Adam Lee', 'Tour Guide', 3, 5, 4, 5, 2, 5, 3, 1, 5, 2),
(82, '1,2,3,4,5,6,7,8,9,10', 'bella.morris@example.com', 'Bella Morris', 'Penjualan Tiket', 4, 4, 2, 1, 4, 1, 3, 3, 1, 5),
(83, '1,2,3,4,5,6,7,8,9,10', 'carter.baker@example.com', 'Carter Baker', 'Pendaftaran UMKM', 1, 2, 4, 3, 2, 5, 3, 5, 1, 2),
(84, '1,2,3,4,5,6,7,8,9,10', 'dana.clark@example.com', 'Dana Clark', 'Kuliner', 4, 5, 4, 3, 5, 3, 3, 2, 4, 3),
(85, '1,2,3,4,5,6,7,8,9,10', 'ella.jones@example.com', 'Ella Jones', 'Tour Guide', 5, 3, 5, 5, 4, 1, 2, 3, 1, 1),
(86, '1,2,3,4,5,6,7,8,9,10', 'frank.scott@example.com', 'Frank Scott', 'Penjualan Tiket', 2, 5, 1, 5, 1, 1, 3, 4, 3, 3),
(87, '1,2,3,4,5,6,7,8,9,10', 'gina.adams@example.com', 'Gina Adams', 'Pendaftaran UMKM', 1, 2, 2, 4, 2, 3, 1, 4, 5, 4),
(88, '1,2,3,4,5,6,7,8,9,10', 'hank.wright@example.com', 'Hank Wright', 'Kuliner', 4, 2, 4, 1, 4, 3, 5, 2, 2, 2),
(89, '1,2,3,4,5,6,7,8,9,10', 'iris.lopez@example.com', 'Iris Lopez', 'Tour Guide', 1, 3, 5, 2, 4, 4, 2, 3, 5, 5),
(90, '1,2,3,4,5,6,7,8,9,10', 'jackson.king@example.com', 'Jackson King', 'Penjualan Tiket', 1, 2, 2, 5, 1, 5, 4, 2, 2, 4),
(91, '1,2,3,4,5,6,7,8,9,10', 'kara.hill@example.com', 'Kara Hill', 'Pendaftaran UMKM', 4, 4, 5, 4, 5, 4, 2, 5, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) UNSIGNED NOT NULL,
  `nama_role` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-06-12 18:52:27', '2024-06-12 18:52:27'),
(2, 'operator', '2024-06-12 18:52:27', '2024-06-12 18:52:27'),
(3, 'pelanggan', '2024-06-15 18:57:05', '2024-06-15 18:57:05'),
(4, 'usaha', '2024-06-15 18:57:05', '2024-06-15 18:57:05'),
(5, 'pekerja', '2024-06-15 18:57:05', '2024-06-15 18:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tour`
--

CREATE TABLE `tb_tour` (
  `id_tour` int(11) NOT NULL,
  `id_pekerja` int(11) NOT NULL,
  `nama_tour` varchar(255) NOT NULL,
  `tgl_mulai` varchar(255) NOT NULL,
  `tgl_selesai` varchar(255) NOT NULL,
  `lama_tour` varchar(255) NOT NULL,
  `id_wisata` varchar(50) NOT NULL,
  `fasilitas_penginapan` varchar(255) NOT NULL,
  `fasilitas_konsumsi` varchar(255) NOT NULL,
  `total_harga` float NOT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tour`
--

INSERT INTO `tb_tour` (`id_tour`, `id_pekerja`, `nama_tour`, `tgl_mulai`, `tgl_selesai`, `lama_tour`, `id_wisata`, `fasilitas_penginapan`, `fasilitas_konsumsi`, `total_harga`, `updated_at`, `created_at`) VALUES
(4, 1, 'Paket 1', '2024-06-19T11:30', '2024-06-21T11:30', '2 hari 1 malam', '1,2', 'The Sun Hotel Sidoarjo', 'Makanan, Snack, Mineral 4x', 550000, '2024-06-19 12:26:17', '2024-06-19 11:30:57'),
(5, 1, 'Paket 2', '2024-06-19T22:06', '2024-06-21T22:06', '2 hari 1 malam', '2,1,3', 'Delta Sinar Mayang Hotel', 'Makanan, Snack, Mineral 4x', 650000, '2024-06-19 15:07:10', '2024-06-19 15:07:10'),
(6, 1, 'Paket 3', '2024-06-20T03:38', '2024-06-22T06:45', '2 hari 1 malam', '1,2,3', 'The Sun Hotel Sidoarjo', 'Makan, Snack, Mineral 4x', 750000, '2024-06-19 20:38:34', '2024-06-19 20:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tour` int(11) NOT NULL,
  `no_tiket` varchar(255) NOT NULL,
  `jumlah_pesanan` int(11) DEFAULT NULL,
  `total_bayar` float DEFAULT NULL,
  `tgl_pesan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_tour`, `no_tiket`, `jumlah_pesanan`, `total_bayar`, `tgl_pesan`) VALUES
(11, 14, 4, '202407048133HFK', 5, 2750000, '2024-06-21 10:30:00'),
(12, 14, 5, '202407084215KTQ', 2, 1300000, '2024-06-21 10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_umkm`
--

CREATE TABLE `tb_umkm` (
  `id_umkm` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_umkm` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `foto_usaha` varchar(255) DEFAULT NULL,
  `tgl_berdiri` date NOT NULL,
  `tgl_input` date NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_umkm`
--

INSERT INTO `tb_umkm` (`id_umkm`, `id_kategori`, `nama_umkm`, `keterangan`, `foto_usaha`, `tgl_berdiri`, `tgl_input`, `lokasi`) VALUES
(1, 2, 'Ochi Craft', 'Bahan Aksesoris Murah Hand Made - Pengerajin Profesional', 'E6mB1R5jcIqJwa5AwrFvYHXzCHMDKdSDwsDQ5FvU.jpg', '2024-06-14', '2024-06-13', 'Jl. Raya Gading Fajar 2 No.2, Perum King Safira, Sepande, Kec. Candi, Kabupaten Sidoarjo, Jawa Timur 61271'),
(2, 2, 'Kerajinan Tas Tanggulangin Sidoarjo', 'Bahan Aksesoris Murah Hand Made', 'kWjEi5auSgvzBDBY8T33orsysknTBHkCCqdEIRU7.jpg', '2024-06-14', '2024-07-09', 'Jl. Raya Wates No.19, RT.1/RW.2, Wates, Kedensari, Kec. Tanggulangin, Kabupaten Sidoarjo, Jawa Timur 61261'),
(4, 2, 'Tata Craft', 'Bucket Bunga Hand Made, siap menemani acara wisuda sekolah, kuliah, ucapan selamat lainnya.', 'apOXubeVHM9c3x3d5qXP31uaC2vkPfr3WnfbY6K1.jpg', '2024-06-15', '2024-07-02', 'ETERNITY DESIGN Jl. Raya Modong, RT.04/RW.03, Modong, Kec. Tulangan, Kabupaten Sidoarjo, Jawa Timur 61273');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `id_role`, `foto`) VALUES
(2, 'admin', '$2y$12$u6aIkrC1jSCE6F5iaC.7fuf/kWCN1IV0cM0UcofR95YMg80bMMwUq', 'admin@gmail.com', 'Muhammad Ulin Nuha Al Firas Manar', 1, 'oKTDgY63FKakKcLUANtHOMozSGwxalF05T4PgwtB.jpg'),
(3, 'operator-1', '$2y$12$WTL8O.7hjpALiCVMVKhGwuj5e0MamPzdmdtUOjLnsZkcn5FghY7Cq', 'operator1@gmail.com', 'Achmad Imam Dairobbi', 2, '3sAQgmhcDGo8i4LDVZ2eguo6X3TVMwms2fR5tEz7.png'),
(8, 'operator-2', '$2y$12$fRyErwjqI5ZCKbiii3hWeuC2hrGxibRKTLtjbV.XiFC2VDTveCVde', 'operator2@gmail.com', 'Luvy Muhammad Riski', 2, 'V919RrdQKcU9JN3HmpExdyhnbJ0RBLV9tblLifZy.png'),
(12, 'Jackas', '$2y$12$v/tHVKjXZrzBA4N2..cU7eYr1fgAWDmkp5zcjpxXsohZzA3fdEZOK', 'jack@gmail.com', 'Jack Arik Sukarman', 5, 'K8ltUZUztXoBdZQUL3R1hgx6up9D4fzhcrznyLmH.jpg'),
(13, 'Firas', '$2y$12$1QOjnVgmWHEdCq.AO/9ETO3Jt4CDVaVo7q4DfzSj6I9UFkM1QMXty', 'firas@gmail.com', 'Firas Cuy Amanimah', 5, 'DtXAtUVEKDHEnOn1S5DTrke2CfY23CjqXh1IDZih.jpg'),
(14, 'Masdukiiiii', '$2y$12$y00Ve3aA/eh3iilKT99REeVywXzf3TQ6SQ0lQDbeAvdJQt2bxcXe6', 'masduki@gmail.com', 'Ahmad Masduki', 3, 'tWqV4J0wueg2eKyE1BsYWPGyDG8WyOLtMw7O1KfA.png'),
(20, 'Manar', '$2y$12$GnCxsS5qUZZuhcVryT1EG.VMbuVrRDv4ExmLfv.xPxq6UJXl72tEe', 'manar@gmail.com', 'Manar', NULL, 'Y8HSJWgbDcP62L9Z8xnNYwIAp0bdhpfBRShiRwwV.jpg'),
(24, 'GoogleLogin', '$2y$12$VTbfRGD.DELPsyVAp8sajeqBwBJjBTJDxFuvoc1Oftm4EOBRXdfi6', 'alfirassmanar11@gmail.com', 'Al Firas Manar', 1, 'email.jpg'),
(25, 'fulan', '$2y$12$Vy7BetvCDGNE2wER7IjCh.OaZp5Wf1Mx6GrzktQJ.urm0Y9zY87Ii', 'fulan@gmail.com', 'fulan', NULL, 'gbdmupiL3hqzAu62mY9Z0ikrj5KEZlNzXlVJNYJH.png'),
(26, 'wayan dicoding', '$2y$12$W5Q78.mZMVLv1cONn2HjTenT95Cx7VOxxUGypLs6A8kyNDumaTx2O', 'wayan@gmail.com', 'Ni Wayan', NULL, 'Uep78eIT03gyMERH3rjuIwJugYcsK2epZQFDiuyf.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wisata`
--

CREATE TABLE `tb_wisata` (
  `id_wisata` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `foto_usaha` varchar(255) DEFAULT NULL,
  `tgl_berdiri` date NOT NULL,
  `tgl_input` date NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_wisata`
--

INSERT INTO `tb_wisata` (`id_wisata`, `id_kategori`, `nama_wisata`, `keterangan`, `foto_usaha`, `tgl_berdiri`, `tgl_input`, `lokasi`) VALUES
(1, 1, 'Monumen Jayandaru', 'Monumen yang dikenal sebagai Jayandaru ini merupakan bukti dampak perusahaan Bapak Harry Susilo terhadap perekonomian lokal dan dalam membuat Kerupuk Udang dari industri rumahan skala kecil menjadi produk makanan yang dikenal secara global.', 'gzl4DTOU6DrujTKobwytOTxhFk6Fmyw0JSYqbTgq.jpg', '2015-05-29', '2024-07-02', 'Jayandaru Monument Jl. Jenggolo No.21, Rw1, Sidokumpul, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61212'),
(2, 1, 'Candi Pari', 'Candi Pari adalah sebuah peninggalan masa klasik Indonesia yang terletak di Desa Candipari, Kecamatan Porong, Kabupaten Sidoarjo, Provinsi Jawa Timur. Lokasinya sekitar 2 km ke arah barat laut dari pusat semburan Lumpur Lapindo.', 'eHejHSvlF6CSYvwb5MRoOEdhNbEffhKqKSQy21Se.jpg', '2024-06-14', '2024-07-08', 'Jl. Purbakala, Porong, Candipari, Candipari Kulon, Candipari, Kec. Porong, Kabupaten Sidoarjo, Jawa Timur 61274'),
(3, 1, 'Monumen Lawas Sidoarjo Kota', 'Destinasi wisata Sidoarjo lainnya yang wajib dikunjungi adalah Monumen Jayandaru. Dengan desain yang unik, monumen ini menjadi tempat wisata yang sedang hits saat ini. Monumen Jayandaru memiliki tinggi sekitar 25 meter, dengan berbagai ornamen yang mencerminkan kearifan lokal masyarakat Sidoarjo.', 'vERryn51BENQu4k6iwLEpJi1uD9KiH5LpDFgc606.jpg', '2024-06-14', '2024-06-14', 'Monumen Sidoarjo Jl. Sultan Agung No.39, Gajah Timur, Magersari, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61212');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpengguna_bloomy`
-- (See below for the actual view)
--
CREATE TABLE `vpengguna_bloomy` (
`id_pekerja` int(11)
,`id_user` int(11)
,`id_wisata` int(11)
,`nama_user` varchar(255)
,`nama_wisata` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vreview_detail`
-- (See below for the actual view)
--
CREATE TABLE `vreview_detail` (
`id_review` int(11)
,`id_pertanyaan` varchar(100)
,`np1` int(11)
,`np2` int(11)
,`np3` int(11)
,`np4` int(11)
,`np5` int(11)
,`np6` int(11)
,`np7` int(11)
,`np8` int(11)
,`np9` int(11)
,`np10` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `vpengguna_bloomy`
--
DROP TABLE IF EXISTS `vpengguna_bloomy`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpengguna_bloomy`  AS SELECT `p`.`id_pekerja` AS `id_pekerja`, `p`.`id_user` AS `id_user`, `p`.`id_wisata` AS `id_wisata`, `u`.`nama_lengkap` AS `nama_user`, `w`.`nama_wisata` AS `nama_wisata` FROM ((`tb_pekerja` `p` join `tb_user` `u` on(`p`.`id_user` = `u`.`id_user`)) join `tb_wisata` `w` on(`p`.`id_wisata` = `w`.`id_wisata`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vreview_detail`
--
DROP TABLE IF EXISTS `vreview_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vreview_detail`  AS SELECT `tb_review`.`id_review` AS `id_review`, `tb_review`.`id_pertanyaan` AS `id_pertanyaan`, `tb_review`.`np1` AS `np1`, `tb_review`.`np2` AS `np2`, `tb_review`.`np3` AS `np3`, `tb_review`.`np4` AS `np4`, `tb_review`.`np5` AS `np5`, `tb_review`.`np6` AS `np6`, `tb_review`.`np7` AS `np7`, `tb_review`.`np8` AS `np8`, `tb_review`.`np9` AS `np9`, `tb_review`.`np10` AS `np10` FROM `tb_review` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `id_kategori` (`id_kategori`,`id_wisata`,`id_umkm`,`id_kuliner`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kuliner`
--
ALTER TABLE `tb_kuliner`
  ADD PRIMARY KEY (`id_kuliner`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_pekerja`
--
ALTER TABLE `tb_pekerja`
  ADD PRIMARY KEY (`id_pekerja`),
  ADD KEY `id_user` (`id_user`,`id_wisata`);

--
-- Indexes for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_tour`
--
ALTER TABLE `tb_tour`
  ADD PRIMARY KEY (`id_tour`),
  ADD KEY `id_pekerja` (`id_pekerja`,`id_wisata`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`,`id_tour`);

--
-- Indexes for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  ADD PRIMARY KEY (`id_umkm`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `tb_user_username_unique` (`username`),
  ADD UNIQUE KEY `tb_user_email_unique` (`email`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `username` (`username`),
  ADD KEY `id_role_2` (`id_role`);

--
-- Indexes for table `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `id_blog` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kuliner`
--
ALTER TABLE `tb_kuliner`
  MODIFY `id_kuliner` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pekerja`
--
ALTER TABLE `tb_pekerja`
  MODIFY `id_pekerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_tour`
--
ALTER TABLE `tb_tour`
  MODIFY `id_tour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  MODIFY `id_umkm` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_wisata`
--
ALTER TABLE `tb_wisata`
  MODIFY `id_wisata` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
