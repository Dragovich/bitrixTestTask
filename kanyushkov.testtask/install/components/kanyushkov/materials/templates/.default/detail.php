<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$materialId = $arResult['VARIABLES']['MATERIAL_ID'];

$APPLICATION->IncludeComponent(
    "kanyushkov:material.detail",
    "",
    array(
        'MATERIAL_ID' => $materialId,
        'PATH_TO_LIST' => $arResult['PATH_TO_LIST'],
    ),
    $component
);
