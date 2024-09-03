<?php

require 'BinnarySearchTree.php';
require 'Movie.php';

$bst = new BinnarySearchTree();
$bst->insert(new Movie(40, 'O poderoso chefão'));
$bst->insert(new Movie(20, 'Clube da luta'));
$bst->insert(new Movie(70, 'Matrix'));
$bst->insert(new Movie(10, 'Pulp Fiction: Tempo de Violência'));
$bst->insert(new Movie(50, 'A Origem'));
$bst->insert(new Movie(60, 'O Senhor dos Anéis: O Retorno do Rei'));
$bst->insert(new Movie(30, 'Coringa'));
$bst->insert(new Movie(39, 'A Viagem de Chihiro'));
$bst->insert(new Movie(80, 'Interestelar'));
$bst->insert(new Movie(100, 'Parasita'));


echo "Inorder traversal: ";
$bst->inorder();
echo PHP_EOL;

echo "Preorder traversal: ";
$bst->preorder();
echo PHP_EOL;

echo "Postorder traversal: ";
$bst->postorder();
echo PHP_EOL;

echo "Estrutura da arvore: " . PHP_EOL;
$bst->printTree();
echo PHP_EOL;


echo "Removendo um nó folha: " . PHP_EOL;
$bst->remove(new Movie(10, 'Pulp Fiction: Tempo de Violência'));
$bst->printTree();
echo PHP_EOL;

echo "Removendo um nó com 1 filho: " . PHP_EOL;
$bst->remove(new Movie(50, 'A Origem'));
$bst->printTree();
echo PHP_EOL;

echo "Removendo um nó com2 filhos: " . PHP_EOL;
$bst->remove(new Movie(70, 'Matrix'));
$bst->printTree();
echo PHP_EOL;