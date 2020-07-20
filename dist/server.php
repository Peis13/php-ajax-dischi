<?php
// Richiamo il database che poi andrò a convertire in json
include __DIR__ . '/database.php';
header('Content-Type: application/json');

// Se l'array $_GET che mi torna dalla chiamata ajax è vuoto oppure il valore della chiave 'author' è uguale a 'tutti'
//  --> converti in json tutto il $database
// altrimenti
//  --> prendi la chiave 'author' dell'array $_GET e comparala con la stessa chiave degli $album in $database.
//      --> se c'è una corrispondenza, aggiungi l'$album all' array di appoggio '$albums_artista_richiesto' e infine convertilo in json
if (empty($_GET) || $_GET['author'] === 'tutti') {

  $database_json = json_encode($database);
  echo $database_json;

} else {
  $artista_richiesto = $_GET['author'];

  foreach ($database as $album) {

    if ($artista_richiesto === $album['author']) {
      $albums_artista_richiesto[] = $album;
    }
  }
  $albums_artista_richiesto_json = json_encode($albums_artista_richiesto);
  echo $albums_artista_richiesto_json;
}
?>
