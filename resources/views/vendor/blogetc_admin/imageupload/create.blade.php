@extends('blogetc_admin::layouts.home')
@push('css')
    <title>ExpenseNg - Upload Images</title>
@endpush
@section('content')
<div class="content" id="app">
    <div class="container-fluid">
        <main class="py-4">
            <div class="row">
                <div class="col-md-9">
                    <h5 class="text-center p-4 text-white" style="background: #6c757d">Upload Images</h5>
                        <p>You can use this to upload images.</p>
                        <form method="post" action="{{route("blogetc.admin.images.store")}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4 p-2">
                                <label for="image_title">Image title</label>
                                <small id="image_title_help" class="form-text text-muted">Image Title</small>
                                <input required class="form-control" type="text" name="image_title" id="image_title"
                                       aria-describedby="image_title_help">
                            </div>
                            <div class="form-group mb-4 p-2">
                                <label class="btn form-control-file" for="upload">Upload image</label>
                                
                                <input required class="form-control" type="file" name="upload" id="upload"
                                       aria-describedby="upload_help">
                            </div>

                            <div class="form-group mb-4 p-2">
                                <label>Sizes to convert to</label>
                                <div>
                                    <input type="checkbox" name="sizes_to_upload[blogetc_full_size]" value="true" checked
                                           id="size_blogetc_full_size">
                                    <label for="size_blogetc_full_size">Full size (no resizing)</label>
                                </div>
                                @foreach((array)config('blogetc.image_sizes') as $size => $image_size_details)
                                    <div>
                                        <input type="checkbox" name="sizes_to_upload[{{$size}}]" value="true" checked id="size_{{$size}}">
                                        <label for="size_{{$size}}">{{$image_size_details['name']}} - {{$image_size_details['w']}}
                                            x {{$image_size_details['h']}}px</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group mb-4 p-2">
                                <label>Save</label>
                                <input type="submit" class="btn btn-primary" value="Upload">
                            </div>
                        </form>
                </div>
                <div class="col-md-3">
                    @include("blogetc_admin::layouts.sidebar")
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

