<?php

class Node {
    public $key;
    public $left;
    public $right;
    public $height;

    public function __construct($key) {
        $this->key = $key;
        $this->left = null;
        $this->right = null;
        $this->height = 1;
    }
}
