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
				<a href="{{ route('sejarah.index') }}" class="btn btn-primary btn-sm">Back</a>
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
		{!! Form::model($sejarah, ['method'=>'PATCH','route'=> ['sejarah.update', $sejarah->sj_id], 'files'=>'true','encypte'=>'multipart/form-data']) !!}
	  {{ csrf_field() }}
	    <div class="form-group row">
	      <label for="nama_sejarah" class="col-sm-2 col-form-label">History Name</label>
	      <div class="col-sm-10">
	        <input type="text" class="form-control" value="{{$sejarah->sj_nama}}" id="nama_sejarah" name="namasejarah" placeholder="Nama Sejarah">
	      </div>
	    </div>
	    <div class="form-group row">
	    	<label for="kategori" class="col-sm-2 col-form-label">category history</label>
	    	<div class="col-sm-10">
	    		<select name="kategori_sejarah" class="form-control">
	    				<option value="{{ $sejarah->ks_id}}">{{ $sejarah->kategori->ks_nama}}</option>
	    			@foreach ($kategori as $k)
	    				<option value="{{ $k->ks_id}}">{{ $k->ks_nama }}</option>
	    			@endforeach
	    		</select>
	    	</div>
	    </div>	
	    <div class="form-group row">
			
			<label for="Images" class="col-sm-2 col-form-label">Images</label>
			<div class="col-sm-10">
					<div><img src="{{ url('images/sejarah/'.$sejarah->sj_gambar)}}" style="width:200px; height:200px;"></img></div>
		    	<input type="file" class="form-control-file" name="images" id="images">
			</div>
		</div>
		 <div class="form-group row">
			<label for="map" class="col-2 col-form-label">Koordinat</label>
			<div class="col">
				<input type="text" id="autocomplete" value="{{ $sejarah->sj_alamat }}" name="alamat" class="form-control">
				<br>
				<div id="map_edit" style="width:600px; height:400px"></div>
				<div class="row">
					<div class="col">
						<label for="lag" class="col col-form-label">Long</label>
						<input type="text" name="lng" value="{{ $sejarah->sj_lng }}" id="lng" class="form-control" readonly="readonly">
					</div>
					<div class="col">
						<label for="lag" class="col col-form-label">lat</label>
						<input type="text" name="lat" id="lat" value="{{ $sejarah->sj_lat }}" class="form-control" readonly="readonly" >
					</div>
				</div>	
			</div>
		</div>
		<div class="form-group row">
			<label for="description" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-10">
				<textarea name="description" class="form-control" style="height:200px" on_click="this.value='Hello\nHow R U?'">{{ $sejarah->sj_deskripsi}}</textarea>
			</div>
		</div>
		<div class="form-group row">
			<label for="youtube" class="col-sm-2 col-form-label">Link Youtube</label>
			<div class="col-sm-10">
				<input type="text" name="link" value="{{ $sejarah->sj_youtube}}" class="form-control">
			</div>
		</div>
	    <div class="form-group row">
	      <div class="col-md-10 ml-md-auto">
	        <button type="submit" class="btn btn-primary" id="add">Save</button>
	      </div>
	    </div>
		{!! Form::close() !!}
	</div>
  </div>
</div>
@push('script_maps')

	<script>
		function InitMap(){
				var lat   = parseFloat(document.getElementById('lat').value);
				var lng   = parseFloat(document.getElementById('lng').value);
				var position = {lat:lat, lng:lng};
				var map = new google.maps.Map(document.getElementById('map_edit'), {
						zoom: 17,
						center: position
				});

				var marker = new google.maps.Marker({

					position:position,
					map:map
				})

				var autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'));

				autocomplete.bindTo('bounds', map);
				var infoWindow  = new google.maps.InfoWindow();
				autocomplete.addListener('place_changed', function(){

					infoWindow.close();
					marker.setVisible(false);
					var place = autocomplete.getPlace();
					if(!place.geometry){

						window.alert('not available');
						return;
					}

					if(place.geometry.viewport){
						map.fitBounds(place.geometry.viewport);
					}else {
						map.setCenter(place.geometry.location);
						map.setZoom(17);
					}

					marker.setIcon(/** @type {google.maps.Icon} */({
						url: place.icon,
						size: new google.maps.Size(71, 71),
						origin: new google.maps.Point(0, 0),
						anchor: new google.maps.Point(17, 34),
						scaledSize: new google.maps.Size(35, 35)
					}));

					marker.setPosition(place.geometry.location);
					marker.setVisible(true);
					var address = '';
						if (place.address_components) {
							address = [
								(place.address_components[0] && place.address_components[0].short_name || ''),
								(place.address_components[1] && place.address_components[1].short_name || ''),
								(place.address_components[2] && place.address_components[2].short_name || '')
							].join(' ');
						}

						infoWindow.setContent('<div><strong>' + place.name + '</strong><br>' + place.geometry.location.lat(), place.geometry.location.lng() );
						infoWindow.open(map, marker);

						document.getElementById('lat').value = place.geometry.location.lat();
     				document.getElementById('lng').value = place.geometry.location.lng();
				});

		}
		
	
	</script>

@endpush
@endsection