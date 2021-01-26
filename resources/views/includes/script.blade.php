<!-- jquery latest version -->
<script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
<!-- bootstrap 4 js -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>

<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- others plugins -->
<script src="{{asset('assets/js/plugins.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>

<script>
    const gagal = $('.gagal').data('flashdata');
    if (gagal) {
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Gagal',
        text: gagal,
        showConfirmButton: false,
        timer: 2500
      })
    }

    function success(sukses){
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Berhasil',
        text: sukses,
        showConfirmButton: false,
        timer: 2500
      })
    }
    const sukses = $('.sukses').data('flashdata');
    if (sukses) {
      success(sukses);
    }

    const warning = $('.warning').data('flashdata');
    if (warning) {
      Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Peringatan',
        text: warning,
        showConfirmButton: false,
        timer: 2500
      });
    }

    function info(params) {
      Swal.fire({
        position: 'center',
        icon: 'info',
        title: 'Informasi',
        text: params,
        showConfirmButton: false,
        timer: 2500
      });
    }
    const informasi = $('.info').data('flashdata');
    if (informasi) {
      info(informasi)
    }

    $('.tombol-hapus').on('click', function (e) {
      e.preventDefault();
      const href = $(this).attr('href');
      Swal.fire({
        title: 'Yakin?',
        text: "Data ini Akan dihapus..?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
    });
    </script>

    <script>
      /* Fungsi formatRupiah */
		function formatRupiah(angka){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return rupiah;
		}
    </script>