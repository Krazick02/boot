<div class="row">
    <div class="side-bar-menu col-3">
        <!-- inicia sidebar -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="productos.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="../assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="../assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="productos.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="../assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="../assets/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>

                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="fa-sharp fa-solid fa-circle-plus"></i> <span data-key="t-dashboards">Productos</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="productos.php" class="nav-link" data-key="t-analytics"> Agregar producto </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="productos.php" class="nav-link" data-key="t-analytics"> Ver lista de productos </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarTables" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTables">
                                <i class="mdi mdi-grid-large"></i> <span data-key="t-tables">Etiquetas</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarTables">
                                <ul class="nav nav-sm flex-column">
                                    <?php foreach($tags as $t): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-key="t-line" href="pTags.php?tagId=<?php echo $t->id ?>">
                                            <?php echo $t->name; ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarnft" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarnft" data-key="t-nft-marketplace">
                                <i class="fa-solid fa-ticket-simple"></i> <span data-key="t-dashboards">Cupones</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarnft">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="cupones.php" class="nav-link" data-key="t-marketplace"> Agregar cupon </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cupones.php" class="nav-link" data-key="t-explore-now"> Ver lista de cupones </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCharts">
                                <i class="fa-sharp fa-solid fa-hand-holding-heart"></i> <span data-key="t-charts">Categorias</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCharts">
                                <ul class="nav nav-sm flex-column">
                                    <!-- inicio categoria -->
                                    <?php foreach($categories as $categ): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-key="t-line" href="pCategoria.php?categoria=<?php echo $categ->id ?>">
                                            <?php echo $categ->name; ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                    <!-- fin categoria -->
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                                <i class="fa-sharp fa-solid fa-mug-hot"></i> <span data-key="t-icons">Marcas</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarIcons">
                                <ul class="nav nav-sm flex-column">
                                    <!-- inicio marca -->
                                    <?php foreach($marcas as $marca): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-key="t-line" href="pBrand.php?brand=<?php echo $marca->id ?>">
                                            <?php echo $marca->name; ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                    <!-- fin marca -->
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMaps">
                                <i class="fa-sharp fa-solid fa-face-smile"></i> <span data-key="t-maps">Usuario</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarMaps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="charts-apex-line.html" class="nav-link" data-key="t-line"> Agregar usuarios </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-line.html" class="nav-link" data-key="t-line"> Ver usuarios </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                                <i class="fa-sharp fa-solid fa-user-plus"></i> <span data-key="t-multi-level">Clientes</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarMultilevel">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="charts-apex-line.html" class="nav-link" data-key="t-line"> Agregar clientes </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-line.html" class="nav-link" data-key="t-line"> Ver clientes </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                    <!-- Sidebar -->
                </div>

                <div class="sidebar-background"></div>
            </div>
            <!-- termina Sidebar -->
        </div>
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <!-- end main content-->
    </div>
</div>