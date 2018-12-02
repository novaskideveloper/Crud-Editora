<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LivroCategoria extends Model
{
         protected $table = 'livro_categoria';
          protected $fillable = ['livro_id','category_id'];
}
