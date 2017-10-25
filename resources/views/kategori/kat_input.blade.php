@extends('welcome')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
    	<div class="col">
    		<h4>Inserting Data</h4>
    	</div>
		<div class="col">
			<div class="row pull-right">
				<a href="{{ route('kategori.index') }}" class="btn btn-primary btn-sm">Back</a>
			</div>
		</div>
    </div>
  </div>
  <div class="card-body">

	<div class="container">
		@if (session()->has('success'))
			<li class="alert alert-success">{{ session()->get('success') }}</li>
		@endif
	  @if (count($errors) > 0)
	  	<ul class="alert alert-danger">
		  	@foreach ($errors->all() as $error)
				 	<li>{{ $error }}</li>
		  	@endforeach
		</ul>
	  @endif	
	  <form enctype="multipart/form-data" action="{{ route('kategori.store') }}" files="true" method="POST">
	  {{ csrf_field() }}
	    <div class="form-group row">
	      <label for="nama_kategori" class="col-sm-2 col-form-label">Category Name</label>
	      <div class="col-sm-10">
	        <input type="text" class="form-control" id="nama_kategori" name="namakategori" placeholder="Nama Kategori">
	      </div>
	    </div>
	    <div class="form-group row">

			<label for="Images" class="col-sm-2 col-form-label">Images</label>
			<div class="col-sm-10">
		    	<input type="file" class="form-control-file" name="images" id="images">
			</div>
		</div>
	    <div class="form-group row">
	      <div class="col-md-10 ml-md-auto">
	        <button type="submit" class="btn btn-primary" id="add">Save</button>
	      </div>
	    </div>
	  </form>
	</div>
  </div>
</div>
        
@endsection