<?php

/**
 * Category filter form base class.
 *
 * @package    Tree-of-Life
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'      => new sfWidgetFormFilterInput(),
      'visible'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'need_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Need')),
      'help_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Help')),
    ));

    $this->setValidators(array(
      'name'      => new sfValidatorPass(array('required' => false)),
      'visible'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'need_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Need', 'required' => false)),
      'help_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Help', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addNeedListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.NeedCategory NeedCategory')
      ->andWhereIn('NeedCategory.need_id', $values)
    ;
  }

  public function addHelpListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.HelpCategory HelpCategory')
      ->andWhereIn('HelpCategory.help_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Category';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'name'      => 'Text',
      'visible'   => 'Boolean',
      'need_list' => 'ManyKey',
      'help_list' => 'ManyKey',
    );
  }
}
