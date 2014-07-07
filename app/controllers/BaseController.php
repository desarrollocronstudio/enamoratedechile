<?php

class BaseController extends Controller {
	public $layout = 'layouts.default';
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
			View::share("tips_categories",TipType::remember(60)->get());
		}
	}

}
