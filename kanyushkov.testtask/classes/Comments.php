<?php

use NK;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Loader;

use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

Loader::includeModule('highloadblock');

class Comments {
    function getHLBlock() {
        return $hlblock = HLBT::getList(['filter' => ['=NAME' => "NKCOMMENTS"]])->fetch();
    }

}