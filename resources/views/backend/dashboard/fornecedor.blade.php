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
                <h4>Fornecedores Table</h4> <a href="#" class="btn btn-icon icon-left btn-info" id="modal-5"><i
                        class="fas fa-car-side"></i> Create Fornecedor</a>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive p-0 " style="overflow:hidden ">
                    <table id="example" class="table table-striped v_center" style="width:100%; ">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <i class="fas fa-th"></i>
                                </th>
                                <th>Nome do Fornecedor</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Created at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($fornecedors as $fornecedor)
                                <tr>
                                    <td>{{ $fornecedor->id }}</td>
                                    <td>{{ $fornecedor->name }}</td>
                                    <td>{{ $fornecedor->contact }}</td>
                                    <td>{{ $fornecedor->email }}</td>
                                    <td>
                                        {{ (new DateTime($fornecedor->created_at))->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        <button class="btn btn-icon icon-left btn-warning update_modal_{{ $fornecedor->id }}"
                                            obj="{{ $fornecedor->id }}"> <i class="fas fas fa-edit"></i>Edit</button>
                                    </td>
                                    <td>
                                        <form action="{{ route('fornecedor.destroy', ['fornecedor' => $fornecedor->id]) }}"
                                            id="delete_{{ $fornecedor->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $fornecedor->id }}">
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
                                <th>Nome do fornecedor</th>
                                <th>Contact</th>
                                <th>Email</th>
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

    <form action="{{ route('fornecedor.store') }}" method="post" id="form_fornecedor">
        @csrf
        <div class="form-group">
            <div class="row">
              
                <div class="col-sm-12">
                      <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" required value="{{ old('name') }}" placeholder="Create fornecedor"
            style="background:rgb(226, 226, 226)">
                </div>
                
                <div class="col-sm-12 py-2">
                    <label for="contact">Contact</label>
                    <input type="tel" class="form-control" name="contact" required value="{{ old('contact') }}" placeholder="Contact"
            style="background:rgb(226, 226, 226)">
                </div>
                
                <div class="col-sm-12 py-2">
                <label for="email">Email</label>
                    <input type="email" class="form-control" name="email"  value="{{ old('email') }}" placeholder="Email"
            style="background:rgb(226, 226, 226)">
                </div>
            </div>
        </div>
        
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
                title: 'New Fornecedor',
                body: $('#form_fornecedor'),
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

        @foreach ($fornecedors as $fornecedor)
            <form action="{{ route('fornecedor.update', $fornecedor->id) }}" method="post"
                id="form_fornecedor_update_{{ $fornecedor->id }}">
                @method('PUT')
                @csrf
                        <div class="form-group">
                            
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" required value="{{ $fornecedor->name }}" placeholder="Create fornecedor"
                    style="background:rgb(226, 226, 226)">
                        </div>
                        
                        <div class="col-sm-12 py-2">
                            <label for="contact">Contact</label>
                            <input type="tel" class="form-control" name="contact" required value="{{ $fornecedor->contact }}" placeholder="Contact"
                    style="background:rgb(226, 226, 226)">
                        </div>
                        
                        <div class="col-sm-12 py-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email"  value="{{ $fornecedor->email }}" placeholder="Email"
                    style="background:rgb(226, 226, 226)">
                        </div>
                    </div>
                </div>
            </form>
            <script>
                $('.update_modal_{{ $fornecedor->id }}').fireModal({
                    title: 'Edit fornecedor',
                    body:$('#form_fornecedor_update_{{ $fornecedor->id }}'),
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
