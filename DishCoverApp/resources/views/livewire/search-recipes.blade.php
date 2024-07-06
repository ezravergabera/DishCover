<div>
    <form method="GET" class="input-wrapper" action="{{ route('recipes.search') }}">
        <i class="fa-solid fa-search"></i>
        <input wire:model.defer="query" type="text" name="query" placeholder="Search..." class="form-control">
    </form>
</div>
