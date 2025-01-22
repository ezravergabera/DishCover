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
                <a class="nav-link" href="{{ route('grocery.index') }}">Ingredients</a>
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
                <form method="POST" action="http://127.0.0.1:8000/logout">
                            <input type="hidden" name="_token" value="xrolCsoFA3IbYQlaOkn2ocDkQB85YhDM3xDuv9bm" autocomplete="off">
                            <a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="http://127.0.0.1:8000/logout" onclick="event.preventDefault();
                                                this.closest('form').submit();">Log Out</a>
                        </form>
            @endauth
        </div>
    </div>
</nav>