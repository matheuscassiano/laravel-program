<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->input('user');
        $pass = $request->input('pass');
        $pass = md5($pass);
        
        $loginUser = DB::table('users')->select('user')->where([['status', '=', '1'],['type_id', '=', '1'],['user', '=', $user],['pass', '=', $pass]])->get();
        $loginPass = DB::table('users')->select('pass')->where([['status', '=', '1'],['type_id', '=', '1'],['user', '=', $user],['pass', '=', $pass]])->get();
        
        if($loginUser = $user)
        {
            $result = "It's Work";
            return $result;
        }

        else
        {
            return $loginUser.' & '.$loginPass;
        }
        
        
        
        /*   $users = User::latest()->paginate(5);
  
        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = $request->input('name');
        $cpf = $request->input('cpf');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $competencias = $request->input('competencias');

        $date = ['name' => $name, 'cpf' => $cpf, 'email' => $email, 'phone' => $phone, 'competencias' => $competencias];

        \DB::table('users')->insert($date);
/*
        $this->validate($request,[
            'name' => 'required|max:255',
            'cpf' => 'required|max:14',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'competencias' => 'required|max:255',
        ]);
        
        User::create($request->all());
   
        return redirect()->route('users.index')->with('success', 'User is successfully saved');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $user)
    {
        if($user != 'admin')
        {
            return 'acces danied';
        }
        else
        {
            $users = DB::table('users')->select('name','cpf', 'email','phone','competencias','status', 'date_time')->orderBy('name')->get();
            return $users;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cpf)
    {
        \DB::table('users')->where([['status', '=', '0'],['cpf', '=', $cpf]])->update(['status' => 1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
