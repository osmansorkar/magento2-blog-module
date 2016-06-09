<?php
namespace OsmanSorkar\Blog\Api\Data;
/**
 * Blog Category Interface
 * @api
 */
interface PostcategoryInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const CATEGORY_ID				= 'category_id';
    const POST_ID					= 'post_id';

    /**#@-*/
    /**
     * get Post Id
     * @return int
     */
    function getPostId();

    /**
     * get Post Category Id
     * @return int
     */
    function getPostCategory();

    /**
     * Set Post Id
     * @param $id
     * @return init
     */
    function setPostId($id);

    /**
     * Set Post Category
     * @param $id
     * @return init
     */
    function setCategoryId($id);

}