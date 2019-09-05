@extends('layouts.master')

@section('title')
User

@endsection

@section('content')

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Data User</h1>
 <div class="card">
  <div class="card-header">
  <a href="{{route('register')}}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i>Tambah</a> 
  </div>

          <div class="card-body">
         @if (Session::has('edit'))
          <div class="alert alert-info alert-dismissible">{{Session::get('edit')}}</div>
          @endif

          @if (Session::has('delete'))
          <div class="alert alert-danger alert-dismissible">{{Session::get('delete')}}</div>
          @endif


 <table class="table table-border" id="data">
           <thead>
              <th>Nomer</th>
              <th>Nama User</th>  
              <th>Email</th>
              <th>Password</th>
              <th>Role</th>  
              <th>Aksi</th>
           </thead>
           <tbody>
            <?php $no=1; ?>
            @foreach($user as $row)
           
             <tr>
               <td>{{ $no++}}</td>
               <td> {{ $row->name}}</td>
               <td>{{$row->email}}</td>
               <td> {{ $row->password}}</td>
               <td>{{$row->role}}</td>
               <td>
                <form action="{{route('user.destroy',$row->id)}}" method="POST">  
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

                    <!--FUNGSI EDIT-->
                    <a href="{{route('user.edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>  
                    <!---->

                    <?php echo csrf_field(); ?>
                    
                    </form>
               </td>
             </tr>
            
             @endforeach
              <?php $no++; ?>
           </tbody>


         </table>
         </div>
       </div>


@endsection