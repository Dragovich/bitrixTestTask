<?php

use NK;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Loader;

Loader::includeModule('iblock');

class IBlocks {
    public static function getIBlocks() {
        $response = \CIBlock::GetList(
            [
                "sort" => "asc",
                "name" => "asc",
            ],
            [
                "TYPE" => "catalog",
                "CHECK_PERMISSIONS" => "N",
            ]
        );

        $iBlocks = [];

        while ($arIblock = $response->Fetch()) {
            $iBlocks[htmlspecialcharsEx($arIblock["ID"])] = htmlspecialcharsEx($arIblock["NAME"]);
        }

        return $iBlocks;
    }

    public static function getIBlocksId() {
        return array_keys(self::getIBlocks());
    }

    public static function getIBlockName($iBlockId) {
        return self::getIBlocks()[$iBlockId];
    }

    public static function getIBlockElements() {
        $elements = [];

        $dbElements = \CIBlockElement::GetList(
            ['SORT' => 'ASC'],
            [
                'IBLOCK_ID' => self::getIBlocksId(),
            ]
        );

        while ($obElement = $dbElements->GetNextElement()) {
            $el = $obElement->GetFields();
            $el["PROPERTIES"] = $obElement->GetProperties();
            $iBlocksElements[$el["ID"]]["ID"] = $el["ID"];
            $iBlocksElements[$el["ID"]]["NAME"] = $el["NAME"];
            $iBlocksElements[$el["ID"]]["PREVIEW_TEXT"] = $el["PREVIEW_TEXT"];
            $iBlocksElements[$el["ID"]]["DETAIL_TEXT"] = $el["DETAIL_TEXT"];
            $iBlocksElements[$el["ID"]]["DETAIL_PICTURE"] = $el["DETAIL_PICTURE"];
        }

        return $iBlocksElements;
    }

}