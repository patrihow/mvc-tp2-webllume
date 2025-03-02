{{ include('layouts/header.php', {title:'Projets'})}}
<h1>Clients</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>View</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        {% for client in clients %}
        <tr>
            <td>{{client.name}}</td>
            <td>{{client.address}}</td>
            <td>{{client.phone}}</td>
            <td>{{client.email}}</td>
            <td> <a href="{{base}}/client/show?id={{client.id}}" class="btn">View</a></td>
            <td>
                <form action="{{base}}/client/delete" method="post">
                    <input type="hidden" name="id" value="{{client.id}}">
                    <input type="submit" class="btn red" value="delete">
                </form>
            </td>
        </tr>
        {% endfor %}
    </tbody>
</table>
<br><br>
<a href="{{base}}/client/create" class="btn">New Client</a>
{{ include('layouts/footer.php')}}