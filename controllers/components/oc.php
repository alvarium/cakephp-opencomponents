<?php
/**
 * Oc-Client component
 */
class OcComponent extends Object
{
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

    public function beforeRender($controller)
    {
        // Ensure there's always a `components` var in the view, even being empty...
        if (!isset($controller->viewVars['oc_components'])) {
            $controller->set('oc_components', $this->_components);
        }
    }

    public function renderComponents(array $components, $loadClient = true)
    {
        $client = new OpenComponents\Client([
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
                "<script>console.error('There was an error loading an OC component:'," .
                "JSON.stringify('{$e->getMessage()}'))</script>",
            ];
        }

        return $components;
    }
}
