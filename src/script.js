// Importo le dipendenze
var $ = require( "jquery" );
var Handlebars = require("handlebars");

$(document).ready(function() {

  ottieniAlbums();

  $(document).on('change', '.select-artisti', function() {
    var artistaSelezionato = $(this).val();

    $.ajax(
      {
        url: 'http://localhost:8888/php-ajax-dischi/dist/server.php',
        method: 'GET',
        data: {
          author: artistaSelezionato,
        },
        success: function(risposta) {
          stampaAlbum(risposta);
        },
        error: function() {
          alert('errore');
        }
      }
    );
  });

  ////////// OTTIENI ALBUM
  // Chiamata al server per ottenere tutti gli albums
  function ottieniAlbums() {

    $.ajax(
      {
        url: 'http://localhost:8888/php-ajax-dischi/dist/server.php',
        method: 'GET',
        success: function(risposta) {
          generaSelect(risposta);
          stampaAlbum(risposta);
        },
        error: function() {
          alert('errore');
        }
      }
    );
  }

  ////////// STAMPA ALBUM
  // Funzione che stampa i singoli album con handlebars
  //  --> database: array di oggetti che mi torna dalla chiamata ajax al server e che andrò a ciclare. Ogni oggetto lo do in pasto a Handlebars
  // return: niente
  function stampaAlbum(database) {

    // reset html prima di stampare gli album
    $('#albums .container').html('');

    // preparo il template handlebars
    var source = $("#album-template").html();
    var template = Handlebars.compile(source);

    // ciclo l'array
    for (var i = 0; i < database.length; i++) {
      var singoloAlbum = database[i];
      var html = template(singoloAlbum);
      $('#albums .container').append(html);
    }
  }

  ////////// GENERA SELECT
  // Funzione che stampa le opzioni della select per filtrare gli artisti
  //  --> database: array di oggetti che mi torna dalla chiamata ajax al server.php e che andrò a ciclare. Leggo la chiave 'author' di ogni oggetto e lo do in pasto a Handlebars solo se il valore di quella chiave non è già presente nell'arrayArtisti
  //  --> arrayArtisti: array di appoggio che mi serve per verificare se un artista è già presente nell'elenco
  // return: niente
  function generaSelect(database) {
    var source = $("#artisti-template").html();
    var template = Handlebars.compile(source);
    var arrayArtisti = [];

    // ciclo l'array
    for (var i = 0; i < database.length; i++) {
      var singoloAlbum = database[i];
      var singoloArtista = singoloAlbum.author;

      if (!arrayArtisti.includes(singoloArtista)) {
        arrayArtisti.push(singoloArtista);

        opzioneSelect = {
          author: singoloArtista
        };
        var html = template(opzioneSelect);
        $('.select-artisti').append(html);
      }
    }
  }

});
