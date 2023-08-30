
DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `barangid` int(11) NOT NULL AUTO_INCREMENT,
  `barangnama` varchar(255) DEFAULT NULL,
  `barangharga` int(11) DEFAULT NULL,
  PRIMARY KEY (`barangid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

insert  into `barang`(`barangid`,`barangnama`,`barangharga`) values 
(1,'P-23080001',10000),
(4,'P-23080002',20000),
(5,'P-23080003',12000),
(6,'P-23080004',15000),
(7,'P-23080005',20000),
(8,'P-23080006',14000),
(9,'P-23080007',5000),
(10,'P-23080008',17000),
(11,'P-23080009',19000);

/*Table structure for table `detailtransaksi` */

DROP TABLE IF EXISTS `detailtransaksi`;

CREATE TABLE `detailtransaksi` (
  `dtid` int(11) NOT NULL AUTO_INCREMENT,
  `dtinvoice` char(20) DEFAULT NULL,
  `dtbarang` int(11) DEFAULT NULL,
  `dtjumlah` int(11) DEFAULT NULL,
  `dttotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`dtid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detailtransaksi` */

insert  into `detailtransaksi`(`dtid`,`dtinvoice`,`dtbarang`,`dtjumlah`,`dttotal`) values 
(9,'INV-23080001',1,2,20000);

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `pasienid` int(11) NOT NULL AUTO_INCREMENT,
  `pasienkode` char(20) DEFAULT NULL,
  `pasiennama` varchar(255) DEFAULT NULL,
  `pasientelepon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pasienid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pasien` */

insert  into `pasien`(`pasienid`,`pasienkode`,`pasiennama`,`pasientelepon`) values 
(2,'EM-23080001','Tuti','082171538531'),
(5,'EM-23080002','Adil','082171538532'),
(6,'EM-23080003','Wawan','083193854256'),
(7,'EM-23080004','Budi','082147824784');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `tnoinvoice` char(20) DEFAULT NULL,
  `ttanggal` date DEFAULT NULL,
  `tpasien` int(11) DEFAULT NULL,
  `ttotalitem` int(11) DEFAULT NULL,
  `ttotalharga` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi` */

insert  into `transaksi`(`tid`,`tnoinvoice`,`ttanggal`,`tpasien`,`ttotalitem`,`ttotalharga`) values 
(3,'INV-23080001','2023-08-28',2,1,20000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
