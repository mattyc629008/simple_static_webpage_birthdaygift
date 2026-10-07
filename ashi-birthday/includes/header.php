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
</head>
<body>
<div id="hearts" aria-hidden="true"></div>
