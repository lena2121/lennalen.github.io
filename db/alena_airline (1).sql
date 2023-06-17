-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2023 pada 02.57
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alena_airline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'lena', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `flight_no` int(11) NOT NULL,
  `plane_id` int(11) NOT NULL,
  `arrival_id` int(11) NOT NULL,
  `arrival` varchar(100) NOT NULL,
  `departure` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `flights`
--

INSERT INTO `flights` (`id`, `flight_no`, `plane_id`, `arrival_id`, `arrival`, `departure`, `date`, `timein`, `timeout`, `price`) VALUES
(1, 537, 1, 1, 'Indonesia', 'China', '2022-07-28', '11:00:00', '09:20:00', '2500000'),
(2, 315, 4, 2, 'Bandung', 'Solo', '2022-07-28', '19:30:00', '19:00:00', '1500000'),
(3, 326, 5, 1, 'Indonesia', 'Jepang', '2022-07-28', '11:30:00', '10:00:00', '3000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `type` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `planes`
--

INSERT INTO `planes` (`id`, `code`, `type`) VALUES
(1, 'A320', 'Boeing 737'),
(2, 'A550', 'Boeing 747'),
(3, 'A530', 'Boeing 747'),
(4, 'B120', 'Airbus A33'),
(5, 'B100', 'Airbus A33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_arrivals`
--

CREATE TABLE `ref_arrivals` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ref_arrivals`
--

INSERT INTO `ref_arrivals` (`id`, `name`) VALUES
(1, 'Indonesia'),
(2, 'Bandung'),
(3, 'Jepang'),
(4, 'Solo'),
(5, 'China');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `phone`) VALUES
(1, 'Firman2', '083242341238'),
(2, 'Dinar', '087776543217'),
(3, 'adhi', '08777546789'),
(5, 'Safira', '089765432134'),
(6, 'yaya', '0897654321'),
(8, 'siska', '0987654321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_filghts`
--

CREATE TABLE `user_filghts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `seat` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_filghts`
--

INSERT INTO `user_filghts` (`id`, `user_id`, `flight_id`, `seat`) VALUES
(1, 1, 2, 'A31'),
(2, 2, 2, 'A32'),
(3, 4, 1, 'D10'),
(4, 5, 3, 'B14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plane_id` (`plane_id`);

--
-- Indeks untuk tabel `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ref_arrivals`
--
ALTER TABLE `ref_arrivals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_filghts`
--
ALTER TABLE `user_filghts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
