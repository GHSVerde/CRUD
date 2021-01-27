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

            <div class="card">
                <div class="card-header">
                    <div class="float-left">{{ __('Lista de Vagas') }}</div>
                    <div class="float-right"><a href="{{ route('vaga.index') }}" class="btn btn-sm btn-success">Voltar</a></div>
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
                                    @if($vaga->situacao == 'Não Enviado') <span class="badge rounded-pill bg-light text-dark">Currículo Não Enviado</span> @endif
                                    @if($vaga->situacao == 'Enviado') <span class="badge rounded-pill text-white bg-info">Currículo Enviado</span> @endif
                                    @if($vaga->situacao == 'Rejeitado') <span class="badge rounded-pill text-white  bg-danger">Rejeitado</span> @endif
                                    @if($vaga->situacao == 'Marcado') <span class="badge rounded-pill text-white bg-primary">Entrevista Marcada</span> @endif
                                    @if($vaga->situacao == 'Contratado') <span class="badge rounded-pill text-white  bg-success">Contratado</span> @endif
                                </th>
                                <th>
                                    <form action="{{ route('vaga.restore', $vaga->id)}}" method="post" class="d-inline">
                                        @csrf
            
                                        <button type="submit" class="btn btn-success"><i class="bi bi-reply"></i></button>
                                    </form>
                                    <form action="{{ route('vaga.delete', $vaga->id)}}" method="post" class="d-inline">
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
            
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