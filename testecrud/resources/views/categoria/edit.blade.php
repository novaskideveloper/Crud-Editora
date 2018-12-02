@extends('template')

@section('content')
<div class="container">
 <h2>Category</h2>
 
{{ Form::model('', array('route' => array('categoria.update',$categoria->id), 'method' => 'PUT')) }}         
{{ csrf_field() }}

      {{Form::label('categoria_name','Nome')}}
	 {{ Form::text('nome_categoria',$categoria->title,['class' => 'form-control','required','placeholder'=>'Nome da categoria']) }}
 
      {{Form::submit('Editar',['class' => 'btn btn-info'])}}
      
      
{{Form::close()}}

</div>
@endsection