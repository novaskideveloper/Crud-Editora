@extends('template')

@section('content')

<div class="container">
 <h2>Livros cadastradas</h2>
 <a class="btn btn-info" href="/livro/create"> Cadastrar novo livro</a>

<table class="table">
  <thead>
    <tr>
     
      <th scope="col">ISBN</th>
      <th scope="col">Nome</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Categoria</th>
      <th scope="col">Palavra Chave</th>
      <th scope="col">Ação 1 </th>
      <th scope="col">Ação 2</th>
      
    </tr>
  </thead>
  <tbody>
   
   @foreach($livros as $livro)
   <tr>
       <td> {{$livro->isbn}}</td>
       <td> {{$livro->title}}</td>
        <td> {{$livro->description}}</td>

    <td> R${{$livro->price}}</td>       
    <td> {{$livro->title_category}}</td>     
    <td> {{$livro->palavra_chave}}</td>     
    <td>
          {{Form::open(['route'=>['livro.destroy',$livro->id], 'method'=>'DELETE'])}}
           {{Form::submit('Excluir', ['class'=>'btn btn-danger btn-sm col-md-12'] )}}
  			{{Form::close()}}
        
    </td>
       
        <td>
          
          <a href="/livro/{{$livro->id}}/edit">Editar</a>
          
          
      </td>
       
       
   </tr>
   @endforeach
    </table>
</div>

@endsection