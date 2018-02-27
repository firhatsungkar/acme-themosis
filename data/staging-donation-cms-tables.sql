# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21-0ubuntu0.16.04.1)
# Database: staging
# Generation Time: 2018-02-12 19:53:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table gateway_responses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gateway_responses`;

CREATE TABLE `gateway_responses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL,
  `owner_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `result` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resultcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `command` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avs_result` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cvv2_result` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `error` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `initiated_at` datetime DEFAULT NULL,
  `resolved_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_gateway_responses_on_owner_id_and_owner_type` (`owner_id`,`owner_type`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `gateway_responses` WRITE;
/*!40000 ALTER TABLE `gateway_responses` DISABLE KEYS */;

INSERT INTO `gateway_responses` (`id`, `owner_id`, `owner_type`, `ip`, `result`, `amount`, `resultcode`, `authcode`, `command`, `avs_result`, `cvv2_result`, `error`, `initiated_at`, `resolved_at`, `created_at`, `updated_at`)
VALUES
	(1,1,'Member','173.68.94.146','Approved','25.00','A','036120','sale','Address: Match & 5 Digit Zip: Match','Match','Approved','2017-06-14 14:25:05','2017-06-14 14:25:06','2017-06-14 14:25:05','2017-06-14 14:25:06'),
	(2,2,'Member','173.68.94.146','Approved','25.00','A','036182','sale','Address: Match & 5 Digit Zip: Match','No Match','Approved','2017-06-14 14:26:46','2017-06-14 14:26:46','2017-06-14 14:26:46','2017-06-14 14:26:46');

/*!40000 ALTER TABLE `gateway_responses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gateway_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gateway_tokens`;

CREATE TABLE `gateway_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL,
  `owner_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masked_card_num` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_ref` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_gateway_tokens_on_owner_id_and_owner_type` (`owner_id`,`owner_type`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table givers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `givers`;

CREATE TABLE `givers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `member_form` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `print_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anonymous` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_givers_on_member_id` (`member_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table internal_notes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `internal_notes`;

CREATE TABLE `internal_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL,
  `owner_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `administrator_id` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_internal_notes_on_administrator_id` (`administrator_id`) USING BTREE,
  KEY `index_internal_notes_on_owner_id` (`owner_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table member_levels
# ------------------------------------------------------------

DROP TABLE IF EXISTS `member_levels`;

CREATE TABLE `member_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tier` int(11) DEFAULT NULL,
  `is_advanced_level` tinyint(1) DEFAULT '0',
  `price` int(11) DEFAULT NULL,
  `monthly_price` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description1` text COLLATE utf8_unicode_ci,
  `description2` text COLLATE utf8_unicode_ci,
  `image_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_founder_level` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `member_levels` WRITE;
/*!40000 ALTER TABLE `member_levels` DISABLE KEYS */;

INSERT INTO `member_levels` (`id`, `name`, `tier`, `is_advanced_level`, `price`, `monthly_price`, `discount_price`, `short_description`, `description1`, `description2`, `image_uid`, `image_alt`, `image_caption`, `is_founder_level`, `created_at`, `updated_at`)
VALUES
	(37,'Member',1,0,4000,NULL,3500,'Includes a subscription to our <em>High Line Magazine</em> and more!','<ul><li>Your personal membership card</li><li>Complete map of the High Line</li><li>Special notification of events and activities</li><li>A subscription to our biannual <em>High Line Magazine</em></li></ul>',NULL,'member_levels/member_level_Member/image_1496925435.png','High Line magazine',NULL,0,'2017-06-08 12:37:15','2017-06-08 12:37:15'),
	(38,'Spike',2,0,7500,1000,6500,'Includes invitations to member-only tours, discounts and more!','<ul><li>An invitation for two to members-only High Line tours</li><li>10% discount on all High Line merchandise online and in the park</li><li>10% discounts at <a href=\'javascript:void(0);\' data-toggle=\'modal\' data-target=\'#membership-discounts\'>neighborhood stores</a> including Diane von Furstenberg, Amy’s Bread, and 192 Books, among others</li></ul>','<ul><li>High Line membership card</li><li>Complete map of the High Line</li><li>Special notification of events</li><li>Biannual <em>High Line Magazine</em></li></ul>','member_levels/member_level_Spike/image_1496925437.png','Map of the High Line',NULL,0,'2017-06-08 12:37:17','2017-06-08 12:37:17'),
	(39,'Rail',3,0,15000,2000,13500,'Includes a year-long, 29-issue subscription to <em>New York</em> magazine and more!','<ul><li>Advance registration for our most popular tours and events</li><li>Early invitation to purchase tickets to our summer event on the High Line and other exciting events</li><li>A year-long 29-issue subscription to <em>New York</em> magazine (a $9.97 value)</li></ul>','<ul><li>Invitations for two to members-only tours</li><li>10% discount on all High Line merchandise</li><li>10% discounts at <a href=\'javascript:void(0);\' data-toggle=\'modal\' data-target=\'#membership-discounts\'>neighborhood stores</a></li><li>High Line membership card</li><li>Complete map of the High Line</li><li>Special notification of events</li><li>Biannual <em>High Line Magazine</em></li></ul>','member_levels/member_level_Rail/image_1496925438.png','New York Magazine',NULL,0,'2017-06-08 12:37:18','2017-06-08 12:37:18'),
	(40,'Beam',4,0,35000,3000,NULL,'Includes our exclusive High Line key ring and more!','<ul><li>Acknowledgment in our biannual <em>High Line Magazine</em></li><li>An exclusive High Line key-ring</li></ul>','<ul><li>Advance registration for our most popular tours and events</li><li>Early invitation to purchase tickets to our summer event on the High Line and other events</li><li>A year-long 29-issue subscription to <em>New York</em> magazine (a $9.97 value)</li><li>Invitations for two to members-only tours</li><li>10% discount on all High Line merchandise</li><li>10% discounts at <a href=\'javascript:void(0);\' data-toggle=\'modal\' data-target=\'#membership-discounts\'>neighborhood stores</a></li><li>High Line membership card</li><li>Complete map of the High Line</li><li>Special notification of events</li><li>Biannual <em>High Line Magazine</em></li></ul>','member_levels/member_level_Beam/image_1496925439.png','High Line key ring',NULL,0,'2017-06-08 12:37:20','2017-06-08 12:37:20'),
	(41,'Track',5,0,50000,4500,NULL,'Includes invitations to special member receptions held in advance of select events and more!','<ul><li>Invitation to member receptions held in advance of select events</li><li>Beautiful High Line journal and pen, perfect for writing or sketching in the park</li></ul>','<ul><li>Acknowledgment in our biannual <em>High Line Magazine</em></li><li>An exclusive High Line key-ring</li><li>Advance registration for our most popular tours and events</li><li>Early invitation to purchase tickets to our summer event on the High Line and other exciting events</li><li>A year-long 29-issue subscription to <em>New York</em> magazine (a $9.97 value)</li><li>Invitations for two to members-only tours</li><li>10% discount on all High Line merchandise</li><li>10% discounts at <a href=\'javascript:void(0);\' data-toggle=\'modal\' data-target=\'#membership-discounts\'>neighborhood stores</a></li><li>High Line membership card</li><li>Complete map of the High Line</li><li>Special notification of events</li><li>Biannual <em>High Line Magazine</em></li></ul>','member_levels/member_level_Track/image_1496925442.png','High Line journal',NULL,0,'2017-06-08 12:37:22','2017-06-08 12:37:22'),
	(42,'Trestle',6,0,75000,6500,NULL,'Includes our signature wind-proof High Line umbrella and more!','<ul><li>Invitation to a special Trestle recognition event, acknowledging the leadership role of Trestle members</li><li>Our signature wind-proof High Line umbrella</li></ul>','<ul><li>Invitation to member receptions held in advance of select events</li><li>Beautiful High Line journal and pen</li><li>Acknowledgment in our biannual <em>High Line Magazine</em></li><li>An exclusive High Line key-ring</li><li>Advance registration for our most popular tours and events</li><li>Early invitation to purchase tickets to our summer event on the High Line and other exciting events</li><li>A year-long 29-issue subscription to <em>New York</em> magazine (a $9.97 value)</li><li>Invitations for two to members-only tours</li><li>10% discount on all High Line merchandise</li><li>10% discounts at <a href=\'javascript:void(0);\' data-toggle=\'modal\' data-target=\'#membership-discounts\'>neighborhood stores</a></li><li>High Line membership card</li><li>Complete map of the High Line</li><li>Special notification of events</li><li>Biannual <em>High Line Magazine</em></li></ul>','member_levels/member_level_Trestle/image_1496925443.png','Wind-proof High Line umbrella',NULL,0,'2017-06-08 12:37:23','2017-06-08 12:37:23'),
	(43,'Advocate',7,0,150000,12500,NULL,'Includes a limited-edition Coach tote designed for Friends of the High Line and more!','<ul><li>In addition to all membership benefits, members of the Founders Circle receive special benefits and recognition to acknowledge their leadership, including:</li><li>Invitation to the Founders Circle annual event</li><li>Limited-edition Coach tote designed for Friends of the High Line (limited quantity available)</li><li>Advance notice of special tours, lectures, and social events</li></ul>','Friends of the High Line also offers additional benefits and recognition to members of our <a href=\"/support/high-line-council\">High Line Council</a>.','member_levels/member_level_Advocate/image_1496925444.png','Coach tote designed for Friends of the High Line',NULL,1,'2017-06-08 12:37:24','2017-06-08 12:37:24'),
	(44,'Sustainer',8,0,300000,25000,NULL,'Includes a signed print by one of the High Line photographers and more!','<ul><li>In addition to all membership benefits, members of the Founders Circle receive special benefits and recognition to acknowledge their leadership, including:</li><li>Signed print by one of the High Line photographers</li><li>Invitation to the Founders Circle annual event</li><li>Limited-edition Coach tote designed for Friends of the High Line (limited quantity available)</li><li>Advance notice of special tours, lectures, and social events</li></ul>','Friends of the High Line also offers additional benefits and recognition to members of our <a href=\"/support/high-line-council\">High Line Council</a>.',NULL,NULL,NULL,1,'2017-06-08 12:37:25','2017-06-08 12:37:25'),
	(45,'Benefactor',9,1,500000,NULL,NULL,'Includes an invitation to our annual High Line Council member reception and other benefits.','<ul><li>An invitation to our annual High Line Council member reception</li><li>Invitations to special events, tours, and presentations</li><li>Advance notice and preferred access to all arts, horticultural, and design programs</li><li>Annual recognition as members of this leadership circle, published in our <em>High Line Magazine</em> for supporters</li><li>All the other benefits and recognition due to members of Friends of the High Line</li></ul>',NULL,NULL,NULL,NULL,NULL,'2017-06-08 12:37:26','2017-06-08 12:37:26'),
	(46,'Patron',10,1,1000000,NULL,NULL,'Includes a signed copy of High Line: The Inside Story of New York City\'s Park in the Sky and other benefits.','<ul><li>Signed copy of High Line: The Inside Story of New York City\'s Park in the Sky written by Friends of the High Line Co-Founders, Robert Hammond & Joshua David</li><li>An invitation to our annual High Line Council member reception</li><li>Invitations to special events, tours, and presentations</li><li>Advance notice and preferred access to all arts, horticultural, and design programs</li><li>Annual recognition as members of this leadership circle, published in our <em>High Line Magazine</em> for supporters</li><li>All the other benefits and recognition due to members of Friends of the High Line</li></ul>',NULL,NULL,NULL,NULL,NULL,'2017-06-08 12:37:27','2017-06-08 12:37:27'),
	(47,'Champion',11,1,2500000,NULL,NULL,'Includes invitations to High Line briefings and receptions hosted by Friends of the High Line and held in exclusive venues.','<ul><li>Invitations to High Line briefings and receptions hosted by Friends of the High Line and held in exclusive venues</li><li>A private tour for you and eight guests of the High Line at the Rail Yards</li><li>Signed copy of High Line: The Inside Story of New York City\'s Park in the Sky written by Friends of the High Line Co-Founders, Robert Hammond & Joshua David</li><li>An invitation to our annual High Line Council member reception</li><li>Invitations to special events, tours, and presentations</li><li>Advance notice and preferred access to all arts, horticultural, and design programs</li><li>Annual recognition as members of this leadership circle, published in our <em>High Line Magazine</em> for supporters</li><li>All the other benefits and recognition due to members of Friends of the High Line</li></ul>',NULL,NULL,NULL,NULL,NULL,'2017-06-08 12:37:28','2017-06-08 12:37:28'),
	(48,'Visionary',12,1,5000000,NULL,NULL,'Includes privileged access to the High Line’s senior staff, with personal project briefings, customizable to fit your programmatic interest and other benefits.','<ul><li>Privileged access to the High Line’s senior staff, with personal project briefings, customizable to fit your programmatic interest</li><li>Invitations to events with top High Line leadership, including Board Members and supporters of the Campaign for the High Line</li><li>Invitations to High Line briefings and receptions hosted by Friends of the High Line and held in exclusive venues</li><li>A private tour for you and eight guests of the High Line at the Rail Yards</li><li>Signed copy of High Line: The Inside Story of New York City\'s Park in the Sky written by Friends of the High Line Co-Founders, Robert Hammond & Joshua David</li><li>An invitation to our annual High Line Council member reception</li><li>Invitations to special events, tours, and presentations</li><li>Advance notice and preferred access to all arts, horticultural, and design programs</li><li>Annual recognition as members of this leadership circle, published in our <em>High Line Magazine</em> for supporters</li><li>All the other benefits and recognition due to members of Friends of the High Line</li></ul>',NULL,NULL,NULL,NULL,NULL,'2017-06-08 12:37:30','2017-06-08 12:37:30');

/*!40000 ALTER TABLE `member_levels` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_form` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `print_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `active` tinyint(1) DEFAULT '1',
  `member_level` int(11) DEFAULT '0',
  `plant_level` int(11) DEFAULT '0',
  `waive_benefits` tinyint(1) DEFAULT '0',
  `anonymous` tinyint(1) DEFAULT '0',
  `total` int(11) DEFAULT '0',
  `test` tinyint(1) DEFAULT '0',
  `constituent_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recurring_gift_import_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authorized_at` datetime DEFAULT NULL,
  `receipt_sent_at` datetime DEFAULT NULL,
  `reconciled_at` datetime DEFAULT NULL,
  `reconciled_by` int(11) DEFAULT NULL,
  `exported_at` datetime DEFAULT NULL,
  `exported_by` int(11) DEFAULT NULL,
  `monthly_gift_ended_at` datetime DEFAULT NULL,
  `monthly_gift_ended_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_members_on_exported_by` (`exported_by`) USING BTREE,
  KEY `index_members_on_monthly_gift_ended_at` (`monthly_gift_ended_at`) USING BTREE,
  KEY `index_members_on_monthly_gift_ended_by` (`monthly_gift_ended_by`) USING BTREE,
  KEY `index_members_on_reconciled_by` (`reconciled_by`) USING BTREE,
  KEY `index_members_on_test` (`test`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;

INSERT INTO `members` (`id`, `member_form`, `referer`, `title`, `first_name`, `last_name`, `print_name`, `company`, `phone`, `email`, `notes`, `active`, `member_level`, `plant_level`, `waive_benefits`, `anonymous`, `total`, `test`, `constituent_id`, `recurring_gift_import_id`, `authorized_at`, `receipt_sent_at`, `reconciled_at`, `reconciled_by`, `exported_at`, `exported_by`, `monthly_gift_ended_at`, `monthly_gift_ended_by`, `created_at`, `updated_at`)
VALUES
	(1,'donation','wendyherm','Mr.','Joseph','Leo',NULL,'Def Method Incorporated','2122561460','joe@defmethod.com','',1,0,0,0,1,2500,0,NULL,NULL,NULL,'2017-06-14 14:25:08',NULL,NULL,NULL,NULL,NULL,NULL,'2017-06-14 14:25:06','2017-06-14 14:25:08'),
	(2,'donation','','Mr.','Joseph','Leo','','Def Method Incorporated','2122561460','joe@defmethod.com','',1,0,0,0,0,2500,0,NULL,NULL,NULL,'2017-06-14 14:26:50',NULL,NULL,NULL,NULL,NULL,NULL,'2017-06-14 14:26:46','2017-06-14 14:26:50');

/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table membership_constituents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `membership_constituents`;

CREATE TABLE `membership_constituents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `constituent_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recurring_gift_import_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_lines` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table membership_months
# ------------------------------------------------------------

DROP TABLE IF EXISTS `membership_months`;

CREATE TABLE `membership_months` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` datetime DEFAULT '2015-01-01 00:00:00',
  `expected_total` int(11) DEFAULT '0',
  `received_total` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_membership_months_on_month` (`month`) USING BTREE,
  KEY `index_membership_months_on_expected_total` (`expected_total`) USING BTREE,
  KEY `index_membership_months_on_received_total` (`received_total`) USING BTREE,
  KEY `index_membership_months_on_status` (`status`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `membership_months` WRITE;
/*!40000 ALTER TABLE `membership_months` DISABLE KEYS */;

INSERT INTO `membership_months` (`id`, `month`, `expected_total`, `received_total`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'2017-07-01 13:00:00',0,0,0,'2017-07-01 05:00:27','2017-07-01 05:00:27'),
	(2,'2017-08-01 13:00:00',0,0,0,'2017-08-01 05:00:11','2017-08-01 05:00:11'),
	(3,'2017-09-01 13:00:00',0,0,0,'2017-09-01 05:00:10','2017-09-01 05:00:10'),
	(4,'2017-11-01 13:00:00',0,0,0,'2017-11-01 05:00:11','2017-11-01 05:00:11'),
	(5,'2017-12-01 14:00:00',0,0,0,'2017-12-01 05:00:09','2017-12-01 05:00:09'),
	(6,'2018-01-01 14:00:00',0,0,0,'2018-01-01 05:00:07','2018-01-01 05:00:07'),
	(7,'2018-02-01 14:00:00',0,0,0,'2018-02-01 05:00:07','2018-02-01 05:00:07');

/*!40000 ALTER TABLE `membership_months` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table memorials
# ------------------------------------------------------------

DROP TABLE IF EXISTS `memorials`;

CREATE TABLE `memorials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kind` int(11) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_memorials_on_member_id` (`member_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table monthly_gifts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `monthly_gifts`;

CREATE TABLE `monthly_gifts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `membership_month_id` int(11) DEFAULT NULL,
  `gift_for` datetime DEFAULT NULL,
  `expected_amount` int(11) DEFAULT '0',
  `received_amount` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `first_attempt_id` int(11) DEFAULT NULL,
  `first_attempt_at` datetime DEFAULT NULL,
  `second_attempt_id` int(11) DEFAULT NULL,
  `second_attempt_at` datetime DEFAULT NULL,
  `third_attempt_id` int(11) DEFAULT NULL,
  `third_attempt_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_monthly_gifts_on_expected_amount` (`expected_amount`) USING BTREE,
  KEY `index_monthly_gifts_on_first_attempt_at` (`first_attempt_at`) USING BTREE,
  KEY `index_monthly_gifts_on_first_attempt_id` (`first_attempt_id`) USING BTREE,
  KEY `index_monthly_gifts_on_gift_for` (`gift_for`) USING BTREE,
  KEY `index_monthly_gifts_on_member_id` (`member_id`) USING BTREE,
  KEY `index_monthly_gifts_on_membership_month_id` (`membership_month_id`) USING BTREE,
  KEY `index_monthly_gifts_on_received_amount` (`received_amount`) USING BTREE,
  KEY `index_monthly_gifts_on_second_attempt_at` (`second_attempt_at`) USING BTREE,
  KEY `index_monthly_gifts_on_second_attempt_id` (`second_attempt_id`) USING BTREE,
  KEY `index_monthly_gifts_on_status` (`status`) USING BTREE,
  KEY `index_monthly_gifts_on_third_attempt_at` (`third_attempt_at`) USING BTREE,
  KEY `index_monthly_gifts_on_third_attempt_id` (`third_attempt_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table recipients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `recipients`;

CREATE TABLE `recipients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_recipients_on_member_id` (`member_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
