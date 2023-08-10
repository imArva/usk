<h1>{{ $book->title }}</h1>
<p>by {{ $book->author }}</p>
<p>publisher : {{ $book->publisher }}</p>
<p>date of issue : {{ $book->date_of_issue }}</p>
<p>Summary: {{ $book->summary }}</p>
<br>
@if (auth()->user()->isAdmin)
    <a href="/book/{{ $book->id }}/edit">Edit Book</a>
    <br>
    <br>
@endif
<a href="/">Back to home</a>
