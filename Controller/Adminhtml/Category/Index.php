<?php
namespace OsmanSorkar\Blog\Controller\Adminhtml\Category;

/**
 * Class Index
 * @package OsmanSorkar\Blog\Controller\Adminhtml\Category
 */
class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
	protected $resultPageFactory;

    /**
     * Index constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
	function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
		){

		$this->resultPageFactory=$resultPageFactory;
		parent::__construct($context);

	}
	public function execute(){
		
		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('OsmanSorkar_Blog::category');
        $resultPage->addBreadcrumb(__('Blog Category'), __('Blog Category'));
        $resultPage->addBreadcrumb(__('Manage Blog Category'), __('Manage Blog Category'));
        $resultPage->getConfig()->getTitle()->prepend(__('Blog Category'));

        return $resultPage;
	}

    /**
     * @return bool
     */
	public function _isAllowed(){
		return $this->_authorization->isAllowed("OsmanSorkar_Blog::blog_category");
	}
}