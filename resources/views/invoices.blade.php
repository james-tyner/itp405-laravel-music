@extends('layout') {{-- tells Laravel where to find the layout that this page is linked to --}}

@section('title', 'Invoices')

@section('main')
    <form action="/" method="get">
      <div class="form-row col-auto">
        <input type="text" name="search" value="{{$search}}">
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="/" class="btn btn-link">Clear</a>
      </div>
    </form>

    <table class="table">
      <tr>
        <th>Date</th>
        <th>Total</th>
        <th>Customer</th>
        <th>Email</th>
      </tr>

      @forelse($invoices as $invoice)
        <tr>
          <td>{{$invoice->InvoiceDate}}</td>
          <td>${{$invoice->Total}}</td>
          <td>{{$invoice->FirstName}} {{$invoice->LastName}}</td>
          <td>{{$invoice->Email}}</td>
        </tr>
      @empty {{-- if there are no results in $invoices, it'll print this --}}
        <tr>
          <td colspan="4">No invoices found. 😭</td>
        </tr>
      @endforelse
    </table>
@endsection
