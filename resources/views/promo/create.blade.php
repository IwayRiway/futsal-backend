@extends('templates/main')

@push('after-style')
<style>
 .switch {
  position: relative;
  display: inline-block;
  width: 45px;
  height: 20px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 2px;
  bottom: 0px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(21px);
  -ms-transform: translateX(21px);
  transform: translateX(21px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 14px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@endpush

@section('content')

<div class="main-content-inner">
   <!-- MAIN CONTENT GOES HERE -->
   <div class="row">
       <div class="col-sm-12">
           <div class="card mt-5">
               <div class="card-body">
                   <form action="">
                        <div class="form-group">
                            <label for="nama">Nama Promo</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Promo" required>
                            <small id="namaHelp" class="form-text text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="description">Description Promo</label>
                            <textarea type="text" class="form-control" id="description" placeholder="Masukan Description Promo" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="file">Choose Photo</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file" required>
                                    <label class="custom-file-label" for="file">Choose Photo</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="active">Active</label>
                            <br>
                            <label class="switch">
                                <input type="checkbox" name="active" id="active">
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