<?php

require 'functions.php';

$uri =parse_url( $_SERVER['REQUEST_URI'])['path'];


//dd(parse_url($uri));
//echo dd(parse_url($uri)); 
/*
// OUTPUT : 
array(1) {
  ["path"]=>
  string(8) "/contact"
}
  ------------
  we are doing this step so we can aquire only the path without any extra paths ex only /contact so parse_url will give us an array that has the element of path alone and the other elements that the url has . now we can extract the path only .
------------------------------
if ($uri === '/')
{
    require 'controllers/index.php';
}else if ($uri === '/about'){
    require 'controllers/about.php';
}else if ($uri === '/contact'){
    require 'controllers/contact.php';
}
*/
//OR use assiocative array 

$routes = [

'/' => 'controllers/index.php' ,
'/about' =>  'controllers/about.php',
'/contact' => 'controllers/contact.php',
];

// abort if the route is not found 
function abort(){
  http_response_code(404); // to represnt the error to the user
  // echo "sorry .Not Found";
  require 'views/404.php';
   die(); // kill the excution
}

// function to handle routing 
function routeToController($uri, $routes){
if (array_key_exists($uri, $routes)){
  require $routes[$uri];
}
else{
 abort();
}
}
routeToController($uri, $routes);
