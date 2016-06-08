<?php
namespace OsmanSorkar\Blog\Model;
use Magento\Framework\Model\AbstractModel;
use OsmanSorkar\Blog\Api\Data\CategoryInterface;

class Category extends AbstractModel implements CategoryInterface {
	public function _construct(){
		parent::_init("OsmanSorkar\Blog\Model\ResourceModel\Category");
	}
	/**
	 * Get ID
	 * @return init|null
	 */
	function getId(){
		return $this->getData(self::CATEGORY_ID);
	}
	/**
	 * Get Name
	 * @return string|null
	 */
	function getName(){
		return $this->getData(self::NAME);
	}
	/**
	 * Get Category Parent Id
	 * @return init|null
	 */
	function getParentId(){
		return $this->getData(self::PARENT_ID);
	}
	/**
	 * Get Url Key
	 * @return string
	 */
	function getUrlKey(){
		return $this->getData(self::URL_KEY);
	}
	
	/**
	 * Get create time
	 * @return string |null
	 */
	function getCreationTime(){
		return $this->getData(self::CREATION_TIME);
	}
	
	/**
	 * Get update time
	 * @return string | null
	 */
	function getUpdateTime(){
		return $this->getData(self::UPDATE_TIME);
	}
	/**
	 * Set ID
	 *
	 * @param $id
	 * @return \OsmanSorkar\Blog\Api\Data\CategoryInterface
	 */
	function setId($id){
		$this->setData(self::CATEGORY_ID,$id);
		return $this;
	}
	/**
	 *
	 * @param $name
	 * @return \OsmanSorkar\Blog\Api\Data\CategoryInterface
	 */
	function setName($name){
		$this->setData(self::NAME,$name);
		return $this;
	}
	
	/**
	 * Set url key
	 *
	 * @param $urlKey
	 * @return \OsmanSorkar\Blog\Api\Data\CategoryInterface
	 */
	function setUrlKey($urlKey){
		$this->setData(self::URL_KEY,$urlKey);
		return $this;
	}
	/**
	 * Set Parent Id
	 *
	 * @param $id
	 * @return \OsmanSorkar\Blog\Api\Data\CategoryInterface
	 */
	function setParentId($id){
		$this->setData(self::PARENT_ID,$id);
		return $this;
	}
	
	/**
	 * Set create time
	 *
	 * @param $creatTime
	 * @return \OsmanSorkar\Blog\Api\Data\CategoryInterface
	 */
	function setCreationTime($creatTime){
		$this->setData(self::CREATION_TIME,$creatTime);
		return $this;
	}
	
	/**
	 * Set update time
	 *
	 * @param $updateTime
	 * @return \OsmanSorkar\Blog\Api\Data\CategoryInterface
	 */
	function setUpdateTime($updateTime){
		$this->setData(self::UPDATE_TIME,$updateTime);
		return $this;
	}
}