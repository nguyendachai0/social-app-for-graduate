<?php

namespace App\Http\Controllers;

use App\Services\Home\HomeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use  App\Models\ProfileUser;

class HomeController extends Controller
{
    protected $homeService;
    public function __construct(HomeService  $homeService)
    {
        $this->homeService = $homeService;
    }
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login.view');
        }
        $user = Auth::user();
        $userId = $user->id;
        $data = $this->homeService->getDataForHomePage($userId);
        return response()->json($data);
    }
    public function websocket()
    {
        return view('websocket');
    }
}
