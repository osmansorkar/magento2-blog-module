<?php
namespace OsmanSorkar\Blog\Model\ResourceModel\Postcategory;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
		
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('OsmanSorkar\Blog\Model\Postcategory', 'OsmanSorkar\Blog\Model\ResourceModel\Postcategory');
	}
	public function getCategorysValu($id){
		if($id==null && empty($id)){
			return null;
		}
		else{
			$data=array();
			$collection=$this->addFieldToSelect("*")->addFieldToFilter('post_id',$id);
			foreach ($collection as $item) {
				$data[]=$item->getCategoryId();
			}
			return $data;
		}
		
	}
}