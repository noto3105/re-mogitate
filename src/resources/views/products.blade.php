@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
@endsection

@section('content')
<div class="products__content">
    <div class="products__heading">
        <h2 class="heading-logo">商品一覧</h2>
        <a class="heading-link" href="products/register">+商品を追加</a>
    </div>
    <div class="products__form">
        <aside class="side">
            <form class="search-form" action="products/search" method="get">
                @csrf
                <div class="search-form">
                    <input class="search-form__item" type="text" name="keyword" placeholder="商品名で検索">
                </div>
                <div class="search-form__button">
                    <button class="search-form__button-submit" type="submit">検索</button>
                </div>
            </form>
        </aside>
        <main class="main-content wrap">
            <div class="products-list">
                @foreach($products as $product)
                <div class="products-container">
                    <a class="products-card" href="{{ route('products.detail', ['productId' => $product->id]) }}">
                        <div class="card__img">
                            <img class="img" src="{{ $product->image }}" alt="{{ $product->name }}" />
                        </div>
                        <div class="card__content">
                            <p class="card__name">{{ $product->name }}</p>
                            <p class="card__yen">¥{{ number_format($product->price) }}</p>
                        </div>  
                    </a>
                </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </main>
    </div>
</div>
@endsection