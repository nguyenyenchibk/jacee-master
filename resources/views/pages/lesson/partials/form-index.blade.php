<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <div class="text-left">
                <a href="{{ route('lessons.create', $course ) }}" class="btn btn-outline-primary">
                    + Add new Course
                </a>
            </div>
            <table class="table mt-3  text-left table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col" class="pr-5">Title</th>
                        <th scope="col" class="pr-5">Description</th>
                        <th scope="col" class="pr-5">Duration Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @forelse ($lesson as $lesson)
                    <tr>
                        <th scope="row">{!! $i++ !!}</th>
                        <td>{{ $lesson->title }}</td>
                        <td>{{ $lesson->description }}</td>
                        <td>{{ $lesson->duration_time }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-success"><a
                                    href="{{ route('lessons.edit', $lesson->id) }}">Show</a>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No Lesson found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
