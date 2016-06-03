<?php
namespace OsmanSorkar\Blog\Model;

use OsmanSorkar\Blog\Api\Data\PostInterface;
use Magento\Framework\DataObject\IdentityInterface;

/**
 * Class Post
 * @package OsmanSorkar\Blog\Model
 */
class Post extends \Magento\Framework\Model\AbstractModel implements PostInterface,IdentityInterface
{

	const STATUS_ENABLED = 1;
	const STATUS_DISABLED =0;
	const CACHE_TAG='osmansorkar_blog_post';

	/**
	 * @{initialize}
	 */
	function _construct()
	{
		$this->_init('OsmanSorkar\Blog\Model\ResourceModel\Post');
	}
	
	 /**
     * Prepare page's statuses.
     * Available event cms_page_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
	 /**
     * Check if post url key exists
     * return post id if post exists
     *
     * @param string $url_key
     * @return int
     */
    public function checkUrlKey($url_key)
    {
        return $this->_getResource()->checkUrlKey($url_key);
    }

	 /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
	/**
	 * @{initialize}
	 */
    function getID(){
    	return $this->getData(self::POST_ID);
    }
	/**
	 * @{initialize}
	 */
	function getUrlKey(){
		return $this->getData(self::URL_KEY);
	}
	/**
	 * @{initialize}
	 */
	function getTitle(){
		return $this->getData(self::TITLE);
	}
	/**
	 * @{initialize}
	 */
	function getUrl(){
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$urlBuilder=$objectManager->get("Magento\Framework\UrlInterface");
		return $urlBuilder->getUrl("blog/".$this->getUrlKey());
	}
	/**
	 * @{initialize}
	 */
	function getContent(){
		return $this->getData(self::CONTENT);
	}
	/**
	 * @{initialize}
	 */
	function getUserID(){
		return $this->getData(self::USER_ID);
	}
	/**
	 * @{initialize}
	 */
	function getPhoto(){
		return $this->getData(self::PHOTO);
	}
	/**
	 * @{initialize}
	 */
	function getCreationTime(){
		return $this->getData(self::CREATION_TIME);
	}
	/**
	 * @{initialize}
	 */
	function getUpdateTime(){
		return $this->getData(self::UPDATE_TIME);
	}
	/**
	 * @{initialize}
	 */
	function isActive(){
		return $this->getData(self::IS_ACTIVE);
	}
	/**
	 * @{initialize}
	 */
	function setID($id){
		$this->setData(self::POST_ID,$id);
		return $this;
	}
	/**
	 * @{initialize}
	 */
	function setUrlKey($urlKey){
		$this->setData(self::URL_KEY,$urlKey);
		return $this;
	}
	/**
	 * @{initialize}
	 */
	function setTitle($title){
		$this->setData(self::TITLE,$title);
		return $this;
	}
	/**
	 * @{initialize}
	 */
	function setContent($content){
		$this->setData(self::CONTENT,$content);
		return $this;
	}
	/**
	 * @{initialize}
	 */
	function setUserID($userId){
		$this->setData(self::USER_ID,$userId);
		return $this;
	}
	/**
	 * @{initialize}
	 */
	function setPhoto($photoUrl){
		$this->setData(self::PHOTO,$photoUrl);
		return $this;
	}
	/**
	 * @{initialize}
	 */
	function setCreationTime($creatTime){
		$this->setData(self::CREATION_TIME,$creatTime);
		return $this;
	}
	/**
	 * @{initialize}
	 */
	function setUpdateTime($updateTime){
		$this->setData(self::UPDATE_TIME,$updateTime);
		return $this;
	}
	/**
	 * @{initialize}
	 */
	function setIsActive($isActive){
		$this->setData(self::IS_ACTIVE,$isActive);
		return $this;
	}
}