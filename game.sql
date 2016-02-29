--
-- Database: `jtobones`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_data`
--

CREATE TABLE IF NOT EXISTS `game_data` (
  `game_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `turn` smallint(6) NOT NULL DEFAULT '1',
  `game_result` smallint(6) NOT NULL,
  `tittle_data` double NOT NULL,
  `player1_id` smallint(6) NOT NULL,
  `player2_id` smallint(6) NOT NULL,
  `title_player` int(10) NOT NULL,
  `Tile_1` int(11) NOT NULL,
  `Tile_2` int(11) NOT NULL,
  `Tile_3` int(11) NOT NULL,
  `Tile_4` int(11) NOT NULL,
  `Tile_5` int(11) NOT NULL,
  `Tile_6` int(11) NOT NULL,
  `Tile_7` int(11) NOT NULL,
  `Tile_8` int(11) NOT NULL,
  `Tile_9` int(11) NOT NULL,
  PRIMARY KEY (`game_id`),
  UNIQUE KEY `game_id` (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;



