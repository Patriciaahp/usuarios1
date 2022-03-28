{{ csrf_field() }}

<div class="form-group">
    <label for="first_name">Nombre:</label>
    <input type="text" name="first_name" value="{{  $user->name }}" class="form-control">
</div>
<div class="form-group">
    <label for="last_name">Apellidos:</label>
    <input type="text" name="last_name" value="{{ old('last_name', $user->surname) }}" class="form-control">
</div>
<div class="form-group">
    <label for="email">Correo Electrónico</label>
    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
</div>
<div class="form-group">
    <label for="password">Contraseña: </label>
    <input type="password" name="password" class="form-control">
</div>
<h5 class="mt-3">Estado</h5>

@foreach(trans('users.states') as $state => $label)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="state" id="state_{{ $state }}" value="{{ $state }}"
            {{ old('state', $user->state) == $state ? ' checked' : '' }}>
        <label class="form-check-label" for="state_{{ $state }}">{{ $label }}</label>
    </div>
@endforeach
