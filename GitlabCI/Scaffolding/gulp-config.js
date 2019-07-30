'use strict';

/*
########################################################################################################################################################################################################
##### DEFINE VARIABLES
########################################################################################################################################################################################################
 */

module.exports = {
    // ###########################################################################################
    // ##### CSS VARIABLES
    // ###########################################################################################
    cssInputFilesForWatcher: [
        './public/typo3conf/ext/website/Resources/Private/Scss/**/*.scss'
        // --> add the files of other extensions/modules here
    ],
    cssInputFiles: [
        './public/typo3conf/ext/website/Resources/Private/Scss/**/*.scss'

    ],
    cssOutputDist: 'public/typo3conf/ext/website/Resources/Public/Stylesheets',
    sassOptions: {
        errLogToConsole: true,
        outputStyle: 'expanded'
    },

    // ###########################################################################################
    // ##### JS VARIABLES
    // ###########################################################################################

    jsInputFiles: [
        // --> add the files of other extensions/modules here
        './public/typo3conf/ext/website/Resources/Private/JavaScript/**/*.js'
    ],

    jsOutputDist: 'public/typo3conf/ext/website/Resources/Public/JavaScript',
    jsOutputFile: 'Main.js',
    jsOutputFileMin: 'Main.min.js'
};