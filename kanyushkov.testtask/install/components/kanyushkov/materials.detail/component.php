<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use NK;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

Loader::includeModule('kanyushkov.testtask');

$complex = $parentComponentName ? true : false;

// From the component parameters
$materialId = (int)$arParams['MATERIAL_ID'];

$arResult = IBlocks::getIBlockElementsInfo($materialId)[$materialId];
$arResult->setDetailUrl($arParams['PATH_TO_LIST']);
$this->IncludeComponentTemplate();
