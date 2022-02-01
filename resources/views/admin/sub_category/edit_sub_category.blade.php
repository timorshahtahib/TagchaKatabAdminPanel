@extends('admin.layout.master')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">اضافه کردن دسته بندی جدید</h4>
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
                            <form action="{{route('SubCategoryController.update',$sub_category_model->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>نام</label>
                                            <input type="text"  name="name" class="form-control" placeholder="نام" value="{{$sub_category_model->name}}">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                                کتگوری اصلی  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="category_id" class="form-control" >
                                                    @foreach(\App\Models\Category::all() as $cat)
                                                        <option value="{{ $cat->id }}" {{ $cat->id == $sub_category_model->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>

{{--                                                       /// <option value="{{$cat->id}}"  {{ in_array($cat->id , $sub_category_model->category->pluck('id')->toArray()) ? 'selected' : '' }}>{{$cat->name}}</option>--}}
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>درباره دسته بندی</label>
                                            <textarea rows="5"  name="description" class="form-control" placeholder="اینجا میتواند توضیحات شما باشد."> {{$sub_category_model->description}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="image"><b>انتخاب عکس </b></label>

                                        <input type="file" name="image_link"  placeholder="انتخاب تصویر" id="image"  style="display:none;">

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
