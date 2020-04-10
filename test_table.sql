-- Host: localhost
-- Generation Time: Apr 09, 2020 at 08:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `dilitrust_role`
--

CREATE TABLE `dilitrust_role` (
  `id` int(11) NOT NULL,
  `profil` int(11) NOT NULL DEFAULT 0,
  `label` text DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dilitrust_role`
--

INSERT INTO `dilitrust_role` (`id`, `profil`, `label`, `date`) VALUES
(1, 1, 'employee', '2020-04-09 14:06:50'),
(2, 2, 'manager', '2020-04-09 14:06:50'),
(3, 3, 'administrator', '2020-04-09 14:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `dilitrust_user`
--

CREATE TABLE `dilitrust_user` (
  `id` int(11) NOT NULL,
  `display_name` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `profil_id` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dilitrust_role`
--
ALTER TABLE `dilitrust_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dilitrust_user`
--
ALTER TABLE `dilitrust_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dilitrust_role`
--
ALTER TABLE `dilitrust_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dilitrust_user`
--
ALTER TABLE `dilitrust_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
