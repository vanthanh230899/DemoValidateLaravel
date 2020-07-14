<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\Users as UsersResource;
use Illuminate\Database\Console\Migrations\StatusCommand;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  users::all();
        $resourceUser = UsersResource::collection($users);
        return response()->json($resourceUser, Response::HTTP_OK);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new users;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json($user,Response::HTTP_OK);   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lala =  Users::select()->Where('id','=',$id)->get();
        return Response()->json($lala,$status = 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $user)
    {
        $user->update($request->all());
        return Response()->json($request,"200");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $user)
    {
        $user->delete();
    }
}
