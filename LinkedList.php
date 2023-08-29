<?php

class Node {

	public $data;
	public $next;

	public function __construct($value) {
		$this->data = $value;
		$this->next = null;
	}

}


class LinkedList {

	private $head;
	private $tail;
	private $length;

	public function __construct($value) {
		$newnode = new Node($value);
		$this->head = $newnode;
		$this->tail = $newnode;
		$this->length = 1;
	}

	public function printAll() {
		$temp = $this->head;

		while($temp != null) {
			echo $temp->data."->";
			$temp = $temp->next;
		}
	}

	public function append($value) {
		$newnode = new Node($value);
		if($this->length == 0) {
			$this->head = $newnode;
			$this->tail = $newnode;
			$this->length++;
		} else {
			$this->tail->next = $newnode;
			$this->tail = $newnode;
		}

		$this->length++;

	}

	public function get($index) {
		if($index < 0 || $index >= $this->length) {
			return null;
		}

		$temp = $this->head;

		for($i = 0; $i < $index; $i++) {
			$temp = $temp->next;
		}

		return $temp;
	}

	public function set($index, $value) {
		$temp = $this->get($index);

		if ($temp) {
			$temp->data = $value;
		}

	}

	public function prepend($value) {

		$newnode = new Node($value);

		if($this->length == 0) {
			$this->head = $newnode;
			$this->tail = $newnode;
		} else {
			$newnode->next = $this->head;
			$this->head = $newnode;
		}

		$this->length++;
	}

	public function insert($index, $value) {

		if ($index < 0 || $index >=$this->length) {
			return null;
		} elseif($index == $this->length - 1) {
			$this->append($value);
			return;
		} elseif($index == 0) {
			$this->prepend($value);
			return;
		} else {
			$newnode = new Node($value);
			$newnode->next = $this->get($index);
			$this->get($index - 1)->next = $newnode;
			$this->length++;
		}
	}

	public function popFirst() {
		if($this->length == 0) {
			return null;
		}

		if($this->length == 1) {
			$this->head = null;
			$this->tail = null;
			return;
		}

		$temp = $this->head->next;
		$this->head = null;
		$this->head = $temp;

		$this->length--;

		if($this->length == 1) {
			$this->tail = $temp;
		}
	}

	public function popLast() {
		$temp = $this->get($this->length - 2);
		$this->tail = null;
		// $this->tail = $temp;
	}
}

?>