<?php
namespace Admin\Controller;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

class IndexController extends AbstractActionController
{
    /** 
     * Переопределяем метод родительского класса onDispatch(),
     * чтобы установить альтернативный лэйаут для всех действий в этом контроллере.
     */
    public function onDispatch(MvcEvent $e) 
    {
        // Вызываем метод базового класса onDispatch() и получаем ответ
        $response = parent::onDispatch($e);        
	
        // Устанавливаем альтернативный лэйаут
        $this->layout()->setTemplate('layout-admin/layout-admin');                
	
        // Возвращаем ответ
        return $response;
    }
    
    public function indexAction()
    {
        $sessionContainer = new Container('user');
        if(empty($sessionContainer->user)) {
            return $this->redirect()->toRoute('home');
        }
        
        return new ViewModel();
    }
    
    public function logoutAction()
    {
        $sessionContainer = new Container('user');
        unset($sessionContainer->user);
        
        return $this->redirect()->toRoute('home');
    }
}
