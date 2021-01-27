@extends('templates/main')

@section('content')

<div class="main-content-inner">
   <!-- MAIN CONTENT GOES HERE -->
   <div class="row">
       <div class="col-sm-12">
           <div class="card mt-5">
               <div class="card-body">
                   <form action="{{route('promo.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Promo</label>
                            <input type="text" class="form-control @error('nama') invalid @enderror" id="nama" name="nama" placeholder="Masukan Nama Promo" required value="{{old('nama')}}">
                            @error('nama') <small class="form-text text-danger">{{$errors->first('nama')}}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description Promo</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Masukan Description Promo" required>{{old('description')}}</textarea>
                            @error('description') <small class="form-text text-danger">{{$errors->first('description')}}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="file">Choose Photo</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" name="file" required>
                                    <label class="custom-file-label" for="file">Choose Photo</label>
                                </div>
                            </div>
                            @error('file') <small class="form-text text-danger">{{$errors->first('file')}}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="active">Active</label>
                            <br>
                            <label class="switch">
                                <input type="checkbox" name="active" id="active" value=1>
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <a href="{{route('promo.index')}}" class="btn btn-danger mt-4 pr-4 pl-4">Cancel</a>
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