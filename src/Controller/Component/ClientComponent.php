<?php
namespace Alvarium\OCClient\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Core\Configure;
use Cake\Event\Event;
use OpenComponents\Client;

/**
 * Client component
 */
class ClientComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Array containing all the resulting loaded components.
     *
     * @var array
     */
    protected $_components = [];

    public function setComponents(array $components = [])
    {
        $this->_components = $this->renderComponents($components);
    }

    public function beforeRender(Event $event)
    {
        $controller = $event->subject();
        // Ensure there's always a `components` var in the view, even being empty...
        if (!isset($controller->viewVars['oc_components'])) {
            $controller->set('oc_components', $this->_components);
        }
    }

    public function renderComponents(array $components, $loadClient = true)
    {
        $client = new Client([
            "serverRendering" => Configure::read('OCClient.serverRendering')
        ], [
            'oc-client'
        ]);

        if ($loadClient) {
            array_unshift($components, ['name' => 'oc-client']);
        }

        try {
            $components = $client->renderComponents($components)['html'];
        } catch (\Exception $e) {
            $components = [
                '<script>console.log("There was an error loading an OC component")</script>'
            ];
        }

        return $components;
    }
}
