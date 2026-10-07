<?php
/* index.php — main controller. Edit the 3 settings below, nothing else needed here. */
$name      = 'Ashi';                                   // ✏️ her name (landing, letter, gift page)
$pageTitle = "Happy Birthday, $name 🎀";                // ✏️ browser tab title
$pages     = ['page_letter', 'page_song', 'page_gift']; // ✏️ page order (files live in /components)

require __DIR__ . '/includes/header.php';
require __DIR__ . '/components/landing_bow.php';
?>
<main class="stage book" id="book" aria-hidden="true">
  <div class="pages">
    <?php foreach ($pages as $p) require __DIR__ . "/components/{$p}.php"; ?>
  </div>
  <nav class="nav">
    <button id="prev" type="button">‹ Previous</button>
    <div class="dots" id="dots"></div>
    <button id="next" type="button">Next ›</button>
  </nav>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
