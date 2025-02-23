<?= $this->extend('templates/root') ?>

<?= $this->section('page') ?>
<main>
  <?= $this->renderSection('content') ?>
</main>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  console.log('Template: page.php');
</script>
<?= $this->renderSection('page_scripts') ?>
<?= $this->endSection() ?>