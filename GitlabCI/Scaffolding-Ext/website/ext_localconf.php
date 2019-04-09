<?php

defined('TYPO3_MODE') or die();

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['Aoe\\GoogleTagManager\\ViewHelpers\\DataLayerViewHelper'] = array(
    'className' => 'Dpool\\Base\\Xclass\\DataLayerViewHelper'
);

########################################################################################################################################################################################################
### PLUGIN: POWERMAIL ###
########################################################################################################################################################################################################

/** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
$signalSlotDispatcher->connect(
    'In2code\Powermail\Domain\Service\Mail\ReceiverMailSenderPropertiesService',
    'getSenderEmail',
    \Dpool\Website\Slot\PowermailSlot::class,
    'getSenderEmail',
    FALSE
);

/** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
$signalSlotDispatcher->connect(
    'In2code\Powermail\Domain\Service\Mail\ReceiverMailSenderPropertiesService',
    'getSenderName',
    \Dpool\Website\Slot\PowermailSlot::class,
    'getSenderName',
    FALSE
);