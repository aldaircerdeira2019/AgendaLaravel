<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ContatoModel;
use App\Http\Requests\ContatoRequest;

class ContatoControl extends Controller
{

    private $contato;
    private $pagi = 1000;
    public function __construct(ContatoModel $contato)
    {
        $this->contato = $contato;
    }
    
    public function index()
    {   
        $title ='Lista de Contatos';
        $contato = $this->contato->paginate($this->pagi);
        return view('contato.index',compact('contato','title'));
    }

    
    public function create()
    {
        $title='Cadastrar Novo Contato';
        return view('contato.create-edit',compact('title'));
    }

    
    public function store(ContatoRequest $request)
    {
        $dados = $request->all();
        $insert =$this->contato->create($dados);
        return redirect()->route('contato.index');
        return'deu certo';
    }

   
    public function show($id)
    {
        $contato= $this->contato->find($id);
        $title="Contato - {$contato->nome}";
        return view('contato.show',compact('contato','title'));
    }

    
    public function edit($id)
    {
        $contato= $this->contato->find($id);
        $title="Contato - {$contato->nome}";
        return view('contato.create-edit',compact('contato','title'));
    }

    public function update(ContatoRequest $request, $id)
    {
        $dados = $request->all();
        $contato= $this->contato->find($id);
        $update=$contato->update($dados);
        return redirect()->route('contato.index');
    }

  
    public function destroy($id)
    {
        $contato= $this->contato->find($id);
        $delete=$contato->delete();

        return redirect()->route('contato.index');
    }
}
