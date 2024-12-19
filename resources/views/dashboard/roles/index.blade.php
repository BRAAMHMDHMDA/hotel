<div>

    <x-dashboard.breadcrumb mainTitle="Roles">
        @can('role-create')
            <div class="ms-auto">
                <button class="btn btn-primary radius-30" data-bs-toggle="modal" data-bs-target="#create-modal">
                    <i class="bx bxs-plus-square"></i>
                    <span>Add New Role</span>
                </button>
                <livewire:dashboard.roles.create />
            </div>
        @endcan
    </x-dashboard.breadcrumb>

    <div class="card">
        <div class="card-body">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                @foreach($roles as $role)
                    <div class="col">
                        <div class="card radius-15">
                            <div class="card-body text-center">
                                <div class="p-2 border radius-15">
                                    <h4 class="mb-0 m-2">{{$role->name}}</h4>
                                    <p class="mb-3 m-1"><a class="fs-6" wire:navigate href="{{route('dashboard.admins')}}?search={{$role->name}}">{{$role->users_count}} Users</a> have this role</p>
                                    <div class="d-flex justify-content-center align-items-center gap-1 mb-3">
                                        <a href="#" class="btn btn-sm btn-warning radius-15"
                                           wire:click="$dispatch('editRole', { id: {{ $role->id }} })">
                                            <i class="bx bx-edit fs-6"></i>Edit
                                        </a>

                                        <a href="#" class="btn btn-sm btn-danger radius-15"
                                           wire:click="$dispatch('deleteRole', { id: {{ $role->id }} })">
                                            <i class="bx bx-trash fs-6"></i>Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @can('role-edit')
        <livewire:dashboard.roles.edit />
    @endcan
{{--    <livewire:dashboard.roles.view />--}}
    @can('role-delete')
        <livewire:dashboard.roles.delete />
    @endcan

</div>


