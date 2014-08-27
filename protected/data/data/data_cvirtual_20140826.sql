# Host: localhost  (Version: 5.6.17)
# Date: 2014-07-29 21:07:09
# Generator: MySQL-Front 5.3  (Build 4.133)

/*!40101 SET NAMES utf8 */;


INSERT INTO `cruge_system` (`idsystem`,`name`,`largename`,`sessionmaxdurationmins`,`sessionmaxsameipconnections`,`sessionreusesessions`,`sessionmaxsessionsperday`,`sessionmaxsessionsperuser`,`systemnonewsessions`,`systemdown`,`registerusingcaptcha`,`registerusingterms`,`terms`,`registerusingactivation`,`defaultroleforregistration`,`registerusingtermslabel`,`registrationonlogin`) VALUES (1,'default',NULL,800,10,1,-1,-1,0,0,0,0,NULL,0,'','',1);

#
# Data for table "cruge_user"
#

INSERT INTO `cruge_user` (`iduser`,`regdate`,`actdate`,`logondate`,`username`,`email`,`password`,`authkey`,`state`,`totalsessioncounter`,`currentsessioncounter`) VALUES (1,NULL,NULL,1406685837,'admin','armand1live@gmail.com','admin','admin',1,0,0);

