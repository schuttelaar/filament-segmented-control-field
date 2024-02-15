<!-- resources/views/fields/segmented-button.blade.php -->

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }},
		stateValue : @json($getState()),
		multi: {{$isMulti()}},
        toggleActive(key) {
            @if($isDisabled())
                return;
            @else
                // unclear why, but following code doesn't execute if it isn't prepended with this comment
				let stateArray = this.stateValue;
				let valueFound = false;
				stateArray.forEach((val, index) => {
					if (val == key) {
						stateArray.splice(index, 1);
						valueFound = true;
					}
				});

				if (!valueFound) {
					if (this.multi != 1) {
						stateArray = [];
					}
					stateArray.push(key);
				}
				this.state = stateArray;
                this.stateValue = stateArray;

            @endif
        }}">
		<div class="filament-forms-segmented-control border-2 rounded-full text-sm font-semibold text-white inline-flex overflow-hidden divide-x {{$isDisabled() ? 'opacity-50' : ''}}">
		@foreach ($getOptions() as $key => $option)
			<div x-data
                    @isset($option['tooltip']) x-tooltip.raw="{{$option['tooltip']}}" @endisset class="grow-0 text-white outline-none segment" key="{{ $key }}" color="{{ in_array($key, $getState()) ? 'danger' : 'primary' }}">
				<input {{ in_array($key, $getState()) ? 'checked=checked' : '' }} type="checkbox" name="" id="{{ $getName() . '-' . $key }}">
				<label for="{{  $getName() . '-' .$key }}" class="flex gap-2 px-3 py-2" @click="toggleActive({{ $key }})">
					@isset($option['icon'])
					<x-dynamic-component :component="$option['icon']" class="w-4">
					@endisset

					</x-dynamic-component>
					<div>{{ $option['label'] }}</div>
				</label>
			</div>
		@endforeach
		</div>
	</div>

</x-dynamic-component>