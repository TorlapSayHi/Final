<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book List</title>

</head>
<body>
    <h1>Book List</h1>
    <a href="{{ route('create') }}">Add New Book</a>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Actions</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->published_year }}</td>
            <td>
                <a href="{{ route('edit', $book->id) }}">Edit</a>
                <form action="{{ route('destroy', $book->id) }}" method="POST" class="delete-form" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
<script>
    // ฟังก์ชันเพื่อยืนยันการลบด้วย SweetAlert
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // ป้องกันไม่ให้ฟอร์มทำงานทันที
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // แสดง SweetAlert ว่าไฟล์ถูกลบ
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    }).then(() => {
                        // ส่งฟอร์มเพื่อลบข้อมูลจริง
                        form.submit();
                    });
                }
            });
        });
    });
</script>


</html>
