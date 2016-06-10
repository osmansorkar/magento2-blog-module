<?php
namespace OsmanSorkar\Blog\Helper;
use Magento\Framework\App\Helper\AbstractHelper;

class Post extends AbstractHelper{
	/**
	 * @var \OsmanSorkar\Blog\Model\ResourceModel\Category\CollectionFactory
	 */
	protected $categoryCollectionFactory;
	/**
	 * @var \OsmanSorkar\Blog\Model\ResourceModel\Postcategory\CollectionFactory
	 */
	protected $postCategoryFactory;
	/**
	 * @var \OsmanSorkar\Blog\Model\CategoryFactory
	 */
	protected $categoryFactroy;

	/**
	 * Post constructor.
	 * @param \Magento\Framework\App\Helper\Context $context
	 * @param \OsmanSorkar\Blog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory
	 * @param \OsmanSorkar\Blog\Model\ResourceModel\Postcategory\CollectionFactory $postCategoryFactory
	 * @param \OsmanSorkar\Blog\Model\CategoryFactory $categoryFactory
	 */
	public function __construct(
			\Magento\Framework\App\Helper\Context $context,
			\OsmanSorkar\Blog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
			\OsmanSorkar\Blog\Model\ResourceModel\Postcategory\CollectionFactory $postCategoryFactory,
			\OsmanSorkar\Blog\Model\CategoryFactory $categoryFactory
			){
		$this->categoryCollectionFactory=$categoryCollectionFactory;
		$this->postCategoryFactory=$postCategoryFactory;
		$this->categoryFactroy=$categoryFactory;
		parent::__construct($context);
	}

	/**
	 * @param $postId
	 * @return string
	 */
	public function getCategoryHtml($postId){
		$html='';
		$categorys=$this->postCategoryFactory->create()->getCategorysValu($postId);
		
		foreach ($categorys as $category){
			$cat=$this->categoryFactroy->create()->load($category);
			$html.=', <span>'.$cat->getName().'</span>';
		}
		return $html;
	}

	/**
	 * @param $url
	 * @return string|null
	 */
	public function getPhotoUrl($url){
		if($url==null){
			return;
		}
		$url=explode('/',$url);
		if(is_array($url)){
		$url = $this->urlDecoder->decode($url['9']);
		return $url;
		}
	}
}