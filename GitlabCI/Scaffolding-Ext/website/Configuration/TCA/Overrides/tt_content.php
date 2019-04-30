<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}


// #####################################################################################################################################################################################################
// ##### INIT VARIABLES #####
// #####################################################################################################################################################################################################

$customTypes = array();
$customColumns = array();
$defaultFieldsBefore = '
	--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
';
$defaultFieldsAfter = '
	,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
	--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
	--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
	--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
	--palette--;;hidden,
	--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
	--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
					--palette--;;language,
	--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended
';

$tca = array();




// #####################################################################################################################################################################################################
// ##### ADD CUSTOM COLUMNS #####
// #####################################################################################################################################################################################################

$customColumns['custom_image'] = getTcaForType('custom_image', 'custom_image');
$customColumns['custom_bg_image'] = getTcaForType('custom_bg_image', 'custom_bg_image');
$customColumns['custom_background_color'] = getTcaForType('custom_background_color', 'custom_background_color');
$customColumns['custom_text_1'] = getTcaForType('custom_text_1', 'rte');
$customColumns['custom_link'] = getTcaForType('custom_link', 'custom_link');

// #####################################################################################################################################################################################################
// ##### ADD CUSTOM ELEMENTS #####
// #####################################################################################################################################################################################################

### CUSTOM_OPTOUT_LINK
$customCTypeItems['custom_optout_link'] = getCTypeItemConfig('custom_optout_link');

// #####################################################################################################################################################################################################
// ##### FUNCTIONS TO BUILD TCA #####
// #####################################################################################################################################################################################################

/**
 * @param $name
 *
 * @return array
 */
function getCTypeItemConfig($name) {
	return array(
		'LLL:EXT:website/Resources/Private/Language/Backend/Default.xlf:tt_content.CType.' . $name, // Name of ce in BE
		$name, // TCA name of the ce
		'EXT:website/Resources/Public/Icons/CTypes/' . $name . '.png' // ce icon
	);
}

/**
 * @param $type
 * @return array
 */
function getTcaConfigDefault($type, $fieldName) {

	$config = array(
        'radio' => array(
            'type' => 'radio'
        ),
		'input' => array(
			'type' => 'input',
			'size' => 50,
			'max' => 255
		),
		'custom_link' => [
			'type' => 'input',
			'renderType' => 'inputLink',
			'size' => 50,
			'max' => 1024,
			'eval' => 'trim',
			'fieldControl' => [
				'linkPopup' => [
					'options' => [
						'title' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_link_formlabel',
						'blindLinkOptions' => 'mail, file, spec, url, folder',
					],
				],
			],
			'softref' => 'typolink'
		],
		'custom_image' =>  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				$fieldName, [
				'appearance' => [
					'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
				],
				'overrideChildTca' => [
					'types' => [
						'0' => [
							'showitem' => '
									--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
									--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
							'showitem' => '
									--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
									--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
							'showitem' => '
									--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
									--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
							'showitem' => '
									--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.audioOverlayPalette;audioOverlayPalette,
									--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
							'showitem' => '
									--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.videoOverlayPalette;videoOverlayPalette,
									--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
							'showitem' => '
									--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
									--palette--;;filePalette'
						]
					],
				],
			],
			'jpg,png,jpeg' #$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
		),
		'custom_bg_image' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            $fieldName, [
            'appearance' => [
                'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
            ],
            'overrideChildTca' => [
                'types' => [
                    '0' => [
                        'showitem' => '
									--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
									--palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                        'showitem' => '
									--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
									--palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                        'showitem' => '
									--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
									--palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                        'showitem' => '
									--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.audioOverlayPalette;audioOverlayPalette,
									--palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                        'showitem' => '
									--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.videoOverlayPalette;videoOverlayPalette,
									--palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                        'showitem' => '
									--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
									--palette--;;filePalette'
                    ]
                ],
            ],
        ],
            'jpg,png,jpeg' #$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),
		'custom_background_color' => [
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => [
				['White (default)', ''],
				['Gradient Red', 'bg-gradient-red'],
				['Gradien blue', 'bg-gradient-blue'],
			],
		],
		'rte' => array(
			'type' => 'text',
			'enableRichtext' => true,
            'richtextConfiguration' => 'default'
		),
	);

	return isset($config[$type]) ? $config[$type] : array();
}

/**
 * @param $fieldName
 * @param $type
 * @param array $additionalConfig
 *
 * @return array
 */
function getTcaForType($fieldName, $type, $additionalConfig=array()){

	// merge default config with additional config params
	// additional params override the default params if they are the same
	$config = array_merge(getTcaConfigDefault($type, $fieldName), $additionalConfig);

	$array = array(
		'label' => 'LLL:EXT:website/Resources/Private/Language/Backend/Default.xlf:tt_content.' . $fieldName,
		'config' => $config
	);

	return $array;
}

$tca['columns'] = $customColumns;
$tca['columns']['CType'] = array('config' => array('items' => $customCTypeItems));

foreach($customTypes as $customTypeKey => $customTypeShowitemList) {
    $overrideFields = [];

	$tca['types'][$customTypeKey] = array(
		'showitem' => $defaultFieldsBefore . $customTypeShowitemList . $defaultFieldsAfter,
        'columnsOverrides' => $overrideFields
	);
}

$GLOBALS['TCA']['tt_content'] = array_replace_recursive($GLOBALS['TCA']['tt_content'], $tca);