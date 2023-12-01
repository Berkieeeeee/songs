<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Album</title>
    <style>
        .header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .header ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .header li {
            margin: 0 20px;
        }

        .header a {
            text-decoration: none;
            color: #fff;
        }

        .content {
            padding-top: 70px;
            text-align: center;
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: left;
        }

        .form-container form {
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .album-details {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
        }

        .album-details a:hover {
            background-color: #555;
        }

        .btn-primary:hover {
            background-color: #555;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
        }

        .alert-danger {
            background-color: #f44336;
            color: #fff;
        }

        .alert-success {
            background-color: #4CAF50;
            color: #fff;
        }
    </style>
</head>

<body>
    <header class="header">
        <nav>
            <!-- Your navigation content, if any -->
        </nav>
    </header>
    <div class="content">
        <h1>Create a New Album</h1>
        <div class="form-container">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{ route('albums.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Album Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="year">Year:</label>
                    <input type="number" class="form-control" id="year" name="year" required>
                </div>
                <div class="form-group">
                    <label for="times_sold">Times Sold:</label>
                    <input type="number" class="form-control" id="times_sold" name="times_sold" required>
                </div>
                <div class="form-group">
                    <label for="band_id">Select Band:</label>
                    <select class="form-control" id="band_id" name="band_id" required>
                        @foreach ($bands as $band)
                        <option value="{{ $band->id }}">{{ $band->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn-primary">Create Album</button>
                <a class="album-details" href="{{ route('albums.index') }}">Back to Albums</a>
            </form>
        </div>
    </div>
</body>

</html>