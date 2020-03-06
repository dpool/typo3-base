<?php


namespace Dpool\Base\EventListener;


use TYPO3\CMS\Backend\Backend\Event\SystemInformationToolbarCollectorEvent;
use TYPO3\CMS\Backend\Backend\ToolbarItems\SystemInformationToolbarItem;
use TYPO3\CMS\Backend\Toolbar\Enumeration\InformationStatus;

class ToolbarItemProvider
{
    public function getItem(SystemInformationToolbarCollectorEvent $event): void
    {

        $gitReference = getenv('GIT_REFERENCE');

        /** @var SystemInformationToolbarItem $systemInformationToolbarItem */
        $systemInformationToolbarItem = $event->getToolbarItem();
        $systemInformationToolbarItem->addSystemInformation(
            'Git reference',
            substr($gitReference, 0, 8),
            'information-git',
            InformationStatus::STATUS_INFO
        );
    }
}