<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use NK;
use Bitrix\Main\Loader;

global $USER;

Loader::includeModule('kanyushkov.testtask');

$complex = $parentComponentName ? true : false;

$materialListLink = '';
if ($complex) {
    $materialListLink = $arParams['PATH_TO_LIST'];
}

// Append link to the detail view
$arResult = IBlocks::getIBlockElementsInfo($materialId);

$this->IncludeComponentTemplate();
