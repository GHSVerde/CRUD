@extends('layouts.app')

@section('content')
<breadcrumb :lista="{{ $breadcrumb }}"></breadcrumb>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session()->has('deletado'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('deletado') }}
            </div>
            @endif

            @if(session()->has('restaurado'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('restaurado') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="float-left">{{ __('Lista de Vagas') }}</div>
                    <div class="float-right">
                        <a href="{{ route('vaga.criar') }}" class="btn btn-sm btn-success">Criar Vaga</a>
                        <a href="{{ route('vaga.bin') }}" class="btn btn-sm btn-danger">Lixeira</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Empresa</th>
                              <th scope="col">Posição</th>
                              <th scope="col">Situação</th>
                              <th scope="col">Ações</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($vagas as $vaga)
                            <tr>
                                <th>{{ $vaga->id }}</th>
                                <th>{{ $vaga->empresa }}</th>
                                <th>{{ $vaga->vaga }}</th>
                                <th>
                                    @if($vaga->situacao == 'Não Enviado') <span class="badge rounded-pill bg-dark text-light px-2 py-1">Currículo Não Enviado</span> @endif
                                    @if($vaga->situacao == 'Enviado') <span class="badge rounded-pill text-dark bg-warning px-2 py-1">Currículo Enviado</span> @endif
                                    @if($vaga->situacao == 'Rejeitado') <span class="badge rounded-pill text-white  bg-danger px-2 py-1">Rejeitado</span> @endif
                                    @if($vaga->situacao == 'Marcado') <span class="badge rounded-pill text-white bg-primary px-2 py-1">Entrevista Marcada</span> @endif
                                    @if($vaga->situacao == 'Contratado') <span class="badge rounded-pill text-white  bg-success px-2 py-1">Contratado</span> @endif
                                </th>
                                <th>
                                    <form action="{{ route('vaga.destroy', $vaga->id)}}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
            
                                        <a href="{{ route('vaga.show', $vaga->id) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                        <a href="{{ $vaga->url_referencia }}" target="_blank" class="btn btn-primary"><i class="bi bi-link-45deg"></i></a>
                                        <a href="{{ route('vaga.edit', $vaga->id) }}" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-x"></i></button>
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection