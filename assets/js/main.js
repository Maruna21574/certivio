/* CERTIVIO – skripty */
(function () {
  'use strict';

  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };

  /* ----- hlavička: tieň po scrolle ----- */
  var header = $('.site-header');
  var onScroll = function () { header.classList.toggle('is-stuck', window.scrollY > 8); };
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  /* ----- mobilné menu ----- */
  var burger = $('#burger'), nav = $('#nav');
  if (burger && nav) {
    var setMenu = function (open) {
      nav.classList.toggle('open', open);
      burger.setAttribute('aria-expanded', open ? 'true' : 'false');
      document.body.style.overflow = open ? 'hidden' : '';
    };
    burger.addEventListener('click', function () { setMenu(!nav.classList.contains('open')); });
    $$('a', nav).forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
    window.addEventListener('keydown', function (e) { if (e.key === 'Escape') setMenu(false); });
    window.matchMedia('(min-width: 901px)').addEventListener('change', function () { setMenu(false); });
  }

  /* ----- odhalenie prvkov pri scrolle ----- */
  var targets = $$('.reveal, .scale');
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); }
      });
    }, { threshold: .15, rootMargin: '0px 0px -40px 0px' });
    targets.forEach(function (t) { io.observe(t); });
  } else {
    targets.forEach(function (t) { t.classList.add('in'); });
  }

  /* ----- slider služieb: šípky + ťahanie myšou ----- */
  var slider = $('#svc-slider');
  if (slider) {
    var prev = $('.slider-btn[data-dir="-1"]'), next = $('.slider-btn[data-dir="1"]');
    var step = function () {
      var c = slider.firstElementChild;
      return c ? c.offsetWidth + (parseFloat(getComputedStyle(slider).columnGap) || 20) : 300;
    };
    var syncBtns = function () {
      prev.disabled = slider.scrollLeft < 4;
      next.disabled = slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 4;
    };
    [prev, next].forEach(function (b) {
      b.addEventListener('click', function () {
        slider.scrollBy({ left: step() * parseInt(b.getAttribute('data-dir'), 10), behavior: 'smooth' });
      });
    });
    slider.addEventListener('scroll', syncBtns, { passive: true });
    window.addEventListener('resize', syncBtns);
    syncBtns();

    var down = false, startX = 0, startLeft = 0, moved = false;
    slider.addEventListener('mousedown', function (e) { down = true; moved = false; startX = e.pageX; startLeft = slider.scrollLeft; });
    window.addEventListener('mousemove', function (e) {
      if (!down) return;
      var dx = e.pageX - startX;
      if (Math.abs(dx) > 5) { moved = true; slider.classList.add('dragging'); }
      if (moved) slider.scrollLeft = startLeft - dx;
    });
    window.addEventListener('mouseup', function () { down = false; slider.classList.remove('dragging'); });
    slider.addEventListener('click', function (e) { if (moved) { e.preventDefault(); moved = false; } }, true);
    $$('a', slider).forEach(function (a) { a.setAttribute('draggable', 'false'); });
  }

  /* ----- interaktívna stupnica tried ----- */
  var cp = $('#cpick');
  if (cp) {
    var classes = JSON.parse(cp.getAttribute('data-classes'));
    var track = $('#cpick-track'), pin = $('#cpick-pin'), segs = $$('.cpick-seg', cp);
    var badge = $('#cpick-badge'), cTitle = $('#cpick-title'), cDesc = $('#cpick-desc'), cTip = $('#cpick-tip');
    var colors = ['#0b8a3e', '#3da745', '#84bd3a', '#c8d433', '#FFCC3B', '#FDB017', '#f0701f', '#d3262e'];
    var cur = -1;
    var setClass = function (i) {
      i = Math.max(0, Math.min(classes.length - 1, i));
      if (i === cur) return;
      cur = i;
      pin.style.transform = 'translateX(' + (i * 100) + '%)';
      segs.forEach(function (s, k) { s.classList.toggle('on', k === i); });
      badge.textContent = classes[i][0];
      badge.style.background = colors[i];
      badge.classList.toggle('dark', i >= 3 && i <= 5);
      cTitle.textContent = 'Trieda ' + classes[i][0];
      cDesc.textContent = classes[i][2];
      cTip.textContent = classes[i][3];
      track.setAttribute('aria-valuenow', i);
      track.setAttribute('aria-valuetext', 'Trieda ' + classes[i][0]);
    };
    var fromPointer = function (e) {
      var r = $('.cpick-bar', cp).getBoundingClientRect();
      setClass(Math.floor((e.clientX - r.left) / r.width * classes.length));
    };
    var dragging = false;
    track.addEventListener('pointerdown', function (e) {
      dragging = true; track.classList.add('dragging');
      if (track.setPointerCapture) track.setPointerCapture(e.pointerId);
      fromPointer(e);
    });
    track.addEventListener('pointermove', function (e) { if (dragging) fromPointer(e); });
    var stop = function () { dragging = false; track.classList.remove('dragging'); };
    track.addEventListener('pointerup', stop);
    track.addEventListener('pointercancel', stop);
    track.addEventListener('keydown', function (e) {
      var k = e.key;
      if (k === 'ArrowRight' || k === 'ArrowUp') { setClass(cur + 1); e.preventDefault(); }
      else if (k === 'ArrowLeft' || k === 'ArrowDown') { setClass(cur - 1); e.preventDefault(); }
      else if (k === 'Home') { setClass(0); e.preventDefault(); }
      else if (k === 'End') { setClass(classes.length - 1); e.preventDefault(); }
    });
    setClass(parseInt(cp.getAttribute('data-start'), 10) || 0);
  }

  /* ----- kalkulačka ceny ----- */
  var calc = $('#calc');
  if (calc) {
    var data = JSON.parse(calc.getAttribute('data-pricing'));
    var express = parseFloat(calc.getAttribute('data-express'));
    var type = $('#calc-type'), area = $('#calc-area'), areaVal = $('#calc-area-val');
    var exp = $('#calc-express'), sum = $('#calc-sum'), order = $('#calc-order');
    var fmt = new Intl.NumberFormat('sk-SK');

    var update = function () {
      var p = data[type.value];
      var a = parseInt(area.value, 10);
      var price = p.base + Math.max(0, a - p.limit) * p.per_m2;
      if (exp.checked) price *= (1 + express);
      price = Math.round(price / 5) * 5;
      areaVal.textContent = fmt.format(a) + ' m²';
      sum.textContent = 'od ' + fmt.format(price) + ' €';
      order.href = order.getAttribute('data-base') +
        '?typ=' + encodeURIComponent(type.value) + '&plocha=' + a + (exp.checked ? '&express=1' : '') + '#formular';
    };
    var setRange = function () {
      var t = type.value;
      var max = t === 'bytovy-dom' ? 5000 : (t === 'nebytove-budovy' ? 3000 : 400);
      var min = t === 'bytovy-dom' ? 200 : 20;
      area.min = min; area.max = max;
      area.step = max > 1000 ? 10 : 5;
      area.value = Math.min(Math.max(data[t].limit, min), max);
      update();
    };
    type.addEventListener('change', setRange);
    area.addEventListener('input', update);
    exp.addEventListener('change', update);
    setRange();
  }

  /* ----- kontaktný formulár (AJAX, s fallbackom na bežné odoslanie) ----- */
  var form = $('#contact-form');
  if (form) {
    var msg = $('#form-msg'), btn = $('button[type=submit]', form);
    var showMsg = function (ok, text) {
      msg.className = 'form-msg ' + (ok ? 'ok' : 'err');
      msg.textContent = text;
      msg.scrollIntoView({ behavior: 'smooth', block: 'center' });
    };
    form.addEventListener('submit', function (e) {
      if (!window.fetch) return;
      e.preventDefault();
      if (!form.checkValidity()) { form.reportValidity(); return; }
      var label = btn.textContent;
      btn.disabled = true; btn.textContent = 'Odosielam…';
      fetch(form.action, { method: 'POST', body: new FormData(form), headers: { 'X-Requested-With': 'fetch' } })
        .then(function (r) { return r.json(); })
        .then(function (j) {
          showMsg(!!j.ok, j.message || 'Hotovo.');
          if (j.ok) form.reset();
        })
        .catch(function () { showMsg(false, 'Správu sa nepodarilo odoslať. Skúste to prosím znova alebo nám zavolajte.'); })
        .then(function () { btn.disabled = false; btn.textContent = label; });
    });
  }
})();
