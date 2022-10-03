@extends('welcome')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <div class="border-1 border rounded-3 p-3">
                    @if(session()->has('errorCreate'))
                        <div class="alert alert-danger">Нельзя создать заказ без товаров!</div>
                    @endif
                    <h2 class="mt-3">Корзина</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Картинка</th>
                            <th scope="col">Наименование</th>
                            <th scope="col">Стоимость за штуку</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Общая стоимость</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($products))
                            <?php $allPrice = 0; ?>
                            <form action="" method="POST">
                                @csrf
                            @foreach($products as $product)
                                <tr>
                                    <td><img width="36px" alt="" src="/public/storage/{{$product->photo}}"></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td><input type="number" name="productsIds[{{$product->id}}]" class="form-control" value="{{session('basket')[$product->id]}}"></td>
                                    <td>{{$product->price*session('basket')[$product->id]}}</td>
                                    <?php $allPrice += ($product->price*session('basket')[$product->id])?>
                                </tr>
                           @endforeach
                                <tr>
                                    <td colspan="5">Общая стоимость товаров {{$allPrice}}</td>
                                </tr>
                                <tr>
                                    <td colspan="5"><button class="btn btn-primary" type="submit">Сохранить изменения</button></td>
                                </tr>
                            </form>
                            <form action="{{route('order.createOrder')}}" method="POST">
                                @csrf
                                <tr>
                                    <td colspan="5">
                                        <p class="small">Если данные товара не сохраненны, то будет созданн заказ с предыдущим указанным количеством товара!</p>
                                        <label for="inputAddress" class="form-label">Адрес доставки</label>
                                        <input type="text" name="address" id="inputAddress" class="form-control mb-2" value="{{\Illuminate\Support\Facades\Auth::user()->address}}">
                                        <button class="btn btn-success">Создать заказ</button>
                                    </td>
                                </tr>
                            </form>
                        @else
                            <tr>
                                <td colspan="5">В вашей корзине нет товаров</td>
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
