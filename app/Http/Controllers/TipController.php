<?php namespace App\Http\Controllers;

use App\Http\Requests\SubmitTipRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class TipController extends BaseController {


	function __construct()
	{
		$this->middleware('auth',['only' => [
			'save'
		]]);

		$this->middleware('auth.admin',['only' => [
			'active',
		]]);
	}

	public function search($city_name, $lat,$lng){
		$distances = [80];
		$minimum_places = 3;

		$tips = [];
		$distance = 0;
		foreach($distances as $distance){

			$select = "*,IFNULL(((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lng - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344),0) AS `distance`";
			$having = "`distance`<=$distance AND active=true";

			$query = \Tip::selectRaw(\DB::raw($select))
				->havingRaw(\DB::raw($having))
				->orderBy('distance','ASC');
			
			if(\Input::get('cat'))$query->where('type_id',\Input::get('cat'));

			$tips = $query->simplePaginate(6);
			if($tips->count() > $minimum_places)break;
		}


		$city = [
			'name'	=> str_replace('_',' ',$city_name)
		];
		$data = array(
			"tips" 		=> $tips,
			"distance"	=> $distance,
			"city"		=> $city
		);
		return view('tips.list',$data);
	}
	
	public function view($tip_id){
		$tip = \Tip::find($tip_id);
		if(!$tip->active && !is_admin())return \Redirect::route('home');
        if(!$tip)return \Redirect::route("featured");
        $total_reviews = $tip->rating_count;
		return view('tips.view',[
			"tip" 			        => $tip,
            'total_reviews'         => $total_reviews,
            'show_add_route_button' => !$tip->alreadyFavoritedByCurrentUser(),
            'already_voted'         => $tip->alreadyVotedByCurrentUser()
		]);
	}

	public function featured(){
		$tips = \Tip::active()->featured()->simplePaginate(6);
		return view('featured',array("tips" => $tips));
	}

	public function post(){
		$data = array(
			"regions" 		=> \Cache::remember('regions',120,function(){
				\Region::lists("large_name","id");
			}),
			"categories"	=> \Cache::remember('tip_types_list',120,function(){
				return \TipType::lists("name","id");
			}),


		);
		return view('tips.submit',$data);
	}

	public function edit($tip_id){
		$tip = \Tip::findOrFail($tip_id);
		if(!\Auth::check() || (!\Auth::user()->admin && \Auth::user()->id != $tip->author_id))return \Redirect::route('home');

		$isAdmin = (bool)\Auth::user()->admin;

		$data = array(
			"regions" 		=> \Cache::remember('regions',120,function(){
				\Region::lists("large_name","id");
			}),
			"categories"	=> \Cache::remember('tip_types_list',120,function(){
				return \TipType::lists("name","id");
			}),
			'tip'				=> $tip,
			'isEdit'			=> true,
			'canEditPicture'	=> false,
			'canEditState'		=> $isAdmin
		);

		\Session::flashInput([
			'place_name'	=> $tip->name,
			'city_search'	=> $tip->place_name,
			'tip_category'	=> $tip->type_id,
			'description'	=> $tip->content,
			'active'		=> $tip->active
		]);

		return view('tips.edit',$data);
	}

	/**
	 * @param Request $request
	 * @return mixed
     */
	public function save(SubmitTipRequest $request){
		$input = $request->all();
		$input["user_id"] = \Auth::user()->id;

		$tip = new \Tip();
		$tip->name 			= $input["place_name"];
		$tip->city_name		= $input['city'];
		$tip->author_id		= $input["user_id"];
		$tip->content 		= $input["description"];
		$tip->type_id 		= $input["tip_category"];
		$tip->lat 			= $input["place_lat"];
		$tip->lng 			= $input["place_lng"];
		$tip->place_name	= $input["city_search"];
		$tip->image         = "";
		$tip->default_image = $input["default_picture"];
		$tip->active 		= false;
		$tip->code			= str_rand(32);
		if($request->get('image_type') == "custom"){
			$filename = str_rand(12).".".strtolower($request->file("image")->getClientOriginalExtension());
			if($request->file('image')->move(public_path()."/uploads",$filename)){
				$tip->image = $filename;
			}
		}
		$tip->save();
		\Event::fire('tip.registered',[$tip,\Auth::user()]);

		return \Redirect::route('tips.thanks')->with('tip.last_saved', $tip->id);
	}
    public function thanks(SessionManager $session){
        $tip_id = $session->get('tip.last_saved');
        $session->reflash();
        $tip = \Tip::find($tip_id);
        if(!$tip){
            return \Redirect::route('submit_tip_form');
        }
        return view('tips.thanks',[
            "tip" 			=> $tip
        ]);
    }

	public function active($status,$id,$token){

		try{
			$tip = \Tip::withTrashed()->findOrFail($id);
		}catch(Exception $e){
			return 'El tipo no se puede encontrar';
		}

		if($token != $tip->code){
			return 'Unauthorized';
		}

		$final_status = $status=='false'?false:true;
		if($final_status == false){
			$tip->delete();
		}else{
			$tip->restore();
			$tip->active = $final_status;
			$tip->save();
		}

		\Event::fire('tip.change_status',[$tip,$final_status]);

		return 'OK';
	}

	public function update($id){
		$tip = \Tip::findOrFail($id);
		if(!\Auth::check() || (!\Auth::user()->admin && \Auth::user()->id != $tip->author_id))return \Redirect::route('home');

		$isAdmin = (bool)\Auth::user()->admin;


		$tip->name		= \Input::get('place_name');
		$tip->content	= \Input::get('description');
		$tip->type_id	= \Input::get('tip_category');
		$tip->lat		= \Input::get('place_lat');
		$tip->lng		= \Input::get('place_lng');
		$tip->place_name= \Input::get('city_search');
		$tip->city_name= \Input::get('city');
		if(\Input::has('active')){
			$tip->active = \Input::get('active');
		}
		$tip->save();
		if(!$isAdmin)
		{
			\Event::fire('tip.registered',[$tip,\Auth::user()]);
		}

		return \Redirect::route('view-tip',$tip->id);
	}
}
