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
                        <a href="{{route('hour.create')}}" class="btn btn-flat btn-primary btn-xs" style="color: white;"><i class="ti-plus mr-1"></i> Add</a>
                    </h4>
                    <div class="data-tables datatable-dark">
                        <table id="dataTable3" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $db)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$db->name}}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3"><a href="{{route('hour.edit', $db->id)}}" class="text-success"><i class="fa fa-edit" title="Edit"></i></a></li>
                                            <li><a href="{{route('hour.destroy', $db->id)}}" class="text-danger tombol-hapus" title="Delete"><i class="ti-trash"></i></a></li>
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

@push('after-script')
    <script>
        function active(promo_id){
            var checkbox = document.getElementById(`active_`+promo_id).checked;
            var active = (checkbox==true)?1:0;

            $.ajax({
                url : `{{route('promo.updateActive')}}`,
                type : "POST",
                dataType : "json",
                data    : {_token:"{{csrf_token()}}", id:promo_id, active:active},
                success : function(data) {
                    if(active == 1){
                        success('Berhasil diaktifkan');
                    } else {
                        info('Berhasil dinonaktifkan');
                    }
                }
            });
        }
    </script>
@endpush