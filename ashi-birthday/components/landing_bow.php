<?php /* components/landing_bow.php — the closed book, wrapped in ribbon, with the bow to untie.
   ✏️ The prompt text is at the bottom of this file. */ ?>
<section class="stage" id="landing">
  <div class="cover">
    <div class="ribbon ribbon-h"></div>
    <div class="ribbon ribbon-v"></div>
    <button class="bow" id="bow" type="button" aria-label="Untie the bow">
      <svg viewBox="0 0 300 210" aria-hidden="true">
        <defs>
          <linearGradient id="satin" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#fbd0da"/><stop offset=".55" stop-color="#ee9fb3"/><stop offset="1" stop-color="#f8c3cf"/>
          </linearGradient>
        </defs>
        <path class="sat tail tail-l" d="M146 100 L92 196 L118 186 L132 206 L160 110Z"/>
        <path class="sat tail tail-r" d="M154 100 L208 196 L182 186 L168 206 L140 110Z"/>
        <path class="sat loop loop-l" d="M150 96 C122 18 28 16 28 82 C28 142 112 154 150 104Z"/>
        <path class="sat loop loop-r" d="M150 96 C178 18 272 16 272 82 C272 142 188 154 150 104Z"/>
        <path class="hl loop loop-l" d="M138 90 C112 52 70 50 58 78"/>
        <path class="hl loop loop-r" d="M162 90 C188 52 230 50 242 78"/>
        <rect class="sat knot" x="130" y="74" width="40" height="44" rx="15"/>
        <circle class="pearl knot" cx="150" cy="96" r="6"/>
      </svg>
    </button>
  </div>
  <p class="prompt script">Untie the bow for <?= htmlspecialchars($name) ?> 🎀</p>
</section>
