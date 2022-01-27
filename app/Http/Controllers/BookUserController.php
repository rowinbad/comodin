<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookUser;
use Illuminate\Support\Facades\Validator;

class BookUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookUsers = BookUser::all();
        if($bookusers == NULL){
            return response()->json([
                'respuesta' => 'BookUser no encontrado',
            ]);
        }
        return response($bookUsers);
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
                'id_libro' => 'required',
                'id_usuario' => 'required'
            ],
            [
                'id_libro.required' => 'Debes ingresar el id del libro',
                'id_usuario.required' => 'Debes ingresar el id del usuario'
            ]
        );
        if ($validator->fails()){
            return response($validator->errors());
        }
        $bookUser=new BookUser();
        $bookUser->id_libro = $request->id_libro;
        $bookUser->id_usuario = $request->id_usuario;
        $bookUser->save();
        return response()->json([
            'message'=>'Se ha creado un nuevo BookUser',
            'id'=>$bookUser->id
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
        $bookUser = BookUser::find($id);
        if($bookUser == NULL){
            return response()->json([
                'respuesta' => 'No existe el BookUser con ese id',
            ]);
        }
        return response($bookUser);
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
                'id_libro' => 'required',
                'id_usuario' => 'required'
            ],
            [
                'id_libro.required' => 'Debes ingresar el id del libro',
                'id_usuario.required' => 'Debes ingresar el id del usuario'
            ]
        );
        if ($validator->fails()){
            return response($validator->errors());
        }

        $bookUser= BookUser::find($id);
        if($bookUser == NULL){
            return "No existe el BookUser a actualizar";
        }

        $bookUser->id_libro = $request->id_libro;
        $bookUser->save();
        return response()->json([
            'message'=>'Se ha actualizado el BookUser',
            'id'=>$bookUser->id
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
        $bookUser = BookUser::find($id);

        if($bookUser == NULL){
            return "No existe el BookUser que desea eliminar";
        }
        $bookUser->delete();

        return response()->json([
            "message"=>"Se elimino el BookUser",
            "id"=>$bookUser->id
        ]);
        
    }
}
