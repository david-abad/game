<?php


 

 require_once('autoload.php');
if (isset($_REQUEST['hauth_start']) || isset($_REQUEST['hauth_done']))
{
  Hybrid_Endpoint::process();

}

 
?>