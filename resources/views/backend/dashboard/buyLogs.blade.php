@extends('backend.layout.app')
@section('content')
@push('css')
<link href="{{ asset('css/app.css') }}">
<link href="'{{ asset('dashboard/datatables/dataTables.bootstrap4.css') }}'"> 
<link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endpush


<div class="container">
    <div class="card">
        <div class="card-header">
                                        <h4>Sortable Table</h4>
                                        
                                    </div>
        <div class="card-body p-4">
            <div class="table-responsive p-0 " style="overflow:hidden ">
                <table id="example" class="table table-striped v_center" style="width:100%; ">
                    <thead>
                        <tr>
                            <th class="text-center">
                                                <i class="fas fa-th"></i>
                                            </th>
                            <th>Nome do cliente</th>
                            <th>Produto</th>
                            <th>Total pago</th>
                            <th>Status</th>
                            <th>Pagamento via</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if (Auth::user()->orders !=null)
                             @foreach (Auth::user()->orders as $order )
                            <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->client_name }}</td>
                            <td>{{ $order->product_or_service_name }}</td>
                            <td><b>{{ $order->total_price }} MZN</b></td>
                            <td><div class="badge badge-success">
                                @if ($order->status!=null)
                                    {{ $order->status->name }}
                                    @else
                                        
                                            completo
                                        
                                @endif

                                
                            </div></td>
                            <td>
                                @if ($order->payment !=null)
                                    {{ $order->payment->name }}
                                    @else
                                        M-pesa
                                @endif
                            </td>
                            <td>
                                {{ 
                                    (new DateTime($order->created_at))->format('d-m-Y')    
                                }}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                       
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center">
                                                <i class="fas fa-th"></i>
                                            </th>
                            <th>Nome do cliente</th>
                            <th>Produto</th>
                            <th>Total pago</th>
                            <th>Status</th>
                            <th>Pagamento via</th>
                            <th>Data</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
         </div>
    </div>

</div>

@push('js')    
<!-- JS Libraies -->
<script src="{{ asset('dashboard/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Page Specific JS File -->

<script src="{{ asset('dashboard/datatables/jquery.dataTables.js') }}" > </script>
<script src="{{ asset('dashboard/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/js/page/components-table.js') }}"></script>

<script>
    $(document).ready(function() {
    $('#example').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": true ,
         "language": {
        "search": "_INPUT_",
        "searchPlaceholder": "Pesquisar"
    },
    "showNEntries" : false,
    "info": false,
    "lengthMenu":10
    });
     $('#example_filter').addClass('input-group');
     $('#example_filter input').addClass('form-control mr-0');
     $('#example_filter input').removeClass('form-control-sm');
     $('#example_paginate').addClass('float-right');
      //.addCss('dary');
      console.log($('#example_filter input').parent().css('width','100%'));

} );
</script>
@endpush
@endsection