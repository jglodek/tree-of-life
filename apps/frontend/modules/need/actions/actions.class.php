<?php

/**
 * need actions.
 *
 * @package    Tree-of-Life
 * @subpackage need
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class needActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->needs = Doctrine_Core::getTable('Need')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->need = Doctrine_Core::getTable('Need')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->need);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new NeedForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new NeedForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($need = Doctrine_Core::getTable('Need')->find(array($request->getParameter('id'))), sprintf('Object need does not exist (%s).', $request->getParameter('id')));
    $this->form = new NeedForm($need);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($need = Doctrine_Core::getTable('Need')->find(array($request->getParameter('id'))), sprintf('Object need does not exist (%s).', $request->getParameter('id')));
    $this->form = new NeedForm($need);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($need = Doctrine_Core::getTable('Need')->find(array($request->getParameter('id'))), sprintf('Object need does not exist (%s).', $request->getParameter('id')));
    $need->delete();

    $this->redirect('need/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $need = $form->save();

      $this->redirect('need/edit?id='.$need->getId());
    }
  }
}
