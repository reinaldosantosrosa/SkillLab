@extends('layout.app')
@section('title', 'Lista de Produtos')

@section('content')
<h1>Listagem de Produtos</h1>
<hr>

<div class="container">
@include('layout.mensagens')


    <a href="{{ route('produtos.create') }}" class="btn btn-info btn-sm" >Adicionar Produto</a>
    <hr>
    {{ $produtos->links() }}
    <table class="table table-bordered table-striped table-sm">
        <thead>
      
      <tr>
          <th>Código</th>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Preço</th>
          <th>Quantidade</th>
          <th>
          </th>
          <th></th>
      </tr>
        </thead>
        <tbody>
      @forelse($produtos as $produto)
      <tr>
          <td>{{ $produto->id }}</td>
          <td>{{ $produto->nome }}</td>
          <td>{{ $produto->descricao }}</td>
          <td>{{ $produto->Valor }}</td>
          <td>{{ $produto->Quantidade }}</td>
          <td>
            <a href="{{ route('produtos.edit', ['id' => $produto->id]) }}" class="btn btn-warning btn-sm">Editar</a>
           </td>
           <td>
            <form method="POST" action="{{ route('produtos.destroy', ['id' => $produto->id]) }}" style="display: inline" onsubmit="return confirm('Deseja excluir este registro?');" >
                @csrf
                <input type="hidden" name="_method" value="delete" >
                <button class="btn btn-danger btn-sm">Excluir  </button>
            </form>
          </td>
      </tr>
      @empty
      <tr>
          <td colspan="6">Não existem produtos cadastrados</td>
      </tr>
      @endforelse
        </tbody>
    </table>
   
</div>
@endsection
