<?php /** Interaktívna stupnica energetických tried. Očakáva $CLASSES z config.php. */ ?>
<div class="cpick reveal" id="cpick" data-classes='<?= e(json_encode($CLASSES, JSON_UNESCAPED_UNICODE)) ?>' data-start="3">
  <div class="cpick-track" id="cpick-track" role="slider" tabindex="0" aria-label="Energetická trieda" aria-valuemin="0" aria-valuemax="<?= count($CLASSES) - 1 ?>" aria-valuenow="3" aria-valuetext="Trieda C">
    <span class="cpick-pin" id="cpick-pin"><b>Vaša budova</b></span>
    <div class="cpick-bar">
      <?php foreach ($CLASSES as $i => [$n, $c]): ?>
        <span class="cpick-seg <?= e($c) ?>" data-i="<?= $i ?>"><?= e($n) ?></span>
      <?php endforeach; ?>
    </div>
    <div class="cpick-ends"><span>Najúspornejšia</span><span>Najmenej úsporná</span></div>
  </div>
  <div class="cpick-out" aria-live="polite">
    <span class="cpick-badge" id="cpick-badge"></span>
    <div>
      <h3 id="cpick-title"></h3>
      <p id="cpick-desc"></p>
      <p class="cpick-tip" id="cpick-tip"></p>
    </div>
  </div>
</div>
