<?php

class Node
{
    public function __construct(
        public $value,
        public $left = null,
        public $right = null
    ) {

    }
}
