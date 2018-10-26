<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Form\LoginForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

class IndexController extends AbstractActionController
{   
    public function indexAction()
    {
         // Создаем форму.
        $form = new LoginForm();
        
        // Проверяем, является ли пост POST-запросом.
        if ($this->getRequest()->isPost()) {
            
            // Получаем POST-данные.
            $data = $this->params()->fromPost();
            
            // require config file with login/password
            $users = require './module/Application/config/module.config.php';
            
            foreach ($users['login_password'] as $user) {
                if ($user['login'] == $data['login'] && $user['password'] == $data['password']) {
                    // Мы предполагаем, что переменная $sessionManager является экземпляром менеджера сессий.
                    $sessionContainer = new Container('user');
                    $sessionContainer->user = $user;
                    return $this->redirect()->toRoute('admin');
                }
            }
            
            $error = 'Incorrect login and/or password.';
            
            // Визуализируем шаблон представления.
            return new ViewModel([
                'form' => $form,
                'error' => $error
            ]);
            
        }
        
        // Визуализируем шаблон представления.
        return new ViewModel([
            'form' => $form
        ]);
    }
}
