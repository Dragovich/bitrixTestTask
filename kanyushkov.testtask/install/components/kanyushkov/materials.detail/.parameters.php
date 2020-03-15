<?php

use Bitrix\Main\Localization\Loc;

$arComponentParameters = array(
    'GROUPS' => array(
        'SETTINGS' => array(
            'NAME' => Loc::getMessage("NK_COMP_SETTINGS_NAME"),
        ),
    ),
    'PARAMETERS' => array(
        'MATERIAL_ID' => array(
            'PARENT' => 'SETTINGS',
            'NAME' => Loc::getMessage('NK_COMP_PARAMETERS_MATERIAL_ID_NAME'),
            'TYPE' => 'number',
            'DEFAULT' => 36,
        ),
        'AJAX_MODE' => array(),
    ),
);
