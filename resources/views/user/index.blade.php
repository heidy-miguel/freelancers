@extends('layouts.app')

@push('page_css')
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container-fluid">
          <div class="col-md-6 col-lg-12">
            <h2 class="text-black-50 ">Usuários</h2>
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-8">
                    <form method="GET" action="{{ route('user_search') }}">
                        <div class="input-group">
                            <input type="search" name="q" class="form-control form-control-lg" placeholder="Insere o nome do usuário">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                  </div>
                  <div class="col-md-4">
                    @can('create user')
                    <a href="{{ route('users_list_pdf') }}" class="btn btn-primary btn-lg"><i class="fa fa-download"> BAIXAR</i></a>
                    <a href="{{ route('users.create') }}" class="btn mb-3 btn-primary btn-lg float-right">Novo usuário</a>
                    @endcan
                  </div>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-hover" id="mytable">
                  <thead >
                  <tr>
                    <th>#</th>
                    <th>NOME</th>
                    <th>APELIDO</th>
                    <th>E-MAIL</th>
                    <th>FUNÇÃO</th>
                    @if( auth()->user()->can('edit user') ?? auth()->user()->can('delete user'))
                    <th colspan="1">ACÇÃO</th>
                    @endif
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      @foreach($users as $index => $user)
                      <tr class="clickable-row" data-href="{{ route('users.show', [$user->id]) }}" role="button">
                          <td>{{ $index +1 }}</td>
                          <td>{{ ucfirst($user->first_name) }}</td> 
                          <td>{{ ucfirst($user->last_name) }}</td>
                          <td>{{ strtolower($user->email) }}</td>
                          <td>
                            @foreach($user->getRoleNames() as $role)
                              @if($role == 'juíz criminal')
                                <span class="p-2 badge badge-primary">{{ ucwords($role) }}</span>
                              @elseif($role == 'juíz civíl')
                                <span class="p-2 badge badge-info">{{ ucwords($role) }}</span>
                              @elseif($role == 'escrivão')
                                <span class="p-2 badge badge-warning">{{ ucwords($role) }}</span>
                              @elseif($role == 'super admin')
                                <span class="p-2 badge badge-danger">{{ ucwords($role) }}</span>
                              @endif 
                            @endforeach
                          </td>
                          @if( auth()->user()->can('edit user') ?? auth()->user()->can('delete user'))
                          <td>
                          @can('edit user')
                            <a href="{{ route('users.edit', [$user->id]) }}"><i class="fas fa-edit"></i></a>
                          @endcan
                          @can('delete user')
                            <form style="display: inline-block; " action="{{ route('users.destroy', [$user->id]) }}" method="post">
                              @csrf
                              @method('delete')
                              <button class="makelink" onclick="return confirm('Tem certeza de que deseja excluir este item?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                          @endcan
                          </td>
                          @endif
                      </tr>
                      @endforeach
                  </tr>
                  </tbody>
                </table> 
                <div class="mt-3 d-flex justify-content-center">
                  {{ $users->links() }}
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
@push('page_scripts')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {

    // make table row clickable
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });

    // data table 
    $('#example').DataTable( {
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    } );

    // message notification
    @if(Session::has('message'))
      toastr.success("{{ Session::get('message') }}");
    @endif

}); // JQuery
</script>
@endpush
