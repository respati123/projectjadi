@extends('welcome')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
    	<div class="col">
    		<h4>Category Data's</h4>
    	</div>
    	<div class="col">
    		<div class="row pull-right">
    			<a href="{{ route('kategori.index') }}" class="btn btn-primary btn-md">Back</a>
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
	 {!! Form::model($kategori,['method' => 'PATCH', 'route'=> ['kategori.update', $kategori->ks_id], 'files'=>'true','enctype'=>'multipart/form-data']) !!}
	  {{ csrf_field() }}
	    <div class="form-group row">
	      <label for="nama_kategori" class="col-sm-2 col-form-label">Category Name</label>
	      <div class="col-sm-10">
	       {!! Form::text('namakategori', $kategori->ks_nama, ['class' => 'form-control']) !!}
	      </div>
	    </div>
	    <div class="form-group row">

			<label for="Images" class="col-sm-2 col-form-label">Images</label>
			<div class="col-sm-10">
				<div><img src="{{ url('images/kategori/'.$kategori->ks_gambar)}}" style="width:200px; height:200px;"></img></div>
		    	{!! Form::file('images',null,['class'=>'form-control']) !!}
			</div>
		</div>
	    <div class="form-group row">
	      <div class="col-md-10 ml-md-auto">
	        <button type="submit" class="btn btn-primary" id="add">Edit</button>
	      </div>
	    </div>
	  {!! Form::close() !!}
	</div>
  </div>
</div>
        
@endsection