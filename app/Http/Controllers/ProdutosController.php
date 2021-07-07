<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProdutoRequest;
 

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $produtos = Produto::paginate(10);
        return view('produtos.grid', compact('produtos'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produtos = Produto::create($request->all());
       
        if ($produtos) {
 
            Session::flash('success', "Produto criado com sucesso!");
           
            return redirect()->route('produtos.index');
        }
        
        return redirect()->back()->withErrors(['error', "Erro ao criar produto."]);
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtos = Produto::findOrFail($id);
 
        if ($produtos) {
            return view('produtos.form', compact('produtos'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produtos = Produto::where('id', $id)->update($request->except('_token', '_method'));
        if ($produtos) {
   
            Session::flash('success', "Registro #{$id} atualizado com sucesso");
             
            return redirect()->route('produtos.index');
        }

        return redirect()->back()->withErrors(['error', "Registo #{$id} não foi encontrado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::where('id', $id)->delete();
       
        if ($produto) {
   
            Session::flash('success', "Registro #{$id} excluído com sucesso");
      
            return redirect()->route('produtos.index');
       } 
       return redirect()->back()->withErrors(['error', "Registo #{$id} não pode ser excluído"]);
    }
}
