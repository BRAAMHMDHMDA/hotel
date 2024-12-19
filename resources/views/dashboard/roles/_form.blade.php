<form wire:submit.prevent='submit'>
    <div class="modal-body">
        <div class="row mb-4">
            <div class="col">
                <x-dashboard.form.input name="name" label="Name"/>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="per" class="form-label">Permissions</label>
                <select id="per" wire:model="selectedPermissions" multiple class="form-control" style="height: 350px;" required>
                    @foreach($permissions as $permission)
                        <option value="{{$permission->name}}"
                                @selected(in_array($permission->name, $selectedPermissions))
                        >
                            {{$permission->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>


    </div>
    <div class="modal-footer border-0">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
        </button>
        <x-dashboard.form.btn-submit label="Save"/>
    </div>
</form>
