
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "cpu"
#

INSERT INTO `cpu` VALUES (1,'3.0','10','20'),(10,'11111','1111111','111111');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "gpu"
#

INSERT INTO `gpu` VALUES (2,'8192','10000'),(6,'100000','10000'),(9,'123321','321321');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "hdd"
#

INSERT INTO `hdd` VALUES (5,'10','7200');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "order"
#

INSERT INTO `order` VALUES (1,1,5,'2016-10-07','10:55:21'),(2,2,4,'2016-08-13','13:34:54'),(3,3,3,'2016-10-19','12:05:01'),(4,4,2,'2015-03-07','00:00:33'),(5,5,1,'2015-02-14','14:54:45');

#
# Structure for table "employee"
#

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` bigint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "employee"
#

INSERT INTO `employee` VALUES (1,'Eric',1111111111),(2,'Lenny',1111111112),(3,'Alex',1111111113),(4,'Richard',1111111114),(5,'Bob',3216549870),(6,'ted',1236547890),(7,'Julia',3213213210),(8,'Kelvin',9879879870);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "customers"
#

INSERT INTO `customers` VALUES (1,1,'Calvin','Calvin@wat.com',1233211234),(2,2,'Pete','pete@rektd.com',3213211234),(3,3,'Sean','Sean@topkek.com',9879879876),(4,4,'Victor','victor@ggnore.com',6549874561),(5,5,'Tai','kwangdo@weab.com',5454456789);

#
# Structure for table "order_details"
#

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`,`part_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "order_details"
#

INSERT INTO `order_details` VALUES (1,1,1),(1,2,1),(1,3,1),(1,4,1),(1,5,1),(2,4,1),(2,5,1),(3,2,2),(4,1,5),(4,2,3),(5,1,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "psu"
#

INSERT INTO `psu` VALUES (4,'1500','Yes','Titanium'),(7,'150','no','gold');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "ram"
#

INSERT INTO `ram` VALUES (3,'128','24000','DDR4');

#
# Structure for table "part"
#

DROP TABLE IF EXISTS `part`;
CREATE TABLE `part` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`part_id`),
  KEY `company_name` (`company_name`),
  CONSTRAINT `company_name` FOREIGN KEY (`company_name`) REFERENCES `manufacturer` (`company_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "part"
#

INSERT INTO `part` VALUES (1,'Core i7-6950X Processor','Intel',2299.99,100,'P4'),(2,'GeForce GTX 1080 FTW HYBRID Gaming 8GB PCI-E w/ Triple DP, DVI, HDMI ','EVGA',999.99,2,'G10'),(3,'Dominator Platinum Series 128GB PC4-19200 DDR4 Kit (8 x 16GB)','Corsair',1244.99,1,'R2'),(4,'AXi Series AX1500i Modular Digital Power Supply','Corsair',499.99,3,'PS1'),(5,'10TB Enterprise 3.5in HDD SATA III w/ 512e / 4Kn Formatting, 256MB Cache','Nvidia',799.99,1,'S10'),(6,'1080','Corsair',1000000,1,'w.e'),(7,'a','Corsair',12,12,'a3'),(8,'a','Corsair',12,12,'a3'),(9,'asd','EVGA',123,123,'d'),(10,'dsadsadasdas','Intel',456,456,'jj');

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

INSERT INTO `manufacturer` VALUES ('Corsair','Albert',6543219870),('EVGA','Christine',9876543210),('Intel','John',1234567890),('Nvidia','Josh',1112223333),('Samsung','Kevin',1231234567);
