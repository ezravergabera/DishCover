<script>
    function createModalShow() {
        var statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
        statusModal.show();
    };

    function editModalShow(mealplan) {
        document.getElementById('editBreakfast').value = mealplan.breakfast;
        document.getElementById('editLunch').value = mealplan.lunch;
        document.getElementById('editDessert').value = mealplan.dessert;
        document.getElementById('editSnacks').value = mealplan.snacks;
        document.getElementById('editDinner').value = mealplan.dinner;

        const route = "{{ route('mealPlan.update', ['mealplan' => ':mealplanId']) }}";
        const updatedRoute = route.replace(':mealplanId', mealplan.id);
        document.getElementById('editMealPlanForm').action = updatedRoute;

        const editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
    };
</script>