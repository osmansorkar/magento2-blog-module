<?php
namespace OsmanSorkar\Blog\Block\Adminhtml\Category;

/**
 * Admin Blog Post
 *
 * @author     Osman Sorkar
 */
class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Initialize cms page edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'cat_id';
        $this->_blockGroup = 'OsmanSorkar_Blog';
        $this->_controller = 'adminhtml_Category';

        parent::_construct();

        if ($this->_isAllowedAction('OsmanSorkar_Blog::category_save')) {
            $this->buttonList->update('save', 'label', __('Save Post'));
            $this->buttonList->add(
                'saveandcontinue',
                [
                    'label' => __('Save and Continue Edit'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => [
                            'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                        ],
                    ]
                ],
                -100
            );
        } else {
            $this->buttonList->remove('save');
        }

        if ($this->_isAllowedAction('OsmanSorkar_Blog::category_delete')) {
            $this->buttonList->update('delete', 'label', __('Delete Page'));
        } else {
            $this->buttonList->remove('delete');
        }
    }

    /**
     * Retrieve text for header element depending on loaded page
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('blog_category')->getId()) {
            return __("Edit Category '%1'", $this->escapeHtml($this->_coreRegistry->registry('blog_category')->getName()));
        } else {
            return __('New Category');
        }
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    /**
     * Getter of url for "Save and Continue" button
     * tab_id will be replaced by desired by JS later
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('post/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '{{tab_id}}']);
    }

}
