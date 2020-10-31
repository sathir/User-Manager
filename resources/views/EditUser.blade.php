@extends('layouts.app')

@section('content')
				
   <div class="modal-content">

	 <h4>Modify user</h4>

	 <div class="container">
                    <form method="POST" action="{{route('user-update')}}">
                    @csrf
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" type="text"
                                        name="username" value="{{$user->name}}" required autocomplete="email" autofocus>
                                        <input type="text" hidden="hidden" name="id" value="{{$user->id}}" autofocus>
                                    <!-- Checked for null value validation -->
                                    <label for="icon_prefix">Username</label>
                                </div>

								<div class="input-field col s12">
                                    <i class="material-icons prefix">email</i>
                                    <input id="icon_prefix" type="email"
                                        name="email" value="{{$user->email}}" required autocomplete="email" autofocus>
                                    <!-- Checked for null value validation -->
                                    <label for="icon_prefix">E-Mail</label>
                                </div>

                                <div class="input-field col s12">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="icon_telephone" placeholder="Enter new password" type="password" name="password"
                                        required autocomplete="current-password">
                                    <!-- Checked for null value validation -->
                                    <label for="icon_telephone">Password</label>
                                </div>

								<div class="input-field col s12">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="icon_telephone" placeholder="Retype password" type="password" name="password_confirmation"
                                        required autocomplete="current-password">
                                    <!-- Checked for null value validation -->
                                    <label for="icon_telephone">Confirm Password</label>
                                </div>
                            </div>


                        </div>
                        <button class="btn waves-effect waves-light" type="submit">
                            Update <i class="material-icons right">lock_open</i>
                        </button>
                    </form>
                </div>

   </div>
    @endsection