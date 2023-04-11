    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-4">Nav</span>
      </a>
      

      <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('home-route') }}">{{ __('messages.menu_main') }}</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('contact-route') }}">{{ __('messages.menu_contacts') }}</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('client-route') }}">{{ __('messages.menu_clients') }}</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('abort-route') }}">{{ __('messages.menu_about') }}</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('lang-change', ['locale' => 'ua']) }}">Українська</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('lang-change', ['locale' => 'ru']) }}">Русский</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('lang-change', ['locale' => 'en']) }}">English</a>
      </nav>
      <h3>{{ Session::get('locale') }}</h3>
    </div>