@extends('admin.master')
@section('style')
@endsection
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('author.title') }}</h3>

            <div class="box-tools pull-right">
                <a href="{{ route('admin.authors.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{ trans('author.add') }}</a>
            </div>
        </div>
        <div class="box-body">
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>{{ trans('author.name') }}</th>
                        <th>{{ trans('author.description') }}</th>
                        <th>{{ trans('author.created_at') }}</th>
                        <th>{{ trans('author.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="author in authors">
                        <tr>
                            <td>@{{ author.id }}</td>
                            <td>@{{ author.name }}</td>
                            <td>@{{ author.description }}</td>
                            <td>@{{ author.created_at }}</td>
                            <td>
                                <a class="btn btn-default btn-sm" :href="'/admin/authors/'+  author.id +'/edit'">{{ trans('author.edit') }}</a>
                            <a @click="deleteSinger(author.id)" class="btn btn-danger btn-sm" href="#">{{ trans('author.delete') }}</a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>

            <!-- Pagination -->
            <nav>
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1">
                        <a href="#" aria-label="Previous"
                        @click.prevent="changePage(pagination.current_page - 1)">
                            <span aria-hidden="true">«</span>
                        </a>
                    </li>
                    <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                        <a href="#" @click.prevent="changePage(page)">@{{ page }}</a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)">
                            <span aria-hidden="true">»</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
        </div>
    </div>
    <!-- /.box -->
</section>
@endsection
@section('script')
    <script src="{{ asset('js/sites/author.js') }}"></script>
    <script></script>
@endsection
