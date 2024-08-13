<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CheckoutDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends BackendBaseController
{

    protected $panel = 'Admin Panel';
    protected $title;
    protected $base_route = 'backend.dashboard';
    protected $view_path = 'backend.dashboard';

    public function __construct(){

    }

    public function index()
    {

        $demo ='hello world';

        $graph['month1'] = CheckoutDetail::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at',Carbon::now()->month)->count();
        $graph['month2'] = CheckoutDetail::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at',Carbon::now()->subMonth(1))->count();
        $graph['month3'] = CheckoutDetail::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at',Carbon::now()->subMonth(2))->count();
        $graph['month4'] = CheckoutDetail::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at',Carbon::now()->subMonth(3))->count();






//        return 'working from index function of dashboardcontroller';
        //calling __loadDataToView function to return data and other variables to respective view page
        return view($this->__loadDataToView($this->view_path), compact('graph'));

    }


}
