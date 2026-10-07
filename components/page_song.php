<?php /* components/page_song.php — Page 2: A Song For You (vinyl player).
   ✏️ 1) Drop your mp3 at  assets/audio/song.mp3   2) Edit the title/artist below. */
$songTitle  = 'Cologne';     // ✏️
$songArtist = 'Beabadoobee';  // ✏️
?>
<section class="page song" aria-label="A Song For You">
  <div class="inner">
    <h2 class="script">A Song For You</h2>
    <div class="deck">
      <div class="vinyl"><b></b></div>
      <div class="arm"></div>
    </div>
    <p class="track"><?= htmlspecialchars($songTitle) ?> <small>— <?= htmlspecialchars($songArtist) ?></small></p>
    <!-- ✏️ audio file path (change only if you rename the file) -->
    <audio id="audio" src="assets/audio/song.mp3" preload="metadata"></audio>
    <div class="controls">
      <button class="round" id="play" type="button" aria-label="Play or pause">▶</button>
      <div class="bar" id="bar"><div class="fill" id="fill"></div></div>
      <span id="time">0:00</span>
    </div>
    <p class="note" id="songMsg" hidden><code>assets/audio/song.mp3</code> ♡</p>
  </div>
</section>
