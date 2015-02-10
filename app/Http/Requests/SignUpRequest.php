<?php namespace App\Http\Requests;


class SignUpRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return !\Auth::check();
	}

	public function validator($validator){
		$this->merge([
			'rut'	=> \Rut::normalize($this->get('rut')),
		]);

		$fb = init_facebook();
		$user = $fb->getUser();

		if($user)
		{
			$this->merge([
				'fbid'	=> '$user'
			]);
		}

		return $validator->make($this->all(),$this->rules(),$this->messages());
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' 		=> 'required|min:3',
			'email'		=> 'required|email|unique:people,email',
			'rut'		=> 'required|cl_rut|unique:people,dni',
			'password'	=> 'required|confirmed',
			'fbid'		=> 'unique:people,fbid'
		];
	}

	public function messages(){


		return [
			"name.required" 	=> "Debes indicar tu nombre",
			"email.required"	=> "Debes indicar tu email",
			"email.email"	    => "Debes indicar un email válido",
			"email.unique"	    => "El email ingresado ya está registrado",
			"rut.required"		=> "Debes indicar tu R.U.T.",
			'password.required'	=> 'Debe ingresar una contraseña',
			"password.confirmed"=> "Las contraseñas ingresadas no coinciden",
			"cl_rut"			=> "El R.U.T. ingresado es inválido",
			"rut.unique"		=> "El R.U.T. ingresado ya está registrado",
		];
	}

}
