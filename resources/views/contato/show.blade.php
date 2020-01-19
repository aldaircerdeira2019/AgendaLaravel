@extends('layouts.app')

@section('content')
<div class="container"><!--editar depois-->

    @if(isset($errors)&&count($errors)>0)
			<div class='alert alert-danger'>
				@foreach($errors->all() as $erros)
					 {{$erros}}<br>
				@endforeach
			</div>
    @endif
        
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btn-sm float-right" href="{{route('contato.index')}}">Voltar</a>
            Gerenciador de Contatos
        </div>

        
            <div class="card-body">
                <img src="{{ $contato->avatar_image }}" class="img-avatar">
                <table class="table table-hover" style="margin-bottom: inherit">
                    <tr><th>Id: </th>                   <td>{{$contato->id}}</td></tr>
                    <tr><th>Nome: </th>                 <td>{{$contato->nome}}</td></tr>
                    <tr><th>Telefone: </th>             <td>{{$contato->telefone}}</td></tr>
                    <tr><th>E-Mail: </th>               <td>{{$contato->email}}</td></tr>
                    <tr><th>Data de Nascimento: </th>   <td>{{$contato->data_nas}}</td></tr>
                    <tr><th>Descrição: </th>            <td>{{$contato->descrição}}</td></tr>
                    <tr><th>Criado em: </th>            <td>{{$contato->created_at}}</td></tr>
                    <tr><th>Ultima atualização: </th>   <td>{{$contato->updated_at}}</td></tr>
                   
                 </table>
           
            </div>
            <div class="card-footer text-right">
                <form class="form-horizontal" method="post" action="{{route('contato.destroy',$contato->id)}}">
			        @method('delete')	
			        @csrf
			        <button type="submit" class="btn btn-danger">{{"Apagar $contato->nome"}}</button>
		        </form>
            </div>
       

     
    </div>
    
</div>
@endsection