<?php

require_once "class/stat.class.php";

$stat = New Stat(array(
    3=>2,
    2=>4,
    1=>34,
    1=>11,
    1=>1,
    2=>9
));

var_dump($stat->frequence());

?>