<?php

defined('TYPO3_MODE') or die();

// NEW CUSTOM CONTENT ELEMENTS TO BE ADDED TO THE WIZARD (TAB: CONTENT MODULES)
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig( '
mod {
	wizards.newContentElement.wizardItems.header {
	    header = Content Modules
		elements {
		    custom_optout_link {
				iconIdentifier = custom_optout_link
				title = LLL:EXT:website/Resources/Private/Language/Backend/Default.xlf:tt_content.CType.custom_optout_link
				description = LLL:EXT:website/Resources/Private/Language/Backend/Default.xlf:tt_content.CType.description.custom_optout_link
				tt_content_defValues {
					CType = custom_optout_link
				}
			}		
		}
		show := addToList(custom_optout_link)
	}
}
');
