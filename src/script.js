// Importo le dipendenze
var $ = require( "jquery" );
var Handlebars = require("handlebars");

$(document).ready(function() {

  $.ajax(
    {
      url: 'http://localhost:8888/php-ajax-dischi/dist/server.php',
      method: 'GET',
      success: function(risposta) {
        stampaAlbum(risposta);
      },
      error: function() {
        alert('errore');
      }
    }
  );

  ////////// STAMPA ALBUM
  // Funzione che stampa i singoli album con handlebars
  //  --> database: array di oggetti che mi torna dalla chiamata ajax al server e che andrò a ciclare. Ogni oggetto lo do in pasto a Handlebars
  // return: niente
  function stampaAlbum(database) {
    var source = $("#album-template").html();
    var template = Handlebars.compile(source);

    // ciclo l'array
    for (var i = 0; i < database.length; i++) {
      var singoloAlbum = database[i];
      var html = template(singoloAlbum);
      $('#albums .container').append(html);
    }
  }

});
