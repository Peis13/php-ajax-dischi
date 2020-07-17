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
    <?php include __DIR__ . '/partials/header.php'; ?>
    <!-- FINE HEADER -->

    <!-- MAIN -->
    <main>
      <section id="albums" class="sezione">
        <div class="container"></div>
      </section>
    </main>
    <!-- FINE MAIN -->

    <!-- Script JS -->
    <script type="text/javascript" src="js/script.js"></script>

    <!-- Template Handlebars -->
    <script id="album-template" type="text/x-handlebars-template">

      <!-- Singolo album -->
      <div class="singolo-album">

        <!-- immmagine di copertina -->
        <div class="immagine-copertina">
          <img src="{{ poster }}" alt="immagine-copertina">
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

  </body>
</html>
