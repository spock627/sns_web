<html>
	<body>
		<table border=1 center>
			<tr>
				<th>id</th>
				<th>名字</th>
				<th>邮箱</th>
				<th>密码</th>
				<th>操作</th>
			</tr>
			@foreach ($data as $key => $user)
				<tr>
					<td>{{ $user->id}}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->password }}</td>
					<td><button class='del' data-id="{{$user->id}}">删除</button></td>
				</tr>
            @endforeach
		</table>
		<div>
			<span>
				<a href="register" target="blank">返回注册页面</a>
			</span>
		</div>
	</body>
</html>
{{ HTML::script('common/js/jquery-1.6.min.js') }}
{{ HTML::script('common/js/bootstrap.min.js') }}
<script>
	$('.del').click(function() {
		var uid = $(this).attr('data-id');
		$.ajax({
            url:'del',
            data:'uid='+uid,
            type:'post',
            dataType: 'json',
            success:function(data) {
				if(data.ec == 200) {
					location.reload();
				} 
            }
			
		})
	})
</script>

