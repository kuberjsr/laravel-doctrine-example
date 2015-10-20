<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($allUsers as $user)
        <tr>
            <td>{{ $user->getId() }}</td>
            <td>{{ $user->getName() }}</td>
            <td>{{ $user->getEmail() }}</td>
            <td>{{ $user->getCreatedAt()->format('H:i:s d/m/Y') }}</td>
            <td>{{ $user->getUpdatedAt()->format('H:i:s d/m/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{!! $allUsers->render() !!}
