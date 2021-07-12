@extends('layouts.admin', ['title'=> 'Pelanggan'])

@section('content')
       <div class="section-content section-dashboard-home">
            <div class="container-fluid">
                    <div class="dashboard-heading">

                        <h2 class="dashboard-title">Laporan Dashboard</h2>
                     </div>

                    <div class="dashboard-content my-5 mx-3">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                        <div class="d-flex justify-content-center my-4 "  >
                                            <div class="col-md-3">

                                                <div>

                                                    <input type="date" id="tgl_awal" name="tgl_awal" class="form-control" onchange="range()">
                                                </div>
                                                
                                            </div>
                                            {{-- <h5>TO</h5> --}}
                                            <div class="col-md-3">
                                                <div>

                                                    <input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control" onchange="range()">
                                                </div>
                                            </div >
                                            <div class="col-md-2">
                                                

                                                <button id="filter" class="btn btn-danger" >RESET</button>
                                            </div>
                                        </div>
                                        <div class="table table-responsive">
                                            <table class="table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                         <th>Name</th>
                                                         <th>No Phone</th>
                                                         <th>Kode Pembayaran</th>
                                                         <th>Tanggal Main</th> 
                                                         <th>Status Pembayaran</th>
                                                         {{-- <th>Tanggal Bayar</th> --}}
                                                         <th>Harga</th> 
                                                    </tr>

                                                </thead>
                                                    <tbody id="laporan">

                                                    </tbody>
                                                </table>
                                        </div>     
                               
                                <div class="card-footer">
                                    <div class="row">

                                        <div class="col-md-8" id="print">

                                           <a onclick="this.href='print/'+document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value" id="print" class="btn btn-warning">Cetak</a>
                                           {{-- <a class="btn btn-warning" id="print"> Cetak </a> --}}
                                        </div>
                                        <div class="d-flex col-md-4 ml-auto ">
                                   
                                            Total Pendapatan = <span id="total"></span>

                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                    </div>
         </div>
        </div>
@endsection
@push('after-script')
<script>
    $(document).ready(function(){
        range = () => {
            laporan();
        } 
            $('#filter').click(function () {
                $('#tgl_awal').val('');
                 $('#tgl_akhir').val('');
                  $('#total').empty();
                   $("#laporan").empty();
            })

        function laporan() {
            awal = $('#tgl_awal').val();
            akhir =  $('#tgl_akhir').val();
            let no = 0;
            let ajax =  
             $.ajax( {
                url : 'laporan/'+ awal + '/'+ akhir,
                type: 'get',
              
                success : function(res) {
                            if (res) {
                            res.data.map((response , index) => {
                                let ind = index + 1;
                                $('#laporan').append('<tr><td>'+ind+'</td>'+'<td>'+response.user.name+'</td>' 
                                +'<td>'+response.user.phone_number+'</td>' +'<td>'+response.kode_pembayaran+'</td>' 
                                 +'<td>'+response.jadwal.tanggal_main+'</td>'  +'<td>'+response.status_pembayaran+'</td>'
                                +'<td>'+response.total_bayar+'</td></tr>' );
                            });
                                $('#total').html('Rp.'+ res.total);
                            } 
                }
            
            })

          
        }

        // $('#print').click(function () {
        //     let awal = $('#tgl_awal').val();
        //     let akhir =  $('#tgl_akhir').val();
        //     const print = $.ajax({
        //         url: 'print/' + awal + '/' + akhir,
        //         type: 'get',
        //     });
        // })


    })

</script>


    
@endpush
