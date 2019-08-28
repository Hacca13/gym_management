<div class="sidebar-wrapper">
    <div class="logo">
        <a href="#" class="simple-text">
            Fit&Fight
        </a>
    </div>

    <ul class="nav">

        <li @if (\Request::is('/'))
            class="active"
                @endif>
            <a href="/">
                <i class="pe-7s-home"></i>
                <p>Home</p>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="pe-7s-note2"></i>
                <p>Gestione schede</p>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="pe-7s-gym"></i>
                <p>Gestione esercizi</p>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="pe-7s-id"></i>
                <p>Gestione abbonamenti</p>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="pe-7s-users"></i>
                <p>Gestione iscritti</p>
            </a>
        </li>

        <li @if (\Request::is('courses'))
            class="active"
                @endif>
            <a href="/courses">
                <i class="pe-7s-notebook"></i>
                <p>Gestione corsi</p>
            </a>
        </li>

    </ul>
</div>
</div>