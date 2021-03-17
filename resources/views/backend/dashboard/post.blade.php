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
                                      <h4>Posts</h4> <a href="#" class="btn btn-icon icon-left btn-info" id="modal-5"><i
                        class="fas fa-info-circle"></i> Criar post</a>
                                        
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
                            <th>Produto/Serviço</th>
                            <th>Preço</th>
                             <th>Ver detalhes</th>
                            <th>Editar</th>
                            <th>Remover</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if ($posts !=null)
                             @foreach ($posts as $product )
                            <tr>
                            <td class="text-center"><i class="fas fa-th"></i></td>
                            <td>
                                <img alt="image" src=" {{ $product->image }}" class="" data-toggle="tooltip" title="" data-original-title=" {{ $product->name }}" width="35">
                               
                            </td>
                            <td>{{ $product->name }}</td>
                            <td><b>{{ $product->price }} MZN</b></td>
                          
                            @if ( $product->subCategory !=null &&$product->subcategory->category->id==2)
                                <td><a href="{{ route('agendar', ['product'=>$product->id]) }}" class="btn btn-icon icon-left btn-success"><i class="fa fa-clock"></i> Agendar</a></td>
                            @else
                            <td><a href="{{ route('product_detail', ['product'=>$product->id]) }}" class="btn btn-icon icon-left btn-warning">Detalhes</a></td>
                            @endif
<td>
                                        <button class="btn btn-icon icon-left btn-warning update_modal_{{ $product->id }}"
                                            obj="{{ $product->id }}"> <i class="fas fas fa-edit"></i>Edit</button>
                                    </td>                         
                             <td>
                                        <form action="{{ route('product.destroy', ['product' => $product->id]) }}"
                                            id="delete_{{ $product->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <!--input type="submit" class="btn btn-icon icon-left btn-danger" value="Delete"-->
                                            <button class="btn btn-icon icon-left btn-danger" type="submit"><i
                                                    class="fas fas fa-trash"></i>Delete</button>
                                        </form>
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
                            <th>Imagem</th>
                            <th>Produto/Serviço</th>
                            <th>Preço</th>
                            <th>Ver detalhes</th>
                            <th>Editar</th>
                            <th>Remover</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
         </div>
    </div>
    <form action="{{ route('post.store') }}" method="post" id="form_post">
        @csrf
        <input type="text" class="form-control" name="name" required value="{{ old('name') }}" placeholder="Create Category"
            style="background:rgb(226, 226, 226)">
    </form>
</div>

@push('js')    
<!-- JS Libraies -->
<script src="{{ asset('dashboard/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Page Specific JS File -->

<script src="{{ asset('dashboard/datatables/jquery.dataTables.js') }}" > </script>
<script src="{{ asset('dashboard/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/js/page/components-table.js') }}"></script>
  <script>
            $('#modal-5').fireModal({
                title: 'Novo post',
                body: $('#form_post'),
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
 @foreach ($posts as $post)
            <form action="{{ route('post.update', $post->id) }}" method="post"
                id="form_post_update_{{ $post->id }}">
                @method('PUT')
                @csrf
                <input type="text" class="form-control" name="name" required value="{{ $post->name }}"
                    placeholder="Edit Category" style="background:rgb(226, 226, 226)">
            </form>
            <script>
                $('.update_modal_{{ $post->id }}').fireModal({
                    title: 'Edit post',
                    body:$('#form_post_update_{{ $post->id }}'),
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