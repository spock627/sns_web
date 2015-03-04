<html>
	<body>
		<table>
			<tr>
				<th>id</th>
				<th>名字</th>
				<th>邮箱</th>
				<th>密码</th>
			</tr>
			@foreach ($data as $key => $user)
				<tr>
					<td>{{ $user->id}}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->password }}</td>
				</tr>
            @endforeach

		</table>
	</body>
</html>
