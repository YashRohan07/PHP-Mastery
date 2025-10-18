<?php

// Variable Naming Rules
$age = 25;                // valid
$_total = 100;            // valid
$user_name = "Rohan";     // valid
// $1name = "John";       // ❌ invalid - cannot start with a number
// $user-name = "Ali";    // ❌ invalid - hyphen not allowed

echo "Age: $age<br>";               // Output: Age: 25
echo "Total: $_total<br>";          // Output: Total: 100
echo "Username: $user_name<br>";    // Output: Username: Rohan


// PHP is Loosely Typed language, don’t need to declare the type of a variable. 
$x = 10;      // integer
$y = "20";    // string
echo "Sum of \$x + \$y = " . ($x + $y) . "<br>";  // Sum of $x + $y = 30   (PHP automatically converts "20" to 20)

// Type can change dynamically
$x = "Now I'm a string!";
echo "New value of \$x: $x<br>";
// Output: New value of $x: Now I'm a string!


// Multiple Assignments
$x = $y = $z = "Fruit";
echo "Values: $x, $y, $z<br>"; // Values: Fruit, Fruit, Fruit


// Variable Scope
// There are 4 types of variable scope in PHP:
// 1. Local
// 2. Global
// 3. Static
// 4. Superglobal ($GLOBALS)

// ----- Local Scope -----
function testLocal() {
    $a = 5; // accessible only inside this function
    echo "Local variable inside function: $a<br>";
}
testLocal(); // Output: Local variable inside function: 5

// Trying to access $a here would cause an error
// echo $a; ❌ Undefined variable


// ----- Global Scope -----
$globalVar = 10;

function testGlobal() {
    global $globalVar; // import global variable into function scope
    echo "Global variable inside function: $globalVar<br>";
}
testGlobal(); // Output: Global variable inside function: 10

// Global variable accessible here directly
echo "Global variable outside function: $globalVar<br>";


// ----- Using $GLOBALS array -----
$g1 = 5;
$g2 = 10;
function multiply() {
    $GLOBALS['result'] = $GLOBALS['g1'] * $GLOBALS['g2'];
}
multiply();
echo "Result using \$GLOBALS: $result<br>"; // Output: Result using $GLOBALS: 50


// Static Variables - Keeps its value between function calls
function counter() {
    static $count = 0; // 'static' means this variable keeps its value between calls
    $count++;           // Increase the counter by 1
    echo "Counter: $count<br>"; 
}

// Each function call increments the same $count variable (it’s not reset to 0)
counter(); // Output: Counter: 1
counter(); // Output: Counter: 2
counter(); // Output: Counter: 3


// Another example 
function addToTotal($num) {
    static $total = 0;   // Declares a static variable that stores cumulative total
    $total += $num;      // Adds the passed number ($num) to the existing total
    echo "Running total: $total<br>"; 
}

// Each call adds the new number to the previous total (persistent $total)
addToTotal(5);   // First call → total = 0 + 5 = 5 → Output: Running total: 5
addToTotal(10);  // Second call → total = 5 + 10 = 15 → Output: Running total: 15
addToTotal(3);   // Third call → total = 15 + 3 = 18 → Output: Running total: 18

?>
