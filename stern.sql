-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 05:08 PM
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
-- Database: `stern`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanak`
--

CREATE TABLE `clanak` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `clanak`
--

INSERT INTO `clanak` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(14, '04.06.2024.', 'Beautiful curtains of pink and green light', 'Recent space weather storms could be a taste of what?s to come until at least 2026.', 'Beautiful curtains of pink and green light swirled in night skies around the world in May during one of the strongest displays of auroras in half a millennium.\r\n\r\nThe source of that light show was the sun. In the first week of May, a barrage of explosive solar flares and coronal mass ejections blasted billions of tons of material from the sun into space. This created the strongest solar storm in more than two decades, resulting in auroras as far south as Florida and parts of northern India (SN: 2/26/21).\r\nThose celestial fireworks were just the start of what could be a years-long run of similar displays. That?s because the sun is now nearing the peak of activity in its 11-year solar cycle ? and already is far stormier than originally predicted.\r\n\r\nAuroras happen when charged particles from the sun collide with oxygen and nitrogen molecules in Earth?s upper atmosphere. As the atmospheric molecules shed the energy imparted from such collisions, they emit light in a variety of colors. Because the planet?s magnetic field directs these charged particles toward the poles, auroras are mostly seen only in the highest latitudes ? unless the storms are unusually powerful.\r\n\r\nTo find out what to expect over the next few years, and to understand how this period of high solar activity impacts us, Science News talked to Teresa Nieves-Chinchilla, acting director of NASA?s Moon to Mars Space Weather Analysis Office in Greenbelt, Md., and Shawn Dahl, a space weather forecaster at the National Oceanic and Atmospheric Administration?s Space Weather Prediction Center in Boulder, Colo. The conversations have been edited for clarity and brevity.', '2.jpg', 'znanost', 0),
(20, '04.06.2024.', 'Thomas Cech?s ?The Catalyst? spotlights RNA and its superpowers', ' The molecule may aid research in vaccines, cancer and rare genetic diseases', 'Make no mistake, RNA is the main character of Nobel Prize-winning scientist Thomas Cech?s new book.\r\n\r\nThe Catalyst is part ode to the oft-overlooked molecule and part detailed history of the scientists who?ve studied it. RNA has clearly ensorcelled Cech. And after reading his book, the molecule may ensorcell you, too.\r\n\r\nRNA was once considered the ?biochemical backup singer? to the diva DNA, Cech writes. But this molecule, a largely single-stranded cousin of DNA, seems to be pretty wondrous all on its own. It can slice, it can splice, it can perform a rollicking array of genetic gymnastics that scientists may still not fully comprehend. Cech, a biochemist at the University of Colorado Boulder, catalogs these abilities in an informative story that offers readers a no-stone-unturned tour of the biochemical basics.', 'Screenshot 2024-06-04 164241.jpg', 'znanost', 0),
(21, '04.06.2024.', 'Cisco launches $1 bln AI fund and makes first investment s', 'STOCKHOLM, June 4 (Reuters) - Cisco (CSCO.O), opens new tab on Tuesday launched a $1 billion fund to invest in artificial intelligence startups, joining a list of big technology companies rushing to take stakes in small AI firms.', 'STOCKHOLM, June 4 (Reuters) - Cisco (CSCO.O), opens new tab on Tuesday launched a $1 billion fund to invest in artificial intelligence startups, joining a list of big technology companies rushing to take stakes in small AI firms.\r\nThe company, through its investment arm, is investing in Cohere, Mistral AI and Scale AI, among others, and has already committed nearly $200 million of the fund, it said.\r\nAI data startup Scale AI is valued at nearly $14 billion, while so-called foundation model developers Cohere and Mistral are both reportedly in talks with investors to raise funds at a valuation of $5 billion each.\r\nFoundation AI models are built using huge volumes of data and can be applied across a wide range of use cases.\r\nAfter Microsoft-backed OpenAI started the AI frenzy in 2022 with the launch of ChatGPT, several tech companies such as Meta (META.O), opens new tab and Amazon (AMZN.O), opens new tab have also invested in various AI startups.\r\nCisco has made over 20 AI-focused acquisitions and investments in the last several years, furthering generative AI and machine learning and integration of AI across its portfolio, the company said in a statement.', 'Screenshot 2024-06-04 164241.jpg', 'tehnologija', 0),
(23, '04.06.2024.', 'Inside the Biggest FBI Sting Operation in History', 'When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.', 'When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.When a drug kingpin named Microsoft tried to seize control of an encrypted phone company for criminals, he was playing right into its real owners? hands.', 'ms.jpg', 'tehnologija', 0),
(30, '05.06.2024.', 'znanost4', 'znanost4znanost4znanost4', 'znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4znanost4', '3.jpg', 'znanost', 0),
(31, '05.06.2024.', 'Znanost5', 'Znanost5Znanost5Znanost5', 'Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5Znanost5', 'cisco.jpg', 'znanost', 0),
(34, '07.06.2024.', ' Lacrymaria olor', 'This protist unfolds its ?neck? up to 30 times its body length to scout prey', 'Oddly, origami could be useful for snagging prey. \r\n\r\nA single-celled protist called Lacrymaria olor uses a helix of pleats folded like origami to unspool a necklike protrusion up to 30 times the length of its body, or 1.2 millimeters, to quickly snap up food, researchers report in the June 7 Science. If a roughly 1.7-meter-tall person could do the same, their neck would reach about halfway up the Statue of Liberty.\r\n\r\nThe finding could help inspire new robotics, such as tools for microsurgery that can extend and contract inside small body cavities. \r\nSeeing L. olor?s neck in action is an exercise in speed. The organism waves its bulbous dome to-and-fro in rapid, snakelike movements as its neck lengthens and retracts. Such quickness and the organism?s ability to do it over and over again ?sets Lacrymaria apart,? says Eliott Flaum, a biophysicist at Stanford University. Other organisms with similar reach move slowly or are unable to reverse any extensions.\r\n\r\n', 'a.jpg', 'znanost', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(4, 'Matija', 'Kovacic', 'MatijaKovacic', '$2y$10$C19gEf9vxFR7qgwzC6FKu.VpYZq6gE6xPHkv1abkx9IwN7Sum2Py.', 1),
(14, 'Matija', 'Kovacic', 'MatijaKovacic1', '$2y$10$Hf6ODdwxFxuEfTqwZ22p7enx1yZtVornZv.0haE/cwaA/yXf7ZhUq', 0),
(15, 'Novi', 'Korisnik', 'NoviKorisnik', '$2y$10$brhVB.3HgIjHaOqbGbeaU.5PVpNNkOIwV0uAC6U4dtQEagMkSsJjO', 0),
(16, 'Matija', 'Kovacic', 'MatijaKovacic2', '$2y$10$8yC0LUn2PU6Vev0S3XS4Mekm5tE8fXQpMW5AxCMG2Zl04qho.NsoG', 0),
(17, 'Klementina', 'Lisak', 'KlementinaLisak', '$2y$10$dlzhv0wqUdIJ2map3.Fza.CfrKxoDX5YBjXT5puxQb3UxFKsuzMo6', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanak`
--
ALTER TABLE `clanak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanak`
--
ALTER TABLE `clanak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
