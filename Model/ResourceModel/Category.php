<?php
namespace OsmanSorkar\Blog\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Category extends AbstractDb{
	public function _construct(){
		$this->_init("osmansorkar_blog_category","cat_id");
	}
}