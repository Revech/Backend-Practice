<?php

if (!function_exists('dd')) {
    function dd($value) {
        echo "<pre>"; // to see the value in a more organized way
        var_dump($value); // var_dump displays type and value of the parameter
        echo "</pre>";
        die(); // any code after die will not be executed
    }
}

if (!function_exists('urlIs')) {
function urlIs($value){
    $_SERVER['REQUEST_URI'] === $value ? 'bg-gray-900 text-white' :'text-gray-300 ';
}
}

/*

Fatal error: Cannot redeclare dd() (previously declared in ...) means that the dd() function is being declared more than once in your code. This typically happens if the functions.php file (or another file that declares the dd() function) is being included or required multiple times in your project.

PHP does not allow you to declare the same function multiple times in the same scope, so when it encounters the second declaration of the dd() function, it throws this fatal error.

How to fix it:
To avoid this error, you can use the function_exists()


*/