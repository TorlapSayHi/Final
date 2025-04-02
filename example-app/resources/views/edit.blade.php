<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Book</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1>Edit Book</h1>
    <form action="{{ route('update', $book->id) }}" method="POST" class="edit-form">
        @csrf
        @method('PUT')

        <label>Title:</label>
        <input type="text" name="title" value="{{ $book->title }}" required><br>

        <label>Author:</label>
        <input type="text" name="author" value="{{ $book->author }}" required><br>

        <label>Published Year:</label>
        <input type="number" name="published_year" value="{{ $book->published_year }}" required><br>

        <button type="submit">Update</button>
    </form>
    <a href="{{ route('index') }}">Back</a>
</body>
<script>
    document.querySelectorAll('.edit-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // ป้องกันไม่ให้ฟอร์มทำงานทันที
            Swal.fire({
                title: "Edit Success!",
                icon: "success",
                draggable: true
                }).then((result) => {
                if (result.isConfirmed) {
                        // ส่งฟอร์มเพื่อลบข้อมูลจริง
                        form.submit();
                }
            });
        });
    });
</script>
</html>
