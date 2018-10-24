@extends('admin.layouts.app')

@section('content')

<div class="right_col" role="main">
    <div class="">
        <a class="btn btn-outline-dark" href="{{ asset('admin/post') }}" role="button">Go back</a>
        <div class="page-title">
            <div class="title_left">
                <h3>Posts <small>List Posts</small></h3>
            </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
            
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Projects</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a></li>
                                <li><a href="#">Settings 2</a></li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <p>Simple table with project listing with progress and editing options</p>
                    @if (count($posts)>0)
                    <!-- start project list -->
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 20%">Title</th>
                                <th>Author</th>
                                <th>Created at</th>
                                <th>Status</th>
                                <th style="width: 20%">#Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($posts as $post)

                            <tr>
                                <td>#</td>
                                <td>
                                    <a>{{ $post->title }}</a>
                                    <br />
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <img src="images/user.png" class="avatar" alt="Avatar">
                                        </li>
                                        <li>
                                            <a href="{{ asset('admin/author/' . $post->user->id) }}">{{ $post->user->name }}</a>
                                        </li>
                                    </ul>
                                </td>
                                <td class="project_progress">
                                    <small>Written on {{ $post->created_at }}</small>
                                </td>
                                <td>
                                    @if ($post->status == 1)
                                        <button type="button" class="btn btn-success btn-xs">public</button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-xs">unpublic</button>
                                    @endif
                                    
                                </td>
                                <td>
                                    <a href="{{ asset('admin/post/' . $post->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                    <a href="{{ asset('admin/post/'.$post->id.'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    <form action="{{ action('Admin\AdminPostsController@destroy',$post->id) }}" method="POST" role="form" >
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field()}}
                                        <div class="form-group">
                                            <button type="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                        </tbody>
                    </table>
                    <!-- end project list -->
                    @else
                        <p>Post not found</p>
                    @endif
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
