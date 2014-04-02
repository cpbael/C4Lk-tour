<?php

require_once('tile.php');

class Board {
	
	public $size;
	public $tiles;
	public $knight;

	function __construct($input, $boardSize) {
		$this->size = $boardSize;
		$this->tiles = array();

		$counter = 1;

		for ($row = 0; $row < $this->size; $row++) {
			for ($column = 0; $column < $this->size; $column++) {
				$tile = new Tile();
				$tile->id = $counter++;
				$tile->parent = null;
				$tile->x = $row;
				$tile->y = $column;

				if ($input[$row][$column] == 0) {
					$tile->is_empty = true;
				}
				else {
					$tile->is_empty = false;
				}

				$this->tiles[$row][$column] = $tile;
				
				if ($input[$row][$column] == 1 ) {
					$this->knight = $tile;
				}
			}
		}
	}

}
?>