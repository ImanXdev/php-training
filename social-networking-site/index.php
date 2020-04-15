<?php
/**
 * Created by PhpStorm.
 * User: Iman
 * Date: 15/04/2020
 * Time: 03:44 PM
 */

require_once 'header.php';
echo "<br><span class='main'>Welcome to $appname,";

if ($loggedin) echo " $user, you are logged in.";
else echo ' please sign up and/or log in to join in.';

?>


</span><br><br>
</body>
</html>
