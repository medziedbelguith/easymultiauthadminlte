@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
<section class="content">
    <div class="container-fluid">
     <div class="col-12">
      
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Update User</h3>
        </div>
        <div class="card-body">

             <form  action="{{route('updateuser',['id' =>$user->id])}}" method="POST">
               <div class="card-body">
               @csrf
                @method('PATCH')
                  <div class="form-group">
                    <label for="exampleInputName1">User Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Enter username" value="{{$user->name}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$user->email}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                        <label>Select</label>
                        <select class="form-control" name="role" value="{{$user->role}}">
                          <option>Admin</option>
                          <option>Customer</option>
                          <option>Manager</option>
                        </select>
                   </div>
                </div>
    
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
              </form>
        </div>
      <!-- /.container-fluid -->
     </div>
    </div>
    </section>
    </div>
@endsection