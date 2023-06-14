
<div class="m-2-lr">

    
    @if(count($blogs) > 0)
        <strong class="m-1-ub">Your Posts:</strong>
        @foreach($blogs as $blog)
            <ul>
                <li>{{ $blog->title }} - {{ $blog->user->name }}</li>
            </ul>
        @endforeach
    @else
        <h2>You Have no Post</h2>
    @endif
  

</div>

