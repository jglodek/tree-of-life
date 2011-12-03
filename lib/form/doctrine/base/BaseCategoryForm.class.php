<?php

/**
 * Category form base class.
 *
 * @method Category getObject() Returns the current form's model object
 *
 * @package    Tree-of-Life
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'name'      => new sfWidgetFormInputText(),
      'visible'   => new sfWidgetFormInputCheckbox(),
      'need_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Need')),
      'help_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Help')),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'visible'   => new sfValidatorBoolean(array('required' => false)),
      'need_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Need', 'required' => false)),
      'help_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Help', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['need_list']))
    {
      $this->setDefault('need_list', $this->object->Need->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['help_list']))
    {
      $this->setDefault('help_list', $this->object->Help->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveNeedList($con);
    $this->saveHelpList($con);

    parent::doSave($con);
  }

  public function saveNeedList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['need_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Need->getPrimaryKeys();
    $values = $this->getValue('need_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Need', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Need', array_values($link));
    }
  }

  public function saveHelpList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['help_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Help->getPrimaryKeys();
    $values = $this->getValue('help_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Help', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Help', array_values($link));
    }
  }

}
