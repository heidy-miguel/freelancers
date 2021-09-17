@extends('layouts.app')
@section('main')
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6">
              <section id="register" class="d-flex align-items-center"> 
                <div class="container" data-aos="zoom-out" data-aos-delay="100">
                  <div class="row">
                    <div class="col-xl-6">
                      <h2>A melhor maneira de encontrar novas oportunidades e profissionais para a tua carreira ou projecto!</h2>
                      <h3 style="color: white">Rápido, simples e ágil.</h3>
                      <a href="#about" class="btn-get-started">Saber mais</a>
                    </div>
                  </div>
                </div>
          </div>

          <div class="col-lg-6 mt-5">
<!--             <div class="portfolio-info">
              <h3>Registar-se como Formador</h3>
              <ul>
                <li><strong>Category</strong>: Web design</li>
                <li><strong>Client</strong>: ASU Company</li>
                <li><strong>Project date</strong>: 01 March, 2020</li>
                <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>This is an example of portfolio detail</h2>
              <p>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
              </p>
            </div> -->
            <div class="portfolio-details">
                <form id="registrationForm" action="{{ route('instructor.create') }}" method="post">
                  @csrf
                    <div class="form-group">
                        <label for="first_name" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="form-label">Apelido</label>
                        <input type="text" class="form-control" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="********">
                    </div>
                    <div class="form-group mb-0">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="terms" class="custom-control-input" required>
                        <label class="" for="terms">Concordo com os <a href="#">termos e condições de serviços</a>.</label>
                      </div>
                    </div>
                    <button type="submit" class="get-started-btn mt-3 rounded" style="float: right;">Registar-se</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->
@endsection
@push('page_js')
<script src="{{ asset('vendor/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $('#registrationForm').validate({
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
            },
            messages: {
                first_name: {
                    required: "insere"
                }
            },
        });
    });
</script>
@endpush