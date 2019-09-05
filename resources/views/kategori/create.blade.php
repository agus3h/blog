@extends('layouts.master')

@section('title')
Kategori

@endsection

@section('content')

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Data Kategori</h1>
<div class="card">

  <form action="{{route('kategori.store')}}" method="post">
        <div class="card-body">
        
          <?php echo csrf_field();?>
            <div class="form-group">
              <label for="">Nama Kategori <sup>*</sup></label>
              <input type="text" name="nama" class="form-control" id="nama" value="{{old('nama')}}" placeholder="Biasa, Rahasia, Penting dll" autofocus>
               <span class="help-block text-danger">{{$errors->first('nama')}}</span>
            </div>

            <div class="form-group">
              <label for="">Slug<sup>*</sup></label>
              <input type="text" name="slug" class="form-control" id="slug" value="{{old('slug')}}" placeholder="Biasa, Rahasia, Penting dll" autofocus>
               <span class="help-block text-danger">{{$errors->first('slug')}}</span>
            </div>
        
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
           <a href="{{route('kategori.index')}}" class="btn btn-default">Kembali</a>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        <!-- /.card-footer-->
      </form>
  </div>
@endsection