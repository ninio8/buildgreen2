<?php

/**
 * BaseBuildgreenCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property boolean $is_visible
 * @property integer $order_n
 * @property string $img_url
 * @property Doctrine_Collection $BuildgreenArticle
 * 
 * @method string              getTitle()             Returns the current record's "title" value
 * @method boolean             getIsVisible()         Returns the current record's "is_visible" value
 * @method integer             getOrderN()            Returns the current record's "order_n" value
 * @method string              getImgUrl()            Returns the current record's "img_url" value
 * @method Doctrine_Collection getBuildgreenArticle() Returns the current record's "BuildgreenArticle" collection
 * @method BuildgreenCategory  setTitle()             Sets the current record's "title" value
 * @method BuildgreenCategory  setIsVisible()         Sets the current record's "is_visible" value
 * @method BuildgreenCategory  setOrderN()            Sets the current record's "order_n" value
 * @method BuildgreenCategory  setImgUrl()            Sets the current record's "img_url" value
 * @method BuildgreenCategory  setBuildgreenArticle() Sets the current record's "BuildgreenArticle" collection
 * 
 * @package    buildgreen
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBuildgreenCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('buildgreen_category');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('is_visible', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('order_n', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('img_url', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('BuildgreenArticle', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $nestedset0 = new Doctrine_Template_NestedSet(array(
             'hasManyRoots' => true,
             'rootColumnName' => 'root_id',
             ));
        $this->actAs($nestedset0);
    }
}