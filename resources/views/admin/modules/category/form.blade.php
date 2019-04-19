@extends('admin.master')
@section('style')
@endsection
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('category.title') }}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <form role="form" @submit.prevent="saveSinger()">
                        <div class="form-group has-feedback" v-bind:class="{'has-error':formErrors && formErrors.name }">
                            <label for="">{{ trans('category.name') }}</label>
                            <input v-model="category.name" type="text" class="form-control" placeholder="Enter Name">
                            <span v-if="formErrors && formErrors.name" class="help-block">@{{ formErrors.name[0] }}</span>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <label for="textarea" class="col-sm-12 control-label">{{ trans('category.description') }}</label>
                                <div class="col-sm-12">
                                    <textarea v-model="category.description" id="textarea" class="form-control" rows="8"></textarea>
                                </div>
                            </div>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">@{{ id ? 'Lưu chỉnh sửa' : 'Thêm mới' }}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- /.box -->
</section>
@endsection
<script>
    window.data = {
        id: '{{ $category->id??null }}',
        category: {
            name: '{{ $category->name??null }}',
            description: '{{ $category->description??null }}',
        },
        formErrors: null,
        categoryNotFound: null
    }
</script>
@section('script')
    <script src="{{ asset('js/sites/category-form.js') }}"></script>
@endsection
