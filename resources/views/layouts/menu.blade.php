<!-- need to remove -->
@hasrole('admin')
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              CRIME
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item active">
              <a href="{{ route('solicitation.index') }}" class="nav-link">
                <i class="fas fa-list-ul"></i>
                <p>Solicitações</p>
              </a>
            </li>
            <li class="nav-item active">
              <a href="{{ route('institution.index') }}" class="nav-link">
                <i class="fas fa-list-ul"></i>
                <p>Instituições</p>
              </a>
            </li>
<!--             <li class="nav-item active">
              <a href="{{ route('trainer.index') }}" class="nav-link">
                <i class="fas fa-list-ul"></i>
                <p>Formadores</p>
              </a>
            </li> -->
          </ul>
        </li>
@endhasrole

@hasrole('trainer')
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              MENU
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item active">
              <a href="{{ route('solicitation.index') }}" class="nav-link">
                <i class="fas fa-list-ul"></i>
                <p>Solicitações</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>CÍVEL</p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-list-ul"></i>
                <p>Processos</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>USUÁRIOS</p>
            <i class="right fas fa-angle-left"></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-list-ul"></i>
                <p>Usuários</p>
              </a>
            </li>
          </ul>
        </li>
@endhasrole