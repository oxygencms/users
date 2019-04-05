<div class="row">
    <!-- name -->
    <div class="form-group col-6">
        <label for="name">Name <strong>*</strong></label>
        <input type="text"
               class="form-control {{ $errors->has('name') ? 'is-invalid' : null }}"
               id="name"
               name="name"
               placeholder="Enter user name..."
               value="{{ old('name', optional($user)->name) }}"
        >
        {!! $errors->first('name', '<small class="form-text text-danger">:message</small>') !!}
    </div>

    <!-- email -->
    <div class="form-group col-6">
        <label for="email">Email <strong>*</strong></label>
        <input type="email"
               class="form-control {{ $errors->has('email') ? 'is-invalid' : null }}"
               id="email"
               name="email"
               placeholder="Enter user email..."
               value="{{ old('email', optional($user)->email) }}"
               required
        >
        {!! $errors->first('email', '<small class="form-text text-danger">:message</small>') !!}
    </div>

    @unless($user)
    <!-- password -->
    <div class="form-group col-6">
        <label for="email">Password <strong>*</strong></label>
        <input type="password"
               class="form-control {{ $errors->has('password') ? 'is-invalid' : null }}"
               id="password"
               name="password"
               placeholder="Enter user password..."

        >
        {!! $errors->first('password', '<small class="form-text text-danger">:message</small>') !!}
    </div>

    <!-- password_confirmation -->
    <div class="form-group col-6">
        <label for="email">Password confirmation <strong>*</strong></label>
        <input type="password"
               class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : null }}"
               id="password_confirmation"
               name="password_confirmation"
               placeholder="Confirm the user's password..."

        >
        {!! $errors->first('password_confirmation', '<small class="form-text text-danger">:message</small>') !!}
    </div>
    @endunless

    <div class="form-group col-6">
        <!-- phone -->
        <div class="row">
            <div class="col-12 mb-4">
                <label for="phone">Phone</label>
                <input type="text"
                       class="form-control {{ $errors->has('phone') ? 'is-invalid' : null }}"
                       id="phone"
                       name="phone"
                       placeholder="Enter user phone..."
                       value="{{ old('phone', optional($user)->phone) }}"
                >
                {!! $errors->first('phone', '<small class="form-text text-danger">:message</small>') !!}
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-control mb-3">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="active" value="0">
                        <input type="checkbox"
                               class="custom-control-input"
                               name="active"
                               value="1"
                               id="active"
                                {{ old('active', optional($user)->active) == 1 ? 'checked' : null }}
                        >
                        <label class="custom-control-label"
                               style="width: 100%;"
                               for="active"
                        >
                            The user is active
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group col-6">
        <label for="roles" class="control-label">Roles</label>
        <select class="form-control"
                multiple="multiple"
                id="roles"
                name="roles[]"
        >
            @foreach($roles as $role)
                <option value="{{ $role->name }}"
                        @if($user)
                            @php
                                $old_and_current = old('roles', optional($user)->roles->pluck('name')->all());
                            @endphp
                            {{ in_array($role->name, $old_and_current) ? 'selected' : null }}
                        @endif
                >{{ $role->name }}</option>
            @endforeach
        </select>
        <p class="help-block"></p>
    </div>
</div>