@extends('adminMaster')
@section('title','form')
@section('conten')

  @if ($errors->any())
      @foreach ($errors->all() as $error)
        <div class="invalid-feedback">{{$error}}</div>
      @endforeach
  @endif

<form class="row g-3 p-4" action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Name</label>
          <input type="text" class="form-control" name="name" id="inputEmail4">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="inputPassword4">
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">password</label>
          <input type="password" name="password" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Birthday</label>
          <input type="date" name="birthday" class="form-control" id="inputCity">
        </div>
        
        <div class="col-md-2">
          <label for="inputZip" class="form-label">Phone</label>
          <input type="text" name="phone" class="form-control" id="inputZip">
        </div>

        <div class="col-md-2">
            <label for="inputZip" class="form-label">Phòng ban ( room )</label>
            <select class="form-control" name="room_id" aria-label="Default select example">
                @foreach ($room as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-md-3">
            <label for="formFileSm" class="form-label">Ảnh (avatar)</label>
            <input class="form-control form-control" name="avatar" id="formFileSm" type="file">
          </div>
        <div class="col-12 mt-4">
            <label class="visually-hidden" for="inlineFormSelectPref">Role</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="role" value="1" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  Giám đốc
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="role" value="0" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  Nhân viên
                </label>
              </div>
          </div>
        <div class="col-12 mt-4">
            <label class="visually-hidden" for="inlineFormSelectPref">Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="0" id="flexRadioDefault1"checked>
                <label class="form-check-label" for="flexRadioDefault1">
                  Kích hoạt
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="1" id="flexRadioDefault2" >
                <label class="form-check-label" for="flexRadioDefault2">
                  Chưa kích hoạt
                </label>
              </div>
          </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary mt-4">Add</button>
        </div>
      </form>
@endsection