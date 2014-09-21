CREATE TABLE IF NOT EXISTS `kcounter01` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tos` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

CREATE TABLE IF NOT EXISTS `kcounter02` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tos` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;
