<?php

require_once('vendor/autoload.php');

$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

$f3->route('GET /', function() {
    echo '<h1>Routing Demo</h1>';
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

$f3->run();

?>