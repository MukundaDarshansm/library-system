<?php
namespace Modules\Library\app\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return view('library::dashboards.admin');
        }
        return view('library::dashboards.user');
    }
}
