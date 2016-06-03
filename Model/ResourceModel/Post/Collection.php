<?php
namespace OsmanSorkar\Blog\Model\ResourceModel\Post;

/**
 * Class Collection
 * @package OsmanSorkar\Blog\Model\ResourceModel\Post
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	
	/**
     * @var string
     */
    protected $_idFieldName = 'post_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('OsmanSorkar\Blog\Model\Post', 'OsmanSorkar\Blog\Model\ResourceModel\Post');
    }

}
