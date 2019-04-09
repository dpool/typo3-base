<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'dpool base extension',
    'description' => 'dpool base extension',
    'category' => 'fe',
    'author' => 'Daniel Thomas',
    'author_email' => 'andreas.habel@dpool.com',
    'shy' => '',
    'dependencies' => '',
    'conflicts' => '',
    'priority' => '',
    'module' => '',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => 1,
    'modify_tables' => '',
    'clearCacheOnLoad' => 1,
    'lockType' => '',
    'author_company' => '',
    'version' => '0.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.4-9.9.99',
        ],
        'conflicts' => []
    ],
    'suggests' => [],
];
