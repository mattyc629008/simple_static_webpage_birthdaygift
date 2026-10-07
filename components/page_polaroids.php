<?php /* components/page_polaroids.php — Memories scrapbook (tap a polaroid to flip it).
   ✏️ 1) Put your photos in  assets/images/memories/  (1.jpg, 2.jpg …)
   ✏️ 2) Edit the captions below. Add or remove rows freely — the grid adjusts itself. */
$polaroids = [
    ['photo' => 'assets/images/memories/1.jpg', 'caption' => 'Caption 1: TAMBAY SA PLAZA AFTER SCHOOL'],
  ['photo' => 'assets/images/memories/2.jpg', 'caption' => 'Caption 2:   I hope you still remember this'],
  ['photo' => 'assets/images/memories/3.jpg', 'caption' => 'Caption 3: Karaoke sa SM Manila at lakad maghapon'],
  ['photo' => 'assets/images/memories/4.jpg', 'caption' => 'Caption 4: Foodtrip sa LUNETA'],
  ['photo' => 'assets/images/memories/5.jpg', 'caption' => 'Caption 5: Pinaka memorable na date for me haha'],
  ['photo' => 'assets/images/memories/6.jpg', 'caption' => 'Caption 6: FAVOURITE MO'],
];
$tilts = [-4, 3, -2, 5, -5, 2]; // little rotations so they look hand-placed
?>
<section class="page wide" aria-label="Little Memories"><!-- "wide" = the book grows on this page -->
  <div class="inner">
    <h2 class="script">Little Memories</h2>
    <p class="sub">tap a polaroid to flip it</p>
    <div class="polaroids">
      <?php foreach ($polaroids as $i => $p): ?>
      <button class="polaroid" type="button" style="--rot:<?= $tilts[$i % count($tilts)] ?>deg;--i:<?= $i ?>" aria-label="Flip memory <?= $i + 1 ?>">
        <span class="face front">
          <span class="photo"><i class="bg" style="background-image:url('<?= htmlspecialchars($p['photo']) ?>')"></i><img src="<?= htmlspecialchars($p['photo']) ?>" alt="" loading="lazy" onerror="this.parentNode.classList.add('empty');this.remove()"></span>
          <i class="tape"></i>
        </span>
        <span class="face back"><span class="script"><?= htmlspecialchars($p['caption']) ?></span></span>
      </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>
 