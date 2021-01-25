@extends('backend.layout.app')
@section('content')
    @push('css')
        <link href="{{ asset('css/app.css') }}">
        <link href="'{{ asset('dashboard/datatables/dataTables.bootstrap4.css') }}'">
        <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/modules/jquery-selectric/selectric.css')}}">
    @endpush

    <div class="container">
        <div class="card">

            <div class="card-header">
                <h4>Users Table</h4> <a href="#" class="btn btn-icon icon-left btn-info" id="modal-5"><i
                        class="fas fa-users"></i> Create User</a>

            </div>
            <div class="card-body p-4">
                <div class="table-responsive p-0 " style="overflow:hidden ">
                    <table id="example" class="table table-striped v_center" style="width:100%; ">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <i class="fas fa-th"></i>
                                </th>
                                <th>Nome do user</th>
                                <th>Created at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        {{ (new DateTime($user->created_at))->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        <button class="btn btn-icon icon-left btn-warning update_modal_{{ $user->id }}"
                                            obj="{{ $user->id }}"> <i class="fas fas fa-edit"></i>Edit</button>
                                    </td>
                                    <td>
                                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}"
                                            id="delete_{{ $user->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $user->id }}">
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
                                <th>Nome da user</th>
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

    <form action="{{ route('user.store') }}" method="post" id="form_user">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control" name="name" required value="{{ old('name') }}"
                        placeholder="{{ __('Name') }}" style="background:rgb(226, 226, 226)">
                </div>
                <div class="col-sm-6">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input type="email" class="form-control" name="email" required value="{{ old('email') }}"
                        placeholder="{{ __('E-Mail Address') }}">
                </div>
                <div class="col-sm-6">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" name="password" class="form-control" placeholder="{{ __('Password') }}">
                </div>
                <div class="col-sm-6">
                    <label for="confirm-password">{{ __('Confirm Password') }}</label>
                    <input type="password"  name="password_confirmation" id="password-confirm" class="form-control" required placeholder="{{ __('Confirm Password') }}">
                </div>
                <div class="col-sm-6">
                    <label for="role">{{ __('Permission') }}</label>
                    <select name="role_id" class="form-control custom-select selectric">
                        <optgroup title="Roles">
                             @foreach (\App\Role::all() as $role)
                                <option value="{{ $role->id }}"

                                    @if ($role->id == 6)
                                        selected
                                    @endif
                                    >{{ $role->name }}</option>
                            @endforeach
                        </optgroup>
                       
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="{{ __('Active') }}">Ativar</label>
                    <select name="disabled" class="form-control custom-select selectric">
                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>
                    </select> 
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
                title: 'New User',
                body: $('#form_user'),
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

        @foreach ($users as $user)
            <form action="{{ route('user.update', $user->id) }}" method="post" id="form_user_update_{{ $user->id }}">
                @method('PUT')
                @csrf<div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control" name="name" required value="{{ $user->name }}"
                        placeholder="{{ __('Name') }}" style="background:rgb(226, 226, 226)">
                </div>
                <div class="col-sm-6">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input type="email" class="form-control" name="email" required value="{{ $user->email }}"
                        placeholder="{{ __('E-Mail Address') }}">
                </div>
                <div class="col-sm-6">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" name="password" class="form-control" placeholder="{{ __('Password') }}">
                </div>
                <div class="col-sm-6">
                    <label for="confirm-password">{{ __('Confirm Password') }}</label>
                    <input type="password"  name="password_confirmation" id="password-confirm" class="form-control" required placeholder="{{ __('Confirm Password') }}">
                </div>
                <div class="col-sm-6">
                    <label for="role">{{ __('Permission') }}</label>
                    <select name="role_id" class="form-control custom-select selectric">
                        <optgroup title="Roles">
                             @foreach (\App\Role::all() as $role)
                                <option value="{{ $role->id }}"

                                    @if ($role->id == $user->role->id)
                                        selected
                                    @endif
                                    >{{ $role->name }}</option>
                            @endforeach
                        </optgroup>
                       
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="{{ __('Active') }}">Ativar</label>
                    <select name="disabled" class="form-control custom-select selectric">
                        <option value= "1" 
                            @if ($user->disabled)
                                selected
                            @endif
                        >Sim</option>
                        <option value= "0" 
                        @if (!$user->disabled)
                                selected
                            @endif
                        >Não</option>
                    </select> 
                </div>
            </div>
        </div>

            </form>
            <script>
                $('.update_modal_{{ $user->id }}').fireModal({
                    title: 'Edit User',
                    body: $('#form_user_update_{{ $user->id }}'),
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
