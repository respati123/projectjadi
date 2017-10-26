@extends('welcome')

@section('content')


		<div class="card">
		  <div class="card-header">
		    <div class="row">
		    	<div class="col">
		    		<h4>Data</h4>
		    	</div>
		    	<div class="col">
		    		<div class="row pull-right">
		    			<a href="{{ route('kategori.create') }}" class="btn btn-primary btn-md">Create New</a>
		    		</div>
		    	</div>
		    </div>
		  </div>
		  <div class="card-body">
		  	  @if (session()->has('message'))
		  	  	<div class="row">
		  	  		<li class="alert alert-success">{{ session()->get('message')}}</li>
		  	  	</div>
		  	  @endif
		      <div class="table-responsive" id="tableData">
		        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
		          <thead>
		            <tr>
		              <th>No</th>
		              <th>Name</th>
		              <th>Action</th>

		            </tr>
		          </thead>
		          <tbody>
					@php
						$no=1;
					@endphp
		            @foreach ($data as $d)

		            	<tr>
							<td>{{ $no++ }}</td>
		            		<td>{{ $d->ks_nama}}</td>
		            		<td>
		            			<div class="container">
		            				<div class="row">
			            				<a href="{{ URL::to('admin/kategori/' . $d->ks_id . '/edit') }}" class="btn btn-info">Edit</a> &nbsp &nbsp
										{{ Form::open(array('url' => 'admin/kategori/' . $d->ks_id, 'onsubmit'=>'return confirm("are you sure for delete this file?");')) }}
						                    {{ Form::hidden('_method', 'DELETE') }}
						                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
						                {{ Form::close() }}
			            			</div>
		            			</div>
		            		</td>
		            	</tr>
		            @endforeach
		          </tbody>
		        </table>
		       </div>


			  <div class="card-footer small text-muted">
			    Updated yesterday at 11:59 PM
			  </div>




@endsection
