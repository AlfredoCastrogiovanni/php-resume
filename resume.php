<?php


// Dichiarazione variabili //

$x;


// Dichiarazione e assegnazione variabili //

$x = 0;


// Costanti

define(name, value, 'case-insensitive');
// Una costante non ha bisogno del $ prima del nome di essa
// Non puo' essere cambiato durante lo script
// Le costanti sono automaticamete globali


// PHP Casting //

$x = (String) $x;
// Si puo' cambiare il tipo di una variabile con il casting 
// Inserendo all'interno delle parentesi il tipo a cui si desidera convertire la variabile


// Blocco if-else //

if(1 < 2) {
    # code...
} else {
    # code...
}


// Operatore ternario //

$x = 'Condizione' ? "Valore se vero" : "Valore se falso";


// Null coalescing //

$x = expr1 ?? expr2;
// Se expr1 esiste, il valore di x sara' quello, altrimenti sara' expr2


// Blocco elseif //

if(1 < 2) {
    # code...
} elseif(1 < 3) {
    # code...
}


// Blocco switch //

switch ($favcolor) {
    case "red":
        echo "Il tuo colore preferito e' il rosso!";
        break;
        // Interrompe il blocco
    case "blue":
        "Il tuo colore preferito e' il blu!";
        //break;
        continue;
        // Se presente al posto del break, non interrompe lo switch ma continua con le condizioni
    case "green":
    case "purple":
        // Questa sintassi permette di inserire piu' condizioni nello stesso blocco di codice
        echo "Il tuo colore preferito e' il verde o il viola!";
        break;
    default:
        echo "Il tuo colore preferito non e' ne il rosso, ne il blu, ne il verde!";
}


// Blocco for //

for($i=0; $i < 5; $i++) {
    # code...
}


// Blocco while //

while($a <= 10) {
    # code...
}


// Blocco do...while //

do {

} while($a <= 10);


// Blocco foreach //

foreach($array as $key => $value) {
    # code...
}

// break and continue //

// le keyword break e continue possono essere utilizzate in tutti i loop ed hanno la stessa funzione che assumono nello switch


// Dichiarazione e chiamata di funzione //

function FunctionName(String $argument = 'Default Value') : Returntype {
    # code...
}

FunctionName();

// Argomenti by reference //

// un argomento puo' essere passato ad una funzione by reference attraverso la keywork &
// Se viene passato by reference, il valore dela variabile passata cambiera' in concomitanza con il valore dell'argomento


// ========== Array ========== //

// Array indicizzato

$cars = array("Volvo", "BMW", "Toyota");
$cars = ["Volvo", "BMW", "Toyota"];

$cars[] = 'Audi'; // Aggiunge un elemento alla fine dell'array

// Array associativo

$car = array(
    "brand"=>"Ford",
    "model"=>"Mustang",
    "year"=>1964
);
$car = [
    "brand"=>"Ford",
    "model"=>"Mustang",
    "year"=>1964
];

// Array multidimensionale

$cars = array (
    array("Volvo", 22, 18),
    array("BMW", 15, 13),
    array("Saab", 5, 2),
    array("Land Rover", 17, 15)
);

$car[0][1]; // 22


// ========== Classi ========== //

// Dichiarazione di una classe //
class animal {
    // Proprieta' //
    public $weight;
    public $height;

    // Metodo //
    public function breathe() {
        var_dump('breathing..');
    }
}

// Classe figlia (che estende) //

class bird extends animal {

    public function fly() {
        var_dump('flying...');
    }
}
// Una classe che estende un altra prende tutte le sue proprieta' e metodi, public e protected


// le proprieta' e i metodi delle classi possono essere:
// - public: tutti possono accedergli
// - protected: gli si puo' accedere solo all'interno della classe e all'interno dei figli di essa
// - private: gli si puo' accedere solo all'interno della classe


// Creazione di un istanza e assegnazione ad una variabile //

$dragonfly = new bird();
// Un instanza e' sostanzialmente un esemplare di una data classe di appartenenza


// Costruttore di una classe //

class animal {
    public $weight;
    public $height;

    public function __constructor(int $weight, float $height) {
        $this->weight = $weight;
        $this->height = $height;
    }
}

$beard = new animal(150, 2.40);
// Il construttore di una classe permette di assegnare dei valori alle proprieta' direttamente quando si crea una nuova istanza


// Proprieta' e funzioni statiche //

class Counter {
    public static $count = 0;

    public function increment() {
        self::$count++;
    }

    public static function getCount() {
        return self::$count;
    }
}
// Le funzione e le proprieta' statiche non sono direttamente collegate con un instanza ma con la classe stessa

// si puo' accedere ad una di esse usando: nomeClasse::nomeProprieta/funzione

// Per accedere all'interno della classe a proprieta' statiche si una la chiave self::


// Classi Astratte //

abstract class Shape {
    protected $color;

    public function __construct($color) {
        $this->color = $color;
    }

    abstract public function area();
}

class Circle extends Shape {
    private $radius;

    public function __construct($color, $radius) {
        parent::__construct($color); // In questo modo si richiama il costruttore della classe genitore nel classe figlio
        // La chiave parent:: permette di richiamare proprieta' o metodi della classe genitore
        $this->radius = $radius;
    }

    public function area() {
        return pi() * pow($this->radius, 2);
    }
}
// Una classe astratta (Shape) e' una classe che non puo' essere istanzata direttamente

// Ma può contenere metodi con implementazioni incomplete o nessuna implementazione

// Le classi astratte sono utilizzate come modelli o scheletri per altre classi che le estedono


// Interfacce //

interface Logger {
    public function log($message);
}

class FileLogger implements Logger {
    public function log($message) {
        // Implementazione del logging su file
    }
}

class DatabaseLogger implements Logger {
    public function log($message) {
        // Implementazione del logging su database
    }
}
// Un'interfaccia è un elenco di metodi che devono essere implementati in una classe che aderisce all'interfaccia stessa.

// Non contiene implementazioni concrete dei metodi, solo le firme dei metodi

interface Mensurable {
    public function calcolaArea();
}

class Forma {
    protected $colore;

    public function __construct($colore) {
        $this->colore = $colore;
    }

    public function descrizione() {
        return "Colore: " . $this->colore;
    }
}

class Cerchio extends Forma implements Mensurable {
    private $raggio;

    public function __construct($colore, $raggio) {
        parent::__construct($colore);
        $this->raggio = $raggio;
    }

    public function calcolaArea() {
        return pi() * pow($this->raggio, 2);
    }

    public function descrizione() {
        return parent::descrizione() . ", Raggio: " . $this->raggio;
    }
}
// Una classe puo' sia estendere un altra classe che implementare diverse interfacce


// Differenze tra classi astratte e interfacce //

// Implementazione dei metodi:
// Una classe astratta può contenere metodi con implementazioni concrete, mentre un'interfaccia non può. Un'interfaccia definisce solo firme di metodi che le classi devono implementare.

// Multi-ereditarietà:
// Una classe può implementare più interfacce, ma può estendere solo una classe astratta. Quindi, le interfacce supportano la multi-ereditarietà, mentre le classi astratte no.

// Stato delle variabili:
// Una classe astratta può avere variabili di istanza, ma un'interfaccia non può avere variabili di alcun tipo.

// Trait //

trait Log {
    public function log($message) {
        echo "Log: " . $message;
    }
}

class MyClass {
    use Log; // la parola chiave 'use' permette al trait di essere utilizzato nella classe
}

$object = new MyClass();
$object->log("Message");
// Un trait è una collezione di metodi che può essere riutilizzata in diverse classi

// Un trait può essere utilizzato in più classi, e una classe può utilizzare più trait.


// ======== Principali funzioni build-in di PHP su le stringhe ======== //

// strlen()
$stringa = "Hello, world!";
echo strlen($stringa); // Output: 13

// strtolower()
$stringa = "Hello, WORLD!";
echo strtolower($stringa); // Output: hello, world!

// strtoupper()
$stringa = "Hello, world!";
echo strtoupper($stringa); // Output: HELLO, WORLD!

// str_replace()
$stringa = "Ciao, mondo!";
$novaStringa = str_replace("Ciao", "Salve", $stringa);
echo $novaStringa; // Output: Salve, mondo!

// substr
$stringa = "Hello, world!";
$subStringa = substr($stringa, 0, 5);
echo $subStringa; // Output: Hello

// strpos
$stringa = "Questo è un esempio.";
$posizione = strpos($stringa, "un");
echo $posizione; // Output: 10

// trim()
$stringa = "   Ciao, mondo!   ";
$stringaTrimmed = trim($stringa);
echo $stringaTrimmed; // Output: "Ciao, mondo!"


// ======== Principali funzioni build-in di PHP su gli array ======== //

// count()
$array = [1, 2, 3, 4, 5];
echo count($array); // Output: 5

// array_push()
$array = [1, 2, 3];
array_push($array, 4, 5);
print_r($array); // Output: Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 )

// array_pop()
$array = [1, 2, 3];
$elementoRimosso = array_pop($array);
print_r($array); // Output: Array ( [0] => 1 [1] => 2 )
echo $elementoRimosso; // Output: 3

// array_shift()
$array = [1, 2, 3];
$elementoRimosso = array_shift($array);
print_r($array); // Output: Array ( [0] => 2 [1] => 3 )
echo $elementoRimosso; // Output: 1

// array_merge()
$array1 = [1, 2];
$array2 = [3, 4];
$novoArray = array_merge($array1, $array2);
print_r($novoArray); // Output: Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 )

// array_slice
$array = [1, 2, 3, 4, 5];
$porzione = array_slice($array, 2, 2);
print_r($porzione); // Output: Array ( [0] => 3 [1] => 4 )

// array_search()
$array = ['a' => 1, 'b' => 2, 'c' => 3];
$chiave = array_search(2, $array);
echo $chiave; // Output: b


// ======== Principali funzioni build-in di PHP su i numeri ======== //

// rand()
echo rand(); // Output: un numero casuale

// floor()
$numero = 3.9;
echo floor($numero); // Output: 3

// round()
$numero = 3.6;
echo round($numero); // Output: 4


// ======== Include e require ======== //

include nomeFile;
// Nel caso in cui il file non viene trovato, l'applicazione non si arresta

require nomeFile;
// Nel caso in cui io file non viene trovato, l'applicazione si arresta con un errore

include_once nomeFile;
require_once nomeFile;
// in questi due casi, il file viene incluso soltanto una volta anche se richiesto diverse volte da file diversi


// ======== Magic Costants ======== //

__CLASS__ ;
// Se usato all'interno di una classe, ritorna il nome di essa

__DIR__ ;
// La cartella del file

__FILE__ ;
// Il nome del file con il path assoluto incluso

__FUNCTION__ ;
// All'interno di una funzione, ritorna il nome di essa

__LINE__ ;
// Ritorna il numero della linea di codice

__METHOD__ ;
// Se usato dentro un metodo di una classe, ritorna il nome della classe e quello della funzione

__NAMESPACE__ ;
// All'interno di un namespace, ritorna il nome di esso

__TRAIT__ ;
// Se usato all'interno di un tratto, ritorna il nome di esso

ClassName::class ;
// Ritorna il nome della classe e del namespace, se presente


// ======== Superglobals ======== //

$_GET ;
// Contiene un array di variabili provienienti da una richiesta HTTP con metodo GET

$_POST ;
// Contiene un array di variabili provienienti da una richiesta HTTP con metodo POST

$GLOBALS ;
// Le variabili globali sono variabili a cui si puo accedere da ogni scope

// Le variabili presenti nello scope piu' esterno sono automaticamente variabili globali

$x = 100;

function functionName2() {
    // 1
    global $x;
    echo $x;

    // 2
    echo $GLOBALS["x"];
}
// Per usare una variabile globale in una funzione si puo usare la keywork 'global' per dichiarla o usando la sitassi $GLOBALS.

$_REQUEST ;
// Contiene un array da $_GET, $_POST, e $_COOKIE.

$_SERVER ;
// Contiene le informazioni con headers, paths e script locations.


// ======== Sessions ======== //

session_start();
// Avviare un sessione

$_SESSION["nomeVariabile"] = "ValoreVariabile";
// Settare una variabile di sessione

session_unset();
// Rimuovere tutte le variabili di sessione

session_destroy();
// Distruggere la sessione


// ======== PHP JSON ======== //

$ages = array("Peter"=>35, "Ben"=>37, "Joe"=>43);

$jsonAge = json_encode($age);
// formatta in un formato JSON

$ages = json_decode($jsonAge);
// trasforma un JSON in un oggetto PHP

// ======== PHP Exceptions ======== //

// Un eccezione e' un oggetto che descrive un errore di uno script PHP
// Un eccezione puo' essere 'lanciata' da molte funzioni e classi

new Exception(message, code, previous);
// Anche le funzioni e classi definite possono lanciare delle eccezioni

// try...catch statement

try {
    // Codice che 'lancia' l'eccezione
} catch(Exception $e) {
    $message = $e->getMessage();
    $code = $e->getCode();
    // Codice che viene eseguito una volta 'catturata' l'eccezione
} finally {
    // Codice che viene eseguito in tutti i casi
    // Se presente rende il catch opzionale
}


// ======== Form Handling ======== //

/*
<form action="welcome.php" method="POST">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    <input type="submit">
</form>
*/

// Il campo action nel form contiene il file in cui i dati di esso verranno inviati una volta 'submittato' il form
// Il campo method contiene il metodo che viene utilizzato per l'invio dei dati
// Per accedere ai dati si utilizzano i superglobals tra $_GET[] e $_POST[] nel cui interno si inserisce il contenuto del campo name presente negli input