<?php

namespace App\Controller;

use Cake\Controller\Component\FlashComponent;
use Cake\ORM\TableRegistry;

class AdminController extends AppController{

    public function dashBoard()
    {
        $id_admin=$this->getSessionAdmin();
        if($id_admin >= 1)
        {
            $this->render('dashboard');
        }
        else{
            return $this->redirect('/admin/login');
        }
    }

    public function getLogin()
    {
        $this->viewBuilder()->setLayout('login');
        $this->render('view_login');
    }

    public function processLogin()
    {
        $email    = $this->request->getData('email');
        $password = md5($this->request->getData('password'));
        $admin    = $this->Admin->find()->where(['email' => $email,'password' => $password])->first();
        if(empty($admin))
        {
            $this->set('err',"Sai email hoặc mật khẩu");
            return $this->redirect('/admin/login');
        }
        $session = $this->request->getSession();
        $session->write('id_admin', $admin['id']);
        $session->write('full_name', $admin['full_name']);
        $session->write('avatar', $admin['avatar']);
        return $this->redirect('/admin');
    }

    public function profile()
    {
        $id_admin=$this->getSessionAdmin();
        $admin = $this->Admin->find()->where(['id'=>$id_admin])->first();
        $this->set('admin',$admin);
        return $this->render('profile');
    }

    public function updateProfile()
    {
        try {
            $profile    = $this->request->getData();
            $AdminTable = TableRegistry::getTableLocator()->get('Admin');
            $admin      = $AdminTable->get($profile['id_admin']);
            $file       = $profile['avatar'];
            $extFile    = pathinfo($profile['avatar']->getclientFilename(),PATHINFO_EXTENSION);
            $path_img   = WWW_ROOT."images\avatar";
            if($file!='' )
            {
                if(in_array(strtolower($extFile),['jpg','png','jpeg','gif']))
                {
                    if(!file_exists($path_img))
                    {
                        mkdir($path_img, 0755, true);
                    }

                    $date=date('Ymd');
                    $filename=$date."_".uniqid().".".$extFile;
                    $targetFile = WWW_ROOT."images\avatar".DS.$filename;
                    $file->moveTo($targetFile);
                    if(file_exists($path_img.DS.$admin->avatar))
                    {
                        $oldImage = WWW_ROOT."images\avatar".DS.$admin->avatar;
                        unlink($oldImage);
                    }
                }
            }

            //change profile
            $admin->avatar = !empty($filename) ? $filename : $admin->avatar;
            $admin->full_name = $profile['full_name'];
            $admin->phone     = $profile['phone'];
            $admin->gender    = $profile['gender'];
            $AdminTable->save($admin);
            return $this->redirect('/admin/profile');
        } catch (\Throwable $th) {
            return $this->redirect('/admin/profile');
        }
    }

    public function getSessionAdmin()
    {
        $session  = $this->request->getSession();
        return $session->read('id_admin');
    }

    public function checkExistEmail()
    {
        $email = $this->request->getQuery('email');
        $admin = $this->Admin->find()->where(['email'=>$email])->first();
        $response = false;
        if(!empty($admin)){
            $response = true;
        }
        $this->set(['status' => $response]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
