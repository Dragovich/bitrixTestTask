<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/kanyushkov.testtask/config.php';

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/kanyushkov.testtask/classes/*.php') as $filename) {
    require_once $filename;
}
