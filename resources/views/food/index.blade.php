@extends('templates/main')
@section('content')
<div class="main-content-inner">
   <!-- MAIN CONTENT GOES HERE -->
   <div class="row">
       <!-- Dark table start -->
       <div class="col-sm-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-right">
                        <a href="{{route('food.create')}}" class="btn btn-flat btn-primary btn-xs" style="color: white;"><i class="ti-plus mr-1"></i> Add</a>
                    </h4>
                    <div class="data-tables datatable-dark">
                        <table id="dataTable3" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $db)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$db->name}}</td>
                                    <td>IDR {{$db->price}}</td>
                                    <td>{{$db->type==1?'Food':'Beverage'}}</td>
                                    <td>
                                        <img src="{{asset($db->photo)}}" alt="" width="70" height="70" style="border-radius: 8px">
                                    </td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3"><a href="{{route('food.edit', $db->id)}}" class="text-success"><i class="fa fa-edit" title="Edit"></i></a></li>
                                            <li><a href="{{route('food.destroy', $db->id)}}" class="text-danger tombol-hapus" title="Delete"><i class="ti-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dark table end -->
   </div>
</div>

@endsection('content')