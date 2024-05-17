<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const descriptionCells = document.querySelectorAll(".description-cell");

        descriptionCells.forEach(cell => {
            cell.addEventListener("mouseover", function() {
                const description = this.textContent;
                this.setAttribute("title", description);
            });
        });
    });
</script>
<script src="../asset/js/script.js"></script>
</body>

</html>