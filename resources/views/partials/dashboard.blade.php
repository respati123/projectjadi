@extends('welcome')


@section('content')
<div class="container-fluid">

  <!-- Icon Cards -->
  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-fw fa-comments"></i>
          </div>
          <div class="mr-5">

            {{ $data['sejarah'] }} Sejarah
          </div>
        </div>
        <a href="{{ route('sejarah.index')}}" class="card-footer text-white clearfix small z-1">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-fw fa-list"></i>
          </div>
          <div class="mr-5">
            {{ $data['kategori'] }} Kategori
          </div>
        </div>
        <a href="{{ route('kategori.index')}}" class="card-footer text-white clearfix small z-1">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" style="background-color:#28a745;">
      Activity Of Systems
    </div>
    <div class="card-body">
      <div class="table responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Activity</th>
              <th>Time</th>
            </tr>
          </thead>
          <tbody>
            @php
              $no=1
            @endphp

            @foreach($data['table'] as $d)
              <tr>
                <td>{{ $no++}}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->hp_deskripsi }}</td>
                <td>{{ $d->created_at }}</td>

              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
