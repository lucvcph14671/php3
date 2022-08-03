@extends('clientMaster')
@section('title', 'Trang đăng kí')
@section('content')
    <section class="w-100 p-4 d-flex justify-content-center pb-4">
        <div style="width: 26rem;">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-login" data-mdb-toggle="pill" href="{{ route('/') }}" role="tab"
                        aria-controls="pills-login" aria-selected="false">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Đăng nhập</font>
                        </font>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="{{ route('dang-ki') }}"
                        role="tab" aria-controls="pills-register" aria-selected="true">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Đăng ký</font>
                        </font>
                    </a>
                </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form>
                        <div class="text-center mb-3">
                            <p>Sign in with:</p>
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

                        <p class="text-center">or:</p>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="loginName" class="form-control">
                            <label class="form-label" for="loginName" style="margin-left: 0px;">Email or username</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 114.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="loginPassword" class="form-control">
                            <label class="form-label" for="loginPassword" style="margin-left: 0px;">Password</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 64.8px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <!-- 2 column grid layout -->
                        <div class="row mb-4">
                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-3 mb-md-0">
                                    <input class="form-check-input" type="checkbox" value="" id="loginCheck"
                                        checked="">
                                    <label class="form-check-label" for="loginCheck"> Remember me </label>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Simple link -->
                                <a href="#!">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not a member? <a href="#!">Register</a></p>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade active show" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                    <form action="{{ route('tai-khoan-moi') }}" method="POST">
                        @csrf
                        <div class="text-center mb-3">
                            <p>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Đăng ký với:</font>
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

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            @if ($errors->has('name'))
                            <span class="text-danger text-sm"> {{ $errors->first('name') }}</span>
                        @endif
                            <input type="text" id="registerUsername" value="{{old('name')}}" name="name" class="form-control">
                            <label class="form-label" for="registerUsername" style="margin-left: 0px;">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">tên tài khoản</font>
                                </font>
                            </label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 66.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            @if ($errors->has('email'))
                            <span class="text-danger text-sm"> {{ $errors->first('email') }}</span>
                        @endif
                            <input type="email" name="email" value="{{old('email')}}" id="registerEmail" class="form-control">
                            <label class="form-label" for="registerEmail" style="margin-left: 0px;">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">E-mail</font>
                                </font>
                            </label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 40px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            @if ($errors->has('password'))
                            <span class="text-danger text-sm"> {{ $errors->first('password') }}</span>
                        @endif
                            <input type="password" id="registerPassword" value="{{old('password')}}" name="password" class="form-control">
                            <label class="form-label" for="registerPassword" style="margin-left: 0px;">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Mật khẩu</font>
                                </font>
                            </label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 64.8px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <!-- Repeat Password input -->
                        <div class="form-outline mb-4">
                            @if ($errors->has('password'))
                            <span class="text-danger text-sm"> {{ $errors->first('password') }}</span>
                        @endif
                        @if ($errors->has('password_confirmation'))
                        <span class="text-danger text-sm"> {{ $errors->first('password_confirmation') }}</span>
                    @endif
                            <input type="password" name="password_confirmation" id="registerRepeatPassword"
                                name="password_confirmation" class="form-control">
                            <label class="form-label" for="registerRepeatPassword" style="margin-left: 0px;">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">lặp lại mật khẩu</font>
                                </font>
                            </label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 106.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-center mb-4">
                            <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck"
                                checked="" aria-describedby="registerCheckHelpText">
                            <label class="form-check-label" for="registerCheck">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        Tôi đã đọc và đồng ý với các điều khoản
                                    </font>
                                </font>
                            </label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-3">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Đăng kí</font>
                            </font>
                        </button>
                    </form>
                </div>
            </div>
            <!-- Pills content -->
        </div>
    </section>
@endsection
