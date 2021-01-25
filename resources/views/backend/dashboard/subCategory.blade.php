@extends('backend.layout.app')
@push('css')
    <link href="{{ asset('css/app.css') }}">
    <link href="'{{ asset('dashboard/datatables/dataTables.bootstrap4.css') }}'">
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endpush
@section('content')

    <div class="container">
        <div class="card">

            <div class="card-header">
                <h4>Categories Table</h4> <a href="#" class="btn btn-icon icon-left btn-info" id="modal-5"><i
                        class="fas fa-info-circle"></i> Create category</a>

            </div>
            <div class="card-body p-4">
                <div class="table-responsive p-0 " style="overflow:hidden ">
                    <table id="example" class="table table-striped v_center" style="width:100%; ">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <i class="fas fa-th"></i>
                                </th>
                                <th>Nome da sub - categoria</th>
                                <th>Número de produtos/serviços</th>
                                <th>Created at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($subCategories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->products->count() }}</td>
                                    <td>
                                        {{ (new DateTime($category->created_at))->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        <button class="btn btn-icon icon-left btn-warning update_modal_{{ $category->id }}"
                                            obj="{{ $category->id }}"> <i class="fas fas fa-edit"></i>Edit</button>
                                    </td>
                                    <td>
                                        <form action="{{ route('subcategory.destroy', ['subcategory' => $category->id]) }}"
                                            id="delete_{{ $category->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $category->id }}">
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
                                <th>Nome da sub - categoria</th>
                                <th>Número de produtos/serviços</th>
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

    <form action="{{ route('subcategory.store') }}" method="POST" id="form_category">
        @csrf
        
             <div class="form-group row">
                <div class="col-sm-12"><input type="text" class="form-control" name="name" required value="{{ old('name') }}" placeholder="Create sub - category"
            style="background:rgb(226, 226, 226)">
                </div>
                <div class="col-sm-12 py-2">
                    <label>Category</label>
                    <select class="form-control custom-select" name="category_id">
                        @foreach (\App\Category::all() as $cat)
                            <option value="{{ $cat->id }}"> {{ $cat->name }}
                            </option>
                        @endforeach 
                    </select>
                </div>
    </div>
    </form>
@endsection
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
            title: 'New sub category',
            body: $('#form_category'),
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

    @foreach ($subCategories as $category)
        <form action="{{ route('subcategory.update', $category->id) }}" method="post"
            id="form_category_update_{{ $category->id }}">
            @method('PATCH')
            @csrf
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="name" required value="{{ $category->name }}"
                        placeholder="Edit Category" style="background:rgb(226, 226, 226)">
                </div>
                <div class="col-sm-12 py-2">
                    <label>Category</label>
                    <select class="form-control custom-select" name="category_id">
                        @foreach (\App\Category::all() as $cat)
                            <option value="{{ $cat->id }}"
                                 @if ($cat->id == $category->category_id)
                                    {{ __('Selected') }} style = "background:teal"
                                 @endif
                                > {{ $cat->name }}
                            </option>
                        @endforeach 
                    </select>
                </div>
    </div>
    </form>
    <script>
        $('.update_modal_{{ $category->id }}').fireModal({
            title: 'Edit sub category',
            body: $('#form_category_update_{{ $category->id }}'),
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
