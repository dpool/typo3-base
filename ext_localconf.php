<?php

defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Base',
    'Schema',
    [\Dpool\Base\Controller\SchemaController::class => 'inject'],
    [\Dpool\Base\Controller\ContactController::class => ''],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_PLUGIN
);

// Add custom record aspect alias mapping for enabling preview of hidden records
$GLOBALS['TYPO3_CONF_VARS']['SYS']['routing']['aspects']['RecordPersistedAliasMapper'] = \Dpool\Base\Routing\Aspect\RecordPersistedAliasMapper::class;