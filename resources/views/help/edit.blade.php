@extends('templates/main')

@section('content')

<div class="main-content-inner">
   <!-- MAIN CONTENT GOES HERE -->
   <div class="row">
       <div class="col-sm-12">
           <div class="card mt-5">
               <div class="card-body">
                   <form action="{{route('help.update', $data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama Pertanyaan</label>
                            <input type="text" class="form-control @error('name') invalid @enderror" id="name" name="name" placeholder="Masukan Nama Pertanyaan" required value="{{$data->name}}">
                            @error('name') <small class="form-text text-danger">{{$errors->first('name')}}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Masukan Description" required>{{$data->description}}</textarea>
                            @error('description') <small class="form-text text-danger">{{$errors->first('description')}}</small> @enderror
                        </div>

                        <a href="{{route('help.index')}}" class="btn btn-danger mt-4 pr-4 pl-4">Cancel</a>
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