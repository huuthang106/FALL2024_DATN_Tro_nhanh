<form action="{{ route('getData') }}" method="post">
    @csrf
    <input type="text" name="item">
    <button type="submit">Submit</button>
</form>
