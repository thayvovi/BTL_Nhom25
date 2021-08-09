-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 09, 2021 lúc 05:52 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl_nhom25`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bus_route`
--

CREATE TABLE `bus_route` (
  `id` int(11) NOT NULL,
  `routeName` varchar(255) NOT NULL,
  `totalBus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bus_route`
--

INSERT INTO `bus_route` (`id`, `routeName`, `totalBus`) VALUES
(1, 'Nam Định <-> Hà Nội', 5),
(2, 'Thái Bình đến Nam Định', 5),
(3, 'Hải Phòng đến Hưng Yên', 2),
(4, 'TP.HCM <-> Hà Nội', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seat_details`
--

CREATE TABLE `seat_details` (
  `id` int(11) NOT NULL,
  `idBus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket_details`
--

CREATE TABLE `ticket_details` (
  `id` int(11) NOT NULL,
  `idBus` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `seat` varchar(255) NOT NULL,
  `ngay` date NOT NULL,
  `gio` time NOT NULL,
  `diem_don` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ticket_details`
--

INSERT INTO `ticket_details` (`id`, `idBus`, `userName`, `sdt`, `seat`, `ngay`, `gio`, `diem_don`) VALUES
(1, 1, 'Nguyễn Thanh Tùng', 337882657, '34 ', '2021-07-31', '07:00:00', 'bx.Nam Định'),
(2, 2, 'Nguyễn Thanh Tùng', 337882657, '9 ', '2021-07-31', '07:00:00', 'bx.Nam Định'),
(3, 2, 'tùng Nguyễn', 1231321, '15 ', '2021-07-31', '07:00:00', 'bx.Nam Định'),
(4, 1, 'Nấu cơm', 123, '28 ', '2021-07-31', '07:00:00', '232'),
(5, 1, 'aa', 1231321, '26 ', '2021-07-31', '07:00:00', '232'),
(6, 2, 'Nguyễn Thanh Tùng', 337882657, '10 ', '2021-07-31', '07:00:00', 'bx.Hải Phòng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ten_khach` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ten_khach`, `mat_khau`, `sdt`, `dia_chi`, `level`) VALUES
(6, 'Nguyễn Thanh Tùng', '202cb962ac59075b964b07152d234b70', 123, 'a', 1),
(7, 'Nguyễn Thanh Tùng', '202cb962ac59075b964b07152d234b70', 337882657, '1312', 0),
(8, 'Vyng', 'b59c67bf196a4758191e42f76670ceba', 352697847, 'Ha Nam', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `id` int(11) NOT NULL,
  `idRoute` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `totalSeat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`id`, `idRoute`, `date`, `time`, `totalSeat`) VALUES
(1, 1, '2021-08-06', '07:00:00', 30);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bus_route`
--
ALTER TABLE `bus_route`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `seat_details`
--
ALTER TABLE `seat_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bus_route`
--
ALTER TABLE `bus_route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `seat_details`
--
ALTER TABLE `seat_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ticket_details`
--
ALTER TABLE `ticket_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `xe`
--
ALTER TABLE `xe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
