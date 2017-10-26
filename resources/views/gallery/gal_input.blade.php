@extends('welcome')

@section('content')

<style>

    #hover:hover img{
        opacity: 0.3;
    }

    #hover:hover .middle{
        opacity: 1;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%)
        }
</style>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3>Input Gallery</h3>
            </div>
            <div class="col">
                <div class="row pull-right">
                    <a href="{{ route('sejarah.index') }}" class="btn btn-primary btn-sm">Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="container">
                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                @if (session()->has('success'))
                    <li class="alert alert-success">{{ session()->get('success') }}</li>
                @endif
                    <form action="{{ URL::to('admin/sejarah/gallery/'.$parameter) }}" file="true" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="Gallery" class="col-sm-2 col-form-label">Gallery</label>
                            <div class="col-sm-10">
                                <input type="file" name="images[]" multiple="">  <p style="color:red;">maximal: 2MB, type: jpg, jpeg, png</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-md-auto">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3>Gallery</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                @if(count($data) > 0)

                    @foreach($data as $d)

                        <div class="col-sm-3" id="hover">
                            <img class="img-thumbnail" src="{{ url('images/gallery/'.$d->gs_gambar)}}" alt="Card image cap">
                            <div class="middle">
                                <div class="row">
                                    <div class="col-sm-3">
                                    {{ Form::open(array('url' => 'admin/sejarah/gallery/'.$d->gs_id, 'onsubmit'=>'return confirm("are you sure for delete this file?");'))  }}
						                    {{ Form::hidden('_method', 'DELETE') }}
						                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
						            {{ Form::close() }}
                                    </div>
                                </div>

                            </div>
                        </div>


                    @endforeach
                    @else

                    <p>No Available</p>

                    @endif
            </div>
        </div>

    </div>
</div>



@endsection
