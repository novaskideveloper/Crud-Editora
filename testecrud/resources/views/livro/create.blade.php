@extends('template')

@section('content')
<div class="container">
 <h2>Livro</h2>
{{ Form::model('', array('route' => array('livro.store'), 'method' => 'POST')) }}         
{{ csrf_field() }}

     {{Form::label('name_livro','Nome')}}
	 {{ Form::text('name_livro','',['class' => 'form-control','required','placeholder'=>'Nome']) }}
	 
	 {{Form::label('isbn','ISBN')}}
	 {{ Form::text('isbn','',['class' => 'form-control','required','placeholder'=>'ISBN']) }}
	 
	 {{Form::label('description','Descrição')}}
	 {{ Form::textarea('description','',['class' => 'form-control','required','placeholder'=>'Descrição']) }}
	 
	 {{Form::label('price','Price')}}
	 {{ Form::text('price','',['class' => 'form-control','required','placeholder'=>'00,00']) }}
	 
	 
	 {{Form::label('categoria','Categoria')}}
	 {{ Form::select('categoria',$categoria_id,null,['class'=>'form-control','id'=>'tipo_participante']) }}
	 
	 
	 {{Form::label('palavra_chave','Palavra Chave')}}
	 {{ Form::text('palavra_chave','',['class' => 'form-control','required','placeholder'=>'']) }}
	 
 
      {{Form::submit('Submit',['class' => 'btn btn-info'])}}
      
      
{{Form::close()}}

</div>
@endsection