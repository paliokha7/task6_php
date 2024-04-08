<?php
//робота зі змінними, з рядками 
$name = "Tom";
$surname = " Smith";
$age = 22;
print_r($name . $surname); //конкатенація

//масиви, асоціативні масиви
$cars = array("BMW","AUDI","TOYOTA","MERCEDES","SKODA") ;
//вивід всіх елементів з масива
foreach ($cars as $car) {
    echo"<br>" . $car . "<br>";
}

echo "<br>". $cars[1] . "<br>";//виввід елемента за індексом 1

array_push($cars, "Tesla", "Renault");//додавання елемента в кінець масива

foreach ($cars as $car) {
    echo"<br>" . $car . "<br>";
}

$cars1 = array("AUDI" => "A7", "BMW" => "M4", "TESLA" => "Model S",);

foreach ($cars1 as $brand => $model) {
    echo "Brand: $brand, Model: $model<br>";
}

// Видалення елемента масиву
unset($cars1["BMW"]);

// Виведення масиву після видалення
foreach ($cars1 as $brand => $model) {
    echo "Brand: $brand, Model: $model<br>";
}

echo implode(", ", $cars );//implode array to string

$str = "Audi,BMW,Tesla";
$arraycars = explode("," , $str);//explode string to array
foreach ($arraycars as $car) {
    echo"<br>" . $car . "<br>";
}


//розіменування змінної
$name = "user";
$$name = "Tom Smith <br>";

echo $user; 

//порівняння
$x = 6;
$y = 13;

if ($x > $y) {
    echo "x більше, ніж y";
} else if ($x < $y) {
    echo "x менше, ніж y";
} else {
    echo "x і y однакові";
}

if ($x % 2 == 0) {
    echo "<br>x є парним числом" ;
} else {
    echo "<br>x не є парним числом";
}

//приведення типів
$x = "10";
$y = (int)$x; 
echo $y; 


$x = "10";
$y = $x + 5; 
echo $y; 



