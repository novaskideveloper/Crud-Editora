@extends('template')

@section('content')
<div class="container">
 <h2>Categorias cadastradas</h2>
 <a class="btn btn-info" href="/categoria/create"> Cadastrar nova categoria</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Ação 1 </th>
      <th scope="col">Ação 2</th>
      
    </tr>
  </thead>
  <tbody>
   @foreach($categorias as $categoria)
   
   <tr>
      <th scope="row">{{$categoria->id}}</th>
      
      <td>{{$categoria->title}}</td>
      
      <td>
          
          {{Form::open(['route'=>['categoria.destroy',$categoria->id], 'method'=>'DELETE'])}}
           {{Form::submit('Excluir', ['class'=>'btn btn-danger btn-sm col-md-12'] )}}
  			{{Form::close()}}
          
      </td>
      
      <td>
          
          <a href="/categoria/{{$categoria->id}}/edit">Editar</a>
          
          
      </td>
      
    </tr>
       
   
   @endforeach
   
    </table>
</div>
@endsection