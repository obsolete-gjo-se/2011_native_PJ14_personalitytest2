<?php 
function connect() 
{ 
    $con=mysql_connect('servername','benutzer','passwort') or die(mysql_error()); 
    mysql_select_db('datenbank, die die Benutzertabelle enthält',$con) or die(mysql_error());
} 

function check_user($name, $pass) 
{ 
    $sql="SELECT UserId 
    FROM users 
    WHERE UserName='".$name."' AND UserPass=MD5('".$pass."') 
    LIMIT 1"; 
    $result=mysql_query($sql) or die(mysql_error()); 
    if (mysql_num_rows($result)==1) 
    { 
        $user=mysql_fetch_assoc($result); 
        return $user['UserId']; 
    } 
    else 
        return false; 
} 

function login($userid) 
{ 
    $sql="UPDATE users 
    SET UserSession='".session_id()."' 
    WHERE UserId=".$userid; 
    mysql_query($sql); 
} 

function logged_in() 
{ 
    $sql="SELECT UserId 
    FROM users 
    WHERE UserSession='".session_id()."' 
    LIMIT 1"; 
    $result=mysql_query($sql); 
      return (mysql_num_rows($result)==1); 
} 

function logout() 
{ 
    $sql="UPDATE users 
    SET UserSession=NULL 
    WHERE UserSession='".session_id()."'"; 
    mysql_query($sql); 
} 

connect(); 
?>