<div class="col">
    <button class="btn float-end" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
        aria-controls="offcanvasRight">
        <h4><i class="bi bi-list"></i></h4>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Modul</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="menu-item">
                @php
                    $i = 10;
                @endphp
                @foreach ($articles as $article)
                    @if ($article->id === 8)
                    @else
                        @if (auth()->user()->materi2 + 1 >= $article->id)
                            <form action="{{ route('call' . $i) }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item b">
                                    <div data-i18n="Analytics"><i
                                            class="fa-duotone fa-grid-2 me-2"></i>{{ $article->nama_article }}</div>
                                </button>
                            </form>
                            @php
                                $i = $i + 1;
                            @endphp
                        @else
                            <form>
                                <button disabled="disabled" class="dropdown-item b">
                                    <div data-i18n="Analytics"><i
                                            class="fa-duotone fa-grid-2 me-2"></i>{{ $article->nama_article }}</div>
                                </button>
                            </form>
                        @endif
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
