<?php

// Strings - are sequences of characters, enclosed in single or double quotes
$str1 = "Hello World!";       // double-quoted string
$str2 = 'Hello World!';       // single-quoted string
var_dump($str1);              // Output: string(12) "Hello World!"
var_dump($str2);              // Output: string(12) "Hello World!"


// Integer - Whole numbers without decimals
$intNum = 5985;
var_dump($intNum);  // Output: int(5985)


// Float (Decimal numbers) - Numbers with decimal points
$floatNum = 10.365;
var_dump($floatNum);  // Output: float(10.365)


// Boolean - Can only be TRUE or FALSE
$boolTrue = true;
$boolFalse = false;
var_dump($boolTrue);   // Output: bool(true)
var_dump($boolFalse);  // Output: bool(false)


// Array - Stores multiple values in a single variable
$cars = array("Volvo", "BMW", "Toyota");
var_dump($cars);
/*
Output:
array(3) {
  [0]=> string(5) "Volvo"
  [1]=> string(3) "BMW"
  [2]=> string(6) "Toyota"
}
*/


// Object - are instances of classes
class Car {
    public $color;
    public $model;

    // Constructor sets initial properties
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }

    // Method to display car info
    public function message() {
        return "My car is a " . $this->color . " " . $this->model;
    }
}

$myCar = new Car("red", "Volvo"); // Create object
var_dump($myCar);

/*
Output:
object(Car)#1 (2) {
  ["color"]=> string(3) "red"
  ["model"]=> string(5) "Volvo"
}
*/

echo $myCar->message() . "<br>";  // Output: My car is a red Volvo


// NULL - Represents a variable with no value
$nullVar = null;
var_dump($nullVar); // Output: NULL


// Resource - Special type for external resources like database connections
$conn = mysqli_connect("localhost", "root", "", "testdb");
var_dump($conn); // Output: resource(3) of type (mysqli) or object (mysqli) depending on PHP version
mysqli_close($conn); // Close resource when done



// Changing Data Types (Casting)
// PHP allows explicit type conversion (casting) between types.
// Common casts: (int), (float), (string), (bool), (array), (object), (unset)

// -------------------------------
// 1️⃣ Cast Float → Integer
// -------------------------------
$x = 23465.768;              // A float number
$int_cast = (int)$x;         // Convert float to integer (drops decimal part)
echo "Casting float 23465.768 → int: $int_cast<br>";  // Output: 23465

// -------------------------------
// 2️⃣ Cast String → Integer
// -------------------------------
$y = "23465.768";            // A numeric string
$int_cast2 = (int)$y;        // Converts string to integer (ignores decimal)
echo "Casting string '23465.768' → int: $int_cast2<br>";  // Output: 23465

// -------------------------------
// 3️⃣ Cast Integer → String
// -------------------------------
$z = (string)12345;          // Converts integer to string
var_dump($z);                // Output: string(5) "12345"

// -------------------------------
// 4️⃣ Other Casting Examples
// -------------------------------
$a = (float)"12.5";          // String → Float
$b = (bool)0;                // 0 → false
$c = (array)5;               // Integer → Array
$d = (object)"Hello";        // String → Object

var_dump($a, $b, $c, $d);    // Displays resulting types and values

// -------------------------------
// 5️⃣ Casting Demonstration (Step-by-Step)
// -------------------------------
$x = 5;                      // Integer
var_dump($x);                // Output: int(5)

$x = (string)$x;             // Cast integer → string
var_dump($x);                // Output: string(1) "5"

// ✅ Summary:
// Casting changes the variable’s data type explicitly.
// PHP auto-converts types loosely, but explicit casting improves control and clarity.


?>
