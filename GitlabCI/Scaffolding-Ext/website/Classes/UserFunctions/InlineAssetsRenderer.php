<?php

namespace Dpool\Website\UserFunctions;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */


/**
 * Contains the Hook to render inline css For AMP
 */
class InlineAssetsRenderer {

    /**
     *
     * @return string
     */
    public function getInlineCss ($void, $config) {


        $filePath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('website') . $config['userFunc.']['file'];
        if (file_exists($filePath) AND is_readable($filePath)) {
            return file_get_contents($filePath)."\n";
        }

        return '';
    }


    /**
     *
     * @return string
     */
    public function getInlineJs () {
        $js = '<script type="text/javascript">';
        // enter the content here
        $js .="</script>";

        return $js;
    }


}