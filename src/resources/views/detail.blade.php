@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
@endsection

@section('content')
<div class="detail">
    <div class="heading-pass">
        <a class="pass" href="/">商品一覧</a>
    </div>
    <form class="update-form" action="{{ route('products.update', ['productId' => $product->id]) }}" method="post">
        @csrf
        @method('patch')
        <div class="update-form__grid">
            <div class="form-item__image">
                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                <input class="file-select" type="file" accept="image/png, image/jpeg" >
                <div class="form__error">
                </div>
            </div>
            <div class="name">
                <p class="name__heading">商品名</p>
                <input class="name__form" type="text" value="{{ $product->name }}">
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="price">
                <p class="price__heading">値段</p>
                <input class="price__form" type="text" value="{{ $product->price }}">
                <div class="form__error">
                    @error('price')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="season">
                <p class="season__heading">季節</p>
                <label>
                    <input class="season__option" type="radio" name="season_id" value="1" {{ $product->season_id == 1 ? 'checked' : '' }}>
                    春
                </label>
                <label>
                    <input class="season__option" type="radio" name="season_id" value="2" {{ $product->season_id == 2 ? 'checked' : '' }}>
                    夏
                </label>
                <label>
                    <input class="season__option" type="radio" name="season_id" value="3" {{ $product->season_id == 3 ? 'checked' : '' }}>
                    秋
                </label>
                <label>
                    <input class="season__option" type="radio" name="season_id" value="4" {{ $product->season_id == 4 ? 'checked' : '' }}>
                    冬
                </label>
                <div class="form__error">
                    @error('season')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="description">
            <p class="description__heading">商品説明</p>
            <input class="description__content" type="textarea" value="{{ $product->description }}">
            <div class="form__error">
                @error('description')
                    {{ $message }}
                    @enderror
            </div>
        </div>
        <div class="button">
            <a class="return__button" href="/">戻る</a>
            <input class="submit__button" type="submit" value="変更を保存">
        </div>
    </form>
    <form action="{{ route('products.destroy', $product->id) }}" method="post">
        @csrf
        @method('delete')
        <div class="delete__button">
            <input type="hidden" name="id" value="{{ $product['id'] }}">
            <button class="delete-button__item" type="submit"><img src="/images/deletebutton.png" alt="削除"></button>
        </div>
    </form>
</div>
@endsection