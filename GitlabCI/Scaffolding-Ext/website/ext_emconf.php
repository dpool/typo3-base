<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'dpool Website Extension',
    'description' => 'Default Website Extension by dpool',
    'category' => 'fe',
    'author' => 'Andreas Habel',
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
