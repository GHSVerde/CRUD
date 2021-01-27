@extends('layouts.app')

@section('content')
<breadcrumb :lista="{{ $breadcrumb }}"></breadcrumb>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criar Vaga') }}</div>

                <div class="card-body">
                   <form method="POST" action="{{ route('vaga.store') }}">
                    @csrf

                    <input-group text='Empresa *' name='empresa' @error('empresa') :error='{{ $message }}' @enderror>
                        <input id="empresa" type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" value="{{ old('empresa') }}" required autocomplete="org">
                    </input-group>

                    <input-group text='Vaga *' name='vaga' @error('vaga') :error='{{ $message }}' @enderror>
                        <input id="vaga" type="text" class="form-control @error('vaga') is-invalid @enderror" name="vaga" value="{{ old('vaga') }}" required>
                    </input-group>

                    <input-group text='E-mail *' name='email' @error('email') :error='{{ $message }}' @enderror>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" required>
                    </input-group>

                    <input-group text='Telefone de Contato' name='telefone' @error('telefone') :error='{{ $message }}' @enderror>
                        <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" autocomplete="tel-national">
                    </input-group>

                    <input-group text='Indicação' name='indicacao' @error('indicacao') :error='{{ $message }}' @enderror>
                        <input id="indicacao" type="text" class="form-control @error('indicacao') is-invalid @enderror" name="indicacao" value="{{ old('indicacao') }}">
                    </input-group>

                    <input-group text='Situação da Vaga *' name='situacao' @error('situacao') :error='{{ $message }}' @enderror>
                        <select name="situacao" id="situacao" class="form-control @error('situacao') is-invalid @enderror" required>
                            <option disabled selected>Selecione a situação</option>
                            <option value="Não Enviado">Currículo Não Enviado</option>
                            <option value="Enviado">Currículo Enviado</option>
                            <option value="Rejeitado">Rejeitado</option>
                            <option value="Marcado">Entrevista Marcada</option>
                            <option value="Contratado">Contratado</option>
                        </select>
                    </input-group>

                    <input-group text='URL da Vaga' name='url_referencia' @error('url_referencia') :error='{{ $message }}' @enderror>
                        <input id="url_referencia" type="url" class="form-control @error('url_referencia') is-invalid @enderror" name="url_referencia" value="{{ old('url_referencia') }}">
                    </input-group>
                    
                    <input-group text='Feedback' name='feedback' @error('feedback') :error='{{ $message }}' @enderror>
                        <textarea id="feedback" type="text" class="form-control @error('feedback') is-invalid @enderror" name="feedback" value="{{ old('feedback') }}"></textarea>
                    </input-group>
                    
                    <div class="col-12 text-right px-0">
                        <button type="submit" class="btn btn-primary">Criar Vaga</button>
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