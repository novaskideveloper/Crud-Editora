<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Livros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        //CRIA TABELA CATEGORIA
         Schema::create('categoria', function (Blueprint $table) {
             
            $table->increments('id');
                        
            $table->string('title');
            
            $table->timestamps();
            
                  
            
        });
        
        
        //CRIA TABELA LIVROS
         Schema::create('livro', function (Blueprint $table) {
             
            $table->increments('id');
      
            $table->integer('isbn')->unique();
            
            $table->string('title');
            
            $table->string('description');
            
            $table->string('price');
            
            $table->timestamps();
                  
            
        });
        
        //CRIA TABELA PIVÔ - LIVRO COM CATEGORIA
        Schema::create('livro_categoria', function (Blueprint $table) {
             
            $table->increments('id');
            
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categoria')
                  ->onDelete('cascade');
                  
            $table->integer('livro_id')->unsigned()->nullable();
            $table->foreign('livro_id')
                  ->references('id')
                  ->on('livro')
                  ->onDelete('cascade');
                        
            $table->timestamps();
                  
            
        });
        
        
         //CRIA TABELA PIVÔ - LIVRO COM CATEGORIA
        Schema::create('palavra_chave', function (Blueprint $table) {
             
            $table->increments('id');
            
             $table->string('title');
                  
            $table->integer('livro_id')->unsigned()->nullable();
            $table->foreign('livro_id')
                  ->references('id')
                  ->on('livro')
                  ->onDelete('cascade');
                        
            $table->timestamps();
                  
            
        });
        
        
        
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        
         Schema::dropIfExists('livro_categoria');
        Schema::dropIfExists('livro');
        Schema::dropIfExists('categoria');
        
        

    }
}
