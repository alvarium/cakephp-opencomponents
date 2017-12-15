<?php
namespace Alvarium\OCClient\View\Helper;

use Cake\Event\Event;
use Cake\View\Helper;
use Cake\View\View;

/**
 * OC helper
 */
class OCHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Helpers to be loaded within this helper.
     *
     * @var array
     */
    public $helpers = ['Html'];

    /**
     * Appends any loaded component (using the ClientComponent)
     * to the view's script tag.
     *
     * @param  Event  $event      Current event.
     * @param  string $layoutFile The layout filename.
     * @return void
     */
    public function beforeLayout(Event $event, $layoutFile)
    {
        $view = $event->subject();

        foreach ($view->get('oc_components') as $component) {
            $view->append('script', $component);
        }
    }
}
