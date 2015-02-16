<?php  namespace App\Stats\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StatController extends Controller{
    protected $reports = [
        'tips_per_category' => 'Tips por categoría',
        'tips_per_city' => 'Tips por ciudad',
    ];

    public function index(\Tip $tip)
    {

        $reports = $this->reports;

        $total_tips = $tip->count();

        return view('panel.stats::home',compact('reports','total_tips'));
    }

    public function generate(Request $request)
    {
        switch($request->get('type'))
        {
            case 'tips_per_category':
                return $this->getTipsPerCategory($request);
                break;
            case 'tips_per_city':
                return $this->getTipsPerCity($request);
                break;
        }


        return view('panel.stats::report',compact('start','end','data','headers','title'));
    }

    private function getTipsPerCategory(Request $request)
    {
        $tips = \Tip::join('tips_categories as tc','tips.type_id','=','tc.id')->select('tc.name')->selectRaw('count(*) as total')->groupBy('tc.id')->orderBy('total','DESC');;
        if($request->get('daterange'))
        {
            list($start, $end) = $this->parseDateRange($request->get('daterange'));
            $tips->where('created_at','>=',$start->format('Y/m/d'));
        }


        $data = $tips->get()->toArray();

        $headers = ['Categoría','Número de tips',];
        $title = 'Tips por categoría';
        $cols = 6;

        return view('panel.stats::report',compact('start','end','data','headers','title','cols'));
    }

    /**
     * @param $range
     * @return Carbon[]
     */
    private function parseDateRange($range)
    {
        list($start, $end) = explode(' - ', $range);
        $start = Carbon::createFromFormat('Y/m/d', $start);
        $end = Carbon::createFromFormat('Y/m/d', $end);
        return array($start, $end);
    }

    private function getTipsPerCity($request)
    {
        $tips = \Tip::select('tips.city_name')->selectRaw('count(*) as total')->groupBy('tips.city_name')->orderBy('total','DESC');
        if($request->get('daterange'))
        {
            list($start, $end) = $this->parseDateRange($request->get('daterange'));
            $tips->where('created_at','>=',$start->format('Y/m/d'));
        }


        $data = $tips->get()->toArray();

        $headers = ['Categoría','Número de tips',];
        $title = 'Tips por categoría';
        $cols = 6;

        return view('panel.stats::report',compact('start','end','data','headers','title','cols'));
    }
}