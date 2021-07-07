@extends('layout.app')
@section('title', 'Cadastrar Produto')
 
@section('content')
<h1>Cadastrar Produto</h1>
<hr>
 
<div class="container">
@include('layout.mensagens')
 
    @if(isset($produtos))
 
        {!! Form::model($produtos, ['method' => 'put', 'route' => ['produtos.update', $produtos->id ], 'class' => 'form-horizontal']) !!}
 
    @else
 
        {!! Form::open(['method' => 'post','route' => 'produtos.store', 'class' => 'form-horizontal']) !!}
 
    @endif
 
    <div class="card">
        <div class="card-header">
      <span class="card-title">
          @if (isset($produtos))
        Editando registro: #{{ $produtos->id }}
          @else
        Criando novo registro
          @endif
      </span>
        </div>
        <div class="card-body">
      <div class="form-row form-group">
 
          {!! Form::label('nome', 'Nome do Produto', ['class' => 'col-form-label col-sm-2 text-right']) !!}
 
          <div class="col-sm-4">
 
        {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder'=>'Defina o nome do produto']) !!}
 
          </div>
 
      </div>
      <div class="form-row form-group">
 
          {!! Form::label('descricao', 'Descrição do Produto', ['class' => 'col-form-label col-sm-2 text-right']) !!}
 
          <div class="col-sm-4">
 
        {!! Form::text('descricao', null, ['class' => 'form-control', 'placeholder'=>'Informe uma descrição para o produto']) !!}
 
          </div>
 
      </div>
      <div class="form-row form-group">
 
          {!! Form::label('Valor', 'Preço', ['class' => 'col-form-label col-sm-2 text-right']) !!}
 
          <div class="col-sm-8">
 
        {!! Form::text('Valor', null, ['class' => 'form-control', 'placeholder'=>'Informe o preço do produto']) !!}
 
          </div>
 
      </div>
      <div class="form-row form-group">
 
          {!! Form::label('Quantidade', 'Quantidade em Estoque', ['class' => 'col-form-label col-sm-2 text-right']) !!}
 
          <div class="col-sm-4">
 
        {!! Form::text('Quantidade', null, ['class' => 'form-control', 'placeholder'=>'Informe a quantidade em estoque']) !!}
 
          </div>
 
      </div>

 
      </div>
        </div>
        <div class="card-footer">
      {!! Form::button('cancelar', ['class'=>'btn btn-danger btn-sm', 'onclick' =>'windo:history.go(-1);']); !!}
      {!! Form::submit(  isset($produtos) ? 'atualizar' : 'criar', ['class'=>'btn btn-success btn-sm']) !!}
 
        </div>
    </div>
 
    {!! Form::close() !!}
 
</div>
@endsection