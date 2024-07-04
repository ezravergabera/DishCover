<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DishCover</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Knewave&display=swap">
    <link rel="stylesheet" href="{{asset('css/landing.css')}}">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a href="#" class="navbar-brand">DishCover</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Saved Recipe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Meal Plan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Grocery List</a>
                    </li>
                </ul>
                <div class="user-menu">
                    <i class="fa-solid fa-user user-icon"></i>
                    <a href="#">Logout</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="app-name">DishCover</div>
        <div class="search-container">
            <div class="input-wrapper">
                <i class="fa-solid fa-search"></i>
                <form>
                    <input type="text" id="search" placeholder="Search..." class="form-control">
                </form>
            </div>
        </div>
        <div id="results"></div>
    </main>

    <div class="bg1-container"></div>

    <script src="{{asset('js/landing.js')}}"></script>
</body>
</html>