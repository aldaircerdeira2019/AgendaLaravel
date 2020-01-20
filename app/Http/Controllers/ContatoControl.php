<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ContatoModel;
use App\Http\Requests\ContatoRequest;

class ContatoControl extends Controller
{

    private $contato;
    private $pagi = 10;
    public function __construct(ContatoModel $contato)
    {
        $this->contato = $contato;
    }
    
    public function index()
    {   
        $title ='Lista de Contatos';
        $user_id = auth()->user()->id;
        $contato = $this->contato->where('user_id',$user_id)->paginate($this->pagi);
        return view('contato.index',compact('contato','title'));
    }

    
    public function create()
    {
        $title='Cadastrar Novo Contato';
        return view('contato.create-edit',compact('title'));
    }

    
    public function store(ContatoRequest $request)
    {
        try 
        {
            $dados = $request->all();
            $insert =$this->contato->create($dados);
            flash('cadastrado com sucesso!')->success();
            return redirect()->route('contato.index');
            
        } catch (\exception $e) 
        {
            if(env('APP_DEBUG'))
            {
                flash($e->getMessage())->error();
                return redirect()->back();
            }
            flash('erro ao cadastrar,  verifique os dados')->error();
            return redirect()->back();
        }
      
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
        try 
        {
            $dados = $request->all();
            $contato= $this->contato->find($id);
            $update=$contato->update($dados);
            flash('atualizado com sucesso!')->success();
            return redirect()->route('contato.index');   
            
        } catch (\Exception $e) 
        {
            if(env('APP_DEBUG'))
            {
                flash($e->getMessage())->error();
                return redirect()->back();
            }
            flash('erro ao atualizar, verifique os dados')->error();
            return redirect()->back();
        }
        
    }

  
    public function destroy($id)
    {
        try {
            $contato= $this->contato->find($id);
            $delete=$contato->delete();
            flash('excluido com sucesso!')->success();
            return redirect()->route('contato.index');

        } 
        catch (\Exception $e) 
        {
            if(env('APP_DEBUG'))
            {
                flash($e->getMessage())->error();
                return redirect()->back();
            }
            flash('erro ao excluir')->error();
            return redirect()->back();
        }
       
    }
}
