<?php

// Sorting
$numbers = [4,6,2,22,11];
sort($numbers); var_dump($numbers); // ascending
rsort($numbers); var_dump($numbers); // descending

$age = ["Peter"=>35,"Ben"=>37,"Joe"=>43];
asort($age); var_dump($age); // value asc
arsort($age); var_dump($age); // value desc
ksort($age); var_dump($age); // key asc
krsort($age); var_dump($age); // key desc


// Custom sorting
usort($numbers, fn($a,$b)=>$b<=>$a); var_dump($numbers); // values desc
uasort($age, fn($a,$b)=>$a<=>$b); var_dump($age); // value asc
uksort($age, fn($a,$b)=>strcmp($a,$b)); var_dump($age); // key alphabetical


// Searching & Checking
$colors = ["red","green","blue"];
var_dump(in_array("red",$colors)); // true
var_dump(array_key_exists("name", ["name"=>"John"])); // true
echo array_search("green",$colors); // 1


// Keys & Values
$arr = ["a"=>1,"b"=>2,"c"=>3];
print_r(array_keys($arr)); // ["a","b","c"]
print_r(array_values($arr)); // [1,2,3]


// Intersections & Differences
$a=[1,2,2,3]; $b=[2,3,4];
print_r(array_unique($a)); // [1,2,3]
print_r(array_intersect($a,$b)); // [2,3]
print_r(array_diff($a,$b)); // [1]


// Randomization
$nums = [10,20,30,40];
shuffle($nums); var_dump($nums);
echo $nums[array_rand($nums)]; // random element


// Array Pointers
$arr = ["x","y","z"];
echo current($arr); // x
echo next($arr); // y
echo end($arr); // z
reset($arr);
echo current($arr); // x


// Utility Functions
$arr = ["apple","banana","cherry"];
print_r(array_reverse($arr));
print_r(array_chunk($arr,2));
print_r(array_fill(0,5,"PHP"));
print_r(range(1,5));
echo array_sum([1,2,3]); // 6
echo array_product([2,3,4]); // 24
print_r(array_pad(["x","y"],5,"z"));


// Modern PHP Tricks
$arr = ["a"=>1,"b"=>2,"c"=>3];
echo array_key_first($arr); // a
echo array_key_last($arr);  // c
print_r(array_count_values([1,2,2,3])); // [1=>1,2=>2,3=>1]
?>
