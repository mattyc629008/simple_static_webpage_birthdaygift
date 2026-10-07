<?php /* components/page_gift.php — Final page: the gift box + framed drawing.
   ✏️ Drop your drawing at  assets/images/drawing.png  (PNG/JPG, any size). */ ?>
<section class="page" aria-label="The Surprise Gift">
  <div class="inner gift-wrap">
    <p class="hint script">
      <span class="b4">Open your final birthday gift ✨</span>
      <span class="aft">Happy Birthday, <?= htmlspecialchars($name) ?> 💗</span>
    </p>
    <div class="reveal">
      <div class="gift" id="gift" role="button" tabindex="0" aria-label="Open your final birthday gift">
        <div class="lid"><span>🎀</span></div>
        <div class="base"></div>
      </div>
      <figure class="frame" id="frame">
        <img src="assets/images/drawing.png" alt="A hand-drawn picture made with love">
      </figure>
    </div>
  </div>
</section>
