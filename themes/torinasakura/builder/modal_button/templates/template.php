<?php if (!$props['status']) : ?>
    <a
        uk-toggle
        href="<?= $props['modal_id'] ?>"
        id="<?= $props['id'] ?>"
        class="el-link uk-button <?= $props['button_style'] ? 'uk-button-'.$props['button_style'] : '' ?> <?= $props['class'] ?> <?= $props['button_size'] ? 'uk-button-'.$props['button_size'] : '' ?> <?= $props['fullwidth'] ? 'uk-width-1-1' : '' ?>"
        style="<?= $props['css'] ?>"
        <?= $props['attributes'] ?>
    >
        <?= $props['content'] ?>
    </a>
<?php endif ?>
