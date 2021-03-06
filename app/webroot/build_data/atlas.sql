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
  `extent` int(7) NOT NULL,
  `density` decimal(6,2) NOT NULL,
  `t1` date NOT NULL,
  `t2` date NOT NULL,
  `t3` date NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `flag_path` varchar(45) NOT NULL,
  `areas_and_densities_map_path` varchar(255) NOT NULL,
  `areas_and_densities_p_d_f_path` varchar(255) NOT NULL,
  `areas_and_densities_g_i_s_path` varchar(255) NOT NULL,
  `blocks_and_roads_map_path` varchar(255) NOT NULL,
  `blocks_and_roads_p_d_f_path` varchar(255) NOT NULL,
  `blocks_and_roads_g_i_s_path` varchar(255) NOT NULL,
  `historical_data_map_path` varchar(255) NOT NULL,
  `historical_data_p_d_f_path` varchar(255) NOT NULL,
  `historical_data_g_i_s_path` varchar(255) NOT NULL,
  `world_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `g_d_p_id` int(11) NOT NULL,
  `city_size_id` int(11) NOT NULL,
  `data_set_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1601 ;

DROP TABLE IF EXISTS `city_sizes`;
CREATE TABLE `city_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `data_set_id` int(11) NOT NULL,
  `city_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `data_sets`;
CREATE TABLE `data_sets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `population_t1` int(10) unsigned NOT NULL,
  `population_t2` int(10) unsigned NOT NULL,
  `population_t3` int(10) unsigned NOT NULL,
  `population_change_t1_t2` decimal(5,2) NOT NULL,
  `population_change_t2_t3` decimal(5,2) NOT NULL,
  `urban_extent_composition_urban_t1` decimal(5,2) NOT NULL,
  `urban_extent_composition_urban_t2` decimal(5,2) NOT NULL,
  `urban_extent_composition_urban_t3` decimal(5,2) NOT NULL,
  `urban_extent_composition_suburban_t1` decimal(5,2) NOT NULL,
  `urban_extent_composition_suburban_t2` decimal(5,2) NOT NULL,
  `urban_extent_composition_suburban_t3` decimal(5,2) NOT NULL,
  `urban_extent_composition_rural_t1` decimal(5,2) NOT NULL,
  `urban_extent_composition_rural_t2` decimal(5,2) NOT NULL,
  `urban_extent_composition_rural_t3` decimal(5,2) NOT NULL,
  `urban_extent_composition_open_t1` decimal(5,2) NOT NULL,
  `urban_extent_composition_open_t2` decimal(5,2) NOT NULL,
  `urban_extent_composition_open_t3` decimal(5,2) NOT NULL,
  `urban_extent_change_t1_t2` decimal(5,2) NOT NULL,
  `urban_extent_change_t2_t3` decimal(5,2) NOT NULL,
  `urban_extent_actuals_t1` int(7) NOT NULL,
  `urban_extent_actuals_t2` int(7) NOT NULL,
  `urban_extent_actuals_t3` int(7) NOT NULL,
  `density_built_up_t1` decimal(6,2) NOT NULL,
  `density_built_up_t2` decimal(6,2) NOT NULL,
  `density_built_up_t3` decimal(6,2) NOT NULL,
  `density_built_up_change_t1_t2` decimal(5,2) NOT NULL,
  `density_built_up_change_t2_t3` decimal(5,2) NOT NULL,
  `density_urban_extent_t1` decimal(6,2) NOT NULL,
  `density_urban_extent_t2` decimal(6,2) NOT NULL,
  `density_urban_extent_t3` decimal(6,2) NOT NULL,
  `density_urban_extent_change_t1_t2` decimal(5,2) NOT NULL,
  `density_urban_extent_change_t2_t3` decimal(5,2) NOT NULL,
  `roads_in_built_up_area_pre_1990` decimal(3,2) NOT NULL,
  `roads_in_built_up_area_1990_2015` decimal(3,2) NOT NULL,
  `roads_average_width_pre_1990` decimal(5,2) NOT NULL,
  `roads_average_width_1990_2015` decimal(5,2) NOT NULL,
  `roads_width_under_4m_pre_1990` decimal(3,2) NOT NULL,
  `roads_width_under_4m_1990_2015` decimal(3,2) NOT NULL,
  `roads_width_4_8m_pre_1990` decimal(3,2) NOT NULL,
  `roads_width_4_8m_1990_2015` decimal(3,2) NOT NULL,
  `roads_width_8_12m_pre_1990` decimal(3,2) NOT NULL,
  `roads_width_8_12m_1990_2015` decimal(3,2) NOT NULL,
  `roads_width_12_16m_pre_1990` decimal(3,2) NOT NULL,
  `roads_width_12_16m_1990_2015` decimal(3,2) NOT NULL,
  `roads_width_over_16m_pre_1990` decimal(3,2) NOT NULL,
  `roads_width_over_16m_1990_2015` decimal(3,2) NOT NULL,
  `arterial_roads_density_all_pre_1990` decimal(4,2) NOT NULL,
  `arterial_roads_density_all_1990_2015` decimal(4,2) NOT NULL,
  `arterial_roads_density_wide_pre_1990` decimal(4,2) NOT NULL,
  `arterial_roads_density_wide_1990_2015` decimal(4,2) NOT NULL,
  `arterial_roads_density_narrow_pre_1990` decimal(4,2) NOT NULL,
  `arterial_roads_density_narrow_1990_2015` decimal(4,2) NOT NULL,
  `arterial_roads_walking_all_pre_1990` decimal(4,2) NOT NULL,
  `arterial_roads_walking_all_1990_2015` decimal(4,2) NOT NULL,
  `arterial_roads_walking_wide_pre_1990` decimal(4,2) NOT NULL,
  `arterial_roads_walking_wide_1990_2015` decimal(4,2) NOT NULL,
  `arterial_roads_walking_narrow_pre_1990` decimal(4,2) NOT NULL,
  `arterial_roads_walking_narrow_1990_2015` decimal(4,2) NOT NULL,
  `arterial_roads_beeline_all_pre_1990` decimal(6,2) NOT NULL,
  `arterial_roads_beeline_all_1990_2015` decimal(6,2) NOT NULL,
  `arterial_roads_beeline_wide_pre_1990` decimal(6,2) NOT NULL,
  `arterial_roads_beeline_wide_1990_2015` decimal(6,2) NOT NULL,
  `arterial_roads_beeline_narrow_pre_1990` decimal(6,2) NOT NULL,
  `arterial_roads_beeline_narrow_1990_2015` decimal(6,2) NOT NULL,
  `blocks_plots_average_block_pre_1990` decimal(5,2) NOT NULL,
  `blocks_plots_average_block_1990_2015` decimal(5,2) NOT NULL,
  `blocks_plots_average_informal_plot_pre_1990` decimal(6,2) NOT NULL,
  `blocks_plots_average_informal_plot_1990_2015` decimal(6,2) NOT NULL,
  `blocks_plots_average_formal_plot_pre_1990` decimal(6,2) NOT NULL,
  `blocks_plots_average_formal_plot_1990_2015` decimal(6,2) NOT NULL,
  `blocks_and_plots_composition_atomistic_pre_1990` int(3) NOT NULL,
  `blocks_and_plots_composition_atomistic_1990_2015` int(3) NOT NULL,
  `blocks_and_plots_composition_informal_pre_1990` int(3) NOT NULL,
  `blocks_and_plots_composition_informal_1990_2015` int(3) NOT NULL,
  `blocks_and_plots_composition_formal_pre_1990` int(3) NOT NULL,
  `blocks_and_plots_composition_formal_1990_2015` int(3) NOT NULL,
  `blocks_and_plots_composition_housing_pre_1990` int(3) NOT NULL,
  `blocks_and_plots_composition_housing_1990_2015` int(3) NOT NULL,
  `added_area_total_t1_t2` int(6) NOT NULL,
  `added_area_total_t2_t3` int(6) NOT NULL,
  `added_area_total_percent_t1_t2` decimal(4,1) NOT NULL,
  `added_area_total_percent_t2_t3` decimal(4,1) NOT NULL,
  `added_area_infill_t1_t2` int(6) NOT NULL,
  `added_area_infill_t2_t3` int(6) NOT NULL,
  `added_area_infill_percent_t1_t2` int(3) NOT NULL,
  `added_area_infill_percent_t2_t3` int(3) NOT NULL,
  `added_area_extension_t1_t2` int(6) NOT NULL,
  `added_area_extension_t2_t3` int(6) NOT NULL,
  `added_area_extension_percent_t1_t2` int(3) NOT NULL,
  `added_area_extension_percent_t2_t3` int(3) NOT NULL,
  `added_area_leapfrog_t1_t2` int(6) NOT NULL,
  `added_area_leapfrog_t2_t3` int(6) NOT NULL,
  `added_area_leapfrog_percent_t1_t2` int(3) NOT NULL,
  `added_area_leapfrog_percent_t2_t3` int(3) NOT NULL,
  `added_area_inclusion_t1_t2` int(6) NOT NULL,
  `added_area_inclusion_t2_t3` int(6) NOT NULL,
  `added_area_inclusion_percent_t1_t2` int(3) NOT NULL,
  `added_area_inclusion_percent_t2_t3` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1683 ;

DROP TABLE IF EXISTS `g_d_ps`;
CREATE TABLE `g_d_ps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `data_set_id` int(11) NOT NULL,
  `city_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abbreviation` varchar(5) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `data_set_id` int(11) NOT NULL,
  `city_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

DROP TABLE IF EXISTS `worlds`;
CREATE TABLE `worlds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `data_set_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
