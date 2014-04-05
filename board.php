<?php

require_once('tile.php');

class Board {
	
	public $size;
	//public $max=1;
	public $tiles;
	public $knight;

	function __construct($input, $boardSize) {
		$this->size = $boardSize;
		$this->tiles = array();
		//$this->$max = 1;

		$counter = 1;

		for ($row = 0; $row < $this->size; $row++) {
			for ($column = 0; $column < $this->size; $column++) {
				$tile = new Tile();
				$tile->id = $counter++;
				$tile->parent = null;
				$tile->x = $row;
				$tile->y = $column;
				$tile->visited = false;

				if ($input[$row][$column] == 0) {
					$tile->is_empty = true;
					//$this->$max = $this->max +1;
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

	public function getMaxMoves(){
		$max = 1;
		foreach ($this->tiles as $key => $row) {
			foreach ($row as $k => $col) {
				if($col->is_empty)
					$max++;
			}
		}

		return $max;
	}

	public function getKnightId() {
		return $this->knight->id;
	}

	public function getTileById($id) {
		$row = ($id-1) / $this->size;
		$column = ($id-1) % $this->size;
		return $this->tiles[$row][$column];
	}

	public function setVisited($id,$boolean){
		$row = ($id-1) / $this->size;
		$column = ($id-1) % $this->size;
		$this->tiles[$row][$column]->visited = $boolean;
	}

	public function getKnightX() {
		return $this->knight->x;
	}

	public function getKnightY() {
		return $this->knight->y;
	}

}
?>