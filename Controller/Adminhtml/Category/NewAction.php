<?php
namespace OsmanSorkar\Blog\Controller\Adminhtml\Category;

/**
 * Class NewAction
 * @package OsmanSorkar\Blog\Controller\Adminhtml\Post
 */
class NewAction extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Backend\Model\View\Result\ForwardFactory
     */
	protected $resultForwardFactory;

    /**
     * NewAction constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     */
	function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
		)
	{
		$this->resultForwardFactory=$resultForwardFactory;
		parent::__construct($context);
	}

	/**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('OsmanSorkar_Blog::category_save');
    }

    /**
     * Forward to edit
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Forward $resultForward */
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}