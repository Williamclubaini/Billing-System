<?php 
declare(strict_types = 1);

namespace Validations;

trait Validations {

	protected array $data  = [];
	protected array $error = [];
		
	/**
	 * inputCheck
	 *
	 * @param  string $name
	 * @param  string $ERROR_MESSAGE
	 * @return string
	 */
	private function inputCheck($name, $ERROR_MESSAGE)
	{
		$message = match($name)
		{
			'firstname',
			'surname', 
			'fullname',
			'subject', 
			'message', 
			'location' => $ERROR_MESSAGE,
		};

		return $message;

	}
			
	/**
	 * VALIDATE_STRING
	 *
	 * @param  string $value
	 * @param  string $name
	 * @return array
	 * 
	 */
	protected function VALIDATE_STRING($value, $name)
	{
		if ($value == '' || $value == NULL) {
			
			$ERROR_MESSAGE = "This field cannot be empty.";
			return $this->error[$name] = $this->inputCheck($name, $ERROR_MESSAGE);

		} 
		elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $value)) {

    $ERROR_MESSAGE = "This field cannot contain special character.";
    return $this->error[$name] = $this->inputCheck($name, $ERROR_MESSAGE);

    }
    elseif (is_numeric($value)) {

    $ERROR_MESSAGE = "This field cannot contain a digit.";
    return $this->error[$name] = $this->inputCheck($name, $ERROR_MESSAGE);

    }
    else {

    array_push($this->data, $value);
    return $this->data;
    }
    }

    /**
    * VALIDATE_EMAIL
    *
    * @param string $email
    * @return array
    */
    protected function VALIDATE_EMAIL($email)
    {
    if ($email == '' || $email == NULL) {

    return $this->error['email'] = "Email cannot be empty.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    return $this->error['email'] = "Invalid Email.";
    }
    else {

    array_push($this->data, $email);
    return $this->data;
    }
    }

    /**
    * VALIDATE_CONTACT
    *
    * @param int $contact
    * @return array
    */
    protected function VALIDATE_CONTACT($contact)
    {
    if (!is_numeric($contact)) {

    return $this->error['contact'] = "Invalid phone number.";

    }
    else {

    array_push($this->data, $contact);
    return $this->data;
    }
    }

    /**
    * VALIDATE_PASSWORD
    *
    * @param string $password
    * @return array
    */
    protected function VALIDATE_PASSWORD($password)
    {
    if ($password == '' || $password == NULL) {

    return $this->error['password'] = "Password cannot be empty";

    }
    elseif (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) {

        return $this->error['password'] = "Provide at least one special character(s)";

        } else {

        array_push($this->data, md5($password));
        return $this->data;
        }
        }
        }
        ?>