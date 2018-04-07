-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 05:37 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_bazaar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email_id`, `password`) VALUES
(2, 'NileshSanyal', 'nil2take1@gmail.com', 'MTIzNDU2');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(256) NOT NULL,
  `is_active` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `is_active`) VALUES
(1, 'Electronics', 'y'),
(2, 'Grocery Store', 'y'),
(3, 'Fashion Store', 'y'),
(4, 'Books', 'y'),
(5, 'Home and Furniture', 'y'),
(6, 'Nokia', 'n'),
(7, 'Intex', 'n'),
(9, 'Asus', 'n'),
(10, 'Lava', 'n'),
(11, 'Apple', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `product_name`, `quantity`, `total_amount`, `user_id`, `user_name`, `order_date`) VALUES
(1, 19, 'Fresho Guava', 2, 95, 1, 'Nilesh Sanyal', '2018-01-27 10:20:41'),
(2, 29, 'INVICTUS Men White Slim Fit Formal Shirt', 2, 1, 1, 'Nilesh Sanyal', '2018-01-27 10:27:04'),
(3, 26, 'CakePHP Application Development', 1, 500, 1, 'Nilesh Sanyal', '2018-01-27 10:27:04'),
(4, 20, 'Fresho Orange', 1, 65, 1, 'Nilesh Sanyal', '2018-01-27 10:32:25'),
(5, 21, 'Borges Extra Light Olive Oil', 1, 250, 1, 'Nilesh Sanyal', '2018-01-27 10:32:25'),
(6, 22, 'Fresho Apple', 1, 125, 1, 'Nilesh Sanyal', '2018-01-27 10:32:25'),
(7, 19, 'Fresho Guava', 2, 190, 1, 'Nilesh Sanyal', '2018-01-27 10:49:49'),
(8, 20, 'Fresho Orange', 2, 130, 1, 'Nilesh Sanyal', '2018-01-27 10:49:49'),
(9, 19, 'Fresho Guava', 1, 95, 1, 'Nilesh Sanyal', '2018-01-27 11:16:27'),
(10, 31, 'Black Coffee Casual Trouser', 1, 650, 1, 'Nilesh Sanyal', '2018-01-27 11:16:27'),
(11, 21, 'Borges Extra Light Olive Oil', 1, 250, 1, 'Nilesh Sanyal', '2018-01-27 11:18:02'),
(12, 34, 'Split Carrier AC', 2, 67998, 1, 'Nilesh Sanyal', '2018-01-27 13:35:51'),
(13, 32, 'Brown Self Design Formal Blazer', 1, 9353, 1, 'Nilesh Sanyal', '2018-01-27 14:03:13'),
(14, 19, 'Fresho Guava', 1, 95, 1, 'Nilesh Sanyal', '2018-01-28 08:37:48'),
(15, 19, 'Fresho Guava', 4, 380, 1, 'Nilesh Sanyal', '2018-01-28 14:54:11'),
(16, 22, 'Fresho Apple', 2, 250, 1, 'Nilesh Sanyal', '2018-01-28 14:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `stock` int(11) NOT NULL,
  `is_active` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cid`, `name`, `price`, `description`, `image`, `stock`, `is_active`) VALUES
(1, 1, 'Redmi 3s Prime', 10000, 'The Xiaomi Redmi 3S Prime is powered by 1.1GHz octa-core Qualcomm Snapdragon 430 processor and it comes with 3GB of RAM. The phone packs 32GB of internal storage that can be expanded up to 128GB via a microSD card. As far as the cameras are concerned, the Xiaomi Redmi 3S Prime packs a 13-megapixel primary camera on the rear and a 5-megapixel front shooter for selfies.', 'redmi_3s_prime.jpg', 1000, 'y'),
(2, 1, 'Moto X4', 23000, 'Meet the Moto X4 - the smartphone that takes your mobile experience to the next level. With an IP68 rating and a metal body, the Moto X4 boasts of durability and good looks. The Moto Actions make everyday interaction more convenient while Qualcomm Snapdragon processor ensures a lag-free performance.', 'moto_x4.jpeg', 500, 'y'),
(3, 1, 'Samsung Galaxy J7 Pro', 21000, 'Samsung Galaxy J7 Pro is a midrange Android smartphone produced by Samsung Electronics. It was unveiled and released in June 2017.It has an advanced 64-bit class system on a chip backed by 3 GB RAM.', 'samsung_j7_pro.jpeg', 2000, 'y'),
(16, 1, 'Iphone 8 plus', 70000, 'An all-new glass design, an updated camera, and a powerful chip, thereâ€™s so much to love about the iPhone 8 Plus. This iPhone brings you an augmented reality experience thatâ€™s more immersive than before. Whatâ€™s more? You can charge your iPhone wirelessly!', 'iphone-8-plus.jpeg', 4000, 'n'),
(19, 2, 'Fresho Guava', 95, 'Guavas are native to South America where they have been growing for centuries. Soft, sweet and fragrant, this fruit belongs to the myrtle family. Each fruit is packed with phyto-nutrients that make it a great snack. Fresho brings you an assortment of these guavas that are farm fresh, crunchy and juicy. Just wash them and bite in to enjoy the deliciousness.', '10000369_13-fresho-guava.jpg', 3995, 'y'),
(20, 2, 'Fresho Orange', 65, 'Orange kinnow is a high-yield mandarin orange that is cultivated in various parts of India and Pakistan. It was first developed in the University of California by via hybrid of King (Citrus nobilis) and Willow Leaf (Citrus x deliciosa). It has been used for cultivation since 1935 and grows in hot climates, maturing in winters.', '10000384-3_3-fresho-orange-kinnow.jpg', 7000, 'y'),
(21, 2, 'Borges Extra Light Olive Oil', 250, 'Borges Extra Light Olive Oil is intermediary grade oil with medium flavor and aroma. Add that innovative taste to your favorite pasta or make exotic spaghetti to treat yourself. It is best appropriate for preparing continental or Mediterranean cuisine.', '40018242_2-borges-olive-oil-extra-light.jpg', 450, 'y'),
(22, 2, 'Fresho Apple', 125, 'Fresho is our brand of fresh fruits and vegetables which are individually handpicked everyday by our experienced and technically competent buyers. Our buying, storing and packaging processes are tailored to ensure that only the fresh, nutrient dense, healthy and delicious produce reaches your doorstep. We guarantee the quality of all Fresho products. If you are not satisfied with the freshness of the items, you can hand them back to our Customer Experience Executive (CEE) for a full refund. Royal gala apples are bright red, thin skinned, white fleshed fruits with a mild sweet flavour and are native to New Zealand. \r\nProduct image shown is for representation purpose only, the actually product may vary based on season, produce & availability.', '40033821_2-fresho-apple-kinnaur.jpg', 3998, 'y'),
(23, 2, 'Supremo Milk', 60, 'It\'s cow milk containing 2.5%fat.', '40053404_2-go-supremo-milk.jpg', 2000, 'y'),
(24, 4, 'Zend Framework 2 Application Development', 2000, 'PHP developers can create more powerful applications using the flexibility of Zend Framework 2. This book will extend your capabilities through a totally practical course culminating in the creation of a social network.', '2100OS_cov.jpg', 50, 'y'),
(25, 4, 'Wordpress Complete', 2500, 'Learn how to build a beautiful and feature-rich website or blog with WordPress all on your own.', '9781787285705.png', 2000, 'y'),
(26, 4, 'CakePHP Application Development', 500, 'Step-by-step introduction to rapid web development using the open-source MVC CakePHP framework', '1847193897.jpg', 150, 'y'),
(27, 4, 'Mastering Laravel', 1500, 'Develop robust modern web-based software applications and RESTful APIs with Laravel, one of the hottest PHP frameworks', '5028OS_Mastering Laravel_.jpg', 40, 'y'),
(28, 4, 'Programming With Codeigniter MVC', 650, 'Build feature-rich web applications using the CodeIgniter MVC framework', '4704OT_cov.jpg', 400, 'y'),
(29, 3, 'INVICTUS Men White Slim Fit Formal Shirt', 764, 'White formal shirt in a woven design, has a slim collar, button placket, long sleeves, curved hem\r\n100% cotton \r\nMachine-wash', '11501224171163-INVICTUS-Men-White-Slim-Fit-Formal-Shirt-8091501224170983-1.jpg', 850, 'y'),
(30, 3, 'Kook N Keech Jeans', 877, 'Blue medium wash 6 and more-pocket mid-rise jeans, clean look with no fade, has a button and zip closure, waistband with belt loops\r\n\r\n100% cotton \r\nMachine-wash', '11504521275793-Kook-N-Keech-Men-Blue-Boyfriend-Fit-Mid-Rise-Clean-Look-Jeans-2591504521275566-1.jpg', 449, 'y'),
(31, 3, 'Black Coffee Casual Trouser', 650, 'Grey solid mid-rise formal trousers, has a button closure closure, 4 pockets\r\n\r\nPolyester and viscose rayon \r\nMachine-wash', 'black_coffee_casual_trouser.jpg', 300, 'y'),
(32, 3, 'Brown Self Design Formal Blazer', 9353, 'Brown self-design formal blazer, has a peak lapel, single-breasted with button closures, long sleeves, a chest pocket, two flap pockets\r\nThis blazer does not come with a shirt\r\nPlease note that this style will be directly shipped from UK and might take 18-20 days to be delivered\r\n\r\nWool\r\nMachine-wash', '11505370004671-next-Men-Blazers-7921505370004570-1.jpg', 149, 'y'),
(33, 3, 'Grey Solid Hooded Sweatshirt', 2957, 'Grey solid sweatshirt, has a hood, 2 pockets, long sleeves, zip closure, straight hem\r\n\r\nPlease note that this style will be directly shipped from UK and might take 18-20 days to be delivered\r\n\r\nCotton\r\nMachine-wash', '11509014803717-next-Men-Grey-Solid-Hooded-Sweatshirt-671509014803589-1.jpg', 200, 'y'),
(34, 5, 'Split Carrier AC', 33999, 'Ever smelled something pungent, realized it was coming from your AC and then rushed to switch it off? Well, gone are those days. The Refrigerant Leakage Detector switches the unit off as soon as it picks up any warning signals. The indoor unit also displays the relevant error code to let you know exactly what to do next.', '12k-ester-pro-5-star-1-split-carrier-original-imaety23fhjngygt.jpeg', 498, 'y'),
(35, 5, 'Crompton Geyser', 1600, '2 year warranty by the manufacturer from date of purchase\r\n5 Star Rating\r\n6 Litres Storage Water heater\r\nErgonomically styled plastic body\r\nFire-resistant cable\r\nUnique temperature indicator dial, Adjustable thermostat', '15-crompton-greaves-arno-power-1-original-imaee5tzdjuspz56.jpeg', 350, 'y'),
(36, 5, 'Bajaj Mixer Grinder', 1899, 'Grind and blend to perfection using the Bajaj GX 1 Mixer Grinder and churn out dishes just as good as the ones at your favourite restaurant.', 'bajaj-px-80-f-gx-1-mixer-grinder-original-imafyagzggz7espm.jpeg', 480, 'y'),
(37, 5, 'LG Washing Machine', 11499, 'Semi Automatic Top Load\r\n1000 rpm : Higher the spin speed, lower the drying time\r\nPlastic Special Rust Proof drum with high durability.\r\n7 kg : Great for a family of 3', 'p8071n3fa-lg-original-imaeufcmdrkv2rtu.jpeg', 450, 'y'),
(38, 1, 'LG HD Tv', 52999, 'The LG 43UJ632T smart TV comes with a 4K resolution of 3840 x 2160 pixels. This, combined with the relatively compact 108 cm (43) display, means that you are going to enjoy crisp and detailed images.', 'lg-43uj632t-original-imaexts3phdytuxd.jpeg', 480, 'y'),
(43, 2, 'Grapes', 55, 'Due to Seasonal Issues, Grapes harvesting is happening quiet prematurely, which may \r\n\r\npossibly end up with quality concerns. Our quality teams are working on this, to ensure \r\n\r\nthat the best reaches you\"\r\nProduct image shown is for representation purpose only, the actually product may vary \r\n\r\nbased on season, produce & availability.', '1517130586fresho-grapes.jpg', 2200, 'y'),
(44, 2, 'Watermelon', 30, 'Watermelon Kiran is sugary, juicy with a grainy texture. It is wealthy in electrolytes & \r\n\r\nwater. It brings more nutrients per calorie making it an outstanding health product. It \r\n\r\nis wealthy in photonutrients including anti-oxidant flavonoids.', '1517130633fresho-watermelon.jpg', 500, 'y'),
(45, 2, 'Green Peas', 25, 'Our buying, storing and packaging processes are tailored to ensure that only the fresh, \r\n\r\nnutrient dense, healthy and delicious produce reaches your doorstep.', '1517130675green-peas.jpg', 450, 'y'),
(46, 2, 'Keyloggs Chocos', 365, 'Kelloggs Chocos is the great breakfast cereal for both mom and kids. While kids love its \r\n\r\nyummy chocolaty taste, and have fun with the way Kelloggs Chocos turns milk super-duper \r\n\r\nchocolaty. Moms can feel relieved that theyve given their child a nourishing breakfast \r\n\r\nbecause Chocos is now made with whole grain, provides fibre and is fortified with 11 \r\n\r\nessential vitamins and minerals.', '1517130724kelloggs-chocos.jpg', 1000, 'y'),
(47, 2, 'Maggi Noodles Masala', 55, 'MAGGI 2-Minute NoodlesÃ‚ is one of the largest & most loved food brands that defines the \r\n\r\nInstant Noodles category in India. The Unique Masala taste is an all time favorite that \r\n\r\nis loved by many!', '1517130781maggi-noodles-masala.jpg', 250, 'y'),
(48, 2, 'Britania Marie Gold', 25, 'Britannia Marie gold Biscuits is impartial taste, lightness and along with the added \r\n\r\nminerals and vitamins. It is best at tea time.', '1517130827britannia-marie-gold.jpg', 300, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT '1st user password: 123456',
  `mobile` varchar(11) NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `full_name`, `email`, `password`, `mobile`, `Address`) VALUES
(1, 'Nilesh Sanyal', 'nil2take1@gmail.com', '$2y$10$V0VY0ngf3K6j.oHOk1uazu5NaTuvmf9I2NbCGfccDqXz5hSjeR1yu', '9903396402', 'Ramrajatala, Arabinda Road, Howrah 4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
