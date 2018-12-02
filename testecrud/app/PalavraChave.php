<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PalavraChave extends Model
{
    protected $fillable = ['title', 'livro_id'];
     
    protected $table = 'palavra_chave';
}
