<?php
 $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
 $stats=new MongoDB\Driver\Command(["dbstats"=>1]);
 $res=$mng->executeCommand("phpbasics",$stats);
 
 $stats=current($res->toArray());
 print_r($stats);
 ?>