@extends('layout')

@section('title','Transaction Details')

@section('halaman')

<div class="container fs-4">
    <div class="row">
        <div class="col">
            Transaction : {{$transaction->id}}
        </div>
        <div class="col d-flex flex-row-reverse">
            Transaction Date : {{$transaction->created_at}}
        </div>
    </div>
</div>

<div class="fs-4 mb-5">
    Customer : {{Auth::user()->name}}
</div>

<table class="table align-middle">
    <tr>
        <th scope="col">GAME ID </th>
        <th scope="col">GAME PRICE</th>
        <th scope="col">QUANTITY</th>
        <th scope="col">SUB TOTAL </th>
    </tr>
    @php
        $total = 0;
    @endphp
    @foreach ($transaction->detail as $td)
    <tr>
        <td>
            {{$td->game->title}}
        </td>
        <td>
            {{$td->game->price}}
        </td>
        <td>
            {{$td->qty}}
        </td>
        <td class="d-flex flex-row-reverse">
            ${{$td->qty*$td->game->price}}
            @php
                $total += $td->qty*$td->game->price
            @endphp
        </td>
    </tr>
    @endforeach
</table>

<div class="d-flex flex-row-reverse fs-4 mb-3">
    Total : ${{$total}}
</div>

@endsection
