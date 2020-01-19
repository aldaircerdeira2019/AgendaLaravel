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
            Gerenciador de Contatos
        </div>

        @if(isset($contato))
    <form action="{{route('contato.update',$contato->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
        @else
            <form action="{{route('contato.store')}}" method="post" enctype="multipart/form-data">
        @endif
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nome">Nome completo</label>
                    <input type="text" class="form-control" value="{{$contato->nome ?? old('nome') }}" id="nome" name="nome">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" value="{{$contato->telefone ?? old('telefone') }}" id="telefone" name="telefone" placeholder="(00) 00000-0000">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" value="{{$contato->email ?? old('email') }}" id="email" name="email" placeholder="exemplo@gmail.com">
                </div>
                <div class="form-group">
                    <label for="data_nas">Data de Nascimento</label>
                    <input type="text"  id="data_nas" class="form-control" value="{{$contato->data_nas ?? old('data_nas') }}" name="data_nas" placeholder="00/00/0000">
                </div>
                
                <div class="form-group">
                    <label for="descrição">Descrição</label>
                    <textarea class="form-control" id="descrição" name="descrição" rows="5">{{$contato->descrição ?? old('descrição') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control-file{{$errors->has('avatar') ? ' is-invalid':''}}" id="avatar" name="avatar" accept=".jpg, .jpeg, .png .gif">
                    <div class="invalid-feedback" style="display:inherit">{{ $errors->first('avatar') }}</div>
                    <!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/file -->
                </div>
            </div>
            <div class="card-footer">
                <a href="{{route('contato.index')}}" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">
                    @if(!isset($contato))
							Cadastrar
						@else
							Atualizar
						@endif
                </button>
            </div>
        </form>

     
    </div>
    
</div>
@endsection