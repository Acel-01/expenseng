@extends('blogetc_admin::layouts.admin_layout')
@section('title', 'BlogEtc - Add Category')
@section('content')
<div class="content" id="app">
    <div class="container-fluid">
        <main class="py-4">
            <div class="row">
                <div class="col-md-9">
    				<h5>Admin - Add Category</h5>

				    <form method="post" action="{{ route('blogetc.admin.categories.create_category') }}" enctype="multipart/form-data">
				        @csrf
				        @include('blogetc_admin::categories.form', ['category' => new \WebDevEtc\BlogEtc\Models\Category()])

				        <input type="submit" class="btn btn-primary" value="Add New Category">
				    </form>
				</div>
			</div>
		</main>
	</div>
</div>
@endsection
