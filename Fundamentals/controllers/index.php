<?php
$heading = 'Home';



 //if($_SERVER['REQUEST_URI'] === '/'){echo 'bg-gray-900 text-white';} else {echo 'text-gray-300 ';} 

//same as

 //echo $_SERVER['REQUEST_URI'] === '/' ? 'bg-gray-900 text-white' :'text-gray-300 ';

//echo $_SERVER['REQUEST_URI']; // to know what is the current page 


require 'views/index.view.php' ;