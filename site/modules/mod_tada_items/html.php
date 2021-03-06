<?php
/**
 * @package    Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

class ModTada_ItemsHtml extends ModKoowaHtml
{
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'auto_fetch'     => false,
            'model'          => 'com://admin/tada.model.items',
        ));

        parent::_initialize($config);
    }

    /**
     * Sets the model state using module parameters
     *
     * @param KModelInterface $model
     * @return $this
     */
    protected function _setModelState(KModelInterface $model)
    {
        $params = $this->module->params;

        // Set all parameters in the state to allow easy extension of the module
        $state = $params->toArray();

        if (substr($params->sort, 0, 8) === 'reverse_')
        {
            $state['sort'] = substr($params->sort, 8);
            $state['direction'] = 'desc';
        }

        $model->setState($state);

        $model
            ->enabled(1)
            ->limit($params->limit);

        return $this;
    }

    protected function _fetchData(KViewContext $context)
    {
        parent::_fetchData($context);

        $model = $this->getModel();

        $this->_setModelState($model);

        $context->data->items = $model->fetch();
        $context->data->total = $model->count();
    }

}