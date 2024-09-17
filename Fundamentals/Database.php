
<?php

require 'functions.php';
/* 
CLASSES:
----------------
class Person{

    public $name;

    public function breathe(){
        echo "breathing";
        echo $this->name . 'is breathing';
    }


}

$person = new Person();
$person->name = 'reve';
$person->breathe();
----------------
*/


//connect to our Mysql database( i use XAMPP) and excute the query 
//PDO:


class Database {

    public $connection;
    // now whenever we make an instance from this class a connection will be made with the database automatically
    public function __construct($config,$username='root',$password =''){

       
$dsn = 'mysql:'.http_build_query($config,'',';');// example.com?host=localhost;port=3306;dbname=myapp

        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        $username = "root";
        $password = ""; 
        $this -> connection = new PDO($dsn,$username,$password,[

            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);// $dsn connection string
    }

public function query($query,$params=[]){

  

$statement =  $this -> connection  -> prepare($query);//preparing this query to send it to the sql 

$statement ->execute($params);// excute this query 
// making it dynnamic to bound the parameters 
// when calling this method we can send the parameters and bind them to excute 
return $statement;

//dd($posts);
}


}




/* 

-----------------------
When we push this code to production the host won't be local anymore so we cant hardcore -->$dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4"; anymore we need to make it dynamic 

 $dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4";
 -----------------------
 htttp_build_query ---> // example.com?host=localhost&port=3306&dbname=myapp
(defualt)

GOAL: make -->
$dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4"; more dynamic through ---> 
'mysql:'.htttp_build_query($config,'',';')


$dsn = 'mysql:'.http_build_query($config,'',';');
-------------
taking dynamic areas and pushing it apwards :

when we craeted a file config and put our attributes in it 

-----------------------------
- local dynamic production:

$dsn = 'mysql:'.http_build_query($config,'',';');// example.com?host=localhost;port=3306;dbname=myapp

        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        $username = "root";
        $password = ""; 
        $this -> connection = new PDO($dsn,$username,$password,[

            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);



------------------
 fetchAll() --> will give a key and index(collection) :
array(3) {
  [0]=>
  array(4) {
    ["id"]=>
    int(1)
    [0]=>
    int(1)
    ["title"]=>
    string(19) "My first blog post "
    [1]=>
    string(19) "My first blog post "
  }
fetchAll(PDO::FETCH_ASSOC)--->removed indexed and duplictions

array(3) {
  [0]=>
  array(2) {
    ["id"]=>
    int(1)
    ["title"]=>
    string(19) "My first blog post "
  }



 
---------------------------

foreach($posts as $post){

    echo "<li>"  . $post['title'] . "</li>";
}

*/ 