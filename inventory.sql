# Host: localhost  (Version 5.7.15-log)
# Date: 2016-11-29 08:19:50
# Generator: MySQL-Front 5.4  (Build 4.21)
# Internet: http://www.mysqlfront.de/

/*!40101 SET NAMES utf8 */;

#
# Structure for table "customers"
#

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "customers"
#


#
# Structure for table "employee"
#

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "employee"
#


#
# Structure for table "manufacturer"
#

DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE `manufacturer` (
  `company_name` varchar(255) NOT NULL DEFAULT '',
  `contact_name` varchar(255) DEFAULT NULL,
  `phone_number` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`company_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "manufacturer"
#


#
# Structure for table "order"
#

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  CONSTRAINT `employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "order"
#


#
# Structure for table "part"
#

DROP TABLE IF EXISTS `part`;
CREATE TABLE `part` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`part_id`),
  KEY `company_name` (`company_name`),
  CONSTRAINT `company_name` FOREIGN KEY (`company_name`) REFERENCES `manufacturer` (`company_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "part"
#


#
# Structure for table "order_details"
#

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `part_id` (`part_id`),
  CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  CONSTRAINT `part_id` FOREIGN KEY (`part_id`) REFERENCES `part` (`part_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "order_details"
#


#
# Structure for table "hdd"
#

DROP TABLE IF EXISTS `hdd`;
CREATE TABLE `hdd` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `capacity` varchar(255) DEFAULT NULL,
  `rpm` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`part_id`),
  CONSTRAINT `part_id_hdd` FOREIGN KEY (`part_id`) REFERENCES `part` (`part_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "hdd"
#


#
# Structure for table "gpu"
#

DROP TABLE IF EXISTS `gpu`;
CREATE TABLE `gpu` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `vram` varchar(255) DEFAULT NULL,
  `clock_speed` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`part_id`),
  CONSTRAINT `part_id_gpu` FOREIGN KEY (`part_id`) REFERENCES `part` (`part_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "gpu"
#


#
# Structure for table "cpu"
#

DROP TABLE IF EXISTS `cpu`;
CREATE TABLE `cpu` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `clock_speed` varchar(255) DEFAULT NULL,
  `cores` varchar(255) DEFAULT NULL,
  `threads` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`part_id`),
  CONSTRAINT `part_id_cpu` FOREIGN KEY (`part_id`) REFERENCES `part` (`part_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "cpu"
#


#
# Structure for table "psu"
#

DROP TABLE IF EXISTS `psu`;
CREATE TABLE `psu` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `wattage` varchar(255) DEFAULT NULL,
  `modularity` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`part_id`),
  CONSTRAINT `part_id_psu` FOREIGN KEY (`part_id`) REFERENCES `part` (`part_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "psu"
#


#
# Structure for table "ram"
#

DROP TABLE IF EXISTS `ram`;
CREATE TABLE `ram` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(255) DEFAULT NULL,
  `speed` varchar(255) DEFAULT NULL,
  `architecture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`part_id`),
  CONSTRAINT `part_id_ram` FOREIGN KEY (`part_id`) REFERENCES `part` (`part_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "ram"
#

