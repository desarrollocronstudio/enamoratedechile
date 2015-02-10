<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SubmitTipRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'place_name'	=> 'required',
			'image_type'    => 'required',
			'city'		    => 'required',
			'tip_category'	=> 'required',
			'default_picture' => 'required_if:image_type,default|integer|min:0|max:1',
			'image'			=> 'required_if:image_type,custom|image'
		];
	}

	public function messages(){
		return [
			'place_name.required'		=> 'Debes indicar un nombre para tu dato',
			"city.required" 			=> "Debes seleccionar una ciudad. ¿Donde es tu dato?",
			'tip_category.required'		=> "Debes indicar una categoría para tu dato",
			"default_picture.required_if"=> "Debes seleccionar una imagen para tu dato",
			"image_type.required"       => "Debes seleccionar el tipo de imagen que necesitas",
			'image.required_if'   		=> "Debes subir una imagen",
			'image.image'               => "Debes subir una imagen, no otro tipo de archivo",
		];
	}

}
