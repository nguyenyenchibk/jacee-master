<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <form method="POST" action="{{ route('lessons.store', $course) }}">
        @csrf
        <div>
            <x-jet-label for="title" value="{{ __('Title') }}" />
            <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required />
        </div>

        <div class="mt-4">
            <x-jet-label for="description" value="{{ __('Description') }}" />
            <div class="form-floating">
                <x-jet-textarea id="description" class="block mt-1 w-full" type="text" name="description" required />
            </div>
        </div>

        <div class="mt-4">
            <x-jet-label for="duration_time" value="{{ __('Duration Time') }}" />
            <x-jet-input id="duration_time" class="block mt-1 w-full" type="text" name="duration_time" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-jet-button class="ml-4">
                {{ __('Create') }}
            </x-jet-button>
        </div>
    </form>
</div>

<script>
		$(function() {
			$('#duration_time').timeDurationPicker({
			years:false,
            months: false,
			days:false,
			  onSelect: function(element, seconds, duration_time) {
				$('#seconds').val(seconds);
				$('#duration_time').val(duration_time);
			  }
			});
		  }); 
</script>