<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/kanyushkov.testtask/config.php';

foreach (glob(NK_MODULE_ID . "/classes/*.php") as $filename) {
    require_once $filename;
}