 @extends('layouts.app')
 @section('main')
  <section id="explore">
    <div class="explore-top">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="jumbotron section-title">
                      <h1 class="display-4">Encontra oportunidades para alevancar a tua carreira</h1>
                      <p class="lead mb-2">Mais de 50 oportunidades diárias para você!.</p>
                      <a href="#" class="about-btn"><span>REGISTAR-SE</span> <i class="bx bx-chevron-right"></i></a>
                      <a href="#" class="about-btn"><span>FALA CONNOSCO</span> <i class="bx bx-chevron-right"></i></a>
                </div>
            </div>
        </div> 
    </div>
    <div class="container">
        <div class="row mt-5">
            @foreach($jobs as $job)
            <div class="col-lg-3 mb-3 d-flex align-items-strech">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title ">{{ $job->title }}</h5>
                    <small class=" mt-2 card-text ">
                        @foreach($job->skills as $skill)
                            <span class="badge badge-secondary">{{ $skill->name }}</span>
                        @endforeach
                    </small>
                    <p class="mt-2">{{ $job->description }}</p>
                  </div>
                  <div class="card-footer">
                    <a href="{{ route('job.show', [$job->id]) }}" class="about-btn"><span>Saber mais</span> <i class="bx bx-chevron-right"></i></a> 
                  </div>
                </div>
            </div>
            @endforeach 
        </div>
    </div>
  </section><!-- End Hero -->
 @endsection