<?php
class NodeTree {
    public $value;
    public $left;
    public $right;

    function __construct(int $value, $left = null, $right = null) {
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }
}

class BinaryTree {
    public $root;

    function __construct(NodeTree $root) {
        $this->root = $root;
    }

    public function addNode(NodeTree $newNode, NodeTree $rootExplore) {
        if ($rootExplore == null) {
            $rootExplore = $newNode;
            return;
        }

        if ($newNode->value > $rootExplore->value) {
            if ($rootExplore->right == null) {
                $rootExplore->right = $newNode;
            } else {
                $this->addNode($newNode, $rootExplore->right);
            }
        }

        if ($newNode->value < $rootExplore->value) {
            if ($rootExplore->left == null) {
                $rootExplore->left = $newNode;
            } else {
                $this->addNode($newNode, $rootExplore->left);
            }
        }
    }

    public function search(int $value, $rootExplore) {
        if ($rootExplore == null) {
            echo "Value not found";
            return;
        }

        if ($value == $rootExplore->value) {
            echo "Value is found";
            return;
        }

        if ($value > $rootExplore->value) {
            $this->search($value, $rootExplore->right);
        } 

        if($value < $rootExplore->value) {
            $this->search($value, $rootExplore->left);
        }
    }
}
