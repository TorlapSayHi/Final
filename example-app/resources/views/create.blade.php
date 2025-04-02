<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Book</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1>Add Bookdddd</h1>
    <form action="{{ route('store') }}" method="POST" class="submit-form">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" required><br>

        <label>Author:</label>
        <input type="text" name="author" required><br>

        <label>Published Year:</label>
        <input type="number" name="published_year" required><br>

        <button type="submit">Add</button>
    </form>
    <a href="{{ route('index') }}">Back</a>
</body>
<script>
    document.querySelectorAll('.submit-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // ป้องกันไม่ให้ฟอร์มทำงานทันที
            Swal.fire({
                title: "Success!",
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
