<h1>Users' list</h1>

<table border = 1>
<tr>
	<td>User Name</td>
	<td>Email</td>
	<td>Role</td>
	<td>Operation</td>
	
</tr>
@foreach($users as $user)
<tr>
	<td>{{$user->name}}</td>
	<td>{{$user->email}}</td>
	<td>{{$user->role}}</td>
	<td><a href={{"sendreport/".$user->id}}>Send Report</a></td>
	
</tr>
@endforeach

</table>