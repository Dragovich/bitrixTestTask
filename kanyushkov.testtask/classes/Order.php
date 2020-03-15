<?php

use NK;

class Order {
    protected $id = null;
    protected $name = null;
    protected $previewText = null;
    protected $detailText = null;
    protected $detailPicture = null;
    protected $url = "";

    function __construct($id = null, $name = null, $previewText = null, $detailText = null, $detailPicture = null) {
        $this->id = $id;
        $this->name = $name;
        $this->previewText = $previewText;
        $this->detailText = $detailText;
        $this->detailPicture = $detailPicture;
    }

    function __destruct() {

    }

    function getId() {
        return (int)$this->id;
    }

    function setId($id) {
        $this->id = (int)$id;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }

    function getPreviewText() {
        return $this->previewText;
    }

    function setPreviewText($previewText) {
        $this->previewText = $previewText;
    }

    function getDetailText() {
        return $this->detailText;
    }

    function setDetailText($detailText) {
        $this->detailText = $detailText;
    }

    function getDetailPicture() {
        return $this->detailPicture;
    }

    function setDetailPicture($detailPicture) {
        $this->detailPicture = $detailPicture;
    }

    function getUrl() {
        return $this->url;
    }

    function setUrl($url) {
        $this->url = $url;
    }
}
