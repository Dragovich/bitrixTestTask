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

    public static function getIBlockElementsInfo($iBlockId = null) {
        $iBlocksElements = [];

        $filter['IBLOCK_ID'] = self::getIBlocksId();

        if (!is_null($iBlockId)) {
            $filter['ID'] = $iBlockId;
        }

        $dbElements = \CIBlockElement::GetList(
            ['SORT' => 'ASC'],
            $filter
        );

        while ($obElement = $dbElements->GetNextElement()) {
            $el = $obElement->GetFields();
            $pictureUrl = CFile::GetPath((int)$el["DETAIL_PICTURE"]);
            $order = new Order($el["ID"], $el["NAME"], $el["PREVIEW_TEXT"], $el["DETAIL_TEXT"], $pictureUrl);
            $iBlocksElements[$el["ID"]] = $order;
        }

        return $iBlocksElements;
    }

}
