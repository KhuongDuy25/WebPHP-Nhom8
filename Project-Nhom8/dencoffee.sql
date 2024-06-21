-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2022 at 09:56 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id12604414_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `users_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`users_id`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `Feedbacks`
--

CREATE TABLE `Feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Images`
--

CREATE TABLE `Images` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Images`
--

INSERT INTO `Images` (`id`, `products_id`, `url`) VALUES
(1, 1, 'bac-xiu-da1.jpg'),
(2, 1, 'bac-xiu-da2.jpg'),
(3, 2, 'ca-phe-sua-da1.jpg'),
(4, 2, 'ca-phe-sua-da2.jpg'),
(5, 3, 'ca-phe-trung1.jpg'),
(6, 3, 'ca-phe-trung2.jpg'),
(7, 4, 'espresso1.jpg'),
(8, 4, 'espresso2.jpg'),
(9, 5, 'latte-macchiato1.jpg'),
(10, 5, 'latte-macchiato2.jpg'),
(11, 5, 'latte-macchiato3.jpg'),
(12, 6, 'cappuccino1.jpg'),
(13, 6, 'cappuccino2.jpg'),
(14, 6, 'cappuccino3.jpg'),
(15, 7, 'mocaccino1.jpg'),
(16, 7, 'mocaccino2.jpg'),
(17, 8, 'Shakerato1.jpg'),
(18, 8, 'Shakerato2.jpg'),
(19, 8, 'Shakerato3.jpg'),
(20, 9, 'marocchino1.jpg'),
(21, 9, 'marocchino2.jpg'),
(22, 9, 'marocchino3.jpg'),
(23, 10, 'Corretto1.jpg'),
(24, 10, 'Corretto2.jpg'),
(25, 10, 'Corretto3.jpg'),
(26, 11, 'ca-phe-den1.jpg'),
(27, 11, 'ca-phe-den2.jpg'),
(28, 12, 'cold-brew-sua-tuoi1.jpg'),
(29, 12, 'cold-brew-sua-tuoi2.jpg'),
(30, 13, 'ca-phe-sua-da-fresh1.jpg'),
(31, 13, 'ca-phe-sua-da-fresh2.jpg'),
(32, 14, 'banh-flan1.jpg'),
(33, 14, 'banh-flan2.jpg'),
(34, 14, 'banh-flan3.jpg'),
(35, 15, 'Tiramisu1.jpg'),
(36, 15, 'Tiramisu2.jpg'),
(37, 16, 'banh-cookies1.jpg'),
(38, 16, 'banh-cookies2.jpg'),
(39, 16, 'banh-cookies3.jpg'),
(40, 17, 'macaron1.jpg'),
(41, 17, 'macaron2.jpg'),
(42, 17, 'macaron3.jpg'),
(43, 18, 'mousse-cake1.jpg'),
(44, 18, 'mousse-cake2.jpg'),
(45, 18, 'mousse-cake3.jpg'),
(46, 19, 'banh-muffin1.jpg'),
(47, 19, 'banh-muffin2.jpg'),
(48, 19, 'banh-muffin3.jpg'),
(49, 20, 'Chocolate-tart1.jpg'),
(50, 20, 'Chocolate-tart2.jpg'),
(51, 21, 'Cheese-cake1.jpg'),
(52, 21, 'Cheese-cake2.jpg'),
(53, 21, 'Cheese-cake3.jpg'),
(54, 22, 'nama-chocolate1.jpg'),
(55, 22, 'nama-chocolate2.jpg'),
(56, 22, 'nama-chocolate3.jpg'),
(57, 23, 'pana-cotta1.jpg'),
(58, 23, 'pana-cotta2.jpg'),
(59, 23, 'pana-cotta3.jpg'),
(60, 25, 'mochi-socola1.jpg'),
(61, 25, 'mochi-socola2.jpg'),
(62, 26, 'mochi-kem-phuc-bon-tu1.jpg'),
(63, 26, 'mochi-kem-phuc-bon-tu2.jpg'),
(64, 27, 'coca1.jpg'),
(65, 28, 'pepsi1.jpg'),
(66, 28, 'pepsi2.jpg'),
(67, 28, 'pepsi3.jpg'),
(68, 29, '7up1.jpg'),
(69, 29, '7up2.jpg'),
(70, 30, 'sprite1.jpg'),
(71, 30, 'sprite2.jpg'),
(72, 31, 'fanta1.jpg'),
(73, 32, 'sinh-to-bo1.jpg'),
(74, 32, 'sinh-to-bo2.jpg'),
(75, 33, 'sinh-to-mang-cau1.jpg'),
(76, 33, 'sinh-to-mang-cau2.jpg'),
(77, 37, 'phin-sua-da1.jpg'),
(78, 37, 'phin-sua-da2.jpg'),
(79, 41, 'ca-phe-kem-man1.jpg'),
(80, 41, 'ca-phe-kem-man2.jpg'),
(81, 41, 'ca-phe-kem-man3.jpg'),
(82, 42, 'phindi-hanh-nhan1.jpg'),
(83, 42, 'phindi-hanh-nhan2.jpg'),
(84, 42, 'phindi-hanh-nhan3.jpg'),
(85, 44, 'caramel-machiato1.jpg'),
(86, 44, 'caramel-machiato2.jpg'),
(87, 47, 'mochi-dua-dua1.jpg'),
(88, 47, 'mochi-dua-dua2.jpg'),
(89, 48, 'sinh-to-sapoche1.jpg'),
(90, 48, 'sinh-to-sapoche2.jpg'),
(91, 50, 'sinh-to-kiwi1.jpg'),
(92, 50, 'sinh-to-kiwi2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Orderdetail`
--

CREATE TABLE `Orderdetail` (
  `orders_id` int(10) UNSIGNED NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vouchers_id` int(10) UNSIGNED DEFAULT NULL,
  `addr` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `orderstatus_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Orderstatus`
--

CREATE TABLE `Orderstatus` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Orderstatus`
--

INSERT INTO `Orderstatus` (`id`, `status`) VALUES
(1, 'Đang chờ'),
(2, 'Đã nhận'),
(3, 'Đang giao'),
(4, 'Đã giao'),
(5, 'Không thể nhận');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descript` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `producttype_id` int(10) UNSIGNED NOT NULL,
  `main_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`id`, `name`, `descript`, `price`, `producttype_id`, `main_image`, `created_at`, `updated_at`) VALUES
(1, 'Bạc xỉu đá', 'Bạc xỉu chính là \"Ly sữa trắng kèm một chút cà phê\". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa', 18000, 1, 'bac-xiu-da.jpg', NULL, NULL),
(2, 'Cà phê sữa đá', 'Cà phê được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị', 18000, 1, 'ca-phe-sua-da.jpg', NULL, NULL),
(3, 'Cà phê trứng', 'Cà phê trứng là một loại thức uống thơm ngon có nguồn gốc xuất xứ từ những năm 1950 tại Hà Nội, mùi thơm đặc trưng của cà phê kết hợp với vị trứng béo ngậy đã làm nên 1 loại thức uống đặc biệt', 35000, 1, 'ca-phe-trung.jpg', NULL, NULL),
(4, 'Espresso Nóng', 'Một tách Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc', 26000, 1, 'espresso.jpg', NULL, NULL),
(5, 'Latte macchiato ', 'Latte macchiato là một loại đồ uống nóng rất được ưa chuộng. Thành phần gồm có cà phê espresso và sữa. Về cơ bản thì latte macchiatio giống như cà phê sữa, nhưng lượng sữa nhiều hơn', 31000, 1, 'latte-macchiato.jpg', NULL, NULL),
(6, 'Cappuccino', 'Cappuchino là thức uống hòa quyện giữa hương thơm của sữa, vị béo của bọt kem cùng vị đậm đà từ cà phê Espresso. Tất cả tạo nên một hương vị đặc biệt, nhẹ nhàng, trầm lắng và tinh tế', 31000, 1, 'cappuccino.jpg', NULL, NULL),
(7, 'Mocaccino', 'Mocaccino được làm từ espresso và nữa nóng, nhưng được thêm mùi vị socola, thông thường được làm từ bột socola, nhưng ngày nay đa phần các biến thể được từ siro socola. Cà phê Mocaccino bao gồm socola đen hay socola sữa', 53000, 1, 'mocaccino.jpg', NULL, NULL),
(8, 'Shakerato', 'Shakerato cũng giống như espresso đá được lắc đều với đường và đá, cho cảm giác sảng khoái!', 30000, 1, 'Shakerato.jpg', NULL, NULL),
(9, 'Marocchino', 'Café Marocchino được sáng tạo ở vùng Piedmont của Alessandria, Marocchino được mô phỏng theo Bicerin ,một đồ uống truyền thống của Turin. Giống như Marocchino, Bicerin có một biến thể khác là cà phê gồm sô cô la nóng, cà phê espresso và sữa nhưng đặc hơn ', 35000, 1, 'marocchino.jpg', NULL, NULL),
(10, 'Corretto', 'Caffè Corretto, một thức uống có cồn chứa caffein của Ý, bao gồm một tách cà phê espresso với một lượng nhỏ rượu, thường là grappa, và đôi khi là sambuca hoặc rượu mạnh. Nó còn được gọi là \"cà phê espresso corretto\"', 39000, 1, 'Corretto.jpg', NULL, NULL),
(11, 'Cà phê đen nóng', 'Không ngọt ngào như Bạc xỉu hay Cà phê sữa, Cà phê đen mang trong mình phong vị trầm lắng, thi vị hơn. Người ta thường phải ngồi rất lâu mới cảm nhận được hết hương thơm ngào ngạt, phảng phất mùi cacao và cái đắng mượt mà trôi tuột xuống vòm họng', 22000, 1, 'ca-phe-den.jpg', NULL, NULL),
(12, 'Cold Brew Sữa Tươi', 'Thanh mát và cân bằng với hương vị cà phê nguyên bản 100% Arabica Cầu Đất cùng sữa tươi thơm béo cho từng ngụm tròn vị, hấp dẫn', 29000, 1, 'cold-brew-sua-tuoi.jpg', NULL, NULL),
(13, 'Cà Phê Sữa Đá Chai Fresh 250ml', 'Vẫn là hương vị cà phê sữa đậm đà truyền thống từ cà phê Đắk Lắk nhưng khoác lên mình một chiếc áo mới tiện lợi hơn, tiết kiệm hơn giúp bạn tận hưởng một ngày dài trọn vẹn', 78000, 1, 'ca-phe-sua-da-fresh.jpg', NULL, NULL),
(14, 'Bánh flan', 'Bánh Flan còn có tên gọi khác là caramel, được chế biến bằng cách hấp chín các nguyên liệu trứng, sữa và nước caramel. Đây là loại bánh có nguồn gốc xuất xứ từ châu Âu nhưng hiện đã phổ biến ở nhiều nơi trên thế giới', 10000, 2, 'banh-flan.jpg', NULL, NULL),
(15, 'Tiramisu', 'Loại bánh hấp dẫn này có nguồn gốc từ nước Ý thơ mộng. Cắn một miếng bánh với lớp bánh mềm mềm, hòa cùng mùi cà phê ca cao thơm phức, và đặc biệt là lớp kem béo ngậy nhưng không hề ngán. Món bánh này có thể chinh phục cả những người khó tính nhất', 19000, 2, 'Tiramisu.jpg', NULL, NULL),
(16, 'Bánh Cookies', 'Bánh cookies hay còn gọi bánh quy, là một món bánh được làm từ bột mì, đường và các nguyên liệu khác như: nho khô, yến mạch, chocolate và các loại hạt,...', 15000, 2, 'banh-cookies.jpg', NULL, NULL),
(17, 'Macaron', 'Bánh macaron Pháp giòn, xinh xắn đánh gục cả những thực khách khó tính nhất. Hôm nay hãy thử khám phá món bánh Macaron chanh kiểu Pháp nhé, bánh có màu vàng tươi như màu nắng hè rực rỡ, vui nhộn', 12000, 2, 'macaron.jpg', NULL, NULL),
(18, 'Mousse', 'Mousse được làm từ lòng trắng trứng kèm theo hương vị chocolate hoặc trái cây. Mousse thường được làm món tráng miệng trong nhiều bữa tiệc. Bạn khó có thể cưỡng lại sức hấp dẫn của Mousse một khi đã bị chinh phục vị giác', 20000, 2, 'mousse-cake.jpg', NULL, NULL),
(19, 'Bánh Muffin', 'Muffin chưa bao giờ hết “hot” bởi độ đa dạng trong cách biến tấu công thức bánh với phần nhân mặn, ngọt hay các loại nhân trái cây tươi ngon', 15000, 2, 'banh-muffin.jpg', NULL, NULL),
(20, 'Chocolate tart', 'Bánh tart chocolate với lớp vỏ bánh giòn tan cùng phần nhân chocolate ngọt ngào hứa hẹn sẽ mang đến các tín đồ của bánh ngọt một món tráng miệng tuyệt vời', 10000, 2, 'Chocolate-tart.jpg', NULL, NULL),
(21, 'Cheesecake', 'Bánh cheesecake blueberry béo ngậy, chua ngọt vừa thơm ngon vừa bổ dưỡng mà ăn lại không có cảm giác ngấy', 50000, 2, 'Cheese-cake.jpg', NULL, NULL),
(22, 'Nama chocolate', 'Khi thưởng thức bạn sẽ cảm nhận được độ mềm mại đặc biệt, nhẹ nhàng tan ngay trong miệng. Vị ngọt dịu hòa quyện cùng chút đắng nhẹ của lớp bột cacao nguyên chất phủ trên bề mặt sẽ khiến bạn dễ dàng cảm nhận được hương vị tươi ngon trọn vẹn của loại chocol', 2000, 2, 'nama-chocolate.jpg', NULL, NULL),
(23, 'Pana Cotta', 'Sự mềm mại của từng miếng Panna Cotta, vị ngọt ngào béo ngậy của kem, sữa và sự tươi mát của các loại trái cây… hòa quyện cùng nhau khiến những ai từng ăn Panna Cotta đều phải mê mẩn', 32000, 2, 'pana-cotta.jpg', NULL, NULL),
(24, 'Bánh mì que Pate', 'Vỏ bánh mì giòn tan, kết hợp với lớp nhân pate béo béo đậm đà sẽ là lựa chọn lý tưởng nhẹ nhàng để lấp đầy chiếc bụng đói , cho 1 bữa sáng - trưa - chiều - tối của bạn thêm phần thú vị', 5000, 2, 'banh-mi-que.jpg', NULL, NULL),
(25, 'Mochi Kem Chocolate', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân chocolate độc đáo. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng', 19000, 2, 'mochi-socola.jpg', NULL, NULL),
(26, 'Mochi phúc bồn tử', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân phúc bồn tử ngọt ngào. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng', 19000, 2, 'mochi-kem-phuc-bon-tu.jpg', NULL, NULL),
(27, 'Coca cola', 'Coca cola vị truyền thống sử dụng công thức bí mật của Coca-Cola, đây là sự pha trộn của hương vị tự nhiên. Đây là loại nước ngọt nổi tiếng và được yêu thích bởi hương vị thơm ngon, mang đến sự sảng khoái giúp xua tan đi mệt mỏi và căng thẳng', 10000, 3, 'coca.jpg', NULL, NULL),
(28, 'Pepsi', 'Pepsi có nhiều hương vị cam quýt, trong khi các sản phẩm Coca Cola có hương vị vani và nho khô', 10000, 3, 'pepsi.jpg', NULL, NULL),
(29, '7up', '7UP là nước giải khát có gas với hương chanh tự nhiên cùng bọt ga thanh mát, mang đến cho bạn cảm giác sảng khoái tươi mát bất tận', 10000, 3, '7up.jpg', NULL, NULL),
(30, 'Sprite', 'Sprite là thước hiệu nước ngọt có ga nổi tiếng được yêu chuộng tại hơn 190 quốc gia trên thế giới', 12000, 3, 'sprite.jpg', NULL, NULL),
(31, 'Fanta vị cam', 'Fanta là một thương hiệu đồ uống có ga có hương vị trái cây được tạo ra bởi Công ty Coca-Cola và được bán trên thị trường toàn cầu', 9000, 3, 'fanta.jpg', NULL, NULL),
(32, 'Sinh tố bơ', 'Sinh tố bơ là thức uống giải nhiệt phổ biến bởi không chỉ ngon, đẹp mắt mà còn rất giàu chất dinh dưỡng', 25000, 3, 'sinh-to-bo.jpg', NULL, NULL),
(33, 'Sinh tố mãng cầu', 'Vị mãng cầu ngọt thanh cùng chút chua chua kích thích vị giác nên rất được ưa chuộng. Với sinh tố mãng cầu, bạn hoàn toàn có thể tự thực hiện tại nhà vì công thức đơn giản và không tốn nhiều thời gian', 23000, 3, 'sinh-to-mang-cau.jpg', NULL, NULL),
(34, 'Latte Nóng', 'Latte Nóng chính là một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan', 49000, 1, 'latte-nong.jpg', NULL, NULL),
(35, 'Mocha Nóng', ' Mocha nóng là loại cà phê được tạo nên từ sự kết hợp hoàn hảo của vị đắng đậm đà của Espresso và sốt sô-cô-la ngọt ngào mang tới hương vị đầy lôi cuốn, đánh thức mọi giác quan nên đây chính là thức uống ưa thích của phụ nữ và giới trẻ', 49000, 1, 'mocha-nong.jpg', NULL, NULL),
(36, 'Latte Táo Lê Quế Nóng', ' Sự kết hợp tuyệt vời giữa cà phê Espresso đậm đà, tinh tế với vị ngọt cay nhẹ của quế hòa quyện cùng vị chua ngọt dịu của táo lê, lớp foam bồng bềnh quyến rũ đã nên một thức uống độc đáo, tuyệt hảo cho những ngày se lạnh thêm ấp áp và trọn vẹn.', 58000, 1, 'latte-tao-que-nong.jpg', NULL, NULL),
(37, 'Phin Sữa Đá', ' Cà phê rang xay được chiết xuất chậm rãi từng giọt một thông qua dụng cụ lọc bằng kim loại có tên là \'Phin\', bạn có thể tùy thích lựa chọn uống nóng hoặc dùng chung với đá, có hoặc không có sữa đặc.', 29000, 1, 'phin-sua-da.jpg', NULL, NULL),
(38, 'PhinDi ChoCo', ' PhinDi Choco - Cà phê Phin thế hệ mới với chất Phin êm hơn, kết hợp cùng Choco ngọt tan mang đến hương vị mới lạ, không thể hấp dẫn hơn.', 39000, 1, 'phin-choco.jpg', NULL, NULL),
(39, 'Red Velvet Latte', 'Loại latte này sẽ là thức uống ưa chuộng của nhiều quý cô kiêu kỳ, quý bà sang trọng hiện nay bởi “diện mạo” ấn tượng của nó. Được làm từ nguyên liệu thiên nhiên như hoa dâm bụt, bột trà rooibos…', 65000, 1, 'red-velvet-latte.jpg', NULL, NULL),
(40, 'Cà phê muối', 'Nếu như những loại cà phê thông thường được pha với đường, sữa thì loại thức uống này lại kết hợp cà phê nguyên chất với muối. Cách pha chế này mang đến cho người dùng một loại thức uống mới, độc đáo, thơm ngon và không kém phần hấp dẫn', 20000, 1, 'ca-phe-muoi.jpg', NULL, NULL),
(41, 'Cà phê kem mặn', 'Thức uống này gây thương nhớ bởi hương vị thơm ngon, hấp dẫn và rất lạ miệng.', 35000, 1, 'ca-phe-kem-man.jpg', NULL, NULL),
(42, 'PhinDi Hạnh nhân', ' PhinDi Hạnh Nhân - Cà phê Phin thế hệ mới với chất Phin êm hơn, kết hợp cùng Hạnh nhân thơm bùi mang đến hương vị mới lạ, không thể hấp dẫn hơn', 39000, 1, 'phindi-hanh-nhan.jpg', NULL, NULL),
(43, 'PhinDi Kem Sữa', ' PhinDi Kem Sữa - Cà phê Phin thế hệ mới với chất Phin êm hơn, kết hợp cùng Kem Sữa béo ngậy mang đến hương vị mới lạ, không thể hấp dẫn hơn', 39000, 1, 'phindi-kem-sua.jpg', NULL, NULL),
(44, 'Caramel Machiato', 'Thỏa mãn cơn thèm ngọt! Ly cà phê Caramel Macchiato bắt đầu từ dòng sữa tươi và lớp bọt sữa béo ngậy, sau đó hòa quyện cùng cà phê espresso đậm đà và sốt caramel ngọt ngào. Bạn có thể tùy thích lựa chọn uống nóng hoặc dùng chung với đá', 59000, 1, 'caramel-machiato.jpg', NULL, NULL),
(45, 'Cà phê đá xay', ' Một phiên bản nâng cấp từ ly cà phê sữa quen thuộc, nhưng lại tỉnh táo và tươi mát hơn bởi lớp đá xay đi kèm. Nhấp 1 ngụm cà phê đá xay là thấy đã, ngụm thứ hai thêm tỉnh táo và cứ thế lôi cuốn bạn đến ngụm cuối cùng.', 57000, 1, 'ca-phe-da-xay.jpg', NULL, NULL),
(46, 'Mochi Kem Xoài', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân xoài chua chua ngọt ngọt. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng.', 19000, 2, 'mochi-kem-xoai.jpg', NULL, NULL),
(47, 'Mochi Kem Dừa Dứa', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân dừa dứa thơm lừng lạ miệng. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng.', 19000, 2, 'mochi-dua-dua.jpg', NULL, NULL),
(48, 'Sinh tố sapoche', 'Sinh tố sapoche Sinh tố sapoche(hồng xiêm) được biết đến là một thức uống thơm ngon chứa nhiều chất xơ tốt cho hệ tiêu hóa và cung cấp năng lượng cho cơ thể mà nhà nhà đều yêu thích.', 18000, 3, 'sinh-to-sapoche.jpg', NULL, NULL),
(49, 'Chocolate đá xay', 'Sữa và kem tươi béo ngọt được “cá tính hoá” bởi vị chocolate đăng đắng. Dành cho các tín đồ hảo ngọt. Lựa chọn hàng đầu nếu bạn đang cần chút năng lượng tinh thần.', 57000, 3, 'chocotate-da-xay.jpg', NULL, NULL),
(50, 'Sinh tố kiwi', ' Kiwi là loại trái cây vừa tốt cho sức khỏe, vừa giúp đẹp da cùng với nhiều các chế biến từ loại trái cây này', 18000, 3, 'sinh-to-kiwi.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Producttype`
--

CREATE TABLE `Producttype` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Producttype`
--

INSERT INTO `Producttype` (`id`, `type`) VALUES
(1, 'Cà phê'),
(2, 'Bánh ngọt'),
(3, 'Đồ uống khác');

-- --------------------------------------------------------

--
-- Table structure for table `Promotions`
--

CREATE TABLE `Promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_percent` int(3) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Promotions`
--

INSERT INTO `Promotions` (`id`, `products_id`, `code`, `sale_percent`, `text`, `created_at`, `updated_at`) VALUES
(1, 15, 'DENBANHNGOT', 50, 'Thích là khuyến mãi, không vì lí do gì, giảm ngay 50% cho các sản phẩm bánh ngọt có thể áp dụng.\r\nKhuyến mãi duy nhất trong ngày 30/2/2023', NULL, NULL),
(2, 1, 'DEN30420', 20, 'Khuyến mãi ngập tràn mừng 30/4 giảm ngay 20% cho các sản phẩm có thể áp dụng.\r\nKhuyến mãi hết hạn vào 23h00 30/4/2022', NULL, NULL),
(3, 22, 'DEN30420', 20, 'Khuyến mãi ngập tràn mừng 30/4 giảm ngay 20% cho các sản phẩm có thể áp dụng.\r\nKhuyến mãi hết hạn vào 23h59 30/4/2022', NULL, NULL),
(4, 19, 'DEN30420', 20, 'Khuyến mãi ngập tràn mừng 30/4 giảm ngay 20% cho các sản phẩm có thể áp dụng.\r\nKhuyến mãi hết hạn vào 23h59 30/4/2022', NULL, NULL),
(5, 4, 'DEN10', 10, 'Khuyến mãi ngập tràn mừng 30/4 giảm ngay 10% cho các sản phẩm có thể áp dụng.\r\nKhuyến mãi hết hạn vào 23h59 30/4/2022', NULL, NULL),
(6, 10, 'DEN10', 10, 'Khuyến mãi ngập tràn mừng 30/4 giảm ngay 10% cho các sản phẩm có thể áp dụng.\r\nKhuyến mãi hết hạn vào 23h59 30/4/2022', NULL, NULL),
(7, 5, 'DENNEW30', 30, 'Tưng bừng khuyến mãi ưu đãi giảm ngay 30% cho khách hàng chưa đặt đơn nào, dành cho các sản phẩm có thể áp dụng.\r\nKhuyến mãi hết hạn vào 23h59 31/5/2022', NULL, NULL),
(8, 7, 'DENNEW30', 30, 'Tưng bừng khuyến mãi ưu đãi giảm ngay 30% cho khách hàng chưa đặt đơn nào, dành cho các sản phẩm có thể áp dụng.\r\nKhuyến mãi hết hạn vào 23h59 31/5/2022', NULL, NULL),
(9, 20, 'DENQTLD', 20, 'Khuyến mãi ngập tràn mừng 1/5 giảm ngay 10% cho các sản phẩm có thể áp dụng.\r\nKhuyến mãi hết hạn vào 23h59 30/4/2022', NULL, NULL),
(10, 28, 'DENQTLD', 20, 'Khuyến mãi ngập tràn mừng 1/5 giảm ngay 10% cho các sản phẩm có thể áp dụng.\r\nKhuyến mãi hết hạn vào 23h59 30/4/2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Storeimages`
--

CREATE TABLE `Storeimages` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Storeimages`
--

INSERT INTO `Storeimages` (`id`, `url`) VALUES
(1, 'img1.png'),
(2, 'img2.png'),
(3, 'img3.png'),
(4, 'img4.png'),
(5, 'img5.png'),
(6, 'img6.png'),
(7, 'img7.png'),
(8, 'img8.png'),
(9, 'img9.png'),
(10, 'img10.png'),
(11, 'img11.png'),
(12, 'img12.png'),
(13, 'img13.png'),
(14, 'img14.png'),
(15, 'img15.png'),
(16, 'img16.png'),
(17, 'img17.png');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `username`, `password`) VALUES
(0, 'root12345', 'Testpass@777');

-- --------------------------------------------------------

--
-- Table structure for table `Vouchers`
--

CREATE TABLE `Vouchers` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sale` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Vouchers`
--

INSERT INTO `Vouchers` (`id`, `code`, `sale`, `created_at`, `updated_at`) VALUES
(1, 'DENMEMBER20', 20000, NULL, NULL),
(2, 'DENMEMBER30', 30000, NULL, NULL),
(3, 'DENMEMBER50', 50000, NULL, NULL),
(4, 'DENCOFFEE', 100000, NULL, NULL),
(5, 'DENNEW20', 20000, NULL, NULL),
(6, 'DENNEW30', 30000, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `Feedbacks`
--
ALTER TABLE `Feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Images`
--
ALTER TABLE `Images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image` (`products_id`);

--
-- Indexes for table `Orderdetail`
--
ALTER TABLE `Orderdetail`
  ADD KEY `order-detail` (`orders_id`),
  ADD KEY `product-detail` (`products_id`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-order` (`users_id`),
  ADD KEY `status-order` (`orderstatus_id`),
  ADD KEY `voucher-order` (`vouchers_id`);

--
-- Indexes for table `Orderstatus`
--
ALTER TABLE `Orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_product_type` (`producttype_id`);

--
-- Indexes for table `Producttype`
--
ALTER TABLE `Producttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Promotions`
--
ALTER TABLE `Promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Promotions-product` (`products_id`);

--
-- Indexes for table `Storeimages`
--
ALTER TABLE `Storeimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Vouchers`
--
ALTER TABLE `Vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `users_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Feedbacks`
--
ALTER TABLE `Feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Images`
--
ALTER TABLE `Images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Orderstatus`
--
ALTER TABLE `Orderstatus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `Producttype`
--
ALTER TABLE `Producttype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Promotions`
--
ALTER TABLE `Promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Storeimages`
--
ALTER TABLE `Storeimages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Vouchers`
--
ALTER TABLE `Vouchers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Admins`
--
ALTER TABLE `Admins`
  ADD CONSTRAINT `admins_users` FOREIGN KEY (`users_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Images`
--
ALTER TABLE `Images`
  ADD CONSTRAINT `product_image` FOREIGN KEY (`products_id`) REFERENCES `Products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Orderdetail`
--
ALTER TABLE `Orderdetail`
  ADD CONSTRAINT `order-detail` FOREIGN KEY (`orders_id`) REFERENCES `Orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product-detail` FOREIGN KEY (`products_id`) REFERENCES `Products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `status-order` FOREIGN KEY (`orderstatus_id`) REFERENCES `Orderstatus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user-order` FOREIGN KEY (`users_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher-order` FOREIGN KEY (`vouchers_id`) REFERENCES `Vouchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `product_product_type` FOREIGN KEY (`producttype_id`) REFERENCES `Producttype` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Promotions`
--
ALTER TABLE `Promotions`
  ADD CONSTRAINT `Promotions-product` FOREIGN KEY (`products_id`) REFERENCES `Products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
