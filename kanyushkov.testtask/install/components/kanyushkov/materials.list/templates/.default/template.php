<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

?>

<a id="reload_material_list_comp" href="<?= $_SERVER["REQUEST_URI"] ?>"></a>

<div class="material-list">
    <?
    foreach ($arResult as $material) {
        ?>
        <div class="material">
            <div class="name"><?= $material->getName() ?></div>
            <div class="description"><?= $material->getPreviewText() ?></div>
            <div class="img">
                <img src="<?= $material->getDetailPicture() ?>" alt="materialImage"/>
            </div>
            <div class="redirect"><a href="<?= $material->getDetailUrl() ?>">Подробнее</a></div>
        </div>
        <?
    }
    ?>
</div>

<script>
    setTimeout(function () {
        document.getElementById('reload_material_list_comp').click();
    }, 1000 * 60);
</script>