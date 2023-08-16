<?php

class PnQueue {
	
	private $queue;

	public function __construct() {
		$this->queue = [];
	}

	public function push($item, $priority = 0) {

		if(!is_numeric($priority)) {
			throw new Exception("Numeric priority value expected");
		}

		isset($this->queue[$priority]) || $this->queue[$priority] = [];

		array_push($this->queue[$priority], $item);

		ksort($this->queue);
	}

	public function pop($priority = 0) {
		array_shift($this->queue[$priority]);
	}

	public function peek($priority = 0) {
		if($this->isEmpty()) {
			return null;
		}

		return $this->queue[$priority][0];
	}

	public function isEmpty($priority = null) {
		if ($priority == null) {
			return empty($this->queue);
		} elseif (is_numeric($priority) && isset($this->queue[$priority])) {
			return empty($this->queue[$priority]);	
		}

		return null;
		
	}

	public function dump($priority = null) {
		if ($priority == null) {
			return $this->queue;
		} elseif(is_numeric($priority) && isset($this->queue[$priority])) {
			return $this->queue[$priority];			
		}

		return null;

	}
}