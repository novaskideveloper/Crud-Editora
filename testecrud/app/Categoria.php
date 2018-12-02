<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['title'];
     
    protected $table = 'categoria';
    
    
    public function LivroCategoria($id){
        
        return DB::table('categoria')
        ->join('livro_categoria','livro_categoria.category_id','=','categoria.id')
        ->where('categoria.id','=',$id)
        ->get();
        
        
    }
    
}