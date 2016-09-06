SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cityid` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `latitude` decimal(7,4) NOT NULL,
  `longitude` decimal(7,4) NOT NULL,
  `population` int(11) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `p_d_f_path` varchar(255) NOT NULL,
  `g_i_s_path` varchar(255) NOT NULL,
  `world_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `g_d_p_id` int(11) NOT NULL,
  `city_size_id` int(11) NOT NULL,
  `data_set_id` int(11) NOT NULL,
  `urban_extent_t1_path` varchar(255) NOT NULL,
  `urban_extent_t2_path` varchar(255) NOT NULL,
  `urban_extent_t3_path` varchar(255) NOT NULL,
  `urban_layout_arterial_roads_path` varchar(255) NOT NULL,
  `urban_layout_medians_path` varchar(255) NOT NULL,
  `urban_layout_locales_path` varchar(255) NOT NULL,
  `urban_layout_blocks_path` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201 ;

DROP TABLE IF EXISTS `city_sizes`;
CREATE TABLE `city_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `data_set_id` int(11) NOT NULL,
  `city_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

DROP TABLE IF EXISTS `data_sets`;
CREATE TABLE `data_sets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `density_change_t1_t2` decimal(14,10) NOT NULL,
  `density_change_t2_t3` decimal(14,10) NOT NULL,
  `fragmentation_t1_t2` decimal(14,10) NOT NULL,
  `fragmentation_t2_t3` decimal(14,10) NOT NULL,
  `population_growth_t1_t2` decimal(14,10) NOT NULL,
  `population_growth_t2_t3` decimal(14,10) NOT NULL,
  `urban_expansion_a_t1_t2` decimal(14,10) NOT NULL,
  `urban_expansion_a_t2_t3` decimal(14,10) NOT NULL,
  `average_block_size_t1_t2` decimal(14,10) NOT NULL,
  `average_block_size_t2_t3` decimal(14,10) NOT NULL,
  `gridded_t1_t2` decimal(14,10) NOT NULL,
  `gridded_t2_t3` decimal(14,10) NOT NULL,
  `roads_and_boulevards_t1_t2` decimal(14,10) NOT NULL,
  `roads_and_boulevards_t2_t3` decimal(14,10) NOT NULL,
  `residential_planned_before_development_t1_t2` decimal(14,10) NOT NULL,
  `residential_planned_before_development_t2_t3` decimal(14,10) NOT NULL,
  `streets_less_than_4m_t1_t2` decimal(14,10) NOT NULL,
  `streets_less_than_4m_t2_t3` decimal(14,10) NOT NULL,
  `walking_distance_of_arterial_road_t1_t2` decimal(14,10) NOT NULL,
  `walking_distance_of_arterial_road_t2_t3` decimal(14,10) NOT NULL,
  `suburban_built_up_t1` decimal(10,2) NOT NULL,
  `suburban_built_up_t2` decimal(10,2) NOT NULL,
  `suburban_built_up_t3` decimal(10,2) NOT NULL,
  `urban_built_up_t1` decimal(10,2) NOT NULL,
  `urban_built_up_t2` decimal(10,2) NOT NULL,
  `urban_built_up_t3` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=220 ;

DROP TABLE IF EXISTS `g_d_ps`;
CREATE TABLE `g_d_ps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `data_set_id` int(11) NOT NULL,
  `city_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abbreviation` varchar(5) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `data_set_id` int(11) NOT NULL,
  `city_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `worlds`;
CREATE TABLE `worlds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `data_set_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
