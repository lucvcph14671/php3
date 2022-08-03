@extends('clientMaster')
@section('title', 'Trang login')
@section('content')
    <section class="w-100 p-4 d-flex justify-content-center pb-4">
        <div style="width: 26rem;">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="{{ route('/') }}" role="tab"
                        aria-controls="pills-login" aria-selected="true">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Đăng nhập</font>
                        </font>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="{{ route('dang-ki') }}"
                        role="tab" aria-controls="pills-register" aria-selected="false">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Đăng ký</font>
                        </font>
                    </a>
                </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form action="{{ route('dang-nhap') }}" method="POST">
                      @csrf
                        <div class="text-center mb-3">
                            <p>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Đăng nhập với:</font>
                                </font>
                            </p>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-google"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-github"></i>
                            </button>
                        </div>

                        <p class="text-center">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">hoặc:</font>
                            </font>
                        </p>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            @if ($errors->has('email'))
                                <span class="text-danger text-sm"> {{ $errors->first('email') }}</span>
                            @endif
                            <input type="email" id="loginName" name="email" value="{{old('email')}}" class="form-control">
                            <label class="form-label" for="loginName" style="margin-left: 0px;">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Thư điện tử hoặc tên người dùng</font>
                                </font>
                            </label>

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            @if ($errors->has('password'))
                                <span class="text-danger text-sm"> {{ $errors->first('password') }}</span>
                            @endif
                            <input type="password" name="password" id="loginPassword" class="form-control">
                            <label class="form-label" for="loginPassword" style="margin-left: 0px;">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Mật khẩu</font>
                                </font>
                            </label>
                        </div>

                        <!-- 2 column grid layout -->
                        <div class="row mb-4">
                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-3 mb-md-0">
                                    <input class="form-check-input" type="checkbox" value="" id="loginCheck"
                                        checked="">
                                    <label class="form-check-label" for="loginCheck">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Nhớ tôi</font>
                                        </font>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Simple link -->
                                <a href="#!">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Quên mật khẩu?</font>
                                    </font>
                                </a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Đăng nhập</font>
                            </font>
                        </button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Không phải là thành viên? </font>
                                </font><a href="#!">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Đăng ký</font>
                                    </font>
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Pills content -->
        </div>
    </section>
@endsection
