<?php
namespace OsmanSorkar\Blog\Model\ResourceModel\Category;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
	
	/**
	 * @var string
	 */
	protected $_idFieldName = 'cat_id';
	
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('OsmanSorkar\Blog\Model\Category', 'OsmanSorkar\Blog\Model\ResourceModel\Category');
	}

	/**
	 * Get All Category for MultiSelect
	 * @return array
	 */
	public function getCategory(){
		$data=array();
		foreach ($this as $key=> $item) {
			$data[$key]['value']=$item->getId();
			$data[$key]['label']=$item->getName();
		}
		return $data;
	}
}