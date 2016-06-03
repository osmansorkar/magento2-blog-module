<?php

namespace OsmanSorkar\Blog\Controller\View;

/**
* Post View Controller
*/
class Index extends \Magento\Framework\App\Action\Action
{
	protected $resultPageFactory;
	protected $resultForwardFactory;

	protected $post;
	/**
	* @param \Magento\Framework\App\Action\Context $context
    * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
    * @param \OsmanSorkar\Blog\Model\postFactory
    */
	function __construct(
		\Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \OsmanSorkar\Blog\Model\Post $post,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
        )
	{
		$this->resultPageFactory=$resultPageFactory;
		$this->post=$post;
		$this->resultForwardFactory=$resultForwardFactory;
		parent::__construct($context);
	}

	public function execute(){
		$post_id=$this->getRequest()->getParam("post_id",$this->getRequest()->getParam("id",false));
		$post=$this->post->load($post_id);
		if($post){
		$resultPage=$this->resultPageFactory->create();
		$resultPage->addHandle("blog_post_view_".$post_id);
		return $resultPage;
		}
		else{
			$resultForward = $this->resultForwardFactory->create();
			$resultForward->setModule("cms");
			$resultForward->setController("noroute");
            return $resultForward->forward('index');
		}
	}
}