<?php namespace App\Panel\Controllers;

use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TipController extends Controller {


	/**
	 * @var \Tip
	 */
	private $tip;

	function __construct(\Tip $tip)
	{

		$this->tip = $tip;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tips = $this->tip->all();

		return view('panel::tips.index',compact('tips'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \Tip $tip
	 * @return Response
	 */
	public function destroy(\Tip $tip)
	{
		$tip->delete();
		return redirect()->back()->with('message',['message' => 'Tip "'.$tip->name.'" eliminado satisfactoriamente','status' => 'success']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	public function activate(\Tip $tip){
		$tip->active = true;
		$tip->save();

		\Event::fire('tip.change_status',[$tip,true]);

		return redirect()->back()->with('message',['message' => 'Tip "'.$tip->name.'" activado satisfactoriamente','status' => 'success']);
	}

	public function deactivate(\Tip $tip){
		$tip->active = false;
		$tip->save();

		\Event::fire('tip.change_status',[$tip,false]);

		return redirect()->back()->with('message',['message' => 'Tip "'.$tip->name.'" desactivado satisfactoriamente','status' => 'success']);
	}
}
