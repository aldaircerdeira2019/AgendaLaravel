@extends('layouts.app')

@section('content')
<div class="container"><!--editar depois-->
    <div class="card">
        <div class="card-header">
            Gerenciador de Contatos
        <a href="{{route('contato.create')}}" class="btn btn-primary btn-sm float-right">Novo</a>
        </div>

        <table class="table table-hover" style="margin-bottom: inherit">
            <tbody>
                <tr class="info">
                    <th ></th>
                    <th>Nome</th>
                    <th class="d-none d-md-table-cell">Telefone</th>
                    <th class="d-none d-md-table-cell">Email</th>
                    <th>Ação</th>
            
            
                </tr>
                @foreach ($contato as $contato)
                <tr>
                    <td><img src="{{ $contato->avatar_image }}" class="img-avatar-xs"></td>
                    <td class='a-line'>{{ $contato->nome }}</td>
                    <td class="d-none d-md-table-cell">{{ $contato->telefone }}</td>
                    <td class="d-none d-md-table-cell">{{ $contato->email }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('contato.show',$contato->id)}}" role="button">ver</a>
            
                    <a class="btn btn-success btn-sm" href="{{route('contato.edit',$contato->id)}}" role="button">edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>

        <div class="card-footer text-right">
            paginação
        </div>
        
    </div>
    
</div>
@endsection