<?php
/**
 * Created by PhpStorm.
 * User: Iman
 * Date: 15/04/2020
 * Time: 04:05 PM
 */

require_once "header.php";

echo <<<_END
    <script>
    function checkUser(user){
        if(user.value == ''){
            O('info').innerHtml = '';
            return;
        }
        
        var params = "user=" + user.value;
        var request = ajaxRequest();
        request.open("POST", "checkuser.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.setRequestHeader("Content-length", params.length);
        request.setRequestHeader("Connection", "close");
        request.onreadystatechange = function() {
          if(this.readyState == 4){
              if(this.status == 200){
                  O('info').innerHTML = this.responseText;
              }
          }
        }
        request.send(params);
    }
    
    function ajaxRequest() {
        try{
            var request = new XMLHttpRequest();
        }catch(e1){
            try{
                request = new ActiveXObject("Msxml2.XMLHTTP");
            }catch (e3) {
                try{
                    request = new ActiveXObject("Microsoft.XMLHTTP");
                }catch (e2) {
                  request = false;
                }
            }
        }
        
        return request;
    }
</script>
<div class='main'><h3>Please enter your details to sign up</h3>
_END;

$error = $user = $pass = "";
if (isset($_SESSION['user'])) destroySession();

if (isset($_POST['user'])) {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if ($user == "" || $pass == "") {
        $error = "Not all fields were entered<br><br>";
    } else {
        $result = queryMysql("SELECT * FROM members WHERE user='$user'");

        if ($result->num_rows) {
            $error = "That username already exists<br><br>";
        } else {
            queryMysql("INSERT INTO members VALUES('$user', '$pass')");
            die("<h4>Account created</h4>Please Log in.<br><br>");
        }
    }
}

echo <<<_END
    <form method="post" action="signup.php">$error
        <span class="fieldname">Username</span>
        <input type="text" maxlength="16" name="user" value="$user" onblur="checkUser(this)">
        <span id="info"></span><br>
        <span class="fieldname">Password</span>
        <input type="text" maxlength="16" name="pass" value="$pass">
_END;
?>

<span class="fieldname">&nbsp;</span>
<input type="submit" value="Sign up">
</form></div><br>
</body>
</html>


