<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        #$usuario = new UsuarioController();
        #$usuario->index();

        #$usu= UsuarioController::index();
        //$arreglo=["uno","dos","tres"];
        //$datos = ['id'=>$id,
        //          'otroarreglo'=>$arreglo];

        $datos = [
        'personas' => [
                [
                    'id' => 0,
                    'nombre' => 'Ronaldo',
                    'apellido' => 'Mojica'
                ],
                [
                    'id' => 1,
                    'nombre' => 'Anyela',
                    'apellido' => 'Ramirez'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Henry',
                    'apellido' => 'Barrios'
                ]
            ],
        'tipo_documento'=>[
                    ['id'=>1,
                     'sigla'=>'RC'
                    ],
                    ['id'=>2,
                     'sigla'=>'TI'],
                    ['id'=>3,
                     'sigla'=>'CC'],
                    ['id'=>4,
                     'sigla'=>'CE']
                ]
        ];
        return view("inicio",$datos);
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
