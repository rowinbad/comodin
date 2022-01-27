<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        if($users == NULL){
            return response()->json([
                'respuesta' => 'No se encuentran usuarios',
            ]);
        }
        return response($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),
            [
                'nombre'=>'required|min:4|max:30|unique:users,nombre',
                'password' => [
                    'required',
                    'string',
                    'min:10',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                ],
                'id_rol'=>'required',
                'edad'=>'required',
                'email'=>'required|unique:users,email',
                
            ],
            [
                'nombre.required'=>'Debes ingresar un nombre',
                'nombre.min'=>'El nombre debe ser de largo mínimo :min',
                'nombre.max'=>'El nombre debe ser de largo máximo :max',
                'password.required'=>'Debe ingresar una contraseña',
                'password.regex'=>'La contraseña debe cumplir el formato',
                'edad.required'=>'Debe ingresar una edad',
                'email.required'=>'Debe ingresar un correo electronico',
                'email.unique'=>'El correo electronico ya existe',
                'id_rol.required'=>'Debe seleccionar un rol'
            ]
        );
        if ($validator->fails()){
            return response($validator->errors());
        }
        $user=new User();
        $user->nombre = $request->nombre;
        $user->password = $request->password;
        $user->edad = $request->edad;
        $user->id_rol = $request->id_rol;
        $user->email = $request->email;
        $user->save();
        return response()->json([
            'message'=>'Se ha creado un nuevo usuario',
            'id'=>$user->id
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        if($user == NULL){
            return response()->json([
                'respuesta' => 'No existe el usuario con ese id',
            ]);
        }
        return response($user);
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
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(),
            [
                'nombre'=>'required|min:4|max:30|unique:users,nombre',
                'password' => [
                    'required',
                    'string',
                    'min:10',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                ],
                'id_rol'=>'required',
                'edad'=>'required',
                'email'=>'required|unique:users,email',
                
            ],
            [
                'nombre.required'=>'Debes ingresar un nombre',
                'nombre.min'=>'El nombre debe ser de largo mínimo :min',
                'nombre.max'=>'El nombre debe ser de largo máximo :max',
                'password.required'=>'Debe ingresar una contraseña',
                'password.regex'=>'La contraseña debe cumplir el formato',
                'edad.required'=>'Debe ingresar una edad',
                'email.required'=>'Debe ingresar un correo electronico',
                'email.unique'=>'El correo electronico ya existe',
                'id_rol.required'=>'Debe seleccionar un rol'
            ]
        );
        if ($validator->fails()){
            return response($validator->errors());
        }
        $user= User::find($id);
        if($user == NULL){
            return "No existe el usuario a actualizar";
        }

        $user->nombre = $request->nombre;
        $user->password = $request->password;
        $user->edad = $request->edad;
        $user->id_rol = $request->id_rol;
        $user->email = $request->email;
        $user->save();
        return response()->json([
            'message'=>'Se ha actualizado el usuario',
            'id'=>$user->id
        ], 200);
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
        $user = User::find($id);

        if($user == NULL){
            return "No existe el usuario que desea eliminar";
        }
        $user->delete();

        return response()->json([
            "message"=>"Se elimino el usuario",
            "id"=>$user->id
        ]);
    }
}
