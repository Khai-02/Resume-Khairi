<?php
$d = require __DIR__ . '/data.php';
function e($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$hasPhoto = file_exists(__DIR__ . '/' . $d['photo']);
$hasCv    = file_exists(__DIR__ . '/' . $d['cv']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($d['name']) ?> | <?= e($d['role']) ?></title>
<meta name="description" content="<?= e($d['tagline']) ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=Figtree:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="bg" aria-hidden="true"><i class="b1"></i><i class="b2"></i><i class="b3"></i></div>

<header class="nav">
  <a class="brand" href="#top"><?= e($d['name']) ?></a>
  <button class="burger" aria-label="Menu" aria-expanded="false"><span></span><span></span></button>
  <nav>
    <a href="#about">About</a><a href="#experience">Experience</a><a href="#projects">Projects</a>
    <a href="#skills">Skills</a><a href="#education">Education</a><a href="#contact" class="pill">Contact</a>
  </nav>
</header>

<main id="top">
<section class="hero wrap">
  <div class="hero-text">
    <p class="hello">Hi, I'm</p>
    <h1><?= e($d['fullname']) ?></h1>
    <p class="role"><?= e($d['role']) ?></p>
    <p class="lead"><?= e($d['tagline']) ?></p>
    <div class="cta">
      <a class="btn solid" href="#projects">See my projects</a>
      <?php if ($hasCv): ?><a class="btn" href="<?= e($d['cv']) ?>" download>Download CV</a>
      <?php else: ?><a class="btn" href="#contact">Get in touch</a><?php endif; ?>
    </div>
    <ul class="stats">
      <?php foreach ($d['stats'] as $s): ?><li><b><?= e($s[0]) ?></b><span><?= e($s[1]) ?></span></li><?php endforeach; ?>
    </ul>
  </div>
  <figure class="portrait">
    <?php if ($hasPhoto): ?><img src="<?= e($d['photo']) ?>" alt="Photo of <?= e($d['name']) ?>">
    <?php else: ?><div class="init" aria-hidden="true">KI</div><?php endif; ?>
  </figure>
</section>

<section id="about" class="wrap block two">
  <h2>About me</h2>
  <div>
    <p class="big"><?= e($d['about']) ?></p>
    <ul class="langs"><?php foreach ($d['languages'] as $l): ?><li><?= e($l[0]) ?> <span><?= e($l[1]) ?></span></li><?php endforeach; ?></ul>
  </div>
</section>

<section id="experience" class="wrap block two">
  <h2>Experience</h2>
  <ol class="timeline">
    <?php foreach ($d['experience'] as $x): ?>
    <li><time><?= e($x[0]) ?></time><h3><?= e($x[1]) ?></h3><p class="org"><?= e($x[2]) ?></p><p><?= e($x[3]) ?></p></li>
    <?php endforeach; ?>
  </ol>
</section>

<section id="projects" class="band">
  <div class="wrap block">
    <h2>Projects</h2>
    <div class="projects">
      <?php foreach ($d['projects'] as $i => $p): ?>
      <article class="proj p<?= $i ?>">
        <h3><?= e($p[0]) ?></h3><p class="sub"><?= e($p[1]) ?></p><p><?= e($p[2]) ?></p>
        <ul class="tags"><?php foreach ($p[3] as $t): ?><li><?= e($t) ?></li><?php endforeach; ?></ul>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section id="skills" class="wrap block two">
  <h2>Skills</h2>
  <dl class="skills">
    <?php foreach ($d['skills'] as $group => $items): ?>
    <div><dt><?= e($group) ?></dt><dd><?php foreach ($items as $it): ?><span><?= e($it) ?></span><?php endforeach; ?></dd></div>
    <?php endforeach; ?>
  </dl>
</section>

<section id="education" class="wrap block two">
  <h2>Education</h2>
  <ol class="timeline">
    <?php foreach ($d['education'] as $x): ?>
    <li><time><?= e($x[0]) ?></time><h3><?= e($x[1]) ?></h3><p class="org"><?= e($x[2]) ?></p><p><?= e($x[3]) ?></p></li>
    <?php endforeach; ?>
  </ol>
</section>

<section class="wrap block two">
  <h2>Awards and leadership</h2>
  <div>
    <ul class="awards"><?php foreach ($d['awards'] as $a): ?><li><b><?= e($a[0]) ?></b><span><?= e($a[1]) ?></span></li><?php endforeach; ?></ul>
    <ol class="timeline compact">
      <?php foreach ($d['leadership'] as $x): ?>
      <li><time><?= e($x[0]) ?></time><h3><?= e($x[1]) ?></h3><p class="org"><?= e($x[2]) ?></p></li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<section id="contact" class="band contact">
  <div class="wrap block">
    <h2>Let's work together</h2>
    <p class="lead">Open to internships, projects and collaborations. The fastest way to reach me is WhatsApp or email.</p>
    <div class="cta">
      <a class="btn solid" href="mailto:<?= e($d['email']) ?>">Email me</a>
      <a class="btn light" href="https://wa.me/<?= e($d['whatsapp']) ?>" target="_blank" rel="noopener">WhatsApp</a>
    </div>
    <p class="meta"><?= e($d['email']) ?> · <?= e($d['phone']) ?> · <?= e($d['location']) ?></p>
  </div>
</section>
</main>

<footer class="wrap foot">&copy; <?= date('Y') ?> <?= e($d['fullname']) ?></footer>
<script src="assets/app.js"></script>
</body>
</html>
