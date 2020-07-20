<!-- Stampare a schermo una decina di dischi musicali (vedi screenshot nel file zip) in due modi diversi:
	- Solo con l’utilizzo di PHP, che stampa direttamente i dischi in pagina: al caricamento della pagina ci saranno tutti i dischi.
	- Attraverso l’utilizzo di AJAX: al caricamento della pagina ajax chiederà attraverso una chiamata i dischi a php e li stamperà attraverso handlebars.

Utilizzare: Html, Sass, JS, jQuery, handlebars, Php
Font: Lato

Opzionale:
- Attraverso un’altra chiamata ajax, filtrare gli
album per artista

Consigli:
	1- Creare 2 file index diversi, uno per la versione col solo php, l’altro per la versione Ajax. -->


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Musica</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/entry.css">
  </head>
  <body>

    <!-- HEADER -->
    <?php include __DIR__ . '/partials/header.php'; ?>
    <!-- FINE HEADER -->

    <!-- MAIN -->
    <main>
      <section id="albums" class="sezione">
        <div class="container"></div>
      </section>
    </main>
    <!-- FINE MAIN -->

    <!-- TEMPLATE ALBUM -->
    <script id="album-template" type="text/x-handlebars-template">

      <!-- Singolo album -->
      <div class="singolo-album">

        <!-- immmagine di copertina -->
        <div class="immagine-copertina">
          <img src="{{ poster }}" alt="{{ title }}">
        </div>
        <!-- fine immagine di copertina -->

        <!-- titolo album -->
        <div class="titolo-album">
          <h3>{{ title }}</h3>
        </div>
        <!-- fine titolo album -->

        <!-- descrizione -->
        <div class="descrizione-album">
          <span class="artista">{{ author }}</span>
          <span class="anno">{{ year }}</span>
        </div>
        <!-- fine descrizione -->
      </div>
      <!-- Fine Singolo album -->
    </script>
    <!-- FINE TEMPLATE ALBUM -->

    <!-- TEMPLATE ARTISTI -->
    <script id="artisti-template" type="text/x-handlebars-template">
      <option value="{{ author }}">{{ author }}</option>
    </script>
    <!-- FINE TEMPLATE ARTISTI -->

    <!-- Script JS -->
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
