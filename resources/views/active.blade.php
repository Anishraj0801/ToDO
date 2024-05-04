<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard- TODO list task</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <h2 class="text-center">To Do List </h2>

    <div class="card">
        <div class="card-body" style="position: relative; left: 64%;">
            <a href="{{ url('create') }}" class="btn btn-primary">Add Task</a>
        </div>
    </div>
    <section>
        <div class="container">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td id="status-{{ $item->id }}">{{ $item->status }}</td>
                            <td>
                                @if ($item->status != 'done')
                                    <form id="completeForm-{{ $item->id }}" method="POST" action="{{ route('tasks.complete', ['id' => $item->id]) }}">
                                        @csrf
                                        <button type="button" class="btn btn-success complete-btn" data-task-id="{{ $item->id }}" data-form-action="{{ route('tasks.complete', ['id' => $item->id]) }}">Complete</button>
                                    </form>
                                @endif
                                <a href="{{ url('create/' . $item->id . '/delete') }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const completeButtons = document.querySelectorAll('.complete-btn');
    
            completeButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const taskId = this.getAttribute('data-task-id');
                    const statusId = `status-${taskId}`;
                    const formAction = this.getAttribute('data-form-action');
    
                    fetch(formAction, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ _token: '{{ csrf_token() }}' })
                    })
                    .then(response => {
                        if (response.ok) {
                            document.getElementById(statusId).textContent = 'Done';
                            button.style.display = 'none'; // Hide the complete button
                        } else {
                            throw new Error('Network response was not ok.');
                        }
                    })
                    .catch(error => {
                        console.error('Fetch Error:', error);
                    });
                });
            });
        });
    </script>
    
    
</body>
</html>
