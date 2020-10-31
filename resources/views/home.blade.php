@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}





                    <!-- Modal Trigger -->

                    <a class="waves-effect waves-light btn pink darken-1 modal-trigger" href="#demo-modal">Create New
                        user</a>



                    <!-- Modal Structure -->

                    <div id="demo-modal" class="modal">

                        <div class="modal-content">

                            <h4>Create New user</h4>

                            <div class="container">
                                <form method="POST" action="{{route('user-create')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col s6">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">account_circle</i>
                                                <input id="icon_prefix" type="text" name="username"
                                                    value="{{old('username')}}" required autocomplete="email" autofocus>
                                                <!-- Checked for null value validation -->
                                                <label for="icon_prefix">Username</label>
                                            </div>

                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">email</i>
                                                <input id="icon_prefix" type="email" name="email"
                                                    value="{{old('email')}}" required autocomplete="email" autofocus>
                                                <!-- Checked for null value validation -->
                                                <label for="icon_prefix">E-Mail</label>
                                            </div>

                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock</i>
                                                <input id="icon_telephone" value="{{old('password')}}" type="password"
                                                    name="password" required autocomplete="current-password">
                                                <!-- Checked for null value validation -->
                                                <label for="icon_telephone">Password</label>
                                            </div>

                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock</i>
                                                <input id="icon_telephone" value="{{old('confirm_password')}}"
                                                    type="password" name="password_confirmation" required
                                                    autocomplete="current-password">
                                                <!-- Checked for null value validation -->
                                                <label for="icon_telephone">Confirm Password</label>
                                            </div>
                                        </div>


                                    </div>
                                    <button class="btn waves-effect waves-light" type="submit">
                                        Create <i class="material-icons right">lock_open</i>
                                    </button>
                                </form>
                            </div>

                        </div>

                        <div class="modal-footer">

                            <a href="#!"
                                class="modal-action modal-close waves-effect waves-red btn red lighten-1">Close</a>

                        </div>

                    </div>

                    </br>

                    @foreach ($errors->all() as $message)
                    <div class="card red darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">{{$message}}</span>
                        </div>
                    </div>
                    @endforeach

                    @if(session()->has('success'))
                    <div class="card red darken-1">
                        <div class="card-content teal">
                            <span class="card-title">{{session()->get('message')}}</span>
                        </div>
                    </div>

                    @endif

                    <table>
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Created on</th>
                                <th>User Roles</th>
                                <th>Edit Value</th>
                                <th>Delete Value</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($users as $user)


                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    <label for="user_type">Choose a user role:</label>
                                    <select data-code="{{$user->id}}" name="user_type" id="user_type_id"
                                        form="user_type" class="update">
                                        @foreach($roles as $role)
                                        <option {{$user->role_id == $role->id ? 'selected' : '' }}  value="{{$role->id}}">{{$role->type}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <button onclick="window.location.href='{{route('user-edit',$user->id)}}'"
                                        type="button" class="btn teal">Click to Edit</button>

                                </td>
                                <td>
                                    <button data-codee="{{$user->id}}" type="button"
                                        class="btn red accent-2 btn-delete">Click to Delete</button>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>


                    <script>
                    $(document).ready(function() {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $(".update").change(function() {
                            var code = $(this).attr('data-code');
                            var value = $(this).val();
                            // var td = $(this).closest('td');
                            $.ajax({
                                url: "{{route('user-role-update')}}",
                                data: {
                                    id: code,
                                    role_id: value
                                },
                                method: 'post',
                                success: function(data) {
                                    console.log(data);
                                }
                            })

                        })

                        $(".btn-delete").click(function() {
                        var codee = $(this).data('codee');
                        var tr = $(this).closest('tr');
                        $.ajax({
                            url: "{{route('user-delete')}}",
                            data: {
                                    id: codee,

                                },
                            method: 'post',
                            success: function(data) {
                                tr.remove();
                            }
                        })
                        console.log(code);

                    })

                    });

                    </script>
                </div>
            </div>
        </div>
    </div>
    @endsection