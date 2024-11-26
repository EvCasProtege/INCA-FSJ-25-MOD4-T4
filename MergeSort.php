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

    public function mergeSort() {
        // Inicia el proceso de ordenamiento
        $this->head = $this->mergeSortRec($this->head);
    }

    private function mergeSortRec($head) {
        if ($head === null || $head->next === null) {
            return $head;
        }
        //Obtiene el nodo del medio de la lista
        $middle = $this->getMiddle($head);
        $nextOfMiddle = $middle->next;
        $middle->next = null;
        //Aplica mergeSort a la parte izquierda de la lista
        $left = $this->mergeSortRec($head);
        //Aplica mergeSort a la parte derecha de la lista
        $right = $this->mergeSortRec($nextOfMiddle);

        //Une las partes izquierda y derecha
        return $this->sortedMerge($left, $right);
    }

    private function getMiddle($head) {
        if ($head === null) {
            return $head;
        }

        $slow = $head;
        $fast = $head->next;
        //Avanza el puntero slow una vez y el puntero fast dos veces esto es para reapuntar el puntero slow al nodo del medio
        while ($fast !== null) {
            $fast = $fast->next;
            if ($fast !== null) {
                $slow = $slow->next;
                $fast = $fast->next;
            }
        }

        return $slow;
    }

    //Función para unir dos listas ordenadas
    private function sortedMerge($left, $right) {
        if ($left === null) {
            return $right;
        }
        if ($right === null) {
            return $left;
        }
        //Selecciona el nodo que tiene el valor más pequeño
        if (strcmp($left->value, $right->value) <= 0) {
            $result = $left;
            $result->next = $this->sortedMerge($left->next, $right);
        } else {
            $result = $right;
            $result->next = $this->sortedMerge($left, $right->next);
        }

        return $result;
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
$palabras = ["manzana", "naranja", "banana", "kiwi", "fresa", "uva"];
foreach ($palabras as $palabra) {
    $lista->append($palabra);
}

// Mostrar la lista antes de ordenar
echo "Lista antes de ordenar:\n";
$lista->printList();

// Ordenar la lista
$lista->mergeSort();

// Mostrar la lista después de ordenar
echo "Lista después de ordenar:\n";
$lista->printList();
?>