@extends('layouts.test' , ['tittle' => 'Home Page Sawangan Golf'])

@section('content')
<div class="page-content page-home">
    <section class="golf-home">
        <div class="jumbotron">
            <div class="container text-jumbo">
                    <div class="row justify-content-center">
                        <div class="heading ">

                            <h1 data-aos="fade-left" data-aos-delay="200">
                                Sawangan Golf Course<br><span>Country Club</span>
                            </h1>
                            <p class="text-secondary" data-aos="fade-right" data-aos-delay="250">lets book and play golf with your family</p>
                        </div>
                    </div>
                   
            </div>
        </div>
        <div class="info">
           <div class="container">
               <div class="row">
                <div class="col-md-6" data-aos-delay="150" data-aos="fade-right">
                    <img src="https://images.unsplash.com/flagged/photo-1576448438685-9f5e5b283d4f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDF8fGdvbGYlMjBjb3Vyc2V8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                </div>
                <div class="col-md-6">
                    <h1 class="mb-4" data-aos="fade-down">Stay Healthy And Keep Your Immune</h1>
                    <hr>
                    <h5 class="mb-3" data-aos="fade-up">
                        let's play golf and booking at <span style="font-weight:bold">
                            Sawangan Golf Course
                    </span>
                    </h5>
                    <div class="text-secondary home-info " id="info-text">
                        <p data-aos-delay="200" data-aos="fade-up">
                        Sawangan Golf provides an interesting experience for everyone who plays here. from junior golfers, amateurs, or pro golf. at a low price you can get it all .. <span style="color: #494949; font-weight:bold">
                            ONLY HERE
                            </span>
                        </p>
                    </div>
                    <div class="row home-price" id="price">
                        <div class="col-md-3"  data-aos="fade-down" data-aos-delay="200">
                            <p>WEEKENDS</p>
                        <div class="text-price weekend">
                            Rp. 350.000    
                        </div>
                        </div>
                    <div class="col-md-3"  data-aos="fade-down" data-aos-delay="250">
                        <p>WEEKDAYS</p>
                        <div class="text-price weekday">
                            Rp. 250.000
                        </div>
                    </div>
                    <div class="button">

                        <a href="" class="btn detail" id="detail" data-aos="fade-up" data-aos-delay="300"> Booking</a>
                    </div>
                    </div>
                </div>
           </div>
           </div>
        </div>
    </section>
</div>

@endsection
@push('after-script')
<script>

    $(document).ready(function(){
        $("#detail").click(function(){
         $("#info-text").fadeIn('slow');
         $("#price").fadeIn(2500);
         $("#price").addClass('d-flex')

         $('.button').empty();
    });
    });
</script>
@endpush

