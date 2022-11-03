<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/home" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="../assets/img/logo.png" style="width: 40px;"/>
            </span>
            <span class="app-brand-text menu-text fw-bolder ms-2" style="font-size: 1.75rem;">SPBE</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item" id="menuDashboard">
            <a href="/home" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Data SKPD -->
        <li class="menu-item" id="menuDataSKPD">
            <a href="/skpd" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user-account'></i>
                <div data-i18n="Analytics">Data SKPD</div>
            </a>
        </li>
        <li class="menu-item" id="menuDataSPBE">
            <a href="{{ route("domain.index") }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Analytics">Data SPBE</div>
            </a>
        </li>

        <!-- User -->
        <li class="menu-item" id="menuUserManagement">
            <a href="/user-management" class="menu-link">
                <i class='menu-icon tf-icons bx bx-user'></i>
                <div data-i18n="Analytics">User</div>
            </a>
        </li>

        <!-- Indikator SPBE -->
        <li class="menu-item" id="menuDataSPBE">
            <a href="/spbe" class="menu-link">
                <i class='menu-icon tf-icons bx bx-data'></i>
                <div data-i18n="Analytics">Indikator SPBE</div>
            </a>
            <!-- <ul class="menu-sub">
                <li class="menu-item" id="subMenudomain">
                    <a href="/admin/domain" class="menu-link">
                    <div data-i18n="Without menu">Domain</div>
                    </a>
                </li>
                <li class="menu-item" id="subMenuAspek">
                    <a href="/admin/aspek" class="menu-link">
                    <div data-i18n="Without menu">Aspek</div>
                    </a>
                </li>
                <li class="menu-item" id="subMenuIndikator">
                    <a href="/admin/indikator" class="menu-link">
                    <div data-i18n="Without menu">Indikator</div>
                    </a>
                </li>
            </ul> -->
        </li>

        <li class="menu-item" id="menuEval">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Layouts">Penilaian</div>
            </a>
        </li>

        <!-- Penilaian Mandiri -->
        <li class="menu-item" id="menuPenilaianMandiri">
            <a href="/penilaian-mandiri" class="menu-link">
                <i class='menu-icon tf-icons bx bx-notepad'></i>
                <div data-i18n="Analytics">Penilaian Mandiri</div>
            </a>
        </li>
        
        <!-- Hasil Penilaian Mandiri -->
        <li class="menu-item" id="menuHasilPenilaianMandiri">
            <a href="/penilaian-mandiri" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-book-content'></i>
                <div data-i18n="Analytics">Hasil Penilaian Mandiri</div>
            </a>
        </li>
    </ul>
</aside>
