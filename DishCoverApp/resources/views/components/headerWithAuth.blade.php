<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a href="{{ route('index') }}" class="navbar-brand">DishCover</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('index') }}">Home</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('savedRecipes.index') }}">Saved Recipe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mealPlan.index') }}">Meal Plan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('grocery.index') }}">Grocery List</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link inactive">Saved Recipe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive">Meal Plan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive">Grocery List</a>
            </li>
            @endauth
        </ul>
        <div class="user-menu">
            @auth
                <i class="fa-solid fa-user user-icon"></i>
                <a href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a>
            @else
                <i class="fa-solid fa-user user-icon"></i>
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </div>
</nav>