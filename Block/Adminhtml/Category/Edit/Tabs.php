<?php
namespace OsmanSorkar\Blog\Block\Adminhtml\Category\Edit;

use Magento\Backend\Block\Widget\Tabs as WidgetTabs;
/**
 * Admin page left menu
 */
class Tabs extends WidgetTabs
{
    /**
     * Class constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('post_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Category Information'));
    }
 
}