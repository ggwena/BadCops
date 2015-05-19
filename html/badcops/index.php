<!DOCTYPE html>
<html>
<head> <title>BadCops</title> </head>
<body>

<?php
 
echo "<h1>Welcome to BadCops Homepage ! </h1>";

echo "<br>";
echo "Host is : " . gethostname() . "<br>";
echo "Time is  : " . date("Y-m-d H:i:s") . "<br>";
echo "Requested URI is : " . $_SERVER['REQUEST_URI'] . "<br>";
echo "<br>";

# $log.="Date: " . date("Y-m-d H:i:s");
$log="Sur [" . gethostname() . "] ";
$log.="Srv: " . "BadCops ";
$log.="Demande: " . $_SERVER['REQUEST_URI'];

echo "log= <code>" . $log ."</code><br>";
$ret = syslog(LOG_INFO, $log);
if ( $ret != 1 )
  echo 'ERROR logging "'.$log.'"<br>';

?>

<h3>Form</h3>

Message = "<?php echo $_GET["message"]; ?>"<br>
Priority = "<?php echo $_GET["priority"]; ?>"<br><br>

<?php
$message = $_GET["message"];
$priority = $_GET["priority"];
if ( $message ) { 
  $log="[BadCops] ";
  $log.="[".gethostname() . "] ";
  if ( $priority ) $log.="[".$priority."] ";  
  $log.="addLog(\"".$message."\")";
  echo "New log line:<code>" . $log ."</code><br>";
  $ret = syslog(LOG_INFO, $log);
  if ( $ret != 1 )
    echo 'ERROR logging <code>"'.$log.'"<code><br>';
} else
  echo "NO PARAMETERS: priority or message.<br>"

?>


<form action="" method="get">
Enter log message: <input type="text" name="message"><br>
Priority:
<select name="priority">
<option value="LOG_CRIT">LOG_CRIT</option>
<option value="LOG_ERR">LOG_ERR</option>
<option value="LOG_WARNING">LOG_WARNING</option>
<option value="LOG_INFO" selected>LOG_INFO</option>
</select>
<input type="submit">

</form>

<?php

echo "<br><br><h3>TESTS ...</h3><br><br>";

 
if ( isset($_SERVER)  ) 
{ 
  $toto = syslog(LOG_INFO, "Hello World. myappli logs!");
  echo "toto= " . $toto . "<br>";
  echo  $_SERVER['DOCUMENT_ROOT'] . "<br>";


  echo "Looking on _SERVER <br>";
  $keys = array( "SERVER_NAME", "SERVER_ADDR", "REMOTE_ADDR", "HTTP_HOST", 'REQUEST_URI' );
  for ($n = 0; $n < count($keys); $n++) {
    echo $keys[$n] . "  ==> " . $_SERVER[$keys[$n]] . "<br>";
  }
#  $myarray = $_SERVER;
#  foreach(array_keys($myarray) as $key) {
#    echo $key . ":" . $_SERVER[$key] . "<br>";
#  }
 
/* 
  echo "Looking on _ENV <br>";
  $keys = array( "SERVER_NAME", "SERVER_ADDR", "REMOTE_ADDR", "HTTP_HOST" );
  for ($n = 0; $n < count($keys); $n++) {
    echo $keys[$n] . "  ==> " . $_SERVER[$keys[$n]] . "<br>";
  }

  echo "Looking all _ENV <br>";

  $myarray = $_ENV;
  foreach(array_keys($myarray) as $key) {
    echo $key . ":" . $myarray[$key] . "<br>";
  }
*/
}

#echo "variables : $_SERVER['DOCUMENT_ROOT']" ;
#echo "variables : $_SERVER['DOCUMENT_ROOT']" ;

?>

<?php  phpinfo() ?>

</body>
</html>
