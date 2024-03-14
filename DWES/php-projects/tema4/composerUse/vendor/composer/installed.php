<?php return array(
    'root' => array(
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'type' => 'project',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => '07c48609670892328b74738d6ea5d8f0ea01deb3',
        'name' => 'fcosueza/composer-use',
        'dev' => true,
    ),
    'versions' => array(
        'fcosueza/composer-use' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'type' => 'project',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => '07c48609670892328b74738d6ea5d8f0ea01deb3',
            'dev_requirement' => false,
        ),
        'monolog/monolog' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'type' => 'library',
            'install_path' => __DIR__ . '/../monolog/monolog',
            'aliases' => array(
                0 => '3.x-dev',
            ),
            'reference' => '479c936d2c230d8c467bdb3882afab45a6e6b8ad',
            'dev_requirement' => false,
        ),
        'psr/log' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/log',
            'aliases' => array(
                0 => '3.x-dev',
            ),
            'reference' => 'fe5ea303b0887d5caefd3d431c3e61ad47037001',
            'dev_requirement' => false,
        ),
        'psr/log-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '3.0.0',
            ),
        ),
    ),
);
