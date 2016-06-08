<?php 
/**
* 
*/
namespace OsmanSorkar\Blog\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $contex
     * @throws \Zend_Db_Exception
     */
	public function install(SchemaSetupInterface $setup,ModuleContextInterface $contex){
        /**
         * @var SchemaSetupInterface
         */
		$installer=$setup;

        /**
         * Start Setup
         */
		$installer->startSetup();

		 /**
         * Create table 'osmansorkar_blog_post'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('osmansorkar_blog_post')
        )->addColumn(
            'post_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Post ID'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Post Title'
        )->addColumn(
            'url_key',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            100,
            ['nullable' => true, 'default' => null],
            'Post String Identifier'
        )->addColumn(
            'content',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '2M',
            [],
            'Post Content'
        )->addColumn(
            'user_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false],
            'Post User ID'
        )->addColumn(
            'photo',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Post Photo'
        )->addColumn(
            'creation_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
            'Post Creation Time'
        )->addColumn(
            'update_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
            'Post Modification Time'
        )->addColumn(
            'is_active',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => '1'],
            'Is Post Active'
        )->addIndex(
            $installer->getIdxName('osmansorkar_blog_post', ['url_key']),
            ['url_key']
        )->setComment(
            'Blog Post Table'
        );
        $installer->getConnection()->createTable($table);

         /**
         * Create table 'osmansorkar_blog_category'
         */
        $categoryTable = $installer->getConnection()->newTable(
            $installer->getTable('osmansorkar_blog_category')
        )->addColumn(
            'cat_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Category ID'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            100,
            ['nullable' => false],
            'Category Name'
        )->addColumn(
            'url_key',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            100,
            ['nullable' => false, 'default' => null],
            'Category Urk Key'
        )->addColumn(
            'parent_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => true],
            'Category Parent User ID'
        )->addColumn(
            'creation_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
            'Post Creation Time'
        )->addColumn(
            'update_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
            'Post Modification Time'
        )->addIndex(
            $installer->getIdxName('osmansorkar_blog_category', ['url_key']),
            ['url_key']
        )->setComment(
            'OsmanSorkar Blog Category Table'
        );
        $installer->getConnection()->createTable($categoryTable);

         /**
         * Create table 'osmansorkar_post_category'
         */
        $postCategoryTable = $installer->getConnection()->newTable(
            $installer->getTable('osmansorkar_post_category')
        )->addColumn(
            'post_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false],
            'Post Id'
        )->addColumn(
            'category_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false],
            'Category  Id'
        )->setComment(
            'OsmanSorkar Blog Post Category Table'
        );
        $installer->getConnection()->createTable($postCategoryTable);
        /**
         * End Setup
         */
        $installer->endSetup();
	}
}