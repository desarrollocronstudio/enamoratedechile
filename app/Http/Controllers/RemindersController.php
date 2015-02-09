<?php namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

class RemindersController extends BaseController {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return \View::make('password.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		$response = \Password::sendResetLink( ["dni_type"=>"rut","dni" => \Rut::normalize(\Input::only('rut'))],function($message){
			$message->subject('Recupera tu contraseña');
		});
		switch ($response)
		{
			case \Password::INVALID_USER:
				if(\Request::ajax()){                  	
					return \Response::json(['status' => false]);
				}
				return \Redirect::back()->with('error', Lang::get($response));

			case 'passwords.sent':
				if(\Request::ajax()){                  	
					return \Response::json(['status' => true]);
				}
				return \Redirect::back()->with('status', Lang::get($response));
		}
		
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) \App::abort(404);

		return \View::make('password.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{

		$credentials = \Input::only(
			'password', 'password_confirmation', 'token'
		);
		$credentials['dni_type'] = 'rut';
		$credentials['dni'] = \Rut::normalize(\Input::get("rut"));

		$user_id = false;
		$response = \Password::reset($credentials, function($user, $password) use ($user_id)
		{
			
			$user->password = \Hash::make($password);
			$user_id = $user->id;
			$user->save();
			\Auth::loginUsingId($user_id);
		});

		switch ($response)
		{
			case 'passwords.password':
				return \Redirect::back()->with('error', 'La contraseña ingresada no es válida')->withInput();
			case 'passwords.token':
				return \Redirect::back()->with('error', 'El código de autorización para cambiar tu contraseña expiró. Comienza el proceso de recuperación nuevamente.')->withInput();
			case 'passwords.user':
				return \Redirect::back()->with('error', 'No pudimos reestablecer tu contraseña. Intenta nuevamente. Revisa tu R.U.T.')->withInput();

			case 'passwords.reset':
				return \Redirect::to("/");
		}
	}

}
