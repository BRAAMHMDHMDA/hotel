<div>
    <a class="dropdown-item d-flex align-items-center py-2 cursor-pointer"
       @click.prevent="$refs.logoutButton.click()"
    >
        <i class="bx bx-log-out-circle"></i>
        <span>Logout</span>
    </a>

    <form wire:submit.prevent="logout" method="post" x-ref="logoutForm" hidden>
        @csrf
        <button type="submit" x-ref="logoutButton">Logout</button>
    </form>
</div>
