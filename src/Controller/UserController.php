<?php
namespace App\Controller;

class UserController extends AppController
{
    public function dashBoard()
    {
        $id_user = $this->getSessionUser();
        $user=empty($id_user)? '' : $this->User->find()->where(['id'=>$id_user])->first();
        if(!empty($user)){
            $this->set('user',$user);
        }
        $this->viewBuilder()->setLayout('user');
        return $this->render('dash_board');
    }

    public function getLogin()
    {
        $this->viewBuilder()->setLayout('login');
        return $this->render('login');
    }

    public function processLogin()
    {
        $email    = $this->request->getData('email');
        $password = md5($this->request->getData('password'));
        $user    = $this->User->find()->where(['email' => $email,'password' => $password])->first();
        if(empty($user))
        {
            $this->set('err',"Sai email hoặc mật khẩu");
            return $this->redirect('/login');
        }
        $session = $this->request->getSession();
        $session->write('id_user', $user['id']);
        return $this->redirect('/');
    }

    public function logOut()
    {
        $session = $this->request->getSession();
        $session->destroy();
        return $this->redirect('/');
    }

    public function register()
    {
        $this->viewBuilder()->setLayout('login');
        $this->render('register');
    }

    public function processRegister()
    {
        try {
            $request=$this->request->getData();
            $full_name = $request['full_name'];
            $email     = $request['email'];
            $password  = md5($request['password']);
            $address   = $request['address'];
            $phone     = $request['phone'];
            $gender    = $request['gender'];

            $adminTable       = $this->getTableLocator()->get('User');
            $admin            = $adminTable->newEmptyEntity();
            $admin->full_name = $full_name;
            $admin->email     = $email;
            $admin->password  = $password;
            $admin->address   = $address;
            $admin->phone     = $phone;
            $admin->gender    = $gender;
            $admin->deleted   = 0;
            $adminTable->save($admin);

            $id_user = $this->User->find()->where(['email'=>$email])->first();
            $session = $this->request->getSession();
            $session->write('id_user',$id_user);
            return $this->redirect('/');
        } catch (\Throwable $th) {
            $this->redirect('/register');
        }
    }


    public function getSessionUser()
    {
        $session = $this->request->getSession();
        return $session->read('id_user');
    }

    public function checkExistEmail()
    {
        $email    = $this->request->getQuery('email');
        $user     = $this->User->find()->where(['email'=>$email])->first();
        $response = false;
        if(!empty($user)){
            $response = true;
        }
        $this->set(['status' => $response]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
