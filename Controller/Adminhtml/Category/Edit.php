<?php
namespace OsmanSorkar\Blog\Controller\Adminhtml\Category;
/**
* 
*/
class Edit extends \Magento\Backend\App\Action
{
	/**
	 * @var \Magento\Framework\Registry|null
	 */
	protected $_coreRegistry=null;

	/**
	 * @var \Magento\Framework\View\Result\PageFactory
	 */
	protected $resultPageFactory;

	/**
	 * Edit constructor.
	 * @param \Magento\Backend\App\Action\Context $context
	 * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
	 * @param \Magento\Framework\Registry $registry
	 */
	function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Magento\Framework\Registry $registry
		){

		$this->resultPageFactory=$resultPageFactory;
		$this->_coreRegistry=$registry;
		parent::__construct($context);

	}
	public function execute(){
		
		// 1. Get ID and create model
		$id=$this->getRequest()->getParam("cat_id");

		$model=$this->_objectManager->create("OsmanSorkar\Blog\Model\Category");

		if($id){
			$model->load($id);
			if(!$model->getId()){
				$this->messageManager->addError(__("This Category no longer exists"));
				/** \Magento\Backend\Model\View\Result\Redirct $resultRedirct */
				$resultRedirect=$this->resultRedirectFactory->create();

				return $resultRedirect->setPath('*/*/');
			}
		}

		 // 3. Set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        // 4. Register model to use later in blocks
        $this->_coreRegistry->register('blog_category', $model);

        // 5. Build edit form
		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Ashsmith_Blog::category');
        $resultPage->addBreadcrumb(__('Blog Category Edit'), __('Blog Category Edit'));
        $resultPage->addBreadcrumb(__('Manage Blog Category'), __('Manage Blog Category'));
        $resultPage->getConfig()->getTitle()->prepend(__('Blog Category Edit'));

        return $resultPage;
	}

	/**
	 * @inherit  Document
	 *
	 * @return bool
	 */
	public function _isAllowed(){
		return $this->_authorization->isAllowed("OsmanSorkar_Blog::category_save");
	}
}