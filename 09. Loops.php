<?php
// Loops are used to run the same code multiple times until a condition becomes false.

// The while Loop

$i = 1; // Counter starts at 1

while ($i < 6) { // Loop as long as $i < 6
    echo "Example 1: i = $i";
    $i++; // Increment to avoid infinite loop
}
// Output: 1, 2, 3, 4, 5

// Break stops the loop
$i = 1;
while ($i < 6) {
    if ($i == 3) break; // Stop when i = 3
    echo "Example 2: i = $i";
    $i++;
}
// Output: 1, 2

// Continue skips current iteration
$i = 0;
while ($i < 6) {
    $i++;
    if ($i == 3) continue; // Skip printing 3
    echo "Example 3: i = $i";
}
// Output: 1, 2, 4, 5, 6


// The do...while Loop - Runs at least once, then checks condition
$i = 1;
do {
    echo "Example 4: i = $i";
    $i++;
} while ($i < 6);
// Output: 1, 2, 3, 4, 5

// Even if condition false, runs once
$i = 8;
do {
    echo "Example 5: i = $i";
    $i++;
} while ($i < 6);
// Output: 8

// Break and Continue work here too
$i = 1;
do {
    if ($i == 3) break; // Stop loop
    echo "Example 6: i = $i";
    $i++;
} while ($i < 6);
// Output: 1, 2

$i = 0;
do {
    $i++;
    if ($i == 3) continue; // Skip 3
    echo "Example 7: i = $i";
} while ($i < 6);
// Output: 1, 2, 4, 5, 6


// The for Loop
for ($x = 0; $x <= 10; $x++) { // Start, condition, increment
    echo "Example 8: x = $x";
}
// Output: 0 to 10

// Break stops the loop
for ($x = 0; $x <= 10; $x++) {
    if ($x == 3) break;
    echo "Example 9: x = $x";
}
// Output: 0, 1, 2

// Continue skips iteration
for ($x = 0; $x <= 10; $x++) {
    if ($x == 3) continue;
    echo "Example 10: x = $x";
}
// Output: 0, 1, 2, 4, 5, 6, 7, 8, 9, 10

// Count by 10
for ($x = 0; $x <= 100; $x+=10) {
    echo "Example 11: x = $x";
}
// Output: 0, 10, 20, ..., 100


// The foreach Loop (arrays)
$colors = array("red", "green", "blue", "yellow");

// Loop through values
foreach ($colors as $color) {
    echo "Example 12: Color = $color";
}
// Output: red, green, blue, yellow

// Associative arrays (key => value)
$members = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
foreach ($members as $name => $age) {
    echo "Example 13: $name is $age years old<br>";
}
// Output: Peter is 35, Ben is 37, Joe is 43

// Loop through objects
class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }
}

$myCar = new Car("red", "Volvo");
foreach ($myCar as $prop => $value) {
    echo "Example 14: $prop = $value<br>";
}
// Output: color = red, model = Volvo

// Break and continue work here too
foreach ($colors as $color) {
    if ($color == "blue") break; // Stop at blue
    echo "Example 15: $color<br>";
}
// Output: red, green

foreach ($colors as $color) {
    if ($color == "blue") continue; // Skip blue
    echo "Example 16: $color<br>";
}
// Output: red, green, yellow

// Modify array by reference
foreach ($colors as &$color) {
    if ($color == "blue") $color = "pink";
}
var_dump($colors); // blue changed to pink

// Alternative syntax
foreach ($colors as $color):
    echo "Example 17: $color<br>";
endforeach;
// Output: red, green, pink, yellow


// -------------------------------
// Summary
// -------------------------------
// ✔ while: runs as long as condition true
// ✔ do...while: runs at least once
// ✔ for: runs a set number of times
// ✔ foreach: loops through arrays or objects
// ✔ break: stop the loop immediately
// ✔ continue: skip current iteration
// ✔ use & in foreach to modify array values directly

?>
