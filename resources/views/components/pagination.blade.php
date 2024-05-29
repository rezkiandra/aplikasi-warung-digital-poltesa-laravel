<nav aria-label="Page navigation" class="mt-3">
  @if ($pages->hasPages())
    <ul class="pagination justify-content-center gap-5 text-uppercase">
      @if ($pages->onFirstPage())
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Prev</a>
        </li>
      @else
        <li class="page-item">
          <a class="page-link" href="{{ $pages->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Prev</a>
        </li>
      @endif

      @foreach ($pages as $element)
        @if (is_string($element))
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">{{ $element }}</a>
          </li>
        @endif
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $pages->currentPage())
              <li class="page-item active" aria-current="page">
                <a class="page-link" href="{{ $url }}">{{ $page }}asd</a>
              </li>
            @else
              <li class="page-item">
                <a class="page-link" href="{{ $url }}">{{ $page }}asd</a>
              </li>
            @endif
          @endforeach
        @endif
      @endforeach

      @if ($pages->hasMorePages())
        <li class="page-item">
          <a class="page-link" href="{{ $pages->nextPageUrl() }}" tabindex="-1">Next</a>
        </li>
      @else
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
        </li>
      @endif
    </ul>
  @else
    <div class="text-center text-uppercase mb-3">Tidak Ada Halaman</div>
  @endif
</nav>
