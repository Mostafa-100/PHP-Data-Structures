<?php

class Queue {
	private $queue;

	public function __construct() {
		$this->queue = [];
	}

	// Add item
	public function enqueue($item) {
		Array_push($this->queue, $item);
	}

	// Delete first item
	public function dequeue() {
		if($this->isEmpty()) {
			return NULL;
		}

		return Array_shift($this->queue);

	}

	// Return first item
	public function peek() {
		if(!$this->isEmpty()) {
			return $this->queue[0];
		}

		return NULL;
	}

	public function isEmpty() {
		return empty($this->queue);
	}
}

?>