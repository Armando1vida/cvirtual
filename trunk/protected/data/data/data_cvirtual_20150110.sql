# Host: localhost  (Version: 5.6.17)
# Date: 2014-07-29 21:07:09
# Generator: MySQL-Front 5.3  (Build 4.133)

/*!40101 SET NAMES utf8 */;


INSERT INTO `cruge_system` (`idsystem`,`name`,`largename`,`sessionmaxdurationmins`,`sessionmaxsameipconnections`,`sessionreusesessions`,`sessionmaxsessionsperday`,`sessionmaxsessionsperuser`,`systemnonewsessions`,`systemdown`,`registerusingcaptcha`,`registerusingterms`,`terms`,`registerusingactivation`,`defaultroleforregistration`,`registerusingtermslabel`,`registrationonlogin`) VALUES (1,'default',NULL,800,10,1,-1,-1,0,0,0,0,NULL,0,'','',1);

#
# Data for table "cruge_user"
#

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`, `nombre`, `apellido`, `documento`, `fecha_nacimiento`, `codigo`) VALUES
(1, NULL, NULL, 1406685837, 'admin', 'armand1live@gmail.com', 'admin', 'admin', 1, 0, 0, NULL, '', '', '0000-00-00', ''),
(2, 1402682125, NULL, NULL, 'invitado', 'inv@yahoo.es', '123456', 'ee465341224c33f3982a7b83c7ab0f6e', 2, 0, 0, NULL, '', '', '0000-00-00', '');
