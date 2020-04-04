<a id="load-more-button" href="#" class="btn btn-control btn-more" data-container="newsfeed-items-grid"
    data-page="2" data-last_page="{{ $posts->lastPage() }}">
    <img src="{{ asset('socialyte/svg-icons/center/three-dots.svg') }}">
</a>

@section('script')
    <script src="{{ asset('js/load_more.js') }}"></script>
@endsection
