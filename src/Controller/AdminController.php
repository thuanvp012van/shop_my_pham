<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Controller\Component\FlashComponent;
class AdminController extends Controller{

    public function dashBoard()
    {
        $session  = $this->request->getSession();
        $id_admin = $session->read('id_admin');
        $admin=$this->Admin->find()->where(['id'=>$id_admin])->first();
        $this->render('dashboard');
    }

    public function getLogin()
    {
        $this->render('view_login');
    }

    public function processLogin()
    {
        $email    = $this->request->getData('email');
        $password = md5($this->request->getData('password'));
        $admin    = $this->Admin->find()->where(['email' => $email,'password' => $password])->first();
        if(empty($admin))
        {
            $this->set('err','Sai email hoặc mật khẩu');
            return $this->render('view_login');
        }
        $session = $this->request->getSession();
        $session->write('id_admin', $admin['id']);
        return $this->redirect('/');
    }
}
