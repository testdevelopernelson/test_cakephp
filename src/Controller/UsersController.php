<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component\AuthComponent;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function isAuthorized($user){
        if(isset($user['role']) && $user['role'] === 'visitor'){
            // dd('es visitor');
            if(in_array($this->request->action, ['index', 'profile', 'forgotPassword', 'logout', 'view'])){
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        
        if ($this->request->is('post')) {
            $term = $this->request->data['term'];
            $users = $this->Users->find('all' , array(
                'conditions'=>array(
                    'OR'=>array(
                    'name LIKE'=>"%$term%",
                    'email LIKE'=>"%$term%",
                    'mobile LIKE'=>"%$term%",
                    'city LIKE'=>"%$term%",
                    'role LIKE'=>"%$term%",),
                )));
        }else{
            $users = $this->paginate($this->Users);
        }
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            // dd( $this->request->getData());
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('Usuario guardado exitósamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ha ocurrido un error al intentar guardar el usuario');
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('Usuario actualizado exitósamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ha ocurrido un error al intentar guardar el usuario');
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
        if($this->Auth->user('id') == $id){
            $this->Flash->error('No se puede eliminar el usuario que se encuantra logueado actualmente');
            return $this->redirect(['action' => 'index']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('El usuario ha sido eliminado exitósamente');
        } else {
            $this->Flash->error('Ha ocurrido un error al intentar guardar el usuario');
        }

        return $this->redirect(['action' => 'index']);
    }

    public function profile(){
        $id_user = $this->Auth->user('id');
        $user = $this->Users->get($id_user);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('Su perfil ha sido actualizado exitósamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ha ocurrido un error al intentar guardar el usuario');
        }
        $this->set(compact('user'));
    }

    public function forgotPassword(){
        $user =$this->Users->get($this->Auth->user('id')); 
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (!empty($this->request->data)) {  
                $user = $this->Users->patchEntity($user, [  
                        'current_password'  => $this->request->data['current_password'], 
                        'password'     => $user->password, 
                        'new_password' => $this->request->data['new_password'],
                        'confirm_password'     => $this->request->data['confirm_password'] 
                    ],  
                    ['validate' => 'password']  
                );
                $user->password =$this->request->data['new_password'];  
                if ($this->Users->save($user)) {  
                    $this->Flash->success('La contraseña se ha cambiado exitósamente, por favor ingrese con la nueva contraseña'); 
                    return $this->redirect(['action' => 'logout']);
                } else {  
                    $this->Flash->error('Ha ocurrido un error al intentar cambiar la contraseña'); 
                }  
            } 
        }

        $this->set(compact('user'));
    }

    public function login(){
        $this->viewBuilder()->setLayout('login');
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error('Los datos ingresados no son válidos', ['key' => 'auth']);
            }
        }
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }
}

