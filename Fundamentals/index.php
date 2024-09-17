<?php

//require 'router.php';
require 'functions.php';
require 'Database.php';

//how to return and require data from a file 
$config = require 'config.php';
$db = new Database($config['database']);

dd($_GET);

$query = "select * from posts where id = :id";

$posts = $db -> query($query,[':id => $id'])->fetchAll(PDO::FETCH_ASSOC);

dd($posts);


/*
without writing the id in the qeury manually we should get it automatically <through--->
$_GET --> to get  infomation about the get request 


----------------------
NOTEEEE:::::

when accepting user input through a query string or through a form NEVERRRRRRRR inline it as a part of a sql query 
-----> sql INJECTION


SOLUTION :::

---> send a query to the sql in the first step and then another step send the parameters (binding)

--->when calling the excute() method this is when we bind the parameters cz  excute sends the query that we want to fetch to my sql and fetch gets back this query that was sent by the sql and put it on our backend 

----> query($query,[$id]  --> Now anyurl/?id=3 will be executing succesfully yet  anyurl/?id=3 'drop table x' or any other stuff will NOT be excuted


CONCLUSION ::

LAVERAGE PREPARE STATEMENTS WITH BINDING 
----------------------

$query = "select * from posts where id = ?";
$posts = $db -> query($query,[$id])->fetchAll(PDO::FETCH_ASSOC);

ORRRR(use key)

$query = "select * from posts where id = :id";
$posts = $db -> query($query,[':id => $id'])->fetchAll(PDO::FETCH_ASSOC);
------------------------------

 */
