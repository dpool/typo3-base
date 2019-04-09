<?php
namespace Dpool\Website\Slot;


use TYPO3\CMS\Core\Utility\GeneralUtility;

class PowermailSlot
{
    public function getSenderEmail(&$senderEmail, $ref)
    {
        // ConfigurationManager initilisieren
        $this->configurationManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager');

        // Das komplette TypoScript holen
        $extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);

        // Die gewünschte Konfiguration aus dem Array holen. WICHTIG! die Arrays sind bei TypoScript immer mit einem "."(Punkt) am Ende!
        $config = $extbaseFrameworkConfiguration['plugin.']['tx_powermail.']['settings.'];

        if(isset($config['generalReceiverSetFromEmail']) && !empty($config['generalReceiverSetFromEmail'])){
            $senderEmail = $config['generalReceiverSetFromEmail'];
        }

    }

    public function getSenderName(&$senderName, $ref)
    {
        // ConfigurationManager initilisieren
        $this->configurationManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager');

        // Das komplette TypoScript holen
        $extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);

        // Die gewünschte Konfiguration aus dem Array holen. WICHTIG! die Arrays sind bei TypoScript immer mit einem "."(Punkt) am Ende!
        $config = $extbaseFrameworkConfiguration['plugin.']['tx_powermail.']['settings.'];

        if(isset($config['generalReceiverSetFromName']) && !empty($config['generalReceiverSetFromName'])){
            $senderName = $config['generalReceiverSetFromName'];
        }
    }

}