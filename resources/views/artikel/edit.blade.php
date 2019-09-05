@extends('layouts.master')

@section('title')
Artikel

@endsection

@section('content')

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Data Artikel</h1>
<div class="card">

  <form action="{{route('artikel.update',$artikel->id)}}" method="post" enctype="multipart/form-data">
     <input type="hidden" name="_method" value="PUT">
        <div class="card-body">
        
          <?php echo csrf_field();?>
            <div class="form-group">
              <label for="">Judul Artikel <sup>*</sup></label>
              <input type="text" name="judul" class="form-control" value="{{$artikel->judul}}" autofocus>
               <span class="help-block text-danger">{{$errors->first('judul')}}</span>
            </div>

            <div class="form-group">
              <label for="">Isi Artikel<sup>*</sup></label>
              <textarea name="body" id="body" class="ckeditor {{$errors->has('body') ? 'is-invalid' : ''}}" rows="5" placeholder="Waktu, Tempat dll">{{$artikel->body}}</textarea>
               <span class="help-block text-danger">{{$errors->first('body')}}</span>
            </div>


            <div class="form-group">
              <label for="">Katergori Artikel <sup>*</sup> </label>
              <select name="kategori_id" class="form-control" id="kategori_id">
                @foreach($kategori as $row)
              <option value="{{$row->id}}" {{$row->id == $artikel->kategori_id ? 'selected':''}}>{{$row->nama}}</option>
                @endforeach
              </select>
              <span class="help-block text-danger">{{$errors->first('kategori_id')}}</span>
            </div>

              <div class="form-group">
              <label for="">Gambar <sup>*</sup> </label>
               <input type="file" name="gambar" class="form-control" value="{{old('gambar')}}">
             @if($artikel->gambar != '')
              <img src="{{asset('public/uploads/'.$artikel->gambar)}}"class="img-thumbnail" width="1200px" height="50px">
              @else
              <img src="{{asset('public/uploads/no-image.png')}}" class="img-thumbnail" width="1200px" height="50px">
              @endif       
             <span class="help-block text-danger">{{$errors->first('gambar')}}</span>
            </div>
        
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
           <a href="{{route('artikel.index')}}" class="btn btn-default">Kembali</a>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        <!-- /.card-footer-->
      </form>
  </div>

  <style type="text/css">
  #body{
    resize: none;
  }
</style>
@endsection