<?php
/*
function array_to_objecttree($array) {
  if (is_numeric(key($array))) { // Because Filters->Filter should be an array
    foreach ($array as $key => $value) {
      $array[$key] = array_to_objecttree($value);
    }
    return $array;
  }
  $Object = new stdClass();
  foreach ($array as $key => $value) {
    if (is_array($value)) {
      $Object->$key = array_to_objecttree($value);
    }  else {
      $Object->$key = $value;
    }
  }
  return $Object;
}
*/

function anlegen($Request){

  $log = $Request->Kopf->Bestellnummer . ";" .
         $Request->Kopf->Bestelldatum . ";" .
         $Request->Kopf->Auftraggeber->Name . ";" .
         time() . "\n";
         

  $handle = @fopen('log.txt', "ab+");
  fwrite($handle, $log);
  fclose ($handle);
  return "Besllung: " . $Request->Kopf->Bestellnummer . " gespeichert";
}

$server=new SoapServer("Bestellung_Service.wsdl");
$server->addFunction("anlegen");
$server->handle();
?>