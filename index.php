<?php
  include_once 'reveal.php';
  include_once 'Trello.php';

  revealStart();
?>
<section>
  <section data-markdown>
      <script type="text/template">
          # Generation Alive Songtexte

          - [Playlisten](#/1)
      </script>
  </section>
  <section data-markdown>
    <script type="text/template">
      ```
      <?php var_dump(trelloGetPlaylists("qebfXdtx")); ?>
      ```
    </script>
  </section>
  <section data-markdown>
    <script type="text/template">
      ```
      <?php var_dump(trelloGetPlaylist("5418c9a6ecfdc2e5a18c3860")); ?>
      ```
    </script>
  </section>
  <section data-markdown>
    <script type="text/template">
      ```
      <?php var_dump(trelloGetPlaylistName("5418c9a6ecfdc2e5a18c3860")); ?>
      ```
    </script>
  </section>
</section>
<section data-markdown>
  <script type="text/template">
    ## Playlisten

    <?php $playlists = trelloGetPlaylists("ZHjuYuwy");
    foreach ($playlists as $id => $name) {
      echo "- [".$name."](playlist.php?id=".$id.")\n";
    }

    ?>
  </script>
</section>

<?php revealEnd(); ?>
