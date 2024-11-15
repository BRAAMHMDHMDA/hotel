<?php

namespace App\Livewire\Dashboard\Settings;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $group, $menu=[], $view ='dashboard.settings.index', $settings = [], $page_title;
    public array $formData = [];


    public function mount($group= 'app'): void
    {
        $this->group = $group;
        $this->loadSettings();
    }

    protected function prepareSettings($settings): array
    {
        foreach ($settings as $key => $setting){
            if (isset($setting['options']) && is_callable($setting['options'])){
                $settings[$key]['options'] = call_user_func($setting['options']);
            }
        }
        return $settings;
    }

    public function loadSettings(): void
    {
        $configSettings = Config::get("settings.{$this->group}", []);

        if (!$configSettings) {
            abort(404);
        }

        foreach (Config::get("settings") as $key => $value) {
            $this->menu[$key] = [
                'name' => $value['name_menu'],
                'icon' => $value['icon']
            ];
        }

        $this->page_title = $configSettings['title'];
        $this->settings = $this->prepareSettings($configSettings['settings']);

        foreach ($this->settings as $name => $setting) {
            $key = str_replace('.', '_', $name);
            if ($setting['type'] === 'image' || $setting['type'] === 'file') {
                $this->formData[$key] = null;
                $this->formData[$key.'_old'] = config($name);
            }else{
                $this->formData[$key] = config($name);
            }
        }
    }

    public function submit(): void
    {
        foreach ($this->settings as $name => $setting) {
            $input = str_replace('.', '_', $name);

            if ($setting['type'] === 'image' || $setting['type'] === 'file') {
                $value = $this->upload($this->formData[$input], $name);
            } else {
                $value = $this->formData[$input];
            }

            Setting::updateOrCreate(['name' => $name], ['value' => $value]);
        }

        Cache::forget('app-settings');
        // notify
        $this->dispatch('notify_success', 'Settings Saved Successfully!');

    }

    protected function upload($file, $name)
    {
        if (!$file || !$file->isValid()) {
            return Config::get($name);
        }

        $name .= '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('settings', $name, [
            'disk' => 'media',
        ]);
        return asset('storage/media/'. $path);
    }

    public function render(): View
    {
        return view('dashboard.settings.index')->layout('dashboard.layout.dashboard-layout');
    }

}
