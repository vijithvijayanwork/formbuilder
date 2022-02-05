<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Forms;
use App\Models\Base;

class HomeController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    private $base;

    public function __construct(Base $base) {
        $this->base = $base;
        $this->middleware('guest')->except('logout');
    }

    public function home() {

        $home = '';
        return view('home', compact('home'));
    }

    public function login() {

        $login = '';

        return view('login', compact('login'));
    }

    public function forms() {

        $forms = Forms::orderBy('id', 'desc')
                ->get();

        return view('forms', compact('forms'));
    }

}
