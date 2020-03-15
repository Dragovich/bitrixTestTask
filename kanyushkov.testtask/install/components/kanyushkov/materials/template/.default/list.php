<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->IncludeComponent(
    "kanyushkov:material.list",
    "",
    array(
        'PATH_TO_DETAIL' => $arResult['PATH_TO_DETAIL'],
    ),
    $component
);
