@extends('layout')

@section('title','Transaction History')

@section('halaman')

<table class="table align-middle">
    <tr>
        <th scope="col">TRANSACTION ID </th>
        <th scope="col">TRANSACTION DATE</th>
        <th scope="col">TOTAL ITEM  </th>
        <th scope="col"></th>
    </tr>
    @foreach ($transaction as $t)
    <tr>
        <td>
            {{$t->id}}
        </td>
        <td>
            {{$t->created_at}}
        </td>
        <td>
            @php
                $quantity = 0;
            @endphp
            @foreach ($t->detail as $td )
                @php
                    $quantity += $td->qty;
                @endphp
            @endforeach
            {{$quantity}}
        </td>
        <td>
            <a href="/transactionDetails/{{$t->id}}">Details</a>
        </td>
    </tr>
    @endforeach
</table>

@endsection
