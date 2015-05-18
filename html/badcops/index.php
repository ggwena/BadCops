<?php 
echo "Hello bad ! <br>"; 
if ( isset($_SERVER)  ) 
{ echo "hello";

  $toto = syslog(LOG_INFO, "Hello World. myappli logs!");
  echo "toto= " . $toto;
  echo  $_SERVER['DOCUMENT_ROOT'] . "<br>";


  echo "Looking on _SERVER <br>";
  $keys = array( "SERVER_NAME", "SERVER_ADDR", "REMOTE_ADDR", "HTTP_HOST" );
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

