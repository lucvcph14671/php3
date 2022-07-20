@extends('adminMaster')
@section('title', 'Trang admin')
@section('conten')
    <form method="GET" action="{{route('r-s')}}" class="p-4"> 
        <div class="mb-3">
        <label for="email_input" class="form-label">Name</label>
        <input type="text" class="form-control" id="email_input" name="name_input" placeholder="Enter Name..." aria-describedby="email_input_Help">
    </div>
        <div class="mb-3">
            <label for="email_input" class="form-label">Email</label>
            <input type="email" class="form-control" id="email_input" name="email_input" placeholder="Enter Email..." aria-describedby="email_input_Help">
        </div>
        <div class="mb-3">
            <label for="password_input" class="form-label">Password</label>
            <input type="password" class="form-control" id="password_input" name="password_input" placeholder="Enter Password...">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remmember_me" name="remmember_me">
            <label class="form-check-label" for="remmember_me">Remmember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection


