@extends('admin.layout.master')


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
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>کتاب جدید

                                        </h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br/>
                                        <form   action="{{route('BookController.store')}}" id="book_insert" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                                          @csrf
                                            <input type="hidden" name="post" value="reg-book" readonly>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">عنوان
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="title"  name="title" required="required"
                                                           class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                                    کتگوری فرعی  <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="sub_category" class="form-control" >
                                                        @foreach($SubCategories as $subcategory)
                                                            <option value="{{$subcategory->id}}">{{$subcategory->category->name."-".$subcategory->name}}</option>

                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                                    نویسنده <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="author_id" class="form-control" >
                                                        @foreach(\App\Models\Author::all() as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>

                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-6" for="lan">زبان
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <input type="text" id="lan"  name="lan" required="required"
                                                           class="form-control col-md-7 col-xs-6">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-6" for="lan">تعداد صحفه
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <input type="number" id="page"  name="page" required="required"
                                                           class="form-control col-md-7 col-xs-6">
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    فایل </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="file" class="form-control" name="download_link" id="download_link" accept="application/pdf">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    عکس </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="file" class="form-control" name="image_link" id="image_link" accept="image/*">

                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    عکس </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="file" class="form-control" name="photo" id="photo">

                                                </div>
                                            </div> -->

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">جزییات<span
                                                        class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea class="form-control" id="body" name="body" rows="8" placeholder=""></textarea>

                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <button type="reset" class="btn btn-primary">انصراف</button>
                                                    <input type="submit" id="add_book_btn"  class="btn btn-success"></input>
                                                </div>
                                            </div>
                                            <div id="progress-div"><div id="progress-bar"></div></div>
                                            <div id="targetLayer"></div>
                                        </form>
                                        <div id="loader-icon" style="display:none;"><img src="LoaderIcon.gif" /></div>
                                    </div>
                                </div>
                            </div>
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
