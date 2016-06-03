<?php
namespace OsmanSorkar\Blog\Block\Post;

/**
* Posts Block;
*/
class View extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \OsmanSorkar\Blog\Model\Post
     */
	protected $post;
    /**
     * @var \OsmanSorkar\Blog\Model\PostFactory
     */
	protected $postFactory;
    /**
     * @var \Magento\Cms\Model\Template\FilterProvider
     */
    protected $filterProvider;
    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;
    /**
    *@var \Magento\User\Model\User
    */
    protected $adminUser;

    /**
     * View constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \OsmanSorkar\Blog\Model\Post $post
     * @param \OsmanSorkar\Blog\Model\PostFactory $postFactory
     * @param \Magento\Cms\Model\Template\FilterProvider $filterProvider
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param array $data
     */
	function __construct(
			\Magento\Framework\View\Element\Template\Context $context,
			\OsmanSorkar\Blog\Model\Post $post,
			\OsmanSorkar\Blog\Model\PostFactory $postFactory,
            \Magento\Cms\Model\Template\FilterProvider $filterProvider,
            \Magento\Framework\UrlInterface $urlBuilder,
            \Magento\User\Model\User $adminUser,
			$data=[]
		)
	{
		$this->post=$post;
		$this->postFactory=$postFactory;
        $this->filterProvider=$filterProvider;
        $this->urlBuilder=$urlBuilder;
        $this->adminUser=$adminUser;
		parent::__construct($context,$data);
	}

    /**
     * Prepare global layout
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        $post = $this->getPost();
        $this->_addBreadcrumbs($post);
        $this->pageConfig->addBodyClass('post-' . $post->getID());
        $this->pageConfig->getTitle()->set($post->getTitle());
        //$this->pageConfig->setKeywords($post->getMetaKeywords());
        //$this->pageConfig->setDescription($post->getMetaDescription());

        return parent::_prepareLayout();
    }

    /**
     * Prepare breadcrumbs
     *
     * @param \Magento\Cms\Model\Post $post
     * @throws \Magento\Framework\Exception\LocalizedException
     * @return void
     */
    protected function _addBreadcrumbs(\OsmanSorkar\Blog\Model\Post $post)
    {
        if (($breadcrumbsBlock = $this->getLayout()->getBlock('breadcrumbs'))
        ) {
            $breadcrumbsBlock->addCrumb(
                'home',
                [
                    'label' => __('Home'),
                    'title' => __('Go to Home Page'),
                    'link' => $this->_storeManager->getStore()->getBaseUrl()
                ]
            );
            $breadcrumbsBlock->addCrumb(
                'blog',
                [
                    'label'=>__("blog"),
                    'title'=>__("Go to Blog"),
                    'link'=>__($this->urlBuilder->getUrl("blog/"))
                ]
                );
            $breadcrumbsBlock->addCrumb('blog_Post', ['label' => $post->getTitle(), 'title' => $post->getTitle()]);
        }
    }
	 /**
     * @return \Ashsmith\Blog\Model\Post
     */
    public function getPost()
    {
        // Check if posts has already been defined
        // makes our block nice and re-usable! We could
        // pass the 'posts' data to this block, with a collection
        // that has been filtered differently!
        if (!$this->hasData('post')) {
            if ($this->getPostId()) {
                /** @var \Ashsmith\Blog\Model\Post $page */
                $post = $this->postFactory->create();
            } else {
                $post = $this->post;
            }
            $this->setData('post', $post);
        }
        $postData=$this->getData('post');
        return $postData->setContent($this->filterProvider->getPageFilter()->filter($postData->getContent()));
    }

    public function getAdminUser($id)
    {
        return $this->adminUser->load($id);
    }

    public function getImgHtml($img){
        $html='';
        if($img!=""){
        $html='<div class="post_photo"> <img src="'.$this->filterProvider->getPageFilter()->filter($img).'" />  </div>';
        }
        return $html;
    }
}