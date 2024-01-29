-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2024 pada 10.43
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `NIP` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `JenisKel` varchar(255) NOT NULL,
  `Telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`NIP`, `Email`, `Nama`, `JenisKel`, `Telp`) VALUES
('198606072019031011', 'anggi.mardiyono.@tik.pnj.id', 'ANGGI MARDIYONO', 'Laki-laki', '0816274173');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosenmatkul`
--

CREATE TABLE `dosenmatkul` (
  `ID` int(20) NOT NULL,
  `NIP` varchar(255) NOT NULL,
  `ID_matkul` varchar(255) NOT NULL,
  `ID_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosenmatkul`
--

INSERT INTO `dosenmatkul` (`ID`, `NIP`, `ID_matkul`, `ID_kelas`) VALUES
(1, '198606072019031011', 'MATKUL01', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `ID_jadwal` int(20) NOT NULL,
  `ID_dosenMatkul` int(20) NOT NULL,
  `ID_ruangan` varchar(255) NOT NULL,
  `Hari` varchar(255) NOT NULL,
  `Waktu` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`ID_jadwal`, `ID_dosenMatkul`, `ID_ruangan`, `Hari`, `Waktu`, `Status`) VALUES
(1, 1, 'AA303', 'Senin', '12:30 - 15:50', 'OFFLINE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `ID_kelas` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`ID_kelas`, `Nama`) VALUES
(1, 'TI 1A'),
(2, 'TI 1B'),
(3, 'TI 3A'),
(4, 'TI 3B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `JenisKel` varchar(255) NOT NULL,
  `Semester` int(20) NOT NULL,
  `Kelas` varchar(255) NOT NULL,
  `Prodi` varchar(255) NOT NULL,
  `Jurusan` varchar(255) NOT NULL,
  `Telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Email`, `Nama`, `JenisKel`, `Semester`, `Kelas`, `Prodi`, `Jurusan`, `Telp`) VALUES
('2207411035', 'muhammad.fauzan.permana.tik22@mhsw.pnj.id', 'MUHAMMAD FAUZAN PERMANA', 'Laki-laki', 3, '4', 'Teknik Informatika', 'TIK', '0816274173'),
('2207411040', 'juan.graciano.tik22@mhsw.pnj.id', 'JUAN GRACIANO', 'Laki-laki', 3, '4', 'Teknik Informatika', 'TIK', '0816274173'),
('2207411042', 'handika.nur.aziz.tik22@mhsw.pnj.id', 'HANDIKA NUR AZIZ', 'Laki-laki', 3, '4', 'Teknik Informatika', 'TIK', '0816274173'),
('2207411051', 'adminas.farhan.putranto.tik22@mhsw.pnj.id', 'ADMINAS FARHAN PUTRANTO', 'Laki-laki', 3, '4', 'Teknik Informatika', 'TIK', '0816274173'),
('2207411059', 'muhammad.dzaky.naufal.asadel.tik22@mhsw.pnj.id', 'MUHAMMAD DZAKY NAUFAL ASADEL', 'Laki-laki', 3, '4', 'Teknik Informatika', 'TIK', '0816274173');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `ID_matkul` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`ID_matkul`, `Nama`) VALUES
('MATKUL01', 'Pemrograman Web Lanjut'),
('MATKUL02', 'Basis Data'),
('MATKUL03', 'Metode Numerik'),
('MATKUL04', 'Kecerdasan Buatan'),
('MATKUL05', 'UI/UX'),
('MATKUL06', 'Grafika Komputer'),
('MATKUL07', 'Manajemen Proyek'),
('MATKUL08', 'Sistem Terdistribusi'),
('MATKUL09', 'Analisis dan Design Sistem Informasi'),
('MATKUL10', 'Pemrograman Visual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `ID_ruangan` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Jenis` varchar(255) NOT NULL,
  `Lokasi` varchar(255) NOT NULL,
  `Kapasitas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`ID_ruangan`, `Nama`, `Jenis`, `Lokasi`, `Kapasitas`) VALUES
('AA205', 'AA 205', 'Ruang Belajar', 'Gedung AA', 30),
('AA301', 'AA 301', 'Ruang Belajar', 'Gedung AA', 30),
('AA302', 'AA 302', 'Ruang Belajar', 'Gedung AA', 30),
('AA303', 'AA 303', 'Ruang Belajar', 'Gedung AA', 30),
('AA304', 'AA 304', 'Ruang Belajar', 'Gedung AA', 30),
('AA305', 'AA 305', 'Ruang Belajar', 'Gedung AA', 30),
('GSG201', 'GSG 201', 'Ruang Belajar', 'Gedung Serba Guna', 10),
('GSG202', 'GSG 202', 'Ruang Belajar', 'Gedung Serba Guna', 30),
('GSG203', 'GSG 203', 'Ruang Belajar', 'Gedung Serba Guna', 30),
('GSG206', 'GSG 206', 'Ruang Belajar', 'Gedung Serba Guna', 30),
('GSG207', 'GSG 207', 'Ruang Belajar', 'Gedung Serba Guna', 30),
('GSG208', 'GSG 208', 'Ruang Belajar', 'Gedung Serba Guna', 30),
('GSG209', 'GSG 209', 'Ruang Belajar', 'Gedung Serba Guna', 30),
('GSG210', 'GSG 210', 'Ruang Belajar', 'Gedung Serba Guna', 30),
('GSG211', 'GSG 211', 'Ruang Belajar', 'Gedung Serba Guna', 30),
('GSG212', 'GSG 212', 'Ruang Belajar', 'Gedung Serba Guna', 30),
('GSG215', 'GSG 215', 'Ruang Konsul', 'Gedung Serba Guna', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `ID` int(20) NOT NULL,
  `NomorInduk` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`ID`, `NomorInduk`, `Password`, `Nama`, `Role`) VALUES
(1, 'Admin', '$2y$10$cMtLBY5BTf1zuvniUHob6uIzrgoOspanP7WgZu1hpWqd3ZcDrCkae', 'Admin', 'admin'),
(2, '198606072019031011', '$2y$10$1vfb/w4xPLy2X0oYwr5DqO3uKo4rxCm.3yTsUB7VMZlmYyOq9aadO', 'ANGGI MARDIYONO', 'dosen'),
(3, '2207411035', '$2y$10$pjcyemc1/Qh/3al73NCZXuXnI/06Kk99RwW9.U5/wfeoxPfV5UTou', 'MUHAMMAD FAUZAN PERMANA', 'mahasiswa'),
(4, '2207411059', '$2y$10$qqn/VYPM18UJXnXOtSf/Negi7Bjx/OEfB7GgQIZi4qn4O7LsXnsYS', 'MUHAMMAD DZAKY NAUFAL ASADEL', 'mahasiswa'),
(5, '2207411042', '$2y$10$AH6u/3G2rZtSfMZwXFyuuOzTpywN7.0xW8f2JNWsf49uoUScvcTaq', 'HANDIKA NUR AZIZ', 'mahasiswa'),
(6, '2207411040', '$2y$10$V.oowF77o4K43qz0mMIb.u4oRjHGrOFSfbmihhJj20eBI0NlOX0im', 'JUAN GRACIANO', 'mahasiswa'),
(7, '2207411051', '$2y$10$Wjcdhqsd90pKxTozcQKiIuA53I6G17kNJNnz2rm4Pdh4OYuswieL.', 'ADMINAS FARHAN PUTRANTO', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIP`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indeks untuk tabel `dosenmatkul`
--
ALTER TABLE `dosenmatkul`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`ID_jadwal`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID_kelas`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`ID_matkul`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ID_ruangan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NomorInduk` (`NomorInduk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosenmatkul`
--
ALTER TABLE `dosenmatkul`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `ID_jadwal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `ID_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
