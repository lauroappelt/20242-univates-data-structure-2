<?php

class AVLTree {
    // Inserir nó na árvore AVL
    public function insert($root, $key) {
        // Inserção normal de uma árvore binária
        if ($root === null) {
            return new Node($key);
        }

        if ($key < $root->key) {
            $root->left = $this->insert($root->left, $key);
        } else if ($key > $root->key) {
            $root->right = $this->insert($root->right, $key);
        } else {
            return $root; // Chaves duplicadas não são permitidas
        }

        // Atualizar altura do nó ancestral
        $root->height = 1 + max($this->getHeight($root->left), $this->getHeight($root->right));

        // Obter o fator de balanceamento para verificar se está desbalanceada
        $balance = $this->getBalance($root);

        // Caso 1: Rotação simples à direita
        if ($balance > 1 && $key < $root->left->key) {
            return $this->rotateRight($root);
        }

        // Caso 2: Rotação simples à esquerda
        if ($balance < -1 && $key > $root->right->key) {
            return $this->rotateLeft($root);
        }

        // Caso 3: Rotação dupla esquerda-direita
        if ($balance > 1 && $key > $root->left->key) {
            $root->left = $this->rotateLeft($root->left);
            return $this->rotateRight($root);
        }

        // Caso 4: Rotação dupla direita-esquerda
        if ($balance < -1 && $key < $root->right->key) {
            $root->right = $this->rotateRight($root->right);
            return $this->rotateLeft($root);
        }

        return $root;
    }

    // Rotação à direita
    private function rotateRight($z) {
        $y = $z->left;
        $T3 = $y->right;

        // Rotação
        $y->right = $z;
        $z->left = $T3;

        // Atualizar alturas
        $z->height = 1 + max($this->getHeight($z->left), $this->getHeight($z->right));
        $y->height = 1 + max($this->getHeight($y->left), $this->getHeight($y->right));

        // Retornar nova raiz
        return $y;
    }

    // Rotação à esquerda
    private function rotateLeft($z) {
        $y = $z->right;
        $T2 = $y->left;

        // Rotação
        $y->left = $z;
        $z->right = $T2;

        // Atualizar alturas
        $z->height = 1 + max($this->getHeight($z->left), $this->getHeight($z->right));
        $y->height = 1 + max($this->getHeight($y->left), $this->getHeight($y->right));

        // Retornar nova raiz
        return $y;
    }

    // Obter a altura de um nó
    private function getHeight($node) {
        if ($node === null) {
            return 0;
        }
        return $node->height;
    }

    // Obter o fator de balanceamento de um nó
    private function getBalance($node) {
        if ($node === null) {
            return 0;
        }
        return $this->getHeight($node->left) - $this->getHeight($node->right);
    }

    // Exibir a árvore em pré-ordem
    public function preOrder($root) {
        if ($root !== null) {
            echo $root->key . " ";
            $this->preOrder($root->left);
            $this->preOrder($root->right);
        }
    }
   
    // Função para printar a árvore no terminal
    public function printTree($root, $indent = "", $isRight = true) {
        if ($root === null) {
            return;
        }

        // Printar o ramo direito
        $this->printTree($root->right, $indent . '     ', false);

        // Printar o nó atual
        echo $indent . ($isRight ? "└── " : "┌── ") . $root->key . "\n";

        // Printar o ramo esquerdo
        $this->printTree($root->left, $indent . '     ', true);
    }
}