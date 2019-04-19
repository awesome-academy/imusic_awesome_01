@extends('admin.master')
@section('style')
@endsection
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('singer.title') }}</h3>

            <div class="box-tools pull-right">
                <a href="{{ route('admin.singers.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{ trans('singer.add') }}</a>
            </div>
        </div>
        <div class="box-body">
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>{{ trans('singer.name') }}</th>
                        <th>{{ trans('singer.description') }}</th>
                        <th>{{ trans('singer.created_at') }}</th>
                        <th>{{ trans('singer.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="singer in singers">
                        <tr>
                            <td>@{{ singer.id }}</td>
                            <td>@{{ singer.name }}</td>
                            <td>@{{ singer.description }}</td>
                            <td>@{{ singer.created_at }}</td>
                            <td>
                                <a class="btn btn-default btn-sm" :href="'/admin/singers/'+  singer.id +'/edit'">{{ trans('singer.edit') }}</a>
                            <a @click="deleteSinger(singer.id)" class="btn btn-danger btn-sm" href="#">{{ trans('singer.delete') }}</a>
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
    <script src="{{ asset('js/sites/singer.js') }}"></script>
    <script></script>
@endsection
