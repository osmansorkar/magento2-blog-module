<?php
namespace OsmanSorkar\Blog\Block\Adminhtml\Post\Edit\Tab;
/**
 * Cms page edit form main tab
 */
class Category extends \Magento\Backend\Block\Widget\Form\Generic implements
    \Magento\Backend\Block\Widget\Tab\TabInterface
{
   protected $categoryCollection;
   protected $productCategoryCollection;
    /**
     * Content constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \OsmanSorkar\Blog\Model\ResourceModel\Category\Collection $categoryCollection,
    	\OsmanSorkar\Blog\Model\ResourceModel\Postcategory\Collection $productCategoryCollection,
        array $data = []
    ) {
        $this->categoryCollection=$categoryCollection;
        $this->productCategoryCollection=$productCategoryCollection;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var $model \OsmanSorkar\Blog\Model\Post */
        $model = $this->_coreRegistry->registry('blog_post');

        /*
         * Checking if user have permissions to save information
         */
        if ($this->_isAllowedAction('OsmanSorkar_Blog::save')) {
            $isElementDisabled = false;
        } else {
            $isElementDisabled = true;
        }

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('post_');

        
        $fieldset = $form->addFieldset(
            'content_fieldset',
            ['legend' => __('Content'), 'class' => 'fieldset-wide']
        );
       
        $fieldset->addField(
            'category',
            'multiselect',
            [
                'name' => 'category',
                'label' => __('Category'),
                'title' => __('Category'),
            	'required'=>true,
            	'values'=>$this->categoryCollection->getCategory(),
                'value'=>$this->productCategoryCollection->getCategorysValu($model->getId()),
                'disabled' => $isElementDisabled
            ]
        );

        $this->_eventManager->dispatch('adminhtml_blog_post_edit_tab_content_prepare_category_form', ['form' => $form]);
       // $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Category');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Category');
    }

    /**
     * Returns status flag about this tab can be shown or not
     *
     * @return bool
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return bool
     */
    public function isHidden()
    {
        return false;
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
}
