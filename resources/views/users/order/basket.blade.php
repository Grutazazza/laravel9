@extends('welcome')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <div class="border-1 border rounded-3 p-3">
                    <h2 class="mt-3">Корзина</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Картинка</th>
                            <th scope="col">Наименование</th>
                            <th scope="col">Стоимость за штуку</th>
                            <th scope="col">Количество</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($products))
                        @forelse($products as $product)
                            <tr>
                                <td><img src="/public/storage/{{$product->photo}}"></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{session('basket')[$product->id]}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">В вашей корзине нет товаров</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                        @endforelse
                        @else
                            <tr>
                                <td colspan="4">В вашей корзине нет товаров</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
