@extends('layouts.app')

@section('content')
<breadcrumb :lista="{{ $breadcrumb }}"></breadcrumb>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criar Vaga') }}</div>

                <div class="card-body">
                   <form method="POST" action="{{ route('vaga.update', $vaga->id) }}">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf

                    <input-group text='Empresa *' name='empresa' @error('empresa') :error='{{ $message }}' @enderror>
                        <input id="empresa" type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" value="{{ $vaga->empresa }}" required autocomplete="org">
                    </input-group>

                    <input-group text='Vaga *' name='vaga' @error('vaga') :error='{{ $message }}' @enderror>
                        <input id="vaga" type="text" class="form-control @error('vaga') is-invalid @enderror" name="vaga" value="{{ $vaga->vaga }}" required>
                    </input-group>

                    <input-group text='E-mail *' name='email' @error('email') :error='{{ $message }}' @enderror>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $vaga->email }}" autocomplete="email" required>
                    </input-group>

                    <input-group text='Telefone de Contato' name='telefone' @error('telefone') :error='{{ $message }}' @enderror>
                        <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ $vaga->telefone }}" autocomplete="tel-national">
                    </input-group>

                    <input-group text='Indicação' name='indicacao' @error('indicacao') :error='{{ $message }}' @enderror>
                        <input id="indicacao" type="text" class="form-control @error('indicacao') is-invalid @enderror" name="indicacao" value="{{ $vaga->indicacao }}">
                    </input-group>

                    <input-group text='Situação da Vaga *' name='situacao' @error('situacao') :error='{{ $message }}' @enderror>
                        <select name="situacao" id="situacao" class="form-control @error('situacao') is-invalid @enderror" required>
                            <option disabled>Selecione a situação</option>
                            <option @if($vaga->situacao == 'Não Enviado') selected @endif value="Não Enviado">Currículo Não Enviado</option>
                            <option @if($vaga->situacao == 'Enviado') selected @endif value="Enviado">Currículo Enviado</option>
                            <option @if($vaga->situacao == 'Rejeitado') selected @endif value="Rejeitado">Rejeitado</option>
                            <option @if($vaga->situacao == 'Marcado') selected @endif value="Marcado">Entrevista Marcada</option>
                            <option @if($vaga->situacao == 'Contratado') selected @endif value="Contratado">Contratado</option>
                        </select>
                    </input-group>

                    <input-group text='URL da Vaga' name='url_referencia' @error('url_referencia') :error='{{ $message }}' @enderror>
                        <input id="url_referencia" type="url" class="form-control @error('url_referencia') is-invalid @enderror" name="url_referencia" value="{{ $vaga->url_referencia }}">
                    </input-group>
                    
                    <input-group text='Feedback' name='feedback' @error('feedback') :error='{{ $message }}' @enderror>
                        <textarea id="feedback" type="text" class="form-control @error('feedback') is-invalid @enderror" name="feedback">{{ $vaga->feedback }}</textarea>
                    </input-group>
                    
                    <div class="col-12 text-right px-0">
                        <button type="submit" class="btn btn-primary">Salvar vaga {{ $vaga->id }}</button>
                    </div>
                    
                    
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageSnippets')
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
<script>
    var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

$('#telefone').mask(SPMaskBehavior, spOptions);
</script>
@endsection