-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 01:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_descripton` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `publish_date` date NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `author_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `short_descripton`, `description`, `image`, `publish_date`, `category`, `status`, `author_name`, `created_at`, `updated_at`) VALUES
(1, 'Healthy environment to care with modern equipment', 'healthy-environment-to-care-with-modern-equipment', 'Non illo quas blanditiis repellendus laboriosam minima animi. Consectetur accusantium pariatur repudiandae!', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus natus, consectetur? Illum libero vel nihil nisi quae, voluptatem, sapiente necessitatibus distinctio voluptates, iusto qui. Laboriosam autem, nam voluptate in beatae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae iure officia nihil nemo, repudiandae itaque similique praesentium non aut nesciunt facere nulla, sequi sunt nam temporibus atque earum, ratione, labore.</p><blockquote><p><i>A brand for a company is like a reputation for a person. You earn reputation by trying to do hard things well.</i></p></blockquote><p>The same is true as we experience the emotional sensation of stress from our first instances of social rejection ridicule. We quickly learn to fear and thus automatically.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, rerum beatae repellat tenetur incidunt quisquam libero dolores laudantium. Nesciunt quis itaque quidem, voluptatem autem eos animi laborum iusto expedita sapiente.</p>', 'uploads/blog_images/blog-1.jpg', '2024-12-05', 'Equipment', 'Active', 'Priya Kashyap', '2024-12-06 15:46:28', '2024-12-06 15:46:28'),
(6, 'Cheerful Loving Couple Bakers Drinking Coffee', 'cheerful-Loving-Couple-Bakers-Drinking-Coffee', 'It’s no secret that the digital industry is booming. From exciting startups to global brands, companies are reaching', '<p><strong>It’s no secret</strong> that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available. However, the industry is fast becoming overcrowded, heaving with agencies offering similar services — on the surface, at least.</p><p>Producing creative, fresh projects is the key to standing out. Unique side projects are the best place to innovate, but balancing commercially and creatively lucrative work is tricky. So, this article looks at how to make side projects work and why they’re worthwhile, drawing on lessons learned from our development of the ux&nbsp;ompanion app.</p>', 'uploads/blog_images/blog-image.jpg', '2024-12-08', 'Heart', 'Active', 'priya kashyap', '2024-12-07 11:21:32', NULL),
(7, 'Loft Office With Vintage Decor For Creative Working', 'loft-Office-With-Vintage-Decor-For-Creative-Working', 'It’s no secret that the digital industry is booming. From exciting startups to global brands', '<p><strong>It’s no secret</strong> that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available. However, the industry is fast becoming overcrowded, heaving with agencies offering similar services — on the surface, at least.</p><p>Producing creative, fresh projects is the key to standing out. Unique side projects are the best place to innovate, but balancing commercially and creatively lucrative work is tricky. So, this article looks at how to make side projects work and why they’re worthwhile, drawing on lessons learned from our development of the ux&nbsp;ompanion app.</p><h4>Why Integrate Side Projects?</h4><p>Being creative within the constraints of client briefs, budgets and timelines is the norm for most agencies. However, investing in research and development as a true, creative outlet is a powerful addition. In these side projects alone, your team members can pool their expertise to create and shape their own vision — a powerful way to develop motivation, interdisciplinary skills and close relationships.</p>', 'uploads/blog_images/blog-image1.jpg', '2024-12-06', 'Free counselling', 'Active', 'John Doe', '2024-12-07 11:32:58', NULL),
(8, 'Cosy Bright Office In Yellow And Grey Colors', 'cosy-bright-office-in-yellow-and-grey-colors', 'It’s no secret that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies,', '<p><strong>It’s no secret</strong> that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available. However, the industry is fast becoming overcrowded, heaving with agencies offering similar services — on the surface, at least.</p><p>Producing creative, fresh projects is the key to standing out. Unique side projects are the best place to innovate, but balancing commercially and creatively lucrative work is tricky. So, this article looks at how to make side projects work and why they’re worthwhile, drawing on lessons learned from our development of the ux&nbsp;ompanion app.</p><h4>Why Integrate Side Projects?</h4><p>Being creative within the constraints of client briefs, budgets and timelines is the norm for most agencies. However, investing in research and development as a true, creative outlet is a powerful addition. In these side projects alone, your team members can pool their expertise to create and shape their own vision — a powerful way to develop motivation, interdisciplinary skills and close relationships.</p>', 'uploads/blog_images/blog-image3.jpg', '2024-12-09', 'Heart', 'Inactive', 'shubham Singh', '2024-12-08 12:16:41', '2024-12-08 12:16:41'),
(9, 'Stylish Kitchen And Dining Room With Functional Ideas', 'stylish-Kitchen-And-Dining-Room-With-Functional-Ideas', 'It’s no secret that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available. However', '<p><strong>It’s no secret</strong> that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available. However, the industry is fast becoming overcrowded, heaving with agencies offering similar services — on the surface, at least.</p><p>Producing creative, fresh projects is the key to standing out. Unique side projects are the best place to innovate, but balancing commercially and creatively lucrative work is tricky. So, this article looks at how to make side projects work and why they’re worthwhile, drawing on lessons learned from our development of the ux&nbsp;ompanion app.</p><h4>Why Integrate Side Projects?</h4><p>Being creative within the constraints of client briefs, budgets and timelines is the norm for most agencies. However, investing in research and development as a true, creative outlet is a powerful addition. In these side projects alone, your team members can pool their expertise to create and shape their own vision — a powerful way to develop motivation, interdisciplinary skills and close relationships.</p>', 'uploads/blog_images/blog-image5.jpg', '2024-12-09', 'Free counselling', 'Active', 'Amit Yadav', '2024-12-07 11:38:49', NULL),
(11, 'priyaaa', 'priyaaa', 'fghsjksqlqwswkldnqwjdqwio;dlwqh.', '<p>vbnm,./xansjxkahysoisyqshqsq</p>', 'uploads/blog_images/blog-image3.jpg', '2024-12-09', 'Medicine', 'Active', 'shbham', '2024-12-08 12:37:27', '2024-12-08 12:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_id`, `name`, `email`, `message`, `status`, `created_at`) VALUES
(2, 3, 'Shubham', 'shubham@gmail.com', 'aise majame', 'Inactive', '2024-12-06 17:09:25'),
(3, 1, 'Amit', 'superadmin@example.com', 'asdas assadsa asdsads asdasd', 'Active', '2024-12-06 17:30:00'),
(4, 10, 'abc', 'priya@gmail.com', 'fghajakl;\'', 'Active', '2024-12-08 11:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `role` enum('Super Admin','Admin','Employe') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `contact_no`, `email`, `user_name`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Priya', '7233080418', 'priya@gmail.com', 'priya@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Super Admin', 'Active', '2024-10-05 21:03:41', '2024-10-05 17:33:05'),
(3, 'Amit Kumar', '7379765214', 'admin@demo.com', 'priya12@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 'Active', '2024-12-06 23:01:33', '2024-12-06 23:01:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
