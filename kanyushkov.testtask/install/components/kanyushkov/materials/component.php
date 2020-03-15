<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arDefaultUrlTemplates404 = array(
    'list' => '',
    'detail' => '#MATERIAL_ID#/',
);

$arDefaultVariableAliases404 = array();
$arDefaultVariableAliases = array();
$arComponentVariables = array(
    'MATERIAL_ID',
);

if ($arParams['SEF_MODE'] === 'Y') {

    $arVariables = array();

    $arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates(
        $arDefaultUrlTemplates404,
        $arParams['SEF_URL_TEMPLATES']
    );

    $arVariableAliases = CComponentEngine::MakeComponentVariableAliases(
        $arDefaultVariableAliases404,
        $arParams['VARIABLE_ALIASES']
    );

    $componentPage = CComponentEngine::ParseComponentPath(
        $arParams['SEF_FOLDER'],
        $arUrlTemplates,
        $arVariables
    );

    // Show list by default
    if (!$componentPage) {
        $componentPage = 'list';
    }

    CComponentEngine::InitComponentVariables(
        $componentPage,
        $arComponentVariables,
        $arVariableAliases,
        $arVariables
    );

    $arResult = array(
        'FOLDER' => $arParams['SEF_FOLDER'],
        'URL_TEMPLATES' => $arUrlTemplates,
        'VARIABLES' => $arVariables,
        'ALIASES' => $arVariableAliases,
        'PATH_TO_LIST' => $arParams['SEF_FOLDER'],
        'PATH_TO_DETAIL' => $arParams['SEF_FOLDER'] . $arParams['SEF_URL_TEMPLATES']['detail'],
    );
} else {
    $arVariableAliases = CComponentEngine::MakeComponentVariableAliases(
        $arDefaultVariableAliases,
        $arParams['VARIABLE_ALIASES']
    );

    CComponentEngine::InitComponentVariables(
        false,
        $arComponentVariables,
        $arVariableAliases,
        $arVariables
    );

    $componentPage = '';

    if (isset($arVariables['MATERIAL_ID']) && (int)$arVariables['MATERIAL_ID'] > 0) {
        if (isset($arVariables['PARTICIPANTS']) && $arVariables['PARTICIPANTS'] === 'y') {
            $componentPage = 'participants';
        } else {
            $componentPage = 'detail';
        }
    } else {
        $componentPage = 'list';
    }
    $arResult = array(
        'FOLDER' => '',
        'URL_TEMPLATES' => array(
            'list' => htmlspecialcharsbx($APPLICATION->GetCurPage()),
            'detail' => htmlspecialcharsbx($APPLICATION->GetCurPage()) . '?' . $arVariableAliases['MATERIAL_ID'] . '=#MATERIAL_ID#',
        ),
        'VARIABLES' => $arVariables,
        'ALIASES' => $arVariableAliases,
        'PATH_TO_LIST' => $arParams['SEF_FOLDER'],
        'PATH_TO_DETAIL' => substr($arParams['SEF_FOLDER'], 0, -1) . '?' . $arParams['VARIABLE_ALIASES']['MATERIAL_ID'] . '=#MATERIAL_ID#',
    );
}

$this->IncludeComponentTemplate($componentPage);
