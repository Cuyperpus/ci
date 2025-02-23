<?= $this->extend('templates/page') ?>

<?= $this->section('title') ?>
Login | CuyPerpus
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="vh-100 d-flex gap-3 flex-column align-items-center justify-content-center p-3 background">
  <div class="card col-12 col-md-5 shadow-sm">
    <div class="card-body">
      <a class="btn d-inline-flex gap-1 align-items-center" href="<?= base_url() ?>">
        <i class="ti ti-arrow-narrow-left"></i>
        Kembali
      </a>
      <div class="p-3 text-center">
        <h3 class="card-title"><?= lang('Auth.login') ?></h3>
      </div>
      <?php if (session('error') !== null) : ?>
        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
      <?php elseif (session('errors') !== null) : ?>
        <div class="alert alert-danger" role="alert">
          <?php if (is_array(session('errors'))) : ?>
            <?php foreach (session('errors') as $error) : ?>
              <?= $error ?>
              <br>
            <?php endforeach ?>
          <?php else : ?>
            <?= session('errors') ?>
          <?php endif ?>
        </div>
      <?php endif ?>
      <?php if (session('message') !== null) : ?>
        <div class="alert alert-success" role="alert"><?= session('message') ?></div>
      <?php endif ?>
      <form action="<?= url_to('login') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="input-email" class="form-label">Email</label>
          <input id="input-email" name="email" inputmode="email" autocomplete="email" type="email" class="form-control" placeholder="nama@cuyperpus.com" value="<?= old('email') ?>">
        </div>
        <div class="mb-3">
          <label for="input-password" class="form-label">Kata Sandi</label>
          <input id="input-password" name="password" inputmode="text" autocomplete="current-password" type="password" class="form-control">
        </div>
        <?php if (setting('Auth.sessionConfig')['allowRemembering']) : ?>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked<?php endif ?>>
              <?= lang('Auth.rememberMe') ?>
            </label>
          </div>
        <?php endif; ?>
        <div class="d-grid col-12 mx-auto m-3">
          <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.login') ?></button>
        </div>
      </form>
    </div>
  </div>
  <?= $this->include('components/footer') ?>
</div>
<?= $this->endSection() ?>