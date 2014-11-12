Zarejestrował się użytkownik o danych:<br>
Email: {{$email}}<br>
Imię: {{$first_name}}<br>
Nazwisko: {{$last_name}}<br>
Hasło: {{$password}}<br>

Aby go aktywować:<br>
<a href="{{ URL::route('user.auth', array('code'=>$activation_code, 'id'=>$id)); }}">Aktywuj</a>