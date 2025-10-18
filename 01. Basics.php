<?php

// echo: Can take multiple arguments, returns nothing
echo "Hello World!<br>"; 

$name = "Yash";
$age = 22;

// Double quotes parse variables
echo "My name is $name and I am $age years old<br>";

// Single quotes require concatenation
echo 'My name is ' . $name . ' and I am ' . $age . ' years old<br>';

// Multiple arguments
echo "Hello ", "World ", "This is PHP<br>";

// Optional parentheses (only for single arguments)
echo("Echo with parentheses works too<br>");


// print: Takes one argument, returns 1
print "Hello World using print<br>";

$val = print "Testing print statement<br>";  // Output: Testing print statement  and $val = 1 (since print returns 1)
echo "Return value of print: $val<br>";  // Output: Return value of print: 1


$total = print "Adding numbers using print<br>"; // Output: Adding numbers using print and $total = 1
$result = $total + 5; // $result = 6

echo "Value stored in \$total: $total<br>"; // Output: Value stored in $total: 1
echo "Result after adding 5: $result<br>";  // Output: Result after adding 5: 6

// echo cannot be used in an expression (will cause error)
// $x = echo "Hello"; ❌

echo "Double quotes parse variables: Hello $name<br>";
echo 'Single quotes do not parse variables: Hello ' . $name . '<br>';

// -------------------------------
// Comment Styles
// -------------------------------
// Single-line comment
# Another single-line comment
/*
  Multi-line comment
  Useful for long explanations
*/

?>
