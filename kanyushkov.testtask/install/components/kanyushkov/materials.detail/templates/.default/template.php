<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use NK;
use Bitrix\Main\Localization\Loc;

?>

<a id="reload_material_detail_comp" href="<?= $_SERVER["REQUEST_URI"] ?>"></a>

<div class="material-detail">
        <div class="name"><?= $arResult->getName() ?></div>
        <div class="description"><?= $arResult->getDetailText() ?></div>
        <div class="img">
            <img src="<?= $arResult->getDetailPicture() ?>" alt="materialImage"/>
        </div>
        <div class="redirect"><a href="<?= $arResult->getDetailUrl() ?>">К листу</a></div>
</div>

<script>
    setTimeout(function () {
        document.getElementById('reload_material_detail_comp').click();
    }, 1000 * 60);
</script>
