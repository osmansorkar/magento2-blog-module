<?php
namespace OsmanSorkar\Blog\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Postcategory
 * @package OsmanSorkar\Blog\Model\ResourceModel
 */
class Postcategory extends AbstractDb{
	protected function _construct(){
		$this->_init("osmansorkar_post_category",null);
	}

	/**
	 * Delete Post category by ID
	 * @param $id
	 * @throws \Magento\Framework\Exception\LocalizedException
	 */
	public function _postCategoryDelete($id){
		$this->getConnection()->delete($this->getMainTable(),'post_id='.$id);
	}
}