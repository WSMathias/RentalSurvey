
CREATE TABLE IF NOT EXISTS `details` (
  `ID` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `AREA` float(20,5) DEFAULT NULL,
  `PRICE` float(20,5) DEFAULT NULL,
  `DEPOSIT` float(30,5) DEFAULT NULL,
  `LEASE_PERIOD` int(11) DEFAULT NULL,
  `Lid` bigint(20) NOT NULL
) ;

CREATE TABLE IF NOT EXISTS `places` (
  `id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `location` varchar(150) DEFAULT NULL
) ;

CREATE TABLE IF NOT EXISTS `survey` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `location` varchar(500) DEFAULT NULL,
  `area` float(20,5) DEFAULT NULL,
  `price` float(20,5) DEFAULT NULL,
  `deposit` float(20,5) DEFAULT NULL,
  `lease_period` int(11) DEFAULT NULL
);

