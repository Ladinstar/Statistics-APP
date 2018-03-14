<?php

require_once "class/stat.class.php";

$stat = New Stat(array(
    array(3,2),
    array(2,4),
    array(1,34),
    array(1,11),
    array(1,1),
    array(2,9)
));

var_dump($stat->variance());

?>