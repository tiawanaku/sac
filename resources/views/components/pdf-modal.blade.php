@if(isset($pdfUrl))
    <!-- Mostrar un solo PDF -->
    <iframe src="{{ $pdfUrl }}" style="width:100%; height:500px;" frameborder="0"></iframe>
@elseif(isset($pdfUrls))
    <!-- Mostrar múltiples PDFs en un carrusel -->
    <div id="pdfCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($pdfUrls as $index => $pdfUrl)
                <div class="carousel-item @if($index == 0) active @endif">
                    <iframe src="{{ $pdfUrl }}" style="width:100%; height:500px;" frameborder="0"></iframe>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#pdfCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#pdfCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@else
    <p>No hay PDF disponible.</p>
@endif
