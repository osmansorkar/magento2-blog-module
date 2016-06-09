<?php
namespace OsmanSorkar\Blog\Block;

use OsmanSorkar\Blog\Api\Data\PostInterface;
use OsmanSorkar\Blog\Model\ResourceModel\Post\Collection as postCollection;
/**
* Posts Block;
*/
class Posts extends \Magento\Framework\View\Element\Template
{
	/**
	 * @var \OsmanSorkar\Blog\Model\ResourceModel\Post\CollectionFactory
	 */
	protected $postCollectionFactory;
	/**
	 * @var \Magento\Cms\Model\Template\FilterProvider
	 */
	protected $filterProvider;
	/**
	 * @var \Magento\Framework\view\Page\Config
	 */
	protected $pageConfig;
	/**
	*@var \Magento\User\Model\User $adminUser
	*/
	protected $adminUser;
	/**
	 * @var \OsmanSorkar\Blog\helper\Post
	 */
	protected $postHelper;

	/**
	 * Posts constructor.
	 * @param \Magento\Framework\View\Element\Template\Context $context
	 * @param \OsmanSorkar\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory
	 * @param \Magento\Cms\Model\Template\FilterProvider $filterProvider
	 * @param \Magento\Framework\view\Page\Config $pageConfig
	 * @param \Magento\User\Model\User $adminUser
	 * @param \OsmanSorkar\Blog\helper\Post $postHelper
	 * @param array $data
	 */
	function __construct(
			\Magento\Framework\View\Element\Template\Context $context,
			\OsmanSorkar\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory,
			\Magento\Cms\Model\Template\FilterProvider $filterProvider,
			\Magento\Framework\view\Page\Config $pageConfig,
			\Magento\User\Model\User $adminUser,
			\OsmanSorkar\Blog\helper\Post $postHelper,
			$data=[]
		)
	{
		$this->postCollectionFactory=$postCollectionFactory;
		$this->filterProvider=$filterProvider;
		$this->pageConfig=$pageConfig;
		$this->adminUser=$adminUser;
		$this->postHelper=$postHelper;
		parent::__construct($context,$data);
	}

	/**
	 * Golbal Prepare Layout
	 *
	 * @return $this
	 */
	public function _prepareLayout()
	{
		$this->_addBreadcrumbs();
		$this->pageConfig->getTitle()->set("Blog");
		$pager=$this->getLayout()->createBlock('Magento\Theme\Block\Html\Pager');
		$pager->setShowPerPage("2");
		$pager->setCollection($this->getPostCollection());
        $this->setChild("posts.pager",$pager);
		parent::_prepareLayout();
	}

	/**
     * Prepare breadcrumbs
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     * @return void
     */
    protected function _addBreadcrumbs()
    {
        	
        	$breadcrumbsBlock = $this->getLayout()->getBlock('breadcrumbs');

            $breadcrumbsBlock->addCrumb(
                'home',
                [
                    'label' => __('Home'),
                    'title' => __('Go to Home Page'),
                    'link' => $this->_storeManager->getStore()->getBaseUrl()
                ]
            );
            $breadcrumbsBlock->addCrumb('cms_page', ['label' => 'Blog', 'title' => 'Blog']);
        
    }

	/**
	* Get all posts
	* @return Object \OsmanSorkar\Blog\Model\ResourceModel\Post\Collection
	*/
	public function getPostCollection()
	{
		if(!$this->hasData("postCollection")) {
			$postCollection = $this->postCollectionFactory->create();
			$postCollection->addFieldToSelect("*")
				->addfieldToFilter("is_active", "1")
				->addOrder(
					PostInterface::CREATION_TIME,
					postCollection::SORT_ORDER_DESC
				);
			$this->setData("postCollection",$postCollection);
		}
		return $this->getData("postCollection");
	}

	/**
	 * Conver Post Content to Pure Html
	 * @param $valu
	 * @return string
	 */
	public function getFilterContent($valu){
		return $this->filterProvider->getPageFilter()->filter($valu);
	}

	public function getAdminUser($id)
	{
		return $this->adminUser->load($id);
	}
	public function getImgHtml($img){
		$img=$this->postHelper->getPhotoUrl($img);
        $html='';
        if($img!=""){
        $html='<div class="post_photo"> <img src="'.$this->filterProvider->getPageFilter()->filter($img).'" />  </div>';
        }
        return $html;
    }

	/**
	 * @param $postId
	 * @return string
	 */
    public function categoryHtml($postId){
    	return $this->postHelper->getCategoryHtml($postId);
    }
}