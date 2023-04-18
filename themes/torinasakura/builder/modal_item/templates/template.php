<?php ?>
    <div uk-modal <?= $props['full_width'] ? 'class="uk-modal-full"' : 'uk-flex-top' ?> id="<?= $props['id'] ?>">
        <?php if ($props['full_width']) : ?>
            <button class="uk-modal-close-default" type="button" uk-close></button>
        <?php endif ?>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical <?= $props['full_width'] ? 'uk-height-1-1' : '' ?>">

        <?php if ($props['full_width']) : ?>
            <div class="uk-position-center">
        <?php endif ?>

        <?php if ($props['title']) : ?>
            <<?= $props['title_element'] ?> class="uk-modal-title <?= $props['title_color'] ? 'uk-text-'.$props['title_color'] : '' ?> <?= $props['title_style'] ? 'uk-title-'.$props['title_style'] : '' ?>"><?= $props['title'] ?></<?= $props['title_element'] ?>>
        <?php endif ?>

        <?php if ($props['meta']) : ?>
            <<?= $props['meta_element'] ?> class="el-meta uk-text-meta uk-margin<?= $props['meta_margin'] ? '-'.$props['meta_margin'] : '' ?>-top <?= $props['meta_color'] ? 'uk-text-'.$props['meta_color'] : '' ?> <?= $props['meta_style'] ? 'uk-meta-'.$props['meta_style'] : '' ?>"><?= $props['meta'] ?></<?= $props['meta_element'] ?>>
        <?php endif ?>

        <?= $props['content'] ?>

        <?php if ($props['full_width']) : ?>
            </div>
        <?php endif ?>
        </div>
    </div>
<?php ?>
