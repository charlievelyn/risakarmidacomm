@extends('layouts.profile-layout')

@section('content')
<main class="dashboard">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <button type="button" class="btn btn-warning" id="btn-article">
                    Article
                </button>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Ensure jQuery is included -->
<script>
$(document).ready(function(){
    $('#btn-article').click(function(){
        window.location.href = '{{ route('db-article') }}';
    });
});
</script>
@endsection
