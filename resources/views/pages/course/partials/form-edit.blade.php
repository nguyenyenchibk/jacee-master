<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <form method="POST" action="{{ route('courses.update', $course ) }}">
        @csrf
        @method('PUT')
        <div>
            <x-jet-label for="title" value="{{ __('Title') }}" />
            <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $course->title }}"
                required />
        </div>

        <div class="mt-4">
            <x-jet-label for="description" value="{{ __('Description') }}" />
            <div class="form-floating">
                <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description"
                    value="{{ $course->description }}" required />
            </div>
        </div>

        <div class="mt-4">
            <x-jet-label for="required_level" value="{{ __('Required Level') }}" />
            <x-jet-input id="required_level" class="block mt-1 w-full" type="text" name="required_level"
                value="{{ $course->required_level }}" required />
        </div>

        <div class="mt-4">
            <x-jet-label for="expected_level" value="{{ __('Expected Level') }}" />
            <x-jet-input id="expected_level" class="block mt-1 w-full" type="text" name="expected_level"
                value="{{ $course->expected_level }}" required />
        </div>

        <div class="mt-4">
            <x-jet-label for="started_date" value="{{ __('Start Date') }}" />
            <x-jet-input id="started_date" class="block mt-1 w-full" type="text" name="started_date"
                value="{{ $course->started_date }}" required />
        </div>

        <div class="mt-4">
            <x-jet-label for="ended_date" value="{{ __('End Date') }}" />
            <x-jet-input id="ended_date" class="block mt-1 w-full" type="text" name="ended_date"
                value="{{ $course->ended_date }}" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-jet-button class="ml-4">
                {{ __('Edit') }}
            </x-jet-button>
        </div>
    </form>

    <div class="btn-group">
        <button type="button" class="btn btn-outline-success btn-lg">
            <a href="{{ route('lessons.index', $course) }}">Lessson List</a>
        </button>
    </div>
    <form action="{{ route('courses.destroy', $course) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger ml-3 btn-lg">Delete</button>
    </form>
</div>

<script>
  $( function() {
    $( "#started_date" ).datepicker();
    $( "#ended_date" ).datepicker();
  } );
</script>
