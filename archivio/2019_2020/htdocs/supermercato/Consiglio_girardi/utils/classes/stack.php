<?php

class stack {
    protected $stack;
    protected $limit;

    public function __construct($limit = 100, $initial = array()) {
        $this->stack = $initial; // initialize the stack
        $this->limit = $limit; // stack can only contain this many items
    }

    public function push($item) {
        if (count($this->stack) < $this->limit) {
            return array_unshift($this->stack, $item);
            // prepend item to the start of the array
        }
    }

    public function pop() {
        if ($this->isEmpty()) {
            return false;
        } else {
            return array_shift($this->stack); // pop item from the start of the array
        }
    }

    public function top() {
        return current($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }

    public function shuffle(){
        shuffle($this->stack);
    }
}
