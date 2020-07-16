@extends('novopacote::layouts.app')
@section('title', 'NovoPacote - Página Modelo')

@section('css')
<style>
    /* css */
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Página Modelo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <?php
                        /* if(config('novopacote.name') == 'NovoPacote'){
                            $configName = '<strong class="text-success"> Ok</strong>';
                        }else{
                            $configName = '<strong class="text-danger"> Erro</strong>';
                        } */
                    ?>
                    <a class="btn btn-primary" href="{{ url('novopacote/alert') }}">Testar Mensagem de Alerta</a>
                    <hr>
                    <h5 style="display:inline;">Config Name:</h5> <code>config('novopacote.name')</code> | <strong class="text-<?php if(config('novopacote.name') == 'NovoPacote'){echo 'success';}else{echo 'danger';} ?>"> {{ config('novopacote.name') }}</strong>
                    <hr>
                    <h5 style="display:inline;">Teste Class:</h5> <code>NovoPacote::class()</code> | <strong class="text-<?php if(NovoPacote::class() == 'Ok'){echo 'success';}else{echo 'danger';} ?>">{{ NovoPacote::class() }}</strong>
                    <hr>
                    <h5 style="display:inline;">Teste Helper:</h5> <code>novopacote()</code> | <strong class="text-<?php if(novopacote() == 'Ok'){echo 'success';}else{echo 'danger';} ?>">{{ novopacote() }}</strong>
                    <hr>
                    <h5 style="display:inline;">Teste Lang:</h5> <code>@</code><code>lang('novopacote::lang.package_test')</code> | <strong class="text-<?php if(__('novopacote::lang.package_test') == 'Ok'){echo 'success';}else{echo 'danger';} ?>">@lang('novopacote::lang.package_test')</strong>
                    <hr>
                    <h5 style="display:inline;">Teste Blade:</h5> <code>@</code><code>novopacote</code> | <strong class="text-success">@novopacote</strong>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    // js
</script>
@endsection
