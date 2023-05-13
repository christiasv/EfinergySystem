<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(Request $request){
        if ($request) {
            $query=trim($request->get('searchText'));
            $user=DB::table('users')->where('name','LIKE','%'.$query.'%')
                ->where('id', '>', 1)
                ->orderBy('id','desc')
                ->paginate(10);

            return view('registros.usuarios.index',["usuarios"=>$user,"searchText"=>$query]);
        }
    }
}
