<!doctype html>
<html lang="ru">
<body>
<p>У нас новая регистрация!</p>

<table>
    @foreach($user as $key => $item)
        <tr>
            <td>{{ $key }}</td>
            <td>{{ $item }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>
