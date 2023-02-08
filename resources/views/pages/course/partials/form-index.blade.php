<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            @if(Auth::user()->role !== App\Enums\Role::STUDENT)
            <div class="text-left">
                <a href="{{ route('courses.create') }}" class="btn btn-outline-primary">
                    + Add new Course
                </a>
            </div>
            @endif
            @include('pages.course.partials.table-index')
        </div>
    </div>
</div>
