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

// Add custom record aspect alias mapping for enabling preview of hidden records
$GLOBALS['TYPO3_CONF_VARS']['SYS']['routing']['aspects']['RecordPersistedAliasMapper'] = \Dpool\Base\Routing\Aspect\RecordPersistedAliasMapper::class;