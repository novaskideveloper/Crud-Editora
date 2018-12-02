<?php

namespace App\Http\Controllers\Categoria;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;



class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        
        
        return view('categoria.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = array(
            
           'nome_categoria' => 'max:255|required',
        );
        
        $validator = Validator::make($request->all(), $rules);
        
       
        if ($validator->fails()) {
            
            return Redirect::to('/categoria/create')
                ->withErrors($validator);
        }
        
        
        
        $categoria = Categoria::create([
            
            'title' => $request->nome_categoria,
        ]);
        
        
            
         
        Session::flash('message','Cadastrado com sucesso!');
        return Redirect::to('categoria');
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
        $categoria = Categoria::find($id);
        return view('categoria.edit',compact('categoria'));
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
         $rules = array(
            
           'nome_categoria' => 'max:255|required',
        );
        
        $validator = Validator::make($request->all(), $rules);
        
       
        if ($validator->fails()) {
            
            return Redirect::to('/categoria/create')
                ->withErrors($validator);
        }
        
       $categoria = Categoria::find($id);
       $categoria->title = $request->nome_categoria;
       
       $categoria->save();
       
       Session::flash('message','Atualizado com sucesso');
       return Redirect::to('/categoria');
       
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $verificar = (new Categoria)->LivroCategoria($id);
        $existe_dado = count($verificar);
        
        if($existe_dado <= 0){
            
            Categoria::destroy($id);
            
            Session::flash('message','Excluído com sucesso');
            return Redirect::to('categoria');
            
        }else{
            return Redirect::back()->withErrors('Existe livro com está categoria por favor, primeiro apague o livro!');
            
            
            
        }
    }
}
