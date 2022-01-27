<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books= User::all();
        if($books == NULL){
            return response()->json([
                'respuesta' => 'No se encuentran libros',
            ]);
        }
        return response($books);
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
                'nombre' => 'required|min:2|max:100',
                'nombre_autor'=>'required|min:2|max:30',
                'fecha_publicacion'=>'required',
                'link'=>'required',
            ],
            [
                'nombre.required'=>'Debes ingresar un nombre',
                'nombre.min'=>'El nombre debe ser de largo mínimo :min',
                'nombre.max'=>'El nombre debe ser de largo máximo :max',
                'nombre_autor.required'=>'Debes ingresar un nombre de autor',
                'nombre_autor.min'=>'El nombre de autor debe ser de largo mínimo :min',
                'nombre_autor.max'=>'El nombre de autor debe ser de largo máximo :max',
                'fecha_publicacion.required'=>'Debe ingresar una fecha de publicacion',
                'link.required'=>'Debe ingresar un link'
            ]
        );
        if ($validator->fails()){
            return response($validator->errors());
        }
        $book=new Book();
        $book->nombre = $request->nombre;
        $book->nombre_autor = $request->nombre_autor;
        $book->fecha_publicacion = $request->fecha_publicacion;
        $book->link = $request->link;
        $book->save();
        return response()->json([
            'message'=>'Se ha creado un nuevo libro',
            'id'=>$book->id
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
        $book = Book::find($id);
        if($book == NULL){
            return response()->json([
                'respuesta' => 'No existe el libro con ese id',
            ]);
        }
        return response($book);
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
                'nombre' => 'required|min:2|max:100',
                'nombre_autor'=>'required|min:2|max:30',
                'fecha_publicacion'=>'required',
                'link'=>'required',
            ],
            [
                'nombre.required'=>'Debes ingresar un nombre',
                'nombre.min'=>'El nombre debe ser de largo mínimo :min',
                'nombre.max'=>'El nombre debe ser de largo máximo :max',
                'nombre_autor.required'=>'Debes ingresar un nombre de autor',
                'nombre_autor.min'=>'El nombre de autor debe ser de largo mínimo :min',
                'nombre_autor.max'=>'El nombre de autor debe ser de largo máximo :max',
                'fecha_publicacion.required'=>'Debe ingresar una fecha de publicacion',
                'link.required'=>'Debe ingresar un link'
            ]
        );
        if ($validator->fails()){
            return response($validator->errors());
        }

        $book= Book::find($id);
        if($book == NULL){
            return "No existe el rol a actualizar";
        }

        $book->nombre = $request->nombre;
        $book->nombre_autor = $request->nombre_autor;
        $book->fecha_publicacion = $request->fecha_publicacion;
        $book->link = $request->link;
        $book->save();
        return response()->json([
            'message'=>'Se ha actualizado el libro',
            'id'=>$book->id
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
        $book = Book::find($id);

        if($book == NULL){
            return "No existe el libro que desea eliminar";
        }
        $book->delete();

        return response()->json([
            "message"=>"Se elimino el libro",
            "id"=>$book->id
        ]);
        
    }
}
