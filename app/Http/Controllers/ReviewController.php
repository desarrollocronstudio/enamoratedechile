<?php namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;


class ReviewController extends BaseController {

	public function save($id)
	{
		if(!\Auth::check()){
			return \Response::json([
				'status' 	=> false,
				'msg'		=> "Debes iniciar sesión o registrarte."
			]);
		}
		$exists = \Review::where("author_id",\Auth::user()->id)->where('tip_id',$id)->first();
		if($exists){
			return \Response::json([
				'status' 	=> true,
				'msg'		=> "Ya has calificado este tip anteriormente. Intenta calificar otro."
			]);
		}

		$input = array(
			'rating'  => Input::get('rating')
		);
		// instantiate Rating model
		$review = new Review;

		// Validate that the user's input corresponds to the rules specified in the review model
		$validator = \Validator::make( $input, array('rating' => 'integer|min:1|max:5'));

		// If input passes validation - store the review in DB, otherwise return to product page with error message 
		if ($validator->passes()) {
			$review->storeReviewForTip($id, \Auth::user()->id,'', $input['rating']);
			if(\Request::ajax()){                              
				return \Response::json([
					'status' 	=> true,
					'msg'		=> "Calificación agregada satisfactoriamente"
				]);
			}
			return Redirect::to(route('view-tip',$id).'#reviews-anchor')->with('review_posted',true);
		}

		if(\Request::ajax()){                              
			return \Response::json([
				'status' 	=> false,
				'msg'		=> "No se pudo guardar la calificación. Intante más tarde.",
			]);
		}
		return Redirect::to(route('view-tip',$id).'#reviews-anchor')->withErrors($validator)->withInput();
	}

}
