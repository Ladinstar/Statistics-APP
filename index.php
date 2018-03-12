<?php

require_once "class/stat.class.php";

$stat = New Stat(array(
    1=>40,
    4=>20,
    2=>60,
    2=>45
));

var_dump($stat->variance());

?>