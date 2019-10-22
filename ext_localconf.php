<?php

defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Dpool.' . $_EXTKEY,
    'Schema',
    array(
        'Schema' => 'inject',
    ),
    // non-cacheable actions
    array(
    )
);
