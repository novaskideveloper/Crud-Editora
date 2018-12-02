<?php

namespace App\Http\Controllers\Livro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Categoria;
use App\Livro;
use App\LivroCategoria;
use App\PalavraChave;
use Redirect;
use Session;
class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $livros = (new Livro)->pegarLivroCategoria();
    
       
       return view('livro.index',compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $categoria = Categoria::all();
        foreach($categoria as $cat){ $categoria_id[$cat->id] = $cat->title; }
        
        
      return view('livro.create',compact('categoria_id'));
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
            
           'name_livro' => 'max:255|required',
           'isbn' => 'max:255|required|unique:livro,isbn',
           'description' => 'max:255|required',
           'price' => 'max:255|required',
        );
        
        $validator = Validator::make($request->all(), $rules);
        
       
        if ($validator->fails()) {
            
            return Redirect::to('/livro/create')
                ->withErrors($validator);
        }
        
        $livro = Livro::create([
            'title'=>$request->name_livro,
            'isbn'=>$request->isbn,
            'description'=>$request->description,
            'price'=>$request->price,
            ]);
            
            
            $palavra_chave = PalavraChave::create([
                
            'title'=>$request->palavra_chave,
            'livro_id'=>$livro->id,
            
            
            ]);
            
        $livro_categoria = LivroCategoria::create([
            
            'livro_id'=>$livro->id,
            'category_id'=>$request->categoria,
            ]) ;  
            
        
        Session::flash('message','Cadastrado com sucesso');
        return Redirect::to('/livro');
        
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
        $livro = Livro::find($id);
        $livro_categoria = LivroCategoria::where('livro_id','=',$id)->get()->first();
        $categoria = Categoria::all();
        foreach($categoria as $cat){ $categoria_id[$cat->id] = $cat->title; }
        $palavra_chave = PalavraChave::where('livro_id','=',$id)->get()->first();
        return view('livro.edit',compact('livro','livro_categoria','categoria_id','palavra_chave'));
        
        
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
            
           'name_livro' => 'max:255|required',
           'isbn' => 'max:255|required',
           'description' => 'max:255|required',
           'price' => 'max:255|required',
        );
        
        $validator = Validator::make($request->all(), $rules);
        
       
        if ($validator->fails()) {
            
            return Redirect::to('/livro')
                ->withErrors($validator);
        }
        $livro = Livro::find($id);
        $livro->title = $request->name_livro;
        $livro->isbn =  $request->isbn;
        $livro->description = $request->description;
        $livro->price =  $request->price;
        $livro->save();
        
         $livro_categoria = LivroCategoria::where('livro_id','=',$id)->get()->first();
         $livro_categoria->category_id = $request->categoria;
         $livro_categoria->save();
         
           $palavra_chave = PalavraChave::where('livro_id','=',$id)->get()->first();
           $palavra_chave->title = $request->palavra_chave;
           $palavra_chave->save();
         Session::flash('message','Atualizado com sucesso');
         return Redirect::to('/livro');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $livro_categoria = LivroCategoria::where('livro_id','=',$id)->get()->first();
        
        LivroCategoria::destroy($livro_categoria->id);
        Livro::destroy($id);
        
        Session::flash('message','Livro excluído com sucesso');
        return Redirect::to('/livro');
      
        
    }
}
