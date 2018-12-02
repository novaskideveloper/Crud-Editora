@extends('template')

@section('content')
<div class="container">
 <h2>Category</h2>
{{ Form::model('', array('route' => array('categoria.store'), 'method' => 'POST')) }}         
{{ csrf_field() }}

      {{Form::label('categoria_name','Nome')}}
	 {{ Form::text('nome_categoria','',['class' => 'form-control','required','placeholder'=>'Nome da categoria']) }}
 
      {{Form::submit('Submit',['class' => 'btn btn-info'])}}
      
      
{{Form::close()}}

</div>
@endsection