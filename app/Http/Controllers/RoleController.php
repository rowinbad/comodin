<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        if($roles == NULL){
            return response()->json([
                'respuesta' => 'No se encuentran roles',
            ]);
        }
        return response($roles);
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
        
        $validator = Validator::make(
            $request->all(),[
                'tipo' => 'required|min:2|max:20',
            ],
            [
                'tipo.required' => 'Debes ingresar el tipo',
                'tipo.min' => 'El tipo debe ser de largo mínimo :min',
                'tipo.max' => 'El tipo debe ser de largo máximo :max',
            ]
        );
        if ($validator->fails()){
            return response($validator->errors());
        }
        $role=new Role();
        $role->tipo = $request->tipo;
        $role->save();
        return response()->json([
            'message'=>'Se ha creado un nuevo rol',
            'id'=>$role->id
        ], 200);
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
        $roles = Role::find($id);
        if($roles == NULL){
            return response()->json([
                'respuesta' => 'No existe el rol con ese id',
            ]);
        }
        return response($roles);
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
        $validator = Validator::make(
            $request->all(),[
                'tipo' => 'required|min:2|max:20',
            ],
            [
                'tipo.required' => 'Debes ingresar el tipo',
                'tipo.min' => 'tipo debe tener minimo 2 caracteres',
                'tipo.max' => 'tipo no puede superar 20 caracteres',
            ]
        );
        if ($validator->fails()){
            return response($validator->errors());
        }

        $role= Role::find($id);
        if($role == NULL){
            return "No existe el rol a actualizar";
        }

        $role->tipo = $request->tipo;
        $role->save();
        return response()->json([
            'message'=>'Se ha actualizado el rol',
            'id'=>$role->id
        ], 201);

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
        $role = Role::find($id);

        if($role == NULL){
            return "No existe el rol que desea eliminar";
        }
        $role->delete();

        return response()->json([
            "message"=>"Se elimino el rol",
            "id"=>$role->id
        ]);
        
    }
}
