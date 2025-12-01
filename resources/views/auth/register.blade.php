<form method="POST" action="/register">
    @csrf
    <input type="text" name="name" placeholder="Nombre">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Contraseña">
    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña">
    <button type="submit">Registrarse</button>
</form>

¿Ya tienes una cuenta? <a href="/login">Inicia sesión aquí</a>.