<?php
namespace OsmanSorkar\Blog\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Postcategory extends AbstractDb{
	protected function _construct(){
		$this->_init("osmansorkar_post_category",null);
	}
	public function _postCategoryDelete($id){
		$this->getConnection()->delete($this->getMainTable(),'post_id='.$id);
	}
}