<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="volunteer.css">
</head>
<body>
    <div class="card">
        <div class="card-header">
            Fill This Form
        </div>
        <div class="card-body">
            <h5 class="card-title">Welcome Volunteers!</h5>
            <p class="card-text">"We warmly welcome you to our volunteer team and appreciate you choosing to share your time and skills with us."</p>
            <form action="">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" aria-describedby="first">
            </div>
            <div class="mb-3">
                <label for="Skill" class="form-label">Skills</label>
                <input type="text" class="form-control" id="skill" aria-describedby="skill">
                <div id="skill" class="form-text">ex:  Graphic Design, Event Management, Marketing </div>
            </div>
             <div class="mb-3">
                <label for="avail" class="form-label">Available</label>
                <input type="text" class="form-control" id="Avail" aria-describedby="Avail">
                <div id="skill" class="form-text">ex: Monday, Wednesday afternoon, Weekday </div>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" aria-describedby="status">
                <div id="skill" class="form-text">ex: Pending, Active, not Active </div>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Registation Date</label>
                <input type="date" class="form-control" id="date" aria-describedby="date">
            </div>
            <a href="#" class="btn btn-primary">Join</a>
        </form>
        </div>
    </div>
</body>
</html>