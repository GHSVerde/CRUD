@extends('layouts.app')

@section('content')
<breadcrumb :lista="{{ $breadcrumb }}"></breadcrumb>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">{{ __('Vaga nº') }} {{ $vaga->id }}</div>
                    <div class="float-right">
                        @if($vaga->situacao == 'Não Enviado') <span class="badge rounded-pill bg-dark text-light px-2 py-1">Currículo Não Enviado</span> @endif
                        @if($vaga->situacao == 'Enviado') <span class="badge rounded-pill bg-warning text-dark px-2 py-1">Currículo Enviado</span> @endif
                        @if($vaga->situacao == 'Rejeitado') <span class="badge rounded-pill bg-danger text-light px-2 py-1">Rejeitado</span> @endif
                        @if($vaga->situacao == 'Marcado') <span class="badge rounded-pill bg-primary text-light px-2 py-1">Entrevista Marcada</span> @endif
                        @if($vaga->situacao == 'Contratado') <span class="badge rounded-pill bg-success text-light px-2 py-1">Contratado</span> @endif
                    </div>
                </div>

                <div class="card-body">
                    <input-group text='Empresa' name='empresa'>
                        <input id="empresa" type="text" class="form-control" name="empresa" value="{{ $vaga->empresa }}" disabled>
                    </input-group>

                    <input-group text='Vaga' name='vaga'>
                        <input id="vaga" type="text" class="form-control" name="vaga" value="{{ $vaga->vaga }}" disabled>
                    </input-group>

                    <input-group text='E-mail' name='email'>
                        <input id="email" type="text" class="form-control" name="email" value="{{ $vaga->email }}" disabled>
                    </input-group>

                    @if($vaga->telefone)
                    <input-group text='Telefone' name='telefone'>
                        <input id="telefone " type="text" class="form-control" name="telefone    " value="{{ $vaga->telefone }}" disabled>
                    </input-group>
                    @endif

                    @if($vaga->indicacao)
                    <input-group text='Indicação' name='indicacao'>
                        <input id="indicacao " type="text" class="form-control" name="indicacao" value="{{ $vaga->indicacao }}" disabled>
                    </input-group>
                    @endif

                    @if($vaga->url_referencia)
                    <input-group text='URL da Vaga' name='url'>
                        <input id="url" type="url" class="form-control" name="url" value="{{ $vaga->url_referencia }}" disabled>
                    </input-group>
                    @endif

                    @if($vaga->feedback)
                    <input-group text='Feedback' name='feedback'>
                        <textarea id="feedback" type="feedback" class="form-control" name="feedback" disabled>
                            {{ $vaga->feedback }}
                        </textarea>
                    </input-group>
                    @endif

                    <div class="col-12 text-right px-0">
                        <form action="{{ route('vaga.destroy', $vaga->id)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf

                            <button type="submit" class="btn btn-danger">Deletar Vaga</button>
                            <a href="{{ route('vaga.edit', $vaga->id) }}" class="btn btn-primary">Editar Vaga</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection