<?php 

function logger($msg) {
  $stderr = fopen('php://stderr', 'w');
  fwrite($stderr, "$msg\n");
  fclose($stderr);
}

switch($_SERVER['REQUEST_URI']) {
  case '/info':
    phpinfo();
    break;
  case '/server':
    header('Content-type: text/plain');
    print_r($_SERVER);
    break;
  default:
    echo '404';
    logger("not found: $_SERVER[REQUEST_URI]");
}
