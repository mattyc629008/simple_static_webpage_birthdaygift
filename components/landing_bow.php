<?php /* components/landing_bow.php — the closed book, wrapped in satin ribbon, with the bow to untie.
   ✏️ The prompt text is at the bottom of this file. */ ?>
<section class="stage" id="landing">
  <div class="cover">
    <div class="sheen"></div>
    <i class="gem a"></i><i class="gem b"></i><i class="gem c"></i><i class="gem d"></i><!-- corner pearls -->
    <div class="ribbon ribbon-h"></div>
    <div class="ribbon ribbon-v"></div>
    <button class="bow" id="bow" type="button" aria-label="Untie the bow">
      <svg viewBox="0 0 300 226" aria-hidden="true">
        <defs>
          <linearGradient id="satin" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#fbd0da"/><stop offset=".55" stop-color="#ee9fb3"/><stop offset="1" stop-color="#f8c3cf"/>
          </linearGradient>
          <radialGradient id="pg" cx=".35" cy=".3" r=".8"><stop offset="0" stop-color="#fff"/><stop offset="1" stop-color="#f3bccb"/></radialGradient>
        </defs>
        <path class="sat tail tail-l" d="M148 104 C130 140 112 172 94 206 L120 193 L134 218 C140 182 150 148 160 112Z"/>
        <path class="sat tail tail-r" d="M152 104 C170 140 188 172 206 206 L180 193 L166 218 C160 182 150 148 140 112Z"/>
        <path class="sat loop loop-l" d="M150 98 C126 26 26 14 22 84 C20 150 112 160 150 108Z"/>
        <path class="sat loop loop-r" d="M150 98 C174 26 274 14 278 84 C280 150 188 160 150 108Z"/>
        <path class="fold loop loop-l" d="M146 100 C118 58 66 54 54 84 C46 114 100 128 146 106Z"/>
        <path class="fold loop loop-r" d="M154 100 C182 58 234 54 246 84 C254 114 200 128 154 106Z"/>
        <path class="hl loop loop-l" d="M136 78 C108 36 56 34 40 66"/>
        <path class="hl loop loop-r" d="M164 78 C192 36 244 34 260 66"/>
        <rect class="sat knot" x="128" y="76" width="44" height="48" rx="16"/>
        <path class="hl knot" d="M138 88 C146 82 154 82 162 88"/>
        <circle class="pearl knot" cx="150" cy="104" r="8"/>
        <circle class="glint" cx="147" cy="101" r="2.4"/>
      </svg>
    </button>
  </div>
  <p class="prompt script"><span class="shine">Untie the bow for <?= htmlspecialchars($name) ?></span> 🎀</p>
</section>