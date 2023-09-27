<h1>Felhasználó szerkesztése: #{{$id}}</h1>
<h2>Menü</h2>
<ul>
    <li><a href="{{ route('users.list')}}">Felhasználók listázása</a></li>
    <li><a href="{{ route('users.show', 1)}}">Felhasználó megtekintése</a></li> 
    <li><a href="{{ url('users/show/1')}}">Felhasználó megtekintése</a></li>
    <li><a href="{{ route('users.add', 1)}}">Felhasználó hozzáadása</a></li>
    <li><a href="{{ route('users.edit', 1)}}">Felhasználó szerkesztése</a></li>
</ul>