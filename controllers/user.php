<?php 
declare(strict_types = 1);

namespace Controllers;

use Validations\Validations;

class User extends Resources{

    use Validations;
    
    public function Login($userType)
    {
        if(isset($_POST['login']))
        {
            $this->VALIDATE_EMAIL($_POST['email']);
            $this->VALIDATE_PASSWORD($_POST['password']);
            
            if (count($this->data) == 2) {
                
                $users = $this->getSpecificData('users', 'userType', $userType);
                $key = array_search($this->data[0], array_column($users, 'email'));

                if(gettype($key) === 'boolean') {

                    $data['error']   = 'Email does not exist!';
                    return $data;
                    
                } else {
                    
                    if($users[$key]->email === $this->data[0] && 
                       $users[$key]->password === $this->data[1]) {

                        sleep(2);

                        if ($userType === 1) {

                            $this->start_session($userType, $this->data[0], 'home');
                        } else {

                            $this->start_session($userType, $this->data[0], 'adminPanel');
                        }
                        
                        
                    } elseif ($users[$key]->email == $this->data[0] &&
                              $users[$key]->password !== $this->data[1]) {
                           
                        $data['error'] = 'Wrong password!';
                        return $data;
                    }
                    
                }
                
            } else {

                return $this->error;
                
            }
        }
    } 
        
    /**
     * register - array of errors and void = successfully register
     *
     * @return array|void
     */
    protected function register()
    {
        if(isset($_POST['register']))
        {
            $this->VALIDATE_STRING(htmlspecialchars($_POST['firstname']), 'firstname');
            $this->VALIDATE_STRING(htmlspecialchars($_POST['surname']), 'surname');
            $this->VALIDATE_EMAIL($_POST['email']);
            $this->VALIDATE_CONTACT($_POST['phone']);
            $this->VALIDATE_STRING(htmlspecialchars($_POST['location']), 'location');
            $this->VALIDATE_PASSWORD($_POST['password']);
            array_push($this->data, 1);
            if (count($this->data) == 7) {
                
                $users = $this->getData('users');
                $key = array_search($this->data[2], array_column($users, 'email'));

                if(gettype($key) === 'boolean') {

                    $column = array('firstname', 'surname', 'email', 'phone', 'location', 'password', 'userType');
                    $query  = $this->Model()->insertInto('users', $column);
                    $this->Model()->execute($query, $this->data);
                    $this->start_session(1, $this->data[2], 'home');
                    
                } else {
                    
                    $data['error'] = 'Email already exist!';
                    return $data;
                }
                
            } else {

                return $this->error;
                
            }
        }
    }
}