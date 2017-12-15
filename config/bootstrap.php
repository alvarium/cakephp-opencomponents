<?php
use Cake\Core\Configure;

Configure::write('OCClient', [
    'serverRendering' => 'https://some-repo.com'
]);

Configure::load('OCClient');
