
<h2>tro</h2>
<form action="{{ route('getData') }}" method="post">
    @csrf
    <input type="text" name="item">
    <button type="submit">Submit</button>
    </form>

<h2>blog</h2>
    <form action="{{ route('getBlogDetails') }}" method="post">
        @csrf
        <input type="text" name="item">
        <button type="submit">Submit</button>
        </form>
    
    