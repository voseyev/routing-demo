<?php

session_start();

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

//Define a parameter
$f3->route('GET /hello/@name', function($f3, $params) {
    $name = $params['name'];
    echo "<h1>Hello, $name</h1>";
}
);

//Define a parameter into template
$f3->route('GET /hello/@name', function($f3, $params) {
    //$name = $params['name'];
    //echo "<h1>Hello, $name</h1>";

    $f3->set('name', $params['name']);
    $template = new Template();
    echo $template->render('views/hello.html');
}
);

//Define a parameter into template
$f3->route('GET /hi/@first/@last', function($f3, $params) {

    $f3->set('first', $params['first']);
    $f3->set('last', $params['last']);
    $f3->set('message', 'Hi');

    $_SESSION['first'] = $f3->get('first');
    $_SESSION['last'] = $f3->get('last');


    $template = new Template();
    echo $template->render('views/hi.html');
}
);

//Define a parameter into template
$f3->route('GET /hi-again', function($f3, $params) {
    echo 'Hi again, ' . $_SESSION['first'];

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