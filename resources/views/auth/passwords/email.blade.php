@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('إعادة تعين كلمة المرور') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('عنوان البريد الألكتروني') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6" style="margin-right: 33.3333333333%;">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('إرسال رابط إعادة تعين كلمة المرور') }}
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <div class="form-group row mb-0">
                            <div class="col-md-6" s>
                                <h4>الرجاء الاتصال على الرقم التالي :  <strong style="color: black;">009005522568343</strong></h4>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
