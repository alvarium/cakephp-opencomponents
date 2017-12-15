<?php
/**
 * Oc Helper
 */
class OcHelper extends AppHelper
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
     * to the view's script_for_layout var.
     *
     * @param  Event  $event      Current event.
     * @param  string $layoutFile The layout filename.
     * @return void
     */
    public function beforeRender()
    {

        $view = ClassRegistry::getObject('view');

        $components = $view->viewVars['oc_components'];
        foreach ($components as $component) {
            $view->addScript($component);
        }
    }
}
