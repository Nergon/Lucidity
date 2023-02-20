<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller {

    public function index() {
        $entries = auth()->user()->entries()->latest()->paginate(30);
        return view('panel.index_new', ['entries' => $entries]);
    }

}
