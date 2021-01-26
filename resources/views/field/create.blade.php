@extends('templates/main')

@section('content')

<div class="main-content-inner">
   <!-- MAIN CONTENT GOES HERE -->
   <div class="row">
       <div class="col-sm-12">
           <div class="card mt-5">
               <div class="card-body">
                   <form action="{{route('field.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Lapangan</label>
                            <input type="text" class="form-control @error('name') invalid @enderror" id="name" name="name" placeholder="Masukkan Nama Lapangan" required value="{{old('name')}}">
                            @error('name') <small class="form-text text-danger">{{$errors->first('name')}}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Price / hour</label>
                            <input type="text" class="form-control @error('price') invalid @enderror" id="price" name="price" placeholder="Price / hour" required value="{{old('price')}}" onkeyup="rupiah(this.value)">
                            @error('price') <small class="form-text text-danger">{{$errors->first('price')}}</small> @enderror
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

                        <a href="{{route('field.index')}}" class="btn btn-danger mt-4 pr-4 pl-4">Cancel</a>
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
    function rupiah(params) {
        $('#price').val(formatRupiah(params));
    }
    
   $(document).ready(function(){
      $('.custom-file-input').on('change', function(){
         let filename = $(this).val().split('\\').pop();
         $(this).next('.custom-file-label').addClass("selected").html(filename);
      });
   });
</script>
@endpush