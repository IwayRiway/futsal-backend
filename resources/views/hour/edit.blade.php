@extends('templates/main')

@section('content')

<div class="main-content-inner">
   <!-- MAIN CONTENT GOES HERE -->
   <div class="row">
       <div class="col-sm-12">
           <div class="card mt-5">
               <div class="card-body">
                   <form action="{{route('hour.update', $data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Jam</label>
                            <input type="text" class="form-control @error('name') invalid @enderror" id="name" name="name" placeholder="Masukan Jam" required value="{{$data->name}}">
                            @error('name') <small class="form-text text-danger">{{$errors->first('name')}}</small> @enderror
                        </div>

                        <a href="{{route('hour.index')}}" class="btn btn-danger mt-4 pr-4 pl-4">Cancel</a>
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                   </form>
               </div>
           </div>
       </div>
   </div>
</div>

@endsection('content')

@push('after-script')
<script>
   $(document).ready(function(){
      $('.custom-file-input').on('change', function(){
         let filename = $(this).val().split('\\').pop();
         $(this).next('.custom-file-label').addClass("selected").html(filename);
      });
   });
</script>
@endpush