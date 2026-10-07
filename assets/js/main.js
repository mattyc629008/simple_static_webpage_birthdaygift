/* =========================================================
   Birthday Book — main.js (vanilla JS)
   1 sparkles + ambient + Midnight Mode  2 untie the bow  3 book navigation
   4 vinyl player  5 gift reveal
   ========================================================= */
(() => {
  const $  = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => [...r.querySelectorAll(s)];

  /* ---- 1. Sparkles: ✏️ change the emoji list to taste ---- */
  const GLYPHS = ['🩷', '💖', '✨', '🎀', '🌸', '🤍'];
  const spawn = (x, y, dx, dy) => {
    const s = document.createElement('span');
    s.className = 'spark';
    s.textContent = GLYPHS[Math.random() * GLYPHS.length | 0];
    s.style.cssText = `left:${x}px;top:${y}px;font-size:${14 + Math.random() * 16}px;--dx:${dx}px;--dy:${dy}px;--r:${Math.random() * 360 - 180}deg`;
    s.addEventListener('animationend', () => s.remove());
    document.body.appendChild(s);
  };
  const burst = (x, y, n) => {
    for (let i = 0; i < n; i++) {
      const a = Math.random() * Math.PI * 2, d = 90 + Math.random() * 190;
      spawn(x, y, Math.cos(a) * d, Math.sin(a) * d - 60);
    }
  };
  const rain = (n = 40) => {
    for (let i = 0; i < n; i++)
      setTimeout(() => spawn(Math.random() * innerWidth, -30, Math.random() * 120 - 60, innerHeight + 80), i * 60);
  };

  /* ambient background: drifting petals + twinkling glints (CSS shapes, no emojis) */
  const amb = $('#ambient'), rnd = (a, b) => a + Math.random() * (b - a);
  const mk = (cls, css) => { const e = document.createElement('span'); e.className = cls; e.style.cssText = css; amb.appendChild(e); };
  for (let i = 0; i < 14; i++) mk('petal', `left:${rnd(0, 100)}%;--s:${rnd(10, 20)}px;--x:${rnd(-60, 60)}px;--d:${rnd(14, 26)}s;--l:${-rnd(0, 26)}s`);
  for (let i = 0; i < 18; i++) mk('glint', `left:${rnd(0, 100)}%;top:${rnd(0, 100)}%;--s:${rnd(3, 6)}px;--d:${rnd(3, 7)}s;--l:${-rnd(0, 7)}s`);

  /* ---- Midnight Mode ---- */
  const root = document.documentElement, tgl = $('#theme');
  ['blush','pink','rose','gold','cream','ink','bg1','bg2','s1','s2','s3','g1','rb1','rb2','edge','track','paperw','dot','lace','line','shadow','glow','inset']
    .forEach(n => { try { CSS.registerProperty({ name: '--' + n, syntax: '<color>', inherits: true, initialValue: '#000' }); } catch (e) {} });
  requestAnimationFrame(() => root.classList.add('ready')); // enable the smooth fade only after first paint
  const setTheme = night => {
    root.dataset.theme = night ? 'night' : 'day';
    tgl.setAttribute('aria-pressed', night);
    $('meta[name=theme-color]').content = night ? '#240a15' : '#fdeef1';
    try { localStorage.theme = night ? 'night' : 'day'; } catch (e) {}
  };
  tgl.addEventListener('click', () => setTheme(root.dataset.theme !== 'night'));
  setTheme(root.dataset.theme === 'night');

  /* ---- 2. Untie the bow ---- */
  const landing = $('#landing'), book = $('#book'), bow = $('#bow');
  bow.addEventListener('click', () => {
    if (landing.classList.contains('tug')) return;
    landing.classList.add('tug');                     // 1) a little tug on the knot
    setTimeout(() => {
      landing.classList.add('untied');                // 2) bow loosens, ribbons unspool, cover opens
      const r = bow.getBoundingClientRect();
      burst(r.left + r.width / 2, r.top + r.height / 2, 24);
    }, 520);
    setTimeout(() => { book.classList.add('show'); book.removeAttribute('aria-hidden'); }, 2000); // book fades in as the cover opens
    setTimeout(() => landing.remove(), 3800);
  });

  /* ---- 3. Book navigation (buttons, dots, arrow keys, swipe) ---- */
  const pages = $$('.page'), dots = $('#dots'), prev = $('#prev'), next = $('#next');
  let cur = 0;
  pages.forEach(() => dots.appendChild(document.createElement('i')));
  $$('.inner').forEach(el => [...el.children].forEach((c, n) => c.style.setProperty('--n', n))); // stagger text entrance
  const go = n => {
    cur = Math.max(0, Math.min(pages.length - 1, n));
    pages.forEach((p, i) => { p.classList.toggle('active', i === cur); p.classList.toggle('before', i < cur); });
    $$('i', dots).forEach((d, i) => d.classList.toggle('on', i === cur));
    book.classList.toggle('wide', pages[cur].classList.contains('wide')); // bigger book on the polaroid page
    prev.disabled = cur === 0;
    next.disabled = cur === pages.length - 1;
  };
  prev.addEventListener('click', () => go(cur - 1));
  next.addEventListener('click', () => go(cur + 1));
  addEventListener('keydown', e => {
    if (e.key === 'ArrowRight') go(cur + 1);
    if (e.key === 'ArrowLeft') go(cur - 1);
  });
  let sx = 0;
  book.addEventListener('touchstart', e => { sx = e.touches[0].clientX; }, { passive: true });
  book.addEventListener('touchend', e => {
    const d = e.changedTouches[0].clientX - sx;
    if (Math.abs(d) > 60) go(cur + (d < 0 ? 1 : -1));
  });
  go(0);

  /* ---- Polaroids: tap to flip ---- */
  $$('.back .script').forEach(t => { const n = t.textContent.length; if (n > 40) t.style.fontSize = n > 150 ? '.8rem' : n > 110 ? '.95rem' : n > 70 ? '1.1rem' : '1.25rem'; }); // long captions shrink to fit
  $$('.polaroid').forEach(c => c.addEventListener('click', () => c.classList.toggle('flipped')));

  /* ---- 4. Vinyl player ---- */
  const audio = $('#audio'), songPage = $('.song'), playBtn = $('#play');
  const bar = $('#bar'), fill = $('#fill'), clock = $('#time'), msg = $('#songMsg');
  const mmss = s => Math.floor(s / 60) + ':' + String(Math.floor(s % 60)).padStart(2, '0');
  const noSong = () => { msg.hidden = false; };
  playBtn.addEventListener('click', () => audio.paused ? audio.play().catch(noSong) : audio.pause());
  audio.addEventListener('play',  () => { songPage.classList.add('playing');    playBtn.textContent = '❚❚'; });
  audio.addEventListener('pause', () => { songPage.classList.remove('playing'); playBtn.textContent = '▶'; });
  audio.addEventListener('error', noSong);
  audio.addEventListener('timeupdate', () => {
    if (!audio.duration) return;
    fill.style.width = audio.currentTime / audio.duration * 100 + '%';
    clock.textContent = mmss(audio.currentTime) + ' / ' + mmss(audio.duration);
  });
  bar.addEventListener('click', e => {
    if (!audio.duration) return;
    const r = bar.getBoundingClientRect();
    audio.currentTime = (e.clientX - r.left) / r.width * audio.duration;
  });

  /* ---- 5. Gift reveal ---- */
  const gift = $('#gift'), wrap = $('.gift-wrap'), frame = $('#frame'), img = $('img', frame);
  const missing = () => frame.classList.add('missing');
  img.addEventListener('error', missing);
  if (img.complete && !img.naturalWidth) missing();
  const openGift = () => {
    if (wrap.classList.contains('opened')) return;
    wrap.classList.add('opened');
    const r = gift.getBoundingClientRect();
    burst(r.left + r.width / 2, r.top + 30, 50);
    setTimeout(rain, 500);
  };
  gift.addEventListener('click', openGift);
  gift.addEventListener('keydown', e => {
    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openGift(); }
  });
})();