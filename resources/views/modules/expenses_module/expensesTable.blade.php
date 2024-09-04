
@php
$expensesList = $expensesData;
@endphp

<table class="table table-hover">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Payment Type</th>
            <th>Final Date</th>
            {{-- <th></th> --}}
        </tr>
    </thead>
    <tbody >
        @php
            $rowCount = 1;
        @endphp
        @forelse ($expensesList as $data)
        <tr class="expensesRow" data-id="{{$data->id}}" style="cursor: pointer" onclick="editExpenses(this)">
            <td>{{ $rowCount++ }}</td>
            <td>{{ $data->description }}</td>
            <td>{{ number_format($data->amount) }}</td>
            <td>{{ isset($data->paymentMode->description) ? $data->paymentMode->description : '' }}</td>
            <td>{{ $data->FinalDeadline }}</td>
            {{-- <td><button type="button" class="btn btn-danger deleteExpenses" data-id="{{ $data->id }}" onclick="processExpenses(this)"><i class="fa fa-trash"></i></button></td> --}}
       </tr>
        @empty
            <tr ><td colspan='6'  class="text text-primary text-center"> No data available... </td></tr>
        @endforelse
      
    </tbody>
</table>

