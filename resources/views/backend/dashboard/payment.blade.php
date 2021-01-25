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
                <h4>Payment Table</h4> <a href="#" class="btn btn-icon icon-left btn-info" id="modal-5"><i
                        class="fas fa-money-bill"></i> Create Payment</a>

            </div>
            <div class="card-body p-4">
                <div class="table-responsive p-0 " style="overflow:hidden ">
                    <table id="example" class="table table-striped v_center" style="width:100%; ">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <i class="fas fa-th"></i>
                                </th>
                                <th>Nome da Payment</th>
                                <th>Created at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ $payment->name }}</td>
                                    <td>
                                        {{ (new DateTime($payment->created_at))->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        <button class="btn btn-icon icon-left btn-warning update_modal_{{ $payment->id }}"
                                            obj="{{ $payment->id }}"> <i class="fas fas fa-edit"></i>Edit</button>
                                    </td>
                                    <td>
                                        <form action="{{ route('payment.destroy', ['payment' => $payment->id]) }}"
                                            id="delete_{{ $payment->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $payment->id }}">
                                            <!--input type="submit" class="btn btn-icon icon-left btn-danger" value="Delete"-->
                                            <button class="btn btn-icon icon-left btn-danger" type="submit"><i
                                                    class="fas fas fa-trash"></i>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">
                                    <i class="fas fa-th"></i>
                                </th>
                                <th>Nome da payment</th>
                                <th>Created at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <form action="{{ route('payment.store') }}" method="post" id="form_payment">
        @csrf
        <input type="text" class="form-control" name="name" required value="{{ old('name') }}" placeholder="Create Payment"
            style="background:rgb(226, 226, 226)">
    </form>
    @push('js')
        <!-- JS Libraies -->
        <script src="{{ asset('dashboard/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Page Specific JS File -->

        <script src="{{ asset('dashboard/datatables/jquery.dataTables.js') }}">
        </script>
        <script src="{{ asset('dashboard/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('dashboard/js/page/components-table.js') }}"></script>
        <script>
            $('#modal-5').fireModal({
                title: 'New Payment',
                body: $('#form_payment'),
                buttons: [{
                    text: 'Save',
                    submit: true,
                    class: 'btn btn-primary btn-shadow',
                    handler: function(modal) {
                        console.log(modal);
                    }
                }]
            });


        </script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": true,
                    "language": {
                        "search": "_INPUT_",
                        "searchPlaceholder": "Pesquisar"
                    },
                    "showNEntries": false,
                    "info": false,
                    "lengthMenu": 10
                });
                $('#example_filter').addClass('input-group');
                $('#example_filter input').addClass('form-control mr-0');
                $('#example_filter input').removeClass('form-control-sm');
                $('#example_paginate').addClass('float-right');
                $('#example_filter input').parent().css('width', '100%');
                //.addCss('dary');

            });

        </script>

        @foreach ($payments as $payment)
            <form action="{{ route('payment.update', $payment->id) }}" method="post"
                id="form_payment_update_{{ $payment->id }}">
                @method('PUT')
                @csrf
                <input type="text" class="form-control" name="name" required value="{{ $payment->name }}"
                    placeholder="Edit Payment" style="background:rgb(226, 226, 226)">
            </form>
            <script>
                $('.update_modal_{{ $payment->id }}').fireModal({
                    title: 'Edit Payment',
                    body:$('#form_payment_update_{{ $payment->id }}'),
                    buttons: [{
                        text: 'Update',
                        submit: true,
                        class: 'btn btn-primary btn-shadow',
                        handler: function(modal) {
                            console.log(modal);
                        }
                    }]
                });

            </script>
        @endforeach
    @endpush
@endsection
