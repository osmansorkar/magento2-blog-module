<?php

namespace OsmanSorkar\Blog\Controller\Index;

/**
 * Class Index
 * @package OsmanSorkar\Blog\Controller\Index
 */
class Index extends \Magento\Framework\App\Action\Action
{
	/**
	 * @var \Magento\Framework\View\Result\PageFactory
	 */
	protected $resultPageFactory;

	/**
	 * @var \OsmanSorkar\Blog\Model\ResourceModel\Post\CollectionFactory
	 */
	protected $postCollectionFactory;

	/**
	 * Index constructor.
	 * @param \Magento\Framework\App\Action\Context $context
	 * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
	 * @param \OsmanSorkar\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory
	 */
	function __construct(
		\Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \OsmanSorkar\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory
        )
	{
		$this->resultPageFactory=$resultPageFactory;
		$this->postCollectionFactory=$postCollectionFactory;
		parent::__construct($context);
	}

	public function execute(){
		$postCollection=$this->postCollectionFactory->create()->getData();
		return $this->resultPageFactory->create();
		
	}
}