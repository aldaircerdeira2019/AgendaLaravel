@extends('layouts.app')

@section('content')
    <div class="container"><!--editar depois-->
        {{--  Incluir as mensagens flash no corpo  --}}
        @include('flash::message')
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
                    @foreach ($contato as $contatos)
                    <tr>
                        <td><img src="{{ $contatos->avatar_image }}" class="avatar-index"></td>
                        <td class='a-line'>{{ $contatos->nome }}</td>
                        <td class="d-none d-md-table-cell">{{ $contatos->telefone }}</td>
                        <td class="d-none d-md-table-cell">{{ $contatos->email }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('contato.show',$contatos->id)}}" role="button">ver</a>
                
                        <a class="btn btn-success btn-sm" href="{{route('contato.edit',$contatos->id)}}" role="button">edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>

            <div class="card-footer text-right">
                {{ $contato->links() }}
            </div>
            
        </div>
        
    </div>
    
@endsection