<?php

/**
 * help actions.
 *
 * @package    Tree-of-Life
 * @subpackage help
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class helpActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->helps = Doctrine_Core::getTable('Help')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->help = Doctrine_Core::getTable('Help')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->help);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new HelpForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new HelpForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($help = Doctrine_Core::getTable('Help')->find(array($request->getParameter('id'))), sprintf('Object help does not exist (%s).', $request->getParameter('id')));
    $this->form = new HelpForm($help);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($help = Doctrine_Core::getTable('Help')->find(array($request->getParameter('id'))), sprintf('Object help does not exist (%s).', $request->getParameter('id')));
    $this->form = new HelpForm($help);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($help = Doctrine_Core::getTable('Help')->find(array($request->getParameter('id'))), sprintf('Object help does not exist (%s).', $request->getParameter('id')));
    $help->delete();

    $this->redirect('help/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $help = $form->save();

      $this->redirect('help/edit?id='.$help->getId());
    }
  }
}
