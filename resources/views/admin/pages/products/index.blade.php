
@extends('admin.layouts.app')

@section('title', 'Gestao de Produtos')
      
@section('content')
    <h1>Exibindo os produtos</h1>

        <a href="{{ route('products.create') }}">Cadastrar</a>
    <hr>
        @component('admin.components.card')
            @slot('title')
                <h1>Titulo slot</h1>
            @endslot
            Um carde de exemplo
        @endcomponent
    <hr>
        @include('admin.includes.alerts', ['content' => 'Alerta de precos de produtos'])
    <hr>
        @if(isset($products))
            @foreach($products as $product)
            <p class="@if ($loop->last) last @endif">{{ $product }}</p>
            @endforeach
        @endif
    <hr>
        @forelse($products as $product)
            <p class="@if ($loop->first) last @endif">{{ $product }}</p>
        @empty 
            <p>Nao existe prtodutos cadastrados</p>
        @endforelse
    <hr>
   @if( $teste === '123')
        E igaul
    @elseif($teste === 123)
        E igual a 123
    @else
        E diferente
    @endif
 
    @unless( $teste === '123')
            hsdghghds
    @else
            hsdgfjgaerui 
    @endunless

    @isset( $teste2 )
        <p>{{ $teste2 }}</p>
    @endisset

    @empty($teste3)
        <p>Vazio...</p>
    @endempty

    @auth
        <p>Autenticado</p>
    @else
        <p>Nao autenticado</p>
    @endauth

    @guest
        <p>Nao autenticado</p>
    @endguest

    @switch($teste)
        @case(1)
            igual a 1 
            @break
        @case(2)
            igual a 2 
            @break
        @case(3)
            igual a 3
            @break 
        @case(123)
            E igual a 123
            @break
        @default 
            Default 
    @endswitch       
@endsection

@push('styles') 
    <style>
        .last {background: #CCC;}
    </style>
@endpush

@push('scripts')
    <script>
        //document.body.style.background = '#bd9494';
    </script>
@endpush