<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;
use Cake\Mailer\Transport\MailTransport;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $errors = $user->getErrors();
            foreach ($errors as $field => $error) {
                foreach ($error as $message) {
                    $this->Flash->error(__("Error in {$field}: {$message}"));
                }
            }
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        // $user = $this->Users->get($id);
        if ($this->Users->softDelete($id)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'reset']);
    }


    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            // redirect to /manuals after login success
            // $redirect = $this->request->getQuery('redirect', [
            //     'controller' => 'Manuals',
            //     'action' => 'index',
            // ]);
            return $this->redirect('/manual');
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }


    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();

            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function reset()
    {
        $this->request->allowMethod(['get', 'post']);
        $email = $this->request->getData('email');
        if ($email) {
            $user = $this->Users->find()->where(['email' => $email])->first();

            //kiem tra co email da duoc dang ky
            if (!$user) {
                $this->Flash->error(__('Sai email'));
            }

            // ham tao token
            $token = $this->_createResetPasswordToken();
            $resetPwdData = [

            ];
            //kiem tra email da co token chua
            $pwdResetId = $this->fetchTable('password_resets')->find();
            
            // ham gui email
            
            // $this->sendEmail();
        }
    }

    protected function _createResetPasswordToken(){
        $token = 'abcdsade';
        return $token;
    }

    public function sendEmail()
    {
        $mailer = new Mailer('default');
        $mailer->setFrom(['noreply@example.com' => 'Your App'])
            ->setTo('test@example.com')
            ->setSubject('Test Email')
            ->deliver('This is a test email sent from CakePHP using Mailtrap.');
    }

    // public function beforeFilter(\Cake\Event\EventInterface $event)
    // {
    //     parent::beforeFilter($event);
    //     $this->Authentication->addUnauthenticatedActions(['login']);
    // }

    // public function login()
    // {
    //     $this->request->allowMethod(['get', 'post']);
    //     $errors = $this->validateLogin();
    //     if ($errors) {
    //         $this->set(compact('errors'));
    //         return ;
    //     }

    //     $result = $this->Authentication->getResult();
    //     if ($result && $result->isValid()) {
    //         return $this->redirect("/");
    //     }

    //     if ($this->request->is('post') && !$result->isValid() && empty($errors)) {
    //         $this->Flash->error(
    //             "メールアドレス、またはパスワードが間違っています。"
    //         );
    //     }
    // }

    // private function validateLogin()
    // {
    //     $validator = new Validator();
    //     $validator
    //         ->email('email', false, 'メール形式が正しくありません。')
    //         ->notEmptyString('email', "メールアドレスを入力してください。");
    //     $validator
    //         ->notEmptyString('password', "パスワードを入力してください。");

    //     return $errors = $validator->validate($this->request->getData());
    // }



    // public function initialize(): void
    // {
    //     parent::initialize();
    //     $this->viewBuilder()->setLayout('guest_layout');
    // }

    // public function beforeFilter(\Cake\Event\EventInterface $event)
    // {
    //     parent::beforeFilter($event);
    //     $this->Authentication->addUnauthenticatedActions(['create', 'store']);
    // }

    // public function create()
    // {
    //     if ($this->Authentication->getIdentity()) {
    //         return $this->redirect('/');
    //     }

    //     return $this->render('login');
    // }

    // public function store()
    // {
    //     // Validate request
    //     $errors = $this->validateLogin();

    //     if ($errors) {
    //         $this->set(compact('errors'));

    //         return $this->render('login');
    //     }

    //     // Kiem tra neu bi xoa roi thi khong cho dang nhap
    //     // Check user is soft deleted
    //     // $user = $result->getData();
    //     // if ($user->deleted) {
    //     //     $this->Authentication->logout(); // Force soft deleted user logout

    //     //     return $this->flashError();
    //     // }

    //     // Check user record
    //     $result = $this->Authentication->getResult();
    //     dd($result);
    //     if (! $result || ! $result->isValid()) {
    //         return $this->flashError();
    //     }

    //     // Login success
    //     return $this->redirect('/'); // Success login
    // }

    // private function flashError()
    // {
    //     $this->Flash->error(
    //         'メールアドレス、またはパスワードが間違っています。'
    //     );

    //     return $this->render('login');
    // }

    // private function validateLogin()
    // {
    //     $validator = new Validator;
    //     $validator
    //         ->email('email', false, 'メール形式が正しくありません。')
    //         ->notEmptyString('email', 'メールアドレスを入力してください。');
    //     $validator
    //         ->notEmptyString('password', 'パスワードを入力してください。');

    //     return $validator->validate($this->request->getData());
    // }
}
