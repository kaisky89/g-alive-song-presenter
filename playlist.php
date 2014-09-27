<?php 
  include_once 'reveal.php';
  include_once 'Trello.php';
  include_once 'Song.php';

  revealStart(); 
?>

<?php
  // get the playlist data
  $playlistId = $_GET[id];
  $playlist = trelloGetPlaylist($playlistId);
  $songs;
  foreach ($playlist as $id => $name) {
    $songs[$name] = new Song($id);
  }
  
  // iterate over the songs
  foreach ($songs as $name => $song)
  { 
?>
    <section>
      <section data-markdown>
        <script type="text/template">
          # <?php echo $name ?>
        </script>
      </section>
      <?php echo $song->inHTML(); ?>
    </section>
<?php
  }
?>
<?php revealEnd(); ?>