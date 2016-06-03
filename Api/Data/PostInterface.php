<?php 
namespace OsmanSorkar\Blog\Api\Data;
/**
* Blog Post Interface
* @api
*/
interface PostInterface
{
	/**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const POST_ID                  = 'post_id';
    const URL_KEY                  = 'url_key';
    const TITLE                    = 'title';
    const CONTENT                  = 'content';
    const USER_ID                  = 'user_id';
    const PHOTO                    = 'photo';
    const CREATION_TIME            = 'creation_time';
    const UPDATE_TIME              = 'update_time';
    const IS_ACTIVE                = 'is_active';
    /**#@-*/

	/**
	 * Get ID
	 * @return init|null
	 */
	function getID();

	/**
	 * Get Url Key
	 * @return string
	 */
	function getUrlKey();

	/**
	 * Get title
	 * @return string
	 */
	function getTitle();

	/**
	 * Get content
	 * @return string
	 */
	function getContent();

	/**
	 * Get post user id
	 * @return int | null
	 */
	function getUserID();

	/**
	 * Get Post photo
	 * @return string
	 */
	function getPhoto();

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
	 * Is active
	 * @return bool|null
	 */
	function isActive();

	/**
	 * Set ID
	 *
	 * @param $id
	 * @return \OsmanSorkar\Blog\Api\Data\PostInterface
	 */
	function setID($id);

	/**
	 * Set url key
	 *
	 * @param $urlKey
	 * @return \OsmanSorkar\Blog\Api\Data\PostInterface
	 */
	function setUrlKey($urlKey);

	/**
	 * Set title
	 *
	 * @param $title
	 * @return \OsmanSorkar\Blog\Api\Data\PostInterface
	 */
	function setTitle($title);

	/**
	 * Set Content
	 *
	 * @param $content
	 * @return \OsmanSorkar\Blog\Api\Data\PostInterface
	 */
	function setContent($content);

	/**
	 * Set User ID
	 *
	 * @param $userId
	 * @return \OsmanSorkar\Blog\Api\Data\PostInterface
	 */
	function setUserID($userId);

	/**
	 * Set photo url
	 *
	 * @param $photoUrl
	 * @return \OsmanSorkar\Blog\Api\Data\PostInterface
	 */
	function setPhoto($photoUrl);

	/**
	 * Set create time
	 *
	 * @param $creatTime
	 * @return \OsmanSorkar\Blog\Api\Data\PostInterface
	 */
	function setCreationTime($creatTime);

	/**
	 * Set update time
	 *
	 * @param $updateTime
	 * @return \OsmanSorkar\Blog\Api\Data\PostInterface
	 */
	function setUpdateTime($updateTime);

	/**
	 * Set is active
	 *
	 * @param $isactive
	 * @return \OsmanSorkar\Blog\Api\Data\PostInterface
	 */
	function setIsActive($isactive);
}