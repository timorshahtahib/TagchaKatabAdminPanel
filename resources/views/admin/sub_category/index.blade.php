@extends('admin.layout.master')
@section('contain_title')

    داشبورد
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <div class="x_title">
                                <h5>لیست دسته بندی ها

                                </h5>
                                <a href="{{route('SubCategoryController.create')}}">
                                    <button type="button" class="btn btn-primary pull-left">
                                        دسته بندی
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </a>
                            </div>
                        </div>



                                <div class="box-body table-responsive  no-padding">
                                    <table id="example" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>شماره</th>
                                    <th>عکس</th>
                                    <th>عنوان</th>
                                    <th>عملیات</th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($SubCategory as $subcategory)
                                        <tr>
                                        <td>{{$subcategory->id}}</td>
                                        <td><img src="{{ asset('storage/images/book_image/'.$subcategory->image_link) }}"  style="  width:50px;height:50px;border-radius: 50% ;" alt="Avatar"/></td>
                                        <td>{{$subcategory->name}}</td>

                                            <td>
                                                <div class="btn-group">
                                                <form action="{{route('SubCategoryController.destroy',$subcategory->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-xs btn-danger">delete</button>
                                                </form>

                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection



<script>


    $(document).on('click','.deleteUser',function(){
        var userID=$(this).attr('data-userid');
        $('#app_id').val(userID);
        $('#applicantDeleteModal').modal('show');
    });

    // delete confirmation
    function logout_confirm(id) {
        //get the member id that want to delete
        $('#logout_rowId').val(id);
        //showing modal
        $('#modal-logout').modal('show');

    }



    // delete func
    function logout_customer() {
        let form_data = new FormData(document.getElementById('logout_customer'));

        $.ajax({
            url: "logout_customer",
            processData: false,
            contentType: false,
            cache: false,
            method: 'post',
            data: form_data,
            dataType: 'json',
            beforeSend: function() {
                $(document).find('span.error-text').text('');
            },
            success: function(results) {
                if (results.status === false) {
                    $.each(results.error, function(prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $('#logout_customer')[0].reset();
                    $('#modal-logout').modal('hide');
                    fetch_data(1);
                    swal("Alert!", results.message, "success");
                }
            },
            error: function(results) {
                $('#modal-logout').modal('hide');
                swal("Alert!",'Error Accured while ', "error");
            }
        });
    }
</script>
