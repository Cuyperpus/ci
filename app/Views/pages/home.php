<?= $this->extend('templates/dashboard') ?>

<?= $this->section('title') ?>
Home
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="container-wrapper">
    <h1 class="container-title">Home Page: <?= auth()->user()->username ?? "Hengker anonym" ?></h1>
  </div>
</div>
<?= $this->endSection() ?>