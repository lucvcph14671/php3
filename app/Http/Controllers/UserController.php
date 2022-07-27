<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Http\Requests\UserUpdatearequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        return view('admin.user.list', [
            'db' => User::orderBy('created_at','DESC')->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.form', [

            'room' => Room::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6|max:32',
            'email' => 'required|min:6|max:32|email',
            'avatar' => 'file',
            'birthday' => 'required|date',

        ]);


       $user = new User();
       $user->fill($request->all());
       if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username. '_' . $avatarName;
            $user->avatar = $avatar->storeAs('images/user', $avatarName);
       }else{

        $user->avatar ='';

       }
       $user->save();

       return redirect()->route('admin.user.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.user.form_show', [

            'room' => Room::all(),
            'user'=> User::find($id),
        ]);
    }

    public function status($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->fill($request->all());
        if($request->hasFile('avatar')){
             $avatar = $request->avatar;
             $avatarName = $avatar->hashName();
             $avatarName = $request->username. '_' . $avatarName;
             $user->avatar = $avatar->storeAs('images/user', $avatarName);
        }else{
 
         $user->avatar = $user->avatar;
 
        }
        $user->save();
 
        return redirect()->route('admin.user.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id){

            if( User::destroy($id) ){

                return redirect()->back();
            }
            
        }
        
    }
}
