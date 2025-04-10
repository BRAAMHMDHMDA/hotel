// resources/js/app.js

import './../../vendor/power-components/livewire-powergrid/dist/powergrid'
import './../../vendor/power-components/livewire-powergrid/dist/bootstrap5.css'
import './bootstrap.js'

var channel = Echo.private(`App.Models.Admin.${userID}`);
channel.notification(function(data) {
    Livewire.dispatch('newNotification', { data })
});
