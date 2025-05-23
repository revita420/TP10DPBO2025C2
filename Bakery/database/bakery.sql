-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2025 pada 05.21
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bakers`
--

CREATE TABLE `bakers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `specialty` varchar(100) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bakers`
--

INSERT INTO `bakers` (`id`, `name`, `specialty`, `join_date`, `contact`, `created_at`) VALUES
(1, 'Monkey D. Luffy', 'Cupcakes', '2023-05-15', '555-1234', '2025-05-21 03:13:30'),
(2, 'Akabane Karma', 'Macarons', '2022-11-03', '555-5678', '2025-05-21 03:13:30'),
(3, 'Nagi Seishiro', 'Wedding Cakes', '2021-06-22', '555-9012', '2025-05-21 03:13:30'),
(4, 'Itadori Yuuji', 'Pastries', '2023-01-10', '555-3456', '2025-05-21 03:13:30'),
(5, 'Anos Voldigoald', 'Cookies', '2022-08-17', '555-7890', '2025-05-21 03:13:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `baker_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `baker_id`, `quantity`, `order_date`, `status`, `created_at`) VALUES
(1, 1, 1, 12, '2025-05-21 10:13:42', 'Completed', '2025-05-21 03:13:42'),
(2, 2, 2, 24, '2025-05-21 10:13:42', 'In Progress', '2025-05-21 03:13:42'),
(3, 3, 3, 1, '2025-05-21 10:13:42', 'Pending', '2025-05-21 03:13:42'),
(4, 4, 5, 36, '2025-05-21 10:13:42', 'Completed', '2025-05-21 03:13:42'),
(5, 5, 3, 2, '2025-05-21 10:13:42', 'In Progress', '2025-05-21 03:13:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created_at`) VALUES
(1, 'Strawberry Cupcake', 'Delicious strawberry flavored cupcake with pink frosting', 5.99, '2025-05-21 03:12:19'),
(2, 'Pink Macarons', 'Raspberry flavored macarons with pink coloring', 3.50, '2025-05-21 03:12:19'),
(3, 'Cherry Cake', 'Cherry cake with pink cherry icing', 18.99, '2025-05-21 03:12:19'),
(4, 'Rose Sugar Cookies', 'Sugar cookies with rose flavoring and pink decorations', 2.99, '2025-05-21 03:12:19'),
(5, 'Pink Velvet Cake', 'Pink version of red velvet cake with cream cheese frosting', 24.99, '2025-05-21 03:12:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bakers`
--
ALTER TABLE `bakers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `baker_id` (`baker_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bakers`
--
ALTER TABLE `bakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`baker_id`) REFERENCES `bakers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
