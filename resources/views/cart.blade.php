@extends('layout')

@section('title','Manage Game')

@section('halaman')
<div class="d-flex flex-row-reverse">
    <a class="btn btn-primary col-2 mb-4" href="/transactionHistory">Checkout</a>
</div>

<table class="table align-middle">
    <tr>
        <th scope="col">GAME TITLE</th>
        <th scope="col">GAME PRICE</th>
        <th scope="col">Quantity</th>
        <th scope="col"></th>
    </tr>


    @if (Session::has('cart'))

    @foreach (Session::get('cart') as $c)
    <tr>

        <td class="align-item-center">
            <img style="border-radius: 50%;
        height: 50px; width: 50px;
        " src="../storage/{{$c['image']}}" class="mx-auto me-2" alt="...">
            {{$c['title']}}
        </td>
        <td>{{$c['price']}}</td>
        <td>
            <div class="d-flex">
                <form action="/update-cart/{{$c['idx']}}" method="post">
                    @csrf
                    <input type="text" value="@if(Session::get('qty')){{Session::get('qty')}}@else{{$c['qty']}}@endif" name="quantity">
                </div>
            </td>
            <td>
                <div class="d-flex">
                    <button type="submit" class="btn btn-outline-primary me-2">Update</button>
                </form>
                <form action="/delete-cart/{{$c['idx']}}" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-outline-danger">Remove</button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach

    @endif


</table>

@endsection
