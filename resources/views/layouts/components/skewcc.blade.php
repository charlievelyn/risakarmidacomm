<!-- White Section -->
<!-- <div class="row separator"></div> -->
<div class="row content">
        <div class="divider">
                <span></span><span>
                        <h1>{{ $sectionheader }}</h1>
                </span><span></span>
        </div>
        @if(!empty($sectionparagraph))
                <p>{{ $sectionparagraph }}</p>
        @endif
</div>