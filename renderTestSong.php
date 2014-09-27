<?php include_once 'reveal.php'; revealStart("Test"); ?>
        <section>
        <?php
          include_once 'Trello.php';
          include_once 'Song.php';

          $testSong = new Song("tHExdVrx");
          echo $testSong->inHTML();
        ?>
      </section>
      <section>
        <?php
          include_once 'Trello.php';
          include_once 'Song.php';

          $testSong = new Song("tHExdVrx");
          echo $testSong->inHTML();
        ?>
      </section>
<?php revealEnd(); ?>