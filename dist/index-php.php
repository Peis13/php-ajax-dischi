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

<?php include __DIR__ . '/database.php'; ?>

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
    <header>
      <div class="container">
        <nav class="navbar">

          <!-- Logo -->
          <div class="logo">
            <img src="img/logo.png" alt="logo-spotify">
          </div>
          <!-- Fine Logo -->
        </nav>
      </div>
    </header>
    <!-- FINE HEADER -->

    <!-- MAIN -->
    <main>
      <section id="albums" class="sezione">
        <div class="container">
          <?php foreach ($database as $album) { ?>

            <!-- Singolo album -->
            <div class="singolo-album">

              <!-- immmagine di copertina -->
              <div class="immagine-copertina">
                <img src="<?php echo $album['poster'] ?>" alt="immagine-copertina">
              </div>
              <!-- fine immagine di copertina -->

              <!-- titolo album -->
              <div class="titolo-album">
                <h3><?php echo $album['title']; ?></h3>
              </div>
              <!-- fine titolo album -->

              <!-- descrizione -->
              <div class="descrizione-album">
                <span class="artista"><?php echo $album['author']; ?></span>
                <span class="anno"><?php echo $album['year']; ?></span>
              </div>
              <!-- fine descrizione -->
            </div>
            <!-- Fine Singolo album -->
          <?php } ?>
        </div>
      </section>
    </main>
    <!-- FINE MAIN -->
  </body>
</html>
