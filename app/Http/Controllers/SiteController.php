<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Pessoa;

class SiteController extends Controller
{	
	private $produto;
    private $pessoa;
	
	public function __construct(){
        $produto = new Produto();
        $this->produto = $produto;

        $pessoa = new Pessoa();
        $this->pessoa = $pessoa;

        $this->middleware('auth');
	}

    public function produto(){
    	$produtos = $this->produto->orderBy('created_at', 'DESC')->paginate(4);
    	return view('gerenciar-produto', compact('produtos'));
    }

    public function pessoa(){
        $pessoa = $this->pessoa->orderBy('created_at', 'DESC')->paginate(4);
        return view('gerenciar-clientes', compact('pessoa'));
    }

    public function cadastrarProduto(){
        return view('cadastrarProduto');
    }

    public function cadastrarCliente(){
        return view('cadastrarCliente');
    }

    public function cadastrarProdutoApply(Request $request){
    	$dataForm = $request->all();
        $preco    = $dataForm['preco'];
        $nome     = $dataForm['nome'];

        //Validações de Formulário no Model
        $this->validate($request, $this->produto->rules);

        if($preco < 1){
            return redirect()->back()->with(['msgError' => 'O preço deve ser maior que zero.']);
        }

        if(strlen($nome) >= 51){
            return redirect()->back()->with(['msgError' => 'Você ultrapassou os limites de caracteres do CPF.']);
        }

        $insert = $this->produto->create($dataForm);

        if($insert){
            return redirect()->back()->with(['msg' => 'Produto criado com sucesso.']);
        }else{
            return redirect()->back();
        }
    }

    public function cadastrarClienteApply(Request $request){
        $dataForm = $request->all();
        $cpf      = $dataForm['cpf'];
        $nome     = $dataForm['nome']; 

        //Validações de Formulário
        $this->validate($request, $this->pessoa->rules);

        if(strlen($cpf) >= 12){
            return redirect()->back()->with(['msgError' => 'Você ultrapassou os limites de caracteres do CPF.']);
        }
        if(strlen($nome) >= 51){
            return redirect()->back()->with(['msgError' => 'Você ultrapassou os limites de caracteres do CPF.']);
        }

        $insert = $this->pessoa->create($dataForm);

        if($insert){
            return redirect()->back()->with(['msg' => 'Cliente adicionado com sucesso.']);
        }else{
            return redirect()->back();
        }
    }

    public function editarProduto($id){
        //Recuperando o produto
        $pegaProduto = $this->produto->find($id);
        $id = $id;
        return view('editarProduto', compact('pegaProduto', 'id'));
    }

    public function editarCliente($id){
        //Recuperando o produto
        $pegaPessoa = $this->pessoa->find($id);
        $id = $id;

        return view('editarCliente', compact('pegaPessoa', 'id'));
    }


    public function updateProduto(Request $request){
        $dataForm = $request->all();
        $id       = $dataForm['id'];
        $preco    = $dataForm['preco'];
        $nome     =  $dataForm['nome'];

        $produto = $this->produto->find($id);

        if($preco < 1){
            return redirect()->back()->with(['msgError' => 'O preço deve ser maior que zero.']);
        }

        if(strlen($nome) >= 51){
            return redirect()->back()->with(['msgError' => 'Você ultrapassou os limites de caracteres do CPF.']);
        }

        $update = $produto->update($dataForm);

        if($update){
            return redirect()->back()->with(['msg' => 'Atualizado com sucesso.']);
        }else{
            return redirect()->back();
        }
    }

    public function updateCliente(Request $request){
        $dataForm = $request->all();
        $id       = $dataForm['id'];
        $cpf      = $dataForm['cpf'];
        $nome     = $dataForm['nome'];

        if(strlen($cpf) >= 12){
            return redirect()->back()->with(['msgError' => 'Você ultrapassou os limites de caracteres do CPF.']);
        }
        if(strlen($nome) >= 51){
            return redirect()->back()->with(['msgError' => 'Você ultrapassou os limites de caracteres do CPF.']);
        }

        $pessoa = $this->pessoa->find($id);
        $update = $pessoa->update($dataForm);

        if($update){
             return redirect()->back()->with(['msg' => 'Atualizado com sucesso.']);   
        }else{
            return redirect()->back();
        }
    }

    public function deletarProduto($id){
        $produto = $this->produto->find($id);
        $delete = $produto->delete();

        if($delete){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function deletarCliente($id){
        $pessoa = $this->pessoa->find($id);
        $delete = $pessoa->delete();

        if($delete){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function buscaCliente(Request $request){
        $busca = $request['busca'];

        $localizar_cliente = $this->pessoa->where('nome', 'LIKE', "%{$busca}%") 
           ->orWhere('cpf', 'LIKE', "%{$busca}%") 
           ->get();

        return view('buscaCliente', ['localizar_cliente' => $localizar_cliente]);

    }
}
