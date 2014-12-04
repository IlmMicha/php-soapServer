<?php
function anlegen($Request){

  $log = $Request->Text . ";" .
         $Request->Datum . ";" .
         $Request->Uhrzeit . "\n";
         

  $handle = @fopen('fields.csv', "ab+");
  fwrite($handle, $log);
  fclose ($handle);
}

$server=new SoapServer("fields.wsdl");
$server->addFunction("anlegen");
$server->handle();
?>