

CREATE TABLE `attendancetbl` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `studentID` int(50) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `yearlevel` int(10) NOT NULL,
  `course` varchar(50) NOT NULL,
  `event` varchar(250) NOT NULL,
  `timeinAM` text NOT NULL,
  `timeoutAM` text NOT NULL,
  `timeinPM` text NOT NULL,
  `timeoutPM` text NOT NULL,
  `date` date NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `IS_EXIST` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;

INSERT INTO attendancetbl VALUES("82","2022018","Diomar Bonalos","1","BSBA-MM","University Week Day 3","15:11:01","","","","2022-11-07","2022-11-10 12:29:33","0");
INSERT INTO attendancetbl VALUES("83","2022018","Diomar Bonalos","1","BSBA-MM","University Week Day 3","12:29:23","","","","2022-11-10","2022-11-10 12:29:33","0");
INSERT INTO attendancetbl VALUES("84","2022018","Diomar Bonalos C.","1","BSBA-MM","University Week Day 3","14:46:19","","","","2022-11-10","2022-11-10 15:02:22","0");
INSERT INTO attendancetbl VALUES("85","2018954","Asumbra, Johnny A.","4","BSA","University Week Day 3","14:52:01","","","","2022-11-10","2022-11-10 15:02:25","0");
INSERT INTO attendancetbl VALUES("86","2018954","Asumbra, Johnny A.","4","BSA","University Week Day 3","16:55:11","19:10:29","19:11:05","19:11:29","2022-11-10","2022-11-10 19:11:29","1");
INSERT INTO attendancetbl VALUES("87","21312","DooDong","1","BSBA-FM","University Week Day 3","20:38:41","","","","2022-11-10","2022-11-10 20:38:54","0");



CREATE TABLE `events` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `eventname` varchar(250) NOT NULL,
  `eventdate` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `IS_EXIST` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;

INSERT INTO events VALUES("53","University Week Day 1","2022-11-03","0","2022-11-04 12:40:37","1");
INSERT INTO events VALUES("54","University Week Day 2","2022-11-04","0","2022-11-03 20:20:47","1");
INSERT INTO events VALUES("55","University Week Day 3","2022-11-05","1","2022-11-09 14:58:25","1");



CREATE TABLE `studentlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentno` int(15) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `yearlevel` enum('1','2','3','4') NOT NULL,
  `course` varchar(50) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `IS_EXIST` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

INSERT INTO studentlist VALUES("15","2022001","Jimz Humphrey Paciente","4","BSBA-MM","09091267598","1","1","2022-11-10 17:20:29");
INSERT INTO studentlist VALUES("16","2022002","Christian Casumpang","4","BSBA-MM","09876543211","1","1","2022-10-15 21:08:59");
INSERT INTO studentlist VALUES("17","2022003","Trisha Nicole Santos","4","BSBA-MM","09123567564","1","1","2022-11-03 20:22:09");
INSERT INTO studentlist VALUES("18","2022004","Geraldine Bautista","4","BSBA-MM","09765432897","1","1","2022-10-15 21:08:59");
INSERT INTO studentlist VALUES("19","2022005","Shalman Mamiscal","4","BSBA-MM","09543217654","1","1","2022-10-15 21:08:59");
INSERT INTO studentlist VALUES("20","2022006","Justine Basa","4","BSBA-MM","09220984567","1","1","2022-10-15 21:08:59");
INSERT INTO studentlist VALUES("21","2022007","Mat Laurence Buenaflor","3","BSBA-MM","09127896512","1","1","2022-10-15 21:08:58");
INSERT INTO studentlist VALUES("22","2022008","Novie Angela Parcellano","3","BSBA-MM","09361903789","1","1","2022-10-15 21:08:58");
INSERT INTO studentlist VALUES("23","2022009","Ella Jane Lumawag ","3","BSBA-MM","09630127456","1","1","2022-10-15 21:08:58");
INSERT INTO studentlist VALUES("24","2022010","Alliah Pendatun","3","BSBA-MM","09261695092","1","1","2022-10-15 21:08:58");
INSERT INTO studentlist VALUES("25","2022011","Ireka Shane Rosal","2","BSBA-MM","09702543789","1","1","2022-10-15 21:08:58");
INSERT INTO studentlist VALUES("26","2022012","Jovelyn Familar","2","BSBA-MM","09670125389","1","1","2022-10-15 21:08:58");
INSERT INTO studentlist VALUES("27","2022013","Prince John Tabuada","2","BSBA-MM","09756672345","1","1","2022-10-15 21:08:57");
INSERT INTO studentlist VALUES("28","2022014","Michael Balofinos","2","BSBA-MM","09105238654","1","1","2022-10-15 21:08:57");
INSERT INTO studentlist VALUES("29","2022015","Abeline Mirafuentes","2","BSBA-MM","09093451900","1","1","2022-10-15 21:08:57");
INSERT INTO studentlist VALUES("30","2022016","Rechel Servañes","1","BSBA-MM","09367512908","1","1","2022-10-15 21:08:57");
INSERT INTO studentlist VALUES("31","2022017","Nelsie Marie Noserale","1","BSBA-MM","09356123890","1","1","2022-10-15 21:08:56");
INSERT INTO studentlist VALUES("32","2022018","Diomar Bonalos C.","1","BSBA-MM","09201502159","1","1","2022-11-10 20:21:53");
INSERT INTO studentlist VALUES("33","2022019","Dwini Anne Rhudy D.","1","BSBA-MM","09092347654","1","1","2022-11-10 14:34:44");
INSERT INTO studentlist VALUES("34","2022020","Robert John Lavente","1","BSBA-MM","09012765987","1","1","2022-10-15 21:08:56");
INSERT INTO studentlist VALUES("47","2018954","Asumbra, Johnny A.","4","BSA","09098314181","1","1","2022-11-10 11:39:26");
INSERT INTO studentlist VALUES("48","2018999","Dela Cruz, Chris Jan C.","1","BSA","090909321","1","1","2022-11-10 20:38:12");
INSERT INTO studentlist VALUES("49","21312","DooDong","1","BSBA-FM","09098314181","1","1","2022-11-10 20:38:14");



CREATE TABLE `users` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `yearlevel` int(11) NOT NULL,
  `password` varchar(500) NOT NULL,
  `remember` tinyint(1) NOT NULL,
  `IS_EXIST` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("1","SuperAdmin","Admin@gmail.com","0","$2y$10$k55p3e5mqsiHuxw.K8GzXO.dq.Ky5iNcBD3f1PZuv9AFi2ey1uUeS","0","1","2022-11-10 20:37:26");
INSERT INTO users VALUES("2","1st Year","1styear@gmail.com","1","$2y$10$k55p3e5mqsiHuxw.K8GzXO.dq.Ky5iNcBD3f1PZuv9AFi2ey1uUeS","0","1","2022-10-17 20:55:56");
INSERT INTO users VALUES("3","2nd Year","2ndyear@gmail.com","2","$2y$10$k55p3e5mqsiHuxw.K8GzXO.dq.Ky5iNcBD3f1PZuv9AFi2ey1uUeS","0","1","2022-10-14 20:41:50");
INSERT INTO users VALUES("4","3rd Year","3rdyear@gmail.com","3","$2y$10$k55p3e5mqsiHuxw.K8GzXO.dq.Ky5iNcBD3f1PZuv9AFi2ey1uUeS","0","1","2022-10-14 20:37:16");
INSERT INTO users VALUES("5","4th Year","4thyear@gmail.com","4","$2y$10$k55p3e5mqsiHuxw.K8GzXO.dq.Ky5iNcBD3f1PZuv9AFi2ey1uUeS","0","1","2022-10-14 20:37:18");

