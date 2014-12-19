# SQL Manager 2007 for MySQL 4.4.1.2
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : xxeo_test


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `xxeo_test`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `xxeo_test`;

#
# Structure for the `domain` table : 
#

CREATE TABLE `domain` (
  `host` VARCHAR(100) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Host',
  `datum` DATE NOT NULL COMMENT 'Datum der Abfrage',
  `tld` VARCHAR(10) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'TLD (.com, .de, .net ,etc.)',
  `ip` VARCHAR(15) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'DOMAIN IP',
  `country` VARCHAR(15) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Serverstandort',
  `archiv` DATE DEFAULT NULL COMMENT 'Webarchive, Alter',
  `dmoz` SMALLINT(4) DEFAULT NULL COMMENT 'DMOZ Verzeichnis eingetragen',
  `yahoo` SMALLINT(4) DEFAULT NULL COMMENT 'Yahoo! DIR eingetragen',
  `delicio` SMALLINT(4) DEFAULT NULL COMMENT 'Del.icio.us Verzeichnis eingetragen',
  `techno` SMALLINT(4) DEFAULT NULL COMMENT 'technoarti Verzeichnis eingetragen',
  PRIMARY KEY (`host`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='einmalige Domaindaten\r\nInnoDB free: 4096 kB\r\n; InnoDB free: 11264 kB';

#
# Structure for the `domain_art` table : 
#

CREATE TABLE `domain_art` (
  `host` VARCHAR(100) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Host',
  `ungeprft` TINYINT(1) DEFAULT '1' COMMENT 'Domain noch nicht geprüft',
  `av` TINYINT(1) DEFAULT NULL COMMENT 'AV Artikelverzeichnis',
  `bb` TINYINT(1) DEFAULT NULL COMMENT 'BB Branchenbuch',
  `bl` TINYINT(1) DEFAULT NULL COMMENT 'BL Blog',
  `bm` TINYINT(1) DEFAULT NULL COMMENT 'BM Bookmark',
  `pt` TINYINT(1) DEFAULT NULL COMMENT 'PT Portal',
  `wk` TINYINT(1) DEFAULT NULL COMMENT 'WK Webkatalog',
  `wm` TINYINT(1) DEFAULT NULL COMMENT 'WM Webmaster',
  `tool` TINYINT(1) DEFAULT NULL COMMENT 'Onlinetools',
  `lp_scan` TINYINT(1) DEFAULT NULL COMMENT 'Linkpartnersuche / Scan',
  PRIMARY KEY (`host`),
  CONSTRAINT `domain_art_fk` FOREIGN KEY (`host`) REFERENCES `domain` (`host`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='Art der Domain; InnoDB free: 11264 kB; (`host`) REFER `xxeo_test/domain`(`host`)';

#
# Structure for the `domain_mtl` table : 
#

CREATE TABLE `domain_mtl` (
  `host` VARCHAR(100) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Host',
  `datum` DATE NOT NULL COMMENT 'Datum der Abfrage',
  `alexa` INTEGER(10) DEFAULT NULL COMMENT 'Alexarank',
  `g_index` MEDIUMINT(7) DEFAULT NULL COMMENT 'Google Index',
  `y_index` MEDIUMINT(7) DEFAULT NULL COMMENT 'Yahoo Index',
  `m_index` MEDIUMINT(7) DEFAULT NULL COMMENT 'MSN Index',
  `g_link` MEDIUMINT(7) DEFAULT NULL COMMENT 'Google Linkdomain',
  `y_link` MEDIUMINT(7) DEFAULT NULL COMMENT 'Yahoo Linkdomain',
  `y_link2` MEDIUMINT(7) DEFAULT NULL COMMENT 'Yahoo Linkdomain2',
  `m_link` MEDIUMINT(7) DEFAULT NULL COMMENT 'MSN Linkdomain',
  `m_link2` MEDIUMINT(7) DEFAULT NULL COMMENT 'MSN Linkdomain2',
  PRIMARY KEY (`host`, `datum`),
  KEY `host` (`host`),
  CONSTRAINT `domain_mtl_fk` FOREIGN KEY (`host`) REFERENCES `domain` (`host`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='monatlich abgefragte Domaineigenschaften; InnoDB free: 11264 kB; (`host`) REFER ';

#
# Structure for the `domain_qrt` table : 
#

CREATE TABLE `domain_qrt` (
  `host` VARCHAR(100) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Host',
  `datum` DATE NOT NULL COMMENT 'Datum der Abfrage',
  `pr` TINYINT(2) DEFAULT NULL COMMENT 'Pagerank mit www',
  `pr2` TINYINT(2) DEFAULT NULL COMMENT 'Pagerank ohne www',
  `robots` TINYINT(1) DEFAULT NULL COMMENT 'Robots.txt Datei vorhanden',
  `sitemap` TINYINT(1) DEFAULT NULL COMMENT 'sitemap.xml Datei vorhanden',
  PRIMARY KEY (`host`, `datum`),
  KEY `host` (`host`),
  CONSTRAINT `domain_qrt_fk` FOREIGN KEY (`host`) REFERENCES `domain` (`host`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='Quartalsweise Abfragen zur Domain; InnoDB free: 11264 kB; (`host`) REFER `xxeo_t';

#
# Structure for the `keyword` table : 
#

CREATE TABLE `keyword` (
  `keyword` VARCHAR(100) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Keyword',
  `gruppe` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Gruppe aus Keywordbildung',
  PRIMARY KEY (`keyword`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='Keyword mit Gruppen (abgeleitet aus Gruppenzusammenstellung ; InnoDB free: 11264';

#
# Structure for the `keyword_mtl` table : 
#

CREATE TABLE `keyword_mtl` (
  `keyword` VARCHAR(100) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Keyword',
  `datum` DATE NOT NULL COMMENT 'Datum der Abfrage',
  `weit` MEDIUMINT(8) DEFAULT NULL COMMENT 'Durchschnitt Suchanfragen weitestgehend',
  `wort` MEDIUMINT(8) DEFAULT NULL COMMENT 'Durchschnitt Suchanfragen wortgruppe',
  `exact` MEDIUMINT(8) DEFAULT NULL COMMENT 'Durchschnitt Suchanfragen exact',
  `preis` FLOAT(4,2) DEFAULT NULL COMMENT 'Klickpreis Adword Anzeigen',
  `wettbewerb` FLOAT(3,2) DEFAULT NULL COMMENT 'Mitbewerberdichte zwischen 0 und 1',
  `ergebnisse` INTEGER(10) DEFAULT NULL COMMENT 'Anzahl Suchergebnisse Google',
  PRIMARY KEY (`keyword`, `datum`),
  KEY `keyword` (`keyword`),
  CONSTRAINT `keyword_mtl_fk` FOREIGN KEY (`keyword`) REFERENCES `keyword` (`keyword`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='monatliche Keywordabfragen; InnoDB free: 11264 kB; (`keyword`) REFER `xxeo_test/';

#
# Structure for the `keyword_schnitt` table : 
#

CREATE TABLE `keyword_schnitt` (
  `keyword` VARCHAR(100) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Keyword',
  `weit_0811` MEDIUMINT(8) DEFAULT NULL COMMENT 'Suchanfragen weitgehend 11/08',
  `wort_0811` MEDIUMINT(8) DEFAULT NULL COMMENT 'Suchanfragen wortgruppe 11/08',
  `exact_0811` MEDIUMINT(8) DEFAULT NULL COMMENT 'Suchanfragen exact 11/08',
  `weit_0812` MEDIUMINT(8) DEFAULT NULL COMMENT 'Suchanfragen weitgehend 12/08',
  `wort_0812` MEDIUMINT(8) DEFAULT NULL COMMENT 'Suchanfragen wortgruppe 12/08',
  `exact_0812` MEDIUMINT(8) DEFAULT NULL COMMENT 'Suchanfragen exact 12/08',
  `weit_0901` MEDIUMINT(8) DEFAULT NULL COMMENT 'Suchanfragen weitgehend 01/09',
  `wort_0901` MEDIUMINT(8) DEFAULT NULL COMMENT 'Suchanfragen wortgruppe 01/09',
  `exact_0901` MEDIUMINT(8) DEFAULT NULL COMMENT 'Suchanfragen exact 01/09',
  `weit_0902` MEDIUMINT(8) DEFAULT NULL COMMENT 'Suchanfragen weitgehend 02/09',
  `wort_0902` MEDIUMINT(8) DEFAULT NULL COMMENT 'Suchanfragen wortgruppe 02/09',
  `exact_0902` MEDIUMINT(8) DEFAULT NULL COMMENT 'Suchanfragen exact 02/09',
  PRIMARY KEY (`keyword`),
  CONSTRAINT `keyword_schnitt_fk` FOREIGN KEY (`keyword`) REFERENCES `keyword` (`keyword`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='Durchschnittliche Suchanfragen laut Google Keywordtool; InnoDB free: 11264 kB; (';

#
# Structure for the `keyword_teile` table : 
#

CREATE TABLE `keyword_teile` (
  `keyword` VARCHAR(100) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Keyword',
  `teil` VARCHAR(25) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Keywordteil',
  `code` VARCHAR(5) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Code',
  PRIMARY KEY (`keyword`, `teil`),
  KEY `keyword` (`keyword`),
  CONSTRAINT `keyword_teile_fk` FOREIGN KEY (`keyword`) REFERENCES `keyword` (`keyword`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='Keywordphrasen in Einzelteile zerlegt und per Code versehen; InnoDB free: 11264 ';

#
# Structure for the `url` table : 
#

CREATE TABLE `url` (
  `url` VARCHAR(255) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'URL',
  `host` VARCHAR(100) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Host',
  `datum` DATE DEFAULT NULL COMMENT 'Datum der ersten Abfrage',
  PRIMARY KEY (`url`),
  KEY `url` (`url`),
  KEY `host` (`host`),
  CONSTRAINT `url_fk` FOREIGN KEY (`host`) REFERENCES `domain` (`host`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='quartalsweise URL-Abfragen; InnoDB free: 3072 kB; InnoDB free: 11264 kB; (`host`';

#
# Structure for the `link` table : 
#

CREATE TABLE `link` (
  `in` VARCHAR(255) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'LinkIn URL',
  `out` VARCHAR(255) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'LinkOut URL',
  `datum` DATE NOT NULL COMMENT 'Datum der Abfrage',
  `exist` TINYINT(1) DEFAULT NULL COMMENT 'Link Existiert',
  `anchor` VARCHAR(100) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Anchor Text',
  `nofol` TINYINT(1) DEFAULT NULL COMMENT 'Attribut Nofollow',
  `java` TINYINT(1) DEFAULT NULL COMMENT 'Javascript/Redirect Link',
  `art` ENUM('Text','Bild') DEFAULT NULL COMMENT 'Art der Verknüpfung (Bild, Text)',
  PRIMARY KEY (`in`, `out`, `datum`),
  KEY `out` (`out`),
  KEY `in` (`in`),
  CONSTRAINT `link_fk2` FOREIGN KEY (`in`) REFERENCES `url` (`url`),
  CONSTRAINT `link_fk3` FOREIGN KEY (`out`) REFERENCES `url` (`url`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='monatliche Linkabfragen; InnoDB free: 11264 kB; (`in`) REFER `xxeo_test/url`(`ur';

#
# Structure for the `platz` table : 
#

CREATE TABLE `platz` (
  `keyword` VARCHAR(100) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Keyword',
  `datum` DATE NOT NULL COMMENT 'Datum der Abfrage',
  `url` VARCHAR(255) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'platzierte URL',
  `suma` ENUM('google.de',' yahoo.de',' msn.de') NOT NULL DEFAULT '' COMMENT 'benutze Suchmaschine',
  `platz` SMALLINT(4) NOT NULL COMMENT 'Platz',
  PRIMARY KEY (`keyword`, `datum`, `url`, `suma`, `platz`),
  KEY `keyword` (`keyword`),
  KEY `url` (`url`),
  CONSTRAINT `platz_fk` FOREIGN KEY (`keyword`) REFERENCES `keyword` (`keyword`),
  CONSTRAINT `platz_fk1` FOREIGN KEY (`url`) REFERENCES `url` (`url`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='Platzierung der Keywords über die Zeit; InnoDB free: 11264 kB; (`keyword`) REFER';

#
# Structure for the `url_qrt` table : 
#

CREATE TABLE `url_qrt` (
  `url` VARCHAR(255) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'URL',
  `datum` DATE NOT NULL COMMENT 'Datum der Abfrage',
  `pr` TINYINT(2) DEFAULT NULL COMMENT 'Seiten-Pagerank',
  `g_link` MEDIUMINT(7) DEFAULT NULL COMMENT 'Google links',
  `y_link` MEDIUMINT(7) DEFAULT NULL COMMENT 'Yahoo links',
  `m_link` MEDIUMINT(7) DEFAULT NULL COMMENT 'MSN links',
  `cache` DATE DEFAULT NULL COMMENT 'Google Cachedate',
  `delicio` SMALLINT(4) DEFAULT NULL COMMENT 'Delicious index',
  `digg` SMALLINT(4) DEFAULT NULL COMMENT 'Digg index',
  `typ` ENUM('html',' pdf',' php',' doc') DEFAULT NULL COMMENT 'Seitentyp (.html, .pdf, .php, .doc)',
  `charset` ENUM('uft8',' iso-8859-1') DEFAULT NULL COMMENT 'Charset / Zeichensatz',
  `mime` ENUM('text/html',' image/jpeg',' application/x-miggibot-unknown') DEFAULT NULL COMMENT 'MIME-Type',
  `size` MEDIUMINT(7) DEFAULT NULL COMMENT 'Dateigröße',
  `lastmod` DATE DEFAULT NULL COMMENT 'letzte Änderung',
  `html` TINYINT(1) DEFAULT NULL COMMENT 'Validierungsfehler HTML',
  `css` TINYINT(1) DEFAULT NULL COMMENT 'Validierungsfehler CSS',
  `hsc` SMALLINT(3) DEFAULT NULL COMMENT 'HTTP Status Code',
  `redirect` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'leitet weiter auf',
  `elemente` SMALLINT(6) DEFAULT NULL COMMENT 'Anzahl Unterelemente',
  `titel` VARCHAR(150) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Seitentitel',
  `desc` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Meta Description',
  `keyword` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Meta Keywords',
  `nofollow` TINYINT(1) DEFAULT NULL COMMENT 'Meta No-Follow',
  `noindex` TINYINT(1) DEFAULT NULL COMMENT 'Meta No-Index',
  `rob_noindex` TINYINT(1) DEFAULT NULL COMMENT 'Robots.txt-No-Index',
  `link_ex` SMALLINT(6) DEFAULT NULL COMMENT 'Anzahl externe Links',
  `link_all` SMALLINT(6) DEFAULT NULL COMMENT 'Anzahl aller Links',
  `wertmaß` FLOAT(4,2) DEFAULT NULL COMMENT 'Autoritätsseite intern (BL_Quantität)',
  `wechsel` FLOAT(4,2) DEFAULT NULL COMMENT 'Geschätzte Wechselfrequenz',
  PRIMARY KEY (`url`, `datum`),
  KEY `url` (`url`),
  CONSTRAINT `url_qrt_fk` FOREIGN KEY (`url`) REFERENCES `url` (`url`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='quartalsweise URL-Abfragen; InnoDB free: 11264 kB; (`url`) REFER `xxeo_test/url`';

#
# Structure for the `webkatalog` table : 
#

CREATE TABLE `webkatalog` (
  `host` VARCHAR(100) COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Host',
  `thema` VARCHAR(25) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Thema des Katalogs',
  `unrel` TINYINT(1) DEFAULT NULL COMMENT 'Katalog uninteressant',
  `kosten` TINYINT(1) DEFAULT NULL COMMENT 'Eintrag kostenpflichtig',
  `backlink` TINYINT(1) DEFAULT NULL COMMENT 'Eintrag backlinkpflichtig',
  `script` TINYINT(1) DEFAULT NULL COMMENT 'Scriptlinks',
  `nofol` TINYINT(1) DEFAULT NULL COMMENT 'No-follow Link',
  `fehler` TINYINT(1) DEFAULT NULL COMMENT 'Seite nicht erreichbar',
  `sedo` TINYINT(1) DEFAULT NULL COMMENT 'Seite steht zum verkauf',
  `tech` TINYINT(1) DEFAULT NULL COMMENT 'technische Probleme auf der Seite',
  `nosub` TINYINT(1) DEFAULT NULL COMMENT 'trägt derzeit nicht ein',
  `bn` VARCHAR(25) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Benutzernamen',
  `pw` VARCHAR(25) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Passwort',
  `kat` VARCHAR(50) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Eintragskategorie',
  `url` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Eintrags URL',
  `kom` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Kommentar',
  PRIMARY KEY (`host`),
  CONSTRAINT `webkatalog_fk` FOREIGN KEY (`host`) REFERENCES `domain_art` (`host`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='Eigeschaften für Webkataloge; InnoDB free: 11264 kB; (`host`) REFER `xxeo_test/d';



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;