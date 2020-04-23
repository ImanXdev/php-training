<?php
/**
 * Created by PhpStorm.
 * User: Iman
 * Date: 23/04/2020
 * Time: 12:19 PM
 */
require_once 'dog.php';

$lab = new Dog('Iman', 'breed', 'gray', '20');
print $lab->display_properties() . "<br>";
print $lab . "<br>";