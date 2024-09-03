<?php

require 'Node.php';

class BinnarySearchTree
{
    public function __construct(
        public $root = null
    ) {
    }

    // Inserir valor na árvore
    public function insert($value) {
        $this->root = $this->insertRecursively($this->root, $value);
    }

    //recursão para inserir nó na arvore
    private function insertRecursively($root, $value) {
        //caso root seja null retorna new node
        if ($root === null) {
            return new Node($value);
        }

        //se valor é menor ou maior que o root
        if ($value < $root->value) {
            $root->left = $this->insertRecursively($root->left, $value);
        } else if ($value > $root->value) {
            $root->right = $this->insertRecursively($root->right, $value);
        }

        return $root;
    }

    // Remover um valor da árvore
    public function remove($value) {
        $this->root = $this->removeRecursively($this->root, $value);
    }

    //recursão para remover nó
    private function removeRecursively($root, $value) {
        if ($root === null) {
            return null;
        }

        //se valor é maior ou menor que o root
        if ($value < $root->value) {
            $root->left = $this->removeRecursively($root->left, $value);
        } elseif ($value > $root->value) {
            $root->right = $this->removeRecursively($root->right, $value);
        } else {
            // Encontramos o nó a ser removido
            // Caso 1: Nó sem filhos (nó folha)
            if ($root->left === null && $root->right === null) {
                return null;
            }
            // Caso 2: Nó com um filho
            elseif ($root->left === null) {
                return $root->right;
            } elseif ($root->right === null) {
                return $root->left;
            }
            // Caso 3: Nó com dois filhos
            else {
                // Encontra o sucessor in-ordem (menor valor da subárvore direita)
                $successorValue = $this->minValue($root->right);
                // Substitui o valor do nó pelo sucessor
                $root->value = $successorValue;
                // Remove o sucessor in-ordem
                $root->right = $this->removeRecursively($root->right, $successorValue);
            }
        }

        return $root;
    }

    private function minValue($root) {
        $current = $root;
        while ($current->left !== null) {
            $current = $current->left;
        }
        return $current->value;
    }

    public function search($value, $root = null)
    {
        if ($root == null) {
            $root = $this->root;
        }

        if ($root == null || $root->value->id == $value->id) {
            return $root;
        }

        if ($value->id < $root->value->id) {
            return $this->search($value, $root->left);
        } else {
            return $this->search($value, $root->right);
        }
    }

    // Exibir em in-ordem (esquerda, raiz, direita)
    public function inorder() {
        $this->inorderRecursively($this->root);
    }

    private function inorderRecursively($node) {
        if ($node !== null) {
            $this->inorderRecursively($node->left);
            echo $node->value->id . " ";
            $this->inorderRecursively($node->right);
        }
    }

    // Exibir em pré-ordem (raiz, esquerda, direita)
    public function preorder() {
        $this->preorderRecursively($this->root);
    }

    private function preorderRecursively($node) {
        if ($node !== null) {
            echo $node->value->id . " ";
            $this->preorderRecursively($node->left);
            $this->preorderRecursively($node->right);
        }
    }

    // Exibir em pós-ordem (esquerda, direita, raiz)
    public function postorder() {
        $this->postorderRecursively($this->root);
    }

    private function postorderRecursively($node) {
        if ($node !== null) {
            $this->postorderRecursively($node->left);
            $this->postorderRecursively($node->right);
            echo $node->value->id . " ";
        }
    }

    public function printTree($node = null, $prefix = '', $isLeft = true) {
        if ($node === null) {
            $node = $this->root;
        }

        if ($node->right !== null) {
            $this->printTree($node->right, $prefix . ($isLeft ? "│   " : "    "), false);
        }

        echo $prefix . ($isLeft ? "└── " : "┌── ") . $node->value->id . ' - ' . $node->value->title . "\n";

        if ($node->left !== null) {
            $this->printTree($node->left, $prefix . ($isLeft ? "    " : "│   "), true);
        }
    }
}
