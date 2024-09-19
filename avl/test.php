<?php

require 'AVLTree.php';
require 'Node.php';

// Teste da Árvore AVL
$tree = new AVLTree();
$root = null;

$nodes = [13, 15, 19, 8, 4, 10, 17];

foreach ($nodes as $node) {
    $root = $tree->insert($root, $node);
    $tree->printTree($root) . PHP_EOL;
    ECHO "----------------------------------" . PHP_EOL;
}

// Exibir árvore em pré-ordem
echo "Árvore em pré-ordem:";
$tree->preOrder($root) . PHP_EOL;

// Exibir a estrutura da árvore AVL
echo "Estrutura da árvore AVL:" . PHP_EOL;
$tree->printTree($root);
