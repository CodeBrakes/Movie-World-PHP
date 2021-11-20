-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2021 at 09:27 PM
-- Server version: 10.2.41-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `serialNo` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Likes` int(10) DEFAULT NULL,
  `Hates` int(10) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`serialNo`, `Name`, `Description`, `Likes`, `Hates`, `postdate`, `user_ID`) VALUES
(1, 'The Godfather', ' The Godfather \"Don\" Vito Corleone is the head of the Corleone mafia family in New York. He is at the event of his daughter\'s wedding. Michael, Vito\'s youngest son and a decorated WW II Marine is also present at the wedding. Michael seems to be uninterested in being a part of the family business. Vito is a powerful man, and is kind to all those who give him respect but is ruthless against those who do not. But when a powerful and treacherous rival wants to sell drugs and needs the Don\'s influence for the same, Vito refuses to do it. What follows is a clash between Vito\'s fading old values and the new ways which may cause Michael to do the thing he was most reluctant in doing and wage a mob war against all the other mafia families which could tear the Corleone family apart. ', 15, 3, '2021-11-20 19:16:45', 16),
(2, 'Titanic', '84 years later, a 100 year-old woman named Rose DeWitt Bukater tells the story to her granddaughter Lizzy Calvert, Brock Lovett, Lewis Bodine, Bobby Buell and Anatoly Mikailavich on the Keldysh about her life set in April 10th 1912, on a ship called Titanic when young Rose boards the departing ship with the upper-class passengers and her mother, Ruth DeWitt Bukater, and her fiancé, Caledon Hockley. Meanwhile, a drifter and artist named Jack Dawson and his best friend Fabrizio De Rossi win third-class tickets to the ship in a game. And she explains the whole story from departure until the death of Titanic on its first and last voyage April 15th, 1912 at 2:20 in the morning. ', 4, 0, '2021-11-20 19:16:53', 24),
(4, 'Black Panther', 'Black Panther is a 2018 American superhero film based on the Marvel Comics character of the same name. Produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures, it is the 18th film in the Marvel Cinematic Universe. The film was directed by Ryan Coogler, who co-wrote the screenplay with Joe Robert Cole, and it stars Chadwick Boseman as T\'Challa / Black Panther alongside Michael B. Jordan, Lupita Nyong\'o, Danai Gurira, Martin Freeman, Daniel Kaluuya, Letitia Wright, Winston Duke, Angela Bassett, Forest Whitaker, and Andy Serkis. In Black Panther, T\'Challa is crowned king of Wakanda following his father\'s death, but he is challenged by Killmonger who plans to abandon the country\'s isolationist policies and begin a global revolution.', 3, 0, '2021-11-20 19:12:10', 16),
(5, 'IT', 'It, retroactively known as It Chapter One, is a 2017 supernatural horror film based on Stephen King\'s 1986 novel of the same name. Produced by New Line Cinema, KatzSmith Productions, Lin Pictures, Vertigo Entertainment, and distributed by Warner Bros. It is the first film in the It film series as well as being the second adaptation following Tommy Lee Wallace\'s 1990 miniseries. The film tells the story of seven children in Derry, Maine, who are terrorized by the eponymous being, only to face their own personal demons in the process. The film is also known as It: Part 1 – The Losers\' Club.', 1, 2, '2021-11-20 19:16:48', 24),
(6, 'Rocky', 'Rocky is a 1976 American sports drama film directed by John G. Avildsen, written by and starring Sylvester Stallone. It tells the rags to riches American Dream story of Rocky Balboa, an uneducated, kind-hearted working class Italian-American boxer, working as a debt collector for a loan shark in the slums of Philadelphia. Rocky, a small-time club fighter, gets a shot at the world heavyweight championship. The film also stars Talia Shire as Adrian, Burt Young as Adrian\'s brother Paulie, Burgess Meredith as Rocky\'s trainer Mickey Goldmill, and Carl Weathers as the reigning champion, Apollo Creed.', 2, 0, '2021-11-20 10:22:43', 16),
(10766249, 'Ugly Betty', 'A young, smart and wise woman named Betty Suarez goes on a journey to find her inner beauty. The only problem is that it\'s hard for a slightly less attractive woman to find her beauty surrounded by tall skinny models at a fashion magazine but Betty doesn\'t let this stop her or her positive attitude towards her work.â€”James Robson', 2, 0, '2021-11-20 19:17:12', 16),
(10766250, 'Love Hard', 'Hopeless romantic but eternally single LA journalist Natalie (Nina Dobrev) thinks things are beginning to look up when she swipes right on a dreamy guy from the East Coast, Tag (Darren Barnet). Taking a leap of faith she jumps on a flight to surprise her crush for the holidays, only to discover that she\'s been catfished by Tag\'s childhood friend who is equally unlucky in love, Josh (Jimmy O. Yang). This lighthearted romantic comedy chronicles her attempt to reel in love.', 0, 1, '2021-11-20 19:17:06', 26),
(10766251, 'AmÃ©lie', 'AmÃ©lie is a story about a girl named AmÃ©lie whose childhood was suppressed by her Father\'s mistaken concerns of a heart defect. With these concerns AmÃ©lie gets hardly any real-life contact with other people. This leads AmÃ©lie to resort to her own fantastical world and dreams of love and beauty. She later on becomes a young woman and moves to the central part of Paris as a waitress. After finding a lost treasure belonging to the former occupant of her apartment, she decides to return it to him. After seeing his reaction and his new found perspective - she decides to devote her life to the people around her. Such as, her father who is obsessed with his garden-gnome, a failed writer, a hypochondriac, a man who stalks his ex girlfriends, the \"ghost,\" a suppressed young soul, the love of her life and a man whose bones are as brittle as glass. But after consuming herself with these escapades - she finds out that she is disregarding her own life and damaging her quest for love. AmÃ©lie then discovers she must become more aggressive and take a hold of her life and capture the beauty of love she has always dreamed of.', 1, 0, '2021-11-20 19:18:51', 26),
(10766252, 'Passengers (I)', 'The spaceship, Starship Avalon, in its 120-year voyage to a distant colony planet known as the \"Homestead Colony\" and transporting 5,258 people has a malfunction in one of its sleep chambers. As a result one hibernation pod opens prematurely and the one person that awakes, Jim Preston (Chris Pratt) is stranded on the spaceship, still 90 years from his destination.', 1, 0, '2021-11-20 19:17:03', 26),
(10766253, 'The Princess Bride', 'An elderly man reads the book \"The Princess Bride\" to his sick and thus currently bedridden adolescent grandson, the reading of the book which has been passed down within the family for generations. The grandson is sure he won\'t like the story, with a romance at its core, he prefers something with lots of action and \"no kissing\", but he lets grandfather continue, because he doesn\'t want to hurt his feelings. The story centers on Buttercup, a former farm girl who has been chosen as the princess bride to Prince Humperdinck of Florian. Buttercup does not love him, she who still laments the death of her one true love, Westley, five years ago. Westley was a hired hand on the farm, his stock answer of \"as you wish\" to any request she made of him which she came to understand was his way of saying that he loved her. But Westley went away to sea, only to be killed by the Dread Pirate Roberts. On a horse ride to clear her mind of her upcoming predicament of marriage, Buttercup is kidnapped by a band of bandits: Vizzini who works on his wits, and his two associates, a giant named Fezzik who works on his brawn, and a Spaniard named Inigo Montoya, who has trained himself his entire life to be an expert swordsman. They in turn are chased by the Dread Pirate Roberts himself. But chasing them all is the Prince, and his men led by Count Tyrone Rugen. What happens to these collectives is dependent partly on Buttercup, who does not want to marry the Prince, and may see other options as lesser evils, and partly on the other motives of individuals within the groups. But a larger question is what the grandson will think of the story as it proceeds and at its end, especially as he sees justice as high a priority as action.', 1, 0, '2021-11-20 19:16:58', 26),
(10766254, 'I Can Only Imagine', '10-year-old Bart Millard lives with his mother and abusive father Arthur in Texas. One day his mother drops him off at a Christian camp where he meets Shannon. Upon his return from camp, Bart finds his mother has left and movers are removing her belongings. He angrily confronts his father, who denies that his abusiveness was the reason she left. Years later, in high school, Bart and Shannon are dating. Bart plays football to please his father, but is injured, breaking both ankles and ending his career. The only elective with openings is music class, so he reluctantly signs up..', 0, 0, '2021-11-20 19:18:19', 25),
(10766255, 'Baby Driver', 'Baby is a young and partially hearing impaired getaway driver who can make any wild move while in motion with the right track playing. It\'s a critical talent he needs to survive his indentured servitude to the crime boss, Doc, who values his role in his meticulously planned robberies. However, just when Baby thinks he is finally free and clear to have his own life with his new girlfriend, Debora, Doc coerces him back for another job. Now saddled with a crew of thugs too violently unstable to keep to Doc\'s plans, Baby finds himself and everything he cares for in terrible danger. To survive and escape the coming maelstrom, it will take all of Baby\'s skill, wits and daring, but even on the best track, can he make it when life is forcing him to face the music?', 0, 0, '2021-11-20 19:18:46', 25),
(10766256, 'Baby Driver', 'Aspiring actress serves lattes to movie stars in between auditions and jazz musician Sebastian scrapes by playing cocktail-party gigs in dingy bars. But as success mounts, they are faced with decisions that fray the fragile fabric of their love affair, and the dreams they worked so hard to maintain in each other threaten to rip them apart.', 0, 0, '2021-11-20 19:19:20', 25),
(10766257, 'Whiplash', 'Nineteen year old Andrew Niemann wants to be the greatest jazz drummer in the world, in a league with Buddy Rich. This goal is despite not coming from a pedigree of greatest, musical or otherwise, with Jim, his high school teacher father, being a failed writer. Andrew is starting his first year at Shaffer Conservatory of Music, the best music school in the United States. At Shaffer, being the best means being accepted to study under Terence Fletcher and being asked to play in his studio band, which represents the school at jazz competitions. Based on their less than positive first meeting, Andrew is surprised that Fletcher asks him to join the band, albeit in the alternate drummer position which he is more than happy to do initially. Andrew quickly learns that Fletcher operates on fear and intimidation, never settling for what he considers less than the best each and every time. Being the best in Fletcher\'s mind does not only entail playing well, but knowing that you\'re playing well and if not what you\'re doing wrong. His modus operandi creates an atmosphere of fear and of every man or woman for him/herself within the band. Regardless, Andrew works hard to be the best. He has to figure out his life priorities and what he is willing to sacrifice to be the best. The other question becomes how much emotional abuse he will endure by Fletcher to reach that greatness, which he may believe he can only achieve with the avenues opened up by Fletcher.', 0, 0, '2021-11-20 19:20:13', 25),
(10766258, 'Blade I', 'In a world where vampires walk the earth, Blade has a goal. His goal is to rid the world of all vampire evil. When Blade witnesses a vampire bite Dr. Karen Jenson, he fights away the beast and takes Jenson back to his hideout. Here, alongside Abraham Whistler, Blade attempts to help heal Jenson. The vampire Quinn who was attacked by Blade, reports back to his master Deacon Frost, who is planning a huge surprise for the human population.', 0, 0, '2021-11-20 19:22:39', 24),
(10766259, 'Blade II', 'A rare mutation has occurred within the vampire community. The Reaper. A vampire so consumed with an insatiable bloodlust that they prey on vampires as well as humans, transforming victims who are unlucky enough to survive into Reapers themselves. Now their quickly expanding population threatens the existence of vampires, and soon there won\'t be enough humans in the world to satisfy their bloodlust. Blade, Whistler and an armory expert named Scud are curiously summoned by the Shadow Council. The council reluctantly admits that they are in a dire situation and they require Blade\'s assistance. Blade then tenuously enters into an alliance with The Bloodpack, an elite team of vampires trained in all modes of combat to defeat the Reaper threat. Blade\'s team and the Bloodpack are the only line of defense which can prevent the Reaper population from wiping out the vampire and human populations.', 0, 0, '2021-11-20 19:23:32', 24),
(10766260, 'Blade: Trinity', 'Blade finds himself alone surrounded by enemies, fighting an up hill battle with the vampire nation and now humans. He joins forces with a group of vampire hunters who call themselves the Nightstalkers. The vampire nation awakens the king of vampires Dracula from his slumber with intentions of using his primitive blood to become day-walkers. On the other side is Blade and his team manifesting a virus that could wipe out the vampire race once and for all. In the end the two sides will collide and only one will come out victorious, a battle between the ultimate vampire who never knew defeat, facing off against the greatest vampire slayer.', 0, 0, '2021-11-20 19:23:57', 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `user_name`, `password`, `name`, `lastname`, `email`) VALUES
(16, 'NikosTaltakis', '12345678Abc', 'Nikos', 'Taltakis', 'nikos@taltakis.gr'),
(24, 'Giorgos_Kalis', '12345678Abc', 'Giorgos', 'Kalis', 'giorgoskalis@gmail.com'),
(25, 'PetrosMitsos', '12345678Abc', 'Petros', 'Mitsos', 'petrosmitsos@gmail.com'),
(26, 'MairyTsoupra', '12345678Abc', 'Mairy', 'Tsoupra', 'mairyts@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `votelist`
--

CREATE TABLE `votelist` (
  `movieID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votelist`
--

INSERT INTO `votelist` (`movieID`, `user_ID`) VALUES
(1, 16),
(2, 16),
(10766243, 16),
(5, 16),
(6, 16),
(10766249, 26),
(5, 26),
(4, 26),
(1, 26),
(1, 25),
(5, 25),
(2, 25),
(10766253, 25),
(10766252, 25),
(10766250, 25),
(10766249, 25),
(10766251, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`serialNo`);
ALTER TABLE `movies` ADD FULLTEXT KEY `Description` (`Description`);
ALTER TABLE `movies` ADD FULLTEXT KEY `Description_2` (`Description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `serialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10766261;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
