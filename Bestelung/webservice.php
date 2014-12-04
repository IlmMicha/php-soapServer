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