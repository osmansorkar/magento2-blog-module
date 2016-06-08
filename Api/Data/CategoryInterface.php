<?php 
namespace OsmanSorkar\Blog\Api\Data;
/**
* Blog Category Interface
* @api
*/
interface CategoryInterface
{
	/**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const CATEGORY_ID				= 'cat_id';
    const NAME						= 'name';
    const URL_KEY                   = 'url_key';
    const PARENT_ID                 = 'parent_id';
    const CREATION_TIME            	= 'creation_time';
    const UPDATE_TIME              	= 'update_time';
    /**#@-*/

	/**
	 * Get ID
	 * @return init|null
	 */
	function getId();
	/**
	 * Get Name
	 * @return string|null
	 */
	function getName();
	/**
	 * Get Category Parent Id
	 * @return init|null
	 */
	function getParentId();
	/**
	 * Get Url Key
	 * @return string
	 */
	function getUrlKey();

	/**
	 * Get create time
	 * @return string |null
	 */
	function getCreationTime();

	/**
	 * Get update time
	 * @return string | null
	 */
	function getUpdateTime();
	/**
	 * Set ID
	 *
	 * @param $id
	 * @return \OsmanSorkar\Blog\Api\Data\CategoryInterface
	 */
	function setId($id);
	/**
	 * 
	 * @param $name
	 * @return \OsmanSorkar\Blog\Api\Data\CategoryInterface
	 */
	function setName($name);

	/**
	 * Set url key
	 *
	 * @param $urlKey
	 * @return \OsmanSorkar\Blog\Api\Data\CategoryInterface
	 */
	function setUrlKey($urlKey);
	/**
	 * Set Parent Id
	 * 
	 * @param $id
	 * @return \OsmanSorkar\Blog\Api\Data\CategoryInterface
	 */
	function setParentId($id);
	
	/**
	 * Set create time
	 *
	 * @param $creatTime
	 * @return \OsmanSorkar\Blog\Api\Data\CategoryInterface
	 */
	function setCreationTime($creatTime);

	/**
	 * Set update time
	 *
	 * @param $updateTime
	 * @return \OsmanSorkar\Blog\Api\Data\CategoryInterface
	 */
	function setUpdateTime($updateTime);

}