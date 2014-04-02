<?php

class Tile {
	
	public $id;
	public $parent;
	public $visited;
	public $is_empty;
	public $x;
	public $y;

	function __construct() {
		$this->visited = false;
	}

}

?>