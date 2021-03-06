<?
/**
 * @package    Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die; ?>

<div class="tada_item">
    <h4 class="koowa_header">
        <? // Header title ?>
        <span class="koowa_header__item">
            <a class="koowa_header__title_link" href="<?= route('view=item&id='.$item->id); ?>">
                <?= escape($item->title); ?>
            </a>
         </span>

        <? // Label locked ?>
        <? if ($item->isPermissible() && $item->canPerform('edit') && $item->isLockable() && $item->isLocked()): ?>
            <span class="label label-warning"><?= helper('grid.lock_message', array('entity' => $item)); ?></span>
        <? endif; ?>

        <? // Label status ?>
        <? if (!$item->isPublished() || !$item->enabled): ?>
            <? $status = $item->enabled ? translate($item->status) : translate('Draft'); ?>
            <span class="label label-<?= $item->enabled ? $item->status : 'draft' ?>"><?= ucfirst($status); ?></span>
        <? endif; ?>
    </h4>
    <div class="item_description">
        <?= JHtml::_('content.prepare', $item->description); ?>
    </div>
</div>