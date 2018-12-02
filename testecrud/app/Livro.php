<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Livro extends Model
{
    protected $fillable = ['category_id', 'isbn', 'title','description','price'];
     
    protected $table = 'livro';
     
    public function Categoria(){ 
        
        return $this->hasMany('App\Models\Categoria','id','category_id'); 
        
        
    }
    
    public function pegarLivroCategoria(){
        
        return DB::table('livro')
        ->join('livro_categoria','livro_categoria.livro_id','=','livro.id')
        ->join('categoria','categoria.id','=','livro_categoria.category_id')
        ->join('palavra_chave','palavra_chave.livro_id','=','livro.id')
        ->select('livro.*','categoria.title as title_category','categoria.id as id_category','palavra_chave.title as palavra_chave')
        ->get();
        
    }


}
