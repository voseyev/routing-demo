<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

$f3->route('GET /', function() {
    echo '<h1>Routing Demo</h1>';
}
);

$f3->route('GET /hello/@name', function($f3, $params) {
    $name = $params['name'];
    echo "<h1>Hello, $name</h1>";
}
);

$f3->route('GET /language/@lang', function($f3, $params) {
    switch($params['lang']){
        case 'swahili';
            echo 'Jumbo!'; break;

        case 'spanish';
            echo 'Hola!'; break;

        case 'russian';
            echo 'Privet!'; break;

        case 'farsi';
            echo 'Salam!'; break;

            //Reroute to another page
        case 'french';
            $f3->reroute('/');
            //404 error

        default:
            $f3->error(404);
    }

}
);

//Define a page1 route
$f3->route('GET /page1', function() {
    echo '<h1>This is page 1</h1>';
}
);

//Define a page1 subpage-a route
$f3->route('GET /page1/subpage-a', function() {
    echo '<h1>This is page 1, subpage a</h1>';
}
);

//Define a Template route
$f3->route('GET /jewlery/rings/toe-rings', function() {
    //echo '<h1>Buy a toe ring today!</h1>';
    $template = new Template();
    echo $template->render('views/toe-rings.html');
}
);


$f3->run();

?>