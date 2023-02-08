<table class="table mt-3  text-left table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col" class="pr-5">Title</th>
            <th scope="col" class="pr-5">Description</th>
            <th scope="col" class="pr-5">Required Level</th>
            <th scope="col" class="pr-5">Expected Level</th>
            <th scope="col" class="pr-5">Start Date</th>
            <th scope="col" class="pr-5">End Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = 1;
        @endphp
        @forelse ($course as $course)
        <tr>
            <th scope="row">{!! $i++ !!}</th>
            <td>{{ $course->title }}</td>
            <td>{{ $course->description }}</td>
            <td>{{ $course->required_level }}</td>
            <td>{{ $course->expected_level }}</td>
            <td>{{ $course->started_date }}</td>
            <td>{{ $course->ended_date }}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-success"><a
                            href="{{ route('courses.edit', $course->id) }}">Show</a></button>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No Course found</td>
        </tr>
        @endforelse
    </tbody>
</table>
