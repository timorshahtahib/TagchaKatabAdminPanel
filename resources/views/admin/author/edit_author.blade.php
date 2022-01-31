@extends('admin.layout.master')

@section('contain_title')

    نویسنده
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">اضافه کردن نویسنده جدید</h4>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="content">
                            <form action="{{route('Add_Author.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>نام</label>
                                            <input type="text"  name="name" class="form-control" placeholder="نام" value="{{$author->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>نام خانوادگی</label>
                                            <input type="text" name="last_name" class="form-control" placeholder="نام خانوادگی" value="{{$author->last_name}}" >
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>درباره نویسنده</label>
                                            <textarea rows="5"  name="bio" class="form-control"
                                                      placeholder="اینجا میتواند توضیحات شما باشد."
                                                     > {{$author->bio}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="image"><b>انتخاب عکس </b></label>

                                        <input type="file" name="image"  placeholder="انتخاب تصویر" id="image"  style="display:none;">

                                        @error('image')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info btn-fill pull-left">اضافه کردن</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
<script>


    $('.addfiles').on('click', function() { $('#image').click();return false;});
</script>
