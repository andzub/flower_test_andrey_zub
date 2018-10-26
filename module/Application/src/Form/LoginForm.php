<?php
namespace Application\Form;

use Zend\Form\Form;

/**
 * Forms for login and password.
 */
class LoginForm extends Form
{
    public function __construct()
    {
        // Определяем имя формы.
        parent::__construct('login-form');
     
        // Задает для этой формы метод POST.
        $this->setAttribute('method', 'post');
        $this->addElements();
    }
    
    /**
     * Этот метод добавляет элементы к форме (поля ввода и кнопку отправки формы).
     */
    protected function addElements() 
    {
                
        // Добавляем поле "login"
        $this->add([           
            'type'  => 'text',
            'name' => 'login',
            'attributes' => [
                'id' => 'login',
                'class'=>'form-control',
                'placeholder'=>'Login',
                'required' => true,
                'autofocus' => true
            ],
//             'options' => [
//                 'label' => 'Login',
//             ],
        ]);
        
        // Добавляем поле "Password"
        $this->add([
            'type'  => 'password',
            'name' => 'password',
            'attributes' => [                
                'id' => 'password',
                'class'=>'form-control',
                'placeholder'=>'Password',
                'required' => true,
            ],
//             'options' => [
//                 'label' => 'Password',
//             ],
        ]);
        
        // Добавляем кнопку отправки формы
        $this->add([
            'type'  => 'submit',
            'name' => 'submit',
            'attributes' => [                
                'value' => 'Login',
                'id' => 'submitbutton',
                'class' => 'btn btn-lg btn-primary btn-block'
            ],
        ]);
    }
}

