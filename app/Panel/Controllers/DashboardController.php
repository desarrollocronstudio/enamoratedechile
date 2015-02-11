<?php  namespace App\Panel\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller {

    public function index()
    {
        return view('panel::dashboard.index');
    }
}