<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Loader;

$arComponentParameters = array(
    'GROUPS' => array(
        'SETTINGS' => array(
            'NAME' => Loc::getMessage("NK_COMP_SETTINGS_NAME"),
        ),
    ),
    'PARAMETERS' => array(
        'AJAX_MODE' => array(),
        'SEF_MODE' => array(
            'list' => array(
                'NAME' => Loc::getMessage('NK_COMP_TEST_SEF_MODE_LIST_NAME'),
                'DEFAULT' => '',
                'VARIABLES' => array(),
            ),
            'detail' => array(
                'NAME' => Loc::getMessage('NK_COMP_TEST_SEF_MODE_DETAIL_NAME'),
                'DEFAULT' => '#MATERIALID_ID#/',
                'VARIABLES' => array('MATERIAL_ID'),
            ),
        ),
    ),
);
