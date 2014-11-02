<?php

namespace MH3U\DataBundle\Service;


class DataTranslation {

    private $_bundleName;
    private $_fileName;

    public function __construct($bundleName, $fileName)
    {
        $this->_bundleName = $bundleName;
        $this->_fileName = $fileName;
        $this->_initTranslationFiles();
    }

    public function createTranslationId($string)
    {
        $string = str_replace(" ", ".", $string);
        $string = strtolower ($string);
        return $string;
    }

    private function _openTranslationFile($locale, $mode)
    {
        return fopen(
            dirname(__FILE__).'/../../'.$this->_bundleName.'/Resources/translations/'.$this->_fileName.'.'.$locale.'.yml',
            $mode
        );
    }

    private function _initTranslationFiles()
    {
        $this->_truncateFile("en");
        $this->_truncateFile("fr");
    }

    private function _truncateFile($locale) {
        $translationFile = $this->_openTranslationFile($locale, "w+");
        ftruncate($translationFile, 0);
        fclose($translationFile);
    }

    public function addTranslations($translationId, $en_US, $fr_FR) {
        $this->_addEnTranslation($translationId, $en_US);
        $this->_addFrTranslation($translationId, $fr_FR);
    }

    private function _addEnTranslation($translationId, $en_US) {
        $translationFile = $this->_openTranslationFile("en", "a+");
        fputs($translationFile, $translationId.": ".$en_US."\n");
        fclose($translationFile);
    }

    private function _addFrTranslation($translationId, $fr_FR) {
        $translationFile = $this->_openTranslationFile("fr", "a+");
        fputs($translationFile, $translationId.": ".$fr_FR."\n");
        fclose($translationFile);
    }
} 