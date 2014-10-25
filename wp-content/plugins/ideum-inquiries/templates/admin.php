<?php if ($isUpdated): ?>
    <div class="updated">
        <p>
            <strong><?= __('settings saved.') ?></strong>
        </p>
    </div>
<?php endif ?>

<div class="wrap">
    <h2><?= __('Inquiries Settings') ?></h2>
    <form method="POST" action="">
        <p>
            <?= __('Insightly API Key') ?>
            <input type="text" name="api_key" value="<?= $apiKey ?>">
        </p>

        <hr />

        <p class="submit">
            <input type="submit" class="button-primary" name="Submit" value="<?= esc_attr('Save Changes') ?>">
        </p>
    </form>
</div>
