@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @include('breadcrumb',$breadcrumbs)
                <div class="card mt-2">
                    <div class="card-header">
                        {{$product->name}}
                    </div>
                    <div class="card-body text-center">
                        <img src="{{'/storage/'.$product->photo}}" alt="{{$product->name}}" class="card-img-top">
                        <p class="card-text">{{$product->description}}</p>
                        <p class="card-text">Стоимость товара: {{$product->price}}</p>
                        <p class="card-text">Страна проихводства: {{$product->made}}</p>
                        <a href="{{route('admin.product.edit',['product'=>$product->id])}}" class="btn btn-primary">Редактировать</a>
                        <a href="" class="btn btn-danger">Редактировать</a>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
