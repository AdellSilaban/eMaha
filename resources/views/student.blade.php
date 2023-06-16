@extends('layouts.main')
@section('title','eMaha - student')
@section('content')
<div class="card mt-4">
    <div class="card-header">
      <a href="/student/formadd" class="btn btn-primary" role="button"><i class="bi bi-plus-square-fill"></i>Mahasiswa</a>
      <form action = "/student/search" method="GET" class="form-inline my-2 my-lg-0 float-right">
        <input name="q" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
      </form>
      <div class="card-body">
        @if (session('flash'))
        @php
        $flashType = session('flash_type');
        $alertClass = '';

        switch ($flashType){
            case 'success':
                $alertClass = 'alert-success';
                break;
            case 'primary':
                $alertClass = 'alert-primary';
                break;
            case 'danger':
                $alertClass = 'alert-danger';
                break;
            default:
                $alertClass = 'alert-warning';
                break;
        }
        @endphp
        <div class="alert {{ $alertClass }} alert-dismissible fade show" role="alert">
            <strong>{{session ('flash')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Gender</th>
                <th scope="col">Prodi</th>
                <th scope="col">Minat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach ($mhs as $idx =>$n)
              <tr>
                <td>{{$n->id}}</td>
                {{--<th scope="row"> {{$mhs->firstItem() + $idx}} </th>--}}
                <td>{{$n->nim}}</td>
                <td>{{$n->nama}}</td>
                <td>{{$n->gender}}</td>
                <td>{{$n->prodi}}</td>
                <td>{{$n->minat}}</td>
                <td>
                  <a href="/student/formedit/{{$n->id}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                  <a class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus ?')" 
                  href="/student/delete/{{ $n->id }}"><i class="bi bi-trash3"></i></a>
                </td>
              </tr>
            @endforeach
              <tr>      
            </tbody>
          </table>
          <span class="float-left">{{$mhs->count()}}</span>
          <span class="float-right">{{$mhs->links()}}</span>
    </div>
  </div> 
@endsection   