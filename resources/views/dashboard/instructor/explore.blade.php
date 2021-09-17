 @extends('layouts.app')
 @section('main')
  <section id="explore">
    <div class="explore-top">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="jumbotron section-title">
                      <h1 class="display-4">Contrata os melhores profissionais freelancers no mercado</h1>
                      <p class="lead mb-2">Conheça os profissionais ao teu dispôr e diz olá aos nossos novos membros.</p>
                      <a href="{{ route('instructor.register') }}" class="about-btn"><span>REGISTAR-SE</span> <i class="bx bx-chevron-right"></i></a>
                      <a href="#" class="about-btn"><span>FALA CONNOSCO</span> <i class="bx bx-chevron-right"></i></a>
                </div>
            </div>
        </div> 
    </div>
    <div class="container">
        <div class="row mt-5">
            @foreach($instructors as $instructor)
            <div class="col-lg-3 mb-3 d-flex align-items-strech">
                <div class="card">
                  <img class="rounded-circle img-fluid mx-auto mt-3" src="{{ asset('img/instructors/') }}/{{ $instructor->picture }}" width="150" height="150" alt="{{ $instructor->name }}">
                  <div class="card-body">
                    <h5 class="card-title">{{ ucwords($instructor->name) }}</h5>
                    <h6 class="">{{ ucwords($instructor->profession) }}</h6>
                    <div class="rate">{{ number_format($instructor->rate, 2, ',', '.' ) }} kz/hora</div>
                    <small class="card-text "> 
                        @foreach($instructor->skills as $skill)
                            <span class="badge badge-secondary">{{ ucwords($skill->name) }}</span>
                        @endforeach
                    </small>
                  </div>
                  <div class="card-footer">
                    <a href="#" class="btn btn-primary mt-3">Go somewhere</a> 
                  </div>
                </div>
            </div>
            @endforeach 
        </div>
    </div>
  </section><!-- End Hero -->
 @endsection