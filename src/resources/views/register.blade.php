@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
@endsection

@section('content')
<div class="register">
    <div class="register-heading">
        <div class="heading__inner">
            <h2 class="heading__logo">商品登録</h2>
        </div>
    </div>
    <div class="form-content">
        <form class="register-form" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="name">
                <p class="heading">商品名<span>必須</span></p>
                <input class="form-item" name="name" type="text" placeholder="商品名を入力" value="{{ old('name') }}">
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="price">
                <p class="heading">値段<span>必須</span></p>
                <input class="form-item" name="price" type="text" placeholder="値段を入力" value="{{ old('price') }}">
                <div class="form__error">
                    @error('price')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="image">
                <p class="heading">商品画像<span>必須</span></p>
                <input class="form-item__img" name="image" type="file" value="{{ old('image') }}">
                <div class="form__error">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="season">
                <p class="heading">季節<span>必須</span></p>
                <label>
                    <input class="form-item__season" type="radio" name="season" value="1" {{ $product->season_id == 1 ? 'checked' : '' }}>
                    春
                </label>

                <label>
                    <input class="form-item__season" type="radio" name="season" value="2" {{ $product->season_id == 2 ? 'checked' : '' }}>
                        夏
                </label>

                <label>
                    <input class="form-item__season" type="radio" name="season" value="3" {{ $product->season_id == 3 ? 'checked' : '' }}>
                        秋
                </label>

                <label>
                    <input class="form-item__season" type="radio" name="season" value="4" {{ $product->season_id == 4 ? 'checked' : '' }}>
                        冬
                </label>
                <div class="form__error">
                    @error('season')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="description">
                <p class="heading">説明<span>必須</span></p>
                <input class="form-item__description" name="description" type="textarea" placeholder="商品の説明を入力" value="{{ old('description') }}">
                <div class="form__error">
                    @error('description')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="button">
                <a class="back-btn" href="/">戻る</a>
                <input class="register-btn" type="submit" value="登録" name="send">
            </div>
        </form>
    </div>
</div>
@endsection