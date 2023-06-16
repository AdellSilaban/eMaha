@extends('layouts.main')
@section('title', 'eMaha - Form Edit')
@section('content')
<div class="card mt-4">
    <div class="card-header"><strong>FORM EDIT DATA STUDENT</strong></div>
    <div class="card-body">
        @php
         $minat = explode(',', $mhs->minat);
        @endphp
        <form action="/student/update/{{$mhs->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>NIM</label>
                <input type="number" name="nim" class="form-control" value="{{$mhs->nim}}" readonly>
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{$mhs->nama}}">
            </div>

            <label>Gender</label>
            <div class="form-check">
                <input type="radio" name="gender" class="form-check-input" value="Laki-Laki" {{($mhs->gender == 'Laki-Laki') ? 'checked':''}}>
                <label>Laki-Laki</label>
            </div>
            <div class="form-check">   
                <input type="radio" name="gender" class="form-check-input" value="Wanita" {{($mhs->gender == 'Wanita') ? 'checked':''}}>
                <label>Wanita</label>
            </div>

            <label>Program Studi</label>
            <div class="form-group">
                <select name="prodi" class="form-control">
                    <option value="0">--Pilih Program Studi--</option>
                    <option value="Sistem Informasi" {{($mhs->prodi == 'Sistem Informasi') ? 'selected':''}}>Sistem Informasi</option>
                    <option value="Arsitektur"{{($mhs->prodi == 'Arsitektur') ? 'selected':''}}>Arsitektur</option>
                    <option value="Informatika"{{($mhs->prodi == 'Informatika') ? 'selected':''}}>Informatika</option>
                </select>
            </div>

            <label>Minat</label>
            <div class="form-check">
                <input type="checkbox" name="minat[]" class="form-check-input" value="AI" {{in_array('AI', $minat) ? 'Checked':''}}>
                <label>Artificial Intelligent</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="minat[]" class="form-check-input" value="Design" {{in_array('Design', $minat) ? 'Checked':''}}>
                <label>Design</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="minat[]" class="form-check-input" value="DBMS" {{in_array('DBMS', $minat) ? 'Checked':''}}>
                <label>Database Engineer</label>
            </div>

            <div class="form-group mt-4">
                <button type="submit" role="button" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection