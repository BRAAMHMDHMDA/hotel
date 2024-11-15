<div>
    <x-dashboard.breadcrumb mainTitle="Settings"/>
    <div class="row g-4">
        <!-- Navigation -->
        <div class="col-12 col-lg-4">
            <div class="d-flex justify-content-between flex-column mb-3 mb-md-0">
                <ul class="nav nav-align-left nav-pills flex-column">
                    @foreach($menu as $nameOfGroup => $dataMenu)
                        <li class="nav-item mb-1">
                            <a wire:navigate
                               class="nav-link d-flex align-items-center py-2
                               @if($group == $nameOfGroup) active @endif"
                               href="{{ route('dashboard.settings', ['group' => $nameOfGroup])}}"
                            >
                                <i class="{{$dataMenu['icon']}}"></i>
                                <span class="align-middle">{{$dataMenu['name']}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- /Navigation -->

        <!-- Options -->
        <div class="col-12 col-lg-8 pt-4 pt-lg-0">
            <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="store_details" role="tabpanel">
                    <form wire:submit.prevent="submit" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title m-0">{{$page_title}}</h5>
                            </div>
                            <div class="card-body  p-4">
                                <div class="row mb-3 g-3">
                                    @foreach($settings as $name => $setting)
                                        @if($setting['type'] == 'select')
                                            <div class="mb-3">
                                                <label for="{{$name}}" class="form-label">{{ $setting['label'] }}</label>
                                                <select id="{{$name}}" class="select2 form-select" wire:model="formData.{{ str_replace('.', '_', $name) }}">
                                                    @foreach($setting['options'] as $key => $value)
                                                        <option value="{{$key}}" @if( config($name)==$key) selected @endif >{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @elseif($setting['type'] == 'textarea')
                                            <div>
                                                <label for="{{$name}}" class="form-label">{{ $setting['label'] }}</label>
                                                <textarea class="form-control" id="{{$name}}" rows="4" wire:model="{{$name}}">{{config($name)}}</textarea>
                                            </div>
                                        @elseif($setting['type'] == 'image')
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <x-dashboard.form.image-input name="formData.{{ str_replace('.', '_', $name) }}"
                                                                                      :src="$formData[str_replace('.', '_', $name)]"
                                                                                      :src_old="$formData[str_replace('.', '_', $name).'_old']"
                                                                                      label="{{ $setting['label'] }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="mb-3">

                                                <label class="form-label mb-0" for="{{$name}}">{{ $setting['label'] }}</label>
                                                <input type="{{$setting['type']}}" class="form-control"
                                                       id="{{$name}}" placeholder="{{ $setting['label'] }}"
                                                       wire:model="formData.{{ str_replace('.', '_', $name) }}"
                                                >
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-3">
                                <x-front.form.submit-btn class="btn btn-primary waves-effect waves-light m-4">
                                    <i class="bx bx-save"></i> Save
                                </x-front.form.submit-btn>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Options-->
    </div>


</div>
