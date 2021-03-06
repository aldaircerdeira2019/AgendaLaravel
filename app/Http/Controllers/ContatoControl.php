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
        $contato = $this->contato->where('user_id',$user_id)->orderBy('id','desc')->paginate($this->pagi);
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
        try {
            $contato= $this->contato->find($id);
            $this->authorize('view',$contato);
            $title="Contato - {$contato->nome}";
            return view('contato.show',compact('contato','title'));
        } catch (\Exception $e) {
            if(env('APP_DEBUG')){
                flash($e->getMessage())->error();
                return redirect()->back();
            }
            flash('Não autorizado')->error();
            return redirect()->back();
        }
       
    }

    
    public function edit($id)
    {
        try {
            $contato= $this->contato->find($id);
            $this->authorize('view',$contato);
            $title="Contato - {$contato->nome}";
            return view('contato.create-edit',compact('contato','title'));
        } catch (\Exception $e) {
            if(env('APP_DEBUG')){
                flash($e->getMessage())->error();
                return redirect()->back();
            }
            flash('Não autorizado')->error();
            return redirect()->back();
        }
    }

    public function update(ContatoRequest $request, $id)
    {
        try 
        {
            $dados = $request->all();
            $contato= $this->contato->find($id);
            $this->authorize('update',$contato);
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
            $this->authorize('delete',$contato);
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
