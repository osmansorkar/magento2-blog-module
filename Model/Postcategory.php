<?php
namespace OsmanSorkar\Blog\Model;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Postcategory
 * @package OsmanSorkar\Blog\Model
 */
class Postcategory extends AbstractModel implements \OsmanSorkar\Blog\Api\Data\PostcategoryInterface{
	/**
	 * Init PostCategory Model
	 */
	public function _construct(){
		parent::_init('OsmanSorkar\Blog\Model\ResourceModel\Postcategory');
	}

	/**
	 * @return init|null
	 */
	public function getPostId()
	{
		return $this->getData(self::POST_ID);
	}
	/**
	 * @return init |null
	 */
	public function getPostCategory()
	{
		return $this->getData(self::CATEGORY_ID);
	}

	/**
	 * Set Post Id
	 * @param $id
	 * @return $this
	 */
	public function setPostId($id)
	{
		$this->setData(self::POST_ID,$id);
		return $this;
	}

	/**
	 * Set Category Id
	 * @param $id
	 * @return $this
	 */
	public function setCategoryId($id)
	{
		$this->setData(self::CATEGORY_ID,$id);
		return $this;
	}

	/**
	 * Delete Post All Category by ID
	 * @param $id
	 * @throws \Magento\Framework\Exception\LocalizedException
	 */
	public function deletePostCategory($id){
		$this->_getResource()->_postCategoryDelete($id);
	}
}