<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255, 'El máximo permitido es de 255 carácteres')
            ->requirePresence('name', 'create')
            ->notEmptyString('name', 'El nombre es requerido');

        $validator
            ->email('email')
            ->maxLength('email', 255, 'El máximo permitido es de 255 carácteres')
            ->requirePresence('email', 'create')
            ->notEmptyString('email', 'El correo electrónico es requerido')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'El correo electrónico ya se encuentra registrado']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255, 'El máximo permitido es de 255 carácteres')
            ->requirePresence('password', 'create')
            ->notEmptyString('password', 'La contraseña es requerida')
            ->add('password', [
                'compare' => [
                    'rule' => ['compareWith', 'confirm_password'],
                    'message' => 'Las contraseñas no coinciden'
                ]
            ]);
            $validator
            ->scalar('confirm_password')
            ->maxLength('confirm_password', 255, 'El máximo permitido es de 255 carácteres')
            ->requirePresence('confirm_password', 'create')
            ->notEmptyString('confirm_password', 'La contraseña es requerida')
            ->add('confirm_password', [
                'compare' => [
                    'rule' => ['compareWith', 'password'],
                    'message' => 'Las contraseñas no coinciden'
                ]
            ]);
        return $validator;
    }

    public function validationPassword(Validator $validator )                                                                             
    {  
   
        $validator              
            ->notEmptyString('current_password', 'Este campo es requerido')
            ->add('current_password','custom',[  
                'rule'=>  function($value, $context){ 
                    $user = $this->get($context['data']['id']); 
                    if ($user) {  
                        if ((new DefaultPasswordHasher)->check($value, $user->password)) { 
                            return true;  
                        }  
                    }  
                    return false;  
                },  
                'message'=>'La contraseña actual no es correcta', 
            ]);  
   
        $validator 
            ->notEmptyString('new_password', 'Este campo es requerido')
            ->add('new_password',[  
                'match'=>[  
                    'rule'=> ['compareWith','confirm_password'], 
                    'message'=>'Las contraseñas no coinciden', 
                ]  
            ]);  
        $validator 
            ->notEmptyString('confirm_password', 'Este campo es requerido')               
            ->add('confirm_password',[  
                'match'=>[  
                    'rule'=> ['compareWith','new_password'], 
                    'message'=>'Las contraseñas no coinciden', 
                ]  
            ]) ;  
   
        return $validator;  
    }  

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    
}
