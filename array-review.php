<?php

global $animals;

$animals = array("alpaca", "boa", "panda");
$animalsAdd = array("alpaca");

printAnimals($animals);

for($x = 0; $x < 2; $x++) {

    if (in_array("goat", $animalsAdd)) {
        animals($animalsAdd[$x]);
        printAnimals($animals);
    }

    else {
        echo "Adding" . " " . $animalsAdd[$x] . "...";
        array_push($animalsAdd, "goat");
        echo nl2br(" \n ");
        printAnimals($animals, $animalsAdd);
        array_push($animals, "goat");
        }


}
function printAnimals($animals){
    echo $animals[0] . " " . $animals[1] . " " . $animals[2] . " " . $animals[3];
    echo  nl2br (" \n ");
}

function animals($string) {
    echo "Adding" . " " . $string . "...";
    array_push($animals, "goat");
    echo  nl2br ("\n");
}

$flavors = array("grasshopper" => "The GrassHopper", "maple" => "Whiskey Maple Bacon", "carrot" => "Carrot Walnut",
    "caramel" => "Salted Caramel Cupcake" , "velvet" => "Red Velvet", "lemon" => "Lemon Drop", "tiramisu" => "Tiramisu");

echo  nl2br ("\n");
echo  nl2br ("\n");

foreach ($flavors as $key => $value) {
    echo $key . " - ";
    echo $value;
    echo  nl2br ("\n");
}

echo  nl2br ("\n");

?>

<?php
$flavors = array("grasshopper" => "The GrassHopper", "maple" => "Whiskey Maple Bacon", "carrot" => "Carrot Walnut",
"caramel" => "Salted Caramel Cupcake" , "velvet" => "Red Velvet", "lemon" => "Lemon Drop", "tiramisu" => "Tiramisu");

    foreach ($flavors as $key => $value) { ?>
        <html>
            <body>
                <input type="checkbox" name="flavors" value=<? $key ?>> <? echo $value ?><br>
            <br>
            </body>
        </html>
<?php } ?>


