<nav class="navbar bg-body-tertiary p-0 ">
    <div class="container-fluid ">
        <div class="d-flex gap-3">

            <div class="content-header ">
                <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
            </div>
            <div class="separator">
            </div>

            <div class="content-header">
                <a class="logo" href="/">
                    <img src="/assets/logo1.png" alt="Logo operación estratégica">
                </a>
            </div>
        </div>

        <div class="d-flex gap-3 header-info">

            <div class="separator"></div>
            <div class="content-header">

                <a href="#">Log In</a>
            </div>


            <div class="separator"></div>
            <div class="content-header">

                <a href="#">Log In</a>
            </div>


        </div>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->botonactivo == 1 ? 'active' : '' ?>" aria-current="page" href="/">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->botonactivo == 2 ? 'active' : '' ?>" href="/page/nosotros">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->botonactivo == 3 ? 'active' : '' ?>" href="/page/servicios">Nuestros Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->botonactivo == 4 ? 'active' : '' ?>" href="/reorganizacionempresarial">Reorganización Empresarial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->botonactivo == 5 ? 'active' : '' ?>" href="/page/mesadeayuda">Mesa de Ayuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->botonactivo == 6 ? 'active' : '' ?>" href="/page/contactenos">Contáctenos</a>
                    </li>
                   <!--  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->
                </ul>
               <!--  <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </div>
</nav>