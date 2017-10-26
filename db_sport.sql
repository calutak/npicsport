/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.21-MariaDB : Database - db_sport
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sport` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_sport`;

/*Table structure for table `tb_group` */

DROP TABLE IF EXISTS `tb_group`;

CREATE TABLE `tb_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(2) NOT NULL,
  `pts` int(11) NOT NULL,
  `playcount` int(11) NOT NULL,
  `wincount` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1. Winner 2. Runner Up',
  `team_id` varchar(20) NOT NULL,
  `tournament_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_group` */

/*Table structure for table `tb_log` */

DROP TABLE IF EXISTS `tb_log`;

CREATE TABLE `tb_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_type` varchar(30) NOT NULL,
  `log_desc` text NOT NULL,
  `log_datetime` int(11) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_log` */

insert  into `tb_log`(`log_id`,`log_type`,`log_desc`,`log_datetime`) values (1,'feedback','New message/comments from asodkaso',1506880073),(2,'feedback','New message/comments from Hanif',1506880829),(3,'feedback','New message/comments from Anto',1507003835),(4,'feedback','New message/comments from asdas',1507386069),(5,'feedback','New message/comments from asdasdsa',1507731382);

/*Table structure for table `tb_match` */

DROP TABLE IF EXISTS `tb_match`;

CREATE TABLE `tb_match` (
  `match_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_a` varchar(30) DEFAULT NULL,
  `team_b` varchar(30) DEFAULT NULL,
  `winner` varchar(30) DEFAULT NULL,
  `match_score` varchar(7) DEFAULT NULL,
  `match_status` int(1) NOT NULL DEFAULT '0' COMMENT '1 finish 0 unfinish',
  `round` varchar(15) NOT NULL,
  `match_order` int(3) NOT NULL,
  `result` int(1) NOT NULL COMMENT '1 Team A win, 2 Team B win 4 Win vs Bye',
  `schedule_id` varchar(10) DEFAULT NULL,
  `tournament_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`match_id`),
  KEY `fk_tournaments` (`tournament_id`),
  CONSTRAINT `fk_tournaments` FOREIGN KEY (`tournament_id`) REFERENCES `tb_tournament` (`tournament_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

/*Data for the table `tb_match` */

insert  into `tb_match`(`match_id`,`team_a`,`team_b`,`winner`,`match_score`,`match_status`,`round`,`match_order`,`result`,`schedule_id`,`tournament_id`) values (57,'Team10','Team11','\n			Team10		','4v2',1,'1',0,1,'31','NPICT0003'),(58,'Team9','Team12','\n			Team9		','5v3',1,'1',1,1,'32','NPICT0003'),(59,'Team8','Team13','\n			Team13		','6v7',1,'1',2,2,'33','NPICT0003'),(60,'Team7','Team14','\n			Team14		','4v7',1,'1',3,2,'34','NPICT0003'),(61,'Team6','Team15','\n			Team6		','4v2',1,'1',4,1,'35','NPICT0003'),(62,'Team5','Team16','\n			Team5		','4v2',1,'1',5,1,'36','NPICT0003'),(63,'Team4','Team1','\n			Team4		','2v0',1,'1',6,1,'37','NPICT0003'),(64,'Team3','Team2','\n			Team2		','3v7',1,'1',7,2,'38','NPICT0003'),(65,'\n			Team10		','\n			Team9		','\n			\n			Team10				','4v0',1,'2',8,1,'39','NPICT0003'),(66,'\n			Team13		','\n			Team14		','\n			\n			Team14				','0v5',1,'2',9,2,'40','NPICT0003'),(67,'\n			Team6		','\n			Team5		','\n			\n			Team6				','3v0',1,'2',10,1,'41','NPICT0003'),(68,'\n			Team4		','\n			Team2		','\n			\n			Team2				','0v6',1,'2',11,2,'42','NPICT0003'),(69,'\n			\n			Team10				','\n			\n			Team14				','\n			\n			\n			Team10						','3v0',1,'3',12,1,'43','NPICT0003'),(70,'\n			\n			Team6				','\n			\n			Team2				','\n			\n			\n			Team2						','0v4',1,'3',13,2,'44','NPICT0003'),(71,'\n			\n			\n			Team10						','\n			\n			\n			Team2						','\n			\n			\n			\n			Team10								','5v0',1,'4',14,1,'45','NPICT0003'),(72,'\n			\n			Team14				','\n			\n			Team6				','\n			\n			\n			Team6						','0v5',1,'5',15,2,'46','NPICT0003'),(87,'Team1','Team2','\n			Team1		','4v2',1,'1',0,1,'107','NPICT0004'),(88,'Team6','Team5','\n			Team6		','11v0',1,'1',1,1,'108','NPICT0004'),(89,'Team7','Team4','\n			Team7		','4v0',1,'1',2,1,'109','NPICT0004'),(90,'Team3','Team8','\n			Team8		','0v3',1,'1',3,2,'110','NPICT0004'),(91,'\n			Team1		','\n			Team6		','\n			\n			Team1				','4v2',1,'2',4,1,'111','NPICT0004'),(92,'\n			Team7		','\n			Team8		','\n			\n			Team8				','2v5',1,'2',5,2,'112','NPICT0004'),(93,'\n			\n			Team1				','\n			\n			Team8				','Team1','4v2',1,'3',6,1,'113','NPICT0004'),(94,'\n			Team6		','\n			Team7		','\n			Team7		','1v3',1,'4',7,2,'114','NPICT0004'),(95,'Team2','Team4','\n			Team2		','5v0',1,'1',0,1,'141','NPICT0001'),(96,'Team3','Team1','\n			Team3		','5v0',1,'1',1,1,'142','NPICT0001'),(97,'\n			Team2		','\n			Team3		','\n			\n			Team2				','3v2',1,'2',2,1,'143','NPICT0001'),(98,'Team4','Team1','\n			Team4		','5v2',1,'3',3,1,'144','NPICT0001'),(99,'team2','team1','\n			team2		','5v0',1,'1',0,1,'171','NPICT0005'),(100,'bm77','mutiara bunda','\n			bm77		','21v19',1,'1',0,1,'179','NPICT0006'),(101,'BM77','Mutiarabunda','','0v0',0,'1',0,0,'185','NPICT0007');

/*Table structure for table `tb_message` */

DROP TABLE IF EXISTS `tb_message`;

CREATE TABLE `tb_message` (
  `message_id` int(10) NOT NULL AUTO_INCREMENT,
  `message_subject` varchar(50) NOT NULL,
  `message_content` text NOT NULL,
  `message_date` int(12) NOT NULL,
  `message_sender` varchar(50) NOT NULL,
  `message_type` varchar(20) NOT NULL,
  `message_target` varchar(50) NOT NULL,
  `sender_mail` varchar(150) DEFAULT NULL,
  `sender_phone` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tb_message` */

insert  into `tb_message`(`message_id`,`message_subject`,`message_content`,`message_date`,`message_sender`,`message_type`,`message_target`,`sender_mail`,`sender_phone`) values (4,'Guest`s Comments','Test send mail',1506880829,'Hanif','Comments','Admin','asalamwasalam@gmail.com','093296348'),(5,'Guest`s Comments','Test',1507003835,'Anto','Comments','Admin','asalamwasalam@gmail.com','47477299'),(6,'Guest`s Comments','asdasdasdok',1507386069,'asdas','Comments','Admin','asdsa@asdas.com','129382103'),(7,'Guest`s Comments','aisdasdaksdoak',1507731382,'asdasdsa','Comments','Admin','asdasd@mail.com','91042180');

/*Table structure for table `tb_schedule` */

DROP TABLE IF EXISTS `tb_schedule`;

CREATE TABLE `tb_schedule` (
  `schedule_id` int(10) NOT NULL AUTO_INCREMENT,
  `schedule_date` int(11) NOT NULL,
  `schedule_time` int(11) NOT NULL,
  `tournament_id` varchar(10) NOT NULL,
  PRIMARY KEY (`schedule_id`),
  KEY `fk_tournament` (`tournament_id`),
  CONSTRAINT `fk_tournament` FOREIGN KEY (`tournament_id`) REFERENCES `tb_tournament` (`tournament_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `tb_schedule` */

insert  into `tb_schedule`(`schedule_id`,`schedule_date`,`schedule_time`,`tournament_id`) values (31,1506895200,1506600000,'NPICT0003'),(32,1506895200,1506420600,'NPICT0003'),(33,1507068000,1506409200,'NPICT0003'),(34,1507068000,1506420600,'NPICT0003'),(35,1507240800,1506409200,'NPICT0003'),(36,1507240800,1506420600,'NPICT0003'),(37,1507500000,1506409200,'NPICT0003'),(38,1507500000,1506420600,'NPICT0003'),(39,1507672800,1506409200,'NPICT0003'),(40,1507672800,1506420600,'NPICT0003'),(41,1507845600,1506409200,'NPICT0003'),(42,1507845600,1506420600,'NPICT0003'),(43,1508104800,1506409200,'NPICT0003'),(44,1508104800,1506420600,'NPICT0003'),(45,1508277600,1506409200,'NPICT0003'),(46,1508277600,1506420600,'NPICT0003'),(47,1508450400,1506409200,'NPICT0003'),(48,1508450400,1506420600,'NPICT0003'),(49,1508709600,1506409200,'NPICT0003'),(50,1508709600,1506420600,'NPICT0003'),(51,1508882400,1506409200,'NPICT0003'),(52,1508882400,1506420600,'NPICT0003'),(53,1509055200,1506409200,'NPICT0003'),(54,1509055200,1506420600,'NPICT0003'),(55,1509318000,1506409200,'NPICT0003'),(56,1509318000,1506420600,'NPICT0003'),(107,1506895200,1506688200,'NPICT0004'),(108,1506895200,1506601800,'NPICT0004'),(109,1506981600,1506582000,'NPICT0004'),(110,1506981600,1506594600,'NPICT0004'),(111,1507068000,1506582000,'NPICT0004'),(112,1507068000,1506594600,'NPICT0004'),(113,1507154400,1506582000,'NPICT0004'),(114,1507154400,1506594600,'NPICT0004'),(115,1507240800,1506582000,'NPICT0004'),(116,1507240800,1506594600,'NPICT0004'),(117,1507500000,1506582000,'NPICT0004'),(118,1507500000,1506594600,'NPICT0004'),(119,1507586400,1506582000,'NPICT0004'),(120,1507586400,1506594600,'NPICT0004'),(121,1507672800,1506582000,'NPICT0004'),(122,1507672800,1506594600,'NPICT0004'),(123,1507759200,1506582000,'NPICT0004'),(124,1507759200,1506594600,'NPICT0004'),(125,1507845600,1506582000,'NPICT0004'),(126,1507845600,1506594600,'NPICT0004'),(127,1508104800,1506582000,'NPICT0004'),(128,1508104800,1506594600,'NPICT0004'),(129,1508191200,1506582000,'NPICT0004'),(130,1508191200,1506594600,'NPICT0004'),(131,1508277600,1506582000,'NPICT0004'),(132,1508277600,1506594600,'NPICT0004'),(133,1508364000,1506582000,'NPICT0004'),(134,1508364000,1506594600,'NPICT0004'),(135,1508450400,1506582000,'NPICT0004'),(136,1508450400,1506594600,'NPICT0004'),(141,1507500000,1506751200,'NPICT0001'),(142,1507500000,1506759600,'NPICT0001'),(143,1507500000,1506768000,'NPICT0001'),(144,1507586400,1506751200,'NPICT0001'),(145,1507586400,1506759600,'NPICT0001'),(146,1507586400,1506768000,'NPICT0001'),(147,1508104800,1506751200,'NPICT0001'),(148,1508104800,1506759600,'NPICT0001'),(149,1508104800,1506768000,'NPICT0001'),(150,1508191200,1506751200,'NPICT0001'),(151,1508191200,1506759600,'NPICT0001'),(152,1508191200,1506768000,'NPICT0001'),(153,1508709600,1506751200,'NPICT0001'),(154,1508709600,1506759600,'NPICT0001'),(155,1508709600,1506768000,'NPICT0001'),(156,1508796000,1506751200,'NPICT0001'),(157,1508796000,1506759600,'NPICT0001'),(158,1508796000,1506768000,'NPICT0001'),(159,1509318000,1506751200,'NPICT0001'),(160,1509318000,1506759600,'NPICT0001'),(161,1509318000,1506768000,'NPICT0001'),(162,1509404400,1506751200,'NPICT0001'),(163,1509404400,1506759600,'NPICT0001'),(164,1509404400,1506768000,'NPICT0001'),(165,1509922800,1506751200,'NPICT0001'),(166,1509922800,1506759600,'NPICT0001'),(167,1509922800,1506768000,'NPICT0001'),(168,1510009200,1506751200,'NPICT0001'),(169,1510009200,1506759600,'NPICT0001'),(170,1510009200,1506768000,'NPICT0001'),(171,1504476000,1506751200,'NPICT0005'),(172,1504476000,1506759600,'NPICT0005'),(173,1505080800,1506751200,'NPICT0005'),(174,1505080800,1506759600,'NPICT0005'),(175,1505685600,1506751200,'NPICT0005'),(176,1505685600,1506759600,'NPICT0005'),(177,1506290400,1506751200,'NPICT0005'),(178,1506290400,1506759600,'NPICT0005'),(179,1508104800,1508065200,'NPICT0006'),(180,1508104800,1508070900,'NPICT0006'),(181,1508104800,1508076600,'NPICT0006'),(182,1508709600,1508065200,'NPICT0006'),(183,1508709600,1508070900,'NPICT0006'),(184,1508709600,1508076600,'NPICT0006'),(185,1508104800,1508306400,'NPICT0007'),(186,1508104800,1508314200,'NPICT0007'),(187,1508104800,1508322000,'NPICT0007'),(188,1508709600,1508306400,'NPICT0007'),(189,1508709600,1508314200,'NPICT0007'),(190,1508709600,1508322000,'NPICT0007');

/*Table structure for table `tb_settings` */

DROP TABLE IF EXISTS `tb_settings`;

CREATE TABLE `tb_settings` (
  `id_settings` int(11) NOT NULL AUTO_INCREMENT,
  `tournament_id` varchar(10) NOT NULL,
  `max_team` int(11) NOT NULL,
  `max_team_faculty` int(11) NOT NULL,
  `min_games` int(11) NOT NULL,
  `game_duration` int(11) NOT NULL,
  `gap_per_game` int(11) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `bracket_size` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `max_member` int(11) NOT NULL,
  PRIMARY KEY (`id_settings`),
  KEY `fk_tournament_id` (`tournament_id`),
  CONSTRAINT `fk_tournament_id` FOREIGN KEY (`tournament_id`) REFERENCES `tb_tournament` (`tournament_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `tb_settings` */

insert  into `tb_settings`(`id_settings`,`tournament_id`,`max_team`,`max_team_faculty`,`min_games`,`game_duration`,`gap_per_game`,`venue`,`bracket_size`,`round`,`max_member`) values (12,'NPICT0001',16,2,0,90,50,'NPIC Field',4,2,17),(18,'NPICT0003',16,2,0,90,100,'NPIC Field',16,4,15),(19,'NPICT0004',16,2,0,90,120,'aoskdok',8,3,16),(20,'NPICT0005',8,1,0,90,50,'asdk',2,1,15),(21,'NPICT0006',32,6,0,90,5,'gor badminton',2,1,2),(22,'NPICT0007',16,2,0,90,40,'NPIC Sport Dome',2,1,15);

/*Table structure for table `tb_team` */

DROP TABLE IF EXISTS `tb_team`;

CREATE TABLE `tb_team` (
  `team_id` varchar(20) NOT NULL COMMENT 'NPICTxTE1',
  `team_name` varchar(30) NOT NULL,
  `team_user` varchar(20) NOT NULL,
  `team_pass` varchar(20) NOT NULL,
  `team_email` varchar(30) NOT NULL,
  `major` varchar(50) NOT NULL,
  `year` int(1) NOT NULL,
  `team_status` int(1) NOT NULL,
  `tournament_id` varchar(10) NOT NULL,
  PRIMARY KEY (`team_id`),
  KEY `fk_tid` (`tournament_id`),
  CONSTRAINT `fk_tid` FOREIGN KEY (`tournament_id`) REFERENCES `tb_tournament` (`tournament_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `tb_team` */

insert  into `tb_team`(`team_id`,`team_name`,`team_user`,`team_pass`,`team_email`,`major`,`year`,`team_status`,`tournament_id`) values ('NPICT0001TE0002','Team2','','','team2@gmail.com','asdf',2,2,'NPICT0001'),('NPICT0001TE0003','Team3','','','team3@gmail.com','okoaksd',4,2,'NPICT0001'),('NPICT0001TE0004','Team1','','','team1@gmail.com','CS',2,2,'NPICT0001'),('NPICT0001TE0005','Team4','','','team4@gmail.com','CS',3,2,'NPICT0001'),('NPICT0003TE0001','Team1','','','team1@mail.com','AE',2,2,'NPICT0003'),('NPICT0003TE0002','Team2','','','team2@mail.com','AE',3,2,'NPICT0003'),('NPICT0003TE0003','Team3','','','team3@mail.com','CAD',4,2,'NPICT0003'),('NPICT0003TE0004','Team4','','','team4@mail.com','CAD',3,2,'NPICT0003'),('NPICT0003TE0005','Team5','','','team5@mail.com','ELC',4,2,'NPICT0003'),('NPICT0003TE0006','Team6','','','team6@mail.com','CE',3,2,'NPICT0003'),('NPICT0003TE0007','Team7','','','team7@mail.com','CE',2,2,'NPICT0003'),('NPICT0003TE0008','Team8','','','team8@mail.com','CA',4,2,'NPICT0003'),('NPICT0003TE0009','Team9','','','team9@mail.com','CS',3,2,'NPICT0003'),('NPICT0003TE0010','Team10','','','team10@mail.com','ELC',3,2,'NPICT0003'),('NPICT0003TE0011','Team11','','','team11@mail.com','CS',3,2,'NPICT0003'),('NPICT0003TE0012','Team12','','','team12@mail.com','CA',3,2,'NPICT0003'),('NPICT0003TE0013','Team13','','','team13@mail.com','TH',2,2,'NPICT0003'),('NPICT0003TE0014','Team14','','','team14@mail.com','TH',3,2,'NPICT0003'),('NPICT0003TE0015','Team15','','','team15@mail.com','GME',3,2,'NPICT0003'),('NPICT0003TE0016','Team16','','','team16@mail.com','ELE',3,2,'NPICT0003'),('NPICT0004TE0001','Team1','','','team1@mail.com','AE',5,2,'NPICT0004'),('NPICT0004TE0002','Team2','','','team2@mail.com','AE',3,2,'NPICT0004'),('NPICT0004TE0003','Team3','','','team3@mail.com','CAD',2,2,'NPICT0004'),('NPICT0004TE0004','Team4','','','team4@mail.com','CAD',2,2,'NPICT0004'),('NPICT0004TE0005','Team5','','','team5@mail.com','CE',3,2,'NPICT0004'),('NPICT0004TE0006','Team6','','','team6@mail.com','CE',3,2,'NPICT0004'),('NPICT0004TE0007','Team7','','','team7@mail.com','CA',4,2,'NPICT0004'),('NPICT0004TE0008','Team8','','','team8@mail.com','CA',3,2,'NPICT0004'),('NPICT0005TE0001','team1','','','team1@mail.com','AE',2,2,'NPICT0005'),('NPICT0005TE0002','team2','','','team2@mail.com','CAD',3,2,'NPICT0005'),('NPICT0006TE0001','bm77','','','antotrisulistiyo@ymail.com','AE',3,2,'NPICT0006'),('NPICT0006TE0002','mutiara bunda','','','antotrisulistiyo960@gmail.com','CS',4,2,'NPICT0006'),('NPICT0007TE0001','BM77','','','bm77@mail.com','AE',3,2,'NPICT0007'),('NPICT0007TE0002','Mutiarabunda','','','mb@mail.com','AE',3,2,'NPICT0007');

/*Table structure for table `tb_team_member` */

DROP TABLE IF EXISTS `tb_team_member`;

CREATE TABLE `tb_team_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` varchar(20) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_email` varchar(100) NOT NULL,
  `member_photo` varchar(100) NOT NULL,
  `dob` int(11) NOT NULL,
  `major` varchar(10) NOT NULL,
  `year` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1. Lead, else member',
  PRIMARY KEY (`member_id`),
  KEY `fk_team_member` (`team_id`),
  CONSTRAINT `fk_team_member` FOREIGN KEY (`team_id`) REFERENCES `tb_team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_team_member` */

insert  into `tb_team_member`(`member_id`,`team_id`,`member_name`,`member_email`,`member_photo`,`dob`,`major`,`year`,`status`) values (1,'NPICT0006TE0001','Anto','antotris@mail.com','NPICT0006TE0001IMG_20140218_121919.jpg',876780000,'AE',3,NULL),(2,'NPICT0007TE0001','Mali','mali@mail.com','NPICT0007TE0001avatar3.png',869695200,'AE',3,NULL),(3,'NPICT0007TE0001','mila','mila@mail.com','NPICT0007TE0001avatar2.png',820537200,'AE',3,NULL);

/*Table structure for table `tb_team_settings` */

DROP TABLE IF EXISTS `tb_team_settings`;

CREATE TABLE `tb_team_settings` (
  `team_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` varchar(20) NOT NULL,
  `def_passwd_changed` int(1) DEFAULT '0',
  `num_member` int(11) DEFAULT '1',
  PRIMARY KEY (`team_setting_id`),
  KEY `fk_team_id` (`team_id`),
  CONSTRAINT `fk_team_id` FOREIGN KEY (`team_id`) REFERENCES `tb_team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

/*Data for the table `tb_team_settings` */

insert  into `tb_team_settings`(`team_setting_id`,`team_id`,`def_passwd_changed`,`num_member`) values (10,'NPICT0001TE0002',0,15),(11,'NPICT0001TE0003',0,15),(12,'NPICT0001TE0004',0,15),(13,'NPICT0001TE0005',0,17),(34,'NPICT0003TE0001',0,15),(35,'NPICT0003TE0002',0,15),(36,'NPICT0003TE0003',0,15),(37,'NPICT0003TE0004',0,15),(38,'NPICT0003TE0005',0,15),(39,'NPICT0003TE0006',0,15),(40,'NPICT0003TE0007',0,15),(41,'NPICT0003TE0008',0,15),(42,'NPICT0003TE0009',0,15),(43,'NPICT0003TE0010',0,15),(44,'NPICT0003TE0011',0,15),(45,'NPICT0003TE0012',0,15),(46,'NPICT0003TE0013',0,15),(47,'NPICT0003TE0014',0,15),(48,'NPICT0003TE0015',0,15),(49,'NPICT0003TE0016',0,15),(50,'NPICT0004TE0001',0,16),(51,'NPICT0004TE0002',0,15),(52,'NPICT0004TE0003',0,15),(53,'NPICT0004TE0004',0,15),(54,'NPICT0004TE0005',0,15),(55,'NPICT0004TE0006',0,15),(56,'NPICT0004TE0007',0,15),(57,'NPICT0004TE0008',0,15),(58,'NPICT0005TE0001',0,3),(59,'NPICT0005TE0002',0,14),(60,'NPICT0006TE0001',0,2),(61,'NPICT0006TE0002',0,2),(62,'NPICT0007TE0001',0,14),(63,'NPICT0007TE0002',0,14);

/*Table structure for table `tb_timeline` */

DROP TABLE IF EXISTS `tb_timeline`;

CREATE TABLE `tb_timeline` (
  `timeline_id` int(11) NOT NULL AUTO_INCREMENT,
  `timeline_details` longtext NOT NULL,
  `timeline_title` varchar(200) NOT NULL,
  `timeline_date` int(12) NOT NULL,
  `timeline_cat` varchar(20) NOT NULL,
  `timeline_thumbnail` varchar(150) DEFAULT NULL,
  `isHeadline` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`timeline_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tb_timeline` */

insert  into `tb_timeline`(`timeline_id`,`timeline_details`,`timeline_title`,`timeline_date`,`timeline_cat`,`timeline_thumbnail`,`isHeadline`) values (1,'<p>cockockockco</p>','AKOSKAO',1506024825,'news','hehe.png',1),(2,'<p>asd</p>','sadok',1506321652,'news','bcatokopedia.png',1),(3,'<p>Test data Post</p>','Test Postin',1506512351,'news','white_paper_c11-453495-1.jpg',0),(4,'<p>headlines</p>','headlines',1506761985,'news',NULL,1),(5,'<p>aoskdoaskdo</p>','Test New Post',1506778177,'news',NULL,1),(6,'<p>test</p>','Test Upload Ima',1506835161,'news','2013-05-01-214.jpg',1),(7,'<p>Tottenham midfielder Harry Winks has been called up to the England squad for the first time.</p>\r\n<p>The 21-year-old was added for the World Cup qualifiers against Slovenia on Thursday and Lithuania on Sunday after defender Phil Jones and midfielder Fabian Delph suffered injuries.</p>\r\n<p>Manchester United\'s Jones and Manchester City\'s Delph have returned to their clubs.</p>\r\n<p>Winks had been due to link up with the England Under-21 squad.</p>\r\n<p>Winks has made seven appearances for his club this season and been capped by England at under-17, under-18, under-19, under-20 and under-21 levels.</p>\r\n<p>Daniel Sturridge, Jordan Henderson and Michael Keane missed Monday\'s training at St George\'s Park, and instead took part in a recovery session.</p>\r\n<p>England will guarantee qualification for the 2018 World Cup with victory over Slovenia at Wembley or their final Group F match in Lithuania.</p>\r\n<p>Delph, 27, was&nbsp;<a href=\"http://www.bbc.com/sport/football/41431023\">recalled to the England squad</a>&nbsp;in order to increase competition for a place in the midfield, with Tottenham\'s Dele Alli suspended against Slovenia.</p>\r\n<p>Delph\'s appearance in City\'s win at Chelsea on Saturday - in an unfamiliar left-back role - was his first start in 17 months after a series of injuries.</p>\r\n<p>Jones, 25, played the 90 minutes for United\'s win over Crystal Palace, having missed the trip to CSKA Moscow on Wednesday through injury.</p>\r\n<p>Southampton defender Ryan Bertrand, who is likely to start at left-back, said England have the depth in their squad to deal with absentees.</p>\r\n<p>\"We have fantastic competition for places and that can only be good for the squad,\" he said.</p>\r\n<p>\"We are very much in a positive mindset and the work is not finished. We want to get the six points.</p>\r\n<p>\"With perhaps my fan\'s head on, it would be nice to complete the qualification in front of the home fans and have a decent night at Wembley.\"</p>\r\n<p>Before training on Monday, England\'s training pitch at St George\'s Park was named after Sir Bobby Charlton to mark the World Cup winner\'s 80th birthday.</p>\r\n<p>Charlton will also be guest of honour at Wembley.</p>\r\n<p>Bertrand, 28, added: \"To see such a great inspiration in England and to get to meet him, albeit a bit brief, was an amazing moment.\"</p>\r\n<h3 class=\"sp-story-body__cross-head\">Game will go ahead despite strike threat</h3>\r\n<p>The Football Association says the match against Slovenia will go ahead at 19:45 BST despite planned industrial action by Tube drivers.</p>\r\n<p>The Aslef union is set to conduct a 24-hour strike over a working practices dispute.</p>\r\n<p>The FA said it had been working with Transport for London and National Express to help fans to travel to and from the game in the event of strike action taking place.</p>','England v Slovenia: Harry Winks called up as Fabian Delph & Phil Jones injured',1508043510,'news','harrywinksbody_getty1.jpg',1),(8,'<p class=\"sp-story-body__introduction\">Reading defender Chris Gunter has been named 2017 Wales Player of the Year, ending Real Madrid forward Gareth Bale\'s four-year run of success.</p>\r\n<p>Bale was named players\' player of the year, with Stoke midfielder Joe Allen the fans\' player of the year.</p>\r\n<p>Laura O\'Sullivan was named women\'s player of the year, with Angharad James the players\' player, and Jess Fishlock fans\' player of the year.</p>\r\n<p>Ben Woodburn and Peyton Vincze were named young players of the year.</p>\r\n<p>Elsewhere at the Football Association of Wales annual awards in the Vale of Glamorgan, former striker Ian Rush was presented with a special accolade.</p>\r\n<p>Newtown\'s Craig Williams was named the Welsh Premier League clubman of the year.</p>\r\n<p>Reading midfielder David Edwards won the media choice award.</p>','Chris Gunter: Reading defender beats Gareth Bale to Wales player of year award',1508043610,'news','ep_ireland_v_wales_189.jpg',1),(9,'<p class=\"sp-story-body__introduction\">Burnley manager Sean Dyche is capable of replacing Arsene Wenger at Arsenal, says former Gunners striker Ian Wright.</p>\r\n<p>Dyche\'s side&nbsp;<a href=\"http://www.bbc.com/sport/football/41376505\">beat Everton 1-0 at Goodison Park</a>&nbsp;on Sunday to move up to sixth in the Premier League table.</p>\r\n<p>But Wright thinks Arsenal and other top clubs will not take a chance on the 46-year-old, and predicts Dyche will be \"pushed\" into taking the England job.</p>\r\n<p>\"I believe he is somebody that needs to go, at some stage, to the next level,\" he told BBC Radio 5 live.</p>\r\n<p>That would be a \"club who can play in Europe on a regular basis\", added Wright, who also suggested Everton would be a good stepping stone for Dyche, who has twice won promotion to the top flight with the Clarets.</p>','Sean Dyche: Burnley boss could replace Arsene Wenger at Arsenal - Ian Wright',1508043706,'news','_98115401_dyche_getty1.jpg',0),(10,'National Polytechnic Institute of Cambodia','NPIC',1507185461,'Gallery','NPIC-0011.jpg',0);

/*Table structure for table `tb_tournament` */

DROP TABLE IF EXISTS `tb_tournament`;

CREATE TABLE `tb_tournament` (
  `tournament_id` varchar(10) NOT NULL,
  `tournament_name` varchar(50) NOT NULL,
  `tournament_start` int(12) NOT NULL,
  `tournament_desc` text,
  `tournament_req` text,
  `tournament_rules` text,
  `tournament_end` int(12) NOT NULL,
  `tournament_year` int(4) NOT NULL,
  `registration_start` int(12) NOT NULL,
  `registration_end` int(12) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 running, 1 regist end, 2 draw end , 3 tournament end',
  `result` varchar(50) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`tournament_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_tournament` */

insert  into `tb_tournament`(`tournament_id`,`tournament_name`,`tournament_start`,`tournament_desc`,`tournament_req`,`tournament_rules`,`tournament_end`,`tournament_year`,`registration_start`,`registration_end`,`status`,`result`,`type`) values ('NPICT0001','NPIC CUP1',1507500000,'NPIC CUPs','blabla','blabla',1510354800,2017,1504476000,1506031200,4,NULL,'Football (Soccer)'),('NPICT0003','NPIC CUP2',1506808800,'aoskdo','aoskdo','aoskdoa',1509404400,2017,1505340000,1506722400,4,NULL,'Football (Soccer)'),('NPICT0004','NPIC CUP 3',1506895200,'WOKOKWOKOWKWOKWOKO','OWKOKWODKOSKDOKDOKOWKODKWOKODSKSO','OSKODKSODKOSDKOSKDOSDKSOKOSD',1508450400,2017,1505080800,1506463200,4,NULL,'Football (Soccer)'),('NPICT0005','NPIC LOW BRACKET',1504216800,'asdsaok','oaskdokasodkao','oaoskdoako',1506722400,2017,1503266400,1504044000,5,NULL,'Football (Soccer)'),('NPICT0006','motekar cup',1508104800,'','','',1508882400,2017,1506808800,1507932000,4,NULL,'Football (Soccer)'),('NPICT0007','Bupati Cup',1508104800,'aksodkasodk','okasodkasodkaosdkaosdkaos','oaskdoaskdoaksdok',1509055200,2017,1506981600,1507932000,4,NULL,'Football (Soccer)');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(14) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`password`,`role`) values (1,'sysadmin','7bc6c31880aeda581aa34e218af25753',1);

/*Table structure for table `match_list` */

DROP TABLE IF EXISTS `match_list`;

/*!50001 DROP VIEW IF EXISTS `match_list` */;
/*!50001 DROP TABLE IF EXISTS `match_list` */;

/*!50001 CREATE TABLE  `match_list`(
 `loc` varchar(100) ,
 `tName` varchar(50) ,
 `tId` varchar(10) ,
 `mId` int(11) ,
 `teamA` varchar(30) ,
 `teamB` varchar(30) ,
 `winner` varchar(30) ,
 `score` varchar(7) ,
 `stat` int(1) ,
 `rs` int(1) ,
 `round` varchar(15) ,
 `sId` int(10) ,
 `dates` int(11) ,
 `times` int(11) 
)*/;

/*Table structure for table `team_member_view` */

DROP TABLE IF EXISTS `team_member_view`;

/*!50001 DROP VIEW IF EXISTS `team_member_view` */;
/*!50001 DROP TABLE IF EXISTS `team_member_view` */;

/*!50001 CREATE TABLE  `team_member_view`(
 `mname` varchar(50) ,
 `photo` varchar(100) ,
 `major` varchar(10) ,
 `year` int(1) ,
 `stat` int(1) ,
 `teamname` varchar(30) ,
 `teamid` varchar(20) 
)*/;

/*Table structure for table `team_view` */

DROP TABLE IF EXISTS `team_view`;

/*!50001 DROP VIEW IF EXISTS `team_view` */;
/*!50001 DROP TABLE IF EXISTS `team_view` */;

/*!50001 CREATE TABLE  `team_view`(
 `teamid` varchar(20) ,
 `teamname` varchar(30) ,
 `major` varchar(50) ,
 `year` int(1) ,
 `trname` varchar(50) 
)*/;

/*View structure for view match_list */

/*!50001 DROP TABLE IF EXISTS `match_list` */;
/*!50001 DROP VIEW IF EXISTS `match_list` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `match_list` AS (select `ts`.`venue` AS `loc`,`t`.`tournament_name` AS `tName`,`t`.`tournament_id` AS `tId`,`m`.`match_id` AS `mId`,`m`.`team_a` AS `teamA`,`m`.`team_b` AS `teamB`,`m`.`winner` AS `winner`,`m`.`match_score` AS `score`,`m`.`match_status` AS `stat`,`m`.`result` AS `rs`,`m`.`round` AS `round`,`s`.`schedule_id` AS `sId`,`s`.`schedule_date` AS `dates`,`s`.`schedule_time` AS `times` from (((`tb_settings` `ts` join `tb_tournament` `t` on((`t`.`tournament_id` = `ts`.`tournament_id`))) join `tb_match` `m` on((`m`.`tournament_id` = `t`.`tournament_id`))) join `tb_schedule` `s` on((`s`.`schedule_id` = `m`.`schedule_id`))) order by `t`.`tournament_id`,`m`.`round`,`s`.`schedule_date`) */;

/*View structure for view team_member_view */

/*!50001 DROP TABLE IF EXISTS `team_member_view` */;
/*!50001 DROP VIEW IF EXISTS `team_member_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `team_member_view` AS (select `tm`.`member_name` AS `mname`,`tm`.`member_photo` AS `photo`,`tm`.`major` AS `major`,`tm`.`year` AS `year`,`tm`.`status` AS `stat`,`t`.`team_name` AS `teamname`,`t`.`team_id` AS `teamid` from (`tb_team_member` `tm` join `tb_team` `t` on((`tm`.`team_id` = `t`.`team_id`))) order by `t`.`team_id`) */;

/*View structure for view team_view */

/*!50001 DROP TABLE IF EXISTS `team_view` */;
/*!50001 DROP VIEW IF EXISTS `team_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `team_view` AS (select `t`.`team_id` AS `teamid`,`t`.`team_name` AS `teamname`,`t`.`major` AS `major`,`t`.`year` AS `year`,`tr`.`tournament_name` AS `trname` from (`tb_team` `t` join `tb_tournament` `tr` on((`t`.`tournament_id` = `tr`.`tournament_id`))) order by `t`.`team_id`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
