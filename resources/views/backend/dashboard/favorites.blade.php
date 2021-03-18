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
            <div class="card-body ">
                <div class="table-responsive  " style="overflow:hidden ">
                    <table id="example" class="table table-striped v_center" style="width:100%; ">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <i class="fas fa-th"></i>
                                </th>
                                <th>Imagem</th>
                                <th>Serviço/produto</th>
                                <th>Preço</th>
                                <th>Agendar/Comprar</th>
                                <th>Ver detalhes</th>
                                <th>Remover</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (Auth::user()->favorites != null)
                                @foreach (Auth::user()->favorites as $product)
                                    <tr>
                                        <td class="text-center"><i class="fas fa-th"></i></td>
                                        <td>
                                            <img alt="image" src=" {{ $product->image }}" class="" data-toggle="tooltip"
                                                title="" data-original-title=" {{ $product->name }}" width="35">

                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td><b>{{ $product->price }} MZN</b></td>
                                        @if ($product->subcategory->category->id == 2)
                                            <td><a href="{{ route('agendar', ['product' => $product->id]) }}"
                                                    class="btn btn-icon icon-left btn-success"><i class="fa fa-clock"></i>
                                                    Agendar</a></td>
                                        @else
                                            <td><a href="{{ route('comprar', ['product' => $product->id]) }}"
                                                    class="btn btn-icon icon-left btn-success"><i
                                                        class="fa fa-money-bill-alt"></i> Comprar</a></td>


                                        @endif
                                        <td><a href="{{ route('product_detail', ['product' => $product->id]) }}"
                                                class="btn btn-icon icon-left btn-warning">Detalhes</a></td>
                                        <td><a href="{{ route('favorite_delete', ['product' => $product->id, 'user' => Auth::user()->id]) }}"
                                                class="btn btn-icon icon-left btn-danger"><i class="fa fa-trash"></i>
                                                Deletar</a></td>

                                    </tr>
                                @endforeach
                            @endif


                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">
                                    <i class="fas fa-th"></i>
                                </th>
                                <th>Imagem</th>
                                <th>Serviço /produto</th>
                                <th>Preço</th>
                                <th>Agendar/Comprar</th>
                                <th>Ver detalhes</th>
                                <th>Remover</th>
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

        <script src="{{ asset('dashboard/datatables/jquery.dataTables.js') }}"> </script>
        <script src="{{ asset('dashboard/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('dashboard/js/page/components-table.js') }}"></script>

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
                //.addCss('dary');
                console.log($('#example_filter input').parent().css('width', '100%'));

            });

        </script>
    @endpush
@endsection
