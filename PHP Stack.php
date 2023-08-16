<?php

class Stack {
    protected $stack;
    protected $limit;

    public function __construct($l = 10, $initial = Array()) {
        $this->stack = $initial;
        $this->limit = $l;
    }

    public function push($item) {
        if(count($this->stack) >= $this->limit) {
            echo "Stack is full";
        } else {
            Array_unshift($this->stack, $item);
        }
    }

    public function pop() {
        if($this->isEmpty()) {
            echo "Stack is Empty";
        } else {
            return Array_shift($this->stack);
        }
    }

    public function top() {
        return current($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }
}
  
?>