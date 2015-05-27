<!DOCTYPE html>
<html>
<head> <title>BadCops</title> </head>
<body>

<?php
 
echo "<h1>Welcome to BadCops Homepage ! </h1>";

echo "<br>";
echo "RPM: ";
include 'signature';
echo "<br>";
echo "Host is : " . gethostname() . "<br>";
echo "Time is  : " . date("Y-m-d H:i:s") . "<br>";
echo "Requested URI is : " . $_SERVER['REQUEST_URI'] . "<br>";
echo "<br><hr width=600px size=7px>";
# $log.="Date: " . date("Y-m-d H:i:s");
$log="Sur [" . gethostname() . "] ";
$log.="Srv: " . "BadCops ";
$log.="Demande: " . $_SERVER['REQUEST_URI'];

echo "log= <code>" . $log ."</code><br>";
$ret = syslog(LOG_INFO, $log);
if ( $ret != 1 )
  echo 'ERROR logging "'.$log.'"<br>';
echo "<br><hr width=600px size=7px>";
?>

<form action="" >
<fieldset><legend>Enlever les parametres GET de lURL</legend>
<input type="submit"  VALUE="Nettoyer URL">
</fieldset>
</form>
<br><hr width=600px size=7px>

<h3>Logs</h3>
<blockquote>
  <?php
  // isset($_GET['message']) ? $_GET['message'] : 'wtf';
  if ( $message=isset($_GET['message']) ? $_GET['message'] : null ) {  
    echo "Write message to logs:<br>";
  
    $log="[BadCops] "."[".gethostname()."] ";
    if ( $priority=isset($_GET['priority']) ? $_GET['priority'] : null ) 
      $log.="[".$priority."] ";  
    $log.="addLog(\"".$message."\")";
    echo "New log line: <code>" . $log ."</code><br>";
    $ret = syslog(LOG_INFO, $log);
    if ( $ret != 1 ) 
      echo 'ERROR logging <code>"'.$log.'"<code><br>';
  } /* else
    echo "No messages to write to logs.<br>" */
  ?>
</blockquote>

<form action="" method="get">
<fieldset><legend>Entrer une message specifique dans les logs</legend>
Enter log message: <input type="text" name="message"><br>
Priority: <select name="priority">
<option value="LOG_CRIT">LOG_CRIT</option>
<option value="LOG_ERR">LOG_ERR</option>
<option value="LOG_WARNING">LOG_WARNING</option>
<option value="LOG_INFO" selected>LOG_INFO</option>
</select>
<input type="submit">
</fieldset>
</form>
<hr width=600px size=7px>


<h3>Benchmarks</h3>
<blockquote>
  <?php
  if ( $benchmark=isset($_GET['benchmark']) ? $_GET['benchmark'] : null ) {  
    echo "Executing Benchmark<br>";
    echo "(php.ini:max_execution_time= ".ini_get("max_execution_time")." sec. )";

    switch ($benchmark) {
        case 'php':
            include 'bench.php';
            echo "<br>Standard :  < 8s.";
            break;
        case label2:
            break;
        case label3:
            break;
        default:
            echo "No benchmark code found for $benchmark.";
    }
  }   
  ?>
</blockquote>

<form action="" method="get">
<fieldset><legend>Executer un benchmark</legend>
<input type="checkbox" name="benchmark" value="php" selected>php from www.php-benchmark-script.com </input>
<br><input type="submit" name="Lancer!">
</fieldset></form>
<hr width=600px size=7px>


<?php
echo "<br><hr width=600px size=7px><br><h3>TESTS ...</h3><br><br>";
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

<?php // phpinfo() 
?>

</body>
</html>
