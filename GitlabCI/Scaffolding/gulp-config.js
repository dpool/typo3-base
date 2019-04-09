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
        './public/typo3conf/ext/website/Resources/Private/Scss/Full.scss',
        './public/typo3conf/ext/website/Resources/Private/Scss/Inline.scss',
        './public/typo3conf/ext/website/Resources/Private/Scss/Defer.scss'
    ],
    cssOutputDist: 'public/typo3conf/ext/website/Resources/Public/Stylesheets',
    sassOptions: {
        errLogToConsole: true,
        outputStyle: 'expanded'
    },
    autoprefixerOptions: {
        browsers: [
            'last 2 versions',
            '> 5%'
        ],
        cascade: false
    },


    // ###########################################################################################
    // ##### JS VARIABLES
    // ###########################################################################################

    jsInputFiles: [
        './public/typo3conf/ext/website/Resources/Private/JavaScript/**/*.js'
        // --> add the files of other extensions/modules here
    ],

    jsOutputDist: 'public/typo3conf/ext/website/Resources/Public/JavaScript',
    jsOutputFile: 'Main.js',
    jsOutputFileMin: 'Main.min.js'
};