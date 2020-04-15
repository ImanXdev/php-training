<?php
/**
 * Created by PhpStorm.
 * User: Iman
 * Date: 15/04/2020
 * Time: 06:55 PM
 */

require_once 'functions.php';

if(isset($_POST['user'])){
    $user = sanitizeString($_POST['user']);
    $result = queryMysql("SELECT * FROM members WHERE user='$user'");

    if($result->num_rows){
        echo "<span class='taken'>&nbsp;&#x2718;" . "This username is taken</span>";
    } else {
        echo "<span class='available'>&nbsp;&#x2714;This username is available</span>";
    }
} else {
    echo "<span>Oops.</span>";
}