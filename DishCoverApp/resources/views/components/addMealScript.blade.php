<script>
    function decrementWeek() {
        const weekLabel = document.getElementById('weekID');
        const currentText = weekLabel.textContent.trim();
        const currentWeek = parseInt(currentText.replace('Week ', ''));
        if (!isNaN(currentWeek)) {
            weekLabel.textContent = `Week ${currentWeek - 1}`;
        }
    }

    function incrementWeek() {
        const weekLabel = document.getElementById('weekID');
        const currentText = weekLabel.textContent.trim();
        const currentWeek = parseInt(currentText.replace('Week ', ''));
        if (!isNaN(currentWeek)) {
            weekLabel.textContent = `Week ${currentWeek + 1}`;
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const prevButton = document.querySelector('.custom-prev-btn');
        const nextButton = document.querySelector('.custom-next-btn');

        nextButton.addEventListener('click', incrementWeek);

        const carouselElement = document.getElementById('carouselExample');
        const items = carouselElement.querySelectorAll('.carousel-item');
        
        carouselElement.addEventListener('slid.bs.carousel', (event) => {
            prevButton.addEventListener('click', decrementWeek);
            nextButton.addEventListener('click', incrementWeek);
            const activeIndex = event.to;
            const lastIndex = items.length - 1;
            
            if (activeIndex === lastIndex) {
                nextButton.removeEventListener('click', incrementWeek);
                prevButton.addEventListener('click', decrementWeek);
            } 
            
            if (activeIndex == 0) {
                prevButton.removeEventListener('click', decrementWeek);
                nextButton.addEventListener('click', incrementWeek);
            }
        });

    });

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