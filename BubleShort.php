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
    // bubbleSortAscending() ordena la lista de forma ascendente
    public function bubbleSortDescending() {
        if ($this->head === null) {
            return;
        }
        // Inicializar swapped como verdadero
        $swapped;
        do {
            $swapped = false;
            $current = $this->head;
            // Recorrer la lista
            while ($current->next !== null) {
                if ($current->value < $current->next->value) {
                    // Intercambiar los valores
                    $temp = $current->value;
                    $current->value = $current->next->value;
                    $current->next->value = $temp;
                    $swapped = true;
                }
                $current = $current->next;
            }
            // Si no se realizó ningún intercambio, la lista está ordenada
        } while ($swapped);
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
$numeros = [3, -1, 4, 1, 5, 9, -2, 6, 5, 3, 5];
foreach ($numeros as $numero) {
    $lista.append($numero);
}

// Mostrar la lista antes de ordenar
echo "Lista antes de ordenar:\n";
$lista.printList();

// Ordenar la lista
$lista.bubbleSortDescending();

// Mostrar la lista después de ordenar
echo "Lista después de ordenar:\n";
$lista.printList();
?>
