OCClient plugin for CakePHP
===========================

A CakePHP 3.X plugin for the [OpenComponents][oc] [PHP Client][oc-php]

Installation
------------

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

~~~
composer require alvarium/cake-oc
~~~

### Configuration

After that, load the plugin in your `bootstrap.php` file:

~~~php
Plugin::load('Alvarium/OCClient', ['bootstrap' => true]);
~~~

Create a file named `occlient.php` in your `config` folder defining your
open-components registry endpoint:

~~~php
<?php

return [
    'OCClient' => [
        'serverRendering' => 'https://registry.your-company.io/',
    ]
];
~~~

Then, load the component + the helper in the controller(s) where you want the
plugin to be used:

~~~php
<?php
namespace App;

use Cake\Event\Event;

class PostsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Alvarium/OCClient.Client');
    }

    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);

        $this->viewBuilder()->helpers([
            'Alvarium/OCclient.OC',
        ]);
    }
}
~~~

Usage
-----

After all configuration has been done, and having both component and helper loaded,
to load your opencomponents scripts in your pages you just need to define the
components using `setComponents` in your controller method:

~~~php
<?php
namespace App;

// [...]

class PostsController extends AppController
{
    // [...]

    public function index()
    {
        $this->Client->setComponents(
            [
              'name' => 'your-awesome-component',
              'parameters' => [
                  'selector' => '#awesome-component',
                  'key' => 'value',
                  'key2' => 'value2',
              ],
            ],
            [
                'name' => 'another-awesome-component',
                'parameters' => [
                    'selector' => '#awesome-component-2',
                    'key12' => 'value12',
                    'key23' => 'value23',
                ]
            ]
        );
    }
~~~

Note how we define the `selector` key. That's because we're able to define our
selectors for each component.

This helper loads components appending them to the `script` view block. Depending
on how do you work with your opencomponent widgets this could bring some issues.

If so, you can just avoid using the helper and add the scripts wherever you want:

~~~php
foreach ($oc_components as $component) {
    echo $component;
}
~~~

License
-------

This plugin code [is licensed under a GNU GPL v.3 license][license].

[oc]: https://github.com/opentable/oc
[oc-php]: https://github.com/opencomponents/oc-client-php
[license]: ./LICENSE
