<?php
echo "<h1>Házi</h1><br><br>";

$collection = collect([5, 7, 3, 6, 5, 6, 2]);

echo "<h1>Kollekció</h1>";
foreach ($collection as $value) {
    echo "<b>".$value."</b>&nbsp";
}


$sorted = $collection->sort();
$sorted->values()->all();

echo "<h2>1. rendezd növekvő sorrendbe és add vissza</h2><br>";
foreach ($sorted as $value) {
    echo $value."&nbsp";
}


$duplicate = $collection->duplicates();

echo "<h2>2. szűrd ki azokat az elemeket, amelyek párosak</h2><br>";
foreach ($duplicate as $value) {
    echo $value."&nbsp";
}


echo "<h2>3. számold meg, hány elem van benne</h2><br>";
$count_values = $collection->count();
echo $count_values;


echo "<h2>4. hozz létre belőle egy új kollekciót, amelynek minden elemét megszorzod kettővel</h2><br>";
$multiplied = $collection->map(function (int $item, int $key) {
    return $item * 2;
});
 
$multiplied->all();

foreach ($multiplied as $value) {
    echo $value."&nbsp";
}

echo "<h2>5. vedd ki belőle az első elemet</h2><br>";
echo $collection->first();

echo "<h2>6. ellenőrizd, hogy tartalmazza-e az x karaktert</h2><br>";
$item = $collection->contains('x');
if($item){
    echo "true";
} else {
   echo "false";
}

echo "<h2>7. add hozzá az elemeket egy másik kollekcióhoz</h2><br>";
$collection_2 = collect(['yamaha', 'honda', 'kawasaki', 'ktm', 'suzuki']);

    foreach ($collection as $value) {
    $collection_2->push($value);
    }   

$collection_2->all();

foreach ($collection_2 as $value) {
    echo $value."&nbsp";
}


echo "<h2>8. írd ki az elemeket egyenként a konzolra</h2><br>";
foreach ($collection_2 as $value) {
    echo $value."<br>";
}

echo "<h2>9. vedd ki belőle az utolsó elemet</h2><br>";
$collection_2->pop();
$collection_2->all();

foreach ($collection_2 as $value) {
    echo $value."&nbsp";
}


echo "<h2>10. számold meg, hány elem felel meg egy adott feltételnek</h2><br>";
$filtered = $collection->filter(function (int $value, int $key) {
return $value > 2;
});
$filtered->all();
echo "<h3>nagyobb mint 2:</h3>";
echo $filtered->count();