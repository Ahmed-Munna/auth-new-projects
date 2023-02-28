<h1>This is About page</h1>
<p>
    <a href="{{url('/catagory')}}">catagory</a>
</p>
<table border="1">
    <p style="color:blue;">{{$loginUser}}</p>
    <p style="color:blue;">{{$totalUser}}</p>
    <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created at</th>
    </tr>
    @foreach($allUser as $index => $user)
        <tr>
            <td>{{$allUser->firstItem()+$index}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
        </tr>
    @endforeach
</table>
{{$allUser->links()}}