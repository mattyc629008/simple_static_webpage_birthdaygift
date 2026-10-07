<?php
/* includes/header.php — <head>, fonts and the floating-hearts layer.
   Uses $pageTitle from index.php. */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#fdeef1">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <!-- ✏️ Fonts: Dancing Script (headings) + Playfair Display (text). To swap, change this link AND --script / --serif in style.css -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- remembers Midnight Mode before the page paints (no flash) -->
  <script>try{if(localStorage.theme==='night')document.documentElement.dataset.theme='night'}catch(e){}</script>
</head>
<body>
<div id="ambient" aria-hidden="true"></div>
<!-- Midnight Mode toggle (corner) -->
<button class="mode" id="theme" type="button" title="Midnight Mode" aria-label="Midnight Mode" aria-pressed="false">
  <span class="knob">
    <svg class="bowi" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12C9 5 2 6 3 12s6 5 9 0c3 5 9 6 9 0s-6-7-9 0zM12 12l-3 8 3-2 3 2z"/></svg>
    <svg class="moon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 14.5A8 8 0 0 1 9.5 4 8 8 0 1 0 20 14.5z"/></svg>
  </span>
</button>