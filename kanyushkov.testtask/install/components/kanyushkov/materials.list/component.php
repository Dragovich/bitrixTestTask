<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use NK;
use Bitrix\Main\Loader;

global $USER;

Loader::includeModule('kanyushkov.testtask');

$complex = $parentComponentName ? true : false;

// Append link to the detail view
$arResult = IBlocks::getIBlockElementsInfo($materialId);

if ($complex) {
    foreach ($arResult as $material) {
        $url = str_replace(
            '#MATERIAL_ID#',
            $material->getId(),
            $arParams['PATH_TO_DETAIL']
        );
        $arResult[$material->getId()]->setDetailUrl($url);
    }
}

$this->IncludeComponentTemplate();
