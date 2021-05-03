@extends('AdminLayout.base')

@push('bread-title')
Admin
@endpush

@push('bread-subtitle')
Dashboard
@endpush
@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow mb-3">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Add New {{ $postType->title }}</h4>

                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area text-center">

                    <div class="row">
                        <div class="col-sm-6">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    {{-- <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active"><a href="{{ route('admin.post', $postType->slug) }}">{{ $postType->title }}</a></li> --}}
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Index</a></li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-sm-6">
                            {{-- <a href="{{ route('admin.post.create', $postType->slug) }}" class="btn btn-sm btn-success float-right">Add New {{ $postType->title }} </a> --}}

                        </div>
                    </div>

                </div>
            </div>
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>Sn</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Modify Date</th>
                            <th class="no-content">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($globalpost as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td> @if($post->status == "Active" ) <span class="badge badge-success">Active</span> @else <span class="badge badge-danger">Inactive</span> @endif</td>
                            <td>{{ $post->created_at->format('Y-m-d') }}</td>
                            <td>{{ $post->updated_at->format('Y-m-d') }}</td>

                            <td>
                                <a href="{{ route('admin.post.edit',[$postType->slug, $post->slug]) }}" title="Edit" class="badge badge-success"> <i data-feather="edit"></i>Edit</a>
                                <a href="{{ route('admin.post.delete', [$postType->slug, $post->slug]) }}" title="Delete" class="badge badge-dark warning confirm"><i data-feather="archive"></i>Delete</a>

                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                        <tr>
                            <th>Sn</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Modify Date</th>
                            <th class="no-content">Action</th>
                        </tr>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

@push('script')
<script>
    var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>

@endpush

{{--
 <div class="statbox widget box box-shadow mb-3">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">

                <h4>Add New {{ $postType->title }}</h4>

            </div>
        </div>
    </div>
    <div class="widget-content widget-content-area text-center">

        <div class="row">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admindashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.addblog', $postType->slug) }}">{{ $postType->title }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Create</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('admin.post', $postType->slug) }}" class="btn btn-sm btn-success float-right">Back to {{ $postType->title }} List</a>

            </div>
        </div>

    </div>
</div>
<div class="widget-content widget-content-area br-6">
    <div class="row">
        <div class="col-lg-12 col-12 mx-auto">
            <form method="post" enctype="multipart/form-data" action="{{ route('blogsubmit',$postType->slug) }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <p>Title</p>
                            <label for="t-text" class="sr-only">{{ $postType->title }} Title</label>
                            <input id="post_title" value="{{ old('title') }}" type="text" name="title" placeholder="{{ $postType->title }} Title..." class="form-control" required>
                        </div>




                        @if($postType->editor == 1)
                            <div class="form-group">
                                <p> Description</p>
                                <textarea name="description" rows="10" cols="100">{{ old('description') }}</textarea>
                            </div>
                        @endif

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <p> Status</p>
                            <label for="t-text" class="sr-only">Status</label>
                            <select class="form-control  basic" name="status">
                                <option value="Active">Active</option>
                                <option value="InActive">InActive</option>
                            </select>
                        </div>

                        @if($postType->feature_image == 1)
                        <div class="form-group mt-3">
                            <p>Feature Image</p>
                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                <label>Clear <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file" >
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="image">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>


                        @endif


                        <input type="submit" name="txt" class="mt-4 btn btn-primary float-right">
                    </div>
                </div>

                <hr>
                @if($postType->feature_image == 1)
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Image Alt Text</p>
                            <label for="t-text" class="sr-only">Image Alt Text</label>
                            <input id="alt_txt" value="" type="text" name="img_alt" placeholder="Image Alt Text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Image Title</p>
                            <label for="t-text" class="sr-only">Image Title</label>
                            <input id="img_title" value="" type="text" name="img_title" placeholder="Image Title" class="form-control">
                        </div>
                    </div>
                </div>
                    @endif

                <div class="form-group">
                    <p>Meta Keywords Or Tags</p>
                    <label for="t-text" class="sr-only">Meta Keywords Or Tags</label>
                    <select class="form-control tagging" multiple="multiple" name="meta_keyword[]">
                        {{-- @foreach($keywords as $keyword)
                        <option value="{{ $keyword }}">{{ $keyword }}</option>
                       @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <p>Meta Description</p>
                    <textarea name="meta_description"></textarea>
                </div>
            </form>
        </div>
    </div>
</div> --}}
