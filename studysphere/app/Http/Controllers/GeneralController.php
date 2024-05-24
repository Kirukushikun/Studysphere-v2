<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\vlogs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class GeneralController extends Controller
{
    function vlogs(){
        $vlogs = vlogs::findOrFail(1); //ID number
        return view('route1', [
            'vlogs' => $vlogs
        ]);
    }

}
