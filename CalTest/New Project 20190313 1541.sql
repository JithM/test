-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.73-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema caltest
--

CREATE DATABASE IF NOT EXISTS caltest;
USE caltest;

--
-- Definition of table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `lastmodify` datetime DEFAULT NULL,
  `users_memberId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_login_users1` (`users_memberId`),
  CONSTRAINT `fk_login_users1` FOREIGN KEY (`users_memberId`) REFERENCES `users` (`memberId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id`,`email`,`pass`,`lastmodify`,`users_memberId`) VALUES 
 (1,'rose@titanic.com','1234','2019-03-12 09:47:36',3);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;


--
-- Definition of table `managers`
--

DROP TABLE IF EXISTS `managers`;
CREATE TABLE `managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_memberId` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_managers_users1` (`users_memberId`),
  KEY `fk_managers_team1` (`team_id`),
  CONSTRAINT `fk_managers_team1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_managers_users1` FOREIGN KEY (`users_memberId`) REFERENCES `users` (`memberId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managers`
--

/*!40000 ALTER TABLE `managers` DISABLE KEYS */;
INSERT INTO `managers` (`id`,`users_memberId`,`team_id`) VALUES 
 (1,1,1),
 (2,1,2),
 (3,1,3);
/*!40000 ALTER TABLE `managers` ENABLE KEYS */;


--
-- Definition of table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`,`type`) VALUES 
 (1,'manager'),
 (2,'teamMember'),
 (3,'teamLedar');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;


--
-- Definition of table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` (`id`,`department`) VALUES 
 (1,'A'),
 (2,'B'),
 (3,'C');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;


--
-- Definition of table `teammembersdetails`
--

DROP TABLE IF EXISTS `teammembersdetails`;
CREATE TABLE `teammembersdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curentWorkingRouting` varchar(45) DEFAULT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `users_memberId` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teamMembersDetails_users1` (`users_memberId`),
  KEY `fk_teamMembersDetails_team1` (`team_id`),
  CONSTRAINT `fk_teamMembersDetails_team1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_teamMembersDetails_users1` FOREIGN KEY (`users_memberId`) REFERENCES `users` (`memberId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teammembersdetails`
--

/*!40000 ALTER TABLE `teammembersdetails` DISABLE KEYS */;
INSERT INTO `teammembersdetails` (`id`,`curentWorkingRouting`,`comment`,`users_memberId`,`team_id`) VALUES 
 (1,'fiancial','good',3,1),
 (2,'IT','vGood',2,2);
/*!40000 ALTER TABLE `teammembersdetails` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `memberId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `tel` char(10) DEFAULT NULL,
  `joinDate` date DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`memberId`),
  KEY `fk_users_role` (`role_id`),
  CONSTRAINT `fk_users_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`memberId`,`name`,`tel`,`joinDate`,`role_id`) VALUES 
 (1,'perera','1234567890','2019-03-11',1),
 (2,'Soysa','2345678901','2019-03-08',2),
 (3,'Rose','3456789012','2018-08-11',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
