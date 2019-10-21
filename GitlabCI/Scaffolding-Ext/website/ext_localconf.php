<?php

defined('TYPO3_MODE') or die();

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


########################################################################################################################################################################################################
### ICON REGISTRY ###
########################################################################################################################################################################################################

### CUSTOM_OPTOUT_LINK
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'custom_optout_link',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:website/Resources/Public/Icons/CTypes/custom_optout_link.png']
);
