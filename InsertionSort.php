<?php
class Node {
    public $value;
    public $next;

    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }
}

class LinkedList {
    private $head;

    public function __construct() {
        $this->head = null;
    }

    public function append($value) {
        $newNode = new Node($value);
        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
    }

    public function insertionSort() {
        if ($this->head === null || $this->head->next === null) {
            return;
        }

        $sorted = null;
        $current = $this->head;
        // Recorrer la lista
        while ($current !== null) {
            $next = $current->next;
            // Si el nodo actual es mayor o igual al último nodo ordenado
            if ($sorted === null || strcmp($sorted->value, $current->value) >= 0) {
                $current->next = $sorted;
                $sorted = $current;
            } else {
                $temp = $sorted;
                // Recorrer la lista ordenada para encontrar el nodo correcto para insertar
                while ($temp->next !== null && strcmp($temp->next->value, $current->value) < 0) {
                    $temp = $temp->next;
                }
                $current->next = $temp->next;
                $temp->next = $current;
            }

            $current = $next;
        }

        $this->head = $sorted;
    }

    public function printList() {
        $current = $this->head;
        while ($current !== null) {
            echo $current->value . " ";
            $current = $current->next;
        }
        echo "\n";
    }
}

// Lista de ejemplo
$lista = new LinkedList();
$nombres = ["Carlos", "Ana", "Pedro", "Beatriz", "Juan", "Elena"];
foreach ($nombres as $nombre) {
    $lista->append($nombre);
}

// Mostrar la lista antes de ordenar
echo "Lista antes de ordenar:\n";
$lista->printList();

// Ordenar la lista
$lista->insertionSort();

// Mostrar la lista después de ordenar
echo "Lista después de ordenar:\n";
$lista->printList();
?>