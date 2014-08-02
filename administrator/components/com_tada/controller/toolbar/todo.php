<?php
/**
 * @package     Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

class ComTadaControllerToolbarTodo extends ComKoowaControllerToolbarActionbar
{
    protected function _afterRead(KControllerContextInterface $context)
    {

        $this->addCommand('apply');
        $this->addCommand('save');
        $this->addCommand('save2new');

        $this->addCommand('cancel');

    }

    protected function _afterBrowse(KControllerContextInterface $context)
    {
        parent::_afterBrowse($context);

        $controller = $this->getController();

        $this->addSeparator();
        $this->addPublish(array('allowed' => $controller->canEdit()));
        $this->addUnpublish(array('allowed' => $controller->canEdit()));
    }
}