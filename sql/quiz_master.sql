-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 02:58 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `value` int(11) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `name`, `value`, `comments`) VALUES
(1, 'NO_OF_TOPICS_PER_ROW', 3, 'This is the number of topics, per row, on home page'),
(2, 'NO_OF_QUESTIONS_TO_SHOW', 10, 'The number of Question per quiz');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `topic` varchar(75) NOT NULL,
  `question` varchar(100) NOT NULL,
  `choice_1` varchar(75) NOT NULL,
  `choice_2` varchar(75) NOT NULL,
  `choice_3` varchar(75) NOT NULL,
  `choice_4` varchar(75) NOT NULL,
  `answer` varchar(75) NOT NULL,
  `image_name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `topic`, `question`, `choice_1`, `choice_2`, `choice_3`, `choice_4`, `answer`, `image_name`) VALUES
(1, 'Dances', 'Which of the following pairs are correctly matched', 'Kuchipudi ? Madhya Pradesh', 'Kathakali ? Kerala', 'Bharatnatyam ? Andhra Pradesh', 'Kathak ? Tamil Nadu', 'Kathakali ? Kerala', 'Images/Dances/kathakali.jpeg'),
(2, 'Dances', 'Which among the following is not like others?', 'Kathakali', 'Odissi', 'Bhangra', 'Bharatanatyam', 'Bhangra', 'Images/dances/bhangra.jpeg'),
(3, 'Dances', 'Which among the following is a folk dance of India', 'Manipuri', 'Bihu', 'Kathakali', 'Bharatanatyam', 'Bihu', 'Images/dances/bihu.jpeg'),
(4, 'Dances', 'Which of the following originates in Assam?', 'Bharatnatyam', 'Kuchipudi', 'Sattriya', 'Kathak', 'Sattriya', 'Images/dances/sattriya.jpeg'),
(5, 'Dances', 'Which of the following is the oldest classical dan', 'Kathak', 'Bharatanatyam', 'Kathakali', 'Manipuri', 'Bharatanatyam', 'Images/dances/bharatanatyam.jpeg'),
(6, 'Dances', 'Bihu is the dance form of which state?', 'Odisha', 'Assam', 'West Bengal', 'Bihar', 'Assam', 'Images/dances/bihu.jpeg'),
(7, 'Dances', 'Rauf and Hikat are the famous dances of', 'Himachal Pradesh', 'Jammu and Kashmir', 'Arunachal Pradesh', 'Punjab', 'Jammu and Kashmir', 'Images/dances/dandiya.jpeg'),
(8, 'Dances', 'How many verses are in the Natya Shastra?', '6000', '700', '90000', '40', '6000', 'Images/dances/kuchipudi.jpeg'),
(9, 'Dances', 'What does RASA mean?', 'Dance', 'Passion', 'Flavor', 'Expression', 'Flavor', 'Images/dances/odissi.jpeg'),
(10, 'Dances', 'Which of the following is not one of the 3 aspects', 'Nritta', 'Namyam', 'Natyam', 'Nritya', 'Namyam', 'Images/dances/kathak.jpeg'),
(11, 'Dances', 'What dance is represented by the picture above?', 'Sattriya', 'Manipuri', 'Bihu', 'Bhangra', 'Sattriya', 'Images/dances/sattriya.jpeg'),
(12, 'Dances', 'What dance is represented by the picture above?', 'Sattriya', 'Manipuri', 'Bihu', 'Bhangra', 'Manipuri', 'Images/dances/manipuri.jpeg'),
(13, 'Dances', 'What dance is represented by the picture above?', 'Sattriya', 'Manipuri', 'Bihu', 'Bhangra', 'Bihu', 'Images/dances/bihu.jpeg'),
(14, 'Dances', 'What dance is represented by the picture above?', 'Bharatanatyam', 'Mohiniyattam', 'Kathak', 'Bhangra', 'Bharatanatyam', 'Images/dances/bharatanatyam.jpeg'),
(15, 'Dances', 'What dance is represented by the picture above?', 'Bharatanatyam', 'Mohiniyattam', 'Kathak', 'Bhangra', 'Mohiniyattam', 'Images/dances/mohiniyattam.jpeg'),
(16, 'Dances', 'What dance is represented by the picture above?', 'Bharatanatyam', 'Mohiniyattam', 'Kathak', 'Bhangra', 'Kathak', 'Images/dances/kathak.jpeg'),
(17, 'Dances', 'What dance is represented by the picture above?', 'Bharatanatyam', 'Mohiniyattam', 'Kathak', 'Bhangra', 'Bhangra', 'Images/dances/bhangra.jpeg'),
(18, 'Dances', 'What dance is represented by the picture above?', 'Kathakali', 'Odissi', 'Bhangra', 'Dandiya', 'Kathakali', 'Images/dances/kuchipudi.jpeg'),
(19, 'Dances', 'What dance is represented by the picture above?', 'Kathakali', 'Odissi', 'Bhangra', 'Dandiya', 'Odissi', 'Images/dances/odissi.jpeg'),
(20, 'Dances', 'What dance is represented by the picture above?', 'Kathakali', 'Odissi', 'Bhangra', 'Dandiya', 'Dandiya', 'Images/dances/dandiya.jpeg'),
(21, 'dresses', 'What dress is this?', 'Saree', 'Lehenga Choli', 'Kurta Pajama', 'Salwar Kameez', 'Lehenga Choli', 'Images/dresses/lehenga_choli.jpg'),
(22, 'dresses', 'What dress is this?', 'Kurta Pajama', 'Suit', 'Saree', 'Phiran', 'Saree', 'Images/dresses/saree.jpg'),
(23, 'dresses', 'Which Indian state is this outfit from?', 'Goa', 'Bihar', 'Jharkhand', 'Meghalaya', 'Meghalaya', 'Images/dresses/meghalaya.jpg'),
(24, 'dresses', 'What dress is this?', 'Suit', 'Saree', 'Dhoti', 'Kurta Pajama', 'Dhoti', 'Images/dresses/suit.jpg'),
(25, 'dresses', 'What dress is this?', 'Jeans', 'Kurta Pajama', 'Dhoti', 'Saree', 'Kurta Pajama', 'Images/dresses/kurta_pajama.jpg'),
(26, 'dresses', 'What dress is this?', 'Saree', 'Ghagra', 'Churidar Suit', 'Dhoti Kurta', 'Churidar Suit', 'Images/dresses/churidar_suit.jpg'),
(27, 'dresses', 'A common outfit worn by women in Rajasthan is:', 'Ghagra Choli', 'Saree', 'Kurta', 'Lugda', 'Ghagra Choli', 'Images/dresses/ghagra_choli.jpg'),
(28, 'dresses', 'A common outfit worn by men in Andhra Pradesh and ', 'Salwar Kameez', 'Dhoti Kurta', 'Alungsta', 'Lehenga Choli', 'Dhoti Kurta', 'Images/dresses/dhoti.jpg'),
(29, 'dresses', 'Another name used in Gujarat for the lehenga choli', 'Ghagra Choli', 'Lehenga Choli', 'Chaniya Choli', 'Lehenga Voni', 'Chaniya Choli', 'Images/dresses/chaniya_choli.jpg'),
(30, 'dresses', 'What color is generally worn on Holi?', 'red', 'purple', 'white', 'orange', 'white', 'Images/dresses/white.jpg'),
(31, 'dresses', 'Which Indian state is this outfit from?', 'West Bengal', 'Bangladesh', 'Gujarat', 'Uttar Pradesh', 'Gujarat', 'Images/dresses/gujarat.jpg'),
(32, 'dresses', 'Which Indian state is this outfit from?', 'Haryana', 'Punjab', 'Assam', 'Madhya Pradesh', 'Assam', 'Images/dresses/assam.jpg'),
(33, 'dresses', 'Which Indian state is this outfit from?', 'Karnataka', 'Nagaland', 'Gujarat', 'Rajasthan', 'Nagaland', 'Images/dresses/nagaland.jpg'),
(34, 'dresses', 'Which Indian state is this outfit from?', 'Goa', 'Manipur', 'Uttar Pradesh', 'Tamil Nadu', 'Manipur', 'Images/dresses/manipur.jpg'),
(35, 'dresses', 'Which Indian state is this outfit from?', 'Bihar', 'Mizoram', 'Andhra Pradesh', 'Madhya Pradesh', 'Mizoram', 'Images/dresses/mizoram.jpg'),
(36, 'dresses', 'Which Indian state is this outfit from?', 'Meghalaya', 'Maharashtra', 'Tripura', 'Kerala', 'Maharashtra', 'Images/dresses/maharashtra.jpg'),
(37, 'dresses', 'A common outfit worn by women in Punjab is:', 'Dhoti', 'Phulkari Dupatta', 'Suit', 'Patiala Salwar', 'Patiala Salwar', 'Images/dresses/patiala_salwar.jpg'),
(38, 'dresses', 'A common type of headgear worn by men in Punjab is', 'Baseball Cap', 'Headband', 'Winter Hat', 'Dastar', 'Dastar', 'Images/dresses/dastar.jpg'),
(39, 'dresses', 'During which time period did saree become the trad', 'The Vedic Age', 'The Epic Age', 'The Gupta Era', 'The Chola Empire', 'The Vedic Age', 'Images/dresses/vedic.jpg'),
(40, 'dresses', 'What color does the bride generally wear in an Ind', 'Red', 'Orange', 'White', 'Yellow', 'Red', 'Images/dresses/red.jpg'),
(41, 'Embroidery', 'What is this art form on fabric called?', 'Painting', 'Embroidery', 'Block Print', 'Screen printing', 'Embroidery', 'images/Embroidery/Embroidery.jpg'),
(42, 'Embroidery', 'This method of embroidery used in India is called ', 'Metal', 'Wool', 'Silk', 'Cotton', 'Metal', 'images/Embroidery/Zardozi.jpeg'),
(43, 'Embroidery', 'This mirror work is traditional to which State in ', 'Gujarat', 'Mizoram', 'Kerala', 'Tamil Nadu', 'Gujarat', 'images/Embroidery/Mirrorwork.jpg'),
(44, 'Embroidery', 'Kasuti embroidery is from which State?', 'Kerala', 'Manipur', 'Karnataka', 'Uttar Pradesh', 'Karnataka', 'images/Embroidery/Kasuti.jpg'),
(45, 'Embroidery', 'It takes upto 3 months to embroider these type of ', 'Cross stitch', 'Block printing', 'Crewel', 'Kantha', 'Kantha', 'images/Embroidery/Kantha.jpg'),
(46, 'Embroidery', 'Dabka is an Embroidery stitch popular in the state', 'Bihar', 'Haryana', 'Punjab', 'Rajasthan', 'Rajasthan', 'images/Embroidery/Dabka.jpg'),
(47, 'Embroidery', 'White color thread is traditionally used in this L', 'Cross-stitch', 'Crewel', 'Chikan', 'Sequin', 'Chikan', 'images/Embroidery/Chikan.jpg'),
(48, 'Embroidery', 'This embroidery is traditionally done in Kashmir', 'Crewel', 'Kashida', 'Yarn', 'Phulkari', 'Kashida', 'images/Embroidery/Kashida.jpg'),
(49, 'Embroidery', 'Chamba Rumal from Himachal Pradesh always embroide', 'Handkerchief', 'Shawl', 'Silk', 'Saari', 'Handkerchief', 'images/Embroidery/Chamba.jpg'),
(50, 'Embroidery', 'Phulkari is traditional to which Indian state?', 'Uttar Pradesh', 'Rajasthan', 'Punjab', 'Telangana', 'Punjab', 'images/Embroidery/Phulkari.jpg'),
(51, 'Festivals', 'Which Indian festival is called the Festival of Li', 'Holi', 'Diwali', 'Karva Chauth', 'Janmashtami', 'Diwali', 'images/Festivals/diwali.jpg'),
(52, 'Festivals', 'What is Janmashtami all about?', 'Celebrating the birthday of Krishna', 'The Festival of Color', 'Celebrating Siblings', 'To celebrate the victory of Goddess Durga over the', 'Celebrating the birthday of Krishna', 'images/Festivals/janmashtami.jpg'),
(53, 'Festivals', 'When is Durga Puja celebrated?', 'May-June', 'July-August', 'September-October', 'November-December', 'September-October', 'images/Festivals/durgapuja.jpg'),
(54, 'Festivals', 'What are typical celebrations during Holi?', 'Lighting Candles', 'Tying string around your siblings wrist', 'Throwing colorful powder', 'Fasting for 9 days', 'Throwing colorful powder', 'images/Festivals/holi.jpg'),
(55, 'Festivals', 'Whis festival ritually celebrates the love and dut', 'Karva Chauth', 'Navarathi', 'Ganesh Chaturthi', 'Raksha Bandhan', 'Raksha Bandhan', 'images/Festivals/rakhi.jpg'),
(56, 'Festivals', 'Why is Diwali celebrated?', 'To celebrate siblings', 'The return of Lord Rama', 'To celebrate color', 'To celebrate the return of Hanuman', 'The return of Lord Rama', 'images/Festivals/diwali2.jpg'),
(57, 'Festivals', 'How long were Rama and his wife Sita exiled for?', '2 years', '3 months', '14 years', '13 years', '14 years', 'images/Festivals/rama&sitaexile.jpg'),
(58, 'Festivals', 'What is celebrated in the festival Dussehra/ Vijay', 'The death of Ravana by Lord Rama', 'The coming of Spring', 'The birthday of Lord Krishna', 'The celebration of Brother and Sister', 'The death of Ravana by Lord Rama', 'images/Festivals/dussehra.jpg'),
(59, 'Festivals', 'What is celebrated in the festival Gurpurab?', 'The celebration of the anniversaries of the ten Si', 'The birthday of Lord Ganesha', 'The birthday of Lord Krishna', 'The death of Ravana by Lord Rama', 'The celebration of the anniversaries of the ten Si', 'images/Festivals/gurpurab.jpg'),
(60, 'Festivals', 'Where is Ganesh Chaturthi Celebrated?', 'Uttar Pradesh and Maharashtra', 'Maharashtra and Andhra Pradesh', 'Vrindavan and Mathura', 'Kolkata and Andhra Pradesh', 'Maharashtra and Andhra Pradesh', 'images/Festivals/ganeshchaturthi.jpg'),
(61, 'Festivals', 'What does Navratri symbolize?', 'The triumph of good over evil', 'The bond between brother and sister', 'The victory of light over darkness', 'The arrival of spring', 'The triumph of good over evil', 'images/Festivals/navratri.jpg'),
(62, 'Festivals', 'Which festival marks the end of Ramadan?', 'Eid-Ul-Fitr', 'Eid Al-Adha', 'Laylat al-Mi\'raj', 'Chaand Raat', 'Eid-Ul-Fitr', 'images/Festivals/Eid.jpg'),
(63, 'Festivals', 'Where do the main festivities of Janmashtami take ', 'Maharashtra and Andhra Pradesh', 'Uttar Pradesh and Maharashtra', 'Kolkata and Vrindavan', 'Vrindavan and Mathura', 'Vrindavan and Mathura', 'images/Festivals/janmashtami2.jpg'),
(64, 'Festivals', 'What does Onam celebrate?', 'The birthday of Lord Ganesh', 'A harvest festival in Kerala', 'The triumph of good over evil', 'The triumph of light over darkness', 'A harvest festival in Kerala', 'images/Festivals/onam.jpg'),
(65, 'Festivals', 'What is the Tamil harvest festival called?', 'Onam', 'Pongal', 'Basant Panchami', 'Lohri', 'Pongal', 'images/Festivals/pongal.jpg'),
(66, 'Festivals', 'Which festival is to celebrate the Birth of Goddes', 'Lohri', 'Basant Panchami', 'Gurupurab', 'Maha Shivrathi', 'Basant Panchami', 'images/Festivals/basantpanchami.jpg'),
(67, 'Festivals', 'Where are the best places to celebrate Rakhi?', 'Uttarakhand, Orissa, Maharashtra', 'Varanasi, Goa, Jodhpur', 'Udaipur, Uttarkhand, Agra', 'Kochi, Varanasi, Alappuzzha', 'Uttarakhand, Orissa, Maharashtra', 'images/Festivals/rakhi2.jpg'),
(68, 'Festivals', 'Which celebration is a Punjabi Folk Festival?', 'Lodhi', 'Lohri', 'Gurupurab', 'Onam', 'Lohri', 'images/Festivals/lohri.jpg'),
(69, 'Festivals', 'Where is Maha Shivaratri celebrated?', 'Varanasi, Guwahati, Haridwar, Bengaluru, Munnar', 'Varanasi, Guwahati, Haridwar, Rishikesh, Srisailam', 'Kochi, Rishikesh, Munnar, Chennai, Kolkata', 'Manali, Jaisalmer, Udaipur, Guwahati, Rishikesh', 'Varanasi, Guwahati, Haridwar, Rishikesh, Srisailam', 'images/Festivals/mahashivaratri.jpg'),
(70, 'Festivals', 'Which is the harvest festival of Assam?', 'Bihu', 'Lohri', 'Gurupurab', 'Onam', 'Bihu', 'images/Festivals/bihu.jpg'),
(71, 'foods', 'What is the most popular Indian food?', 'Butter Chicken', 'Dosa', 'Palak Paneer', 'Samosa', 'Butter Chicken', 'images/Foods/samosaa.jpg'),
(72, 'foods', 'Appam stew is from which Indian state?', 'Goa', 'Rajasthan', 'Maharashtra', 'Kerala', 'Goa', 'images/Foods/appamstew.jpg'),
(73, 'foods', 'Which of these is not a type of chaat?', 'Puri Bhaji', 'Sev Batata Puri', 'Pani Puri', 'Bhel Puri', 'Puri Bhaji', 'images/Foods/panipuri.jpg'),
(74, 'foods', 'What Indian sweet is a bright yellow spiral', 'Gulab Jamun', 'Ras Malai', 'Jalebi', 'Besan Barfi', 'Gulab Jamun', 'images/Foods/jalebi.jpeg'),
(75, 'foods', 'What spice is not commonly used in Indian dishes?', 'Turmeric', 'Coriander', 'Cumin', 'Sage', 'Turmeric', 'images/Foods/spice.jpeg'),
(76, 'foods', 'Which of these is usually served cold?', 'Yogurt rice', 'Samosa', 'Halwa', 'Pakora', 'Yogurt rice', 'images/Foods/ice.jpeg'),
(77, 'foods', 'Which of these is not made of yogurt?', 'Laasi', 'Kadhi', 'Rasam', 'Rasam', 'Laasi', 'images/Foods/lassi.jpeg'),
(78, 'foods', 'Aam is which fruit in English?', 'Apple', 'Mango', 'Grape', 'Peach', 'Apple', 'images/Foods/fruits.jpeg'),
(79, 'foods', 'Aaloo is which vegetable in English?', 'Carrot', 'Lettuce', 'Potato', 'Broccoli', 'Carrot', 'images/Foods/veggies.jpeg'),
(80, 'foods', 'Which of these foods is not made from wheat?', 'Chapati', 'Roti', 'Naan', 'Dosa', 'Chapati', 'images/Foods/samosaa.jpg'),
(81, 'foods', 'In which city did Indo-Chinese cuisine originate?', 'Mumbai', 'Chennai', 'Bengaluru', 'Kolkatta', 'Mumbai', 'images/Foods/indo.jpeg'),
(82, 'foods', 'What is a famous snack from Gujarat?', 'Aloo Paratha', 'Dosa', 'Dhokla', 'Dumplings', 'Aloo Paratha', 'images/Foods/gujurat.jpg'),
(83, 'foods', 'Which of these dishes is not from Mumbai', 'Vada Pav', 'Pav Bhaji', 'Bhel Puri', 'Kachori', 'Vada Pav', 'images/Foods/mumbai.jpg'),
(84, 'foods', 'Which of these is not a South Indian dish?', 'Sambar', 'Paratha', 'Idli', 'Avial', 'Sambar', 'images/Foods/south_india.jpg'),
(85, 'foods', 'Which is not a bean/lentil dish?', 'Chole', 'Rajma', 'Aloo Matar', 'Tadka Daal', 'Chole', 'images/Foods/bean.jpg'),
(86, 'foods', 'What is the Hindi word for Spinach?', 'Palak', 'Matar', 'Aloo', 'Tamatar', 'Palak', 'images/Foods/spinach.jpg'),
(87, 'foods', 'What is not an authentic Indian dessert?', 'Carrot Halwa', 'Gulab Jamun', 'Baklava', 'Ras Malai', 'Carrot Halwa', 'images/Foods/sweets.jpeg'),
(88, 'foods', 'What spice is commonly used in Indian desserts?', 'Clove', 'Cinnamon', 'Mustard', 'Cardamom', 'Clove', 'images/Foods/spice.jpeg'),
(89, 'foods', 'What type of food is this?', 'Chai', 'Dosa', 'Alu Gobi', 'Chapati and Curry', 'Chai', 'images/Foods/dosa.jpeg'),
(90, 'foods', 'What type of food is this?', 'Pani Puri', 'Pav Bhaji', 'Dhokla', 'Aloo Matar', 'Pani Puri', 'images/Foods/panipuri.jpg'),
(91, 'instruments', 'What is this instrument?', 'Sitar', 'Tabla', 'Veena', 'Santoor', 'Sitar', 'images/instruments/Question_1_Instruments.jpeg'),
(92, 'instruments', 'What is the most played instrument in India?', 'Sarangi', 'Flute', 'Sitar', 'Tabla', 'Sarangi', 'images/instruments/Question_2_Instruments.jpeg'),
(93, 'instruments', 'What instrument is Ustad Zakir Hussian known for p', 'Dolak', 'Damaru', 'Santoor', 'Tabla', 'Dolak', 'images/instruments/Question_3_Instruments.jpeg'),
(94, 'instruments', 'The indian instrument, the shehnai, has how many o', '2', '3', '4', '5', '2', 'images/instruments/Question_4_Instruments.jpeg'),
(95, 'instruments', 'Hindustani classical music is broken into groups o', 'Note Group', 'Taal', 'Taalam', 'Raaga', 'Note Group', 'images/instruments/Question_5_Instruments.jpeg'),
(96, 'instruments', 'What instrument is this?', 'Shehnai', 'Veena', 'Sarood', 'Sitar', 'Shehnai', 'images/instruments/Question_6_Instruments.jpeg'),
(97, 'instruments', 'How many beats are in Teen Tal? (Tabla)', '16', '12', '8', '4', '16', 'images/instruments/Question_7_Instruments.jpeg'),
(98, 'instruments', 'It is said that Tabla was invented accidentally du', 'Mridangam', 'Dolak', 'Bongos', 'Classic Western Drums', 'Mridangam', 'images/instruments/Question_8_Instruments.jpeg'),
(99, 'instruments', 'By popular belief, Tabla was invented in which pro', 'Bengal', 'Orrisa', 'Punjab', 'Delhi', 'Bengal', 'images/instruments/Question_9_Instruments.jpeg'),
(100, 'instruments', 'How many individual sounds does a tabla make?', '6', '8', '10', '12', '6', 'images/instruments/Question_10_Instruments.jpeg'),
(101, 'instruments', 'Which of the following is a wind instrument?', 'Sitar', 'Shehnai', 'Pakhawaj', 'Mridangam', 'Sitar', 'images/instruments/Question_11_Instruments.jpeg'),
(102, 'instruments', 'Which instrument has the most strings?', 'Guitar', 'Ukelele', 'Violin', 'Sitar', 'Guitar', 'images/instruments/Question_12_Instruments.jpeg'),
(103, 'instruments', 'Arvind Parikh is associated with which musical ins', 'Pakhawaj', 'Sitar', 'Tabla', 'Flute', 'Pakhawaj', 'images/instruments/Question_13_Instruments.jpeg'),
(104, 'instruments', 'Which instrument has 7 strings?', 'Veena', 'Ukelele', 'Guitar', 'Violin', 'Veena', 'images/instruments/Question_14_Instruments.jpeg'),
(105, 'instruments', 'How many octave keys does a harmonium have?', '1', '2', '3', '4', '1', 'images/instruments/Question_15_Instruments.jpeg'),
(106, 'instruments', 'What is an indian instrument similar to a piano?', 'Tabla', 'Tanpura', 'Harmonium', 'Flute', 'Tabla', 'images/instruments/Question_16_Instruments.jpeg'),
(107, 'instruments', 'What is the purpose of a mridangam in a musical pr', 'To keep the other musicians on beat', 'To overpower the other instruments', 'To be the main leading instrument', 'None of the above', 'To keep the other musicians on beat', 'images/instruments/Question_17_Instruments.jpeg'),
(108, 'instruments', 'What is a sarangi usally accompaning?', 'Sitar', 'Flute', 'Tabla', 'Vocals', 'Sitar', 'images/instruments/Question_18_Instruments.jpeg'),
(109, 'instruments', 'How many metal strings does a tanpura have?', '2-3', '4-5', '6-7', 'Only 1', '2-3', 'images/instruments/Question_19_Instruments.jpeg'),
(110, 'instruments', 'How many raagas are there in Indian classical musi', '19', '52', '83', '106', '19', 'images/instruments/Question_20_Instruments.jpeg'),
(111, 'leaders', 'Who is this person?', 'Jawaharlal Nehru', 'Sardar Patel', 'Mahatma Gandhi', 'Lal Bahadur Shastri', 'Jawaharlal Nehru', 'images/scientists/Nehru.jpg'),
(112, 'leaders', 'Who was the most recent Indian to win a Nobel Priz', 'Amartya Sen', 'Mother Teresa', 'Kailash Satyarti', 'C.V. Raman', 'Amartya Sen', 'images/scientists/question.jpg'),
(113, 'leaders', 'Who was is father of the Indian Space Program?', 'A.P.J. Abdul Kalam', 'Vikram Sarabai', 'Satish Dawan', 'K.Sivan', 'A.P.J. Abdul Kalam', 'images/scientists/question.jpg'),
(114, 'leaders', 'Which Indian is cretided for first using the numbe', 'BrahmaGupta', 'Aryabhata', 'K. Ramasubramaniam', 'Ramanujam', 'BrahmaGupta', 'images/scientists/question.jpg'),
(115, 'leaders', 'Who is considered one of the earliest surgeons fro', 'Charaka', 'Vagbhata', 'Jivaka', 'Jivaka', 'Charaka', 'images/scientists/question.jpg'),
(116, 'leaders', 'In which country did Mohandas Karamchand Gandhi ge', 'India', 'England', 'South Africa', 'Pakistan', 'India', 'images/scientists/gandhi.jpg'),
(117, 'leaders', 'Who was the first President of India?', 'Rajendra Prasad', 'C. Rajagopalachari', 'B.R. Ambedkar', 'Sarvepalli Radhakrishnan', 'Rajendra Prasad', 'images/scientists/question.jpg'),
(118, 'leaders', 'Who was the first female prime minister of India?', 'Pratibha Patil', 'Indira Gandhi', 'Vijaya Lakshmi Pandit', 'Sarojini Naidu', 'Pratibha Patil', 'images/scientists/question.jpg'),
(119, 'leaders', 'The White Revolution made India the largest produc', 'Verghese Kurien', 'H.M. Dalaya', 'M.S. Swaminathan', 'Narayana Murthy', 'Verghese Kurien', 'images/scientists/question.jpg'),
(120, 'leaders', 'Who is the Father of the Green Revolution in India', 'M.S. Swaminathan', 'Gurudev Singh Khush', 'William Gaud', 'Norman Barlaug', 'M.S. Swaminathan', 'images/scientists/question.jpg'),
(121, 'leaders', 'Who is the Prime Minister of India?', 'Rahul Gandhi', 'Narendra Modi', 'Mayawathi', 'Sharad Pawar', 'Rahul Gandhi', 'images/scientists/question.jpg'),
(122, 'leaders', 'Who was the first woman physician in India?', 'Kadambini Ganguly', 'Pandita Ramabai', 'Savitribai Phule', 'Anandibai Joshi', 'Anandibai Joshi', 'images/scientists/question.jpg'),
(123, 'leaders', 'Who is this freedom fighter?', 'Kasthurba Gandhi', 'Kamala Nehru', 'Rani Lakshmi Bai', 'Sarojini Naidu', 'Rani Lakshmi Bai', 'images/scientists/JhansiKiRani.jpg'),
(124, 'leaders', 'What is the Chandrashekar Number for which Dr. Sub', 'Can be used to construct radio receivers', 'Determines the fate of a dying star', 'Used in calculations performed by computers', 'Used to measure magnetic properties of elements', 'Determines the fate of a dying star', 'images/scientists/question.jpg'),
(125, 'leaders', 'Which is these statements is true?', 'Diamond mining was practiced in India for at least', 'India was the only country with diamond deposits t', 'Golconda was an important diamond trading center i', 'All the statements are true', 'All the statements are true', 'images/scientists/diamonds.jpg'),
(126, 'leaders', 'Dr. Jagadish Chandra Bose invented what form of co', 'Radio transmission', 'Television', 'Microwave transmission', 'Telephone', 'Microwave transmission', 'images/scientists/Bose.jpg'),
(127, 'leaders', 'What weapon was first developed by Tipu Sultan?', 'Armor piercing bullets', 'Iron rockets', 'Grenades', 'Metal spears', 'Iron rockets', 'images/scientists/TipuSultan.jpg'),
(128, 'leaders', 'Which of the following were invented in India?', 'Chess', 'Shampoo', 'Plough', 'All of the above', 'All of the above', 'images/scientists/question.jpg'),
(129, 'leaders', 'Who invented Oil-Eating-Bacteria in 1971?', 'Ananda Mohan Chakrabarty', 'M.V.R.K. Murty', 'Shanti Swarup Bhatnagar', 'Satyendra Nath Bose', 'Ananda Mohan Chakrabarty', 'images/scientists/question.jpg'),
(130, 'leaders', 'Which Noble Gas was discovered in India?', 'Radon', 'Helium', 'Xenon', 'Argon', 'Helium', 'images/scientists/question.jpg'),
(131, 'Monuments', 'What is a white monument that is located on the so', 'Taj Mahal', 'Ajanta caves', 'Gol Gumbaz', 'Qutab Shahi tombs', 'Taj Mahal', 'images/monuments/tajmahal.jpg'),
(132, 'Monuments', 'This palace is one the principal tourist attractio', 'Buria Fort', 'Jind Fort', 'Amber Fort', 'Bahu Fort', 'Amber Fort', 'images/monuments/Amerfort.jpg'),
(133, 'Monuments', 'What is the holiest Sikh Gurudwara and is located ', 'Omkareshwar', 'The Golden Temple', 'Laxminarayan temple', 'Yamunotri temple', 'The Golden Temple', 'images/monuments/goldentemple.jpg'),
(134, 'Monuments', 'Based in Delhi, it is one of the largest temple co', 'Brahmeswara temple', 'Yogmaya temple', 'Akshardham Swaminarayan temple', 'Ganesha temple', 'Akshardham Swaminarayan temple', 'images/monuments/akshardham.jpg'),
(135, 'Monuments', 'One of the largest forts in India is located in Jo', 'Kotla Fort', 'Mehrangarh Fort', 'Mora Fort', 'Mundru Fort', 'Mehrangarh Fort', 'images/monuments/mehrangarhfort.jpg'),
(136, 'Monuments', 'This is the second tallest free standing stone str', 'Chand Minar', 'Qutab Minar', 'Jhulta Minar', 'Ek minar Raichur', 'Qutab Minar', 'images/monuments/qutubminar.jpg'),
(137, 'Monuments', 'It is one the forts of Shivaji in Western India, A', 'Tiracol Fort', 'Red Fort', 'Ponda Fort', 'Toaham Fort', 'Ponda Fort', 'images/monuments/ponda.jpg'),
(138, 'Monuments', 'This temple is the most visited tourist attraction', 'Brihadeeshwara Temple', 'Chaturdasha Temple', 'Samaleswari Temple', 'Hindu Temple', 'Brihadeeshwara Temple', 'images/monuments/brihadeeshwara.jpg'),
(139, 'Monuments', 'This is a war memorial, also known as All India Wa', 'Bhadkal Gate', 'Great Gate', 'India Gate', 'Lahori Gate', 'India Gate', 'images/monuments/indiagate.jpg'),
(140, 'Monuments', 'This is listed as one of the 7 wonders of India an', 'Kailasanathar Temple', 'Konark Sun Temple', 'Sri Ranganathaswamy Temple', 'Brahmeswara Temple', 'Konark Sun Temple', 'images/monuments/konark.jpg'),
(141, 'Monuments', 'This monument is referred to as the Taj Mahal of M', 'Gateway of India', 'Great Gate', 'Lahori Gate', 'Bhadkal Gate', 'Gateway of India', 'images/monuments/gateway.jpg'),
(142, 'Monuments', 'This is a global icon for Hyderabad and is one of ', 'Charminar', 'Taj Mahal', 'Amber Palace', 'Red Fort', 'Charminar', 'images/monuments/charminar.jpg'),
(143, 'Monuments', 'This fort is located in Delhi and is named for its', 'Red Fort', 'Agra Fort', 'Ponda Fort', 'Tiracol Fort', 'Red Fort', 'images/monuments/redfort.jpg'),
(144, 'Monuments', 'What is located on the island of Jag Niwas in Lake', 'Lake Palace', 'Amber Palace', 'Bangalore Palace', 'Marble Palace', 'Lake Palace', 'images/monuments/lakepalace.jpg'),
(145, 'Monuments', 'This is one of the most popular tourist attraction', 'Mysore Palace', 'Taj Lake Palace', 'King Kothi Palace', 'Lalgarh Palace', 'Mysore Palace', 'images/monuments/mysorepalace.jpg'),
(146, 'Monuments', 'This was the first garden-tomb on the Indian subco', 'Bibi Ka Maqbara', 'Ajanta caves', 'Taj Mahal', 'Humayun?s Tomb', 'Humayun?s Tomb', 'images/monuments/humayuntomb.jpg'),
(147, 'Monuments', 'This is one of the 4 holy sites related to the lif', 'Mahabodhi Temple', 'Brahmeswara Temple', 'Hindu Temple', 'Yogaya Temple', 'Mahabodhi Temple', 'images/monuments/mahabodhi.jpg'),
(148, 'Monuments', 'This is a significant symbol for the Tamil people ', 'The Golden Temple', 'Ganesha Temple', 'Meenakshi Amman Temple', 'Laxminarayan Temple', 'Meenakshi Amman Temple', 'images/monuments/meenakshi.jpg'),
(149, 'Monuments', 'What is the richest temple in India and is one of ', 'Konark Sun Temple', 'Samaleswari Temple', 'Chaturdasha Temple', 'Tirumala Venkateswara Temple', 'Tirumala Venkateswara Temple', 'images/monuments/Tirumala.jpg'),
(150, 'Monuments', 'It is also called the Palace of Winds and is one o', 'Hawa Mahal', 'Taj Mahal', 'Agra Fort', 'Chand Minar', 'Hawa Mahal', 'images/monuments/hawamahal.jpg'),
(151, 'movies', 'What movie, based on a true story, called?', 'Agent Vinod', 'Raazi', 'Madras Cafe', 'Skyfall', 'Raazi', 'images/movies/raazi.jpg'),
(152, 'movies', 'What language was Baahubali originally made in?', 'Hindi', 'Tamil', 'Telegu', 'Gujarati', 'Telegu', 'images/movies/baahubali.jpg'),
(153, 'movies', 'Who is the actress in this movie, Padmavat?', 'Priyanka Chopra', 'Deepika Kakkar', 'Anushka Sharma', 'Deepika Padukone', 'Deepika Padukone', 'images/movies/padmaavat.jpg'),
(154, 'movies', 'Who is this famous actress that recently passed aw', 'Helen', 'Lata Mangeshkar', 'Sridevi', 'Jhanvi Kapoor', 'Sridevi', 'images/movies/sridevi.jpg'),
(155, 'movies', 'What movie is this scene from?', 'Raees', 'Main Hoon Na', 'Baazigar', 'Deewana', 'Main Hoon Na', 'images/movies/mainhoona.jpg'),
(156, 'movies', 'Who is this singer?', 'Asha Bhosle', 'Shreya Goshal', 'Lata Mangeshkar', 'Sonu Nigam', 'Lata Mangeshkar', 'images/movies/latamang.jpg'),
(157, 'movies', 'What movie is this scene from?', 'Om Shanti Om', 'Shanti', 'Yes Boss', 'Tilak', 'Om Shanti Om', 'images/movies/omshantiom.cms'),
(158, 'movies', 'Who is the actress in this recent movie?', 'Kareena Kapoor', 'Sara Ali Khan', 'Khushi Kapoor', 'Sejal Ali Khan', 'Sara Ali Khan', 'images/movies/simmba.jpg'),
(159, 'movies', 'What is this movie that is based off of the hollyw', 'Thugs of Bharat', 'Pirates of India', 'Thugs of Hindostan', 'Sea Fighters', 'Thugs of Hindostan', 'images/movies/thugs.jpg'),
(160, 'movies', 'Which movie of the Race sequels is this?', 'Race', ' Race 2', 'Race 3', 'Race 4', 'Race 3', 'images/movies/race.jpg'),
(161, 'movies', 'Who is this Bollywood producer and director', 'Rohit Shetty', 'Rohit Patel', 'Rohan shetty', 'Rohan Patel', 'Rohit Shetty', 'images/movies/rohit.jpg'),
(162, 'movies', 'What is this movie?', 'Bhagban', 'Dhadak', 'Dil', 'Dilwale', 'Dilwale', 'images/movies/dilwale.jpg'),
(163, 'movies', 'What movie, Based off of the Hollywood movie When ', 'When Harry met Sejal', 'Jab Harry met Sejal', 'Jab Harrinder met Sejal', 'When Harrinder met sally', 'Jab Harry met Sejal', 'images/movies/harrysejal.jpg'),
(164, 'movies', 'Who are the actors in these movies?', 'Alia Bhatt and SRK', 'Shraddha Kapoor and Varun Dhawan', 'Anushka Sharma and Salman Khan', 'Alia Bhatt and Varun Dhawan', 'Alia Bhatt and Varun Dhawan', 'images/movies/bandh.jpg'),
(165, 'movies', 'What was the name of the alien in Koi Mil Gaya?', 'Jadoo', 'Roy', 'E.T.', 'Baloo', 'Jadoo', 'images/movies/koimilgaya.jpg'),
(166, 'movies', 'What was Hrithik Roshan\'s first movie?', 'Khabhi Khushi Khabhi Gham', 'Kaho Naa Pyaar Hai', 'Krrish', 'Dhoom', 'Kaho Naa Pyaar Hai', 'images/movies/kaho.jpg'),
(167, 'movies', 'Who is this actress?', 'Anushka Sharma', 'Phulkari Dupatta', 'Aishwariya Rai Bachchan', 'Malika arora', 'Aishwariya Rai Bachchan', 'images/movies/aish.jpg'),
(168, 'movies', 'What is Tabu\'s real name?', 'Tabassum Fatima Hashmi', 'Taslim Khan', 'Tabakul', 'Tabiman Merchant', 'Tabassum Fatima Hashmi', 'images/movies/tabu.jpg'),
(169, 'movies', 'Who was the actor in Detective Byomkesh Bakshy?', 'Salman Khan', 'Sushant Singh Rajput', 'Neeraj Gopal', 'Aanand Singh', 'Sushant Singh Rajput', 'images/movies/bb.jpg'),
(170, 'NRIs', 'Who are the lead actresses in Dil to Pagal Hai?', 'Madhuri Kapoor and Karishma Dixit', 'Mahima Rajput and Alia Sharma', 'Madhri Dixit and Karishma Kapoor', 'Karishma Sharma and Purvi', 'Madhri Dixit and Karishma Kapoor', 'images/nris/imageq1.jpg'),
(171, 'NRIs', 'What does the term NRI stand for?', 'Not a Real Indian', 'Non Residential Indian', 'Non Resident Indian', 'Never a Real Indian', 'Non Residential Indian', 'images/nris/imageq2.jpg'),
(172, 'NRIs', 'How long does a person have to live outside of Ind', '200 days', '150 days', '182 days', '250 days', '182 days', 'images/nris/imageq3.jpg'),
(173, 'NRIs', 'Which one of these four is an NRI?', 'Amitab Bachan', 'Sundar Pichai', 'Sachin Tendulkar', 'Virat Kholi', 'Sundar Pichai', 'images/nris/imageq4.jpg'),
(174, 'NRIs', 'About how much money is sent by NRI\'s to India eac', '$40 billion', '$120 billion', '$70 billion', '$10 billion', '$70 billion', 'images/nris/imageq5.jpg'),
(175, 'NRIs', 'Which of the following countries has the highest N', 'Canada', 'United States', 'Australia', 'South Africa', 'United States', 'images/nris/imageq6.jpg'),
(176, 'NRIs', 'What percent of India\'s GDP to NRI\'s make up for?', '40%%', '33%', '21%', '13%', '33%', 'images/nris/imageq7.jpg'),
(177, 'NRIs', 'Who was the first female astronaut of Indian origi', 'Rakesh Sharma', 'Kalpana Chawla', 'Sunita Williams', 'Ravish Malhotra', 'Kalpana Chawla', 'images/nris/imageq8.jpg'),
(178, 'NRIs', 'Which NRI was named under the 400 richest people i', 'Vinod Khosla', 'Amartya Sen', 'Rohinton Mistry', 'Pan Nalin', 'Vinod Khosla', 'images/nris/imageq9.jpg'),
(179, 'NRIs', 'Who was the first NRI to win a Nobel Prize in Chem', 'Pan Nalin', 'Amartya Sen', 'Venkatraman Ramakrishnan', 'Mira Nair', 'Venkatraman Ramakrishnan', 'images/nris/imageq10.jpg'),
(180, 'NRIs', 'Which NRI is the CEO of Google?', 'Mukesh Ambani', 'Sundar Pichai', 'Natrajan Chandrashekar', 'Anil Kumar Jah', 'Sundar Pichai', 'images/nris/imageq123.jpg'),
(181, 'NRIs', 'Which of these NRIs was famous biochemist?', 'Narinder Kapany', 'Salman Rushdie', 'Ajit Jain', 'Har Gobind Khorana', 'Har Gobind Khorana', 'images/nris/imageq11.jpg'),
(182, 'NRIs', 'Which of these Tabla players is an NRI?', 'Alla Rakha', 'Nayan Gosh', 'Zakir Hussain', 'Bikram Gosh', 'Zakir Hussain', 'images/nris/imageq12.jpg'),
(183, 'NRIs', 'Which NRI contributed to the field of fiber optics', 'Narinder Singh Kapany', 'Alla Rakha', 'S.Chandrasekhar', 'Pranav Mistry', 'Narinder Singh Kapany', 'images/nris/imageq13.jpg'),
(184, 'NRIs', 'Which NRI is the CEO of Microsoft?', 'Pranav Mistry', 'Satya Nadela', 'S.Chandrasekhar', 'Amar Bose', 'Satya Nadela', 'images/nris/imageq14.jpg'),
(185, 'NRIs', 'Which NRI is amoung the worlds leading conductors?', 'Amar Bose', 'Sabeer Bhatia', 'Zubin Mehta', 'Lakshmi Pratury', 'Zubin Mehta', 'images/nris/imageq15.jpg'),
(186, 'NRIs', 'Which state in the U.S. has the highest NRI popula', 'California', 'New York', 'New Jersey', 'Texas', 'California', 'images/nris/imageq16.jpg'),
(187, 'NRIs', 'Which NRI was a professional tennis player?', 'Sania Mirza', 'Mary Kom', 'P.V. Sindhu', 'Ashok Amritaj', 'Ashok Amritaj', 'images/nris/imageq17.jpg'),
(188, 'NRIs', 'Approximately how many NRIs are there around the w', '16 million', '10 million', '20 million', '40 million', '16 million', 'images/nris/imageq18.jpg'),
(189, 'NRIs', 'In which country are 68.3% of the population India', 'Guyana', 'Fiji', 'Mauritius', 'Oman', 'Mauritius', 'images/nris/imageq19.jpg'),
(190, 'NRIs', 'Which country has the largest diasporic population', 'China', 'India', 'Japan', 'Russia', 'India', 'images/nris/imageq20.jpg'),
(191, 'Sports', 'What is the most popular sport in India?', 'Cricket', 'Badminton', 'Chess', 'Football (Soccer)', 'Cricket', 'images/sports/Question1_sports.gif'),
(192, 'Sports', 'What is India?s national sport?', 'Field Hockey', 'Cricket', 'Football (soccer)', 'Badminton', 'Field Hockey', 'images/sports/Question2_sports.jpg'),
(193, 'Sports', 'How many medals did India win in the 2016 Summer O', '0 medals', '1 silver medal', '1 silver and 1 bronze medal', '2 gold medals', '1 silver and 1 bronze medal', 'images/sports/Question3_sports.jpg'),
(194, 'Sports', 'Do Indians play ice hockey?', 'No, India is a hot place!', 'No, Field Hockey is more popular.', 'Yes, but only in some cities.', 'Yes, everywhere.', 'Yes, but only in some cities.', 'images/sports/Question4_sports.jpg'),
(195, 'Sports', 'Who is the most famous cricket player in India?', 'Virat Kohli', 'Sachin Tendulkar', 'MS Dhoni', 'Rahul Dravid', 'Sachin Tendulkar', 'images/sports/Question5_sports.jpg'),
(196, 'Sports', 'How many times has India won Gold in Olympics Fiel', '3', '4', '9', '8', '9', 'images/sports/Question6_sports.jpg'),
(197, 'Sports', 'When was the last time India hosted the Cricket Wo', '2012', '2011', '2015', '2004', '2011', 'images/sports/Question7_sports.jpg'),
(198, 'Sports', 'What is Cricket most similar to?', 'Football (Soccer)', 'Baseball', 'Gilli-Danda', 'Kabaddi', 'Baseball', 'images/sports/Question8_sports.jpg'),
(199, 'Sports', 'Where was Chess invented?', 'India', 'Persia', 'UK', 'Pakistan', 'India', 'images/sports/Question9_sports.jpeg'),
(200, 'Sports', 'Who was one of the four people to break the 2800 m', 'Pentala Harikrishna', 'Humpy Koneru', 'Viswanathan Anand', 'Harika Dronavalli', 'Viswanathan Anand', 'images/sports/Question10_sports.webp'),
(201, 'Sports', 'How old was Sachin Tendulkar when he played his fi', '16', '13', '19', '29', '13', 'images/sports/Question11_sports.jpg'),
(202, 'Sports', 'What does BAOI stand for?', 'Baseball Association of India', 'Boys Activity of India', 'Badminton Association of India', 'Basketball Association of India', 'Badminton Association of India', 'images/sports/Question12_sports.jpg'),
(203, 'Sports', 'When was the first ever National Sports Policy in ', '1984', '1880', '2013', '1967', '1984', 'images/sports/Question13_sports.jpg'),
(204, 'Sports', 'Which of the following is not commonly played in I', 'Cricket', 'Nordic Skiing', 'Field Hockey', 'Football (Soccer)', 'Nordic Skiing', 'images/sports/Question14_sports.jpg'),
(205, 'Sports', 'When was the first time India participated in the ', '2004', '1990', '1976', '1892', '1990', 'images/sports/Question15_sports.jpg'),
(206, 'Sports', 'Which of these leagues is the second richest sport', 'PKL - Pro Kabaddi League', 'IPL - Indian Premier League', 'IBL - Indian Badminton League', 'IBL - Indian Badminton League', 'IPL - Indian Premier League', 'images/sports/Question16_sports.jpeg'),
(207, 'Sports', 'Who was the first woman to win gold in wrestling i', 'Vinesh Phogat', 'Saina Nehwal', 'Geeta Phogat', 'Heena Sidhu', 'Geeta Phogat', 'images/sports/Question17_sports.jpg'),
(208, 'Sports', 'How many gold medals did India win at the 2010 com', '23', '45', '24', '38', '38', 'images/sports/Question18_sports.png'),
(209, 'Sports', 'When was the first time India competed in the comm', '1934', '1946', '1988', '1892', '1934', 'images/sports/Question19_sports.jpg'),
(210, 'Sports', 'What is Kho Kho?', 'It is a type of ice cream that includes chocolate ', 'It is a game similar to tag and a traditional game', 'It is a version of laser tag but better.', 'It is twister with an Indian twist involving 12 pl', 'It is a game similar to tag and a traditional game', 'images/sports/Question20_sports.jpg'),
(212, 'Dances', 'does this work?', 'Yes', 'No', 'Maybe ', 'All of the about', 'Yes', 'Images/Dances/assam.JPG'),
(213, 'PHP', 'How would display an entire array ($a) in a human readable form?', 'echo \"$a\";', 'print_r ($a);', 'echo $a;', 'None of the above', 'print_r ($a);', 'Images/PHP/phparray4.png'),
(214, 'PHP', 'Which of the following will add an element to an array?', 'array_push();', 'array_shift();', 'array_reverse();', 'array_pop();', 'array_push();', 'Images/PHP/phparray3.png'),
(215, 'PHP', 'Which of the following is a type of a PHP array?', 'Index Array', 'Associative Array', 'Multidimesional Arrays', 'All of the above', 'All of the above', 'Images/PHP/phparray2.png'),
(216, 'PHP', 'PHP\'s numerically indexed array begins with position __.', '2', '0', '1', '-1', '0', 'Images/PHP/phparray6.png'),
(217, 'PHP', 'Which function will return true if a variable is an array or false if it is not?', 'this_array();', 'do_array();', 'in_array();', 'is_array();', 'is_array();', 'Images/PHP/phparray5.png'),
(218, 'PHP', 'When a developer wishes to fetch the a get parameter value, which call do they use?', 'GET(\'parameter\')', '$-GET[\'parameter\']', '$_GET[\'parameter\']', 'GET_PARAM[\'parameter\']', '$_GET[\'parameter\']', 'Images/PHP/phpsession1.png'),
(219, 'PHP', 'What is an HTTP Cookie?', 'A database stored on the users computer', 'A small piece of user specific data stored on the server', 'A small piece user specific stored on the users computer', 'A tasty treat from grandmas oven!', 'A small piece user specific stored on the users computer', 'Images/PHP/phpsession2.png'),
(220, 'PHP', 'Which of the following is true about cookies?', 'There is only one type of HTTP cookies', 'Cookies only last until the users browser is closed', 'Cookies are long term storage on the users computer', 'Cookies are temporary storage that eventually expire', 'Cookies are temporary storage that eventually expire', 'Images/PHP/phpsession3.png'),
(221, 'PHP', 'Which of the following is true about Sessions?', 'Sessions are stored on the server', 'Session ids are stored with cookies', 'Sessions have no size or data limits', 'All of the above', 'All of the above', 'Images/PHP/phpsession4.png'),
(222, 'PHP', 'What method is used to test whether a session value is set for a user?', 'is_set($_SESSION(\'parameter\'))', 'test(SESSION[\'parameter\'])', 'isset($_SESSION[\'parameter\'])', '$_SESSION[\'parameter\']', 'isset($_SESSION[\'parameter\'])', 'Images/PHP/phpsession5.png'),
(223, 'PHP', 'Which one is open and close PHP server scripts?', '<&>...</&>', '<script>...</script>', '<?php>...</?>', '<?php…?>', '<?php…?>', 'Images/PHP/phparray1.png'),
(224, 'PHP', 'PHP variable start with which symbol?', '$', '&', '!', '#', '$', 'Images/PHP/phparray1.png'),
(225, 'PHP', 'What is correct way to open file \"data.ext\" as readable?', 'open(\"time.txt\");', 'open(\"time.txt\",\"read\");', 'fopen(\"time.txt\",\"r\");', 'fopen(\"time.txt\",\"r+\");', 'fopen(\"time.txt\",\"r+\");', 'Images/PHP/phparray1.png'),
(226, 'PHP', 'What is the superglobal variable holds information about headers, paths, and script locations?', '$_SESSION', '$_GLOBALS', '$_SERVER', '$_GET', '$_SERVER', 'Images/PHP/phparray1.png'),
(227, 'PHP', 'when you want to check if two values are equal and of same data type. Which operator to use?', '!=', '=', '===', '==', '===', 'Images/PHP/phparray1.png'),
(228, 'PHP', 'what method you use to print variables on php?', 'dump_var', 'dump', 'print', 'var_dump', 'var_dump', 'Images/PHP/download.png');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `order` int(50) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `image_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`order`, `topic`, `image_name`) VALUES
(1, 'Dances', 'dances.jpg'),
(2, 'Dresses', 'dresses_and_costumes.png'),
(3, 'Embroidery', 'embroidery.png'),
(4, 'Festivals', 'festivals.png'),
(5, 'Foods', 'foods.png'),
(6, 'Intruments', 'musical_instruments.png'),
(7, 'Leaders', 'leaders_and_scientists.png'),
(8, 'Monuments', 'places_and_monuments.png'),
(9, 'Movies', 'movies.png'),
(10, 'NRIs', 'NRI_s.jpg'),
(11, 'Sports', 'sports.png'),
(12, 'PHP', 'phparray1.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(75) NOT NULL,
  `hash` varchar(200) NOT NULL,
  `active` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL,
  `modified_time` date NOT NULL,
  `created_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `hash`, `active`, `role`, `modified_time`, `created_time`) VALUES
(1, 'Siva', 'Jasthi', 'siva@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00'),
(2, 'Mahesh', 'Sunkara', 'mahesh@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00'),
(3, 'SILC', 'Tester', 'test@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00'),
(4, 'SILC', 'CS320', 'cs320@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00');
-- --------------------------------------------------------
--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
    `id` int(11) NOT NULL,
    `keyword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into `keywords` values 
(1, 'dances'),
(2, 'dresses'),
(3, 'Embroidery'),
(4, 'Festivals'),
(5, 'foods'),
(6, 'instruments'),
(7, 'leaders'),
(8,'Monuments'),
(9, 'movies'),
(10, 'NRIs'),
(11, 'Sports'),
(12, 'Dances'),
(13, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `question_keywords`
--

CREATE TABLE `question_keywords` (
    `question_id` int(11) NOT NULL,
    `keyword_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Indexes for dumped tables
--

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD UNIQUE KEY `order` (`order`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `order` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

ALTER TABLE keywords MODIFY id int NOT NULL AUTO_INCREMENT PRIMARY KEY;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
