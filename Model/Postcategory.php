<?php
namespace OsmanSorkar\Blog\Model;
use Magento\Framework\Model\AbstractModel;

class Postcategory extends AbstractModel {
	public function _construct(){
		parent::_init("OsmanSorkar\Blog\Model\ResourceModel\Postcategory");
	}
	
	public function deletePostCategory($id){
		$this->_getResource()->_postCategoryDelete($id);
	}
}